<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Banner_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function add_banner($data)
    {
        try {
            $table = 'banners';
            $response = array("STATUS" => "false", "Message" => "Something went wrong please try again");
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['updated_at'] = date('Y-m-d H:i:s');
            $this->db->insert($table, $data);
            if ($this->db->insert_id() > 0) {
                $last_insertedid = $this->db->insert_id();
                return $last_insertedid;
            }
        } catch (Exception $e) {
            $err_msg = $e->getMessage();
            $response['Message'] = $err_msg;
        }

        return false;
    }

    public function get_banner_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('banners');
        $this->db->where('id', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }

    public function update_banner($id, $data)
    {
        try {
            $data['updated_at'] = date('Y-m-d H:i:s');
            $this->db->where('id', $id);
            return $this->db->update('banners', $data);
        } catch (Exception $e) {
            return false;
        }
    }

    public function delete_banner($id)
    {
        try {
            // Get banner image path before deleting
            $banner = $this->get_banner_by_id($id);
            if ($banner && !empty($banner->image_path)) {
                $image_path = 'upload/banners/' . $banner->image_path;
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }

            $this->db->where('id', $id);
            return $this->db->delete('banners');
        } catch (Exception $e) {
            return false;
        }
    }

    public function get_all_banners()
    {
        $this->db->select('*');
        $this->db->from('banners');
        $this->db->order_by('display_order', 'ASC');
        $this->db->order_by('created_at', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_active_banners()
    {
        $this->db->select('*');
        $this->db->from('banners');
        $this->db->where('status', 'active');
        $this->db->order_by('display_order', 'ASC');
        $this->db->order_by('created_at', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }
}
