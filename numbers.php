<?php
require 'db.php';
session_start();
 
    $username = $_SESSION['username'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
	<title><?= $username ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
body{background-image:url("img/profile.jpg");}
div{text-align:center;}

@import url('https://fonts.googleapis.com/css?family=Roboto+Mono:500');
	header{background-color:yellow;width:300px;text-align:center;
	font-family:'Roboto Mono',monospace;color:black;
	border:3px solid #000000;margin:auto;}


li{font-size:18px;}
ul{background-color:red;margin:0;padding:0;overflow:hidden;list-style-type:none;}
#link{font-family:'Roboto Mono',monospace;font-size:25px;padding:20px;text-decoration:none;display:block;}
#link:link,a:visited{background-color:yellow;color:black;}
#link:hover{background-color:#eb1e66;}
#link:active{background-color:#000000;}
a{text-decoration:none;color:black;}
@import url('https://fonts.googleapis.com/css?family=Roboto+Mono:500');
footer{font-family:'Roboto Mono',monospace;font-size:18px;}
div{font-family:'Roboto Mono',monospace;}<!--QMR-->
</style>
<body><div>

<?php 
	$username = $_SESSION['username'];

	$numbers = "SELECT * FROM users WHERE username='$uid'";
	$infoload = mysqli_query($mysqli,$call);
	$row = mysqli_fetch_array($infoload);
		$profile = $row['1'];
		$image = $row['6'];
		$qmr = $row['7'];
		$phone = $row['3'];
		$availability = $row['8'];
	echo "<header><span style='font-size:275%'><a href='choice.php?n=".$uid."'>".$profile."</span><br></header><br>";
	echo "<img width='300px' border='2px' src='profileimg/".$image."'><br><br>";
	echo "<article><span style='font-size:14px'>".$qmr."</span></article>";
	if ($availability == "choice"){echo "<br><section>Number not available</section>";}else{
	echo "<h1>".$phone."</h1>";}
	echo "<br><article><span style='font-size:35px'>+</span><br><span style='font-size:50px'>".$username."</span><br><span style='font-size:100px'>?</span></article></a>";}
	?>


<footer><strong>
<a href="profile.php" id="link">BACK</a>
</strong></footer>
</div></body>
</html>