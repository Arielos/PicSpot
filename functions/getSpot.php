<?php
include_once '../model/entities/Spot.php';
include_once '../model/PGsqlDAO.php';

header("content-type:application/json");
$spot = new Spot();
if(isset($_POST['id'])){
    $spot->setId($_POST['id']);
}

if(isset($_POST['creator_id'])){
    $spot->setCreatorId($_POST['creator_id']);
}

if(isset($_POST['category_id'])){
    $spot->setCategoryId($_POST['category_id']);
}

$limit = isset($_POST['limit']) ? $_POST['limit'] : 1;
$offset = isset($_POST['offset']) ? $_POST['offset'] : 0;
$instance = PGsqlDAO::getInstance();
$result = $instance->findEntitiesByValues($spot,$offset,$limit);
echo json_encode($result);
exit();