<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $topic = $_POST['topic'];
    $content = $_POST['content'];
    $author = $_POST['author'];
    $date = $_POST['date'];
    
    // Handle Image Upload
    if (isset($_FILES['postImage']) && $_FILES['postImage']['error'] === 0) {
        $imageName = time() . '_' . $_FILES['postImage']['name'];
        move_uploaded_file($_FILES['postImage']['tmp_name'], 'uploads/' . $imageName);
    } else {
        $imageName = 'default.jpg';
    }

    // Insert into Database
    $sql = "INSERT INTO posts (title, topic, content, author, date, image) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$title, $topic, $content, $author, $date, $imageName]);

    // Redirect to Main Blog Page
    header("Location: index.php");
}
?>
