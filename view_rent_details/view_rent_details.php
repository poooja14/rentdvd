<html>
<title>View User's Rent Details</title>
<script type="text/javascript">
	function onUpdate(thisform)
	{
		if ( document.getElementById("plan_name").value == "" || document.getElementById("plan_name").value == null)
		{
			alert("Please enter Plan Name.");
			plan_name.focus();
			return false;
		}
	}
</script>
<form action="update_rent_history.php" method="post" onsubmit='return onUpdate(this)'>
<?php
	 $email = $_POST['rent_details'];
	 
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

	$query = "select MR.EMAIL, D.DVD_ID, M.MOVIE_ID, M.TITLE , MR.DVD_ID, MR.RENT_DT from movies M, movie_rent MR, customer_queue CQ, dvds D Where CQ.EMAIL = MR.EMAIL and M.MOVIE_ID=CQ.MOVIE_ID and MR.EMAIL = '$email' and D.MOVIE_ID = M.MOVIE_ID;";
	
	$result = mysql_query ($query, $db);

/*count total number of rows*/
	$num = mysql_numrows ($result);
	
	if ( $num != 0) 
	{
		echo "<table border='1'>
			<tr>			
				<th>Select</th>
				<th>Movie Name</th>
				<th>DVD ID</th>
				<th>Date of Rent</th>
				<th>Date of Return</th>";
	    
		for ($i = 0; $i < $num; $i++) 
		{
			
			$email = mysql_result ($result, $i,  "EMAIL");
			echo "	<input type='text' name='email' value ='$email'>"; 
			echo "	<input type='text' name='num' value ='$num'>"; 
			$dateofreturn='date_of_return'.$i;
			$dvdid='dvd_Id'.$i;
			$dateofrent='date_of_rent'.$i;
			$movieid='movie_Id'.$i;
			
			echo "<tr>";
					
			$movie_Id = mysql_result ($result, $i,  "MOVIE_ID");
			$dvd_Id = mysql_result ($result, $i,  "DVD_ID");
			$movie_Name = mysql_result ($result, $i,  "TITLE");
			$date_of_rent = mysql_result ($result, $i, "RENT_DT");
			
			echo "
			<td><input type='radio' name='update_dvd' value='$dvd_Id'></td>	
			<td>$movie_Name <input type='text' name=$movieid value = '$movie_Id' ></td>
			<td><input type='text' name=$dvdid value = '$dvd_Id' ></td>
			<td><input type='text' name=$dateofrent value = '$date_of_rent'></td>
			<td><input type='text' name=$dateofreturn id='date_of_return' value=''/> </td>
			";
			echo "</tr>";
		}	
		echo "</table>";
		mysql_close($db);
		echo "<input type='submit' value='Update' id='update'>";
	}
	else
		echo " User has not rented any movie";
		
	
?>


</form>

</html>	

