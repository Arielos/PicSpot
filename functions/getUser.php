<?php
include_once '../model/entities/User.php';
include_once '../model/PGsqlDAO.php';

header("content-type:application/json");

$user = new User();
if(isset($_POST['id'])){
    $user->setId($_POST['id']);
}
if(isset($_POST['username'])){
    $user->setUsername($_POST['username']);
}
if(isset($_POST['first_name'])){
    $user->setFirstName($_POST['first_name']);
}
if(isset($_POST['last_name'])){
    $user->setLastName($_POST['last_name']);
}
if(isset($_POST['email_address'])){
    $user->setEmailAddress($_POST['email_address']);
}

$instance = PGsqlDAO::getInstance();
$result = $instance->findEntitiesByValues($user);
echo json_encode($result);
exit();