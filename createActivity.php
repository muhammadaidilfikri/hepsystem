<?php
session_start();
include("dbconnect.php");
include("iqfunction.php");

$token = generateToken(32);
$club_id = $_POST['club_id'];
$act_name = $_POST['act_name'];
$date_start = $_POST['date_start'];
$date_end = $_POST['date_end'];
$location = $_POST['location'];
$level_id = $_POST['level_id'];
$budget = $_POST['budget'];
$kew_id = $_POST['kew_id'];
$total_pax = $_POST['total_pax'];
$act_allow = $_POST['act_allow'];
$kod_sem = $_POST['kod_sem'];
$addedBy = $_SESSION["username"];
$date_added = date("Y/m/d H:i:s");

// AUTO-APPROVAL LOGIC: Only auto-approve Club activities (level_id = 7)
if ($level_id == 7) {
    $club_stat = 'a'; // Auto-approved
} else {
    $club_stat = 'p'; // Pending approval for other levels
}

$sql = "INSERT INTO club_activities (club_id, act_name, date_start, date_end, location, level_id, budget, kew_id, total_pax, act_allow, kod_sem, addedBy, date_added, club_stat, token) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("isssssidiisssss", $club_id, $act_name, $date_start, $date_end, $location, $level_id, $budget, $kew_id, $total_pax, $act_allow, $kod_sem, $addedBy, $date_added, $club_stat, $token);

if ($stmt->execute()) {
    echo "<script>
            alert('Activity Successfully Created.");
    if ($level_id == 7) {
        echo " Club activity has been auto-approved.";
    } else {
        echo " Activity is pending approval from HEP.";
    }
    echo "');
            document.location.href = 'myClubActivities.php'
         </script>";
} else {
    echo "<script>
            alert('Error creating activity: ".$stmt->error."');
            document.location.href = 'myClubActivities.php'
         </script>";
}
?>