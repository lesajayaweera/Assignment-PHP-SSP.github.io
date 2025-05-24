<?php 
session_start();

if (!isset($_SESSION['email']) || $_SESSION['role'] !== 'seller') {
    header("Location: /Assignment/Login");
    exit;
}




?>

<?php

if ($_SERVER['REQUEST_METHOD']==="POST"){
    require_once("./src/php/Controller/SellerController.php");

    $image = $_FILES['image'] ? $_FILES['image'] : "";
    $fname = $_POST['fname'] ? $_POST['fname'] : " ";
    $lname = $_POST['lname'] ? $_POST['lname'] : " ";
    $email = $_SESSION['email'];
    $description=$_POST ['description'] ? $_POST['description'] : " ";
    $password = $_POST['password'] ? $_POST['password'] : " ";

    $seller = new SellerController();
    $seller->edit_SellerDetails($fname,$lname,$email,$password,$description,$image);

    $details_image = $seller->GetSellerDetails($email)['image_path'];



   

    $_SESSION['image'] = $details_image;




}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> <?php echo ucfirst($_SESSION['role']) ?> - Edit Accounts</title>
    <link rel="stylesheet" href="/Assignment/src/output.css">
</head>

<body class="bg-gray-100 font-sans">

    <!-- Mobile Sidebar Overlay -->
    <div id="mobileSidebar"
        class="fixed inset-0 z-40 bg-black text-white w-3/4 max-w-xs transform -translate-x-full font-sans transition-transform duration-300 lg:hidden">
        <div class="p-6 space-y-4">
            <h1 class="text-2xl font-bold mb-4">LuxCars</h1>
            <button onclick="toggleSidebar()" class="text-right w-full mb-6 text-gray-300">✕ Close</button>
            <nav class="space-y-3">
                <a href="" class="block px-4 py-2 hover:bg-gray-700 rounded">Home</a>
                <a href="" class="block px-4 py-2  bg-gray-800 rounded">View Products</a>
                <a href="#" class="block px-4 py-2 hover:bg-gray-700 rounded">Manage Listings</a>
                <a href="#" class="block px-4 py-2 hover:bg-gray-700 rounded">Manage Accounts</a>
                <a href="#" class="block px-4 py-2 hover:bg-gray-700 rounded">Tables</a>
                <a href="#" class="block px-4 py-2 hover:bg-gray-700 rounded">Edit Account</a>
                <a href="#" class="block px-4 py-2 text-red-400 hover:bg-gray-700 rounded">Log out</a>
            </nav>
        </div>
    </div>

    <div class="flex min-h-screen font-sans">
        <!-- Desktop Sidebar -->
        <aside class="hidden lg:block lg:w-1/5 bg-black text-white p-6">
            <h1 class="text-3xl font-bold mb-8">LuxCars</h1>
            <nav class="space-y-3">
                <a href="" class="block px-4 py-2 hover:bg-gray-700 rounded">Home</a>
                <a href="./ViewProducts.html" class="block px-4 py-2 bg-gray-800  rounded">View Products</a>
                <a href="#" class="block px-4 py-2 hover:bg-gray-700 rounded">Manage Listings</a>
                <a href="#" class="block px-4 py-2 hover:bg-gray-700 rounded">Manage Accounts</a>
                <a href="#" class="block px-4 py-2 hover:bg-gray-700 rounded">Tables</a>
                <a href="#" class="block px-4 py-2 hover:bg-gray-700 rounded">Edit Account</a>
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
                    <h2 class="text-2xl font-semibold">Edit Accounts</h2>
                </div>
                
            </div>
            <section>
                <div class="max-w-4xl mx-auto p-8 bg-white rounded-2xl  shadow-md">
                    <div class="flex flex-col md:flex-row items-center justify-center md:items-start gap-8">
                        <form class="flex items-start justify-around w-full space-x-6" enctype="multipart/form-data" method="post">
                            <!-- Profile Picture -->
                            <div class="flex-shrink-0 items-center justify-start relative">
                                <img src="<?php echo $_SESSION['image'] ?>" id="profile-preview" alt="Profile Photo"
                                    class="h-32 w-32 rounded-full object-cover shadow">

                                <!-- Upload Icon/Button -->
                                <label for="profile-upload"
                                    class="w-8 h-8 bg-black text-white absolute bottom-2 -right-2 rounded-full flex items-center justify-center cursor-pointer shadow-md hover:bg-gray-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                    </svg>
                                </label>

                                <!-- Hidden File Input -->
                                <input type="file" id="profile-upload" class="hidden" name="image"  accept="image/*" />
                            </div>


                            <!-- Form Fields -->
                            <div class="flex-1 grid grid-cols-1 md:grid-cols-2 gap-6 w-full">

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1" for="fname">Your First Name</label>
                                    <input title="input" type="text" name="fname"   
                                      value="<?php echo  $_SESSION['first_name'];  ?>"  class="w-full rounded-lg border border-gray-300 px-4 py-2 text-sm focus:border-blue-500 focus:ring-blue-500 focus:outline-none" required />
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1" for="lname">Your Last Name</label>
                                    <input title="input" type="text" name="lname"
                                      value="<?php echo  $_SESSION['last_name'];  ?>"  class="w-full rounded-lg border border-gray-300 px-4 py-2 text-sm focus:border-blue-500 focus:ring-blue-500 focus:outline-none"  required/>
                                </div>



                               

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1"  for="password">Password</label>
                                    <input title="input" type="password" name="password"
                                        class="w-full rounded-lg border border-gray-300 px-4 py-2 text-sm focus:border-blue-500 focus:ring-blue-500 focus:outline-none" required/>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1" for="description">Description</label>

                                    <textarea name="description"
                                        class="w-full rounded-lg text-left border border-gray-300 px-4 py-2 text-sm focus:border-blue-500 focus:ring-blue-500 focus:outline-none"
                                        required>
                                    </textarea>

                                </div>

                                <!-- Save Button (spanning full width on mobile, bottom right on desktop) -->
                                <div class="md:col-span-2 flex justify-end w-full">
                                    <button type="submit"
                                        class="rounded-lg bg-blue-600 px-6 py-2 text-white w-full md:w-fit  font-medium hover:bg-blue-700 transition">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </section>


        </main>
    </div>

    <!-- JavaScript -->
    <script>
    function toggleSidebar() {
        const sidebar = document.getElementById("mobileSidebar");
        sidebar.classList.toggle("-translate-x-full");
    }
   
document.addEventListener('DOMContentLoaded', function() {
    const profileUpload = document.getElementById('profile-upload');
    const profilePreview = document.getElementById('profile-preview');
    
    profileUpload.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (!file) return;
        
        // Validate file type
        if (!file.type.match('image.*')) {
            alert('Please select an image file (JPEG, PNG, etc.)');
            return;
        }
        
        // Create preview
        const reader = new FileReader();
        reader.onload = function(event) {
            profilePreview.src = event.target.result;
        };
        reader.readAsDataURL(file);
    });
    
    // Optional: Click on image to trigger file input
    profilePreview.addEventListener('click', function() {
        profileUpload.click();
    });
});

    </script>

</body>

</html>