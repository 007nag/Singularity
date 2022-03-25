<?php
session_start();
$conn=mysqli_connect("localhost","root","","newdb");

$iname=uniqid('',true);

$target="images/".basename($iname);
$uname=$_SESSION['user'];
$des=$_POST['des'];

if(move_uploaded_file($_FILES['image']['tmp_name'], $target))

{
	mysqli_query($conn,"insert into posts values('','$uname','$iname','$des')");
	$iiid=mysqli_query($conn,"select max(id) as maxid from posts where username='$uname'");
	$qq=mysqli_fetch_assoc($iiid);
	$il=$iname;
	$f1=$uname;
			$lid=$qq['maxid'];
		echo "<div class='im'>";
		echo "<form method='POST' action='profile.php'><p style='font-size:large; margin:10px; ' class='te' ><input type='hidden'  name='us' value='".$uname."'><button name='pro'  
		   style='background:none;border:none;text-decoration:none; cursor:pointer;font-size:16px;color:#3b5598;text-align:center;'><b>";echo $uname;echo "</b></button></p></form>";
		echo "<p>"; echo $des; echo "</p>";
		echo "<p><img src='images/".$iname."' width=100% ></p>";
		
$j=0;
$r2[]="";

$lik=mysqli_query($conn,"select name from likes where id='$lid'");
			$cou=mysqli_num_rows($lik);
			while($t=mysqli_fetch_array($lik))

{

	$r2[$j]=$t['name'];
	$j=$j+1;
}
$id1=$lid;	
			
         if(in_array($f1,$r2 )) 
         {
            
         	
         	echo "<button  id='lik".$id1."'  onclick='li(".$id1.",".$cou.");' class='bu' style='width:100px;height:26px;font-size:20px;margin-left:30px;'>UNLIKE</button>";
         	//echo "  <p id='co".$id1."' style='color:white;'>"; echo $cou; echo "  likes"; echo "</p>";
 	 		
         }
         else
         {
            
         
         echo "<button id='lik".$id1."'  onclick='li(".$id1.",".$cou.");' class='bu' style='width:100px;height:26px;font-size:20px;margin-left:30px;' >LIKE</button>";
          //echo "  <p id='co".$id1."' style='color:white;'>"; echo $cou; echo "  likes"; echo "</p>";
         
         }
		echo "<button  id='com".$id1."' onclick='co(".$lid.");' class='bu' style='width:120px;height:26px;font-size:20px;
		margin-left:650px;'>COMMENT</button><input type='hidden' id='iid' value='$lid' >";
		
		
		echo "<div id='c".$lid."' class='commen' style='text-align:center; padding:10px;'></div>";
		echo "</div>";
}
else
{
	echo 1;
}

?>