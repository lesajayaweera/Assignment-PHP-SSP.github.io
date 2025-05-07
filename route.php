<?php

$requestURL =trim( $_SERVER['REQUEST_URI'],'/');

echo $requestURL;
$links = array(
    "Assigment/"=>"./index.php",
    "Assigment/Login"=>"./pages/Login.php",
    "Assigment/Register"=>"../pages/Register.php",);

foreach ($links as $key => $value) {
    if ($requestURL == $key) {
        include $value;
        exit;
    }
    
}