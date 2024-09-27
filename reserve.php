<?php
// Database connection
$host = 'localhost'; // Change if needed
$dbname = 'crusade_reservations'; // Change if needed
$user = 'root'; // Change if needed
$pass = ''; // Change if needed

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $seat = $_POST['seat'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $time = $_POST['time'];
        $hotel = $_POST['hotel'];

        // Prepare the SQL query
        $stmt = $conn->prepare("INSERT INTO reservations (seat, name, email, reservation_time, hotel_reservation) 
                                VALUES (:seat, :name, :email, :time, :hotel)");
        $stmt->bindParam(':seat', $seat);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':time', $time);
        $stmt->bindParam(':hotel', $hotel);

        // Execute the query
        $stmt->execute();

        // Redirect to a confirmation or thank you page
        header("Location: thank_you.php");
        exit();
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
