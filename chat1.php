<?php
session_start();
$us=$_SESSION['user'];
$conn=mysqli_connect("localhost","root","","newdb");
if($_POST['m']==0)
{
	$t=$_POST['u'];
$_SESSION['to']=$t;

$ab=mysqli_query($conn,"select max(id) as maxid from chat where f='$t' and t='$us'");
	$cd=mysqli_fetch_assoc($ab);
	$_SESSION['maxid']=$cd['maxid'];
}

if($_POST['m']==3){
	$r=$_SESSION['to'];
$iid=mysqli_query($conn,"select max(id) as maxid from chat where f='$r' and t='$us'");
$id1=mysqli_fetch_assoc($iid);
if($id1['maxid']!=$_SESSION['maxid'])
{	$max=$id1['maxid'];
	$id2=mysqli_query($conn,"select message from chat where id='$max'");
	$id3=mysqli_fetch_assoc($id2);
$_SESSION['maxid']=$max;
$ms1=$id3['message'];
echo "<div id='main2'><p><b>"; echo $r; echo "</b></p>"; echo "<p>"; echo $ms1; echo "</p></div>";
}

}

else if($_POST['m']==1)
{
$l=$_SESSION['to'];
	$ms=$_POST['sen'];
	
	
	
mysqli_query($conn,"insert into chat values('','$us','$l','$ms')");

echo "<div id='main1'><p ><b>"; echo $us; echo "</b></p>"; echo "<p>"; echo $ms; echo "</p></div>";
}
else {
	
$res=mysqli_query($conn,"select * from chat where f='$us' and t='$t' or t='$us' and f='$t' order by id");
echo "<div id='mai'><p  id='m1' style='text-align:center;'><b>"; echo $t; echo "</b></p><div>";
while($row=mysqli_fetch_array($res))
{
echo "<div id="; if($row['f']==$us)
{
	echo "'main1'>";
}
else
{ echo "'main2'>";}
echo"<p ><b>"; echo $row['f']; echo "</b></p>";
echo "<p id='m2'>"; echo $row['message']; echo "</p></div>";

}
}

?>

