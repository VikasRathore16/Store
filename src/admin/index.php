<?php
include_once("../Classes/DB.php");
include_once("../Classes/User.php");
include_once("../Classes/login.php");

session_start();

$status="";

if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $login = new LogIn($email, $password);
  $User = $login->getUser($email, $password);
  $status =(isset($User['status']) ? $User['status'] : "not" );
  $username=$User['username'];
  if($username=="admin"){
    $_SESSION['admin']=array();
    array_push($_SESSION['admin'],$email,$password);
    header('location: dashboard.php');
  }
  elseif($status=="Approved"){
    header('location: profile.php');
  }

}

// $login = new LogIn($email,$password);
// echo $login->getUser($email,$password)['status'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8" />
    <meta content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" name="viewport" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="../assests/css/login.css" />
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  </head>

<body class="text-center">

  <main class="form-signin">
    <form method="POST" action="">
      <img class="mb-4 bg-dark" src="../assests/imgs/cedcoss-logo.png" alt="" width="300" height="90">
      <h1 class="h3 mb-3 fw-normal">Please Login</h1>

      <div class="form-floating mb-2">
        <input type="email" class="form-control" id="floatingInput" name="email" value="" placeholder="name@example.com" required>
        <label for="floatingInput">Email address</label>
      </div>
      <div class="form-floating mb-2">
        <input type="password" class="form-control" id="floatingPassword" name="password" value="" placeholder="Password" required>
        <label for="floatingPassword">Password</label>
      </div>

      <!-- <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div> -->
      <div class=" mb-3 small">
        <label>
        Don't have account ? <a href="Signup.php">Sign Up</a>
        </label>
      </div>
      <div class=" mb-3 small text-danger">
        <label>
        <?php if($status=="not"){
          echo "Account Doesn't Exists. Please Sign Up";
        }
        if($status=="Restricted"){
          echo "Wait for Account Approval";
        }
        ?>
        </label>
      </div>
      <button class="w-75 btn btn-lg btn-primary" type="submit" name="submit" value="submit">Log in</button>
      <p class="mt-5 mb-3 text-muted">&copy; Cedcoss 2022</p>
    </form>
  </main>




</body>

</html>