<?php
$conn = new mysqli('localhost', 'levi', 'keskeskes','unilead');

$prog_name = $_POST['prog_name'];
$prog_date = $_POST['prog_date'];
$venue = $_POST['venue'];
$prog_id = $_POST['prog_id'];

if ($prog_id)
{
	$sql  = "update training set prog_name='$prog_name', prog_date='$prog_date', venue='$venue' where prog_id='$prog_id' ";
	if ($conn->query($sql) === TRUE) {
}
	
	echo "<script>
					alert('Assessment updated successfully.');
 					document.location = 'assessmentList.php';
	   				</script>";
	
}
else {


	$sql  = "insert into training (prog_name,prog_date,venue) values ('$prog_name','$prog_date','$venue')";
	
	if ($conn->query($sql) === TRUE) {
} else {
		
    echo "<script>
					alert('Error! Please Check your data before submitting..');
 					document.location = 'addAssessment.php';
	   				</script>";
}

echo "<script>
					alert('New Assessment created.');
 					document.location = 'assessmentList.php';
	   				</script>";

$conn->close();
	
}


?>