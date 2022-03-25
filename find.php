<script src="jquery.js"></script> 
<?php
include('header.php');
$conn=mysqli_connect("localhost","root","","newdb");
$name=$_SESSION['user'];
$res=mysqli_query($conn,"select * from users where name!='$name'");
$f=mysqli_query($conn,"select f2 from follow where f1='$name'");
$i=0;
$r1[]="";
while($r=mysqli_fetch_array($f))
{

	$r1[$i]=$r['f2'];
	$i=$i+1;
}
while($row=mysqli_fetch_array($res))
{
	$va=$row['name'];
	$tt=mysqli_query($conn,"select image from details where username='$va'");
			$tt1=mysqli_fetch_assoc($tt);
			$pat="profile/".$tt1['image'];
	echo "<div class='fol'>";


	 echo "<p><form method='POST' action='profile.php'><p style='font-size:large; margin:10px; ' class='te' ><image src='$pat' style='border-radius:50%; width:30px; height:30px;'/><input type='hidden'  name='us' value='".$va."'><button name='pro'  
		   style='background:none;border:none;text-decoration:none; cursor:pointer;font-size:16px;color:#3b5598;text-align:center;'><b>";echo $va;echo "</b></button></p></form>";
	
	if(in_array($row['name'],$r1)){
		
	echo "<input type='button' name='fol' id='foo".$va."' value='Unfollow'  onclick=de('".$va."'); ></p>";}
else{
	echo "<input type='button' name='fol' id='foo".$va."' value='Follow' onclick=de('".$va."');></p>";}
}

?>
<style type="text/css">
	.fol{
		margin-top: 30px;
		padding-top: 40px;
		margin-left: 20%;
		margin-right: 20%;
		background-color: #ffffff;
		text-align: center;
	}
	.header{
		margin-top:-30px;
		margin-left: -8px;
	}
body
{
	background-color: #e4d3c8;
}
</style>
<script type="text/javascript">
	function de(d)
	{
		var va=$('#foo'+d).val();
		$.post('follow.php',{val:va,f2:d},function(f)
			{
				$('#foo'+d).val(f);
			});
	}
</script>