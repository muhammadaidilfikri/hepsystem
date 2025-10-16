<?php
session_start();
include ("dbconnect.php");

$stdNo = $_POST['stdNo'];
$timestamp2 = time()+28800;;

$sql3 = "update stdcard set card_stat='2',timestamp2='$timestamp2' where stdNo='$stdNo'";
$mysqli->query($sql3);


echo "<script>
			alert('Card Sucessfully collected.');
			document.location = 'searchCard2.php';
			 </script>";
?>
