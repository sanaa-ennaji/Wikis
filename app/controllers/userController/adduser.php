<?php
session_start();
require_once('../../services/interface/interfaceUser.php');
require_once('../../services/implementation/UserService.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullName = $_POST['fullName'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Validate form data
    if (empty($fullName) || empty($username) || empty($email) || empty($password)) {
        $_SESSION['error'] = "Veuillez remplir tous les champs du formulaire.";
    } elseif (!preg_match('/^[a-zA-ZÀ-ÿ\s\'-]+$/', $fullName)) {
        $_SESSION['error'] = "Le nom complet n'est pas valide.";
    } elseif (!preg_match('/^[a-z0-9]{3,20}$/', $username)) {
        $_SESSION['error'] = "Le nom d'utilisateur n'est pas valide.";
    } elseif (!preg_match('/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/', $email)) {
        $_SESSION['error'] = "L'adresse e-mail n'est pas valide.";
    } else {
        try {
            $User = new User($fullName, $username, $email, $password);
            $serviceUser = new UserService();
            $serviceUser->addUser($User);
            header('location:../../Views/login.php');
            exit();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    header('location: ../../views/register.php');
    exit();
}
?>