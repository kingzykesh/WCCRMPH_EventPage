<?php
$conn = new mysqli("localhost", "root", "", "reservation_system");
$result = $conn->query("SELECT * FROM reservations");

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="reservations.csv"');

$output = fopen('php://output', 'w');
fputcsv($output, ['Seat Number', 'Name', 'Email', 'Date & Time', 'Hotel Reservation']);

while ($row = $result->fetch_assoc()) {
  fputcsv($output, $row);
}

fclose($output);
exit();
?>
