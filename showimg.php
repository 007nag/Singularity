<?php
$conn=mysqli_connect("localhost","root","","newdb");
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$result=mysqli_query($conn,"select * from posts where id='$id' ");
	while ($row=mysqli_fetch_array($result)) {
	 $imgdata=$row['image'];
	 header('Content-type: image/jpg');
echo $imgdata;
	}

}



?>