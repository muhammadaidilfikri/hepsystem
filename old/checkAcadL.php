<?php
$conn = new mysqli('localhost', 'levi', 'keskeskes','unilead');

$acl_name = $_POST['acl_name'];


	$sql  = "insert into acl (acl_name) values ('$acl_name')";
	
	if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
		
    echo "<script>
					alert('Error! Please Check your data before submitting..');
 					document.location = 'addAcadL.php';
	   				</script>";
}

echo "<script>
					alert('New IL successfully added.');
 					document.location = 'acadList.php';
	   				</script>";

$conn->close();


?>