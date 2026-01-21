<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Orders extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 2010 05:00:00 GMT");
        $this->load->model('Users_model');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('Cart_model');
        $this->load->model('Order_model');
        if (!$this->session->userdata('user_id')) {
            redirect('/');
        }
    }

    public function index()
    {
        $response = array('success' => false, 'code' => 400, 'message' => 'Something went wrong !', 'data' => '');
        try {
            if ($_SERVER['REQUEST_METHOD'] != 'POST') {
                throw new Exception("Request parameter required !");
            }

            $user_id = $this->session->userdata('user_id');
            $selected_address_id = $this->input->post('selected_address_id', true);
            $delivery_id = $this->input->post('delivery_id', true);
            $payment_method = $this->input->post('payment_method', true) ?: 'COD';
            $this->load->model('Delivery_model');
            $delivery_info = $this->Delivery_model->get_charge_by_id($delivery_id);

            $delivery_cost = 0;
            $delivery_name = 'Standard';

            if ($delivery_info) {
                $delivery_cost = $delivery_info->amount;
                $delivery_name = $delivery_info->name;
            }

            // 3. Calculate Totals - STRICT: Use exact DB prices, validate to prevent manipulation
            $cart_data = $this->Cart_model->get_allcart($user_id);
            $tot_amount = 0;
            foreach ($cart_data as $key => $value) {
                // CRITICAL: Validate and use exact cart_selling_price from DB (product.selling_price)
                // This is the source of truth - prevents price manipulation
                $unit_price = (float) $value->cart_selling_price;
                $quantity = (int) $value->quantity;

                // Validate to prevent manipulation
                if ($unit_price <= 0) {
                    log_message('error', 'Invalid price for product ' . $value->product_id . ' in cart: ' . $unit_price);
                    // Use product price as fallback
                    $unit_price = isset($value->selling_price) ? (float) $value->selling_price : 0;
                    if ($unit_price <= 0) {
                        $unit_price = isset($value->price) ? (float) $value->price : 0;
                    }
                }

                if ($quantity <= 0) {
                    $quantity = 1; // Minimum quantity
                }

                // STRICT: Calculate total using validated prices
                $tot_amount += $unit_price * $quantity;
            }
            // --- COUPON LOGIC START ---
            $discount_amount = 0;
            $coupon_code = null;
            $applied_coupon = $this->session->userdata('applied_coupon');

            if ($applied_coupon) {
                $discount_amount = $applied_coupon['discount'];
                $coupon_code = $applied_coupon['code'];

                // Security check: Ensure discount doesn't exceed total
                if ($discount_amount > $tot_amount) {
                    $discount_amount = $tot_amount;
                }
            }


            // 4. Add Delivery Charge to Total
            $final_total = ($tot_amount + $delivery_cost) - $discount_amount;
            if ($final_total < 0)
                $final_total = 0;

            // Handle wallet payment
            if ($payment_method == 'wallet') {
                $this->load->model('Wallet_model');

                // Check if user has sufficient balance
                if (!$this->Wallet_model->has_sufficient_balance($user_id, $final_total)) {
                    throw new Exception("Insufficient wallet balance. Please top-up your wallet or choose another payment method.");
                }
            }

            $this->db->trans_start();

            // Check which columns exist in orders table
            $delivery_charge_exists = $this->check_column_exists('delivery_charge');
            $delivery_method_exists = $this->check_column_exists('delivery_method');
            $discount_amount_exists = $this->check_column_exists('discount_amount');
            $coupon_code_exists = $this->check_column_exists('coupon_code');

            $order_data = array(
                'order_number' => uniqid() . time(),
                'status' => '2', // 2 = Confirmed/Processing
                'user_id' => $user_id,
                'address_id' => $selected_address_id,
                'payment_mode' => strtoupper($payment_method),
                'tot_amount' => $final_total
            );

            // Only add columns if they exist in the database
            if ($delivery_charge_exists) {
                $order_data['delivery_charge'] = $delivery_cost;
            }

            if ($delivery_method_exists) {
                $order_data['delivery_method'] = $delivery_name;
            }

            if ($discount_amount_exists) {
                $order_data['discount_amount'] = $discount_amount;
            }

            if ($coupon_code_exists) {
                $order_data['coupon_code'] = $coupon_code;
            }
            $cart_data = $this->Cart_model->get_allcart($user_id);

            $order_products = [];
            $this->db->insert('orders', $order_data);
            $order_id = $this->db->insert_id();
            if (!$order_id) {
                throw new Exception("Error Processing Request : Order could not saved!");
            }

            foreach ($cart_data as $key => $value) {
                $order_products[] = array(
                    'order_id' => $order_id,
                    'status' => 1,
                    'product_id' => $value->product_id,
                    'product_name' => $value->product_name,
                    'product_image' => $value->product_img1,
                    'quantity' => $value->quantity,
                    'price' => $value->cart_selling_price,
                    'is_variant' => $value->is_variant,
                    'variant_name' => $value->varient_name,
                    'variant_weight' => $value->unit,
                    'namecake' => isset($value->namecake) ? $value->namecake : null,
                    'address_id' => $selected_address_id,
                );
            }
            $this->db->insert_batch('order_product', $order_products);
            if (!$this->db->affected_rows() > 0) {
                throw new Exception("Error Processing Request : Order product could not saved");
            }

            $this->db->query("delete from cart where user_id = ? ", [$user_id]);
            $this->db->query("delete from addon_cart where user_id = ? ", [$user_id]);

            // Auto-generate invoice for the order
            $this->load->model('Invoice_model');
            if (!$this->Invoice_model->invoice_exists_for_order($order_id)) {
                $this->Invoice_model->create_invoice(
                    $order_id,
                    $user_id,
                    $tot_amount,
                    $final_total,
                    $delivery_cost,
                    $discount_amount
                );
            }

            $this->db->trans_commit();

            // Deduct from wallet if wallet payment
            if ($payment_method == 'wallet') {
                $this->load->model('Wallet_model');
                $wallet_deducted = $this->Wallet_model->deduct_balance(
                    $user_id,
                    $final_total,
                    'order',
                    $order_id,
                    'Payment for order #' . $order_data['order_number']
                );

                if (!$wallet_deducted) {
                    // This should not happen as we already checked balance
                    log_message('error', 'Failed to deduct wallet balance for order ' . $order_id);
                }
            }

            $this->session->unset_userdata('applied_coupon');

            // Create notification for order placed
            if ($payment_method == 'COD') {
                $this->load->model('Notifications_model');
                $this->Notifications_model->create_notification([
                    'user_id' => $user_id,
                    'order_id' => $order_id,
                    'type' => 'order_placed',
                    'title' => 'Order Placed Successfully',
                    'message' => 'Your order #' . $order_data['order_number'] . ' has been placed successfully. Total amount: ₹' . number_format($final_total, 2) . '. Payment: Cash on Delivery'
                ]);
                // Create admin notification
                $this->Notifications_model->create_admin_notification([
                    'order_id' => $order_id,
                    'type' => 'new_order',
                    'title' => 'New Order Received',
                    'message' => 'New order #' . $order_data['order_number'] . ' has been placed. Total amount: ₹' . number_format($final_total, 2) . '. Payment: Cash on Delivery'
                ]);
            } elseif ($payment_method == 'wallet') {
                $this->load->model('Notifications_model');
                $this->Notifications_model->create_notification([
                    'user_id' => $user_id,
                    'order_id' => $order_id,
                    'type' => 'order_placed',
                    'title' => 'Order Placed Successfully',
                    'message' => 'Your order #' . $order_data['order_number'] . ' has been placed successfully. Total amount: ₹' . number_format($final_total, 2) . '. Payment: Wallet'
                ]);
                // Create admin notification
                $this->Notifications_model->create_admin_notification([
                    'order_id' => $order_id,
                    'type' => 'new_order',
                    'title' => 'New Order Received',
                    'message' => 'New order #' . $order_data['order_number'] . ' has been placed. Total amount: ₹' . number_format($final_total, 2) . '. Payment: Wallet'
                ]);
            }

            // Order Details Fetching
            $order_details = $this->Order_model->get_orderdetailsby_orderid($order_id, $user_id);
            if (!$order_details) {
                throw new Exception("Failed to retrieve primary order details.");
            }
            $data['order'] = $order_details;

            $order_product_detail = $this->Order_model->get_orderproductsby_orderid($order_id);
            $data['order_product'] = $order_product_detail ? $order_product_detail : [];

            $address_detail = null;
            if (isset($order_details->address_id) && $order_details->address_id > 0) {
                $address_detail = $this->Users_model->getAddressById($order_details->address_id);
            }
            $data['address'] = $address_detail ? $address_detail : (object) ['fullname' => 'N/A', 'address' => 'Address details not available.'];

            $data['content'] = 'successOrder';
            $response['success'] = true;
            $response['code'] = 200;
            $response['message'] = 'Order placed successfully';
            $this->session->set_flashdata("success", "Order placed successfully");

            // FIX: If AJAX request, return JSON so SweetAlert can handle it
            if ($this->input->is_ajax_request()) {
                header('Content-Type: application/json');
                echo json_encode($response);
                return;
            }

        } catch (Exception $e) {
            $this->db->trans_rollback();
            $response['message'] = $e->getMessage();
            $data['content'] = 'errorhandle';
            $this->session->set_flashdata("error", $e->getMessage());

            // FIX: Return JSON error for AJAX
            if ($this->input->is_ajax_request()) {
                header('Content-Type: application/json');
                echo json_encode($response);
                return;
            }
        }
        $data['response'] = $response;
        $this->load->view('template', $data);
    }

    // Add to Orders.php or Main.php

    public function apply_coupon_ajax()
    {
        $code = $this->input->post('coupon_code');
        $cart_total = $this->input->post('cart_total');

        $this->load->model('Coupon_model');
        $coupon = $this->Coupon_model->get_valid_coupon($code);

        if ($coupon) {
            // Check Minimum Cart Value
            if ($cart_total < $coupon->min_cart_value) {
                echo json_encode([
                    'status' => false,
                    'message' => 'Minimum cart value of ₹' . $coupon->min_cart_value . ' required.'
                ]);
                return;
            }

            // Calculate Discount
            $discount = 0;
            if ($coupon->type == 'fixed') {
                $discount = $coupon->value;
            } else {
                $discount = ($cart_total * $coupon->value) / 100;
            }

            // Ensure discount doesn't exceed total
            if ($discount > $cart_total) {
                $discount = $cart_total;
            }

            $new_total = $cart_total - $discount;

            // Store in session so we can access it when placing the order
            $this->session->set_userdata('applied_coupon', [
                'code' => $coupon->code,
                'discount' => $discount
            ]);

            echo json_encode([
                'status' => true,
                'discount_amount' => number_format($discount, 2),
                'new_total' => number_format($new_total, 2),
                'message' => 'Coupon Applied Successfully!'
            ]);
        } else {
            echo json_encode(['status' => false, 'message' => 'Invalid or Expired Coupon.']);
        }
    }

    /**
     * Check if a column exists in orders table
     */
    private function check_column_exists($column_name)
    {
        try {
            // Check if orders table exists first
            if (!$this->db->table_exists('orders')) {
                return false;
            }

            // Get column list
            $columns = $this->db->list_fields('orders');

            // If list_fields fails or returns empty, assume column doesn't exist
            if (empty($columns) || !is_array($columns)) {
                return false;
            }

            return in_array($column_name, $columns);
        } catch (Exception $e) {
            log_message('error', 'Error checking column ' . $column_name . ': ' . $e->getMessage());
            return false;
        } catch (Error $e) {
            log_message('error', 'Fatal error checking column ' . $column_name . ': ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Check if Razorpay columns exist in orders table
     */
    private function check_razorpay_columns_exist()
    {
        $required_columns = ['razorpay_order_id', 'razorpay_payment_id', 'razorpay_signature'];

        foreach ($required_columns as $col) {
            if (!$this->check_column_exists($col)) {
                return false;
            }
        }
        return true;
    }

    /**
     * Create Razorpay order and return order details
     */
    public function create_razorpay_order()
    {
        @ob_clean(); // Clear output buffer
        $response = array('success' => false, 'code' => 400, 'message' => 'Something went wrong!', 'data' => '');

        try {
            if ($_SERVER['REQUEST_METHOD'] != 'POST') {
                throw new Exception("Request parameter required!");
            }

            $user_id = $this->session->userdata('user_id');
            if (!$user_id) {
                throw new Exception("User not logged in!");
            }

            $this->load->model('Settings_model');
            $this->load->model('Delivery_model');

            // Get Razorpay settings
            $razorpay_settings = $this->Settings_model->get_razorpay_settings();
            if (empty($razorpay_settings['razorpay_key_id']) || empty($razorpay_settings['razorpay_key_secret'])) {
                throw new Exception("Razorpay is not configured. Please contact administrator.");
            }

            // Validate required fields
            $selected_address_id = $this->input->post('selected_address_id', true);
            $delivery_id = $this->input->post('delivery_id', true);

            if (empty($selected_address_id)) {
                throw new Exception("Please select a delivery address.");
            }

            if (empty($delivery_id)) {
                throw new Exception("Please select a delivery method.");
            }

            $delivery_info = $this->Delivery_model->get_charge_by_id($delivery_id);
            $delivery_cost = $delivery_info ? $delivery_info->amount : 0;

            // Get cart data and calculate total - STRICT: Use exact DB prices
            $cart_data = $this->Cart_model->get_allcart($user_id);
            if (empty($cart_data)) {
                throw new Exception("Your cart is empty. Please add items to cart.");
            }

            $tot_amount = 0;
            foreach ($cart_data as $key => $value) {
                // CRITICAL: Validate and use exact cart_selling_price from DB (product.selling_price)
                // This is the source of truth - prevents price manipulation
                $unit_price = (float) $value->cart_selling_price;
                $quantity = (int) $value->quantity;

                // Validate to prevent manipulation
                if ($unit_price <= 0) {
                    log_message('error', 'Invalid price for product ' . $value->product_id . ' in cart: ' . $unit_price);
                    // Use product price as fallback
                    $unit_price = isset($value->selling_price) ? (float) $value->selling_price : 0;
                    if ($unit_price <= 0) {
                        $unit_price = isset($value->price) ? (float) $value->price : 0;
                    }
                }

                if ($quantity <= 0) {
                    $quantity = 1; // Minimum quantity
                }

                // STRICT: Calculate total using validated prices
                $tot_amount += $unit_price * $quantity;
            }

            // Apply coupon if any
            $discount_amount = 0;
            $applied_coupon = $this->session->userdata('applied_coupon');
            if ($applied_coupon) {
                $discount_amount = $applied_coupon['discount'];
                if ($discount_amount > $tot_amount) {
                    $discount_amount = $tot_amount;
                }
            }

            $final_total = ($tot_amount + $delivery_cost) - $discount_amount;
            if ($final_total < 0)
                $final_total = 0;

            // Validate minimum amount (Razorpay minimum is ₹1)
            if ($final_total < 1) {
                throw new Exception("Order total must be at least ₹1.00");
            }

            // Convert to paise (Razorpay uses smallest currency unit)
            $amount_in_paise = (int) round($final_total * 100);

            if ($amount_in_paise < 100) {
                throw new Exception("Order amount is too low. Minimum amount is ₹1.00");
            }

            // Create order in database first (with pending status)
            $order_number = uniqid() . time();
            $this->db->trans_start();

            // Check which columns exist in orders table
            $razorpay_columns_exist = $this->check_razorpay_columns_exist();
            $delivery_charge_exists = $this->check_column_exists('delivery_charge');
            $delivery_method_exists = $this->check_column_exists('delivery_method');
            $discount_amount_exists = $this->check_column_exists('discount_amount');
            $coupon_code_exists = $this->check_column_exists('coupon_code');

            $order_data = array(
                'order_number' => $order_number,
                'status' => '0', // 0 = Payment Pending
                'user_id' => $user_id,
                'address_id' => $selected_address_id,
                'payment_mode' => 'RAZORPAY',
                'tot_amount' => $final_total
            );

            // Only add columns if they exist in the database
            if ($delivery_charge_exists) {
                $order_data['delivery_charge'] = $delivery_cost;
            }

            if ($delivery_method_exists) {
                $order_data['delivery_method'] = $delivery_info ? $delivery_info->name : 'Standard';
            }

            if ($discount_amount_exists) {
                $order_data['discount_amount'] = $discount_amount;
            }

            if ($coupon_code_exists) {
                $order_data['coupon_code'] = $applied_coupon ? $applied_coupon['code'] : null;
            }

            // Only add Razorpay columns if they exist in the database
            if ($razorpay_columns_exist) {
                $order_data['razorpay_order_id'] = null;
                $order_data['razorpay_payment_id'] = null;
                $order_data['razorpay_signature'] = null;
            }

            $insert_result = $this->db->insert('orders', $order_data);

            if (!$insert_result) {
                $db_error = $this->db->error();
                $error_msg = "Error Processing Request: Order could not be saved!";
                if (isset($db_error['message']) && !empty($db_error['message'])) {
                    $error_msg .= " Database Error: " . $db_error['message'];
                }
                if (isset($db_error['code']) && !empty($db_error['code'])) {
                    $error_msg .= " (Code: " . $db_error['code'] . ")";
                }
                log_message('error', 'Order Insert Failed: ' . print_r($db_error, true));
                log_message('error', 'Order Data: ' . print_r($order_data, true));
                throw new Exception($error_msg);
            }

            $order_id = $this->db->insert_id();

            if (!$order_id || $order_id <= 0) {
                $db_error = $this->db->error();
                $error_msg = "Error Processing Request: Order ID could not be retrieved!";
                if (isset($db_error['message']) && !empty($db_error['message'])) {
                    $error_msg .= " Database Error: " . $db_error['message'];
                }
                log_message('error', 'Order ID Retrieval Failed: ' . print_r($db_error, true));
                throw new Exception($error_msg);
            }

            // Create Razorpay order via API
            $razorpay_order_data = array(
                'amount' => $amount_in_paise,
                'currency' => 'INR',
                'receipt' => $order_number,
                'notes' => array(
                    'order_id' => $order_id,
                    'user_id' => $user_id
                )
            );

            $ch = curl_init('https://api.razorpay.com/v1/orders');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($razorpay_order_data));
            curl_setopt($ch, CURLOPT_USERPWD, $razorpay_settings['razorpay_key_id'] . ':' . $razorpay_settings['razorpay_key_secret']);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            curl_setopt($ch, CURLOPT_TIMEOUT, 30);

            // SSL Certificate handling - for local development
            // In production, you should use proper SSL certificates
            if (ENVIRONMENT === 'development' || strpos(base_url(), 'localhost') !== false) {
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            } else {
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
            }

            $razorpay_response = curl_exec($ch);
            $curl_error = curl_error($ch);
            $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            if (!empty($curl_error)) {
                $this->db->trans_rollback();
                log_message('error', 'Razorpay CURL Error: ' . $curl_error);
                throw new Exception("Network error: " . $curl_error);
            }

            if ($http_code !== 200) {
                $this->db->trans_rollback();
                $error_data = json_decode($razorpay_response, true);
                $error_msg = 'Failed to create payment order';

                if (isset($error_data['error']['description'])) {
                    $error_msg = $error_data['error']['description'];
                } elseif (isset($error_data['error']['message'])) {
                    $error_msg = $error_data['error']['message'];
                } elseif (!empty($razorpay_response)) {
                    $error_msg = 'Razorpay API Error: ' . $razorpay_response;
                }

                log_message('error', 'Razorpay API Error (HTTP ' . $http_code . '): ' . $error_msg);
                log_message('error', 'Razorpay Response: ' . $razorpay_response);

                throw new Exception("Payment Error: " . $error_msg);
            }

            $razorpay_order = json_decode($razorpay_response, true);

            if (empty($razorpay_order) || !isset($razorpay_order['id'])) {
                $this->db->trans_rollback();
                log_message('error', 'Invalid Razorpay response: ' . $razorpay_response);
                throw new Exception("Invalid response from payment gateway. Please try again.");
            }

            // Update order with Razorpay order ID (only if column exists)
            if ($razorpay_columns_exist) {
                $this->db->where('id', $order_id);
                $this->db->update('orders', array('razorpay_order_id' => $razorpay_order['id']));
            }

            $this->db->trans_commit();

            $response['success'] = true;
            $response['code'] = 200;
            $response['message'] = 'Order created successfully';
            $response['data'] = array(
                'order_id' => $order_id,
                'razorpay_order_id' => $razorpay_order['id'],
                'amount' => $amount_in_paise,
                'key_id' => $razorpay_settings['razorpay_key_id'],
                'order_number' => $order_number
            );

        } catch (Exception $e) {
            if (isset($this->db) && $this->db->trans_status() !== FALSE) {
                $this->db->trans_rollback();
            }
            $response['message'] = $e->getMessage();
            log_message('error', 'Razorpay Order Creation Error: ' . $e->getMessage());
            log_message('error', 'Stack Trace: ' . $e->getTraceAsString());
        }

        header('Content-Type: application/json');
        $this->output->set_output(json_encode($response));
        $this->output->_display();
        exit;
    }

    /**
     * Verify Razorpay payment and complete order
     */
    public function verify_razorpay_payment()
    {
        $response = array('success' => false, 'code' => 400, 'message' => 'Something went wrong!', 'data' => '');

        try {
            if ($_SERVER['REQUEST_METHOD'] != 'POST') {
                throw new Exception("Request parameter required!");
            }

            $user_id = $this->session->userdata('user_id');
            if (!$user_id) {
                throw new Exception("User not logged in!");
            }

            $this->load->model('Settings_model');

            $razorpay_order_id = $this->input->post('razorpay_order_id', true);
            $razorpay_payment_id = $this->input->post('razorpay_payment_id', true);
            $razorpay_signature = $this->input->post('razorpay_signature', true);
            $order_id = $this->input->post('order_id', true);

            if (empty($razorpay_order_id) || empty($razorpay_payment_id) || empty($razorpay_signature) || empty($order_id)) {
                throw new Exception("Invalid payment data!");
            }

            // Get Razorpay settings
            $razorpay_settings = $this->Settings_model->get_razorpay_settings();
            if (empty($razorpay_settings['razorpay_key_secret'])) {
                throw new Exception("Razorpay is not configured!");
            }

            // Verify signature
            $generated_signature = hash_hmac('sha256', $razorpay_order_id . '|' . $razorpay_payment_id, $razorpay_settings['razorpay_key_secret']);

            if ($generated_signature !== $razorpay_signature) {
                throw new Exception("Payment verification failed! Invalid signature.");
            }

            // Verify payment with Razorpay API
            $ch = curl_init('https://api.razorpay.com/v1/payments/' . $razorpay_payment_id);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_USERPWD, $razorpay_settings['razorpay_key_id'] . ':' . $razorpay_settings['razorpay_key_secret']);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            curl_setopt($ch, CURLOPT_TIMEOUT, 30);

            // SSL Certificate handling - for local development
            // In production, you should use proper SSL certificates
            if (ENVIRONMENT === 'development' || strpos(base_url(), 'localhost') !== false) {
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            } else {
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
            }

            $payment_response = curl_exec($ch);
            $curl_error = curl_error($ch);
            $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            if (!empty($curl_error)) {
                log_message('error', 'Razorpay Payment Verification CURL Error: ' . $curl_error);
                throw new Exception("Network error: " . $curl_error);
            }

            if ($http_code !== 200) {
                $error_data = json_decode($payment_response, true);
                $error_msg = 'Failed to verify payment with Razorpay';

                if (isset($error_data['error']['description'])) {
                    $error_msg = $error_data['error']['description'];
                } elseif (isset($error_data['error']['message'])) {
                    $error_msg = $error_data['error']['message'];
                } elseif (!empty($payment_response)) {
                    $error_msg = 'Razorpay API Error: ' . $payment_response;
                }

                log_message('error', 'Razorpay Payment Verification Error (HTTP ' . $http_code . '): ' . $error_msg);
                log_message('error', 'Razorpay Payment Response: ' . $payment_response);
                throw new Exception($error_msg);
            }

            $payment_data = json_decode($payment_response, true);

            if (empty($payment_data) || !isset($payment_data['status'])) {
                log_message('error', 'Invalid Razorpay payment response: ' . $payment_response);
                throw new Exception("Invalid response from payment gateway. Please try again.");
            }

            if ($payment_data['status'] !== 'captured' && $payment_data['status'] !== 'authorized') {
                log_message('error', 'Payment not successful. Status: ' . $payment_data['status']);
                throw new Exception("Payment not successful. Status: " . $payment_data['status']);
            }

            // Update order status and complete order
            $this->db->trans_start();

            // Check if Razorpay columns exist
            $razorpay_columns_exist = $this->check_razorpay_columns_exist();

            // Update order status to paid
            $update_data = array(
                'status' => '2' // 2 = Paid
            );

            // Only add Razorpay columns if they exist
            if ($razorpay_columns_exist) {
                $update_data['razorpay_payment_id'] = $razorpay_payment_id;
                $update_data['razorpay_signature'] = $razorpay_signature;
            }

            $this->db->where('id', $order_id);
            $this->db->where('user_id', $user_id);
            $this->db->update('orders', $update_data);

            // Add order products
            $cart_data = $this->Cart_model->get_allcart($user_id);
            $order_products = [];
            foreach ($cart_data as $key => $value) {
                $order_products[] = array(
                    'order_id' => $order_id,
                    'status' => 1,
                    'product_id' => $value->product_id,
                    'product_name' => $value->product_name,
                    'product_image' => $value->product_img1,
                    'quantity' => $value->quantity,
                    'price' => $value->cart_selling_price,
                    'is_variant' => $value->is_variant,
                    'variant_name' => $value->varient_name,
                    'variant_weight' => $value->unit,
                    'address_id' => $this->input->post('selected_address_id', true),
                );
            }
            $this->db->insert_batch('order_product', $order_products);

            // Clear cart
            $this->db->query("DELETE FROM cart WHERE user_id = ?", array($user_id));
            $this->db->query("DELETE FROM addon_cart WHERE user_id = ?", array($user_id));

            // Clear coupon
            $this->session->unset_userdata('applied_coupon');

            // Get order details to calculate invoice amounts
            $order_query = $this->db->get_where('orders', ['id' => $order_id]);
            $order = $order_query->row();

            if (!$order) {
                throw new Exception("Order not found!");
            }

            // Calculate totals from order
            $order_products_check = $this->Order_model->get_orderproductsby_orderid($order_id);
            $subtotal = 0;
            foreach ($order_products_check as $op) {
                $subtotal += (float) $op->price * (int) $op->quantity;
            }

            $delivery_charge = isset($order->delivery_charge) ? (float) $order->delivery_charge : 0;
            $discount_amount = isset($order->discount_amount) ? (float) $order->discount_amount : 0;
            $final_total = isset($order->tot_amount) ? (float) $order->tot_amount : ($subtotal + $delivery_charge - $discount_amount);

            // Auto-generate invoice for the order
            $this->load->model('Invoice_model');
            if (!$this->Invoice_model->invoice_exists_for_order($order_id)) {
                $this->Invoice_model->create_invoice(
                    $order_id,
                    $user_id,
                    $subtotal,
                    $final_total,
                    $delivery_charge,
                    $discount_amount
                );
            }

            $this->db->trans_commit();

            // Get order details for notification
            $order_query = $this->db->get_where('orders', ['id' => $order_id]);
            $order = $order_query->row();

            // Create notifications for payment success and order placed
            $this->load->model('Notifications_model');
            $this->Notifications_model->create_notification([
                'user_id' => $user_id,
                'order_id' => $order_id,
                'type' => 'payment_success',
                'title' => 'Payment Successful',
                'message' => 'Your payment for order #' . $order->order_number . ' has been processed successfully. Amount: ₹' . number_format($order->tot_amount, 2)
            ]);

            $this->Notifications_model->create_notification([
                'user_id' => $user_id,
                'order_id' => $order_id,
                'type' => 'order_placed',
                'title' => 'Order Placed Successfully',
                'message' => 'Your order #' . $order->order_number . ' has been placed successfully. Total amount: ₹' . number_format($order->tot_amount, 2)
            ]);

            // Create admin notification for new order
            $this->Notifications_model->create_admin_notification([
                'order_id' => $order_id,
                'type' => 'new_order',
                'title' => 'New Order Received',
                'message' => 'New order #' . $order->order_number . ' has been placed. Total amount: ₹' . number_format($order->tot_amount, 2) . '. Payment: Razorpay'
            ]);

            $response['success'] = true;
            $response['code'] = 200;
            $response['message'] = 'Payment successful! Order placed successfully.';
            $response['data'] = array('order_id' => $order_id);

        } catch (Exception $e) {
            if (isset($this->db) && $this->db->trans_status() !== FALSE) {
                $this->db->trans_rollback();
            }
            $response['message'] = $e->getMessage();
            log_message('error', 'Razorpay Payment Verification Error: ' . $e->getMessage());
            log_message('error', 'Stack Trace: ' . $e->getTraceAsString());
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }
}