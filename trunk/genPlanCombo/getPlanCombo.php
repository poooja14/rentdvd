<?
	require_once('dbconn.php');

	$sql = "select plan_name from plan where is_active='Y'";
	$query = mysql_query($sql);

	while($arr = mysql_fetch_assoc($query))
	{
	     $arr_data[] = $arr;
	}

	$string = "";
	$string.= "<select name='serviceplan' id='serviceplan'>";
	foreach($arr_data as $key=>$value)
	{     
	     $planname= $value['plan_name'];
	     $string.= "<option value='".$planname."'>".$planname."</option>";
	}

	$string.= "</select>";

	print $string;
?>
