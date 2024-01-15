<?php


require_once('../../services/interface/interfaceTag.php');
require_once('../../services/implementation/serviceTag.php');

$displayTag = new serviceTag();

$TagDatas = $displayTag->displayTag();

?>