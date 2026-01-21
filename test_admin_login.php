<?php
/**
 * Test script to verify admin login credentials
 * This simulates the login process to check if credentials work
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

// Test credentials
$test_email = 'admin@test.com';
$test_username = 'testadmin';
$test_password = 'password@123';
$test_password_hash = sha1($test_password);

echo "=== TESTING ADMIN LOGIN ===\n\n";

// Test 1: Find user by email
echo "Test 1: Finding user by email...\n";
$sql = "SELECT * FROM users WHERE LOWER(email) = LOWER(?) AND usertype = 'Admin'";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $test_email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    echo "✓ User found by email!\n";
    echo "  ID: " . $user['id'] . "\n";
    echo "  Email: " . $user['email'] . "\n";
    echo "  Username: " . ($user['username'] ?? 'N/A') . "\n";
    echo "  User Type: " . $user['usertype'] . "\n";
    echo "  Stored Hash: " . $user['password'] . "\n";
    echo "  Test Hash: " . $test_password_hash . "\n";
    
    $password_match = (trim($user['password']) === $test_password_hash);
    echo "  Password Match: " . ($password_match ? "✓ YES" : "✗ NO") . "\n\n";
    
    if ($password_match) {
        echo "✓✓✓ LOGIN SHOULD WORK! ✓✓✓\n";
    } else {
        echo "✗✗✗ PASSWORD MISMATCH - LOGIN WILL FAIL ✗✗✗\n";
    }
} else {
    echo "✗ User not found by email\n\n";
}

$stmt->close();

// Test 2: Find user by username
echo "Test 2: Finding user by username...\n";
$sql2 = "SELECT * FROM users WHERE LOWER(username) = LOWER(?) AND usertype = 'Admin'";
$stmt2 = $conn->prepare($sql2);
$stmt2->bind_param("s", $test_username);
$stmt2->execute();
$result2 = $stmt2->get_result();

if ($result2->num_rows > 0) {
    $user2 = $result2->fetch_assoc();
    echo "✓ User found by username!\n";
    echo "  ID: " . $user2['id'] . "\n";
    echo "  Email: " . $user2['email'] . "\n";
    echo "  Username: " . ($user2['username'] ?? 'N/A') . "\n";
    echo "  User Type: " . $user2['usertype'] . "\n";
    echo "  Stored Hash: " . $user2['password'] . "\n";
    echo "  Test Hash: " . $test_password_hash . "\n";
    
    $password_match2 = (trim($user2['password']) === $test_password_hash);
    echo "  Password Match: " . ($password_match2 ? "✓ YES" : "✗ NO") . "\n\n";
    
    if ($password_match2) {
        echo "✓✓✓ LOGIN SHOULD WORK! ✓✓✓\n";
    } else {
        echo "✗✗✗ PASSWORD MISMATCH - LOGIN WILL FAIL ✗✗✗\n";
    }
} else {
    echo "✗ User not found by username\n\n";
}

$stmt2->close();

// Test 3: Combined check (as in the model)
echo "Test 3: Combined email/username check (as in Admin_model)...\n";
$sql3 = "SELECT * FROM users WHERE (LOWER(email) = LOWER(?) OR LOWER(username) = LOWER(?)) AND usertype = 'Admin'";
$stmt3 = $conn->prepare($sql3);
$stmt3->bind_param("ss", $test_email, $test_username);
$stmt3->execute();
$result3 = $stmt3->get_result();

if ($result3->num_rows > 0) {
    $user3 = $result3->fetch_assoc();
    echo "✓ User found with combined check!\n";
    echo "  ID: " . $user3['id'] . "\n";
    echo "  Email: " . $user3['email'] . "\n";
    echo "  Username: " . ($user3['username'] ?? 'N/A') . "\n";
    echo "  User Type: " . $user3['usertype'] . "\n";
    echo "  Stored Hash: " . $user3['password'] . "\n";
    echo "  Test Hash: " . $test_password_hash . "\n";
    
    $password_match3 = (trim($user3['password']) === $test_password_hash);
    echo "  Password Match: " . ($password_match3 ? "✓ YES" : "✗ NO") . "\n\n";
    
    if ($password_match3 && $user3['usertype'] == 'Admin') {
        echo "✓✓✓ ALL CHECKS PASSED - LOGIN SHOULD WORK! ✓✓✓\n\n";
        echo "=== LOGIN CREDENTIALS ===\n";
        echo "Email: " . $test_email . "\n";
        echo "OR Username: " . $test_username . "\n";
        echo "Password: " . $test_password . "\n";
    } else {
        echo "✗✗✗ SOME CHECKS FAILED ✗✗✗\n";
    }
} else {
    echo "✗ User not found with combined check\n";
}

$stmt3->close();
$conn->close();

?>
