<?php

class Wiki{
    private $idWiki;
    private $title;
    private $content;
    private $summarize;
    private $dateCreated;
    private $dateModified;
    private $archived;
    private $pictureWiki;
    private $idCategory;
    private $idUser;

    public function __construct($title, $content, $summarize, $dateCreated, $dateModified, $pictureWiki, $idCategory, $idUser){
        $this->title = $title;
        $this->content = $content;
        $this->summarize = $summarize;
        $this->dateCreated = $dateCreated;
        $this->dateModified = $dateModified;
       
        $this->pictureWiki = $pictureWiki;
        $this->idCategory = $idCategory;
        $this->idUser = $idUser;
    }

      // Getter et Setter pour idWiki
      public function getIdWiki() {
        return $this->idWiki;
    }

    public function setIdWiki($idWiki) {
        $this->idWiki = $idWiki;
    }

    // Getter et Setter pour title
    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    // Getter et Setter pour content
    public function getContent() {
        return $this->content;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    // Getter et Setter pour summarize
    public function getSummarize() {
        return $this->summarize;
    }

    public function setSummarize($summarize) {
        $this->summarize = $summarize;
    }

    // Getter et Setter pour dateCreated
    public function getDateCreated() {
        return $this->dateCreated;
    }

    public function setDateCreated($dateCreated) {
        $this->dateCreated = $dateCreated;
    }

    // Getter et Setter pour dateModified
    public function getDateModified() {
        return $this->dateModified;
    }

    public function setDateModified($dateModified) {
        $this->dateModified = $dateModified;
    }

    // Getter et Setter pour archived
    public function getArchived() {
        return $this->archived;
    }

    public function setArchived($archived) {
        $this->archived = $archived;
    }

    // Getter et Setter pour pictureWiki
    public function getPictureWiki() {
        return $this->pictureWiki;
    }

    public function setPictureWiki($pictureWiki) {
        $this->pictureWiki = $pictureWiki;
    }

    // Getter et Setter pour idCategory
    public function getIdCategory() {
        return $this->idCategory;
    }

    public function setIdCategory($idCategory) {
        $this->idCategory = $idCategory;
    }

    // Getter et Setter pour idUser
    public function getIdUser() {
        return $this->idUser;
    }

    public function setIdUser($idUser) {
        $this->idUser = $idUser;
    }
}








?>