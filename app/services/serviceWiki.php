<?php
require_once '../models/Database.php';
require_once '../models/Wiki.php';
require_once 'InterfaceWiki.php';

class ServiceWiki implements InterfaceWiki {
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection(); 
    }

    public function createWiki($titre, $contenu, $image_url, $id_auteur, $id_categorie) {
        try {
            $stmt = $this->db->prepare("INSERT INTO wikis (titre, contenu, image_url, id_auteur, id_categorie) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$titre, $contenu, $image_url, $id_auteur, $id_categorie]);

            return $this->getWikiById($this->db->lastInsertId());
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getWikiById($id) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM wikis WHERE id_wiki = ?");
            $stmt->execute([$id]);

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function updateWiki($id, $titre, $contenu, $image_url, $id_auteur, $id_categorie) {
        try {
            $stmt = $this->db->prepare("UPDATE wikis SET titre = ?, contenu = ?, image_url = ?, id_auteur = ?, id_categorie = ? WHERE id_wiki = ?");
            $stmt->execute([$titre, $contenu, $image_url, $id_auteur, $id_categorie, $id]);

            return $this->getWikiById($id); 
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function deleteWiki($id) {
        try {
            $stmt = $this->db->prepare("DELETE FROM wikis WHERE id_wiki = ?");
            $stmt->execute([$id]);

            return true;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAllWikis() {
        try {
            $stmt = $this->db->prepare("SELECT * FROM wikis");
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
?>
