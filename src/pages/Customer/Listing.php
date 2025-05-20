<?php include("./src/private/initialize.php");?>
<?php $pageTitle = "Listing";
$script = "Listing";
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
          
          
          <div class="bg-white p-4 rounded-xl shadow-md">
            <img src="/Assignment/assets/images/products/rolls-royce-ghost.png" alt="Car" class="rounded-lg">
            <h3 class="mt-3 font-semibold">Brand Name</h3>
            <p class="text-gray-500 text-sm">Model Name</p>
            <div class="flex justify-between text-gray-600 text-sm mt-2">
                <span>15 Miles</span>
                <span>Petrol</span>
               
            </div>
            <p class="mt-3 text-lg font-bold">$15,000</p>
            <a href="/Assignment/ViewDetails" class="text-blue-600 mt-2 inline-block">View Details</a>
          </div>
      
          <!-- Repeat the card above for other listings -->
        </div>
       
        
  
    </section>
    <?php include_once (SHARED_PATH . '/customer_footer.php'); ?>