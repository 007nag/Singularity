<?php
include('index.php');
$conn=mysqli_connect("localhost","root","","newdb");

if(isset($_POST['submit']))
{

$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$q="insert into users values ('$name','$email','$password')";
mysqli_query($conn,$q);



}





?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div id="reg">
<form method="POST" >
<p>name:<input type="text" name="name"></p>
<p>email:<input type="text" name="email"></p>
<p>password:<input type="password" name="password"></p>
<p><input type="submit" name="submit">submit</p>
</form>
</div>
</body>
</html>