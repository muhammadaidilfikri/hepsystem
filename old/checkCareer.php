<?php
$conn = new mysqli('localhost', 'levi', 'keskeskes','unilead');

$user_id = $_POST['user_id'];
$il_id = $_POST['il_id'];
$dept = $_POST['dept'];
$dyear = $_POST['dyear'];


	$sql  = "insert into career (user_id,il_id,dept,dyear) values ('$user_id','$il_id','$dept','$dyear')";
	
	if ($conn->query($sql) === TRUE) {
} else {
		
    echo "<script>
					alert('Error! Please Check your data before submitting..');
 					document.location = 'addCareer.php?user_id=$user_id';
	   				</script>";
}

echo "<script>
					alert('New record successfully added.');
 					document.location.href = 'addCareer.php?user_id=$user_id';
	   				</script>";

$conn->close();


?>