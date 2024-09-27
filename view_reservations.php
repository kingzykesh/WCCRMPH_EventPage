<?php
// Database connection
$host = 'localhost'; // Change if needed
$dbname = 'crusade_reservations'; // Change if needed
$user = 'root'; // Change if needed
$pass = ''; // Change if needed

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Fetch all reservations
    $stmt = $conn->query("SELECT * FROM reservations");
    $reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // CSV export functionality
    if (isset($_POST['export_csv'])) {
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=reservations.csv');
        $output = fopen('php://output', 'w');
        fputcsv($output, array('ID', 'Seat', 'Name', 'Email', 'Reservation Time', 'Hotel Reservation'));
        foreach ($reservations as $reservation) {
            fputcsv($output, $reservation);
        }
        fclose($output);
        exit();
    }
    
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Reservations</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-100">

<div class="container mx-auto my-10">
    <h1 class="text-3xl font-bold text-center mb-6">All Seat Reservations</h1>
    
    <!-- Table -->
    <table class="min-w-full bg-white shadow-md rounded-lg">
        <thead>
            <tr class="bg-gray-200 text-left">
                <th class="py-2 px-4">ID</th>
                <th class="py-2 px-4">Seat</th>
                <th class="py-2 px-4">Name</th>
                <th class="py-2 px-4">Email</th>
                <th class="py-2 px-4">Reservation Time</th>
                <th class="py-2 px-4">Hotel Reservation</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reservations as $reservation): ?>
            <tr class="border-t">
                <td class="py-2 px-4"><?= htmlspecialchars($reservation['id']); ?></td>
                <td class="py-2 px-4"><?= htmlspecialchars($reservation['seat']); ?></td>
                <td class="py-2 px-4"><?= htmlspecialchars($reservation['name']); ?></td>
                <td class="py-2 px-4"><?= htmlspecialchars($reservation['email']); ?></td>
                <td class="py-2 px-4"><?= htmlspecialchars($reservation['reservation_time']); ?></td>
                <td class="py-2 px-4"><?= htmlspecialchars($reservation['hotel_reservation']); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <!-- Export Button -->
    <form method="post" class="mt-6">
        <button type="submit" name="export_csv" class="bg-green-500 text-white px-4 py-2 rounded">Export to CSV</button>
    </form>
</div>

</body>
</html>
