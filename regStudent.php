<?php
session_start();
include ("dbconnect.php");

$stdNo = $_POST['stdNo'];
$club_id= $_POST['club_id'];

$query1 = "select * from student where stdNo='$stdNo' ";

$result = $mysqli->query($query1);
if (mysqli_num_rows($result)==0) {

	echo "<script>
				alert('Error!! Such no student with that id number.');
				document.location.href = 'addStudent.php?club_id=$club_id'
				 </script>";
}
else {
	$query = "select * from club_registration where stdNo='$stdNo' ";

	$result1 = $mysqli->query($query);
	if (mysqli_num_rows($result1)==0) {


	$sql = "insert into club_registration (stdNo,club_id) values ('$stdNo','$club_id')";
	$mysqli->query($sql);

	echo "<script>
				alert('Record Sucessfully updated.');
				document.location.href = 'addStudent.php?club_id=$club_id'
				 </script>";
			 }
			 else {
			 	echo "<script>
							alert('Error!! Student already registered');
							document.location.href = 'addStudent.php?club_id=$club_id'
							 </script>";
			 }
}


?>
