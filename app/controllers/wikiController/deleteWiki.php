<?php

require_once(__DIR__. '/../../Services/interface/interfaceWiki.php');
require_once(__DIR__.'../../../Services/implementation/serviceWiki.php');

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $idWiki = $_GET['idWiki'];
    
    $deleteWiki = new serviceWiki();
    $result = $deleteWiki->deleteWiki($idWiki);

    if($result){
        header('location: ../../Views/author/wiki/displayWiki.php');
    }else{
        echo "<script> alert('Data not delete');</script>";
    }
}

?>