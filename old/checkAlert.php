<?php
$conn = new mysqli('localhost', 'levi', 'keskeskes','unilead');

$name = $_POST['name'];
$noic = $_POST['noic'];
$post_id = $_POST['post_id'];
$ipta_id = $_POST['ipta_id'];
$date_start = $_POST['date_start'];
$date_end = $_POST['date_end'];
$term = $_POST['term'];


	$sql  = "insert into alert (name,post_id,ipta_id,date_start,date_end,term,noic) values ('$name','$post_id','$ipta_id','$date_start','$date_end','$term','$noic')";
	
	if ($conn->query($sql) === TRUE) {
} else {
		
    echo "<script>
					alert('Error! Please Check your data before submitting..');
 					document.location = 'addAlert.php';
	   				</script>";
}

echo "<script>
					alert('User Successfully Added.');
 					document.location = 'alertList.php';
	   				</script>";

$conn->close();


?>