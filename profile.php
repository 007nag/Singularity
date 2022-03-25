<script src="jquery.js"></script> 
<?php

$conn=mysqli_connect("localhost","root","","newdb"); 
session_start();
include "header.php";
if(isset($_POST['pro'])){    
 $us=$_POST['us'];         
 $_SESSION['view']=$us;

 }
 else
 {
 	$us=$_SESSION['view'];
 }
$r=mysqli_query($conn,"select * from details where username='$us'");
$row=mysqli_fetch_assoc($r); 
$im=$row['image']; 
$tp = "profile/".basename($im);
echo $us; 
?>
<!DOCTYPE html>
<html> <head>     <title></title> </head> <body> 
	<div class="ch">
<div id="box" class="box"><button  class="chat" id="chat"name="chat" onclick="chat( '<?php echo $_SESSION['user']; ?>' )">Chat</button>
	<div id="names" name="names" class="names">
</div>
<div id='me'><input type='text' placeholder="send a message" id="mess" name="mess" style="width: 80%; height: 40px;">
<input type='submit' id='send' value='SEND'>
</div>
	</div>


</div>
	<div id='contai' style="padding-top: 50px; padding-bottom: 5px;">
	<form id="uploadForm"
action="profile1.php" method="post">
<div id="targetLayer" style="text-align: center;"><img  id="prof" src="<?php echo $tp; ?>"  /></div>
<?php if($us==$_SESSION['user'])
{ 
?>
 
 <div id="uploadFormLayer" style="text-align: center;margin-top: -8%;margin-left: -3%;"><h2 style="color:#3b5598;"><?php echo $us;?></h2><br><h6 style="margin-top: -3%;">Change profile pic</h6><input name="userImage" type="file" class="inputFile" /><br/> 
<input  type="submit" value="Submit" class="btnSubmit" /></div> </form>
</div>
  <script type="text/javascript">    
   $(document).ready(function (e) {
	$("#uploadForm").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
        	url: "profile1.php",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data)
		    {

			$("#targetLayer").html(data);
		    },
		  	error: function() 
	    	{
	    	} 	        
	   });
	}));
});
   </script>
<?php
}
else{
	$uu=$_SESSION['user'];
	$f=mysqli_query($conn,"select f2 from follow where f1='$uu'");
$i=0;
$r1[]="";
while($r=mysqli_fetch_array($f))
{

	$r1[$i]=$r['f2'];
	$i=$i+1;
}

 echo "<h2 style='color:#3b5598;margin-top:-4%;''>"; echo $us; echo "</h2></form></div>"; 
if(in_array($us,$r1)){
		
	echo "<p style='width:60px;z-index:1200;margin-left:55%;margin-top:-48px;'><input type='button' name='fol' id='foo' value='Unfollow'  onclick=de('".$us."'); ></p>";}
else{
	echo "<p style='width:60px;z-index:1200;margin-left:55%;margin-top:-48px;'><input type='button' name='fol' id='foo' value='Follow' onclick=de('".$us."');></p>";}
}

echo "<div id='det' style='text-align:center;'>";
if($_SESSION['user']!=$us){
echo "<p><b>USERNAME:   "; echo $row['username']; echo "</b></p>";
echo "<p><b>EMAIL:   "; echo $row['email']; echo "</b></p>";
echo "<p><b>NAME:   "; echo $row['fname']; echo "</b></p>";
echo "<p><b>CITY:   " ;echo $row['city']; echo "</b></p>";
echo "<p><b>CELL:   " ;echo $row['cell']; echo "</b></p>";
}
else
{
	echo "<table style='margin-left:40%;'>";

echo "<tr><th>USERNAME:</th><th><div contentEditable='true' class='edit' id='username' >"; echo $row['username']; echo "</div></th></tr>";
echo "<tr><th>EMAIL:</th><th><div contentEditable='true' class='edit' id='email'>"; echo $row['email']; echo "</div></th></tr>";
echo "<tr><th>NAME:</th><th><div contentEditable='true' class='edit' id='fname'>"; echo $row['fname']; echo "</div></th></tr>";
echo "<tr><th>CITY:</th><th><div contentEditable='true' class='edit' id='city'>" ;echo $row['city']; echo "</div></th></tr>";
echo "<tr><th>CELL:</th><th><div contentEditable='true' class='edit' id='cell'>" ;echo $row['cell']; echo "</div></th></tr>";

echo "</table>";
}
echo "</div>";
if($_SESSION['user']==$us)
{	echo "<div id='inp' style='text-align:center;'><h1 style='color:#3b5598'>UPLOAD AN IMAGE</h1>";
	echo '<form method="POST" id="upl" enctype="multipart/form-data">

	<p style="text-align:center;"><input type="file" name="image"><input type="submit" name="su" id="sub" value="upload">
	</p>	
	<br>
	<p style="text-align:center; padding-bottom:20px;margin-top:-4%;"><textarea name="des" placeholder="Add a description" style="background-color:#ffffff;border:1px solid black; height:100px;"></textarea></p>
	 
	

</form></div>';

}
$f1=$_SESSION['user'];
$q=mysqli_query($conn,"select * from posts where username='$us' order by id desc");
echo "<div id='thecon'>"; echo "<div id='images'>";
while($row=mysqli_fetch_array($q))
{
$il=$row['imagename'];
			$lid=$row['id'];
			$tu=$row['username'];
			$tt=mysqli_query($conn,"select image from details where username='$tu'");
			$tt1=mysqli_fetch_assoc($tt);
			$pat="profile/".$tt1['image'];
		echo "<div class='im'>";
		echo "<form method='POST' action='profile.php'><p style='font-size:large; margin:10px; ' class='te' ><image src='$pat' style='border-radius:50%; width:30px; height:30px;'/><input type='hidden'  name='us' value='".$row['username']."'><button name='pro'  
		   style='background:none;border:none;text-decoration:none; cursor:pointer;font-size:16px;color:#3b5598;text-align:center;'><b>";echo $row['username'];echo "</b></button></p></form>";
		echo "<p>"; echo $row['des']; echo "</p>";
		echo "<p><img src='images/".$row['imagename']."' width=100% ></p>";
		
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
		echo "</div>";
		

?>
<script type="text/javascript">
	function de(d)
	{
		var va=$('#foo').val();
		$.post('follow.php',{val:va,f2:d},function(f)
			{
				$('#foo').val(f);
			});
	}
	$(document).ready(function()
	{

		$('#upl').on('submit',function(e)
		{	e.preventDefault();
			
		$.ajax({
        	url: "upload.php",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data)
		    {
			
			$('#images').prepend(data);
		    },
		  	error: function() 
	    	{
	    	} 	        
	   });	
		});

$('.edit').click(function()
{
$(this).addClass('editMode');
    
});
$('.edit').focusout(function()
	{
		
		$(this).removeClass('editMode');
		var id=this.id;
		
		var value = $(this).text();
		$.post('edit.php',{value:value,id:id},function(){
			
		});

	});
});

</script>
<style type="text/css">
#inp
{
	background-color: #ffffff;
	margin-left: 20%;
	margin-right: 20%;
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
#thecon
{

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
		margin-top:24.4%;
		width:30%;
		height:50%;
	position: fixed;

	
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



<style type="text/css">
#det
{
	background-color:#0037fb;
	margin-left: 20%;
	margin-right: 20%;
}
.editmode
{
	border: 1px solid black;
}
#prof{
	border-radius: 50%;
	width: 300px;
	height: 300px;
	margin-top: 3%;
	margin-left: 5%;
}
#targetLayer
{
	width:400px;
	height: 400px;
	margin-left: 30%;
	margin-right: 20%;
	}
	
#contai
{
margin-left: 20%;
margin-right: 20%;
background-color: #ffffff;
text-align: center;
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
				$('#c'+dat).append("<form > <p><textarea id='comment"+dat+"' placeholder='Add a Comment' style='text-align:center;'></textarea></p><p ><input type='button' id='addb' value='add' onclick='po("+dat+");' class='bu' style='margin-left:300px; margin-top:-60px;font-size:30px;'></p><input type='hidden' id='pid' value='dat'></form>");
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

</style>