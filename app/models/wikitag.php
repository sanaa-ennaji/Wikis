<?php

class TagOfWiki{
    private $idTag;
    private $idWiki;

    public function __construct($idTag,$idWiki){
        $this->idTag = $idTag;
        $this->idWiki = $idWiki;
    }

      // Getter et Setter pour $idTag
      public function getIdTag() {
        return $this->idTag;
    }

    public function setIdTag($idTag) {
        $this->idTag = $idTag;
    }

    // Getter et Setter pour $idWiki
    public function getIdWiki() {
        return $this->idWiki;
    }

    public function setIdWiki($idWiki) {
        $this->idWiki = $idWiki;
    }
}


?>