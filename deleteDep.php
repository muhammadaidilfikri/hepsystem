<?php
session_start();
include ("dbconnect.php");

$sid = $_GET["dept_id"];

$sql = "delete from dept where dept_id='$sid'";
$mysqli->query($sql);

echo "<script>
			alert('Club Sucessfully Deleted.');
			document.location = 'depList.php';
			 </script>";
?>
