<?php
session_start();
include ("dbconnect.php");
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
}

$dact_id = $_POST['dact_id'];
$dact_name = $_POST['dact_name'];
$date_start = $_POST['date_start'];
$date_end= $_POST['date_end'];
$location = $_POST['location'];
$level_id = $_POST['level_id'];
$budget = $_POST['budget'];
$kew_id = $_POST['kew_id'];
$total_pax = $_POST['total_pax'];
$dept_allow = $_POST['dept_allow'];
$token = generateToken(32);
$dept_stat = $_POST['dept_stat'];
$date_added = date("Y/m/d H:i:s"); 

$query = "select * from dept_activities where dact_id=? ";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("i", $dact_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo "<script>
            alert('Error!! Activity not found');
            document.location.href = 'deptActivities.php'
         </script>";
}
else {
    
    $sql = "update dept_activities set kew_id=?, total_pax=?, dact_name=?, date_start=?, date_end=?, location=?, level_id=?, budget=?, dept_allow=?, dept_stat=?, token=? where dact_id=?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("iissssidsssi", $kew_id, $total_pax, $dact_name, $date_start, $date_end, $location, $level_id, $budget, $dept_allow, $dept_stat, $token, $dact_id);
    $stmt->execute();

    echo "<script>
            alert('Activity Successfully Updated.');
            document.location.href = 'deptActivities.php'
         </script>";
}
?>