<?php
session_start();
include ("dbconnect.php");

// Check if user is logged in
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

// Get and validate parameters
$dad_id = filter_input(INPUT_GET, 'dad_id', FILTER_VALIDATE_INT);
$dept_id = filter_input(INPUT_GET, 'dept_id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

if (!$dad_id) {
    // Just redirect back without message
    $redirect = isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER']) 
                ? $_SERVER['HTTP_REFERER'] 
                : 'depList.php';
    header('Location: ' . $redirect);
    exit;
}

// Update the staff status to active
$sql = "UPDATE dept_advisor SET is_active = 1 WHERE dad_id = ?";
$stmt = $mysqli->prepare($sql);

if ($stmt) {
    $stmt->bind_param("i", $dad_id);

    if ($stmt->execute()) {
        // Get department token for redirection
        include("iqfunction.php");
        $dept_token = getDeptToken($dept_id);
        
        // Build redirect URL WITHOUT any message
        $redirect = isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER']) 
                    ? $_SERVER['HTTP_REFERER'] 
                    : ('addDeptStaff.php?dept_id=' . urlencode($dept_token));
        
        header('Location: ' . $redirect);
        exit;
    } else {
        // Just redirect back on error
        $redirect = isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER']) 
                    ? $_SERVER['HTTP_REFERER'] 
                    : 'depList.php';
        header('Location: ' . $redirect);
        exit;
    }

    $stmt->close();
} else {
    // Just redirect back on database error
    $redirect = isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER']) 
                ? $_SERVER['HTTP_REFERER'] 
                : 'depList.php';
    header('Location: ' . $redirect);
    exit;
}
?>