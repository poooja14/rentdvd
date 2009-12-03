<?php
$num = $_POST['num'];
$email = $_POST['email'];
echo $num;
echo $email;
echo "	<input type='text' name='email' value ='$email'>"; 

for ( $i=0; $i<$num; $i++ )
{
		echo "hehre";
	
		$dateofreturn='date_of_return'.$i;
		$dvdid='dvd_Id'.$i;
		$dateofrent='date_of_rent'.$i;
		$movieid='movie_Id'.$i;
		if ( $dateofrent > $dateofreturn ) 
			echo " Return date has to be bigger than rented date ";
		else
		{
			if(isset($_POST[$dateofreturn]))
			{
				echo $_POST[$dateofreturn];
				echo $_POST[$dvdid];			
				echo $_POST[$dateofrent];
				echo $_POST[$movieid];
				$server = "localhost";
				$username = "root";
				$password = "";
				$db_name = "dvd_rental";
			
				$db = mysql_connect($server,$username,$password);
				mysql_select_db($db_name, $db);
				
				if (!$db){
				  die('Could not connect: ' . mysql_error());
				}
				else{
					mysql_select_db($db_name) or DIE("Database name not available !!");
				}	
				
				$insert_stmt="INSERT INTO `movie_rent_history` 
				    (`EMAIL`,
				    `DVD_ID`, 
				    `RENT_DT`, 
				    `RETURN_DT`)
					VALUES 
					(	'$email',
						'$_POST[$dvdid]',
						'$_POST[$dateofrent]',
						'$_POST[$dateofreturn]')";
	
			//	echo $insert_stmt;
				$insert_query = mysql_query($insert_stmt,$db);
				
				//$delete_stmt = " select *  from `movie_rent` where `EMAIL`='$email' and `DVD_ID` = '$_POST[$dvdid]' and `RENT_DT`='$_POST[$dateofrent]'";
				
				echo $delete_stmt;
						
				//$delete_query = mysql_query($delete_stmt,$db);
				mysql_close($db);
			
			}
		}
		//header("Location: view_rent_details.php");
		
}
	
?>