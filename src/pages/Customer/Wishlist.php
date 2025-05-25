<?php include_once("./src/private/initialize.php"); ?>
<?php session_start(); ?>
<?php
$pageTitle ="WishList";
$script ="wishlist";  
?>   
<?php include_once(SHARED_PATH."/customer_header.php");?>
    <section class="bg-gray-100 py-30 font-family-montserrat">
        <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-3 gap-10">
          
          <!-- Left Column: Cart Items + Order Info -->
          <div class="md:col-span-2 space-y-10">
            <!-- Cart Items -->
            <div>
              <h2 class="text-2xl font-semibold">Your Wishlist</h2>
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
                  <div class=" flex flex-wrap flex-col items-center space-y-10 justify-around">
                    <button class="text-sm text-gray-500 underline hover:text-red-500 transition-colors duration-200 ease-in-out">Remove</button>
                    <button class="text-sm text-gray-500 underline hover:text-gray-900 transition-colors duration-200 ease-in-out">Buy</button>
                  </div>
                  
                </div>
    
                <!-- Another Item -->
               
              </div>
            </div>
    
            <!-- Order Info -->
            
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
<?php include_once(SHARED_PATH."/customer_footer.php");?>