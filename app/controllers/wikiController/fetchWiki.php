<?php

require_once(__DIR__. '/../../Services/interface/interfaceWiki.php');
require_once(__DIR__. '/../../Services/implementation/serviceWiki.php');


if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $idWiki = $_GET['idWiki'];
    
    $fetchdWiki = new serviceWiki();
    $WikiDataFetch = $fetchdWiki->fetchWikiId($idWiki);
   
    if(!$WikiDataFetch){
        
        echo "<script> alert('Data not found');</script>";

    }
}
?>