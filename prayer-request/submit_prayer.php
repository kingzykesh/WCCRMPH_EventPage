<?php
// Database connection
$servername = "sdb-70.hosting.stackcp.net";
$username = "church_db-35303533ed84";
$password = "gh2lj7473y";
$dbname = "church_db-35303533ed84";

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
    // If successful, display the popup message and redirect
    echo "<script>
            alert('YOUR PRAYER REQUEST HAS BEEN RECEIVED');
            window.location.href = 'https://wccrmportharcourt.com/'; 
          </script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
