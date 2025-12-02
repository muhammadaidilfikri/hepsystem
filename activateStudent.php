<?php
session_start();
include ("dbconnect.php");

// Check if user is logged in
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php"); 
    exit;
}

// Get and validate parameters
$reg_id = filter_input(INPUT_GET, 'reg_id', FILTER_VALIDATE_INT);
$club_id = filter_input(INPUT_GET, 'club_id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

if (!$reg_id) {
    echo "<script>alert('Invalid registration id.'); history.back();</script>";
    exit;
}

// Update the student status to active
$sql = "UPDATE club_registration SET is_active = 1 WHERE reg_id = ?";
$stmt = $mysqli->prepare($sql);

if ($stmt) {
    $stmt->bind_param("i", $reg_id);

    if ($stmt->execute()) {
        // Success - redirect back with success message
        $redirect = isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : ('regStudent.php?club_id=' . urlencode($club_id));
        $msg = urlencode('Student Successfully Activated.');
        $separator = (strpos($redirect, '?') !== false) ? '&' : '?';
        header('Location: ' . $redirect . $separator . 'msg=' . $msg);
        exit;
    } else {
        echo "<script>alert('Error activating student.'); history.back();</script>";
    }
    $stmt->close();
} else {
    echo "<script>alert('Database error.'); history.back();</script>";
}
?>