<?php
session_start();
include ("dbconnect.php");

$dept_name = $_POST['dept_name'];
$dept_acro= $_POST['dept_acro'];

$sql = "insert into dept (dept_name,dept_acro) values ('$dept_name','$dept_acro')";
$mysqli->query($sql);

echo "<script>
			alert('Record Sucessfully updated.');
			document.location = 'depList.php';
			 </script>";
?>
