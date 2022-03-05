<?php 
namespace App;

 class admin extends Product {
     public string $email;
     public string $password;

     public function __construct()
     {
          $this->email = "admin@gmail.com";
          $this->password = "admin";
     }
     public function getadmin(){
         return ["email"=>$this->email, "password" => $this->password];
     }
     
 }


?>