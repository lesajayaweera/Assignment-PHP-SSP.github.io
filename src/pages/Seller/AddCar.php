<?php
session_start();

if (!isset($_SESSION['email']) && $_SESSION['role'] !== 'seller') {
    header("Location: /Assignment/Login");
    exit;
}
?>

<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get seller ID from session or wherever it's stored
    require_once("./src/php/Controller/VehicleController.php");
    $sellerID = $_SESSION['user_id'] ?? 0; // Adjust based on your auth system
    $images = isset($_FILES['image']) ? $_FILES['image'] : null;


    // Process form data
   $controller = new VehicleController;
    $controller->AddCar(
        htmlspecialchars($_POST['make']),
        htmlspecialchars($_POST['model']),
        htmlspecialchars($_POST['year']),
        htmlspecialchars($_POST['fuelType']),
        htmlspecialchars($_POST['category']),
        htmlspecialchars($_POST['transmission']),
        htmlspecialchars($_POST['seating_capacity']),
        htmlspecialchars($_POST['condition']),
        htmlspecialchars($_POST['engine']),
        htmlspecialchars($_POST['width']),
        htmlspecialchars($_POST['length']),
        htmlspecialchars($_POST['height']),
        htmlspecialchars($_POST['description']),
        htmlspecialchars($_POST['price']),

        $sellerID,
        $images // not 'images'
   );
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
                <a href="/Assignment/Seller/Dashboard" class="block px-4 py-2 hover:bg-gray-700 rounded">Home</a>
                <a href="/Assignment/Seller/AddCar" class="block px-4 py-2  bg-gray-800 rounded">Add Products</a>
                <a href="/Assignment/Seller/ManageProducts" class="block px-4 py-2 hover:bg-gray-700 rounded">Manage
                    Products</a>
                <a href="/Assignment/Seller/Negotiations" class="block px-4 py-2 hover:bg-gray-700 rounded">Deals</a>
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
                    <a href="/Assignment/Seller/Dashboard" class="block px-4 py-2 hover:bg-gray-700 rounded">Home</a>
                    <a href="/Assignment/Seller/AddCar" class="block px-4 py-2 bg-gray-800  rounded">Add Products</a>
                    <a href="/Assignment/Seller/ManageProducts" class="block px-4 py-2 hover:bg-gray-700 rounded">Manage
                        Products</a>
                    <a href="/Assignment/Seller/Negotiations"
                        class="block px-4 py-2 hover:bg-gray-700 rounded">Deals</a>
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
                        <span
                            class="text-sm"><?php echo isset($_SESSION['name']) ?  $_SESSION['name'] :  "User"; ?></span>
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
                        <div class="flex items-center space-x-3" id="imgs">

                        </div>


                        <!-- Vehicle Form -->
                        <form id="vehicleForm" class="space-y-4" method="post" action="" enctype="multipart/form-data">
                            <div class="flex flex-col gap-2 mb-4">

                                <div class="flex space-x-4">

                                    <div class="flex items-start justify-center flex-wrap space-x-6">
                                        <label
                                            class="upload-slot w-[200px] h-[120px] cursor-pointer border rounded flex items-center justify-center bg-gray-100 relative">
                                            <span class="upload-text">Upload Images</span>
                                            <input type="file" id="imageUpload" name="image[]"
                                                class="image-input absolute inset-0 opacity-0 z-10 cursor-pointer" />
                                        </label>

                                        <label
                                            class="upload-slot w-[200px] h-[120px] cursor-pointer border rounded flex items-center justify-center bg-gray-100 relative">
                                            <span class="upload-text">Upload Images</span>
                                            <input type="file" id="imageUpload1" name="image[]"
                                                class="image-input absolute inset-0 opacity-0 z-10 cursor-pointer" />
                                        </label>

                                        <label
                                            class="upload-slot w-[200px] h-[120px] cursor-pointer border rounded flex items-center justify-center bg-gray-100 relative">
                                            <span class="upload-text">Upload Images</span>
                                            <input type="file" id="imageUpload2" name="image[]"
                                                class="image-input absolute inset-0 opacity-0 z-10 cursor-pointer" />
                                        </label>

                                        <label
                                            class="upload-slot w-[200px] h-[120px] cursor-pointer border rounded flex items-center justify-center bg-gray-100 relative">
                                            <span class="upload-text">Upload Images</span>
                                            <input type="file" id="imageUpload3" name="image[]"
                                                class="image-input absolute inset-0 opacity-0 z-10 cursor-pointer" />
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

                            <div class="my-6 space-y-8 ">
                                <div class="mt-6">
                                    <button type="submit" name="submit"
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







    <!-- JavaScript -->
    <script>
    function toggleSidebar() {
        const sidebar = document.getElementById("mobileSidebar");
        sidebar.classList.toggle("-translate-x-full");
    }



    
document.addEventListener('DOMContentLoaded', function() {
    const uploadSlots = document.querySelectorAll('.upload-slot');

    uploadSlots.forEach(slot => {
        const input = slot.querySelector('.image-input');
        const uploadText = slot.querySelector('.upload-text');
        
        // Create preview container (initially hidden)
        const previewContainer = document.createElement('div');
        previewContainer.className = 'absolute inset-0 hidden';
        slot.appendChild(previewContainer);

        input.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (!file) return;

            const reader = new FileReader();

            reader.onload = function(event) {
                // Create preview elements using Tailwind classes
                const previewWrapper = document.createElement('div');
                previewWrapper.className = 'relative w-full h-full';
                
                const previewImg = document.createElement('img');
                previewImg.src = event.target.result;
                previewImg.className = 'w-full h-full object-cover rounded';
                
                const removeBtn = document.createElement('button');
                removeBtn.type = 'button';
                removeBtn.className = 'absolute top-1 right-1 bg-red-600 text-white rounded-full w-5 h-5 flex items-center justify-center hover:bg-red-700 transition-colors';
                removeBtn.innerHTML = '×';
                removeBtn.title = 'Remove image';
                
                // Build the preview structure
                previewWrapper.appendChild(previewImg);
                previewWrapper.appendChild(removeBtn);
                previewContainer.innerHTML = '';
                previewContainer.appendChild(previewWrapper);
                
                // Toggle visibility
                previewContainer.classList.remove('hidden');
                if (uploadText) uploadText.classList.add('hidden');

                // Remove button functionality
                removeBtn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    input.value = '';
                    previewContainer.classList.add('hidden');
                    if (uploadText) uploadText.classList.remove('hidden');
                });
            };

            reader.readAsDataURL(file);
        });
    });
});


    </script>

</body>

</html>