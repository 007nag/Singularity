<?php
$conn=mysqli_connect("localhost","root","","newdb");
if(isset($_POST['del']))
{
$folder="images/";
$dir=opendir($folder);
	$im=$_POST['file'];
	
	while($file=readdir($dir))
	{
		if($file==$im)
		{
			if(mysqli_query($conn,"DELETE from posts where imagename='$file'"))
			{
				
			}
			else
			{
				echo "failure";
			}
			
			unlink('images/'.$file);
			
		}
	}
header("Location:feed.php");
}
?>