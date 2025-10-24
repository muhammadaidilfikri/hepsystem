<?php
session_start();
include ("dbconnect.php");
include ("iqfunction.php");//new file

$token = generateToken(32);
$dept_name = $_POST['dept_name'];
$dept_acro= $_POST['dept_acro'];


//$sql = "insert into dept (dept_name,dept_acro,token) values ('$dept_name','$dept_acro','$token')";
//$mysqli->query($sql);
$sql = "insert into dept (dept_name,dept_acro,token) values (?,?,?)";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("sss", $dept_name,$dept_acro,$token);
$stmt->execute();
$result = $stmt->get_result();


echo "<script>
			alert('Record Sucessfully updated.');
			document.location = 'depList.php';
			 </script>";
?>
