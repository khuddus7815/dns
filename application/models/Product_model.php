<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends CI_Model
{
   function __construct()
   {
      parent::__construct();
      $this->load->library('encryption');
   }
   public function add_product($data)
   {
      try {
         $table = 'product';
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

   public function get_allproduct()
   {
      //give where condition for the active
      $query = $this->db->query("SELECT p.id AS product_id, p.*, c.id AS category_id, c.* FROM product p INNER JOIN category c ON p.category_id = c.id");
      return $query->result();
   }

   public function get_occasion_product($id)
   {
       // Join the occasion_product table and filter by the given occasion_id
       $this->db->select('p.id AS product_id, p.*, c.id AS category_id, c.*');
       $this->db->from('occasion_product op');
       $this->db->join('product p', 'op.product_id = p.id');
       $this->db->join('category c', 'p.category_id = c.id');
       $this->db->where('op.occasion_id', $id);
       
       $query = $this->db->get();
       return $query->result();
   }
   
   

   public function get_productbySubcategory($subcategory_id)
   {
      $this->db->select('product.*');
      $this->db->from('product');
      $this->db->where('type', 2);
      $this->db->where('product.subcategory_id', $subcategory_id);


      $query = $this->db->get();

      if ($query->num_rows() > 0) {
         // If products are found, return the result
         return $query->result();
      } else {
         // If no products found, return an empty array
         return array();
      }
   }

   public function get_byCategory($category_name)
   {
      // Assuming 'products' and 'category' are the table names and 'category_id' is the foreign key in the 'products' table
      $this->db->select('*');
      $this->db->from('product');
      $this->db->join('category', 'product.category_id = category.id');

      $this->db->where('category.category_name', $category_name);
      $this->db->where('type', 2);


      $query = $this->db->get();

      if ($query->num_rows() > 0) {
         return $query->result();
      } else {
         return false;
      }
   }

   public function get_byId($id)
   {
      $this->db->where('id', $id);
      $query = $this->db->get('product');

      if ($query->num_rows() > 0) {
         return $query->row(); // Return a single row representing the product
      } else {
         return null; // Return null if no product found
      }
   }

   public function get_addonsbyCategoryId($id)
   {
      $this->db->where('category_id', $id);
      $this->db->where('type', 2);
      $query = $this->db->get('product');
      return $query->result();
   }

   public function get_addonsbySubCategoryId($id)
   {
      $this->db->where('subcategory_id', $id);
      $this->db->where('type', 2);
      $query = $this->db->get('product');
      return $query->result();
   }

   public function deleteProduct($id)
   {
      try {
         // Start a database transaction
         $this->db->trans_start();

         // 1. Delete from cart table (where product_id references this product)
         $this->db->where('product_id', $id);
         $this->db->delete('cart');

         // 2. Delete from addon_cart table (where addon_id references this product)
         $this->db->where('addon_id', $id);
         $this->db->delete('addon_cart');

         // 3. Delete from occasion_product table (where product_id references this product)
         $this->db->where('product_id', $id);
         $this->db->delete('occasion_product');

         // 4. Delete from wishlist table (where product_id references this product)
         if ($this->db->table_exists('wishlist')) {
            $this->db->where('product_id', $id);
            $this->db->delete('wishlist');
         }

         // 5. Delete from order_product table (where product_id references this product)
         // Note: We might want to keep order_product records for historical data
         // But if foreign key constraint exists, we need to delete them
         $this->db->where('product_id', $id);
         $this->db->delete('order_product');

         // 6. Delete variants linked to this product (if variants table has product_id)
         if ($this->db->table_exists('variants')) {
            $this->db->where('product_id', $id);
            $this->db->delete('variants');
         }

         // 7. Finally, delete the product itself
         $this->db->where('id', $id);
         $this->db->delete('product');

         // Complete the transaction
         $this->db->trans_complete();

         // Check if transaction was successful
         if ($this->db->trans_status() === FALSE) {
            throw new Exception("Transaction failed while deleting product");
         }

         return true;
      } catch (Exception $e) {
         // Rollback transaction on error
         $this->db->trans_rollback();
         throw new Exception("Error deleting product: " . $e->getMessage());
      }
   }

   public function update_product($id, $data)
   {
      try {
         $table = 'product';
         $this->db->where('id', $id);
         $this->db->update($table, $data);

         // Check if any rows were affected by the update
         if ($this->db->affected_rows() > 0) {
            return true; // Return true if update is successful
         } else {
            return false; // Return false if no rows were affected
         }
      } catch (Exception $e) {
         // Handle any exceptions that may occur
         throw new Exception("Error updating product: " . $e->getMessage());
      }
   }

   Public function get_allproductBycatidandsubcatid($subcatid,$catid){
      $data=$this->db->query("SELECT product.id,product.product_name FROM product where product.category_id='$catid' AND product.subcategory_id='$subcatid'");
      return $data->result();
   }





}
