<?php
$conn = new mysqli('localhost', 'levi', 'keskeskes','unilead');

$user_id = $_POST['user_id'];
$position = $_POST['position'];
$dept = $_POST['dept'];
$dyear = $_POST['dyear'];


	$sql  = "insert into aff (user_id,position,dept) values ('$user_id','$position','$dept')";
	
	if ($conn->query($sql) === TRUE) {
} else {
		
    echo "<script>
					alert('Error! Please Check your data before submitting..');
 					document.location = 'addAff.php?user_id=$user_id';
	   				</script>";
}

echo "<script>
					alert('New record successfully added.');
 					document.location.href = 'addAff.php?user_id=$user_id';
	   				</script>";

$conn->close();


?>