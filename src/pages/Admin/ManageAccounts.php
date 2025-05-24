<?php 
require_once("./src/php/Controller/AdminController.php");
session_start();

if (!isset($_SESSION['email']) || $_SESSION['role'] !== 'admin') {
    header("Location: /Assignment/Login");
    exit;
}

$admin = new AdminController;
$users=$admin->LoadAllUsers();



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Admin- Manage Accounts</title>
    <link rel="stylesheet" href="/Assignment/src/output.css">
</head>

<body class="bg-gray-100 font-family-monteserat">

    <!-- Mobile Sidebar Overlay -->
    <div id="mobileSidebar font-sans"
        class="fixed inset-0 z-40 bg-black text-white w-3/4 max-w-xs transform -translate-x-full transition-transform duration-300 lg:hidden">
        <div class="p-6 space-y-4">
            <h1 class="text-2xl font-bold mb-4">LuxCars</h1>
            <button onclick="toggleSidebar()" class="text-right w-full mb-6 text-gray-300">✕ Close</button>
            <nav class="space-y-3">
                <a href="/Assignment/Admin/Dashboard" class="block px-4 py-2 bg-gray-800 rounded">Home</a>
                <a href="/Assignment/Admin/ManageListings" class="block px-4 py-2 hover:bg-gray-700 rounded">Manage
                    Listings</a>
                <a href="/Assignment/Admin/ManageProducts" class="block px-4 py-2 hover:bg-gray-700 rounded">Manage
                    Products</a>
                <a href="/Assignment/Admin/ManageAccounts" class="block px-4 py-2 hover:bg-gray-700 rounded">Manage
                    Accounts</a>
                <a href="/Assignment/Admin/Tables" class="block px-4 py-2 hover:bg-gray-700 rounded">Tables</a>
                <a href="/Assignment/Logout" class="block px-4 py-2 text-red-400 hover:bg-gray-700 rounded">Log out</a>
            </nav>
        </div>
    </div>

    <div class="flex min-h-screen font-sans">
        <!-- Desktop Sidebar -->
        <aside class="hidden lg:block lg:w-1/5 bg-black text-white p-6">
            <h1 class="text-3xl font-bold mb-8">LuxCars</h1>
            <nav class="space-y-3">
                <a href="/Assignment/Admin/Dashboard" class="block px-4 py-2 bg-gray-800 rounded">Home</a>
                <a href="/Assignment/Admin/ManageListings" class="block px-4 py-2 hover:bg-gray-700 rounded">Manage
                    Listings</a>
                <a href="/Assignment/Admin/ManageProducts" class="block px-4 py-2 hover:bg-gray-700 rounded">Manage
                    Products</a>
                <a href="/Assignment/Admin/ManageAccounts" class="block px-4 py-2 hover:bg-gray-700 rounded">Manage
                    Accounts</a>
                <a href="/Assignment/Admin/Tables" class="block px-4 py-2 hover:bg-gray-700 rounded">Tables</a>
                <a href="/Assignment/Logout" class="block px-4 py-2 text-red-400 hover:bg-gray-700 rounded">Log out</a>
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
                    <span class="text-sm"><?php echo isset($_SESSION['name']) ?  $_SESSION['name'] :  "User"; ?></span>
                    <img src="<?php echo isset($_SESSION['image']) && !empty($_SESSION['image']) ? $_SESSION['image'] : 'https://i.pravatar.cc/150?img=4'; ?>" alt="profile" class="w-10 h-10 rounded-full" />
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 p-6 bg-gray-100">
                <!-- Card -->
                <?php foreach($users as $u) : ?>
                <div class="w-full rounded-2xl bg-gray-100 p-6 shadow-md text-center">
                    <img src="<?= (htmlspecialchars($u['image_path'])) ? htmlspecialchars($u['image_path']) :'https://i.pravatar.cc/150?img=4' ?>" alt="Profile"
                        class="mx-auto h-16 w-16 rounded-full object-cover">

                    <h2 class="mt-4 text-lg font-semibold text-gray-800"><?= htmlspecialchars($u['firstName']) ?>
                        <?= htmlspecialchars($u['lastName']) ?></h2>
                        <p class="text-sm text-gray-600"><?= ucfirst(htmlspecialchars($u['role'])) ?></p>
                    <div class="mt-3 flex items-center justify-center text-gray-700 text-sm">
                        <?= htmlspecialchars($u['email']) ?>
                        
                    </div>
                    

                    <div class="mt-6 flex justify-center space-x-3">
                        <a href="/Assignment/Admin/DeleteAccount?uid=<?= htmlspecialchars($u['id']) ?>">
                            <button
                                class="rounded-xl bg-red-600 px-4 py-2 text-white text-sm font-medium hover:bg-red-700 w-full transition">Delete
                                Account</button>

                        </a>
                        <a href="/Assignment/Admin/EditAccounts?uid=<?= htmlspecialchars($u['id']) ?>">
                            <button
                                class="rounded-xl bg-blue-600 px-4 py-2 text-white  text-sm font-medium hover:bg-blue-700 w-full transition">Edit
                                Account</button>

                        </a>
                    </div>
                </div>

                <?php endforeach; ?>
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