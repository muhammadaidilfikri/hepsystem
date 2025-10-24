<?php
session_start();
include ("dbconnect.php");
include ("iqfunction.php");

$token = generateToken(32);
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

$sql2 = "INSERT INTO dept_activities (dept_id, dact_name, date_start, date_end, location, level_id, total_pax, budget, dept_stat, dept_allow, addedBy, date_added, kew_id, kod_sem, token) 
         VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $mysqli->prepare($sql2);
$stmt->bind_param("issssiidssssiis", 
    $dept_id, $dact_name, $date_start, $date_end, $location, 
    $level_id, $total_pax, $budget, $dept_stat, $dept_allow, 
    $addedBy, $date_added, $kew_id, $kod_sem, $token
);



if ($stmt->execute()) {
    echo "<script>
        alert('Activity Successfully created.');
        window.location.href = 'myDeptActivities.php';
    </script>";
} else {
    echo "<script>
        alert('Error creating activity.');
        history.back();
    </script>";
}

$stmt->close();
?>
