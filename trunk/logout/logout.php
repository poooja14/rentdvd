<html>
<title>
Logout
</title>
<body>
	<?php
		session_start();
		unset($_SESSION['email']);
		session_destroy();
		header("Location: loginpage.php");
	?> 
</body>
</html>