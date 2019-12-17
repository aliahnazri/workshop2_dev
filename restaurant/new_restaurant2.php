<?php

$restname = $_REQUEST['rest_name'];
$SSM = $_REQUEST['SSM'];

$servername = "localhost";
$username = "root";
$pwd = "";
$dbname = "rtr";


// Create connection
$conn = new mysqli($servername, $username, $pwd, $dbname);

// Check connection
if ($conn->connect_error) {
    die(" Connection failed: " . $conn->connect_error);
}


$sql = "SELECT rest_name FROM restaurant WHERE 
restname='$rest_name' ";
$result = $conn->query($sql);
$num_rows=mysqli_num_rows($result);
$row = $result->fetch_assoc();

if($num_rows>0){
	echo '<script language="javascript">';
	echo 'alert("The restaurant has exist!");';
	echo 'window.location.href="restaurant.php";';
	echo'</script>';
   
}

else {


$sql = "INSERT INTO restaurant (rest_name, SSM)
VALUES ('$rest_name' ,'$SSM')";


if ($conn->query($sql) == TRUE) 
{
    echo '<script language="javascript">';
	echo 'alert("New restaurant has been added.");';
	echo 'window.location.href="restaurant.php";';
	echo '</script>';
} 

}
?>