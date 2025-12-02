<?php
session_start();
include("dbconnect.php");

// Get parameters
$dactreg_id = $_GET["dactreg_id"] ?? '';
$token = $_GET["token"] ?? '';
$regpoint = $_GET["regpoint"] ?? '';

// Validate required parameters
if (empty($dactreg_id) || empty($token) || empty($regpoint)) {
    $resultSearch = "Missing required parameters.";
    $regError = 1;
    echo "<script>
            alert('Missing required parameters.');
            document.location.href = 'deptActivities.php';
          </script>";
    exit;
}

// Optional: Verify that the token belongs to a valid activity
$activity_check = mysqli_query($mysqli, "SELECT dact_id FROM dept_activities WHERE token='$token'");
if (mysqli_num_rows($activity_check) == 0) {
    $resultSearch = "Invalid activity token.";
    $regError = 1;
    echo "<script>
            alert('Invalid activity token.');
            document.location.href = 'deptActivities.php';
          </script>";
    exit;
}

// Perform the deletion
$sql = "DELETE FROM dactreg WHERE dactreg_id='$dactreg_id'";
if ($mysqli->query($sql)) {
    $resultSearch = "Student Registration Successfully Deleted.";
    $regError = 2;
} else {
    $resultSearch = "Error deleting registration: " . $mysqli->error;
    $regError = 1;
}

// Redirect back to registration page with token
echo "<script>
        document.location.href = 'registerStdActivity-b.php?dact_id=$token&regpoint=$regpoint&resultSearch=$resultSearch&regError=$regError';
      </script>";
?>