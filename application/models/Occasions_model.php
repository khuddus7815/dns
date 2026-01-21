<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Occasions_model extends CI_Model
{
   function __construct()
   {
      parent::__construct();
      $this->load->library('encryption');
   }
   public function add_occasion($data)
   {
      try {
         $table = 'occasion';
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

   public function get_alloccasions()
   {
      $res = $this->db->query("SELECT * from occasion");
      return $res->result();
   }

   public function get_fouroccasions()
   {
      $query = "SELECT * FROM occasion LIMIT 4";
      $res = $this->db->query($query);
      return $res->result();
   }

   public function get_occasionbyid($id)
   {
      // Query to retrieve the occasion by ID
      $this->db->where('id', $id);
      $query = $this->db->get('occasion');

      // Check if the query returned any rows
      if ($query->num_rows() > 0) {
         // Return the occasion data
         return $query->row();
      } else {
         // Return null if no occasion found
         return null;
      }
   }

   public function delete_occasion($id)
   {
      try {
         // Start a database transaction
         $this->db->trans_start();

         // 1. First, delete all related records from occasion_product table
         // This removes the foreign key constraint issue
         $this->db->where('occasion_id', $id);
         $this->db->delete('occasion_product');

         // 2. Now delete the occasion itself
         $this->db->where('id', $id);
         $this->db->delete('occasion');

         // Complete the transaction
         $this->db->trans_complete();

         // Check if transaction was successful
         if ($this->db->trans_status() === FALSE) {
            throw new Exception("Transaction failed while deleting occasion");
         }

         return true;
      } catch (Exception $e) {
         // Rollback transaction on error
         $this->db->trans_rollback();
         throw new Exception("Error deleting occasion: " . $e->getMessage());
      }
   }

   public function update_occasion($id, $data)
{
   try {
      // Update the occasion data
      $this->db->where('id', $id);
      $this->db->update('occasion', $data);

      // Check if any rows are affected
      if ($this->db->affected_rows() > 0) {
         return true; // Occasion updated successfully
      } else {
         return false; // No rows affected, possibly the occasion ID doesn't exist
      }
   } catch (Exception $e) {
      throw new Exception("Error updating occasion: " . $e->getMessage());
   }
}

}
