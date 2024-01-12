<?php

class ServiceWiki implements InterfaceWiki {
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance(); 
    }

    public function createWiki($titre, $contenu, $image_url, $id_auteur, $id_categorie) {
        $createWikiQuery = "INSERT INTO wikis (titre, contenu, image_url, id_auteur, id_categorie) VALUES (:titre, :contenu, :image_url, :id_auteur, :id_categorie)";
        $this->db->query($createWikiQuery);
        $this->db->bind(":titre", $titre);
        $this->db->bind(":contenu", $contenu);
        $this->db->bind(":image_url", $image_url);
        $this->db->bind(":id_auteur", $id_auteur);
        $this->db->bind(":id_categorie", $id_categorie);

        try {
            $this->db->execute();
            return $this->getWikiById($this->db->lastInsertId());
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getWikiById($id) {
        $getWikiByIdQuery = "SELECT * FROM wikis WHERE id_wiki = :id";
        $this->db->query($getWikiByIdQuery);
        $this->db->bind(":id", $id);

        try {
            return $this->db->single();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function updateWiki($id, $titre, $contenu, $image_url, $id_auteur, $id_categorie) {
        $updateWikiQuery = "UPDATE wikis SET titre = :titre, contenu = :contenu, image_url = :image_url, id_auteur = :id_auteur, id_categorie = :id_categorie WHERE id_wiki = :id";
        $this->db->query($updateWikiQuery);
        $this->db->bind(":id", $id);
        $this->db->bind(":titre", $titre);
        $this->db->bind(":contenu", $contenu);
        $this->db->bind(":image_url", $image_url);
        $this->db->bind(":id_auteur", $id_auteur);
        $this->db->bind(":id_categorie", $id_categorie);

        try {
            $this->db->execute();
            return $this->getWikiById($id);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function deleteWiki($id) {
        $deleteWikiQuery = "DELETE FROM wikis WHERE id_wiki = :id";
        $this->db->query($deleteWikiQuery);
        $this->db->bind(":id", $id);

        try {
            $this->db->execute();
            return true;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAllWikis() {
        $getAllWikisQuery = "SELECT * FROM wikis";
        $this->db->query($getAllWikisQuery);

        try {
            return $this->db->resultSet();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
?>
