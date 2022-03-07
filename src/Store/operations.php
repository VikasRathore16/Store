<?php

use App\Cart;
use App\Store;

error_reporting(E_ALL ^ E_NOTICE);
require '../vendor/autoload.php';
session_start();

$action = isset($_POST['action']) ? $_POST['action'] : '';
$productId = isset($_POST['product_id']) ? $_POST['product_id'] : '';
$quantity = isset($_POST['quantity']) ? $_POST['quantity'] : '';

//declaring Session['cartItems'] array
if ($_SESSION['cartItems'] == false) {
    $_SESSION['cartItems'] = [];
}

//  echo json_encode($action);
// echo json_encode($productId);
// $store = new Store();
// $product = $store->getProduct($productId);
// echo json_encode($product);

switch ($action) {
    case 'add':
        $cart = new Cart();
        $store = new Store();
        $product = $store->getProduct($productId);
        $carrt = $_SESSION['cartItems'];
        $cart->setCart($carrt);
        $re = $cart->addToCart($product);
        $_SESSION['cartItems'] = $cart->getCart();
        echo json_encode($_SESSION['cartItems']);

        break;

    case 'Remove':
        
        print_r($_SESSION['cartItems']);
        foreach ($_SESSION['cartItems'] as $key => $value) {
            if ($productId == $value['productId']) {
                print_r($value);
                unset($_SESSION['cartItems'][$key]);
            }
        }
        $_SESSION['cartItems'] = array_values($_SESSION['cartItems']);

        $cart = new Cart();
        $carrt = $_SESSION['cartItems'];
        $cart->setCart($carrt);

        break;

    case 'update':
        foreach ($_SESSION['cartItems'] as $key => $value) {
            if ($productId == $value['productId']) {
                echo $value['quantity'];
                print_r($value);
                // $value['quantity'] = $quantity;
                $_SESSION['cartItems'][$key]['quantity']=$quantity;
            }
        }
        $cart = new Cart();
        $carrt = $_SESSION['cartItems'];
        $cart->setCart($carrt);
        echo json_encode('success');
        break;
}
?>
