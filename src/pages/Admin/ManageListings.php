<?php 
session_start();

if (!isset($_SESSION['email']) || $_SESSION['role'] !== 'admin') {
    header("Location: /Assignment/Login");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Admin-View Listings</title>
    <link rel="stylesheet" href="../../output.css">
</head>

<body class="bg-gray-100 font-family-monteserat">

    <!-- Mobile Sidebar Overlay -->
    <div id="mobileSidebar"
        class="fixed inset-0 z-40 bg-black text-white w-3/4 max-w-xs transform -translate-x-full transition-transform duration-300 lg:hidden">
        <div class="p-6 space-y-4">
            <h1 class="text-2xl font-bold mb-4">LuxCars</h1>
            <button onclick="toggleSidebar()" class="text-right w-full mb-6 text-gray-300">✕ Close</button>
            <nav class="space-y-3">
                <a href="./Dashboard.html" class="block px-4 py-2 hover:bg-gray-700 rounded">Home</a>
                <a href="./ViewProducts.html" class="block px-4 py-2  bg-gray-800 rounded">View Products</a>
                <a href="#" class="block px-4 py-2 hover:bg-gray-700 rounded">Manage Listings</a>
                <a href="#" class="block px-4 py-2 hover:bg-gray-700 rounded">Manage Accounts</a>
                <a href="#" class="block px-4 py-2 hover:bg-gray-700 rounded">Tables</a>
                <a href="#" class="block px-4 py-2 hover:bg-gray-700 rounded">Edit Account</a>
                <a href="#" class="block px-4 py-2 text-red-400 hover:bg-gray-700 rounded">Log out</a>
            </nav>
        </div>
    </div>

    <div class="flex min-h-screen">
        <!-- Desktop Sidebar -->
        <aside class="hidden lg:block lg:w-1/5 bg-black text-white p-6">
            <h1 class="text-3xl font-bold mb-8">LuxCars</h1>
            <nav class="space-y-3">
                <a href="./Dashboard.html" class="block px-4 py-2 hover:bg-gray-700 rounded">Home</a>
                <a href="./ViewProducts.html" class="block px-4 py-2 bg-gray-800  rounded">View Products</a>
                <a href="#" class="block px-4 py-2 hover:bg-gray-700 rounded">Manage Listings</a>
                <a href="#" class="block px-4 py-2 hover:bg-gray-700 rounded">Manage Accounts</a>
                <a href="#" class="block px-4 py-2 hover:bg-gray-700 rounded">Tables</a>
                <a href="#" class="block px-4 py-2 hover:bg-gray-700 rounded">Edit Account</a>
                <a href="#" class="block px-4 py-2 text-red-400 hover:bg-gray-700 rounded">Log out</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6 space-y-6 w-full">
            <!-- Header -->
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-4">
                    <!-- Hamburger -->
                    <button class="lg:hidden text-2xl" onclick="toggleSidebar()">☰</button>
                    <h2 class="text-2xl font-semibold">Manage Accounts</h2>
                </div>
                <div class="flex items-center space-x-3">
                    <span class="text-sm">Mevi Roy</span>
                    <img src="https://i.pravatar.cc/150?img=4" alt="profile" class="w-10 h-10 rounded-full" />
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 p-6 bg-gray-100">
                <!-- Card -->
                <div class="max-w-xs bg-white rounded-xl shadow-md p-5 text-center space-y-4 font-sans">
                    <!-- Title -->
                    <h3 class="text-lg font-semibold text-gray-900">Porshe 718 Cayman S</h3>
                    <p class="text-sm text-gray-500">Coupe</p>

                    <!-- Car Image -->
                    <img src="/path-to-your-image.jpg" alt="Car" class="w-full h-40 object-contain mx-auto" />

                    <!-- Features -->
                    <div class="flex justify-center items-center gap-6 text-gray-600">
                        <div class="flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2h5m2 0v-4m0 0a4 4 0 118 0v4m-4-4v4" />
                            </svg>
                            <span class="text-sm">4</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 6H6a2 2 0 00-2 2v10h12v-2M6 10h12M6 14h8" />
                            </svg>
                            <span class="text-sm">Manual</span>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-between gap-4">
                        <button
                            class="bg-green-500 text-white px-4 py-2 rounded-md w-full hover:bg-green-600 transition">Approve</button>
                        <button
                            class="bg-red-500 text-white px-4 py-2 rounded-md w-full hover:bg-red-600 transition">Reject</button>
                    </div>
                </div>



                <!-- Repeat the card as needed -->
            </div>

        </main>
    </div>

    <!-- JavaScript -->
    <script>
    function toggleSidebar() {
        const sidebar = document.getElementById("mobileSidebar");
        sidebar.classList.toggle("-translate-x-full");
    }
    </script>

</body>

</html>