<?php
$conn = new mysqli('localhost', 'levi', 'keskeskes','unilead');

$user_id = $_POST['user_id'];
$roles = $_POST['roles'];
$cat_id = $_POST['cat_id'];


	$sql  = "insert into roles (user_id,cat_id,roles) values ('$user_id','$cat_id','$roles')";
	
	if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
		
    echo "<script>
					alert('Error! Please Check your data before submitting..');
 					document.location = 'addRoles.php?user_id=$user_id';
	   				</script>";
}

echo "<script>
					alert('New record successfully added.');
 					document.location.href = 'addRoles.php?user_id=$user_id';
	   				</script>";

$conn->close();


?>