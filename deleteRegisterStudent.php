<?php
session_start();
include ("dbconnect.php");

$reg_id = $_GET["reg_id"];
$club_id = $_GET["club_id"];

$sql = "delete from club_registration where reg_id='$reg_id'";
$mysqli->query($sql);

$resultSearch = "Student Registration Sucessfully Deleted.";
$regError = 1;

echo "<script>
			document.location.href = 'addStudent.php?club_id=$club_id&resultSearch=$resultSearch&regError=$regError';
			 </script>";
?>
