<!DOCTYPE html>
<html lang="en">
      <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LuxCars-Service</title>
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
        <section class="bg-white px-4 mt-25 py-10 sm:px-6 lg:px-8 font-family-montserrat">
            <div class="max-w-7xl mx-auto">
              
              <!-- Breadcrumb -->
              <nav class="text-sm text-gray-500 mb-2">
                <a href="#" class="text-blue-600 hover:underline">Home</a>
                <span class="mx-1">/</span>
                <span>Services</span>
              </nav>
          
              <!-- Page Title -->
              <h1 class="text-2xl font-semibold text-gray-900">Services</h1>
          
            </div>
          </section>
          
        <section class="bg-white py-10 px-4 sm:px-6 lg:px-8 font-family-montserrat">
            <div class="max-w-7xl mx-auto flex flex-col lg:flex-row items-center gap-12">
              
              <!-- Text Content -->
              <div class="max-w-lg text-center lg:text-left">
               
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Service Options Offered by luxCars</h2>
                <p class="text-gray-600 mb-6">
                  Choose from thousands of vehicles from multiple brands and buy online with Click & Drive, or visit us at one of our dealerships today.
                </p>
                <a href="#" class="inline-flex items-center px-6 py-3 bg-white text-black text-sm font-medium rounded-md hover:bg-black hover:text-white border transition">
                  See Your Service Options <span class="ml-2">↗</span>
                </a>
              </div>
          
              <!-- Image -->
              <div class="w-full lg:w-3/4 grid grid-cols-1 gap-4 lg:grid-cols-2">
                <div class="grid grid-rows-1 lg:grid-rows-2 gap-2">
                  <img src="/Assignment/assets/images/Service page/service.jpg" alt="Service" class="rounded-xl shadow-lg w-full object-cover">
                <img src="/Assignment/assets/images/Service page/service team.jpg" alt="Service Team" class="rounded-xl shadow-lg w-full object-cover">

                </div>
                <img src="/Assignment/assets/images/Service page/mechanic.jpg" alt="Service" class="rounded-xl shadow-lg w-full object-cover">
              </div>
          
            </div>
          </section>
          <section class="bg-gray-50 py-16 mx-12 font-family-montserrat rounded-lg shadow">
            <div class="max-w-7xl mx-auto text-center">
              <h2 class="text-2xl md:text-3xl font-bold mb-12">Customers Get Great benefits!</h2>
          
              <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
                <!-- Benefit 1 -->
                <div class="flex flex-col items-center text-center">
                  <img src="/Assignment/assets/icons/financing.png" alt="Icon" class="w-12 h-12 mb-4 " />
                  <h3 class="font-semibold mb-2">Special Financing Offers</h3>
                  <p class="text-sm text-gray-600">Our stress-free finance department that can find financial solutions to save you money.</p>
                </div>
          
                <!-- Benefit 2 -->
                <div class="flex flex-col items-center text-center">
                  <img src="/Assignment/assets/icons/dealership.png" alt="Icon" class="w-12 h-12 mb-4 " />
                  <h3 class="font-semibold mb-2">Trusted Car Dealership</h3>
                  <p class="text-sm text-gray-600">Our stress-free finance department that can find financial solutions to save you money.</p>
                </div>
          
                <!-- Benefit 3 -->
                <div class="flex flex-col items-center text-center">
                  <img src="/Assignment/assets/icons/pricing.png" alt="Icon" class="w-12 h-12 mb-4 " />
                  <h3 class="font-semibold mb-2">Transparent Pricing</h3>
                  <p class="text-sm text-gray-600">Our stress-free finance department that can find financial solutions to save you money.</p>
                </div>
          
                <!-- Benefit 4 -->
                <div class="flex flex-col items-center text-center">
                  <img src="/Assignment/assets/icons/service.png" alt="Icon" class="w-12 h-12 mb-4 " />
                  <h3 class="font-semibold mb-2">Expert Car Service</h3>
                  <p class="text-sm text-gray-600">Our stress-free finance department that can find financial solutions to save you money.</p>
                </div>
              </div>
            </div>
          </section>
          
          <section class="py-12 px-4 md:px-16 bg-white font-family-montserrat">
            <div class="max-w-7xl mx-auto">
              <h2 class="text-2xl font-bold mb-6">Our Services</h2>
          
              <!-- Scrollable card container -->
              <div class="relative">
                <!-- Cards Wrapper -->
                <div class="flex space-x-6 space-y-4 overflow-x-auto scrollbar-hide scroll-smooth">
                  <!-- Card -->
                  <div class="min-w-[250px] max-w-sm bg-white rounded-xl shadow p-4  flex-shrink-0">
                    <img src="/Assignment/assets/images/products/bmw-m4.jpg" alt="Car" class="rounded-lg mb-4 object-cover w-full h-40">
                    <h3 class="font-semibold text-md mb-1">2024 BMW ALPINA XB7 wit...</h3>
                    <p class="text-sm text-gray-500 mb-2">Aliquam hendrerit sollicitudin purus, quis rutrum mi accumsan nec.</p>
                    <a href="#" class="text-sm text-blue-600 font-medium flex items-center gap-1">
                      Explore More
                      <span>↗</span>
                    </a>
                  </div>
          
                  <!-- Duplicate cards as needed -->
                  <div class="min-w-[250px] max-w-sm bg-white rounded-xl shadow p-4 flex-shrink-0">
                    <img src="/Assignment/assets/images/products/bmw-m4.jpg" alt="Car" class="rounded-lg mb-4 object-cover w-full h-40">
                    <h3 class="font-semibold text-md mb-1">BMW X6 M50i is designed...</h3>
                    <p class="text-sm text-gray-500 mb-2">Aliquam hendrerit sollicitudin purus, quis rutrum mi accumsan nec.</p>
                    <a href="#" class="text-sm text-blue-600 font-medium flex items-center gap-1">
                      Explore More
                      <span>↗</span>
                    </a>
                  </div>
                  <div class="min-w-[250px] max-w-sm bg-white rounded-xl shadow p-4 flex-shrink-0">
                    <img src="/Assignment/assets/images/products/bmw-m4.jpg" alt="Car" class="rounded-lg mb-4 object-cover w-full h-40">
                    <h3 class="font-semibold text-md mb-1">BMW X6 M50i is designed...</h3>
                    <p class="text-sm text-gray-500 mb-2">Aliquam hendrerit sollicitudin purus, quis rutrum mi accumsan nec.</p>
                    <a href="#" class="text-sm text-blue-600 font-medium flex items-center gap-1">
                      Explore More
                      <span>↗</span>
                    </a>
                  </div>
                  <div class="min-w-[250px] max-w-sm bg-white rounded-xl shadow p-4 flex-shrink-0">
                    <img src="/Assignment/assets/images/products/bmw-m4.jpg" alt="Car" class="rounded-lg mb-4 object-cover w-full h-40">
                    <h3 class="font-semibold text-md mb-1">BMW X6 M50i is designed...</h3>
                    <p class="text-sm text-gray-500 mb-2">Aliquam hendrerit sollicitudin purus, quis rutrum mi accumsan nec.</p>
                    <a href="#" class="text-sm text-blue-600 font-medium flex items-center gap-1">
                      Explore More
                      <span>↗</span>
                    </a>
                  </div>
                  <div class="min-w-[250px] max-w-sm bg-white rounded-xl shadow p-4 flex-shrink-0">
                    <img src="/Assignment/assets/images/products/bmw-m4.jpg" alt="Car" class="rounded-lg mb-4 object-cover w-full h-40">
                    <h3 class="font-semibold text-md mb-1">BMW X6 M50i is designed...</h3>
                    <p class="text-sm text-gray-500 mb-2">Aliquam hendrerit sollicitudin purus, quis rutrum mi accumsan nec.</p>
                    <a href="#" class="text-sm text-blue-600 font-medium flex items-center gap-1">
                      Explore More
                      <span>↗</span>
                    </a>
                  </div>
                  <div class="min-w-[250px] mb-4 max-w-sm bg-white rounded-xl shadow p-4 flex-shrink-0">
                    <img src="/Assignment/assets/images/products/bmw-m4.jpg" alt="Car" class="rounded-lg mb-4 object-cover w-full h-40">
                    <h3 class="font-semibold text-md mb-1">BMW X6 M50i is designed...</h3>
                    <p class="text-sm text-gray-500 mb-2">Aliquam hendrerit sollicitudin purus, quis rutrum mi accumsan nec.</p>
                    <a href="#" class="text-sm text-blue-600 font-medium flex items-center gap-1">
                      Explore More
                      <span>↗</span>
                    </a>
                  </div>
                  
          
                  
                </div>
          
                <!-- Optional: Left/Right scroll buttons -->
                <div class="absolute left-0 top-1/2 -translate-y-1/2 bg-white p-2 rounded-full shadow cursor-pointer hidden md:flex">
                  <button id="left" type="button" >❮</button>
                </div>
                <div class="absolute right-0 top-1/2 -translate-y-1/2 bg-white p-2 rounded-full shadow cursor-pointer hidden md:flex">
                  <button id="right" type="button" >❯</button>
                </div>
              </div>
            </div>
          </section>
          
          <section class="py-16 bg-gray-50 flex items-center justify-center p-4 font-family-montserrat">
            <div class="bg-white p-6 md:p-10 rounded-lg shadow-md max-w-6xl w-full flex flex-col md:flex-row gap-8">
              
              <!-- Left: Service Form -->
              <div class="flex-1">
                <h2 class="text-2xl font-bold mb-4">Schedule Service</h2>
                <p class="text-sm text-gray-600 mb-6">
                  Use our loan calculator to calculate payments over the life of your loan. Enter your information to see how much your monthly payments could be. You can adjust length of loan, down payment and interest rate to see how those changes raise or lower your payments.
                </p>
                
                <form class="space-y-4">
                  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <input type="text" placeholder="Name" class="border p-2 rounded w-full focus:outline-gray-600" />
                    <input type="email" placeholder="Email" class="border p-2 rounded w-full focus:outline-gray-600" />
                    <input type="tel" placeholder="Phone" class="border p-2 rounded w-full focus:outline-gray-600" />
                    <input type="text" placeholder="Make Model" class="border p-2 rounded w-full focus:outline-gray-600" />
                    <input type="text" placeholder="Mileage (optional)" class="border p-2 rounded w-full focus:outline-gray-600" />
                    <input title="date" type="date" class="border p-2 rounded w-full focus:outline-gray-600" />
                  </div>
                  <button type="button" class="w-full bg-black text-white p-3 rounded hover:bg-white hover:text-black hover:border transition">
                    Request a Service
                  </button>
                  <p class="text-xs text-gray-500 mt-2">
                    By submitting this form you will be scheduling a service appointment at no obligation and will be contacted within 48 hours by a service advisor.
                  </p>
                </form>
              </div>
          
              <!-- Right: Opening Hours -->
              <div class="bg-gray-100 rounded-lg p-6 w-full md:w-64">
                <h3 class="font-semibold text-lg mb-4">Opening hours</h3>
                <ul class="text-sm space-y-2">
                  <li class="flex justify-between"><span>Sunday</span><span>8:00 - 12:00</span></li>
                  <li class="flex justify-between"><span>Monday</span><span>8:00 - 17:00</span></li>
                  <li class="flex justify-between"><span>Tuesday</span><span>8:00 - 17:00</span></li>
                  <li class="flex justify-between"><span>Wednesday</span><span>8:00 - 17:00</span></li>
                  <li class="flex justify-between"><span>Thursday</span><span>8:00 - 17:00</span></li>
                  <li class="flex justify-between"><span>Friday</span><span>8:00 - 17:00</span></li>
                  <li class="flex justify-between"><span>Saturday</span><span>8:00 - 12:00</span></li>
                </ul>
              </div>
          
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
                        <img src="/Assignment/assets/images/socialMedia/whatsapp.png" class="w-8 object-contain" alt="">
                        <img src="/Assignment/assets/images/socialMedia/facebook.png" class="w-8 object-contain" alt="">
                        <img src="/Assignment/assets/images/socialMedia/instagram.png" class="w-8 object-contain" alt="">
                        
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
          
          
        <script src="/Assignment/src/Js/index.js"></script>
        <script src="/Assignment/src/Js/Service.js"></script>
    </body>
</html>