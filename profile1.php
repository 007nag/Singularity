<?php
session_start();
$conn=mysqli_connect("localhost","root","","newdb");

if(is_array($_FILES)) {

if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
	
$sourcePath = $_FILES['userImage']['tmp_name'];
$us=$_SESSION['user'];
$iname=uniqid('',true);

$targetPath = "profile/".basename($iname);
if(move_uploaded_file($sourcePath,$targetPath)) {
	$res=mysqli_query($conn,"select image from details where username='$us'");
	$r=mysqli_fetch_assoc($res);
	$folder="profile/";
	$dir=opendir($folder);
	while($file=readdir($dir))
	{
		if($file==$r['image'])
		{
			if($r['image']!='default')
			unlink('profile/'.$file);
		}
	}
	mysqli_query($conn,"update details set image='$iname' where username='$us'");
	
?>
<img  id="prof" src="<?php echo $targetPath; ?>"  />
<?php

}
}
}
?>