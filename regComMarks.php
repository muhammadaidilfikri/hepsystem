<?php
session_start();
include ("dbconnect.php");

$stdNo = $_POST['stdNo'];
$com_id = $_POST['com_id'];
$date_added = date("Y/m/d H:i:s");

$query = "select * from student where stdNo='$stdNo' ";
$result = $mysqli->query($query);

if (mysqli_num_rows($result)==0) {

	$resultSearch = "Error!! Such no student in Pusat Asasi";
	$regError = 1;

	echo "<script>
				document.location.href = 'regCom.php?resultSearch=$resultSearch&regError=$regError';
				 </script>";
}
else {

	if ($com_id==0)
	{
		$resultSearch = "Error!! Please Enter Committee Position";
		$regError = 1;

		echo "<script>
					document.location.href = 'regCom.php?resultSearch=$resultSearch&regError=$regError';
					 </script>";
	}
	else {

		$resultSearch = "Student successfully registered";
		$regError = 2;

		$sql = "insert into regcom (com_id, stdNo) values ('$com_id','$stdNo')";
		$mysqli->query($sql);

		echo "<script>
					document.location.href = 'regCom.php?resultSearch=$resultSearch&regError=$regError';
					 </script>";


	}


}


?>
