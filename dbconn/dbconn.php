<?php

	$server = "localhost";
	$username = "root";
	$password = "";
	$db_name = "testdb";
	
	$db = mysql_connect($server,$username,$password);
	if (!$db){
	  die('Could not connect: ' . mysql_error());
	}
	else{
		mysql_select_db($db_name) or DIE("Database name not available !!");
	}

?>

