<?php
session_start();
include ("dbconnect.php");



/* Kill session variables */

unset($_SESSION["username"]);
unset($_SESSION["password"]);
$_SESSION = array(); // reset session array
session_destroy();   // destroy session.

echo "<script>
			alert('You have successfully log out. Thank You');
 			document.location = 'index.php';
			 </script>";

?>