<?php
include_once '../model/entities/Spot.php';
include_once '../model/PGsqlDAO.php';

$spotName = $_POST['spot-name'];
$spotDesc = $_POST['spot-description'];
$spotTips = $_POST['spot-tips'];
$lng = $_POST['lng'];
$lat = $_POST['lat'];

$instance = PGsqlDAO::getInstance();
$spot = new Spot();
$spot->setName($spotName);
$spot->setTips($spotTips);
$spot->setDescription($spotDesc);
$spot->setCoordinates($lng,$lat);
$spot->setCreatorId(22222);
$result = $instance->insertNewEntity($spot);
print_r($result);

/*
$user = new User();
$user->setFirstName("ittai");
$users = $instance->findEntitiesByValues($user);
print_r($users);
*/
?>