<?php
$conn = new mysqli('localhost', 'levi', 'keskeskes','unilead');

$prog_id = $_POST['prog_id'];
$user_id = $_POST['user_id'];
$ass_id = $_POST['id'];
$curr = $_POST['curr'];
$tar = $_POST['tar'];

	$sql  = "insert into regprog (prog_id,user_id,ass_id,cf,curr,tar) values ('$prog_id','$user_id','$ass_id',0,'$curr','$tar')";
	
	if ($conn->query($sql) === TRUE) {
} else {
		
    echo "<script>
					alert('Error! Please Check your data before submitting..');
 					document.location = 'addCandidate.php';
	   				</script>";
}

echo "<script>
					alert('User Successfully Added.');
 					document.location = 'assessmentCandidate.php';
	   				</script>";

$conn->close();


?>