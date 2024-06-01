<?php
// Database connection configuration
define('DB_SERVER', 'bcas-db.cb8ygmqiui6l.us-east-1.rds.amazonaws.com'); // Hostname of your RDS instance
define('DB_USERNAME', 'admin'); // Database username
define('DB_PASSWORD', '12345678'); // Database password
define('DB_NAME', 'ecomm'); // Database name

// Create connection
$database = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if (!$database) {
    // Log the error instead of showing it to users
    error_log('Failed to connect to database: ' . mysqli_connect_error());
    // Display a user-friendly error message
    die('Error: Unable to connect to database');
}
?>
