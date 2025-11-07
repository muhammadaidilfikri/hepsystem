<?php
session_start();
include ("dbconnect.php");
include ("iqfunction.php");

// Get active semester
$active_semester_result = mysqli_query($connection, "SELECT kod_sem FROM semesters WHERE is_active = 1 LIMIT 1");
if ($active_semester_result && mysqli_num_rows($active_semester_result) > 0) {
    $row = mysqli_fetch_assoc($active_semester_result);
    $kod_sem = $row['kod_sem'];
} else {
    echo "<script>
        alert('No active semester found. Please activate a semester first.');
        history.back();
    </script>";
    exit;
}

$token = generateToken(32);
$dact_name = $_POST['dact_name'];
$date_start = $_POST['date_start'];
$date_end = $_POST['date_end'];
$location = $_POST['location'];
$level_id = $_POST['level_id'];
$dept_id = $_POST['dept_id'];
$budget = $_POST['budget'];
$kew_id = $_POST['kew_id'];
$total_pax = $_POST['total_pax'];
$dept_allow = $_POST['dept_allow'];
$addedBy = $_SESSION["username"];
$date_added = date("Y/m/d H:i:s");

// Set status based on activity level - ONLY Mentor/Mentee activities are auto-approved
if ($level_id == 7) { // Level 7 = Mentor/Mentee
    $dept_stat = 'a'; // 'a' for approved
} else {
    $dept_stat = 'p'; // 'p' for pending (needs moderator approval)
}

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
            alert('Activity Successfully Created.";
    if ($level_id == 7) {
        echo " Club activity has been auto-approved.";
    } else {
        echo " Activity is pending approval from HEP.";
    }
    echo "');
            document.location.href = 'myDeptActivities.php'
         </script>";
} else {
    echo "<script>
            alert('Error creating activity: ".$stmt->error."');
            document.location.href = 'myDeptActivities.php'
         </script>";
}
?>