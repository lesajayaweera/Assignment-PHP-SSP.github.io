<?php
session_start();
require_once("./src/php/Controller/SellerController.php");

if (!isset($_SESSION['email']) || $_SESSION['role'] !== 'seller') {
    header("Location: /Assignment/Login");
    exit;
}


$controller = new SellerController();

$total_products = $controller->GetTotal_ProductsOf_Seller((int)$_SESSION['seller_id']);
$total_deals =$controller->Get_total_negotiation_deals((int)$_SESSION['seller_id']);
$total_sales =$controller->getTotal_done_sales((int)$_SESSION['seller_id']);
$pending_orders =$controller->getTotal_PendingOrders((int)$_SESSION['seller_id']);

$vehicles = $controller->returnAllSellerCars((int)$_SESSION['seller_id']);

// echo $total_deals;

// 
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Seller Dashboard</title>
    <link rel="stylesheet" href="/Assignment/src/output.css">
</head>

<body class="font-sans">

    <!-- Mobile Sidebar Overlay -->
    <div id="mobileSidebar"
        class="fixed inset-0 z-40 bg-black text-white w-3/4 max-w-xs transform -translate-x-full transition-transform duration-300 lg:hidden font-sans">
        <div class="p-6 space-y-4">
            <h1 class="text-2xl font-bold mb-4">LuxCars</h1>
            <button onclick="toggleSidebar()" class="text-right w-full mb-6 text-gray-300">✕ Close</button>
            <nav class="space-y-3">
                <a href="/Assignment/Seller/Dashboard" class="block px-4 py-2 hover:bg-gray-700 rounded">Home</a>
                <a href="/Assignment/Seller/AddCar" class="block px-4 py-2  bg-gray-800 rounded">Add Products</a>
                <a href="/Assignment/Seller/ManageProducts" class="block px-4 py-2 hover:bg-gray-700 rounded">Manage
                    Products</a>
                <a href="/Assignment/Seller/Negotiations" class="block px-4 py-2 hover:bg-gray-700 rounded">Deals</a>
                <a href="/Assignment/Seller/" class="block px-4 py-2 text-red-400 hover:bg-gray-700 rounded">Log out</a>
            </nav>
        </div>
    </div>

    <div class="flex min-h-screen font-sans">
        <!-- Desktop Sidebar -->
        <aside class="hidden lg:block lg:w-1/5 bg-black text-white p-6">
            <h1 class="text-3xl font-bold mb-8">LuxCars</h1>
            <nav class="space-y-3">
                <a href="/Assignment/Seller/Dashboard" class="block px-4 py-2  bg-gray-800 rounded">Home</a>
                <a href="/Assignment/Seller/AddCar" class="block px-4 py-2 hover:bg-gray-700 rounded">Add Products</a>
                <a href="/Assignment/Seller/ManageProducts" class="block px-4 py-2 hover:bg-gray-700 rounded">Manage
                    Products</a>
                <a href="/Assignment/Seller/Negotiations" class="block px-4 py-2 hover:bg-gray-700 rounded">Deals</a>
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
                    <h2 class="text-2xl font-semibold">Seller Dashboard</h2>
                </div>
                <a href="/Assignment/Seller/Account/Edit">
                    <div class="flex items-center space-x-3">
                        <span
                            class="text-sm"><?php echo isset($_SESSION['name']) ?  $_SESSION['name'] :  "User"; ?></span>
                        <img src="<?php echo isset($_SESSION['image']) && !empty($_SESSION['image']) ? $_SESSION['image'] : 'https://i.pravatar.cc/150?img=4'; ?>"
                            alt="profile" class="w-10 h-10 rounded-full" />
                    </div>
                </a>
            </div>
            <!-- https://i.pravatar.cc/150?img=4 -->
            <!-- Statistics -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="flex items-center justify-between bg-white p-4 rounded shadow">
                    <div>
                        <p class="text-sm text-gray-500">Total Products</p>
                        <p class="text-2xl font-bold"><?php echo isset($total_products) ? $total_products : 0 ?></p>
                    </div>

                    <div class="rounded-xl m-w-20 bg-yellow-100 p-2">
                        <img src="/Assignment/assets/icons/products.svg" class="w-10 h-10  object-cover" alt="">
                    </div>
                </div>
                <div class="flex items-center justify-between bg-white p-4 rounded shadow">
                    <div>
                        <p class="text-sm text-gray-500">Pending Orders</p>
                        <p class="text-2xl font-bold"><?php echo isset($pending_orders) ? $pending_orders : 0 ?></p>
                    </div>

                    <div class="rounded-xl m-w-20 bg-emerald-50 p-2">
                        <img src="/Assignment/assets/icons/orders.svg" class="  h-10 object-cover" alt="">
                    </div>
                </div>
                <div class="flex items-center justify-between bg-white p-4 rounded shadow">
                    <div>
                        <p class="text-sm text-gray-500">Approved Deals</p>
                        <p class="text-2xl font-bold">
                            $<?php echo isset($total_deals) ? number_format((int)$total_deals) : 0 ?></p>
                    </div>

                    <div class="rounded-xl m-w-20 bg-purple-100 p-2">
                        <img src="/Assignment/assets/icons/Approved.svg" class="  h-10 object-cover" alt="">
                    </div>
                </div>
                <div class="flex items-center justify-between bg-white p-4 rounded shadow">
                    <div>
                        <p class="text-sm text-gray-500">Total Sales</p>
                        <p class="text-2xl font-bold">
                            $<?php echo isset($total_sales) ? number_format((int)$total_sales) : 0 ?></p>
                    </div>

                    <div class="rounded-xl m-w-20 bg-blue-100 p-2">
                        <img src="/Assignment/assets/icons/money.svg" class="  h-10 object-cover" alt="">
                    </div>
                </div>
                <!-- <div class="bg-white p-4 rounded shadow">
                    <p class="text-sm text-gray-500">Pending Orders</p>
                    <p class="text-2xl font-bold"></p>
                </div> -->


            </div>

            <!-- Listings -->


            <h1 class="px-6 py-2 text-3xl font-bold   ">Popular Products</h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 p-6 ">

            <?php foreach($vehicles as $car):?>
                <div class="bg-white shadow rounded-xl overflow-hidden">
                    <div class="relative">
                        <img src="<?= htmlspecialchars($car['main_image'] ?? 'default-car.jpg') ?>"
                            alt="<?= htmlspecialchars($car['Make'] . ' ' . $car['Model']) ?>"
                            class="w-full h-40  object-cover" />
                        <span
                            class="absolute top-4 left-4 bg-green-500 text-white text-xs font-semibold px-2 py-1 rounded">Great
                            Price</span>
                        <span
                            class="absolute bottom-4 right-2 bg-red-500 text-white text-xs font-semibold px-2 py-1 rounded"><?= htmlspecialchars($car['veh_condition']);?></span>

                    </div>
                    <div class="p-4 space-y-2">
                        <h3 class="text-sm font-semibold text-gray-800">
                            <?= htmlspecialchars($car['Make'] . ' ' . $car['Model'] . ' (' . $car['Year'] . ')') ?></h3>
                        <p class="text-xs text-gray-500"><?= htmlspecialchars($car['cateogory']); ?></p>
                        <div class="flex flex-wrap text-xs text-gray-500 gap-4 mt-2">
                            <span><?= htmlspecialchars($car['Engine']. "cc");?></span>
                            <span><?= htmlspecialchars($car['FuelType']);?></span>
                            <span><?= htmlspecialchars($car['Transmission']);?></span>
                        </div>
                        <div class="flex items-center justify-between mt-4">
                            <span
                                class="text-lg font-bold text-gray-900"><?= "$".number_format(htmlspecialchars($car['price'])); ?></span>
                            <a href="/Assignment/Seller/ViewProducts?id=<?=$car['VehicleID'] ?>"
                                class="text-sm text-blue-600 hover:underline">View Details</a>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
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