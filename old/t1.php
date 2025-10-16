<?php
$conn = new mysqli('localhost', 'levi', 'keskeskes','unilead');

$userID = $_POST['username'];
$firstname = $_POST['firstname'];
$jawatansandang = $_POST['jawatansandang'];
$securityLevel = $_POST['securityLevel'];
$email = $_POST['email'];

	$sql  = "insert into tblSecurity (userID,firstname,jawatansandang,securityLevel,pic,email) values ('$userID','$firstname','$jawatansandang','$securityLevel','images/person.jpg','$email')";
	
	if ($conn->query($sql) === TRUE) {
} else {
		
    echo "<script>
					alert('Error! Please Check your data before submitting..');
 					document.location = 'addUser.php';
	   				</script>";
}

echo "<script>
					alert('User Successfully Added. An email will be sent to the user with the password attached.');
 					document.location = 'index.php';
	   				</script>";

$conn->close();


?>