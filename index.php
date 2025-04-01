<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&family=Rowdies:wght@300;400;700&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    
</head>
<body>
    <header class="flex justify-between items-center p-6 bg-white shadow-md ">
        <div class="flex items-center justify-center gap-4">
            <p class="font-bold text-3xl font-['Roboto'] ">LuxCars</p>
            <p>+94740713025</p>
        </div>
        <div >
            <nav >
                <ul class="flex items-center justify-evenly gap-3 " >
                    <li class="hover:text-blue-500">Home</li>
                    <li class="hover:text-blue-500">About us</li>
                    <li class="hover:text-blue-500">Listing</li>
                    <li class="hover:text-blue-500">Contact us</li>

                </ul>
            </nav>
        </div>
        <div class="flex items-center justify-center gap-4">
            <img src="./assets/icons/search.svg" alt="" class="w-6">
            <div>Sigin in</div>
        </div>
        
    </header>
    <section class="relative  h-[90vh] bg-[url('./assets/images/rolls-royce-black.jpg')] bg-cover bg-center bg-no-repeat">
    <div class="absolute top-8 left-1/2 transform -translate-x-1/2  flex flex-col items-center justify-center gap-4 text-white    p-10  w-full max-w-2xl text-center">
        <h1 class="text-5xl font-bold font-['Roboto']">Find your Perfect Vehicle Online</h1>
        <p class="text-lg font-['Poppins']">We have a wide range of cars to choose from</p>
        <!-- <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Get Started</button> -->
    </div>
</section>
<section class="mt-12 mb-12">
    <h1 class="text-center text-5xl mb-6 font-bold font-sans ">Select A Body Type</h1>
    <!-- container -->
    <div>
        <div class="flex items-center justify-center gap-6 flex-wrap mt-6">
            
            <!-- SUV -->
            <div class="w-1/5 bg-white shadow-md rounded-lg flex flex-col items-center justify-center gap-4 p-4 hover:shadow-xl hover:scale-105 transition-all duration-300">
                <img src="./assets/images/suv.png" alt="SUV" class="h-24 object-contain">
                <p class="text-center text-2xl font-bold font-['Poppins']">SUV</p>
            </div>

            <!-- Truck -->
            <div class="w-1/5 bg-white shadow-md rounded-lg flex flex-col items-center justify-center gap-4 p-4 hover:shadow-xl hover:scale-105 transition-all duration-300">
                <img src="./assets/images/truck.png" alt="Truck" class="h-24 object-contain">
                <p class="text-center text-2xl font-bold font-['Poppins']">Truck</p>
            </div>

            <!-- Sedan -->
            <div class="w-1/5 bg-white shadow-md rounded-lg flex flex-col items-center justify-center gap-4 p-4 hover:shadow-xl hover:scale-105 transition-all duration-300">
                <img src="./assets/images/sedan-car.png" alt="Sedan" class="h-24 object-contain">
                <p class="text-center text-2xl font-bold font-['Poppins']">Sedan</p>
            </div>

            <!-- Coupe -->
            <div class="w-1/5 bg-white shadow-md rounded-lg flex flex-col items-center justify-center gap-4 p-4 hover:shadow-xl hover:scale-105 transition-all duration-300">
                <img src="./assets/images/coupe-car.png" alt="Coupe" class="h-24 object-contain">
                <p class="text-center text-2xl font-bold font-['Poppins']">Coupe</p>
            </div>

            <!-- Hatchback -->
            <div class="w-1/5 bg-white shadow-md rounded-lg flex flex-col items-center justify-center gap-4 p-4 hover:shadow-xl hover:scale-105 transition-all duration-300">
                <img src="./assets/images/hatchback-car.png" alt="Hatchback" class="h-24 object-contain">
                <p class="text-center text-2xl font-bold font-['Poppins']">Hatchback</p>
            </div>

        </div>
    </div>
</section>
<section class="px-8 py-16 bg-gray-100">
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8">
        
        <!-- Left Column (Text) -->
        <div class="flex items-center">
            <h2 class="text-4xl font-bold text-gray-900">
                We're <span class="text-black">BIG On What Matters To You</span>
            </h2>
        </div>

        <!-- Right Column (Features) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            
            <!-- Feature 1 -->
            <div class="flex items-start space-x-4">
                <img src="./assets/icons/financing.png" alt="Financing Icon" class="w-10 h-10">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Special Financing Offers</h3>
                    <p class="text-gray-600 text-sm">Our stress-free finance department that can find financial solutions to save you money.</p>
                </div>
            </div>

            <!-- Feature 2 -->
            <div class="flex items-start space-x-4">
                <img src="./assets/icons/dealership.png" alt="Dealership Icon" class="w-10 h-10">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Trusted Car Dealership</h3>
                    <p class="text-gray-600 text-sm">Our stress-free finance department that can find financial solutions to save you money.</p>
                </div>
            </div>

            <!-- Feature 3 -->
            <div class="flex items-start space-x-4">
                <img src="./assets/icons/pricing.png" alt="Pricing Icon" class="w-10 h-10">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Transparent Pricing</h3>
                    <p class="text-gray-600 text-sm">Our stress-free finance department that can find financial solutions to save you money.</p>
                </div>
            </div>

            <!-- Feature 4 -->
            <div class="flex items-start space-x-4">
                <img src="./assets/icons/service.png" alt="Service Icon" class="w-10 h-10">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Expert Car Service</h3>
                    <p class="text-gray-600 text-sm">Our stress-free finance department that can find financial solutions to save you money.</p>
                </div>
            </div>

        </div>
    </div>
</section>
<section class="px-6 py-12">
    <div class="max-w-6xl mx-auto">
        
        <!-- Section Heading -->
        <h2 class="text-3xl font-bold text-center mb-6">The Most Searched Cars</h2>

        <!-- Tabs -->
        <div class="flex justify-center space-x-6 border-b pb-3">
            <button class="text-lg font-medium text-blue-600 border-b-2 border-blue-600 pb-2">Sedan</button>
            <button class="text-lg font-medium text-gray-500 hover:text-blue-600">SUV</button>
            <button class="text-lg font-medium text-gray-500 hover:text-blue-600">Convertible</button>
            <button class="text-lg font-medium text-gray-500 hover:text-blue-600">Hatchback</button>
        </div>

        <!-- Car Cards Container -->
        <div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <!-- Card 1 -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="relative">
                    <img src="./assets/images/products/bmw-m4.jpg" alt="BMW 2024 2023" class="w-full h-48 object-cover">
                    <button class="absolute top-2 right-2 bg-white rounded-full p-2 shadow-md">❤️</button>
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-bold">T-Cross – 2023</h3>
                    <p class="text-gray-500 text-sm">4.0 D5 PowerPulse Momentum 5dr AWD</p>
                    <div class="flex items-center space-x-4 text-gray-600 text-sm mt-2">
                        <span>15 Miles</span>
                        <span>Petrol</span>
                        <span>CVT</span>
                    </div>
                    <div class="mt-4 flex justify-between items-center">
                        <p class="text-lg font-bold">$15,000</p>
                        <a href="#" class="text-blue-600 font-medium">View Details</a>
                    </div>
                </div>
            </div>

            <!-- Card 2 (With Green Badge) -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="relative">
                    <img src="./assets/images/products/bmw-m4.jpg" alt="BMW X8" class="w-full h-48 object-cover">
                    <span class="absolute top-2 left-2 bg-green-500 text-white text-xs font-bold px-3 py-1 rounded">Great Price</span>
                    <button class="absolute top-2 right-2 bg-white rounded-full p-2 shadow-md">❤️</button>
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-bold">BMW X8 – 5.0</h3>
                    <p class="text-gray-500 text-sm">4.0 D5 PowerPulse Momentum 5dr AWD</p>
                    <div class="flex items-center space-x-4 text-gray-600 text-sm mt-2">
                        <span>100 Miles</span>
                        <span>Hybrid</span>
                        <span>CVT</span>
                    </div>
                    <div class="mt-4 flex justify-between items-center">
                        <p class="text-lg font-bold">$12,000</p>
                        <a href="#" class="text-blue-600 font-medium">View Details</a>
                    </div>
                </div>
            </div>

            <!-- Card 3 (With Sale Badge) -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="relative">
                    <img src="./assets/images/products/bmw-m4.jpg" alt="Ranger Black" class="w-full h-48 object-cover">
                    <span class="absolute top-2 left-2 bg-blue-500 text-white text-xs font-bold px-3 py-1 rounded">Sale</span>
                    <button class="absolute top-2 right-2 bg-white rounded-full p-2 shadow-md">❤️</button>
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-bold">Ranger Black – 2021</h3>
                    <p class="text-gray-500 text-sm">2.0 D5 PowerPulse Momentum 5dr AWD</p>
                    <div class="flex items-center space-x-4 text-gray-600 text-sm mt-2">
                        <span>250 Miles</span>
                        <span>Petrol</span>
                        <span>Manual</span>
                    </div>
                    <div class="mt-4 flex justify-between items-center">
                        <p class="text-gray-500 text-sm line-through">$180,000</p>
                        <p class="text-lg font-bold">$165,000</p>
                        <a href="#" class="text-blue-600 font-medium">View Details</a>
                    </div>
                </div>
            </div>

            <!-- Card 4 (Another Sale Badge) -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="relative">
                    <img src="./assets/images/products/Audi-a6.jpg" alt="Audi A4" class="w-full h-48 object-cover">
                    <span class="absolute top-2 left-2 bg-blue-500 text-white text-xs font-bold px-3 py-1 rounded">Sale</span>
                    <button class="absolute top-2 right-2 bg-white rounded-full p-2 shadow-md">❤️</button>
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-bold">Audi A4 – 2022</h3>
                    <p class="text-gray-500 text-sm">2.0 D5 PowerPulse Momentum 5dr AWD</p>
                    <div class="flex items-center space-x-4 text-gray-600 text-sm mt-2">
                        <span>150 Miles</span>
                        <span>Diesel</span>
                        <span>CVT</span>
                    </div>
                    <div class="mt-4 flex justify-between items-center">
                        <p class="text-lg font-bold">$120,000</p>
                        <a href="#" class="text-blue-600 font-medium">View Details</a>
                    </div>
                </div>
            </div>

        </div>

        <!-- Pagination Controls -->
        <div class="mt-6 flex justify-center space-x-4">
            <button class="w-8 h-8 flex items-center justify-center bg-gray-200 rounded-full">◀</button>
            <button class="w-8 h-8 flex items-center justify-center bg-gray-200 rounded-full">▶</button>
        </div>

    </div>
</section>




    
</body>
</html>



