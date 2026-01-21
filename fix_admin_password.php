<?php
/**
 * Simple script to update admin password
 * Run this from browser: http://yourdomain.com/fix_admin_password.php
 * Or from command line: php fix_admin_password.php
 */

// Database connection settings (update these if needed)
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'dns';

// Connect to database
$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Admin credentials to update
$admin_email_or_username = 'myadmin'; // Change this to your admin email or username
$new_password = 'password@123';
$new_password_hash = sha1($new_password);

echo "Updating admin password...\n";
echo "Looking for admin with email/username: " . $admin_email_or_username . "\n";
echo "New password: " . $new_password . "\n";
echo "New password hash: " . $new_password_hash . "\n\n";

// Find admin user (check both email and username)
$sql = "SELECT * FROM users WHERE (LOWER(email) = LOWER(?) OR LOWER(username) = LOWER(?)) AND usertype = 'Admin'";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $admin_email_or_username, $admin_email_or_username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $admin = $result->fetch_assoc();
    
    echo "Admin User Found:\n";
    echo "ID: " . $admin['id'] . "\n";
    echo "Email: " . $admin['email'] . "\n";
    echo "Username: " . (isset($admin['username']) ? $admin['username'] : 'N/A') . "\n";
    echo "User Type: " . $admin['usertype'] . "\n";
    echo "Current Password Hash: " . $admin['password'] . "\n\n";
    
    // Update password
    $update_sql = "UPDATE users SET password = ? WHERE id = ?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param("si", $new_password_hash, $admin['id']);
    
    if ($update_stmt->execute()) {
        echo "✓ Password updated successfully!\n";
        echo "You can now login with:\n";
        echo "  Email/Username: " . $admin_email_or_username . "\n";
        echo "  Password: " . $new_password . "\n";
    } else {
        echo "✗ Error updating password: " . $update_stmt->error . "\n";
    }
    
    $update_stmt->close();
} else {
    echo "✗ No admin user found with email/username: " . $admin_email_or_username . "\n\n";
    echo "Available admin users:\n";
    
    $all_admins = $conn->query("SELECT id, email, username, usertype FROM users WHERE usertype = 'Admin'");
    if ($all_admins->num_rows > 0) {
        while ($user = $all_admins->fetch_assoc()) {
            echo "  ID: " . $user['id'] . " | Email: " . $user['email'] . " | Username: " . ($user['username'] ?? 'N/A') . "\n";
        }
    } else {
        echo "  No admin users found in database.\n";
    }
}

$stmt->close();
$conn->close();

?>
