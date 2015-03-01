<?php
include_once  'PGsqlDAO.php';
include_once  'Spot.php';
include_once  'User.php';

$lng = $_GET["lng"];
$lat = $_GET["lat"];

$instance = PGsqlDAO::getInstance();
$spot = new Spot();
$spot->setName("Spotee!");
$spot->setTips("tipitipitooop");
$spot->setDescription("descdescdescx");
$spot->setCoordinates($lng,$lat);
$spot->setCreatorId(22222);
$instance->insertNewEntity($spot);

$user = new User();
$user->setFirstName("ittai");
$users = $instance->findEntitiesByValues($user);
print_r($users);

?>