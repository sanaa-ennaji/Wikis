<?php

require_once(__DIR__. '/../../Services/Interface/WikiInterface.php');
require_once(__DIR__. '/../../Services/Implimentation/WikiImp.php');


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