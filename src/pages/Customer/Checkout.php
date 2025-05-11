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
<body>
    <section class="py-12 font-family-montserrat">
        <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-3 gap-10">
    
          <!-- Left Column: Shipping Form -->
          <div class="md:col-span-2 space-y-8">
            <div>
              <h2 class="text-2xl font-semibold mb-4">Checkout</h2>
              <nav class="flex items-center text-sm space-x-4 mb-6">
                <span class="font-bold">Address</span>
                <span class="w-10 h-px bg-gray-400"></span>
                <span class="text-gray-400">Shipping</span>
                <span class="w-10 h-px bg-gray-400"></span>
                <span class="text-gray-400">Payment</span>
              </nav>
              <h3 class="font-medium mb-4">Shipping Information</h3>
    
              <form class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                  <input type="text" placeholder="First Name" class="w-full p-2 border rounded" />
                  <input type="text" placeholder="Last Name" class="w-full p-2 border rounded" />
                </div>
                <input type="text" placeholder="Address" class="w-full p-2 border rounded" />
                <input type="text" placeholder="Apartment, suite, etc. (optional)" class="w-full p-2 border rounded" />
                <input type="text" placeholder="City" class="w-full p-2 border rounded" />
    
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                  <select title="option" class="w-full p-2 border rounded">
                    <option>Country</option>
                  </select>
                  <select title="option" class="w-full p-2 border rounded">
                    <option>City</option>
                  </select>
                  <input type="text" placeholder="Zipcode" class="w-full p-2 border rounded" />
                </div>
    
                <input type="text" placeholder="Optional" class="w-full p-2 border rounded" />
    
                <label class="flex items-center space-x-2 text-sm">
                  <input type="checkbox" class="h-4 w-4" />
                  <span>Save contact information</span>
                </label>
    
                <button type="button" class="w-full bg-black text-white py-3 font-semibold hover:bg-gray-800 transition">
                  Continue to shipping
                </button>
              </form>
            </div>
          </div>
    
          <!-- Right Column: Cart Summary -->
          <aside class="space-y-6">
            <h3 class="text-lg font-semibold text-right">Your cart</h3>
    
            <div class="space-y-6 border-b pb-4">
              <!-- Item 1 -->
              <div class="flex gap-4">
                <img title="images" src="https://via.placeholder.com/100x80" class="w-24 h-20 object-cover rounded" />
                <div class="flex-1">
                  <h4 class="font-semibold">Car Name</h4>
                  <p class="text-sm text-gray-500">Model: Name</p>
                  <p class="text-sm">Quantity: 1</p>
                  <p class="font-semibold mt-1">$99</p>
                </div>
                <button class="text-sm text-gray-500 underline">Remove</button>
              </div>
    
              <!-- Item 2 -->
              <div class="flex gap-4">
                <img title="images" src="https://via.placeholder.com/100x80" class="w-24 h-20 object-cover rounded" />
                <div class="flex-1">
                  <h4 class="font-semibold">Car Name</h4>
                  <p class="text-sm text-gray-500">Model: Name</p>
                  <p class="text-sm">Quantity: 1</p>
                  <p class="font-semibold mt-1">$99</p>
                </div>
                <button class="text-sm text-gray-500 underline">Remove</button>
              </div>
            </div>
    
            <!-- Summary -->
            <div class="text-sm space-y-2">
              <div class="flex justify-between">
                <span>Subtotal</span>
                <span>$200</span>
              </div>
              <div class="flex justify-between">
                <span>Shipping</span>
                <span class="text-gray-500">Calculated at the next step</span>
              </div>
              <div class="flex justify-between font-semibold border-t pt-3">
                <span>Total</span>
                <span>$200</span>
              </div>
            </div>
          </aside>
    
        </div>
      </section>
    
</body>
</html>