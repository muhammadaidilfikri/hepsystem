<?php
session_start();
include ("dbconnect.php");

$ad_id = $_GET["ad_id"];

$sql = "delete from club_advisor where ad_id='$ad_id'";
$mysqli->query($sql);

echo "<script>
			alert('Club Sucessfully Deleted.');
			document.location = 'clubList.php';
			 </script>";
?>
