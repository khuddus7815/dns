<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_hook
{
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
        $this->CI->load->model('Category_model');
        $this->CI->load->model('Subcategory');
        $this->CI->load->model('Product_model');
    }

    public function load_data()
    {
        // Load necessary models
        $this->CI->load->model('Category_model');
        $this->CI->load->model('Subcategory');
        $this->CI->load->model('Product_model');
        $this->CI->load->model('Cart_model');

        // Get user ID
        $user_id = $this->CI->session->userdata('user_id');

        // Get data
        $data['categories'] = $this->CI->Category_model->get_allcategory();
        $data['subcategories'] = $this->CI->Subcategory->get_allsubcategory();
        $data['products'] = $this->CI->Product_model->get_allproduct();

        // Get cart data for the user if user ID exists
        if ($user_id) {
            $data['carts'] = $this->CI->Cart_model->get_allcart($user_id);
        } else {
            $data['carts'] = [];
        }

        // Load data into views
        $this->CI->load->vars($data);
    }
}
