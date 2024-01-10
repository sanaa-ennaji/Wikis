<?php

interface InterfaceCategory {
    public function createCategory($nom_categorie);
    public function getCategoryById($id);
    public function updateCategory($id, $nom_categorie);
    public function deleteCategory($id);
    public function getAllCategories();
}

?>
