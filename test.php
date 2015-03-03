<?php
include_once 'model/entities/Spot.php';
include_once 'model/PGsqlDAO.php';


// *************************************
// Hi! This test prints all spots in DB!
// *************************************

$instance = PGsqlDAO::getInstance();

$spot = new Spot();
$spot->setId("");
$spots = $instance->findEntitiesByValues($spot);
foreach($spots as $curr){
    print_r($curr);
    echo "<br>";
}