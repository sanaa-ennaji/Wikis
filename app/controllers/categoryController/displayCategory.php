<?php

// require_once('../../models/category.php');
require_once('../../services/interface/interfaceCategory.php');
require_once('../../services/implementation/serviceCategory.php');

$displayCategory = new serviceCategory ();

$categoryData = $displayCategory->displayCategory();


?>