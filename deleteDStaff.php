<?php
session_start();
include ("dbconnect.php");

$dad_id = $_GET["dad_id"];

$sql = "delete from dept_advisor where dad_id='$dad_id'";
$mysqli->query($sql);

echo "<script>
			alert('Club Sucessfully Deleted.');
			document.location = 'depList.php';
			 </script>";
?>
