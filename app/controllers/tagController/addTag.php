<?php

// require_once('../../Models/Tag.php');
require_once('../../services/interface/interfaceTag.php');
require_once('../../services/implementation/serviceTag.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nameTag= $_POST['nameTag'];
   

    try{
        
    $tag = new Tag($nameTag);
    
    $serviceTag = new serviceTag();
    $serviceTag->addTag($tag);
    
    header('location: ../../views/admin/displayTag.php');
    
    }catch(PDOException $e){
        
        die($e->getMessage());
    }
    
}

?>