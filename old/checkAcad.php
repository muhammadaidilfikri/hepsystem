<?php
$conn = new mysqli('localhost', 'levi', 'keskeskes','unilead');

$user_id = $_POST['user_id'];
$qualification = $_POST['qualification'];
$qdept = $_POST['qdept'];
$qyear = $_POST['qyear'];



	$sql  = "insert into academic (user_id,qualification,qdept,qyear) values ('$user_id','$qualification','$qdept','$qyear')";
	
	if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
		
    echo "<script>
					alert('Error! Please Check your data before submitting..');
 					document.location = 'addAcad.php';
	   				</script>";
}

echo "<script>
					alert('New record successfully added.');
 					document.location.href = 'addAcad.php?user_id=$user_id';
	   				</script>";

$conn->close();


?>