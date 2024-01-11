<?php

class Category {
    private $id_categorie;
    private $nom_categorie;

    public function __construct($nom_categorie) {
        $this->nom_categorie = $nom_categorie;
    }

    public function getId(){
        return $this->id_categorie;
    }

    public function getNomCategorie(){
        return $this->nom_categorie;
    }

    public function setId($id_categorie){
        $this->id_categorie = $id_categorie;
    }

    public function setNomCategorie($nom_categorie){
        $this->nom_categorie = $nom_categorie;
    }
}

?>
