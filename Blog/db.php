<?php
$host = 'sdb-66.hosting.stackcp.net';
$db = 'blog_db-353034314233';
$user = 'blog_db-353034314233';
$pass = 'mg3t6ghldb';
$port = 3306; // Change this if necessary

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>
