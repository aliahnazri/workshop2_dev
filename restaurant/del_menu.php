<?php 
	include ('../connect.php');
	
	$sql = mysqli_query($conn,"DELETE FROM restaurant_menu WHERE menu_id = '".$_GET['menu_id']."'");
	
	if($sql == TRUE){
		echo '<script language="javascript">';
		echo 'alert("Delete Successfully");';
		echo 'window.location.href="menu.php"';
		echo'</script>';
	} else {
		echo "Error : ". $sql . "<br>" . $conn -> error;
	}
	$conn -> close();
	
?>