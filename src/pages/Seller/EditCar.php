<?php
session_start();

if($_SERVER['REQUEST_METHOD']==="GET"){
    $_SESSION['v_id'] = $_GET['id'];
}


require_once("./src/php/Controller/VehicleController.php");

$vehicleData =null;
$controller = new VehicleController;

if (!isset($_SESSION['email']) && $_SESSION['role'] !== 'seller') {
    header("Location: /Assignment/Login");
    exit;
}
?>

<?php 

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
        // echo $_SESSION['v_id'];
            
            $images = $_FILES['image'];
            

            // Process form data
            
            $controller->EditCar(
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
                htmlspecialchars($_POST['street']),
                htmlspecialchars($_POST['city']),
                htmlspecialchars($_POST['address']),
                htmlspecialchars($_POST['link']),
                $_SESSION['v_id'],
                $images // not 'images'
            );
        
            // echo "<pre>";
            // print_r($images);
            // echo "<pre>";
    }
    
?>

<?php
$vehicleData = $controller->Load_everything_by_Id($_SESSION['v_id']);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Seller - Edit Products</title>
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
                        <h2 class="text-4xl  font-bold  ">Edit Products</h2>
                    </div>
                    <div class="flex items-center space-x-3">
                        <span
                            class="text-sm"><?php echo isset($_SESSION['name']) ?  $_SESSION['name'] :  "User"; ?></span>
                        <img src="<?php echo isset($_SESSION['image']) && !empty($_SESSION['image']) ? $_SESSION['image'] : 'https://i.pravatar.cc/150?img=4'; ?>"
                            alt="profile" class="w-10 h-10 rounded-full" />
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




                        <!-- Vehicle Form -->
                        <form id="vehicleForm" class="space-y-4" method="post" action="" enctype="multipart/form-data">
                            <div class="flex flex-col gap-2 mb-4">


                                <div class="flex space-x-4">
                                    <div class="flex items-start justify-center flex-wrap gap-6">
                                        <!-- Changed to gap-6 for better spacing -->
                                        <!-- Image Upload 1 -->
                                        <div
                                            class="relative w-[200px] h-[120px] rounded overflow-hidden shadow group image-upload-container">
                                            <img src="<?php echo $vehicleData['images'][0]['image_path'] ?>" alt="Preview"
                                                class="object-cover w-full h-full rounded image-preview" />
                                            <label for="imageUpload1"
                                                class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-40 text-white opacity-0 group-hover:opacity-100 transition duration-200 cursor-pointer">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M12 4v16m8-8H4" />
                                                </svg>
                                            </label>
                                            <input type="file" id="imageUpload1" name="image[]" accept="image/*"
                                                class="hidden image-input" />
                                        </div>

                                        <!-- Image Upload 2 -->
                                        <div
                                            class="relative w-[200px] h-[120px] rounded overflow-hidden shadow group image-upload-container">
                                            <img src="<?php echo $vehicleData['images'][1]['image_path'] ?>" alt="Preview"
                                                class="object-cover w-full h-full rounded image-preview" />
                                            <label for="imageUpload2"
                                                class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-40 text-white opacity-0 group-hover:opacity-100 transition duration-200 cursor-pointer">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M12 4v16m8-8H4" />
                                                </svg>
                                            </label>
                                            <input type="file" id="imageUpload2" name="image[]" accept="image/*"
                                                class="hidden image-input" />
                                        </div>

                                        <!-- Image Upload 3 -->
                                        <div
                                            class="relative w-[200px] h-[120px] rounded overflow-hidden shadow group image-upload-container">
                                            <img src="<?php echo $vehicleData['images'][2]['image_path'] ?>" alt="Preview"
                                                class="object-cover w-full h-full rounded image-preview" />
                                            <label for="imageUpload3"
                                                class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-40 text-white opacity-0 group-hover:opacity-100 transition duration-200 cursor-pointer">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M12 4v16m8-8H4" />
                                                </svg>
                                            </label>
                                            <input type="file" id="imageUpload3" name="image[]" accept="image/*"
                                                class="hidden image-input" />
                                        </div>

                                        <!-- Image Upload 4 -->
                                        <div
                                            class="relative w-[200px] h-[120px] rounded overflow-hidden shadow group image-upload-container">
                                            <img src="<?php echo $vehicleData['images'][3]['image_path'] ?>" alt="Preview"
                                                class="object-cover w-full h-full rounded image-preview" />
                                            <label for="imageUpload4"
                                                class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-40 text-white opacity-0 group-hover:opacity-100 transition duration-200 cursor-pointer">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M12 4v16m8-8H4" />
                                                </svg>
                                            </label>
                                            <input type="file" id="imageUpload4" name="image[]" accept="image/*"
                                                class="hidden image-input" />
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label class="text-sm font-semibold">Make</label>
                                            <select name="make" class="border border-gray-300 rounded p-2 w-full">
                                                <option value="">Select a Brand</option>
                                                <option value="BMW">BMW</option>
                                                <option value="Audi">Audi</option>
                                                <option value="Ferarri">Ferarri</option>
                                                <option value="Mclern">Mclern</option>
                                                <option value="Lamborghini">Lamborghini</option>
                                                <option value="Aston Martin">Aston Martin</option>
                                                <option value="Rolls Royce">Rolls Royce</option>
                                                <option value="Bentley">Bentley</option>
                                                <option value="Mercedes Benz">Mercedes Benz</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label class="text-sm font-semibold">Model</label>
                                            <input title="input" type="text" value="<?php echo $vehicleData['Model'] ?>"
                                                class="border border-gray-300 rounded p-2 w-full"0 name="model" required>
                                        </div>
                                        <div>
                                            <label class="text-sm font-semibold">Year</label>
                                            <input title="input" type="number" value="<?php echo $vehicleData['Year'] ?>"
                                                class="border border-gray-300 rounded p-2 w-full" name="year" required>
                                        </div>
                                        <div>
                                            <label class="text-sm font-semibold">Condition</label>
                                            <select name="condition" class="border border-gray-300 rounded p-2 w-full"
                                                id="">
                                                <option value="New">New</option>
                                                <option value="Used">Used</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label class="text-sm font-semibold">Price</label>
                                            <input title="input" type="number" value="<?php echo $vehicleData['price'] ?>"
                                                class="border border-gray-300 rounded p-2 w-full" name="price" required>
                                        </div>

                                        <div>
                                            <label class="text-sm font-semibold">Seating Capacity</label>
                                            <input title="input" type="number" value="<?php echo $vehicleData['Seats'] ?>"
                                                class="border border-gray-300 rounded p-2 w-full"
                                                name="seating_capacity" required>
                                        </div>
                                    </div>

                                    <div>
                                        <label class="text-sm font-semibold">Description</label>
                                        <textarea title="textarea" class="border border-gray-300 rounded p-2 w-full"
                                            rows="4" name="description" value="<?php echo $vehicleData['description'] ?>" required>
                                            <?php echo $vehicleData['description'] ?>
                                        </textarea>
                                    </div>
                                    <div class="grid grid-cols-2 space-x-4 space-y-4 w-full">
                                        <div>
                                            <label class="text-sm font-semibold">Fuel Type</label>
                                            <select name="fuelType" class="border border-gray-300 rounded p-2 w-full">
                                                <option value="Petrol">Petrol</option>
                                                <option value="Diesel">Diesel</option>
                                                <option value="Electric">Electric</option>
                                                <option value="Hybrid">Hybrid</option>
                                            </select>
                                        </div>

                                        <div>
                                            <label class="text-sm font-semibold w-full">Category</label>
                                            <select name="category" class="border border-gray-300 rounded p-2 w-full">
                                                <option value="Sedan">Sedan</option>
                                                <option value="SUV">SUV</option>
                                                <option value="Coupe">Coupe</option>
                                                <option value="Truck">Truck</option>
                                                <option value="Sports">Sports</option>
                                                <option value="Hatchback">Hatchback</option>
                                                <option value="Convertible">Convertible</option>
                                            </select>
                                        </div>

                                        <div>
                                            <label class="text-sm font-semibold">Transmission</label>
                                            <select name="transmission"
                                                class="border border-gray-300 rounded p-2 w-full">
                                                <option value="Automatic">Automatic</option>
                                                <option value="Manual">Manual</option>
                                            </select>
                                        </div>

                                        <div>
                                            <label class="text-sm font-semibold">Engine (cc)</label>
                                            <input type="number" class="border border-gray-300 rounded p-2 w-full"
                                                name="engine" value="<?php echo $vehicleData['Engine'] ?>">
                                        </div>
                                    </div>

                                </div>

                                <div>

                                    <div>
                                        <h2 class="text-2xl font-semibold mb-4">Dimensions & Capacity</h2>
                                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                                            <div class="flex flex-col">
                                                <label class="font-semibold">Length (mm)</label>
                                                <input type="number" name="length" value="<?php echo $vehicleData['length'] ?>"
                                                    class="border border-gray-300 rounded p-2" placeholder="4950"
                                                    required>
                                            </div>

                                            <div class="flex flex-col">
                                                <label class="font-semibold">Width (mm)</label>
                                                <input type="number" name="width" value="<?php echo $vehicleData['width'] ?>"
                                                    class="border border-gray-300 rounded p-2" placeholder="2100"
                                                    required>
                                            </div>

                                            <div class="flex flex-col">
                                                <label class="font-semibold">Height (mm)</label>
                                                <input type="number" name="height" value="<?php echo $vehicleData['height'] ?>"
                                                    class="border border-gray-300 rounded p-2" placeholder="1550"
                                                    required>
                                            </div>



                                        </div>
                                    </div>
                                    <div>
                                        <h2 class="text-2xl font-semibold mb-4">Locations</h2>
                                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                            <div class="flex flex-col">
                                                <label class="font-semibold" for="street">Street No</label>
                                                <input type="text" name="street" value="<?php echo $vehicleData['location']['street_no']  ?>"
                                                    class="border border-gray-300 rounded p-2"
                                                    placeholder="329 Kent Ave" required>
                                            </div>

                                            <div class="flex flex-col">
                                                <label class="font-semibold" for="city">City</label>
                                                <input type="text" name="city"
                                                    class="border border-gray-300 rounded p-2" value="<?php echo $vehicleData['location']['city'] ?>" placeholder="Brooklyn"
                                                    required>
                                            </div>

                                            <div class="flex flex-col">
                                                <label class="font-semibold" for="address">Embedded Link</label>
                                                <input type="text" name="address"
                                                    class="border border-gray-300 rounded p-2"
                                                    placeholder="Embedded Link" value="<?php echo $vehicleData['location']['embededLink'] ?>" required>
                                            </div>

                                            <div class="flex flex-col">
                                                <label class="font-semibold" for="link">Direction Link</label>
                                                <input type="text" name="link"
                                                    class="border border-gray-300 rounded p-2"
                                                    placeholder="Direction Link" value="<?php echo $vehicleData['location']['directionLink'] ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
    // Select all image upload containers
    const uploadContainers = document.querySelectorAll('.image-upload-container');

    uploadContainers.forEach((container) => {
        const input = container.querySelector('.image-input');
        const preview = container.querySelector('.image-preview');
        const uploadLabel = container.querySelector('label[for^="imageUpload"]');

        // Show the upload icon when hovering over empty container
        container.addEventListener('mouseenter', () => {
            if (!input.files.length && uploadLabel) {
                uploadLabel.classList.remove('opacity-0');
            }
        });

        container.addEventListener('mouseleave', () => {
            if (!input.files.length && uploadLabel) {
                uploadLabel.classList.add('opacity-0');
            }
        });

        input.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (!file) return;

            // Validate file type
            if (!file.type.match('image.*')) {
                alert('Please select an image file (JPEG, PNG, etc.)');
                return;
            }

            const reader = new FileReader();

            reader.onload = function(event) {
                // Update the preview image
                preview.src = event.target.result;
                preview.alt = 'Uploaded preview';

                // Hide the upload icon since we now have an image
                if (uploadLabel) {
                    uploadLabel.classList.add('opacity-0');
                }

                // Create remove button if it doesn't exist
                let removeBtn = container.querySelector('.remove-btn');
                if (!removeBtn) {
                    removeBtn = document.createElement('button');
                    removeBtn.type = 'button';
                    removeBtn.className = 'remove-btn absolute top-1 right-1 bg-red-600 text-white rounded-full w-6 h-6 flex items-center justify-center hover:bg-red-700 transition-colors z-20';
                    removeBtn.innerHTML = '×';
                    removeBtn.title = 'Remove image';
                    container.appendChild(removeBtn);

                    // Remove button functionality
                    removeBtn.addEventListener('click', function(e) {
                        e.stopPropagation();
                        input.value = '';
                        preview.src = 'https://via.placeholder.com/200x120?text=+';
                        preview.alt = 'Preview';
                        container.removeChild(removeBtn);
                        
                        // Show upload icon on hover again
                        if (uploadLabel) {
                            uploadLabel.classList.remove('opacity-0');
                        }
                    });
                }
            };

            reader.readAsDataURL(file);
        });
    });
});
    </script>

</body>

</html>