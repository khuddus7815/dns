<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Varient_model extends CI_Model
{

    public function add_varient($data)
    {
        $this->db->insert('variants', $data);
        return $this->db->insert_id();
    }


    public function get_variants_by_product_id($product_id)
    {
        $this->db->where('product_id', $product_id);
        $query = $this->db->get('variants');
        return $query->result();
    }

    public function delete_variants_by_product_id($product_id)
    {
        $this->db->where('product_id', $product_id);
        return $this->db->delete('variants');
    }
}
