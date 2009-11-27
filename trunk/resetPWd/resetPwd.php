<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Validating Login</title>
</head>
<?php

	include 'dbconn.php';

	$upd_stmt="UPDATE CUSTOMER SET USER_PASSWORD = '$_POST[new_password]' WHERE (EMAIL = (UPPER('$_POST[email]'))) AND (USER_PASSWORD = '$_POST[old_password]')";

	$reset_pwd = mysql_query($upd_stmt,$db);
	$rowcount = mysql_affected_rows();
	if ($rowcount == 1){
		$_SESSION['email'] = $_POST['email'];
		header("Location: loginpage.php");
	}
	else{		
		header("Location: changePwd.php");		
	}

	mysql_close($db);
?>

</body>
</html>
