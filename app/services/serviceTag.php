<?php

class ServiceTag implements InterfaceTag{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance(); 
    }

    public function createTag($nom_tag) {
        $createTagQuery = "INSERT INTO tags (nom_tag) VALUES (:nom_tag)";
        $this->db->query($createTagQuery);
        $this->db->bind(":nom_tag", $nom_tag);

        try {
            $this->db->execute();
            return $this->getTagById($nom_tag);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getTagById($id) {
        $getTagByIdQuery = "SELECT * FROM tags WHERE id_tag = :id";
        $this->db->query($getTagByIdQuery);
        $this->db->bind(":id", $id);

        try {
            return $this->db->single();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function updateTag($id, $nom_tag) {
        $updateTagQuery = "UPDATE tags SET nom_tag = :nom_tag WHERE id_tag = :id";
        $this->db->query($updateTagQuery);
        $this->db->bind(":id", $id);
        $this->db->bind(":nom_tag", $nom_tag);

        try {
            $this->db->execute();
            return $this->getTagById($id); 
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function deleteTag($id) {
        $deleteTagQuery = "DELETE FROM tags WHERE id_tag = :id";
        $this->db->query($deleteTagQuery);
        $this->db->bind(":id", $id);

        try {
            $this->db->execute();
            return true;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAllTags() {
        $getAllTagsQuery = "SELECT * FROM tags";
        $this->db->query($getAllTagsQuery);

        try {
            return $this->db->resultSet();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}

?>
