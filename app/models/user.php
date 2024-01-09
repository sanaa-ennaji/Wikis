<?php

class User {
    private $id_user;
    private $nom;
    private $email;
    private $pass;
    private $role;

    public function __construct($nom, $email, $pass, $role = 'author') {
        $this->nom = $nom;
        $this->email = $email;
        $this->passe = $pass;
        $this->role = $role;
    }

    public function getId(){
        return $this->id_user;
    }

    public function getNom(){
        return $this->nom;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getMotDePasse(){
        return $this->pass;
    }

    public function getRole(){
        return $this->role;
    }

    public function setId($id_user){
        $this->id_user = $id_user;
    }

    public function setNom($nom){
        $this->nom = $nom;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function setMotDePasse($pass){
        $this->pass = $pass;
    }

    public function setRole($role){
        $this->role = $role;
    }
}

?>
