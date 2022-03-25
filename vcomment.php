<?php
session_start();
$id=$_POST['cid'];
$conn=mysqli_connect("localhost","root","","newdb");
$row=mysqli_query($conn,"select * from comment where id='$id' order by cid desc");
while($r=mysqli_fetch_array($row))
{
	$name=$r['name'];
	$comment=$r['comment'];
	echo "<div style='text-align:center; padding:10px;line-height:2px;'>";
	echo "<p ><b>"; echo $name; echo "</b></p><br>"; echo "<p>"; echo $comment; echo "</p></div>";
}


?>