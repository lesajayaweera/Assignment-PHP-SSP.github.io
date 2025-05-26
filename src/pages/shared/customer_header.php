<?php  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LuxCars - <?php echo isset($pageTitle) ? $pageTitle : ''; ?></title>
  <link rel="stylesheet" href="/Assignment/src/output.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Dancing+Script:wght@400..700&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&family=Rowdies:wght@300;400;700&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap');
  </style>
</head>
<body class="capitalize text-lg font-family-montserrat">
<header class="bg-black text-white p-4" id="header">
  <div class="flex items-center justify-between">
    <!-- Logo -->
    <div>
      <p class="text-4xl font-bold font-family-body">luxCars</p>
      <p class="text-sm font-family-montserrat">A luxury-driven, high-performance</p>
    </div>

    <!-- Desktop Nav -->
    <nav class="hidden md:block">
      <ul class="flex space-x-6 text-lg font-family-montserrat">
        <li><a href="/Assignment/" class="hover:text-gray-400">Home</a></li>
        <li><a href="/Assignment/About" class="hover:text-gray-400">About</a></li>
        <li><a href="/Assignment/Service" class="hover:text-gray-400">Services</a></li>
        <li><a href="/Assignment/ContactUs" class="hover:text-gray-400">Contact</a></li>
        <li><a href="/Assignment/Listing" class="hover:text-gray-400">Listing</a></li>
      </ul>
    </nav>

    <!-- Icons -->
    <div class="flex items-center space-x-4">
      <!-- Hamburger (mobile only) -->
      <button type="button" class="md:hidden flex flex-col justify-between w-6 h-5" id="hamburger">
        <span class="block w-full h-0.5 bg-white"></span>
        <span class="block w-full h-0.5 bg-white"></span>
        <span class="block w-full h-0.5 bg-white"></span>
      </button>

      <?php if(isset($_SESSION['email'])&& $_SESSION['role']==='buyer'): ?>
        <a href="/Assignment/Cart">
          <img src="/Assignment/assets/icons/cart.svg" class="w-6 h-6" alt="Cart">
        </a>
        <a href="/Assignment/Favourites">
          <img src="/Assignment/assets/icons/favourites.svg" class="w-6 h-6" alt="Favorites">
        </a>
      <?php endif; ?>

      <a href="<?php echo (isset($_SESSION['role']) && $_SESSION['role'] === 'buyer') ? '/Assignment/Customer/Account/Edit' : '/Assignment/Login'; ?>">
        <img src="<?php echo isset($_SESSION['email']) ? isset($_SESSION['image']) ? $_SESSION['image']:'https://i.pravatar.cc/150?img=4' :'/Assignment/assets/icons/account.svg' ?>" class="<?php echo isset($_SESSION['email']) ?'rounded-full w-10 h-10' : 'w-8 h-8'?>" alt="Account">
      </a>
    </div>
  </div>

  <!-- Mobile Nav -->
  <nav class="md:hidden mt-4 hidden" id="mobile-menu">
    <ul class="flex flex-col space-y-2 text-lg font-family-montserrat">
      <li><a href="/Assignment/" class="hover:text-gray-400 block">Home</a></li>
      <li><a href="/Assignment/About" class="hover:text-gray-400 block">About</a></li>
      <li><a href="/Assignment/Service" class="hover:text-gray-400 block">Services</a></li>
      <li><a href="/Assignment/ContactUs" class="hover:text-gray-400 block">Contact</a></li>
      <li><a href="/Assignment/Listing" class="hover:text-gray-400 block">Listing</a></li>
    </ul>
  </nav>
</header>

<script>
  // Toggle mobile nav
  const hamburger = document.getElementById('hamburger');
  const mobileMenu = document.getElementById('mobile-menu');

  hamburger.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
  });
</script>
