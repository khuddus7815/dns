<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Settings_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Get a setting value by key
     */
    public function get_setting($key)
    {
        // Check if settings table exists
        if (!$this->db->table_exists('settings')) {
            return null;
        }
        
        $this->db->where('setting_key', $key);
        $query = $this->db->get('settings');
        
        if ($query->num_rows() > 0) {
            return $query->row()->setting_value;
        }
        return null;
    }

    /**
     * Set/Update a setting value
     */
    public function set_setting($key, $value)
    {
        // Check if settings table exists, if not return false
        if (!$this->db->table_exists('settings')) {
            log_message('error', 'Settings table does not exist. Please run the database setup script.');
            return false;
        }
        
        $this->db->where('setting_key', $key);
        $query = $this->db->get('settings');
        
        if ($query->num_rows() > 0) {
            // Update existing setting
            $data = array(
                'setting_value' => $value,
                'updated_at' => date('Y-m-d H:i:s')
            );
            $this->db->where('setting_key', $key);
            return $this->db->update('settings', $data);
        } else {
            // Insert new setting
            $data = array(
                'setting_key' => $key,
                'setting_value' => $value,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            );
            return $this->db->insert('settings', $data);
        }
    }

    /**
     * Get all Razorpay settings
     */
    public function get_razorpay_settings()
    {
        // Check if settings table exists
        if (!$this->db->table_exists('settings')) {
            return array();
        }
        
        $this->db->where_in('setting_key', ['razorpay_key_id', 'razorpay_key_secret']);
        $query = $this->db->get('settings');
        
        $settings = array();
        foreach ($query->result() as $row) {
            $settings[$row->setting_key] = $row->setting_value;
        }
        
        return $settings;
    }

    /**
     * Check if Razorpay is configured
     */
    public function is_razorpay_configured()
    {
        // Check if settings table exists first
        if (!$this->db->table_exists('settings')) {
            return false;
        }
        
        $key_id = $this->get_setting('razorpay_key_id');
        $key_secret = $this->get_setting('razorpay_key_secret');
        
        return !empty($key_id) && !empty($key_secret);
    }
}
