<?php
include_once '../model/entities/Spot.php';
include_once '../model/PGsqlDAO.php';

header("content-type:text/json");

$spot = new Spot();
if($_POST['spot-id'] != null){
    $spot->setId($_POST['spot-id']);
}

$instance = PGsqlDAO::getInstance();
$result = $instance->findEntitiesByValues($spot);
echo json_encode($result);
exit();