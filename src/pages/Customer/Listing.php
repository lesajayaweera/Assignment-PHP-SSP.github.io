<?php include("./src/private/initialize.php");
require_once("./src/php/Controller/VehicleController.php")
?>


<?php $pageTitle = "Listing";
$script = "Listing";


$vehicle  = new VehicleController();
$vehicle = $vehicle->Load_all_with_main_Image();
?>
<?php include_once (SHARED_PATH . '/customer_header.php'); ?>
    
      
    <section class="px-4 py-30 max-w-7xl mx-auto font-family-montserrat">
        <!-- Breadcrumb -->
        <nav class="text-sm text-gray-500 mb-4">
          <a href="../../index.html" class="hover:underline">Home</a> / <span>Listing v1</span>
        </nav>
      
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
          <h1 class="text-2xl font-bold">Listing v1</h1>
          
        </div>
      
        
      
        <!-- Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
          <!-- Card -->
          
          <?php foreach($vehicle as $car):?>
          <div class="bg-white shadow rounded-xl overflow-hidden">
            <div class="relative">
              <img src="<?= htmlspecialchars($car['main_image'] ?? 'default-car.jpg') ?>" alt="<?= htmlspecialchars($car['Make'] . ' ' . $car['Model']) ?>" class="w-full h-48 object-contain" />
              <span class="absolute top-4 left-4 bg-green-500 text-white text-xs font-semibold px-2 py-1 rounded">Great Price</span>
              <span class="absolute bottom-4 right-2 bg-red-500 text-white text-xs font-semibold px-2 py-1 rounded"><?= htmlspecialchars($car['veh_condition']);?></span>
              <button class="absolute top-2 right-2 bg-white p-1 rounded-full shadow text-gray-600 hover:text-black">♥</button>
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
          <?php endforeach?>
      
          <!-- Repeat the card above for other listings -->
        </div>
       
        
  
    </section>
    <?php include_once (SHARED_PATH . '/customer_footer.php'); ?>