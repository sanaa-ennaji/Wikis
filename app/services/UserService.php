<?php
require_once '../models/Database.php';
require_once '../models/user.php';
require_once 'InterfaceUser.php';

class UserService implements  InterfaceUser {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function registerUser($nom, $email, $pass, $role = 'author') {
        try {
            $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);

            $stmt = $this->db->prepare("INSERT INTO users (name_user, email, mot_de_passe, role) VALUES (?, ?, ?, ?)");
            $stmt->execute([$nom, $email, $hashedPassword, $role]);

            return true;
        } catch (PDOException $e) {
   
            return false;
        }
    }

    public function loginUser($email, $pass) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->execute([$email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($pass, $user['mot_de_passe'])) {
               
                $userData = new User($user['name_user'], $user['email'], $user['mot_de_passe'], $user['role']);
                $userData->setId($user['id_user']);
                return $userData;
            } else {
              
                return null;
            }
        } catch (PDOException $e) {
            return null;
        }
    }
    
    public function getAllUsers() {
        try {
            $stmt = $this->db->prepare("SELECT * FROM users");
            $stmt->execute();
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            return $users;
        } catch (PDOException $e) {
          
            return [];
        }
    }
}
?>
