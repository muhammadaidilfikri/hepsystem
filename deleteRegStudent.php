<?php
session_start();
include ("dbconnect.php");

$actreg_id = $_GET["actreg_id"];
$act_id = $_GET["act_id"];
$regpoint = $_GET["regpoint"];

$sql = "delete from actreg where actreg_id='$actreg_id'";
$mysqli->query($sql);

$resultSearch = "Student Registration Sucessfully Deleted.";
$regError = 1;

echo "<script>
			document.location.href = 'registerStdActivity-a.php?act_id=$act_id&regpoint=$regpoint&resultSearch=$resultSearch&regError=$regError';
			 </script>";
?>
