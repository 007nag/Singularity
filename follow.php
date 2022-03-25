<?php
session_start();
 
 	$conn=mysqli_connect("localhost","root","","newdb");
 	$f1=$_SESSION['user'];
 	
 	$f2=$_POST['f2'];
 	if($_POST['val']=='Follow'){
 	if(mysqli_query($conn,"insert into follow values ('$f1','$f2') "))
 	{
 		echo "Unfollow";
 	}}
 	
 	else{
 		mysqli_query($conn,"DELETE from follow where f1='$f1' and f2='$f2'");
 		echo "Follow";
 	}
 





?>