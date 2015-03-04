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

$instance = PGsqlDAO::getInstance();
$result = $instance->findEntitiesByValues($spot);
echo json_encode($result);
exit();