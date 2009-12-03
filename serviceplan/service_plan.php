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

<form action="add_service_plan.php" onsubmit="return onAdd(this)" method="post" >
	*Plan Name:
	<input type="text" name="plan_name" id="plan_name" >
	<br />
	*Plan Fee:
	<input type="text" name="plan_amt" id="plan_amt" >
	<br />
	*Maximum DVD:
	<input type="text" name="max_dvd" id="max_dvd">
	<br />
	*Rent Period ( in weeks) :
	<select name="rent_period" id="rent_period">
	  <option value="1">1</option>
	  <option value="2">2</option>
	  <option value="3">3</option>
	  <option value="4">4</option>
	</select>
	<BR/>
	*Validity Months :
	<select name="validity_months" id="validity_months">
	  <option value="1">1</option>
	  <option value="2">2</option>
	</select>
	<BR/>
	*Status:
	<select name="is_active" id="is_active">
	  <option value="Active">Active</option>
	  <option value="Inactive">Inactive</option>
	</select>
	<BR>
	Description:
	<textarea name="description" id="description" rows="2" cols="40"></textarea>
	<input type="submit" value="Submit" " />
</form>
</body>
 </html>