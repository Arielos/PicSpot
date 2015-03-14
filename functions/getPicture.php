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

if(isset($_POST['category_id'])){
    $picture->setCategoryId($_POST['category_id']);
}

$limit = isset($_POST['limit']) ? $_POST['limit'] : 1;
$offset = isset($_POST['offset']) ? $_POST['offset'] : 0;
$instance = PGsqlDAO::getInstance();
$result = $instance->findEntitiesByValues($picture,$offset,$limit);
echo json_encode($result);
exit();