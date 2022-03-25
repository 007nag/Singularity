<?php
include 'header.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div class="container">
<div class="left">

</div>
<div class="mid">
<form method="POST" enctype="multipart/form-data">

	<p><input type="file" name="image"><input type="submit" name="su" value="upload">
	</p>
	<br>
	<p><textarea name="des" placeholder="Add a description"></textarea></p>
	 
	

</form>
<?php
$conn=mysqli_connect("localhost","root","","newdb");
if(isset($_POST['su']))
{  

$iname=uniqid('',true);

$target="images/".basename($iname);
$uname=$_SESSION['user'];
$des=$_POST['des'];

if(move_uploaded_file($_FILES['image']['tmp_name'], $target))

{
	mysqli_query($conn,"insert into posts values('','$uname','$iname','$des')");
}
else
{
	echo "not successful";
}
}

	
	$us=$_SESSION['user'];
	$re=mysqli_query($conn,"select * from posts where username='$us' order by id desc");
	while($row=mysqli_fetch_array($re))
	{
		$il=$row['imagename'];
		echo "<div>";
		echo "<p><b>"; echo $row['username']; echo "</b></p>";
		echo "<p><img src='images/".$row['imagename']."'></p>";
		echo "<p>"; echo $row['des']; echo "</p>";
		echo "<form method='post' action='delete.php'>";
		echo "<input type='hidden' name='file' value='".$il."'>";
		echo "<input type='submit' name='del' value='delete'>";
		echo "</form>";
	echo "</div>";	



}
?>

















	</div>
	
</div>
</body>
</html>
<style type="text/css">

	.container
	{
		margin-top:50px;
		background-color: #e0e0eb;
		display: flex;
		height: 665px;

	}
.left{

background-color: black;
flex: .5;
order:0;
border-radius: 4px;

}
.mid{
margin-left:-25px;
margin-right: 5px;
	flex:1;
	background-color: yellow;
order:1;
border-radius: 4px;
}
.right{
	
	flex:.5;
	background-color: green;
order:2;
border-radius: 4px;
}
</style>