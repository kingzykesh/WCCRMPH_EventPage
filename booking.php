<?php
// MySQL connection
$servername = "localhost";
$username = "your_db_username";
$password = "your_db_password";
$dbname = "your_db_name";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle the booking form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $seat_number = $_POST['seat_number'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $date_time = $_POST['date_time'];
    $hotel_reservation = $_POST['hotel'];

    // Check if the seat is already booked
    $checkQuery = "SELECT * FROM seats WHERE seat_number = '$seat_number' AND status = 'booked'";
    $checkResult = $conn->query($checkQuery);

    if ($checkResult->num_rows > 0) {
        echo "Sorry, this seat is already booked.";
    } else {
        // Insert booking into database
        $query = "INSERT INTO seats (seat_number, name, email, date_time, hotel_reservation, status)
                  VALUES ('$seat_number', '$name', '$email', '$date_time', '$hotel_reservation', 'booked')";
        if ($conn->query($query) === TRUE) {
            echo "Seat reserved successfully!";
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>
