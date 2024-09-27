<?php
// Database connection (replace with your actual credentials)
$servername = "sdb-77.hosting.stackcp.net";
$username = "seatreservation-35303735bd00";
$password = "5xiydmkxcn";
$dbname = "seatreservation-35303735bd00";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch reserved seats
$sql = "SELECT seat_number FROM reservations";
$result = $conn->query($sql);

$seats = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $seats[] = $row['seat_number'];
    }
}

echo json_encode($seats);

// Close connection
$conn->close();
?>
