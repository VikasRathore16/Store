<?php

use App\Store;

require_once '../vendor/autoload.php';
$productId = $_GET['productId'];
$productName = $_GET['productName'];

$Store = new Store();
$singleProduct = $Store->getProduct($productId);
// print_r($singleProduct);
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
    <!-- <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="">
                <img src="../assests/imgs/cedcoss-logo.png" alt="Avatar Logo" class="w-25">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item me-4">
                        <form class="d-flex">
                            <input class="form-control me-2" type="text" placeholder="Search">
                            <button class="btn btn-primary" type="button">Search</button>
                        </form>
                    </li>
                    <li class="nav-item float-end">
                        <a class="nav-link text-light border" href="admin/index.php">Log In</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav> -->
<?php echo $Store->header(); ?>

<section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="../assests/productsImages/<?php echo $singleProduct['productImage']?>" alt="..." /></div>
                    <div class="col-md-6">
                        <div class="small mb-1">Product SKU : <?php echo $singleProduct['productId']?></div>
                        <h1 class="display-5 fw-bolder"><?php echo $singleProduct['productName']?></h1>
                        <div class="fs-5 mb-5">
                            <span class="text-decoration-line-through">$<?php echo $singleProduct['productCostPrice']?></span>
                            <span>$<?php echo $singleProduct['productSalePrice']?></span>
                        </div>
                        <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium at dolorem quidem modi. Nam sequi consequatur obcaecati excepturi alias magni, accusamus eius blanditiis delectus ipsam minima ea iste laborum vero?</p>
                        <div class="d-flex">
                            <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" />
                            <button class="btn btn-outline-dark flex-shrink-0" type="button">
                                <i class="bi-cart-fill me-1"></i>
                                Add to cart
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <?php echo $Store->footer(); ?>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</html>