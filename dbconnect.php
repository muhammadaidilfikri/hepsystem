<?php
$connection = mysqli_connect("localhost", "root", "", 'asiddb');
if (!$connection){
    die("Database Connection Failed");
}
$select_db = mysqli_select_db($connection, 'asiddb');
if (!$select_db){
    die("Database Selection Failed");
}

$mysqli = mysqli_connect("localhost", "root", "", 'asiddb');
?> 


