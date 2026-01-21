<?php
// Define the base path of the CodeIgniter application
define('BASEPATH', 'system/');

// Define the application environment
define('ENVIRONMENT', 'development');

// Change the current directory to the application's root
chdir('application');

// Load the CodeIgniter framework
require_once('../system/core/CodeIgniter.php');

// Create a new CodeIgniter instance
$CI =& get_instance();

// Load the database library
$CI->load->database();

// The new password hash
$new_password_hash = 'f865b53623b121fd34ee5426c792e5c33af8c227';

// Update the admin user's password
$CI->db->where('email', 'admin1@gmail.com');
$CI->db->update('users', array('password' => $new_password_hash));

echo "Admin password updated successfully.";

?>