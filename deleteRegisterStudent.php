<?php
session_start();
include ("dbconnect.php");
include ("iqfunction.php");

//$reg_id = $_GET["reg_id"];
//$club_id = $_GET["club_id"];
$reg_id = filter_input(INPUT_GET, 'reg_id', FILTER_VALIDATE_INT);
$club_id = filter_input(INPUT_GET, 'club_id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$club_token = getClubToken($club_id);

if (!$reg_id) {
	echo "<script>
			alert('Invalid registration id.');
			history.back();
		  </script>";
	exit();
}

//$sql = "delete from club_registration where reg_id='$reg_id'";
//updated to soft delete
$sql = "UPDATE club_registration SET is_active = 0 WHERE reg_id = $reg_id";
$mysqli->query($sql);

$resultSearch = "Student Registration Sucessfully Deleted.";
$regError = 1;

//redirect back to addStudent.php with club_id and resultSearch message
//retrieve club_id from token
/*echo "<script>
			document.location.href = 'addStudent.php?club_id=$club_id&resultSearch=$resultSearch&regError=$regError';
			 </script>";
			 */
echo "<script>
			alert('Student Registration Successfully Deleted.');
			document.location.href = 'addStudent.php?club_id=$club_token';
			 </script>";			
?>
