<?php
session_start();
include ("dbconnect.php");
include ("iqfunction.php");//new file

$stdNo = $_POST['stdNo'];
$club_id= $_POST['club_id'];
$token = generateToken(32);

//$query1 = "select * from student where stdNo='$stdNo' ";
$query = "select * from student where stdNo=? ";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("s", $stdNo);
$stmt->execute();
//$result = $mysqli->query($query1);
$result = $stmt->get_result();

//if (mysqli_num_rows($result)==0) {
if ($result->num_rows == 0) {

	echo "<script>
				alert('Error!! Such no student with that id number.');
				document.location.href = 'addStudent.php?club_id=$token'
				 </script>";
}
else {
	$query = "select * from club_registration where stdNo='$stdNo' ";

	$result1 = $mysqli->query($query);
	if (mysqli_num_rows($result1)==0) {


	//$sql = "insert into club_registration (stdNo,club_id) values ('$stdNo','$club_id')";
	//$mysqli->query($sql);
	$sql = "insert into club_registration (stdNo,club_id,token) values (?,?,?)";
	$stmt = $mysqli->prepare($sql);
	//$stmt->bind_param("si", $stdNo,$club_id);
	$stmt->bind_param("sis", $stdNo,$club_id,$token);
	$stmt->execute();

	echo "<script>
				alert('Record Sucessfully updated.');
				document.location.href = 'addStudent.php?club_id=$token'
				 </script>";
			 }
			 else {
			 	echo "<script>
							alert('Error!! Student already registered');
							document.location.href = 'addStudent.php?club_id=$token'
							 </script>";
			 }
}


?>
