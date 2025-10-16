<?php
session_start();
include ("dbconnect.php");

$sesi_name = $_POST['sesi_name'];
$sesi_intake= $_POST['sesi_intake'];


$sql = "insert into sesi (sesi_name,sesi_intake) values ('$sesi_name','$sesi_intake')";
$mysqli->query($sql);

echo "<script>
			alert('Record Sucessfully updated.');
			document.location = 'sesiList.php';
			 </script>";
?>
