<html>
<head>
<title>Movie Review Added</title>
</head>
<body>
<?php

include "dbconn.php";
/*$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

 mysql_select_db("rentdvd", $con);
*/
$sql="INSERT INTO customer_review (REVIEWER,MOVIE_ID,USER_RATING,COMMENTS)
VALUES
('XX','2','$_POST[rating]','$_POST[addreview]')";

$insert_query = mysql_query($sql,$db);
$rowcount = mysql_affected_rows();

if ($rowcount == 1){
header("Location: viewmoviedetails.php");
}
else{		
	
		$errno = mysql_errno($db);

		if ($errno==1062){
			$_SESSION['errmsg'] = "You have already entered review for this movie.";
		}
		else{
			$_SESSION['errmsg'] = mysql_error($db);
		}
		header("Location: errSignup.php");		
	}
	

//mysql_close($con)
?>

</body>
</html>