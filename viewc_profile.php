<?php
require 'db.php';
session_start();
    $id = $_SESSION['id'];
	if(isset($_SESSION['id'])){}else{mysqli_close($mysqli);}
	
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
	<title>QMR</title>
	<link rel="icon" href="img/ro.png">
<meta property="og:title" content="I wanted to Share this Contact.">
<meta property="og:image" content="img/ro.png">	
</head>
<style>
body{background-color:#f7f7f7;}

div{text-align:center;}

@import url('https://fonts.googleapis.com/css?family=Roboto+Mono:500');
	header{background-color:yellow;width:300px;text-align:center;
	font-family:'Roboto Mono',monospace;color:black;
	border:3px solid #000000;margin:auto;text-transform:capitalize;}

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
ul{margin:0;padding:0;overflow:hidden;list-style-type:none;}

#left{display:block;padding:20px;}
#left:link,a:visited{background:#ffffc6 linear-gradient(to right,#f7f7f7,#ffffc6,#ffffc6,#ffffc6);}
#left:hover{background:#eb1e66 linear-gradient(to right,#f7f7f7,#ffe2ec,#ffe2ec,#ffe2ec)}	
#left:active{background:#f7f7f7 linear-gradient(to right,#f7f7f7,#f7f7f7,#f7f7f7,#ffffc6);}

#return{display:block;padding:20px;}
#return:link,a:visited{background:#ffffc6 linear-gradient(to right,#ffffc6,#ffffc6,#ffffc6,#ffffc6);}
#return:hover{background:#eb1e66 linear-gradient(to right,#f7f7f7,#ffe2ec,#ffe2ec,#f7f7f7)}	
#return:active{background:#f7f7f7 linear-gradient(to right,#ffffc6,#f7f7f7,#f7f7f7,#ffffc6);}

#right{display:block;padding:20px;}
#right:link,a:visited{background:#ffffc6 linear-gradient(to right,#ffffc6,#ffffc6,#ffffc6,#f7f7f7);}
#right:hover{background:#eb1e66 linear-gradient(to right,#ffe2ec,#ffe2ec,#ffe2ec,#f7f7f7)}	
#right:active{background:#f7f7f7 linear-gradient(to right,#ffffc6,#f7f7f7,#f7f7f7,#f7f7f7);}

#mylink{display:block;padding:20px;}
#mylink:link,a:visited{background:#bec4ce linear-gradient(to right,#bec4ce,#bec4ce,#bec4ce,#bec4ce);}
#mylink:hover{background:#eb1e66 linear-gradient(to right,#eb1e66,#eb1e66,#eb1e66,#eb1e66)}	
#mylink:active{background:#f7f7f7 linear-gradient(to right,#f7f7f7,#f7f7f7,#f7f7f7,#f7f7f7);}

#mssg{font-family:'Roboto Mono',monospace;font-size:25px;padding:20px;text-decoration:none;display:block;}
#mssg:link,a:visited{background-color:#f2f2f2;color:black;}
#mssg:hover{background-color:#f2f2f2;}
#mssg:active{background-color:#f2f2f2;}

a{text-decoration:none;color:black;}

.qmr{width:500px; border:4px solid #d4d4d4;margin:auto;}
	
@import url('https://fonts.googleapis.com/css?family=Roboto+Mono:500');
footer,#topheader{width:100%;height:100%;}
article{margin:auto;font-family:'Roboto Mono',monospace;}<!--QMR width:300px;-->
div{margin:auto;text-align:center;}
section{font-family:'Roboto Mono',monospace;color:red;}
article{text-transform:uppercase;}
table{width:100%;margin:0;padding:0;}
#ad{margin:0 auto;}
</style>
<body>

<div id='ad'>
<a target="_blank" href="https://ad.admitad.com/g/vbnovi30pq942acd6855ed464edc45/?ulp=https%3A%2F%2Fwww.cleartrip.com%2Fflights">
<img src="https://www.awltovhc.com/image-100287312-12278899" width="728" height="90" alt="" border="0"/></a>
</div>

<?php // MY ADMIN
	if(isset($_GET['image'])){
		$imgid = $_GET['image'];
		$default = "prof051487.jpg";
	
	// DELETE OLD IMAGE
	$imageload = "SELECT * FROM users WHERE id='$imgid'";
		$loading = mysqli_query($mysqli,$imageload);
	if (($irow = mysqli_fetch_row($loading))){
		$myimage = $irow['5'];
		$address = $irow['2'];
		if($myimage != "prof051487.jpg"){
		unlink("profileimg/$myimage"); }}

	$imageone = "UPDATE users SET image = '$default' WHERE id = '$imgid'";
	mysqli_query($mysqli, $imageone);	
	
	// EMAIL
		$subject = "QuoteMyRelationship.com PROFILE IMAGE ALERT";
		$body = "http://QuoteMyRelationship.com/quote_disclaimer.html YOUR IMAGE HAS BROKEN THE RULES OF THIS SITE. NO NUDITY, MUST BE AN ADULT.";	
mail($address,$subject,$body);
echo "SENT";
	}	
	
	
	?>
	
	
<?php

// PROFILE TO VEP QMR LINK

if(isset($_GET['mid'])){
	$messager = $_GET['mid'];
	$msearch = "SELECT * FROM messages WHERE messageid='$messager'"; 
	
	$mfound = mysqli_query($mysqli,$msearch);
	$ufound = mysqli_fetch_row($mfound);
		$thisuser = $ufound['1'];	


	$call = "SELECT * FROM users WHERE id='$thisuser'";
	$infoload = mysqli_query($mysqli,$call);
	$row = mysqli_fetch_array($infoload);
		$profile = $row['1'];
		$email = $row['2'];
		$contact = $row['3'];
		$city = $row['4'];
		$image = $row['5'];
		$qmr = $row['6'];
		$availability = $row['7'];
		if ($row['8'] == 0){$btc=NULL;}else{$btc=$row['8'];}
		$regioncode = $row['9'];
		$country = $row['16'];
		if($_SESSION['ori']=="gay"){
			$hide = 0;
		}else{
			$hide = $row['18'];
		}
		$popularity = $row['20'];
		$popularity += 1;
			$pop = "UPDATE users SET popularity='$popularity' WHERE id='$who'";
			mysqli_query($mysqli,$pop);		

if($_SESSION['myr'] != $regioncode && $_SESSION['paid'] != 1){mysqli_close($mysqli);}
		
if($regioncode == 'AF'){$theregion = 'Africa';}
if($regioncode == 'AS'){$theregion = 'Asia';}
if($regioncode == 'EU'){$theregion = 'Europe';}
if($regioncode == 'ME'){$theregion = 'Middle East';}
if($regioncode == 'NA'){$theregion = 'North America';}
if($regioncode == 'OC'){$theregion = 'Oceania';}
if($regioncode == 'SA'){$theregion = 'South America';}

		$sex = $row['12'];	
		
	echo "<a href='forum.php?city=".$city."'><header><span style='font-size:225%'><strong>".$city;

if(isset($country)) {	
	echo "<br><span style='text-transform:uppercase'>".$country."</span></strong></span></header></a><br>";
}else if(isset($theregion)) {	
	echo "<br>".$theregion."</strong></span></header></a><br>";
} else {
	echo "</strong></span></header></a><br>";
}

if($image == 'prof051487.jpg'){
			if($sex == 'M'){
	echo "<img width='300px' border='2px' src='img/m.jpg'><br><br>";
			}
			if($sex == 'F'){
	echo "<img width='300px' border='2px' src='img/f.jpg'><br><br>";
			}}
			
if($image != 'prof051487.jpg'){
	echo "<img width='300px' border='2px' src='profileimg/".$image."'><article>TOUCH TO SEND CONTACT INFO</article></strong><br><br>";
}			

	echo "<article><span style='font-size:14px'>".$qmr."</span></article><br>";
	echo "</a>";
	
if($id == 1){
		echo "<table><tr><td>";	
		echo "<a href='delete.php?delete=".$thisuser."' id='mylink'><h3>DELETE</h3></a></td><td>";
		echo "<a href='viewc_profile.php?image=".$thisuser."' id='mylink'><h3>NUDITY</h3></a></td><td>";
		echo "<a href='profile.php?login=".$email."' id='mylink'><h3>".$email."</h3></a></td></tr></table>";
		echo "<br><h1>".$contact."</h1>";
}	
	
	
}

?>	
	


<?php 
	if(isset($_GET['uid']) || isset($_GET['extra']) ){
	
if(isset($_GET['extra'])){
$extra = $_GET['extra'];

	$uid = $extra;
		
}

// QMR SENDER LINK	
	if(isset($_GET['qmrid'])){
		$who = $_GET['uid'];
		
	$uid = $who;	
		
	}else{
		
	if(isset($uid)){}else{$uid = $_GET['uid'];}
	
	$who = $uid;	}
		

// LEFT
if(isset($_GET['l'])){

if($_SESSION['orisearch'] == 1){

// PFORUM	
if(isset($_GET['i'])){
	
//MF	
if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}	

			
$country = $_SESSION['country'];		
	$repeaterlookup = "SELECT * FROM users WHERE country='$country' AND orientation='gay' AND sex='$mfsql' AND image != 'prof051487.jpg' AND id>'$uid' ORDER BY id ASC LIMIT 1"; 
		$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
	$who = $found['0'];
}

//NO MF
}else{		

$country = $_SESSION['country'];		
	$repeaterlookup = "SELECT * FROM users WHERE country='$country' AND orientation='gay' AND image != 'prof051487.jpg' AND id>'$uid' ORDER BY id ASC LIMIT 1"; 
		$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
	$who = $found['0'];
}}}else{

//MF	
if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}	


$country = $_SESSION['country'];		
	$repeaterlookup = "SELECT * FROM users WHERE country='$country' AND orientation='gay' AND sex='$mfsql' AND id>'$uid' ORDER BY id ASC LIMIT 1"; 
		$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
	$who = $found['0'];
}

}else{
// PFORUM	NO MF

$region = $_SESSION['region'];		
	$repeaterlookup = "SELECT * FROM users WHERE region='$region' AND id>'$uid' AND orientation='gay' ORDER BY id ASC LIMIT 1"; 
		$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
	$who = $found['0'];
}}}}else{
	
	
	
// ORISEARCH DIVIDE	
	
	
	
// PFORUM	
if(isset($_GET['i'])){
	
//MF	
if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}	

$country = $_SESSION['country'];		
	$repeaterlookup = "SELECT * FROM users WHERE country='$country' AND sex='$mfsql' AND image != 'prof051487.jpg' AND id>'$uid' ORDER BY id ASC LIMIT 1"; 
		$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
	$who = $found['0'];
}

//NO MF
}else{		

$country = $_SESSION['country'];		
	$repeaterlookup = "SELECT * FROM users WHERE country='$country' AND image != 'prof051487.jpg' AND id>'$uid' ORDER BY id ASC LIMIT 1"; 
		$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
	$who = $found['0'];
}}}else{

//MF	
if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}	


$country = $_SESSION['country'];		
	$repeaterlookup = "SELECT * FROM users WHERE country='$country' AND sex='$mfsql' AND id>'$uid' ORDER BY id ASC LIMIT 1"; 
		$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
	$who = $found['0'];
}

}else{
// PFORUM	NO MF

$country = $_SESSION['country'];		
	$repeaterlookup = "SELECT * FROM users WHERE country='$country' AND id>'$uid' ORDER BY id ASC LIMIT 1"; 
		$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
	$who = $found['0'];
}}}	
	
}}

// RIGHT
if(isset($_GET['r'])){
	
	
if($_SESSION['orisearch'] == 1){	

// PFORUM
if(isset($_GET['i'])){
	
//MF	
if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}	


$country = $_SESSION['country'];		
	$repeaterlookup = "SELECT * FROM users WHERE country='$country' AND orientation='gay' AND sex='$mfsql' AND image != 'prof051487.jpg' AND id<'$uid' ORDER BY id DESC LIMIT 1"; 
		$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
	$who = $found['0'];
}



}else	{
	
		

$country = $_SESSION['country'];		
	$repeaterlookup = "SELECT * FROM users WHERE country='$country' AND orientation='gay' AND image != 'prof051487.jpg' AND id<'$uid' ORDER BY id DESC LIMIT 1"; 
		$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
	$who = $found['0'];
}}}else{

if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}	


$country = $_SESSION['country'];		
	$repeaterlookup = "SELECT * FROM users WHERE country='$country' AND orientation='gay' AND sex='$mfsql' AND id<'$uid' ORDER BY id DESC LIMIT 1"; 
		$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
	$who = $found['0'];
}



}else{

	
//PFORUM	
		

$country = $_SESSION['country'];		
	$repeaterlookup = "SELECT * FROM users WHERE country='$country' AND id<'$uid' AND orientation='gay' ORDER BY id DESC LIMIT 1"; 
		$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
	$who = $found['0'];
}}}}else{
	
	

// ORISEARCH DIVIDE



// PFORUM
if(isset($_GET['i'])){
	
//MF	
if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}	


$country = $_SESSION['country'];		
	$repeaterlookup = "SELECT * FROM users WHERE country='$country' AND sex='$mfsql' AND image != 'prof051487.jpg' AND id<'$uid' ORDER BY id DESC LIMIT 1"; 
		$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
	$who = $found['0'];
}



}else	{
	
		

$country = $_SESSION['country'];		
	$repeaterlookup = "SELECT * FROM users WHERE country='$country' AND image != 'prof051487.jpg' AND id<'$uid' ORDER BY id DESC LIMIT 1"; 
		$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
	$who = $found['0'];
}}}else{

if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}	


$country = $_SESSION['country'];		
	$repeaterlookup = "SELECT * FROM users WHERE country='$country' AND sex='$mfsql' AND id<'$uid' ORDER BY id DESC LIMIT 1"; 
		$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
	$who = $found['0'];
}



}else{

	
//PFORUM	
		

$country = $_SESSION['country'];		
	$repeaterlookup = "SELECT * FROM users WHERE country='$country' AND id<'$uid' ORDER BY id DESC LIMIT 1"; 
		$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
	$who = $found['0'];
}}}	
	
	
}}



	$call = "SELECT * FROM users WHERE id='$who'";
	$infoload = mysqli_query($mysqli,$call);
	
if ($infoload->num_rows == 0){
	mysqli_query($mysqli,"Delete from users where id IN (SELECT * FROM (SELECT id FROM `users` t1 LEFT JOIN users t2 ON t1.id=t2.id WHERE t2.id is null) as t)");
	$error = True;
}	
	
	$row = mysqli_fetch_array($infoload);
		$profile = $row['1'];
		$email = $row['2'];
		$contact = $row['3'];
		$city = $row['4'];
		$image = $row['5'];
		$qmr = $row['6'];
	
	$availability = $row['7'];
	if ($row['8'] == 0){$btc=NULL;}else{$btc=$row['8'];}
if($_SESSION['paid'] == 1){}
elseif($_SESSION['myr'] != $_SESSION['region']){$availability = 'choice';}
if($_SESSION['region'] == Null && ($_SESSION['myr'] == $regioncode)){
	$availability = $row['7'];}		
		$regioncode = $row['9'];
		$ori = $row['11'];
		$sex = $row['12'];
		$g = $row['13'];
		$y = $row['14'];
		$r = $row['15'];
		$country = $row['16'];
		if($_SESSION['ori']=="gay"){
			$hide = 0;
		}else{
			$hide = $row['18'];
		}
		$popularity = $row['20'];
		$popularity += 1;
			$pop = "UPDATE users SET popularity='$popularity' WHERE id='$who'";
			mysqli_query($mysqli,$pop);	
		$share = $row['21'];
		$lon = $row['24'];
		$lat = $row['25'];

include 'rate.php';		
		

// REGION RESET

if($id == 1){
	if(isset($_GET['re'])){
		$r = $_GET['region'];
		$setmyregion = "UPDATE users SET region='$r' WHERE id='$who'";
		mysqli_query($mysqli, $setmyregion);		
}


// MF RESET
if(isset($_GET['mf'])){
		$mf = $_GET['mfchange'];
		$setmf = "UPDATE users SET sex='$mf' WHERE id='$who'";
		mysqli_query($mysqli, $setmf);		
	}
}		
		
		

	// + IMAGE
	
if(isset($_GET['p'])){
	
if(isset($_GET['r'])){
$call = "SELECT * FROM users WHERE id='$who'";
$infoload = mysqli_query($mysqli,$call);
$row = mysqli_fetch_row($infoload);
$uid = $row['0'];	
}
if(isset($_GET['l'])){
$call = "SELECT * FROM users WHERE id='$who'";
$infoload = mysqli_query($mysqli,$call);
$row = mysqli_fetch_row($infoload);
$uid = $row['0'];	
}
echo "<div><div id='topheader'><table><tr><td><a href='viewc_profile.php?uid=".$uid."&l=1&i=1' id='left'><img src='img/left.png' width='30px'></a></td><td><a href='pcforum_everyone.php?return=".$uid."' id='return'><img src='img/central.png' width='30px'></a></td><td><a href='viewc_profile.php?uid=".$uid."&r=1&i=1' id='right'><img src='img/right.png' width='30px'></a></td></tr></table></div><br>";
}elseif(isset($_GET['i'])){
	
if(isset($_GET['r'])){
$call = "SELECT * FROM users WHERE id='$who'";
$infoload = mysqli_query($mysqli,$call);
$row = mysqli_fetch_row($infoload);
$uid = $row['0'];	
}
if(isset($_GET['l'])){
$call = "SELECT * FROM users WHERE id='$who'";
$infoload = mysqli_query($mysqli,$call);
$row = mysqli_fetch_row($infoload);
$uid = $row['0'];	
}
echo "<div><div id='topheader'><table><tr><td><a href='viewc_profile.php?uid=".$uid."&l=1&i=1' id='left'><img src='img/left.png' width='30px'></a></td><td><a href='pcforum_everyone.php?return=".$uid."' id='return'><img src='img/central.png' width='30px'></a></td><td><a href='viewc_profile.php?uid=".$uid."&r=1&i=1' id='right'><img src='img/right.png' width='30px'></a></td></tr></table></div><br>";
}else{
if(isset($_GET['r'])){
$call = "SELECT * FROM users WHERE id='$who'";
$infoload = mysqli_query($mysqli,$call);
$row = mysqli_fetch_row($infoload);
$uid = $row['0'];	
}
if(isset($_GET['l'])){
$call = "SELECT * FROM users WHERE id='$who'";
$infoload = mysqli_query($mysqli,$call);
$row = mysqli_fetch_row($infoload);
$uid = $row['0'];	
}
echo "<div><div id='topheader'><table><tr><td><a href='viewc_profile.php?uid=".$uid."&l=1' id='left'><img src='img/left.png' width='30px'></a></td><td><a href='cforum.php?return=".$uid."' id='return'><img src='img/central.png' width='30px'></a></td><td><a href='viewc_profile.php?uid=".$uid."&r=1' id='right'><img src='img/right.png' width='30px'></a></td></tr></table></div><br>";
}




include 'quote.php';


	
	
	if($availability != 'anyone'){
		
if($g >= 25){
	echo "<img src='img/g.png' width='20px'>&nbsp;&nbsp;";	
}else{}		
	
	echo "<a href='cforum.php?add=".$uid."'>";
	
	echo "<a href='forum.php?city=".$city."'><header><span style='font-size:225%'><strong>".$city;
if(isset($country)) {	
	echo "<br><span style='text-transform:uppercase'>".$country."</span></strong></span></header></a><br>";
}else if(isset($theregion)) {	
	echo "<br>".$theregion."</strong></span></header></a><br>";
} else {
	echo "</strong></span></header></a><br>";
}

echo "<article>TOUCH TO SEND CONTACT INFO</article><a href='cforum.php?add=".$uid."'>";

if($image == 'prof051487.jpg'){
			if($sex == 'M'){
	echo "<img width='300px' border='2px' src='img/m.jpg'><br><br>";
			}
			if($sex == 'F'){
	echo "<img width='300px' border='2px' src='img/f.jpg'><br><br>";
			}}
			
if($image != 'prof051487.jpg'){
	echo "<img width='300px' border='2px' src='profileimg/".$image."'></strong><br><br>";
}
echo "</a>";			
	
	if($ori == 'gay' && $hide != 1){
		echo "<img src='img/lgbt.png' width='40px'><br>";
	}

	echo "<article><span style='font-size:14px'>".$qmr."</span></article><br>";
	echo "</a>";
	
	
/*
$counter = 0;
$mrcall = "SELECT * FROM messages WHERE myrelationship='$who' ORDER BY timestamp DESC";
	$mrload = mysqli_query($mysqli,$mrcall);
		while ($mr = mysqli_fetch_row($mrload)) {
			if ($counter == 10){break;} else {
			$quote = $mr['2'];
				$date = $mr['4'];
				$sender = $mr['3'];
if($who == $id){
		echo "<div class='qmr'><a href='viewc_profile.php?uid=".$sender."&qmrid'><article><span style='font-size:20px'>".$quote."</span></article></a></div>";
}else{
		echo "<div class='qmr'><article><span style='font-size:20px'>".$quote."</span></article></div>";
}

					$counter++;}
								}

							mysqli_free_result($mr);
*/							

//EXTRAS

	$sori = $_SESSION['ori'];
	$ssex = $_SESSION['mf'];
	
if($_SESSION['f'] == NULL & $_SESSION['f'] == NULL){	
	
if($_SESSION['country'] == $country){
$extras = "SELECT * FROM users WHERE phone != '$contact' AND city = '$city' AND availability != 'choice' AND country = '$country' ORDER BY id DESC LIMIT 10";
}else{
$extras = "SELECT * FROM users WHERE phone != '$contact' AND city = '$city' AND availability != 'choice' AND country = '$country' AND localintl != 1 ORDER BY id DESC LIMIT 10";
}
}else{
if($_SESSION['country'] == $country){
if($sori == "str"){ 
$extras = "SELECT * FROM users WHERE phone != '$contact' AND city = '$city' AND availability != 'choice' AND orientation = '$sori' AND sex != '$ssex' AND country = '$country' ORDER BY id DESC LIMIT 10";
}
if($sori == "gay"){ 
$extras = "SELECT * FROM users WHERE phone != '$contact' AND city = '$city' AND availability != 'choice' AND orientation = '$sori' AND sex = '$ssex' AND country = '$country' ORDER BY id DESC LIMIT 10";
}
}else{
if($sori == "str"){ 
$extras = "SELECT * FROM users WHERE phone != '$contact' AND city = '$city' AND availability != 'choice' AND orientation = '$sori' AND sex != '$ssex' AND country = '$country' AND localintl != 1 ORDER BY id DESC LIMIT 10";
}
if($sori == "gay"){ 
$extras = "SELECT * FROM users WHERE phone != '$contact' AND city = '$city' AND availability != 'choice' AND orientation = '$sori' AND sex = '$ssex' AND country = '$country' AND localintl != 1 ORDER BY id DESC LIMIT 10";
}
}
}
if ($crowd = mysqli_query($mysqli, $extras)){

$extracount = 0;
if(isset($_GET['me'])){}else{
if ($crowd->num_rows > 0){
echo "<h2>More numbers in ".$city.", ".$country;
}else{
	if(isset($_GET['more'])){
	echo "<div id='cell'><a href='cforum.php?return=".$uid."'><h1>Sorry, no more People. Click to Return</h1></a></div>";
}}

		while($contents = mysqli_fetch_row($crowd)){

echo "<div id='cell'><a href='viewc_profile.php?extra=".$contents['0']."'>".$contents['3']."</a></div>";
		$extracount++;
}}
echo "</h2>";
}
							
							if(isset($_GET['report'])){}else{
							mysqli_close($mysqli);	}
	
//echo "<footer><a href='quotemy_profile.php?uid=".$uid."&e=1&c' id='mssg'><strong>WRITE +</strong></a></footer>";		

	
	
	} else { //availability == anyone
		

echo "<table><tr><td>";		
		
		


if($image == 'prof051487.jpg'){
			if($sex == 'M'){
	echo "<img width='300px' border='2px' src='img/m.jpg'><br><br>";
			}
			if($sex == 'F'){
	echo "<img width='300px' border='2px' src='img/f.jpg'><br><br>";
			}}
			
if($image != 'prof051487.jpg'){
	echo "<img width='300px' border='2px' src='profileimg/".$image."'><br><br>";
}

echo "</td><td>";

	echo "<header><span style='font-size:225%'><strong>".$city;
if(isset($country)) {	
	echo "<br><span style='text-transform:uppercase'>".$country."</span></strong></span></header></a><br>";
}else if(isset($theregion)) {	
	echo "<br>".$theregion."</strong></span></header><br>";
} else {
	echo "</strong></span></header><br>";
}

if($share==1){
echo "<iframe src='https://www.facebook.com/plugins/share_button.php?href=";
echo "http://calltext.me/viewe_profile.php?me=".$who;
echo "&layout=button_count&size=small&width=89&height=20&appId' width='89' height='20' style='border:none;overflow:hidden' scrolling='no' frameborder='0' allowTransparency='true' allow='encrypted-media'></iframe>";
	
}
// DISTANCT

echo $lon;
echo $lat;

if($lon != '' && isset($_SESSION['lon']) && $lat != '' && isset($_SESSION['lat'])){
function haversine($longitudeTo,$longitudeFrom,$latitudeTo,$latitudeFrom,$earthRadius = 6378.137)
{
  // convert from degrees to radians
  $latFrom = deg2rad($latitudeFrom);
  $lonFrom = deg2rad($longitudeFrom);
  $latTo = deg2rad($latitudeTo);
  $lonTo = deg2rad($longitudeTo);

  $latDelta = $latTo - $latFrom;
  $lonDelta = $lonTo - $lonFrom;

  $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
    cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
  return $angle * $earthRadius;
}
$output = haversine($lon,$_SESSION['lon'],$lat,$_SESSION['lat']);
echo round($output)." kilometers";
	
}

echo "<br><br>";

// FREE QR CREATOR
if(isset($country) && isset($_SESSION['country'])){
	$mycountry = $_SESSION['country'];
	include 'international.php';
	if(is_numeric($contact)){
	
if($localintl == '1'){
	$print = False;
						}else{	
if($countrycode == substr($contact,0,strlen($countrycode))){
echo "<a href='http://freeqrcreator.us-west-1.elasticbeanstalk.com/calltextme?number=%2B".str_replace(' ', '',$contact)."&uid=".$who."&page=viewc_profile'>";
echo "<img src='img/freeqrcreator.png' width='65px'></a>";
}	
elseif(substr($contact,0,1) == $trunk){
echo "<a href='http://freeqrcreator.us-west-1.elasticbeanstalk.com/calltextme?number=%2B".$countrycode.str_replace(' ', '',substr($contact,1))."&uid=".$who."&page=viewc_profile'>";
echo "<img src='img/freeqrcreator.png' width='65px'></a>";	
}else if (substr($contact,0,1) == '+'){
echo "<a href='http://freeqrcreator.us-west-1.elasticbeanstalk.com/calltextme?number=%2B".str_replace(' ', '',substr($contact,1))."&uid=".$who."&page=viewc_profile'>";
echo "<img src='img/freeqrcreator.png' width='65px'></a>";	
}else{
echo "<a href='http://freeqrcreator.us-west-1.elasticbeanstalk.com/calltextme?number=%2B".$countrycode.str_replace(' ', '',$contact)."&uid=".$who."&page=viewc_profile'>";
echo "<img src='img/freeqrcreator.png' width='65px'></a>";		
}
	}}}
	
echo "<br><br>";	

	if($ori == 'gay' && $hide != 1){
		echo "<img src='img/lgbt.png' width='40px'><br>";
	}
	
	
if(isset($country) && isset($_SESSION['country'])){
	$mycountry = $_SESSION['country'];
include 'international.php';
	if(is_numeric($contact)){
	if(strtoupper($_SESSION['country']) == strtoupper($country)){}else{
	echo "<article><span style='font-size:20px'><strong>Int'l: ".$exitcode." ".$countrycode." ".$trunkprefix." ".$contact."</strong></span></article></strong><br>";
}}}	
if(strtoupper($_SESSION['country']) == strtoupper($country)){
echo "<article><span style='font-size:20px'><strong>".$contact."</strong></span></article></strong><br>";	
}else{
echo "<article><span style='font-size:20px'><strong>local: ".$contact."</strong></span></article></strong><br>";	
}
	echo "<article><span style='font-size:14px'><strong>".$qmr."</strong></span></article></strong><br>";
	

//GYR

if($availability == 'anyone'){
if($voted != 1){
	
	if($g >= 25){
	echo "<br><img src='img/g.png' width='20px'>&nbsp;&nbsp;";		
	}else{	
	echo "<br><a href='viewc_profile.php?uid=".$uid."&rate=green'><img src='img/g.png' width='20px'></a>&nbsp;&nbsp;";
	}
	if($g < 25){
	echo "<a href='viewc_profile.php?uid=".$uid."&rate=yellow'><img src='img/y.png' width='20px'></a>&nbsp;&nbsp;";
	echo "<a href='viewc_profile.php?uid=".$uid."&rate=red'><img src='img/r.png' width='20px'></a>&nbsp;&nbsp;<br>";
}}else{
	
	switch ($v) {
		case 'g':
			echo "<br><img src='img/g.png' width='20px'></a>&nbsp;&nbsp;<br>";
			break;
		case 'y':
			echo "<br><img src='img/y.png' width='20px'></a>&nbsp;&nbsp;<br>";
			break;
		case 'r':
			echo "<br><img src='img/r.png' width='20px'></a>&nbsp;&nbsp;<br>";
			break;
}}}
//GYR	

echo "</td><td>";

//DONATE
if(is_null($btc)){
echo "<span style='color:#ff69b4'><strong>DONATE HERE</strong></span><br><img width='200px' src='img/BC.png'><br><img width='250px'  src='img/recieve.png'><br><span style='color:#ff69b4;font-size: 10pt'>3JVj1pV8E3SuaNPmnz15FLNBdFU5rDkGSM<br>calltextme.crypto</span>";
}else{
echo "<span style='color:#ff69b4'><strong>DONATE TO ME</strong></span><br><img width='250px' src='img/BC.png'><br><span style='color:#ff69b4;font-size: 10pt'>".$btc."</span>";	
}
echo "</td></tr></table>";

//EXTRAS

if(isset($_GET['cell'])){

	$sori = $_SESSION['ori'];
	$ssex = $_SESSION['mf'];
	
if($_SESSION['f'] == NULL & $_SESSION['f'] == NULL){	
	
if($_SESSION['country'] == $country){
$extras = "SELECT * FROM users WHERE phone != '$contact' AND city = '$city' AND availability != 'choice' AND country = '$country' ORDER BY id DESC LIMIT 10";
}else{
$extras = "SELECT * FROM users WHERE phone != '$contact' AND city = '$city' AND availability != 'choice' AND country = '$country' AND localintl != 1 ORDER BY id DESC LIMIT 10";
}
}else{
if($_SESSION['country'] == $country){
if($sori == "str"){ 
$extras = "SELECT * FROM users WHERE phone != '$contact' AND city = '$city' AND availability != 'choice' AND orientation = '$sori' AND sex != '$ssex' AND country = '$country' ORDER BY id DESC LIMIT 10";
}
if($sori == "gay"){ 
$extras = "SELECT * FROM users WHERE phone != '$contact' AND city = '$city' AND availability != 'choice' AND orientation = '$sori' AND sex = '$ssex' AND country = '$country' ORDER BY id DESC LIMIT 10";
}
}else{
if($sori == "str"){ 
$extras = "SELECT * FROM users WHERE phone != '$contact' AND city = '$city' AND availability != 'choice' AND orientation = '$sori' AND sex != '$ssex' AND country = '$country' AND localintl != 1 ORDER BY id DESC LIMIT 10";
}
if($sori == "gay"){ 
$extras = "SELECT * FROM users WHERE phone != '$contact' AND city = '$city' AND availability != 'choice' AND orientation = '$sori' AND sex = '$ssex' AND country = '$country' AND localintl != 1 ORDER BY id DESC LIMIT 10";
}
}
}
if ($crowd = mysqli_query($mysqli, $extras)){

$extracount = 0;
if(isset($_GET['me'])){}else{
if ($crowd->num_rows > 0){
echo "<h2>More numbers in ".$city.", ".$country;
}else{
	if(isset($_GET['more'])){
	echo "<div id='cell'><a href='cforum.php?return=".$uid."'><h1>Sorry, no more People. Click to Return</h1></a></div>";
}}

		while($contents = mysqli_fetch_row($crowd)){

echo "<div id='cell'><a href='viewc_profile.php?extra=".$contents['0']."'>".$contents['3']."</a></div>";
		$extracount++;
}}
echo "</h2>";
}

}else{
	echo "<br><br>";
if(isset($_GET['me'])){}else{	
echo "<a href='viewc_profile.php?uid=".$who."&more&cell#cell'><article>More numbers from ".$city."</article></a>";		
}	
}

/*
$counter = 0;
$mrcall = "SELECT * FROM messages WHERE myrelationship='$who' ORDER BY timestamp DESC";
	$mrload = mysqli_query($mysqli,$mrcall);
		while ($mr = mysqli_fetch_row($mrload)) {
			if ($counter == 10){break;} else {
			$quote = $mr['2'];
				$date = $mr['4'];
				$sender = $mr['3'];
if($who == $id){
		echo "<div class='qmr'><a href='viewc_profile.php?uid=".$sender."&qmrid'><article><span style='font-size:20px'>".$quote."</span></article></a></div>";
}else{
		echo "<div class='qmr'><article><span style='font-size:20px'>".$quote."</span></article></div>";
}

					$counter++;}
								}
							mysqli_free_result($mr);*/
							
							
							if(isset($_GET['report'])){}else{
							mysqli_close($mysqli);	}
	
//echo "<footer><a href='quotemy_profile.php?uid=".$uid."&e=1&c' id='mssg'><strong>QUOTE MY RELATIONSHIP +</strong></a></footer>";	




	}

	
//	echo "<a href='forum_everyone.php?return=".$uid."' id='link'><footer><img src='img/central.png' width='30px'></footer></a></div>";	



if($availability == 'anyone' && strtoupper($_SESSION['country']) != strtoupper($country)){
echo "<br><a href='https://www.howtocallabroad.com/codes.html' target='_blank'><span style='color:blue'><u>How to Call Internationally<br><ul><li>1. Your Country's Exit Code</li><li>2. Their Country Code</li><li>3. Remove Trunk Prefix</li><li>4. Dial Number</li></ul></u></span></a><br>";
}

//REPORT NUDITY
if($image != 'prof051487.jpg'){
	if(isset($_GET['report'])){
	$report = "UPDATE users SET nudity='1' WHERE id='$who'";
	mysqli_query($mysqli,$report);
	if(isset($_GET['re'])){}else{
mysqli_close($mysqli);		
	}	
	} else {
	echo "<br><a href='viewc_profile.php?uid=".$uid."&report=1'><span style='color:black'>REPORT IMAGE</span></a><br>";
}}

	
	


// REGION RESET

if($id == 1){
	if(isset($_GET['re'])){
		$r = $_GET['region'];
		$setmyregion = "UPDATE users SET region='$r' WHERE id='$who'";
		mysqli_query($mysqli, $setmyregion);		
}


// MF RESET
if(isset($_GET['mf'])){
		$mf = $_GET['mfchange'];
		$setmf = "UPDATE users SET sex='$mf' WHERE id='$who'";
		mysqli_query($mysqli, $setmf);		
	}
}
// COUNTRY RESET
if(isset($_GET['countryinput'])){
		$newcountry = $_GET['country'];
		$setmycountry = "UPDATE users SET country='$newcountry' WHERE id='$who'";
		mysqli_query($mysqli, $setmycountry);		
	}

if($id == 1){
	if($who != 1){
		echo "<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>";
		echo "<table><tr><td>";	
		echo "<a href='delete.php?delete=".$who."' id='mylink'><h3>DELETE</h3></a></td><td>";
		echo "<a href='viewc_profile.php?image=".$who."' id='mylink'><h3>NUDITY</h3></a></td><td>";
		echo "<a href='profile.php?login=".$email."' id='mylink'><h3>".$email."</h3></a></td></tr></table>";
		echo "<br><h1>".$contact."</h1>";
		$url1 = "https://pro.ip-api.com/json/";
		$url2="?key=YzwVIWdSwM0qpXy";
		$url = $url1.$ip.$url2;		
		echo "<a href='".$url."' target='blank'>".$ip."</a><br>";
	}
	
if($sex == 'M'){
	echo "<form action='viewc_profile.php' method='GET'><input type='hidden' name='uid' value='$who'><input type='radio' name='mfchange' value='M' checked>MALE<input type='radio' name='mfchange' value='F'>FEMALE<input type='submit' name='mf' value='CHANGE'></form>";				 
}		

if($sex == 'F'){
	echo "<form action='viewc_profile.php' method='GET'><input type='hidden' name='uid' value='$who'><input type='radio' name='mfchange' value='M'>MALE<input type='radio' name='mfchange' value='F' checked>FEMALE<input type='submit' name='mf' value='CHANGE'></form>";				 
}
	
if($regioncode == 'AF'){echo "<form action='viewc_profile.php' method='GET'><input type='hidden' name='uid' value='$who'><input type='radio' name='region' value='AF' checked>AFRICA<input type='radio' name='region' value='AS'>ASIA<input type='radio' name='region' value='EU'>EUROPE<input type='radio' name='region' value='ME'>MIDDLE EAST<input type='radio' name='region' value='NA'>NORTH AMERICA<input type='radio' name='region' value='SA'>SOUTH AMERICA<input type='radio' name='region' value='OC'>OCEANIA<input type='submit' name='re' value='SET'></form>";}
elseif($regioncode == 'AS'){echo "<form action='viewc_profile.php' method='GET'><input type='hidden' name='uid' value='$who'><input type='radio' name='region' value='AF'>AFRICA<input type='radio' name='region' value='AS' checked>ASIA<input type='radio' name='region' value='EU'>EUROPE<input type='radio' name='region' value='ME'>MIDDLE EAST<input type='radio' name='region' value='NA'>NORTH AMERICA<input type='radio' name='region' value='SA'>SOUTH AMERICA<input type='radio' name='region' value='OC'>OCEANIA<input type='submit' name='re' value='SET'></form>";}
elseif($regioncode == 'EU'){echo "<form action='viewc_profile.php' method='GET'><input type='hidden' name='uid' value='$who'><input type='radio' name='region' value='AF'>AFRICA<input type='radio' name='region' value='AS'>ASIA<input type='radio' name='region' value='EU' checked>EUROPE<input type='radio' name='region' value='ME'>MIDDLE EAST<input type='radio' name='region' value='NA'>NORTH AMERICA<input type='radio' name='region' value='SA'>SOUTH AMERICA<input type='radio' name='region' value='OC'>OCEANIA<input type='submit' name='re' value='SET'></form>";}
elseif($regioncode == 'ME'){echo "<form action='viewc_profile.php' method='GET'><input type='hidden' name='uid' value='$who'><input type='radio' name='region' value='AF'>AFRICA<input type='radio' name='region' value='AS'>ASIA<input type='radio' name='region' value='EU'>EUROPE<input type='radio' name='region' value='ME' checked>MIDDLE EAST<input type='radio' name='region' value='NA'>NORTH AMERICA<input type='radio' name='region' value='SA'>SOUTH AMERICA<input type='radio' name='region' value='OC'>OCEANIA<input type='submit' name='re' value='SET'></form>";}
elseif($regioncode == 'NA'){echo "<form action='viewc_profile.php' method='GET'><input type='hidden' name='uid' value='$who'><input type='radio' name='region' value='AF'>AFRICA<input type='radio' name='region' value='AS'>ASIA<input type='radio' name='region' value='EU'>EUROPE<input type='radio' name='region' value='ME'>MIDDLE EAST<input type='radio' name='region' value='NA' checked>NORTH AMERICA<input type='radio' name='region' value='SA'>SOUTH AMERICA<input type='radio' name='region' value='OC'>OCEANIA<input type='submit' name='re' value='SET'></form>";}
elseif($regioncode == 'SA'){echo "<form action='viewc_profile.php' method='GET'><input type='hidden' name='uid' value='$who'><input type='radio' name='region' value='AF'>AFRICA<input type='radio' name='region' value='AS'>ASIA<input type='radio' name='region' value='EU'>EUROPE<input type='radio' name='region' value='ME'>MIDDLE EAST<input type='radio' name='region' value='NA'>NORTH AMERICA<input type='radio' name='region' value='SA' checked>SOUTH AMERICA<input type='radio' name='region' value='OC'>OCEANIA<input type='submit' name='re' value='SET'></form>";}
elseif($regioncode == 'OC'){echo "<form action='viewc_profile.php' method='GET'><input type='hidden' name='uid' value='$who'><input type='radio' name='region' value='AF'>AFRICA<input type='radio' name='region' value='AS'>ASIA<input type='radio' name='region' value='EU'>EUROPE<input type='radio' name='region' value='ME'>MIDDLE EAST<input type='radio' name='region' value='NA'>NORTH AMERICA<input type='radio' name='region' value='SA'>SOUTH AMERICA<input type='radio' name='region' value='OC' checked>OCEANIA<input type='submit' name='re' value='SET'></form>";}
else{echo "<form action='viewc_profile.php' method='GET'><input type='hidden' name='uid' value='$who'><input type='radio' name='region' value='AF'>AFRICA<input type='radio' name='region' value='AS'>ASIA<input type='radio' name='region' value='EU'>EUROPE<input type='radio' name='region' value='ME'>MIDDLE EAST<input type='radio' name='region' value='NA'>NORTH AMERICA<input type='radio' name='region' value='SA'>SOUTH AMERICA<input type='radio' name='region' value='OC'>OCEANIA<input type='submit' name='re' value='SET'></form>";}

echo "<form action='viewc_profile.php' method='GET'><input type='hidden' name='uid' value='$who'><input type='text' name='country' placeholder='".$country."'><br><input type='submit' name='countryinput' value='Country'></form>";


	}	}

?>
	

</div></body>
</html>