

<?php
include '../connect.php';
$user_id =  $_POST["user_id"];
echo $user_id;
$sql = "Delete from user where user_id = '$user_id'";
$rslt = mysqli_query($con,$sql);
if($rslt == TRUE){
    header("Location: admin_home.php");
}
else{
    die($sql);
}

?>


