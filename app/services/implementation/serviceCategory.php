<?php
require_once '../../models/Database.php';
require_once '../../models/category.php';
require_once(dirname(dirname(__FILE__)) .'/Interface/interfaceCategory.php');


class serviceCategory  implements interfaceCategory{
    private $db;
    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection(); 
    }



    public function addCategory(Category $category){
        $nameCategory = $category->getNameCategory();
        $description = $category->getDescription();
        $pictureCategory = $category->getPictureCategory();
    
        $sql = "INSERT INTO category (nameCategory, description, pictureCategory) VALUES (:nameCategory, :description, :pictureCategory);";
    
        $stmt = $this->db->prepare($sql); 
    
        $stmt->bindParam(':nameCategory', $nameCategory);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':pictureCategory', $pictureCategory);
    
        $stmt->execute();
    }
    
    public function displayCategory(){
        $pdo = $this->db;

        $sql = "SELECT * FROM category";
        
        $data = $pdo->query($sql);
        $categoryData = $data->fetchAll(PDO::FETCH_ASSOC);

        return  $categoryData;
    }

 
    
    public function updateCategory(Category $category){
        $pdo = $this->db;
        
        $idCategory = $category->getIdCategory();
        $nameCategory = $category->getNameCategory();
        $description = $category->getDescription();
        $pictureCategory =$category ->getPictureCategory();
      

        $sql = "UPDATE category SET nameCategory = :nameCategory, description = :description,pictureCategory = :pictureCategory   WHERE idCategory = :idCategory";
        
        $stmt = $pdo->prepare($sql);
        
        $stmt->bindParam(':nameCategory',$nameCategory);
        $stmt->bindParam(':description',$description);
        $stmt->bindParam(':pictureCategory',$pictureCategory);
        $stmt->bindParam(':idCategory',$idCategory);
       

        $stmt->execute();
    }
    public function deleteCategory($id){
        $pdo = $this->db;
       
        $sql = "DELETE FROM category WHERE idCategory = :id";
       
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id',$id);
       
        $DeletCategory= $stmt->execute();
        return  $DeletCategory;
    }

    public function displayLastCategory(){
        $pdo = $this->db;

        $sql = "SELECT * FROM category ORDER BY idCategory DESC LIMIT 4;";
        
        $data = $pdo->query($sql);
        $categoryData = $data->fetchAll(PDO::FETCH_ASSOC);

        return  $categoryData;
    }
    public function fetchCategory($id){
        $pdo = $this->db;

        $sql = "SELECT * FROM category WHERE idCategory = :id";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id',$id);
        
        $stmt->execute();
        $fetchCategory = $stmt->fetch(PDO::FETCH_ASSOC);

        return  $fetchCategory;
    }

    public function countCategory(){
        $pdo = $this->db;

        $sql = "SELECT count(*) AS count FROM category";
        
        $data = $pdo->query($sql);
        $countCategory = $data->fetch(PDO::FETCH_ASSOC);

        return  $countCategory;
    }

    
}






?>