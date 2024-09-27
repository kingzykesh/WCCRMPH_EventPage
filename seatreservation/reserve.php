<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $seat_number = $_POST['seat_number']; // Changed from 'seat' to 'seat_number'
    $reservation_time = $_POST['reservation_time']; // Changed from 'time' to 'reservation_time'

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

    // Check if the seat is already booked
    $checkSeatQuery = "SELECT * FROM reservations WHERE seat_number = '$seat_number'";
    $result = $conn->query($checkSeatQuery);

    if ($result->num_rows > 0) {
        echo "This seat has already been reserved!";
    } else {
        // Insert reservation data into the database with correct column names
        $sql = "INSERT INTO reservations (name, email, seat_number, reservation_time) VALUES ('$name', '$email', '$seat_number', '$reservation_time')";

        if ($conn->query($sql) === TRUE) {
            echo "Seat reserved successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Close connection
    $conn->close();
}
?>
