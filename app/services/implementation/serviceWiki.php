<?php
require_once(__DIR__.'/../../models/Database.php');
require_once '../../models/wikis.php';
require_once(dirname(dirname(__FILE__)) .'/interface/interfaceWiki.php');


class ServiceWiki  implements  InterfaceWiki{
    private $db;
    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection(); 
    }

    public function addWiki(Wiki $wiki,array $tagIds){
        $pdo = $this->db ;

        $title = $wiki->getTitle();
        $content = $wiki->getContent();
        $summarize = $wiki->getSummarize();
        $dateCreated = $wiki->getDateCreated();
        $dateModified = $wiki->getDateModified();
        
        $pictureWiki = $wiki->getPictureWiki();
        $idCategory = $wiki->getIdCategory();
        $idUser = $wiki->getIdUser();

        $sql = "INSERT INTO wiki (title, content, summarize, dateCreated, dateModified, archived, pictureWiki, idCategory, idUser) 
                VALUES (:title, :content, :summarize, :dateCreated, :dateModified, '0', :pictureWiki, :idCategory, :idUser);";

        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':summarize', $summarize);
        $stmt->bindParam(':dateCreated', $dateCreated);
        $stmt->bindParam(':dateModified', $dateModified);
       
        $stmt->bindParam(':pictureWiki', $pictureWiki);
        $stmt->bindParam(':idCategory', $idCategory);
        $stmt->bindParam(':idUser', $idUser);

        $stmt->execute();

        // Get the ID of the inserted wiki
      $wikiId = $pdo->lastInsertId();
     
    // Insert into 'tagOfWiki' table for each tag
       foreach ($tagIds as $tagId) {
        $sqlTagOfWiki = "INSERT INTO tagofwiki (idTag, idWiki) VALUES (:idTag, :idWiki);";
        $stmtTagOfWiki = $pdo->prepare($sqlTagOfWiki);
        $stmtTagOfWiki->bindParam(':idWiki', $wikiId);
        $stmtTagOfWiki->bindParam(':idTag', $tagId);
        
        $stmtTagOfWiki->execute();
    }
    
    }
    public function displayWiki(){
        $pdo = $this->db ;

        $sql = "SELECT * FROM wiki WHERE archived = '0' ";
        
        $data = $pdo->query($sql);
        $wikiData = $data->fetchAll(PDO::FETCH_ASSOC);

        return  $wikiData;
    }
    public function updateWiki(Wiki $wiki, array $tagIds)
    {
        $pdo = $this->db ;
    
        $idWiki = $wiki->getIdWiki();
        $title = $wiki->getTitle();
        $content = $wiki->getContent();
        $summarize = $wiki->getSummarize();
        $dateCreated = $wiki->getDateCreated();
        $dateModified = $wiki->getDateModified();
        $pictureWiki = $wiki->getPictureWiki();
        $idCategory = $wiki->getIdCategory();
        $idUser = $wiki->getIdUser();
    
        // Mettez à jour les informations principales du wiki
        $sqlUpdateWiki = "UPDATE wiki SET title = :title,  content = :content, summarize = :summarize, dateCreated = :dateCreated , dateModified = :dateModified, archived = '0',  pictureWiki = :pictureWiki, 
                              idCategory = :idCategory,  idUser = :idUser WHERE idWiki = :idWiki";

        $stmtUpdateWiki = $pdo->prepare($sqlUpdateWiki);
    
        $stmtUpdateWiki->bindParam(':title', $title);
        $stmtUpdateWiki->bindParam(':content', $content);
        $stmtUpdateWiki->bindParam(':summarize', $summarize);
        $stmtUpdateWiki->bindParam(':dateCreated', $dateCreated);
        $stmtUpdateWiki->bindParam(':dateModified', $dateModified);
        $stmtUpdateWiki->bindParam(':pictureWiki', $pictureWiki);
        $stmtUpdateWiki->bindParam(':idCategory', $idCategory);
        $stmtUpdateWiki->bindParam(':idUser', $idUser);
        $stmtUpdateWiki->bindParam(':idWiki', $idWiki);
    
        $stmtUpdateWiki->execute();
    
        // Supprimer tous les tags associés à ce wiki
        $sqlDeleteTags = "DELETE FROM tagofwiki WHERE idWiki = :idWiki";
        $stmtDeleteTags = $pdo->prepare($sqlDeleteTags);
        $stmtDeleteTags->bindParam(':idWiki', $idWiki);
        $stmtDeleteTags->execute();
    
        // Réinsérer les tags mis à jour
        foreach ($tagIds as $tagId) {
            $sqlTagOfWiki = "INSERT INTO tagofwiki (idTag, idWiki) VALUES (:idTag, :idWiki)";
            $stmtTagOfWiki = $pdo->prepare($sqlTagOfWiki);
            $stmtTagOfWiki->bindParam(':idWiki', $idWiki);
            $stmtTagOfWiki->bindParam(':idTag', $tagId);
    
            $stmtTagOfWiki->execute();
        }
    }
    
    public function deleteWiki($id){
        $pdo = $this->db ;
       
        $sql = "DELETE FROM wiki WHERE idWiki = :id";
       
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id',$id);
       
        $DeletWiki= $stmt->execute();
        return  $DeletWiki;
    }
    public function fetchWiki($id){
        $pdo = $this->db ;

        $sql = "SELECT * FROM wiki WHERE idUser = :id";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id',$id);
        
        $stmt->execute();
        $fetchWiki = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return  $fetchWiki;
    }

// ============================display admin and archived ====================
    public function ArchivedWiki($id){
        $pdo = $this->db ;

        $sql = "UPDATE `wiki` SET archived= 1  WHERE idWiki = :id";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id',$id);
        
        $result = $stmt->execute();
        return $result;
    }

    public function dispalyNonArchivedWiki(){
        $pdo = $this->db ;

        $sql = "SELECT * FROM wiki WHERE archived = '0' ";
        
        $data = $pdo->query($sql);
        $wikiAdminData = $data->fetchAll(PDO::FETCH_ASSOC);

        return  $wikiAdminData;
    }

    // ============================display archive admin and Nonarchived ====================
    public function NonArchivedWiki($id){
        $pdo = $this->db ;

        $sql = "UPDATE `wiki` SET archived = '0'  WHERE idWiki = :id";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id',$id);

        $result = $stmt->execute();
        return $result;
    }

    public function dispalyArchivedWiki(){
        $pdo = $this->db ;

        $sql = "SELECT * FROM wiki WHERE archived = '1'";
        
        $data = $pdo->query($sql);
        $wikiNonAdminData = $data->fetchAll(PDO::FETCH_ASSOC);

        return  $wikiNonAdminData;
    }


    public function displayLastWiki(){
        $pdo = $this->db ;

        $sql = "SELECT * FROM wiki ORDER BY dateCreated DESC LIMIT 3";
        
        $data = $pdo->query($sql);
        $wikidisplayLast = $data->fetchAll(PDO::FETCH_ASSOC);

        return  $wikidisplayLast;
    }


    public function fetchWikiId($idWiki){
        $pdo = $this->db ;
        $sql = "SELECT * FROM wiki WHERE idWiki = :idWiki ";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':idWiki',$idWiki);
        
        $stmt->execute();
        $fetchWiki = $stmt->fetch(PDO::FETCH_ASSOC);

        return  $fetchWiki;
    }

    public function fetchWikiCategory($idCategory){
        $pdo = $this->db ;

        $sql = "SELECT * FROM wiki WHERE idCategory = :idCategory ";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':idCategory',$idCategory);
        
        $stmt->execute();
        $fetchWikiCategory = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return  $fetchWikiCategory;
    }

    public function countWiki(){
        $pdo = $this->db ;

        $sql = "SELECT count(*) AS count FROM wiki";
        
        $data = $pdo->query($sql);
        $countWiki = $data->fetch(PDO::FETCH_ASSOC);

        return  $countWiki;
    }
}
