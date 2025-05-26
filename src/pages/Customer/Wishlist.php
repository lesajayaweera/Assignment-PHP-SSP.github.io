<?php 
include_once("./src/private/initialize.php");
require_once("./src/php/Controller/VehicleController.php");
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'buyer') {
    header("Location: /Assignment/Login");
    exit;
}

$controller = new VehicleController();
$vehicles = $controller->getFavoritesWithMainImage($_SESSION['buyerID']);

$pageTitle = "WishList";
$script = "wishlist";
include_once(SHARED_PATH . "/customer_header.php");
?>

<section class="bg-gray-100 py-30 font-family-montserrat">
  <div class="max-w-6xl mx-auto px-4 grid md:grid-cols-3 gap-10">
    
    <!-- Left Column: Wishlist Items -->
    <div class="md:col-span-2 space-y-8">
      <div>
        <h2 class="text-3xl font-bold text-gray-800">Your Wishlist</h2>
        <p class="text-sm text-gray-600 mt-1">
          Not ready to checkout? <a href="/Assignment/" class="underline text-blue-600">Continue Shopping</a>
        </p>

        <div class="mt-6 space-y-6">
          <?php if (!empty($vehicles['data'])): ?>
            <?php foreach ($vehicles['data'] as $vehicle): ?>
              <div class="bg-white p-4 rounded-lg shadow-sm flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <!-- Image & Info -->
                <div class="flex items-start gap-4 w-full sm:w-1/2">
                  <img src="<?= $vehicle['vehicle']['main_image'] ?>" alt="Car"
                       class="w-24 h-20 object-cover rounded-md border" />
                  <div class="flex-1">
                    <h3 class="font-semibold text-lg text-gray-800"><?= $vehicle['vehicle']['make'] ?> <?= $vehicle['vehicle']['model'] ?></h3>
                    <p class="text-sm text-gray-500">Model: <?= $vehicle['vehicle']['model'] ?></p>
                    <p class="text-sm text-gray-500 mt-1">Dealer: <?= $vehicle['seller']['firstName'] ?> <?= $vehicle['seller']['lastName'] ?></p>
                    <p class="mt-1 font-semibold text-gray-800">$<?= number_format($vehicle['vehicle']['price']) ?></p>
                  </div>
                </div>

                <!-- Actions -->
                <div class="flex sm:flex-col sm:items-end gap-2 w-full sm:w-auto">
                  <form action="/Assignment/Wishlist/remove" method="POST">
                    <input type="hidden" name="favouriteid" value="<?= $vehicle['favorite_id'] ?>">
                    <button type="submit" class="text-sm text-red-500 hover:underline">Remove</button>
                  </form>
                  <form action="/Assignment/Wishlist/addToCart" method="POST">
                    <input type="hidden" name="favouriteid" value="<?= $vehicle['favorite_id'] ?>">
                    <button type="submit" class="text-sm text-blue-600 hover:underline">Add to Cart</button>
                  </form>
                </div>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <p class="text-gray-600 text-sm">Your wishlist is currently empty.</p>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <!-- Right Column (optional summary section) -->
    <div class="hidden md:block">
      <div class="bg-white p-6 rounded-lg shadow-md">
        <h3 class="text-lg font-semibold mb-2">Wishlist Summary</h3>
        <p class="text-sm text-gray-600">Total items: <?= count($vehicles['data']) ?></p>
        <p class="text-sm text-gray-600 mt-2">Enjoy saving your favorite vehicles!</p>
      </div>
    </div>

  </div>
</section>

<?php include_once(SHARED_PATH . "/customer_footer.php"); ?>
