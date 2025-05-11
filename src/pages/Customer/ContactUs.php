<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LuxCars-Home</title>
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
    <section class="bg-white py-30 font-family-montserrat">
        <!-- Map Embed -->
        <div class="w-full h-96">
          
          <iframe class="w-full h-full border-0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31687.80372271747!2d79.88771604069434!3d6.893537958746933!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae25990379a8a4f%3A0x4b887a5266410b49!2sSri%20Jayawardenepura%20Kotte!5e0!3m2!1sen!2slk!4v1744970702310!5m2!1sen!2slk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      
        <!-- Contact Form + Info -->
        <div class="max-w-7xl mx-auto px-4 py-16 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-3 gap-10">
          <!-- Form -->
          <div class="lg:col-span-2">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Get In Touch</h2>
            <p class="text-gray-500 mb-8">Etiam pharetra egestas interdum blandit viverra morbi consequat mi non bibendum egestas quam egestas nulla.</p>
            
            <form class="grid grid-cols-1 sm:grid-cols-2 gap-6">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">First Name*</label>
                <input type="text" placeholder="Jhon" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Last Name*</label>
                <input type="text" placeholder="Hamilton" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email*</label>
                <input type="email" placeholder="example@gmail.com" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Phone*</label>
                <input type="tel" placeholder="+90 123 456 789" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
              </div>
              <div class="col-span-1 sm:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Message</label>
                <textarea rows="4" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 font-family-montserrat" placeholder="Your message..."></textarea>
              </div>
              <div class="col-span-1 sm:col-span-2">
                <button type="button" class="bg-black text-white px-6 py-2 rounded-md hover:bg-white hover:text-black hover:border transition">Send Message</button>
              </div>
            </form>
          </div>
      
          <!-- Contact Details -->
          <div class="bg-gray-50 rounded-lg p-6">
            <h3 class="text-lg font-semibold mb-4">Contact details</h3>
            <p class="text-sm text-gray-600 mb-6">
              Etiam pharetra egestas interdum blandit viverra morbi consequat mi non bibendum egestas quam egestas nulla.
            </p>
            <ul class="space-y-4 text-sm text-gray-800">
              <li>
                <strong class="block text-gray-600 mb-1">📍 Address</strong>
                123 Queensberry Street, North Melbourne VIC3051, Australia.
              </li>
              <li>
                <strong class="block text-gray-600 mb-1">✉️ Email</strong>
                ali@boxcars.com
              </li>
              <li>
                <strong class="block text-gray-600 mb-1">📞 Phone</strong>
                +86 968 123 456
              </li>
            </ul>
            <div class="mt-6 flex space-x-4">
              <a href="#" class="text-gray-600 hover:text-blue-600"><i class="fab fa-facebook-f"></i></a>
              <a href="#" class="text-gray-600 hover:text-blue-600"><i class="fab fa-twitter"></i></a>
              <a href="#" class="text-gray-600 hover:text-blue-600"><i class="fab fa-linkedin-in"></i></a>
              <a href="#" class="text-gray-600 hover:text-blue-600"><i class="fab fa-instagram"></i></a>
            </div>
          </div>
        </div>
      </section>
      <section class="bg-white py-16 px-4 sm:px-6 lg:px-8 font-family-montserrat">
        <div class="max-w-7xl mx-auto">
          <h2 class="text-2xl font-bold text-gray-900 mb-10">Our Offices</h2>
      
          <div class="grid grid-cols-1 md:grid-cols-3 gap-10 text-sm text-gray-700">
            <!-- San Francisco Office -->
            <div>
              <h3 class="font-semibold text-gray-900 mb-2">San Francisco</h3>
              <p>456 Dewey Blvd, San Francisco,<br> CA 94116, USA</p>
              <a href="#" class="inline-block mt-2 text-blue-600 hover:underline text-xs">
                See on Map <span aria-hidden="true">↗</span>
              </a>
              <div class="mt-4 flex items-center space-x-3">
                <span>📧</span>
                <span>sfteam@boxcars.com</span>
              </div>
              <div class="mt-1 flex items-center space-x-3">
                <span>📞</span>
                <span>+86 658 123 456</span>
              </div>
            </div>
      
            <!-- New York Office -->
            <div>
              <h3 class="font-semibold text-gray-900 mb-2">New York</h3>
              <p>232–240 Wilton Ave, Brooklyn,<br> NY 11237, USA</p>
              <a href="#" class="inline-block mt-2 text-blue-600 hover:underline text-xs">
                See on Map <span aria-hidden="true">↗</span>
              </a>
              <div class="mt-4 flex items-center space-x-3">
                <span>📧</span>
                <span>ny@boxcars.com</span>
              </div>
              <div class="mt-1 flex items-center space-x-3">
                <span>📞</span>
                <span>+76 958 123 456</span>
              </div>
            </div>
      
            <!-- London Office -->
            <div>
              <h3 class="font-semibold text-gray-900 mb-2">London</h3>
              <p>127–143 Borough High St.,<br> London SE1 1NP, UK</p>
              <a href="#" class="inline-block mt-2 text-blue-600 hover:underline text-xs">
                See on Map <span aria-hidden="true">↗</span>
              </a>
              <div class="mt-4 flex items-center space-x-3">
                <span>📧</span>
                <span>ali2@boxcars.com</span>
              </div>
              <div class="mt-1 flex items-center space-x-3">
                <span>📞</span>
                <span>+96 222 333 888</span>
              </div>
            </div>
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