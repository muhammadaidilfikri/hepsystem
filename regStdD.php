<?php
session_start();
include ("dbconnect.php");

$stdNo = $_POST['stdNo'];
$dact_id = $_POST['dact_id'];
$rgp = $_POST['regpoint'];
$date_added = date("Y/m/d H:i:s");

$query = "select * from student where stdNo='$stdNo' ";
$result = $mysqli->query($query);

if (mysqli_num_rows($result)==0) {

	$resultSearch = "Error!! Such no student in Pusat Asasi";
	$regError = 1;

	echo "<script>

				document.location.href = 'registerStdActivity-b.php?dact_id=$dact_id&regpoint=$rgp&resultSearch=$resultSearch&regError=$regError';
				 </script>";
}
else {

	$query1 = "select * from dactreg where stdNo='$stdNo' and dact_id='$dact_id'";
	$result1 = $mysqli->query($query1);
	if (mysqli_num_rows($result1)==0) {
	$resultSearch = "Student successfully registered";
	$regError = 2;
	$sql = "insert into dactreg (stdNo,dact_id,regpoint,datereg) values ('$stdNo','$dact_id','$rgp','$date_added')";
	$mysqli->query($sql);

	echo "<script>
				document.location.href = 'registerStdActivity-b.php?dact_id=$dact_id&regpoint=$rgp&resultSearch=$resultSearch&regError=$regError';
				 </script>";
			 }
			 else {
			$resultSearch = "Error!! Student Already Registered";
			$regError = 1;
				 echo "<script>
 							document.location.href = 'registerStdActivity-b.php?dact_id=$dact_id&regpoint=$rgp&resultSearch=$resultSearch&regError=$regError';
 							 </script>";
			 }
}


?>
