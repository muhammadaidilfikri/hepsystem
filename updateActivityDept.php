<?php
session_start();
include("dbconnect.php");
include("iqfunction.php");

$dact_id = $_POST['dact_id'];
$dact_name = $_POST['dact_name'];
$date_start = $_POST['date_start'];
$date_end = $_POST['date_end'];
$location = $_POST['location'];
$level_id = $_POST['level_id'];
$budget = $_POST['budget'];
$kew_id = $_POST['kew_id'];
$total_pax = $_POST['total_pax'];
$dept_allow = $_POST['dept_allow'];
$token = $_POST['token'];
$addedBy = $_SESSION["username"];
$date_added = date("Y/m/d H:i:s");

// Get current activity data including level_id and status
$current_data_query = "SELECT level_id, dept_stat FROM dept_activities WHERE token = ?";
$stmt = $mysqli->prepare($current_data_query);
$stmt->bind_param("s", $token);
$stmt->execute();
$result = $stmt->get_result();
$current_data = $result->fetch_assoc();

$current_level_id = $current_data['level_id'];
$current_dept_stat = $current_data['dept_stat'];

// Smart approval logic
if ($level_id == 7) {
    // Changing TO mentor/mentee - auto approve
    $dept_stat = 'a';
} else {
    // Changing FROM mentor/mentee to another level
    if ($current_level_id == 7 && $current_dept_stat == 'a') {
        // Was mentor/mentee and approved, now changing to non-mentor/mentee - set to pending
        $dept_stat = 'p';
    } else {
        // For other cases, keep the existing status
        $dept_stat = $current_dept_stat;
    }
}

$sql = "UPDATE dept_activities SET kew_id=?, total_pax=?, dact_name=?, date_start=?, date_end=?, location=?, level_id=?, budget=?, dept_allow=?, dept_stat=?, date_added=?, addedBy=? WHERE token=?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("iissssidsssss", $kew_id, $total_pax, $dact_name, $date_start, $date_end, $location, $level_id, $budget, $dept_allow, $dept_stat, $date_added, $addedBy, $token);

if ($stmt->execute()) {
    echo "<script>
            alert('Activity Successfully Updated.');
            document.location.href = 'myDeptActivities.php'
         </script>";
} else {
    echo "<script>
            alert('Error updating activity: ".$stmt->error."');
            document.location.href = 'myDeptActivities.php'
         </script>";
}
?>