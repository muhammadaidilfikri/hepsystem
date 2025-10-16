<?php
session_start();
include ("dbconnect.php");

$dact_name = $_POST['dact_name'];
$dept_id= $_POST['dept_id'];
$date_start = $_POST['date_start'];
$date_end= $_POST['date_end'];
$location = $_POST['location'];
$level_id = $_POST['level_id'];
$budget = $_POST['budget'];
$total_pax = $_POST['total_pax'];
$dept_allow = $_POST['dept_allow'];
$addedBy = $_SESSION["username"];
$date_added = date("Y/m/d H:i:s");
$dept_stat = $_POST['dept_stat'];


$sql2 = "insert into dept_activities (dept_id,dact_name,date_start,date_end,location,level_id,total_pax,budget,dept_stat,dept_allow,addedBy,date_added) values ('$dept_id', '$dact_name','$date_start','$date_end','$location','$level_id','$total_pax','$budget','$dept_stat','$dept_allow','$addedBy','$date_added')";
$mysqli->query($sql2) or die($mysqli -> error);

echo "<script>
			alert('Activity Sucessfully created.');
			document.location = 'deptActivities.php';
	 </script>";
?>
