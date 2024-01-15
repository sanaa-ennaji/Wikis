<?php
require_once('../../services/interface/interfaceCategory.php');
require_once('../../services/implementation/serviceCategory.php');


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $idCategory = $_POST['idCategory'];
    $nameCategory= $_POST['nameCategory'];
    $description = $_POST['description'];
    $nomImage = $_FILES['pictureCategory']['name'];
    $tmpImage = $_FILES['pictureCategory']['tmp_name'];
    
    // path for insert into base de donnes
    $path = "../../../public/uploads/";
    
    $pictureCategory = $path .  $nomImage ;
    
    //for checking if the image was uploaded
    $result = move_uploaded_file($tmpImage , $pictureCategory);

    // path for affichage
    $path = "../../../../public/uploads/";
    
    $pictureCategory = $path .  $nomImage ;

    try{
        
    $Category = new Category($nameCategory,$description,$pictureCategory);
    $Category->setIdCategory($idCategory);
    
    $serviceCategory = new serviceCategory();
    $serviceCategory->updateCategory($Category);
    
    header('location:../../views/admin/Category.php');
    
    }catch(PDOException $e){
        
        die($e->getMessage());
    }
    
}

?>