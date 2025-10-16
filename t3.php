<?php
session_start();
include ("dbconnect.php");

$stdNo = $_POST['stdNo'];
$sql_events = mysqli_query($connection, "select * from bkp where stdNo='$stdNo' ") or die (mysql_error());
$count = mysqli_num_rows($sql_events);
//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
if ($count == 1){
	echo "<script>
				document.location.href = 't1.php?vid=$stdNo';
					</script>";
	}
else {
	echo "<script>
				alert('Error! No record found.');
	 			document.location = 'searchBKP.php';
				 </script>";
}

?>
