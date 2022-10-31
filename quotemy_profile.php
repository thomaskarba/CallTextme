<?php
require 'db.php';
session_start();
	//LOGGED IN USER
    $id = $_SESSION['id'];

?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
	<title>QMR</title>
		<link rel="icon" href="img/ro.png">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
body{background-color:black;}
div{text-align:center;}

@import url('https://fonts.googleapis.com/css?family=Roboto+Mono:500');
	header{background-color:yellow;width:300px;text-align:center;
	font-family:'Roboto Mono',monospace;color:black;
	border:3px solid #000000;margin:auto;}

select,button
	{padding: 3px 3px;
	margin: 5px;
	border: 1px solid #dce4f2;
	border-radius:10px;
	font-family: 'Dosis', sans-serif;
	font-size:20px;
	background-color:#e9f0ee;
	color:#7b868f;}

input[type=submit]{
	background-color:#91edc4;
	color:black;
	border:0;
	margin-bottom:20px;
	margin-top:5px;
	<!--font-family: 'Dosis', sans-serif;-->
	font-size:26px;
	padding:9px 18px;}

input[type=submit]:hover{
	background-color:#8fc2ab;
}

li{font-size:18px;}
ul{background-color:red;margin:0;padding:0;overflow:hidden;list-style-type:none;}

#link{display:block;padding:20px;}
#link:link,a:visited{background:#FFFF00 linear-gradient(to right,#000000,#FFFF00,#FFFF00,#000000);}
#link:hover{background:#eb1e66 linear-gradient(to right,#000000,#eb1e66,#eb1e66,#000000)}	
#link:active{background:#000000 linear-gradient(to right,#000000,#000000,#000000,#000000);}

a{text-decoration:none;color:black;}
@import url('https://fonts.googleapis.com/css?family=Roboto+Mono:500');
footer,#topheader{font-family:'Roboto Mono',monospace;font-size:18px;}
article{margin:auto;font-family:'Roboto Mono',monospace;width:300px;}<!--QMR-->
div{margin:auto;text-align:center;}
section{font-family:'Roboto Mono',monospace;color:red;}
hr{width:25%;}
</style>
<body>



<?php // PROFILE LOAD
	if(isset($_GET['uid'])){
	$uid = $_GET['uid'];
	$_SESSION['click'] = $uid;
	$repeaterlookup = "SELECT * FROM updater WHERE repeater='$uid'";
	$rload = mysqli_query($mysqli,$repeaterlookup);
	$found = mysqli_fetch_array($rload);
		$who = $found['1'];

	$call = "SELECT * FROM users WHERE id='$who'";
	$infoload = mysqli_query($mysqli,$call);
	$row = mysqli_fetch_array($infoload);
		$profile = $row['1'];
		$image = $row['5'];
		
if(isset($_GET['e'])){
	
	echo "<div><div =id='topheader'><strong><a href='viewe_profile.php?uid=".$uid."' id='link'><img src='img/central.png' width='50px'></a></div><br>";
		
	echo "<img width='300px' border='2px' src='profileimg/".$image."'><br><br>";
	echo "<br>";
	
	echo "<form action='viewe_profile.php?uid=".$uid."' method='POST'><textarea name='message' rows='2' cols='30'></textarea><br><input type='submit' name='qmr' value='SEND'></form>";

	} else {
	
			
	echo "<div><div =id='topheader'><strong><a href='view_profile.php?uid=".$uid."' id='link'><img src='img/central.png' width='50px'></a></div><br>";
		
	echo "<img width='300px' border='2px' src='profileimg/".$image."'><br><br>";
	echo "<br>";
	
	echo "<form action='view_profile.php?uid=".$uid."' method='POST'><textarea name='message' rows='2' cols='60'></textarea><br><input type='submit' name='qmr' value='SEND'></form>";
	}}
	
	elseif(isset($_GET['u'])) {
		
	$who = $_GET['u'];
		
	$call = "SELECT * FROM users WHERE id='$who'";
	$infoload = mysqli_query($mysqli,$call);
	$row = mysqli_fetch_array($infoload);
		$image = $row['5'];
		$qmr = $row['6'];
		
	
	echo "<div><div =id='topheader'><strong><a href='view_profile.php?u=".$who."' id='link'><img src='img/central.png' width='50px'></a></div><br>";
		
	echo "<img width='300px' border='2px' src='profileimg/".$image."'><br><br>";
	echo "<br>";
	
	echo "<form action='view_profile.php?u=".$who."' method='POST'><textarea name='message' rows='2' cols='30'></textarea><br><input type='submit' name='qmr' value='SEND'></form>";

		}


elseif(isset($_GET['ib'])) {
		
	$who = $_GET['ib'];
		
	/*$call = "SELECT * FROM users WHERE id='$who'";
	$infoload = mysqli_query($mysqli,$call);
	$row = mysqli_fetch_array($infoload);
		$image = $row['5'];
		$qmr = $row['6'];
		*/
	
	echo "<div><div =id='topheader'><strong><a href='contact_profile.php?uid=".$who."&ib' id='link'><img src='img/central.png' width='50px'></a></div><br>";
		
//	echo "<img width='300px' border='2px' src='profileimg/".$image."'><br><br>";
//	echo "<br>";
	
	echo "<form action='contact_profile.php?uid=".$who."&ib' method='POST'><textarea name='message' rows='2' cols='30'></textarea><br><input type='submit' name='qmr' value='SEND'></form>";

		}

elseif(isset($_GET['pb'])) {
		
	$who = $_GET['pb'];
		
	/*$call = "SELECT * FROM users WHERE id='$who'";
	$infoload = mysqli_query($mysqli,$call);
	$row = mysqli_fetch_array($infoload);
		$image = $row['5'];
		$qmr = $row['6'];
		*/
	
	echo "<div><div =id='topheader'><strong><a href='contact_profile.php?uid=".$who."&pb' id='link'><img src='img/central.png' width='50px'></a></div><br>";
		
//	echo "<img width='300px' border='2px' src='profileimg/".$image."'><br><br>";
//	echo "<br>";
	
	echo "<form action='contact_profile.php?uid=".$who."&pb' method='POST'><textarea name='message' rows='2' cols='30'></textarea><br><input type='submit' name='qmr' value='SEND'></form>";

		}		
	
	
	?>


</div></body>
</html>