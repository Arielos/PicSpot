<?php
include_once '../model/entities/Account.php';
include_once '../model/PGsqlDAO.php';

header("content-type:application/json");
$account = new Account();
if(isset($_POST['id'])){
    $account->setId($_POST['id']);
}

if(isset($_POST['username'])){
    $account->setUsername($_POST['username']);
}

if(isset($_POST['first_name'])){
    $account->setFirstName($_POST['first_name']);
}

if(isset($_POST['last_name'])){
    $account->setLastName($_POST['last_name']);
}

if(isset($_POST['email_address'])){
    $account->setEmailAddress($_POST['email_address']);
}

$limit = isset($_POST['limit']) ? $_POST['limit'] : 1;
$offset = isset($_POST['offset']) ? $_POST['offset'] : 0;
$instance = PGsqlDAO::getInstance();
$result = $instance->findEntitiesByValues($account,$offset,$limit);
echo json_encode($result);
exit();