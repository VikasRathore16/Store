<?php

use App\Store;

require_once 'vendor/autoload.php';

$Store = new Store();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Store</title>
  <meta charset="utf-8" />
  <meta content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" name="viewport" />
  <meta name="viewport" content="width=device-width" />
  <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css" />
  <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- Custom CSS -->
  <link rel="stylesheet" href="assests/css/owl.carousel.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="assests/css/responsive.css">

</head>

<body>

  <?php echo $Store->header(); ?>

  <div class="product-big-title-area">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="product-bit-title text-center">
            <h2>Shop</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php echo $Store->SearchBar() ?>
  <div class="single-product-area">
    <?php
    // echo $_GET['page'];
    
    // echo $Store->getStore();
    echo $Store->pagination($_GET['page']);
    ?>

  </div>

  <?php echo $Store->footer(); ?>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</html>