<?php

include_once '/../model/PGSqlDAO.php';
include_once '/../model/PasswordHasher.php';
include_once '/../model/entities/Account.php';

$areAllParametersSent = isset($_POST['user-name']) && isset($_POST['password']);

if($areAllParametersSent){
    $username = $_POST['user-name'];
    $password = $_POST['password'];
    $instance = PGsqlDAO::getInstance();
    $account = new Account();
    $account->setUsername($username);
    $result = $instance->findEntitiesByValues($account);
    if($result != null){
        $hash = $result[0]['hashed_password'];
        $loginSuccessful = PasswordHasher::verify($password,$hash);
        if($loginSuccessful){
            $_SESSION['loggedAccountId'] = $result[0]['id'];
            $_SESSION['loggedAccountLastActive'] =  getdate();
            echo "ok";
        }else{
            echo "bad";
        }
    }else{
        echo "username does not exist.";
    }

}else{
    echo "missing parameters.";
}