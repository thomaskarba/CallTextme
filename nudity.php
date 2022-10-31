<?php 
require 'db.php';
session_start();
	
	if(isset($_GET['image'])){
		$imgid = $_GET['image'];
		$default = "prof051487.jpg";
	
	// DELETE OLD IMAGE
	$imageload = "SELECT * FROM users WHERE id='$imgid'";
		$loading = mysqli_query($mysqli,$imageload);
	if (($irow = mysqli_fetch_row($loading))){
		$myimage = $irow['5'];
		$address = $irow['2'];
		if($myimage != "prof051487.jpg"){
		unlink("profileimg/$myimage"); }}

	$imageone = "UPDATE users SET image = '$default' WHERE id = '$imgid'";
	$imagetwo = "UPDATE updater SET img = '$default' WHERE id = '$imgid'";
	mysqli_query($mysqli, $imageone);
	mysqli_query($mysqli, $imagetwo);		
	
	// EMAIL
		$subject = "QuoteMyRelationship.com PROFILE IMAGE ALERT";
		$body = "http://QuoteMyRelationship.com/quote_disclaimer.html DO NOT POST NUDITY OR EXPLICIT IMAGES TO THIS SITE.";	
mail($address,$subject,$body);
echo "SENT";
	}	

if(isset($_GET['false'])){
			$imgid = $_GET['false'];
	$false = "UPDATE users SET nudity = '0' WHERE id = '$imgid'";
mysqli_query($mysqli, $false);}
				
?>
<!DOCTYPE html>
<html>
<head>
<title>QMR</title>
<link rel="icon" href="img/ro.png">
<style>
@import url('https://fonts.googleapis.com/css?family=Roboto+Mono:500');

body{font-family:'Roboto Mono',monospace;color:white;background-image:url("img/forum10.jpg");}

#container{text-align:center;}

#cell{width:275px;font-size:35px;text-transform:uppercase;}

table{text-align:center;}

#a{display:block;border:1px solid yellow;color:yellow;font-size:35px;text-decoration:none;}

header{font-family:'Roboto Mono',monospace;color:white;background-color:black;font-size:30px;}
	
table{width:100%;margin:0;}	

#container{text-align:center;}

</style>
</head>
<body><div id="container">


<header>

<table><tr><td>

<a id="a" href="profile.php">BACK</a>

</td></tr>
</table>

</header>
	
<?php 
	$others = "SELECT * FROM users WHERE image != 'prof051487.jpg' AND nudity = 1 LIMIT 8";
			if($crowd = mysqli_query($mysqli, $others)){
	
		echo "<table><tr>";
			$rowmax = 4;
			$rowcount = 0;

		while($contents = mysqli_fetch_row($crowd)){

		if ($rowcount == $rowmax){echo "</tr><tr>";$rowcount=0;}
					
		echo "<td><a href='nudity.php?image=".$contents['0']."'><img src='profileimg/".$contents['5']."' width='100%'></a>";
		echo "<a href='nudity.php?false=".$contents['0']."'><div id='cell'>FALSE</div></a></td>";		

		$rowcount++;

			mysqli_close($mysqli);}
			echo "</tr></table>";
			
			}
?>
</div>
</body>
</html>