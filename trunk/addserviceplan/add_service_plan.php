<html>
<head>
<title>Add service plan</title>
</head>
<?php
	$server = "localhost";
	$username = "root";
	$password = "";
	$db_name = "dvd_rental";

	$db = mysql_connect($server,$username,$password);
	mysql_select_db($db_name, $db);
	
	$query = "select max(PLAN_ID) from `plan`";
	$result = mysql_query ($query, $db);
	$max_plan_id = mysql_result($result,0);
	$max_plan_id = $max_plan_id + 1;
	if ( $_POST[is_active]== 'Active')
		$plan_status = 'Y';
	else
		$plan_status = 'N';
			
	
    $insert_stmt="INSERT INTO `plan` 
    (`PLAN_ID`,
    `PLAN_NAME`, 
    `PLAN_AMT`, 
    `MAX_DVDS`, 
    `RENT_PERIOD`,  
    `IS_ACTIVE`, 
    `VALIDITY_MONTHS`,
    `DESCRIPTION`)
	VALUES 
	(	$max_plan_id,
		'$_POST[plan_name]',
		'$_POST[plan_amt]',
		'$_POST[max_dvd]',
		'$_POST[rent_period]', 
		'$plan_status', 
		'$_POST[validity_months]', 
		'$_POST[description]')";

	$insert_query = mysql_query($insert_stmt,$db);
	
	mysql_close($db);
	header("Location: view_service_plan.php");
	
?>


</html>
