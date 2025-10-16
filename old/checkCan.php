<?php
$conn = new mysqli('localhost', 'levi', 'keskeskes','unilead');

$name = $_POST['name'];
$noic = $_POST['noic'];
$sal_id = $_POST['sal_id'];
$at_id = $_POST['at_id'];
$email = $_POST['email'];
$ipta_id = $_POST['ipta_id'];
$cposition = $_POST['cposition'];
$pict = "images/default.jpg";

	$sql  = "insert into profile (name,noic,sal_id,at_id,email,ipta_id,cposition,pict,phase) values ('$name','$noic','$sal_id','$at_id','$email','$ipta_id','$cposition','$pict','3')";
	
	if ($conn->query($sql) === TRUE) {
} else {
		
    echo "<script>
					alert('Error! Please Check your data before submitting..');
 					document.location = 'addCan.php';
	   				</script>";
}

echo "<script>
					alert('User Successfully Added.');
 					document.location = 'candidateList3.php';
	   				</script>";

$conn->close();


?>