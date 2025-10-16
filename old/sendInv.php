<?php
$conn = new mysqli('localhost', 'levi', 'keskeskes','unilead');

$uid = $_GET['user_id'];

$sql_events = mysqli_query($conn, "select * from profile where  user_id='$uid'") or die (mysql_error());


while ($row = mysqli_fetch_array($sql_events)) {

	$email = $row["email"];
	echo $email;
	
	if (empty($email)) {
    echo "<script>
			alert('Error!! Invitation cannot be send because the users email is not set');
 			document.location.href = 'candidateList3.php';
	   </script>";
}
	else{
		$sql  = "insert into regprog (prog_id,user_id,ass_id,cf,curr,tar) values (99,'$uid',99,0,99,99)";
		$conn->query($sql);
		
		$msg= "Assalammualaikum w.b.t & Selamat Sejahtera,\n\nSukacita dimaklumkan bahawa  tuan/puan telah terpilih untuk menghadiri Program Penilaian Kompetensi Kepimpinan Pendidikan Malaysia Anjuran AKEPT. Untuk maklumat lanjut berkenaan program ini, tuan/puan boleh layari laman berikut  (http://unilead.moe.gov.my/beq/index.php?ui=".$uid. ").\n\n\nSekian, harap maklum dan terima kasih. \n\n* Ini adalah cetakan komputer. Pengesahan tidak diperlukan.";
	mail($email," Program Penilaian Kompetensi Kepimpinan Pendidikan Malaysia Anjuran AKEPT",$msg);
	
	echo "<script>
			alert('Invitation mail has been send sucessfully.');
 			document.location.href = 'candidateList3.php';
	   </script>";
	}

	
	
}


$conn->close();


?>