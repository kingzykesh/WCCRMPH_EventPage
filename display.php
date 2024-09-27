<?php
$conn = new mysqli("localhost", "root", "", "reservation_system");
$result = $conn->query("SELECT * FROM reservations");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>All Reservations</title>
</head>
<body>
  <h1>All Reservations</h1>
  <table border="1">
    <thead>
      <tr>
        <th>Seat Number</th>
        <th>Name</th>
        <th>Email</th>
        <th>Date & Time</th>
        <th>Hotel Reservation</th>
      </tr>
    </thead>
    <tbody>
      <?php while($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?= $row['seat'] ?></td>
          <td><?= $row['name'] ?></td>
          <td><?= $row['email'] ?></td>
          <td><?= $row['time'] ?></td>
          <td><?= $row['hotel_reservation'] ?></td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>

  <form action="export_csv.php" method="POST">
    <button type="submit">Export to CSV</button>
  </form>
</body>
</html>
