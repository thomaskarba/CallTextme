<?php
require 'db.php';
session_start();
	//LOGGED IN USER
    $username = $_SESSION['username'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
	//LOGGED IN USER
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
	<title><?= $username ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
body{background-image:url("img/");}
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
article{margin:auto;font-family:'Roboto Mono',monospace;width:300px;}<!--QMR-->
div{margin:auto;text-align:center;}
section{font-family:'Roboto Mono',monospace;color:red;}

.qmr{width:300px; border:4px solid #d4d4d4;margin:auto;}


#mssg{font-family:'Roboto Mono',monospace;font-size:25px;padding:20px;text-decoration:none;display:block;}
#mssg:link,a:visited{background-color:#d4d4d4;color:black;}
#mssg:hover{background-color:#d4d4d4;}
#mssg:active{background-color:#000000;}

.green{background-image:url("img/g.png");width=20px;}
.red{background-image:url("img/r.png");width=20px;}
.yellow{background-image:url("img/y.png");width=20px;}

</style>
<body>



<?php // UID SEARCH
	if(isset($_GET['uid'])){
	$uid = $_GET['uid'];
	$_SESSION['click'] = $uid;
	$repeaterlookup = "SELECT * FROM updater WHERE repeater='$uid'";
	$rload = mysqli_query($mysqli,$repeaterlookup);
	$found = mysqli_fetch_array($rload);
		$who = $found['2'];
		
	// GYR
	
	$call = "SELECT * FROM users WHERE username='$who'";
	$infoload = mysqli_query($mysqli,$call);
	$row = mysqli_fetch_array($infoload);
		$g = $row['13'];
		$y = $row['14'];
		$r = $row['15'];
			if (isset($_GET['rate'])){
				
			if($_GET['rate'] == "green") {				
			$green = $g + 5;
			$rate = "UPDATE users SET g='$green' WHERE username='$who'";
			mysqli_query($mysqli,$rate);
			}
				if($_GET['rate'] == "yellow") {
				$yellow = $y + 5;
				$rate = "UPDATE users SET y='$yellow' WHERE username='$who'";
				mysqli_query($mysqli,$rate);
				}
					if($_GET['rate'] == "red") {
					$red = $r + 5;
					$rate = "UPDATE users SET r='$red' WHERE username='$who'";
					mysqli_query($mysqli,$rate);
					}	}
		
	// PROFILE LOAD
				
	$call = "SELECT * FROM users WHERE username='$who'";
	$infoload = mysqli_query($mysqli,$call);
	$row = mysqli_fetch_array($infoload);
		$profile = $row['1'];
		$image = $row['5'];
		$qmr = $row['6'];
		$contact = $row['3'];
		$availability = $row['7'];
		
		$g = $row['13'];
		$y = $row['14'];
		$r = $row['15'];
		
		
			$everyone = "anyone";
			
				
			
			// NEW QMR UPLOAD
				
				if (isset($_POST['qmr'])){
					$quote = $_POST['message'];
					$combi = "\'\'".$quote."\'\'<br>\-".$username; 
					$combi = mysqli_real_escape_string($mysqli,$_POST['message']);
						$newmessage = "INSERT INTO messages (myrelationship,message) VALUES ('$who','$combi')";
							mysqli_query($mysqli,$newmessage);
																	}
		
		if ($availability == $everyone) {
		
		
		
	echo "<div><div =id='topheader'><strong><a href='forum.php?return=".$uid."' id='link'><img src='img/central.png' width='30px'></a></div><br>";
	
	
	echo $g."<a href='view_profile.php?uid=".$uid."&rate=green'><img src='img/g.png' width='20px'></a>&nbsp;&nbsp;";
	echo $y."<a href='view_profile.php?uid=".$uid."&rate=yellow'><img src='img/y.png' width='20px'></a>&nbsp;&nbsp;";
	echo $r."<a href='view_profile.php?uid=".$uid."&rate=red'><img src='img/r.png' width='20px'></a>&nbsp;&nbsp;<br><br>";
	
	
	echo "<img width='300px' border='2px' src='profileimg/".$image."'><br><br>";
	echo "<article><span style='font-size:16px'>".$qmr."</span></article>";
	echo "<br>".$contact."<br>";
	echo "<br><article><span style='font-size:20px'>+</span><br><span style='font-size:100px'>?</span></article>";
	
	echo "<footer><a href='quotemy_profile.php?uid=".$uid."' id='mssg'>QUOTE MY RELATIONSHIP +</a></footer>";
	
	
	
	} else {
		
	
	
	echo "<div><div =id='topheader'><strong><a href='forum.php?return=".$uid."' id='link'><img src='img/central.png' width='30px'></a></div><br>";
	
	echo $g."<a href='view_profile.php?uid=".$uid."&rate=green'><img src='img/g.png' width='20px'></a>&nbsp;&nbsp;";
	echo $y."<a href='view_profile.php?uid=".$uid."&rate=yellow'><img src='img/y.png' width='20px'></a>&nbsp;&nbsp;";
	echo $r."<a href='view_profile.php?uid=".$uid."&rate=red'><img src='img/r.png' width='20px'></a>&nbsp;&nbsp;<br><br>";

	
	echo "<article>TOUCH TO SEND CONTACT INFO</article><a href='forum.php?add=".$uid."'>";
	echo "<img width='300px' border='2px' src='profileimg/".$image."'><br><br>";
	echo "<article><span style='font-size:16px'>".$qmr."</span></article>";
	echo "<br><img src='img/na.png' width='18px'><br>";
	echo "<br><article>TOUCH IMAGE TO SEND CONTACT INFO</article></a><br>";
	
	echo "<footer><a href='quotemy_profile.php?uid=".$uid."' id='mssg'>QUOTE MY RELATIONSHIP +</a></footer>";
	
	
	}
	
		$counter = 0;
			
	
	$mrcall = "SELECT * FROM messages WHERE myrelationship='$who' ORDER BY timestamp DESC";
	$mrload = mysqli_query($mysqli,$mrcall);
		while ($mr = mysqli_fetch_row($mrload)) {
			if ($counter == 10){break;} else {
			$quote = $mr['2'];
				$date = $mr['3'];
					echo "<div class='qmr'><article><span style='font-size:20px'>".$quote."</span></article></div>";
					$counter++;}
								}
							mysqli_free_result($mr);
	mysqli_close($mysqli);
	
	} elseif (isset($_GET['u'])){
		
		$who = $_GET['u'];
		
	$uidcall = "SELECT * FROM updater WHERE username='$who' ORDER BY repeater DESC LIMIT 1";
	$uidload = mysqli_query($mysqli,$uidcall);
	$callit = mysqli_fetch_array($uidload);	
		$uid = $callit['0'];
		
		
	// GYR
	
	$call = "SELECT * FROM users WHERE username='$who'";
	$infoload = mysqli_query($mysqli,$call);
	$row = mysqli_fetch_array($infoload);
		$g = $row['13'];
		$y = $row['14'];
		$r = $row['15'];
			if (isset($_GET['rate'])){
				
			if($_GET['rate'] == "green") {				
			$green = $g + 5;
			$rate = "UPDATE users SET g='$green' WHERE username='$who'";
			mysqli_query($mysqli,$rate);
			}
				if($_GET['rate'] == "yellow") {
				$yellow = $y + 5;
				$rate = "UPDATE users SET y='$yellow' WHERE username='$who'";
				mysqli_query($mysqli,$rate);
				}
					if($_GET['rate'] == "red") {
					$red = $r + 5;
					$rate = "UPDATE users SET r='$red' WHERE username='$who'";
					mysqli_query($mysqli,$rate);
					}	}
		
	// PROFILE LOAD
				
	$call = "SELECT * FROM users WHERE username='$who'";
	$infoload = mysqli_query($mysqli,$call);
	$row = mysqli_fetch_array($infoload);
		$profile = $row['1'];
		$image = $row['5'];
		$qmr = $row['6'];
		$contact = $row['3'];
		$availability = $row['7'];
		
		$g = $row['13'];
		$y = $row['14'];
		$r = $row['15'];
		
		
			$everyone = "anyone";
			
				
			
			// NEW QMR UPLOAD
				
				if (isset($_POST['qmr'])){
					$quote = $_POST['message'];
					$combi = "\'\'".$quote."\'\'<br>\-".$username; 
					$combi = mysqli_real_escape_string($mysqli,$_POST['message']);
						$newmessage = "INSERT INTO messages (myrelationship,message) VALUES ('$who','$combi')";
							mysqli_query($mysqli,$newmessage);
																	}
		
		if ($availability == $everyone) {
		
		
		
	echo "<div><div =id='topheader'><strong><a href='qmr.php' id='link'><img src='img/central.png' width='30px'></a></div><br>";
	
	
	echo $g."<a href='view_profile.php?uid=".$uid."&rate=green'><img src='img/g.png' width='20px'></a>&nbsp;&nbsp;";
	echo $y."<a href='view_profile.php?uid=".$uid."&rate=yellow'><img src='img/y.png' width='20px'></a>&nbsp;&nbsp;";
	echo $r."<a href='view_profile.php?uid=".$uid."&rate=red'><img src='img/r.png' width='20px'></a>&nbsp;&nbsp;<br><br>";
	
	
	echo "<img width='300px' border='2px' src='profileimg/".$image."'><br><br>";
	echo "<article><span style='font-size:16px'>".$qmr."</span></article>";
	echo "<br>".$contact."<br>";
	echo "<br><article><span style='font-size:20px'>+</span><br><span style='font-size:100px'>?</span></article>";
	
	echo "<footer><a href='quotemy_profile.php?u=".$who."' id='mssg'>QUOTE MY RELATIONSHIP +</a></footer>";
	
	
	
	} else {
		
	
	
	echo "<div><div =id='topheader'><strong><a href='qmr.php' id='link'><img src='img/central.png' width='30px'></a></div><br>";
	
	echo $g."<a href='view_profile.php?uid=".$uid."&rate=green'><img src='img/g.png' width='20px'></a>&nbsp;&nbsp;";
	echo $y."<a href='view_profile.php?uid=".$uid."&rate=yellow'><img src='img/y.png' width='20px'></a>&nbsp;&nbsp;";
	echo $r."<a href='view_profile.php?uid=".$uid."&rate=red'><img src='img/r.png' width='20px'></a>&nbsp;&nbsp;<br><br>";

	
	echo "<article>TOUCH TO SEND CONTACT INFO</article><a href='forum.php?add=".$uid."'>";
	echo "<img width='300px' border='2px' src='profileimg/".$image."'><br><br>";
	echo "<article><span style='font-size:16px'>".$qmr."</span></article>";
	echo "<br><img src='img/na.png' width='18px'><br>";
	echo "<br><article>TOUCH IMAGE TO SEND CONTACT INFO</article></a><br>";
	
	echo "<footer><a href='quotemy_profile.php?u=".$who."' id='mssg'>QUOTE MY RELATIONSHIP +</a></footer>";
	
	
	}
	
		$counter = 0;
			
	
	$mrcall = "SELECT * FROM messages WHERE myrelationship='$who' ORDER BY timestamp DESC";
	$mrload = mysqli_query($mysqli,$mrcall);
		while ($mr = mysqli_fetch_row($mrload)) {
			if ($counter == 10){break;} else {
			$quote = $mr['2'];
				$date = $mr['3'];
					echo "<div class='qmr'><article><span style='font-size:20px'>".$quote."</span></article></div>";
					$counter++;}
								}
							mysqli_free_result($mr);
	mysqli_close($mysqli);
	}
									
	
	?>


</div></body>
</html>