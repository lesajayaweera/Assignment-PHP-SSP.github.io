<?php 
session_start();
require_once("./src/php/Controller/VehicleController.php");
if (!isset($_SESSION['email']) || $_SESSION['role'] !== 'admin') {
    header("Location: /Assignment/Login");
    exit;
}
$vehicle  = new VehicleController();
$vehicle = $vehicle->Load_all_with_main_Image();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title> Admin-View Listings</title>
  <link rel="stylesheet" href="/Assignment/src/output.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
</head>
<body class="bg-gray-100 font-family-montserrat">

  <!-- Mobile Sidebar Overlay -->
  <div id="mobileSidebar" class="fixed inset-0 z-40 bg-black text-white w-3/4 max-w-xs transform -translate-x-full transition-transform font-family-montserrat duration-300 lg:hidden">
    <div class="p-6 space-y-4">
      <h1 class="text-2xl font-bold mb-4">LuxCars</h1>
      <button onclick="toggleSidebar()" class="text-right w-full mb-6 text-gray-300">✕ Close</button>
      <nav class="space-y-3">
        <a href="/Assignment/Admin/Dashboard" class="block px-4 py-2 bg-gray-800 rounded">Home</a>
        <a href="/Assignment/Admin/ManageListings" class="block px-4 py-2 hover:bg-gray-700 rounded">Manage Listings</a>
        <a href="/Assignment/Admin/ManageProducts" class="block px-4 py-2 hover:bg-gray-700 rounded">Manage Products</a>
        <a href="/Assignment/Admin/ManageAccounts" class="block px-4 py-2 hover:bg-gray-700 rounded">Manage Accounts</a>
        <a href="/Assignment/Admin/Tables" class="block px-4 py-2 hover:bg-gray-700 rounded">Tables</a>
        <a href="/Assignment/Logout" class="block px-4 py-2 text-red-400 hover:bg-gray-700 rounded">Log out</a>
      </nav>
    </div>
  </div>

  <div class="flex min-h-screen">
    <!-- Desktop Sidebar -->
    <aside class="hidden lg:block lg:w-1/5 bg-black text-white p-6">
      <h1 class="text-3xl font-bold mb-8">LuxCars</h1>
      <nav class="space-y-3">
        <a href="/Assignment/Admin/Dashboard" class="block px-4 py-2 bg-gray-800 rounded">Home</a>
        <a href="/Assignment/Admin/ManageListings" class="block px-4 py-2 hover:bg-gray-700 rounded">Manage Listings</a>
        <a href="/Assignment/Admin/ManageProducts" class="block px-4 py-2 hover:bg-gray-700 rounded">Manage Products</a>
        <a href="/Assignment/Admin/ManageAccounts" class="block px-4 py-2 hover:bg-gray-700 rounded">Manage Accounts</a>
        <a href="/Assignment/Admin/Tables" class="block px-4 py-2 hover:bg-gray-700 rounded">Tables</a>
        <a href="/Assignment/Logout" class="block px-4 py-2 text-red-400 hover:bg-gray-700 rounded">Log out</a>
      </nav>
    </aside>

    <!-- Main Content -->
    <section class="flex-1 p-6 font-family-montserrat space-y-6 w-full">
      <!-- Header -->
      <div class="flex justify-between items-center">
        <div class="flex items-center space-x-4">
          <!-- Hamburger -->
          <button class="lg:hidden text-2xl" onclick="toggleSidebar()">☰</button>
          <h2 class="text-2xl font-semibold">All Listings</h2>
        </div>
        <div class="flex items-center space-x-3">
          <span class="text-sm">Mevi Roy</span>
          <img src="https://i.pravatar.cc/150?img=4" alt="profile" class="w-10 h-10 rounded-full" />
        </div>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 p-6 bg-gray-100 font-sans">
                <!-- Card -->
                <?php foreach($vehicle as $car): ?>
                <div class="max-w-xs bg-white rounded-lg shadow-md text-center font-sans overflow-hidden">
                    <!-- Car Image (full width) -->
                    <img src="<?= htmlspecialchars($car['main_image'] ?? 'default-car.jpg') ?>" alt="Car"
                        class="h-40 w-full object-cover rounded-t-lg" />

                    <!-- Card Content -->
                    <div class="p-6">
                        <!-- Title -->
                        <h3 class="text-lg font-semibold text-gray-900 mb-1">
                            <?= htmlspecialchars($car['Make']) . " " . htmlspecialchars($car['Model']) ?>
                        </h3>
                        <p class="text-gray-500 mb-4">
                            <?= ucfirst(htmlspecialchars($car['cateogory'])) ?>
                        </p>

                        <!-- Icons and Info -->
                        <div class="flex justify-center items-center gap-6 mb-4 text-gray-600">
                            <div class="flex items-center gap-1">
                                <img src="/Assignment/assets/icons/seats.png" class="w-[30px] object-contain" alt="">
                                <span class="text-sm"><?= htmlspecialchars($car['Seats']) ?></span>
                            </div>
                            <div class="flex items-center gap-1">
                                <img src="/Assignment/assets/icons/transmission.png" class="w-[30px] object-contain"
                                    alt="">
                                <span
                                    class="text-sm"><?= htmlspecialchars($car['Transmission'] ?? 'default-car.jpg') ?></span>
                            </div>
                            <div class="flex items-center gap-1">
                                <img src="/Assignment/assets/icons/fuel.png" class="w-[30px] object-contain" alt="">
                                <span class="text-sm"><?= htmlspecialchars($car['FuelType']) ?> </span>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="flex justify-center gap-4">
                            
                            <button
                                class="flex-1 bg-blue-500 text-white px-5 py-2 rounded hover:bg-blue-600 capitalize transition">
                                <a href="/Assignment/Admin/ViewProducts?id=<?= htmlspecialchars($car['VehicleID']) ?>">Veiw</a>
                            </button>
                            <button
                                class="flex-1 bg-red-600 text-white px-5 py-2 rounded hover:bg-red-700 capitalize transition">
                                <a href="/Assignment/Admin/DeleteProducts?id=<?= htmlspecialchars($car['VehicleID']) ?>">Delete</a>
                            </button>
                        </div>
                    </div>
                </div>


                <?php endforeach;?>
                <!-- Repeat the card as needed -->
            </div>
      
    </section>
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
