<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LuxCars-Home</title>
        <link rel="stylesheet" href="../../output.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Dancing+Script:wght@400..700&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&family=Rowdies:wght@300;400;700&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap');
            </style>
    </head>
<body class="font-family-montserrat">

  <!-- Mobile Sidebar Overlay -->
  <div id="mobileSidebar" class="fixed inset-0 z-40 bg-black text-white w-3/4 max-w-xs transform -translate-x-full transition-transform duration-300 lg:hidden font-sans">
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

  <div class="flex min-h-screen">
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

      <section  class="">
        <h3 class="capitalize text-2xl font-semibold px-6">Deals</h3>
        <!-- offer main Container -->
        <div class="flex flex-col gap-6 items-center justify-center p-6">
  <!-- Offer Card -->
            <div class="w-full md:w-5/6 bg-white rounded-lg shadow-lg p-6 gap-6 text-center flex flex-col md:flex-row items-center justify-around">
                
                <!-- Image -->
                <img src="../../../assets/images/products/Audi-a6.jpg" alt="Car" class="w-full md:w-1/2 object-contain mb-4 md:mb-0 rounded">

                <!-- Offer Details -->
                 <div class="">
                    <div class="w-full  flex flex-col items-center ">
                    <h3 class="text-lg font-semibold text-gray-900 mb-1">Porshe 718 Cayman S</h3>
                    <p class="text-gray-500 mb-4">Coupe</p>
                    <p id="carPrice" class="text-xl font-bold text-gray-900 mb-2">Price: $50,000</p>

                    <!-- Quantity Controls (Initially Hidden) -->
                    <div id="hidden" class="flex my-4 gap-4 hidden  ">
                        <button id="increaseBtn" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">+</button>
                        <input id="offerInput" title="number" type="number" min="1" class="w-16 text-center ring-1 ring-gray-400 rounded w-full">
                        <button id="" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">-</button>
                    </div>
                 </div>
                
                
                <!-- Quantity Controls (Initially Hidden) -->
                

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-2 mt-2 items-center justify-center">
                    <button id="counterOffer" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Counter Offer</button>
                    <button id="acceptOffer" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Accept</button>
                    <button id="rejectOffer" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Reject</button>
                </div>
                </div>
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

    

    const counterOfferButton = document.getElementById('counterOffer');
    counterOfferButton.addEventListener("click",function(){
        const hiddenContainer = document.getElementById('hidden');
        const acceptOfferButton = document.getElementById('acceptOffer');
        const rejectOfferButton = document.getElementById('rejectOffer');
        
        hiddenContainer.classList.toggle('hidden');
        if (hiddenContainer.classList.contains('hidden')) {
            counterOfferButton.innerText = "Counter Offer";
            rejectOfferButton.classList.remove  ('hidden');



        } else {
           
            counterOfferButton.innerText = "Cancel";
            acceptOfferButton.innerText = "Send Offer";
            rejectOfferButton.classList.add('hidden');


        }
    })
  </script>

</body>
</html>