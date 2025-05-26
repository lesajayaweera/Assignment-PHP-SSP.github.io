<?php include_once("./src/private/initialize.php");
require_once("./src/php/Controller/VehicleController.php");
 ?>
<?php session_start(); ?>
<?php
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'buyer') {
    header("Location: /Assignment/Login");
    exit;
}
$controller = new VehicleController();
$vehicles = $controller->getFavoritesWithMainImage($_SESSION['buyerID']);

echo "<pre>";
print_r($vehicles);
echo "</pre>";
?>
<?php
$pageTitle ="WishList";
$script ="wishlist";  
?>
<?php include_once(SHARED_PATH."/customer_header.php");?>
<section class="bg-gray-100 py-30 font-family-montserrat">
    <div class="w-full mx-auto px-4 grid md:grid-cols-3 gap-10">

        <!-- Left Column: Cart Items + Order Info -->
        <div class="md:col-span-2 space-y-10">
            <!-- Cart Items -->
            <div>
                <h2 class="text-2xl font-semibold">Your Wishlist</h2>
                <p class="text-sm text-gray-500 mt-1">Not ready to checkout? <a href="/Assignment/"
                        class="underline">Continue Shopping</a></p>

                <div class="mt-6 border-b pb-6 space-y-6">
                    <!-- Item -->

                    <?php foreach ($vehicles['data'] as $vehicle): ?>
                    <div class="flex items-start gap-4">
                        <img src="<?= $vehicle['vehicle']['main_image'] ?>" alt="Car"
                            class="w-24 h-20 object-cover rounded" />
                        <div class="flex-1">
                            <h3 class="font-semibold"><?= $vehicle['vehicle']['make'] ?> <?= $vehicle['vehicle']['model'] ?></h3>
                            <p class="text-sm text-gray-500">Model: <?= $vehicle['vehicle']['model'] ?></p>
                            <p class="mt-1 text-sm">Dealer :<?= $vehicle['seller']['firstName'] ?> <?= $vehicle['seller']['lastName'] ?></p>
                            <p class="mt-1 font-semibold">$<?= number_format($vehicle['vehicle']['price']) ?></p>
                        </div>
                        <div class=" flex flex-wrap flex-col items-center space-y-10 justify-around">
                          <form action="./Assignment/Wishlist/remove" method="POST">
                            <input type="hidden" name="favouriteid" value="<?= $vehicle['favorite_id'] ?>">
                            <button type="submit"
                                class="text-sm text-gray-500 underline hover:text-red-500 transition-colors duration-200 ease-in-out">Remove</button>
                    </form>
                            <form action="/Assignment/Wishlist/addToCart" method="POST">
                                <input type="hidden" name="favouriteid" value="<?= $vehicle['favorite_id'] ?>">
                                <button type="submit"
                                    class="text-sm text-gray-500 underline hover:text-blue-500 transition-colors duration-200 ease-in-out">Add
                                    to Cart</button>
                            </form>
                        </div>
                      <?php endforeach; ?>
                    </div>
                    

                    

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