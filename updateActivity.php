<?php
session_start();
include("dbconnect.php");
include("iqfunction.php");

$act_id = $_POST['act_id'];
$act_name = $_POST['act_name'];
$date_start = $_POST['date_start'];
$date_end = $_POST['date_end'];
$location = $_POST['location'];
$level_id = $_POST['level_id'];
$budget = $_POST['budget'];
$kew_id = $_POST['kew_id'];
$total_pax = $_POST['total_pax'];
$act_allow = $_POST['act_allow'] ?? null;
$token = $_POST['token'];
$addedBy = $_SESSION["username"];
$date_added = date("Y/m/d H:i:s");

// Get current activity data including level_id and status
$current_data_query = "SELECT level_id, club_stat FROM club_activities WHERE token = ?";
$stmt = $mysqli->prepare($current_data_query);
$stmt->bind_param("s", $token);
$stmt->execute();
$result = $stmt->get_result();
$current_data = $result->fetch_assoc();

$current_level_id = $current_data['level_id'];
$current_club_stat = $current_data['club_stat'];

// Smart approval logic for club activities
if ($level_id == 7) {
    // Changing TO club level - auto approve
    $club_stat = 'a';
} else {
    // Changing FROM club level to another level
    if ($current_level_id == 7 && $current_club_stat == 'a') {
        // Was club level and approved, now changing to non-club level - set to pending
        $club_stat = 'p';
    } else {
        // For other cases, keep the existing status
        $club_stat = $current_club_stat;
    }
}

$sql = "UPDATE club_activities SET kew_id=?, total_pax=?, act_name=?, date_start=?, date_end=?, location=?, level_id=?, budget=?, act_allow=?, club_stat=?, date_added=?, addedBy=? WHERE token=?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("iissssidsssss", $kew_id, $total_pax, $act_name, $date_start, $date_end, $location, $level_id, $budget, $act_allow, $club_stat, $date_added, $addedBy, $token);

if ($stmt->execute()) {
    echo "<script>
            alert('Activity Successfully Updated.');
            document.location.href = 'myClubActivities.php'
         </script>";
} else {
    echo "<script>
            alert('Error updating activity: ".$stmt->error."');
            document.location.href = 'myClubActivities.php'
         </script>";
}
?>