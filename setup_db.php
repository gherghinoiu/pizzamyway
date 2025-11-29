<?php
// setup_db.php - Script to initialize the database tables

include("inc/header.php"); // To get the database connection ($link)

// Check if connection is established
if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create orders table
$sql_orders = "CREATE TABLE IF NOT EXISTS orders (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(255) NOT NULL,
    customer_email VARCHAR(255) NOT NULL,
    customer_phone VARCHAR(20) NOT NULL,
    customer_address TEXT NOT NULL,
    customer_city VARCHAR(100) NOT NULL,
    total_amount FLOAT NOT NULL,
    discount_amount FLOAT DEFAULT 0,
    final_amount FLOAT NOT NULL,
    payment_method ENUM('cash', 'card') NOT NULL,
    payment_status ENUM('pending', 'paid', 'failed') DEFAULT 'pending',
    stripe_payment_id VARCHAR(255),
    items TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (mysqli_query($link, $sql_orders)) {
    echo "Table 'orders' created successfully.<br>";
} else {
    echo "Error creating table 'orders': " . mysqli_error($link) . "<br>";
}

// Create coupons table
$sql_coupons = "CREATE TABLE IF NOT EXISTS coupons (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(50) NOT NULL UNIQUE,
    discount_type ENUM('percent', 'fixed') NOT NULL,
    discount_value FLOAT NOT NULL,
    expiry_date DATE,
    is_active BOOLEAN DEFAULT TRUE
)";

if (mysqli_query($link, $sql_coupons)) {
    echo "Table 'coupons' created successfully.<br>";
} else {
    echo "Error creating table 'coupons': " . mysqli_error($link) . "<br>";
}

// Insert a test coupon if it doesn't exist
$test_coupon_code = 'MYWAY10';
$check_coupon = mysqli_query($link, "SELECT * FROM coupons WHERE code = '$test_coupon_code'");
if (mysqli_num_rows($check_coupon) == 0) {
    $sql_insert_coupon = "INSERT INTO coupons (code, discount_type, discount_value, is_active) VALUES ('$test_coupon_code', 'percent', 10, 1)";
    if (mysqli_query($link, $sql_insert_coupon)) {
        echo "Test coupon 'MYWAY10' inserted successfully.<br>";
    } else {
        echo "Error inserting test coupon: " . mysqli_error($link) . "<br>";
    }
} else {
    echo "Test coupon 'MYWAY10' already exists.<br>";
}

mysqli_close($link);
?>
