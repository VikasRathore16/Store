<?php

use App\LogIn;
use App\Order;

require_once "../vendor/autoload.php";
session_start();
print_r($_SESSION['cartItems']);
print_r($_SESSION['username']);
$address = isset($_POST['address']) ? $_POST['address'] : '';
$country = isset($_POST['country']) ? $_POST['country'] : '';
$state = isset($_POST['state']) ? $_POST['state'] : '';
$pincode = isset($_POST['pincode']) ? $_POST['pincode'] : '';
print_r($country);
$email = $_SESSION['username'][0]['email'];
$password = $_SESSION['username'][0]['password'];

$login = new LogIn($email, $password);
// $print_r($login);
$user = $login->getUser($email, $password);
print_r($user);
$login->updateDetails($user['userId'], $address, $state, $country, $pincode );
// print_r($_SESSION['cartItems']);

$cartItems = $_SESSION['cartItems'];

foreach ($cartItems as $key => $value) {
  
    $order = new Order($user['userId'], $value['productId'], $user['address'], $user['pincode'], $value['quantity'], $value['quantity'] * $value['productSalePrice']);
    $order->placeOrder();
}

 unset($_SESSION['cartItems']);
