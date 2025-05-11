<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title> Seller - Add Products</title>
  <link rel="stylesheet" href="../../output.css">
  <style>
            @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Dancing+Script:wght@400..700&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&family=Rowdies:wght@300;400;700&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap');
            </style>
</head>
<body class="bg-gray-100 font-[Montserrat]">

  <!-- Mobile Sidebar Overlay -->
   <div id="mobileSidebar" class="fixed inset-0 z-40 bg-black text-white w-3/4 max-w-xs transform -translate-x-full transition-transform duration-300 lg:hidden">
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
        <div class="flex min-h-screen">
            <!-- Desktop Sidebar -->
            <aside class="hidden lg:block lg:w-1/5 bg-black text-white p-6">
            <h1 class="text-3xl font-bold mb-8">LuxCars</h1>
            <nav class="space-y-3">
                <a href="./Dashboard.html" class="block px-4 py-2 hover:bg-gray-700 rounded">Home</a>
                <a href="./ViewProducts.html" class="block px-4 py-2 bg-gray-800  rounded">Add Products</a>
                <a href="#" class="block px-4 py-2 hover:bg-gray-700 rounded">View Products</a>
                <a href="#" class="block px-4 py-2 hover:bg-gray-700 rounded">Manage Products</a>
                <a href="#" class="block px-4 py-2 hover:bg-gray-700 rounded">Deals</a>
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
                            <p class="text-sm text-gray-500">Please fill in the details of the vehicle you want to add.</p>
                        </div>
                        <div class="h-[5px] w-6 bg-black"></div>
                        </div>

                        <!-- Image Preview -->
                        <div class="flex flex-col gap-2 mb-4">
                        <div>
                            <img id="mainPreview" src="#" alt="Main Preview" class="hidden object-contain w-[800px] rounded" />
                        </div>
                        <div class="flex space-x-4">
                            <div id="thumbPreview1" class="w-[200px] h-[120px] bg-gray-200 border rounded flex items-center justify-center text-xs">Thumbnail 1</div>
                            <div id="thumbPreview2" class="w-[200px] h-[120px] bg-gray-200 border rounded flex items-center justify-center text-xs">Thumbnail 2</div>
                            <div id="thumbPreview3" class="w-[200px] h-[120px] bg-gray-200 border rounded flex items-center justify-center text-xs">Thumbnail 3</div>
                            <div>
                            <label for="imageUpload" class="w-[200px] h-[120px] cursor-pointer border rounded flex items-center justify-center bg-gray-100">
                                Upload Images
                                <input type="file" id="imageUpload" accept="image/*" multiple hidden>
                            </label>
                            </div>
                        </div>
                        </div>

                        <!-- Vehicle Form -->
                        <form id="vehicleForm" class="space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                            <label class="text-sm font-semibold">Make</label>
                            <input title="input" type="text" class="border p-2 rounded w-full" required>
                            </div>
                            <div>
                            <label class="text-sm font-semibold">Model</label>
                            <input title="input" type="text" class="border p-2 rounded w-full" required>
                            </div>
                            <div>
                            <label class="text-sm font-semibold">Year</label>
                            <input title="input" type="number" class="border p-2 rounded w-full" required>
                            </div>
                            <div>
                            <label class="text-sm font-semibold">Price</label>
                            <input title="input" type="number" class="border p-2 rounded w-full" required>
                            </div>
                            <div>
                            <label class="text-sm font-semibold">Dimensions (L x W x H in mm)</label>
                            <input title="input" type="text" class="border p-2 rounded w-full" placeholder="e.g. 4500 x 1800 x 1700" required>
                            </div>
                            <div>
                            <label class="text-sm font-semibold">Seating Capacity</label>
                            <input title="input" type="number" class="border p-2 rounded w-full" required>
                            </div>
                        </div>

                        <div>
                            <label class="text-sm font-semibold">Description</label>
                            <textarea title="textarea" class="border p-2 rounded w-full" rows="4" required></textarea>
                        </div>
                        </form>
                    </div>

                    <!-- Features Section -->
                    <div class="my-6">
                        <div class="flex items-start justify-between">
                        <div>
                            <h2 class="capitalize text-2xl font-semibold">Features</h2>
                        </div>
                        <div class="h-[5px] w-6 bg-black"></div>
                        </div>

                        <form class="mt-4 space-y-6">
                        <!-- Interior Features -->
                            <div>
                                <h3 class="font-medium text-gray-700 mb-2">Interior</h3>
                                <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                                <label class="flex items-center gap-2"><input type="checkbox" name="features[]" value="Air Conditioner" /> Air Conditioner</label>
                                <label class="flex items-center gap-2"><input type="checkbox" name="features[]" value="Touchscreen Display" /> Touchscreen Display</label>
                                <label class="flex items-center gap-2"><input type="checkbox" name="features[]" value="Leather Seats" /> Leather Seats</label>
                                </div>
                            </div>

                            <!-- Safety Features -->
                            <div>
                                <h3 class="font-medium text-gray-700 mb-2">Safety</h3>
                                <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                                <label class="flex items-center gap-2"><input type="checkbox" name="features[]" value="Anti-Lock Braking" /> Anti-Lock Braking</label>
                                <label class="flex items-center gap-2"><input type="checkbox" name="features[]" value="Driver Air Bag" /> Driver Air Bag</label>
                                <label class="flex items-center gap-2"><input type="checkbox" name="features[]" value="Rearview Camera" /> Rearview Camera</label>
                                </div>
                            </div>

                            <!-- Exterior Features -->
                            <div>
                                <h3 class="font-medium text-gray-700 mb-2">Exterior</h3>
                                <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                                <label class="flex items-center gap-2"><input type="checkbox" name="features[]" value="Fog Lights Front" /> Fog Lights Front</label>
                                <label class="flex items-center gap-2"><input type="checkbox" name="features[]" value="Alloy Wheels" /> Alloy Wheels</label>
                                </div>
                            </div>

                            <!-- Comfort Features -->
                            <div>
                                <h3 class="font-medium text-gray-700 mb-2">Comfort & Convenience</h3>
                                <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                                <label class="flex items-center gap-2"><input type="checkbox" name="features[]" value="Bluetooth" /> Bluetooth</label>
                                <label class="flex items-center gap-2"><input type="checkbox" name="features[]" value="Cruise Control" /> Cruise Control</label>
                                <label class="flex items-center gap-2"><input type="checkbox" name="features[]" value="Remote Keyless Entry" /> Remote Keyless Entry</label>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="my-6 space-y-8 ">

                    <!-- Dimensions & Capacity -->
                    <div>
                        <h2 class="text-2xl font-semibold mb-4">Dimensions & Capacity</h2>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        
                        <div class="flex flex-col">
                            <label class="font-semibold">Length (mm)</label>
                            <input type="number" name="length" class="border border-gray-300 rounded p-2" placeholder="4950" required>
                        </div>

                        <div class="flex flex-col">
                            <label class="font-semibold">Width (mm)</label>
                            <input type="number" name="width" class="border border-gray-300 rounded p-2" placeholder="2100" required>
                        </div>

                        <div class="flex flex-col">
                            <label class="font-semibold">Height (mm)</label>
                            <input type="number" name="height" class="border border-gray-300 rounded p-2" placeholder="1550" required>
                        </div>

                        <div class="flex flex-col">
                            <label class="font-semibold">Width (Including Mirrors) (mm)</label>
                            <input type="number" name="width_mirrors" class="border border-gray-300 rounded p-2" placeholder="2140" required>
                        </div>

                        <div class="flex flex-col">
                            <label class="font-semibold">Wheelbase (mm)</label>
                            <input type="number" name="wheelbase" class="border border-gray-300 rounded p-2" placeholder="2580" required>
                        </div>

                        <div class="flex flex-col">
                            <label class="font-semibold">Gross Vehicle Weight (kg)</label>
                            <input type="number" name="gross_vehicle_weight" class="border border-gray-300 rounded p-2" placeholder="1550" required>
                        </div>

                        <div class="flex flex-col">
                            <label class="font-semibold">Height (Roof Rails) (mm)</label>
                            <input type="number" name="roof_rails_height" class="border border-gray-300 rounded p-2" placeholder="1850">
                        </div>

                        <div class="flex flex-col">
                            <label class="font-semibold">Max Loading Weight (kg)</label>
                            <input type="number" name="max_loading_weight" class="border border-gray-300 rounded p-2" placeholder="1200">
                        </div>

                        <div class="flex flex-col">
                            <label class="font-semibold">Max Roof Load (kg)</label>
                            <input type="number" name="max_roof_load" class="border border-gray-300 rounded p-2" placeholder="400">
                        </div>

                        <div class="flex flex-col">
                            <label class="font-semibold">Luggage Capacity (Seats Up) (L)</label>
                            <input type="number" name="luggage_up" class="border border-gray-300 rounded p-2" placeholder="480">
                        </div>

                        <div class="flex flex-col">
                            <label class="font-semibold">Luggage Capacity (Seats Down) (L)</label>
                            <input type="number" name="luggage_down" class="border border-gray-300 rounded p-2" placeholder="850">
                        </div>

                        <div class="flex flex-col">
                            <label class="font-semibold">No. of Seats</label>
                            <input type="number" name="num_seats" class="border border-gray-300 rounded p-2" placeholder="5">
                        </div>

                        </div>
                    </div>



                    <!-- Engine and Transmission -->
                    <div>
                        <h2 class="text-2xl font-semibold mb-4">Engine and Transmission</h2>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                        <div class="flex flex-col">
                            <label class="font-semibold">Fuel Tank Capacity (L)</label>
                            <input type="number" name="fuel_tank" class="border border-gray-300 rounded p-2" placeholder="80">
                        </div>

                        <div class="flex flex-col">
                            <label class="font-semibold">Minimum Kerbweight (kg)</label>
                            <input type="number" name="min_kerbweight" class="border rounded p-2" placeholder="350">
                        </div>

                        <div class="flex flex-col">
                            <label class="font-semibold">Max. Towing Weight – Braked (kg)</label>
                            <input type="number" name="towing_braked" class="border rounded p-2" placeholder="1000">
                        </div>

                        <div class="flex flex-col">
                            <label class="font-semibold">Max. Towing Weight – Unbraked (kg)</label>
                            <input type="number" name="towing_unbraked" class="border rounded p-2" placeholder="1100">
                        </div>

                        <div class="flex flex-col">
                            <label class="font-semibold">Turning Circle (m)</label>
                            <input type="number" name="turning_circle" class="border rounded p-2" placeholder="6500">
                        </div>

                        </div>
                    </div>

                    <div class="mt-6">
                        <button type="submit" class="bg-blue-600 text-white py-2 px-6 rounded hover:bg-blue-700">Save Details</button>
                    </div>
                    </div>


                </section>

      
      
      
            </main>
        </div>
   </section>
   

    

  

  <!-- JavaScript -->
  <script>
    function toggleSidebar() {
      const sidebar = document.getElementById("mobileSidebar");
      sidebar.classList.toggle("-translate-x-full");
    }


    
  </script>

</body>
</html>
