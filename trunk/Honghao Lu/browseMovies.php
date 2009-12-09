<?php
	 $page_title = 'Browse Movies';
	 include ('_header.php');
	 include('fun.inc.php');
?>
<link REL="SHORTCUT ICON" HREF="http://www.teachnet-uk.org.uk/2006%20Projects/ICT-Access_Database/AccessDB/Images/dvd-icon.jpg">
<p></p>


<?php 
$list= getGenre();
foreach($list as $value)
{
	echo '<form action="ViewGenresMovies.php" method="post">';
	echo '<p><div name=' . $value . '><p>';
	echo $value;
	echo '<table name="' . $value .'"align="center" cellspacing="3"  cellpadding="3" width="75%" style="border:dotted">
	<tr><td align="left">Title</td><td align="left">Date of Release</td><td align="left">Genres</td><td align="left"></td></tr>';

	getMovies($value);

	echo '</table>';
	echo '<label><input type="submit" value="More..."/><input name="cat" type="hidden" value="' . $value . '"/></label>';
	echo '</p></div></p>';
	echo '</form>';
	}
?>



<?php
	include ('_footer.php');
?>