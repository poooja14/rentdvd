<html>
<head>
<title>Add service plan</title>
</head>
<?php

$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("rentdvd", $con);
	
    $insert_stmt="INSERT INTO `movies` 
    (`MOVIE_ID`,
    `TITLE`, 
    `RELEASE_DT`, 
    `NUM_AWARDS`, 
    `AWARDS`,  
    `NUM_DVDS`, 
    `RATING`)
	VALUES 
	(	$max_plan_id,
		'$_POST[movieid]',
		'$_POST[movietitle2]',
		'$_POST[releasedate]',
		'$_POST[rent_period]', 
		'$_POST[is_active]', 
		'$_POST[validity_months]', 
		'$_POST[description]')";

	$insert_query = mysql_query($insert_stmt,$db);
	
	mysql_close($db);
	echo "hiii";
?>


</html>
