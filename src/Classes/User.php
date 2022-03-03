<?php
include_once("DB.php");

class User extends DB
{
    
    public string $username;
    public string $firstName;
    public string $lastName;
    public string $password;
    public string $email;

    public function __construct($username, $firstName, $lastName,$email, $password)
    {
        
        $this->username = $username;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->password = $password;
        $this->email = $email;
    }

    public function addUser()
    {
        DB::getInstance()->exec("INSERT INTO Users (username, firstName, lastName, email, password)  VALUES ('$this->username', '$this->firstName' ,'$this->lastName','$this->email','$this->password')");
        
    }

    public function getUser($email,$password){
        $sql=DB::getInstance()->prepare("Select * from Users where email ='$email' and password = '$password' ");
        $sql->execute();
        $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
        foreach((new RecursiveArrayIterator($sql->fetchAll())) as $k=>$v) {
            
            return $v;
            
          }

    }

    public function checkUser($email){
        $sql=DB::getInstance()->prepare("Select * from Users where email = '$email' ");
        $sql->execute();
        $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
        if($result==1){
            echo "exists";
        }
        foreach((new RecursiveArrayIterator($sql->fetchAll())) as $k=>$v) {
            echo "<br>Inside";
            print_r($v);
            echo "<br>";
            
            
          }
        return $result;

    }
}


