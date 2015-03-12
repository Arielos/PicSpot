<?php
include_once '../model/entities/Tag.php';
include_once '../model/PGsqlDAO.php';

header("content-type:application/json");
$tag = new Tag();
if(isset($_POST['id'])){
    $tag->setId($_POST['id']);
}

if(isset($_POST['name'])){
    $tag->setId($_POST['name']);
}

$limit = isset($_POST['limit']) ? $_POST['limit'] : 1;
$offset = isset($_POST['offset']) ? $_POST['offset'] : 0;
$instance = PGsqlDAO::getInstance();
$result = $instance->findEntitiesByValues($tag,$offset,$limit);
echo json_encode($result);
exit();