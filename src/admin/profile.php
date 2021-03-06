<?php

use App\LogIn;

require_once "../vendor/autoload.php";
session_start();
// $login = new LogIn('vikas@cedcoss.com','Vikas@123');
// print_r($login->getUser('vikas@cedcoss.com','Vikas@123'));
// $login = new LogIn($_SESSION['username'],$_SESSION['username']);
// print_r($_SESSION['username'][0]);
$msg = isset($_GET['msg']) ? $_GET['msg'] : 'Do you want to update your Details';

?>

<!doctype html>
<html lang="en">

<head>
<header class='container p-0 mt-2'>

    <div class="row">
      <div class="col-12">
        <a class='border-0 btn bg-dark text-light w-100 pt-2 pb-2' href='../index.php'>Back to Store</a>
      </div>
    </div>
  </header> 

    <head>
        <title>Dashboard</title>
        <meta charset="utf-8" />
        <meta content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" name="viewport" />
        <meta name="viewport" content="width=device-width" />

        <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
        <meta name="theme-color" content="#7952b3">
        <!-- Custom styles for this template -->
        <link href="../assests/css/dashboard.css" rel="stylesheet">
    </head>

<body>

    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row ">
            <div class="col-12 pt-2 pb-2 bg-primary  text-light ">
                <span class="mx-auto">
            <?php echo $msg ?>
                </span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                    <span class="font-weight-bold"><?php echo $_SESSION['username'][0]['username']?></span>
                    <span class="text-black-50"><?php echo $_SESSION['username'][0]['email']?></span>
                    <span> </span></div>
            </div>
            <div class="col-md-9 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-7 col-lg-8">
                            <!-- <h4 class="mb-3">User details</h4> -->
                            <form class="needs-validation" action="updateProfile.php" method='POST' >
                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <label for="firstName" class="form-label">First name</label>
                                        <input type="text" class="form-control" name="FirstName" id="firstName" placeholder="" value="<?php echo $_SESSION['username'][0]['firstName']?>" disabled>
                                        <div class="invalid-feedback">
                                            Valid first name is required.
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="lastName" class="form-label">Last name</label>
                                        <input type="text" class="form-control" name="lastName" id="lastName" placeholder="" value="<?php echo $_SESSION['username'][0]['lastName']?>" disabled>
                                        <div class="invalid-feedback">
                                            Valid last name is required.
                                        </div>
                                    </div>



                                    <div class="col-12">
                                        <label for="email" class="form-label">Email </label>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com" value='<?php echo $_SESSION['username'][0]['email']?>' disabled>
                                        <div class="invalid-feedback">
                                            Please enter a valid email address for shipping updates.
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="address" class="form-label">Address</label>
                                        <input type="text" class="form-control" name='address'  value='<?php echo $_SESSION['username'][0]['address']?>' id="address" placeholder="1234 Main St" required>
                                        <div class="invalid-feedback">
                                            Please enter your shipping address.
                                        </div>
                                    </div>


                                    <div class="col-md-5">
                                        <label for="country" class="form-label">Country</label>
                                        <input type="text" class="form-control" name='country'  value="<?php echo $_SESSION['username'][0]['country']?> " id="country" placeholder="" required>

                                        <div class="invalid-feedback">
                                            Please select a valid country.
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="state" class="form-label">State</label>
                                        <input type="text" class="form-control" name='state' value='<?php echo $_SESSION['username'][0]['state']?>' id="state" placeholder="" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid state.
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="zip" class="form-label">Pincode</label>
                                        <input type="text" class="form-control" name='pincode' value='<?php echo $_SESSION['username'][0]['pincode']?>' id="pincode" placeholder="" required>
                                        <div class="invalid-feedback">
                                            Pincode code required.
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-4">
                                <button class="w-100 btn btn-primary btn-lg" type="submit">Update Details</button>
                            </form>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>