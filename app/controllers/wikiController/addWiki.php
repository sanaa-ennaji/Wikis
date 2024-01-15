<?php
session_start();

require_once(__DIR__. '../../../models/wikis.php');
require_once(__DIR__.'../../../models/tags.php');
require_once(__DIR__.'../../../Services/interface/interfaceWiki.php');
require_once(__DIR__.'../../../Services/implementation/serviceWiki.php');
require_once(__DIR__.'../../../Services/interface/interfaceTag.php');
require_once(__DIR__.'../../../Services/implementation/serviceWiki.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $summarize = $_POST['sammurize'];
    $content = $_POST['content'];
    $idCategory = $_POST['idCategory'];
     $idUser = $_SESSION['idUser'];
    $tagIds = isset($_POST['selectedTags']) ? $_POST['selectedTags'] : [];
    
    $nomImage = $_FILES['pictureWiki']['name'];
    $tmpImage = $_FILES['pictureWiki']['tmp_name'];
    $path = "../../../public/img/";
    
    $pictureWiki = $path .  $nomImage ;

    $result = move_uploaded_file($tmpImage , $pictureWiki);
    $path = "../../../public/img/";
    
    $pictureWiki = $path .  $nomImage ;

    // ===============================image end========================

    try {
        $wiki = new Wiki($title, $content, $summarize, date('Y-m-d H:i:s'), date('Y-m-d H:i:s'),$pictureWiki, $idCategory, $idUser);
       ;
        // Insérer le wiki avec ses tags
        $wikiService = new serviceWiki();
        $wikiService->addWiki($wiki, $tagIds);
        header('location: ../../views/visitor/wikis.php');

    } catch (PDOException $e) {
        die($e->getMessage());
    }
}
?>