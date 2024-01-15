<?php 
interface InterfaceTag
{
public function addTag(Tag $tag);
public function displayTag();
public function updateTag(Tag $tag);
public function deleteTag($id);
public function fetchTag($id);
public function countTag();
}
?>