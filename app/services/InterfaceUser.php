<?php

interface  InterfaceUser {
    // public function createUser($nom, $email, $pass, $role);
    // public function getUserById($id);
    // public function updateUser($id, $nom, $email, $pass, $role);
    // public function deleteUser($id);

    public function registerUser($nom, $email, $pass, $role);
    public function loginUser($email, $pass);
    public function getAllUsers();
    
}

?>
