<?php  
session_start(); //Start the Session
require('dbconnect.php');

if (isset($_POST['staffID']) and isset($_POST['nokp'])){
    //3.1.1 Assigning posted values to variables.
    $userID = $_POST['staffID'];
    $password = $_POST['nokp'];

    //3.1.1 Checking the values are existing in the database or not
    $stmt = $connection->prepare("SELECT staffID, nokp FROM acstaff WHERE staffID = ? AND nokp = ?");
    $stmt->bind_param("ss", $userID, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    //3.1.2 If the posted values are equal to the database values, then session will be created for the user.
    if ($result->num_rows == 1){
        
        //create function to get roleID using staffID
        $stmt2 = $connection->prepare(
        "SELECT a.staffID, a.nama, a.email, s.roleid, s.roletitle
        FROM sysrole_acstaff sa
        RIGHT JOIN acstaff a ON sa.staffID = a.staffID
        LEFT JOIN sysroles s ON sa.roleid = s.roleid
        WHERE a.staffID = ? AND a.nokp = ?"
        );
        $stmt2->bind_param("ss", $userID, $password);
        $stmt2->execute();
        $result2 = $stmt2->get_result();

        if ($result2->num_rows > 0) {
            $roleData = $result2->fetch_assoc();
            $roleid = $roleData['roleid'];
        } else {
            $roleid = 99; // default role
        }

        $_SESSION['username'] = $userID;
		$_SESSION['password'] = $password;
		$_SESSION["loggedin"] = true;
        $_SESSION['roleid'] = $roleid;
    }else{
        //3.1.3 If the login credentials doesn't match, he will be shown with an error message.
        $fmsg = "Invalid Login Credentials.";
    }
}

//3.1.4 if the user is logged in Greets the user with message
if (isset($_SESSION['username'])){
    echo "<script>
    document.location = 'main.php';
    </script>";
}else {
    echo "<script>
    alert('Invalid Login. Please Try Again');
 	document.location = 'index.php';
	</script>";
}
?>
