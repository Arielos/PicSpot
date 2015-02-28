<?php
	require 'PGsqlDAO.php';
	$coordinates = $_GET["lng"].",".$_GET["lat"];
	
	echo $coordinates;
	
	$instance = PGsqlDAO::getInstance();
	$instance->insert("spot", array(
				'coordinates'=> $coordinates,
				'name'=>"someplace",
				'description'=>"lorem ipsom",
				'tips'=>"lorem ipsom",
				'creator_id'=>3));
?>