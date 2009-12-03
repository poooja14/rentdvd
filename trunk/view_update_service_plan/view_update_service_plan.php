<html>
<title>Service Plan</title>
<head></head>
<body>
<script type="text/javascript">
	function onAdd(thisform)
	{
		if ( document.getElementById("plan_name").value == "" || document.getElementById("plan_name").value == null)
		{
			alert("Please enter Plan Name.");
			plan_name.focus();
			return false;
		}
		else if (isNaN (document.getElementById("plan_amt").value)== true )
		{
			alert("Please enter numeric value.");
			plan_amt.focus();
			return false;
		}	
		else if ( document.getElementById("plan_amt").value == "" || document.getElementById("plan_amt").value == null)
		{
			alert("Please enter Plan Amount.");
			plan_amt.focus();
			return false;
		}	
		else if (isNaN (document.getElementById("max_dvd").value)== true )
		{
			alert("Please enter numeric value.");
			plan_amt.focus();
			return false;
		}	
		else if ( document.getElementById("max_dvd").value == "" || document.getElementById("max_dvd").value == null)
		{
			alert("Please enter maximum number of DVDs allowed to rent for this plan.");
			max_dvd.focus();
			return false;
		}
		else 
		{
				return true;
		}		
	} // end of onAdd
</script>
<form action="update_service_plan.php" onsubmit="return onAdd(this)" method="post" >

<?php    		
    $plan_id = $_POST['update_plan_id'];
    if (isset($_POST['update']))
    {
    		include "dbconn.php";    				
    		$query = "select * from `plan` where PLAN_ID = $plan_id";
    		$result = mysql_query ($query, $db);
		    		
    		$plan_Id = mysql_result ($result,0,'PLAN_ID');
    		$plan_Name = mysql_result ($result,0,'PLAN_NAME');
    		$plan_Amount = mysql_result ($result,0,'PLAN_AMT');
    		$max_Dvd = mysql_result ($result,0,'MAX_DVDS');
    		$rent_Period = mysql_result ($result,0,'RENT_PERIOD');
    		$status = mysql_result ($result,0,'IS_ACTIVE');
    		if ($status == 'I')
    			$status = 'Inactive';
    		else
    			$status = 'Active';
    		$validity_Months = mysql_result ($result,0,'VALIDITY_MONTHS');
    		$description = mysql_result ($result,0,'DESCRIPTION');
    }		
    else
    {   			
    		$server = "localhost";
			$username = "root";
			$password = "";
			$db_name = "dvd_rental";
			$db = mysql_connect($server,$username,$password);
			mysql_select_db($db_name, $db);
			$query = "delete from `plan` where PLAN_ID = $plan_id ";
			$result = mysql_query ($query, $db);
			header("Location: view_service_plan.php");		
	}
?>
	<input type="text" name="plan_id" id="plan_id" value="<?php echo $plan_Id?>">
	*Plan Name:
	<input type="text" name="plan_name" id="plan_name" value="<?php echo $plan_Name?>">
	<br />
	*Plan Fee:
	<input type="text" name="plan_amt" id="plan_amt" value="<?php echo $plan_Amount?>">
	<br />
	*Maximum DVD:
	<input type="text" name="max_dvd" id="max_dvd" value="<?php echo $max_Dvd?>">
	<br />
	*Rent Period ( in weeks) :
	 
	
	<select name="rent_period" id="rent_period" >
	<option value="<?php echo $rent_Period;?>" SELECTED><?php echo $rent_Period;?></option>
	  <option value="1">1</option>
	  <option value="2">2</option>
	  <option value="3">3</option>
	  <option value="4">4</option>
	</select>
	<BR/>
	*Validity Months :
	<select name="validity_months" id="validity_months">
	<option value="<?php echo $validity_Months;?>" SELECTED><?php echo $validity_Months;?></option>	
	  <option value="1">1</option>
	  <option value="2">2</option>
	</select>
	<BR/>
	*Status:
	<select name="is_active" id="is_active">
	<option value="<?php echo $status ?>" SELECTED><?php echo $status;?></option>
	  <option value="Active">Active</option>
	  <option value="Inactive">Inactive</option>
	</select>
	<BR>
	Description:
	<textarea name="description" id="description" rows="2" cols="40"><?php echo $description?></textarea>
	
	<input type="submit" value="Submit" " />



</form>
</body>
 </html>