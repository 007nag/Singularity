<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<div class="header">
	<div class="im"></div>
	
<div class="log">
<form method="POST">
	<p class="use">Username <br><input type="text" name="luser" width=48></p>

<p class="pa">Password <br><input type="Password" name="lpassword" width=48></p>
<p class="lo"><input type="submit" value="Log In" name="login"></p>
</form>
</div>



</div>
<div class="register">
	<form method="POST">
<p class="acc"><b>Create an account.</b></p>
<br>
<p class="name">Username<br><input type="text" name="ruser"></p>
<br>
<p class="email">Email<br><input type="text" name="remail"></p>
<p class="pass">Password<br><input type="Password" name="rpassword"></p>
<br>
<p class="submit"><input type="submit" name="submit" value="Sign Up"></p>
</form>
	</div>
</body>
</html>
<?php
$conn=mysqli_connect("localhost","root","","newdb");
if(isset($_POST['submit']))
{
$name=$_POST['ruser'];
$email=$_POST['remail'];
$password=$_POST['rpassword'];
$q="insert into users values ('$name','$email','$password')";
mysqli_query($conn,$q);
}
?>
<?php
$conn=mysqli_connect("localhost","root","","newdb");
if(isset($_POST['login'])){
$username=$_POST['luser'];
$password=$_POST['lpassword'];
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
<style type="text/css">
	.header{
		display:flex;
		background-color:#3b5998;
		height: 100px;
		width:100%;
	}
	.img{
		flex:1;
		margin: auto;
	}
	.log{
		flex:1;
		margin: auto;
		margin-left: 50%;
		color:white;
	}
	.use, .pa{
		display:inline-block;
		margin-left: 10px; 
	}
	.lo
	{
		background-color:#3b6199;
		margin-left: 10px;
		color:white;
		border:none;
		
	}
.register
{
	display:flex;
	width:100%;
	
	background-color:#f0f0f5;
	height:500px;
}
.acc{
	font-size: 50px;
}
.name{
	margin-left: 20px;
}
.email, .pass{
	display:inline-block;
	margin-left: 20px;
}
</style>