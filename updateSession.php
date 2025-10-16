<?php
session_start();
include ("dbconnect.php");

$sesi_id = $_POST['sesi_id'];
$sesi_name = $_POST['sesi_name'];
$sesi_intake = $_POST['sesi_intake'];

$sql = "update sesi set sesi_name='$sesi_name', sesi_intake='$sesi_intake' where sesi_id='$sesi_id' ";
$mysqli->query($sql);


echo "<script>
			alert('Club Sucessfully Updated.');
			document.location = 'sesiList.php';
			 </script>";
?>
