<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Delivery_model extends CI_Model
{
    public function get_all_charges()
    {
        return $this->db->get('delivery_charges')->result();
    }

    public function add_charge($data)
    {
        return $this->db->insert('delivery_charges', $data);
    }

    public function delete_charge($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('delivery_charges');
    }

    public function update_charge($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('delivery_charges', $data);
    }
    
    public function get_charge_by_id($id)
    {
        return $this->db->get_where('delivery_charges', ['id' => $id])->row();
    }
}