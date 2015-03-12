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

$limit = isset($_POST['limit']) ? $_POST['limit'] : 1;
$offset = isset($_POST['offset']) ? $_POST['offset'] : 0;
$instance = PGsqlDAO::getInstance();
$result = $instance->findEntitiesByValues($category,$offset,$limit);
echo json_encode($result);
exit();