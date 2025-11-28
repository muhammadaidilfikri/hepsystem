<?php
session_start();
include("dbconnect.php");

// Get parameters
$actreg_id = $_GET["actreg_id"] ?? '';
$activity_token = $_GET["token"] ?? ''; // Renamed to avoid confusion
$regpoint = $_GET["regpoint"] ?? '';

// Validate required parameters
if (empty($actreg_id) || empty($activity_token) || empty($regpoint)) {
    $resultSearch = "Missing required parameters.";
    $regError = 1;
    echo "<script>
            alert('Missing required parameters.');
            document.location.href = 'clubActivities.php';
          </script>";
    exit;
}

// OPTIONAL: Add additional security validation if needed
// For example, verify that the activity_token belongs to a valid activity
$activity_check = mysqli_query($connection, "SELECT act_id FROM club_activities WHERE token='$activity_token'");
if (mysqli_num_rows($activity_check) == 0) {
    $resultSearch = "Invalid activity token.";
    $regError = 1;
    echo "<script>
            alert('Invalid activity token.');
            document.location.href = 'clubActivities.php';
          </script>";
    exit;
}

// Perform the deletion
$sql = "DELETE FROM actreg WHERE actreg_id='$actreg_id'";
if ($mysqli->query($sql)) {
    $resultSearch = "Student Registration Successfully Deleted.";
    $regError = 2;
} else {
    $resultSearch = "Error deleting registration: " . $mysqli->error;
    $regError = 1;
}

// Redirect back to registration page with activity token
echo "<script>
        document.location.href = 'registerStdActivity-a.php?act_id=$activity_token&regpoint=$regpoint&resultSearch=$resultSearch&regError=$regError';
      </script>";
?>