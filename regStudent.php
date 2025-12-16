<?php
session_start();
include("dbconnect.php");
include("iqfunction.php");

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
    exit;
}

$stdNo = filter_input(INPUT_POST, 'stdNo', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$club_id = filter_input(INPUT_POST, 'club_id', FILTER_VALIDATE_INT);                                                        
$club_token = getClubToken($club_id);

// Check student in student table
$query = "SELECT * FROM student WHERE stdNo = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("s", $stdNo);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo "<script>
            alert('Error!! No student with that ID number.');
            document.location.href = 'addStudent.php?club_id=$club_token'; // FIXED: Changed from regStudent.php to addStudent.php
          </script>";
    exit();
}

// Check if student is already registered AND ACTIVE for this club
$sqlcheck = "SELECT * FROM club_registration WHERE stdNo = ? AND club_id = ? AND is_active = 1"; 
$stmt = $mysqli->prepare($sqlcheck);
$stmt->bind_param("si", $stdNo, $club_id);
$stmt->execute();
$resultCheck = $stmt->get_result();

// If student already registered and active
if ($resultCheck->num_rows > 0) {
    echo "<script>
            alert('Error!! Student is already registered and active for this club.');
            document.location.href = 'addStudent.php?club_id=$club_token'; // FIXED: Changed from regStudent.php to addStudent.php
          </script>";
    exit();
}

// Check if student has an inactive registration (to prevent duplicates)
$sqlInactiveCheck = "SELECT * FROM club_registration WHERE stdNo = ? AND club_id = ? AND is_active = 0"; 
$stmtInactive = $mysqli->prepare($sqlInactiveCheck);
$stmtInactive->bind_param("si", $stdNo, $club_id);
$stmtInactive->execute();
$resultInactiveCheck = $stmtInactive->get_result();

if ($resultInactiveCheck->num_rows > 0) {
    echo "<script>
            alert('Error!! Student already has a pending registration. Please activate the existing registration instead.');
            document.location.href = 'addStudent.php?club_id=$club_token'; // FIXED: Changed from regStudent.php to addStudent.php
          </script>";
    exit();
}

// Register student with is_active = 0 (requires activation)
$token = generateToken(32);
$is_active = 0; // New students are inactive by default

$sql = "INSERT INTO club_registration (stdNo, club_id, token, is_active) VALUES (?, ?, ?, ?)";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("sisi", $stdNo, $club_id, $token, $is_active);

// Execute and check for success
if ($stmt->execute()) {
    echo "<script>
            alert('Student successfully registered. Please activate the student to make them active.');
            document.location.href = 'addStudent.php?club_id=$club_token'; // FIXED: Changed from regStudent.php to addStudent.php
          </script>";
} else {
    echo "<script>
            alert('Error!! Failed to register student.');
            document.location.href = 'addStudent.php?club_id=$club_token'; // FIXED: Changed from regStudent.php to addStudent.php
          </script>";
}
?>