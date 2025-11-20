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

$act_id = $_POST['act_id'];
$act_name = $_POST['act_name'];
$date_start = $_POST['date_start'];
$date_end = $_POST['date_end'];
$location = $_POST['location'];
$level_id = $_POST['level_id'];
$budget = $_POST['budget'];
$club_stat = $_POST['club_stat'];
$total_pax = $_POST['total_pax'];
$act_allow = $_POST['act_allow'] ?? null;
$token = generateToken(32);
$addedBy = $_SESSION["username"];
$kew_id = $_POST["kew_id"];
$date_added = date("Y/m/d H:i:s");

$query = "select * from club_activities where act_id=? ";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("i", $act_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo "<script>
            alert('Error!! Activity not found');
            document.location.href = 'clubActivities.php'
         </script>";
} else {
    $sql = "update club_activities set kew_id=?, total_pax=?, act_name=?, date_start=?, date_end=?, location=?, level_id=?, budget=?, act_allow=?, club_stat=?, date_added=?, addedBy=?, token=? where act_id=?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("iissssidsssssi", $kew_id, $total_pax, $act_name, $date_start, $date_end, $location, $level_id, $budget, $act_allow, $club_stat, $date_added, $addedBy, $token, $act_id);
    $stmt->execute();

    echo "<script>
            alert('Activity Successfully Updated.');
            document.location.href = 'clubActivities.php'
         </script>";
}
?>