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
$allowedroles = array(3); //roles allowed to access this page
if (!in_array($_SESSION['roleid'], $allowedroles)) {
    header("Location: logout.php");
}

$stdNo = $_POST['stdNo'];
$club_id = $_POST['club_id'];
$club_token = getClubToken($club_id);

//check student in student table
//using bind param to prevent SQL injection
$query = "SELECT * FROM student WHERE stdNo = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("s", $stdNo);
$stmt->execute();
$result = $stmt->get_result();

//retrieve club_id from token
if ($result->num_rows == 0) {
    echo "<script>
            alert('Error!! No student with that ID number.');
            document.location.href = 'addStudent.php?club_id=$club_token'
          </script>";
    exit();
}

//Check student already registered or not
//using bind param to prevent SQL injection
$sqlcheck = "SELECT * FROM club_registration WHERE stdNo = ? AND club_id = ?"; 
$stmt = $mysqli->prepare($sqlcheck);
$stmt->bind_param("si", $stdNo, $club_id);
$stmt->execute();
$resultCheck = $stmt->get_result();

//if student already registered
//retrieve club_id from token
if ($resultCheck->num_rows > 0) {
    echo "<script>
            alert('Error!! Student already registered for this club.');
            document.location.href = 'addStudent.php?club_id=$club_token'
          </script>";
    exit();
}

//register student
//using bind param to prevent SQL injection
$token = generateToken(32);
$sql = "INSERT INTO club_registration (stdNo, club_id, token) VALUES (?, ?, ?)";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("sis", $stdNo, $club_id, $token);

//execute and check for success
//retrieve club_id from token
if ($stmt->execute()) {
    echo "<script>
            alert('Record successfully updated.');
            document.location.href = 'addStudent.php?club_id=$club_token'
          </script>";
} else {
    echo "<script>
            alert('Error!! Failed to register student.');
            document.location.href = 'addStudent.php?club_id=$club_token'
          </script>";
}
?>