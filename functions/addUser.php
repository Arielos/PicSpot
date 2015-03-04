<?php
include_once '../model/entities/User.php';
include_once '../model/PGsqlDAO.php';

if(isset($_POST['user-username']) &&
    isset($_POST['user-firstname']) &&
    isset($_POST['user-lastname']) &&
    isset($_POST['user-password']) &&
    isset($_POST['user-emailaddress'])){

    $username = $_POST['user-username'];
    $first_name = $_POST['user-firstname'];
    $last_name = $_POST['user-lastname'];
    $password= $_POST['user-password'];
    $email_address= $_POST['user-emailaddress'];

    $options = [
        'cost' => 11,
        'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM)
    ];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT, $options);
    /* REMEMBER : password_hash contains the salt and algorithm that were used so that we can verify the hash later. */

    $instance = PGsqlDAO::getInstance();
    $user = new User();
    $user->setUsername($username);
    $user->setFirstName($first_name);
    $user->setLastName($last_name);
    $user->setHashedPassword($hashed_password);
    $user->setEmailAddress($email_address);

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