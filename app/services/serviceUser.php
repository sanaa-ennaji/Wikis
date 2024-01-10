<?php

class UserService implements InterfaceUser
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function createUser($nom, $email, $pass, $role = 'author')
    {
        $createUserQuery = "INSERT INTO users (name_user, email, mot_de_passe, role) VALUES (:nom, :email, :pass, :role)";
        $this->db->query($createUserQuery);
        $this->db->bind(":nom", $nom);
        $this->db->bind(":email", $email);
        $this->db->bind(":pass", password_hash($pass, PASSWORD_DEFAULT));
        $this->db->bind(":role", $role);

        try {
            $this->db->execute();
            return $this->getUserByEmail($email);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function registerAuthor($nom, $email, $pass)
    {
       
        return $this->createUser($nom, $email, $pass, 'author');
    }

    // public function registerAdmin($nom, $email, $pass)
    // {
       
    //     return $this->createUser($nom, $email, $pass, 'admin');
    // }

    public function getUserById($id)
    {
        $getUserByIdQuery = "SELECT * FROM users WHERE id_user = :id";
        $this->db->query($getUserByIdQuery);
        $this->db->bind(":id", $id);

        try {
            return $this->db->single();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function updateUser($id, $nom, $email, $pass, $role)
    {
        $updateUserQuery = "UPDATE users SET name_user = :nom, email = :email, mot_de_passe = :pass, role = :role WHERE id_user = :id";
        $this->db->query($updateUserQuery);
        $this->db->bind(":id", $id);
        $this->db->bind(":nom", $nom);
        $this->db->bind(":email", $email);
        $this->db->bind(":pass", password_hash($pass, PASSWORD_DEFAULT)); 
        $this->db->bind(":role", $role);

        try {
            $this->db->execute();
            return $this->getUserById($id);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function deleteUser($id)
    {
        $deleteUserQuery = "DELETE FROM users WHERE id_user = :id";
        $this->db->query($deleteUserQuery);
        $this->db->bind(":id", $id);

        try {
            $this->db->execute();
            return true;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getUserByEmail($email)
    {
        $getUserByEmailQuery = "SELECT * FROM users WHERE email = :email";
        $this->db->query($getUserByEmailQuery);
        $this->db->bind(":email", $email);

        try {
            return $this->db->single();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function login($email, $pass)
    {
        $user = $this->getUserByEmail($email);

        if ($user && password_verify($pass, $user['mot_de_passe'])) {
          
            return $user;
        } else {
          
            return null;
        }
    }
}

?>
