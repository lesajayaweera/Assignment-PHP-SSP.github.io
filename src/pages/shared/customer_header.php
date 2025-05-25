<?php


?>

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
    <header class="flex items-center justify-between bg-black text-white p-4" id="header">
        <div>
            <p class="text-4xl font-bold font-family-body">luxCars</p>
            <p class="text-sm font-family-montserrat">A luxury-driven, high-performance</p>
        </div>
        <div >
            <nav class="hidden md:block"     >
                <ul class="text-lg font-family-montserrat">
                    <li class="inline-block mr-4"><a href="/Assignment/" class="text-white hover:text-gray-400">Home</a></li>
                    <li class="inline-block mr-4"><a href="/Assignment/About" class="text-white hover:text-gray-400">About</a></li>
                    <li class="inline-block mr-4"><a href="/Assignment/Service" class="text-white hover:text-gray-400">Services</a></li>
                    <li class="inline-block mr-4"><a href="/Assignment/ContactUs" class="text-white hover:text-gray-400">Contact</a></li>
                    <li class="inline-block mr-4"><a href="/Assignment/Listing" class="text-white hover:text-gray-400">Listing</a></li>
                    
                </ul>
            </nav>
            <button title="button" type="button" class="flex flex-col justify-between w-6 h-5 cursor-pointer md:hidden" id="hamburger">
                <span class="block w-full h-0.5 bg-white"></span>
                <span class="block w-full h-0.5 bg-white"></span>
                <span class="block w-full h-0.5 bg-white"></span>   
            </button>
        </div>
        <div class="flex items-center space-x-6">
            <?php if(isset($_SESSION['email'])): ?>
                <a href="/Assignment/Cart">
                    <img src="/Assignment/assets/icons/cart.svg" class="w-6 h-6" alt="">
                </a>
                <a href="/Assignment/Favourites">
                    <img src="/Assignment/assets/icons/favourites.svg" class="w-6 h-6" alt="">
                </a>
            <?php endif;?>
            <a href="<?php echo (isset($_SESSION['role']) && $_SESSION['role'] === 'buyer') ? '/Assignment/Customer/Account/Edit' : '/Assignment/Login'; ?>">

                <img src="<?php echo isset($_SESSION['email']) ? $_SESSION['image'] :'/Assignment/assets/icons/account.svg' ?>" class="<?php echo isset($_SESSION['email']) ?'rounded-full w-10': 'w-8'?>" alt="">
            </a>

        </div>
    </header>