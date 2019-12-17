<?php 
include '../connect.php';
$id = $_GET["id"];

$query = "UPDATE user SET user_status = 'ACTIVE' WHERE user_id = '".$id."'";
$result =mysqli_query($con,$query);
if($result == TRUE){
	echo ("<script LANGUAGE='JavaScript'>
	    window.alert('Succesfully Reactivate');
	    window.location.href='user.php';
	    </script>");
}
else{
	echo "Unsuccess";
}
?>