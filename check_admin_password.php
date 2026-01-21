<?php
/**
 * Script to check and update admin password
 * Run this file directly to check/update admin credentials
 */

// Define the base path of the CodeIgniter application
define('BASEPATH', 'system/');
define('ENVIRONMENT', 'development');

// Change to application directory
chdir(__DIR__);

// Load CodeIgniter
require_once('system/core/CodeIgniter.php');

$CI =& get_instance();
$CI->load->database();

// Admin email (change this to your admin email)
$admin_email = 'myadmin'; // or 'admin1@gmail.com' or whatever your admin email is

// Get admin user
$CI->db->where('LOWER(email)', strtolower($admin_email));
$CI->db->where('usertype', 'Admin');
$query = $CI->db->get('users');

if ($query->num_rows() > 0) {
    $admin = $query->row();
    
    echo "Admin User Found:\n";
    echo "ID: " . $admin->id . "\n";
    echo "Email: " . $admin->email . "\n";
    echo "Username: " . (isset($admin->username) ? $admin->username : 'N/A') . "\n";
    echo "User Type: " . $admin->usertype . "\n";
    echo "Current Password Hash: " . $admin->password . "\n";
    echo "Password Hash Length: " . strlen($admin->password) . "\n\n";
    
    // Test password
    $test_password = 'password@123';
    $test_hash = sha1($test_password);
    
    echo "Testing password: " . $test_password . "\n";
    echo "SHA1 Hash: " . $test_hash . "\n";
    echo "Match: " . (trim($admin->password) === $test_hash ? "YES" : "NO") . "\n\n";
    
    // Option to update password
    echo "Do you want to update the password to 'password@123'? (This will update the database)\n";
    echo "Uncomment the code below to update:\n";
    echo "// \$CI->db->where('id', " . $admin->id . ");\n";
    echo "// \$CI->db->update('users', array('password' => sha1('password@123')));\n";
    echo "// echo 'Password updated successfully!';\n";
    
    // Uncomment these lines to actually update the password:
    // $CI->db->where('id', $admin->id);
    // $CI->db->update('users', array('password' => sha1('password@123')));
    // echo "\nPassword updated successfully!\n";
    
} else {
    echo "No admin user found with email: " . $admin_email . "\n";
    echo "\nAvailable admin users:\n";
    $CI->db->where('usertype', 'Admin');
    $all_admins = $CI->db->get('users');
    foreach ($all_admins->result() as $user) {
        echo "ID: " . $user->id . " | Email: " . $user->email . " | Username: " . (isset($user->username) ? $user->username : 'N/A') . "\n";
    }
}

?>
