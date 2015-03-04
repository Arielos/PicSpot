<?php
include_once '../model/entities/Category.php';
include_once '../model/PGsqlDAO.php';

header("content-type:application/json");

$category = new Category();
if(isset($_POST['id'])){
    $category->setId($_POST['id']);
}
if(isset($_POST['name'])){
    $category->setName($_POST['name']);
}

$instance = PGsqlDAO::getInstance();
$result = $instance->findEntitiesByValues($category);
echo json_encode($result);
exit();