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
        <!-- Header -->
        <header class="bg-white py-4">
        <div class="container mx-auto flex justify-end items-center">
            <!-- Hamburger Menu for Mobile -->
            <div class="block lg:hidden">
                <button id="mobile-menu-button" class="text-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>

            <!-- Navigation and Hotline on the right -->
            <nav class="hidden lg:flex space-x-8 items-center">
                <a href="index.html" class="text-gray-700 hover:text-purple-600">Home</a>
                <a href="about.html" class="text-gray-700 hover:text-purple-600">About</a>
                <a href="livestream.html" class="text-gray-700 hover:text-purple-600">Livestream</a>
                <a href="ourlocation.html" class="text-gray-700 hover:text-purple-600">Locations</a>
                <a href="https://web.facebook.com/watchmanportharcourt/" class="text-gray-700 hover:text-purple-600">Join Us</a>
                <a href="contact.html" class="bg-purple-600 text-white px-4 py-2 rounded-md">HOTLINE</a>
            </nav>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="hidden lg:hidden flex flex-col space-y-4 absolute right-4 top-16 bg-white shadow-lg rounded-lg p-4 w-48">
                <a href="index.html" class="text-gray-700 hover:text-purple-600">Home</a>
                <a href="about.html" class="text-gray-700 hover:text-purple-600">About</a>
                <a href="livestream.html" class="text-gray-700 hover:text-purple-600">Livestream</a>
                <a href="ourlocation.html" class="text-gray-700 hover:text-purple-600">Locations</a>
                <a href="https://web.facebook.com/watchmanportharcourt/" class="text-gray-700 hover:text-purple-600">Join Us</a>
                <a href="contact.html" class="bg-purple-600 text-white px-4 py-2 rounded-md">HOTLINE</a>
            </div>
        </div>
    </header>
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
    <footer class="bg-[#0A011E] text-white py-8">
        <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-4 gap-8">
          <!-- About Us -->
          <div>
            <h3 class="text-lg font-semibold mb-4">ABOUT US</h3>
            <p class="text-sm">
              Watchman Catholic Charismatic Renewal Movement is a place where God has placed His name, His Spirit, and power.
            </p>
          </div>
          
          <!-- Contact Info -->
          <div>
            <h3 class="text-lg font-semibold mb-4">CONTACT INFO</h3>
            <p class="text-sm">
              Address: 16B Elechi Beach Mile 1 Diobu, Port Harcourt.<br>
              Phone: +234 803 775 7122<br>
              Email: <a href="mailto:watchmanmediaph@gmail.com" class="no-underline">watchmanmediaph@gmail.com</a>
            </p>
          </div>
          
          <!-- Important Links -->
          <div>
            <h3 class="text-lg font-semibold mb-4">IMPORTANT LINKS</h3>
            <ul class="text-sm space-y-2">
              <li><a href="#" class="no-underline">Share Your Testimony</a></li>
              <li><a href="/livestream.html" class="no-underline">Catchup with Live/Uploaded Videos</a></li>
              <li><a href="#" class="no-underline">Sermons</a></li>
              <li><a href="#" class="no-underline">Privacy Policy</a></li>
              <li><a href="#" class="no-underline">Terms & Conditions</a></li>
            </ul>
          </div>
          
          <!-- Newsletter -->
          <div>
            <h3 class="text-lg font-semibold mb-4">NEWSLETTER</h3>
            <p class="text-sm mb-4">Subscribe to our Bi-weekly Newsletter to Stay Updated.</p>
            <form class="flex">
              <input type="email" placeholder="Email Address" class="w-full px-4 py-2 rounded-l bg-gray-800 border-none focus:outline-none text-white" />
              <button type="submit" class="bg-purple-600 px-4 py-2 rounded-r hover:bg-purple-700 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6 text-white">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10l9-7 9 7M12 21V3" />
                </svg>
              </button>
            </form>
          </div>
        </div>
        
        <!-- Footer Bottom -->
        <div class="border-t border-gray-700 mt-8 pt-6 text-center text-sm">
          <p>Copyright ©2024 All rights reserved | wccrmphmedia</p>
          <div class="flex justify-center space-x-6 mt-4">
            <!--<a href="#"><img src="icon-youtube.svg" alt="YouTube" class="h-6"></a>
            <a href="#"><img src="icon-facebook.svg" alt="Facebook" class="h-6"></a>
            <a href="#"><img src="icon-globe.svg" alt="Website" class="h-6"></a> --->
          </div>
        </div>
      </footer>

</body>
</html>
