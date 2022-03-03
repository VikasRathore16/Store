<?php
 include_once("User.php");

$username = $_GET['username'];
$firstName = $_GET["firstName"];
$lastName = $_GET["lastName"];
$email = $_GET["email"];
$password = $_GET["password"];

$User =new User($username,$firstName,$lastName,$email,$password);
print_r($User->getUser($email,$password));
print_r($User->checkUser($email));
// $User->addUser();

