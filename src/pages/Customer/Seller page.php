<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LuxCars-Brands</title>
        <link rel="stylesheet" href="../output.css">
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
                <li class="inline-block mr-4"><a href="../../index.html" class="text-white hover:text-gray-400">Home</a></li>
                <li class="inline-block mr-4"><a href="./About.html" class="text-white hover:text-gray-400">About</a></li>
                <li class="inline-block mr-4"><a href="./Service.html" class="text-white hover:text-gray-400">Services</a></li>
                <li class="inline-block mr-4"><a href="./ContactUs.html" class="text-white hover:text-gray-400">Contact</a></li>
                <li class="inline-block mr-4"><a href="./Listing.html" class="text-white hover:text-gray-400">Listing</a></li>
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
  
    <section class="pt-30 py-6 font-family-montserrat">

      <div class="px-6 py-12 bg-white">
        <!-- Breadcrumb -->
        <p class="text-sm text-gray-500 mb-4">Home / Listing / Brand</p>
      
        <!-- Title -->
        <h2 class="text-2xl font-semibold text-gray-800 mb-8">Seller</h2>
      
        <!-- Seller Info Section -->
        <div class="flex flex-col md:flex-row gap-8 items-center  w-full">
          <!-- Image -->
          <img src="../../assets/images/AboutUs page/car.jpg" alt="Seller" class="w-64 h-auto rounded shadow-md">
      
          <!-- Info -->
          <div>
            <h3 class="text-xl font-semibold text-gray-900 mb-2">Julia Gleason</h3>
            <p class="text-gray-600 max-w-md leading-relaxed">
              Nibh nullam vitae semper pharetra sit enim id. Ut eu non massa nec. Proin eget semper orci suspendisse in ornare adipiscing phasellus mauris. Velit faucibus at habitasse tempor sit odio ac commodo dui.
            </p>
          </div>
        </div>
      </div>
      
    </section>
    <section class="bg-[#050b22] py-6 font-family-montserrat ">
      <div class="w-full px-4 sm:px-6 lg:px-8">
        <div class="max-w-5xl mx-auto bg-white rounded-lg shadow p-4 flex flex-col lg:flex-row items-center justify-between space-y-4 lg:space-y-0 lg:space-x-4">
          
          <!-- Condition -->
          <select title="options" class="bg-transparent text-sm text-gray-700 px-2 py-1 border border-gray-200 rounded focus:outline-none w-full">
            <option disabled selected>Condition</option>
            <option>New</option>
            <option>Used</option>
          </select>
    
          <!-- Divider -->
          <div class="hidden lg:block h-6 border-l border-gray-300"></div>
    
          <!-- Makes -->
          <select title="options" class="bg-transparent text-sm text-gray-700 px-2 py-1 border border-gray-200 rounded focus:outline-none w-full">
            <option disabled selected>Any Makes</option>
            <!-- Add makes dynamically if needed -->
          </select>
    
          <!-- Divider -->
          <div class="hidden lg:block h-6 border-l border-gray-300"></div>
    
          <!-- Models -->
          <select title="options" class="bg-transparent text-sm text-gray-700 px-2 py-1 border border-gray-200 rounded focus:outline-none w-full">
            <option disabled selected>Any Models</option>
            <!-- Add models dynamically if needed -->
          </select>
    
          <!-- Divider -->
          <div class="hidden lg:block h-6 border-l border-gray-300"></div>
    
          <!-- Price -->
          <select title="options" class="bg-transparent text-sm text-gray-700 px-2 py-1 border border-gray-200 rounded focus:outline-none w-full">
            <option disabled selected>All Price</option>
            <!-- Add makes dynamically if needed -->
          </select>
    
          <!-- Divider -->
          <div class="hidden lg:block h-6 border-l border-gray-300"></div>
    
          <!-- Button -->
          <button type="button" class="bg-black text-white text-sm font-medium px-6 py-2 rounded-full hover:bg-white hover:text-black hover:border hover:border-black transition duration-300 w-full">
            🔍 Find Listing
          </button>
        </div>
      </div>
    </section>
    
      
    <section class="px-4 py-12 max-w-7xl mx-auto font-family-montserrat">
        
      
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
          
          <div class="flex items-center gap-2">
            <label for="sort" class="text-sm">Sort by</label>
            <select title="options" id="sort" class="text-sm border border-gray-300 rounded px-2 py-1">
              <option>Default</option>
              <option>Price Low to High</option>
              <option>Price High to Low</option>
            </select>
          </div>
        </div>
      
        <p class="text-sm text-gray-500 mb-8">Showing 1 – 12 of 15 results</p>
      
        <!-- Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
          <!-- Card -->
          <div class="bg-white p-4 rounded-xl shadow-md">
            <img src="../../assets/images/products/rolls-royce-ghost.png" alt="Car" class="rounded-lg">
            <h3 class="mt-3 font-semibold">T-Cross – 2023</h3>
            <p class="text-gray-500 text-sm">4.0 D5 PowerPulse Momentum</p>
            <div class="flex justify-between text-gray-600 text-sm mt-2">
                <span>15 Miles</span>
                <span>Petrol</span>
                <span>CVT</span>
            </div>
            <p class="mt-3 text-lg font-bold">$15,000</p>
            <a href="#" class="text-blue-600 mt-2 inline-block">View Details</a>
            </div>
          <div class="bg-white p-4 rounded-xl shadow-md">
            <img src="../../assets/images/products/rolls-royce-ghost.png" alt="Car" class="rounded-lg">
            <h3 class="mt-3 font-semibold">T-Cross – 2023</h3>
            <p class="text-gray-500 text-sm">4.0 D5 PowerPulse Momentum</p>
            <div class="flex justify-between text-gray-600 text-sm mt-2">
                <span>15 Miles</span>
                <span>Petrol</span>
                <span>CVT</span>
            </div>
            <p class="mt-3 text-lg font-bold">$15,000</p>
            <a href="#" class="text-blue-600 mt-2 inline-block">View Details</a>
            </div>
          <div class="bg-white p-4 rounded-xl shadow-md">
            <img src="../../assets/images/products/rolls-royce-ghost.png" alt="Car" class="rounded-lg">
            <h3 class="mt-3 font-semibold">T-Cross – 2023</h3>
            <p class="text-gray-500 text-sm">4.0 D5 PowerPulse Momentum</p>
            <div class="flex justify-between text-gray-600 text-sm mt-2">
                <span>15 Miles</span>
                <span>Petrol</span>
                <span>CVT</span>
            </div>
            <p class="mt-3 text-lg font-bold">$15,000</p>
            <a href="./Vehicle page.html" class="text-blue-600 mt-2 inline-block">View Details</a>
            </div>
      
          <!-- Repeat the card above for other listings -->
        </div>
        <!-- Pagination (placed below the grid) -->
        <div class="mt-10 flex justify-center items-center space-x-2">
            <!-- Previous Button -->
            <button type="button" title="button" class="w-8 h-8 flex items-center justify-center rounded-full border border-gray-300 text-gray-500 hover:bg-gray-100">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M15 19l-7-7 7-7" />
            </svg>
            </button>
        
            <!-- Page Numbers -->
            <button class="w-8 h-8 flex items-center justify-center rounded-full bg-gray-900 text-white font-medium">1</button>
            <button class="w-8 h-8 flex items-center justify-center rounded-full text-gray-700 hover:bg-gray-200">2</button>
        
            <!-- Next Button -->
            <button type="button" title="button" class="w-8 h-8 flex items-center justify-center rounded-full border border-gray-300 text-gray-500 hover:bg-gray-100">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M9 5l7 7-7 7" />
            </svg>
            </button>
        </div>
  
    </section>
    <footer class="bg-white  py-10 text-sm font-family-montserrat ">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="grid  grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-8 text-gray-800 place-content-center px-4">
          
              <!-- Company -->
              <div>
              <h3 class="font-semibold mb-3 text-center">Company</h3>
              <ul class="space-y-2">
                  <li><a href="#" class="hover:underline">About Us</a></li>
                  <li><a href="#" class="hover:underline">Blog</a></li>
                  <li><a href="#" class="hover:underline">Services</a></li>
                  <li><a href="#" class="hover:underline">FAQs</a></li>
                  <li><a href="#" class="hover:underline">Terms</a></li>
                  <li><a href="#" class="hover:underline">Contact Us</a></li>
              </ul>
              </div>
      
              <!-- Quick Links -->
              <div>
              <h3 class="font-semibold mb-3 text-center">Quick Links</h3>
              <ul class="space-y-2">
                  <li><a href="#" class="hover:underline">Get in Touch</a></li>
                  <li><a href="#" class="hover:underline">Help Center</a></li>
                  <li><a href="#" class="hover:underline">Live Chat</a></li>
                  <li><a href="#" class="hover:underline">How it Works</a></li>
              </ul>
              </div>
      
              <!-- Our Brands -->
              <div>
              <h3 class="font-semibold mb-3 text-center">Our Brands</h3>
              <ul class="space-y-2">
                  <li><a href="#" class="hover:underline">Toyota</a></li>
                  <li><a href="#" class="hover:underline">Porsche</a></li>
                  <li><a href="#" class="hover:underline">Audi</a></li>
                  <li><a href="#" class="hover:underline">BMW</a></li>
                  <li><a href="#" class="hover:underline">Ford</a></li>

              </ul>
              </div>
      
              <!-- Vehicle Types -->
              <div>
              <h3 class="font-semibold mb-3 text-center">Vehicles Type</h3>
              <ul class="space-y-2">
                  <li><a href="#" class="hover:underline">Sedan</a></li>
                  <li><a href="#" class="hover:underline">Hatchback</a></li>
                  <li><a href="#" class="hover:underline">SUV</a></li>
                  <li><a href="#" class="hover:underline">Coupe</a></li>
                  <li><a href="#" class="hover:underline">Truck</a></li>
                  <li><a href="#" class="hover:underline">Convertible</a></li>
              </ul>
              </div>
      
              <!-- Sale Hours & Social -->
              <div>
              <h3 class="font-semibold mb-3 text-center">Sale Hours</h3>
              <ul class="space-y-1">
                  <li>Mon – Fri: 09:00AM – 09:00 PM</li>
                  <li>Saturday: 09:00AM – 07:00PM</li>
                  <li>Sunday: Closed</li>
              </ul>
      
              <h3 class="font-semibold mt-6 mb-3 text-center">Connect With Us</h3>
              <div class="flex gap-4 text-gray-600">
                  <img src="../../assets/images/socialMedia/whatsapp.png" class="w-8 object-contain" alt="">
                  <img src="../../assets/images/socialMedia/facebook.png" class="w-8 object-contain" alt="">
                  <img src="../../assets/images/socialMedia/instagram.png" class="w-8 object-contain" alt="">
                  
              </div>
              </div>
      
          </div>
      
          <!-- Bottom Line -->
          <div class="mt-10 flex flex-col md:flex-row justify-between items-center text-gray-500 border-t pt-6 text-xs">
              <p id="year">© 2024 exemple.com. All rights reserved.</p>
              <div class="space-x-4 mt-2 md:mt-0">
              <a href="#" class="hover:underline">Terms & Conditions</a>
              <a href="#" class="hover:underline">Privacy Notice</a>
          </div>
      </div>
      </div>
    </footer>
    <script src="../Js/index.js"></script>
      
    
</body>
</html>