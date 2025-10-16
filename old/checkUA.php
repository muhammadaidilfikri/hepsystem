<?php
$conn = new mysqli('localhost', 'levi', 'keskeskes','unilead');

$ip = $_POST['ipta'];
$acronym = $_POST['ipta_a'];
$ac = "(".strtoupper($acronym).")";

$sql  = "insert into ipta (ipta,ipta_a,logo) values ('$ip','$ac','images/default-logo.jpg')";
	
	if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
		
    echo "<script>
					alert('Error! Please Check your data before submitting..');
 					document.location = 'addUA.php';
	   				</script>";
}

echo "<script>
					alert('New record successfully added.');
 					document.location = 'uaList.php';
	   				</script>";

$conn->close();



?>