<?php 
interface InterfaceCategory
{
    public function addCategory(Category $category);
    public function displayCategory();
    public function updateCategory(Category $category);
    public function deleteCategory($id);
    public function displayLastCategory();
    public function fetchCategory($id);
    public function countCategory();
}
 
?>