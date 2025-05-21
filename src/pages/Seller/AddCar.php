<?php 
if(!isset($_SESSION['email']) || $_SESSION['role']==="seller" ){
  header("Location:/Assignment/Login");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Seller - Add Products</title>
    <link rel="stylesheet" href="/Assignment/src/output.css">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Dancing+Script:wght@400..700&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&family=Rowdies:wght@300;400;700&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap');
    </style>
</head>

<body class="bg-gray-100 font-sans">

    <!-- Mobile Sidebar Overlay -->
    <div id="mobileSidebar"
        class="fixed inset-0 z-40 bg-black text-white w-3/4 max-w-xs transform -translate-x-full transition-transform duration-300 lg:hidden">
        <div class="p-6 space-y-4">
            <h1 class="text-2xl font-bold mb-4">LuxCars</h1>
            <button onclick="toggleSidebar()" class="text-right w-full mb-6 text-gray-300">✕ Close</button>
            <nav class="space-y-3">
                <a href="./Dashboard.html" class="block px-4 py-2 hover:bg-gray-700 rounded">Home</a>
                <a href="./ViewProducts.html" class="block px-4 py-2  bg-gray-800 rounded">Add Products</a>
                <a href="#" class="block px-4 py-2 hover:bg-gray-700 rounded">View Products</a>
                <a href="#" class="block px-4 py-2 hover:bg-gray-700 rounded">Manage Products</a>
                <a href="#" class="block px-4 py-2 hover:bg-gray-700 rounded">Deals</a>
                <a href="#" class="block px-4 py-2 text-red-400 hover:bg-gray-700 rounded">Log out</a>
            </nav>
        </div>
    </div>


    <section>
        <div class="flex min-h-screen font-sans">
            <!-- Desktop Sidebar -->
            <aside class="hidden lg:block lg:w-1/5 bg-black text-white p-6">
                <h1 class="text-3xl font-bold mb-8">LuxCars</h1>
                <nav class="space-y-3 ">
                    <a href="./Dashboard.html" class="block px-4 py-2 hover:bg-gray-700 rounded">Home</a>
                    <a href="./ViewProducts.html" class="block px-4 py-2 bg-gray-800  rounded">Add Products</a>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-700 rounded">View Products</a>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-700 rounded">Manage Products</a>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-700 rounded">Deals</a>
                    <a href="#" class="block px-4 py-2 text-red-400 hover:bg-gray-700 rounded">Log out</a>
                </nav>
            </aside>

            <!-- Main Content -->
            <main class="flex-1 p-6 space-y-6 w-full ">
                <!-- Header -->
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-4">
                        <!-- Hamburger -->
                        <button class="lg:hidden text-2xl" onclick="toggleSidebar()">☰</button>
                        <h2 class="text-4xl  font-bold  ">Add Products</h2>
                    </div>
                    <div class="flex items-center space-x-3">
                        <span class="text-sm">Mevi Roy</span>
                        <img src="https://i.pravatar.cc/150?img=4" alt="profile" class="w-10 h-10 rounded-full" />
                    </div>
                </div>
                <section class="px-4 py-6">

                    <!-- Vehicle Info Section -->
                    <div class="my-6">
                        <div class="flex items-start justify-between mb-4">
                            <div>
                                <h2 class="capitalize text-2xl">Vehicle Information</h2>
                                <p class="text-sm text-gray-500">Please fill in the details of the vehicle you want to
                                    add.</p>
                            </div>

                        </div>

                        <!-- Image Preview -->


                        <!-- Vehicle Form -->
                        <form id="vehicleForm" class="space-y-4" method="post"
                            action="../../php/Controller/VehicleController.php" enctype="multipart/form-data">
                            <div class="flex flex-col gap-2 mb-4">
                                <div>
                                    <img id="mainPreview" src="#" alt="Main Preview"
                                        class="hidden object-contain w-[800px] rounded" />
                                </div>
                                <div class="flex space-x-4">
                                    <!-- <div id="thumbPreview1" class="w-[200px] h-[120px] bg-gray-200 border rounded flex items-center justify-center text-xs">Thumbnail 1</div>
                                        <div id="thumbPreview2" class="w-[200px] h-[120px] bg-gray-200 border rounded flex items-center justify-center text-xs">Thumbnail 2</div>
                                        <div id="thumbPreview3" class="w-[200px] h-[120px] bg-gray-200 border rounded flex items-center justify-center text-xs">Thumbnail 3</div> -->
                                    <div>
                                        <label for="imageUpload"
                                            class="w-[200px] h-[120px] cursor-pointer border rounded flex items-center justify-center bg-gray-100">
                                            Upload Images
                                            <input type="file" id="imageUpload" accept="image/*" multiple hidden>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="text-sm font-semibold">Make</label>
                                        <input title="input" type="text" class="border p-2 rounded w-full" name="make"
                                            required>
                                    </div>
                                    <div>
                                        <label class="text-sm font-semibold">Model</label>
                                        <input title="input" type="text" class="border p-2 rounded w-full" name="model"
                                            required>
                                    </div>
                                    <div>
                                        <label class="text-sm font-semibold">Year</label>
                                        <input title="input" type="number" class="border p-2 rounded w-full" name="year"
                                            required>
                                    </div>
                                    <div>
                                        <label class="text-sm font-semibold">Condition</label>
                                        <select name="condition" class="border p-2 rounded w-full" id="">
                                            <option value="New">New</option>
                                            <option value="Used">Used</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="text-sm font-semibold">Price</label>
                                        <input title="input" type="number" class="border p-2 rounded w-full"
                                            name="price" required>
                                    </div>

                                    <div>
                                        <label class="text-sm font-semibold">Seating Capacity</label>
                                        <input title="input" type="number" class="border p-2 rounded w-full"
                                            name="seating_capacity" required>
                                    </div>
                                </div>

                                <div>
                                    <label class="text-sm font-semibold">Description</label>
                                    <textarea title="textarea" class="border p-2 rounded w-full" rows="4"
                                        name="description" required></textarea>
                                </div>
                                <div>
                                    <label class="text-sm font-semibold">Fuel Type</label>
                                    <select name="fuelType" class="border p-2 rounded w-full">
                                        <option value="Petrol">Petrol</option>
                                        <option value="Diesel">Diesel</option>
                                        <option value="Electric">Electric</option>
                                        <option value="Hybrid">Hybrid</option>
                                    </select>
                                </div>

                                <div>
                                    <label class="text-sm font-semibold">Category</label>
                                    <select name="category" class="border p-2 rounded w-full">
                                        <option value="Sedan">Sedan</option>
                                        <option value="SUV">SUV</option>
                                        <option value="Truck">Truck</option>
                                        <option value="Hatchback">Hatchback</option>
                                    </select>
                                </div>

                                <div>
                                    <label class="text-sm font-semibold">Transmission</label>
                                    <select name="transmission" class="border p-2 rounded w-full">
                                        <option value="Automatic">Automatic</option>
                                        <option value="Manual">Manual</option>
                                    </select>
                                </div>

                                <div>
                                    <label class="text-sm font-semibold">Engine (cc)</label>
                                    <input type="number" class="border p-2 rounded w-full" name="engine">
                                </div>

                            </div>
                            <div>
                                <!-- Features Section -->
                                <div class="my-6">
                                    <div class="flex items-start justify-between">
                                        <div>
                                            <h2 class="capitalize text-2xl font-semibold">Features</h2>
                                        </div>

                                    </div>

                                    <div class="mt-4 space-y-6">
                                        <!-- Interior Features -->
                                        <div>
                                            <h3 class="font-medium text-gray-700 mb-2">Interior</h3>
                                            <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                                                <label class="flex items-center gap-2"><input type="checkbox"
                                                        name="features[]" value="Air Conditioner" /> Air
                                                    Conditioner</label>
                                                <label class="flex items-center gap-2"><input type="checkbox"
                                                        name="features[]" value="Touchscreen Display" /> Touchscreen
                                                    Display</label>
                                                <label class="flex items-center gap-2"><input type="checkbox"
                                                        name="features[]" value="Leather Seats" /> Leather Seats</label>
                                            </div>
                                        </div>

                                        <!-- Safety Features -->
                                        <div>
                                            <h3 class="font-medium text-gray-700 mb-2">Safety</h3>
                                            <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                                                <label class="flex items-center gap-2"><input type="checkbox"
                                                        name="features[]" value="Anti-Lock Braking" /> Anti-Lock
                                                    Braking</label>
                                                <label class="flex items-center gap-2"><input type="checkbox"
                                                        name="features[]" value="Driver Air Bag" /> Driver Air
                                                    Bag</label>
                                                <label class="flex items-center gap-2"><input type="checkbox"
                                                        name="features[]" value="Rearview Camera" /> Rearview
                                                    Camera</label>
                                            </div>
                                        </div>

                                        <!-- Exterior Features -->
                                        <div>
                                            <h3 class="font-medium text-gray-700 mb-2">Exterior</h3>
                                            <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                                                <label class="flex items-center gap-2"><input type="checkbox"
                                                        name="features[]" value="Fog Lights Front" /> Fog Lights
                                                    Front</label>
                                                <label class="flex items-center gap-2"><input type="checkbox"
                                                        name="features[]" value="Alloy Wheels" /> Alloy Wheels</label>
                                            </div>
                                        </div>

                                        <!-- Comfort Features -->
                                        <div>
                                            <h3 class="font-medium text-gray-700 mb-2">Comfort & Convenience</h3>
                                            <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                                                <label class="flex items-center gap-2"><input type="checkbox"
                                                        name="features[]" value="Bluetooth" /> Bluetooth</label>
                                                <label class="flex items-center gap-2"><input type="checkbox"
                                                        name="features[]" value="Cruise Control" /> Cruise
                                                    Control</label>
                                                <label class="flex items-center gap-2"><input type="checkbox"
                                                        name="features[]" value="Remote Keyless Entry" /> Remote Keyless
                                                    Entry</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <!-- Dimensions & Capacity -->
                                <div>
                                    <h2 class="text-2xl font-semibold mb-4">Dimensions & Capacity</h2>
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                                        <div class="flex flex-col">
                                            <label class="font-semibold">Length (mm)</label>
                                            <input type="number" name="length"
                                                class="border border-gray-300 rounded p-2" placeholder="4950" required>
                                        </div>

                                        <div class="flex flex-col">
                                            <label class="font-semibold">Width (mm)</label>
                                            <input type="number" name="width" class="border border-gray-300 rounded p-2"
                                                placeholder="2100" required>
                                        </div>

                                        <div class="flex flex-col">
                                            <label class="font-semibold">Height (mm)</label>
                                            <input type="number" name="height"
                                                class="border border-gray-300 rounded p-2" placeholder="1550" required>
                                        </div>



                                    </div>
                                </div>
                            </div>
                            <!-- Engine and Transmission -->
                            <div>
                                <h2 class="text-2xl font-semibold mb-4">Engine and Transmission</h2>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                                    <div class="flex flex-col">
                                        <label class="font-semibold">Fuel Tank Capacity (L)</label>
                                        <input type="number" name="fuel_tank" class="border border-gray-300 rounded p-2"
                                            placeholder="80">
                                    </div>

                                    <div class="flex flex-col">
                                        <label class="font-semibold">Minimum Kerbweight (kg)</label>
                                        <input type="number" name="min_kerbweight" class="border rounded p-2"
                                            placeholder="350">
                                    </div>

                                    <div class="flex flex-col">
                                        <label class="font-semibold">Max. Towing Weight – Braked (kg)</label>
                                        <input type="number" name="towing_braked" class="border rounded p-2"
                                            placeholder="1000">
                                    </div>

                                    <div class="flex flex-col">
                                        <label class="font-semibold">Max. Towing Weight – Unbraked (kg)</label>
                                        <input type="number" name="towing_unbraked" class="border rounded p-2"
                                            placeholder="1100">
                                    </div>

                                    <div class="flex flex-col">
                                        <label class="font-semibold">Turning Circle (m)</label>
                                        <input type="number" name="turning_circle" class="border rounded p-2"
                                            placeholder="6500">
                                    </div>

                                </div>
                            </div>
                            <div class="my-6 space-y-8 ">
                                <div class="mt-6">
                                    <button type="submit"
                                        class="bg-blue-600 text-white py-2 px-6 rounded hover:bg-blue-700">Save
                                        Details</button>
                                </div>
                            </div>

                        </form>
                    </div>





                </section>




            </main>
        </div>
    </section>

    <?php 
    $make = isset($_POST['make']) ? trim(htmlspecialchars($_POST['make'])) : null;
    $model = isset($_POST['model']) ? trim(htmlspecialchars($_POST['model'])) : null;
    $year = isset($_POST['year']) ? (int)$_POST['year'] : null; // Cast to integer
    $condition = isset($_POST['condition']) ? trim(htmlspecialchars($_POST['condition'])) : null;
    $price = isset($_POST['price']) ? (float)$_POST['price'] : null; // Cast to float
    $seating_capacity = isset($_POST['seating_capacity']) ? (int)$_POST['seating_capacity'] : null; // Cast to integer
    $description = isset($_POST['description']) ? trim(htmlspecialchars($_POST['description'])) : null;
    $length = isset($_POST['length']) ? (float)$_POST['length'] : null;
    $width = isset($_POST['width']) ? (float)$_POST['width'] : null;
    $height = isset($_POST['height']) ? (float)$_POST['height'] : null;
    $fuel_tank = isset($_POST['fuel_tank']) ? (float)$_POST['fuel_tank'] : null;
    $min_kerbweight = isset($_POST['min_kerbweight']) ? (float)$_POST['min_kerbweight'] : null;
    $towing_braked = isset($_POST['towing_braked']) ? (float)$_POST['towing_braked'] : null;
    $towing_unbraked = isset($_POST['towing_unbraked']) ? (float)$_POST['towing_unbraked'] : null;
    $turning_circle = isset($_POST['turning_circle']) ? (float)$_POST['turning_circle'] : null;

    // Features (checkboxes will send an array if named features[])
    $features = isset($_POST['features']) && is_array($_POST['features']) ? $_POST['features'] : [];
    $features_string = implode(', ', $features); // Store as a comma-separated string in DB


    echo $make;
    ?>





    <!-- JavaScript -->
    <script>
    function toggleSidebar() {
        const sidebar = document.getElementById("mobileSidebar");
        sidebar.classList.toggle("-translate-x-full");
    }
    </script>

</body>

</html>