<?php
session_start();

if (!isset($_SESSION['email']) || $_SESSION['role'] !== 'seller') {
    header("Location: /Assignment/Login");
    exit;
}
?>

<?php 
if($_SERVER['REQUEST_METHOD']==="GET"){
  require_once("./src/php/Controller/VehicleController.php");
  if(isset($_GET['id'])){
    $id = htmlspecialchars($_GET['id']);
    $vehicle = new VehicleController;
    $vehicleData = $vehicle->Load_everything_by_Id($id);



    $mainImage = null;
    foreach ($vehicleData['images'] as $img) {
      if ($img['is_main']) {
        $mainImage = $img;
        break;
      }
    }
  }else{
    header("Location:/Assignment/Seller/ManageProducts");
    exit;
    
  }
  

  
  
}
?>
<?php if($vehicleData):?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Seller -View Products</title>
    <link rel="stylesheet" href="/Assignment/src/output.css">
</head>

<body class="bg-gray-100 ">

    <!-- Mobile Sidebar Overlay -->
    <div id="mobileSidebar"
        class="fixed inset-0 z-40 font-sans bg-black text-white w-3/4 max-w-xs transform -translate-x-full transition-transform duration-300 font-family-montserrat lg:hidden">
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

    <div class="flex min-h-screen ">
        <!-- Desktop Sidebar -->
        <aside class="hidden lg:block lg:w-1/5 bg-black text-white font-sans p-6">
            <h1 class="text-3xl font-bold mb-8 font-family-montserrat ">LuxCars</h1>
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
        <main class="flex-1 p-6  space-y-6 w-full lg:pl-[-20%] font-sans">
            <!-- Header -->
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-4">
                    <!-- Hamburger -->
                    <button class="lg:hidden text-2xl" onclick="toggleSidebar()">☰</button>
                    <h2 class="text-2xl font-semibold">All Listings</h2>
                </div>
                <div class="flex items-center space-x-3">
                    <span class="text-sm"><?php echo isset($_SESSION['name']) ?  $_SESSION['name'] :  "User"; ?></span>
                    <img src="<?php echo isset($_SESSION['image']) && !empty($_SESSION['image']) ? $_SESSION['image'] : 'https://i.pravatar.cc/150?img=4'; ?>" alt="profile" class="w-10 h-10 rounded-full" />
                </div>
            </div>
            
            <!-- Title & Subheading -->
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h1 class="text-3xl  font-semibold text-gray-900">
                        <?php echo htmlspecialchars($vehicleData['Make']). " ". htmlspecialchars($vehicleData['Model']) ?>
                    </h1>
                </div>
            </div>

            <p class="text-gray-500 mb-4"><?php echo htmlspecialchars($vehicleData['cateogory'])?></p>

            <!-- Tags -->
            <div class="flex flex-wrap gap-2 mb-6">
                <span
                    class="bg-gray-100 text-sm px-3 py-1 rounded-full"><?php echo htmlspecialchars($vehicleData['Year'])?></span>
                <span
                    class="bg-gray-100 text-sm px-3 py-1 rounded-full"><?php echo htmlspecialchars($vehicleData['veh_condition'])?></span>
                <span
                    class="bg-gray-100 text-sm px-3 py-1 rounded-full"><?php echo htmlspecialchars($vehicleData['Transmission'])?></span>
                <span
                    class="bg-gray-100 text-sm px-3 py-1 rounded-full"><?php echo htmlspecialchars($vehicleData['FuelType'])?></span>
            </div>

            <!-- Grid layout -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Images -->
                <div class="lg:col-span-2 space-y-4">
                    <div class="relative">
                        <img src="<?php echo htmlspecialchars($mainImage['image_path']); ?>" alt="Main car"
                            class="rounded-lg w-full">
                        <span class="absolute top-4 left-4 bg-green-600 text-white px-3 py-1 text-xs rounded-full">Great
                            Price</span>
                        <span
                            class="absolute bottom-4 left-4 bg-white text-black px-3 py-1 text-sm rounded-full border">🎥
                            Video</span>
                    </div>
                    <div class="grid grid-cols-4 gap-4">
                        <?php for ($i = 1; $i <= 3; $i++): ?>
                        <?php if (isset($vehicleData['images'][$i])): ?>
                        <img title="images"
                            src="<?php echo htmlspecialchars($vehicleData['images'][$i]['image_path']); ?>"
                            class="rounded-md h-full object-cover">
                        <?php endif; ?>
                        <?php endfor; ?>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="space-y-6">
                    <div class="flex justify-between items-center">
                        <h2 class="text-2xl font-semibold"><?php echo "$". number_format(htmlspecialchars($vehicleData['price'])) ?></h2>
                        
                    </div>
                    

                    <!-- Dealer Info -->
                    <div class="border rounded-lg p-4 space-y-4">
                        <div class="flex items-center space-x-4">
                            <img title="images" src="<?php echo htmlspecialchars($vehicleData['seller']['Image_path']) ?? '' ?>"
                                class="w-12 rounded-full">
                            <div>
                                <p class="font-medium"><?php echo (htmlspecialchars($vehicleData['seller']['firstName']) ." ".htmlspecialchars($vehicleData['seller']['lastName'])) ?? '';?></p>
                                <p class="text-sm">📞<?php echo htmlspecialchars($vehicleData['seller']['email']);?></p>
                            </div>
                        </div>

                        <a href="/Assignment/Seller/ManageProducts" class="block text-sm text-blue-600 hover:underline text-center">View All stock at
                            this dealer →</a>
                    </div>
                </div>
            </div>

            <!-- Car Overview -->
            <div class="mt-12">
                <h2 class="text-xl font-semibold mb-4">Car Overview</h2>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 text-sm text-gray-700">
                    <div><strong>Body:</strong> <?php echo htmlspecialchars($vehicleData['cateogory'])?></div>
                    <div><strong>Condition:</strong> <?php echo htmlspecialchars($vehicleData['veh_condition'])?></div>
                    <div><strong>Engine Size:</strong> <?php echo htmlspecialchars($vehicleData['Engine'])."cc"?></div>
                    <div><strong>Fuel Type:</strong> <?php echo htmlspecialchars($vehicleData['FuelType'])?></div>
                    <div><strong>Doors:</strong> <?php echo htmlspecialchars($vehicleData['Seats'])?> Doors</div>
                    <div><strong>Year:</strong> <?php echo htmlspecialchars($vehicleData['Year'])?></div>
                    <div><strong>Transmission:</strong> <?php echo htmlspecialchars($vehicleData['Transmission'])?>
                    </div>

                </div>
            </div>

            <!-- Description -->
            <div class="mt-12">
                <h2 class="text-xl font-semibold mb-4">Description</h2>
                <p class="text-gray-600 text-sm leading-relaxed">
                    <?php echo htmlspecialchars($vehicleData['description'])?>
                </p>
            </div>
            <div class="max-w-7xl mx-auto  py-10">
                <h2 class="text-xl font-semibold mb-6">Features</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 text-sm text-gray-800">
                    <div>
                        <h3 class="font-medium mb-2">Interior</h3>
                        <ul class="space-y-1">
                            <li>✔️ Air Conditioner</li>
                            <li>✔️ Digital Odometer</li>
                            <li>✔️ Heater</li>
                            <li>✔️ Leather Seats</li>
                            <li>✔️ Panoramic Moonroof</li>
                            <li>✔️ Tachometer</li>
                            <li>✔️ Touchscreen Display</li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="font-medium mb-2">Safety</h3>
                        <ul class="space-y-1">
                            <li>✔️ Anti-lock Braking</li>
                            <li>✔️ Brake Assist</li>
                            <li>✔️ Child Safety Locks</li>
                            <li>✔️ Driver Air Bag</li>
                            <li>✔️ Power Door Locks</li>
                            <li>✔️ Stability Control</li>
                            <li>✔️ Traction Control</li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="font-medium mb-2">Exterior</h3>
                        <ul class="space-y-1">
                            <li>✔️ Fog Lights Front</li>
                            <li>✔️ Rain Sensing Wiper</li>
                            <li>✔️ Rear Spoiler</li>
                            <li>✔️ Windows – Electric</li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="font-medium mb-2">Comfort & Convenience</h3>
                        <ul class="space-y-1">
                            <li>✔️ Android Auto</li>
                            <li>✔️ Apple CarPlay</li>
                            <li>✔️ Bluetooth</li>
                            <li>✔️ HomeLink</li>
                            <li>✔️ Power Steering</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="max-w-7xl mx-auto  py-2 border-t mt-10">
                <h2 class="text-xl font-semibold mb-6">Dimensions & Capacity</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 text-sm text-gray-800">
                    <div><strong>Length:</strong> <?php echo htmlspecialchars($vehicleData['length'])?>mm</div>
                    <div><strong>Width:</strong> <?php echo htmlspecialchars($vehicleData['width'])?>mm</div>
                    <div><strong>Height:</strong> <?php echo htmlspecialchars($vehicleData['height'])?>mm</div>

                    <div><strong>No. of Seats:</strong> <?php echo htmlspecialchars($vehicleData['Seats'])?> Seats</div>
                </div>
            </div>




            </section>
            <section class="px-6 py-10 font-family-montserrat bg-white border-t max-w-7xl mx-auto">
                <!-- Location Heading & Address -->
                <h2 class="text-lg font-semibold text-gray-900 mb-1">Location</h2>
                <p class="text-sm text-gray-600 mb-1">
                    <?php echo  htmlspecialchars($vehicleData['location']['street_no']) ?>,
                    <?php echo  htmlspecialchars($vehicleData['location']['city']) ?></p>

                <!-- Get Direction Link -->
                <a rel="noopener" href="<?php echo  htmlspecialchars($vehicleData['location']['directionLink']) ?>"
                    target="_blank" class="text-sm text-blue-600 hover:underline inline-flex items-center gap-1 mb-4">
                    Get Direction
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14 3l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>

                <!-- Google Map -->
                <div class="w-full h-80 rounded-lg overflow-hidden shadow">
                    <iframe class="w-full h-full" frameborder="0" style="border:0"
                        src="<?php echo htmlspecialchars($vehicleData['location']['embededLink']) ?>" allowfullscreen=""
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </section>

            <?php endif; ?>


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