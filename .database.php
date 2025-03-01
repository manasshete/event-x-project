<?php
// Database configuration
$servername = "localhost";    // Usually 'localhost' for local development
$username = "root";  // Database username (default: 'root' for XAMPP)
$password = "manasm.a.s";  // Database password (default: '' for XAMPP)
$database = "signup_manas";   // Your database name

// Create database connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    // Handle connection error gracefully
    error_log("Database connection failed: " . $conn->connect_error);
    die(json_encode([
        'status' => 'error',
        'message' => 'Database connection failed. Please try again later.'
    ]));
}

// Set charset to UTF-8
$conn->set_charset("utf8mb4");

// Optional: Set timezone if needed
// $conn->query("SET time_zone = '+00:00';");
?>