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
    
    // Regenerate token after successful validation
    $_SESSION['form_token'] = bin2hex(random_bytes(32));
}

// Get form data
$stdNo = $_POST['stdNo'] ?? '';
$act_id = $_POST['act_id'] ?? '';
$rgp = $_POST['regpoint'] ?? '';
$token = $_POST['token'] ?? ''; // Get the token for redirect
$date_added = date("Y/m/d H:i:s");

// Validate required fields
if (empty($stdNo) || empty($act_id) || empty($rgp)) {
    $resultSearch = "Missing required fields.";
    $regError = 1;
    echo "<script>
            document.location.href = 'registerStdActivity-a.php?act_id=$token&regpoint=$rgp&resultSearch=$resultSearch&regError=$regError';
          </script>";
    exit;
}

$query = "SELECT * FROM student WHERE stdNo='$stdNo'";
$result = $mysqli->query($query);

if (mysqli_num_rows($result) == 0) {
    $resultSearch = "Error!! Such no student in Pusat Asasi";
    $regError = 1;

    echo "<script>
            document.location.href = 'registerStdActivity-a.php?act_id=$token&regpoint=$rgp&resultSearch=$resultSearch&regError=$regError';
          </script>";
} else {
    // Check if student is already registered in ANY role for this activity
    $query1 = "SELECT * FROM actreg WHERE stdNo='$stdNo' AND act_id='$act_id'";
    $result1 = $mysqli->query($query1);
    
    if (mysqli_num_rows($result1) > 0) {
        // Student is already registered in some role
        $existing_reg = mysqli_fetch_assoc($result1);
        $existing_role = $existing_reg['regpoint'];
        
        // Determine role name for message
        if ($existing_role == 'a') {
            $role_name = "Audience";
        } else if ($existing_role == 'p') {
            $role_name = "Contestant";
        } else if ($existing_role == 'c') {
            $role_name = "Committee";
        } else {
            $role_name = "Participant";
        }
        
        $resultSearch = "Error!! Student is already registered as $role_name for this activity. Each student can only have one role per activity.";
        $regError = 1;
        echo "<script>
                document.location.href = 'registerStdActivity-a.php?act_id=$token&regpoint=$rgp&resultSearch=$resultSearch&regError=$regError';
              </script>";
    } else {
        // Student is not registered yet, proceed with insertion
        $resultSearch = "Student successfully registered";
        $regError = 2;
        $sql = "INSERT INTO actreg (stdNo, act_id, regpoint, datereg) VALUES ('$stdNo', '$act_id', '$rgp', '$date_added')";
        
        if ($mysqli->query($sql)) {
            echo "<script>
                    document.location.href = 'registerStdActivity-a.php?act_id=$token&regpoint=$rgp&resultSearch=$resultSearch&regError=$regError';
                  </script>";
        } else {
            $resultSearch = "Error!! Database error: " . $mysqli->error;
            $regError = 1;
            echo "<script>
                    document.location.href = 'registerStdActivity-a.php?act_id=$token&regpoint=$rgp&resultSearch=$resultSearch&regError=$regError';
                  </script>";
        }
    }
}
?>