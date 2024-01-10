<?php

class ServiceCategory implements  InterfaceCategory {
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance(); 
    }

    public function createCategory($nom_categorie) {
        $createCategoryQuery = "INSERT INTO categories (nom_categorie) VALUES (:nom_categorie)";
        $this->db->query($createCategoryQuery);
        $this->db->bind(":nom_categorie", $nom_categorie);

        try {
            $this->db->execute();
            return $this->getCategoryById($nom_categorie); 
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getCategoryById($id) {
        $getCategoryByIdQuery = "SELECT * FROM categories WHERE id_categorie = :id";
        $this->db->query($getCategoryByIdQuery);
        $this->db->bind(":id", $id);

        try {
            return $this->db->single();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function updateCategory($id, $nom_categorie) {
        $updateCategoryQuery = "UPDATE categories SET nom_categorie = :nom_categorie WHERE id_categorie = :id";
        $this->db->query($updateCategoryQuery);
        $this->db->bind(":id", $id);
        $this->db->bind(":nom_categorie", $nom_categorie);

        try {
            $this->db->execute();
            return $this->getCategoryById($id); 
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function deleteCategory($id) {
        $deleteCategoryQuery = "DELETE FROM categories WHERE id_categorie = :id";
        $this->db->query($deleteCategoryQuery);
        $this->db->bind(":id", $id);

        try {
            $this->db->execute();
            return true; 
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAllCategories() {
        $getAllCategoriesQuery = "SELECT * FROM categories";
        $this->db->query($getAllCategoriesQuery);

        try {
            return $this->db->resultSet();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}

?>
