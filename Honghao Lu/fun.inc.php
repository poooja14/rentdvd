
<?php
  function getMovies($cat)
  {
	  
	  include('db_connect.php');
	  		
	  $q= 'SELECT title, release_dt,Genres FROM movies WHERE genres = "' . $cat .'" ORDER BY RELEASE_DT ASC LIMIT 3' ;
	  $r =  mysqli_query($dbc, $q);
	  
	  

	  if($r){
		  //echo "Works!";
		//echo '<table align="center" cellspacing="3"  cellpadding="3" width="75%" style="border:dotted">
	//<tr><td align="left">Title</td><td align="left">Date of Release</td><td align="left"></td></tr>';
	
		while($row = mysqli_fetch_array($r, MYSQLI_ASSOC)){
			echo '<tr><td align="left">' . $row['title'] . '</td><td align="left">' . $row['release_dt'] . '</td><td align="left">'. $row['Genres'].'</td><td></td></tr>'; 
			
			}
	
		//echo '</table>';
		mysqli_free_result($r);
	}
	else{
	
	echo "Sorry, there is an error occurs in the server.";
	}

		mysqli_close($dbc);//Close the connection.
		return $genres;
	  
  }
?>


<?php
	function getGenre()//Get the genre from the database
	{
		include('db_connect.php');
		$q = 'SELECT DISTINCT Genres FROM movies';
		$r = mysqli_query($dbc, $q);
		$genres = array();
		if($r)
		{
			while($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
			{
				$genres[] = $row['Genres'];
				}
		}
		else
		{
			print ("There is no movies available now.");
			}
		return $genres;
		mysqli_close($dbc);//Close the connection.
		}
		
?>




<?php
	function getCasting($title)
	{
		include("db_connect.php");
		$q = 'SELECT role, name, profile FROM movies, casting , cast_crew WHERE cast_crew.cast_id = casting.cast_id AND movies.movie_id = "' . $title.'"'; 
		
		$r = mysqli_query($dbc, $q);
		
		if($r)
		{
			
			echo '<table align="center" cellspacing="3"  cellpadding="3" width="75%" style="border:dotted">
	<tr><td align="left">Role</td><td align="left">Name</td><td align="left">Profile</td></tr>';
	
			while($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
			{
			echo '<tr><td align="left">' . $row['role'] . '</td><td align="left">' . $row['name'] . '</td><td align="left">'. $row['profile'].'</td></tr>'; 
				}
			echo '</table>';
			
			}
			
		}
?>

<?php
	function inQueue($movie_id, $email)
	{
		include("db_connect.php");
		$q = 'select movie_id from customer_queue where email="' . $email.'"';
		
		$r = mysqli_query($dbc, $q);
		while( $row = mysqli_fetch_array($r, MYSQLI_ASSOC))
		{
			if($row['movie_id'] == $movie_id)
				return true;
			else
				return false;
			}
		
		}
?>
