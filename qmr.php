<?php 
require 'db.php';
session_start();

	if (isset($_POST['search'])){
		$city = $_POST['city'];
		
		if($city == 'all') {
			$_SESSION['city'] = $city;
		} else {		
	$_SESSION['city'] = $city;
	}}

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
		}
	
	
		elseif($test != Null) {	
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
<script type="text/javascript">
if (screen.width<700){
	window.location="mqmr.php";
}
</script>
<link rel="icon" href="img/ro.png">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
@import url('https://fonts.googleapis.com/css?family=Roboto+Mono:500');
@import url('https://fonts.googleapis.com/css?family=Playfair+Display:900');

body{font-family:'Roboto Mono',monospace;color:white;background-image:url("img/forum10.jpg");}

header{background-color:#6b70a8;margin:0;}

a{text-decoration:none;color:black;}

article{background-color:white;width:300px;margin:auto;font-size:25px;}

pre{font-family: 'Playfair Display', serif; color:black;text-align:left;white-space: pre-wrap;}

table{width:100%;margin:0;padding:0;}

td{text-align:center;}

#form{margin:auto;}

input[type=text],select,button
	{padding: 3px 3px;
	margin: 5px;
	border-radius:10px;
	font-family:'Roboto Mono',monospace;
	font-size:20px;
	background-color:#c5cbd6;
	color:black;}

input[type=submit]{
	background-color:#c5cbd6;
	font-family:'Roboto Mono',monospace;
	color:black;
	border:0;
	margin-bottom:20px;
	margin-top:5px;
	font-size:15px;
	padding:9px 18px;}

input[type=submit]:hover{
	background-color:#c5cbd6;
}


</style>
</head>
<body>

<header>

<table><tr><td>


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

// BITCOIN

if($_SESSION['region'] != $_SESSION['myr'] && $_SESSION['paid'] != 1){
	
if($_SESSION['region'] == 'AF' ){$iwantregion = 'Africa';}
if($_SESSION['region'] == 'AS' ){$iwantregion = 'Asia';}
if($_SESSION['region'] == 'EU' ){$iwantregion = 'Europe';}
if($_SESSION['region'] == 'ME' ){$iwantregion = 'Middle East';}
if($_SESSION['region'] == 'NA' ){$iwantregion = 'North America';}
if($_SESSION['region'] == 'OC' ){$iwantregion = 'Oceania';}
if($_SESSION['region'] == 'SA' ){$iwantregion = 'South America';}
if($_SESSION['region'] == Null ){$iwantregion = 'GLOBAL';}

echo "<div id='btc'><br><form action='forum_everyone.php' method='POST'><select name='continent'>";
if($_SESSION['region'] == 'AF' ){echo "<option value='AF'>Africa</option><option value='AS'>Asia</option><option value='EU'>Europe</option><option value='ME'>Middle East</option><option value='NA'>North America</option><option value='OC'>Oceania</option><option value='SA'>South America</option><option value='NO'>GLOBAL</option></select>";}
if($_SESSION['region'] == 'AS' ){echo "<option value='AS'>Asia</option><option value='AF'>Africa</option><option value='EU'>Europe</option><option value='ME'>Middle East</option><option value='NA'>North America</option><option value='OC'>Oceania</option><option value='SA'>South America</option><option value='NO'>GLOBAL</option></select>";}
if($_SESSION['region'] == 'EU' ){echo "<option value='EU'>Europe</option><option value='AF'>Africa</option><option value='AS'>Asia</option><option value='ME'>Middle East</option><option value='NA'>North America</option><option value='OC'>Oceania</option><option value='SA'>South America</option><option value='NO'>GLOBAL</option></select>";}
if($_SESSION['region'] == 'ME' ){echo "<option value='ME'>Middle East</option><option value='AF'>Africa</option><option value='AS'>Asia</option><option value='EU'>Europe</option><option value='NA'>North America</option><option value='OC'>Oceania</option><option value='SA'>South America</option><option value='NO'>GLOBAL</option></select>";}
if($_SESSION['region'] == 'NA' ){echo "<option value='NA'>North America</option><option value='AF'>Africa</option><option value='AS'>Asia</option><option value='EU'>Europe</option><option value='ME'>Middle East</option><option value='OC'>Oceania</option><option value='SA'>South America</option><option value='NO'>GLOBAL</option></select>";}
if($_SESSION['region'] == 'OC' ){echo "<option value='OC'>Oceania</option><option value='AF'>Africa</option><option value='AS'>Asia</option><option value='EU'>Europe</option><option value='ME'>Middle East</option><option value='NA'>North America</option><option value='SA'>South America</option><option value='NO'>GLOBAL</option></select>";}
if($_SESSION['region'] == 'SA' ){echo "<option value='SA'>South America</option><option value='AF'>Africa</option><option value='AS'>Asia</option><option value='EU'>Europe</option><option value='ME'>Middle East</option><option value='NA'>North America</option><option value='OC'>Oceania</option><option value='NO'>GLOBAL</option></select>";}
if($_SESSION['region'] == Null ){echo "<option value='NO'>GLOBAL</option><option value='AF'>Africa</option><option value='AS'>Asia</option><option value='EU'>Europe</option><option value='ME'>Middle East</option><option value='NA'>North America</option><option value='OC'>Oceania</option><option value='SA'>South America</option></select>";}
echo "<input type='submit' name='region' value='REGION'></form>";
	
	echo "<h1>Pay $5 in Bitcoin to gain access to ".$iwantregion.".</h1>";
	echo "<img src='img/coinbase.jpg' width='200px'>";
	echo "<h2>3CkZyAYcMoj4HYmFzorTV2MCsvgt8cvJdY</h2><br><h3>Include your Login Email when sending payment</h3></div>";
	$_SESSION['region'] = $_SESSION['myr'];
	
}


if($region == Null ){

$l = "SELECT DISTINCT city FROM users ORDER BY city ASC";
$lsql = mysqli_query($mysqli, $l);
	echo "<form id='changeloc' action='qmr.php' method='POST'><select name='city'><option value='".$_SESSION['city']."'>".$_SESSION['city']."</option>";
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
	echo "<form id='changeloc' action='qmr.php' method='POST'><select name='city'>";
	
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
//if($sessionloc != 'AF' || $sessionloc != 'AS' || $sessionloc != 'EU' || $sessionloc != 'ME' || $sessionloc != 'NA' || $sessionloc != 'OC' || $sessionloc != 'SA') {
else {
$region = $_SESSION['region'];
$rc = "SELECT DISTINCT location FROM updater WHERE region='$region' ORDER BY location ASC";
$rcsql = mysqli_query($mysqli, $rc);
	echo "<form id='changeloc' action='qmr.php' method='POST'><select name='city'><option value='".$_SESSION['city']."'>".$_SESSION['city']."</option>";
		
		if($region == 'AF'){ echo "<option value='AF'>AFRICA</option>"; }
		if($region == 'AS'){ echo "<option value='AS'>ASIA</option>"; }
		if($region == 'EU'){ echo "<option value='EU'>EUROPE</option>"; }
		if($region == 'ME'){ echo "<option value='ME'>MIDDLE EAST</option>"; }
		if($region == 'NA'){ echo "<option value='NA'>NORTH AMERICA</option>"; }
		if($region == 'OC'){ echo "<option value='OC'>OCEANIA</option>"; }
		if($region == 'SA'){ echo "<option value='SA'>SOUTH AMERICA</option>"; }
		
	while ($localist = mysqli_fetch_row($rcsql)){
					$rcity = $localist['0'];
					echo "<option value='$rcity'>".$rcity."</option>";
				}
echo "</select><input type='submit' name='search' value='\\//'></form>";*/
?>



<?php
/*
$l = "SELECT DISTINCT city FROM users ORDER BY city ASC";
$lsql = mysqli_query($mysqli, $l);
	echo "<form id='changeloc' action='qmr.php' method='POST'><select name='city'><option value='".$_SESSION['city']."'>".$_SESSION['city']."</option>";
				echo "<option value='all'>Everyone</option>";
				while ($loclist = mysqli_fetch_row($lsql)){
					$location = $loclist['0'];
					echo "<option value='$location'>".$location."</option>";
				}
echo "<input type='submit' name='search' value='\\//'></form>";
*/
?>

</td><td>

<?php
if($sessionloc != 'all'){
if(Null !== $_SESSION['id'] || Null !== $_SESSION['myr']){
echo "<form action='qmr.php' method='POST'><textarea name='qmr' rows='2' cols='30'></textarea><input type='submit' name='write' value='Write'></form>";
}}

?>

</td><td>

<a href="profile.php"><?php echo "<p><img src='img/wback.png' width='40px'></p>"; ?></a>

</td><td>

<?php
if($sessionloc == 'all'){
echo "<a href='forum.php?c=1'><img src='img/centralw.png'  width='40px'></a>";
} else {
echo "<a href='forum.php'><span style='color:white'>".$sessionloc."</span></a>";
}
?>

</td><td>

<img src="img/row.png" width="50px">

</td></tr>

</table>

</header>




<?php 




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
$sql = "SELECT * FROM qmr WHERE loc='$sessionloc' ORDER BY del DESC LIMIT 12"; }


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
		
	echo "<article><a href='view_profile.php?u=".$user."&n=".$delete."'><pre>".$quote."</pre></a></article>";
	$count++;
	}
	mysqli_close($mysqli);
	echo "</tr></table>";
	
 


 
 
 /*
 
	
	$loading = mysqli_query($mysqli,$sql);
	
	$count = 0;
	$column = 4;
	
	echo "<table><tr><td>";
	
	while($row = mysqli_fetch_row($loading)){
		
		$user = $row['0'];
		$quote = $row['1'];
		$delete = $row['3'];
		
	if($count == $column ) {
		echo "</td><td>";
		$count = 0;
	}
		
	echo "<article><a href='view_profile.php?u=".$user."&n=".$delete."'><pre>".$quote."</pre></a></article>";
	$count++;
	}
	mysqli_close($mysqli);
	echo "</tr></table>";

/*$others = "SELECT * FROM updater WHERE location = '$sessionloc' AND mf = '$sessionmf' AND ori = '$sessionori' ORDER BY repeater DESC";*/
	
?>



</table>

</body>
</html>