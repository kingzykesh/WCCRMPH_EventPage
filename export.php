<?php
// Connect to MySQL
$servername = "localhost";
$username = "your_db_username";
$password = "your_db_password";
$dbname = "your_db_name";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Export to CSV
if (isset($_POST['export'])) {
    $filename = "seat_reservations.csv";
    $query = "SELECT * FROM seats";
    $result = $conn->query($query);

    header('Content-Type: text/csv');
    header('Content-Disposition: attachment;filename='.$filename);

    $output = fopen('php://output', 'w');
    fputcsv($output, array('Seat Number', 'Name', 'Email', 'Date & Time', 'Hotel Reservation', 'Status'));

    while($row = $result->fetch_assoc()) {
        fputcsv($output, $row);
    }
    fclose($output);
}
$conn->close();
?>
