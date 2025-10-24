<?php
session_start();
include ("dbconnect.php");
include ("iqfunction.php");//new file

$dept_id = $_POST['dept_id'];
$dept_name = $_POST['dept_name'];
$dept_acro= $_POST['dept_acro'];
$token = generateToken(32);



//$sql = "update dept set dept_name='$dept_name', dept_acro='$dept_acro' where dept_id='$dept_id' ";
//$mysqli->query($sql);
$sql = "update dept set dept_name=?, dept_acro=? where dept_id=? ";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("ssi", $dept_name,$dept_acro,$dept_id);
$stmt->execute();


echo "<script>
			alert('Club Sucessfully Updated.');
			document.location = 'depList.php';
			 </script>";
?>
