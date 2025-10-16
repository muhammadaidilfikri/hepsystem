<?php
session_start();
include ("dbconnect.php");

$act_id = $_GET["act_id"];

$sql = "delete from club_activities  where act_id='$act_id'";
$mysqli->query($sql);

echo "<script>
			alert('Acitivity Sucessfully Deleted.');
			document.location = 'clubActivities.php';
			 </script>";
?>
