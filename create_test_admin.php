<?php
/**
 * Script to create a test admin user for login testing
 * Run this from browser: http://localhost/dns/create_test_admin.php
 * Or from command line: php create_test_admin.php
 */

// Database connection settings
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'dns';

// Connect to database
$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Test admin credentials
$admin_email = 'admin@test.com';
$admin_username = 'testadmin';
$admin_password = 'password@123';
$admin_password_hash = sha1($admin_password);

echo "Creating test admin user...\n";
echo "Email: " . $admin_email . "\n";
echo "Username: " . $admin_username . "\n";
echo "Password: " . $admin_password . "\n";
echo "Password Hash (SHA1): " . $admin_password_hash . "\n\n";

// Check if admin already exists
$check_sql = "SELECT * FROM users WHERE (LOWER(email) = LOWER(?) OR LOWER(username) = LOWER(?)) AND usertype = 'Admin'";
$check_stmt = $conn->prepare($check_sql);
$check_stmt->bind_param("ss", $admin_email, $admin_username);
$check_stmt->execute();
$result = $check_stmt->get_result();

if ($result->num_rows > 0) {
    $existing = $result->fetch_assoc();
    echo "Admin user already exists!\n";
    echo "ID: " . $existing['id'] . "\n";
    echo "Email: " . $existing['email'] . "\n";
    echo "Username: " . ($existing['username'] ?? 'N/A') . "\n";
    echo "Current Password Hash: " . $existing['password'] . "\n\n";
    
    // Update the password to ensure it's correct
    echo "Updating password to: " . $admin_password . "\n";
    $update_sql = "UPDATE users SET password = ?, email = ?, username = ? WHERE id = ?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param("sssi", $admin_password_hash, $admin_email, $admin_username, $existing['id']);
    
    if ($update_stmt->execute()) {
        echo "✓ Password updated successfully!\n\n";
    } else {
        echo "✗ Error updating password: " . $update_stmt->error . "\n\n";
    }
    $update_stmt->close();
} else {
    // Create new admin user
    echo "Creating new admin user...\n";
    
    $insert_sql = "INSERT INTO users (email, username, password, usertype, created_at) VALUES (?, ?, ?, 'Admin', NOW())";
    $insert_stmt = $conn->prepare($insert_sql);
    $insert_stmt->bind_param("sss", $admin_email, $admin_username, $admin_password_hash);
    
    if ($insert_stmt->execute()) {
        $new_user_id = $conn->insert_id;
        echo "✓ Admin user created successfully!\n";
        echo "User ID: " . $new_user_id . "\n\n";
    } else {
        echo "✗ Error creating admin user: " . $insert_stmt->error . "\n\n";
    }
    $insert_stmt->close();
}

// Verify the admin user
echo "Verifying admin user...\n";
$verify_sql = "SELECT * FROM users WHERE (LOWER(email) = LOWER(?) OR LOWER(username) = LOWER(?)) AND usertype = 'Admin'";
$verify_stmt = $conn->prepare($verify_sql);
$verify_stmt->bind_param("ss", $admin_email, $admin_username);
$verify_stmt->execute();
$verify_result = $verify_stmt->get_result();

if ($verify_result->num_rows > 0) {
    $admin = $verify_result->fetch_assoc();
    
    // Test password hash
    $test_hash = sha1($admin_password);
    $password_match = (trim($admin['password']) === $test_hash);
    
    echo "\n=== ADMIN USER DETAILS ===\n";
    echo "ID: " . $admin['id'] . "\n";
    echo "Email: " . $admin['email'] . "\n";
    echo "Username: " . ($admin['username'] ?? 'N/A') . "\n";
    echo "User Type: " . $admin['usertype'] . "\n";
    echo "Password Hash: " . $admin['password'] . "\n";
    echo "Expected Hash: " . $test_hash . "\n";
    echo "Password Match: " . ($password_match ? "✓ YES" : "✗ NO") . "\n";
    
    echo "\n=== LOGIN CREDENTIALS ===\n";
    echo "You can login with EITHER:\n";
    echo "  Email: " . $admin_email . "\n";
    echo "  OR Username: " . $admin_username . "\n";
    echo "  Password: " . $admin_password . "\n";
    
    if (!$password_match) {
        echo "\n⚠ WARNING: Password hash mismatch detected!\n";
        echo "Updating password hash...\n";
        $fix_sql = "UPDATE users SET password = ? WHERE id = ?";
        $fix_stmt = $conn->prepare($fix_sql);
        $fix_stmt->bind_param("si", $test_hash, $admin['id']);
        if ($fix_stmt->execute()) {
            echo "✓ Password hash fixed!\n";
        }
        $fix_stmt->close();
    }
} else {
    echo "✗ Failed to verify admin user creation.\n";
}

$check_stmt->close();
$verify_stmt->close();
$conn->close();

echo "\n=== DONE ===\n";
echo "You can now try logging in with the credentials above.\n";

?>
