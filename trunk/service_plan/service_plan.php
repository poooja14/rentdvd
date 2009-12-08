<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Service Plan</title>

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
</head>
<?php include "style.php"?>
<form action="add_service_plan.php" onsubmit="return onAdd(this)" method="post">
<b>Service Plan </b>
<table align='center' >
	<tr>
		<td align='left'>*Plan Name:</td>
		<td align='left'><input type="text" name="plan_name" id="plan_name" /><p></p></td>		
	</tr>
	<tr>
		<td align='left'>*Plan Fee:</td>
		<td align='left'><input type="text" name="plan_amt" id="plan_amt" /><p></p></td>		
	</tr>
	<tr>
		<td align='left'>*Maximum DVD:</td>
		<td align='left'><input type="text" name="max_dvd" id="max_dvd" /><p></p></td>			
	</tr>
	<tr>
		<td align='left'>*Rent Period ( in weeks) :</td>
		<td align='left'>
			<select name="rent_period" id="rent_period">
	  		<option value="1">1</option>
	  		<option value="2">2</option>
	  		<option value="3">3</option>
	  		<option value="4">4</option>
	  		</select>
	  		<p></p>
	  	</td>
	  </tr>
	 <tr>
		<td align='left'> *Validity Months : </td>
		<td align='left'>
			<select name="validity_months" id="validity_months">
	  		<option value="1">1</option>
	  		<option value="2">2</option>
			</select>
			<p></p>
		</td>
	</tr>
	<tr>
		<td align='left'>*Status:</td>
		<td align='left'>
			<select name="is_active" id="is_active">
			<option value="Active">Active</option>
			<option value="Inactive">Inactive</option>
			</select>
			<p></p>
		</td>
	</tr>
	<tr>
		<td align='left'>Description:</td>
		<td align='left'>
			<textarea name="description" id="description" rows="2" cols="40"></textarea>
			<p></p>
		</td>
	</tr>
	
	<tr><td></td><td><input type="submit" value="Submit" " /></td></tr>
	</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p></p></form>  
<?php include "footer1.php"?>