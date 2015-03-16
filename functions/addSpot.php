<?php
include_once '../model/entities/Spot.php';
include_once '../model/entities/Account.php';
include_once '../model/entities/Category.php';
include_once '../model/PGsqlDAO.php';

// Checks if all required parameters were sent.
$areAllParametersSent = (
    isset($_POST['spot-name']) &&
    isset($_POST['spot-description']) &&
    isset($_POST['spot-tips']) &&
    isset($_POST['spot-lng']) &&
    isset($_POST['spot-lat']));

if($areAllParametersSent)
{
    $spotName = $_POST['spot-name'];
    $spotDesc = $_POST['spot-description'];
    $spotTips = $_POST['spot-tips'];
    $lng = $_POST['spot-lng'];
    $lat = $_POST['spot-lat'];
    $creator_id = "22222";    // Should be received by session parameter. $_SESSION['logged-account-id'];

    $instance = PGsqlDAO::getInstance();

    // Checks if the creator exists.
    $account = new Account();
    $account->setId($creator_id);
    $doesCreatorExist = $instance->findEntitiesByValues($account) != null;

    if(!$doesCreatorExist){
        echo "Creator does not exist.";
    }
    else {
        $spot = new Spot();
        $spot->setName($spotName);
        $spot->setTips($spotTips);
        $spot->setDescription($spotDesc);
        $spot->setLongitude($lng);
        $spot->setLatitude($lat);
        $spot->setCreatorId($creator_id);

        try {
            $result = $instance->insertNewEntity($spot);
            $result = $instance->findEntitiesByValues($spot);
            echo $result[0]['id'];
        } catch (Exception $e) {
            echo "failure";
        }
    }
}
else{
    echo "missing parameters";
}