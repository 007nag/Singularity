<?php
include('index.php');

$conn=mysqli_connect("localhost","root","","newdb");
if(isset($_POST['submit'])){
$username=$_POST['username'];

$password=$_POST['password'];
$qu="select name,password from users where name='$username'";

$q=mysqli_query($conn,$qu);
if(mysqli_num_rows($q)>0)
{
	
	$row=mysqli_fetch_row($q);
	if($password==$row[1])
	{
$_SESSION['user']=$username;
header("Location:index.php");
	}
	else
		echo "username and password invalid";
}
else
echo"enter correct details";
}
?>
<!DOCTYPE html>
<html>

<head>
	<title></title>
</head>
<body>
<div>
<form method="POST">
	<p>Username:<input type="text" name="username"></p>
<p>Password:<input type="password" name="password"></p>
<p>Submit<input type="submit" name="submit"></p>

</form>
<a href="index.php">index</a>
</div>
</body>
</html>