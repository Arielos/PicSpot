<?php
include_once 'model/entities/Spot.php';
include_once 'model/entities/Account.php';
include_once 'model/PGsqlDAO.php';
include_once 'model/PasswordHasher.php';

// *************************************
// Hi! This test prints all spots in DB!
// *************************************

$instance = PGsqlDAO::getInstance();

$spot = new Spot();
//$spot->setCreatorId(22222);
//$spot->setName("NewSpot002");


$spots = $instance->findEntitiesByValues($spot,0,100);
if($spots == null){
    echo "empty";
}else{
    foreach($spots as $curr) {
        print_r($curr);
        echo "<br>";
    }
}
/*
$spot_old = new Spot();
$spot->setName("");
$spot->setDescription("");
echo $instance->updateExistingEntity($spot,$spot_old);
*//*
$account = new Account();
$account->setId(22222);
$account->setFirstName("Ittai");
$account->setLastName("Yam");
$account->setUsername("Ocean1");
$account->setEmailAddress("i@y.com");
$account->setHashedPassword(PasswordHasher::hash("rienderien"));
echo "<P>".$instance->insertNewEntity($account);
*/

$account = new Account();
print_r($instance->findEntitiesByValues($account));