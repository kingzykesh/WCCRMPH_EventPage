<?php
include 'db.php';

$sql = "SELECT * FROM posts ORDER BY date DESC";
$posts = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include Tailwind CSS here -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <section class="max-w-7xl mx-auto p-6">
        <h3 class="text-2xl font-bold mb-6">Latest Posts</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($posts as $post): ?>
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <a href="single_post.php?id=<?= $post['id'] ?>">
                        <img src="uploads/<?= $post['image'] ?>" alt="<?= $post['title'] ?>" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <span class="text-blue-600 uppercase text-sm"><?= $post['topic'] ?></span>
                            <h3 class="mt-2 text-xl font-bold"><?= $post['title'] ?></h3>
                            <div class="flex items-center mt-4">
                                <span class="text-gray-600 text-sm">By: <?= $post['author'] ?></span>
                                <span class="text-gray-600 mx-2">•</span>
                                <span class="text-gray-600 text-sm"><?= $post['date'] ?></span>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</body>
</html>
