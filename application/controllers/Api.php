<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    /**
     * Get recent notifications for dropdown
     */
    public function notifications_get_recent()
    {
        $user_id = $this->session->userdata('user_id');
        if (!$user_id) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['success' => false, 'message' => 'Not authenticated']));
            return;
        }

        $this->load->model('Notifications_model');
        $notifications = $this->Notifications_model->get_recent_notifications($user_id, 5);
        $unread_count = $this->Notifications_model->get_unread_count($user_id);

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode([
                'success' => true,
                'notifications' => $notifications,
                'unread_count' => $unread_count
            ]));
    }

    /**
     * Mark notification as read
     */
    public function notifications_mark_read()
    {
        $user_id = $this->session->userdata('user_id');
        if (!$user_id) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['success' => false, 'message' => 'Not authenticated']));
            return;
        }

        $notification_id = $this->input->post('notification_id');
        if (!$notification_id) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['success' => false, 'message' => 'Notification ID required']));
            return;
        }

        $this->load->model('Notifications_model');
        $result = $this->Notifications_model->mark_as_read($notification_id, $user_id);

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode(['success' => $result]));
    }

    /**
     * Mark all notifications as read
     */
    public function notifications_mark_all_read()
    {
        $user_id = $this->session->userdata('user_id');
        if (!$user_id) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['success' => false, 'message' => 'Not authenticated']));
            return;
        }

        $this->load->model('Notifications_model');
        $count = $this->Notifications_model->mark_all_as_read($user_id);

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode(['success' => true, 'count' => $count]));
    }

    /**
     * Get cart item count for current user
     */
    public function getCartCount()
    {
        $user_id = $this->session->userdata('user_id');

        if (!$user_id) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    'success' => true,
                    'cartCount' => 0
                ]));
            return;
        }

        $this->load->model('Cart_model');
        $count = $this->Cart_model->cartCount($user_id);

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode([
                'success' => true,
                'cartCount' => (int) $count
            ]));
    }

    /**
     * Add product to cart
     */
    public function addToCart()
    {
        @ob_clean();

        $response = array(
            'status' => 'error',
            'message' => 'Something went wrong!'
        );

        try {
            // Check if user is logged in
            $user_id = $this->session->userdata('user_id');
            if (!$user_id) {
                $response['status'] = 'login';
                $response['message'] = 'Please login to add items to cart';
                $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($response));
                return;
            }

            // Get POST data
            $product_id = $this->input->post('product_id');
            $quantity = $this->input->post('quantity') ?: 1;
            $price = $this->input->post('price');
            $namecake = $this->input->post('namecake');
            $variant_id = $this->input->post('variant_id');
            $weight = $this->input->post('weight');

            if (!$product_id) {
                throw new Exception('Product ID is required');
            }

            // Validate quantity
            $quantity = (int) $quantity;
            if ($quantity < 1) {
                $quantity = 1;
            }

            // Load models
            $this->load->model('Cart_model');
            $this->load->model('Product_model');

            // Use selling_price from database as source of truth
            // If variant_id is provided, get price from variants table
            $selling_price = 0;
            if ($variant_id) {
                $variant = $this->db->where('id', $variant_id)->get('variants')->row();
                if ($variant) {
                    $selling_price = (float) $variant->variant_sellingprice;
                    if ($selling_price <= 0) {
                        $selling_price = (float) $variant->variant_price;
                    }
                }
            }

            // Fallback to product price if no variant price found
            if ($selling_price <= 0) {
                $product = $this->Product_model->get_byId($product_id);
                if (!$product) {
                    throw new Exception('Product not found');
                }
                $selling_price = isset($product->selling_price) ? (float) $product->selling_price : 0;
                if ($selling_price <= 0) {
                    $selling_price = isset($product->price) ? (float) $product->price : 0;
                }
            }

            // If price is provided from frontend, validate it matches (with small tolerance)
            if ($price) {
                $provided_price = (float) $price;
                $tolerance = $selling_price * 0.01;
                if (abs($provided_price - $selling_price) > $tolerance) {
                    log_message('warning', 'Price mismatch for product/variant ' . $product_id . '/' . $variant_id . '. Provided: ' . $provided_price . ', DB: ' . $selling_price);
                }
            }

            // Check if product already exists in cart
            $existing_cart_item = $this->Cart_model->getCartItem($user_id, $product_id);

            if ($existing_cart_item) {
                // Update quantity if product already in cart
                $new_quantity = (int) $existing_cart_item->quantity + $quantity;
                $this->Cart_model->updateCartItem($existing_cart_item->id, $new_quantity);
                $response['status'] = 'success';
                $response['message'] = 'Product already in cart. Quantity updated.';
            } else {
                // Add new product to cart
                $this->Cart_model->addToCart(
                    $user_id,
                    $product_id,
                    $quantity,
                    $selling_price, // Use DB price
                    $namecake,
                    $variant_id,
                    $weight
                );
                $response['status'] = 'success';
                $response['message'] = 'Product added to cart successfully';
            }

        } catch (Exception $e) {
            $response['message'] = $e->getMessage();
            log_message('error', 'Add to cart error: ' . $e->getMessage());
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    /**
     * Add addon to cart
     */
    public function addonToCart()
    {
        @ob_clean();

        $response = array(
            'status' => 'error',
            'message' => 'Something went wrong!'
        );

        try {
            $user_id = $this->session->userdata('user_id');
            if (!$user_id) {
                $response['status'] = 'login';
                $response['message'] = 'Please login to add items to cart';
                $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($response));
                return;
            }

            $parent_id = $this->input->post('parent_id');
            $addon_id = $this->input->post('addon_id');
            $price = $this->input->post('price');

            if (!$parent_id || !$addon_id || !$price) {
                throw new Exception('Missing required parameters');
            }

            $this->load->model('Cart_model');
            $this->Cart_model->addonToCart($user_id, $parent_id, $addon_id, (float) $price);

            $response['status'] = 'success';
            $response['message'] = 'Addon added to cart successfully';

        } catch (Exception $e) {
            $response['message'] = $e->getMessage();
            log_message('error', 'Add addon to cart error: ' . $e->getMessage());
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }
    /**
     * Update cart quantity by product ID
     */
    public function cartQuantitybyid($product_id)
    {
        @ob_clean();

        $response = array(
            'status' => 'error',
            'message' => 'Something went wrong!'
        );

        try {
            $user_id = $this->session->userdata('user_id');
            if (!$user_id) {
                $response['message'] = 'Please login to update cart';
                $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($response));
                return;
            }

            $quantity = $this->input->post('quantity');
            if ($quantity === null) {
                throw new Exception('Quantity is required');
            }

            $this->load->model('Cart_model');

            // Call the updated model method with user_id
            $result = $this->Cart_model->update_CartQuantity($product_id, $quantity, $user_id);

            if ($result) {
                $response['status'] = 'success';
                $response['success'] = true; // For JS backward compatibility
                $response['message'] = 'Quantity updated successfully';
            } else {
                $response['message'] = 'Failed to update quantity or item not found';
            }

        } catch (Exception $e) {
            $response['message'] = $e->getMessage();
            log_message('error', 'Update cart quantity error: ' . $e->getMessage());
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    /**
     * ============================================
     * ADMIN NOTIFICATION API ENDPOINTS
     * ============================================
     */

    /**
     * Get recent admin notifications for dropdown
     */
    public function admin_notifications_get_recent()
    {
        // Check if admin is logged in
        if ($this->session->userdata('usertype') != 'Admin') {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['success' => false, 'message' => 'Not authenticated']));
            return;
        }

        $this->load->model('Notifications_model');
        $notifications = $this->Notifications_model->get_admin_recent_notifications(5);
        $unread_count = $this->Notifications_model->get_admin_unread_count();

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode([
                'success' => true,
                'notifications' => $notifications,
                'unread_count' => $unread_count
            ]));
    }

    /**
     * Mark admin notification as read
     */
    public function admin_notifications_mark_read()
    {
        if ($this->session->userdata('usertype') != 'Admin') {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['success' => false, 'message' => 'Not authenticated']));
            return;
        }

        $notification_id = $this->input->post('notification_id');
        if (!$notification_id) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['success' => false, 'message' => 'Notification ID required']));
            return;
        }

        $this->load->model('Notifications_model');
        $result = $this->Notifications_model->mark_admin_as_read($notification_id);

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode(['success' => $result]));
    }

    /**
     * Mark all admin notifications as read
     */
    public function admin_notifications_mark_all_read()
    {
        if ($this->session->userdata('usertype') != 'Admin') {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['success' => false, 'message' => 'Not authenticated']));
            return;
        }

        $this->load->model('Notifications_model');
        $count = $this->Notifications_model->mark_all_admin_as_read();

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode(['success' => true, 'count' => $count]));
    }
}
