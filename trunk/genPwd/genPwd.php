<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Validating Login</title>
</head>
<?php

	include 'dbconn.php';

	$custinfo = mysql_query("select security_qs from customer where (email = '" . $_POST['email'] . "')",$db);
	
	if ($row = mysql_fetch_array($custinfo)){

//		$to = $row['email'];
//		$subject = "Password of your RentIT account!";
//		$message = "The password you had set for your RentIT account is:".$row['user_password'];
//		$from = "donot_reply@rentIT.com";
//		$headers = "From: RentIT Administrator";
//		mail($to,$subject,$message,$headers);
		header("Location: confirmSecQs.php");
	}
	else{		
		header("Location: forgotPwd.php");		
	}

	mysql_close($db);
?>

</body>
</html>
