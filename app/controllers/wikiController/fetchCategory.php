<?php

require_once(__DIR__. '/../../Services/interface/interfaceWiki.php');
require_once(__DIR__. '/../../Services/implementation/serviceWiki.php');


if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $idCategory = $_GET['idCategory'];
    
    $fetchdWikiCategory = new serviceWiki();
    $WikiCategoryDataFetch = $fetchdWikiCategory->fetchWikiCategory($idCategory);
   
    if(!$WikiCategoryDataFetch){
        
        echo "<script> alert('Data not found');</script>";

    }
}
?>