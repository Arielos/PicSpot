<?php
include_once '../model/entities/Spot.php';
include_once '../model/PGsqlDAO.php';

if(isset($_POST['spot-name']) &&
    isset($_POST['spot-description']) &&
    isset($_POST['spot-tips']) &&
    isset($_POST['spot-lng']) &&
    isset($_POST['spot-lat'])){

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

    try {
        $result = $instance->insertNewEntity($spot);
        echo "ok";
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
else{
    echo "missing parameters";
}