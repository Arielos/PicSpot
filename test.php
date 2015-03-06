<?php
include_once 'model/entities/Spot.php';
include_once 'model/PGsqlDAO.php';


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

$spot_old = new Spot();
$spot->setName("");
$spot->setDescription("");
echo $instance->updateExistingEntity($spot,$spot_old);