<?php

class Category{
    private $idCategory;
    private $nameCategory;
    private $description;
    private $pictureCategory;

    public function __construct( $nameCategory, $description, $pictureCategory){
        $this->nameCategory = $nameCategory;
        $this->description = $description;
        $this->pictureCategory = $pictureCategory;

    }

    // getters and setters idCategory
    public function getIdCategory(){
        return $this->idCategory;
    }

    public function setIdCategory($idCategory){
        $this->idCategory = $idCategory;
    }

     // getters and setters nameCategory
     public function getNameCategory(){
        return $this->nameCategory;
    }

    public function setNameCategory($nameCategory){
        $this->nameCategory = $nameCategory;
    }

     // getters and setters description
     public function getDescription(){
        return $this->description;
    }

    public function setDescription($description){
        $this->description = $description;
    }

       // getters and setters pictureCategory
       public function getPictureCategory(){
        return $this->pictureCategory;
    }

    public function setPictureCategory($pictureCategory){
        $this->pictureCategory = $pictureCategory;
    }
}



?>