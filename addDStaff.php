<?php
session_start();
include ("dbconnect.php");

$staffID = $_POST['staffID'];
$dept_id= $_POST['dept_id'];
$token = generateToken(32);

//$query = "select * from acstaff where staffID='$staffID' ";
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
				document.location.href = 'addDeptStaff.php?dept_id=$token'
				 </script>";
}
else {
	//$sql = "insert into dept_advisor (staffID,dept_id) values ('$staffID','$dept_id','$token')";
	//$mysqli->query($sql);
	$sql = "insert into dept_advisor (staffID,dept_id,token) values (?,?,?)";
	$stmt = $mysqli->prepare($sql);
	$stmt->bind_param("sis", $staffID,$dept_id,$token);
	$stmt->execute();

	echo "<script>
				alert('Record Sucessfully updated.');
				document.location.href = 'addDeptStaff.php?dept_id=$token'
				 </script>";
}


?>
