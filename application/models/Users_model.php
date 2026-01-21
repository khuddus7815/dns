<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users_model extends CI_Model
{

    public function register_user($data)
    {
        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }


    public function register_user_detail($data)
    {
        $this->db->insert('users_detail', $data);
    }

    public function get_user($username)
    {
        return $this->db->get_where('users', array('username' => $username))->row();
    }

    public function get_userbyid($id)
    {
        // FIX: Added users_detail.dob, users_detail.gender, and users_detail.user_image to the select list
        $this->db->select('users.*, users_detail.first_name, users_detail.last_name, users_detail.address, users_detail.dob, users_detail.gender, users_detail.user_image');
        $this->db->from('users');
        $this->db->where('users.id', $id);
        $this->db->join('users_detail', 'users.id = users_detail.user_id', 'left'); // Left join users_detail
        $query = $this->db->get();
        $result = $query->row(); 

        if (empty($result)) {
            // If no data found in users table, retrieve from users_detail
            // FIX: Added dob, gender, user_image here as well for consistency
            $this->db->select('users.id, username, email, password, usertype, created_at, mobile, first_name, last_name, address, dob, gender, user_image');
            $this->db->from('users_detail');
            $this->db->join('users', 'users.id = users_detail.user_id', 'left'); // Left join users
            $this->db->where('users_detail.user_id', $id);
            $query = $this->db->get();
            $result = $query->row(); 
        }

        return $result; // Return the single row
    }
    public function get_allusers()
    {
        $query = $this->db->query("
        SELECT DISTINCT u.*, ud.first_name, ud.last_name, ud.address
        FROM users u
        LEFT JOIN users_detail ud ON u.id = ud.user_id
        WHERE u.usertype = 'User'
        ORDER BY u.created_at DESC;
        
        
        ");
        return $query->result();
    }

    public function updateActive($userId, $isActive)
    {
        // Assuming $isActive is a boolean indicating whether the user should be active or not

        // Prepare the data for the update
        $data = array(
            'is_active' => $isActive ? 1 : 0 // Assuming 'active' column is a boolean (0 or 1)
        );

        // Where condition
        $this->db->where('id', $userId);

        // Perform the update
        $this->db->update('users', $data);

        // Return true if update is successful, otherwise return false
        return $this->db->affected_rows() > 0;
    }

    /**
     * NEW FUNCTION ADDED TO FIX THE ERROR
     * Fetches the user's address details from the 'users_detail' table.
     */
    function get_user_address($user_id) {
    $this->db->select('*'); // Selects all columns: id, fullname, phone, address, etc.
    $this->db->where('user_id', $user_id);
    return $this->db->get('users_address')->result();
}


    /**
     * Get a specific user's details by their ID.
     */
    public function get_user_details($user_id)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id', $user_id); // Fixed: Uses 'id' column with '$user_id' variable
        $query = $this->db->get();
        return $query->row(); // Return a single row object
    }

    /**
     * Update a user's profile data.
     */
    public function update_profile($user_id, $data)
    {
        $this->db->where('id', $user_id); // Fixed: Uses 'id' column with '$user_id' variable
        return $this->db->update('users', $data); // Returns true on success, false on failure
    }
    /**
     * Check if a username is taken by another user.
     */
    public function is_username_taken($username, $exclude_user_id)
    {
        $this->db->select('id');
        $this->db->from('users');
        $this->db->where('username', $username);
        $this->db->where('id !=', $exclude_user_id); 
        $query = $this->db->get();
        
        return $query->num_rows() > 0; // Returns true if taken, false if not
    }
public function delete_address_by_id($id)
   {
       $this->db->where('id', $id);
       $this->db->delete('users_address');
       return $this->db->affected_rows() > 0;
   }
   /**
     * Retrieves a single address record by its primary ID.
     * This is used to fetch the shipping address for an order.
     */
    public function getAddressById($address_id)
    {
        $this->db->select('*');
        $this->db->where('id', $address_id);
        $query = $this->db->get('users_address');
        
        // Return a single row object
        return $query->row(); 
    }
    public function login_user($username, $password)
    {
        // Get user by username or email
        $this->db->group_start();
        $this->db->where('username', $username);
        $this->db->or_where('email', $username);
        $this->db->group_end();
        
        $query = $this->db->get('users');
        $user = $query->row();

        if ($user) {
            // Verify Password
            // NOTE: Your registration uses password_hash, so we use password_verify here.
            // If you have old users with SHA1, you might need a dual check.
            if (password_verify($password, $user->password)) {
                
                // Get User Details to return
                $details = $this->get_userbyid($user->id);
                return $details;
            }
        }
        return false;
    }
   
}