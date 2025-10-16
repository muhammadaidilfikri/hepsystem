<?php
session_start();
include ("dbconnect.php");

$sid = $_GET[id];

$sql = "delete from ical where id='$sid'";
$mysqli->query($sql);

echo "<script>
			alert('Data Sucessfully Deleted.');
			document.location = 'eventList.php';
			 </script>";
?>
