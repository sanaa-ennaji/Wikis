<?php 
interface InterfaceWiki
{
public function addWiki(Wiki $wiki, array $tagIds);
public function displayWiki();
public function updateWiki(Wiki $wiki, array $tagIds);
public function deleteWiki($id);
public function fetchWiki($id);
public function ArchivedWiki($id);

public function dispalyNonArchivedWiki();
public function NonArchivedWiki($id);
public function dispalyArchivedWiki();
public function displayLastWiki();

public function fetchWikiId($idWiki);
public function fetchWikiCategory($idCategory);

public function countWiki();
}
?>

