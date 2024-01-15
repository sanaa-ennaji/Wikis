<?php


 interface InterfaceUser
{
    public function addUser(User $user);
    public function fetchUser($id);
    public function countUser();
}


// public function registerUser($nom, $email, $pass, $role);
?>
