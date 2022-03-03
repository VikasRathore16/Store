<?php

class User extends DB
{

    public string $username;
    public string $firstName;
    public string $lastName;
    public string $password;
    public string $email;

    public function __construct($username, $firstName, $lastName, $email, $password)
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

    public function getUser($email, $password)
    {
        $sql = DB::getInstance()->prepare("Select * from Users where email ='$email' and password = '$password' ");
        $sql->execute();
        $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
        foreach ((new RecursiveArrayIterator($sql->fetchAll())) as $k => $v) {
            return $v;
        }
    }

    public function getAllUser()
    {
        $sql = DB::getInstance()->prepare("Select * from Users");
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $html="<div class='table-responsive'>
        <table class='table table-striped table-sm'>
          <thead>
            <tr>
              <th scope='col'>User ID</th>
              <th scope='col'>User Name</th>
              
              <th scope='col'>First Name</th>
              <th scope='col'>Last Name</th>
              <th scope='col'>Email</th>
              <th scope='col'>Role</th>
              <th scope='col'>Address</th>
              <th scope='col'>Pincode</th>
              <th scope='col'>Status</th>
              <th scope='col'>Action</th>
            </tr>
          </thead>
          <tbody>";
        foreach ((new RecursiveArrayIterator($sql->fetchAll())) as $k => $v) {
            // print_r($v);
            $html .= "<tr>
            <td>$v[userId]</td>
            <td>$v[username]</td>
            <td>$v[firstName]</td>
            <td>$v[lastName]</td>
            <td>$v[email]</td>
            <td>$v[role]</td>
            <td>$v[address]</td>
            <td>$v[pincode]</td>
            <td>$v[status]</td>
            
            <td><button class='border-0'>Edit </button><button class='border-0'>Delete</button> <button class='border-0 bg-primary text-light'>Approve</button> </td>
          </tr>";
        }
        $html.="</tr>
        </tbody>
      </table>
    </div>";
        return $html;
    }

    public function checkUser($email)
    {
        $sql = DB::getInstance()->prepare("Select * from Users where email = '$email' ");
        $sql->execute();
        $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
        
        foreach ((new RecursiveArrayIterator($sql->fetchAll())) as $k => $v) {
          
            return ($v);
         
        }
     
    }
}
