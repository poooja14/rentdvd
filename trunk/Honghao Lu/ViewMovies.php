<?php
	session_start();
	$userid=$_SESSION['email'];
?>
<?php
	if(!isset($userid))
	{
		//redirect
		}
?>
<?php #need session information
	 $page_title = $_REQUEST['title'];// should use a movie name to change the title here.
	 $movie_id = $_REQUEST['movieid'];
	 include ('_header.php');
	 include('db_connect.php');
	 include('fun.inc.php');
?>
<script type="text/javascript">
 function AddDelete()
 {
	 if(document.getElementById("aod").value == "add")
	 {
	 	document.getElementById("Add").value = "Added";
		document.getElementById("Add").disabled=true;
		
	 }
 }
</script>

<?php

	$q = 'SELECT title, genres,release_dt,num_awards, awards,rating, description from movies where movie_id="' . $_REQUEST['movieid'].'"';
	$r =  mysqli_query($dbc, $q);
	if($r)
	{
		while($row = mysqli_fetch_array($r, MYSQLI_ASSOC)){
			$movie_name = $row['title'];
			$genre = $row['genres'];
			$dt = $row['release_dt'];
			$num = $row['num_awards'];
			$award = $row['awards'];
			$rating = $row['rating'];
			$des = $row['description'];
			}
		}
	else
	{
		echo "Sorry an error occurs";
		}
	
	mysqli_free_result($r);
?>





<form action="addMoviesQueue.php" method="post">
<ul>
	<li><label>Movie Title: <?php echo  $movie_name;?></label>
    </li>
    <li><label>Casting: <?php getCasting($_REQUEST['movieid'])?></label> <!-- Call a function return the casting table-->
    </li>
    <li><label>Genre: <?php echo  $genre;?></label>
    </li>
    <li><label>Release Date: <?php echo $dt;?></label>
    </li>
    <li><label>Number of Awards: <?php echo $num;?></label>
    </li>
    <li><label>Awards: <?php echo $award;?></label>
    </li>
    <li><label>Rating: <?php echo $rating;?></label>
    </li>
    <li><label>Description: <?php echo $des;?></label>
    </li>
</ul>
<input type="hidden" name="movie_tag" value="' . $movie_id.'"/>
<input type="hidden" name="movie_op"  value="1" /> <!-- "1" is to add, "0" is to delete from the queue-->
<?php echo '<input name="movieid" type="hidden" value= "' . $_REQUEST['movieid'] . '"/>';?>
<?php echo '<input name="title" type="hidden" value= "' .$_REQUEST['title'] . '"/>';?>

<?php
	if(inQueue($movie_id, 'luhonghao@gmail.com'))
	{
		echo '<input type="submit" value="Added" disabled="disabled"/>';
		}
	else
		echo '<input type="submit" value="Add"/>';
	
?>



</form>

<?php
	include ('_footer.php');
?>