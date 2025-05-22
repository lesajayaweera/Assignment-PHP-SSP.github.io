<?php include("./src/private/initialize.php");
require_once("./src/php/Controller/VehicleController.php")
?>


<?php $pageTitle = "Listing";
$script = "Listing";


$vehicle  = new VehicleController();
$vehicle = $vehicle->Load_all_with_main_Image();
?>
<?php include_once (SHARED_PATH . '/customer_header.php'); ?>
    <section class="bg-[#050b22] py-6 font-family-montserrat pt-30">
      <div class="w-full px-4 sm:px-6 lg:px-8">
        <div class="max-w-5xl mx-auto bg-white rounded-lg shadow p-4 flex flex-col lg:flex-row items-center justify-between space-y-4 lg:space-y-0 lg:space-x-4">
          
          <!-- Condition -->
          <select title="option" class="bg-transparent text-sm text-gray-700 px-2 py-1 border border-gray-200 rounded focus:outline-none w-full">
            <option disabled selected>Condition</option>
            <option>New</option>
            <option>Used</option>
          </select>
    
          <!-- Divider -->
          <div class="hidden lg:block h-6 border-l border-gray-300"></div>
    
          <!-- Makes -->
          <select title="option" class="bg-transparent text-sm text-gray-700 px-2 py-1 border border-gray-200 rounded focus:outline-none w-full">
            <option disabled selected>Any Makes</option>
            <!-- Add makes dynamically if needed -->
          </select>
    
          <!-- Divider -->
          <div class="hidden lg:block h-6 border-l border-gray-300"></div>
    
          <!-- Models -->
          <select title="option" class="bg-transparent text-sm text-gray-700 px-2 py-1 border border-gray-200 rounded focus:outline-none w-full">
            <option disabled selected>Any Models</option>
            <!-- Add models dynamically if needed -->
          </select>
    
          <!-- Divider -->
          <div class="hidden lg:block h-6 border-l border-gray-300"></div>
    
          <!-- Price -->
          <select title="option" class="bg-transparent text-sm text-gray-700 px-2 py-1 border border-gray-200 rounded focus:outline-none w-full">
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
        <!-- Breadcrumb -->
        <nav class="text-sm text-gray-500 mb-4">
          <a href="../../index.html" class="hover:underline">Home</a> / <span>Listing v1</span>
        </nav>
      
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
          <h1 class="text-2xl font-bold">Listing v1</h1>
          <div class="flex items-center gap-2">
            <label for="sort" class="text-sm">Sort by</label>
            <select id="sort" class="text-sm border border-gray-300 rounded px-2 py-1">
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
          
          <?php ?>
          <!-- <div class="bg-white shadow rounded-xl overflow-hidden">
            <div class="relative">
              <img src="/Assignment/assets/images/products/Audi-a4.jpg" alt="Car" class="w-full h-48 object-contain" />
              <span class="absolute top-4 left-4 bg-green-500 text-white text-xs font-semibold px-2 py-1 rounded">Great Price</span>
              <span class="absolute bottom-4 right-2 bg-red-500 text-white text-xs font-semibold px-2 py-1 rounded">Condition</span>
              <button class="absolute top-2 right-2 bg-white p-1 rounded-full shadow text-gray-600 hover:text-black">♥</button>
            </div>
            <div class="p-4 space-y-2">
              <h3 class="text-sm font-semibold text-gray-800">Brand Name</h3>
              <p class="text-xs text-gray-500">Model</p>
              <div class="flex flex-wrap text-xs text-gray-500 gap-4 mt-2">
                <span>Engine CC</span>
                <span>fuel type</span>
                <span>transmission</span>
              </div>
              <div class="flex items-center justify-between mt-4">
                <span class="text-lg font-bold text-gray-900">$35,000</span>
                <a href="/Assignment/ViewDetails" class="text-sm text-blue-600 hover:underline">View Details</a>
              </div>
            </div>
          </div> -->
      
          <!-- Repeat the card above for other listings -->
        </div>
       
        
  
    </section>
    <?php include_once (SHARED_PATH . '/customer_footer.php'); ?>