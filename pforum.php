<?php 
require 'db.php';
session_start();

/*
	if (isset($_GET['city'])){
		$city = $_GET['city'];
		$_SESSION['city'] = $city;
		$sessionloc = $_SESSION['city'];}
*/
		
// EVERYONE FORUM CITY SEARCH		
	if (isset($_POST['searchcity'])){
		$city = $_POST['city'];
		$_SESSION['city'] = $city;
		$sessionloc = $_SESSION['city'];}		

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
				
				
$newest = "SELECT * FROM updater WHERE id='$id'	ORDER BY repeater DESC LIMIT 1";
		$move = mysqli_query($mysqli, $newest);
		$ud = mysqli_fetch_row($move);
		$latest = $ud['0'];
			$newimg = "DELETE FROM updater WHERE id='$id' AND repeater!='$latest'";
			mysqli_query($mysqli, $newimg);		

// REGION

	if (isset($_POST['region'])){
		
		$region = $_POST['continent'];
		$_SESSION['region'] = $region;}
	
	if($_SESSION['region'] == Null){
		
$myregion = "SELECT * FROM updater WHERE id='$id'";
	$regionmove = mysqli_query($mysqli, $myregion);
		$mr = mysqli_fetch_row($regionmove);
		$_SESSION['region'] = $mr['2'];
			$region = $_SESSION['region'];
		} else {
	$region = $_SESSION['region'];
		}			
				
?>
<!DOCTYPE html>
<html>
<head>
<title>QMR</title>
<script type="text/javascript">
if (screen.width<700){
	window.location="mforum.php";
}
</script>
<link rel="icon" href="img/ro.png">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
@import url('https://fonts.googleapis.com/css?family=Roboto+Mono:500');

body{font-family:'Roboto Mono',monospace;color:white;background-image:url("img/forum10.jpg");}

header{background-image:url("img/rainbow2.gif");text-align:center;font-family:'Roboto Mono',monospace;color:white;
	margin:auto;background-color:black;}

#container{text-align:center;}

#center{text-align:center;}

#cell{width:275px;font-size:20px;text-transform:uppercase;}

a{text-decoration:none;color:white;}
	
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

table{width:100%;margin:0;}

#a{display:block;border:4px solid black;color:black;font-size:35px;text-decoration:none;}
#b{display:block;border:1px solid #608bd1;color:#efdcee;font-size:35px;text-decoration:none;}

p{text-transform:uppercase;color:white;}
</style>
</head>
<body>
<div id="container">

<header>

<table><tr><td>


<form id='region' action='forum.php' method='POST'>
<select name='continent'>
<?php
if($_SESSION['region'] == 'AF' ){echo "<option value='AF'>Africa</option><option value='AS'>Asia</option><option value='EU'>Europe</option><option value='ME'>Middle East</option><option value='NA'>North America</option><option value='OC'>Oceania</option><option value='SA'>South America</option></select>";}
if($_SESSION['region'] == 'AS' ){echo "<option value='AS'>Asia</option><option value='AF'>Africa</option><option value='EU'>Europe</option><option value='ME'>Middle East</option><option value='NA'>North America</option><option value='OC'>Oceania</option><option value='SA'>South America</option></select>";}
if($_SESSION['region'] == 'EU' ){echo "<option value='EU'>Europe</option><option value='AF'>Africa</option><option value='AS'>Asia</option><option value='ME'>Middle East</option><option value='NA'>North America</option><option value='OC'>Oceania</option><option value='SA'>South America</option></select>";}
if($_SESSION['region'] == 'ME' ){echo "<option value='ME'>Middle East</option><option value='AF'>Africa</option><option value='AS'>Asia</option><option value='EU'>Europe</option><option value='NA'>North America</option><option value='OC'>Oceania</option><option value='SA'>South America</option></select>";}
if($_SESSION['region'] == 'NA' ){echo "<option value='NA'>North America</option><option value='AF'>Africa</option><option value='AS'>Asia</option><option value='EU'>Europe</option><option value='ME'>Middle East</option><option value='OC'>Oceania</option><option value='SA'>South America</option></select>";}
if($_SESSION['region'] == 'OC' ){echo "<option value='OC'>Oceania</option><option value='AF'>Africa</option><option value='AS'>Asia</option><option value='EU'>Europe</option><option value='ME'>Middle East</option><option value='NA'>North America</option><option value='SA'>South America</option></select>";}
if($_SESSION['region'] == 'SA' ){echo "<option value='SA'>South America</option><option value='AF'>Africa</option><option value='AS'>Asia</option><option value='EU'>Europe</option><option value='ME'>Middle East</option><option value='NA'>North America</option><option value='OC'>Oceania</option></select>";}
//if($_SESSION['region'] == Null ){echo "<option value='AF'>Africa</option><option value='AS'>Asia</option><option value='EU'>Europe</option><option value='ME'>Middle East</option><option value='NA'>North America</option><option value='OC'>Oceania</option><option value='SA'>South America</option></select>";}
?>
<input type='submit' name='region' value='REGION'></form>

</td>

<td>

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

if($_SESSION['region'] == Null ){

$l = "SELECT DISTINCT city FROM users ORDER BY city ASC";
$lsql = mysqli_query($mysqli, $l);
	echo "<form id='changeloc' action='forum.php' method='POST'><select name='city'><option value='".$_SESSION['city']."'>".$_SESSION['city']."</option>";
				while ($loclist = mysqli_fetch_row($lsql)){
					$location = $loclist['0'];
					echo "<option value='$location'>".$location."</option>";
				}
echo "</select><input type='submit' name='searchcity' value='SEARCH'></form>";
} else {
$region = $_SESSION['region'];
$rc = "SELECT DISTINCT location FROM updater WHERE region='$region' ORDER BY location ASC";
$rcsql = mysqli_query($mysqli, $rc);
	echo "<form id='changeloc' action='forum.php' method='POST'><select name='city'><option value='".$_SESSION['city']."'>".$_SESSION['city']."</option>";
				while ($localist = mysqli_fetch_row($rcsql)){
					$rcity = $localist['0'];
					echo "<option value='$rcity'>".$rcity."</option>";
				}
echo "</select><input type='submit' name='searchcity' value='SEARCH'></form>";
}

?>

</td><td>

<a id="a" href="forum_everyone.php?c=1"><strong>EVERYONE</strong></a>

</td><td>

<!--
<form action="forum.php" method="POST">
<select name="availability"><option value="both">A + CH</option><option value="anyone">ANYONE</option><option value="choice">CHOICE</option>
<input type="submit" name="available" value="AVAILABILITY">
</form>
-->


<a id="a" href="qmr.php"><strong>write</strong></a>
</td><td>

<?php

$myprof = "SELECT * FROM users WHERE id='$id'";
$prof = mysqli_query($mysqli,$myprof);
$myinfo = mysqli_fetch_row($prof);
$picture = $myinfo['5'];

echo "<a href='profile.php'><img src='profileimg/".$picture."'  border='4px'  width='40px'></a>";
?>

</td>

<!--<td>

<a id="a" href="logout.php"><strong>LOGOUT</strong></a>

</td>-->

</tr>
</table>

</header>

<?php 

//PLAIN

if(isset($_GET['plain'])){
	
	
if(isset($_GET['s'])){
		$plain = $_GET['plain'];
		$s = $_GET['s'];	
	$id = $_SESSION['id'];
				$sessionloc = $_SESSION['city'];
				


if($sessionori == "str") {
$others = "SELECT * FROM updater WHERE location = '$sessionloc' AND img != 'prof051487.jpg' AND mf != '$sessionmf' AND ori = '$sessionori' AND repeater <= '$s' ORDER BY repeater DESC";}
if ($sessionori == "gay") {
$others = "SELECT * FROM updater WHERE location = '$sessionloc' AND img != 'prof051487.jpg' AND mf = '$sessionmf' AND ori = '$sessionori' AND repeater <= '$s' ORDER BY repeater DESC";}
	
	//	$others = "SELECT * FROM updater WHERE repeater <= '$s'  ORDER BY repeater DESC";
			if ($crowd = mysqli_query($mysqli, $others)){

		echo "<table><tr>";
			$rowmax = 4;
			$rowcount = 0;
								$count = 0;
								$total = 8;
								
						while($contents = mysqli_fetch_row($crowd)){
				if ($rowcount == $rowmax){echo "</tr><tr>";$rowcount=0;}
						if ($count == $total){ 
						echo "</tr></table>";
						echo "<br><a id='b' href='forum.php?qmr=".$contents['0']."'>NEXT</a>";
						break;}

	if($contents['0'] == $plain){
		
		$uid = $plain;

	$repeaterlookup = "SELECT * FROM updater WHERE repeater='$plain'";
	$rload = mysqli_query($mysqli,$repeaterlookup);
	$found = mysqli_fetch_array($rload);
		$who = $found['1'];

	$call = "SELECT * FROM users WHERE id='$who'";
	$infoload = mysqli_query($mysqli,$call);
	$row = mysqli_fetch_array($infoload);
		$profile = $row['1'];
		$email = $row['2'];
		$contact = $row['3'];
		$qmr = $row['6'];
		$availability = $row['7'];
		
echo "<td>";		

	echo "<br><br><br><br><a href='forum.php?return=".$uid."&s=".$s."'><img src='img/central.png' width='45px'></a>";		
	
	if($availability != 'anyone'){
	
	echo "<br><br><a href='forum.php?add=".$uid."'><article><span style='color:white'><strong>SEND CONTACT</strong></span></article><br>";
	

	echo "<article><span style='font-size:14px'>".$qmr."</span></article><br>";
	echo "<article>TOUCH TO SEND CONTACT INFO</article></strong></a>";

	} else {
		

	echo "<br><br><article><span style='font-size:20px'><strong>".$contact."</strong></span></article></strong><br>";
	echo "<article><span style='font-size:14px'><strong>".$qmr."</strong></span></article></strong><br>";
	
	}	
	
		if($id == 198){
		echo "<table><tr><td>";	
		echo "<a href='delete.php?delete=".$who."' id='mylink'><h4>DELETE</h4></a>";
		echo "<a href='viewe_profile.php?image=".$who."' id='mylink'><h4>NUDITY</h4></a></td></tr><tr><td>";
		echo "<a href='profile.php?login=".$email."' id='mylink'><h4>".$email."</h4></a></td></tr></table>";
		echo "<br><h3>".$contact."</h3>";
	}
	
	echo "</td>";
}							
						
	if($contents['8'] == 'prof051487.jpg' AND $contents['0'] != $plain){
echo "<td><a href='forum.php?plain=".$contents['0']."&s=".$s."'>";
if($contents['5'] == 'M'){ 
echo "<img src='img/m.png' width='100%'>";
}
if($contents['5'] == 'F'){
echo "<img src='img/f.png' width='100%'>";	
}
echo "<div id='cell'>".$contents['3']."</div></td>";
} 

if($contents['8'] != 'prof051487.jpg' AND $contents['0'] != $plain){	
echo "<td><a href='view_profile.php?uid=".$contents['0']."&p=1'><img src='profileimg/".$contents['8']."' width='100%'></a>";
echo "<div id='cell'>".$contents['3']."</div></td>";		
}
		$count++;
		$rowcount++;
	}

}} else	{
	
	
	
		$plain = $_GET['plain'];
	$id = $_SESSION['id'];
				$sessionloc = $_SESSION['city'];

if($sessionori == "str") {
$others = "SELECT * FROM updater WHERE location = '$sessionloc' AND img != 'prof051487.jpg' AND mf != '$sessionmf' AND ori = '$sessionori' ORDER BY repeater DESC";}
if ($sessionori == "gay") {
$others = "SELECT * FROM updater WHERE location = '$sessionloc' AND img != 'prof051487.jpg' AND mf = '$sessionmf' AND ori = '$sessionori' ORDER BY repeater DESC";}
				
			if ($crowd = mysqli_query($mysqli, $others)){

		echo "<table><tr>";
			$rowmax = 4;
			$rowcount = 0;
								$count = 0;
								$total = 8;
								

		while($contents = mysqli_fetch_row($crowd)){
				if ($rowcount == $rowmax){echo "</tr><tr>";$rowcount=0;}
						if ($count == $total){ 
						echo "</tr></table>";
						echo "<br><a id='b' href='forum.php?qmr=".$contents['0']."'>NEXT</a>";
						break;}

	if($contents['0'] == $plain){
		
		$uid = $plain;

	$repeaterlookup = "SELECT * FROM updater WHERE repeater='$plain'";
	$rload = mysqli_query($mysqli,$repeaterlookup);
	$found = mysqli_fetch_array($rload);
		$who = $found['1'];

	$call = "SELECT * FROM users WHERE id='$who'";
	$infoload = mysqli_query($mysqli,$call);
	$row = mysqli_fetch_array($infoload);
		$profile = $row['1'];
		$email = $row['2'];
		$contact = $row['3'];
		$qmr = $row['6'];
		$availability = $row['7'];
		
echo "<td>";		

	echo "<br><br><br><br><a href='forum.php?return=".$uid."'><img src='img/central.png' width='45px'></a>";		
	
	if($availability != 'anyone'){
	
	echo "<br><br><a href='forum.php?add=".$uid."'><article><span style='color:white'><strong>SEND CONTACT</strong></span></article><br>";
	

	echo "<article><span style='font-size:14px'>".$qmr."</span></article><br>";
	echo "<article>TOUCH TO SEND CONTACT INFO</article></strong></a>";

	} else {
		

	echo "<br><br><article><span style='font-size:20px'><strong>".$contact."</strong></span></article></strong><br>";
	echo "<article><span style='font-size:14px'><strong>".$qmr."</strong></span></article></strong><br>";
	
	}	
	
		if($id == 198){
		echo "<table><tr><td>";	
		echo "<a href='delete.php?delete=".$who."' id='mylink'><h3>DELETE</h3></a></td></tr><tr><td>";
		echo "<a href='viewe_profile.php?image=".$who."' id='mylink'><h3>NUDITY</h3></a></td></tr><tr><td>";
		echo "<a href='profile.php?login=".$email."' id='mylink'><h5>".$email."</h5></a></td></tr></table>";
		echo "<br><h1>".$contact."</h1>";
	}
	
	echo "</td>";
}							
						
	if($contents['8'] == 'prof051487.jpg' AND $contents['0'] != $plain){
echo "<td><a href='forum.php?plain=".$contents['0']."'>";
if($contents['5'] == 'M'){ 
echo "<img src='img/m.png' width='100%'>";
}
if($contents['5'] == 'F'){
echo "<img src='img/f.png' width='100%'>";	
}
echo "<div id='cell'>".$contents['3']."</div></td>";
} 

if($contents['8'] != 'prof051487.jpg' AND $contents['0'] != $plain){	
echo "<td><a href='view_profile.php?uid=".$contents['0']."&p=1'><img src='profileimg/".$contents['8']."' width='100%'></a>";
echo "<div id='cell'>".$contents['3']."</div></td>";		
}
		$count++;
		$rowcount++;
	}

}}}








// RETURN FROM VIEW PROFILE NO ADD
elseif(isset($_GET['return'])){

		if(isset($_GET['s'])){
		
		$return = $_GET['s'];
		} else {
		$return = $_GET['return'];}
		
	
	//AFTER ADD FORUM LOAD
	
	$id = $_SESSION['id'];
		$sessionmf = $_SESSION['mf'];
			$sessionori = $_SESSION['ori'];
				$sessionloc = $_SESSION['city'];

				
				if($sessionori == "str") {
					

		$others = "SELECT * FROM updater WHERE location = '$sessionloc' AND img != 'prof051487.jpg' AND mf != '$sessionmf' AND ori = '$sessionori' AND repeater <= '$return' ORDER BY repeater DESC";
			if ($crowd = mysqli_query($mysqli, $others)){

		echo "<table><tr>";
			$rowmax = 4;
			$rowcount = 0;
								$count = 0;
								$total = 8;
								

		while($contents = mysqli_fetch_row($crowd)){
				if ($rowcount == $rowmax){echo "</tr><tr>";$rowcount=0;}
						if ($count == $total){ 
						echo "</tr></table>";
						echo "<br><a id='b' href='forum.php?qmr=".$contents['0']."'>NEXT</a><br><br>";
						break;}
					
	if($contents['8'] == 'prof051487.jpg'){
echo "<td><a href='forum.php?plain=".$contents['0']."&s=".$return."'>";
if($contents['5'] == 'M'){ 
echo "<img src='img/m.png' width='100%'>";
}
if($contents['5'] == 'F'){
echo "<img src='img/f.png' width='100%'>";	
}
echo "<div id='cell'>".$contents['3']."</div></td>";
	} else {
echo "<td><a href='view_profile.php?uid=".$contents['0']."&s=".$return."&p=1'><img src='profileimg/".$contents['8']."' width='100%'></a>";
echo "<div id='cell'>".$contents['3']."</div></td>";		
}
		$count++;
		$rowcount++;
	}
}} elseif ($sessionori == "gay") {
					

		$others = "SELECT * FROM updater WHERE location = '$sessionloc' AND img != 'prof051487.jpg' AND mf = '$sessionmf' AND ori = '$sessionori' AND repeater <= '$return' ORDER BY repeater DESC";
			if ($crowd = mysqli_query($mysqli, $others)){

		echo "<table><tr>";
			$rowmax = 4;
			$rowcount = 0;
								$count = 0;
								$total = 8;
								


		while($contents = mysqli_fetch_row($crowd)){
				if ($rowcount == $rowmax){echo "</tr><tr>";$rowcount=0;}
						if ($count == $total){ 
						echo "</tr></table>";
						echo "<br><a id='b' href='forum.php?qmr=".$contents['0']."'>NEXT</a><br><br>";
						break;}
					
	if($contents['8'] == 'prof051487.jpg'){
echo "<td><a href='forum.php?plain=".$contents['0']."&s=".$return."'>";
if($contents['5'] == 'M'){ 
echo "<img src='img/m.png' width='100%'>";
}
if($contents['5'] == 'F'){
echo "<img src='img/f.png' width='100%'>";	
}
echo "<div id='cell'>".$contents['3']."</div></td>";
	} else {
echo "<td><a href='view_profile.php?uid=".$contents['0']."&s=".$return."&p=1'><img src='profileimg/".$contents['8']."' width='100%'></a>";
echo "<div id='cell'>".$contents['3']."</div></td>";		
}
		$count++;
		$rowcount++;
	}
}}}

//ADD
elseif(isset($_GET['add'])){
	
	$id = $_SESSION['id'];
	
	$uidcode = $_GET['add'];	
		$uidlookup = "SELECT * FROM updater WHERE repeater='$uidcode'";
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

				
				if($sessionori == "str") {
					

		$others = "SELECT * FROM updater WHERE location = '$sessionloc' AND img != 'prof051487.jpg' AND mf != '$sessionmf' AND ori = '$sessionori' AND repeater <= '$uidcode' ORDER BY repeater DESC";
			if ($crowd = mysqli_query($mysqli, $others)){

		echo "<table><tr>";
			$rowmax = 4;
			$rowcount = 0;
								$count = 0;
								$total = 8;
								


		while($contents = mysqli_fetch_row($crowd)){
				if ($rowcount == $rowmax){echo "</tr><tr>";$rowcount=0;}
						if ($count == $total){ 
						echo "</tr></table>";
						echo "<br><a id='b' href='forum.php?qmr=".$contents['0']."'>NEXT</a><br><br>";
						break;}
					
	if($contents['8'] == 'prof051487.jpg'){
echo "<td><a href='forum.php?plain=".$contents['0']."&s=".$uidcode."'>";
if($contents['5'] == 'M'){ 
echo "<img src='img/m.png' width='100%'>";
}
if($contents['5'] == 'F'){
echo "<img src='img/f.png' width='100%'>";	
}
echo "<div id='cell'>".$contents['3']."</div></td>";
	} else {
echo "<td><a href='view_profile.php?uid=".$contents['0']."&s=".$uidcode."&p=1'><img src='profileimg/".$contents['8']."' width='100%'></a>";
echo "<div id='cell'>".$contents['3']."</div></td>";		
}
		$count++;
		$rowcount++;
	} 
}} elseif ($sessionori == "gay") {
					

		$others = "SELECT * FROM updater WHERE location = '$sessionloc' AND img != 'prof051487.jpg' AND mf = '$sessionmf' AND ori = '$sessionori' AND repeater <= '$sessionrepeater' ORDER BY repeater DESC";
			if ($crowd = mysqli_query($mysqli, $others)){

		echo "<table><tr>";
			$rowmax = 4;
			$rowcount = 0;
								$count = 0;
								$total = 8;
								


		while($contents = mysqli_fetch_row($crowd)){
				if ($rowcount == $rowmax){echo "</tr><tr>";$rowcount=0;}
						if ($count == $total){ 
						echo "</tr></table>";
						echo "<br><a id='b' href='forum.php?qmr=".$contents['0']."'>NEXT</a><br><br>";
						break;}
					
	if($contents['8'] == 'prof051487.jpg'){
echo "<td><a href='forum.php?plain=".$contents['0']."&s=".$sessionrepeater."'>";
if($contents['5'] == 'M'){ 
echo "<img src='img/m.png' width='100%'>";
}
if($contents['5'] == 'F'){
echo "<img src='img/f.png' width='100%'>";	
}
echo "<div id='cell'>".$contents['3']."</div></td>";
	} else {
echo "<td><a href='view_profile.php?uid=".$contents['0']."&s=".$sessionrepeater."&p=1'><img src='profileimg/".$contents['8']."' width='100%'></a>";
echo "<div id='cell'>".$contents['3']."</div></td>";		
}
		$count++;
		$rowcount++;
	}
}}}













		// CENTRAL SESSION LOCATION

	elseif(isset($_GET['qmr'])){
		
		$updatedid = $_GET['qmr'];	

	$id = $_SESSION['id'];
		$sessionmf = $_SESSION['mf'];
			$sessionori = $_SESSION['ori'];
				$sessionloc = $_SESSION['city'];
				
				if($sessionori == "str") {
					

		$others = "SELECT * FROM updater WHERE location = '$sessionloc' AND img != 'prof051487.jpg' AND mf != '$sessionmf' AND ori = '$sessionori' AND repeater <= '$updatedid' ORDER BY repeater DESC";
			if ($crowd = mysqli_query($mysqli, $others)){

		echo "<table><tr>";
			$rowmax = 4;
			$rowcount = 0;
								$count = 0;
								$total = 8;
								


		while($contents = mysqli_fetch_row($crowd)){
				if ($rowcount == $rowmax){echo "</tr><tr>";$rowcount=0;}
						if ($count == $total){ 
						echo "</tr></table>";
						echo "<br><a id='b' href='forum.php?qmr=".$contents['0']."'>NEXT</a><br><br>";
						break;}
					
	if($contents['8'] == 'prof051487.jpg'){
echo "<td><a href='forum.php?plain=".$contents['0']."&s=".$updatedid."'>";
if($contents['5'] == 'M'){ 
echo "<img src='img/m.png' width='100%'>";
}
if($contents['5'] == 'F'){
echo "<img src='img/f.png' width='100%'>";	
}
echo "<div id='cell'>".$contents['3']."</div></td>";
	} else {
echo "<td><a href='view_profile.php?uid=".$contents['0']."&s=".$updatedid."&p=1'><img src='profileimg/".$contents['8']."' width='100%'></a>";
echo "<div id='cell'>".$contents['3']."</div></td>";		
}
		$count++;
		$rowcount++;
	}
}} elseif ($sessionori == "gay") {
					

		$others = "SELECT * FROM updater WHERE location = '$sessionloc' AND img != 'prof051487.jpg' AND mf = '$sessionmf' AND ori = '$sessionori' AND repeater <= '$updatedid' ORDER BY repeater DESC";
			if ($crowd = mysqli_query($mysqli, $others)){

		echo "<table><tr>";
			$rowmax = 4;
			$rowcount = 0;
								$count = 0;
								$total = 8;
								

		while($contents = mysqli_fetch_row($crowd)){
				if ($rowcount == $rowmax){echo "</tr><tr>";$rowcount=0;}
						if ($count == $total){ 
						echo "</tr></table>";
						echo "<br><a id='b' href='forum.php?qmr=".$contents['0']."'>NEXT</a><br><br>";
						break;}
					
	if($contents['8'] == 'prof051487.jpg'){
echo "<td><a href='forum.php?plain=".$contents['0']."&s=".$updatedid."'>";
if($contents['5'] == 'M'){ 
echo "<img src='img/m.png' width='100%'>";
}
if($contents['5'] == 'F'){
echo "<img src='img/f.png' width='100%'>";	
}
echo "<div id='cell'>".$contents['3']."</div></td>";
	} else {
echo "<td><a href='view_profile.php?uid=".$contents['0']."&s=".$updatedid."&p=1'><img src='profileimg/".$contents['8']."' width='100%'></a>";
echo "<div id='cell'>".$contents['3']."</div></td>";		
}
		$count++;
		$rowcount++;
	} 
}}

	
	
	
	
	
	
	
	// THE RED SEA
	
	} else {
	
	// OF MOSES
	
	
	
	
	
	
	$id = $_SESSION['id'];
		$sessionmf = $_SESSION['mf'];
			$sessionori = $_SESSION['ori'];
				$sessionloc = $_SESSION['city'];
			
				
				if($sessionori == "str") {
					

		$others = "SELECT * FROM updater WHERE location = '$sessionloc' AND img != 'prof051487.jpg' AND mf != '$sessionmf' AND ori = '$sessionori' ORDER BY repeater DESC";
			if($crowd = mysqli_query($mysqli, $others)){

if ($crowd->num_rows == 0){
		if($sessionmf == 'M'){
		echo "<br><br><br><br><span style='color:white'><h3>There are no females in ".$sessionloc.".</h3><br>Donate to help get more people on QuoteMyRelationship.com.</span><br>";
				echo "<br><br><form action='https://www.paypal.com/cgi-bin/webscr' method='post' target='_blank'><input type='hidden' name='cmd' value='_s-xclick'><input type='hidden' name='hosted_button_id' value='U8TS6F2FB3BGE'><input type='image' src='https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif' border='0' name='submit' alt='PayPal - The safer, easier way to pay online!'><img alt='' border='0' src='https://www.paypalobjects.com/en_US/i/scr/pixel.gif' width='1' height='1'></form>";	
		}
		if($sessionmf == 'F'){
echo "<br><br><br><br><span style='color:white'><h3>There are no males in ".$sessionloc.".</h3><br>Donate to help get more people on QuoteMyRelationship.com.</span><br>";
				echo "<br><br><form action='https://www.paypal.com/cgi-bin/webscr' method='post' target='_blank'><input type='hidden' name='cmd' value='_s-xclick'><input type='hidden' name='hosted_button_id' value='U8TS6F2FB3BGE'><input type='image' src='https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif' border='0' name='submit' alt='PayPal - The safer, easier way to pay online!'><img alt='' border='0' src='https://www.paypalobjects.com/en_US/i/scr/pixel.gif' width='1' height='1'></form>";			
		}
			} 
	
		echo "<table><tr>";
			$rowmax = 4;
			$rowcount = 0;
								$count = 0;
								$total = 8;



								
	while($contents = mysqli_fetch_row($crowd)){
			
			
			
			
			
				if ($rowcount == $rowmax){echo "</tr><tr>";$rowcount=0;}
						if ($count == $total){ 
						echo "</tr></table>";
						echo "<br><a id='b' href='forum.php?qmr=".$contents['0']."'>NEXT</a><br><br>";
						break;}
					
	if($contents['8'] == 'prof051487.jpg'){
echo "<td><a href='forum.php?plain=".$contents['0']."'>";
if($contents['5'] == 'M'){ 
echo "<img src='img/m.png' width='100%'>";
}
if($contents['5'] == 'F'){
echo "<img src='img/f.png' width='100%'>";	
}
echo "<div id='cell'>".$contents['3']."</div></td>";
	} else {
echo "<td><a href='view_profile.php?uid=".$contents['0']."&p=1'><img src='profileimg/".$contents['8']."' width='100%'></a>";
echo "<div id='cell'>".$contents['3']."</div></td>";		
}
		$count++;
		$rowcount++;
}
			

} 
				
				} elseif ($sessionori == "gay") {
					

		$others = "SELECT * FROM updater WHERE location = '$sessionloc' AND img != 'prof051487.jpg' AND mf = '$sessionmf' AND ori = '$sessionori' ORDER BY repeater DESC";
			if($crowd = mysqli_query($mysqli, $others)){
				
if ($crowd->num_rows == 0){		
		if($sessionmf == 'M'){
		echo "<br><br><br><br><span style='color:white'><h3>There are no males in ".$sessionloc.".</h3><br>Donate to help get more people on QuoteMyRelationship.com.</span><br>";
				echo "<br><br><form action='https://www.paypal.com/cgi-bin/webscr' method='post' target='_blank'><input type='hidden' name='cmd' value='_s-xclick'><input type='hidden' name='hosted_button_id' value='U8TS6F2FB3BGE'><input type='image' src='https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif' border='0' name='submit' alt='PayPal - The safer, easier way to pay online!'><img alt='' border='0' src='https://www.paypalobjects.com/en_US/i/scr/pixel.gif' width='1' height='1'></form>";	
		}
		if($sessionmf == 'F'){
echo "<br><br><br><br><span style='color:white'><h3>There are no females in ".$sessionloc.".</h3><br>Donate to help get more people on QuoteMyRelationship.com.</span><br>";
				echo "<br><br><form action='https://www.paypal.com/cgi-bin/webscr' method='post' target='_blank'><input type='hidden' name='cmd' value='_s-xclick'><input type='hidden' name='hosted_button_id' value='U8TS6F2FB3BGE'><input type='image' src='https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif' border='0' name='submit' alt='PayPal - The safer, easier way to pay online!'><img alt='' border='0' src='https://www.paypalobjects.com/en_US/i/scr/pixel.gif' width='1' height='1'></form>";			
		}}			

		echo "<table><tr>";
			$rowmax = 4;
			$rowcount = 0;
								$count = 0;
								$total = 8;


								
	while($contents = mysqli_fetch_row($crowd)){
			
	if ($rowcount == $rowmax){echo "</tr><tr>";$rowcount=0;}
						if ($count == $total){ 
						echo "</tr></table>";
						echo "<br><a id='b' href='forum.php?qmr=".$contents['0']."'>NEXT</a><br><br>";
						break;}
					
	if($contents['8'] == 'prof051487.jpg'){
echo "<td><a href='forum.php?plain=".$contents['0']."'>";
if($contents['5'] == 'M'){ 
echo "<img src='img/m.png' width='100%'>";
}
if($contents['5'] == 'F'){
echo "<img src='img/f.png' width='100%'>";	
}
echo "<div id='cell'>".$contents['3']."</div></td>";
	} else {
echo "<td><a href='view_profile.php?uid=".$contents['0']."&p=1'><img src='profileimg/".$contents['8']."' width='100%'></a>";
echo "<div id='cell'>".$contents['3']."</div></td>";		
}
		$count++;
		$rowcount++;
	}
			

				
}




				}}
?>


<br><br><br>&nbsp;
<?php
mysqli_close($mysqli);
?>
</div>
</body>
</html>