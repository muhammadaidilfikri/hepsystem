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
$allowedroles = array(3); //roles allowed to access this page
if (!in_array($_SESSION['roleid'], $allowedroles)) {
    header("Location: logout.php");
}

$token = generateToken(32);
$dact_name = $_POST['dact_name'];
$dept_id = $_POST['dept_id'];
$date_start = $_POST['date_start'];
$date_end = $_POST['date_end'];
$location = $_POST['location'];
$level_id = $_POST['level_id'];
$budget = $_POST['budget'];
$total_pax = $_POST['total_pax'];
$dept_allow = $_POST['dept_allow'];
$kew_id = $_POST['kew_id'];
$kod_sem = $_POST['kod_sem']; 
$dept_stat = $_POST['dept_stat'];
$addedBy = $_SESSION["username"];
$date_added = date("Y/m/d H:i:s");

$sql2 = "INSERT INTO dept_activities (dept_id, dact_name, date_start, date_end, location, level_id, total_pax, budget, dept_stat, dept_allow, addedBy, date_added, kew_id, kod_sem, token) 
         VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $mysqli->prepare($sql2);
$stmt->bind_param("issssiidssssiis", 
    $dept_id, $dact_name, $date_start, $date_end, $location, 
    $level_id, $total_pax, $budget, $dept_stat, $dept_allow, 
    $addedBy, $date_added, $kew_id, $kod_sem, $token
);

if ($stmt->execute()) {
    echo "<script>
        alert('Activity Successfully created.');
        window.location.href = 'deptActivities.php';
    </script>";
} else {
    echo "<script>
        alert('Error creating activity.');
        history.back();
    </script>";
}

$stmt->close();
?>