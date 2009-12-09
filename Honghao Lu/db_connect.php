<?php
	DEFINE('DB_USER', 'hong'); 
	
	DEFINE('DB_PASSWORD', '1234');
	
	DEFINE('DB_HOST', 'localhost');
	
	DEFINE('DB_NAME', 'RentIT');
	
	$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Connection Failed.' . mysqli_connect_error());
		
?>