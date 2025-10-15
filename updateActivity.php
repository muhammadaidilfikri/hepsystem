<?php
session_start();
include ("dbconnect.php");

$act_id = $_POST['act_id'];
$act_name = $_POST['act_name'];
$date_start = $_POST['date_start'];
$date_end= $_POST['date_end'];
$location = $_POST['location'];
$level_id = $_POST['level_id'];
$budget = $_POST['budget'];
$kew_id = $_POST['kew_id'];
$total_pax = $_POST['total_pax'];
$act_allow = $_POST['act_allow'];
$addedBy = $_SESSION["username"];
$date_added = date("Y/m/d H:i:s");

if ($level_id=='7')
{
	$club_stat='a';
}
else {
	$club_stat='p';
}

//echo $act_id."<br>";
//echo $act_name."<br>";
//echo $date_start."<br>";
//echo $date_end."<br>";
//echo $location."<br>";
//echo $level_id."<br>";
//echo $budget."<br>";
//echo $total_pax."<br>";
//echo $act_allow."<br>";
//echo $addedBy."<br>";
//echo $date_added."<br>";
//echo $club_stat."<br>";


$sql = "update club_activities set total_pax='$total_pax', kew_id='$kew_id', act_name='$act_name', date_start='$date_start',date_end='$date_end', location='$location', level_id='$level_id', budget='$budget',act_allow='$act_allow', club_stat='$club_stat', date_added='$date_added',addedBy='$addedBy' where act_id='$act_id' ";
$mysqli->query($sql);


echo "<script>
			alert('Activity Sucessfully Updated.');
			document.location = 'myclubActivities.php';
		 </script>";
?>
