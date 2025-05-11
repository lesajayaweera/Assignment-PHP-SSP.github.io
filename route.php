<?php

// Remove query string and leading slash
$requestURI = explode('?', $_SERVER['REQUEST_URI'], 2)[0];
$requestPath = trim($requestURI, '/');

// Debug (optional)

$links = array(
    
    // "Assignment/Login" =>"./src/pages/Login.php",
    // "Assignment/Home" =>"./src/pages/Customer/index.php",
    // "Assignment/Register" =>"./src/pages/Register.php",
    // "Assignment/Listing" =>"./src/pages/Customer/Listing.php",
    // "Assignment/About" =>"./src/pages/Customer/About.php",
    // "Assignment/ContactUs" =>"./src/pages/Customer/ContactUs.php",
    // "Assignment/Service" =>"./src/pages/Customer/Service.php",
    // "Assignment/Admin/Dashboard" =>"./src/pages/Admin/Dashboard.php",
    // "Assignment/Logout" =>"./src/pages/Login.php", 
    // "Assignment/Brands" =>"./src/pages/Customer/Brands.php",

    // Common Pages
    "Assignment/Login"=>"./src/pages/Login.php",
    "Assignment/Register"=>"./src/pages/Register.php",
    "Assignment/About"=>"./src/pages/Customer/About.php",
    "Assignment/Brands"=>"./src/pages/Customer/Brands.php",
    "Assignment/ContactUs"=>"./src/pages/Customer/ContactUs.php",
    "Assignment/Cart"=>"./src/pages/Customer/Cart.php",
    "Assignment/Payment"=>"./src/pages/Customer/Checkout-payment.php",
    "Assignment/Checkout"=> "./src/pages/Customer/Checkout.php",
    "Assignment/Listing"=>"./src/pages/Customer/Listing.php",
    "Assignment/Seller"=>"./src/pages/Customer/Seller page.php",
    "Assignment/Service"=>"./src/pages/Customer/Service.php",
    "Assignment/ViewDetails"=>"./src/pages/Customer/Vehicle page.php",
    "Assignment/Home"=> "./index.php",




    

    
);

foreach ($links as $key => $value) {
    if ($requestPath === $key) {
        include_once $value;
        exit;
    }
   
}

// Optional fallback

