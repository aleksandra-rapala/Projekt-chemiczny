<?php

class User{
    private $id_user;
    private $email;
    private $password;
    private $salt;
    private $id_account_type;

  
    public function __construct(?int $id_user, string $email, string $password, int $salt, int $id_account_type) {
        $this->id_user = $id_user;
        $this->email = $email;
        $this->password = $password;
        $this->salt = $salt;
        $this->id_account_type = $id_account_type;

    }

    public function getId()
    {
        return $this->id_user;
    }

    public function getEmail(): string 
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getSalt(){
        return $this->salt;
    }

    public function getIdAccountType(){
        return $this->id_account_type;
    }

}