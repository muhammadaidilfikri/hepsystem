<?php
$conn = new mysqli('localhost', 'levi', 'keskeskes','unilead');


$user_id = $_POST['user_id'];
$vid_url = $_POST['vid_url'];
$vid_date = date("Y-m-d");

	$sql  = "insert into vid (user_id,vid_url,vid_date) values ('$user_id','$vid_url','$vid_date')";
	
	if ($conn->query($sql) === TRUE) {
} else {
		
    echo "<script>
					alert('Error! Please Check your data before submitting..');
 					document.location = 'addVid.php';
	   				</script>";
}

echo "<script>
					alert('User Successfully Added. An email will be sent to the user with the password attached.');
 					document.location = 'assessmentVid.php';
	   				</script>";

$conn->close();


?>