<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Subcategory extends CI_Model
{
   function __construct()
   {
      parent::__construct();
      $this->load->library('encryption');
   }
   public function add_subcategory($data)
   {
      try {
         $table = 'subcategory';
         $response = array("STATUS" => "false", "Message" => "Something went wrong please try again");
         $data = $this->db->insert($table, $data);
         if ($this->db->insert_id() > 0) {
            $last_insertedid = $this->db->insert_id();
            return $last_insertedid;
         }
      } catch (Exception $e) {
         $err_msg = $e->getMessage();
         $response['Message'] = $err_msg;
      }

      return $response;
   }

   public function get_allsubcategory()
   {
      $res = $this->db->query("SELECT * from subcategory");
      return $res->result();
   }

   public function get_allsubcategorywithCategory()
   {
      $query = $this->db->query("
           SELECT s.id AS subcategory_id, s.subcategory_name, s.category_id, c.category_name , s.subcategory_image
           FROM subcategory s
           INNER JOIN category c ON s.category_id = c.id
       ");
      return $query->result();
   }




   public function get_allsubcategorybyid($id)
   {
      $res = $this->db->query("SELECT * from subcategory where subcategory.category_id=$id");
      // print_r($res->result());
      // exit;
      return $res->result();
   }


   public function get_bycategory($category)
   {
      // Join subcategory and category tables based on category name
      $this->db->select('subcategory.*');
      $this->db->from('subcategory');
      $this->db->join('category', 'subcategory.category_id = category.id');
      $this->db->where('category.category_name', $category);

      $query = $this->db->get();

      if ($query->num_rows() > 0) {
         // If subcategories are found, return the result
         return $query->result();
      } else {
         // If no subcategories found, return an empty array
         return array();
      }
   }

   public function get_subcategories_by_category_id($category_id)
   {
      $this->db->select('subcategory.*');
      $this->db->from('subcategory');
      $this->db->where('subcategory.category_id', $category_id);

      $query = $this->db->get();

      if ($query->num_rows() > 0) {
         // If subcategories are found, return the result
         return $query->result();
      } else {
         // If no subcategories found, return an empty array
         return array();
      }
   }


   public function get_forProduct($category_name)
   {
      // Assuming you're using a database library in PHP
      // Replace "subcategories_table" and "categories_table" with your actual table names

      // SQL query to join subcategories and categories based on category name
      $sql = "SELECT sub.* 
              FROM subcategory sub
              JOIN category cat ON sub.category_id = cat.id
              WHERE cat.category_name = ?";

      // Execute the query with the category name as a parameter
      $query = $this->db->query($sql, array($category_name));

      // Fetch the result
      $subcategories = $query->result();

      // Return the subcategories array
      return $subcategories;
   }

   public function update_subcategory($subcategory_id, $data)
   {

      try {
         $this->db->where('id', $subcategory_id);
         $this->db->update('subcategory', $data);

         return true;
      } catch (Exception $e) {   
         throw new Exception("Error updating subcategory: " . $e->getMessage());
      }
   }

   public function delete_subcategory($id)
   {
      try {
         $this->db->where('id', $id);
         $result = $this->db->delete('subcategory');

         if ($result) {
            return true;
         } else {
            return false;
         }
      } catch (Exception $e) {
         throw new Exception("Error deleting subcategory: " . $e->getMessage());
      }
   }

   public function get_subcategorybyid($id)
   {
      try {
         // Query to retrieve the subcategory by ID
         $this->db->where('id', $id);
         $query = $this->db->get('subcategory');

         // Check if the query returned any rows
         if ($query->num_rows() > 0) {
            // Return the subcategory data
            return $query->row();
         } else {
            // Return null if no subcategory found
            return null;
         }
      } catch (Exception $e) {
         // Throw an exception if an error occurs
         throw new Exception("Error retrieving subcategory: " . $e->getMessage());
      }
   }
}
