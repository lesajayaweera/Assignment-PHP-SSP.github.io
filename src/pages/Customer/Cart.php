<?php include("./src/private/initialize.php");
require_once("./src/php/Controller/BuyerController.php");
?>
<?php session_start(); 

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'buyer') {
    header("Location: /Assignment/Login");
    exit;
}


?>
 

<?php $pageTitle = "Cart";
$script = "Cart";
?>

<?php
$controller = new BuyerController();
$cartItems=$controller->LoadCart($_SESSION['buyerID']);

$cartSummery = $controller->getTheCartTotal($_SESSION['buyerID']);

// echo "<pre>";
// print_r($cartSummery);
// echo "<pre>";
?>

<?php include_once (SHARED_PATH . '/customer_header.php'); ?>   
    <section class="bg-gray-100 py-30 font-family-montserrat">
        <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-3 gap-10">
          
          <!-- Left Column: Cart Items + Order Info -->
          <div class="md:col-span-2 space-y-10">
            <!-- Cart Items -->
             
            <div>
              <h2 class="text-2xl font-semibold">Your cart</h2>
              <p class="text-sm text-gray-500 mt-1">Not ready to checkout? <a href="/Assignment/Listing" class="underline hover:text-blue-600 transition-all duration-150 ease-in-out">Continue Shopping</a></p>
    
              <div class="mt-6 border-b pb-6 space-y-6">
                <!-- Item -->
                 <?php foreach($cartItems as $items) :?>
                <div class="flex items-start gap-4">
                  <img src="<?= $items['vehicle']['image'] ?>" alt="Car" class="w-60 object-cover rounded" />
                  <div class="flex-1">
                    <h3 class="font-semibold"><?= $items['vehicle']['Make']?> <?= $items['vehicle']['Model']?></h3>
                    <p class="text-sm text-gray-500">Model: <?= $items['vehicle']['Model'] ?></p>
                    <p class="mt-1 text-sm">Dealer: <?= $items['seller']['firstName'] ?> <?= $items['seller']['lastName'] ?></p>
                    <p class="mt-1 font-semibold">$ <?= number_format($items['vehicle']['price']) ?></p>
                  </div>
                  <a href="/Assignment/Customer/CartRemove?id=<?= $items['cart']['id']?>">
                    <button class="text-sm text-gray-500 underline hover:text-red-400 transition-all duration-150 ease-in-out">Remove</button>
                  </a>
                </div>
              <?php endforeach;?>
                
              </div>
            </div>
    
            <!-- Order Info -->
            <div>
              <?php if (!empty($cartSummery)): ?>
              <h3 class="text-lg font-semibold border-b pb-1">Order Information</h3>
              <div class="mt-4 bg-white border rounded p-4">
                <button class="flex justify-between w-full items-center font-medium text-left">
                  <span>Warrenty Policy</span>
                  <span>−</span>
                </button>
                <p class="text-sm text-gray-600 mt-3">
                    At LuxCars, we offer a limited warranty on all eligible vehicles covering key components such as the engine, transmission, and braking system for up to 3 months or 3,000 miles, whichever comes first. This warranty excludes routine maintenance, wear-and-tear items, and damages caused by misuse or unauthorized modifications. To make a claim, please contact us before any repairs are performed. This warranty is non-transferable and applies only to the original purchaser.
                </p>
              </div>
              <?php else:?>
                <div class="text-xl text-red-400">No items in the cart</div>
              <?php endif;?>
            </div>
          </div>
    
          <!-- Right Column: Summary -->
          <aside class="space-y-6">
            <h3 class="text-lg font-semibold">Order Summary</h3>
            <div class="space-y-3 text-sm">
              <div class="flex justify-between">
                <span>Subtotal</span>
                <span>$<?php echo  number_format($cartSummery['summary']['subtotal']) ?></span>
              </div>
              <div class="flex justify-between border-b pb-3">
                <span>Tax</span>
                <span class="text-gray-500">$<?php echo  number_format($cartSummery['summary']['tax']) ?></span>
              </div>
              <div class="flex justify-between font-semibold">
                <span>Total</span>
                <span>$<?php echo  number_format($cartSummery['summary']['total']) ?></span>
              </div>
            </div>
            <a href="/Assignment/Checkout">
            <button class="w-full bg-black text-white py-3 font-semibold hover:bg-gray-800 transition">
              Continue to checkout
            </button>
            </a>

          </aside>
    
        </div>
      </section>
<?php include_once (SHARED_PATH . '/customer_footer.php'); ?>