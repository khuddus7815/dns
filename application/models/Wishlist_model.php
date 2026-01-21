<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wishlist_model extends CI_Model
{
    public function get_wishlist_by_user($user_id)
    {
        // Check if wishlist table exists
        if (!$this->db->table_exists('wishlist')) {
            // Create wishlist table if it doesn't exist
            $this->create_wishlist_table();
        }
        
        $this->db->select('w.id as wishlist_id, p.*');
        $this->db->from('wishlist w');
        $this->db->join('product p', 'w.product_id = p.id');
        $this->db->where('w.user_id', $user_id);
        $query = $this->db->get();
        return $query->result();
    }
    
    private function create_wishlist_table()
    {
        $sql = "CREATE TABLE IF NOT EXISTS `wishlist` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `user_id` int(11) NOT NULL,
            `product_id` int(11) NOT NULL,
            `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (`id`),
            UNIQUE KEY `user_product` (`user_id`, `product_id`),
            KEY `user_id` (`user_id`),
            KEY `product_id` (`product_id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
        
        $this->db->query($sql);
    }

    public function add_to_wishlist($user_id, $product_id)
    {
        // Check if wishlist table exists
        if (!$this->db->table_exists('wishlist')) {
            $this->create_wishlist_table();
        }
        
        // Check if already exists
        $this->db->where('user_id', $user_id);
        $this->db->where('product_id', $product_id);
        $query = $this->db->get('wishlist');

        if ($query->num_rows() == 0) {
            $data = array(
                'user_id' => $user_id,
                'product_id' => $product_id
            );
            return $this->db->insert('wishlist', $data);
        }
        return false; // Already exists
    }

    public function remove_from_wishlist($user_id, $product_id)
    {
        // Check if wishlist table exists
        if (!$this->db->table_exists('wishlist')) {
            $this->create_wishlist_table();
        }
        
        $this->db->where('user_id', $user_id);
        $this->db->where('product_id', $product_id);
        return $this->db->delete('wishlist');
    }
    
    public function is_in_wishlist($user_id, $product_id) {
        // Check if wishlist table exists
        if (!$this->db->table_exists('wishlist')) {
            $this->create_wishlist_table();
        }
        
        $this->db->where('user_id', $user_id);
        $this->db->where('product_id', $product_id);
        return $this->db->count_all_results('wishlist') > 0;
    }
    
    public function get_wishlist_count($user_id) {
        // Check if wishlist table exists
        if (!$this->db->table_exists('wishlist')) {
            $this->create_wishlist_table();
        }
        
        $this->db->where('user_id', $user_id);
        return $this->db->count_all_results('wishlist');
    }
}