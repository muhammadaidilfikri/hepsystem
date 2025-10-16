<?php
session_start();
include ("dbconnect.php");

$staffID = $_POST['staffID'];
$dept_id= $_POST['dept_id'];

$query = "select * from acstaff where staffID='$staffID' ";

$result = $mysqli->query($query);
if (mysqli_num_rows($result)==0) {

	echo "<script>
				alert('Error!! Such no staff in Pusat Asasi');
				document.location.href = 'addDeptStaff.php?dept_id=$dept_id'
				 </script>";
}
else {
	$sql = "insert into dept_advisor (staffID,dept_id) values ('$staffID','$dept_id')";
	$mysqli->query($sql);

	echo "<script>
				alert('Record Sucessfully updated.');
				document.location.href = 'addDeptStaff.php?dept_id=$dept_id'
				 </script>";
}


?>
