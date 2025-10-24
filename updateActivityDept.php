<?php
session_start();
include ("dbconnect.php");
include ("iqfunction.php");

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
$token = generateToken(32);
$addedBy = $_SESSION["username"];
$date_added = date("Y/m/d H:i:s");


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
//echo $kew_id."<br>";

$query = "select * from dept_activities where dact_id=? ";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("i", $dact_id);
$stmt->execute();
$result = $stmt->get_result();


if ($result->num_rows == 0) {
    echo "<script>
            alert('Error!! Activity not found');
            document.location.href = 'myDeptActivities.php'
         </script>";
}
else {
    $sql = "update dept_activities set kew_id=?, total_pax=?, dact_name=?, date_start=?, date_end=?, location=?, level_id=?, budget=?, dept_allow=?, dept_stat=?, date_added=?, addedBy=?, token=? where dact_id=?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("iissssidsssssi", $kew_id, $total_pax, $dact_name, $date_start, $date_end, $location, $level_id, $budget, $dept_allow, $dept_stat, $date_added, $addedBy, $token, $dact_id);
    $stmt->execute();

    echo "<script>
            alert('Activity Successfully Updated.');
            document.location.href = 'myDeptActivities.php'
         </script>";
}
?>
