<?php
// Database connection
$servername = "sdb-70.hosting.stackcp.net";
$username = "church_db-35303533ed84";
$password = "gh2lj7473y";
$dbname = "church_db-35303533ed84";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch submitted prayer requests
$sql = "SELECT * FROM prayer_requests ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Prayer Requests</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="max-w-5xl mx-auto p-8">
        <h1 class="text-center text-4xl font-bold mb-4">Submitted Prayer Requests</h1>
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr class="border-b">
                    <th class="py-2">Name</th>
                    <th class="py-2">Parish</th>
                    <th class="py-2">District</th>
                    <th class="py-2">Phone</th>
                    <th class="py-2">Request/Testimony</th>
                    <th class="py-2">Submitted At</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr class='border-b'>";
                        echo "<td class='py-2 px-4'>".$row['name']."</td>";
                        echo "<td class='py-2 px-4'>".$row['parish']."</td>";
                        echo "<td class='py-2 px-4'>".$row['district']."</td>";
                        echo "<td class='py-2 px-4'>".$row['phone']."</td>";
                        echo "<td class='py-2 px-4'>".$row['request']."</td>";
                        echo "<td class='py-2 px-4'>".$row['created_at']."</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center py-4'>No prayer requests found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
// Close connection
$conn->close();
?>
