<?php

use App\Cart;

require_once '../vendor/autoload.php';
session_start();
// print_r($_SESSION['cartItems']);
$cart = new Cart();
$carrt = $_SESSION['cartItems'];
$cart->setCart($carrt);

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
  <body class="bg-light">
    
<div class="container">
  <main>
    <div class="py-5 text-center">
      <h2>Cart</h2>
    </div>

    <div class="row g-5">
      <div class="col order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Your cart</span>
          <span class="badge bg-primary rounded-pill"><?php echo count($_SESSION['cartItems']) ?></span>
        </h4>
        <?php echo $cart->displayCart();?>
     
      </div>
    </div>
    <div class="row g-5 align-items-right">
        <div class="col-3">
            <form action="checkout.php" method="GET" >
                    <button type="submit" class="btn btn-primary">Checkout</button>
            </form>
        </div>
    </div>
  </main>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2017–2021 Company Name</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
</div>


    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="./assets/js/form-validation.js"></script>
  </body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="../assests/js/cart.js"  rel="text/javascript"></script>
</html>
