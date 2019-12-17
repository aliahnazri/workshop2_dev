<?php
include '../connect.php';

$tableid = $_GET['tableID'];
$tablebookid = $_GET['tablebookID'];

$sql = "UPDATE `restaurant_table` SET table_status = 'AVAILABLE' WHERE table_id = '$tableid'";
mysqli_query($con, $sql) or die ("Error deleting data");

$sql_2 = "UPDATE `table_reservation` SET payment_status = 'PAID' WHERE tablebook_id = '$tablebookid'";
mysqli_query($con, $sql_2) or die ("Error deleting data");

header('Location: owner_reservation_list.php');
?>