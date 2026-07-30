<?php
// Week 2 - Exercise 03: PHP & MySQL — Super Globals and CRUD
// setup.php — Creates the database and employees table

$host = "localhost";
$username = "root";
$password = "";
$port = 3307;

// Connect without selecting a database first
$conn = new mysqli($host, $username, $password, "", $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database if it doesn't exist
$sql = "CREATE DATABASE IF NOT EXISTS techvibe";
if ($conn->query($sql) === TRUE) {
    echo "<p>Database <strong>techvibe</strong> created or already exists.</p>";
} else {
    die("Error creating database: " . $conn->error);
}

// Select the database
$conn->select_db("techvibe");

// Create employees table
$sql = "CREATE TABLE IF NOT EXISTS employees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    department VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "<p>Table <strong>employees</strong> created or already exists.</p>";
} else {
    die("Error creating table: " . $conn->error);
}

$conn->close();

echo "<p style='color:green; font-weight:bold;'>Setup complete! <a href='index.php'>Go to Employee List</a></p>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Setup Database</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 60px auto; padding: 20px; }
    </style>
</head>
<body>
    <h1>Database Setup</h1>
</body>
</html>
