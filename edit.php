<?php
session_start();
$conn=mysqli_connect("localhost","root","","newdb");
$use=$_SESSION['user']; 
$value=$_POST['value'];
$field=$_POST['id'];
$query = "UPDATE details SET ".$field."='".$value."' WHERE username='".$use."'";
mysqli_query($conn,$query);
if($field=="username")
{
	$u1=$_SESSION['user'];
	$_SESSION['user']=$value;
	mysqli_query($conn,"update users set name='$value' where name='$u1'");
}
if($field=="email")
{
	mysqli_query($conn,"update users set email='$value' where name='$use'");
}
?>