<?php include("./src/private/initialize.php");?>
<?php $pageTitle = "Brands";
$script = "Brands";
?>
<?php include_once (SHARED_PATH . '/customer_header.php'); ?>
    <section class="pt-30 py-6 font-family-montserrat">

      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <p class="text-sm text-gray-500 mb-2">
          <a href="../../index.html" class="hover:underline transition">Home</a> / <span class="text-black">Brand</span>
        </p>
        <h1 class="text-3xl font-bold text-gray-900 mb-6">Brand</h1>
      </div>
      <div  class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-16 max-w-7xl mx-auto px-10 space-x-4">
        <div class="max-w-6xl mx-auto">
          <h2 class="text-2xl font-bold">Brand Overview</h2>
          <p class="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium minus asperiores a, perferendis sunt adipisci beatae vitae fuga aliquid non, quaerat tenetur odit voluptatem reiciendis sit ipsa nobis, odio similique.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-3 items-center p-4">
          <!-- Left Column -->
          <div class="max-w-[400px] w-full mx-auto">
            <img src="/Assignment/assets/images/Login page/ben-cvoro-UQpsWWHtCS8-unsplash (1).jpg" class="w-full h-auto object-cover rounded-lg" alt="">
          </div>
        
          <!-- Right Column -->
          <div class="flex flex-col space-y-4">
            <img src="/Assignment/assets/images/Login page/metin-ozer-hShrr0WvrQs-unsplash.jpg" class="w-full h-auto object-cover rounded-lg" alt="">
            <img src="/Assignment/assets/images/Login page/landrover-water.jpg" class="w-full h-auto object-cover rounded-lg" alt="">
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
            <img src="/Assignment/assets/images/products/rolls-royce-ghost.png" alt="Car" class="rounded-lg">
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
            <img src="/Assignment/assets/images/products/rolls-royce-ghost.png" alt="Car" class="rounded-lg">
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
            <img src="/Assignment/assets/images/products/rolls-royce-ghost.png" alt="Car" class="rounded-lg">
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
<?php include_once (SHARED_PATH . '/customer_footer.php'); ?>
    
