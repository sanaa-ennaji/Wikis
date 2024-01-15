<?php


require_once('../../services/interface/interfaceCategory.php');
require_once('../../services/implementation/serviceCategory.php');



if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $idCategory = $_GET['idCategory'];
    
    $deleteCategory = new serviceCategory();
    $result = $deleteCategory->deleteCategory($idCategory);

    if($result){
        header('location:../../views/admin/category/display.php');
    }else{
        echo "<script> alert('Data not delete');</script>";
    }
}





?>