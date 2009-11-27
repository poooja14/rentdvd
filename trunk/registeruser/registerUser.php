<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Validating Login</title>
</head>
<?php
	session_start();

	include 'dbconn.php';

		$_SESSION['firstname'] = $_POST['firstname'];
		$_SESSION['lastname'] = $_POST['lastname'];
		$_SESSION['dob'] = $_POST['dob'];
		$_SESSION['gender'] = $_POST['gender'];
		$_SESSION['address1'] = $_POST['address1'];
		$_SESSION['address2'] = $_POST['address2'];
		$_SESSION['city'] = $_POST['city'];
		$_SESSION['state'] = $_POST['state'];
		$_SESSION['zip'] = $_POST['zip'];
		$_SESSION['phone'] = $_POST['phone'];

    $insert_stmt="INSERT INTO `customer` (`EMAIL`, `USER_PASSWORD`, `FIRSTNAME`, `LASTNAME`, `DATE_OF_BIRTH`, `GENDER`, `ADDRESS_LINE1`, `ADDRESS_LINE2`,
	`CITY`, `STATE`, `ZIPCODE`, `PHONE`, `IS_ACTIVE`, `SECURITY_QS`, `SECURITY_ANS`,`SECURITY_TAGLINE`)
	VALUES (UPPER('$_POST[email]'), '$_POST[password]', UPPER('$_POST[firstname]'),UPPER('$_POST[lastname]'), STR_TO_DATE('$_POST[dob]','%m-%d-%Y'), 
	'$_POST[gender]', '$_POST[address1]', '$_POST[address2]', 	'$_POST[city]', '$_POST[state]', '$_POST[zip]', '$_POST[phone]', 'Y','$_POST[sec_qs]','$_POST[sec_ans]', \"$_POST[sec_motto]\")";

	$insert_query = mysql_query($insert_stmt,$db);
	$rowcount = mysql_affected_rows();

	if ($rowcount == 1){
		$plan_info = mysql_query("select plan_id from plan where (plan_name = '" . $_POST[serviceplan]. "')",$db);
		if ($row = mysql_fetch_array($plan_info)){
			$plan=$row['plan_id'];
			$buy_dt=date("Y-m-d");
			$insert_plan="INSERT INTO `CUSTOMER_PLAN` (`EMAIL` ,`PLAN_ID` ,`BUY_DT` ,`DISCOUNT_AMT`) VALUES (UPPER('$_POST[email]'),'$plan', '$buy_dt', '0')";
		}
		$insert_query = mysql_query($insert_plan,$db);
		$rowcount = mysql_affected_rows();
		if ($rowcount == 1){
			$_SESSION['email'] = $_POST['email'];
			header("Location: homepage.php");
		}
		else{		
			$errno = mysql_errno($db);
			if ($errno==1062){
				$_SESSION['errmsg'] = "Username already exists: Please enter a different Email-Id";
			}
			else{
				$_SESSION['errmsg'] = mysql_error($db);
			}
			header("Location: errSignup.php");		
		}
	}
	else{		
		//echo $insert_stmt;
		//session_start();
		$errno = mysql_errno($db);

		if ($errno==1062){
			$_SESSION['errmsg'] = "Username already exists: Please enter a different Email-Id";
		}
		else{
			$_SESSION['errmsg'] = mysql_error($db);
		}
		header("Location: errSignup.php");		
	}

	mysql_close($db);
?>

</body>
</html>
