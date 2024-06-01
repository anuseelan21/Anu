<?php
$servername = "bcas-db.cb8ygmqiui6l.us-east-1.rds.amazonaws.com";
$dbname="ecomm";
$username = "admin";
$password = "12345678";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname,3309);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>
