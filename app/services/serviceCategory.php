<?php
require_once '../models/Database.php';
require_once '../models/category.php';
require_once 'InterfaceCategory.php';

class ServiceCategory implements InterfaceCategory {
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function createCategory($nom_categorie) {
        try {
            $stmt = $this->db->prepare("INSERT INTO categories (nom_categorie) VALUES (?)");
            $stmt->execute([$nom_categorie]);

            return $this->getCategoryById($this->db->lastInsertId()); 
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getCategoryById($id) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM categories WHERE id_categorie = ?");
            $stmt->execute([$id]);

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function updateCategory($id, $nom_categorie) {
        try {
            $stmt = $this->db->prepare("UPDATE categories SET nom_categorie = ? WHERE id_categorie = ?");
            $stmt->execute([$nom_categorie, $id]);

            return $this->getCategoryById($id); 
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function deleteCategory($id) {
        try {
            $stmt = $this->db->prepare("DELETE FROM categories WHERE id_categorie = ?");
            $stmt->execute([$id]);

            return true; 
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAllCategories() {
        try {
            $stmt = $this->db->prepare("SELECT * FROM categories");
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
?>
