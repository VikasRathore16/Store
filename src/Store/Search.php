<?php

use App\Store;

require "../vendor/autoload.php";
session_start();
$search = new Store();
$username = $_SESSION['username'][0];
$parameter = $_GET['query'];


?>

<!doctype html>
<html lang="en">
  <head>
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

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
  </head>
  <body>
  <?php
    if ($username != '') {
        if ($_SESSION['cartItems'] == true) {
             $cartItems = count($_SESSION['cartItems']);
        } else {
             $cartItems = 0;
        }
        echo $search->header($username['username'], 'Logged', $cartItems);
    }
    if ($_SESSION['admin'] == true) {
        if ($_SESSION['cartItems'] == true) {
            $cartItems = count($_SESSION['cartItems']);
        } else {
            $cartItems = 0;
        }
        echo $search->header('admin', 'Logged', $cartItems);
    }

    if ($_SESSION['admin'] == false && $_SESSION['username'] == false) {
         echo $search->header();
    }
    ?>
    <div class="container">
    <?php
    echo $search->SearchBar();
    
    echo $search->getSearch($parameter);
    ?>
    </div>
    <?php
    echo $search->footer();
    ?>
    
  </body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="../assests/js/cart.js" rel="text/javascript"></script>
<script src="../assests/js/sortby.js" rel="text/javascript"></script>
</html>