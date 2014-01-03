<?php
class User{
    protected $id;
    protected $username;
    protected $email;
    protected $password;
    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->username;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function setName($username)
    {
        $this->username = $username;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }
}