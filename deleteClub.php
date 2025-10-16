<?php
session_start();
include ("dbconnect.php");

$sid = $_GET["club_id"];

$sql = "delete from club where club_id='$sid'";
$mysqli->query($sql);

echo "<script>
			alert('Club Sucessfully Deleted.');
			document.location = 'clubList.php';
			 </script>";
?>
