<?php
session_start();

require_once(__DIR__. '/../../Services/interface/interfaceWiki.php');
require_once(__DIR__.'../../../Services/implementation/serviceWiki.php');

$displayWiki = new serviceWiki();
$idUser = $_SESSION['idUser'];
$WikiDatas = $displayWiki->fetchWiki($idUser);


?>