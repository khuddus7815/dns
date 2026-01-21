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

// Get the admin user from the database
$admin_user = $CI->db->get_where('users', array('email' => 'admin1@gmail.com'))->row();

// Print the admin user's data
print_r($admin_user);
?>