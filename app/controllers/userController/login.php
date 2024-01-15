<?php
 session_start();
require_once('../../services/interface/interceLogin.php');
require_once('../../services/implementation/ServiceLogin.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    
     // Vérification si les champs sont vides

        if (empty($username) || empty($password)) {
            $_SESSION['error'] = 'Veuillez remplir tous les champs.';
            header('location:../../Views/login.php');
            exit();
        }
        
    $logincheck = new ServiceLogin();
    $row = $logincheck->fetch($username);
   
  
    if($row){
        
        if(password_verify($password, $row['password'])){

           
            $_SESSION['idUser'] = $row['idUser'];
            
            if ( $row['role'] == "admin") {
                header('location:../../views/admin/category.php');
                exit();
            } else {
                header('location:../../views/author/navbar.php');
                // var_dump($roleRow['roleName']);
                exit();
            }
            
        }else{
            
            $_SESSION['error'] = 'Mot de passe incorrect.';
            header('location:../../views/login.php');
            exit();
        }
    }else{
       
        $_SESSION['error'] = 'Nom d\'utilisateur incorrect.';
        header('location:../../views/login.php');
        exit();
    }
    
}

?>