<?php
session_start();
include ("dbconnect.php");

$club_id = $_POST['club_id'];
$club_name = $_POST['club_name'];
$club_obj= $_POST['club_obj'];
$club_max = !empty($_POST['club_max']) ? intval($_POST['club_max']) : 0;
$club_stat = $_POST['club_stat'];//enable/disable
$is_active = mysqli_real_escape_string($mysqli, $_POST['is_active']);    //Active/Inactive
$club_ws = $_POST['club_ws'];
$club_log = $_SESSION["username"];

$sql = "update club set club_name='$club_name', club_obj='$club_obj',club_max= '$club_max' , club_stat='$club_stat', is_active='$is_active' , club_log='$club_log', club_ws='$club_ws' where club_id='$club_id' ";
$mysqli->query($sql);


echo "<script>
			alert('Club Sucessfully Updated.');
			document.location = 'clubList.php';
			 </script>";
?>
