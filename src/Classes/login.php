<?php

class LogIn extends User{
    public string $email;
    public string $password;

    public function __construct($email, $password)
    {   
        $this->email = $email;
        $this->password = $password;

    }
}

?>