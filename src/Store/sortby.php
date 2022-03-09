<?php

use App\Store;

error_reporting(E_ALL ^ E_NOTICE);
require '../vendor/autoload.php';
session_start();

$action = isset($_POST['action']) ? $_POST['action'] : '';
$value = isset($_POST['value']) ? $_POST['value'] : '';
$parameter = isset($_GET['parameter']) ? $_GET['parameter'] : '';
//  echo $parameter;
 if($parameter=="Sort By"){
     header('location: ../index.php');
 }


$store = new Store();

switch ($value) {
    case 1:
        
        $store->sortby(1);
    //    
        break;
    case 2:
        
        $store->sortby(2);
        break;
}
// echo $parameter;
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
echo $store->sortby($parameter);
?>
  </body>
</html>