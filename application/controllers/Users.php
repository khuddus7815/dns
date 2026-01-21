<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 2010 05:00:00 GMT");
        $this->load->model('Users_model');
        $this->load->model('Order_model');
        $this->load->library('form_validation');
        $this->load->helper('url'); // Load URL helper for redirect
        $this->load->library('session'); // Load session library if not autoloaded
        $this->load->model('Cart_model'); // Load Cart_model
        $this->load->model('Category_model');
        $this->load->model('Subcategory');
        $this->load->model('Occasions_model');
    }

    public function index()
    {
        try {
            if ($this->session->userdata('user_id')) {
                redirect('/');
            }

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $this->form_validation->set_rules('username', 'Username', 'required');
                $this->form_validation->set_rules('password', 'Password', 'required');

                if ($this->form_validation->run() == FALSE) {
                    throw new Exception(validation_errors());
                } else {
                    $username = $this->input->post('username');
                    $password = $this->input->post('password');

                    $user = $this->Users_model->get_user($username);
                    if (!$user) {
                        throw new Exception('User not found');
                    }
                    $pass = sha1($password);
                    if (!$pass == $user->password) {
                        throw new Exception('Invalid password');
                    }
                    $this->session->set_userdata('user_id', $user->id);
                    redirect('/');
                }
            } else {
                // Fetch data required by header.php
                $data['categories'] = $this->Category_model->get_allcategory();
                $data['subcategories'] = $this->Subcategory->get_allsubcategory();
                $data['occasions'] = $this->Occasions_model->get_alloccasions();

                $data['content'] = 'login';
                $this->load->view('template', $data);
            }
        } catch (Exception $e) {
            $this->session->set_flashdata('error', $e->getMessage());
            redirect('login');
        }
    }


    public function register()
    {
        // Check if user is already logged in
        if ($this->session->userdata('user_id')) {
            redirect('/');
        }

        // Set form validation rules
        $this->form_validation->set_rules('first_name', 'First Name', 'required', [
            'required' => 'First name is required.'
        ]);
        $this->form_validation->set_rules('last_name', 'Last Name', 'required', [
            'required' => 'Last name is required.'
        ]);
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]', [
            'required' => 'Username is required.',
            'is_unique' => 'Username already exists. Please choose a different one.'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]', [
            'required' => 'Email is required.',
            'valid_email' => 'Please provide a valid email address.',
            'is_unique' => 'Email already exists. Please use a different one.'
        ]);
        $this->form_validation->set_rules('mobile', 'Phone', 'required|is_unique[users.mobile]', [
            'required' => 'Phone number is required.',
            'is_unique' => 'Phone number already exists. Please use a different one.'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required', [
            'required' => 'Password is required.'
        ]);
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]', [
            'required' => 'Confirm Password is required.',
            'matches' => 'Password and Confirm Password do not match.'
        ]);

        // Validate form input
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('login');
        }

        // Form input is valid, proceed with registration
        $user_data = [
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'mobile' => $this->input->post('mobile'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
        ];

        // Insert user data into 'users' table
        $user_id = $this->Users_model->register_user($user_data);

        if ($user_id) {
            // Additional user details
            $user_detail_data = [
                'user_id' => $user_id,
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name')
                // Add any other additional user details here
            ];

            // Insert user details into 'users_detail' table
            if ($this->Users_model->register_user_detail($user_detail_data)) {
                $this->session->set_flashdata('error', 'Failed to save user details.');
                redirect('login');
            } else {
                $this->session->set_flashdata('success', 'Registration successful!');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('error', 'Failed to register user.');
            redirect('login');
        }
    }



    public function logout()
    {
        $this->session->unset_userdata('user_id');
        redirect('login');
    }

    public function profile()
    {
        // Check if user is logged in
        $user_id = $this->session->userdata('user_id');
        // echo $user_id;
        // exit();

        if (!$user_id) {
            // User is not logged in, redirect to login page or handle appropriately
            redirect('login');
        }


        // Get user details from the model
        $user_details = $this->Users_model->get_userbyid($user_id);
        $order_details = $this->Order_model->get_user_order_details($user_id);
        $user_address = $this->Users_model->get_user_address($user_id);

        //  echo "<pre>";
        // print_r($user_address);
        // exit();

        // echo "<pre>";
        // print_r($order_details);
        // exit();

        // echo "<pre>";
        // print_r($user_details);
        // exit();
        // Pass user details to the view
        $data["user_address"] = $user_address;
        $data["orders"] = $order_details;
        $data['details'] = $user_details;
        $data['content'] = 'profile';
        $this->load->view('template', $data);
    }

    public function updateactive()
    {
        $userId = $this->input->post('user_id'); // Assuming user_id is sent via POST

        // Retrieve the user's current active status
        $user = $this->Users_model->get_userbyid($userId);

        if ($user) {
            // Toggle the active status
            $isActive = !$user->is_active;

            // Call the updateActive function to update active status
            $result = $this->Users_model->updateActive($userId, $isActive);

            // Prepare response data
            $response = array(
                'success' => $result // Whether the update was successful or not
            );
        } else {
            // User not found
            $response = array(
                'success' => false
            );
        }

        // Return JSON response
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    public function cancel_order()
    {
        header('Content-Type: application/json');

        try {
            log_message('error', 'Cancel Order Initiated. POST: ' . print_r($_POST, true));

            if (!$this->session->userdata('user_id')) {
                throw new Exception('User not logged in');
            }

            if ($this->input->server('REQUEST_METHOD') !== 'POST') {
                throw new Exception('Invalid request method');
            }

            $user_id = $this->session->userdata('user_id');
            $order_id = $this->input->post('order_id');
            $reason = $this->input->post('reason');
            $feedback = $this->input->post('feedback');

            log_message('error', "User ID: $user_id, Order ID: $order_id");

            if (!$order_id || !$reason) {
                throw new Exception('Missing required fields');
            }

            // Verify order belongs to user and is cancellable
            $order = $this->db->get_where('orders', ['id' => $order_id, 'user_id' => $user_id])->row();

            if (!$order) {
                log_message('error', 'Order not found for cancellation.');
                throw new Exception('Order not found');
            }

            if ($order->status >= 3) { // 3 = Shipped
                throw new Exception('Order cannot be cancelled as it has already been shipped');
            }

            if ($order->status == 0) {
                log_message('error', 'Order already cancelled.');
                echo json_encode(['success' => true, 'message' => 'Order is already cancelled']);
                return;
            }

            // Begin Transaction
            $this->db->trans_start();

            // Prepare safe data
            $db_fields = $this->db->list_fields('orders');
            $safe_data = ['status' => '0', 'cancelled_by' => 'user'];
            $full_reason = $reason . ($feedback ? " (Feedback: $feedback)" : "");

            // Attempt to determine the correct column for reason
            if (in_array('cancellation_reason', $db_fields)) {
                $safe_data['cancellation_reason'] = $full_reason;
            } elseif (in_array('reason', $db_fields)) {
                $safe_data['reason'] = $full_reason;
            } else {
                // Default to 'cancel_reason' (most common)
                $safe_data['cancel_reason'] = $full_reason;
            }
            log_message('error', 'Updating order with data: ' . print_r($safe_data, true));

            $this->db->where('id', $order_id);
            if (!$this->db->update('orders', $safe_data)) {
                $db_error = $this->db->error();
                log_message('error', 'DB Update Failed: ' . print_r($db_error, true));
                throw new Exception('Database verification failed during update.');
            }

            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $db_error = $this->db->error();
                log_message('error', 'Transaction Failed: ' . print_r($db_error, true));
                throw new Exception('Database error: Could not cancel order');
            }
            log_message('error', 'Order Cancelled Successfully in DB.');

            // Create Notification
            $this->load->model('Notifications_model');
            $this->Notifications_model->create_notification([
                'user_id' => $user_id,
                'order_id' => $order_id,
                'type' => 'order_cancelled',
                'title' => 'Order Cancelled',
                'message' => 'Your order #' . $order->order_number . ' has been cancelled successfully.'
            ]);

            // Admin Notification
            $this->Notifications_model->create_admin_notification([
                'order_id' => $order_id,
                'type' => 'order_cancelled',
                'title' => 'Order Cancelled by User',
                'message' => 'Order #' . $order->order_number . ' has been cancelled by the user.'
            ]);

            echo json_encode(['success' => true, 'message' => 'Order cancelled successfully']);

        } catch (Exception $e) {
            log_message('error', 'Cancellation Exception: ' . $e->getMessage());
            http_response_code(500);
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}
