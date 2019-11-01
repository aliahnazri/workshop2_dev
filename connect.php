<?php
$con = mysqli_connect("127.0.0.1:3307","root","","rtr") or die();

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

else
//    echo "Connected";
?>
