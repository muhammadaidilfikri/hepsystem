<?php
session_start();
include ("dbconnect.php");

$fileNum = $_POST['fileNum'];
$stdNo = $_POST['stdNo'];
$timestamp = time()+28800;;

$sql = "delete from stdfile where stdNo='$stdNo'";
$mysqli->query($sql);
$sql3 = "insert into stdfile (stdNo,fileNum,timestamp) values ('$stdNo','$fileNum','$timestamp')";
$mysqli->query($sql3);


echo "<script>
			alert('Data Sucessfully updated.');
			document.location = 'searchFileBox.php';
			 </script>";
?>
