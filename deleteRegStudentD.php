<?php
session_start();
include ("dbconnect.php");

$dactreg_id = $_GET["dactreg_id"];
$dact_id = $_GET["dact_id"];
$regpoint = $_GET["regpoint"];

$sql = "delete from dactreg where dactreg_id='$dactreg_id'";
$mysqli->query($sql);

$resultSearch = "Student Registration Sucessfully Deleted.";
$regError = 1;

echo "<script>
			document.location.href = 'registerStdActivity-b.php?dact_id=$dact_id&regpoint=$regpoint&resultSearch=$resultSearch&regError=$regError';
			 </script>";
?>
