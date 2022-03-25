<?php
session_start();
$us=$_SESSION['user'];
$conn=mysqli_connect("localhost","root","","newdb");
$res=mysqli_query($conn,"select * from users where name not in ('$us') ");
while($row=mysqli_fetch_array($res))
{
	$fg=$row['name'];
echo "<p id='u1'><button id='use' name='use' class='use' onclick='disp(\"$fg\",0)'>";
echo $row['name'];
echo "</button></p>";

}





?>
