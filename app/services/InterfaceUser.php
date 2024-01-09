<?php

interface  InterfaceUser {
    public function createUser($nom, $email, $pass, $role);
    public function getUserById($id);
    public function updateUser($id, $nom, $email, $pass, $role);
    public function deleteUser($id);
    
}

?>
