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

$instance = PGsqlDAO::getInstance();
$result = $instance->findEntitiesByValues($tag);
echo json_encode($result);
exit();