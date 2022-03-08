<?php

use App\LogIn;

require_once "../vendor/autoload.php";
session_start();

if($_SESSION['username']==false){
    echo "Page not found";
    die();
}

$address = isset($_POST['address']) ? $_POST['address'] : '';
$state = isset($_POST['state']) ? $_POST['state'] : '';
$country = isset($_POST['country']) ? $_POST['country'] : '';
$pincode = isset($_POST['pincode']) ? $_POST['pincode'] : '';
$userid = $_SESSION['username'][0]['userId'];
$email = $_SESSION['username'][0]['email'];
$password= $_SESSION['username'][0]['password'];
$login = new LogIn($email,$password);
// print_r($login);
// print_r($login->getUser($email,$password));
if($login->updateDetails($userid,$address,$state,$country,$pincode)){
     $_SESSION['username'][0] = $login->getUser($email,$password);
    //  print_r($login->getUser($email,$password));
    //  print_r($_SESSION['username']);
    header("Location: profile.php?msg=User Details Updated");
};


?>