<?php
session_start();
include ("dbconnect.php");
include ("iqfunction.php"); //new file

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

$token = generateToken(32);
$club_name = $_POST['club_name'];
$club_obj= $_POST['club_obj'];
$club_max= $_POST['club_max'];
$club_stat = $_POST['club_stat'];
$club_ws = $_POST['club_ws'];
$club_log = $_SESSION['username'];

//$sql = "insert into club (club_name,club_max,club_obj,club_stat,club_log,club_ws, token) values ('$club_name','$club_max','$club_obj','$club_stat','$club_log','$club_ws', '$token')";
//echo $sql;
$sql = "insert into club (club_name,club_max,club_obj,club_stat,club_log,club_ws, token) values (?,?,?,?,?,?,?)";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("sssssss", $club_name, $club_max, $club_obj, $club_stat, $club_log, $club_ws, $token);
$stmt->execute();

//$mysqli->query($sql);

echo "<script>
			alert('Record Sucessfully updated.');
			document.location = 'clubList.php';
			 </script>";
?>
