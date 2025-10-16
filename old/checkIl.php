<?php
$conn = new mysqli('localhost', 'levi', 'keskeskes','unilead');

$il_name = $_POST['il_name'];
$il_p = $_POST['il_p'];


	$sql  = "insert into il (il_name,il_p) values ('$il_name','$il_p')";
	
	if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
		
    echo "<script>
					alert('Error! Please Check your data before submitting..');
 					document.location = 'addSal.php';
	   				</script>";
}

echo "<script>
					alert('New IL successfully added.');
 					document.location = 'ilList.php';
	   				</script>";

$conn->close();


?>