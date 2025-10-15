<?php
session_start();
include ("dbconnect.php");
include ("iqfunction.php"); //new file

$staffID = $_POST['staffID'];
$club_id= $_POST['club_id'];
$token = generateToken(32);

$query = "select * from acstaff where staffID=? ";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("s", $staffID);
$stmt->execute();
//$result = $mysqli->query($query);
$result = $stmt->get_result();

//if (mysqli_num_rows($result)==0) {
if ($result->num_rows == 0) {

	echo "<script>
				alert('Error!! Such no staff in Pusat Asasi');
				document.location.href = 'addClubAdvisor.php?club_id=$token'
				 </script>";
}
else {
	//$sql = "insert into club_advisor (staffID,club_id,token) values ('$staffID','$club_id','$token')";
	//$mysqli->query($sql);
	$sql = "insert into club_advisor (staffID,club_id,token) values (?,?,?)";
	$stmt = $mysqli->prepare($sql);
	$stmt->bind_param("sis", $staffID,$club_id,$token);
	$stmt->execute();

	echo "<script>
				alert('Record Sucessfully updated.');
				document.location.href = 'addClubAdvisor.php?club_id=$token'
				 </script>";
}


?>
