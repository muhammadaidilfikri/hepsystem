<?php
session_start();
include ("dbconnect.php");

$dact_id = $_GET["dact_id"];

$sql = "delete from dept_activities  where dact_id='$dact_id'";
$mysqli->query($sql);

echo "<script>
			alert('Acitivity Sucessfully Deleted.');
			document.location = 'deptActivities.php';
			 </script>";
?>
