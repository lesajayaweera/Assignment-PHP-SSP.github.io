<?php 
include_once("./src/private/initialize.php");
require_once("./src/php/Controller/VehicleController.php");
require_once("./src/php/Controller/SellerController.php");
require_once("./src/php/Controller/BuyerController.php");
?>
<?php session_start();

 ?>
<?php 
$vehicleData =null;
$id = null;

if($_SERVER['REQUEST_METHOD']==="GET"){
    if(isset($_GET['id'])){
        $id = htmlspecialchars($_GET['id']);
    }
    else{
        header("Location:/Assignment/Login");
        exit;
    }
  

  $vehicle = new VehicleController;
  $vehicleData = $vehicle->Load_everything_by_Id($id);


    //   echo "<pre>";
    //   print_r($vehicleData);
    //   echo "<pre>";

    $mainImage = null;
    foreach ($vehicleData['images'] as $img) {
        if ($img['is_main']) {
        $mainImage = $img;
        break;
        }
    }

    $seller = new SellerController();
    $sellerVehicles =  $seller->getSellerOtherCars($id);
    //  echo "<pre>";
    //   print_r($sellerVehicles);
    //   echo "<pre>";
  
}

if ($_SERVER['REQUEST_METHOD']==="POST"){
    $price= (int)$_POST['number']  ;
    $VehicleID= $_POST['vehicleID'];
    $buyerID=$_SESSION['buyerID'];



    $controller = new BuyerController();
    $controller->Negotiate($VehicleID,$buyerID,$price);
    header("Location:/Assignment/ViewDetails?id=$VehicleID");


     
    
}



$pageTitle = "Vehicle Details";
$script = "vehicle";
?>
<?php include_once(SHARED_PATH."/customer_header.php"); ?>

<?php if($vehicleData):?>
<section class="max-w-7xl mx-auto px-4 py-30 font-family-montserrat">
    <!-- Breadcrumb -->
    <div class="text-sm text-gray-500 mb-2">
        <a href="/Assignment/index.html" class="text-blue-600 hover:underline">Home</a> /
        <a href="./Listing.html" class="text-blue-600 hover:underline">Listings</a> /
        <?php echo htmlspecialchars($vehicleData['Make']). " ". htmlspecialchars($vehicleData['Model']) ?>
    </div>

    <!-- Title & Subheading -->
    <h1 class="text-3xl font-semibold text-gray-900">
        <?php echo htmlspecialchars($vehicleData['Make']). " ". htmlspecialchars($vehicleData['Model']) ?></h1>
    <p class="text-gray-500 mb-4"><?php echo htmlspecialchars($vehicleData['cateogory'])?></p>

    <!-- Tags -->
    <div class="flex flex-wrap gap-2 mb-6">
        <span
            class="bg-gray-100 text-sm px-3 py-1 rounded-full"><?php echo htmlspecialchars($vehicleData['Year'])?></span>
        <span
            class="bg-gray-100 text-sm px-3 py-1 rounded-full"><?php echo htmlspecialchars($vehicleData['veh_condition'])?></span>
        <span
            class="bg-gray-100 text-sm px-3 py-1 rounded-full"><?php echo htmlspecialchars($vehicleData['Transmission'])?></span>
        <span
            class="bg-gray-100 text-sm px-3 py-1 rounded-full"><?php echo htmlspecialchars($vehicleData['FuelType'])?></span>
    </div>

    <!-- Grid layout -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Images -->
        <div class="lg:col-span-2 space-y-4">
            <div class="relative">

                <img src="<?php echo htmlspecialchars($mainImage['image_path']); ?>" alt="Main car"
                    class="rounded-lg w-11/12">
                <span class="absolute top-4 left-4 bg-green-600 text-white px-3 py-1 text-xs rounded-full">Great
                    Price</span>
                <span class="absolute bottom-4 left-4 bg-white text-black px-3 py-1 text-sm rounded-full border">🎥
                    Video</span>
            </div>
            <div class="grid grid-cols-4 gap-4">

                <?php for ($i = 1; $i <= 3; $i++): ?>
                <?php if (isset($vehicleData['images'][$i])): ?>
                <img title="images" src="<?php echo htmlspecialchars($vehicleData['images'][$i]['image_path']); ?>"
                    class="rounded-md h-full object-cover">
                <?php endif; ?>
                <?php endfor; ?>
            </div>
        </div>


        <!-- Sidebar -->
        <div class="space-y-6">
            <div class="flex justify-between items-center">
                <h2>Price</h2>
                <h2 class="text-2xl font-semibold">
                    <?php echo "$". number_format(htmlspecialchars($vehicleData['price']))?></h2>

            </div>
            <p class="text-sm text-gray-500">Make An Offer Price</p>

            <!-- Dealer Info -->
            <div class="border rounded-lg p-4 space-y-4">
                <div class="flex items-center space-x-4">
                    <img title="images" src="<?php echo htmlspecialchars($vehicleData['seller']['image_path']) ?? '' ?>"
                        class="w-10 object-contain  rounded-full">
                    <div>
                        <p class="font-medium">
                            <?php echo (htmlspecialchars($vehicleData['seller']['firstName']) ." ".htmlspecialchars($vehicleData['seller']['lastName'])) ?? '';?>
                        </p>
                    </div>
                </div>
                <p class="text-sm">📞<?php echo htmlspecialchars($vehicleData['seller']['email']);?></p>
                <div class="space-y-2">
                    <button
                        class=" w-full bg-black text-white py-2 rounded-md hover:bg-slate-900  duration-300 ease-in-out" id="buyBtn">Buy
                        Now</button>
                    <button class=" w-full bg-neutral-600 text-white py-2 rounded-md hover:bg-neutral-700  duration-300 ease-in-out" id="wishBtn" >WishList</button>
                    <form method="post" >
                        <button type="button" class=" w-full bg-green-600 text-white py-2 rounded-md hover:bg-green-700  duration-300 ease-in-out" id="negotiate">Negotiate</button>
                        <div class="flex flex-wrap w-full space-y-6" id="hiddenContainer">
                            <div class="flex w-full space-x-2">
                                
                                <input type="number" name="number" class="w-full border p-2 outline-none rounded border-gray-300 text-center" min="<?php echo ((int)($vehicleData['price']) *0.9) ?>" max="<?php echo ((int)($vehicleData['price']) *1.1) ?>" step="10000">
                                <input type="hidden" name="vehicleID" value="<?php echo $id; ?>">
                                <input type="hidden" name="buyerID" value="<?php echo $_SESSION['buyerID']; ?>">
                                <input type="hidden" name="status" value="pending">
                                
                            </div>
                            <div class="w-full space-x-2 flex items-center justify-around">
                                <button type="submit" class="bg-green-500 p-2 rounded w-full text-white transition-colors duration-150 ease-in-out hover:bg-green-600">Send Offer</button>
                                <button type="button" id="cancelBtn" class="bg-red-500 p-2 rounded w-full text-white transition-colors duration-150 ease-in-out hover:bg-red-600">Cancel</button>
                            </div>

                        </div>

                    </form>
                    <button class="w-full border py-2 rounded-md hover:bg-slate-400 hover:text-white duration-300 ease-in-out" id="cartBtn">Add To Cart </button>
                </div><a href="/Assignment/Seller?sellerid=<?php echo $vehicleData['seller']['user_id'] ;?>" class="block text-sm text-blue-600 hover:underline text-center">View All stock at this dealer →</a>
            </div>
        </div>
    </div>

    <!-- Car Overview -->
    <div class="mt-12">
        <h2 class="text-xl font-semibold mb-4">Car Overview</h2>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 text-sm text-gray-700">
            <div><strong>Body:</strong> <?php echo htmlspecialchars($vehicleData['cateogory'])?></div>
            <div><strong>Condition:</strong> <?php echo htmlspecialchars($vehicleData['veh_condition'])?></div>
            <div><strong>Engine Size:</strong> <?php echo htmlspecialchars($vehicleData['Engine'])."cc"?></div>
            <div><strong>Fuel Type:</strong> <?php echo htmlspecialchars($vehicleData['FuelType'])?></div>
            <div><strong>Doors:</strong> <?php echo htmlspecialchars($vehicleData['Seats'])?> Doors</div>
            <div><strong>Year:</strong> <?php echo htmlspecialchars($vehicleData['Year'])?></div>
            <div><strong>Transmission:</strong> <?php echo htmlspecialchars($vehicleData['Transmission'])?></div>

        </div>
    </div>

    <!-- Description -->
    <div class="mt-12">
        <h2 class="text-xl font-semibold mb-4">Description</h2>
        <p class="text-gray-600 text-sm leading-relaxed">
            <?php echo htmlspecialchars($vehicleData['description'])?>
        </p>
    </div>
    <div class="max-w-7xl mx-auto  py-10">
        <h2 class="text-xl font-semibold mb-6">Features</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 text-sm text-gray-800">
            <div>
                <h3 class="font-medium mb-2">Interior</h3>
                <ul class="space-y-1">
                    <li>✔️ Air Conditioner</li>
                    <li>✔️ Digital Odometer</li>
                    <li>✔️ Heater</li>
                    <li>✔️ Leather Seats</li>
                    <li>✔️ Panoramic Moonroof</li>
                    <li>✔️ Tachometer</li>
                    <li>✔️ Touchscreen Display</li>
                </ul>
            </div>
            <div>
                <h3 class="font-medium mb-2">Safety</h3>
                <ul class="space-y-1">
                    <li>✔️ Anti-lock Braking</li>
                    <li>✔️ Brake Assist</li>
                    <li>✔️ Child Safety Locks</li>
                    <li>✔️ Driver Air Bag</li>
                    <li>✔️ Power Door Locks</li>
                    <li>✔️ Stability Control</li>
                    <li>✔️ Traction Control</li>
                </ul>
            </div>
            <div>
                <h3 class="font-medium mb-2">Exterior</h3>
                <ul class="space-y-1">
                    <li>✔️ Fog Lights Front</li>
                    <li>✔️ Rain Sensing Wiper</li>
                    <li>✔️ Rear Spoiler</li>
                    <li>✔️ Windows – Electric</li>
                </ul>
            </div>
            <div>
                <h3 class="font-medium mb-2">Comfort & Convenience</h3>
                <ul class="space-y-1">
                    <li>✔️ Android Auto</li>
                    <li>✔️ Apple CarPlay</li>
                    <li>✔️ Bluetooth</li>
                    <li>✔️ HomeLink</li>
                    <li>✔️ Power Steering</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="max-w-7xl mx-auto  py-2 border-t mt-10">
        <h2 class="text-xl font-semibold mb-6">Dimensions & Capacity</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 text-sm text-gray-800">
            <div><strong>Length:</strong> <?php echo htmlspecialchars($vehicleData['length'])?>mm</div>
            <div><strong>Width:</strong> <?php echo htmlspecialchars($vehicleData['width'])?>mm</div>
            <div><strong>Height:</strong> <?php echo htmlspecialchars($vehicleData['height'])?>mm</div>

            <div><strong>No. of Seats:</strong> <?php echo htmlspecialchars($vehicleData['Seats'])?> Seats</div>
        </div>
    </div>




</section>
<section class="px-6 py-10 font-family-montserrat bg-white border-t max-w-7xl mx-auto">
    <!-- Location Heading & Address -->
    <h2 class="text-lg font-semibold text-gray-900 mb-1">Location</h2>
    <p class="text-sm text-gray-600 mb-1"><?php echo  htmlspecialchars($vehicleData['location']['street_no']) ?>, <?php echo  htmlspecialchars($vehicleData['location']['city']) ?></p>

    <!-- Get Direction Link -->
    <a rel="noopener" href="<?php echo  htmlspecialchars($vehicleData['location']['directionLink']) ?>" target="_blank"
        class="text-sm text-blue-600 hover:underline inline-flex items-center gap-1 mb-4">
        Get Direction
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 3l7 7m0 0l-7 7m7-7H3" />
        </svg>
    </a>

    <!-- Google Map -->
    <div class="w-full h-80 rounded-lg overflow-hidden shadow">
        <iframe class="w-full h-full" frameborder="0" style="border:0"
            src="<?php echo htmlspecialchars($vehicleData['location']['embededLink']) ?>"
            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
</section>

<section class="max-w-5xl mx-auto px-4 py-10 border-t font-family-montserrat">
    <h2 class="text-xl font-semibold mb-6">Financing Calculator</h2>

    <form class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-800">
        <div>
            <label class="block mb-1">Price ($)</label>
            <input type="number" placeholder="10000" min="1" id="price"
                class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-slate-500">
        </div>
        <div>
            <label class="block mb-1">Interest Rate</label>
            <input type="number" placeholder="10" min="1" id="rate"
                class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-slate-500">
        </div>
        <div>
            <label class="block mb-1">Loan Term (years)</label>
            <input type="number" placeholder="3" min="1" id="term"
                class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-slate-500">
        </div>
        <div>
            <label class="block mb-1">Down Payment</label>
            <input type="number" placeholder="5000" min="1" id="down"
                class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-slate-500">
        </div>

        <div class="col-span-1 md:col-span-2">
            <button type="button" id="calculator"
                class="mt-4 inline-flex items-center bg-black text-white px-6 py-2 rounded-full hover:bg-slate-700 transition">
                Calculate
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </button>
            <div id="result" class="mt-6 text-lg text-gray-800 font-medium hidden">
                Monthly Payment: <span id="monthly" class="text-blue-600 font-bold"></span>
            </div>
        </div>
    </form>

</section>

<section class="px-6 py-10 font-family-montserrat bg-white border-t max-w-5xl mx-auto">
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-xl font-semibold text-gray-900">Related Listings</h2>
        <a href="/Assignment/Listing" class="text-sm text-blue-600 hover:underline flex items-center gap-1">
            View All
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 3l7 7m0 0l-7 7m7-7H3" />
            </svg>
        </a>
    </div>
<?php if(!empty($sellerVehicles)): ?>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        <!-- Card Item -->
        <?php foreach($sellerVehicles as $car):?>
          <div class="bg-white shadow rounded-xl overflow-hidden">
            <div class="relative">
              <img src="<?= htmlspecialchars($car['main_image'] ?? 'default-car.jpg') ?>" alt="<?= htmlspecialchars($car['Make'] . ' ' . $car['Model']) ?>" class="w-full  object-cover" />
              <span class="absolute top-4 left-4 bg-green-500 text-white text-xs font-semibold px-2 py-1 rounded">Great Price</span>
              <span class="absolute bottom-4 right-2 bg-red-500 text-white text-xs font-semibold px-2 py-1 rounded"><?= htmlspecialchars($car['veh_condition']);?></span>
              <button class="absolute top-2 right-2 bg-white p-1 w-6 rounded-full shadow text-gray-600 hover:text-black">♥</button>
            </div>
            <div class="p-4 space-y-2">
              <h3 class="text-sm font-semibold text-gray-800"><?= htmlspecialchars($car['Make'] . ' ' . $car['Model'] . ' (' . $car['Year'] . ')') ?></h3>
              <p class="text-xs text-gray-500"><?= htmlspecialchars($car['cateogory']); ?></p>
              <div class="flex flex-wrap text-xs text-gray-500 gap-4 mt-2">
                <span><?= htmlspecialchars($car['Engine']. "cc");?></span>
                <span><?= htmlspecialchars($car['FuelType']);?></span>
                <span><?= htmlspecialchars($car['Transmission']);?></span>
              </div>
              <div class="flex items-center justify-between mt-4">
                <span class="text-lg font-bold text-gray-900"><?= "$".number_format(htmlspecialchars($car['price'])); ?></span>
                <a href="/Assignment/ViewDetails?id=<?=$car['VehicleID'] ?>" class="text-sm text-blue-600 hover:underline">View Details</a>
              </div>
            </div>
          </div>
          <?php endforeach;?>


          <?php else: ?>
            <div class="flex w-full items-center text-gray-400 text-xl">No More Products Available from this Dealer</div>
            <?php endif;?>

        <!-- Duplicate and change details for more cards -->
        <!-- Card 2 -->
        
    </div>
    <div class="mt-10 flex justify-center items-center space-x-2">
        <!-- Previous Button -->
        <button type="button" title="button"
            class="w-8 h-8 flex items-center justify-center rounded-full border border-gray-300 text-gray-500 hover:bg-gray-100">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M15 19l-7-7 7-7" />
            </svg>
        </button>

        <!-- Next Button -->
        <button type="button" title="button"
            class="w-8 h-8 flex items-center justify-center rounded-full border border-gray-300 text-gray-500 hover:bg-gray-100">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M9 5l7 7-7 7" />
            </svg>
        </button>
    </div>
</section>
<?php endif;?>

<?php include_once(SHARED_PATH."/customer_footer.php");?>