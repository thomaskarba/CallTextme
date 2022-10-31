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
	<title>CallText.me</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta property="og:title" content="I wanted to Share this Contact.">
<meta property="og:image" content="img/ro.png">	
</head>
<style>
@import url('https://fonts.googleapis.com/css?family=Roboto+Mono:500');
body{font-family:'Roboto Mono',monospace;color:black;background-image:url("img/mpbg.jpg");}
div{text-align:center;}
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
ul{margin:0;padding:0;overflow:hidden;list-style-type:none;}

#left{display:block;padding:20px;}
#left:link,a:visited{background:#ffffc6 linear-gradient(to right,#ffffff,#ffffc6,#ffffc6,#ffffc6);}
#left:hover{background:#eb1e66 linear-gradient(to right,#ffffff,#ffe2ec,#ffe2ec,#ffe2ec)}	
#left:active{background:#ffffff linear-gradient(to right,#ffffff,#ffffff,#ffffff,#ffffc6);}

#return{display:block;padding:20px;}
#return:link,a:visited{background:#ffffc6 linear-gradient(to right,#ffffc6,#ffffc6,#ffffc6,#ffffc6);}
#return:hover{background:#eb1e66 linear-gradient(to right,#ffffff,#ffe2ec,#ffe2ec,#ffffff)}	
#return:active{background:#ffffff linear-gradient(to right,#ffffc6,#ffffff,#ffffff,#ffffc6);}

#right{display:block;padding:20px;}
#right:link,a:visited{background:#ffffc6 linear-gradient(to right,#ffffc6,#ffffc6,#ffffc6,#ffffff);}
#right:hover{background:#eb1e66 linear-gradient(to right,#ffe2ec,#ffe2ec,#ffe2ec,#ffffff)}	
#right:active{background:#ffffff linear-gradient(to right,#ffffc6,#ffffff,#ffffff,#ffffff);}

#mssg{font-family:'Roboto Mono',monospace;font-size:25px;padding:20px;text-decoration:none;display:block;}
#mssg:link,a:visited{background-color:#f2f2f2;color:black;}
#mssg:hover{background-color:#f2f2f2;}
#mssg:active{background-color:#000000;}

a{text-decoration:none;color:black;}
@import url('https://fonts.googleapis.com/css?family=Roboto+Mono:500');
footer,#topheader{font-family:'Roboto Mono',monospace;font-size:15px;color:#969696;}
article{margin:0;font-family:'Roboto Mono',monospace;width:300px;}<!--QMR-->
div{margin:auto;text-align:center;}
section{font-family:'Roboto Mono',monospace;color:red;}
article{text-transform:uppercase;color:#8a8a8a;}
#qmrs{border:3px solid #c4c4c4;text-transform:uppercase;color:#7a7a7a;}
table{width:100%;margin:0;padding:0;}
#fake{font-family: 'Lexend Tera', sans-serif;color: red;}

hr{border: 2px solid #ded7c5;
  border-radius: 2px;}


</style>
<body>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v5.0"></script>

<?php
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
		$subject = "CallText.me PROFILE IMAGE ALERT";
		$body = "http://CallText.me/quote_disclaimer.html YOUR PROFILE IMAGE WAS CHANGED BECAUSE IT DID NOT SHOW ANYTHING OR SHOWED NUDITY WHICH IS NOT ALLOWED.";	
mail($address,$subject,$body);
echo "SENT";
	}
	?>

<?php 
	if(isset($_GET['uid']) || isset($_GET['extra'])){

if(isset($_GET['uid'])){		
		
	$uid = $_GET['uid'];
	$who = $_GET['uid'];
}
		
if(isset($_GET['extra'])){
$who = $_GET['extra'];
$uid = $_GET['extra'];
		
}	
		
		
		
		
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

if($_SESSION['region'] == Null){
		$repeaterlookup = "SELECT * FROM users WHERE id>'$uid' AND orientation='gay' AND sex='$mfsql' AND image != 'prof051487.jpg' ORDER BY id ASC LIMIT 1"; 
			$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
		$who = $found['1'];		
	}} else {
$region = $_SESSION['region'];		
	$repeaterlookup = "SELECT * FROM users WHERE region='$region' AND orientation='gay' AND sex='$mfsql' AND image != 'prof051487.jpg' AND id>'$uid' ORDER BY id ASC LIMIT 1"; 
		$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
	$who = $found['0'];
}}


}	else {


if($_SESSION['region'] == Null){
		$repeaterlookup = "SELECT * FROM users WHERE id>'$uid' AND orientation='gay' AND image != 'prof051487.jpg' ORDER BY id ASC LIMIT 1"; 
			$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
		$who = $found['0'];		
	}} else {
$region = $_SESSION['region'];		
	$repeaterlookup = "SELECT * FROM users WHERE region='$region' AND orientation='gay' AND image != 'prof051487.jpg' AND id>'$uid' ORDER BY id ASC LIMIT 1"; 
		$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
	$who = $found['0'];
}}
	
}
	
	
		
}else{
// PFORUM	


if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}

if($_SESSION['region'] == Null){
		$repeaterlookup = "SELECT * FROM users WHERE id>'$uid' AND orientation='gay' AND sex='$mfsql' ORDER BY id ASC LIMIT 1"; 
			$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
		$who = $found['0'];		
	}} else {
$region = $_SESSION['region'];		
	$repeaterlookup = "SELECT * FROM users WHERE region='$region' AND orientation='gay' AND sex='$mfsql' AND id>'$uid' ORDER BY id ASC LIMIT 1"; 
		$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
	$who = $found['0'];
	}}

}else{

if($_SESSION['region'] == Null){
		$repeaterlookup = "SELECT * FROM users WHERE id>'$uid' AND orientation='gay' ORDER BY id ASC LIMIT 1"; 
			$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
		$who = $found['0'];		
	}} else {
$region = $_SESSION['region'];		
	$repeaterlookup = "SELECT * FROM users WHERE region='$region' AND id>'$uid' AND orientation='gay' ORDER BY id ASC LIMIT 1"; 
		$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
	$who = $found['0'];
	}}
	
}

		
}}else{
	
	
// ORISEARCH DIVIDE



// PFORUM	
if(isset($_GET['i'])){
	
	
//MF	
if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}

if($_SESSION['region'] == Null){
		$repeaterlookup = "SELECT * FROM users WHERE id>'$uid' AND sex='$mfsql' AND image != 'prof051487.jpg' ORDER BY id ASC LIMIT 1"; 
			$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
		$who = $found['0'];		
	}} else {
$region = $_SESSION['region'];		
	$repeaterlookup = "SELECT * FROM users WHERE region='$region' AND sex='$mfsql' AND image != 'prof051487.jpg' AND id>'$uid' ORDER BY id ASC LIMIT 1"; 
		$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
	$who = $found['0'];
}}


}	else {


if($_SESSION['region'] == Null){
		$repeaterlookup = "SELECT * FROM users WHERE id>'$uid' AND image != 'prof051487.jpg' ORDER BY id ASC LIMIT 1"; 
			$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
		$who = $found['0'];		
	}} else {
$region = $_SESSION['region'];		
	$repeaterlookup = "SELECT * FROM users WHERE region='$region' AND image != 'prof051487.jpg' AND id>'$uid' ORDER BY id ASC LIMIT 1"; 
		$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
	$who = $found['0'];
}}
	
}
	
	
		
}else{
// PFORUM	


if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}

if($_SESSION['region'] == Null){
		$repeaterlookup = "SELECT * FROM users WHERE id>'$uid' AND sex='$mfsql' ORDER BY id ASC LIMIT 1"; 
			$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
		$who = $found['0'];		
	}} else {
$region = $_SESSION['region'];		
	$repeaterlookup = "SELECT * FROM users WHERE region='$region' AND sex='$mfsql' AND id>'$uid' ORDER BY id ASC LIMIT 1"; 
		$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
	$who = $found['0'];
	}}

}else{

if($_SESSION['region'] == Null){
		$repeaterlookup = "SELECT * FROM users WHERE id>'$uid' ORDER BY id ASC LIMIT 1"; 
			$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
		$who = $found['0'];		
	}} else {
$region = $_SESSION['region'];		
	$repeaterlookup = "SELECT * FROM users WHERE region='$region' AND id>'$uid' ORDER BY id ASC LIMIT 1"; 
		$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
	$who = $found['0'];
	}}
	
}

		
}	
	
}}

// RIGHT
if(isset($_GET['r'])){
	
	
if($_SESSION['orisearch'] == 1){	

// PFORUM
if(isset($_GET['i'])){
	
	
if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}

if($_SESSION['region'] == Null){
		$repeaterlookup = "SELECT * FROM users WHERE id<'$uid' AND orientation='gay' AND sex='$mfsql' AND image != 'prof051487.jpg' ORDER BY id DESC LIMIT 1"; 
			$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
		$who = $found['0'];		
	}} else {
$region = $_SESSION['region'];		
	$repeaterlookup = "SELECT * FROM users WHERE region='$region' AND orientation='gay' AND sex='$mfsql' AND image != 'prof051487.jpg' AND id<'$uid' ORDER BY id DESC LIMIT 1"; 
		$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
	$who = $found['0'];
}}

}else{
	
if($_SESSION['region'] == Null){
		$repeaterlookup = "SELECT * FROM users WHERE id<'$uid' AND orientation='gay' AND image != 'prof051487.jpg' ORDER BY id DESC LIMIT 1"; 
			$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
		$who = $found['0'];		
	}} else {
$region = $_SESSION['region'];		
	$repeaterlookup = "SELECT * FROM users WHERE region='$region' AND orientation='gay' AND image != 'prof051487.jpg' AND id<'$uid' ORDER BY id DESC LIMIT 1"; 
		$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
	$who = $found['0'];
}}	
	
}	
	
	
		
}else{	
//PFORUM	


if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}

if($_SESSION['region'] == Null){
		$repeaterlookup = "SELECT * FROM users WHERE id<'$uid' AND orientation='gay' AND sex='$mfsql' ORDER BY id DESC LIMIT 1"; 
			$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
		$who = $found['0'];		
	}} else {
$region = $_SESSION['region'];		
	$repeaterlookup = "SELECT * FROM users WHERE region='$region' AND orientation='gay' AND sex='$mfsql' AND id<'$uid' ORDER BY id DESC LIMIT 1"; 
		$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
	$who = $found['0'];
}}

}else{
	
if($_SESSION['region'] == Null){
		$repeaterlookup = "SELECT * FROM users WHERE id<'$uid' AND orientation='gay' ORDER BY id DESC LIMIT 1"; 
			$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
		$who = $found['0'];		
	}} else {
$region = $_SESSION['region'];		
	$repeaterlookup = "SELECT * FROM users WHERE region='$region' AND id<'$uid' AND orientation='gay' ORDER BY id DESC LIMIT 1"; 
		$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
	$who = $found['0'];
}}	
	
}

		
}}else{
	
// ORISEARCH DIVIDE	
	
	
// PFORUM
if(isset($_GET['i'])){
	
	
if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}

if($_SESSION['region'] == Null){
		$repeaterlookup = "SELECT * FROM users WHERE id<'$uid' AND sex='$mfsql' AND image != 'prof051487.jpg' ORDER BY id DESC LIMIT 1"; 
			$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
		$who = $found['0'];		
	}} else {
$region = $_SESSION['region'];		
	$repeaterlookup = "SELECT * FROM users WHERE region='$region' AND sex='$mfsql' AND image != 'prof051487.jpg' AND id<'$uid' ORDER BY id DESC LIMIT 1"; 
		$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
	$who = $found['0'];
}}

}else{
	
if($_SESSION['region'] == Null){
		$repeaterlookup = "SELECT * FROM users WHERE id<'$uid' AND image != 'prof051487.jpg' ORDER BY id DESC LIMIT 1"; 
			$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
		$who = $found['0'];		
	}} else {
$region = $_SESSION['region'];		
	$repeaterlookup = "SELECT * FROM users WHERE region='$region' AND image != 'prof051487.jpg' AND id<'$uid' ORDER BY id DESC LIMIT 1"; 
		$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
	$who = $found['0'];
}}	
	
}	
	
	
		
}else{	
//PFORUM	


if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}

if($_SESSION['region'] == Null){
		$repeaterlookup = "SELECT * FROM users WHERE id<'$uid' AND sex='$mfsql' ORDER BY id DESC LIMIT 1"; 
			$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
		$who = $found['0'];		
	}} else {
$region = $_SESSION['region'];		
	$repeaterlookup = "SELECT * FROM users WHERE region='$region' AND sex='$mfsql' AND id<'$uid' ORDER BY id DESC LIMIT 1"; 
		$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
	$who = $found['0'];
}}

}else{
	
if($_SESSION['region'] == Null){
		$repeaterlookup = "SELECT * FROM users WHERE id<'$uid' ORDER BY id DESC LIMIT 1"; 
			$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
		$who = $found['0'];		
	}} else {
$region = $_SESSION['region'];		
	$repeaterlookup = "SELECT * FROM users WHERE region='$region' AND id<'$uid' ORDER BY id DESC LIMIT 1"; 
		$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
	$who = $found['0'];
}}	
	
}

		
}	
}}	
		
		

	$call = "SELECT * FROM users WHERE id='$who'";
	$infoload = mysqli_query($mysqli,$call);
		
	
	$row = mysqli_fetch_array($infoload);
		$profile = $row['1'];
		$email = $row['2'];
		$contact = $row['3'];
		$city = $row['4'];
		$image = $row['5'];
		$qmr = $row['6'];
		$availability = $row['7'];
		$bitcoin = $row['8'];
//if($_SESSION['paid'] == 1){}
//elseif($_SESSION['myr'] != $_SESSION['region']){$availability = 'choice';}
if($_SESSION['region'] == Null && ($_SESSION['myr'] == $regioncode)){
	$availability = $row['7'];}		
if($_SESSION['region'] == Null) {		
		$regioncode = $row['9'];
if($regioncode == 'AF'){$theregion = 'Africa';}
if($regioncode == 'AS'){$theregion = 'Asia';}
if($regioncode == 'EU'){$theregion = 'Europe';}
if($regioncode == 'ME'){$theregion = 'Middle East';}
if($regioncode == 'NA'){$theregion = 'North America';}
if($regioncode == 'OC'){$theregion = 'Oceania';}
if($regioncode == 'SA'){$theregion = 'South America';}
if($regioncode == '0'){$theregion = Null;} }		
		$ori = $row['11'];
		$sex = $row['12'];
		$g = $row['13'];
		$y = $row['14'];
		$r = $row['15'];
		$country = $row['16'];
		$fake = $row['17'];
		if($_SESSION['ori']=="gay"){
			$hide = 0;
		}else{
			$hide = $row['18'];
		}
		$localintl = $row['19'];
		$popularity = $row['20'];
		$popularity += 1;
			$pop = "UPDATE users SET popularity='$popularity' WHERE id='$who'";
			mysqli_query($mysqli,$pop);	
		$share = $row['21'];
		if($_SESSION['id']==1){$ip = $row['ip'];}
		$lon = $row['24'];
		$lat = $row['25'];
		
		
if($fake == 0){
	if(isset($_GET['fake'])){
	$fakesql = "UPDATE users SET fake='1' WHERE id='$who'";
	mysqli_query($mysqli,$fakesql);
	$fake =1;
	}}elseif($fake == 1){
	if(isset($_GET['real'])){
	$fakesql = "UPDATE users SET fake='2' WHERE id='$who'";
	mysqli_query($mysqli,$fakesql);
	$fake = 2;
}}else{
	if(isset($_GET['fake'])){
	$fakesql = "UPDATE users SET fake='1' WHERE id='$who'";
	mysqli_query($mysqli,$fakesql);
	$fake = 1;
}}




include 'rate.php';		

include 'quote.php';

/*if(isset($_GET['qmr'])){
	echo "<form action='mviewe_profile.php?uid=".$uid."' method='POST'><textarea name='message' rows='2' cols='45'></textarea><br><input type='submit' name='qmr' value='SEND'></form>";
}*/

/*
if(isset($_GET['p'])){
echo "<div><div =id='topheader'><strong><a href='mpforum_everyone.php?return=".$uid."' id='link'><img src='img/centrals.png' width='50px'></a></div><br>";
}else{
	echo "<div><div =id='topheader'><strong><a href='mforum_everyone.php?return=".$uid."' id='link'><img src='img/centrals.png' width='50px'></a></div><br>";
	}
*/
	

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
echo "<div><div id='topheader'><table><tr><td><a href='mviewe_profile.php?uid=".$uid."&l=1&i=1#a' id='left'><img src='img/left.png' width='30px'></a></td><td><a href='mpforum_everyone.php?return=".$uid."#forum' id='return'><img src='img/central.png' width='30px'></a></td><td><a href='mviewe_profile.php?uid=".$uid."&r=1&i=1#a' id='right'><img src='img/right.png' width='30px'></a></td></tr></table></div><br>";
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
echo "<div><div id='topheader'><table><tr><td><a href='mviewe_profile.php?uid=".$uid."&l=1&i=1#a' id='left'><img src='img/left.png' width='30px'></a></td><td><a href='mpforum_everyone.php?return=".$uid."#forum' id='return'><img src='img/central.png' width='30px'></a></td><td><a href='mviewe_profile.php?uid=".$uid."&r=1&i=1#a' id='right'><img src='img/right.png' width='30px'></a></td></tr></table></div><br>";
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
echo "<div><div id='topheader'><table><tr><td><a href='mviewe_profile.php?uid=".$uid."&l=1#a' id='left'><img src='img/left.png' width='30px'></a></td><td><a href='mforum_everyone.php?return=".$uid."#forum' id='return'><img src='img/central.png' width='30px'></a></td><td><a href='mviewe_profile.php?uid=".$uid."&r=1#a' id='right'><img src='img/right.png' width='30px'></a></td></tr></table></div><br>";
}
	

if($availability != 'anyone'){

if($g >= 25){
	echo "<img src='img/g.png' width='20px'>&nbsp;&nbsp;";	
}else{}
	
	
	echo "<p>&nbsp;</p><a href='mforum.php?city=".$city."'><header id='a'><span style='font-size:225%'>".$city;
if(isset($country)) {	
	echo "<br><span style='text-transform:uppercase'>".$country."</span></strong></span></header></a><br>";
}else if(isset($theregion)) {	
		echo "<br>".$theregion."</span></header></a><br>";
	} else {
		echo "</span></header></a><br>";
	}	
	echo "<a href='mforum_everyone.php?add=".$uid."'><article>TOUCH TO SEND CONTACT INFO</article>";
	
if($image == 'prof051487.jpg'){
	if($sex == 'M'){
		echo "<img width='50%' border='2px' src='img/m.jpg'>";
					}
	if($sex == 'F'){
	echo "<img width='50%' border='2px' src='img/f.jpg'>";
			}}
			
	if($image != 'prof051487.jpg'){
		echo "<img width='100%' border='2px' src='profileimg/".$image."'>";
}

	
	if($hide != 1){
	if($ori == 'gay'){
		echo "<br><img src='img/lgbt.png' width='25px'><br>";
	}	}
	
	echo "<article><span style='font-size:14px'>".$qmr."</span></article><br>";
	echo "</a>";
	/*
$counter = 0;
$mrcall = "SELECT * FROM messages WHERE myrelationship='$who' ORDER BY timestamp DESC";
	$mrload = mysqli_query($mysqli,$mrcall);
	
		while ($mr = mysqli_fetch_row($mrload)) {
			
	echo "<div id='qmrs'>";	
	
			if ($counter == 10){break;} else {
			$quote = $mr['2'];
				$date = $mr['3'];
					echo "<div class='qmr'><span style='font-size:20px'>".$quote."</span></div>";
					$counter++;}
					
				echo "</div>";		
								}
							mysqli_free_result($mr);

if(isset($_GET['p'])){
echo "<footer><a href='mviewe_profile.php?uid=".$uid."&qmr=1&p=1' id='mssg'>WRITE +</a></footer>";	
}else{echo "<footer><a href='mviewe_profile.php?uid=".$uid."&qmr=1' id='mssg'>WRITE +</a></footer>";	
}	*/


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

if ($crowd->num_rows > 0){
echo "<h2>More numbers in ".$city.", ".$country;
}
		while($contents = mysqli_fetch_row($crowd)){

echo "<div id='cell'><a href='mviewe_profile.php?extra=".$contents['0']."'>".$contents['3']."</a></div>";
		$extracount++;
}
echo "</h2>";
}
	

} else {

	echo "<a href='mforum.php?city=".$city."'><header id='a'><table><tr><td>";
	
		if($image == 'prof051487.jpg'){
			if($sex == 'M'){
	echo "<img height='75px' src='img/forummlink.png'>";
			}
			if($sex == 'F'){
	echo "<img height='75px' src='img/forumflink.png'>";
			}}
	echo "</td><td>";
	echo "<span style='font-size:225%'>".$city;
if(isset($country)) {	
	echo "<br><span style='text-transform:uppercase'>".$country."</span></strong></span></td></tr></table></header></a><br>";
}else if(isset($theregion)) {	
		echo "<br>".$theregion."</span></td></tr></table></header></a><br>";
	} else {
		echo "</span></header></td></tr></table></a><br>";
	}
		

			
	if($image != 'prof051487.jpg'){
		echo "<img width='100%' border='2px' src='profileimg/".$image."'><br><br>";
	}

// DISTANCT
if($lon != '' && isset($_SESSION['lon']) && $lat != '' && isset($_SESSION['lat']) && $city != $_SESSION['city']){
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
echo "<small>".round($output)." kilometers</small><br>";
	
}

echo "<br>";

// JET RADAR .COM
if($country!=$_SESSION['country']){
echo "<a href='https://ad.admitad.com/g/vbnovi30pq942acd6855ed464edc45/?ulp=https%3A%2F%2Fwww.cleartrip.com%2Fflights' target='_blank'><img width='25px' src='img/airplane.png'><button>See Prices</button><img width='25px' src='img/airplane.png'></a><br>";	
}
	
if($qmr != ''){
echo "<article><span style='font-size:20px'>".$qmr."</span></article>";
}
if($fake == 1 && $availability == 'anyone'){
	echo "<div id='fake'>FAKE</div>";
}
	
	if($hide != 1){
	if($ori == 'gay'){
		echo "<br><img src='img/lgbt.png' width='25px'><br>";
	}}
if(isset($country) && isset($_SESSION['country'])){
	$mycountry = $_SESSION['country'];
	
	include 'international.php';

	
	if(is_numeric($contact)){
	if(strtoupper($_SESSION['country']) == strtoupper($country)){}else{
		
if($localintl == '1'){
	$print = False;
	echo "<article><span style='font-size:20px'><strong>NUMBER ONLY AVAILABLE IN ".strtoupper($country)."</strong></span></article></strong><br>";
	}else{		
		
if($countrycode == substr($contact,0,strlen($countrycode))){
	echo "<article><span style='font-size:20px'><strong>Int'l: ".$exitcode."/ +".$contact."</strong></span></article></strong><br>";		
}	
elseif(substr($contact,0,1) == $trunk){
	echo "<article><span style='font-size:20px'><strong>Int'l: ".$exitcode."/ +".$countrycode." ".substr($contact,1)."</strong></span></article></strong><br>";	
}else if (substr($contact,0,1) == '+'){
	echo "<article><span style='font-size:20px'><strong>Int'l: ".$contact."</strong></span></article></strong><br>";	
}else{
	echo "<article><span style='font-size:20px'><strong>Int'l: ".$exitcode."/ +".$countrycode." ".$contact."</strong></span></article></strong><br>";	
}
}}}}	
if(strtoupper($_SESSION['country']) == strtoupper($country)){
if (substr($contact,0,1) == '+'){
		$start = 1 + strlen($countrycode);
echo "<article><span style='font-size:20px'><strong>".substr($contact,$start)."</strong></span></article></strong><br>";		
	}else{	
		echo "<article><span style='font-size:25px'>".$contact."</span></article><br>";
	}}else{
		
if($localintl == '1'){
	if($print != False){
	echo "<article><span style='font-size:20px'><strong>NUMBER ONLY AVAILABLE IN ".strtoupper($country)."</strong></span></article></strong><br>";
	}}else{		
		
	if(is_numeric($contact) == False){
		echo "<article><span style='font-size:25px'>@: ".$contact."</span></article><br>";
	}else{
if($countrycode == substr($contact,0,strlen($countrycode))){
echo "<article><span style='font-size:20px'><strong>Local: ".substr($contact,strlen($countrycode))."</strong></span></article></strong><br>";	
}elseif(substr($contact,0,1) == '+'){
$start = 1 + strlen($countrycode);
echo "<article><span style='font-size:20px'><strong>Local: ".substr($contact,$start)."</strong></span></article></strong><br>";
	}else{		
		echo "<article><span style='font-size:25px'>local: ".$contact."</span></article><br>";
	}}		
}}

if($_SESSION['country']=='USA'){
//AMAZON iPHONE 7
echo "<br><a href='phone.php'><span style='font-size:25px;color:blue'><u>NEW PHONE SHOP</u></span></a><br>";	
}else{
	
echo "<br><a href='phone.php'><span style='font-size:25px;color:blue'><u>NEW PHONE SHOP</u></span></a><br>";	
	
}

//PHONEBOOK
if($_SESSION['id']!=0){
if($localintl != 1){
if(isset($_GET['pb'])){
$newmessage = "INSERT INTO phonebook (uid,contact,country,cid) VALUES ('$id','$contact','$country','$who')";
							mysqli_query($mysqli,$newmessage);
}else{							
	echo "<br><a href='mviewe_profile.php?uid=".$uid."&pb'><span style='color:black'>ADD TO PHONEBOOK</span></a><br>";
}}}

echo"<br>";
if($share==1){
echo "<iframe src='https://www.facebook.com/plugins/share_button.php?href=";
echo "http://calltext.me/viewe_profile.php?me=".$who;
echo "&layout=button_count&size=small&width=89&height=20&appId' width='89' height='20' style='border:none;overflow:hidden' scrolling='no' frameborder='0' allowTransparency='true' allow='encrypted-media'></iframe>";
}elseif(isset($_SESSION['id'])){
	
echo "<div class='fb-share-button' data-href='http://calltext.me/viewe_profile.php?me=".$_SESSION['id']."' data-layout='button_count' data-size='small'><a target='_blank' href='https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fquotemyrelationship.com%2Fviewe_profile.php%3Fme&amp;src=sdkpreparse' class='fb-xfbml-parse-ignore'>Share</a></div>";	
}
echo "<br>";
echo "<br>";
	
	
//GYR

if($localintl != 1){
if($voted != 1 & $_SESSION['id']!=0){
	echo "<a href='mviewe_profile.php?uid=".$uid."&rate=green'><img src='img/g.png' width='20px'></a>&nbsp;&nbsp;";
	if($g < 25){
		echo "&nbsp;&nbsp;&nbsp;";
	echo "<a href='mviewe_profile.php?uid=".$uid."&rate=yellow'><img src='img/y.png' width='20px'></a>&nbsp;&nbsp;";
		echo "&nbsp;&nbsp;&nbsp;";
	echo "<a href='mviewe_profile.php?uid=".$uid."&rate=red'><img src='img/r.png' width='20px'></a>&nbsp;&nbsp;<br>";
	}
	echo "<br>"; 
}else{
	switch ($v) {
		case 'g':
			echo "<img src='img/g.png' width='20px'></a>&nbsp;&nbsp;<br>";
			break;
		case 'y':
			echo "<img src='img/y.png' width='20px'></a>&nbsp;&nbsp;<br>";
			break;
		case 'r':
			echo "<img src='img/r.png' width='20px'></a>&nbsp;&nbsp;<br>";
			break;
	}
}}
//GYR	

/*
$counter = 0;
$mrcall = "SELECT * FROM messages WHERE myrelationship='$who' ORDER BY timestamp DESC";
	$mrload = mysqli_query($mysqli,$mrcall);
	
		while ($mr = mysqli_fetch_row($mrload)) {
			
	echo "<div id='qmrs'>";	
	
			if ($counter == 10){break;} else {
			$quote = $mr['2'];
				$date = $mr['3'];
					echo "<div class='qmr'><span style='font-size:20px'>".$quote."</span></div>";
					$counter++;}
					
				echo "</div>";		
								}
							mysqli_free_result($mr);

if(isset($_GET['p'])){
echo "<footer><a href='mviewe_profile.php?uid=".$uid."&qmr=1&p=1' id='mssg'>QUOTE MY RELATIONSHIP +</a></footer>";	
}else{echo "<footer><a href='mviewe_profile.php?uid=".$uid."&qmr=1' id='mssg'>QUOTE MY RELATIONSHIP +</a></footer>";	
}	*/

echo "<hr>";


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

if ($crowd->num_rows > 0){
echo "<h2>More numbers in ".$city.", ".$country;
}
		while($contents = mysqli_fetch_row($crowd)){

echo "<div id='cell'><a href='mviewe_profile.php?extra=".$contents['0']."'>".$contents['3']."</a></div>";
		$extracount++;
}
echo "</h2>";
}
	
	
}else{
	
echo "<br><br>";
echo "<a href='mviewe_profile.php?uid=".$who."&more&cell#cell'><article>More numbers from ".$city."</article></a>";	
	
}

	}
	
							


if($id != 1){
							if(isset($_GET['report']) || isset($_GET['fake']) || isset($_GET['real'])){}else{
							mysqli_close($mysqli);	}
}
	
//REPORT NUDITY
if($image != 'prof051487.jpg'){
	if(isset($_GET['report'])){
	$report = "UPDATE users SET nudity='1' WHERE id='$who'";
	mysqli_query($mysqli,$report);
mysqli_close($mysqli);	
	} else {
		
if(isset($_GET['p'])){
	echo "<br><a href='mviewe_profile.php?uid=".$uid."&report=1&p=1'><span style='color:black'>REPORT IMAGE</span></a><br>";
}else{	echo "<br><a href='mviewe_profile.php?uid=".$uid."&report=1'><span style='color:black'>REPORT IMAGE</span></a><br>";

}}}

//FAKE REAL
if($availability == 'anyone'){
if($fake == 0){
	if(isset($_GET['fake'])){} else {
	echo "<br><a href='mviewe_profile.php?uid=".$uid."&fake'><span style='color:black'>REPORT FAKE USER</span></a><br>";
}}elseif($fake == 1){
	if(isset($_GET['real'])){} else {
	echo "<br><a href='mviewe_profile.php?uid=".$uid."&real'><span style='color:black'>REPORT USER REAL</span></a><br>";
}}else{
	echo "<br><a href='mviewe_profile.php?uid=".$uid."&fake'><span style='color:black'>REPORT FAKE USER</span></a><br>";
}}


if($availability == 'anyone' && strtoupper($_SESSION['country']) != strtoupper($country)){
echo "<br><a href='https://www.howtocallabroad.com/codes.html' target='_blank'><span style='color:blue'><u>How to Call Internationally<br><ul><li>1. Your Country's Exit Code</li><li>2. Their Country Code</li><li>3. Remove Trunk Prefix</li><li>4. Dial Number</li></ul></u></span></a><br>";
}

if($bitcoin != "0"){
echo "<br><br><span style='color:#ff69b4'><strong>DONATE ME</strong></span><br><img width='250px' src='img/sol.png'><br><span style='color:#ff69b4;font-size: 10pt'><br>Address:<br>".$bitcoin."</span>";		
}else{
echo "<br><br><span style='color:#ff69b4'><strong>DONATE HERE</strong></span><br><img width='250px' src='img/sol.png'><br><small><span style='color:#ff69b4;font-size: 10pt'><br>Address:<br>Gq9Gv34h6Y8noDiKpPk1HcT5gCJJD8Z6xNj1aSChtpv2</span></small>";	
}


if(isset($_GET['countryinput'])){
		$newcountry = $_GET['country'];
		$setmycountry = "UPDATE users SET country='$newcountry' WHERE id='$who'";
		mysqli_query($mysqli, $setmycountry);		
	}
	
// MF RESET
if(isset($_GET['mf'])){
		$mf = $_GET['mfchange'];
		$setmf = "UPDATE users SET sex='$mf' WHERE id='$who'";
		mysqli_query($mysqli, $setmf);		
	}	
	
	if(isset($_GET['re'])){
		$r = $_GET['region'];
		$setmyregion = "UPDATE users SET region='$r' WHERE id='$who'";
		mysqli_query($mysqli, $setmyregion);
	}

if($id == 1){

		

	echo "<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>";
		echo "<br>".$contact."<br>";
		echo "<br><a href='delete.php?delete=".$who."'><span style='color:red'>DELETE ACCOUNT</span></a><br><br>";
		echo "<a href='viewe_profile.php?image=".$who."'><span style='color:red'>CHANGE IMAGE</span></a><br>";
		echo "<br><a href='profile.php?login=".$email."'><h4>".$email."</h4></a>";
if($sex == 'M'){
	echo "<form action='mviewe_profile.php' method='GET'><input type='hidden' name='uid' value='$uid'><input type='radio' name='mfchange' value='M' checked>MALE<input type='radio' name='mfchange' value='F'>FEMALE<input type='submit' name='mf' value='CHANGE'></form>";				 
}		

if($sex == 'F'){
	echo "<form action='mviewe_profile.php' method='GET'><input type='hidden' name='uid' value='$uid'><input type='radio' name='mfchange' value='M'>MALE<input type='radio' name='mfchange' value='F' checked>FEMALE<input type='submit' name='mf' value='CHANGE'></form>";				 
}

if($regioncode == 'AF'){echo "<form action='mviewe_profile.php' method='GET'><input type='hidden' name='uid' value='$uid'><input type='radio' name='region' value='AF' checked>AFRICA<input type='radio' name='region' value='AS'>ASIA<input type='radio' name='region' value='EU'>EUROPE<input type='radio' name='region' value='ME'>MIDDLE EAST<input type='radio' name='region' value='NA'>NORTH AMERICA<input type='radio' name='region' value='SA'>SOUTH AMERICA<input type='radio' name='region' value='OC'>OCEANIA<input type='submit' name='re' value='SET'></form>";$echoed = TRUE;}
if($regioncode == 'AS'){echo "<form action='mviewe_profile.php' method='GET'><input type='hidden' name='uid' value='$uid'><input type='radio' name='region' value='AF'>AFRICA<input type='radio' name='region' value='AS' checked>ASIA<input type='radio' name='region' value='EU'>EUROPE<input type='radio' name='region' value='ME'>MIDDLE EAST<input type='radio' name='region' value='NA'>NORTH AMERICA<input type='radio' name='region' value='SA'>SOUTH AMERICA<input type='radio' name='region' value='OC'>OCEANIA<input type='submit' name='re' value='SET'></form>";$echoed = TRUE;}
if($regioncode == 'EU'){echo "<form action='mviewe_profile.php' method='GET'><input type='hidden' name='uid' value='$uid'><input type='radio' name='region' value='AF'>AFRICA<input type='radio' name='region' value='AS'>ASIA<input type='radio' name='region' value='EU' checked>EUROPE<input type='radio' name='region' value='ME'>MIDDLE EAST<input type='radio' name='region' value='NA'>NORTH AMERICA<input type='radio' name='region' value='SA'>SOUTH AMERICA<input type='radio' name='region' value='OC'>OCEANIA<input type='submit' name='re' value='SET'></form>";$echoed = TRUE;}
if($regioncode == 'ME'){echo "<form action='mviewe_profile.php' method='GET'><input type='hidden' name='uid' value='$uid'><input type='radio' name='region' value='AF'>AFRICA<input type='radio' name='region' value='AS'>ASIA<input type='radio' name='region' value='EU'>EUROPE<input type='radio' name='region' value='ME' checked>MIDDLE EAST<input type='radio' name='region' value='NA'>NORTH AMERICA<input type='radio' name='region' value='SA'>SOUTH AMERICA<input type='radio' name='region' value='OC'>OCEANIA<input type='submit' name='re' value='SET'></form>";$echoed = TRUE;}
if($regioncode == 'NA'){echo "<form action='mviewe_profile.php' method='GET'><input type='hidden' name='uid' value='$uid'><input type='radio' name='region' value='AF'>AFRICA<input type='radio' name='region' value='AS'>ASIA<input type='radio' name='region' value='EU'>EUROPE<input type='radio' name='region' value='ME'>MIDDLE EAST<input type='radio' name='region' value='NA' checked>NORTH AMERICA<input type='radio' name='region' value='SA'>SOUTH AMERICA<input type='radio' name='region' value='OC'>OCEANIA<input type='submit' name='re' value='SET'></form>";$echoed = TRUE;}
if($regioncode == 'SA'){echo "<form action='mviewe_profile.php' method='GET'><input type='hidden' name='uid' value='$uid'><input type='radio' name='region' value='AF'>AFRICA<input type='radio' name='region' value='AS'>ASIA<input type='radio' name='region' value='EU'>EUROPE<input type='radio' name='region' value='ME'>MIDDLE EAST<input type='radio' name='region' value='NA'>NORTH AMERICA<input type='radio' name='region' value='SA' checked>SOUTH AMERICA<input type='radio' name='region' value='OC'>OCEANIA<input type='submit' name='re' value='SET'></form>";$echoed = TRUE;}
if($regioncode == 'OC'){echo "<form action='mviewe_profile.php' method='GET'><input type='hidden' name='uid' value='$uid'><input type='radio' name='region' value='AF'>AFRICA<input type='radio' name='region' value='AS'>ASIA<input type='radio' name='region' value='EU'>EUROPE<input type='radio' name='region' value='ME'>MIDDLE EAST<input type='radio' name='region' value='NA'>NORTH AMERICA<input type='radio' name='region' value='SA'>SOUTH AMERICA<input type='radio' name='region' value='OC' checked>OCEANIA<input type='submit' name='re' value='SET'></form>";$echoed = TRUE;}

if($regioncode == Null){echo "<form action='mviewe_profile.php' method='GET'><input type='hidden' name='uid' value='$uid'><input type='radio' name='region' value='AF'>AFRICA<input type='radio' name='region' value='AS'>ASIA<input type='radio' name='region' value='EU'>EUROPE<input type='radio' name='region' value='ME'>MIDDLE EAST<input type='radio' name='region' value='NA'>NORTH AMERICA<input type='radio' name='region' value='SA'>SOUTH AMERICA<input type='radio' name='region' value='OC'>OCEANIA<input type='submit' name='re' value='SET'></form>";$echoed = TRUE;}
elseif($echoed == FALSE){echo "<form action='mviewe_profile.php' method='GET'><input type='hidden' name='uid' value='$uid'><input type='radio' name='region' value='AF'>AFRICA<input type='radio' name='region' value='AS'>ASIA<input type='radio' name='region' value='EU'>EUROPE<input type='radio' name='region' value='ME'>MIDDLE EAST<input type='radio' name='region' value='NA'>NORTH AMERICA<input type='radio' name='region' value='SA'>SOUTH AMERICA<input type='radio' name='region' value='OC'>OCEANIA<input type='submit' name='re' value='SET'></form>";}				 
				 

echo "<form action='mviewe_profile.php' method='GET'><input type='hidden' name='uid' value='$uid'><input type='text' name='country' placeholder='".$country."'><br><input type='submit' name='countryinput' value='Country'></form>";

$url1 = "https://pro.ip-api.com/json/";
$url2="?key=YzwVIWdSwM0qpXy";
$url = $url1.$ip.$url2;		
echo "<a href='".$url."' target='blank'>".$ip."</a><br>";

}	
	
	
mysqli_close($mysqli);	
	}
	
	?>

</div></body>
</html>