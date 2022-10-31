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

if(isset($_GET['c'])){
		$fetchcity = "SELECT * FROM users WHERE id='$id'";
		$cmove = mysqli_query($mysqli, $fetchcity);
		$mycity = mysqli_fetch_row($cmove);
		$_SESSION['city'] = $mycity['4'];
		$sessionloc = $_SESSION['city'];
}				
				
if(isset($_GET['country'])){
$_SESSION['searchcountry'] = NULL;
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
		$_SESSION['region'] = Null;
		}

	if (isset($_POST['searchcountry'])){
		$country = $_POST['country'];
		$_SESSION['searchcountry'] = $country;}

if (isset($_GET['searchcountry'])){
		$country = $_GET['country'];
		$_SESSION['searchcountry'] = $country;}		

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

//M TRAVEL SEARCH .PHP
if(isset($_GET['ts'])){
	$_SESSION['searchcountry']=$_GET['ts'];
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
body{font-family:'Roboto Mono',monospace;color:white;background-color:#000000;}

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
table#forum{padding:0;margin:0;background-image:url("<?php if($_SESSION['f']==1){echo "img/fsmall.jpg";} if($_SESSION['m']==1){echo "img/msmall.jpg";}?>");}
td{padding:0;margin:0;}

#btc{border:3px solid white;}

</style>
</head>
<body><div id="container">

<table><tr><td>
<div>

<a id="link" href="mtravel_search.php"><span style='text-transform:uppercase'>COUNTRIES</span></a>	


<table><tr>


<?php

if($_SESSION['ori'] == 'gay'){
	
if(isset($_GET['qmr']) || isset($_GET['return'])){}
else{
	if($_SESSION['orisearch'] == Null){
	$_SESSION['orisearch'] = 1;
}}	


if(isset($_GET['lgbt'])){
if($_GET['lgbt'] == 0){
	$_SESSION['orisearch'] = Null;
}else{
	$_SESSION['orisearch'] = 1;
}}

if($_SESSION['orisearch'] == 1){
		echo "<a href='mcforum.php?lgbt=0'><img src='img/lgbt.png' width='60%'></a>";
}else{
		echo "<a href='mcforum.php?lgbt=1'><img src='img/lgbtunclicked.png' width='60%'></a>";	
}
}

?>


</tr><tr>
<?php

if(isset($_GET['f'])){
	if($_GET['f'] == 1){
			echo "<td><a href='mcforum.php?f=2#forum'><img src='img/mforumflinkclicked.png' width='100%'></a></td><td><a href='mcforum.php?m=1#forum'><img src='img/mforummlink.png' width='100%'></a></td>";	
	$_SESSION['f'] = 1;
	$_SESSION['m'] = Null;}
	if($_GET['f'] == 2){
		echo "<td><a href='mcforum.php?f=1#forum'><img src='img/mforumflink.png' width='100%'></a></td><td><a href='mcforum.php?m=1#forum'><img src='img/mforummlink.png' width='100%'></a></td>";	
$_SESSION['f'] = Null;
}}
elseif(isset($_GET['m'])){
	if($_GET['m'] == 1){
			echo "<td><a href='mcforum.php?f=1#forum'><img src='img/mforumflink.png' width='100%'></a></td><td><a href='mcforum.php?m=2#forum'><img src='img/mforummlinkclicked.png' width='100%'></a></td>";
	$_SESSION['m'] = 1;	
	$_SESSION['f'] = Null;}
	if($_GET['m'] == 2){
		echo "<td><a href='mcforum.php?f=1#forum'><img src='img/mforumflink.png' width='100%'></a></td><td><a href='mcforum.php?m=1#forum'><img src='img/mforummlink.png' width='100%'></a></td>";	
$_SESSION['m'] = Null;
		}
}
elseif(isset($_SESSION['f'])){
	echo "<td><a href='mcforum.php?f=2#forum'><img src='img/mforumflinkclicked.png' width='100%'></a></td><td><a href='mcforum.php?m=1#forum'><img src='img/mforummlink.png' width='100%'></a></td>";
}
elseif(isset($_SESSION['m'])){
	echo "<td><a href='mcforum.php?f=1#forum'><img src='img/mforumflink.png' width='100%'></a></td><td><a href='mcforum.php?m=2#forum'><img src='img/mforummlinkclicked.png' width='100%'></a></td>";
}else{
echo "<td><a href='mcforum.php?f=1#forum'><img src='img/mforumflink.png' width='100%'></a></td><td><a href='mcforum.php?m=1#forum'><img src='img/mforummlink.png' width='100%'></a></td>";	
}
?>
</tr></table>

<!--<a id="link" href="mpforum_everyone.php#forum">+ IMAGE</a><br>-->


<?php 

if(isset($_SESSION['searchcountry'])){}
else{
	
}

if($_SESSION['id'] == Null){
	mysqli_close($mysqli);
			setcookie('login',Null,time()+1);
session_unset();
session_destroy(); 
}

if($_SESSION['id']==1){}
else{
if($_SESSION['myr'] == Null){
	mysqli_close($mysqli);
}}




// RETURN FROM VIEW PROFILE NO ADD
if(isset($_GET['return'])){
		$return = $_GET['return'];
		
	
	//AFTER ADD FORUM LOAD
	
	$id = $_SESSION['id'];
		$sessionmf = $_SESSION['mf'];
			$sessionori = $_SESSION['ori'];
				$sessionloc = $_SESSION['city'];
				
if($_SESSION['orisearch'] == 1){				

if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}
				
if(isset($_SESSION['searchcountry'])){
		$country = $_SESSION['searchcountry'];
}else{
	$country = $_SESSION['country'];
}
		$others = "SELECT * FROM users WHERE orientation='gay' AND id <= '$return' AND sex='$mfsql' AND country = '$country' ORDER BY id DESC LIMIT 40";
	}else{

		
if(isset($_SESSION['searchcountry'])){
		$country = $_SESSION['searchcountry'];
}else{
	$country = $_SESSION['country'];
}
		
		$others = "SELECT * FROM users WHERE  orientation='gay' AND id <= '$return' AND country = '$country' ORDER BY id DESC LIMIT 40";
}}else{
	
if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}
				

if(isset($_SESSION['searchcountry'])){
		$country = $_SESSION['searchcountry'];
}else{
	$country = $_SESSION['country'];
}
		
		$others = "SELECT * FROM users WHERE id <= '$return' AND sex='$mfsql' AND country = '$country' ORDER BY id DESC LIMIT 40";
	}else{

		
if(isset($_SESSION['searchcountry'])){
		$country = $_SESSION['searchcountry'];
}else{
	$country = $_SESSION['country'];
}
		
		$others = "SELECT * FROM users WHERE id <= '$return' AND country = '$country' ORDER BY id DESC LIMIT 40";
		
}	
	
}
	
			if ($crowd = mysqli_query($mysqli, $others)){

		echo "<table id='forum' width='100%'><tr>";
$count = 0;
$two = 0;
		while($contents = mysqli_fetch_row($crowd)){
			if ( $two == 2 ) { echo "</tr><tr>"; $two = 0; }
				elseif ($contents == Null){ echo "</tr></table>"; }
					else {
						
echo "<td width='50%'><a href='mviewc_profile.php?uid=".$contents['0']."&c#a'>";						
echo "<div id='cell'><p>".$contents['4']."</p></div></a></td>";
						
/*							
						
	if($contents['8'] == 'prof051487.jpg'){
echo "<td width='50%'><a href='mviewc_profile.php?uid=".$contents['0']."&c#a'>";
if($contents['5'] == 'M'){ 
echo "<img src='img/m.gif' width='100%'>";
}
if($contents['5'] == 'F'){
echo "<img src='img/f.gif' width='100%'>";	
}
echo "<div id='cell'>".$contents['4']."</div></td>";
	} else {
echo "<td width='50%'><a href='mviewc_profile.php?uid=".$contents['0']."&c#a'><img src='profileimg/".$contents['8']."' width='100%'></a>";
echo "<div id='cell'>".$contents['4']."</div></td>";
	}
*/	
		$count++;
		$two++;
		if($count == 16){
		
						echo "</table>";
						echo "<br><a id='link' href='mcforum.php?qmr=".$contents['0']."#forum'><p>NEXT</p></a><br><br>";
						break;
}}}}}

//ADD
elseif(isset($_GET['add'])){
	
	$id = $_SESSION['id'];
	
	$uidcode = $_GET['add'];	
		$uidlookup = "SELECT * FROM users WHERE id='$uidcode'";
			$uidq = mysqli_query($mysqli, $uidlookup);
				$updaterrow = mysqli_fetch_row($uidq);
					$iwant = $updaterrow['1'];

	$myinfo = "SELECT * FROM users WHERE id='$id'";
	$adding = mysqli_query($mysqli, $myinfo);
	$myinfo = mysqli_fetch_row($adding);
	$contactinfo = $myinfo['3'];
		
		$today = date("m/d");
	$sendcontact = "INSERT INTO central (sending,receiving,phone,timeout) VALUES ('$id','$iwant','$contactinfo','$today')";
	mysqli_query($mysqli,$sendcontact);
	
// EMAIL
	
	$theirinfo = "SELECT * FROM users WHERE id='$iwant'";
	$noting = mysqli_query($mysqli, $theirinfo);
	$letemknow = mysqli_fetch_row($noting);
	if($letemknow['10'] == 'on'){
		
		$headers = 'From: QuoteMyRelationship.com' . "\r\n".
		'Reply-To: no-reply@quotemyrelationship.com' . "\r\n" .
		'X-Mailer: PHP/' . phpversion() . "\r\n" .
		'Content-type: text/html; charset=iso-8859-1';
		
		$address = $letemknow['2'];
		$subject = "QMR ~ ".$contactinfo;
		$body = "<a href='http://QuoteMyRelationship.com/email_profile.php?uid=".$id."&meml=".$address."'>Someone wants a relationship with you on QuoteMyRelationship.com.</a><br><br> ".$contactinfo." 
		
		<br><br>
		
		<b>DO NOT REPLY</b><br>
		To stop receiving these Emails <a href='http://QuoteMyRelationship.com/settings.php?unsubscribe=".$iwant."'>Unsubscribe</a>";	
mail($address,$subject,$body,$headers);
echo "SENT";
	}
	
	if($letemknow['10'] == 'off'){
		echo "SENT";
	}
	
	//AFTER ADD FORUM LOAD
	
	$uidcode = $_GET['add'];	
	
	$id = $_SESSION['id'];
		$sessionmf = $_SESSION['mf'];
			$sessionori = $_SESSION['ori'];
				$sessionloc = $_SESSION['city'];
				
				
if($_SESSION['orisearch'] == 1){				
				
if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}				

	
if(isset($_SESSION['searchcountry'])){
		$country = $_SESSION['searchcountry'];
}else{
	$country = $_SESSION['country'];
}
		
		$others = "SELECT * FROM users WHERE orientation='gay' AND id <= '$uidcode' AND sex='$mfsql' AND country = '$country' ORDER BY id DESC LIMIT 40";
	}else{

		
if(isset($_SESSION['searchcountry'])){
		$country = $_SESSION['searchcountry'];
}else{
	$country = $_SESSION['country'];
}
		
		$others = "SELECT * FROM users WHERE orientation='gay' AND id <= '$uidcode' AND country = '$country' ORDER BY id DESC LIMIT 40";
	
}}else{
	
if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}				


		
if(isset($_SESSION['searchcountry'])){
		$country = $_SESSION['searchcountry'];
}else{
	$country = $_SESSION['country'];
}
		
		$others = "SELECT * FROM users WHERE id <= '$uidcode' AND sex='$mfsql' AND country = '$country' ORDER BY id DESC LIMIT 40";
	}else{

if(isset($_SESSION['searchcountry'])){
		$country = $_SESSION['searchcountry'];
}else{
	$country = $_SESSION['country'];
}
		
		$others = "SELECT * FROM users WHERE id <= '$uidcode' AND country = '$country' ORDER BY id DESC LIMIT 40";
	
}	
	
}				


			if ($crowd = mysqli_query($mysqli, $others)){

		echo "<table id='forum' width='100%'><tr>";
$count = 0;
$two = 0;
		while($contents = mysqli_fetch_row($crowd)){
			if ( $two == 2 ) { echo "</tr><tr>"; $two = 0; }
				elseif ($contents == Null){ echo "</tr></table>"; }
					else {

echo "<td width='50%'><a href='mviewc_profile.php?uid=".$contents['0']."&c#a'>";						
echo "<div id='cell'><p>".$contents['4']."</p></div></a></td>";
						
/*							
						
	if($contents['8'] == 'prof051487.jpg'){
echo "<td width='50%'><a href='mviewc_profile.php?uid=".$contents['0']."&c#a'>";
if($contents['5'] == 'M'){ 
echo "<img src='img/m.gif' width='100%'>";
}
if($contents['5'] == 'F'){
echo "<img src='img/f.gif' width='100%'>";	
}
echo "<div id='cell'>".$contents['4']."</div></td>";
	} else {
echo "<td width='50%'><a href='mviewc_profile.php?uid=".$contents['0']."&c#a'><img src='profileimg/".$contents['8']."' width='100%'></a>";
echo "<div id='cell'>".$contents['4']."</div></td>";
	}
*/	
		$count++;
		$two++;
		if($count == 16){
		
						echo "</table>";
						echo "<br><a id='link' href='mcforum.php?qmr=".$contents['0']."#forum'><p>NEXT</p></a><br><br>";
						break;
}}}}}













		// CENTRAL SESSION LOCATION

	elseif(isset($_GET['qmr'])){
		
		$updatedid = $_GET['qmr'];	

	$id = $_SESSION['id'];
		$sessionmf = $_SESSION['mf'];
			$sessionori = $_SESSION['ori'];
				$sessionloc = $_SESSION['city'];
				
if($_SESSION['orisearch'] == 1){				

if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}				
				
		
if(isset($_SESSION['searchcountry'])){
		$country = $_SESSION['searchcountry'];
}else{
	$country = $_SESSION['country'];
}
		
		$others = "SELECT * FROM users WHERE orientation='gay' AND id < '$updatedid' AND sex='$mfsql' AND country = '$country' ORDER BY id DESC LIMIT 40";
	}else{

		
if(isset($_SESSION['searchcountry'])){
		$country = $_SESSION['searchcountry'];
}else{
	$country = $_SESSION['country'];
}
		
		$others = "SELECT * FROM users WHERE orientation='gay' AND id < '$updatedid' AND country = '$country' ORDER BY id DESC LIMIT 40";
	
}}else{
	
if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}				
				

		
if(isset($_SESSION['searchcountry'])){
		$country = $_SESSION['searchcountry'];
}else{
	$country = $_SESSION['country'];
}
		
		$others = "SELECT * FROM users WHERE id < '$updatedid' AND sex='$mfsql' AND country = '$country' ORDER BY id DESC LIMIT 40";
	}else{

		
if(isset($_SESSION['searchcountry'])){
		$country = $_SESSION['searchcountry'];
}else{
	$country = $_SESSION['country'];
}
		
		$others = "SELECT * FROM users WHERE id < '$updatedid' AND country = '$country' ORDER BY id DESC LIMIT 40";
	
}	
	
}				


			if ($crowd = mysqli_query($mysqli, $others)){

		echo "<table id='forum' width='100%'><tr>";
$count = 0;
$two = 0;
		while($contents = mysqli_fetch_row($crowd)){
			if ( $two == 2 ) { echo "</tr><tr>"; $two = 0; }
				elseif ($contents == Null){ echo "</tr></table>"; }
					else {
						
echo "<td width='50%'><a href='mviewc_profile.php?uid=".$contents['0']."&c#a'>";						
echo "<div id='cell'><p>".$contents['4']."</p></div></a></td>";
						
/*							
						
	if($contents['8'] == 'prof051487.jpg'){
echo "<td width='50%'><a href='mviewc_profile.php?uid=".$contents['0']."&c#a'>";
if($contents['5'] == 'M'){ 
echo "<img src='img/m.gif' width='100%'>";
}
if($contents['5'] == 'F'){
echo "<img src='img/f.gif' width='100%'>";	
}
echo "<div id='cell'>".$contents['4']."</div></td>";
	} else {
echo "<td width='50%'><a href='mviewc_profile.php?uid=".$contents['0']."&c#a'><img src='profileimg/".$contents['8']."' width='100%'></a>";
echo "<div id='cell'>".$contents['4']."</div></td>";
	}
*/	
		$count++;
		$two++;
		if($count == 16){
		
						echo "</table>";
						echo "<br><a id='link' href='mcforum.php?qmr=".$contents['0']."#forum'><p>NEXT</p></a><br><br>";
						break;
}}}}

	
	
	
	
	
	
	
	// THE RED SEA
	
	} else {
	
	// OF MOSES
	
	
	
	
	
	
	$id = $_SESSION['id'];
		$sessionmf = $_SESSION['mf'];
			$sessionori = $_SESSION['ori'];
				$sessionloc = $_SESSION['city'];

if($_SESSION['orisearch'] == 1){

				
if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}

		
if(isset($_SESSION['searchcountry'])){
		$country = $_SESSION['searchcountry'];
}else{
	$country = $_SESSION['country'];
}
		
		$others = "SELECT * FROM users WHERE orientation='gay' AND country = '$country' AND sex='$mfsql' ORDER BY id DESC LIMIT 40";
	
}else{

		
if(isset($_SESSION['searchcountry'])){
		$country = $_SESSION['searchcountry'];
}else{
	$country = $_SESSION['country'];
}
		
		$others = "SELECT * FROM users WHERE orientation='gay' AND country = '$country' ORDER BY id DESC LIMIT 40";
	
}}else{
	
if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}

		
if(isset($_SESSION['searchcountry'])){
		$country = $_SESSION['searchcountry'];
}else{
	$country = $_SESSION['country'];
}
		
		$others = "SELECT * FROM users WHERE country = '$country' AND sex='$mfsql' ORDER BY id DESC LIMIT 40";
	
}else{

		
if(isset($_SESSION['searchcountry'])){
		$country = $_SESSION['searchcountry'];
}else{
	$country = $_SESSION['country'];
}
		
		$others = "SELECT * FROM users WHERE country = '$country' ORDER BY id DESC LIMIT 40";
	
}	
	
}				

				


			if($crowd = mysqli_query($mysqli, $others)){
	
		echo "<table id='forum' width='100%'><tr>";
$count = 0;
$two = 0;
		while($contents = mysqli_fetch_row($crowd)){
			if ( $two == 2 ) { echo "</tr><tr>"; $two = 0; }
				elseif ($contents == Null){ echo "</tr></table>"; }
					else {
		
echo "<td width='50%'><a href='mviewc_profile.php?uid=".$contents['0']."&c#a'>";						
echo "<div id='cell'><p>".$contents['4']."</p></div></a></td>";
						
/*			
						
	if($contents['8'] == 'prof051487.jpg'){
echo "<td width='50%'><a href='mviewc_profile.php?uid=".$contents['0']."&c#a'>";
if($contents['5'] == 'M'){ 
echo "<img src='img/m.gif' width='100%'>";
}
if($contents['5'] == 'F'){
echo "<img src='img/f.gif' width='100%'>";	
}
echo "<div id='cell'>".$contents['4']."</div></td>";
	} else {
echo "<td width='50%'><a href='mviewc_profile.php?uid=".$contents['0']."&c#a'><img src='profileimg/".$contents['8']."' width='100%'></a>";
echo "<div id='cell'>".$contents['4']."</div></td>";
	}

*/	
	
		$count++;
		$two++;
		if($count == 16){
		
						echo "</table>";
						echo "<br><a id='link' href='mcforum.php?qmr=".$contents['0']."#forum'><p>NEXT</p></a><br><br>";
						break;
}}}}
	
}
?>
</div>

</td></tr><tr><td>



<?php
/*
if($_SESSION['id']!=1){
$melookup = "SELECT * FROM updater WHERE id='$id' ORDER BY id DESC LIMIT 1";
	$meload = mysqli_query($mysqli,$melookup);
	$hereiam = mysqli_fetch_array($meload);
		$uid = $hereiam['0'];
$myprof = "SELECT * FROM users WHERE id='$id'";
$prof = mysqli_query($mysqli,$myprof);
$myinfo = mysqli_fetch_row($prof);
$picture = $myinfo['5'];
$myqmr = $myinfo['6'];

echo "<table><tr><td><a href='mviewc_profile.php?uid=".$uid."'><img src='profileimg/".$picture."' width='100%'></a></td></tr>";
echo "</table>";}*/
mysqli_close($mysqli);
?>

</td></tr><tr><td>



<form id='region' action='mforum_everyone.php' method='POST'>
<select name='continent'>
<?php
if($_SESSION['region'] == 'AF' ){echo "<option value='AF'>Africa</option><option value='AS'>Asia</option><option value='EU'>Europe</option><option value='ME'>Middle East</option><option value='NA'>North America</option><option value='OC'>Oceania</option><option value='SA'>South America</option><option value='NO'>GLOBAL</option></select>";}
if($_SESSION['region'] == 'AS' ){echo "<option value='AS'>Asia</option><option value='AF'>Africa</option><option value='EU'>Europe</option><option value='ME'>Middle East</option><option value='NA'>North America</option><option value='OC'>Oceania</option><option value='SA'>South America</option><option value='NO'>GLOBAL</option></select>";}
if($_SESSION['region'] == 'EU' ){echo "<option value='EU'>Europe</option><option value='AF'>Africa</option><option value='AS'>Asia</option><option value='ME'>Middle East</option><option value='NA'>North America</option><option value='OC'>Oceania</option><option value='SA'>South America</option><option value='NO'>GLOBAL</option></select>";}
if($_SESSION['region'] == 'ME' ){echo "<option value='ME'>Middle East</option><option value='AF'>Africa</option><option value='AS'>Asia</option><option value='EU'>Europe</option><option value='NA'>North America</option><option value='OC'>Oceania</option><option value='SA'>South America</option><option value='NO'>GLOBAL</option></select>";}
if($_SESSION['region'] == 'NA' ){echo "<option value='NA'>North America</option><option value='AF'>Africa</option><option value='AS'>Asia</option><option value='EU'>Europe</option><option value='ME'>Middle East</option><option value='OC'>Oceania</option><option value='SA'>South America</option><option value='NO'>GLOBAL</option></select>";}
if($_SESSION['region'] == 'OC' ){echo "<option value='OC'>Oceania</option><option value='AF'>Africa</option><option value='AS'>Asia</option><option value='EU'>Europe</option><option value='ME'>Middle East</option><option value='NA'>North America</option><option value='SA'>South America</option><option value='NO'>GLOBAL</option></select>";}
if($_SESSION['region'] == 'SA' ){echo "<option value='SA'>South America</option><option value='AF'>Africa</option><option value='AS'>Asia</option><option value='EU'>Europe</option><option value='ME'>Middle East</option><option value='NA'>North America</option><option value='OC'>Oceania</option><option value='NO'>GLOBAL</option></select>";}
if($_SESSION['region'] == Null ){echo "<option value='NO'>GLOBAL</option><option value='AF'>Africa</option><option value='AS'>Asia</option><option value='EU'>Europe</option><option value='ME'>Middle East</option><option value='NA'>North America</option><option value='OC'>Oceania</option><option value='SA'>South America</option></select>";}
?>
<?php
if($_SESSION['id']!=1){
echo "<input type='submit' name='region' value='REGION'></form>";
}
?>
</td></tr>

<tr><td>
<br><a id="link" href="mprofile.php"><span style='text-transform:uppercase'>MY PAGE</span></a><br>
</td></tr>


<tr><td>
<a id="link" href="logout.php"><span style='text-transform:uppercase'>LOGOUT</span></a>
</td></tr>

<tr><td>
<?php
//DONATE
echo "<br><br><span style='color:#ff69b4'><strong>DONATE HERE</strong></span><br><img width='250px' src='img/BC.png'><br><span style='color:#ff69b4;font-size: 10pt'>Address:<br>3JVj1pV8E3SuaNPmnz15FLNBdFU5rDkGSM<br>calltextme.crypto</span>";
?>
</td></tr>

</table>

</div>
</body>
</html>