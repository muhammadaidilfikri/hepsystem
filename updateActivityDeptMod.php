<?php
session_start();
include ("dbconnect.php");

$dact_id = $_POST['dact_id'];
$dact_name = $_POST['dact_name'];
$date_start = $_POST['date_start'];
$date_end= $_POST['date_end'];
$location = $_POST['location'];
$level_id = $_POST['level_id'];
$budget = $_POST['budget'];
$kew_id = $_POST['kew_id'];
$total_pax = $_POST['total_pax'];
$dept_allow = $_POST['dept_allow'];
$addedBy = $_SESSION["username"];
$date_added = date("Y/m/d H:i:s");
$dept_stat = $_POST['dept_stat'];

//echo $dact_id."<br>";
//echo $dact_name."<br>";
//echo $date_start."<br>";
//echo $date_end."<br>";
//echo $location."<br>";
//echo $level_id."<br>";
//echo $budget."<br>";
//echo $total_pax."<br>";
//echo $dept_allow."<br>";
//echo $addedBy."<br>";
//echo $date_added."<br>";
//echo $dept_stat."<br>";


$sql = "update dept_activities set total_pax='$total_pax', kew_id='$kew_id',dact_name='$dact_name', date_start='$date_start',date_end='$date_end', location='$location', level_id='$level_id', budget='$budget',dept_allow='$dept_allow', dept_stat='$dept_stat', date_added='$date_added',addedBy='$addedBy' where dact_id='$dact_id' ";
$mysqli->query($sql);


echo "<script>
			alert('Activity Sucessfully Updated.');
			document.location = 'deptActivities.php';
		 </script>";
?>
