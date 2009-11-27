<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Validating Login</title>
</head>
<?php
	session_start();

	include 'dbconn.php';

	$login = mysql_query("SELECT * FROM CUSTOMER WHERE (EMAIL = UPPER('" . $_POST['email'] . "')) AND (USER_PASSWORD = '" . $_POST['password'] . "')",$db);
	$rowcount = mysql_num_rows($login);
	if ($rowcount == 1){
		$_SESSION['email'] = $_POST['email'];
		header("Location: homepage.php");
	}
	else{
		$_SESSION['errLogin'] = "Invalid Login: Username or Password does not match!";
		header("Location: loginpage.php");		
	}
	mysql_close($db);
?>

</body>
</html>
