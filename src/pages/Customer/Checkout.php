<?php include_once("./src/private/initialize.php");
require_once("./src/php/Controller/BuyerController.php");
?>
<?php session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'buyer') {
    header("Location: /Assignment/Login");
    exit;
}



 ?>
<?php
$controller = new BuyerController();
$cartItems =$controller->LoadCart($_SESSION['buyerID']); 

$cartSummery = $controller->getTheCartTotal($_SESSION['buyerID']);

// echo "<pre>";
// print_r($cartSummery);
// echo "<pre>";

if($_SERVER['REQUEST_METHOD']==="POST"){
  $controller->InsertBillingAndCompleteOrder(
    $_SESSION['buyerID'],
    htmlspecialchars($_POST['address']),
    htmlspecialchars($_POST['apartment']),
    htmlspecialchars($_POST['city']),
    htmlspecialchars($_POST['country']),
    htmlspecialchars($_POST['zipcode']),
  );
}
?>


<?php $pageTitle ="Checkout";
$script ="checkout";
?>
<?php include_once(SHARED_PATH."/customer_header.php");?>
    <section class="py-30 font-family-montserrat">
        <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-3 gap-10">
    
          <!-- Left Column: Shipping Form -->
          <div class="md:col-span-2 space-y-8">
            <div>
              <h2 class="text-2xl font-semibold mb-4">Checkout</h2>
              <nav class="flex items-center text-sm space-x-4 mb-6">
                <span class="text-gray-400">Address</span>
                <span class="w-10 h-px bg-gray-400"></span>
                <span class="font-bold">Payment</span>
                
              </nav>
              <h3 class="font-medium mb-4">Shipping Information</h3>
    
              <form class="space-y-4" method="post">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                  <input type="text" placeholder="First Name" name="fname"  class="w-full p-2 border rounded" />
                  <input type="text" placeholder="Last Name" name="lname" class="w-full p-2 border rounded" />
                </div>
                <input type="text" placeholder="Address" name="address" class="w-full p-2 border rounded" />
                <input type="text" placeholder="Apartment, suite, etc. (optional)" name="apartment" class="w-full p-2 border rounded" />
                <input type="text" placeholder="City" name="city" class="w-full p-2 border rounded" />
    
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                  <select title="option" name="country" class="w-full p-2 border rounded">
                    <option value="sriLanka" >Sri lanka</option>
                  </select>
                  <select title="option" name="city" class="w-full p-2 border rounded">
                    <option value="Colombo">Colombo</option>
                    <option value="Gampaha">Gampaha</option>
                    <option value="kalutara">kalutara</option>
                    <option value="Galle">Galle</option>
                    
                  </select>
                  <input type="text" placeholder="Zipcode" name="zipcode" class="w-full p-2 border rounded" />
                </div>
    
                
    
                
    
                <button type="submit" class="w-full bg-black text-white py-3 font-semibold hover:bg-gray-800 transition">
                  Order Now
                </button>
              </form>
            </div>
          </div>
    
          <!-- Right Column: Cart Summary -->
          <aside class="space-y-6">
            <h3 class="text-lg font-semibold text-right">Your cart</h3>
    
            <div class="space-y-6 border-b pb-4">
              <?php foreach($cartItems as $item): ?>
              <div class="flex gap-6">
                <img title="images" src="<?= $item['vehicle']['image'] ?>" class="w-40 object-cover rounded-lg" />
                <div class="flex-1">
                  <h4 class="font-semibold text-lg"><?= $item['vehicle']['Make'] ?> <?= $item['vehicle']['Model'] ?></h4>
                  <p class="text-sm text-gray-500">Model: <?= $item['vehicle']['Model'] ?></p>
                  <p class="text-sm text-neutral-700">Dealer : <?= $item['seller']['firstName'] ?> <?= $item['seller']['lastName'] ?></p>
                  <p class="text-sm font-semibold mt-1">$ <?= number_format($item['vehicle']['price']) ?></p>
                </div>
              </div>
              <?php endforeach;?>
    
              
            </div>
    
            <!-- Summary -->
            <div class="text-sm space-y-2">
              <div class="flex justify-between">
                <span>Subtotal</span>
                <span>$<?php echo number_format($cartSummery['summary']['subtotal']) ?></span>
              </div>
              <div class="flex justify-between">
                <span>Tax</span>
                <span class="text-gray-500">$<?php echo number_format($cartSummery['summary']['tax']) ?></span>
              </div>
              <div class="flex justify-between font-semibold border-t pt-3">
                <span>Total</span>
                <span>$<?php echo number_format($cartSummery['summary']['total']) ?></span>
              </div>
            </div>
          </aside>
    
        </div>
      </section>
    
<?php include_once(SHARED_PATH."/customer_footer.php");?>