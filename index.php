<?php
 echo phpversion();
	$dbname ='dc1672b9586skj'; //Name of the database
	$dbuser ='cjpuplxhiyanhv'; //Username for the db
	$dbpass ='3190Aj5LPHYNDkhedIgjoAQF29'; //Password for the db
	$dbserver ='ec2-23-21-231-14.compute-1.amazonaws.com'; //Name of the mysql server
	$dbcnx = pg_connect("host=ec2-23-21-231-14.compute-1.amazonaws.com port=5432 dbname=dc1672b9586skj user=cjpuplxhiyanhv password=3190Aj5LPHYNDkhedIgjoAQF29");
	//mysql_select_db("$dbname") or die(mysql_error());
?>
