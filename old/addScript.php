<?php

function addUser($username,$firstname,$jawatansandang,$securityLevel)
{
	global $connection;
	$sql  = "insert into tblSecurity (username,firstname,jawatansandang,securityLevel) values ('$username','$firstname','$jawatansandang','$securityLevel')";
	
	if ($connection->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
	
	}

?>