<?php
require_once('../../services/interface/interfaceCategory.php');
require_once('../../services/implementation/serviceCategory.php');


$countCategory = new  serviceCategory();

$countCategoryData = $countCategory->countCategory();


?>