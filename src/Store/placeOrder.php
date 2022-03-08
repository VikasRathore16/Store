<?php

use App\LogIn;

require_once "../vendor/autoload.php";
session_start();

$email = $_SESSION['username'][0]['email'];

$password = $_SESSION['username'][0]['password'];
$login = new LogIn($email, $password);

print_r($login->getUser($email, $password));

print_r($_SESSION['cartItems']);



?>