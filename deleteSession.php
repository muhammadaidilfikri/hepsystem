<?php
session_start();
include ("dbconnect.php");

$sid = $_GET["sesi_id"];

$sql = "delete from sesi where sesi_id='$sid'";
$mysqli->query($sql);

echo "<script>
			alert('Club Sucessfully Deleted.');
			document.location = 'sesiList.php';
			 </script>";
?>
