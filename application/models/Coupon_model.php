<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Coupon_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_coupons()
    {
        return $this->db->get('coupons')->result();
    }

    public function add_coupon($data)
    {
        return $this->db->insert('coupons', $data);
    }

    public function delete_coupon($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('coupons');
    }

    public function get_valid_coupon($code)
    {
        $today = date('Y-m-d');
        $this->db->where('code', $code);
        $this->db->where('status', 1);
        $this->db->where('expiry_date >=', $today);
        $query = $this->db->get('coupons');
        return $query->row();
    }
}