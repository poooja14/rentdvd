<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title> Updating the movie table and the cast and crew table</title>
</head>
<?php

	
	include 'dbconn.php';

	
		$movieid = $_POST['movieId'];
		$movie_title = $_POST['movieTitle']; 
		$release_date = $_POST['releaseDate'];
		$num_awards = $_POST['noOfAwards'];
		$awards = $_POST['awards'];
		$num_dvds = $_POST['noOfDvds'];
		$rating = $_POST['rating'];
		$role = $_POST['role'];
		
		
		$cast_name = $_POST['castName']; 
		
		if(isset($_POST['submitMovie'])){

	echo "this is the " .$num_dvds;
	
 $insert_stmt="INSERT INTO movies (MOVIE_ID,TITLE,RELEASE_DT,NUM_AWARDS,AWARDS,NUM_DVDS,RATING)
	VALUES ('".$movieid."' , '".$movie_title."','".$release_date."','".$num_awards."','".$awards."','".$num_dvds."','".$rating."')";

	$insert_query = mysql_query($insert_stmt,$db);
	//$rowcount = mysql_affected_rows();

	echo "database updated" .$movieid .$movie_title;

	mysql_close($db);
	header("Location: moviepage.php");
	}
	
	if(isset($_POST['casting'])){
		
		$query = "select * from cast_crew where name = '".$cast_name."'";
		
		$result = mysql_query ($query, $db) or die(mysql_error()); 	
		
		$num = mysql_num_rows ($result);
		
		$info = mysql_fetch_array( $result );
		
		$cast_id = $info['CAST_ID'];
		
		if($num > 1){
			
			$info = mysql_fetch_array( $result );
		
		echo "id:" .$info['CAST_ID']."";
		/*count total number of rows*/

		$num = mysql_num_rows ($result);
		
		echo "<table border='1'>
		<tr>
	<th>Select</th>
	<th>Cast Id</th>

	<th>Cast Name</th>

	<th>Profile</th>";
	
	for ($i = 0; $i < $num; $i++)
	{

	echo "<tr>";
	$retrieved_cast_id = mysql_result ($result, $i, "CAST_ID");
	$retrieved_cast_name = mysql_result ($result, $i, "NAME");
	$retrieved_profile = mysql_result ($result, $i, "profile");
	
	echo "
<td><input type='radio' name='cast_id_select' value= .$retrieved_cast_id></td>
<td>$retrieved_cast_id </td>   
 <td> $retrieved_cast_name</td>       
<td> $retrieved_profile </td> " ;


		   	
echo "</tr>"; 
	}
	
	echo "</table>";
	//	header("Location: moviepage.php");	
		}
		
	else{
		$insert_stmt = "insert into casting (cast_id,movie_id,role) values ('".$cast_id."','".$movieid."','".$role."')";
		$insert_query = mysql_query($insert_stmt,$db);
		
		echo "data inserted";
	//	header("Location: moviepage.php");	
		
	}	
	mysql_close($db);
	
	
	;}
	
?>
</body>
</html>
