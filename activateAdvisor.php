<?php
session_start();
include ("dbconnect.php");

// Check if user is logged in
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

// Get and validate parameters
$ad_id = filter_input(INPUT_GET, 'ad_id', FILTER_VALIDATE_INT);
$club_id = filter_input(INPUT_GET, 'club_id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

if (!$ad_id) {
    echo "<script>alert('Invalid advisor id.'); history.back();</script>";
    exit;
}

// Update the advisor status to active
$sql = "UPDATE club_advisor SET is_active = 1 WHERE ad_id = ?";
$stmt = $mysqli->prepare($sql);

if ($stmt) {
    $stmt->bind_param("i", $ad_id);

    if ($stmt->execute()) {
        // Build redirect target (referer fallback) and append a message param for simple success handling
        $redirect = isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : ('addClubAdvisor.php?club_id=' . urlencode($club_id));
        $msg = urlencode('Club Advisor Successfully Activated.');
        if (strpos($redirect, '?') !== false) {
            $redirect .= '&msg=' . $msg;
        } else {
            $redirect .= '?msg=' . $msg;
        }
        header('Location: ' . $redirect);
        exit;
    } else {
        echo "<script>alert('Error activating advisor.'); history.back();</script>";
    }

    $stmt->close();
} else {
    echo "<script>alert('Database error.'); history.back();</script>";
}
?>