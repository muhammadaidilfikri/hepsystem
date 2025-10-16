<?php
$conn = new mysqli('localhost', 'levi', 'keskeskes','unilead');

$user_id = $_POST['uids'];
$ass_id = $_POST['id'];
$curr = $_POST['curr'];
$tar = $_POST['tar'];

	$sql  = "update regprog set  tar='$tar' where user_id='$user_id'";
	
	if ($conn->query($sql) === TRUE) {
} else {
		
    echo "<script>
					alert('Error! Please Check your data before submitting..');
 					document.location = 'updateCandidate.php?user_id=$user_id';
	   				</script>";
}

echo "<script>
					alert('Data has been successfully updated.');
 					document.location = 'assessmentMark.php';
	   				</script>";

$conn->close();


?>