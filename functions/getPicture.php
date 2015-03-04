<?php
include_once '../model/entities/Picture.php';
include_once '../model/PGsqlDAO.php';

header("content-type:application/json");

$picture = new Picture();
if(isset($_POST['id'])){
    $picture->setId($_POST['id']);
}
if(isset($_POST['spot_id'])){
    $picture->setSpotId($_POST['spot_id']);
}
if(isset($_POST['uploader_id'])){
    $picture->setUploaderId($_POST['uploader_id']);
}

$instance = PGsqlDAO::getInstance();
$result = $instance->findEntitiesByValues($picture);
echo json_encode($result);
exit();