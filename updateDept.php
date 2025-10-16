<?php
session_start();
include ("dbconnect.php");

$dept_id = $_POST['dept_id'];
$dept_name = $_POST['dept_name'];
$dept_acro= $_POST['dept_acro'];


$sql = "update dept set dept_name='$dept_name', dept_acro='$dept_acro' where dept_id='$dept_id' ";
$mysqli->query($sql);


echo "<script>
			alert('Club Sucessfully Updated.');
			document.location = 'depList.php';
			 </script>";
?>
