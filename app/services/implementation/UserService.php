<?php

require_once(__DIR__.'/../../models/Database.php');
require_once(__DIR__.'/../../models/user.php');
require_once(dirname(dirname(__FILE__)) .'/interface/InterfaceUser.php');

class UserService  implements InterfaceUser{
    private $db;
    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection(); 
    }
    public function addUser(User $user){
        $pdo = $this->db;
        
        $fullName = $user->getFullName();
        $username = $user->getUsername();
        $email = $user->getEmail();
        $password = $user->getPassword();
        // $pictureUser = $user->getPictureUser();

       

        $sql = "INSERT INTO user (fullName,username,email,password,role) VALUES (:fullName,:username,:email,:password,'author');";
        
        $stmt = $pdo->prepare($sql);
        
        $stmt->bindParam(':fullName',$fullName);
        $stmt->bindParam(':username',$username);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':password',$password);
        // $stmt->bindParam(':pictureUser',$pictureUser);

        $stmt->execute();
        
    }
   
    public function fetchUser($id){

        $pdo = $this->db;

        $sql = "SELECT * FROM user WHERE idUser = :idUser";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':idUser',$id);
        
        $data = $pdo->query($sql);
        $fetchUser = $data->fetchAll(PDO::FETCH_ASSOC);

        return  $fetchUser;
    }

    public function countUser(){
        $pdo = $this->db;

        $sql = "SELECT count(*) AS count FROM user WHERE role = 'author'";
        
        $data = $pdo->query($sql);
        $countUser = $data->fetch(PDO::FETCH_ASSOC);

        return  $countUser;
    }
}


?>