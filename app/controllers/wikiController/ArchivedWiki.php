<?php

require_once(__DIR__. '/../../Services/interface/interfaceWiki.php');
require_once(__DIR__. '/../../Services/Implimentation/serviceWiki.php');


if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $idWiki = $_GET['idWiki'];
    
    $archivedWiki = new serviceWiki();
    $result = $archivedWiki->ArchivedWiki($idWiki);

    if($result){
        header('location:../../Views/admin/wikiad.php');
    }else{
        echo "<script> alert('Data not delete');</script>";
    }
}
?>