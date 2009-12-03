<html>
<title>View User</title>

<form action="view_rent_details.php" method="post" >
<?php

	$server = "localhost";
	$username = "root";
	$password = "";
	$db_name = "dvd_rental";

	$db = mysql_connect($server,$username,$password);
	mysql_select_db($db_name, $db);
	
	if (!$db){
	  die('Could not connect: ' . mysql_error());
	}
	else{
		mysql_select_db($db_name) or DIE("Database name not available !!");
	}	

	$query = "select * from `customer` c , `customer_plan` cp where c.EMAIL = cp.EMAIL";
	$result = mysql_query ($query, $db);

/*count total number of rows*/
	$num = mysql_numrows ($result);
	echo "<table border='1'>
		<tr>
			<th> Select </th>
			<th>User Name</th>
			<th>Email</th>
			<th>Address</th>	
			<th>Phone #</th>					
			<th>Service Plan #</th>
			<th>Status</th>";
    
	for ($i = 0; $i < $num; $i++) 
	{
		echo "<tr>";
		$first_Name = mysql_result ($result, $i,  "FIRSTNAME");
		$last_name = mysql_result ($result, $i, "LASTNAME");
		$fullname=	$first_Name ." " . $last_name;
		$email = mysql_result ($result, $i, "EMAIL");
		$address_line1 = mysql_result ($result, $i, "ADDRESS_LINE1");
		$address_line2 = mysql_result ($result, $i, "ADDRESS_LINE2");
		$city = mysql_result ($result, $i, "CITY");
		$state = mysql_result ($result, $i, "STATE");
		$zipcode = mysql_result ($result, $i, "ZIPCODE");
		$address = $address_line1 . " " . $address_line2 . " " . $city . " " . $state . " " . $zipcode; 
		$phoneno = mysql_result ($result, $i, "PHONE");
		$plan = mysql_result ($result, $i,  "PLAN_ID");
		$status = mysql_result ($result, $i,  "IS_ACTIVE");
		
		
		echo "	<td><input type='radio' name='rent_details' value ='$email'></td>	 
		<td>$fullname</td> <td>$email</td<td>$address</td><td>$phoneno</td><td>$plan</td><td>$status</td>";
		echo "</tr>";
	}	
	echo "</table>";
	mysql_close($db);
?>
<input type="submit" value="Rent Details" id="Rent Details">

</form>

</html>	
