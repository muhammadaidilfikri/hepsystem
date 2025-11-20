<?php  //Start the Session
require('dbconnect.php');



if (isset($_POST['staffID']) and isset($_POST['nokp'])){
//3.1.1 Assigning posted values to variables.
    $userID = $_POST['staffID'];
    $password = $_POST['nokp'];
//3.1.2 Checking the values are existing in the database or not
    $query = "SELECT * FROM `acstaff` WHERE staffID='$userID' and nokp='$password'";

    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    $count = mysqli_num_rows($result);
//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
    if ($count == 1){
		session_start();

        //create function to get roleID using staffID
        $sql_role = "SELECT a.staffID, a.nama, a.email, s.roleid, s.roletitle
        FROM sysrole_acstaff sa 
        RIGHT JOIN acstaff a ON sa.staffID = a.staffID
        LEFT JOIN sysroles s ON sa.roleid = s.roleid
        WHERE a.staffID = '$userID' AND a.nokp = '$password'";
        $query_role = mysqli_query($connection, $sql_role);             
        $row_role = mysqli_num_rows($query_role);
        if($row_role >  0){         
            $r_role = mysqli_fetch_assoc($query_role); 
            $roleid = $r_role['roleid'];  
        } else {
            //roleID not found
            $roleid = 99; //default role id for normal user
            exit();
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
