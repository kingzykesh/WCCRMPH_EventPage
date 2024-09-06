<?php
include 'db.php';

$id = $_GET['id'];
$sql = "SELECT * FROM posts WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include Tailwind CSS here -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <section class="max-w-4xl mx-auto p-6">
        <article class="bg-white rounded-lg shadow-md">
            <img src="uploads/<?= $post['image'] ?>" alt="<?= $post['title'] ?>" class="w-full h-64 object-cover rounded-t-lg">
            <div class="p-6">
                <span class="text-blue-600 uppercase text-sm"><?= $post['topic'] ?></span>
                <h1 class="mt-2 text-3xl font-bold"><?= $post['title'] ?></h1>
                <div class="flex items-center mt-4">
                    <span class="text-gray-600 text-sm">By: <?= $post['author'] ?></span>
                    <span class="text-gray-600 mx-2">•</span>
                    <span class="text-gray-600 text-sm"><?= $post['date'] ?></span>
                </div>
                <div class="mt-6 text-gray-700 leading-loose">
                    <p><?= $post['content'] ?></p>
                </div>
            </div>
        </article>
    </section>
</body>
</html>
