<?php
session_start();
require_once("./src/php/Controller/SellerController.php");

if (!isset($_SESSION['email']) || $_SESSION['role'] !== 'seller') {
    header("Location: /Assignment/Login");
    exit;
}

$controller = new SellerController();
$result =$controller->getNegotiatedDeals();


// echo "<pre>";
// print_r($result);
// echo "<pre>";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LuxCars-Home</title>
    <link rel="stylesheet" href="/Assignment/src/output.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Dancing+Script:wght@400..700&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&family=Rowdies:wght@300;400;700&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap');
    </style>
</head>

<body class="font-sans">

    <!-- Mobile Sidebar Overlay -->
    <div id="mobileSidebar"
        class="fixed inset-0 z-40 bg-black text-white w-3/4 max-w-xs transform -translate-x-full transition-transform duration-300 lg:hidden font-sans">
        <div class="p-6 space-y-4">
            <h1 class="text-2xl font-bold mb-4">LuxCars</h1>
            <button onclick="toggleSidebar()" class="text-right w-full mb-6 text-gray-300">✕ Close</button>
            <nav class="space-y-3">
                <a href="./Dashboard.html" class="block px-4 py-2 hover:bg-gray-700 rounded">Home</a>
                <a href="./ViewProducts.html" class="block px-4 py-2 hover:bg-gray-700 rounded">Add Products</a>
                <a href="#" class="block px-4 py-2 hover:bg-gray-700 rounded">View Products</a>
                <a href="#" class="block px-4 py-2 hover:bg-gray-700 rounded">Manage Products</a>
                <a href="#" class="block px-4 py-2  bg-gray-800 rounded">Deals</a>
                <a href="#" class="block px-4 py-2 text-red-400 hover:bg-gray-700 rounded">Log out</a>
            </nav>
        </div>
    </div>

    <div class="flex min-h-screen font-sans">
        <!-- Desktop Sidebar -->
        <aside class="hidden lg:block lg:w-1/5 bg-black text-white p-6">
            <h1 class="text-3xl font-bold mb-8">LuxCars</h1>
            <nav class="space-y-3">
                <a href="./Dashboard.html" class="block px-4 py-2 hover:bg-gray-700 rounded">Home</a>
                <a href="./ViewProducts.html" class="block px-4 py-2 hover:bg-gray-700 rounded">Add Products</a>
                <a href="#" class="block px-4 py-2 hover:bg-gray-700 rounded">View Products</a>
                <a href="#" class="block px-4 py-2 hover:bg-gray-700 rounded">Manage Products</a>
                <a href="#" class="block px-4 py-2  bg-gray-800 rounded">Deals</a>
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
                    <h2 class="text-4xl font-semibold">Seller</h2>
                </div>
                <div class="flex items-center space-x-3">
                    <span class="text-sm">Mevi Roy</span>
                    <img src="https://i.pravatar.cc/150?img=4" alt="profile" class="w-10 h-10 rounded-full" />
                </div>
            </div>

            <section class="">
                <h3 class="capitalize text-2xl font-semibold px-6">Deals</h3>
                <!-- offer main Container -->
                <div class="flex flex-col gap-6 items-center justify-center p-6">
                <?php if(!empty($result)): ?>
                    <?php foreach($result as $car):?>
                    <!-- Offer Card -->
                    <div
                        class="w-full bg-white rounded-2xl shadow-xl p-6 flex flex-col lg:flex-row gap-8 items-start max-w-6xl mx-auto">

                        <!-- Vehicle Image -->
                        <div class="w-full lg:w-1/2">
                            <img src="<?= $car['vehicle']['main_image'] ?>" alt="Car Image"
                                class="w-full  h-auto  md:w-[800px] md:h-[400px] rounded-xl object-cover shadow-md">
                        </div>

                        <!-- Info Section -->
                        <div class="w-full lg:w-1/2 flex flex-col space-y-4">

                            <!-- Vehicle Title -->
                            <h3 class="text-3xl font-bold text-gray-800">
                                <?= $car['vehicle']['Make'] ?> <?= $car['vehicle']['Model'] ?>
                                (<?= $car['vehicle']['Year'] ?>)
                            </h3>
                            <p class="text-sm uppercase tracking-wide text-gray-500">
                                <?= ucfirst($car['vehicle']['cateogory']) ?>
                            </p>

                            <!-- Price Info -->
                            <div class="space-y-1">
                                <p class="text-gray-600">Original Price:
                                    <span class="font-semibold text-gray-800">
                                        $<?= number_format($car['vehicle']['price']) ?>
                                    </span>
                                </p>
                                <p class="text-green-700 font-bold text-lg">
                                    Negotiated Price: $<?= number_format($car['negotiation']['negotiatedPrice']) ?>
                                </p>
                            </div>

                            <!-- Buyer Info -->
                            <div class="flex items-center gap-4 pt-2">
                                <img src="<?= $car['buyer']['buyer_image'] ?>" alt="Buyer Profile"
                                    class="w-12 h-12 rounded-full object-cover border border-gray-300 shadow">
                                <p class="text-gray-800 text-sm font-medium">
                                    Buyer: <?= $car['buyer']['firstName'] ?> <?= $car['buyer']['lastName'] ?>
                                </p>
                            </div>

                            <!-- Buttons -->
                            <div class="flex gap-4 pt-4">
                                <a
                                    href="/Assignment/Seller/Manage/Accept/Negotiations?id=<?= $car['negotiation']['id'] ?>">
                                    <button
                                        class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg shadow transition-all duration-300">
                                        Accept
                                    </button>
                                </a>

                                <a
                                    href="/Assignment/Seller/Manage/Reject/Negotiations?id=<?= $car['negotiation']['id'] ?>">
                                    <button
                                        class="bg-red-500 hover:bg-red-600 text-white px-6 py-2 rounded-lg shadow transition-all duration-300">
                                        Reject
                                    </button>
                                </a>
                            </div>

                        </div>
                    </div>
                    <?php endforeach;?>
                <?php else:?>
                    <div class="text-center text-gray-500 text-lg mt-10">
                        No negotiated deals available at the moment.
                    </div>

                </div>
                <?php endif;?>

                

            </section>






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