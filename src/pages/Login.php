
<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Handle GET request
    $email = $_GET['email'] ?? null;
    $password = $_GET['password'] ?? null;
    $role = $_GET['role'] ?? null;

    // Process the login logic here (e.g., validate credentials, set session variables, etc.)
    // For demonstration purposes, we'll just echo the values.
    if($role == "admin"){
        header("Location:Assignment/Admin/Dashboard");
        exit;
    }
}

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
<body class="capitalize text-lg font-family-montserrat">
    <header class="flex items-center justify-between bg-black text-white p-4" id="header">
        <div>
            <p class="text-4xl font-bold font-family-body">luxCars</p>
            <p class="text-sm font-family-montserrat">A luxury-driven, high-performance</p>
        </div>
        <div >
            <nav class="hidden md:block"     >
                <ul class="text-lg font-family-montserrat">
                    <li class="inline-block mr-4"><a href="/Assignment/" class="text-white hover:text-gray-400">Home</a></li>
                    <li class="inline-block mr-4"><a href="/Assignment/About" class="text-white hover:text-gray-400">About</a></li>
                    <li class="inline-block mr-4"><a href="/Assignment/Service" class="text-white hover:text-gray-400">Services</a></li>
                    <li class="inline-block mr-4"><a href="/Assignment/ContactUs" class="text-white hover:text-gray-400">Contact</a></li>
                    <li class="inline-block mr-4"><a href="/Assignment/Listing" class="text-white hover:text-gray-400">Listing</a></li>
                    
                </ul>
            </nav>
            <button title="button" type="button" class="flex flex-col justify-between w-6 h-5 cursor-pointer md:hidden" id="hamburger">
                <span class="block w-full h-0.5 bg-white"></span>
                <span class="block w-full h-0.5 bg-white"></span>
                <span class="block w-full h-0.5 bg-white"></span>   
            </button>
        </div>
        <div class="flex items-center space-x-4">
            <i class="material-icons hidden sm:block" style="font-size: 30px;">search</i>
            <i class="material-icons" style="font-size: 30px;">account_circle</i>

        </div>
    </header>
    <section class="font-family-montserrat">
        <div class="grid grid-cols-1 md:grid-cols-2 h-screen">
            <img src="/Assignment/assets/images/Login page/login-image.jpg" class="h-full w-full    lg:h-screen object-cover" alt="Luxury Car Image">
            
            <div class="flex flex-col justify-center items-start p-8 space-y-6">
                <h2 class="text-3xl font-bold">Log In</h2>
                
                <form class="w-full space-y-4" method="get">
                    <div>
                        <label for="email" class="block mb-1">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email"
                            class="w-full p-2 border rounded ring-2 focus:outline-none focus:ring-blue-500" required>
                    </div>
    
                    <div>
                        <label for="password" class="block mb-1">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter your password"
                            class="w-full p-2 border rounded ring-2 focus:outline-none focus:ring-blue-500" required>
                    </div>
                    <select title="role" name="role"  class="text-sm border px-2 py-2 rounded w-[200px] " required>
                        <option value="" disabled selected>Select Role</option>
                        <option value="buyer">Buyer</option>
                        <option value="seller">Seller</option>
                        <option value="admin">Admin</option>
                    </select>
                    <button type="submit" title="login button"
                        class="bg-black text-white p-3 w-full hover:bg-white hover:text-black hover:border transition duration-500">
                        Login
                    </button>
                </form>
                

                <div class="text-sm mt-4">
                    <p>Don't have an account?
                        <a href="/Assignment/Register" class="text-blue-500 hover:underline">Register</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
    
    

    <script src="/Assignment/src/Js/index.js"></script>
    
</body>
</html>