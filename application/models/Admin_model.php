<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
   function __construct()
   {
      parent::__construct();
      $this->load->library('encryption');
   }

   public function Create_users($userdata)
   {
      //print_r($userdata);exit;
      $table = 'users';
      try {
         $response = array("STATUS" => "false", "Message" => "Something went wrong please try again");
         $data = $this->db->insert($table, $userdata);
         if ($this->db->insert_id() > 0) {
            $user_id = $this->db->insert_id();
            return $user_id;
         } else {
            return false;
         }
      } catch (Exeption $e) {
         $err_msg = $e->getMessage();
         $response['Message'] = $err_msg;
      }
      return $response;
   }


   public function validate_login($data)
   {
       try {
           $response = array("STATUS" => "false", "Message" => "Something went wrong please try again");
           
           // Trim whitespace from incoming data
           $email_or_username = trim($data['email']); // This could be email or username
           $password_hash = trim($data['password']); // This is the SHA1 hash from the controller

           // Use CodeIgniter's Query Builder - check both email and username
           $this->db->group_start();
           $this->db->where('LOWER(email)', strtolower($email_or_username));
           $this->db->or_where('LOWER(username)', strtolower($email_or_username));
           $this->db->group_end();
           $this->db->where('usertype', 'Admin'); // Ensure it's an admin user
           $result = $this->db->get('users');

           if ($result->num_rows() > 0) {
               $user_data = $result->row();

               // Get the stored password and trim it
               $stored_password = trim($user_data->password);
               
               // Compare passwords (both should be SHA1 hashes) - use strict comparison
               if ($stored_password === $password_hash) {
                   return $user_data; // Success!
               } else {
                   // Debug: Log the comparison (remove in production)
                   log_message('debug', 'Password mismatch. Stored: ' . substr($stored_password, 0, 10) . '... Provided: ' . substr($password_hash, 0, 10) . '...');
                   return false; // Passwords do not match
               }
           } else {
               // Debug: Log when user not found
               log_message('debug', 'User not found with email/username: ' . $email_or_username);
               return false; // No user found with that email/username
           }

       } catch (Exception $e) {
           $err_msg = $e->getMessage();
           $response['Message'] = $err_msg;
           log_message('error', 'Login validation error: ' . $err_msg);
       }
       
       return false; // Return false on error
   }

  public function getProductFilteredData($type, $categoryId, $subtype, $limit, $offset ,$search = null) // MODIFIED: Added limit and offset
   {
      // Select all columns from the product table
      $this->db->select('*');
      $this->db->from('product'); // MODIFIED: Added from()

      // Apply the filter conditions for type
      if ($type === '1') {
         // If type is '1', fetch all general products
         $this->db->where('type', 1);
      } elseif ($type === '2') {
         // If type is '2', fetch all addon products
         $this->db->where('type', 2);
      }

      // Apply the filter condition for category
      if ($categoryId !== null && $categoryId !== 'empty') {
         $this->db->where('category_id', $categoryId);
      }

      // Apply the filter condition for subtype
      if ($subtype !== null && $subtype !== 'empty') {
         $this->db->where('subcategory_id', $subtype);
        }
      if (!empty($search)) {
         $this->db->group_start(); 
         $this->db->like('product_name', $search);
         // Optional: Enable this if you want to search descriptions too
         // $this->db->or_like('description', $search); 
         $this->db->group_end();
      }

      // NEW: Apply the limit and offset for pagination
      $this->db->limit($limit, $offset);

      // Execute the query and return the result
      $query = $this->db->get();
      return $query->result();
   }

   public function getOccasionProductFilteredData($type, $category, $subtype, $occasion_id)
   {
       // Select columns from the product table
       $this->db->select('p.*');
   
       // Join the occasion_product table
       $this->db->from('product p');
       $this->db->join('occasion_product op', 'p.id = op.product_id');
   
       // Apply the filter conditions for type
       if ($type === '1') {
           // If type is '1', fetch all general products
           $this->db->where('p.type', 1);
       } elseif ($type === '2') {
           // If type is '2', fetch all addon products
           $this->db->where('p.type', 2);
       }
   
       // Apply the filter condition for category
       if ($category !== null && $category !== 'empty') {
           $this.db->where('p.category_id', $category);
       }
   
       // Apply the filter condition for subtype
       if ($subtype !== null && $subtype !== 'empty') {
           $this.db->where('p.subcategory_id', $subtype);
       }
   
       // Apply the filter condition for occasion_id
       if ($occasion_id !== null) {
           $this.db->where('op.occasion_id', $occasion_id);
       }
   
       // Execute the query and return the result
       $query = $this->db->get();
       return $query->result();
   }
   
}