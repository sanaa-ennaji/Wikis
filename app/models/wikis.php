<?php

class Wiki {
    private $id_wiki;
    private $titre;
    private $contenu;
    private $image_url;
    private $date_creation;
    private $id_auteur;
    private $id_categorie;

    public function __construct($titre, $contenu, $image_url, $id_auteur, $id_categorie) {
        $this->titre = $titre;
        $this->contenu = $contenu;
        $this->image_url = $image_url;
        $this->id_auteur = $id_auteur;
        $this->id_categorie = $id_categorie;
    }

    public function getId(){
        return $this->id_wiki;
    }

    public function getTitre(){
        return $this->titre;
    }

    public function getContenu(){
        return $this->contenu;
    }

    public function getImageUrl(){
        return $this->image_url;
    }

    public function getDateCreation(){
        return $this->date_creation;
    }

    public function getIdAuteur(){
        return $this->id_auteur;
    }

    public function getIdCategorie(){
        return $this->id_categorie;
    }

    public function setId($id_wiki){
        $this->id_wiki = $id_wiki;
    }

    public function setTitre($titre){
        $this->titre = $titre;
    }

    public function setContenu($contenu){
        $this->contenu = $contenu;
    }

    public function setImageUrl($image_url){
        $this->image_url = $image_url;
    }

    public function setDateCreation($date_creation){
        $this->date_creation = $date_creation;
    }

    public function setIdAuteur($id_auteur){
        $this->id_auteur = $id_auteur;
    }

    public function setIdCategorie($id_categorie){
        $this->id_categorie = $id_categorie;
    }
}

?>
