<?php
session_start();
include ("dbconnect.php");

$eventname = $_POST['eventname'];
$date_start = $_POST['date_start'];
$date_end= $_POST['date_end'];
$statz = $_POST['statz'];
$dept = $_POST['dept'];
$ssid = $_SESSION[username];

$sql2 = "insert into ical (eventname,date_start,date_end,status,dept,addedBy) values ('$eventname','$date_start','$date_end','$statz','$dept','$ssid')";
$mysqli->query($sql2);

echo "<script>
			alert('Data Sucessfully updated.');
			document.location = 'eventList.php';
	 </script>";
?>
