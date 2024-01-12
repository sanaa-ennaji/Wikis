<?php
require_once '../models/Database.php';
require_once '../models/Tag.php';
require_once 'InterfaceTag.php';

class ServiceTag implements InterfaceTag {
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection(); 
    }

    public function createTag($nom_tag) {
        try {
            $stmt = $this->db->prepare("INSERT INTO tags (nom_tag) VALUES (?)");
            $stmt->execute([$nom_tag]);

            return $this->getTagById($this->db->lastInsertId());
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getTagById($id) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM tags WHERE id_tag = ?");
            $stmt->execute([$id]);

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function updateTag($id, $nom_tag) {
        try {
            $stmt = $this->db->prepare("UPDATE tags SET nom_tag = ? WHERE id_tag = ?");
            $stmt->execute([$nom_tag, $id]);

            return $this->getTagById($id); 
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function deleteTag($id) {
        try {
            $stmt = $this->db->prepare("DELETE FROM tags WHERE id_tag = ?");
            $stmt->execute([$id]);

            return true;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAllTags() {
        try {
            $stmt = $this->db->prepare("SELECT * FROM tags");
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
?>
