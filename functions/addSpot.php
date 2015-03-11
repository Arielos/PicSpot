<?php
include_once '../model/entities/Spot.php';
include_once '../model/PGsqlDAO.php';

// Checks if all required parameters were sent.
$areAllParametersSent = (
    isset($_POST['spot-name']) &&
    isset($_POST['spot-description']) &&
    isset($_POST['spot-tips']) &&
    isset($_POST['spot-lng']) &&
    isset($_POST['spot-lat']) &&
    isset($_POST['category-id']));

if($isAdditionGoodToGo)
{
    $spotName = $_POST['spot-name'];
    $spotDesc = $_POST['spot-description'];
    $spotTips = $_POST['spot-tips'];
    $lng = $_POST['spot-lng'];
    $lat = $_POST['spot-lat'];
    $creator_id = 22222;    // Should be received by session parameter. $_SESSION['user-id'];
    $category_id = $_POST['category-id'];

    $instance = PGsqlDAO::getInstance();

    // Checks if the creator exists.
    $user = new User();
    $user->setId($creator_id);
    $doesCreatorExist = !empty($instance->findEntitiesByValues($user));
    // Checks if the category exists.
    $category = new Category();
    $category->setId($category_id);
    $doesCategoryExist = !empty($instance->findEntitiesByValues($category));

    if(!$doesCreatorExist){
        echo "Creator id does not exist.";
    }
    else if(!$doesCategoryExist){
        echo "Category id does not exist.";
    }
    else {
        $spot = new Spot();
        $spot->setName($spotName);
        $spot->setTips($spotTips);
        $spot->setDescription($spotDesc);
        $spot->setLongitude($lng);
        $spot->setLatitude($lat);
        $spot->setCreatorId($creator_id);
        $spot->setCategoryId($category_id);

        try {
            $result = $instance->insertNewEntity($spot);
            echo "ok";
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
else{
    echo "missing parameters";
}