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
            $k="u";
         	echo "<p><form>";
         	echo "<input value='UNLIKE' id='lik".$id1."' type='button' onclick='li(".$k.",".$id1.");'></form></p> ";
         }
         else
         {
            $k="l";
         echo "<p><form >";
         echo "<input value='LIKE' type='button' id='lik".$id1."' onclick='li(".$k.",".$id1.");' ></form></p> ";	
         }
		
		