<?php
include_once '../model/entities/Account.php';
include_once '../model/PGsqlDAO.php';

if(isset($_POST['account-username']) &&
    isset($_POST['account-firstname']) &&
    isset($_POST['account-lastname']) &&
    isset($_POST['account-password']) &&
    isset($_POST['account-emailaddress'])){

    $username = $_POST['account-username'];
    $first_name = $_POST['account-firstname'];
    $last_name = $_POST['account-lastname'];
    $password= $_POST['account-password'];
    $email_address= $_POST['account-emailaddress'];

    $instance = PGsqlDAO::getInstance();
    $account = new Account();
    $account->setUsername($username);
    $account->setFirstName($first_name);
    $account->setLastName($last_name);
    $account->setHashedPassword(PasswordHasher::hash($password));
    $account->setEmailAddress($email_address);

    try{
        $result = $instance->insertNewEntity($spot);
        echo "ok";
    }catch(Exception $e){
        echo $e->getMessage();
    }
}
else{
    echo "missing parameters";
}