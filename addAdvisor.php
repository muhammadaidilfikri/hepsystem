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
$allowedroles = array(3); //roles allowed to access this page
if (!in_array($_SESSION['roleid'], $allowedroles)) {
    header("Location: logout.php");
}

$staffID = $_POST['staffID'];
$club_id= $_POST['club_id'];
$club_token = getClubToken($club_id);
$token = generateToken(32); //insert club advisor token

$query = "select * from acstaff where staffID=? ";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("s", $staffID);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {

	echo "<script>
				alert('Error!! Such no staff in Pusat Asasi');
				document.location.href = 'addClubAdvisor.php?club_id=$club_token'
				 </script>";
}
else {
	$sqlCheck = "SELECT * FROM club_advisor WHERE staffID=? AND club_id=? AND is_active=1"; 
	$stmtCheck = $mysqli->prepare($sqlCheck);
	$stmtCheck->bind_param("si", $staffID, $club_id);
	$stmtCheck->execute();
	$resultCheck = $stmtCheck->get_result();
	if($resultCheck->num_rows > 0) {
		echo "<script>
				alert('Error!! This staff is already assigned as advisor for this club.');
				document.location.href = 'addClubAdvisor.php?club_id=$club_token'
				 </script>";
		exit();
	}
	else
	{
		$isactive = 1;
		$sql = "insert into club_advisor (staffID,club_id,token,is_active) values (?,?,?,?)";
		$stmt = $mysqli->prepare($sql);
		$stmt->bind_param("sisi", $staffID,$club_id,$token,$isactive);
		$stmt->execute();

		echo "<script>
				alert('Record Sucessfully updated.');
				document.location.href = 'addClubAdvisor.php?club_id=$club_token'
				 </script>";
	}
}
?>
