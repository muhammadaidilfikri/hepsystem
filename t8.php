<?php
session_start();
include ("dbconnect.php");

$stdNo = $_POST['stdNo'];
$timestamp = time()+28800;;

$sql3 = "insert into stdcard (stdNo,card_stat,timestamp,timestamp2) values ('$stdNo','1','$timestamp',0)";
$mysqli->query($sql3);


echo "<script>
			alert('Data Sucessfully updated.');
			document.location = 'searchCard.php';
			 </script>";
?>
