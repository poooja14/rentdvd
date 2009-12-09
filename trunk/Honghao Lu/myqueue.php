<?php
	session_start();
	$userid = $_SESSION['email'];
	if(!isset($userid))
	{
		//go to the login page
		}
	
?>

<?php
	$page_title = "My Queue";
	include ('_header.php');
?>
<script type="text/javascript"  language="javascript">
	function deleteMovie(movieid)
	{
		alert("+++++++++++++++++++++++++++++");
		document.getElementById("movieid").value= movieid;
		document.getElementById("op").value="delete";
		document.queue.submit();
		}
	function moveTop( movieid)
	{
		alert("+++++++++++++++++++++++++++++");
		document.getElementById("movieid").value= movieid;
		document.getElementById("op").value="movetop";
		document.queue.submit();
		}
</script>
<?php 
	
	$movieid = $_REQUEST['movieid'];
	
	if(!empty($_REQUEST['movieid'])&& !empty($_REQUEST['op']))
	{
		//echo "Moveto Here";
		include("db_connect.php");
		if($_REQUEST['op'] == "delete")
		{
			//user information
			//delte this movie from queue
			include("db_connect.php");
			
			
			$q = 'DELETE FROM customer_queue WHERE email="' . $userid .'" AND movie_id="' . $movieid. '"';//delete this record from  the user's queue	
			
			$r = mysqli_query($dbc, $q);
			
			if($r)
			{
				echo "Delete Success!";
				}
			else
			{
				echo 'An error occurs when deleting from queue';
				}
			//mysqli_free_result($r);
			
			}
		if($_REQUEST['op'] == "movetop")
		{
			echo "update";
			echo $movieid;
			$q = 'UPDATE customer_queue SET priority= priority + 1 WHERE priority < (SELECT priority FROM customer_queue WHERE  AND email="' . $userid . '" AND movie_id="' . $movieid. '" ) AND  email="' . $userid . '" AND movie_id="' . $movieid. '" ';
			
			$r = mysqli_query($dbc, $q);//move the movies above this movie down
			
			
			if(!$r)
				echo "An error occurs during the move top";
			
			//mysqli_free_result($r);
			
			$q = 'UPDATE customer_queue SET PRIORITY=1 WHERE email="' . $userid . '" AND movie_id="' . $movieid. '"';
			
			$r = mysqli_query($dbc, $q);
			
			if(!$r)
				echo "An error occurs during the move top";
			
			}
		}
		else
		{
			}
?>
<?php # need user information
	function showQueue()
	{
		include("db_connect.php");
		$userid = $_SESSION['email'];
		
		$q = 'SELECT M.movie_id, title, rating, genres, priority FROM movies AS M, customer_queue AS C WHERE email ="'.$userid.'" and M.movie_id=C.movie_id ORDER BY priority ASC';
		$r = mysqli_query($dbc, $q);
		
		if($r)
		{
			echo '<form name="queue" id="queue" action="myqueue.php" "method="post">';
			echo '<table align="center" cellspacing="3"  cellpadding="3" width="75%" style="border:dotted">
	<tr><td align="left">Priority</td><td align="left">Title</td><td align="left">Rating</td><td align="left">Genre</td><td align="left"></td><td align="left"></td></tr>';
			
			while($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
			{
				echo '<tr><td align="left">' . $row['priority'] . '</td><td align="left">' . $row['title'] . '</td><td align="left">'. $row['rating'].'</td><td>'.$row['genres'] . '</td><td></td><td><input type="submit" value="Delete" onclick="deleteMovie(' .$row['movie_id'] .')" /></td></tr>';
				
				
				}
			echo '<input type="hidden" name="movieid" id="movieid" value=""/>';
			echo '<input type="hidden" name="op" id="op" value=""/>';
			
			}
		else
		{
			echo "Sorry, an error occurs";
			}
	}
?>
<?php showQueue();?>

<?php
	include ('_footer.php');
?>