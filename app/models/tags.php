<?php

class Tag{
    
    private $idTag;
    private $nameTag;

    public function __construct($nameTag){
        $this->nameTag = $nameTag;
    }

    // getter and setter for the idTg
    public function getIdTag(){
        return $this->idTag;
    }

    public function setIdTag($idTag){
        $this->idTag = $idTag;
    }
    // getter and setter for the name tag
    public function getNameTag(){
        return $this->nameTag;
    }

    public function setNameTag($nameTag){
        $this->nameTag = $nameTag;
    }
}





?>