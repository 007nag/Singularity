$j=0;
$r2[]="";

$lik=mysqli_query($conn,"select name from likes where id='$lid'");
			while($t=mysqli_fetch_array($lik))
{

	$r2[$j]=$t['name'];
	$j=$j+1;
}
$id1=$row['id'];	
			
         if(in_array($f1,$r2 )) 
         {
         	echo "<p><form method='POST' action='like.php'><input type='hidden' value='$id1' name='id1'>";
         	echo "<input value='u' type='hidden' name ='st'><input value='UNLIKE' type='submit' name='like'></form> ";
         }
         else
         {
         echo "<p><form method='POST' action='like.php'><input type='hidden' value='$id1' name='id1'>";
         echo "<input value='l' type='hidden' name='st'><input value='LIKE' type='submit' name='like'></form> ";	
         }
		
		