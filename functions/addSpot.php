<?php
include_once '../model/entities/Spot.php';
include_once '../model/PGsqlDAO.php';

//header("content-type:text/json");

$spotName = $_POST['spot-name'];
$spotDesc = $_POST['spot-description'];
$spotTips = $_POST['spot-tips'];
$lng = $_POST['spot-lng'];
$lat = $_POST['spot-lat'];

$instance = PGsqlDAO::getInstance();
$spot = new Spot();
$spot->setName($spotName);
$spot->setTips($spotTips);
$spot->setDescription($spotDesc);
$spot->setLongitude($lng);
$spot->setLatitude($lat);
$spot->setCreatorId(22222);
try{
    $result = $instance->insertNewEntity($spot);
    echo "ok";
}catch(Exception $e){
    echo $e->getMessage();
}
?>