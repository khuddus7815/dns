<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product_reviews_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->create_table_if_not_exists();
    }

    private function create_table_if_not_exists()
    {
        if (!$this->db->table_exists('product_reviews')) {
            $query = "CREATE TABLE IF NOT EXISTS product_reviews (
                id INT AUTO_INCREMENT PRIMARY KEY,
                user_id INT NOT NULL,
                product_id INT NOT NULL,
                order_id INT NOT NULL,
                rating INT NOT NULL CHECK (rating >= 1 AND rating <= 5),
                review TEXT,
                created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
                UNIQUE KEY unique_user_product_order (user_id, product_id, order_id)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
            $this->db->query($query);
        }
    }

    public function submit_review($data)
    {
        return $this->db->insert('product_reviews', $data);
    }

    public function check_if_rated($user_id, $product_id, $order_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->where('product_id', $product_id);
        $this->db->where('order_id', $order_id);
        $query = $this->db->get('product_reviews');
        return $query->num_rows() > 0;
    }

    public function get_product_reviews($product_id)
    {
        $this->db->select('product_reviews.*, users_detail.first_name, users_detail.last_name, users_detail.user_image');
        $this->db->from('product_reviews');
        $this->db->join('users_detail', 'product_reviews.user_id = users_detail.user_id', 'left');
        $this->db->where('product_id', $product_id);
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get()->result();
    }

    public function get_latest_reviews($limit = 5)
    {
        $this->db->select('product_reviews.*, users_detail.first_name, users_detail.last_name, users_detail.user_image');
        $this->db->from('product_reviews');
        $this->db->join('users_detail', 'product_reviews.user_id = users_detail.user_id', 'left');
        $this->db->order_by('product_reviews.created_at', 'DESC');
        $this->db->limit($limit);
        return $this->db->get()->result();
    }
}
