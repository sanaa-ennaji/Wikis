<?php
session_start();

require_once(__DIR__. '../../../models/wikis.php');
require_once(__DIR__.'../../../models/tags.php');
require_once(__DIR__.'../../../Services/interface/interfaceWiki.php');
require_once(__DIR__.'../../../Services/implementation/serviceWiki.php');
require_once(__DIR__.'../../../Services/interface/interfaceTag.php');
require_once(__DIR__.'../../../Services/implementation/serviceWiki.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Récupérer les données du formulaire
    $title = $_POST['title'];
    $summarize = $_POST['sammurize'];
    $content = $_POST['content'];
    $idCategory = $_POST['idCategory'];
    // session for user Id
     $idUser = $_SESSION['idUser'];


     
    // Récupérer les tags sélectionnés
    $tagIds = isset($_POST['selectedTags']) ? $_POST['selectedTags'] : [];
    
// ==============================images ===================
    // Récupérer l'image téléchargée
    $nomImage = $_FILES['pictureWiki']['name'];
    $tmpImage = $_FILES['pictureWiki']['tmp_name'];
    
    // path for insert into base de donnes
    $path = "../../../public/img/";
    
    $pictureWiki = $path .  $nomImage ;
    
    //for checking if the image was uploaded
    $result = move_uploaded_file($tmpImage , $pictureWiki);

    // path for affichage
    $path = "../../../../public/img/";
    
    $pictureWiki = $path .  $nomImage ;

    // ===============================image end========================

    try {
        // Créer une instance de Wiki avec les données du formulaire
        $wiki = new Wiki($title, $content, $summarize, date('Y-m-d H:i:s'), date('Y-m-d H:i:s'),$pictureWiki, $idCategory, $idUser);
       ;
        // Insérer le wiki avec ses tags
        $wikiService = new serviceWiki();
        $wikiService->addWiki($wiki, $tagIds);
        
      

        // Rediriger vers la page appropriée
        header('location: ../../views/author/wiki.php');

    } catch (PDOException $e) {
        die($e->getMessage());
    }
}
?>