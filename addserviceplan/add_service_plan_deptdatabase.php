<html>
<head>
<title>Add service plan</title>
</head>
<?php

$dbHost = "silo.cs.indiana.edu";
$dbUserAndName = "b651_f09_36";
$dbPass = "manu1004";
	$db_name = "b651_f09_36";

	$db = mysql_connect($dbHost,$dbUserAndName,$dbPass);

	if (!$db){
	  die('Could not connect: ' . mysql_error());
	}
	else{
		mysql_select_db($db_name) or DIE("Database name not available !!");
	}	

    $insert_stmt="INSERT INTO serviceplan 
    (`plan_id`, 
    `plan_name`, 
    `plan_amt`, 
    `max_dvd`, 
    `rent_period`,  
    `is_active`, 
    `description`)
	VALUES 
	
	(	123,
		'$_POST[plan_name]',
		'$_POST[plan_amt]',
		'$_POST[max_dvd]',
		'$_POST[rent_period]', 
		'$_POST[is_active]', 
		'$_POST[description]'
	)";

	$insert_query = mysql_query($insert_stmt,$db);
	$rowcount = mysql_affected_rows();
	if ($rowcount == 1){
		$_SESSION['email'] = $_POST['email'];
		header("Location: homepage.php");
	}
	else{		
		echo $insert_stmt;
	}
	mysql_close($db);
?>


</html>
