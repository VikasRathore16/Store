<?php
include_once("../Classes/DB.php");
include_once("../Classes/Products.php");
include_once("../Classes/admin.php");

session_start();

$admin = new admin();
$email = $admin->getadmin()['email'];
$password = $admin->getadmin()['password'];
if($_SESSION['admin'][0]==$email && $_SESSION['admin'][1] == $password ){
   
    print_r($admin->getadmin());
    $admin->getAllProducts();
}
