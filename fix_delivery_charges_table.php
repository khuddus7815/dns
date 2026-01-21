<?php
/**
 * Script to fix delivery_charges table structure
 * Run this from browser: http://localhost/dns/fix_delivery_charges_table.php
 * Or from command line: php fix_delivery_charges_table.php
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

echo "Checking delivery_charges table structure...\n\n";

// Check if table exists
$table_check = $conn->query("SHOW TABLES LIKE 'delivery_charges'");
if ($table_check->num_rows == 0) {
    echo "Table 'delivery_charges' does not exist. Creating it...\n";
    
    $create_table = "CREATE TABLE `delivery_charges` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `name` varchar(255) NOT NULL,
        `amount` decimal(10,2) NOT NULL DEFAULT 0.00,
        `status` tinyint(1) DEFAULT 1 COMMENT '1=active, 0=inactive',
        `created_at` datetime DEFAULT NULL,
        `updated_at` datetime DEFAULT NULL,
        PRIMARY KEY (`id`),
        KEY `idx_status` (`status`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
    
    if ($conn->query($create_table)) {
        echo "✓ Table created successfully!\n\n";
    } else {
        echo "✗ Error creating table: " . $conn->error . "\n\n";
        exit;
    }
} else {
    echo "Table 'delivery_charges' exists. Checking columns...\n\n";
    
    // Get current columns
    $columns = $conn->query("SHOW COLUMNS FROM delivery_charges");
    $existing_columns = [];
    while ($row = $columns->fetch_assoc()) {
        $existing_columns[] = $row['Field'];
    }
    
    echo "Existing columns: " . implode(', ', $existing_columns) . "\n\n";
    
    // Add missing columns
    $alter_queries = [];
    
    if (!in_array('name', $existing_columns)) {
        $alter_queries[] = "ADD COLUMN `name` varchar(255) NOT NULL AFTER `id`";
        echo "Will add 'name' column...\n";
    }
    
    if (!in_array('amount', $existing_columns)) {
        $alter_queries[] = "ADD COLUMN `amount` decimal(10,2) NOT NULL DEFAULT 0.00 AFTER `name`";
        echo "Will add 'amount' column...\n";
    }
    
    if (!in_array('status', $existing_columns)) {
        $alter_queries[] = "ADD COLUMN `status` tinyint(1) DEFAULT 1 COMMENT '1=active, 0=inactive' AFTER `amount`";
        echo "Will add 'status' column...\n";
    }
    
    if (!in_array('created_at', $existing_columns)) {
        $alter_queries[] = "ADD COLUMN `created_at` datetime DEFAULT NULL AFTER `status`";
        echo "Will add 'created_at' column...\n";
    }
    
    if (!in_array('updated_at', $existing_columns)) {
        $alter_queries[] = "ADD COLUMN `updated_at` datetime DEFAULT NULL AFTER `created_at`";
        echo "Will add 'updated_at' column...\n";
    }
    
    if (!empty($alter_queries)) {
        echo "\nAdding missing columns...\n";
        $alter_sql = "ALTER TABLE `delivery_charges` " . implode(', ', $alter_queries);
        
        if ($conn->query($alter_sql)) {
            echo "✓ Columns added successfully!\n\n";
        } else {
            echo "✗ Error adding columns: " . $conn->error . "\n\n";
            echo "SQL: " . $alter_sql . "\n";
        }
    } else {
        echo "✓ All required columns already exist!\n\n";
    }
}

// Verify final structure
echo "Final table structure:\n";
$final_columns = $conn->query("SHOW COLUMNS FROM delivery_charges");
echo "Column Name | Type | Null | Key | Default\n";
echo str_repeat("-", 60) . "\n";
while ($row = $final_columns->fetch_assoc()) {
    printf("%-15s | %-20s | %-5s | %-5s | %s\n", 
        $row['Field'], 
        $row['Type'], 
        $row['Null'], 
        $row['Key'], 
        $row['Default'] ?? 'NULL'
    );
}

$conn->close();

echo "\n=== DONE ===\n";
echo "The delivery_charges table is now ready to use!\n";

?>
