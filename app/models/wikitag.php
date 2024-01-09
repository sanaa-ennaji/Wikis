<?php

class WikiTag {
    private $id_wiki;
    private $id_tag;

    public function __construct($id_wiki, $id_tag) {
        $this->id_wiki = $id_wiki;
        $this->id_tag = $id_tag;
    }

    public function getIdWiki(){
        return $this->id_wiki;
    }

    public function getIdTag(){
        return $this->id_tag;
    }

    public function setIdWiki($id_wiki){
        $this->id_wiki = $id_wiki;
    }

    public function setIdTag($id_tag){
        $this->id_tag = $id_tag;
    }
}

?>
