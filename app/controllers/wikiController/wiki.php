<?php

require_once(__DIR__. '/../../Services/interface/interfaceWiki.php');
require_once(__DIR__.'../../../Services/implementation/serviceWiki.php');

$displayWiki = new ServiceWiki();

$WikiDatas = $displayWiki->dispalyNonArchivedWiki();


?>