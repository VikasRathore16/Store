<?php

use App\Store;

require_once '../vendor/autoload.php';
session_start();
$username = $_SESSION['username'][0];


$productId = $_GET['productId'];
$productName = $_GET['productName'];

$Store = new Store();
$singleProduct = $Store->getProduct($productId);
// print_r($singleProduct);
// print_r($_SESSION['cartItems']);
foreach ($_SESSION['cartItems'] as $key => $value) {
    if ($singleProduct['productId'] == $value['productId']) {
        $quantity = $value['quantity'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $productName; ?></title>
    <meta charset="utf-8" />
    <meta content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" name="viewport" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css" />

    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>



    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assests/css/owl.carousel.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../assests/css/responsive.css">
</head>

<body>
    <?php
    if ($username != '') {
        if ($_SESSION['cartItems'] == true) {
            $cartItems = count($_SESSION['cartItems']);
        } else {
            $cartItems = 0;
        }
        echo $Store->header($username['username'], 'Logged', $cartItems);
    }
    if ($_SESSION['admin'] == true) {
        if ($_SESSION['cartItems'] == true) {
            $cartItems = count($_SESSION['cartItems']);
        } else {
            $cartItems = 0;
        }
        echo $Store->header('admin', 'Logged', $cartItems);
    }

    if ($_SESSION['admin'] == false && $_SESSION['username'] == false) {
        echo $Store->header();
    }
    ?>

    <section class="py-5 single-product-area ">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="../assests/productsImages/<?php echo $singleProduct['productImage'] ?>" alt="..." /></div>
                <div class="col-md-6">
                    <div class="small mb-1">Product SKU : <?php echo $singleProduct['productId'] ?></div>
                    <h1 class="display-5 fw-bolder"><?php echo $singleProduct['productName'] ?></h1>
                    <div class="fs-5 mb-5">
                        <span class="text-decoration-line-through">$<?php echo $singleProduct['productCostPrice'] ?></span>
                        <span>$<?php echo $singleProduct['productSalePrice'] ?></span>
                    </div>
                    <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium at dolorem quidem modi. Nam sequi consequatur obcaecati excepturi alias magni, accusamus eius blanditiis delectus ipsam minima ea iste laborum vero?</p>
                    <div class="d-flex">
                        <input class="form-control text-center me-3" id="inputQuantity" type="num" value='<?php echo $quantity ?>' style="max-width: 3rem" />
                        <div class='product-option-shop'>
                            <a class='add_to_cart_button' href='#' id='addToCart' data-quantity='1' data-product_sku='' data-product_id='<?php echo $singleProduct['productId'] ?>' rel='nofollow'>Add to cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php echo $Store->footer(); ?>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="../assests/js/cart.js" rel="text/javascript"></script>

</html>