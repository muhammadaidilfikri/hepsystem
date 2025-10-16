<?php
$conn = new mysqli('localhost', 'levi', 'keskeskes','unilead');

$sal_name = $_POST['sal'];


	$sql  = "insert into sal (sal_name) values ('$sal_name')";
	
	if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
		
    echo "<script>
					alert('Error! Please Check your data before submitting..');
 					document.location = 'addSal.php';
	   				</script>";
}

echo "<script>
					alert('New salutation successfully added.');
 					document.location = 'salList.php';
	   				</script>";

$conn->close();


?>
user