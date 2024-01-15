<?php

require_once('../../services/interface/interfaceCategory.php');
require_once('../../services/implementation/serviceCategory.php');


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nameCategory= $_POST['nameCategory'];
    $description = $_POST['description'];
    $nomImage = $_FILES['pictureCategory']['name'];
    $tmpImage = $_FILES['pictureCategory']['tmp_name'];
    
    $path = "../../../../public/img/";
    
    $pictureCategory = $path .  $nomImage ;

    $result = move_uploaded_file($tmpImage , $pictureCategory);

    $path = "../../../../public/img/";
    
    $pictureCategory = $path .  $nomImage ;

    try{
        
    $Category = new Category($nameCategory,$description,$pictureCategory);
    
    $serviceCategory = new serviceCategory();
    $serviceCategory->addCategory($Category);
    
    header('location:../../Views/admin/displayCategory.php');
    
    }catch(PDOException $e){
        
        die($e->getMessage());
    }
    
}
?>