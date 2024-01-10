<?php

interface InterfaceTag{
    
    public function createTag($nom_tag);
    public function getTagById($id);
    public function updateTag($id, $nom_tag);
}
?>