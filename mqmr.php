<?php 
require 'db.php';
session_start();

	if (isset($_POST['search'])){
		$city = $_POST['city'];
		$_SESSION['city'] = $city;}

$id = $_SESSION['id'];
	$sessionmf = $_SESSION['mf'];
			$sessionori = $_SESSION['ori'];
				$sessionloc = $_SESSION['city'];
					$region = $_SESSION['region'];

if(isset($_POST['write'])){
	$test = $_POST['qmr'];
		$dollar = '/\$/';
		if (preg_match($dollar,$test)) {
		exit('PROSTITUTION IS A NOT ALLOWED');} 
		
		if(preg_match('/[0-9]/', $test)) {
		exit('USE CONTACT FOR YOUR INFORMATION');
		} elseif ($test != Null) {
	$qmr = mysqli_real_escape_string($mysqli,$_POST['qmr']);
$sql = "INSERT INTO qmr (id, qmr, loc, region) VALUES ('$id', '$qmr', '$sessionloc', '$region')";
mysqli_query($mysqli,$sql);}}

if(isset($_GET['delete'])){
		$number = $_GET['delete'];
	$delete = "DELETE FROM qmr WHERE del='$number'";
		mysqli_query($mysqli,$delete);
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>QMR</title>
<link rel="icon" href="img/ro.png">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
@import url('https://fonts.googleapis.com/css?family=Roboto+Mono:500');
@import url('https://fonts.googleapis.com/css?family=Playfair+Display:900');

body{font-family:'Roboto Mono',monospace;color:white;background-image:url("img/forum10.jpg");}

header{background-color:#d4d4d4;margin:0;}

a{text-decoration:none;color:black;}

article{background-color:white;width:300px;margin:auto;font-size:25px;}

pre{font-family: 'Playfair Display', serif; color:black;text-align:left;white-space: pre-wrap;}

table{width:100%;margin:0;padding:0;}

td{text-align:center;}

#form{margin:auto;}

input[type=submit]{
	background-color:white;
	color:black;
	border:0;
	font-size:15px;
	padding:10px 40px;}

</style>
</head>
<body>

<header>

<table><tr><td>


<a href="mprofile.php"><img src='img/wback.png' width='40px'></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<?php
//if($sessionloc == 'all'){
//echo "<a href='mforum.php?c=1'><img src='img/central.png' width='40px'></a>";
//} else {
echo "<a href='mforum_everyone.php?c=1'><span style='color:white'><img src='img/centralw.png' width='40px'></span></a>";
//}
?>

</td></tr><tr><td>

<?php
$region = $_SESSION['region'];
if($region == Null ){

$l = "SELECT DISTINCT city FROM users ORDER BY city ASC";
$lsql = mysqli_query($mysqli, $l);
	echo "<form id='changeloc' action='mqmr.php' method='POST'><select name='city'><option value='".$_SESSION['city']."'>".$_SESSION['city']."</option>";
				echo "<option value='all'>Everyone</option>";
				while ($loclist = mysqli_fetch_row($lsql)){
					$location = $loclist['0'];
					echo "<option value='$location'>".$location."</option>";
				}
echo "</select><input type='submit' name='search' value='\\//'></form>";
} else {
$region = $_SESSION['region'];
if($region == 'AF' || $region == 'AS' || $region == 'EU' || $region == 'ME' || $region == 'NA' || $region == 'OC' || $region == 'SA') {
$rc = "SELECT DISTINCT location FROM updater WHERE region='$region' ORDER BY location ASC";
$rcsql = mysqli_query($mysqli, $rc);
	echo "<form id='changeloc' action='mqmr.php' method='POST'><select name='city'>";
	
	if($sessionloc == 'all') {
		
		if($region == 'AF'){ echo "<option value='all'>AFRICA</option>"; }
		if($region == 'AS'){ echo "<option value='all'>ASIA</option>"; }
		if($region == 'EU'){ echo "<option value='all'>EUROPE</option>"; }
		if($region == 'ME'){ echo "<option value='all'>MIDDLE EAST</option>"; }
		if($region == 'NA'){ echo "<option value='all'>NORTH AMERICA</option>"; }
		if($region == 'OC'){ echo "<option value='all'>OCEANIA</option>"; }
		if($region == 'SA'){ echo "<option value='all'>SOUTH AMERICA</option>"; }
	} else {
		echo "<option value='".$sessionloc."'>".$sessionloc."</option>";
		if($region == 'AF'){ echo "<option value='all'>AFRICA</option>"; }
		if($region == 'AS'){ echo "<option value='all'>ASIA</option>"; }
		if($region == 'EU'){ echo "<option value='all'>EUROPE</option>"; }
		if($region == 'ME'){ echo "<option value='all'>MIDDLE EAST</option>"; }
		if($region == 'NA'){ echo "<option value='all'>NORTH AMERICA</option>"; }
		if($region == 'OC'){ echo "<option value='all'>OCEANIA</option>"; }
		if($region == 'SA'){ echo "<option value='all'>SOUTH AMERICA</option>"; }		
	}
		
	while ($localist = mysqli_fetch_row($rcsql)){
					$rcity = $localist['0'];
					echo "<option value='$rcity'>".$rcity."</option>";
				}
echo "</select><input type='submit' name='search' value='\\//'></form>";
}}






/*
$l = "SELECT DISTINCT city FROM users ORDER BY city ASC";
$lsql = mysqli_query($mysqli, $l);
	echo "<form id='changeloc' action='mqmr.php' method='POST'><select name='city'><option value='".$_SESSION['city']."'>".$_SESSION['city']."</option>";
				echo "<option value='all'>All</option>";
				while ($loclist = mysqli_fetch_row($lsql)){
					$location = $loclist['0'];
					echo "<option value='$location'>".$location."</option>";
				}
echo "<input type='submit' name='search' value='\\//'></form>";*/
?>
</td></tr><tr><td>

<?php

if($sessionloc != 'all'){

echo "<form action='mqmr.php' method='POST'><textarea name='qmr' rows='3' cols='35'></textarea><br><input type='submit' name='write' value='Write'></form>";
}
?>

</td></tr>
</table>

</header>




<?php 
if($_SESSION['id'] == Null){
	mysqli_close($mysqli);
			setcookie('login',Null,time()+1);
session_unset();
session_destroy(); 
}

if($_SESSION['myr'] == Null){
	mysqli_close($mysqli);
}





if($region == Null && $sessionloc == 'all'){
	
$sql = "SELECT * FROM qmr ORDER BY id DESC LIMIT 120"; }
	
		elseif($region == 'AF' && $sessionloc == 'all'){ $sql = "SELECT * FROM qmr WHERE region = '$region' ORDER BY del DESC LIMIT 120"; }
		elseif($region == 'AS' && $sessionloc == 'all'){ $sql = "SELECT * FROM qmr WHERE region = '$region' ORDER BY del DESC LIMIT 120"; }
		elseif($region == 'EU' && $sessionloc == 'all'){ $sql = "SELECT * FROM qmr WHERE region = '$region' ORDER BY del DESC LIMIT 120"; }
		elseif($region == 'ME' && $sessionloc == 'all'){ $sql = "SELECT * FROM qmr WHERE region = '$region' ORDER BY del DESC LIMIT 120"; }
		elseif($region == 'NA' && $sessionloc == 'all'){ $sql = "SELECT * FROM qmr WHERE region = '$region' ORDER BY del DESC LIMIT 120"; }
		elseif($region == 'OC' && $sessionloc == 'all'){ $sql = "SELECT * FROM qmr WHERE region = '$region' ORDER BY del DESC LIMIT 120"; }
		elseif($region == 'SA' && $sessionloc == 'all'){ $sql = "SELECT * FROM qmr WHERE region = '$region' ORDER BY del DESC LIMIT 120"; }

else {
$sql = "SELECT * FROM qmr WHERE loc='$sessionloc' ORDER BY del DESC LIMIT 50"; }



	
	$loading = mysqli_query($mysqli,$sql);
	
	$count = 0;
	$column = 40;
	
	echo "<table><tr><td>";
	
	while($row = mysqli_fetch_row($loading)){
		
		$user = $row['0'];
		$quote = $row['1'];
		$delete = $row['3'];
		
	if($count == $column ) {
		echo "</td><td>";
		$count = 0;
	}
		
	echo "<article><a href='mview_profile.php?u=".$user."&n=".$delete."'><pre>".$quote."</pre></a></article>";
	$count++;
	}
	mysqli_close($mysqli);
	echo "</tr></table>";
	
?>

</body>
</html>