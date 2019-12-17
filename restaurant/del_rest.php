<?php 
	//session_start();
	include ('../connect.php');
	//$restid = $_GET['rest_id'];
	
	$sql = mysqli_query($conn,"DELETE FROM restaurant WHERE rest_id = '".$_GET['rest_id']."'");
	
	if($sql == TRUE){
		echo '<script language="javascript">';
		echo 'alert("Delete Successfully");';
		echo 'window.location.href="restaurant.php"';
		echo'</script>';
	} else {
		echo "Error : ". $sql . "<br>" . $conn -> error;
	}
	$conn -> close();
	
?>