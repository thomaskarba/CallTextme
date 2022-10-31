<?php
require 'db.php';
session_start();
    $id = $_SESSION['id'];
		$uid = $_GET['uid'];
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
body{background-image:url("img/forum10.jpg");}
div{text-align:center;}
article{text-transform:uppercase;}
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
article{margin:auto;font-family:'Roboto Mono',monospace;width:300px;color:white;}<!--QMR-->
div{margin:auto;text-align:center;}
section{font-family:'Roboto Mono',monospace;color:red;}
section{width:300px;text-align:center;font-family:'Roboto Mono',monospace;color:black;}

.qmr{text-align:center;background-color:yellow;width:300px; border:6px solid black;margin:auto;}

</style>
<body><div>

<div =id="topheader"><strong>
<a href="mprofile.php" id="link"><img src="img/back.png" width="30px"></a>
</div><br>

<?php 

	if(isset($_GET['mssg'])){
		$mssgid = $_GET['mssg'];
		$delete = "DELETE FROM messages WHERE messageid='$mssgid'";
		mysqli_query($mysqli,$delete);
	}


	if(isset($_GET['uid'])){
	$uid = $_GET['uid'];
	
	if(isset($_GET['q'])){
	
	$result = $mysqli->query("SELECT * FROM users WHERE id='$uid'");

	$user = $result->fetch_assoc();

	
	$_SESSION['id'] = $user['id'];
	$id = $_SESSION['id'];
	

	
		// SESSION LOAD
				$sessionload = "SELECT * FROM users WHERE id='$id'";
				$loginquery = mysqli_query($mysqli, $sessionload);
				if ($logloc = mysqli_fetch_row($loginquery)){

				
						$homelocation = $logloc['4'];
						$_SESSION['city'] = $homelocation;
					
						$homeimage = $logloc['5'];
						$_SESSION['img'] = $homeimage;
					
						$homeq = $logloc['6'];
						$_SESSION['qmr'] = $homeq;
					
						$paid = $logloc['8'];
						$_SESSION['paid'] = $paid;
						
						$myregion = $logloc['9'];
						$_SESSION['myr'] = $myregion;

						$homeorientation = $logloc['11'];
						$_SESSION['ori'] = $homeorientation;
						
						$homesex = $logloc['12'];
						$_SESSION['mf'] = $homesex;
					
}

setcookie('login',$id,time()+864000);

	
	}	

	$call = "SELECT * FROM users WHERE id='$uid'";
	$infoload = mysqli_query($mysqli,$call);
	$row = mysqli_fetch_array($infoload);
		$profile = $row['1'];
		$image = $row['5'];
		$qmr = $row['6'];	
		
	$mrcall = "SELECT * FROM messages WHERE myrelationship='$uid' ORDER BY timestamp DESC";
	$mrload = mysqli_query($mysqli,$mrcall);		

	if ($mrload->num_rows == 0){	
	echo "<article>THERE ARE NO QUOTES</article>";
	} else {		
		
	//echo "<article>CLICK TO DELETE</article>";
	}

	
		$uid = $_GET['uid'];

	

		
		while ($mr = mysqli_fetch_row($mrload)) {
			if ($counter == 10){break;} else {
			$quote = $mr['2'];
				$id = $mr['0'];
				$senderlink = $mr['3'];
					echo "<a href='minbox_profile.php?mssg=".$id."&uid=".$uid."'><article>DELETE</article></a><a href='contact_profile.php?uid=".$senderlink."&ib'><div class='qmr'><section><span style='font-size:20px'>".$quote."</span></section></div></a>";
					$counter++;}
								}
							mysqli_free_result($mr);
		mysqli_close($mysqli);
	
	}
	?>

</div></body>
</html>