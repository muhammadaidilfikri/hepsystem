<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("dbconnect.php");
include("iqfunction.php");

$club_name  = $_POST['club_name'];
$club_obj   = $_POST['club_obj'];
$club_max   = $_POST['club_max'];
$club_stat  = $_POST['club_stat'];
$club_ws    = $_POST['club_ws'];
$club_log   = $_SESSION['username'];  // or staffID depending on your DB
$isactiveClub = 0;
$tokenClub  = generateToken(32);

$sqlInsertClub = "INSERT INTO club (club_name, club_max, club_obj, club_stat, club_log, club_ws, is_active, token) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $mysqli->prepare($sqlInsertClub);
$stmt->bind_param("ssssssss", $club_name, $club_max, $club_obj, $club_stat, $club_log, $club_ws, $isactiveClub, $tokenClub);
$stmt->execute();
$stmt->close();

$club_id = $mysqli->insert_id;

$isactiveAdvisor = 0;
$tokenAdvisor = generateToken(32);

$sqlInsertAdvisor = "INSERT INTO club_advisor (club_id, staffID, is_active, token) VALUES (?, ?, ?, ?)";
$stmt = $mysqli->prepare($sqlInsertAdvisor);
$stmt->bind_param("iiis", $club_id, $club_log, $isactiveAdvisor, $tokenAdvisor);
$stmt->execute();
$stmt->close();

echo "<script>
    alert('Record successfully submitted. HEP will review the content and contact you if needed. Thank you!');
    document.location = 'regClubList.php';
</script>";
?>
