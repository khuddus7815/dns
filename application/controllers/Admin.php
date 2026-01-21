<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->library('session');


        if ($this->session->userdata('usertype') != 'Admin') {
            redirect(base_url('AuthController'));
        }
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
        $this->load->model('Banner_model');
        $this->load->model('Refund_model');
        $this->load->model('Notifications_model');
    }


    public function index()
    {

        $data['users'] = $this->Users_model->get_allusers();
        $data['products'] = $this->Product_model->get_allproduct();
        $data['categories'] = $this->Category_model->get_allcategory();

        $data['earnings'] = $this->Order_model->get_monthly_earnings();
        $data['weekly_sales'] = $this->Order_model->get_weekly_sales_chart();
        $data['monthly_sales'] = $this->Order_model->get_monthly_sales_chart();
        $data['order_status_counts'] = $this->Order_model->get_orders_by_status_chart();
        $data['top_selling_products'] = $this->Order_model->get_top_selling_products();

        $latest_orders = $this->Order_model->get_latest_orders();

        // Get order products for each order
        if ($latest_orders) {
            foreach ($latest_orders as $order) {
                $order->products = $this->Order_model->get_orderproductsby_orderid($order->id);
            }
        }

        $data['latest_orders'] = $latest_orders;

        $data['content'] = 'admin/index';
        $this->load->view('admin/common/templet', $data);
    }


    public function admin_registration()
    {

        try {
            $response = array("STATUS" => "false", "Message" => "something wrong in controller");
            if (!empty($_POST)) {
                extract($_POST);
                $user_data = array(
                    'username' => "Admin123",
                    'email' => $email,
                    'password' => sha1($password),
                    'usertype' => 'Admin'
                );

                $userdata = $this->Admin_model->Create_users($user_data);

                if (!empty($userdata)) {
                    $this->session->set_flashdata('success', "successfully registered.");
                    redirect('/Admin', 'refresh');
                } else {
                    $this->session->set_flashdata('error', "something went wrong");
                    redirect('/Admin', 'refresh');
                }
            } else {
                throw new Exception("data not found.");
                print_r($response);
            }
        } catch (Exception $e) {
            $err_msg = $e->getMessage();
            $this->session->set_flashdata('error', $err_msg);
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('/Admin', 'refresh');
    }

    public function category()
    {
        //print_r("Hiii");
        if ($this->session->userdata('user_id')) {
            $data['content'] = 'admin/category';
            $data['category'] = $this->Category_model->get_allcategory();
            $this->load->view('admin/common/templet', $data);
        } else {
            $this->load->view('admin/login.php');
        }
    }

    public function add_category()
    {
        if ($this->session->userdata('user_id')) {
            try {
                extract($_POST);
                extract($_FILES);

                if (!empty($_FILES['catimage']['name']) && !empty($categoryname) && !empty($_FILES['catbanner']['name'])) {
                    $catimage = uniqid() . '_' . $_FILES['catimage']['name'];
                    $catbanner = uniqid() . '_' . $_FILES['catbanner']['name'];
                    $uploaddir = 'upload/categoryimg/';
                    $uploadfile_image = $uploaddir . $catimage;
                    $uploadfile_banner = $uploaddir . $catbanner;

                    $fileuploadstatus_image = move_uploaded_file($_FILES['catimage']['tmp_name'], $uploadfile_image);
                    $fileuploadstatus_banner = move_uploaded_file($_FILES['catbanner']['tmp_name'], $uploadfile_banner);

                    if ($fileuploadstatus_image && $fileuploadstatus_banner) {
                        $data = array(
                            'category_name' => $categoryname,
                            'category_image' => $catimage,
                            'banner_img' => $catbanner
                        );
                        $res = $this->Category_model->add_category($data);

                        if (!empty($res)) {
                            $this->session->set_userdata("massage", "Category added successfully");
                            redirect('admin/category', 'refresh');
                        }
                    } else {
                        $this->session->set_userdata("massage", "Failed to upload image. Please try again.");
                        redirect('admin/category', 'refresh');
                    }
                } else {
                    $this->session->set_userdata("massage", "Category name, image, and banner are required fields.");
                    redirect('admin/category', 'refresh');
                }
            } catch (Exception $e) {
                $err_msg = $e->getMessage();
                $response['Message'] = $err_msg;
                print_r($response);
            }
        } else {
            $this->load->view('admin/login.php');
        }
    }

    public function subcategory()
    {
        if ($this->session->userdata('user_id')) {
            $data['content'] = 'admin/subcategory';
            $data['subcategory'] = $this->Subcategory->get_allsubcategorywithcategory();
            $data['category'] = $this->Category_model->get_allcategory();
            $this->load->view('admin/common/templet', $data);
        } else {
            $this->load->view('admin/login.php');
        }
    }

    public function get_subcategorydata($id)
    {
        try {
            // Load the subcategory model
            $subcategory = $this->Subcategory->get_subcategorybyid($id);

            if ($subcategory) {
                // Subcategory found, encode it to JSON format
                $json_data = json_encode($subcategory);
                // Set the appropriate Content-Type header
                $this->output->set_content_type('application/json');
                // Output the JSON data
                $this->output->set_output($json_data);
            } else {
                // Subcategory not found, return an empty JSON object
                $this->output->set_content_type('application/json');
                $this->output->set_output(json_encode((object) []));
            }
        } catch (Exception $e) {
            // Handle any exceptions that may occur
            $error_message = 'Error: ' . $e->getMessage();
            $this->output->set_status_header(500); // Internal Server Error
            $this->output->set_output(json_encode(['error' => $error_message]));
        }
    }


    public function add_subcategory()
    {

        if ($this->session->userdata('user_id')) {
            extract($_POST);
            extract($_FILES);
            //print_r($_POST);exit;
            // print_r($_FILES['catimage']['name']);exit;
            if (!empty($_FILES['subcatimage']['name']) && !empty($subcategoryname)) {
                $subcatimage = uniqid() . '_' . $_FILES['subcatimage']['name'];
                $uploaddir = 'upload/subcategory/';
                $uploadfile = $uploaddir . $subcatimage;
                //print_r($uploadfile);exit;
                $fileuploadstatus = move_uploaded_file($_FILES['subcatimage']['tmp_name'], $uploadfile);
                //print_r($fileuploadstatus);exit;
                if ($fileuploadstatus) {
                    $data = array('subcategory_name' => $subcategoryname, 'subcategory_image' => $subcatimage, 'category_id' => $category_id);
                    $res = $this->Subcategory->add_subcategory($data);
                    if (!empty($res)) {
                        $this->session->set_userdata("massage", "Category added successfully");
                        redirect('admin/subcategory', 'refresh');
                    }
                } else {
                    $this->session->set_userdata("massage", "something went wrong!!please try again");
                    redirect('admin/subcategory', 'refresh');
                }
            } else {
                $this->session->set_userdata("massage", "something went wrong!!please try again");
                redirect('admin/subcategory', 'refresh');
            }
        } else {
            $this->load->view('admin/login.php');
        }
    }

    public function edit_subcategory()
    {
        if ($this->session->userdata('user_id')) {
            // Extract the subcategory ID
            $edit_subcategory_id = $this->input->post('edit_subcategory_id');

            try {
                // Prepare data for update
                $data = array();

                // Check if a new image is uploaded
                if (!empty($_FILES['subcatimage']['name'])) {
                    // Define upload configurations
                    $config['upload_path'] = './upload/subcategory/';
                    $config['allowed_types'] = 'gif|jpg|jpeg|png';
                    $config['max_size'] = 2048; // 2MB max size, adjust as needed
                    $config['file_name'] = uniqid() . '_' . $_FILES['subcatimage']['name'];

                    // Load the upload library and initialize with configurations
                    $this->load->library('upload');
                    $this->upload->initialize($config);

                    // Perform the upload
                    if ($this->upload->do_upload('subcatimage')) {
                        $upload_data = $this->upload->data();
                        $data['subcategory_image'] = $upload_data['file_name'];
                    } else {
                        // Failed to upload image
                        throw new Exception($this->upload->display_errors());
                    }
                }

                // Check if subcategory name is provided
                $subcategoryname = $this->input->post('editsubcategoryname');
                if (!empty($subcategoryname)) {
                    $data['subcategory_name'] = $subcategoryname;
                }

                // Check if category ID is provided
                $category_id = $this->input->post('editcategory_id');
                if (!empty($category_id)) {
                    $data['category_id'] = $category_id;
                }

                // Update subcategory in the database
                $res = $this->Subcategory->update_subcategory($edit_subcategory_id, $data);

                if (!empty($res)) {
                    $this->session->set_flashdata("success", "Subcategory updated successfully");
                } else {
                    throw new Exception("Failed to update subcategory");
                }
            } catch (Exception $e) {
                $this->session->set_flashdata("error", $e->getMessage());
            }
            redirect('admin/subcategory', 'refresh');
        } else {
            $this->load->view('admin/login.php');
        }
    }






    public function delete_subcategory($id)
    {
        if ($this->session->userdata('user_id')) {
            // Call the model method to delete the subcategory
            $result = $this->Subcategory->delete_subcategory($id);

            // Check if the subcategory was successfully deleted
            if ($result) {
                $this->session->set_flashdata('success', 'Subcategory deleted successfully.');
            } else {
                $this->session->set_flashdata('error', 'Failed to delete subcategory.');
            }
        } else {
            $this->load->view('admin/login.php');
        }

        // Redirect to the subcategory list page or any other suitable page
        redirect('admin/subcategory');
    }


    public function product()
    {
        if ($this->session->userdata('user_id')) {
            $data['content'] = 'admin/product';
            $data['subcategories'] = $this->Subcategory->get_allsubcategory();
            $data['categories'] = $this->Category_model->get_allcategory();
            $data['products'] = $this->Product_model->get_allproduct();
            $this->load->view('admin/common/templet', $data);
        } else {
            $this->load->view('admin/login.php');
        }
    }

    public function ajax_subcategory()
    {

        extract($_POST);
        //print_r($id);exit;
        $data = $this->Subcategory->get_allsubcategorybyid($id);

        print_r(json_encode($data));
        exit;
    }

    public function get_productdata($id)
    {
        try {
            // Load the product model
            $product = $this->Product_model->get_byId($id);

            if ($product) {
                // Fetch variants if it's a weight-based product
                if ($product->is_weight_status == 1) {
                    $product->variants = $this->Varient_model->get_variants_by_product_id($id);
                }

                // Product found, encode it to JSON format
                $json_data = json_encode($product);
                // Set the appropriate Content-Type header
                $this->output->set_content_type('application/json');
                // Output the JSON data
                $this->output->set_output($json_data);
            } else {
                // Product not found, return an empty JSON object
                $this->output->set_content_type('application/json');
                $this->output->set_output(json_encode((object) []));
            }
        } catch (Exception $e) {
            // Handle any exceptions that may occur
            $error_message = 'Error: ' . $e->getMessage();
            $this->output->set_status_header(500); // Internal Server Error
            $this->output->set_output(json_encode(['error' => $error_message]));
        }
    }


    public function add_product()
    {
        if ($this->session->userdata('user_id')) {
            extract($_POST);
            extract($_FILES);

            // Initialize an array to store the data
            $data = array();

            // Check if the required fields are provided
            if (
                !empty($_FILES['productimage1']['name']) &&
                !empty($product_type) &&
                !empty($category_id) &&
                !empty($subcategory_id) &&
                !empty($product_name) &&
                !empty($description)
            ) {
                // Handle image uploads
                $uploaddir = 'upload/productimg/';
                $productimage1 = uniqid() . '_' . $_FILES['productimage1']['name'];
                $fileuploadstatus1 = move_uploaded_file($_FILES['productimage1']['tmp_name'], $uploaddir . $productimage1);

                $productimage2 = !empty($_FILES['productimage2']['name']) ? uniqid() . '_' . $_FILES['productimage2']['name'] : '';
                if ($productimage2)
                    move_uploaded_file($_FILES['productimage2']['tmp_name'], $uploaddir . $productimage2);

                $productimage3 = !empty($_FILES['productimage3']['name']) ? uniqid() . '_' . $_FILES['productimage3']['name'] : '';
                if ($productimage3)
                    move_uploaded_file($_FILES['productimage3']['tmp_name'], $uploaddir . $productimage3);

                $productimage4 = !empty($_FILES['productimage4']['name']) ? uniqid() . '_' . $_FILES['productimage4']['name'] : '';
                if ($productimage4)
                    move_uploaded_file($_FILES['productimage4']['tmp_name'], $uploaddir . $productimage4);

                if ($fileuploadstatus1) {
                    $is_weight = isset($is_weight_status) ? $is_weight_status : 0;

                    // Add basic data
                    $data = array(
                        'type' => $product_type,
                        'product_name' => $product_name,
                        'description' => $description,
                        'product_img1' => $productimage1,
                        'product_img2' => $productimage2,
                        'product_img3' => $productimage3,
                        'product_img4' => $productimage4,
                        'category_id' => $category_id,
                        'subcategory_id' => !empty($subcategory_id) ? $subcategory_id : 0,
                        'is_weight_status' => $is_weight,
                        'active' => 0
                    );

                    // Set price/selling price for products table
                    if ($is_weight == 1) {
                        // Use first variant's pricing as base pricing in products table for compatibility
                        $data['price'] = !empty($variant_price[0]) ? $variant_price[0] : 0;
                        $data['selling_price'] = !empty($variant_selling_price[0]) ? $variant_selling_price[0] : 0;
                    } else {
                        $data['price'] = $price;
                        $data['selling_price'] = $sellingprice;
                    }
                } else {
                    $this->session->set_flashdata("error", "Failed to upload images. Please try again.");
                    redirect('admin/product', 'refresh');
                }
            } else {
                $this->session->set_flashdata("error", "Required fields are missing.");
                redirect('admin/product', 'refresh');
            }

            // Add product to database
            $product_id = $this->Product_model->add_product($data);
            if ($product_id > 0) {
                // If weight based, add variants
                if (isset($is_weight_status) && $is_weight_status == 1 && !empty($variant_weight)) {
                    foreach ($variant_weight as $key => $weight) {
                        if (!empty($weight)) {
                            $v_data = [
                                'product_id' => $product_id,
                                'category_id' => $category_id,
                                'subcategory_id' => !empty($subcategory_id) ? $subcategory_id : 0,
                                'variant_name' => $weight,
                                'variant_price' => $variant_price[$key],
                                'variant_sellingprice' => $variant_selling_price[$key],
                                'package_id' => '', // Legacy field
                                'package_value' => $weight // Store weight here too for legacy
                            ];
                            $this->Varient_model->add_varient($v_data);
                        }
                    }
                }

                $this->session->set_flashdata("success", "Product added successfully");
                redirect('admin/product', 'refresh');
            } else {
                $this->session->set_flashdata("error", "Failed to add product.");
                redirect('admin/product', 'refresh');
            }
        } else {
            $this->load->view('admin/login.php');
        }
    }

    public function editProduct()
    {
        if ($this->session->userdata('user_id')) {
            // Check if the form is submitted
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $id = $this->input->post('product_id');
                if (empty($id)) {
                    $this->session->set_flashdata("error", "Invalid Product ID.");
                    redirect('admin/product', 'refresh');
                    return;
                }

                $this->load->model('Product_model');
                $old_product = $this->Product_model->get_byId($id);
                if (!$old_product) {
                    $this->session->set_flashdata("error", "Product not found.");
                    redirect('admin/product', 'refresh');
                    return;
                }

                $is_weight = $this->input->post('is_weight_status') ?: 0;
                $variant_weights = $this->input->post('variant_weight');
                $variant_prices = $this->input->post('variant_price');
                $variant_selling_prices = $this->input->post('variant_selling_price');

                $data = array(
                    'type' => $this->input->post('product_type'),
                    'category_id' => $this->input->post('category_id'),
                    'subcategory_id' => $this->input->post('subcategory_id') ?: 0,
                    'product_name' => $this->input->post('product_name'),
                    'description' => $this->input->post('description'),
                    'is_weight_status' => $is_weight
                );

                // Set price/selling price for products table
                if ($is_weight == 1 && !empty($variant_prices)) {
                    $data['price'] = $variant_prices[0];
                    $data['selling_price'] = $variant_selling_prices[0];
                } else {
                    $data['price'] = $this->input->post('price');
                    $data['selling_price'] = $this->input->post('sellingprice');
                }

                // Handle image uploads
                $uploaddir = 'upload/productimg/';
                $upload_image = function ($file_key, $old_image_name) use ($uploaddir, $old_product) {
                    if (!empty($_FILES[$file_key]['name'])) {
                        $new_image_name = uniqid() . '_' . $_FILES[$file_key]['name'];
                        if (move_uploaded_file($_FILES[$file_key]['tmp_name'], $uploaddir . $new_image_name)) {
                            if (isset($old_product->$old_image_name) && !empty($old_product->$old_image_name) && file_exists($uploaddir . $old_product->$old_image_name)) {
                                unlink($uploaddir . $old_product->$old_image_name);
                            }
                            return $new_image_name;
                        }
                    }
                    return null;
                };

                for ($i = 1; $i <= 4; $i++) {
                    $new_img = $upload_image('productimage' . $i, 'product_img' . $i);
                    if ($new_img)
                        $data['product_img' . $i] = $new_img;
                }

                $this->Product_model->update_product($id, $data);

                // Handle Variants
                $this->Varient_model->delete_variants_by_product_id($id);
                if ($is_weight == 1 && !empty($variant_weights)) {
                    foreach ($variant_weights as $key => $weight) {
                        if (!empty($weight)) {
                            $v_data = [
                                'product_id' => $id,
                                'category_id' => $data['category_id'],
                                'subcategory_id' => $data['subcategory_id'] ?: 0,
                                'variant_name' => $weight,
                                'variant_price' => $variant_prices[$key],
                                'variant_sellingprice' => $variant_selling_prices[$key],
                                'package_id' => '',
                                'package_value' => $weight
                            ];
                            $this->Varient_model->add_varient($v_data);
                        }
                    }
                }

                $this->session->set_flashdata("success", "Product updated successfully.");
                redirect('admin/product', 'refresh');
            } else {
                redirect('admin/product', 'refresh');
            }
        } else {
            $this->load->view('admin/login.php');
        }
    }



    public function deleteProduct($id)
    {
        try {
            // Load the product model
            $this->load->model('Product_model');

            // Call the method to delete the product
            if ($this->Product_model->deleteProduct($id)) {
                // Product successfully deleted
                $this->session->set_flashdata('success', 'Product deleted successfully.');
            } else {
                // Handle deletion failure
                $this->session->set_flashdata('error', 'Failed to delete product.');
            }
        } catch (Exception $e) {
            // Handle the exception
            // You can log the error, show a user-friendly message, or redirect to an error page
            $this->session->set_flashdata('error', 'Error: ' . $e->getMessage());
        }

        // Redirect to the product list page or any other suitable page
        redirect('admin/product');
    }




    public function filterProductsData()
    {
        $type = $this->input->post('type');
        $category = $this->input->post('category_id');
        $subtype = $this->input->post('subtype');
        $search = $this->input->post('search');

        $page = $this->input->post('page') ? (int) $this->input->post('page') : 1;
        $limit = $this->input->post('limit') ? (int) $this->input->post('limit') : 8;

        $offset = ($page - 1) * $limit;

        $filteredData = $this->Admin_model->getProductFilteredData($type, $category, $subtype, $limit, $offset, $search);

        echo json_encode($filteredData);
    }
    public function filterOccasionProducts()
    {
        $type = $this->input->post('type');
        $category = $this->input->post('category_id');
        $subtype = $this->input->post('subtype');
        $occasion_id = $this->input->post('occasionId');



        $filteredData = $this->Admin_model->getOccasionProductFilteredData($type, $category, $subtype, $occasion_id);
        // print_r($filteredData);
        // exit;
        // // Return JSON response
        echo json_encode($filteredData);
    }


    public function users()
    {
        if ($this->session->userdata('user_id')) {
            $data['content'] = 'admin/users';
            $data['users'] = $this->Users_model->get_allusers();
            $this->load->view('admin/common/templet', $data);
        } else {
            $this->load->view('admin/login.php');
        }
    }

    public function edit_category()
    {
        if ($this->session->userdata('user_id')) {
            try {
                // Extract POST data
                extract($_POST);
                extract($_FILES);

                if (!empty($categoryname)) {
                    // Check if a new image is uploaded
                    if (!empty($_FILES['catimage']['name']) && !empty($_FILES['catbanner']['name'])) {
                        // Generate unique image names
                        $catimage = uniqid() . '_' . str_replace(' ', '_', $_FILES['catimage']['name']);
                        $catbanner = uniqid() . '_' . str_replace(' ', '_', $_FILES['catbanner']['name']);
                        $uploaddir = 'upload/categoryimg/';
                        $uploadfile_image = $uploaddir . $catimage;
                        $uploadfile_banner = $uploaddir . $catbanner;

                        // Upload images
                        $fileuploadstatus_image = move_uploaded_file($_FILES['catimage']['tmp_name'], $uploadfile_image);
                        $fileuploadstatus_banner = move_uploaded_file($_FILES['catbanner']['tmp_name'], $uploadfile_banner);

                        if (!$fileuploadstatus_image || !$fileuploadstatus_banner) {
                            throw new Exception("Failed to upload image. Please try again.");
                        }
                    } else {
                        // If no new image is uploaded, keep the existing images
                        $catimage = $existing_image_path_image; // Update 'existing_image_path_image' with the actual path to the current image
                        $catbanner = $existing_image_path_banner; // Update 'existing_image_path_banner' with the actual path to the current banner
                    }

                    // Prepare data array
                    $data = array(
                        'category_name' => $categoryname,
                        'category_image' => $catimage,
                        'banner_img' => $catbanner
                    );

                    // Update category in the database
                    $result = $this->Category_model->update_category($edit_category_id, $data);

                    // Check if the category was successfully updated
                    if ($result) {
                        $this->session->set_userdata("message", "Category updated successfully");
                        redirect('admin/category', 'refresh');
                    } else {
                        throw new Exception("Failed to update category.");
                    }
                } else {
                    throw new Exception("Category name is required.");
                }
            } catch (Exception $e) {
                $this->session->set_userdata("message", $e->getMessage());
                redirect('admin/category', 'refresh');
            }
        } else {
            $this->load->view('admin/login.php');
        }
    }

    public function delete_category($id)
    {
        try {
            // Load the category model

            // Call the method to delete the category
            if ($this->Category_model->delete_category($id)) {
                // Category successfully deleted
                $this->session->set_flashdata('success', 'Category deleted successfully.');
            } else {
                // Handle deletion failure
                $this->session->set_flashdata('error', 'Failed to delete category.');
            }
        } catch (Exception $e) {
            // Handle the exception
            // You can log the error, show a user-friendly message, or redirect to an error page
            $this->session->set_flashdata('error', 'Error: ' . $e->getMessage());
        }

        // Redirect to the category list page or any other suitable page
        redirect('admin/category');
    }





    public function get_category($id)
    {
        // Call the model method to get category data by ID
        $category = $this->Category_model->get_category_by_id($id);

        // Prepare response data
        $response = array();

        if ($category) {
            // Category found
            $response['success'] = true;
            $response['data'] = $category; // Assuming $category is an array containing category data
        } else {
            // Category not found
            $response['success'] = false;
            // Optionally, you can include an error message
            // $response['error'] = 'Category not found';
        }

        // Send JSON response
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function occasions()
    {
        if ($this->session->userdata('user_id')) {
            $data['content'] = 'admin/occasion';
            $data['occasions'] = $this->Occasions_model->get_alloccasions();
            $this->load->view('admin/common/templet', $data);
        } else {
            $this->load->view('admin/login.php');
        }
    }

    public function add_occasion()
    {
        if ($this->session->userdata('user_id')) {
            $occasion_name = $this->input->post('occasion_name');

            if (!empty($occasion_name) && !empty($_FILES['occimg']['name'])) {
                $upload_path = './upload/occasion/';
                $config['upload_path'] = $upload_path;
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = 2048; // 2MB max size, adjust as needed
                $config['file_name'] = uniqid() . '_' . $_FILES['occimg']['name'];

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('occimg')) {
                    $error = $this->upload->display_errors();
                    echo $error; // Output the error
                    exit(); // Stop execution
                } else {
                    $data = array(
                        'occasion_name' => $occasion_name,
                        'occasion_image' => $this->upload->data('file_name')
                    );

                    $res = $this->Occasions_model->add_occasion($data);

                    if ($res) {
                        $this->session->set_flashdata("success", "Occasion added successfully");
                    } else {
                        $this->session->set_flashdata("error", "Something went wrong! Please try again.");
                    }
                }
            } else {
                $this->session->set_flashdata("error", "Occasion name and image are required fields");
            }
            redirect('admin/occasion', 'refresh');
        } else {
            $this->load->view('admin/login.php');
        }
    }

    public function get_occasiondata($id)
    {
        try {
            // Load the Occasion_model

            // Call the model method to get occasion data by ID
            $occasion = $this->Occasions_model->get_occasionbyid($id);

            // Prepare response data
            $response = array();

            if ($occasion) {
                // Occasion found
                $response['success'] = true;
                $response['data'] = $occasion; // Assuming $occasion is an array containing occasion data
            } else {
                // Occasion not found
                $response['success'] = false;
                // Optionally, you can include an error message
                // $response['error'] = 'Occasion not found';
            }

            // Send JSON response
            header('Content-Type: application/json');
            echo json_encode($response);
        } catch (Exception $e) {
            // Handle exception
            $response['success'] = false;
            $response['error'] = $e->getMessage();
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }

    public function edit_occasion()
    {
        if ($this->session->userdata('user_id')) {
            $occasion_id = $this->input->post('edit_occasion_id');
            $occasion_name = $this->input->post('editoccasion_name');
            print_r($_POST);

            print_r($occasion_name);
            $old_image_name = $this->Occasions_model->get_occasionbyid($occasion_id)->occasion_image;
            print_r($old_image_name);
            // exit();

            // Check if a new image is uploaded
            if (!empty($_FILES['editcatimage']['name'])) {
                $upload_path = './upload/occasion/';
                $config['upload_path'] = $upload_path;
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = 2048; // 2MB max size, adjust as needed
                $config['file_name'] = uniqid() . '_' . $_FILES['editcatimage']['name'];

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('editcatimage')) {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    redirect('admin/occasion', 'refresh');
                } else {
                    // Get the old image file name from the database
                    $old_image_name = $this->Occasions_model->get_occasionbyid($occasion_id)->occasion_image;

                    // Unlink the old image file
                    $old_image_path = $upload_path . $old_image_name;
                    if (file_exists($old_image_path)) {
                        unlink($old_image_path);
                    }

                    // Set the new image file name in the data array
                    $data['occasion_image'] = $this->upload->data('file_name');
                }
            }

            // If only occasion name is provided without a new image
            if (!empty($occasion_name)) {
                $data['occasion_name'] = $occasion_name;
            }

            // Update occasion in the database
            $result = $this->Occasions_model->update_occasion($occasion_id, $data);

            if ($result) {
                $this->session->set_flashdata('success', 'Occasion updated successfully.');
            } else {
                $this->session->set_flashdata('error', 'Failed to update occasion.');
            }
        } else {
            $this->load->view('admin/login.php');
        }

        redirect('admin/occasion', 'refresh');
    }



    public function deleteOccasion($id)
    {
        try {

            if ($this->Occasions_model->delete_occasion($id)) {
                $this->session->set_flashdata('success', 'Occasion deleted successfully.');
            } else {
                $this->session->set_flashdata('error', 'Failed to delete occasion.');
            }
        } catch (Exception $e) {

            $this->session->set_flashdata('error', 'Error: ' . $e->getMessage());
        }

        redirect('admin/occasion');
    }
    public function occasion_product($id)
    {
        if ($this->session->userdata('user_id')) {
            $data['content'] = 'admin/occasion_product';
            $data['subcategories'] = $this->Subcategory->get_allsubcategory();
            $data['categories'] = $this->Category_model->get_allcategory();
            $data['products'] = $this->Product_model->get_allproduct();
            $data['occasion_id'] = $id;

            // echo "<pre>";
            // print_r($data['products']);
            // exit;

            $this->load->view('admin/common/templet', $data);
        } else {
            $this->load->view('admin/login.php');
        }
    }

    public function view_occasion_product($id)
    {
        if ($this->session->userdata('user_id')) {
            $data['content'] = 'admin/view_occasion_product';
            $data['subcategories'] = $this->Subcategory->get_allsubcategory();
            $data['categories'] = $this->Category_model->get_allcategory();
            $data['products'] = $this->Product_model->get_occasion_product($id);
            $data['occasion_id'] = $id;

            // echo "<pre>";
            // print_r($data['products']);
            // exit;

            $this->load->view('admin/common/templet', $data);
        } else {
            $this->load->view('admin/login.php');
        }
    }

    public function add_products_to_occasion()
    {
        $occasion_id = $this->input->post('occasion_id');
        $product_ids = $this->input->post('product_ids');

        if (!empty($occasion_id) && !empty($product_ids)) {
            foreach ($product_ids as $product_id) {
                $this->db->where('occasion_id', $occasion_id);
                $this->db->where('product_id', $product_id);
                $query = $this->db->get('occasion_product');

                if ($query->num_rows() == 0) {
                    $data = [
                        'occasion_id' => $occasion_id,
                        'product_id' => $product_id
                    ];
                    $this->db->insert('occasion_product', $data);
                }
            }

            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid data']);
        }
    }


    public function update_products_to_occasion()
    {
        $occasion_id = $this->input->post('occasion_id');
        $product_ids = $this->input->post('product_ids'); // Array of product IDs

        if (!empty($occasion_id) && !empty($product_ids)) {
            $product_ids = is_array($product_ids) ? $product_ids : explode(',', $product_ids);

            $this->db->where('occasion_id', $occasion_id);
            $this->db->where_not_in('product_id', $product_ids);
            $this->db->delete('occasion_product');

            foreach ($product_ids as $product_id) {
                $this->db->where('occasion_id', $occasion_id);
                $this->db->where('product_id', $product_id);
                $query = $this->db->get('occasion_product');

                if ($query->num_rows() == 0) {
                    $data = [
                        'occasion_id' => $occasion_id,
                        'product_id' => $product_id
                    ];
                    $this->db->insert('occasion_product', $data);
                }
            }

            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid data']);
        }
    }



    public function order_list()
    {
        if ($this->session->userdata('user_id')) {
            // echo "<pre>";
            // print_r($this->Order_model->get_orderlist());
            // exit();
            $data['order_list'] = $this->Order_model->get_orderlist();
            $data['content'] = 'admin/orderlist.php';
            $this->load->view('admin/common/templet', $data);
        } else {
            $this->load->view('admin/login.php');
        }

    }

    public function invoices()
    {
        if ($this->session->userdata('user_id')) {
            $this->load->model('Invoice_model');
            $data['invoices'] = $this->Invoice_model->get_all_invoices();
            $data['content'] = 'admin/invoices.php';
            $this->load->view('admin/common/templet', $data);
        } else {
            $this->load->view('admin/login.php');
        }
    }

    public function admin_invoice_view($invoice_id)
    {
        if ($this->session->userdata('user_id')) {
            $this->load->model('Invoice_model');
            $this->load->model('Order_model');
            $this->load->model('Users_model');

            $invoice = $this->Invoice_model->get_invoice_by_id($invoice_id);
            if (!$invoice) {
                show_404();
                return;
            }

            $order = $this->Order_model->get_orderdetailsby_orderid($invoice->order_id, $invoice->user_id);
            $address = $this->Users_model->getAddressById($order->address_id);
            $order_products = $this->Order_model->get_orderproductsby_orderid($invoice->order_id);
            $user = $this->Users_model->get_userbyid($invoice->user_id);

            // Get logo from settings
            $this->load->model('Settings_model');
            $logo_path = $this->Settings_model->get_setting('site_logo');
            $data['logo_path'] = $logo_path ? base_url('upload/logo/' . $logo_path) : base_url('assets/images/icon/logo/fd9.png');

            $data['invoice'] = $invoice;
            $data['order'] = $order;
            $data['order_products'] = $order_products;
            $data['address'] = $address;
            $data['user'] = $user;

            // Calculate totals
            $subtotal = 0;
            foreach ($order_products as $op) {
                $subtotal += (float) $op->price * (int) $op->quantity;
            }
            $data['subtotal'] = $subtotal;
            $data['delivery_charge'] = isset($order->delivery_charge) ? (float) $order->delivery_charge : 0;
            $data['discount_amount'] = isset($order->discount_amount) ? (float) $order->discount_amount : 0;
            $data['final_total'] = isset($order->tot_amount) ? (float) $order->tot_amount : ($subtotal + $data['delivery_charge'] - $data['discount_amount']);

            $this->load->view('invoice_download', $data);
        } else {
            redirect(base_url('AuthController'));
        }
    }

    public function order_details($id)
    {
        if ($this->session->userdata('user_id')) {

            $data['order_list'] = $this->Order_model->get_orderlistByOrderid($id);

            $data['order_products'] = $this->Order_model->get_orderproductsby_orderid($id);

            $data['shipping_address'] = null;
            if ($data['order_list'] && !empty($data['order_list']->address_id)) {
                $data['shipping_address'] = $this->Order_model->get_address_by_id($data['order_list']->address_id);
            }

            $data['content'] = 'admin/orderdetails_page';

            $this->load->view('admin/common/templet', $data);

        } else {
            $this->load->view('admin/login.php');
        }
    }


    public function product_varient()
    {
        if ($this->session->userdata('user_id')) {
            $data['package'] = $this->Package_model->get_allpackages();
            $data['content'] = 'admin/varient.php';
            $this->load->view('admin/common/templet', $data);
        } else {
            $this->load->view('admin/login.php');
        }

    }

    public function addproduct_pakage()
    {
        if ($this->session->userdata('user_id')) {

            $data['subcategories'] = $this->Subcategory->get_allsubcategory();
            $data['categories'] = $this->Category_model->get_allcategory();
            $data['products'] = $this->Product_model->get_allproduct();
            $data['package'] = $this->Package_model->get_allpakagelist();
            $data['content'] = 'admin/product_package.php';
            $this->load->view('admin/common/templet', $data);
        } else {
            $this->load->view('admin/login.php');
        }

    }

    public function get_prod()
    {
        extract($_POST);

        $data = $this->Product_model->get_allproductBycatidandsubcatid($subcatid, $catid);
        print_r(json_encode($data));
        exit;
    }


    public function add_package()
    {
        if ($this->session->userdata('user_id')) {
            extract($_POST);

            $data = [
                'unit_type' => $pkgtype,
                'value' => $pkgvalue
            ];
            $result = $this->Package_model->add_package($data);
            if ($result > 0) {
                $this->session->set_flashdata('success', 'successfully Added');
                redirect('admin/addproduct_pakage');
            } else {
                $this->session->set_flashdata('error', 'Something went wrong!!');
                redirect('admin/addproduct_pakage');
            }

        } else {
            $this->load->view('admin/login.php');
        }


    }

    public function add_Varient()
    {
        if ($this->session->userdata('user_id')) {
            extract($_POST);

            $data = [
                'product_id' => $product_id,
                'category_id' => $category_id,
                'subcategory_id' => !empty($subcategory_id) ? $subcategory_id : 0,
                'variant_name' => $varient_name,
                'variant_price' => json_encode($price),
                'package_id' => json_encode($pkgtype_id),
                'package_value' => json_encode($pkgweight),
                'variant_sellingprice' => json_encode($sellingprice)
            ];

            $result = $this->Varient_model->add_varient($data);
            if ($result > 0) {
                $this->session->set_flashdata('success', 'successfully Added');
                redirect('admin/product_varient');
            } else {
                $this->session->set_flashdata('error', 'Something went wrong!!');
                redirect('admin/product_varient');
            }


        } else {
            $this->load->view('admin/login.php');
        }
    }


    public function get_pakagevalue()
    {
        extract($_POST);

        $pkgdetails = $this->Package_model->get_pakagevalues($pkgid);
        print_r(json_encode($pkgdetails));
    }

    public function settings()
    {
        if (!$this->session->userdata('user_id')) {
            redirect(base_url('AuthController'));
        }

        $admin_id = $this->session->userdata('user_id');


        $this->load->model('Users_model');
        $this->load->model('Settings_model');

        $data['admin_data'] = $this->Users_model->get_userbyid($admin_id);
        $data['razorpay_settings'] = $this->Settings_model->get_razorpay_settings();
        $data['current_logo'] = $this->Settings_model->get_setting('site_logo');
        $data['content'] = 'admin/settings';

        $this->load->view('admin/common/templet', $data);
    }

    /**
     * Handles the form submission for updating the admin profile.
     */
    public function update_profile()
    {
        if (!$this->session->userdata('user_id')) {
            redirect(base_url('AuthController'));
        }

        $admin_id = $this->session->userdata('user_id');

        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model('Users_model');

        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
        $this->form_validation->set_rules('phone', 'Phone Number', 'trim');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect(base_url('admin/settings'));
        } else {
            $new_username = $this->input->post('username');


            if ($this->Users_model->is_username_taken($new_username, $admin_id)) {
                $this->session->set_flashdata('error', 'That username is already taken by another account.');
                redirect(base_url('admin/settings'));
                return;
            }
            $update_data = array(
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'mobile' => $this->input->post('mobile')
            );

            if (!empty($_FILES['profile_pic']['name'])) {
                $config['upload_path'] = './upload/profile/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = 2048;
                $config['file_name'] = 'admin_' . $admin_id . '_' . time();

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('profile_pic')) {
                    $upload_data = $this->upload->data();
                    $update_data['profile_pic'] = $upload_data['file_name'];
                } else {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect(base_url('admin/settings'));
                    return;
                }
            }

            $result = $this->Users_model->update_profile($admin_id, $update_data);

            if ($result) {
                $this->session->set_flashdata('success', 'Profile updated successfully!');
                $this->session->set_userdata('username', $this->input->post('username'));
                if (isset($update_data['profile_pic'])) {
                    $this->session->set_userdata('profile_pic', $update_data['profile_pic']);
                }
            } else {
                $this->session->set_flashdata('error', 'Failed to update profile. Please try again.');
            }

            redirect(base_url('admin/settings'));
        }
    }

    /**
     * Upload site logo
     */
    public function upload_logo()
    {
        if (!$this->session->userdata('user_id')) {
            redirect(base_url('AuthController'));
        }

        $this->load->model('Settings_model');

        // Create upload directory if it doesn't exist
        $upload_path = './upload/logo/';
        if (!is_dir($upload_path)) {
            mkdir($upload_path, 0755, true);
        }

        if (!empty($_FILES['site_logo']['name'])) {
            $config['upload_path'] = $upload_path;
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 2048; // 2MB
            $config['file_name'] = 'logo_' . time();

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('site_logo')) {
                $upload_data = $this->upload->data();

                // Delete old logo if exists
                $old_logo = $this->Settings_model->get_setting('site_logo');
                if ($old_logo && file_exists($upload_path . $old_logo)) {
                    unlink($upload_path . $old_logo);
                }

                // Save new logo filename
                $this->Settings_model->set_setting('site_logo', $upload_data['file_name']);

                $this->session->set_flashdata('success', 'Logo uploaded successfully!');
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
            }
        } else {
            $this->session->set_flashdata('error', 'Please select a logo file to upload.');
        }

        redirect(base_url('admin/settings'));
    }

    /**
     * Save Razorpay API settings
     */
    public function save_razorpay_settings()
    {
        if (!$this->session->userdata('user_id')) {
            redirect(base_url('AuthController'));
        }

        $this->load->model('Settings_model');

        $key_id = $this->input->post('razorpay_key_id');
        $key_secret = $this->input->post('razorpay_key_secret');

        if (empty($key_id) || empty($key_secret)) {
            $this->session->set_flashdata('error', 'Both Razorpay Key ID and Key Secret are required.');
            redirect(base_url('admin/settings'));
            return;
        }

        $result1 = $this->Settings_model->set_setting('razorpay_key_id', $key_id);
        $result2 = $this->Settings_model->set_setting('razorpay_key_secret', $key_secret);

        if ($result1 && $result2) {
            $this->session->set_flashdata('success', 'Razorpay settings saved successfully!');
        } else {
            $this->session->set_flashdata('error', 'Failed to save Razorpay settings. Please try again.');
        }

        redirect(base_url('admin/settings'));
    }

    public function user_orders($user_id)
    {
        $this->load->model('Order_model');
        $this->load->model('Users_model');

        $data['orders'] = $this->Order_model->get_orders_by_user_id($user_id);

        $data['user_info'] = $this->Users_model->get_userbyid($user_id);

        $data['content'] = 'admin/user_orders_list';

        $this->load->view('admin/common/templet', $data);
    }


    public function reports()
    {
        if (!$this->session->userdata('user_id')) {
            redirect(base_url('AuthController'));
        }

        $this->load->model('Order_model');


        $sales_data = $this->Order_model->get_sales_over_time();
        $data['sales_chart_data'] = json_encode($sales_data);

        $product_data = $this->Order_model->get_top_selling_products();
        $product_labels = [];
        $product_series = [];
        foreach ($product_data as $product) {
            $product_labels[] = $product->product_name;
            $product_series[] = (int) $product->total_sold;
        }
        $data['product_chart_labels'] = json_encode($product_labels);
        $data['product_chart_series'] = json_encode($product_series);

        $data['content'] = 'admin/reports_view';

        $this->load->view('admin/common/templet', $data);
    }
    public function invoice()
    {
        if (!$this->session->userdata('user_id')) {
            redirect(base_url('AuthController'));
        }

        $data['content'] = 'admin/invoice_view';

        $this->load->view('admin/common/templet', $data);
    }

    /**
     * Updates the order status via AJAX
     */
    public function update_order_status()
    {
        // Clean any previous output (whitespace, warnings)
        @ob_clean();

        // Prepare default response
        $response = ['status' => 'error', 'message' => 'Unauthorized'];

        if ($this->session->userdata('user_id')) {
            $order_id = $this->input->post('order_id');
            $status = $this->input->post('status');

            log_message('error', 'Update Order Status Request: Order ID: ' . $order_id . ', Status: ' . $status);

            $this->load->model('Order_model');
            $this->load->model('Notifications_model'); // Load here to be safe

            // Determine if this is a cancellation by admin
            $cancelled_by = null;
            if ($status == '0' || $status == '5') { // Cancelled status (supporting both for compatibility)
                $cancelled_by = 'admin';
                // Standardize to status 0 for cancelled
                if ($status == '5') {
                    $status = '0';
                }
            }

            $result = $this->Order_model->update_status($order_id, $status, $cancelled_by);

            log_message('error', 'Order Update Result: ' . ($result ? 'Success' : 'Failure'));

            if ($result) {
                // Get order details for notification
                $order_query = $this->db->get_where('orders', ['id' => $order_id]);
                $order = $order_query->row();

                if ($order) {

                    // Create notification based on status
                    // Create notification based on status
                    if ($status == '2') { // Confirmed
                        $this->Notifications_model->create_notification([
                            'user_id' => $order->user_id,
                            'order_id' => $order_id,
                            'type' => 'order_confirmed',
                            'title' => 'Order Confirmed',
                            'message' => 'Your order #' . $order->order_number . ' has been confirmed and is being processed.'
                        ]);
                    } elseif ($status == '3') { // Shipped
                        $this->Notifications_model->create_notification([
                            'user_id' => $order->user_id,
                            'order_id' => $order_id,
                            'type' => 'order_shipped',
                            'title' => 'Order Shipped',
                            'message' => 'Your order #' . $order->order_number . ' has been shipped and is on its way to you!'
                        ]);
                        // Create admin notification
                        $this->Notifications_model->create_admin_notification([
                            'order_id' => $order_id,
                            'type' => 'order_shipped',
                            'title' => 'Order Shipped',
                            'message' => 'Order #' . $order->order_number . ' has been shipped successfully.'
                        ]);
                    } elseif ($status == '4') { // Delivered
                        $this->Notifications_model->create_notification([
                            'user_id' => $order->user_id,
                            'order_id' => $order_id,
                            'type' => 'order_delivered',
                            'title' => 'Order Delivered',
                            'message' => 'Your order #' . $order->order_number . ' has been delivered successfully. Thank you for shopping with us!'
                        ]);
                        // Create admin notification
                        $this->Notifications_model->create_admin_notification([
                            'order_id' => $order_id,
                            'type' => 'order_delivered',
                            'title' => 'Order Delivered',
                            'message' => 'Order #' . $order->order_number . ' has been delivered successfully.'
                        ]);
                    } elseif ($status == '0') { // Cancelled
                        log_message('error', 'Attempting to create cancellation notification for Order ID: ' . $order_id);
                        $notif_id = $this->Notifications_model->create_notification([
                            'user_id' => $order->user_id,
                            'order_id' => $order_id,
                            'type' => 'order_cancelled',
                            'title' => 'Order Cancelled by Admin',
                            'message' => 'Your order #' . $order->order_number . ' has been cancelled by admin. If paid, the amount will be credited to your wallet.'
                        ]);
                        log_message('error', 'Notification created with ID: ' . $notif_id);
                        // Create admin notification
                        $this->Notifications_model->create_admin_notification([
                            'order_id' => $order_id,
                            'type' => 'order_cancelled_admin',
                            'title' => 'Order Cancelled by Admin',
                            'message' => 'Order #' . $order->order_number . ' has been cancelled by admin. Amount refunded if paid.'
                        ]);
                    }
                }

                $response = ['status' => 'success', 'message' => 'Order status updated'];
            } else {
                $response = ['status' => 'error', 'message' => 'Failed to update database'];
            }
        } else {
            $response = ['status' => 'error', 'message' => 'Session expired. Please login again.'];
        }

        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }

    // --- Delivery Charge Functions ---

    public function delivery_charges()
    {
        if ($this->session->userdata('user_id')) {
            $this->load->model('Delivery_model');
            $data['content'] = 'admin/delivery_charges';
            $data['charges'] = $this->Delivery_model->get_all_charges();
            $this->load->view('admin/common/templet', $data);
        } else {
            $this->load->view('admin/login.php');
        }
    }

    public function add_delivery_charge()
    {
        if ($this->session->userdata('user_id')) {
            $this->load->model('Delivery_model');

            $data = array(
                'name' => $this->input->post('charge_name'),
                'amount' => $this->input->post('amount'),
                'status' => 1
            );

            if ($this->Delivery_model->add_charge($data)) {
                $this->session->set_flashdata("success", "Delivery charge added successfully");
            } else {
                $this->session->set_flashdata("error", "Failed to add charge.");
            }
            redirect('admin/delivery_charges', 'refresh');
        } else {
            $this->load->view('admin/login.php');
        }
    }

    public function delete_delivery_charge($id)
    {
        if ($this->session->userdata('user_id')) {
            $this->load->model('Delivery_model');
            if ($this->Delivery_model->delete_charge($id)) {
                $this->session->set_flashdata("success", "Deleted successfully");
            } else {
                $this->session->set_flashdata("error", "Failed to delete");
            }
            redirect('admin/delivery_charges', 'refresh');
        }
    }
    public function coupon_list()
    {
        if ($this->session->userdata('user_id')) {
            $this->load->model('Coupon_model');
            $data['coupons'] = $this->Coupon_model->get_all_coupons();
            $data['content'] = 'admin/coupon_list'; // We will create this view
            $this->load->view('admin/common/templet', $data);
        } else {
            $this->load->view('admin/login.php');
        }
    }

    public function add_coupon()
    {
        if ($this->session->userdata('user_id')) {
            $this->load->model('Coupon_model');

            $data = array(
                'code' => strtoupper($this->input->post('code')),
                'type' => $this->input->post('type'),
                'value' => $this->input->post('value'),
                'min_cart_value' => $this->input->post('min_cart_value'),
                'expiry_date' => $this->input->post('expiry_date'),
                'status' => 1
            );

            if ($this->Coupon_model->add_coupon($data)) {
                $this->session->set_flashdata("success", "Coupon Created Successfully");
            } else {
                $this->session->set_flashdata("error", "Failed to create coupon");
            }
            redirect('admin/coupon_list', 'refresh');
        } else {
            $this->load->view('admin/login.php');
        }
    }

    public function delete_coupon($id)
    {
        if ($this->session->userdata('user_id')) {
            $this->load->model('Coupon_model');
            $this->Coupon_model->delete_coupon($id);
            $this->session->set_flashdata("success", "Coupon Deleted");
            redirect('admin/coupon_list', 'refresh');
        }
    }

    // =========================================================================
    // BANNER MANAGEMENT FUNCTIONS
    // =========================================================================

    public function banners()
    {
        if ($this->session->userdata('user_id')) {
            $data['banners'] = $this->Banner_model->get_all_banners();
            $data['content'] = 'admin/banners';
            $this->load->view('admin/common/templet', $data);
        } else {
            $this->load->view('admin/login.php');
        }
    }

    public function add_banner()
    {
        if ($this->session->userdata('user_id')) {
            try {
                extract($_POST);
                extract($_FILES);

                // Validate required fields
                if (empty($title) || empty($_FILES['banner_image']['name'])) {
                    $this->session->set_flashdata("error", "Title and Banner Image are required.");
                    redirect('admin/banners', 'refresh');
                    return;
                }

                // Handle image upload
                $uploaddir = 'upload/banners/';
                if (!is_dir($uploaddir)) {
                    mkdir($uploaddir, 0777, true);
                }

                $banner_image = uniqid() . '_' . str_replace(' ', '_', $_FILES['banner_image']['name']);
                $uploadfile = $uploaddir . $banner_image;
                $fileuploadstatus = move_uploaded_file($_FILES['banner_image']['tmp_name'], $uploadfile);

                if ($fileuploadstatus) {
                    $data = array(
                        'title' => $title,
                        'description' => isset($description) ? $description : '',
                        'image_path' => $banner_image,
                        'link_url' => isset($link_url) ? $link_url : '',
                        'status' => isset($status) ? $status : 'active',
                        'display_order' => isset($display_order) ? $display_order : 0
                    );

                    $banner_id = $this->Banner_model->add_banner($data);

                    if ($banner_id) {
                        $this->session->set_flashdata("success", "Banner added successfully.");
                    } else {
                        // Delete uploaded file if database insert failed
                        if (file_exists($uploadfile)) {
                            unlink($uploadfile);
                        }
                        $this->session->set_flashdata("error", "Failed to add banner.");
                    }
                } else {
                    $this->session->set_flashdata("error", "Failed to upload banner image.");
                }
            } catch (Exception $e) {
                $this->session->set_flashdata("error", "Error: " . $e->getMessage());
            }

            redirect('admin/banners', 'refresh');
        } else {
            $this->load->view('admin/login.php');
        }
    }

    public function edit_banner()
    {
        if ($this->session->userdata('user_id')) {
            try {
                extract($_POST);
                extract($_FILES);

                $banner_id = $this->input->post('banner_id');
                if (empty($banner_id)) {
                    $this->session->set_flashdata("error", "Banner ID is required.");
                    redirect('admin/banners', 'refresh');
                    return;
                }

                $data = array(
                    'title' => $this->input->post('title'),
                    'description' => $this->input->post('description'),
                    'link_url' => $this->input->post('link_url'),
                    'status' => $this->input->post('status'),
                    'display_order' => $this->input->post('display_order')
                );

                // Handle image upload if new image is provided
                if (!empty($_FILES['banner_image']['name'])) {
                    $uploaddir = 'upload/banners/';
                    $old_banner = $this->Banner_model->get_banner_by_id($banner_id);

                    // Delete old image
                    if ($old_banner && !empty($old_banner->image_path)) {
                        $old_image_path = $uploaddir . $old_banner->image_path;
                        if (file_exists($old_image_path)) {
                            unlink($old_image_path);
                        }
                    }

                    // Upload new image
                    $banner_image = uniqid() . '_' . str_replace(' ', '_', $_FILES['banner_image']['name']);
                    $uploadfile = $uploaddir . $banner_image;
                    $fileuploadstatus = move_uploaded_file($_FILES['banner_image']['tmp_name'], $uploadfile);

                    if ($fileuploadstatus) {
                        $data['image_path'] = $banner_image;
                    } else {
                        $this->session->set_flashdata("error", "Failed to upload new banner image.");
                        redirect('admin/banners', 'refresh');
                        return;
                    }
                }

                if ($this->Banner_model->update_banner($banner_id, $data)) {
                    $this->session->set_flashdata("success", "Banner updated successfully.");
                } else {
                    $this->session->set_flashdata("error", "Failed to update banner.");
                }
            } catch (Exception $e) {
                $this->session->set_flashdata("error", "Error: " . $e->getMessage());
            }

            redirect('admin/banners', 'refresh');
        } else {
            $this->load->view('admin/login.php');
        }
    }

    public function delete_banner($id)
    {
        if ($this->session->userdata('user_id')) {
            try {
                if ($this->Banner_model->delete_banner($id)) {
                    $this->session->set_flashdata("success", "Banner deleted successfully.");
                } else {
                    $this->session->set_flashdata("error", "Failed to delete banner.");
                }
            } catch (Exception $e) {
                $this->session->set_flashdata("error", "Error: " . $e->getMessage());
            }
            redirect('admin/banners', 'refresh');
        } else {
            $this->load->view('admin/login.php');
        }
    }

    public function get_banner($id)
    {
        if ($this->session->userdata('user_id')) {
            $banner = $this->Banner_model->get_banner_by_id($id);
            if ($banner) {
                $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode(array(
                        'success' => true,
                        'data' => array(
                            'id' => $banner->id,
                            'title' => $banner->title,
                            'description' => $banner->description,
                            'image_path' => $banner->image_path,
                            'link_url' => $banner->link_url,
                            'status' => $banner->status,
                            'display_order' => $banner->display_order
                        )
                    )));
            } else {
                $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode(array('success' => false, 'message' => 'Banner not found')));
            }
        } else {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('success' => false, 'message' => 'Unauthorized')));
        }
    }

    // =========================================================================
    // REFUND MANAGEMENT FUNCTIONS
    // =========================================================================

    /**
     * Display refund management page with all cancelled orders
     */
    public function refund_management()
    {
        if ($this->session->userdata('user_id')) {
            $data['refund_requests'] = $this->Refund_model->get_all_refund_requests();
            $data['refund_stats'] = $this->Refund_model->get_refund_stats();
            $data['content'] = 'admin/refund_management';
            $this->load->view('admin/common/templet', $data);
        } else {
            $this->load->view('admin/login.php');
        }
    }

    /**
     * Get refund details by order ID (AJAX)
     */
    public function get_refund_details($order_id)
    {
        if ($this->session->userdata('user_id')) {
            $refund = $this->Refund_model->get_refund_by_order_id($order_id);

            if ($refund) {
                $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode(array(
                        'success' => true,
                        'data' => $refund
                    )));
            } else {
                $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode(array(
                        'success' => false,
                        'message' => 'Order not found'
                    )));
            }
        } else {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('success' => false, 'message' => 'Unauthorized')));
        }
    }

    /**
     * Process refund and credit to wallet (AJAX)
     */
    public function process_refund()
    {
        if ($this->session->userdata('user_id')) {
            $order_id = $this->input->post('order_id');
            $refund_amount = $this->input->post('refund_amount');
            $user_id = $this->input->post('user_id');
            $refund_reason = $this->input->post('refund_reason');

            if (empty($order_id) || empty($refund_amount) || empty($user_id)) {
                $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode(array(
                        'success' => false,
                        'message' => 'Missing required parameters'
                    )));
                return;
            }

            // Validate refund amount
            if ($refund_amount <= 0) {
                $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode(array(
                        'success' => false,
                        'message' => 'Invalid refund amount'
                    )));
                return;
            }

            // Process refund
            $result = $this->Refund_model->process_refund(
                $order_id,
                $user_id,
                $refund_amount,
                $refund_reason ?: 'Order Cancellation'
            );

            if ($result) {
                $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode(array(
                        'success' => true,
                        'message' => 'Refund processed successfully. Amount credited to user wallet.'
                    )));
            } else {
                $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode(array(
                        'success' => false,
                        'message' => 'Failed to process refund. Please try again.'
                    )));
            }
        } else {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('success' => false, 'message' => 'Unauthorized')));
        }
    }

    /**
     * Admin Notifications Page
     */
    public function notifications()
    {
        $this->load->model('Notifications_model');
        $data['notifications'] = $this->Notifications_model->get_all_admin_notifications(100, 0);
        $data['unread_count'] = $this->Notifications_model->get_admin_unread_count();
        $data['content'] = 'admin/notifications';
        $this->load->view('admin/common/templet', $data);
    }
}






