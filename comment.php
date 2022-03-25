<?php
session_start();
$name=$_SESSION['user'];
$id=$_POST['postv2'];
$comm=$_POST['postv1'];
$conn=mysqli_connect("localhost","root","","newdb");


	if(mysqli_query($conn,"insert into comment values('$id','$name','$comm','')"))
	{
		echo "<div style='text-align:center; padding:10px;'>";
	echo "<p><b>"; echo $name; echo "</b></p><br>"; echo "<p>"; echo $comm; echo "</p></div>";
	}
	





?>