<script src="jquery.js"></script> 
<?php
if(!isset($_SESSION))
{session_start();}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div class="header" style="z-index: 1000;">
	<form method="POST">
<p class="search"><b>Search</b><input type="text" class="sea" id='bar' onkeyup="fu(this.value);"></p>

<p class="home"><input type="submit" value="Home" name="ho"></p>
<p class="view"><input type="submit" value="Find People" name="vie"></p>
<p class="logout"><input type="submit" value="Logout" name="lout"></p>
</form></div>
<div style="width:20px;margin-top: 40px;position: fixed;"><form method='POST' action='profile.php'><p style='font-size:large; ' class='te' ><input type='hidden'  name='us' value='<?php  echo $_SESSION['user'];?>'><button name='pro'  
		   style='text-decoration:none; margin-top: 60px; cursor:pointer;font-size:16px;color:#3b5598;text-align:center;'><b><?php  echo $_SESSION['user'];?></b></button></p></form></div>
<div id="sea"  ></div>
</body>
</html>

<?php

if(isset($_POST['ho']))
{
	header("Location:timeline.php");
}
if(isset($_POST['lout']))
{
	$conn=mysqli_connect("localhost","root","","newdb");
session_start();

$name=$_SESSION['user'];
mysqli_query($conn,"update users set status=0 where name='$name'");

	session_destroy();
	header("Location:index.php");
}
if(isset($_POST['vie']))
{
	header("Location:find.php");
}
?>
<style type="text/css">
	#sea{
		margin-top:1.5%;
		z-index: 10000;
		position: fixed;
		background-color: #d26a89;
		color: white;
		width: 449px;
		height: 500px;
		margin-left: 12.3%;
		display: none;
	}
	.header
	{
		margin-top: -8px;
		position: fixed;
		background-color: #ab3789;
width: 100%;
	}
	.search , .profile , .home , .view, .logout{
		display: inline-block;
	}
	.search
	{
		margin-left:10%;
font-size: 15px;
color: white;
	}
	.profile{
		margin-left:12%;
	}
	.home, .view,.logout
	{
		margin-left:20px;
	}
	.sea{
		width:450px;
		height:100%;
		border-radius: 4px;
	}
	#ele
	{
	color:black;
	}
	#ele:hover
	{
		background-color: #811e6e;
	}
</style>
<script type="text/javascript">

			
			function fu(f) {
				if(f=='')
				{	$('#sea').hide();
					$('#sea').empty();
				}
				
				if(f!=''){
				$.post('n1.php',{value:f},function(d)
				{
					$('#sea').show();
					$('#sea').html(d);
				});}
			


		}


</script>