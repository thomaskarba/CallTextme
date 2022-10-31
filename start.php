<?php
require 'db.php';
session_start();


if(isset($_POST['write'])){
	$contact = $_POST['contact'];
	$gender = $_POST['gender'];
	$test = $_POST['qmr'];
	$location = $_POST['location'];
	$_SESSION['location'] = $location;
		if($test != Null || $contact != Null || $location != Null) {

		$dollar = '/\$/';
		if (preg_match($dollar,$test)) {
		exit('PROSTITUTION IS A NOT ALLOWED');}
		
		if(preg_match('/[0-9]/', $test)) {
			exit('USE CONTACT FOR YOUR INFORMATION');
		}
	if ($gender != 'mf'){
		$qmr = mysqli_real_escape_string($mysqli,$_POST['qmr']);
		$sql = "INSERT INTO start (location,gender,contact,txt) VALUES ('$location','$gender','$contact','$qmr')";
		mysqli_query($mysqli,$sql);
	}}}


if (isset($_GET['delete'])){

$id = $_GET['delete'];

	$retimage = "SELECT * FROM start WHERE id='$id'";
	$im = mysqli_query($mysqli,$retimage);
	if ($set = mysqli_fetch_row($im)){
		$img = $set['6'];
		unlink("startimg/$img");
	}
	
	$delete = "DELETE FROM start WHERE id='$id'";
	mysqli_query($mysqli,$delete); 
	
	}

?>
<!DOCTYPE html>
<html>
<head>
<title>QMR</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Dating">
<meta name="keywords" content="single,lonely,gf,bf,horny,sex,relationship,dating,xxx,latinas,meet singles,social media">
<style type="text/css">

body{background-color:black;text-align:center;}

@import url('https://fonts.googleapis.com/css?family=Roboto+Mono:500');

#link{font-family:'Roboto Mono',monospace;font-size:25px;text-align:center;padding:7px;text-decoration:none;display:block;}
#link:link,a:visited{background-color:yellow;color:black;}
#link:hover{background-color:#eb1e66;}
#link:active{background-color:#000000;}

a {width:100%;}

.form{margin:auto;background:linear-gradient(#5e5151,#bab9c7,#c7ced6);width:200px;border-radius:12px;}

form{font-family:'Roboto', sans-serif;font-size:17px;text-decoration:none;}

@import url('https://fonts.googleapis.com/css?family=Dosis:500');
input[type=text],input[type=email],input[type=password],select,textarea{
	padding: 3px 3px;margin: 5px;border: 1px solid #dce4f2;border-radius:10px;
	font-family: 'Dosis', sans-serif;font-size:18px;background-color:#dae3e1;color:black;}
	
input[type=text]{
	width:80px;
}

input[type=submit]{
	background-color:#4a4e82;color:black;border:0;margin-bottom:5px;margin-top:5px;
	font-family: 'Dosis', sans-serif;font-size:15px;padding:15px 55px;}

input[type=submit]:hover{
	background-color:#75778f;
}

input[type=text]:focus,
input[type=email]:focus,
input[type=password]:focus{
	background-color:#f7f7f7;border: 1px solid #868e9c;}

h1{color:yellow;}
section{background-color:#e8eaed;}

#a{font-family:'Roboto Mono',monospace;font-size:200%;padding:20px;display:block;}
#a:link,#a:visited{background-color:black;color:yellow;border:1px solid yellow;}

#male {color:#dda1b9;}

#female {color:#d7efec;}

article{background-color:black;width:100%;font-size:22px;}

pre{font-family:'Roboto Mono',monospace;text-align:left;white-space: pre-wrap;}

#top{border:1px solid yellow;width:100%;}

#center{margin:auto;}

a{text-decoration:none;}

nav{background-color:#212121;}

p{font-size:20px;}
</style>

<body>


<?php /* RELATIONSHIPS
if(isset($_GET['l'])){
	echo "<a id='a' href='mforum_everyone.php'>".$_GET['l']."</a>";
} else {
	echo "<a id='a' href='mforum_everyone.php'>Relationships</a>";
}
*/
?>

<a href="start2.php">
<div id="top">
<strong>
<span style="color:yellow"><p>Click For Dating Site</p></span>
</div>
</a>

<table width="100%">
<tr><td></td><td><img src="img/ro.png" width="25px"></td>
<td><span style="color:#d7efec;">F</span></td>
<td><img src="img/ro.png" width="25px"></td>
<td><span style="color:#dda1b9;">M</span></td>
<td><img src="img/ro.png" width="25px"></td><td></td></tr>
</table>

<a href="https://youtu.be/ZaydwmR1ZPA"><span style="color:white">How to Use</span></a>

<nav>
<form action="start.php" method="POST">
<input type="text" name="location" placeholder="Where?">
<input type="text" name="contact" placeholder="Contact"><select name="gender"><option value="mf">F/M</option><option value="female">I'm F</option><option value="male">I'm M</option><br>
<textarea name="qmr" rows="1" cols="28"></textarea>
<input type="submit" name="write" value="     Q  M  R / Search    ">
</form>
</nav>

<?php 

if(isset($_SESSION['location'])){

$switch = True;	
	
	if($_SESSION['location'] == Null) {
		$quotes = "SELECT * FROM start ORDER BY id DESC LIMIT 50";
	$qloading = mysqli_query($mysqli,$quotes);
	while($row = mysqli_fetch_row($qloading)){
		$location = $row['0'];
		$gender = $row['1'];
		$quote = $row['3'];
		$id = $row['4'];
	$m = 'male';
	$f = 'female';
		if($gender == $m) {
			echo "<a href='me.php?qmr=".$id."'><article id='male'><pre><span style='text-decoration:underline'>".$location."</span>: ".$quote."</pre></article></a>";
		}
		if($gender == $f) {
			echo "<a href='me.php?qmr=".$id."'><article id='female'><pre><span style='text-decoration:underline'>".$location."</span>: ".$quote."</pre></article></a>";
		}}
		mysqli_close($mysqli);
		$switch = False;
		}
if($switch == True) {
	$slocation = $_SESSION['location'];
			echo "<a href='start.php'><span style='color:white'>in ".$slocation."</span></a>";
		$quotes = "SELECT * FROM start WHERE location='$slocation' ORDER BY id DESC LIMIT 50";
	$qloading = mysqli_query($mysqli,$quotes);
	while($row = mysqli_fetch_row($qloading)){
		$location = $row['0'];
		$gender = $row['1'];
		$quote = $row['3'];
		$id = $row['4'];
	$m = 'male';
	$f = 'female';
		if($gender == $m) {
			echo "<a href='me.php?qmr=".$id."'><article id='male'><pre><span style='text-decoration:underline'>".$location."</span>: ".$quote."</pre></article></a>";
		}
		if($gender == $f) {
			echo "<a href='me.php?qmr=".$id."'><article id='female'><pre><span style='text-decoration:underline'>".$location."</span>: ".$quote."</pre></article></a>";
		}}
	mysqli_close($mysqli); }
} else { // QMR RESET

	$quotes = "SELECT * FROM start ORDER BY id DESC LIMIT 50";
		$qloading = mysqli_query($mysqli,$quotes);
	while($row = mysqli_fetch_row($qloading)){
		$location = $row['0'];
		$gender = $row['1'];
		$quote = $row['3'];
		$id = $row['4'];
	$m = 'male';
	$f = 'female';
		if($gender == $m) {
			echo "<a href='me.php?qmr=".$id."'><article id='male'><pre><span style='text-decoration:underline'>".$location."</span>: ".$quote."</pre></article></a>";
		}
		if($gender == $f) {
			echo "<a href='me.php?qmr=".$id."'><article id='female'><pre><span style='text-decoration:underline'>".$location."</span>: ".$quote."</pre></article></a>";
		}}
		mysqli_close($mysqli);

/*$others = "SELECT * FROM updater WHERE location = '$sessionloc' AND mf = '$sessionmf' AND ori = '$sessionori' ORDER BY repeater DESC";*/
}	
?>



</strong>
</body>
</html>