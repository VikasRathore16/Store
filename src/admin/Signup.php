<?php
require("../Classes/DB.php");
?>
  
<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
  
      <form method="GET" action="../Classes/register.php">
        <img class="mb-4 bg-dark" src="../assests/imgs/cedcoss-logo.png" alt="" width="300" height="90">
        <h1 class="h3 mb-3 fw-normal">Please sign up</h1>

        <div class="form-floating mb-2">
          <input type="text" class="form-control" id="floatingInput" name="username" value="" placeholder="UserName">
          <label for="floatingInput">Username</label>
        </div>
        <div class="form-floating mb-2">
          <input type="text" class="form-control" id="floatingInput" name="firstName" value="" placeholder="First Name">
          <label for="floatingInput">First Name</label>
        </div>
        <div class="form-floating mb-2">
          <input type="text" class="form-control" id="floatingInput" name="lastName" value="" placeholder="Last Name">
          <label for="floatingInput">Last Name</label>
        </div>
        <div class="form-floating mb-2">
          <input type="email" class="form-control" id="floatingInput" name="email" value="" placeholder="name@example.com">
          <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating mb-2">
          <input type="password" class="form-control" id="floatingPassword" name="password" value="" placeholder="Password">
          <label for="floatingPassword">Password</label>
        </div>
    
       
        <button class="w-75 btn btn-lg btn-primary" type="submit">Sign Up</button>
        <p class="mt-5 mb-3 text-muted">&copy; Cedcoss - 2022 </p>
      </form>
    </main>

    
  

</body></html>