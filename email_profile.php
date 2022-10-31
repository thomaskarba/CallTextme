<?php
require 'db.php';
session_start();
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
	<title><?= $username ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
body{background-image:url("img/bg.gif");}
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
#link{font-family:'Roboto Mono',monospace;font-size:25px;padding:20px;text-decoration:none;display:block;}
#link:link,a:visited{background-color:yellow;color:black;}
#link:hover{background-color:#eb1e66;}
#link:active{background-color:#000000;}
a{text-decoration:none;color:black;}
@import url('https://fonts.googleapis.com/css?family=Roboto+Mono:500');
footer,#topheader{font-family:'Roboto Mono',monospace;font-size:18px;}
article{margin:auto;font-family:'Roboto Mono',monospace;width:300px;color:white;}<!--QMR-->
div{margin:auto;text-align:center;}
section{font-family:'Roboto Mono',monospace;color:red;}
footer{background-image:url("img/rainbow2.gif");font-family:'Roboto Mono',monospace;color:white;background-color:black;font-size:30px;}
#b{display:block;border:4px solid black;color:yellow;font-size:35px;text-decoration:none;}
mark{background-color:yellow;}
</style>
<body><div>


<?php 
	if(isset($_GET['uid'])){
	$uid = $_GET['uid'];

	$call = "SELECT * FROM users WHERE id='$uid'";
	$infoload = mysqli_query($mysqli,$call);
	$row = mysqli_fetch_array($infoload);
		$contact = $row['3'];
		$city = $row['4'];
		$image = $row['5'];
		$qmr = $row['6'];
	$mm = $_GET['meml'];	
				
	echo "<a href='forum.php?city=".$city."&email=".$mm."'><header><span style='font-size:225%'>".$city."</span><br></header></a><br>";
	echo "<article><span style='font-size:14px'>TOUCH TO SEND CONTACT INFO</span></article>";
	echo "<a href='forum.php?add=".$uid."&email=".$mm."'><img width='300px' border='2px' src='profileimg/".$image."'></a><br><br>";
	echo "<article><span style='font-size:14px'>".$qmr."</span></article>";
	echo "<article><span style='font-size:20px'><mark>".$contact."</mark></span></article>";

	
	
	
	$result = $mysqli->query("SELECT * FROM users WHERE email='$mm'");
	$user = $result->fetch_assoc();
	$id = $user['id'];	

mysqli_query($mysqli,"DELETE FROM central WHERE receiving='$id' AND sending='$uid'");
	
	}

	
	?>
	
<br><br>

<?php

echo "<footer><a id='b' href='profile.php?login=".$mm."'><p>CLICK TO LOGIN</p></a></footer>";

?>

</div></body>
</html>