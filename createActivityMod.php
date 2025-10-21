<?php
session_start();
include ("dbconnect.php");
include ("iqfunction.php");

// Get form data
$token = generateToken(32);
$act_name = $_POST['act_name'];
$date_start = $_POST['date_start'];
$date_end = $_POST['date_end'];
$location = $_POST['location'];
$level_id = $_POST['level_id'];
$club_id = $_POST['club_id'];
$budget = $_POST['budget'];
$total_pax = $_POST['total_pax'];
$act_allow = $_POST['act_allow'];
$addedBy = $_SESSION["username"];
$date_added = date("Y/m/d H:i:s");
$club_stat = $_POST['club_stat'];
$kew_id = $_POST['kew_id'];
$kod_sem = $_POST['kod_sem'];

// Use prepared statement to prevent SQL injection
$sql2 = "INSERT INTO club_activities (club_id, act_name, date_start, date_end, location, level_id, total_pax, budget, club_stat, act_allow, addedBy, date_added, kew_id, kod_sem, token) 
         VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $mysqli->prepare($sql2);
$stmt->bind_param("issssiidssssiis", 
    $club_id, $act_name, $date_start, $date_end, $location, 
    $level_id, $total_pax, $budget, $club_stat, $act_allow, 
    $addedBy, $date_added, $kew_id, $kod_sem, $token
);

if ($stmt->execute()) {
    echo "<script>
        alert('Activity Successfully created.');
        document.location = 'clubActivities.php';
    </script>";
} else {
    echo "<script>
        alert('Error creating activity: " . addslashes($stmt->error) . "');
        history.back();
    </script>";
}

$stmt->close();
?>