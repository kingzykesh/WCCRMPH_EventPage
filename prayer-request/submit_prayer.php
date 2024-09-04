<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = ""; // Your MySQL password
$dbname = "church_db"; // Name of your database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$parish = $_POST['parish'];
$district = $_POST['district'];
$phone = $_POST['phone'];
$request = $_POST['request'];

// Insert data into the database
$sql = "INSERT INTO prayer_requests (name, parish, district, phone, request) 
        VALUES ('$name', '$parish', '$district', '$phone', '$request')";

if ($conn->query($sql) === TRUE) {
    echo "Prayer request submitted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
