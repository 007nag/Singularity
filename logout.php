<?php
$conn=mysqli_connect("localhost","root","","newdb");
session_start();

$name=$_SESSION['user'];
if(mysqli_query($conn,"update users set status=0 where name='$name'")){
	echo "SUCESS";
}

session_destroy();



?>