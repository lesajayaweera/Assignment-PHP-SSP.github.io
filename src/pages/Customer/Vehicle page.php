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
                <li class="inline-block mr-4"><a href="/Assignment/index.html" class="text-white hover:text-gray-400">Home</a></li>
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
    <section class="max-w-7xl mx-auto px-4 py-30 font-family-montserrat">
        <!-- Breadcrumb -->
        <div class="text-sm text-gray-500 mb-2">
          <a href="/Assignment/index.html" class="text-blue-600 hover:underline">Home</a> / 
          <a href="./Listing.html" class="text-blue-600 hover:underline">Listings</a> / 
          Toyota Camry New
        </div>
      
        <!-- Title & Subheading -->
        <h1 class="text-3xl font-semibold text-gray-900">Toyota Camry New</h1>
        <p class="text-gray-500 mb-4">3.5 D5 PowerPulse Momentum 5dr AWD Geartronic Estate</p>
      
        <!-- Tags -->
        <div class="flex flex-wrap gap-2 mb-6">
          <span class="bg-gray-100 text-sm px-3 py-1 rounded-full">2023</span>
          <span class="bg-gray-100 text-sm px-3 py-1 rounded-full">20 miles</span>
          <span class="bg-gray-100 text-sm px-3 py-1 rounded-full">Automatic</span>
          <span class="bg-gray-100 text-sm px-3 py-1 rounded-full">Petrol</span>
        </div>
      
        <!-- Grid layout -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
          <!-- Images -->
          <div class="lg:col-span-2 space-y-4">
            <div class="relative">
              <img src="/Assignment/assets/images/products/cars/bmw.jpg" alt="Main car" class="rounded-lg w-full">
              <span class="absolute top-4 left-4 bg-green-600 text-white px-3 py-1 text-xs rounded-full">Great Price</span>
              <span class="absolute bottom-4 left-4 bg-white text-black px-3 py-1 text-sm rounded-full border">🎥 Video</span>
            </div>
            <div class="grid grid-cols-4 gap-4">
              <img title="images" src="/Assignment/assets/images/products/cars/bmw side.jpg" class="rounded-md">
              <img title="images" src="/Assignment/assets/images/products/cars/bmw frot.jpg" class="rounded-md">
              <img title="images" src="/Assignment/assets/images/products/cars/bmw frot.jpg" class="rounded-md">
              <img title="images" src="/Assignment/assets/images/products/cars/bmw frot.jpg" class="rounded-md">
            </div>
          </div>
      
          <!-- Sidebar -->
          <div class="space-y-6">
            <div class="flex justify-between items-center">
              <h2 class="text-2xl font-semibold">$40,000</h2>
              <div class="flex space-x-2 text-gray-500">
                <button title="Share">🔗</button>
                <button title="Save">❤️</button>
                <button title="Compare">📊</button>
              </div>
            </div>
            <p class="text-sm text-gray-500">Make An Offer Price</p>
      
            <!-- Dealer Info -->
            <div class="border rounded-lg p-4 space-y-4">
              <div class="flex items-center space-x-4">
                <img title="images" src="/Assignment/assets/images/profile pic.jpg" class="w-[30px] object-contain  rounded-full">
                <div>
                  <p class="font-medium">admin</p>
                  <p class="text-sm text-gray-500">943 Broadway, Brooklyn</p>
                </div>
              </div>
              <p class="text-sm">📞 +88-123456789</p>
              <div class="space-y-2">
                <button class="w-full bg-blue-600 text-white py-2 rounded-md">Message Dealer</button>
                <button class="w-full border py-2 rounded-md">Chat via WhatsApp</button>
              </div>
              <a href="#" class="block text-sm text-blue-600 hover:underline text-center">View All stock at this dealer →</a>
            </div>
          </div>
        </div>
      
        <!-- Car Overview -->
        <div class="mt-12">
          <h2 class="text-xl font-semibold mb-4">Car Overview</h2>
          <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 text-sm text-gray-700">
            <div><strong>Body:</strong> Sedan</div>
            <div><strong>Condition:</strong> New</div>
            <div><strong>Mileage:</strong> 20</div>
            <div><strong>Engine Size:</strong> 3.5</div>
            <div><strong>Fuel Type:</strong> Petrol</div>
            <div><strong>Doors:</strong> 4 Doors</div>
            <div><strong>Year:</strong> 2023</div>
            <div><strong>Cylinder:</strong> 12</div>
            <div><strong>Transmission:</strong> Automatic</div>
            <div><strong>Color:</strong> Black, Blue, White</div>
            <div><strong>Drive Type:</strong> AWD</div>
            <div><strong>VIN:</strong> MCB123818</div>
          </div>
        </div>
      
        <!-- Description -->
        <div class="mt-12">
          <h2 class="text-xl font-semibold mb-4">Description</h2>
          <p class="text-gray-600 text-sm leading-relaxed">
            Quisque imperdiet dignissim enim dictum finibus. Sed consectetur convallis enim eget laoreet.
            Aenean vitae nisi mollis, porta risus vel, dapibus lectus. Etiam ac suscipit eros, eget maximus.
            <br><br>
            Etiam sit amet ex pharetra, venenatis ante vehicula, gravida sapien...
          </p>
        </div>
        <div class="max-w-7xl mx-auto  py-10">
            <h2 class="text-xl font-semibold mb-6">Features</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 text-sm text-gray-800">
              <div>
                <h3 class="font-medium mb-2">Interior</h3>
                <ul class="space-y-1">
                  <li>✔️ Air Conditioner</li>
                  <li>✔️ Digital Odometer</li>
                  <li>✔️ Heater</li>
                  <li>✔️ Leather Seats</li>
                  <li>✔️ Panoramic Moonroof</li>
                  <li>✔️ Tachometer</li>
                  <li>✔️ Touchscreen Display</li>
                </ul>
              </div>
              <div>
                <h3 class="font-medium mb-2">Safety</h3>
                <ul class="space-y-1">
                  <li>✔️ Anti-lock Braking</li>
                  <li>✔️ Brake Assist</li>
                  <li>✔️ Child Safety Locks</li>
                  <li>✔️ Driver Air Bag</li>
                  <li>✔️ Power Door Locks</li>
                  <li>✔️ Stability Control</li>
                  <li>✔️ Traction Control</li>
                </ul>
              </div>
              <div>
                <h3 class="font-medium mb-2">Exterior</h3>
                <ul class="space-y-1">
                  <li>✔️ Fog Lights Front</li>
                  <li>✔️ Rain Sensing Wiper</li>
                  <li>✔️ Rear Spoiler</li>
                  <li>✔️ Windows – Electric</li>
                </ul>
              </div>
              <div>
                <h3 class="font-medium mb-2">Comfort & Convenience</h3>
                <ul class="space-y-1">
                  <li>✔️ Android Auto</li>
                  <li>✔️ Apple CarPlay</li>
                  <li>✔️ Bluetooth</li>
                  <li>✔️ HomeLink</li>
                  <li>✔️ Power Steering</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="max-w-7xl mx-auto  py-10 border-t mt-10">
            <h2 class="text-xl font-semibold mb-6">Dimensions & Capacity</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 text-sm text-gray-800">
              <div><strong>Length:</strong> 4950mm</div>
              <div><strong>Width:</strong> 2100mm</div>
              <div><strong>Height:</strong> 1550mm</div>
              <div><strong>Width (including mirrors):</strong> 2140mm</div>
              <div><strong>Wheelbase:</strong> 2580mm</div>
              <div><strong>Gross Vehicle Weight (kg):</strong> 1550</div>
              <div><strong>Height (roof rails):</strong> 1850mm</div>
              <div><strong>Max Loading Weight (kg):</strong> 1200</div>
              <div><strong>Luggage Capacity (Seats Up):</strong> 480L</div>
              <div><strong>Max Roof Load (kg):</strong> 400</div>
              <div><strong>Luggage Capacity (Seats Down):</strong> 850L</div>
              <div><strong>No. of Seats:</strong> 5</div>
            </div>
          </div>
          <div class="max-w-7xl mx-auto  py-10 border-t mt-10">
            <h2 class="text-xl font-semibold mb-6">Engine and Transmission</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 text-sm text-gray-800">
              <div><strong>Fuel Tank Capacity (Litres):</strong> 80</div>
              <div><strong>Minimum Kerbweight (kg):</strong> 350</div>
              <div><strong>Max. Towing Weight – Braked (kg):</strong> 1000</div>
              <div><strong>Turning Circle (m):</strong> 6500</div>
              <div><strong>Max. Towing Weight – Unbraked (kg):</strong> 1100</div>
            </div>
          </div>
          
          
          
      </section>
      <section class="px-6 py-10 font-family-montserrat bg-white border-t max-w-7xl mx-auto">
        <!-- Location Heading & Address -->
        <h2 class="text-lg font-semibold text-gray-900 mb-1">Location</h2>
        <p class="text-sm text-gray-600 mb-1">329 Kent Ave, Brooklyn</p>
      
        <!-- Get Direction Link -->
        <a rel="noopener" href="https://www.google.com/maps?q=329+Kent+Ave,+Brooklyn" 
           target="_blank" 
           class="text-sm text-blue-600 hover:underline inline-flex items-center gap-1 mb-4">
          Get Direction
          <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 3l7 7m0 0l-7 7m7-7H3" />
          </svg>
        </a>
      
        <!-- Google Map -->
        <div class="w-full h-80 rounded-lg overflow-hidden shadow">
          <iframe
            class="w-full h-full"
            frameborder="0"
            style="border:0"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3021.7054555030996!2d-73.96848268487805!3d40.71277697933112!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a5a7b64fef7%3A0x5a8bb3a8727ed3f6!2s329%20Kent%20Ave%2C%20Brooklyn%2C%20NY%2011211%2C%20USA!5e0!3m2!1sen!2s!4v1610000000000!5m2!1sen!2s"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
          </iframe>
        </div>
      </section>
      
      <section class="max-w-5xl mx-auto px-4 py-10 border-t font-family-montserrat">
        <h2 class="text-xl font-semibold mb-6">Financing Calculator</h2>
      
        <form class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-800">
          <div>
            <label class="block mb-1">Price ($)</label>
            <input type="number" placeholder="10000" min="1" id="price" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-slate-500">
          </div>
          <div>
            <label class="block mb-1">Interest Rate</label>
            <input type="number" placeholder="10" min="1" id="rate" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-slate-500">
          </div>
          <div>
            <label class="block mb-1">Loan Term (years)</label>
            <input type="number" placeholder="3" min="1" id="term" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-slate-500">
          </div>
          <div>
            <label class="block mb-1">Down Payment</label>
            <input type="number" placeholder="5000" min="1" id="down" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-slate-500">
          </div>
      
          <div class="col-span-1 md:col-span-2">
            <button type="button" id="calculator" class="mt-4 inline-flex items-center bg-black text-white px-6 py-2 rounded-full hover:bg-slate-700 transition">
              Calculate
              <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
              </svg>
            </button>
            <div id="result" class="mt-6 text-lg text-gray-800 font-medium hidden">
                Monthly Payment: <span id="monthly" class="text-blue-600 font-bold"></span>
              </div>
          </div>
        </form>
        
      </section>
      <section class="py-10 px-6 max-w-5xl mx-auto  bg-white font-family-montserrat">
        <h2 class="text-2xl font-semibold mb-6">2 Reviews</h2>
        
        <div class="flex flex-wrap lg:gap-20 gap-6 lg:justify-center
          mx-10 items-start justify-around">
          <!-- Overall Rating Circle -->
          <div class="flex flex-col items-center">
            <div class="relative w-24 h-24 rounded-full border-4 border-blue-500 flex items-center justify-center">
              <span class="text-2xl font-bold text-blue-500">4.5</span>
            </div>
            <span class="text-sm text-gray-600 mt-2">Out of 5</span>
          </div>
      
          <!-- Category Ratings -->
          <div class="grid grid-cols-1 lg:grid-cols-2 lg:gap-x-12 gap-y-2 text-sm">
            <div class="flex justify-between w-60">
              <span>Comfort</span> <span class="text-blue-600">⭐ 5.0</span>
            </div>
            <div class="flex justify-between w-60">
              <span>Interior Design</span> <span class="text-blue-600">⭐ 4.5</span>
            </div>
            <div class="flex justify-between w-60">
              <span>Exterior Styling</span> <span class="text-blue-600">⭐ 5.0</span>
            </div>
            <div class="flex justify-between w-60">
              <span>Value For The Money</span> <span class="text-blue-600">⭐ 5.0</span>
            </div>
            <div class="flex justify-between w-60">
              <span>Performance</span> <span class="text-blue-600">⭐ 5.0</span>
            </div>
            <div class="flex justify-between w-60">
              <span>Reliability</span> <span class="text-blue-600">⭐ 4.5</span>
            </div>
          </div>
        </div>
        <div class="space-y-6 mt-10">
            <!-- Review Item -->
            <div class="border-t pt-6">
              <div class="flex items-center space-x-3 mb-2">
                <img title="images" src="https://i.pravatar.cc/40" class="w-10 h-10 rounded-full" />
                <div>
                  <p class="font-semibold">Demo</p>
                  <p class="text-sm text-gray-500">November 30, 2023</p>
                </div>
              </div>
              <div class="text-blue-600 mb-1">⭐ 4.7</div>
              <p class="text-sm text-gray-700">
                Etiam sit amet ex pharetra, venenatis ante vehicula, gravida sapien...
              </p>
            </div>
          </div>
          <div class="mt-12 border-t pt-10">
            <h3 class="text-xl font-semibold mb-4">Add a review</h3>
            
            <!-- Ratings -->
            <div class="grid grid-cols-2 gap-4 mb-6">
              <div>Comfort ⭐⭐⭐⭐⭐</div>
              <div>Interior Design ⭐⭐⭐⭐⭐</div>
              <div>Exterior Styling ⭐⭐⭐⭐⭐</div>
              <div>Value For The Money ⭐⭐⭐⭐⭐</div>
              <div>Performance ⭐⭐⭐⭐⭐</div>
              <div>Reliability ⭐⭐⭐⭐⭐</div>
            </div>
          
            <!-- Input Fields -->
            <form class="space-y-4">
              <div class="grid grid-cols-2 gap-4">
                <input type="text" placeholder="Name" class="w-full border rounded p-2" />
                <input type="email" placeholder="Email" class="w-full border rounded p-2" />
              </div>
          
              <div>
                <textarea rows="4" placeholder="Review" class="w-full border rounded p-2"></textarea>
              </div>
          
              <div class="flex items-center space-x-2">
                <input type="checkbox" id="save" />
                <label for="save" class="text-sm text-gray-600">Save my name and email</label>
              </div>
          
              <button type="submit" class="bg-black text-white px-6 py-2 rounded hover:bg-slate-700">
                Submit Review
              </button>
            </form>
          </div>
          
          
      </section>
      <section class="px-6 py-10 font-family-montserrat bg-white border-t max-w-5xl mx-auto">
        <div class="flex items-center justify-between mb-4">
          <h2 class="text-xl font-semibold text-gray-900">Related Listings</h2>
          <a href="#" class="text-sm text-blue-600 hover:underline flex items-center gap-1">
            View All
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 3l7 7m0 0l-7 7m7-7H3" />
            </svg>
          </a>
        </div>
      
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
          <!-- Card Item -->
          <div class="bg-white shadow rounded-xl overflow-hidden">
            <div class="relative">
              <img src="/Assignment/assets/images/products/porsche_911.png" alt="Car" class="w-full h-48 object-cover" />
              <span class="absolute top-4 left-4 bg-green-500 text-white text-xs font-semibold px-2 py-1 rounded">Great Price</span>
              <button class="absolute top-2 right-2 bg-white p-1 rounded-full shadow text-gray-600 hover:text-black">♥</button>
            </div>
            <div class="p-4 space-y-2">
              <h3 class="text-sm font-semibold text-gray-800">Mercedes-Benz, C Class</h3>
              <p class="text-xs text-gray-500">2.0D PowerAuto Momentum 5dr Auto</p>
              <div class="flex flex-wrap text-xs text-gray-500 gap-4 mt-2">
                <span>100 Miles</span>
                <span>Petrol</span>
                <span>Automatic</span>
              </div>
              <div class="flex items-center justify-between mt-4">
                <span class="text-lg font-bold text-gray-900">$35,000</span>
                <a href="#" class="text-sm text-blue-600 hover:underline">View Details</a>
              </div>
            </div>
          </div>
      
          <!-- Duplicate and change details for more cards -->
          <!-- Card 2 -->
          <div class="bg-white shadow rounded-xl overflow-hidden">
            <div class="relative">
              <img src="/Assignment/assets/images/products/porsche_new.png" alt="Car" class="w-full h-48 object-cover" />
              <span class="absolute top-4 left-4 bg-blue-500 text-white text-xs font-semibold px-2 py-1 rounded">Low Mileage</span>
              <button class="absolute top-2 right-2 bg-white p-1 rounded-full shadow text-gray-600 hover:text-black">♥</button>
            </div>
            <div class="p-4 space-y-2">
              <h3 class="text-sm font-semibold text-gray-800">Ranger White – 2022</h3>
              <p class="text-xs text-gray-500">2.0D PowerAuto Momentum 5dr Auto</p>
              <div class="flex flex-wrap text-xs text-gray-500 gap-4 mt-2">
                <span>30,000 Miles</span>
                <span>Diesel</span>
                <span>Manual</span>
              </div>
              <div class="flex items-center justify-between mt-4">
                <span class="text-lg font-bold text-gray-900">$25,000</span>
                <a href="#" class="text-sm text-blue-600 hover:underline">View Details</a>
              </div>
            </div>
          </div>
      
          <!-- Add more cards below like above -->
          <!-- Card 3 -->
          <!-- Card 4 -->
        </div>
        <div class="mt-10 flex justify-center items-center space-x-2">
          <!-- Previous Button -->
          <button type="button" title="button" class="w-8 h-8 flex items-center justify-center rounded-full border border-gray-300 text-gray-500 hover:bg-gray-100">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path d="M15 19l-7-7 7-7" />
          </svg>
          </button>
      
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
      
      
    <script src="../Js/index.js"></script>
    <script src="../Js/vehicle.js"></script>
</body>
</html>