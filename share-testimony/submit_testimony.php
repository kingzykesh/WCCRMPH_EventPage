<?php
// Database connection
$servername = "sdb-58.hosting.stackcp.net";
$username = "share-testimony-353031377e89";
$password = "qgzyp2h66a"; // Your MySQL password
$dbname = "share-testimony-353031377e89"; // Name of your database

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
$sql = "INSERT INTO testimonies (name, parish, district, phone, request) 
        VALUES ('$name', '$parish', '$district', '$phone', '$request')";

if ($conn->query($sql) === TRUE) {
    // If successful, display the popup message and redirect
    echo "<script>
            alert('You Have Successfully Shared your Testimony');
            window.location.href = 'https://wccrmportharcourt.com/'; 
          </script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
