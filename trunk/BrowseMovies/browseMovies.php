<?php
	 $page_title = 'Browse Movies';
	 include ('_header.php');
?>
<link REL="SHORTCUT ICON" HREF="http://www.teachnet-uk.org.uk/2006%20Projects/ICT-Access_Database/AccessDB/Images/dvd-icon.jpg">
<p></p>


<?php
require_once('db_connect.php');

$q =  'select title, release_dt from movies';

$r =  mysqli_query($dbc, $q);

if($r){
	//echo "Works!";
	echo '<table align="center" cellspacing="3"  cellpadding="3" width="75%" style="border:dotted">
	<tr><td align="left">Title</td><td align="left">Date of Release</td><td align="left"></td></tr>
	';
	
	while($row = mysqli_fetch_array($r, MYSQLI_ASSOC)){
		echo '<tr><td align="left">' . $row['title'] . '</td><td align="left">' . $row['release_dt'] . '</td><td align="left">View</td></tr>';
	}
	
	echo '</table>';
	mysqli_free_result($r);
}
else{
	
	echo "Sorry, there is an error occurs in the server.";
}

mysqli_close($dbc);//Close the connection.

?>

<?php
	include ('_footer.php');
?>