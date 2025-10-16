<?php
session_start();
include ("dbconnect.php");

$eventname = $_POST['eventname'];
$date_start = $_POST['date_start'];
$date_end= $_POST['date_end'];
$statz = $_POST['statz'];
$dept = $_POST['dept'];
$ssid = $_SESSION[username];
$id=$_POST['id'];

$sql2 = "update ical  set eventname='$eventname',date_start='$date_start',date_end='$date_end',status='$statz',dept='$dept',addedBy='$ssid' where id='$id'";
$mysqli->query($sql2) or die($mysqli -> error);

echo "<script>
			alert('Data Sucessfully updated.');
			document.location = 'eventList.php';
	 </script>";
?>
