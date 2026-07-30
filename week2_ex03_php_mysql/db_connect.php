<?php
// Week 2 - Exercise 03: PHP & MySQL — Super Globals and CRUD
// db_connect.php — Shared MySQLi connection (port 3307)

$host = "localhost";
$username = "root";
$password = "";        // default XAMPP root password is empty
$database = "techvibe";
$port = 3307;

// Create connection with explicit port (5 arguments)
$conn = new mysqli($host, $username, $password, $database, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
