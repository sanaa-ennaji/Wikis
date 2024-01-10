<?php

interface InterfaceWiki{
    public function createWiki($titre, $contenu, $image_url, $id_auteur, $id_categorie);
    public function getWikiById($id);
    public function updateWiki($id, $titre, $contenu, $image_url, $id_auteur, $id_categorie);
    public function deleteWiki($id);
    public function getAllWikis();
}

?>
