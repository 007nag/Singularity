<script src="jquery.js"></script>
<?php

include "header.php";

?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
</head>
<body>
<div class="ch">
<div id="box" class="box"><button  class="chat" id="chat"name="chat" onclick="chat( '<?php echo $_SESSION['user']; ?>' )">Chat</button>
	<div id="names" name="names" class="names">
</div>
<div id='me'><input type='text' placeholder="send a message" id="mess" name="mess" style="width: 80%; height: 40px;">
<input type='submit' id='send' value='SEND'>
</div>
	</div>


</div>

</body>
</html>
<?php
$conn=mysqli_connect("localhost","root","","newdb");
if(!$f1=$_SESSION['user']){
	header("Location:index.php");
}

$res=mysqli_query($conn,"select * from follow where f1='$f1'");
$i=0;
$r1[]="";
while($r=mysqli_fetch_array($res))
{

	$r1[$i]=$r['f2'];
	$i=$i+1;
}
$q=mysqli_query($conn,"select * from posts order by id desc");
echo "<div id='thecon' style=''>"; echo "<div id='images'>";
	while($row=mysqli_fetch_array($q))
	{
		
		if(in_array($row['username'],$r1 ))
		{
			$tu=$row['username'];
			$il=$row['imagename'];
			$lid=$row['id'];
			$tt=mysqli_query($conn,"select image from details where username='$tu'");
			$tt1=mysqli_fetch_assoc($tt);
			$pat="profile/".$tt1['image'];
		echo "<div class='im'>";
		echo "<form method='POST' action='profile.php'><p style='font-size:large; margin:10px; ' class='te' ><image src='$pat' style='border-radius:50%; width:30px; height:30px;'/><input type='hidden'  name='us' value='".$row['username']."'><button name='pro'  
		   style='background:none;border:none;text-decoration:none; cursor:pointer;font-size:16px;color:#3b5598;text-align:center;'><b>";echo $row['username'];echo "</b></button></p></form>";
		echo "<p>"; echo $row['des']; echo "</p>";
		echo "<p><img src='images/".$row['imagename']."' width=100% ></p>";
		if(isset($_POST['pro']))
		{
			header("Location:profile.php");
		}
$j=0;
$r2[]="";

$lik=mysqli_query($conn,"select name from likes where id='$lid'");
			$cou=mysqli_num_rows($lik);
			while($t=mysqli_fetch_array($lik))

{

	$r2[$j]=$t['name'];
	$j=$j+1;
}
$id1=$row['id'];	
			
         if(in_array($f1,$r2 )) 
         {
            
         	
         	echo "<button  id='lik".$id1."'  onclick='li(".$id1.",".$cou.");' class='bu' style='width:100px;height:26px;font-size:20px;margin-left:30px;margin-top:20px;'>UNLIKE</button>";
         	echo "  <p id='co".$id1."' style='color:black;margin-left:385px;margin-top:-5px;'>"; echo $cou; echo "  likes"; echo "</p>";
 	 		
         }
         else
         {
            
         
         echo "<button id='lik".$id1."'  onclick='li(".$id1.",".$cou.");' class='bu' style='width:100px;height:26px;font-size:20px;margin-left:30px;margin-top:20px;' >LIKE</button>";
          echo "  <p id='co".$id1."' style='color:black;margin-left:385px;margin-top:-5px;'>"; echo $cou; echo "  likes"; echo "</p>";
         
         }
		echo "<button  id='com".$id1."' onclick='co(".$lid.");' class='bu' style='width:120px;height:26px;font-size:20px;
		margin-left:650px;'>COMMENT</button><input type='hidden' id='iid' value='$lid' >";
		
		
		echo "<div id='c".$lid."' class='commen' style='text-align:center; padding:10px;'></div>";
		echo "</div>";
		}

		}
	
		echo "</div>";
?>

<style type="text/css">
#sea{
		margin-top:-0.1%;
		z-index: 10000;
		position: fixed;
		background-color: #d26a89;
		color: white;
		width: 449px;
		height: 500px;
		margin-left: 11.9%;
		display: none;
	}
#main1{
	background-color: #1aa3ff;
	margin-left: 20%;
	min-height: 40px;
	max-height: 120px;
	word-wrap: break-word; 
	color:white;
	border-radius: 5px;
	padding: 3px;
	margin-top: 4px;
}
#main2{
	background-color: #ff6666;
	margin-right: 20%;
	min-height: 40px;
	max-height: 120px;
	word-wrap: break-word; 
	color:white;
	border-radius: 5px;
	padding: 3px;
	margin-top: 4px;
}

#m1{
	padding-top: 4px;
}
#m2{
	min-height: 300px;
	max-height: 400px;
		word-wrap: break-word;
		line-height: 20px;
}
#images
{
	margin-left: 20%;
	margin-right: 20%;
			

}
	.use
	{
		width:400px;
		border-width: 0px;
		height: 50px;
		margin:-8px;
		background-color: #fff5cc;
	}
	.use:hover
	{
		cursor: pointer;
		background-color: #e4e4e2;
	}

	.ch
	{
		
		margin-left:70%;
		margin-top:23.7%;
		width:30%;
		height:50%;
	position: fixed;
z-index: 1000;
	
	}
	.chat
	{
		color: #ffffff;
		width:400px;
		margin-left: 20%;
		margin-top:81%;
		background-color:#3b5998;
		border-width: 0px;
		border-top-left-radius: 5px;
		border-top-right-radius: 5px;
	}
	.chat:hover
	{
		cursor: pointer;

	}
	.box
	{
		border-radius: 10px;
	}
	.names
	{
		background-color: #fff5cc;
		margin-left: 20%;
		width:400px;
		height:400px;
		color: black;
		word-wrap: break-word;
		overflow-y: scroll;
		overflow-x: hidden;
		line-height: 0px;
	}

	#me
	{
		margin-top: 0%;
		margin-left: 20%;
		width:400px;
		background-color: #fff5cc;
		display: none;
	}
	
</style>
<script type="text/javascript">
	var menu="false";
	var que="false";
	$(document).ready(function()
	{
		
		$('.chat').click(function()
		{
			que="false";
	if(menu=="false")
		{
			document.getElementById("box").style.marginTop="-80%";
			document.getElementById("names").style.height="455px";
			menu="true";
			
		}
		else
		{
			document.getElementById("box").style.marginTop="0%";
			
			menu="false";
			
		}
				
		});
		$('#send').click(function()
		{
			var messa= $('#mess').val();
			if(messa!=''){
			$.post('chat1.php',{m:1,sen:messa},function(h)
			{
				$('#mess').val('');
				$('#names').append(h);
			});}

		});


		});
	function chat(v)
	{$('#me').hide();
		if(menu=="false"){
		
		$.post('chat.php',{us:v},function(y)
			{
				$('#names').append(y);
			});
	}
else
	{ 
$('.names').empty();
	 }
}
function disp(k,t)
{
	$('#me').show();
				document.getElementById("names").style.height="414px";
	
		$.post('chat1.php',{u:k,m:0},function(l)
		{
			
			$('#names').empty();
			$('#names').append(l);
		});
		que="true";
		
			
		

}

			setInterval(function()
		{

			$.post('chat1.php',{m:3}
		,function (z)
		{ 
			if(que=="true"){
				
			if(z!= 1){
			$('#names').append(z);}}
		});},  500);
		


	function po(da)
	{
		var v1= $('#comment'+da).val();
		if(v1!=''){
		$.post('comment.php', {postv1:v1,  postv2:da},function(data)
		{
			$('#c'+da).append(data);
			$('#comment'+da).val('');
		});}
		 	}
	function co(dat)
	{
		
				$('#com'+dat).prop('disabled',true);
				$('#c'+dat).append("<form > <p><textarea id='comment"+dat+"' placeholder='Add a Comment' style='text-align:center;margin-top:-2px;'></textarea></p><p ><input type='button' id='addb' value='add' onclick='po("+dat+");' class='bu' style='margin-left:250px; margin-top:-50px;font-size:30px;'></p><input type='hidden' id='pid' value='dat'></form>");
		$.post('vcomment.php',{cid:dat},function(d)
			{
				$('#c'+dat).append(d);
			});

	}
	function li(d2,d3)
	{
		
 		$.post('like.php',{id:d2},function(x){
 			var y=x.split('_');
 			if(y[0]==4)
 			{
 				
 				$('#lik'+d2).html('UNLIKE'); 
 				
 				
 				$('#co'+d2).html( ' '+y[1]+ ' likes');

 			}
 			else
 			{
 				
 				$('#lik'+d2).html('LIKE');
 				
 				$('#co'+d2).html( ' '+y[1]+ ' likes');
 			}
 		});

	}
	
	
</script>
<style type="text/css">
	body{
		background-color:#dfe3ee;
		}
	.te{
		font-size: 60px;
		font-family: 'Futura';
		color: #fff;
		text-shadow: 0 0 5px #fff, 0 0 10px #fff, 0 0 20px #ff0080, 0 0 30px #ff0080, 0 0 40px #ff0080, 0 0 55px #ff0080, 0 0 75px #ff0080;
		text-align:center;
}
	.im
	{
		margin-left:10%;
		margin-right: 20%;
		margin-top: 40px;
		background-color: #ffffff;
		padding-top: 30px;

	}
	.im div
	{
		margin-left:20%;
		margin-right: 20%;
		margin-top: 5px;
		margin-bottom: 5px;
		background-color:#ffffff ;
		

	}
	.im div div
	{
		margin-left:5%;
		margin-right: 5%;
		margin-top: 5px;
		margin-bottom: 5px;
		background-color:#dfe3ee ;
		border-radius: 5px;
		line-height: 5px;

	}
	.im div div p b
	{
		color:#3b5998;
	}
	textarea
	{
		overflow: visible;
		align-self: center;
		border:none;
		border-radius: 10px;
		padding: 10px;
		width:400px;
		min-height:10px;
		background-color: #dfe3ee;
		margin-top: 30px;
	}
#addb{
		margin-left: 45%;
}
.bu{
		font: 100 5vh "Vibur";

		color:white;
		position: absolute;
		border-radius: 30px;
		border-color: black;
		
		margin-top: -10px;
		margin-left: 10px;
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
.header
{
	margin-top: -40px;
	margin-left: -8px;
}
</style>