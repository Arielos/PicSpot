<?php
include_once 'model/PGsqlDAO.php';

$instance = PGsqlDAO::getInstance();

/* NOTICE :
   TESTING DB (on heroku) calculates dist(,,,) wrongfully (returns eucleadean distance) and accepts a degree as radius.
   PRODUCTION DB (on openshift) calculates dist(,,,) as it should be calculated and accepts meters as radius.
   This example works on the TESTING DB. */
$result = $instance->findSpotsByRadius(34.6,32,0.25);

foreach($result as $record){
    foreach($record as $key=>$value){
        echo $key." = ".$value.", ";
    }
    echo "<br>";
}