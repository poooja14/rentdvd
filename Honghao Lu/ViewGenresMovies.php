<?php
	 $page_title = $_REQUEST['cat'];
	 include ('_header.php');
	 include('db_connect.php');
?>
<table align="center" cellspacing="3"  cellpadding="3" width="75%" style="border:dotted">
	<tr><td align="left">Title</td><td align="left">Date of Release</td><td align="left">Genres</td><td align="left">Awards</td><td>Rating</td><td></td><td></td></tr>
<?php
$genre= $_REQUEST['cat'];
echo $genre;
?>
<?php
	
	$q = 'SELECT movie_id, title, release_dt, AWARDS, Genres , rating FROM movies where genres="'. $genre.'"';
	$r = mysqli_query($dbc, $q);
	if($r)
	{
		while($row = mysqli_fetch_array($r, MYSQLI_ASSOC)){
			echo '<form action="ViewMovies.php" method="post">';
			echo '<tr><td align="left">' . $row['title'] . '</td><td align="left">' . $row['release_dt'] . '</td><td align="left">'. $row['Genres'].'</td><td>' . $row['AWARDS'].'</td><td>'. $row['rating'] .'</td><td></td><td><input name="movieid" type="hidden" value="' . $row['movie_id'] . '"/><input name="title" type="hidden" value="' . $row['title'] . '"/><input type="submit" value="View"/></td></tr>'; 
			echo '</form>';
			}
		}
	else
	{
		echo("An error occurs, Sorry!");
		}
	mysqli_close($dbc);
	
?>
</table>


<?php
	include ('_footer.php');
?>