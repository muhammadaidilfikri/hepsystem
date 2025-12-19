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
                document.location.href = 'deptActivities.php';
              </script>";
        exit;
    }
    
    // Regenerate token after successful validation
    $_SESSION['form_token'] = bin2hex(random_bytes(32));
}

// Get form data
$dact_id = $_POST['dact_id'] ?? '';
$rgp = $_POST['regpoint'] ?? '';
$token = $_POST['token'] ?? '';
$regType = $_POST['regType'] ?? 'single';
$date_added = date("Y/m/d H:i:s");

// Validate required fields
if (empty($dact_id) || empty($rgp) || empty($token)) {
    $resultSearch = "Missing required fields.";
    $regError = 1;
    header("Location: registerStdActivity-b.php?dact_id=$token&regpoint=$rgp&resultSearch=$resultSearch&regError=$regError");
    exit;
}

// Check which registration type
if ($regType === 'single') {
    // Single registration
    $stdNo = $_POST['stdNo'] ?? '';
    
    if (empty($stdNo)) {
        $resultSearch = "Please enter a student ID.";
        $regError = 1;
        header("Location: registerStdActivity-b.php?dact_id=$token&regpoint=$rgp&resultSearch=$resultSearch&regError=$regError");
        exit;
    }
    
    // Process single registration
    $result = processSingleRegistration($stdNo, $dact_id, $rgp, $token, $date_added);
    
} else {
    // Bulk registration
    $bulkInput = $_POST['bulkStdNo'] ?? '';
    
    if (empty($bulkInput)) {
        $resultSearch = "Please enter student IDs for bulk registration.";
        $regError = 1;
        header("Location: registerStdActivity-b.php?dact_id=$token&regpoint=$rgp&resultSearch=$resultSearch&regError=$regError");
        exit;
    }
    
    // Process bulk registration
    $result = processBulkRegistration($bulkInput, $dact_id, $rgp, $token, $date_added);
}

// Redirect back with result
header("Location: registerStdActivity-b.php?dact_id=$token&regpoint=$rgp&resultSearch=" . urlencode($result['message']) . "&regError=" . $result['error']);
exit;

// Function to process single registration
function processSingleRegistration($stdNo, $dact_id, $rgp, $token, $date_added) {
    global $mysqli;
    
    // Clean the student ID
    $stdNo = trim($stdNo);
    
    // Check if student exists
    $query = "SELECT * FROM student WHERE stdNo='$stdNo'";
    $result = $mysqli->query($query);
    
    if (!$result || $result->num_rows == 0) {
        return [
            'message' => "Error!! Student ID '$stdNo' not found in database.",
            'error' => 1
        ];
    }
    
    // Check if student is already registered in THIS ROLE for this activity
    $query1 = "SELECT * FROM dactreg WHERE stdNo='$stdNo' AND dact_id='$dact_id' AND regpoint='$rgp'";
    $result1 = $mysqli->query($query1);
    
    if ($result1->num_rows > 0) {
        return [
            'message' => "Error!! Student $stdNo is already registered as " . getRoleName($rgp) . " for this activity.",
            'error' => 1
        ];
    }
    
    // Insert registration
    $sql = "INSERT INTO dactreg (stdNo, dact_id, regpoint, datereg) VALUES ('$stdNo', '$dact_id', '$rgp', '$date_added')";
    
    if ($mysqli->query($sql)) {
        return [
            'message' => "Student $stdNo successfully registered as " . getRoleName($rgp),
            'error' => 2
        ];
    } else {
        return [
            'message' => "Error!! Database error: " . $mysqli->error,
            'error' => 1
        ];
    }
}

// Function to process bulk registration
function processBulkRegistration($bulkInput, $dact_id, $rgp, $token, $date_added) {
    global $mysqli;
    
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
        $result = $mysqli->query($query);
        
        if (!$result || $result->num_rows == 0) {
            $errorCount++;
            $errorMessages[] = "Student ID '$stdNo' not found";
            continue;
        }
        
        // Check if already registered in this role
        $query1 = "SELECT * FROM dactreg WHERE stdNo='$stdNo' AND dact_id='$dact_id' AND regpoint='$rgp'";
        $result1 = $mysqli->query($query1);
        
        if ($result1->num_rows > 0) {
            $errorCount++;
            $errorMessages[] = "Student '$stdNo' already registered as " . getRoleName($rgp);
            continue;
        }
        
        // Insert registration
        $sql = "INSERT INTO dactreg (stdNo, dact_id, regpoint, datereg) VALUES ('$stdNo', '$dact_id', '$rgp', '$date_added')";
        
        if ($mysqli->query($sql)) {
            $successCount++;
        } else {
            $errorCount++;
            $errorMessages[] = "Failed to register student '$stdNo': " . $mysqli->error;
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
    // Split by new lines, commas, semicolons, spaces, tabs.
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