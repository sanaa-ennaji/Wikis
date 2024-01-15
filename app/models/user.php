<?php


class User {
    private $fullName;
    private $username;
    private $email;
    private $password;
    // private $pictureUser;
    
    public function __construct($fullName,$username,$email,$password){
        $this->fullName = $fullName;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        // $this->pictureUser = $pictureUser;
        
    }

    // getters and setters fullName
    public function getFullName(){
        return $this->fullName;
    }

    public function setFullName($fullName){
        $this->fullName = $fullName;
    }

    // getters and setters username
    public function getUsername(){
        return $this->username;
    }

    public function setUsername($username){
        $this->username = $username;
    }

    // getters and setters email
    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }
   // getters and setters password
    public function getPassword(){
        return $this->password;
    }
    public function setPassword($password){
         $this->password = $password;
    }

    // getters and setters pictureUser
    // public function getPictureUser(){
    //     return $this->pictureUser;
    // }

    // public function setPictureUser($pictureUser){
    //     $this->pictureUser = $pictureUser;
    // }
}

?>