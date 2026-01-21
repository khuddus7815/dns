<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ApiKey_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    // Check if the key exists in the database
    public function isValidKey($key)
    {
        $this->db->where('key', $key);
        $query = $this->db->get('api_keys');
        
        if ($query->num_rows() > 0) {
            return true;
        }
        return false;
    }

    // Helper to generate a new random key (if you build an admin generator later)
    public function generateKey()
    {
        return bin2hex(random_bytes(32));
    }
}