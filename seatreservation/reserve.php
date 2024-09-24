<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $seat = $_POST['seat'];
    $time = $_POST['time'];

    // Database connection (replace with your actual credentials)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "crusade_db";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the seat is already booked
    $checkSeatQuery = "SELECT * FROM reservations WHERE seat = '$seat'";
    $result = $conn->query($checkSeatQuery);

    if ($result->num_rows > 0) {
        echo "This seat has already been reserved!";
    } else {
        // Insert reservation data into the database
        $sql = "INSERT INTO reservations (name, email, seat, time) VALUES ('$name', '$email', '$seat', '$time')";

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
