<script src="jquery.js"></script>
<?php

include "header.php";
$conn=mysqli_connect("localhost","root","","newdb");
$f1=$_SESSION['user'];

$res=mysqli_query($conn,"select * from follow where f1='$f1'");
$i=0;
$r1[]="";
while($r=mysqli_fetch_array($res))
{

	$r1[$i]=$r['f2'];
	$i=$i+1;
}
$q=mysqli_query($conn,"select * from posts order by id desc");
	while($row=mysqli_fetch_array($q))
	{
		
		if(in_array($row['username'],$r1 ))
		{
			$il=$row['imagename'];
			$lid=$row['id'];
		echo "<div class='im'>";
		echo "<p><b>"; echo $row['username']; echo "</b></p>";
		echo "<p>"; echo $row['des']; echo "</p>";
		echo "<p><img src='images/".$row['imagename']."' width=20% height=50%></p>";
		echo "<form method='post'><input type='submit' value='Comment' name='comm".$lid."'>";
		echo "</form>";
		if(isset($_POST['comm'.$lid.'']))
			{
				echo "<div>";
				echo "<form >";
				echo "<p><textarea id='comment' placeholder='Add a Comment'></textarea></p>";
				echo "<p><input type='button' value='add' onclick='po();'></p><input type='hidden' id='pid' value='$lid'></form>";

			}
		echo "</div>";
		echo "<div id='nag'>hi</div>";
		}

		}
	

?>
<script type="text/javascript">
	function po()
	{
		

		var v1= $('#comment').val();
		var v2= $('#pid').val();
		$.post('comment.php', {postv1:v1,  postv2:v2},function(data)
			{
				$('#nag').html(data);
			});
		  
	}
</script>
<style type="text/css">
	.im
	{
			margin-top: 40px;
	}
</style>