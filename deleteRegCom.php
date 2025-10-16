<?php
session_start();
include ("dbconnect.php");

$regcom_id = $_GET["regcom_id"];


$sql = "delete from regcom where regcom_id='$regcom_id'";
$mysqli->query($sql);

$resultSearch = "Student Registration Sucessfully Deleted.";
$regError = 1;

echo "<script>
			document.location.href = 'regCom.php?resultSearch=$resultSearch&regError=$regError';
			 </script>";
?>
