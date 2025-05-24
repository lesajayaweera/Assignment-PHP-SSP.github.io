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
    "Assignment/Customer/Account/Edit"=>"./src/pages/Customer/EditAccounts.php",
    "Assignment/ViewDetails"=>"./src/pages/Customer/Vehicle page.php",
    "Assignment/payments"=>"./src/pages/Customer/Checkout-payment.php",
    "/Assignment/Customer/Negotiate"=>"./src/pages/Customer/Negotiate.php",


    // Admin pages
    "Assignment/Admin/Dashboard"=>"./src/pages/Admin/Dashboard.php",
    "Assignment/Admin/EditAccounts"=>"./src/pages/Admin/EditAccounts.php",
    "Assignment/Admin/ManageAccounts"=>"./src/pages/Admin/ManageAccounts.php",
    "Assignment/Admin/ManageProducts"=>"./src/pages/Admin/ManageProducts.php",
    "Assignment/Admin/Tables"=>"./src/pages/Admin/Tables.php",
    "Assignment/Admin/ViewProducts"=> "./src/pages/Admin/ViewProductDetails.php",
    "Assignment/Admin/ManageListings"=> "./src/pages/Admin/ManageListings.php",
    "Assignment/Admin/Account/Edit"=> "./src/pages/Admin/EditUserAccount.php",




    // Seller pages
    "Assignment/Seller/AddCar"=>"./src/pages/Seller/AddCar.php",
    "Assignment/Seller/EditCar" => "./src/pages/Seller/EditCar.php",
    "Assignment/Seller/ManageProducts"=>"./src/pages/Seller/ManageProducts.php",
    "Assignment/Seller/Negotiations"=>"./src/pages/Seller/Negotiation.php",
    "Assignment/Seller/Dashboard" =>"./src/pages/Seller/SellerDashboard.php",
    "Assignment/Seller/Account/Edit" =>"./src/pages/Seller/EditAccounts.php",
    "Assignment/Seller/ViewProducts"=> "./src/pages/Seller/ViewProductDetails.php",
    "Assignment/Seller/DeleteProducts"=> "./src/pages/Seller/DeleteProducts.php",



    "Assignment/Logout"=>"./src/pages/Logout.php"




    




    

    
);

foreach ($links as $key => $value) {
    if ($requestPath === $key) {
        include_once $value;
        exit;
    }
    
   
}



// Optional fallback

