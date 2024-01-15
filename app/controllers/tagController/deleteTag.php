<?php


require_once('../../services/interface/interfaceTag.php');
require_once('../../services/implementation/serviceTag.php');

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $idTag = $_GET['idTag'];
    
    $deleteTag= new $serviceTag();
    $result = $deleteTag->deleteTag($idTag);

    if($result){
        header('location:../../Views/adminDashboard/tag/displayTag.php');
    }else{
        echo "<script> alert('Data not delete');</script>";
    }
}