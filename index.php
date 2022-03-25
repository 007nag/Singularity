<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<script type="text/javascript" src="particles.js"></script>
<script type="text/javascript" src="app.js"></script>
<style type="text/css" src="bu.css"></style>
<script type="text/javascript" src="particles.js"></script>
	<script type="text/javascript" src="app.js"></script>

<div class="logo" ><b><span>M</span>y W<span>eb</span>si<span>t</span>e</b></div>
<div class="container">
	
<div class="log" style="margin-top:10%;">
	<div class="login">
	<div class="logo1"><b>L<span>o</span>g<span>in</span></b></div>
	</div>
	<div class="login1" style="text-align: center; margin-top: 8%; line-height: 10px;">
<form method="POST">
	<p class="use"><input type="text" name="luser" width=48  placeholder="USERNAME"style=" font-size:140%;width:300px; height: 35px; border-radius:3px; border-width: 1px;"></p>

<p class="pa"><input type="Password" name="lpassword" width=48 placeholder="PASSWORD"style=" font-size:140%;width:300px; height: 35px; border-radius:3px; border-width: 1px;"></p>
<p class="lo" style="margin-top: 110px; margin-left: -90px;"><button name="login" class="bu">LOGIN</button></p>
</form>
</div>
</div>
<div class="register">
	<div class="reg">
		<div class="logo2"><b><span>R</span>e<span>g</span>is<span>te</span>r</b></div>
		<div class="reg1" >
	<form method="POST">

<br>
<p class="name"><input type="text" name="ruser" placeholder="USERNAME" style=" font-size:140%;width:300px; height: 35px; border-radius:3px; border-width: 1px;"></p>

<p class="email"><input type="text" name="remail" placeholder="EMAIL" style="font-size:140%;width:300px; height: 35px; border-radius:3px; border-width: 1px;"></p>
<p class="pass"><input type="Password" name="rpassword" placeholder="PASSWORD" style="font-size:140%;width:300px; height: 35px; border-radius:3px; border-width: 1px;"></p>
<br>
<p class="submit" style="margin-top: 10px; margin-left: -90px;"><button name="submit" class="bu">SUBMIT</button></p>
</form>
</div>
	</div>
</div>
</div>

</body>
</html>
<?php
$conn=mysqli_connect("localhost","root","","newdb");
if(isset($_POST['submit']))
{
$name=$_POST['ruser'];
$email=$_POST['remail'];
$password=md5($_POST['rpassword']);
if($name and $email and $password){
$q="insert into users values ('$name','$email','$password','')";
mysqli_query($conn,$q);
mysqli_query($conn,"insert into details values ('$name','$email','','','','default')");
echo "success";
}
}
?>
<?php
session_start();
$conn=mysqli_connect("localhost","root","","newdb");
if(isset($_POST['login'])){
$username=$_POST['luser'];
$password=md5($_POST['lpassword']);
if($username and $password){
$qu="select name,password from users where name='$username'";
$q=mysqli_query($conn,$qu);
if(mysqli_num_rows($q)>0)
{
	$row=mysqli_fetch_row($q);
	if($password==$row[1])
	{
$_SESSION['user']=$username;
$_SESSION['password']=$password;
mysqli_query($conn,"update users set status=1 where name='$username'");
header("Location:timeline.php");
	}
	else
		echo "username and password invalid";
}
else
echo"enter correct details";
}
}
?>
<style type="text/css">
		@import url(//fonts.googleapis.com/css?family=Vibur);

body {
  background: #112 url("untitled.png")  center no-repeat;
  background-size:cover;
  
height:100%;
}

.reg1{
text-align:center;
line-height: 30px;
}
.login1{

}
.logo {
  text-align: center;
  width: 65%;
  height: 250px;
  margin: 5% auto;
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  z-index: -1;
}
.logo1, .logo2{
	text-align: center;
}

.logo b, .logo1 b, .logo2 b{
  font: 100 15vh "Vibur";
  
  ;
}
.logo b{
	color: #fee;
text-shadow: 0 -40px 100px, 0 0 2px, 0 0 1em #ff4444, 0 0 0.5em #ff4444, 0 0 0.1em #ff4444, 0 10px 3px #000
}
.logo1 b{
	color:#00ff1c;
	outline-color: #4dff4d;
	outline-width: 1px;
	text-shadow: 0 -40px 100px, 0 0 2px, 0 0 1em #1aff1a, 0 0 0.5em #1aff1a, 0 0 0.1em #1aff1a, 0 10px 3px #000
}
.logo2 b{
	color:#00ffff;
	outline-color: #4dff4d;
	outline-width: 1px;
	text-shadow: 0 -40px 100px, 0 0 2px, 0 0 1em #1ad1ff, 0 0 0.5em #1ad1ff, 0 0 0.1em #1ad1ff, 0 10px 3px #000
}
.logo b span, .logo1 b span, .logo2 b span{
  animation: blink linear infinite 2s;
}
@keyframes blink {
  78% {
    color: inherit;
    text-shadow: inherit;
  }
  79%{
     color: #333;
  }
  80% {
    
    text-shadow: none;
  }
  81% {
    color: inherit;
    text-shadow: inherit;
  }
  82% {
    color: #333;
    text-shadow: none;
  }
  83% {
    color: inherit;
    text-shadow: inherit;
  }
  92% {
    color: #333;
    text-shadow: none;
  }
  92.5% {
    color: inherit;
    text-shadow: inherit;
  }
}
#particles-js{
	z-index: -2;
	height:100%;
	background:#foo;
	
}
	.container{
		display: flex;
		margin-top: 10%;
		margin-left: 10%;
		margin-right: 10%;

	}
	.log{
		flex:1;
		
		order:1;
		color:white;
		margin-left: 10%;
		opacity: 1;
		border-radius: 20px;
		}
	.use, .pa{
		
	}
	.lo
	{
		
		
		color:white;
		
		
	}
.register
{
	flex:1;
	order: 0;
	
	border-radius: 20px;
	margin-top:10%;
}
.acc{
	font-size: 50px;
}
.name{
	
}
.email, .pass{
	
	
}
.bu{
	font: 100 15vh "Vibur";

		color:white;
		position: absolute;
		border-radius: 30px;
		border-color: black;
		font-size: 40px;
		margin-left: -20px;
background:linear-gradient(90deg,#03a9f4,#f441a5,#ffeb3b,#03a9f4);
	background-size: 400%;
	border-width:0px;
z-index: 1;
	}
	.bu:hover
	{
animation: animate 8s linear infinite;
	cursor: pointer;
	}
@keyframes animate{

0%{
	background-position: 0%;
}
100%{
	background-position: 400%;
}

}
.bu:before
{
	content: '';
	position: absolute;
	top:-5px;
	left: -5px;
	right: -5px;
	bottom:-5px;
	z-index: -1;
background:linear-gradient(90deg,#03a9f4,#f441a5,#ffeb3b,#03a9f4);
	background-size: 400%;
border-radius: 30px;
border-width:0px;

	opacity: 0;
transition: 0.5s;



}
.bu:hover:before
{
	filter:blur(20px);
	opacity: 1;
	animation: animate 8s linear infinite;
}

</style>