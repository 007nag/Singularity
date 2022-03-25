<script src="jquery.js"></script> 
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div><input type='text' id='search' onkeyup="fu(this.value);" /></div>
<div id='sea' style="background-color: blue; margin-top: 20%;"></div>
</body>
</html>
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
<style type="text/css">
	#sea
	{
		background-color: blue;
	}
</style>