<?php
session_start();
include ("dbconnect.php");

$dact_name = $_POST['dact_name'];
$date_start = $_POST['date_start'];
$date_end= $_POST['date_end'];
$location = $_POST['location'];
$level_id = $_POST['level_id'];
$dept_id = $_POST['dept_id'];
$budget = $_POST['budget'];
$kew_id = $_POST['kew_id'];
$total_pax = $_POST['total_pax'];
$dept_allow = $_POST['dept_allow'];
$addedBy = $_SESSION["username"];
$date_added = date("Y/m/d H:i:s");


if ($level_id=='7')
{
	$dept_stat='a';
}
else {
	$dept_stat='p';
}


$sql2 = "insert into dept_activities (kew_id,dept_id,dact_name,date_start,date_end,location,level_id,total_pax,budget,dept_stat,dept_allow,addedBy,date_added) values ('$kew_id','$dept_id', '$dact_name','$date_start','$date_end','$location','$level_id','$total_pax','$budget','$dept_stat','$dept_allow','$addedBy','$date_added')";
$mysqli->query($sql2) or die($mysqli -> error);

echo "<script>
			alert('Activity Sucessfully created.');
			document.location = 'myDeptActivities.php';
	 </script>";
?>
