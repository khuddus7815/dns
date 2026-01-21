<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthController extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('session'); 
        $this->load->model('Admin_model');
        $this->load->model('Category_model');
        $this->load->model('Occasions_model');
        $this->load->library('encryption');
        $this->load->model('Subcategory');
        $this->load->model('Product_model');
        $this->load->model('Users_model');
        $this->load->model('Order_model');
        $this->load->model('Package_model');
        $this->load->model('Varient_model');
    }

    public function index()
    {
        if ($this->session->userdata('usertype') == 'Admin') {
            redirect(base_url('Admin/index'));
        } else {
            $this->load->view('admin/login.php');
        }
    }


    public function admin_login()
    {
        try {
            $response = array("STATUS" => "false", "Message" => "something wrong in controller");

            $email = trim($this->input->post('email'));
            $password = $this->input->post('password');

            if (empty($email) || empty($password)) {
                $this->session->set_flashdata('error_message', "Email and Password are required.");
                redirect(base_url('AuthController'), 'refresh');
                return;
            }

            // Hash the password with SHA1 (as used in the database)
            $password_hash = sha1($password);
            $userdata = array('email' => $email, 'password' => $password_hash);

            $resultdata = $this->Admin_model->validate_login($userdata);

            if ($resultdata && !empty($resultdata->id)) {
                // Verify usertype is Admin
                if ($resultdata->usertype != 'Admin') {
                    $this->session->set_flashdata('error_message', "Access denied. Admin credentials required.");
                    redirect(base_url('AuthController'), 'refresh');
                    return;
                }

                $this->session->set_userdata('user_id', $resultdata->id);
                $this->session->set_userdata('usertype', $resultdata->usertype);
                $this->session->set_userdata('username', $resultdata->username);
                if (isset($resultdata->profile_pic)) {
                    $this->session->set_userdata('profile_pic', $resultdata->profile_pic);
                }
                
                redirect('/Admin', 'refresh');
            } else {
                $this->session->set_flashdata('error_message', "Invalid email or password. Please check your credentials.");
                redirect(base_url('AuthController'), 'refresh');
            }
        } catch (Exception $e) {
            $err_msg = $e->getMessage();
            $response['Message'] = $err_msg;
            
            $this->session->set_flashdata('error_message', "Login failed: " . $err_msg);
            redirect(base_url('AuthController'), 'refresh');
        }
    }

    
    public function admin_logout()
    {
        $this->session->sess_destroy();
        
        $this->session->set_flashdata('success_message', "You have been logged out successfully.");
        redirect(base_url('AuthController'), 'refresh');
    }
}