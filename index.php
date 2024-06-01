<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
</head>
<body>
    <h2>Contact Us</h2>
    <form action="process_form.php" method="post">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="message">Message:</label><br>
        <textarea id="message" name="message" rows="4" required></textarea><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
<?php
/*
This file contains database connection configuration for user "admin" and password "12345678"
*/

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
    echo 'error';
}
else{
  echo 'anu';
    
}
?>
