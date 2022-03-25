<?php
$conn=mysqli_connect('localhost','root','','newdb');
$v1=$_POST['value'];
$q1=mysqli_query($conn,"select name from users where name like '%{$v1}%'");
while($q=mysqli_fetch_array($q1))
{
	$r1=$q['name'];
				$tt=mysqli_query($conn,"select image from details where username='$r1'");
			$tt1=mysqli_fetch_assoc($tt);
			$pat="profile/".$tt1['image'];
	echo "<div id='ele'>";
	echo "<form method='POST' action='profile.php'><p style='font-size:large; margin:10px; ' class='te' ><image src='$pat' style='border-radius:50%; width:30px; height:30px;'/><input type='hidden'  name='us' value='$r1'><button name='pro'  
		   style='background:none;border:none;text-decoration:none; cursor:pointer;font-size:16px;color:solid black;text-align:center;'><b>";echo $r1;echo "</b></button></p></form>";
	 echo "</div>";
}

?>