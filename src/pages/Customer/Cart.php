<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LuxCars-Brands</title>
        <link rel="stylesheet" href="/Assignment/src/output.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Dancing+Script:wght@400..700&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&family=Rowdies:wght@300;400;700&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap');
        </style>
    </head>
<body>
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
    <section class="bg-gray-100 py-30 font-family-montserrat">
        <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-3 gap-10">
          
          <!-- Left Column: Cart Items + Order Info -->
          <div class="md:col-span-2 space-y-10">
            <!-- Cart Items -->
            <div>
              <h2 class="text-2xl font-semibold">Your cart</h2>
              <p class="text-sm text-gray-500 mt-1">Not ready to checkout? <a href="/Assignment/" class="underline">Continue Shopping</a></p>
    
              <div class="mt-6 border-b pb-6 space-y-6">
                <!-- Item -->
                <div class="flex items-start gap-4">
                  <img src="/Assignment/assets/images/products/range-rover.jpg" alt="Car" class="w-24 h-20 object-cover rounded" />
                  <div class="flex-1">
                    <h3 class="font-semibold">Car Name</h3>
                    <p class="text-sm text-gray-500">Model: Name</p>
                    <p class="mt-1 text-sm">Quantity: 1</p>
                    <p class="mt-1 font-semibold">$99</p>
                  </div>
                  <button class="text-sm text-gray-500 underline">Remove</button>
                </div>
    
                <!-- Another Item -->
                <div class="flex items-start gap-4">
                  <img src="/Assignment/assets/images/products/range-rover.jpg" alt="Car" class="w-24 h-20 object-cover rounded" />
                  <div class="flex-1">
                    <h3 class="font-semibold">Car Name</h3>
                    <p class="text-sm text-gray-500">Model: Name</p>
                    <p class="mt-1 text-sm">Quantity: 1</p>
                    <p class="mt-1 font-semibold">$99</p>
                  </div>
                  <button class="text-sm text-gray-500 underline">Remove</button>
                </div>
              </div>
            </div>
    
            <!-- Order Info -->
            <div>
              <h3 class="text-lg font-semibold border-b pb-1">Order Information</h3>
              <div class="mt-4 bg-white border rounded p-4">
                <button class="flex justify-between w-full items-center font-medium text-left">
                  <span>Warrenty Policy</span>
                  <span>−</span>
                </button>
                <p class="text-sm text-gray-600 mt-3">Answer</p>
              </div>
            </div>
          </div>
    
          <!-- Right Column: Summary -->
          <aside class="space-y-6">
            <h3 class="text-lg font-semibold">Order Summary</h3>
            <div class="space-y-3 text-sm">
              <div class="flex justify-between">
                <span>Subtotal</span>
                <span>$200</span>
              </div>
              <div class="flex justify-between border-b pb-3">
                <span>Shipping</span>
                <span class="text-gray-500">Calculated at the next step</span>
              </div>
              <div class="flex justify-between font-semibold">
                <span>Total</span>
                <span>$200</span>
              </div>
            </div>
    
            <button class="w-full bg-black text-white py-3 font-semibold hover:bg-gray-800 transition">
              Continue to checkout
            </button>
          </aside>
    
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

      <script src="/Assignment/src/Js/index.js"></script>
</body>
</html>