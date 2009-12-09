<?php
	session_start();
	
	$userid = $_SESSION['email'];
?>
<?php
	if(!isset($userid))
	{
		//go to the login page
		}
?>
<?php

	
		//need session information
		
		include("db_connect.php");
		
		$movie_id = $_REQUEST['movieid'];
		$movie_title = $_REQUEST['title'];
		
		
		$q = 'select count(*) AS num from customer_queue where email="' . $userid . '"';
		
		$r = mysqli_query($dbc, $q);
		
		while($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
		{
			$num = $row['num'];
			}
			
		if(!$r)
		{
			echo "Sorry, there is an error in calculate the number";
			
			}
		else
		{
			echo $num;
			$num=$num+1;
			$q = 'INSERT INTO customer_queue VALUES("' . $_SESSION['email']. '", "' . $movie_id. '" , '. $num.')';
			$r = mysqli_query($dbc, $q);
			if(!$r)
			{
				echo "Sorry, there is an errorin add the movie in";
				}
			else 
			{
				//redirecting does not work
				//header("browseMovies.php");
				}
			}
	
	
?>
