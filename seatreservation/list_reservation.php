<?php
// Database connection
$host = 'sdb-77.hosting.stackcp.net';
$dbname = 'seatreservation-35303735bd00';
$username = 'seatreservation-35303735bd00'; // Replace with your DB username
$password = '5xiydmkxcn';     // Replace with your DB password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database: " . $e->getMessage());
}

// Fetch reservations
$query = "SELECT * FROM reservations ORDER BY reservation_time ASC";
$stmt = $pdo->prepare($query);
$stmt->execute();
$reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Handle CSV Export
if (isset($_POST['export_csv'])) {
    $filename = "reservations_" . date('Ymd') . ".csv";
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '"');

    $output = fopen('php://output', 'w');
    fputcsv($output, array('Seat Number', 'Name', 'Email', 'Reservation Time'));

    foreach ($reservations as $row) {
        fputcsv($output, $row);
    }

    fclose($output);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seat Reservations</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Seat Reservations</h1>
        
        <!-- Export Button -->
        <form method="POST" class="mb-4">
            <button type="submit" name="export_csv" class="bg-green-500 text-white p-2 rounded hover:bg-green-700">
                Export CSV
            </button>
        </form>

        <!-- Reservations Table -->
        <table class="min-w-full bg-white border border-gray-300 rounded-lg">
            <thead>
                <tr class="bg-blue-500 text-white">
                    <th class="py-2 px-4">Seat Number</th>
                    <th class="py-2 px-4">Name</th>
                    <th class="py-2 px-4">Email</th>
                    <th class="py-2 px-4">Reservation Time</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reservations as $reservation): ?>
                <tr class="border-t border-gray-300">
                    <td class="py-2 px-4"><?php echo htmlspecialchars($reservation['seat_number']); ?></td>
                    <td class="py-2 px-4"><?php echo htmlspecialchars($reservation['name']); ?></td>
                    <td class="py-2 px-4"><?php echo htmlspecialchars($reservation['email']); ?></td>
                    <td class="py-2 px-4"><?php echo date('F j, Y, g:i A', strtotime($reservation['reservation_time'])); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
