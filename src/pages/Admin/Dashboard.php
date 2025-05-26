<?php 
session_start();
require_once("./src/php/Controller/AdminController.php");
require_once("./src/php/Controller/VehicleController.php");

$controller = new AdminController();
$vehicleController = new VehicleController();

$data =$vehicleController->Get_pending_listing();



$total_products =$controller->Get_total_('vehicles');
$total_user =$controller->Get_total_('users');
$total_order = $controller->Get_total_('orders');
$total_sales =$controller->GetTotalSales();


  

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
    <title> Admin Dashboard</title>
    <link rel="stylesheet" href="/Assignment/src/output.css">
</head>

<body class="font-family-montserrat">

    <!-- Mobile Sidebar Overlay -->
    <div id="mobileSidebar"
        class="fixed inset-0 z-40 bg-black text-white w-3/4 max-w-xs transform -translate-x-full transition-transform duration-300 lg:hidden font-sans">
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

    <div class="flex min-h-screen">
        <!-- Desktop Sidebar -->
         <!--  -->
        <aside class="hidden lg:block lg:w-1/5 bg-black text-white p-6 font-sans fixed top-0 left-0 bottom-0 z-10">
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
        <main class="flex-1 p-6  space-y-6 w-4/5  lg:ml-[20%] font-sans">
            <!-- Header -->
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-4">
                    <!-- Hamburger -->
                    <button class="lg:hidden text-2xl" onclick="toggleSidebar()">☰</button>
                    <h2 class="text-2xl font-semibold">Admin Dashboard</h2>
                </div>
                <div class="flex items-center space-x-3">
                    <span class="text-sm"><?php echo $_SESSION['name']?$_SESSION['name']: "Guest User"  ?></span>
                    <img src="<?php echo isset($_SESSION['image']) && !empty($_SESSION['image']) ? $_SESSION['image'] : 'https://i.pravatar.cc/150?img=4'; ?>"
                        alt="profile" class="w-10 h-10 rounded-full" />
                </div>
            </div>

            <!-- Statistics -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="flex items-center justify-between bg-white p-4 rounded shadow">
                    <div>
                        <p class="text-sm text-gray-500">Total Users</p>
                        <p class="text-2xl font-bold"><?php echo isset($total_user) ? $total_user : 0 ?></p>
                    </div>

                    <div class="rounded-xl m-w-20 bg-blue-100 p-2">
                        <img src="/Assignment/assets/icons/users.svg" class=" h-10  object-cover" alt="">
                    </div>
                </div>
                <div class="flex items-center justify-between bg-white p-4 rounded shadow">
                    <div>
                        <p class="text-sm text-gray-500">Total Order</p>
                        <p class="text-2xl font-bold"><?php echo isset($total_order) ? $total_order : 0 ?></p>
                    </div>

                    <div class="rounded-xl m-w-20 bg-emerald-100 p-2">
                        <img src="/Assignment/assets/icons/orders.svg" class=" h-10  object-cover" alt="">
                    </div>
                </div>
                <div class="flex items-center justify-between bg-white p-4 rounded shadow">
                    <div>
                        <p class="text-sm text-gray-500">Total Sales</p>
                        <p class="text-2xl font-bold">$<?php echo isset($total_sales) ? number_format($total_sales) : 0 ?></p>
                    </div>

                    <div class="rounded-xl m-w-20 bg-blue-100 p-2">
                        <img src="/Assignment/assets/icons/money.svg" class=" h-10  object-cover" alt="">
                    </div>
                </div>
                <!-- <div class="bg-white p-4 rounded shadow">
                    <p class="text-sm text-gray-500">Total User</p>
                    <p class="text-2xl font-bold">40,689</p>
                </div>
                <div class="bg-white p-4 rounded shadow">
                    <p class="text-sm text-gray-500">Total Order</p>
                    <p class="text-2xl font-bold">10,293</p>
                </div>
                <div class="bg-white p-4 rounded shadow">
                    <p class="text-sm text-gray-500">Total Sales</p>
                    <p class="text-2xl font-bold">$89,000</p>
                </div> -->
                <div class="flex items-center justify-between bg-white p-4 rounded shadow">
                    <div>
                        <p class="text-sm text-gray-500">Total Products</p>
                        <p class="text-2xl font-bold"><?php echo isset($total_products) ? $total_products : 0 ?></p>
                    </div>

                    <div class="rounded-xl m-w-20 bg-yellow-100 p-2">
                        <img src="/Assignment/assets/icons/products.svg" class="w-10 h-10  object-cover" alt="">
                    </div>
                </div>
            </div>

            <!-- Listings -->
            <div class="bg-white rounded shadow p-4 overflow-x-auto">
                <div class="flex justify-between mb-4">
                    <h3 class="text-lg font-semibold">Pending Listings</h3>
                    
                </div>
                <table class="min-w-full divide-y divide-gray-200 text-sm">
                    <thead class="bg-gray-100 text-left text-gray-600">
                        <tr>
                            <th class="px-4 py-2">Product Name</th>
                            <th class="px-4 py-2">Seller</th>
                            <th class="px-4 py-2">Year</th>
                            <th class="px-4 py-2 text-right">Amount</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">

                    <?php foreach($data as $car) :?>
                        <tr>
                            <td class="px-4 py-3 flex items-center space-x-2">
                                <img title="image" src="<?= $car['images'][0]['path'] ?>"
                                    class="w-20 object-cover rounded" />
                                <span><?= $car['vehicle']['model'] ?> <?= $car['vehicle']['make'] ?></span>
                            </td>
                            <td class="px-4 py-3"><?= $car['seller']['firstName'] ?> <?= $car['seller']['lastName'] ?></td>
                            <td class="px-4 py-3"><?= $car['vehicle']['year'] ?></td>
                            <td class="px-4 py-3 text-right">$<?=number_format( $car['vehicle']['price']) ?></td>
                        </tr>
                        <?php endforeach;?>
                        
                        
                    </tbody>
                </table>
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