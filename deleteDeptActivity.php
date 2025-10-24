<?php
session_start();
include ("dbconnect.php");

//$dact_id = $_GET["dact_id"];

//Check if user is logged in
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index.php");
    exit;
}

$token = filter_input(INPUT_GET, "dact_id", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$is_active = 0;
$timestamp = date("Y-m-d H:i:s");


//$sql = "delete from dept_activities  where dact_id='$dact_id'";
//$mysqli->query($sql);

// Soft delete the activity
$sql = "UPDATE dept_activities SET is_active = ?, deleted_at = ? WHERE token = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("iss", $is_active, $timestamp, $token);

if ($stmt->execute()) {
    echo "<script>
            alert('Activity Successfully Deleted.');
            document.location = 'deptActivities.php';
          </script>";
} else {
    echo "<script>
            alert('Error deleting activity.');
            document.location = 'deptActivities.php';
          </script>";
}
$stmt->close();
?>
