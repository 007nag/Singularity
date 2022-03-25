<?php
session_start();
$us=$_SESSION['user'];

$id=$_POST['id'];
$conn=mysqli_connect("localhost","root","","newdb");
$j=0;
$r2[]="";

$lik=mysqli_query($conn,"select name from likes where id='$id'");
			$cou=mysqli_num_rows($lik);
			while($t=mysqli_fetch_array($lik))

{

	$r2[$j]=$t['name'];
	$j=$j+1;
}

if(!in_array($us,$r2 ))
{
	echo 4;echo "_"; echo $cou+1;
mysqli_query($conn,"insert into likes values('$id','$us')");

}
else
{
	echo 3; echo "_"; echo $cou-1;
	mysqli_query($conn,"delete from likes where id='$id' and name='$us'");
}

		

?>