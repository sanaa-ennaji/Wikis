<?php

class Tags {
    private $ID_tag;
    private $nom_tag;

    public function __construct($nom_tag) {
        $this->nom_tag = $nom_tag;
    }

    public function getId(){
        return $this->ID_tag;
    }

    public function getName(){
        return $this->nom_tag;
    }

    public function setId($ID_tag){
        $this->ID_tag = $ID_tag;
    }

    public function setName($nom_tag){
        $this->nom_tag = $nom_tag;
    }
}

?>
