<?php

	include 'dbconn.php';

	$sql = "SELECT PLAN_NAME FROM PLAN WHERE IS_ACTIVE='Y'";
	$query = mysql_query($sql);

	while($row = mysql_fetch_array($query)){
		echo '<option value="',$row['PLAN_NAME'],'">',$row['PLAN_NAME'],'</option>';
	}

	mysql_close($db);

?>