<?php include("./src/private/initialize.php");?>
<?php session_start(); ?>
<?php $pageTitle = "Checkout Payment";
$script = "Checkout-payment";
?>
<?php include_once (SHARED_PATH . '/customer_header.php'); ?>
    <section class="py-30">
        <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-3 gap-10">

            <!-- Payment Form -->
            <div class="md:col-span-2 space-y-6 font-family-montserrat">
                <h2 class="text-2xl font-bold">Checkout</h2>

                <!-- Progress Steps -->
                <div class="flex items-center text-sm space-x-4">
                    <span class="text-gray-400">Address</span>
                    <span class="w-10 h-px bg-gray-400"></span>
                    <span class="text-gray-400">Shipping</span>
                    <span class="w-10 h-px bg-gray-400"></span>
                    <span class="font-bold">Payment</span>
                </div>

                <!-- Payment Options -->
                <div class="flex gap-2 mt-4">
                    <button
                        class="flex-1 border border-gray-300 p-2 rounded flex items-center justify-center bg-white hover:bg-gray-50">
                        <img src="https://www.paypalobjects.com/webstatic/mktg/logo/pp_cc_mark_111x69.jpg" class="h-6"
                            alt="PayPal" />
                    </button>
                    <button class="flex-1 bg-black text-white p-2 rounded hover:bg-gray-800">
                         Pay
                    </button>
                </div>

                <!-- Payment Form -->
                <div class="space-y-4">
                    <h3 class="font-semibold">Payment Details</h3>
                    <input type="text" placeholder="Cardholder Name" class="w-full p-2 border rounded" />
                    <input type="text" placeholder="Card Number" class="w-full p-2 border rounded" />
                    <div class="grid grid-cols-3 gap-4">
                        <select title="options" class="p-2 border rounded">
                            <option>Month</option>
                        </select>
                        <select title="options" class="p-2 border rounded">
                            <option>Year</option>
                        </select>
                        <input type="text" placeholder="CVC" class="p-2 border rounded" />
                    </div>
                    <label class="flex items-center text-sm space-x-2">
                        <input type="checkbox" class="h-4 w-4" />
                        <span>Save card data for future payments.</span>
                    </label>

                    <button class="w-full bg-black text-white py-3 font-semibold hover:bg-gray-800 transition">
                        Pay with card
                    </button>
                </div>
            </div>

            <!-- Cart Summary -->
            <aside class="space-y-6">
                <h3 class="text-lg font-semibold text-right">Your cart</h3>

                <div class="space-y-6 border-b pb-4">
                    <!-- Item -->
                    <div class="flex gap-4">
                        <img title="images" src="/Assignment/assets/images/products/range-rover.jpg"
                            class="w-24 h-20 object-cover rounded" />
                        <div class="flex-1">
                            <h4 class="font-semibold">Car Name</h4>
                            <p class="text-sm text-gray-500">Model: Name</p>
                            <p class="text-sm">Quantity: 1</p>
                            <p class="font-semibold mt-1">$99</p>
                        </div>
                        <button class="text-sm text-gray-500 underline">Remove</button>
                    </div>

                    <!-- Item -->
                    <div class="flex gap-4">
                        <img title="images" src="/Assignment/assets/images/products/range-rover.jpg"
                            class="w-24 h-20 object-cover rounded" />
                        <div class="flex-1">
                            <h4 class="font-semibold">Car Name</h4>
                            <p class="text-sm text-gray-500">Model: Name</p>
                            <p class="text-sm">Quantity: 1</p>
                            <p class="font-semibold mt-1">$99</p>
                        </div>
                        <button class="text-sm text-gray-500 underline">Remove</button>
                    </div>
                </div>

            </aside>

        </div>
    </section>

<?php include_once (SHARED_PATH . '/customer_footer.php'); ?>