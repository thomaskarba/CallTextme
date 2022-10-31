<?php 
require 'db.php';
session_start();

// START 2 ENTER
if (isset($_GET['enter'])){
	$_SESSION['id']="0";
	$_SESSION['mf'] = "F";
	$_SESSION['ori']="str";
	$_SESSION['myr'] = "AS";
	$_SESSION['country'] = "CTM";
// LOGIN COUNT
$id = $_SESSION['id'];
$today = date("Y-m-d");
$mobile = 1;
$homeori = "0";
$homemf = "0";
$logincount = "INSERT INTO login (uid,logindate,sex,ori,mobile) VALUES ('$id','$today','$homemf','$homeori','$mobile')";
		mysqli_query($mysqli, $logincount);	
}



	if (isset($_POST['search'])){
		$city = $_POST['city'];
		$_SESSION['city'] = $city;}

$id = $_SESSION['id'];
	$sessionmf = $_SESSION['mf'];
			$sessionori = $_SESSION['ori'];
				$sessionloc = $_SESSION['city'];

if(isset($_GET['c'])){
		$fetchcity = "SELECT * FROM users WHERE id='$id'";
		$cmove = mysqli_query($mysqli, $fetchcity);
		$mycity = mysqli_fetch_row($cmove);
		$_SESSION['city'] = $mycity['4'];
		$sessionloc = $_SESSION['city'];
}				
				
				
				
// REGION

	if (isset($_POST['region'])){
		if($_POST['continent'] == 'NO'){
			$_SESSION['region'] = Null;
		} else {
		$region = $_POST['continent'];
		$_SESSION['region'] = $region;}}
	
	elseif(isset($_SESSION['region'])){
	$region = $_SESSION['region'];		
		} else {
		$_SESSION['region'] = $_SESSION['myr'];
		}

if(isset($_GET['f'])){
	if($_GET['f'] == 1){
	$_SESSION['f'] = 1;	
	$_SESSION['m'] = Null;}
	if($_GET['f'] == 2){
$_SESSION['f'] = Null;
}}
elseif(isset($_GET['m'])){
	if($_GET['m'] == 1){
	$_SESSION['m'] = 1;	
	$_SESSION['f'] = Null;}
	if($_GET['m'] == 2){
$_SESSION['m'] = Null;
		}
}

		
?>
<!DOCTYPE html>
<html>
<head>
<title>CallText.me</title>
<link rel="icon" href="img/ro.png">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
@import url('https://fonts.googleapis.com/css?family=Roboto+Mono:500');
body{font-family:'Roboto Mono',monospace;color:white;background-color: black;background-position: center;}
	header{width:300px;text-align:center;
	font-family:'Roboto Mono',monospace;color:white;
	margin:auto;}
div{text-align:center;font-size:26px;margin:auto;}
#container{text-align:center;}
#center{text-align:center;}
#cell{width:50%;font-size:65%;text-transform:uppercase;}
hr{border:0;height:0;size:1px;color:#799971}
nav{text-align:center;font-family:'Roboto Mono',monospace;font-size:20px;}
	a{text-decoration:none;color:white;}
	
footer{width:300px;text-align:center;
	font-family:'Roboto Mono',monospace;color:white;
	margin:auto;}

	
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
	form{border:none;}
	table,td{text-align:center;}
	p{text-transform:uppercase;color:white;}
	
#link{font-family:'Roboto Mono',monospace;font-size:25px;padding:20px;text-decoration:none;display:block;}
#link:link,a:visited{background-color:#191919;color:#515151;border:1px solid #282828;}
table{padding:0;margin:0;}
table#forum{padding:0;margin:0;background-color:black;}
td{padding:0;margin:0;}

#btc{border:3px solid white;}

</style>
</head>
<body><div id="container">
<br><br><br><br><br>
<table><tr><td>

<form id='region' action='mtravel_search.php' method='POST'>
<select name='continent'>
<?php
if($_SESSION['region'] == 'AF' ){echo "<option value='AF'>Africa</option><option value='AS'>Asia</option><option value='EU'>Europe</option><option value='ME'>Middle East</option><option value='NA'>North America</option><option value='OC'>Oceania</option><option value='SA'>South America</option></select>";}
if($_SESSION['region'] == 'AS' ){echo "<option value='AS'>Asia</option><option value='AF'>Africa</option><option value='EU'>Europe</option><option value='ME'>Middle East</option><option value='NA'>North America</option><option value='OC'>Oceania</option><option value='SA'>South America</option></select>";}
if($_SESSION['region'] == 'EU' ){echo "<option value='EU'>Europe</option><option value='AF'>Africa</option><option value='AS'>Asia</option><option value='ME'>Middle East</option><option value='NA'>North America</option><option value='OC'>Oceania</option><option value='SA'>South America</option></select>";}
if($_SESSION['region'] == 'ME' ){echo "<option value='ME'>Middle East</option><option value='AF'>Africa</option><option value='AS'>Asia</option><option value='EU'>Europe</option><option value='NA'>North America</option><option value='OC'>Oceania</option><option value='SA'>South America</option></select>";}
if($_SESSION['region'] == 'NA' ){echo "<option value='NA'>North America</option><option value='AF'>Africa</option><option value='AS'>Asia</option><option value='EU'>Europe</option><option value='ME'>Middle East</option><option value='OC'>Oceania</option><option value='SA'>South America</option></select>";}
if($_SESSION['region'] == 'OC' ){echo "<option value='OC'>Oceania</option><option value='AF'>Africa</option><option value='AS'>Asia</option><option value='EU'>Europe</option><option value='ME'>Middle East</option><option value='NA'>North America</option><option value='SA'>South America</option></select>";}
if($_SESSION['region'] == 'SA' ){echo "<option value='SA'>South America</option><option value='AF'>Africa</option><option value='AS'>Asia</option><option value='EU'>Europe</option><option value='ME'>Middle East</option><option value='NA'>North America</option><option value='OC'>Oceania</option></select>";}
//if($_SESSION['region'] == Null ){echo "<option value='NO'>GLOBAL</option><option value='AF'>Africa</option><option value='AS'>Asia</option><option value='EU'>Europe</option><option value='ME'>Middle East</option><option value='NA'>North America</option><option value='OC'>Oceania</option><option value='SA'>South America</option></select>";}
?>
<input type='submit' name='region' value='REGION'></form>
</td></tr>
<tr><td>

<div>
<?php 
// SECURITY
if($_SESSION['id'] == Null){
	mysqli_close($mysqli);
			setcookie('login',Null,time()+1);
session_unset();
session_destroy(); 
}




$myr = $_SESSION['myr'];
if($_SESSION['paid']==1){
$regionvar = $_SESSION['region'];
if($regionvar == NULL){
$l = "SELECT DISTINCT country FROM users ORDER BY country ASC";		
}else{
$l = "SELECT DISTINCT country FROM users WHERE region='$regionvar' ORDER BY country ASC";	
}	
}else{
if($_SESSION['id']=='0'){
$myr = $_SESSION['region'];	
$l = "SELECT DISTINCT country FROM users WHERE region='$myr' ORDER BY country ASC";	
}else{	
$l = "SELECT DISTINCT country FROM users WHERE region='$myr' ORDER BY country ASC";	
}}

$lsql = mysqli_query($mysqli, $l);
	echo "<form action='mcforum.php' method='POST'><select name='country'>";
					echo "<option value=''>COUNTRY</option>";
				while ($loclist = mysqli_fetch_row($lsql)){
					$country = $loclist['0'];
					echo "<option value='$country'>".strtoupper($country)."</option>";
				}
echo "</select><input type='submit' name='searchcountry' value='SEARCH'></form>";


/*

if(isset($_GET['country'])){

$start = $_GET['country'];

$myr = $_SESSION['myr'];
if($_SESSION['paid']==1){
$regionvar = $_SESSION['region'];
if($regionvar == NULL){
$l = "SELECT * from travelsearch WHERE sp <= '$start' ORDER BY sp DESC";		
}else{
$l = "SELECT * from travelsearch WHERE sp <= '$start' AND region='$regionvar' ORDER BY sp DESC";	
}	
}else{
$l = "SELECT * from travelsearch WHERE sp <= '$start' AND region='$myr' ORDER BY sp DESC";	
}
if($_SESSION['id']=="0"){
$l = "SELECT * from travelsearch WHERE sp <= '$start' ORDER BY sp DESC";			
}

			if ($crowd = mysqli_query($mysqli, $l)){
				
	$ncountries = $crowd->num_rows;
if($ncountries<16){$remaining=16-$ncountries;}				
$count = 0;
$two = 0;

		echo "<table id='forum' width='100%'><tr>";

		while($contents = mysqli_fetch_row($crowd)){
			if ( $two == 1 ) { echo "</tr><tr>"; $two = 0; }
			
			elseif($ncountries==$count){
		for($x = 1; $x <= $remaining; $x++){
			if ( $two == 1 ) { echo "</tr><tr>"; $two = 0; }
			if($count == 16){
						echo "</table>";
						echo "<br><a id='link' href='mtravel_search.php?country=".$contents['2']."'><p>NEXT</p></a><br><br>";
			break;}
			echo "<td>";						
			echo "<div id='cell'><p> </p></div></td>";
			$count++;
			$two++;
			
			}}elseif ($contents == Null){ echo "</tr></table>"; 
			
			}else{
						
echo "<td><a href='mcforum.php?ts=".$contents['0']."'>";						
echo "<div id='cell'><img width='100%' src='countryimg/flag/flag_".strtolower($contents['0']).".png'><br><p>".$contents['0']."</p></div></a></td>";
		$count++;
		$two++;
		if($count == 16){
		
						echo "</table>";
						echo "<br><a id='link' href='mtravel_search.php?country=".$contents['2']."'><p>NEXT</p></a><br><br>";
						break;
}}}}








}else{



//SQL MAIN
$myr = $_SESSION['myr'];
if($_SESSION['paid']==1){
$regionvar = $_SESSION['region'];
if($regionvar == NULL){
$l = "SELECT * from travelsearch ORDER BY sp DESC";		
}else{
$l = "SELECT * from travelsearch WHERE region='$regionvar' ORDER BY sp DESC";	
}	
}else{
$l = "SELECT * from travelsearch WHERE region='$myr' ORDER BY sp DESC";	
}
if($_SESSION['id']==0){
$l = "SELECT * from travelsearch ORDER BY sp DESC";			
}

			if ($crowd = mysqli_query($mysqli, $l)){
				
	$ncountries = $crowd->num_rows;
if($ncountries<16){$remaining=16-$ncountries;}				
$count = 0;
$two = 0;

		echo "<table id='forum' width='100%'><tr>";

		while($contents = mysqli_fetch_row($crowd)){
			if ( $two == 1 ) { echo "</tr><tr>"; $two = 0; }
			
			elseif($ncountries==$count){
		for($x = 1; $x <= $remaining; $x++){
			if ( $two == 1 ) { echo "</tr><tr>"; $two = 0; }
			if($count == 16){
						echo "</table>";
						echo "<br><a id='link' href='mtravel_search.php?country=".$contents['2']."'><p>NEXT</p></a><br><br>";
			break;}
			echo "<td>";						
			echo "<div id='cell'><p> </p></div></td>";
			$count++;
			$two++;
			
			}}elseif ($contents == Null){ echo "</tr></table>"; 
			
			}else{
						
echo "<td><a href='mcforum.php?ts=".$contents['0']."'>";						
echo "<div id='cell'><img width='100%' src='countryimg/flag/flag_".strtolower($contents['0']).".png'><br><p>".$contents['0']."</p></div></a></td>";
		$count++;
		$two++;
		if($count == 16){
		
						echo "</table>";
						echo "<br><a id='link' href='mtravel_search.php?country=".$contents['2']."'><p>NEXT</p></a><br><br>";
						break;
}}}}}


*/

?>
</div>

</td></tr>

<?php //ENTER 

if($_SESSION['id']!="0"){

echo "<tr><td>";

echo "<a id='link' href='mprofile.php#mssg'><span style='text-transform:uppercase'>MY PAGE</span></a><br>";

echo "</td></tr>";
}
?>
<tr><td>

<?php
/*
if($_SESSION['id']!=1){
$melookup = "SELECT * FROM users WHERE id='$id' ORDER BY id DESC LIMIT 1";
	$meload = mysqli_query($mysqli,$melookup);
	$hereiam = mysqli_fetch_array($meload);
		$uid = $hereiam['0'];
$myprof = "SELECT * FROM users WHERE id='$id'";
$prof = mysqli_query($mysqli,$myprof);
$myinfo = mysqli_fetch_row($prof);
$picture = $myinfo['5'];
$myqmr = $myinfo['6'];

echo "<table><tr><td><a href='mview_profile.php?uid=".$uid."'><img src='profileimg/".$picture."' width='60%'></a></td></tr>";
}
echo "</table>";*/
mysqli_close($mysqli);
?>

</td></tr>


<tr><td>
<a id="link" href="logout.php?m"><span style='text-transform:uppercase'>LOGOUT</span></a>
</td></tr>

<tr><td>
<?php
//DONATE
echo "<br><br><span style='color:#ff69b4'><strong>DONATE</strong></span><br><img width='250px' src='img/sol.png'><br><span style='color:#ff69b4;font-size: 10pt'>Address:<br>Gq9Gv34h6Y8noDiKpPk1HcT5gCJJD8Z6xNj1aSChtpv2</span>";?>
</td></tr>

</table>

</div>
</body>
</html>