<?php

	include 'dbconn.php';

	$sql = "SELECT NAME FROM CAST_CREW group by name";
	$query = mysql_query($sql);

	while($row = mysql_fetch_array($query)){
		echo '<option value="',$row['NAME'],'">',$row['NAME'],'</option>';
	}

	mysql_close($db);

?>