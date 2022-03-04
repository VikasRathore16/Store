<?php
include_once("../Classes/DB.php");
include_once("../Classes/Products.php");
include_once("../Classes/admin.php");

session_start();

$admin = new admin();
$email = $admin->getadmin()['email'];
$password = $admin->getadmin()['password'];
if($_SESSION['admin'][0]==$email && $_SESSION['admin'][1] == $password ){

    print_r($admin->getadmin());
    $admin->getAllProducts();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard</title>
    <meta charset="utf-8" />
    <meta content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" name="viewport" />
    <meta name="viewport" content="width=device-width" />

    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <meta name="theme-color" content="#7952b3">
</head>

<body>
    <nav class="navbar navbar-expand-xl">
        <div class="container h-100">
            <a class="navbar-brand" href="index.html">
                <h1 class="tm-site-title mb-0"> New Product </h1>
            </a>
            <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars tm-nav-icon"></i>
            </button>


        </div>
    </nav>
    <div class="container tm-mt-big tm-mb-big">
        <div class="row">
            <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
                <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="tm-block-title d-inline-block">Add Product</h2>
                        </div>
                    </div>
                    <div class="row tm-edit-product-row">
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <form action="" class="tm-edit-product-form">
                                <div class="form-group mb-3">
                                    <label for="productName">Product Name
                                    </label>
                                    <input id="productName" name="productName" type="text" class="form-control validate" required />
                                </div>
                                <div class="form-group mb-3">
                                    <label for="productCategory">Product Category</label>
                                    <input id="productCategory" name="productCategory" type="text" class="form-control validate" required />
                                    <!-- <textarea class="form-control validate" rows="3" required></textarea> -->
                                </div>
                                <!-- <div class="form-group mb-3">
                                    <label for="category">Category</label>
                                    <select class="custom-select tm-select-accounts dropdown" id="category">
                                        <option selected>Select category</option>
                                        <option value="1">Electronics</option>
                                        <option value="2">Furnitures</option>
                                        <option value="3">Home Appliances</option>
                                    </select>
                                </div> -->
                                <div class="row">
                                    <div class="form-group mb-3 col-xs-12 col-sm-6">
                                        <label for="productSalePrice">Product Sale Price
                                        </label>
                                        <input id="productSalePrice" name="productSalePrice" type="text" class="form-control validate" data-large-mode="true" />
                                    </div>
                                    <div class="form-group mb-3 col-xs-12 col-sm-6">
                                        <label for="productCostPrice">Product Cost Price
                                        </label>
                                        <input id="productCostPrice" name="productCostPrice" type="text" class="form-control validate" required />
                                    </div>
                                </div>
                                <!-- <div class="custom-file mt-3 mb-3">
                                <input id="fileInput" type="file" style="display:none;" />
                                <input type="button" class="btn btn-primary btn-block mx-auto" value="UPLOAD PRODUCT IMAGE" />
                            </div> -->

                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-block text-uppercase">Add Product Now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>