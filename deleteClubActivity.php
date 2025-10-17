<?php
session_start();
include ("dbconnect.php");

//$act_id = $_GET["act_id"];

$token = filter_input(INPUT_GET, "act_id", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$isactive = 0;
$timestamp = date("Y-m-d H:i:s");

// $sql = "delete from club_activities  where act_id='$act_id'";

$sql = "UPDATE club_activities SET is_active = ?, deleted_at = ? WHERE token = ?";
//$mysqli->query($sql);

//$query = "select * from club_activities where act_id=? ";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("iss", $is_active, $timestamp, $token);
$stmt->execute();
//$result = $stmt->get_result();




echo "<script>
			alert('Acitivity Sucessfully Deleted.');
			document.location = 'clubActivities.php';
			 </script>";
?>
