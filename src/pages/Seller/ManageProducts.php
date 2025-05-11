<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title> Admin-View Listings</title>
  <link rel="stylesheet" href="../../output.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
</head>
<body class="bg-gray-100 font-family-montserrat">

  <!-- Mobile Sidebar Overlay -->
  <div id="mobileSidebar" class="fixed inset-0 z-40 bg-black text-white w-3/4 max-w-xs transform -translate-x-full transition-transform font-family-montserrat duration-300 lg:hidden">
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

  <div class="flex min-h-screen">
    <!-- Desktop Sidebar -->
    <aside class="hidden lg:block lg:w-1/5 bg-black text-white p-6">
      <h1 class="text-3xl font-bold mb-8">LuxCars</h1>
      <nav class="space-y-3">
                <a href="./Dashboard.html" class="block px-4 py-2 hover:bg-gray-700 rounded">Home</a>
                <a href="./ViewProducts.html" class="block px-4 py-2  bg-gray-800 rounded">Add Products</a>
                <a href="#" class="block px-4 py-2 hover:bg-gray-700 rounded">View Products</a>
                <a href="#" class="block px-4 py-2 hover:bg-gray-700 rounded">Manage Products</a>
                <a href="#" class="block px-4 py-2 hover:bg-gray-700 rounded">Deals</a>
                <a href="#" class="block px-4 py-2 text-red-400 hover:bg-gray-700 rounded">Log out</a>
            </nav>
    </aside>

    <!-- Main Content -->
    <section class="flex-1 p-6 font-family-montserrat space-y-6 w-full">
      <!-- Header -->
      <div class="flex justify-between items-center">
        <div class="flex items-center space-x-4">
          <!-- Hamburger -->
          <button class="lg:hidden text-2xl" onclick="toggleSidebar()">☰</button>
          <h2 class="text-2xl font-semibold">All Listings</h2>
        </div>
        <div class="flex items-center space-x-3">
          <span class="text-sm">Mevi Roy</span>
          <img src="https://i.pravatar.cc/150?img=4" alt="profile" class="w-10 h-10 rounded-full" />
        </div>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 p-6 bg-gray-100">
        <!-- Card -->
        <div class="max-w-xs bg-white rounded-lg font-family-montserrat shadow-md p-6 text-center">
          <!-- Title -->
          <h3 class="text-lg font-semibold text-gray-900 mb-1">Porshe 718 Cayman S</h3>
          <p class="text-gray-500 mb-4">Coupe</p>
        
          <!-- Car Image -->
          <img src="../../../assets/images/products/porsche.png" 
               alt="Car" 
               class="w-full h-40 object-contain mb-4" />
        
          <!-- Icons and Info -->
          <div class="flex justify-center items-center gap-6 mb-4 text-gray-600">
            <div class="flex items-center gap-1">
              <img src="../../../assets/icons/seats.png" class="w-[30px] object-contain" alt="">
              <span class="text-sm">4</span>
            </div>
            <div class="flex items-center gap-1">
              <img src="../../../assets/icons/transmission.png" class="w-[30px] object-contain" alt="">
              <span class="text-sm">Manual</span>
            </div>
          </div>
        
          <!-- Buttons -->
          <div class="flex justify-center gap-4">
            <button class="bg-green-500 text-white px-5 py-2 w-full rounded hover:bg-green-600 capitalize transition">
              Edit
            </button>
            <button class="bg-blue-500 text-white px-5 py-2 w-full rounded hover:bg-blue-600 capitalize transition">
              View
            </button>
            <button class="bg-red-600 text-white px-5 py-2 rounded w-full hover:bg-red-700 capitalize transition">
              Delete
            </button>
          </div>
        </div>
        
      
        <!-- Repeat the card as needed -->
      </div>
      
    </section>
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
