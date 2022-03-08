<?php

error_reporting(0);
use App\Cart;

require "../vendor/autoload.php";
session_start();

?>
<!doctype html>
<html lang="en">

<head>
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
  <script>
     function handleFormSubmit(form) {
      popUp();
      form.submit();
    }

    function popUp() {
      alert("This is a test message");
    }
    </script>
</head>

<body class="bg-light">
  <header class='container p-0 mt-2'>

    <div class="row">
      <div class="col-12">
        <a class='border-0 btn bg-dark text-light w-100 pt-2 pb-2' href='../index.php'>Back to Store</a>
      </div>
    </div>
  </header>
  <div class="container">

    <main>
      <div class="py-5 text-center">
        <h2>Checkout form</h2>
      </div>

      <div class="row g-5">
        <div class="col-md-5 col-lg-4 order-md-last">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-primary">Your cart</span>
            <span class="badge bg-primary rounded-pill"><?php echo count($_SESSION['cartItems']) ?></span>
          </h4>
          <?php $cart = new Cart();
            $carrt = $_SESSION['cartItems'];
            $cart->setCart($carrt);
            echo $cart->getCheckOutItems();
           ?>


        </div>
        <div class="col-md-7 col-lg-8 form">
          <h4 class="mb-3">Billing address</h4>

          
          <!-- <form class="needs-validation" onSubmit="handleFormSubmit(this); return false;"> -->
            <div class="row g-3">
              <div class="col-sm-6">

                <label for="firstName" class="form-label">First name</label>
                <input type="text" class="form-control" id="firstName" value= "<?php echo $_SESSION['username'][0]['firstName']?>" placeholder="" >
                <?php if($_SESSION['username'] == true ) {
                   echo "<input type='hidden' class='form-control' id='cartItems' value=".count($_SESSION['cartItems'])."  placeholder='' >";
                  echo "<input type='hidden' class='form-control' id='username' value='user exists'  placeholder='' >";
                }
                  else{
                    echo "<input type='hidden' class='form-control' id='username' value='user not exists'  placeholder='' >";
                  }
                  ?>
               
               
              </div>

              <div class="col-sm-6">
                <label for="lastName" class="form-label">Last name</label>
                <input type="text" class="form-control" id="lastName"  value="<?php echo $_SESSION['username'][0]['lastName']?>" placeholder="" >

              </div>

              <div class="col-12">
                <label for="email" class="form-label">Email </label>
                <input type="email" class="form-control" id="email"  value="<?php echo $_SESSION['username'][0]['email']?>" placeholder="you@example.com" disabled >

              </div>

              <div class="col-12">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address"  value="<?php echo $_SESSION['username'][0]['address']?>" placeholder="1234 Main St" >

              </div>


              <div class="col-md-5">
                <label for="country" class="form-label">Country</label>
                <input type="text" class="form-control" id="country"  value="<?php echo $_SESSION['username'][0]['country']?>" placeholder="" >


              </div>

              <div class="col-md-4">
                <label for="state" class="form-label">State</label>
                <input type="text" class="form-control" id="state"  value="<?php echo $_SESSION['username'][0]['state']?>" placeholder="" >

              </div>

              <div class="col-md-3">
                <label for="zip" class="form-label">Pincode</label>
                <input type="text" class="form-control" id="pincode"  value="<?php echo $_SESSION['username'][0]['pincode']?>" placeholder="" >
                <div class="invalid-feedback">
                  Zip code required.
                </div>
              </div>
            </div>

            <hr class="my-4">

            <button class="w-100 btn btn-primary btn-lg" id='formSubmit' type="submit">Place Order</button>
          <!-- </form> -->
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
  <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="./assets/js/form-validation.js"></script>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="../assests/js/checkout.js" rel="text/javascript"></script>
</html>