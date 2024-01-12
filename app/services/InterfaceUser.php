<?php

interface  InterfaceUser {

    public function registerUser($nom, $email, $pass, $role);
    public function loginUser($email, $pass);
    public function getAllUsers();
    public function getLoggedInUserId();
    
}

?>
