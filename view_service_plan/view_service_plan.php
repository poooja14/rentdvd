<html>
<script type="text/javascript">

function onSubmit(thisform)
{
	var is_delete = confirm ( " Please Confirm!");
	if (is_delete)
		return true;
	else
		return false;
	
}
</script>

<form action="view_update_service_plan.php" method="post" onsubmit="return onSubmit(this)">
<?php

	include "dbconn.php";

	$query = "select * from `plan` order by plan_id";
	$result = mysql_query ($query, $db);

/*count total number of rows*/
	$num = mysql_numrows ($result);

	echo "<table border='1'>
		<tr>
			<th>Select</th>
			<th>Plan Id</th>
			<th>Plan Name</th>
			<th>Plan Amount</th>
			<th>Maximum DVD</th>
			<th>Rent Period</th>
			<th>Status</th>
			<th>Validity Months</th>
			<th>Description</th>";
    
	for ($i = 0; $i < $num; $i++) 
	{
		echo "<tr>";	
		$plan_Id = mysql_result ($result, $i, "PLAN_ID");
		$plan_Name = mysql_result ($result, $i,  "PLAN_NAME");
		$plan_Amount = mysql_result ($result, $i, "PLAN_AMT");
		$max_Dvd = mysql_result ($result, $i,  "MAX_DVDS");
		$rent_Period = mysql_result ($result, $i, "RENT_PERIOD");
		$status = mysql_result ($result, $i,  "IS_ACTIVE");
		$validity_Months = mysql_result ($result, $i, "VALIDITY_MONTHS");
		$description = mysql_result ($result, $i,"DESCRIPTION");
		
		echo "
		<td><input type='radio' name='update_plan_id' value='$plan_Id'>	
		</td>		
		<td>$plan_Id</td> <td>$plan_Name</td> <td>$plan_Amount</td>
			 <td>$max_Dvd</td><td>$rent_Period</td><td>$status</td>
		  		<td>$validity_Months</td><td>$description</td>";
		  				echo "</tr>";
	}	
	echo "</table>";
	mysql_close($db);
	
?>
<input type="submit" name = "update" value="Update" id="update">
<input type="submit" name = "delete" value="Delete" id="delete">


</form>
</html>	
