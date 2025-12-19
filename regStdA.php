<?php
session_start();
include("dbconnect.php");

// Validate CSRF token
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['form_token']) {
        $resultSearch = "Security token validation failed.";
        $regError = 1;
        echo "<script>
                alert('Security token validation failed.');
                document.location.href = 'clubActivities.php';
              </script>";
        exit;
    }
    
    // Regenerate token after successful validation.
    $_SESSION['form_token'] = bin2hex(random_bytes(32));
}

// Get form data
$act_id = $_POST['act_id'] ?? '';
$rgp = $_POST['regpoint'] ?? '';
$token = $_POST['token'] ?? '';
$regType = $_POST['regType'] ?? 'single';
$date_added = date("Y/m/d H:i:s");

// Validate required fields
if (empty($act_id) || empty($rgp) || empty($token)) {
    $resultSearch = "Missing required fields.";
    $regError = 1;
    header("Location: registerStdActivity-a.php?act_id=$token&regpoint=$rgp&resultSearch=$resultSearch&regError=$regError");
    exit;
}

// Check which registration type
if ($regType === 'single') {
    // Single registration
    $stdNo = $_POST['stdNo'] ?? '';
    
    if (empty($stdNo)) {
        $resultSearch = "Please enter a student ID.";
        $regError = 1;
        header("Location: registerStdActivity-a.php?act_id=$token&regpoint=$rgp&resultSearch=$resultSearch&regError=$regError");
        exit;
    }
    
    // Process single registration
    $result = processSingleRegistration($stdNo, $act_id, $rgp, $token, $date_added);
    
} else {
    // Bulk registration
    $bulkInput = $_POST['bulkStdNo'] ?? '';
    
    if (empty($bulkInput)) {
        $resultSearch = "Please enter student IDs for bulk registration.";
        $regError = 1;
        header("Location: registerStdActivity-a.php?act_id=$token&regpoint=$rgp&resultSearch=$resultSearch&regError=$regError");
        exit;
    }
    
    // Process bulk registration
    $result = processBulkRegistration($bulkInput, $act_id, $rgp, $token, $date_added);
}

// Redirect back with result
header("Location: registerStdActivity-a.php?act_id=$token&regpoint=$rgp&resultSearch=" . urlencode($result['message']) . "&regError=" . $result['error']);
exit;

// Function to process single registration
function processSingleRegistration($stdNo, $act_id, $rgp, $token, $date_added) {
    global $connection;
    
    // Clean the student ID
    $stdNo = trim($stdNo);
    
    // Check if student exists
    $query = "SELECT * FROM student WHERE stdNo='$stdNo'";
    $result = mysqli_query($connection, $query);
    
    if (!$result || mysqli_num_rows($result) == 0) {
        return [
            'message' => "Error!! Student ID '$stdNo' not found in database.",
            'error' => 1
        ];
    }
    
    // Check if student is already registered in ANY role for this activity
    $query1 = "SELECT * FROM actreg WHERE stdNo='$stdNo' AND act_id='$act_id'";
    $result1 = mysqli_query($connection, $query1);
    
    if (mysqli_num_rows($result1) > 0) {
        $existing_reg = mysqli_fetch_assoc($result1);
        $existing_role = $existing_reg['regpoint'];
        
        if ($existing_role == 'a') {
            $role_name = "Audience";
        } else if ($existing_role == 'p') {
            $role_name = "Contestant";
        } else if ($existing_role == 'c') {
            $role_name = "Committee";
        } else {
            $role_name = "Participant";
        }
        
        return [
            'message' => "Error!! Student $stdNo is already registered as $role_name for this activity.",
            'error' => 1
        ];
    }
    
    // Insert registration
    $sql = "INSERT INTO actreg (stdNo, act_id, regpoint, datereg) VALUES ('$stdNo', '$act_id', '$rgp', '$date_added')";
    
    if (mysqli_query($connection, $sql)) {
        return [
            'message' => "Student $stdNo successfully registered as " . getRoleName($rgp),
            'error' => 2
        ];
    } else {
        return [
            'message' => "Error!! Database error: " . mysqli_error($connection),
            'error' => 1
        ];
    }
}

// Function to process bulk registration
function processBulkRegistration($bulkInput, $act_id, $rgp, $token, $date_added) {
    global $connection;
    
    // Parse the bulk input
    $studentIds = parseBulkInput($bulkInput);
    
    if (empty($studentIds)) {
        return [
            'message' => "Error!! No valid student IDs found in the input.",
            'error' => 1
        ];
    }
    
    $successCount = 0;
    $errorCount = 0;
    $errorMessages = [];
    
    foreach ($studentIds as $stdNo) {
        $stdNo = trim($stdNo);
        
        // Skip empty entries
        if (empty($stdNo)) {
            continue;
        }
        
        // Check if student exists
        $query = "SELECT * FROM student WHERE stdNo='$stdNo'";
        $result = mysqli_query($connection, $query);
        
        if (!$result || mysqli_num_rows($result) == 0) {
            $errorCount++;
            $errorMessages[] = "Student ID '$stdNo' not found";
            continue;
        }
        
        // Check if already registered
        $query1 = "SELECT * FROM actreg WHERE stdNo='$stdNo' AND act_id='$act_id'";
        $result1 = mysqli_query($connection, $query1);
        
        if (mysqli_num_rows($result1) > 0) {
            $errorCount++;
            $errorMessages[] = "Student '$stdNo' already registered";
            continue;
        }
        
        // Insert registration
        $sql = "INSERT INTO actreg (stdNo, act_id, regpoint, datereg) VALUES ('$stdNo', '$act_id', '$rgp', '$date_added')";
        
        if (mysqli_query($connection, $sql)) {
            $successCount++;
        } else {
            $errorCount++;
            $errorMessages[] = "Failed to register student '$stdNo': " . mysqli_error($connection);
        }
    }
    
    // Prepare result message
    $message = "Bulk Registration Results:\n\n";
    $message .= "Successfully registered: $successCount student(s)\n";
    $message .= "Failed: $errorCount student(s)\n";
    
    if ($errorCount > 0) {
        $message .= "\nErrors:\n";
        $message .= implode("\n", array_slice($errorMessages, 0, 5));
        if (count($errorMessages) > 5) {
            $message .= "\n... and " . (count($errorMessages) - 5) . " more errors";
        }
    }
    
    if ($successCount > 0) {
        return [
            'message' => $message,
            'error' => 2
        ];
    } else {
        return [
            'message' => $message,
            'error' => 1
        ];
    }
}

// Function to parse bulk input
function parseBulkInput($input) {
    // Split by new lines, commas, semicolons, spaces, tabs
    $lines = preg_split('/[\n\r,;\s]+/', $input);
    
    $studentIds = [];
    foreach ($lines as $line) {
        $id = trim($line);
        // Remove any non-alphanumeric characters (keep only letters and numbers)
        $id = preg_replace('/[^a-zA-Z0-9]/', '', $id);
        
        if (!empty($id)) {
            $studentIds[] = $id;
        }
    }
    
    // Remove duplicates
    $studentIds = array_unique($studentIds);
    
    return $studentIds;
}

// Function to get role name
function getRoleName($rgp) {
    if ($rgp == 'a') {
        return "Audience";
    } else if ($rgp == 'p') {
        return "Contestant";
    } else if ($rgp == 'c') {
        return "Committee";
    } else {
        return "Participant";
    }
}