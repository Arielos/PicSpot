<?php
include_once '../model/entities/Comment.php';
include_once '../model/PGsqlDAO.php';

header("content-type:application/json");
$comment = new Comment();
if(isset($_POST['id'])){
    $comment->setId($_POST['id']);
}

if(isset($_POST['commenter_id'])){
    $comment->setCommenterId($_POST['commenter_id']);
}

if(isset($_POST['spot_id'])){
    $comment->setSpotId($_POST['spot_id']);
}

$limit = isset($_POST['limit']) ? $_POST['limit'] : 1;
$offset = isset($_POST['offset']) ? $_POST['offset'] : 0;
$instance = PGsqlDAO::getInstance();
$result = $instance->findEntitiesByValues($comment,$offset,$limit);
echo json_encode($result);
exit();