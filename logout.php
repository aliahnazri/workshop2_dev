<?php
session_start();

include 'connect.php';
    
$userid = $_SESSION['user_id'];

$query =    "UPDATE `user`
             SET last_login = now()
             WHERE user_id = '$userid'";

$result = mysqli_query($con,$query) or die(mysql_error());

session_destroy();
include('login.php');
?>