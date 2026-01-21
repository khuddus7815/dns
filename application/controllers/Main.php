<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		$this->output->set_header("Expires: Mon, 26 Jul 2010 05:00:00 GMT");
		$this->load->model('Product_model');
		$this->load->model('Occasions_model');
		$this->load->model('Category_model');
		$this->load->model('Cart_model');
		$this->load->model('Subcategory');
		$this->load->library('form_validation');
		$this->load->model('Order_model');
		$this->load->model('Users_model');
		$this->load->model('Wishlist_model');
		$this->load->model('Banner_model');
		$this->load->model('Product_reviews_model');
	}

	public function index()
	{

		$this->load->model('Delivery_model'); // Load Model
		$data['delivery_charges'] = $this->Delivery_model->get_all_charges(); // Fetch Charges
		$user_id = $this->session->userdata('user_id');
		$cookie_id = $this->input->cookie('remember_me', true);
		if (!$cookie_id) {
			$cookie = array(
				'name' => 'remember_me',
				'value' => uniqid(),
				'expire' => '2147483647',
				'secure' => TRUE
			);
			$this->input->set_cookie($cookie);
		}

		$data['content'] = 'index';
		$data['categories'] = $this->Category_model->get_allcategory();
		// echo "<pre>";
		// print_r($data['categories']);
		// exit;

		$data['subcategories'] = $this->Subcategory->get_allsubcategory();
		// echo "<pre>";
		// print_r($data['subcategories']);
		// exit;
		$data['products'] = $this->Product_model->get_allproduct();
		$data['carts'] = $this->Cart_model->get_allcart($user_id);
		$data['occasions'] = $this->Occasions_model->get_fouroccasions();
		$data['banners'] = $this->Banner_model->get_active_banners();
		$data['latest_reviews'] = $this->Product_reviews_model->get_latest_reviews(5);
		// echo "<pre>";
		// print_r($data['occasions']);
		// exit;
		$this->load->view('template', $data);
	}

	public function category_page($category_name)
	{
		$data['productbycategory'] = $this->Category_model->get_byCategoryName($category_name);
		$data['productforsubcategory'] = $this->Subcategory->get_forProduct($category_name);
		$data['content'] = 'category_page';
		$this->load->view('template', $data);
	}

	public function category_detail($id)
	{
		$data['content'] = 'category_detail';
		$data['details'] = $this->Category_model->get_category_by_id($id);
		$data['categories'] = $this->Category_model->get_allcategory();

		$data['occasions'] = $this->Occasions_model->get_alloccasions();

		$data['products'] = $this->Category_model->get_byCategory($id);
		$data['subcategories'] = $this->Subcategory->get_allsubcategorybyid($id);
		$this->load->view('template', $data);
	}

	public function occasion_detail($id)
	{
		$data['content'] = 'category_detail';
		$data['details'] = $this->Occasions_model->get_occasionbyid($id);
		$data['categories'] = $this->Category_model->get_allcategory();

		$data['occasions'] = $this->Occasions_model->get_alloccasions();

		$data['products'] = $this->Category_model->get_byOccasion($id);
		$data['subcategories'] = $this->Subcategory->get_allsubcategorybyid($id);
		$this->load->view('template', $data);
	}

	public function products($id)
	{
		$data['content'] = 'products';
		$data['products'] = $this->Category_model->get_byCategory($id);
		$data['subcategories'] = $this->Subcategory->get_allsubcategorybyid($id);
		$data['latest_reviews'] = $this->Product_reviews_model->get_latest_reviews(5);
		$this->load->view('template', $data);
	}

	public function product_detail($id)
	{
		$this->load->model('Delivery_model');
		$data['delivery_charges'] = $this->Delivery_model->get_all_charges();
		$data['categories'] = $this->Category_model->get_allcategory();
		$data['subcategories'] = $this->Subcategory->get_allsubcategory();
		$data['occasions'] = $this->Occasions_model->get_alloccasions();
		$category_id = $this->Category_model->get_productcategoryid($id);
		$data['product'] = $this->Product_model->get_byId($id);
		$data['relatedProducts'] = $this->Category_model->get_byCategory($category_id);
		$data['subcategoriesbyid'] = $this->Subcategory->get_allsubcategorybyid($category_id);
		$data['addons'] = $this->Product_model->get_addonsbyCategoryId($category_id);
		$qry = "select * from variants where product_id = ?";
		$res = $this->db->query($qry, [$id]);

		if ($res->num_rows() > 0) {
			$variants = $res->result();
			$product = $data['product'];

			$first_variant_weights = [];
			$first_variant_weights_first_price = 0;
			$first_variant_weights_first_selling_price = 0;

			// Check if it's the new weight-based logic or legacy JSON logic
			if (isset($product->is_weight_status) && $product->is_weight_status == 1) {
				// New logic: variants are individual weight rows
				foreach ($variants as $v) {
					$first_variant_weights[] = $v->package_value;
				}
				$first_variant_weights_first_price = $variants[0]->variant_price;
				$first_variant_weights_first_selling_price = $variants[0]->variant_sellingprice;
			} else {
				// Legacy logic: one row might contain JSON arrays of multiple weights/prices
				$v_price = json_decode($variants[0]->variant_price);
				$v_s_price = json_decode($variants[0]->variant_sellingprice);
				$p_value = json_decode($variants[0]->package_value);

				$first_variant_weights_first_price = is_array($v_price) ? ($v_price[0] ?? 0) : $v_price;
				$first_variant_weights_first_selling_price = is_array($v_s_price) ? ($v_s_price[0] ?? 0) : $v_s_price;

				if (is_array($p_value)) {
					$first_variant_weights = $p_value;
				} else {
					// Fallback if not JSON or empty
					$first_variant_weights = [$variants[0]->package_value];
				}
			}

			$data['first_variant_weights'] = $first_variant_weights;
			$data['first_variant_weights_first_price'] = $first_variant_weights_first_price;
			$data['first_variant_weights_first_selling_price'] = $first_variant_weights_first_selling_price;

			$data['variants'] = $variants;
			$data['content'] = 'products_variant';
		} else {
			$data['content'] = 'product_detail';
		}
		$data['latest_reviews'] = $this->Product_reviews_model->get_latest_reviews(5);
		// print_r(json_encode($data['products']));
		$this->load->view('template', $data);
	}

	public function order_detail($order_id)
	{
		$data['content'] = 'order_detail_page.php';

		$user_id = $this->session->userdata('user_id');
		if (!$user_id) {
			redirect('login');
			return;
		}

		// Get order details (checking user ownership)
		$order = $this->Order_model->get_orderdetailsby_orderid($order_id, $user_id);

		if (!$order) {
			show_404();
			return;
		}

		// Get address
		$address = $this->Users_model->getAddressById($order->address_id);

		if (!$address) {
			show_404();
			return;
		}

		// Get all products for this order
		$order_products_raw = $this->Order_model->get_orderproductsby_orderid($order_id);

		// Process products with pricing
		$order_products = [];
		$subtotal = 0;

		foreach ($order_products_raw as $op) {
			// Selling price from order_product (price column)
			$selling_price = isset($op->price) ? (float) $op->price : 0;

			// Original price from query result (if available) or fallback
			$original_price = 0;
			if (isset($op->original_product_price) && $op->original_product_price > 0) {
				$original_price = (float) $op->original_product_price;
			} else {
				// Fallback: use selling price if no original price available
				$original_price = $selling_price;
			}

			// Calculate discount
			$discount_percent = 0;
			$discount_amount = 0;
			if ($original_price > $selling_price && $original_price > 0) {
				$discount_percent = round((($original_price - $selling_price) / $original_price) * 100);
				$discount_amount = ($original_price - $selling_price) * (int) $op->quantity;
			}

			$item_total = $selling_price * (int) $op->quantity;
			$subtotal += $item_total;

			$is_rated = $this->Product_reviews_model->check_if_rated($user_id, $op->product_id, $order_id);

			$order_products[] = (object) [
				'product_id' => $op->product_id,
				'product_name' => isset($op->product_name) ? $op->product_name : 'Product',
				'product_image' => isset($op->product_img1) ? $op->product_img1 : (isset($op->product_image) ? $op->product_image : ''),
				'quantity' => (int) $op->quantity,
				'selling_price' => $selling_price,
				'original_price' => $original_price,
				'discount_percent' => $discount_percent,
				'discount_amount' => $discount_amount,
				'item_total' => $item_total,
				'variant_weight' => isset($op->variant_weight) ? $op->variant_weight : (isset($op->unit) ? $op->unit : null),
				'is_rated' => $is_rated
			];
		}

		// Get delivery charge and discount from order
		$delivery_charge = isset($order->delivery_charge) ? (float) $order->delivery_charge : 0;
		$order_discount = isset($order->discount_amount) ? (float) $order->discount_amount : 0;
		$coupon_code = isset($order->coupon_code) ? $order->coupon_code : null;

		// Final total
		$final_total = isset($order->tot_amount) ? (float) $order->tot_amount : ($subtotal + $delivery_charge - $order_discount);
		if ($final_total < 0)
			$final_total = 0;

		$data['address'] = $address;
		$data['order'] = $order;
		$data['order_products'] = $order_products;
		$data['subtotal'] = $subtotal;
		$data['delivery_charge'] = $delivery_charge;
		$data['order_discount'] = $order_discount;
		$data['coupon_code'] = $coupon_code;
		$data['final_total'] = $final_total;
		$data['order_id'] = $order_id;
		$data['content'] = 'order_detail_page.php';

		$this->load->view('template', $data);
	}

	public function order_summary()
	{
		$data['content'] = 'order_summary';
		$this->load->view('template', $data);

	}

	public function cart()
	{
		$user_id = $this->session->userdata('user_id');
		if ($user_id) {
			$this->load->model('Delivery_model');
			$data['categories'] = $this->Category_model->get_allcategory();
			$data['subcategories'] = $this->Subcategory->get_allsubcategory();
			$data['occasions'] = $this->Occasions_model->get_alloccasions();

			$data['content'] = 'cart';
			$data['carts'] = $this->Cart_model->get_allcart($user_id);

			$delivery_charges = $this->Delivery_model->get_all_charges();
			$data['delivery_charge'] = !empty($delivery_charges) ? $delivery_charges[0] : (object) ['amount' => 0, 'name' => 'Free'];

			$this->load->view('template', $data);
		} else {
			redirect('login');
		}
	}


	public function wishlist()
	{
		$user_id = $this->session->userdata('user_id');
		if (!$user_id) {
			redirect('login');
		}

		$data['categories'] = $this->Category_model->get_allcategory();
		$data['subcategories'] = $this->Subcategory->get_allsubcategory();
		$data['occasions'] = $this->Occasions_model->get_alloccasions();

		// FETCH REAL DATA
		$data['wishlist_products'] = $this->Wishlist_model->get_wishlist_by_user($user_id);

		$data['content'] = 'wishlist';
		$this->load->view('template', $data);
	}

	public function toggle_wishlist()
	{
		$user_id = $this->session->userdata('user_id');
		if (!$user_id) {
			echo json_encode(['status' => false, 'message' => 'Please login to use wishlist']);
			return;
		}

		$product_id = $this->input->post('product_id');
		$this->load->model('Wishlist_model');

		// Check if already in wishlist
		if ($this->Wishlist_model->is_in_wishlist($user_id, $product_id)) {
			$this->Wishlist_model->remove_from_wishlist($user_id, $product_id);
			echo json_encode(['status' => true, 'action' => 'removed', 'message' => 'Removed from wishlist']);
		} else {
			$this->Wishlist_model->add_to_wishlist($user_id, $product_id);
			echo json_encode(['status' => true, 'action' => 'added', 'message' => 'Added to wishlist']);
		}
	}

	public function check_wishlist_status()
	{
		$user_id = $this->session->userdata('user_id');
		if (!$user_id) {
			echo json_encode(['in_wishlist' => false]);
			return;
		}

		$product_id = $this->input->post('product_id');
		$this->load->model('Wishlist_model');

		$in_wishlist = $this->Wishlist_model->is_in_wishlist($user_id, $product_id);
		echo json_encode(['in_wishlist' => $in_wishlist]);
	}
	public function contact()
	{
		$data['categories'] = $this->Category_model->get_allcategory();
		$data['subcategories'] = $this->Subcategory->get_allsubcategory();
		$data['occasions'] = $this->Occasions_model->get_alloccasions();
		$data['content'] = 'contact';
		$this->load->view('template', $data);
	}

	public function checkout()
	{
		$user_id = $this->session->userdata('user_id');
		if (!$user_id) {
			redirect('login');
		}
		$this->load->model('Settings_model');
		$data['categories'] = $this->Category_model->get_allcategory();
		$data['subcategories'] = $this->Subcategory->get_allsubcategory();
		$data['occasions'] = $this->Occasions_model->get_alloccasions();
		$this->load->model('Delivery_model'); // Load Model
		$data['delivery_charges'] = $this->Delivery_model->get_all_charges(); // Fetch Charges
		$data['addresses'] = $this->db->query("select * from users_address where user_id = ?", [$this->session->userdata('user_id')])->result();
		$data['content'] = 'checkout';
		$data['carts'] = $this->Cart_model->get_allcart($user_id);

		// Load Razorpay settings
		$razorpay_settings = $this->Settings_model->get_razorpay_settings();
		$data['razorpay_enabled'] = $this->Settings_model->is_razorpay_configured();
		$data['razorpay_key_id'] = isset($razorpay_settings['razorpay_key_id']) ? $razorpay_settings['razorpay_key_id'] : '';

		// Load Wallet balance
		$this->load->model('Wallet_model');
		$data['wallet_balance'] = $this->Wallet_model->get_balance($user_id);

		// echo "<pre>";
		// print_r($data);exit;
		$this->load->view('template', $data);
	}

	// Helper function to get state ID from state name
	private function get_state_id($state_name)
	{
		$state_map = array(
			'Andhra Pradesh' => 1,
			'Arunachal Pradesh' => 2,
			'Assam' => 3,
			'Bihar' => 4,
			'Chhattisgarh' => 5,
			'Goa' => 6,
			'Gujarat' => 7,
			'Haryana' => 8,
			'Himachal Pradesh' => 9,
			'Jharkhand' => 10,
			'Karnataka' => 11,
			'Kerala' => 12,
			'Madhya Pradesh' => 13,
			'Maharashtra' => 14,
			'Manipur' => 15,
			'Meghalaya' => 16,
			'Mizoram' => 17,
			'Nagaland' => 18,
			'Odisha' => 19,
			'Punjab' => 20,
			'Rajasthan' => 21,
			'Sikkim' => 22,
			'Tamil Nadu' => 23,
			'Telangana' => 24,
			'Tripura' => 25,
			'Uttar Pradesh' => 26,
			'Uttarakhand' => 27,
			'West Bengal' => 28,
			'Andaman and Nicobar Islands' => 29,
			'Chandigarh' => 30,
			'Dadra and Nagar Haveli and Daman and Diu' => 31,
			'Delhi' => 32,
			'Jammu and Kashmir' => 33,
			'Ladakh' => 34,
			'Lakshadweep' => 35,
			'Puducherry' => 36
		);

		// If state_name is already a number, return it as is
		if (is_numeric($state_name)) {
			return (int) $state_name;
		}

		// Otherwise, look up the ID from the map
		return isset($state_map[trim($state_name)]) ? $state_map[trim($state_name)] : $state_name;
	}

	// Helper function to get state name from state ID
	private function get_state_name($state_id)
	{
		$state_map = array(
			1 => 'Andhra Pradesh',
			2 => 'Arunachal Pradesh',
			3 => 'Assam',
			4 => 'Bihar',
			5 => 'Chhattisgarh',
			6 => 'Goa',
			7 => 'Gujarat',
			8 => 'Haryana',
			9 => 'Himachal Pradesh',
			10 => 'Jharkhand',
			11 => 'Karnataka',
			12 => 'Kerala',
			13 => 'Madhya Pradesh',
			14 => 'Maharashtra',
			15 => 'Manipur',
			16 => 'Meghalaya',
			17 => 'Mizoram',
			18 => 'Nagaland',
			19 => 'Odisha',
			20 => 'Punjab',
			21 => 'Rajasthan',
			22 => 'Sikkim',
			23 => 'Tamil Nadu',
			24 => 'Telangana',
			25 => 'Tripura',
			26 => 'Uttar Pradesh',
			27 => 'Uttarakhand',
			28 => 'West Bengal',
			29 => 'Andaman and Nicobar Islands',
			30 => 'Chandigarh',
			31 => 'Dadra and Nagar Haveli and Daman and Diu',
			32 => 'Delhi',
			33 => 'Jammu and Kashmir',
			34 => 'Ladakh',
			35 => 'Lakshadweep',
			36 => 'Puducherry'
		);

		return isset($state_map[(int) $state_id]) ? $state_map[(int) $state_id] : $state_id;
	}

	// Helper function to get all states as array
	public function get_all_states()
	{
		return array(
			1 => 'Andhra Pradesh',
			2 => 'Arunachal Pradesh',
			3 => 'Assam',
			4 => 'Bihar',
			5 => 'Chhattisgarh',
			6 => 'Goa',
			7 => 'Gujarat',
			8 => 'Haryana',
			9 => 'Himachal Pradesh',
			10 => 'Jharkhand',
			11 => 'Karnataka',
			12 => 'Kerala',
			13 => 'Madhya Pradesh',
			14 => 'Maharashtra',
			15 => 'Manipur',
			16 => 'Meghalaya',
			17 => 'Mizoram',
			18 => 'Nagaland',
			19 => 'Odisha',
			20 => 'Punjab',
			21 => 'Rajasthan',
			22 => 'Sikkim',
			23 => 'Tamil Nadu',
			24 => 'Telangana',
			25 => 'Tripura',
			26 => 'Uttar Pradesh',
			27 => 'Uttarakhand',
			28 => 'West Bengal',
			29 => 'Andaman and Nicobar Islands',
			30 => 'Chandigarh',
			31 => 'Dadra and Nagar Haveli and Daman and Diu',
			32 => 'Delhi',
			33 => 'Jammu and Kashmir',
			34 => 'Ladakh',
			35 => 'Lakshadweep',
			36 => 'Puducherry'
		);
	}

	public function update_address()
	{
		// Disable output buffering and set JSON header
		@ob_clean();

		// Check if this is a POST request
		if ($this->input->server('REQUEST_METHOD') !== 'POST') {
			$this->output
				->set_content_type('application/json')
				->set_status_header(405)
				->set_output(json_encode(array('success' => false, 'code' => 405, 'message' => 'Method not allowed. POST required.')));
			$this->output->_display();
			exit;
		}

		$response = array('success' => false, 'code' => 400, 'message' => 'Something went wrong', 'data' => '', 'errors' => []);
		try {
			// Check if user is logged in
			$user_id = $this->session->userdata('user_id');
			if (!$user_id) {
				$response['code'] = 401;
				throw new Exception('User not logged in. Please login and try again.');
			}

			$address_id = $this->input->post('address_id');

			// Debug: Log received data
			log_message('debug', 'Update Address - Address ID: ' . $address_id . ', User ID: ' . $user_id);
			// $orders=$this->Order_model->get_ordersbyAddressId($address_id);
			// if($orders==true){
			//	$response['message'] = 'Address is in use';
			//      $response['code'] = 409; // Conflict
			//      throw new Exception($response['message']);
			// }

			$this->form_validation->set_rules('fullname', 'name', 'required');
			$this->form_validation->set_rules('mobile', 'Mobile', 'required');
			$this->form_validation->set_rules('address', 'address', 'required');
			$this->form_validation->set_rules('pincode', 'Pincode', 'required');
			$this->form_validation->set_rules('locality', 'Locality', 'required');
			$this->form_validation->set_rules('city', 'City/Dist/Town', 'required');
			$this->form_validation->set_rules('state', 'state', 'required');

			if ($this->form_validation->run() == FALSE) {
				$validation_errors = $this->form_validation->error_array();
				$response['errors'] = $validation_errors;
				$response['code'] = 422;
				throw new Exception('Validation failed');
			}
			// Convert state name to state ID
			$state_input = $this->input->post('state');
			$state_id_value = $this->get_state_id($state_input);

			$data = array(
				'user_id' => $user_id,
				'fullname' => $this->input->post('fullname'),
				'phone' => $this->input->post('mobile'),
				'alt_phone' => $this->input->post('altPhone', true),
				'locality' => $this->input->post('locality', true),
				'city_twn' => $this->input->post('city', true),
				'landmark' => $this->input->post('landmark', true),
				'pincode' => $this->input->post('pincode'),
				'address' => $this->input->post('address'),
				'state_id' => $state_id_value,
			);


			if (empty($address_id)) {
				throw new Exception('Address ID is required');
			}

			// Verify address belongs to user and get current data
			$this->db->reset_query();
			$this->db->where('id', $address_id);
			$this->db->where('user_id', $user_id);
			$address_check = $this->db->get('users_address')->row();
			if (!$address_check) {
				throw new Exception('Address not found or you do not have permission to update it');
			}

			// Check if data has actually changed - compare without normalization first
			$has_changes = false;
			$changes_detected = array();

			// Direct field mapping
			$field_mapping = array(
				'fullname' => 'fullname',
				'phone' => 'phone',
				'locality' => 'locality',
				'city_twn' => 'city_twn',
				'pincode' => 'pincode',
				'address' => 'address',
				'state_id' => 'state_id'
			);

			foreach ($field_mapping as $data_key => $db_field) {
				// For state_id, compare as integers
				if ($db_field == 'state_id') {
					$new_value = isset($data[$data_key]) ? (int) $data[$data_key] : 0;
					$old_value = isset($address_check->$db_field) ? (int) $address_check->$db_field : 0;
				} else {
					$new_value = isset($data[$data_key]) ? (string) $data[$data_key] : '';
					$old_value = isset($address_check->$db_field) ? (string) $address_check->$db_field : '';
					// Compare trimmed values for text fields
					$new_value = trim($new_value);
					$old_value = trim($old_value);
				}

				if ($new_value !== $old_value) {
					$has_changes = true;
					$changes_detected[$db_field] = array(
						'old' => $old_value,
						'new' => $new_value
					);
				}
			}

			log_message('debug', 'Address update check - Has changes: ' . ($has_changes ? 'YES' : 'NO'));
			if (!empty($changes_detected)) {
				log_message('debug', 'Changes detected: ' . json_encode($changes_detected));
			}

			// If no changes, return success (data is already up to date)
			if (!$has_changes) {
				$response['success'] = true;
				$response['code'] = 200;
				$response['message'] = 'Address is already up to date';
				$this->session->set_flashdata("success", "Address is already up to date");
			} else {
				// Perform the update - reset query builder first to ensure clean state
				$this->db->reset_query();

				// Log the update attempt
				log_message('debug', 'Updating address - ID: ' . $address_id . ', User ID: ' . $user_id);
				log_message('debug', 'Update data: ' . json_encode($data));

				$this->db->where('id', $address_id);
				$this->db->where('user_id', $user_id);
				$update_result = $this->db->update('users_address', $data);

				// Get affected rows and error info
				$affected_rows = $this->db->affected_rows();
				$db_error = $this->db->error();

				log_message('debug', 'Update result: ' . ($update_result ? 'true' : 'false') . ', Affected rows: ' . $affected_rows);

				if (!$update_result) {
					$error_msg = "Error Processing Request: Address could not be updated.";
					if (!empty($db_error['message'])) {
						$error_msg .= " Database error: " . $db_error['message'];
					}
					if (!empty($db_error['code'])) {
						$error_msg .= " Error code: " . $db_error['code'];
					}
					log_message('error', 'Update address failed: ' . $error_msg);
					throw new Exception($error_msg);
				}

				// If update query succeeded, check affected rows
				// In MySQL, affected_rows can be 0 if new values match existing values exactly
				// Since we already verified changes exist, if affected_rows is 0, try direct SQL as fallback
				if ($affected_rows == 0) {
					log_message('debug', 'Query builder update returned 0 affected rows, trying direct SQL...');
					// Verify the address still exists
					$this->db->reset_query();
					$this->db->where('id', $address_id);
					$this->db->where('user_id', $user_id);
					$verify = $this->db->get('users_address')->row();

					if (!$verify) {
						log_message('error', 'Address not found after update attempt - ID: ' . $address_id);
						throw new Exception("Address not found. It may have been deleted.");
					}

					// Address exists - try direct SQL query as fallback
					$this->db->reset_query();
					$sql = "UPDATE users_address SET fullname=?, phone=?, locality=?, city_twn=?, pincode=?, address=?, state_id=? WHERE id=? AND user_id=?";
					$update_direct = $this->db->query($sql, array(
						$data['fullname'],
						$data['phone'],
						$data['locality'],
						$data['city_twn'],
						$data['pincode'],
						$data['address'],
						$data['state_id'],
						$address_id,
						$user_id
					));

					$direct_affected = $this->db->affected_rows();
					$direct_error = $this->db->error();

					log_message('debug', 'Direct query - Affected rows: ' . $direct_affected);
					if (!empty($direct_error['message'])) {
						log_message('error', 'Direct query error: ' . $direct_error['message']);
					}

					// If direct query executed without errors, treat as success
					// Even if affected_rows is 0, the query succeeded which means the WHERE clause matched
					// This can happen if data is identical (edge case) or if MySQL reports 0 for other reasons
					if ($update_direct && empty($direct_error['message'])) {
						log_message('debug', 'Direct SQL query executed successfully - treating as success');
						// Continue to success response below
					} else if ($direct_affected == 0) {
						// Query executed but 0 rows - verify if data actually differs
						$all_match = true;
						foreach ($data as $key => $value) {
							if (isset($verify->$key) && trim((string) $verify->$key) !== trim((string) $value)) {
								$all_match = false;
								break;
							}
						}

						if ($all_match) {
							// Data is actually identical - treat as success
							log_message('debug', 'Data is identical after all - treating as success');
						} else {
							// Data differs but update returned 0 - log for investigation but still treat as success
							// since the query executed successfully
							log_message('warning', 'Update returned 0 rows but data differs. ID: ' . $address_id);
							log_message('warning', 'DB values: ' . json_encode($verify));
							log_message('warning', 'New values: ' . json_encode($data));
							// Still treat as success since query executed
						}
					} else {
						// Direct query had an error
						$error_msg = "Database error during update.";
						if (!empty($direct_error['message'])) {
							$error_msg .= " " . $direct_error['message'];
						}
						throw new Exception($error_msg);
					}
				}

				$response['success'] = true;
				$response['code'] = 200;
				$response['message'] = 'Address updated successfully';
				$this->session->set_flashdata("success", "address updated successfully");
			}
			// redirect('main/checkout');
		} catch (Exception $e) {
			$response['message'] = $e->getMessage();
			$this->session->set_flashdata("error", $e->getMessage());
			log_message('error', 'Update Address Error: ' . $e->getMessage());
		}

		// Set proper headers and output JSON response
		$this->output
			->set_content_type('application/json')
			->set_status_header($response['code'])
			->set_output(json_encode($response));
		$this->output->_display();
		exit; // Prevent any additional output
	}

	public function update_contact_info()
	{
		$response = array(
			'success' => false,
			'code' => 400,
			'message' => 'Something went wrong',
			'data' => '',
			'errors' => []
		);

		try {
			// Set form validation rules
			$this->form_validation->set_rules('phone_number', 'Phone Number', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');

			if ($this->form_validation->run() == FALSE) {
				// Validation failed, return errors
				$validation_errors = $this->form_validation->error_array();
				$response['errors'] = $validation_errors;
				$response['code'] = 422;
				throw new Exception('Validation failed');
			}

			// Get user input
			$phone_number = $this->input->post('phone_number');
			$email = $this->input->post('email');

			// Prepare data for updating
			$data = array(
				'mobile' => $phone_number,
				'email' => $email
			);

			// Get the user ID from session
			$user_id = $this->session->userdata('user_id');

			if (empty($user_id)) {
				throw new Exception('User ID is required');
			}

			// Update the user's contact information in the database
			$this->db->where('id', $user_id);
			$update = $this->db->update('users', $data);

			if (!$update) {
				throw new Exception('Error processing request: Contact information could not be updated');
			}

			$response['success'] = true;
			$response['code'] = 200;
			$response['message'] = 'Contact information updated successfully';
			$this->session->set_flashdata("success", "Contact info updated successfully");
		} catch (Exception $e) {
			$response['message'] = $e->getMessage();
			$this->session->set_flashdata("error", $e->getMessage());
		}

		// Return JSON response
		$this->output
			->set_content_type('application/json')
			->set_status_header($response['code'])
			->set_output(json_encode($response));
	}


	public function update_user_details()
	{
		$response = array(
			'success' => false,
			'code' => 400,
			'message' => 'Something went wrong',
			'data' => '',
			'errors' => []
		);

		try {
			// Set form validation rules
			$this->form_validation->set_rules('dob', 'Date of Birth', 'required'); // Ensure valid_date is a custom validation rule if needed
			$this->form_validation->set_rules('gender', 'Gender', 'required|in_list[Male,Female,Other]');

			if ($this->form_validation->run() == FALSE) {
				// Validation failed, return errors
				$validation_errors = $this->form_validation->error_array();
				$response['errors'] = $validation_errors;
				$response['code'] = 422;
				throw new Exception('Validation failed');
			}

			// Get user input
			$dob = $this->input->post('dob');
			$gender = $this->input->post('gender');

			// Prepare data for updating
			$data = array(
				'dob' => $dob,
				'gender' => $gender
			);

			// Get the user ID from session
			$user_id = $this->session->userdata('user_id');

			if (empty($user_id)) {
				throw new Exception('User ID is required');
			}

			// Update the user's details in the database
			$this->db->where('user_id', $user_id);
			$update = $this->db->update('users_detail', $data);

			if (!$update) {
				throw new Exception('Error processing request: User details could not be updated');
			}

			$response['success'] = true;
			$response['code'] = 200;
			$response['message'] = 'User details updated successfully';
			$this->session->set_flashdata("success", "user info updated successfully");
		} catch (Exception $e) {
			$response['message'] = $e->getMessage();
			$this->session->set_flashdata("error", $e->getMessage());
		}

		// Return JSON response
		$this->output
			->set_content_type('application/json')
			->set_status_header($response['code'])
			->set_output(json_encode($response));
	}



	public function upload_image()
	{
		$response = array(
			'success' => false,
			'code' => 400,
			'message' => 'Something went wrong',
			'data' => '',
			'errors' => []
		);

		try {
			// Check if an image is uploaded
			if (empty($_FILES['userImage']['name'])) {
				$response['message'] = 'No image uploaded';
				$response['code'] = 422;
				throw new Exception('Image upload failed');
			}

			// Load the upload library and configure it
			$config['upload_path'] = './upload/profileimg/'; // Update the path accordingly
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['max_size'] = 2048; // 2MB limit
			$config['file_name'] = uniqid() . '_' . $_FILES['userImage']['name'];

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('userImage')) {
				// Upload failed, return errors
				$response['errors'] = $this->upload->display_errors();
				$response['code'] = 422;
				throw new Exception('Image upload failed');
			} else {
				// Upload successful, get the uploaded file data
				$uploadData = $this->upload->data();
				$fileName = $uploadData['file_name']; // Get only the file name

				// Update the user's profile image in the database
				$data = array('user_image' => $fileName); // Store only the filename
				$user_id = $this->session->userdata('user_id');

				$this->db->where('user_id', $user_id);
				$update = $this->db->update('users_detail', $data);

				if (!$update) {
					throw new Exception('Failed to update profile image in the database');
				}

				$response['success'] = true;
				$response['code'] = 200;
				$response['message'] = 'Image uploaded successfully';
				$response['imagePath'] = base_url('upload/profileimg/' . $fileName); // Update this if you still need to use it
				$this->session->set_flashdata("success", "user image uploaded successfully");
			}
		} catch (Exception $e) {
			$response['message'] = $e->getMessage();
			$this->session->set_flashdata("error", $e->getMessage());
		}

		// Return the response as JSON
		$this->output
			->set_content_type('application/json')
			->set_status_header($response['code'])
			->set_output(json_encode($response));
	}



	// public function delete_address() {

	// 		$response = array('success' => false,'code' => 400,'message' => 'Something went wrong','data'=>'','errors'=>[]);
	// 		$id = $this->input->post('id');
	// 		$orders=$this->Order_model->get_ordersbyAddressId($id);
	// 		if($orders==true){
	// 			$response['message'] = 'Address is in use';
	//         $response['code'] = 409; // Conflict
	//         throw new Exception($response['message']);
	// 		}

	// 	if ($this->Users_model->delete_address_by_id($id)) {  // Implement this method in your model
	// 		echo json_encode(['success' => true]);
	// 	} else {
	// 		echo json_encode(['success' => false, 'message' => 'Failed to delete address.']);
	// 	}
	// }

	public function delete_address()
	{
		$response = array(
			'success' => false,
			'code' => 400,
			'message' => 'Something went wrong',
			'data' => '',
			'errors' => []
		);

		try {
			// Get address ID from POST request
			$id = $this->input->post('id');
			//	if (empty($id)) {
			//		throw new Exception('Address ID is required');
			//	}

			//	// Check if any orders are associated with this address ID
			//	$orders = $this->Order_model->get_ordersbyAddressId($id);
			//	if ($orders) {
			//		// If orders exist, return an error message
			//		$response['message'] = 'Address cannot be deleted because it is in use by existing orders.';
			//		$response['code'] = 409; // Conflict
			//	throw new Exception($response['message']);
			//		throw new Exception($response['message']);
			//	}

			// Attempt to delete the address
			if ($this->Users_model->delete_address_by_id($id)) {
				$response['success'] = true;
				$response['code'] = 200;
				$response['message'] = 'Address deleted successfully';
				$this->session->set_flashdata("success", "Address deleted successfully");
			} else {
				throw new Exception('Failed to delete address');
			}
		} catch (Exception $e) {
			$response['message'] = $e->getMessage();
			$this->session->set_flashdata("error", $e->getMessage());
		}

		// Return JSON response
		$this->output
			->set_content_type('application/json')
			->set_status_header($response['code'])
			->set_output(json_encode($response));
	}



	public function about_us()
	{
		$data['content'] = 'about_us';
		$this->load->view('template', $data);
	}

	public function forgot_password()
	{
		$data['categories'] = $this->Category_model->get_allcategory();
		$data['subcategories'] = $this->Subcategory->get_allsubcategory();
		$data['occasions'] = $this->Occasions_model->get_alloccasions();

		$data['content'] = 'forgot_password';
		$this->load->view('template', $data);
	}

	// 1. Profile Information Page
	public function profile()
	{
		$user_id = $this->session->userdata('user_id');
		if (!$user_id)
			redirect('login');

		$data['content'] = 'profile_info';
		$data['active_tab'] = 'profile';

		// --- REQUIRED FOR HEADER (Prevents Blank Screen) ---
		$data['categories'] = $this->Category_model->get_allcategory();
		$data['subcategories'] = $this->Subcategory->get_allsubcategory();
		$data['occasions'] = $this->Occasions_model->get_alloccasions();
		// ---------------------------------------------------

		$data['details'] = $this->Users_model->get_userbyid($user_id);

		$this->load->view('template', $data);
	}

	// 2. Address Management Page
	public function addresses()
	{
		$user_id = $this->session->userdata('user_id');
		if (!$user_id)
			redirect('login');

		$data['content'] = 'my_address';
		$data['active_tab'] = 'address';

		// --- REQUIRED FOR HEADER ---
		$data['categories'] = $this->Category_model->get_allcategory();
		$data['subcategories'] = $this->Subcategory->get_allsubcategory();
		$data['occasions'] = $this->Occasions_model->get_alloccasions();
		// ---------------------------

		$data['user_address'] = $this->Users_model->get_user_address($user_id);

		$this->load->view('template', $data);
	}

	// 3. My Bookings Page
	public function bookings()
	{
		$user_id = $this->session->userdata('user_id');
		if (!$user_id)
			redirect('login');

		$data['content'] = 'my_bookings';
		$data['active_tab'] = 'booking';

		// --- REQUIRED FOR HEADER ---
		$data['categories'] = $this->Category_model->get_allcategory();
		$data['subcategories'] = $this->Subcategory->get_allsubcategory();
		$data['occasions'] = $this->Occasions_model->get_alloccasions();
		// ---------------------------

		// FIX 1: Fetch User Details so the Sidebar Image shows up
		$data['details'] = $this->Users_model->get_userbyid($user_id);

		// Fetch orders with all details including delivery charges and discounts
		$raw_orders = $this->Order_model->get_orderlistByUserId($user_id);

		$grouped_orders = [];
		if (!empty($raw_orders)) {
			foreach ($raw_orders as $order) {
				// Get order products
				$order_products = [];
				if (!empty($order->order_product)) {
					foreach ($order->order_product as $product) {
						// Get original product price for discount calculation
						// Use original_product_price from join if available, otherwise fetch
						$original_price = 0;
						$selling_price = (float) $product->price; // This is the selling price from order_product

						if (isset($product->original_product_price) && $product->original_product_price > 0) {
							$original_price = (float) $product->original_product_price;
						} else {
							// Fallback: fetch from product table
							$this->load->model('Product_model');
							$product_details = $this->Product_model->get_byId($product->product_id);
							if ($product_details && isset($product_details->price)) {
								$original_price = (float) $product_details->price;
							} else {
								$original_price = $selling_price; // If no original price, use selling price
							}
						}

						// Calculate discount
						$discount_percent = 0;
						$discount_amount = 0;
						if ($original_price > $selling_price && $original_price > 0) {
							$discount_percent = round((($original_price - $selling_price) / $original_price) * 100);
							$discount_amount = ($original_price - $selling_price) * $product->quantity;
						}

						$is_rated = $this->Product_reviews_model->check_if_rated($user_id, $product->product_id, $order->id);

						$order_products[] = (object) [
							'product_id' => $product->product_id,
							'product_name' => $product->product_name,
							'product_image' => $product->product_image,
							'quantity' => (int) $product->quantity,
							'variant_weight' => isset($product->variant_weight) ? $product->variant_weight : null,
							'selling_price' => $selling_price,
							'original_price' => $original_price,
							'discount_percent' => $discount_percent,
							'discount_amount' => $discount_amount,
							'item_total' => $selling_price * (int) $product->quantity,
							'is_rated' => $is_rated
						];
					}
				}

				// Calculate order totals from products
				$subtotal = 0;
				foreach ($order_products as $prod) {
					$subtotal += $prod->item_total;
				}

				// Get delivery charge and discount from order (with fallback)
				$delivery_charge = 0;
				if (isset($order->delivery_charge)) {
					$delivery_charge = (float) $order->delivery_charge;
				}

				$order_discount = 0;
				if (isset($order->discount_amount)) {
					$order_discount = (float) $order->discount_amount;
				}

				$coupon_code = isset($order->coupon_code) ? $order->coupon_code : null;

				// Final total - use order tot_amount if available, otherwise calculate
				$final_total = isset($order->tot_amount) ? (float) $order->tot_amount : ($subtotal + $delivery_charge - $order_discount);
				if ($final_total < 0)
					$final_total = 0;

				$grouped_orders[] = (object) [
					'id' => $order->id,
					'order_number' => isset($order->order_number) ? $order->order_number : 'N/A',
					'status' => isset($order->status) ? $order->status : 1,
					'payment_mode' => isset($order->payment_mode) ? $order->payment_mode : 'COD',
					'tot_amount' => $final_total,
					'subtotal' => $subtotal,
					'delivery_charge' => $delivery_charge,
					'discount_amount' => $order_discount,
					'coupon_code' => $coupon_code,
					'created_at' => isset($order->created_at) ? $order->created_at : date('Y-m-d H:i:s'),
					'products' => $order_products
				];
			}
		}

		$data['orders'] = $grouped_orders;

		$this->load->view('template', $data);
	}
	// 4. My Wallet Page
	public function wallet()
	{
		$user_id = $this->session->userdata('user_id');
		if (!$user_id)
			redirect('login');

		$data['content'] = 'my_wallet';
		$data['active_tab'] = 'wallet';

		// --- REQUIRED FOR HEADER ---
		$data['categories'] = $this->Category_model->get_allcategory();
		$data['subcategories'] = $this->Subcategory->get_allsubcategory();
		$data['occasions'] = $this->Occasions_model->get_alloccasions();
		// ---------------------------

		// Load Wallet Model and get real balance
		$this->load->model('Wallet_model');

		// Recalculate balance to ensure accuracy
		$this->Wallet_model->recalculate_balance($user_id);

		$data['wallet_balance'] = $this->Wallet_model->get_balance($user_id);
		$data['transactions'] = $this->Wallet_model->get_transactions($user_id, 20);
		$data['transaction_stats'] = $this->Wallet_model->get_transaction_stats($user_id);

		// Get Razorpay settings for wallet top-up
		$this->load->model('Settings_model');
		$razorpay_settings = $this->Settings_model->get_razorpay_settings();
		$data['razorpay_enabled'] = !empty($razorpay_settings['razorpay_key_id']);
		$data['razorpay_key_id'] = $razorpay_settings['razorpay_key_id'] ?? '';

		$this->load->view('template', $data);
	}

	// SPA Profile Container - Main entry point
	public function profile_spa()
	{
		$user_id = $this->session->userdata('user_id');
		if (!$user_id)
			redirect('login');

		$data['content'] = 'profile_spa';
		$data['active_tab'] = 'profile';

		// --- REQUIRED FOR HEADER ---
		$data['categories'] = $this->Category_model->get_allcategory();
		$data['subcategories'] = $this->Subcategory->get_allsubcategory();
		$data['occasions'] = $this->Occasions_model->get_alloccasions();
		// ---------------------------

		$data['details'] = $this->Users_model->get_userbyid($user_id);

		$this->load->view('template', $data);
	}

	// AJAX Endpoint: Load Profile Section
	public function load_profile_section()
	{
		@ob_clean(); // Clear output buffer

		$user_id = $this->session->userdata('user_id');
		if (!$user_id) {
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode(['success' => false, 'message' => 'Not authenticated']));
			return;
		}

		$section = $this->input->post('section') ?: $this->input->get('section');

		if (!$section) {
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode(['success' => false, 'message' => 'Section not specified']));
			return;
		}

		$data = [];
		$view_name = '';

		switch ($section) {
			case 'profile':
				$data['details'] = $this->Users_model->get_userbyid($user_id);
				$view_name = 'profile_partials/profile_section';
				break;

			case 'address':
				$data['user_address'] = $this->Users_model->get_user_address($user_id);
				$data['states'] = $this->get_all_states();
				$view_name = 'profile_partials/address_section';
				break;

			case 'booking':
				$data['details'] = $this->Users_model->get_userbyid($user_id);
				$raw_orders = $this->Order_model->get_orderlistByUserId($user_id);

				$grouped_orders = [];
				if (!empty($raw_orders)) {
					foreach ($raw_orders as $order) {
						$order_products = [];
						if (!empty($order->order_product)) {
							foreach ($order->order_product as $product) {
								$original_price = 0;
								$selling_price = (float) $product->price;

								if (isset($product->original_product_price) && $product->original_product_price > 0) {
									$original_price = (float) $product->original_product_price;
								} else {
									$this->load->model('Product_model');
									$product_details = $this->Product_model->get_byId($product->product_id);
									if ($product_details && isset($product_details->price)) {
										$original_price = (float) $product_details->price;
									} else {
										$original_price = $selling_price;
									}
								}

								$discount_percent = 0;
								$discount_amount = 0;
								if ($original_price > $selling_price && $original_price > 0) {
									$discount_percent = round((($original_price - $selling_price) / $original_price) * 100);
									$discount_amount = ($original_price - $selling_price) * $product->quantity;
								}

								$is_rated = $this->Product_reviews_model->check_if_rated($user_id, $product->product_id, $order->id);

								$order_products[] = (object) [
									'product_id' => $product->product_id,
									'product_name' => $product->product_name,
									'product_image' => $product->product_image,
									'quantity' => (int) $product->quantity,
									'variant_weight' => isset($product->variant_weight) ? $product->variant_weight : null,
									'selling_price' => $selling_price,
									'original_price' => $original_price,
									'discount_percent' => $discount_percent,
									'discount_amount' => $discount_amount,
									'item_total' => $selling_price * (int) $product->quantity,
									'is_rated' => $is_rated
								];
							}
						}

						$subtotal = 0;
						foreach ($order_products as $prod) {
							$subtotal += $prod->item_total;
						}

						$delivery_charge = isset($order->delivery_charge) ? (float) $order->delivery_charge : 0;
						$order_discount = isset($order->discount_amount) ? (float) $order->discount_amount : 0;
						$coupon_code = isset($order->coupon_code) ? $order->coupon_code : null;
						$final_total = isset($order->tot_amount) ? (float) $order->tot_amount : ($subtotal + $delivery_charge - $order_discount);
						if ($final_total < 0)
							$final_total = 0;

						$grouped_orders[] = (object) [
							'id' => $order->id,
							'order_number' => isset($order->order_number) ? $order->order_number : 'N/A',
							'status' => isset($order->status) ? $order->status : 1,
							'payment_mode' => isset($order->payment_mode) ? $order->payment_mode : 'COD',
							'tot_amount' => $final_total,
							'subtotal' => $subtotal,
							'delivery_charge' => $delivery_charge,
							'discount_amount' => $order_discount,
							'coupon_code' => $coupon_code,
							'created_at' => isset($order->created_at) ? $order->created_at : date('Y-m-d H:i:s'),
							'products' => $order_products
						];
					}
				}
				$data['orders'] = $grouped_orders;
				$view_name = 'profile_partials/booking_section';
				break;

			case 'wallet':
				$this->load->model('Wallet_model');

				// Recalculate balance to ensure accuracy
				$this->Wallet_model->recalculate_balance($user_id);

				$data['wallet_balance'] = $this->Wallet_model->get_balance($user_id);
				$data['transactions'] = $this->Wallet_model->get_transactions($user_id, 20);
				$data['transaction_stats'] = $this->Wallet_model->get_transaction_stats($user_id);

				// Get Razorpay settings for wallet top-up
				$this->load->model('Settings_model');
				$razorpay_settings = $this->Settings_model->get_razorpay_settings();
				$data['razorpay_enabled'] = !empty($razorpay_settings['razorpay_key_id']);
				$data['razorpay_key_id'] = $razorpay_settings['razorpay_key_id'] ?? '';

				$view_name = 'profile_partials/wallet_section';
				break;

			default:
				$this->output
					->set_content_type('application/json')
					->set_output(json_encode(['success' => false, 'message' => 'Invalid section']));
				return;
		}

		try {
			// Return HTML content
			$html = $this->load->view($view_name, $data, true);

			$this->output
				->set_content_type('application/json')
				->set_output(json_encode(['success' => true, 'html' => $html, 'section' => $section]));
		} catch (Exception $e) {
			log_message('error', 'Error loading profile section: ' . $e->getMessage());
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode(['success' => false, 'message' => $e->getMessage()]));
		}
	}

	public function submit_review()
	{
		$this->output->set_content_type('application/json');

		try {
			$user_id = $this->session->userdata('user_id');
			if (!$user_id) {
				throw new Exception('Please login to submit a review');
			}

			$product_id = $this->input->post('product_id');
			$order_id = $this->input->post('order_id');
			$rating = $this->input->post('rating');
			$review = $this->input->post('review');

			if (!$product_id || !$order_id || !$rating) {
				throw new Exception('Required fields missing');
			}

			// Check if already rated
			if ($this->Product_reviews_model->check_if_rated($user_id, $product_id, $order_id)) {
				throw new Exception('You have already rated this product for this order');
			}

			$data = [
				'user_id' => $user_id,
				'product_id' => $product_id,
				'order_id' => $order_id,
				'rating' => $rating,
				'review' => $review
			];

			if ($this->Product_reviews_model->submit_review($data)) {
				echo json_encode(['success' => true, 'message' => 'Thank you for your feedback!']);
			} else {
				throw new Exception('Failed to submit review');
			}
		} catch (Exception $e) {
			echo json_encode(['success' => false, 'message' => $e->getMessage()]);
		}
	}

	// Notifications Page
	public function notifications()
	{
		$user_id = $this->session->userdata('user_id');
		if (!$user_id)
			redirect('login');

		$data['content'] = 'notifications';
		$data['active_tab'] = 'notifications';

		// --- REQUIRED FOR HEADER ---
		$data['categories'] = $this->Category_model->get_allcategory();
		$data['subcategories'] = $this->Subcategory->get_allsubcategory();
		$data['occasions'] = $this->Occasions_model->get_alloccasions();
		// ---------------------------

		$this->load->view('template', $data);
	}

	// Get all notifications (AJAX)
	public function get_all_notifications()
	{
		@ob_clean();

		$user_id = $this->session->userdata('user_id');
		if (!$user_id) {
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode(['success' => false, 'message' => 'Not authenticated']));
			return;
		}

		$this->load->model('Notifications_model');
		$notifications = $this->Notifications_model->get_all_notifications($user_id, 100);

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode([
				'success' => true,
				'notifications' => $notifications
			]));
	}

	public function deleteCartItems($id)
	{
		try {
			// Call the delete_cartItem() method from Cart_model
			$this->Cart_model->delete_cartItem($id);

			// If deletion is successful, set a success message
			$this->session->set_flashdata("success", "Item deleted successfully");
		} catch (Exception $e) {
			// If an error occurs, set an error message
			$this->session->set_flashdata("error", "Failed to delete item. Please try again.");
		}

		// Redirect back to the cart page
		// redirect('cart', 'refresh');
	}

	public function add_address()
	{
		// Disable output buffering and set JSON header
		@ob_clean();

		// Check if this is a POST request
		if ($this->input->server('REQUEST_METHOD') !== 'POST') {
			$this->output
				->set_content_type('application/json')
				->set_status_header(405)
				->set_output(json_encode(array('success' => false, 'code' => 405, 'message' => 'Method not allowed. POST required.')));
			$this->output->_display();
			exit;
		}

		$response = array('success' => false, 'code' => 400, 'message' => 'Something went wrong', 'data' => '', 'errors' => []);
		try {
			// Check if user is logged in
			$user_id = $this->session->userdata('user_id');
			if (!$user_id) {
				$response['code'] = 401;
				throw new Exception('User not logged in. Please login and try again.');
			}

			$this->form_validation->set_rules('fullname', 'Name', 'required');
			$this->form_validation->set_rules('mobile', 'Mobile', 'required');
			$this->form_validation->set_rules('address', 'address', 'required');
			$this->form_validation->set_rules('pincode', 'Pincode', 'required');
			$this->form_validation->set_rules('locality', 'Locality', 'required');
			$this->form_validation->set_rules('city', 'City/Dist/Town', 'required');
			$this->form_validation->set_rules('state', 'state', 'required');

			if ($this->form_validation->run() == FALSE) {
				$validation_errors = $this->form_validation->error_array();
				$response['errors'] = $validation_errors;
				$response['code'] = 422;
				throw new Exception('Validation failed');
			}
			// Convert state name to state ID
			$state_input = $this->input->post('state');
			$state_id_value = $this->get_state_id($state_input);

			$data = array(
				'user_id' => $user_id,
				'fullname' => $this->input->post('fullname'),
				'phone' => $this->input->post('mobile'),
				'alt_phone' => $this->input->post('altPhone', true),
				'locality' => $this->input->post('locality', true),
				'city_twn' => $this->input->post('city', true),
				'landmark' => $this->input->post('landmark', true),
				'pincode' => $this->input->post('pincode'),
				'address' => $this->input->post('address'),
				'state_id' => $state_id_value,
			);
			$insert = $this->db->insert('users_address', $data);
			if (!$insert) {
				$db_error = $this->db->error();
				$error_msg = "Error Processing Request: Address could not be saved.";
				if (!empty($db_error['message'])) {
					$error_msg .= " Database error: " . $db_error['message'];
				}
				throw new Exception($error_msg);
			}
			$response['success'] = true;
			$response['code'] = 200;
			$response['message'] = 'Address added successfully';
			$this->session->set_flashdata("success", "Address added successfully");

		} catch (Exception $e) {
			$response['message'] = $e->getMessage();
			$this->session->set_flashdata("error", $e->getMessage());
			log_message('error', 'Add Address Error: ' . $e->getMessage());
		}

		// Set proper headers and output JSON response
		$this->output
			->set_content_type('application/json')
			->set_status_header($response['code'])
			->set_output(json_encode($response));
		$this->output->_display();
		exit; // Prevent any additional output
	}

	public function getSearchedHistory()
	{
		$user_id = $this->session->userdata('user_id');
		$cookie_id = $this->input->cookie('remember_me', true);
		$response = array('success' => false, 'code' => 400, 'message' => 'Something went wrong', 'data' => '', 'errors' => []);
		$search_history = $this->db->query("select * from searched_history order by hit_count desc limit 20")->result();
		$html_content = '';

		foreach ($search_history as $key => $value) {
			if ($value->cookie_id == $cookie_id || $value->user_id == $user_id) {
				$html_content .= '<li class="search_list" data-search="' . $value->product_name . '"><i class="fa fa-clock-o"></i>' . $value->product_name . '</li>';
			} else {
				$html_content .= '<li class="search_list" data-search="' . $value->product_name . '"><i class="fa fa-search"></i>' . $value->product_name . '</li>';
			}

		}


		echo $html_content;
	}

	public function getSearchedProduct()
	{

		$keyword = $this->input->post('keyword', true);

		$sql = "select p.id, p.* from product p inner join category ct on ct.id = p.category_id inner join subcategory sb on sb.id = p.subcategory_id where p.active = 1 and (p.product_name like '%" . $keyword . "%' or ct.category_name like '%" . $keyword . "%')";
		$data = $this->db->query($sql)->result();
		$html_content = '';

		if (empty($data)) {
			$html_content .= '<li class="no-results"><div class="no-results-message"><i class="fa fa-search"></i><p>Nothing matches your search</p><span>Try different keywords</span></div></li>';
		} else {
			foreach ($data as $key => $value) {
				$product_url = base_url('product/' . $value->id);
				$html_content .= '<li class="search_list" data-search="' . $value->product_name . '" data-url="' . $product_url . '"><a href="' . $product_url . '" class="search-result-link"><img src="' . base_url() . 'upload/productimg/' . $value->product_img1 . '" alt="' . $value->product_name . '" class="product-image">' . $value->product_name . '</a></li>';
			}
		}
		echo $html_content;
	}

	public function search_product($id)
	{
		$data['content'] = 'products';
		$user_id = $this->session->userdata('user_id');
		$cookie_id = null;
		if (!$user_id) {
			$cookie_id = $this->input->cookie('remember_me', true);
		}

		$product = $this->db->query("select * from product where id = ?", [$id])->row();

		$resp = $this->db->query("select * from searched_history where product_name = ?", [$product->product_name]);
		if ($resp->num_rows() > 0) {
			$this->db->query("UPDATE searched_history SET hit_count = hit_count + 1 WHERE product_name = ?", array($product->product_name));
		} else {
			$search_data = array(
				'user_id' => ($cookie_id) ? 0 : $user_id,
				'product_name' => $product->product_name,
				'product_image_url' => $product->product_img1,
				'hit_count' => 1,
				'cookie_id' => ($cookie_id) ? $cookie_id : null,
			);
			$this->db->insert('searched_history', $search_data);
		}

		$data['products'] = $this->Category_model->get_byCategory($product->category_id);
		$data['subcategories'] = $this->Subcategory->get_allsubcategorybyid($product->category_id);
		$this->load->view('template', $data);
	}
	/**
	 * View invoice for an order
	 */
	public function invoice_view($order_id)
	{
		$user_id = $this->session->userdata('user_id');
		if (!$user_id) {
			redirect('login');
			return;
		}

		// Get order details (checking user ownership)
		$order = $this->Order_model->get_orderdetailsby_orderid($order_id, $user_id);

		if (!$order) {
			show_404();
			return;
		}

		// Get invoice
		$this->load->model('Invoice_model');
		$invoice = $this->Invoice_model->get_invoice_by_order_id($order_id);

		if (!$invoice) {
			show_404();
			return;
		}

		// Get address
		$address = $this->Users_model->getAddressById($order->address_id);

		// Get all products for this order
		$order_products_raw = $this->Order_model->get_orderproductsby_orderid($order_id);

		// Get user details
		$user = $this->Users_model->get_userbyid($user_id);

		// Get logo from settings
		$this->load->model('Settings_model');
		$logo_path = $this->Settings_model->get_setting('site_logo');
		$data['logo_path'] = $logo_path ? base_url('upload/logo/' . $logo_path) : base_url('assets/images/icon/logo/fd9.png');

		$data['invoice'] = $invoice;
		$data['order'] = $order;
		$data['order_products'] = $order_products_raw;
		$data['address'] = $address;
		$data['user'] = $user;

		$this->load->view('invoice_view', $data);
	}

	/**
	 * Download invoice (HTML view optimized for printing)
	 */
	public function invoice_download($order_id)
	{
		$user_id = $this->session->userdata('user_id');
		if (!$user_id) {
			redirect('login');
			return;
		}

		// Get order details (checking user ownership)
		$order = $this->Order_model->get_orderdetailsby_orderid($order_id, $user_id);

		if (!$order) {
			show_404();
			return;
		}

		// Get invoice
		$this->load->model('Invoice_model');
		$invoice = $this->Invoice_model->get_invoice_by_order_id($order_id);

		if (!$invoice) {
			show_404();
			return;
		}

		// Get address
		$address = $this->Users_model->getAddressById($order->address_id);

		// Get all products for this order
		$order_products_raw = $this->Order_model->get_orderproductsby_orderid($order_id);

		// Get user details
		$user = $this->Users_model->get_userbyid($user_id);

		// Get logo from settings
		$this->load->model('Settings_model');
		$logo_path = $this->Settings_model->get_setting('site_logo');
		$data['logo_path'] = $logo_path ? base_url('upload/logo/' . $logo_path) : base_url('assets/images/icon/logo/fd9.png');

		$data['invoice'] = $invoice;
		$data['order'] = $order;
		$data['order_products'] = $order_products_raw;
		$data['address'] = $address;
		$data['user'] = $user;

		// Calculate totals
		$subtotal = 0;
		foreach ($order_products_raw as $op) {
			$subtotal += (float) $op->price * (int) $op->quantity;
		}
		$data['subtotal'] = $subtotal;
		$data['delivery_charge'] = isset($order->delivery_charge) ? (float) $order->delivery_charge : 0;
		$data['discount_amount'] = isset($order->discount_amount) ? (float) $order->discount_amount : 0;
		$data['final_total'] = isset($order->tot_amount) ? (float) $order->tot_amount : ($subtotal + $data['delivery_charge'] - $data['discount_amount']);

		$this->load->view('invoice_download', $data);
	}

	/**
	 * Create Razorpay order for wallet top-up
	 */
	public function create_wallet_topup_order()
	{
		@ob_clean();
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
			$this->load->model('Wallet_model');

			// Get Razorpay settings
			$razorpay_settings = $this->Settings_model->get_razorpay_settings();
			if (empty($razorpay_settings['razorpay_key_id']) || empty($razorpay_settings['razorpay_key_secret'])) {
				throw new Exception("Payment gateway is not configured. Please contact administrator.");
			}

			// Get and validate amount
			$amount = (float) $this->input->post('amount', true);

			if ($amount < 10) {
				throw new Exception("Minimum top-up amount is ₹10.00");
			}

			if ($amount > 50000) {
				throw new Exception("Maximum top-up amount is ₹50,000.00");
			}

			// Convert to paise (Razorpay uses smallest currency unit)
			$amount_in_paise = (int) round($amount * 100);

			if ($amount_in_paise < 1000) {
				throw new Exception("Top-up amount is too low. Minimum amount is ₹10.00");
			}

			// Create pending transaction
			$transaction_id = $this->Wallet_model->create_pending_topup(
				$user_id,
				$amount,
				'razorpay',
				null
			);

			if (!$transaction_id) {
				throw new Exception("Failed to create wallet transaction.");
			}

			// Create Razorpay order via API
			$razorpay_order_data = array(
				'amount' => $amount_in_paise,
				'currency' => 'INR',
				'receipt' => 'wallet_topup_' . $transaction_id . '_' . time(),
				'notes' => array(
					'transaction_id' => $transaction_id,
					'user_id' => $user_id,
					'purpose' => 'wallet_topup'
				)
			);

			$ch = curl_init('https://api.razorpay.com/v1/orders');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($razorpay_order_data));
			curl_setopt($ch, CURLOPT_USERPWD, $razorpay_settings['razorpay_key_id'] . ':' . $razorpay_settings['razorpay_key_secret']);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($ch, CURLOPT_TIMEOUT, 30);

			// SSL Certificate handling
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
				$this->Wallet_model->fail_topup($transaction_id, 'Network error');
				log_message('error', 'Razorpay CURL Error: ' . $curl_error);
				throw new Exception("Network error: " . $curl_error);
			}

			if ($http_code !== 200) {
				$error_data = json_decode($razorpay_response, true);
				$error_msg = 'Failed to create payment order';

				if (isset($error_data['error']['description'])) {
					$error_msg = $error_data['error']['description'];
				} elseif (isset($error_data['error']['message'])) {
					$error_msg = $error_data['error']['message'];
				}

				$this->Wallet_model->fail_topup($transaction_id, $error_msg);
				log_message('error', 'Razorpay API Error (HTTP ' . $http_code . '): ' . $error_msg);
				throw new Exception("Payment Error: " . $error_msg);
			}

			$razorpay_order = json_decode($razorpay_response, true);

			if (empty($razorpay_order) || !isset($razorpay_order['id'])) {
				$this->Wallet_model->fail_topup($transaction_id, 'Invalid response');
				log_message('error', 'Invalid Razorpay response: ' . $razorpay_response);
				throw new Exception("Invalid response from payment gateway. Please try again.");
			}

			$response['success'] = true;
			$response['code'] = 200;
			$response['message'] = 'Payment order created successfully';
			$response['data'] = array(
				'transaction_id' => $transaction_id,
				'razorpay_order_id' => $razorpay_order['id'],
				'amount' => $amount_in_paise,
				'key_id' => $razorpay_settings['razorpay_key_id']
			);

		} catch (Exception $e) {
			$response['message'] = $e->getMessage();
			log_message('error', 'Wallet Top-up Order Creation Error: ' . $e->getMessage());
		}

		header('Content-Type: application/json');
		$this->output->set_output(json_encode($response));
		$this->output->_display();
		exit;
	}

	/**
	 * Verify wallet top-up payment and credit wallet
	 */
	public function verify_wallet_topup()
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
			$this->load->model('Wallet_model');

			$razorpay_order_id = $this->input->post('razorpay_order_id', true);
			$razorpay_payment_id = $this->input->post('razorpay_payment_id', true);
			$razorpay_signature = $this->input->post('razorpay_signature', true);
			$transaction_id = $this->input->post('transaction_id', true);

			if (empty($razorpay_order_id) || empty($razorpay_payment_id) || empty($razorpay_signature) || empty($transaction_id)) {
				throw new Exception("Invalid payment data!");
			}

			// Get Razorpay settings
			$razorpay_settings = $this->Settings_model->get_razorpay_settings();
			if (empty($razorpay_settings['razorpay_key_secret'])) {
				throw new Exception("Payment gateway is not configured!");
			}

			// Verify signature
			$generated_signature = hash_hmac('sha256', $razorpay_order_id . '|' . $razorpay_payment_id, $razorpay_settings['razorpay_key_secret']);

			if ($generated_signature !== $razorpay_signature) {
				$this->Wallet_model->fail_topup($transaction_id, 'Invalid signature');
				throw new Exception("Payment verification failed! Invalid signature.");
			}

			// Verify payment with Razorpay API
			$ch = curl_init('https://api.razorpay.com/v1/payments/' . $razorpay_payment_id);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_USERPWD, $razorpay_settings['razorpay_key_id'] . ':' . $razorpay_settings['razorpay_key_secret']);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($ch, CURLOPT_TIMEOUT, 30);

			// SSL Certificate handling
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
				$this->Wallet_model->fail_topup($transaction_id, 'Network error');
				log_message('error', 'Razorpay Payment Verification CURL Error: ' . $curl_error);
				throw new Exception("Network error: " . $curl_error);
			}

			if ($http_code !== 200) {
				$error_data = json_decode($payment_response, true);
				$error_msg = 'Failed to verify payment';

				if (isset($error_data['error']['description'])) {
					$error_msg = $error_data['error']['description'];
				} elseif (isset($error_data['error']['message'])) {
					$error_msg = $error_data['error']['message'];
				}

				$this->Wallet_model->fail_topup($transaction_id, $error_msg);
				log_message('error', 'Razorpay Payment Verification Error (HTTP ' . $http_code . '): ' . $error_msg);
				throw new Exception($error_msg);
			}

			$payment_data = json_decode($payment_response, true);

			if (empty($payment_data) || !isset($payment_data['status'])) {
				$this->Wallet_model->fail_topup($transaction_id, 'Invalid response');
				log_message('error', 'Invalid Razorpay payment response: ' . $payment_response);
				throw new Exception("Invalid response from payment gateway.");
			}

			if ($payment_data['status'] !== 'captured' && $payment_data['status'] !== 'authorized') {
				$this->Wallet_model->fail_topup($transaction_id, 'Payment not successful');
				log_message('error', 'Payment not successful. Status: ' . $payment_data['status']);
				throw new Exception("Payment not successful. Status: " . $payment_data['status']);
			}

			// Complete the top-up transaction
			if (!$this->Wallet_model->complete_topup($transaction_id, $razorpay_payment_id)) {
				throw new Exception("Failed to credit wallet. Please contact support.");
			}

			// Get updated balance after recalculation
			$new_balance = $this->Wallet_model->recalculate_balance($user_id);

			// Create notification
			$transaction = $this->Wallet_model->get_transaction_by_id($transaction_id);
			$this->load->model('Notifications_model');
			$this->Notifications_model->create_notification([
				'user_id' => $user_id,
				'type' => 'wallet_credit',
				'title' => 'Wallet Credited Successfully',
				'message' => '₹' . number_format($transaction->amount, 2) . ' has been added to your wallet. New balance: ₹' . number_format($new_balance, 2)
			]);

			$response['success'] = true;
			$response['code'] = 200;
			$response['message'] = 'Wallet credited successfully!';
			$response['data'] = array(
				'new_balance' => $new_balance,
				'credited_amount' => $transaction->amount
			);

		} catch (Exception $e) {
			$response['message'] = $e->getMessage();
			log_message('error', 'Wallet Top-up Verification Error: ' . $e->getMessage());
		}

		header('Content-Type: application/json');
		echo json_encode($response);
	}

}
