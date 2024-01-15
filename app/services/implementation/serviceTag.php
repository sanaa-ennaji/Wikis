<?php
require_once(__DIR__.'/../../models/Database.php');
require_once(__DIR__.'/../../models/Tags.php');
require_once(dirname(dirname(__FILE__)) .'/interface/interfaceTag.php');

class ServiceTag  implements interfaceTag{
    
    private $db;
    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }
    
    
    public function addTag(Tag $tag){
        $pdo = $this->db;
        
      
        $nameTag = $tag->getNameTag();
        
        $sql = "INSERT INTO tag (nameTag) VALUES (:nameTag);";
        
        $stmt = $pdo->prepare($sql);
        
        $stmt->bindParam(':nameTag',$nameTag);

        $stmt->execute();
    }
    public function displayTag(){
        $pdo = $this->db;

        $sql = "SELECT * FROM tag";
        
        $data = $pdo->query($sql);
        $tagData = $data->fetchAll(PDO::FETCH_ASSOC);

        return  $tagData;
        
    }
    public function updateTag(Tag $tag){
        $pdo = $this->db;
        
        $idTag = $tag->getIdTag();
        $nameTag = $tag->getNameTag();
      

        $sql = "UPDATE tag SET nameTag = :nameTag   WHERE idTag = :idTag";
        
        $stmt = $pdo->prepare($sql);
        
        $stmt->bindParam(':idTag',$idTag);
        $stmt->bindParam(':nameTag',$nameTag);

        $stmt->execute();
        
    }
    public function deleteTag($id){
        $pdo = $this->db;
       
        $sql = "DELETE FROM tag WHERE idTag = :id";
       
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id',$id);
       
        $DeletTag= $stmt->execute();
        return  $DeletTag;
    }
    public function fetchTag($id){
        $pdo = $this->db;

        $sql = "SELECT * FROM tag WHERE idTag = :id";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id',$id);
        
        $stmt->execute();
        $fetchTag = $stmt->fetch(PDO::FETCH_ASSOC);

        return  $fetchTag;
    }

    public function countTag(){
        $pdo = $this->db;

        $sql = "SELECT count(*) AS count FROM tag";
        
        $data = $pdo->query($sql);
        $countTag = $data->fetch(PDO::FETCH_ASSOC);

        return  $countTag;
    }
}



?>
