<?php
session_start();
include ("dbconnect.php");
include ("iqfunction.php");

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

//legends
//roleid 1 = SUPER ADMINISTRATOR
//roleid 2 = IT ADMINISTRATOR
//roleid 3 = HEP
//roleid 4 = HEA
$allowedroles = array(3,4); //roles allowed to access this page
if (!in_array($_SESSION['roleid'], $allowedroles)) {
    header("Location: logout.php");
}

// Validate and sanitize inputs
$staffID = filter_input(INPUT_POST, 'staffID', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$dept_id = filter_input(INPUT_POST, 'dept_id', FILTER_VALIDATE_INT);

// Check if inputs are valid
if (!$staffID || !$dept_id) {
    echo "<script>
            alert('Invalid input data.');
            history.back();
          </script>";
    exit;
}

// Get department token for redirection
$dept_token = getDeptToken($dept_id);
if (!$dept_token) {
    echo "<script>
            alert('Department not found.');
            history.back();
          </script>";
    exit;
}

$token = generateToken(32);

// Check if staff exists
$query = "SELECT * FROM acstaff WHERE staffID=?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("s", $staffID);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo "<script>
            alert('Error!! No such staff in Pusat Asasi.');
            document.location.href = 'addDeptStaff.php?dept_id=$dept_token'
          </script>";
    exit;
}

// Check if staff is already assigned to this department as active
$sqlCheck = "SELECT * FROM dept_advisor WHERE staffID=? AND dept_id=? AND is_active=1";
$stmtCheck = $mysqli->prepare($sqlCheck);
$stmtCheck->bind_param("si", $staffID, $dept_id);
$stmtCheck->execute();
$resultCheck = $stmtCheck->get_result();

if($resultCheck->num_rows > 0) {
    echo "<script>
            alert('Error!! This staff is already assigned as advisor for this department.');
            document.location.href = 'addDeptStaff.php?dept_id=$dept_token'
          </script>";
    exit();
}

// Insert new department advisor
$isactive = 1;
$sql = "INSERT INTO dept_advisor (staffID, dept_id, token, is_active) VALUES (?, ?, ?, ?)";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("sisi", $staffID, $dept_id, $token, $isactive);

if ($stmt->execute()) {
    echo "<script>
            alert('Record successfully added.');
            document.location.href = 'addDeptStaff.php?dept_id=$dept_token'
          </script>";
} else {
    echo "<script>
            alert('Error adding record: " . $mysqli->error . "');
            document.location.href = 'addDeptStaff.php?dept_id=$dept_token'
          </script>";
}
?>