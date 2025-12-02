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
$stdNo = $_POST['stdNo'] ?? '';
$dact_id = $_POST['dact_id'] ?? '';
$rgp = $_POST['regpoint'] ?? '';
$token = $_POST['token'] ?? ''; // Get the token for redirect
$date_added = date("Y/m/d H:i:s");

// Validate required fields
if (empty($stdNo) || empty($dact_id) || empty($rgp)) {
    $resultSearch = "Missing required fields.";
    $regError = 1;
    echo "<script>
            document.location.href = 'registerStdActivity-b.php?dact_id=$token&regpoint=$rgp&resultSearch=$resultSearch&regError=$regError';
          </script>";
    exit;
}

$query = "SELECT * FROM student WHERE stdNo='$stdNo'";
$result = $mysqli->query($query);

if (mysqli_num_rows($result) == 0) {
    $resultSearch = "Error!! Such no student in Pusat Asasi";
    $regError = 1;

    echo "<script>
            document.location.href = 'registerStdActivity-b.php?dact_id=$token&regpoint=$rgp&resultSearch=$resultSearch&regError=$regError';
          </script>";
} else {
    $query1 = "SELECT * FROM dactreg WHERE stdNo='$stdNo' AND dact_id='$dact_id' AND regpoint='$rgp'";
    $result1 = $mysqli->query($query1);
    
    if (mysqli_num_rows($result1) == 0) {
        $resultSearch = "Student successfully registered";
        $regError = 2;
        $sql = "INSERT INTO dactreg (stdNo, dact_id, regpoint, datereg) VALUES ('$stdNo', '$dact_id', '$rgp', '$date_added')";
        
        if ($mysqli->query($sql)) {
            echo "<script>
                    document.location.href = 'registerStdActivity-b.php?dact_id=$token&regpoint=$rgp&resultSearch=$resultSearch&regError=$regError';
                  </script>";
        } else {
            $resultSearch = "Error!! Database error: " . $mysqli->error;
            $regError = 1;
            echo "<script>
                    document.location.href = 'registerStdActivity-b.php?dact_id=$token&regpoint=$rgp&resultSearch=$resultSearch&regError=$regError';
                  </script>";
        }
    } else {
        $resultSearch = "Error!! Student Already Registered";
        $regError = 1;
        echo "<script>
                document.location.href = 'registerStdActivity-b.php?dact_id=$token&regpoint=$rgp&resultSearch=$resultSearch&regError=$regError';
              </script>";
    }
}
?>