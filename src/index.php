<?php

require_once "vendor/autoload.php";

?>
  
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8" />
  <meta content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" name="viewport" />
  <meta name="viewport" content="width=device-width" />
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="">
            <img src="../assests/imgs/cedcoss-logo.png" alt="Avatar Logo"  class="w-25"> 
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto">
              <!-- <li class="nav-item">
                <a class="nav-link text-light border" href="admin/index.php">Log In</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light border" href="admin/Signup.php">Sign Up</a>
              </li> -->
              <!-- <li class="nav-item">
                <a class="nav-link text-light" href="admin/dashboard.php">Dashboard</a>
              </li> -->
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
      </nav>
</body>
</html>