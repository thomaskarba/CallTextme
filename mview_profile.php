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
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta property="og:title" content="I wanted to Share this Contact.">
<meta property="og:image" content="img/ro.png">	
</head>
<style>
@import url('https://fonts.googleapis.com/css?family=Roboto+Mono:500');
body{font-family:'Roboto Mono',monospace;color:black;background-image:url("img/mpbg.jpg");}
div{text-align:center;}

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
#link{padding:12px;display:block;}
#link:link,#link:visited{background:#d4d4d4 linear-gradient(white,#d4d4d4,white);}
#link:hover{background:##d4d4d4 linear-gradient(white,#d4d4d4,white);}
#link:active{background-color:#000000;}
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
a{text-decoration:none;color:black;}
@import url('https://fonts.googleapis.com/css?family=Roboto+Mono:500');
footer,#topheader{font-family:'Roboto Mono',monospace;font-size:15px;color:#969696;}
article{margin:auto;font-family:'Roboto Mono',monospace;width:100%;}
div{margin:auto;text-align:center;}
section{font-family:'Roboto Mono',monospace;color:red;}

.qmr{width:100%; border:4px solid #d4d4d4;margin:auto;}


#mssg{font-family:'Roboto Mono',monospace;font-size:25px;padding:20px;text-decoration:none;display:block;}
#mssg:link,a:visited{background-color:#d4d4d4;color:black;}
#mssg:hover{background-color:#d4d4d4;}
#mssg:active{background-color:#000000;}

.green{background-image:url("img/g.png");width=20px;}
.red{background-image:url("img/r.png");width=20px;}
.yellow{background-image:url("img/y.png");width=20px;}

table{width:100%;margin:0;padding:0;}


</style>
<body>



<?php // UID SEARCH
	if(isset($_GET['uid']) || isset($_GET['extra'])){
		
if(isset($_GET['uid'])){		
	$uid = $_GET['uid'];
	$who = $_GET['uid'];
}
if(isset($_GET['extra'])){
$who = $_GET['extra'];
$uid = $_GET['extra'];
}		
		
		
$sessionloc = $_SESSION['city'];
$sessionmf = $_SESSION['mf'];
$sessionori = $_SESSION['ori'];


// LEFT
if(isset($_GET['l'])){	
	
// PFORUM	
if(isset($_GET['i'])){

//$region = $_SESSION['region'];		
	$repeaterlookup = "SELECT * FROM users WHERE city='$sessionloc' AND img != 'prof051487.jpg' AND id>'$uid' ORDER BY id ASC LIMIT 1"; 
		$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
	$who = $found['0'];
}
		
}else{
	
	
	
if($sessionori == "str") {
		$repeaterlookup = "SELECT * FROM users WHERE city='$sessionloc' AND sex != '$sessionmf' AND orientation = '$sessionori' AND id>'$uid' ORDER BY id ASC LIMIT 1"; 
		$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
	$who = $found['0'];
	}
}elseif ($sessionori == "gay") {
		$repeaterlookup = "SELECT * FROM users WHERE city='$sessionloc' AND sex = '$sessionmf' AND orientation = '$sessionori' AND id>'$uid' ORDER BY id ASC LIMIT 1"; 
		$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
	$who = $found['0'];
	}
}	
	

	
}	
}

// RIGHT
if(isset($_GET['r'])){
	

// PFORUM
if(isset($_GET['i'])){
	
//$region = $_SESSION['region'];		
	$repeaterlookup = "SELECT * FROM users WHERE city='$sessionloc' AND image != 'prof051487.jpg' AND id<'$uid' ORDER BY id DESC LIMIT 1"; 
		$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
	$who = $found['0'];
}	
}else{

if($sessionori == "str") {
	$repeaterlookup = "SELECT * FROM users WHERE city='$sessionloc' AND sex != '$sessionmf' AND orientation = '$sessionori' AND id<'$uid' ORDER BY id DESC LIMIT 1"; 
		$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
	$who = $found['0'];
}
}elseif ($sessionori == "gay") {
	$repeaterlookup = "SELECT * FROM users WHERE city='$sessionloc' AND sex = '$sessionmf' AND orientation = '$sessionori' AND id<'$uid' ORDER BY id DESC LIMIT 1"; 
		$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
	$who = $found['0'];
}
}
}	
}		
		


	



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
echo "<div><div id='topheader'><table><tr><td><a href='mview_profile.php?uid=".$uid."&l=1&i=1#a' id='left'><img src='img/left.png' width='30px'></a></td><td><a href='mpforum.php?return=".$uid."#forum' id='return'><img src='img/central.png' width='30px'></a></td><td><a href='mview_profile.php?uid=".$uid."&r=1&i=1#a' id='right'><img src='img/right.png' width='30px'></a></td></tr></table></div><br>";
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
echo "<div><div id='topheader'><table><tr><td><a href='mview_profile.php?uid=".$uid."&l=1&i=1#a' id='left'><img src='img/left.png' width='30px'></a></td><td><a href='mpforum.php?return=".$uid."#forum' id='return'><img src='img/central.png' width='30px'></a></td><td><a href='mview_profile.php?uid=".$uid."&r=1&i=1#a' id='right'><img src='img/right.png' width='30px'></a></td></tr></table></div><br>";
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
echo "<div><div id='topheader'><table><tr><td><a href='mview_profile.php?uid=".$uid."&l=1#a' id='left'><img src='img/left.png' width='30px'></a></td><td><a href='mforum.php?return=".$uid."#forum' id='return'><img src='img/central.png' width='30px'></a></td><td><a href='mview_profile.php?uid=".$uid."&r=1#a' id='right'><img src='img/right.png' width='30px'></a></td></tr></table></div><br>";
}







	
		
		
		
	// PROFILE LOAD
				
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
		$ori = $row['11'];
		$sex = $row['12'];
		
		$g = $row['13'];
		$y = $row['14'];
		$r = $row['15'];
		$country = $row['16'];
		$popularity = $row['20'];
		$popularity += 1;
			$pop = "UPDATE users SET popularity='$popularity' WHERE id='$who'";
			mysqli_query($mysqli,$pop);	
		$share=$row['21'];	
		

include 'rate.php';		
		
		
			$everyone = "anyone";
			
				
			
include 'quote.php';
		
		if ($availability == $everyone) {
		
		
		
//	echo "<div><div =id='topheader'><strong><a href='mforum.php?return=".$uid."' id='link'><img src='img/central.png' width='30px'></a></div><br>";
	
	
	
	
	if($image == 'prof051487.jpg'){
			if($sex == 'M'){
	echo "<img width='50%' border='2px' src='img/m.jpg'><br><br>";
			}
			if($sex == 'F'){
	echo "<img width='50%' border='2px' src='img/f.jpg'><br><br>";
			}}
			
if($image != 'prof051487.jpg'){
	echo "<img width='300px' border='2px' src='profileimg/".$image."'><br><br>";
}

if($share==1){
echo "<iframe src='https://www.facebook.com/plugins/share_button.php?href=";
echo "http://calltext.me/viewe_profile.php?me=".$who;
echo "&layout=button_count&size=small&width=89&height=20&appId' width='89' height='20' style='border:none;overflow:hidden' scrolling='no' frameborder='0' allowTransparency='true' allow='encrypted-media'></iframe>";
	
}
elseif(isset($_SESSION['id'])){
echo "<iframe src='https://www.facebook.com/plugins/share_button.php?href=";
echo "http://calltext.me/viewe_profile.php?me=".$_SESSION['id'];
echo "&layout=button_count&size=small&width=89&height=20&appId' width='89' height='20' style='border:none;overflow:hidden' scrolling='no' frameborder='0' allowTransparency='true' allow='encrypted-media'></iframe>";
}
			
	echo "<article><span style='font-size:16px'>".$qmr."</span></article>";
	
if($ori == 'gay'){
		echo "<img src='img/lgbt.png' width='20px'><br>";
	}	
	
	echo "<br><span style='font-size:25px'>".$contact."</span><br>";


if($_SESSION['country']=='USA'){
//AMAZON 
echo "<br><a href='phone.php'><span style='font-size:25px;color:blue'><u>NEW PHONE SHOP</u></span></a><br>";	
}else{
	
echo "<br><a href='phone.php'><span style='font-size:25px;color:blue'><u>NEW PHONE SHOP</u></span></a><br>";	
	
}

//GYR
if($voted != 1){
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
}
//GYR

	
//	echo "<footer><a href='mquotemy_profile.php?uid=".$uid."' id='mssg'>QUOTE MY RELATIONSHIP +</a></footer>";
	
//EXTRAS

	$sori = $_SESSION['ori'];
	$ssex = $_SESSION['mf'];
	
if($_SESSION['mf'] == NULL){	
	
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

echo "<div id='cell'><a href='mview_profile.php?extra=".$contents['0']."'>".$contents['3']."</a></div>";
		$extracount++;
}
echo "</h2>";
}	
	
	} else {
		
	
	
//	echo "<div><div =id='topheader'><strong><a href='mforum.php?return=".$uid."' id='link'><img src='img/central.png' width='30px'></a></div><br>";
if($g >= 25){
	echo "<img src='img/g.png' width='20px'>&nbsp;&nbsp;";	
}else{
echo $g."<img src='img/g.png' width='20px'>&nbsp;&nbsp;";	
echo $y."<img src='img/y.png' width='20px'>&nbsp;&nbsp;";
echo $r."<img src='img/r.png' width='20px'>&nbsp;&nbsp;<br><br>";
}	
	
	echo "<article>TOUCH TO SEND CONTACT INFO</article><a href='forum.php?add=".$uid."'>";
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

if($ori == 'gay'){
		echo "<img src='img/lgbt.png' width='20px'><br>";
	}
			
	echo "<article><span style='font-size:16px'>".$qmr."</span></article>";
//	echo "<br><img src='img/na.png' width='18px'><br>";
	echo "<br><article>TOUCH IMAGE TO SEND CONTACT INFO</article></a><br>";
	
//	echo "<footer><a href='mquotemy_profile.php?uid=".$uid."' id='mssg'>QUOTE MY RELATIONSHIP +</a></footer>";

//EXTRAS

	$sori = $_SESSION['ori'];
	$ssex = $_SESSION['mf'];
	
if($_SESSION['mf'] == NULL){	
	
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
	echo "<br><a href='mview_profile.php?uid=".$uid."&report=1&p=1'><span style='color:black'>REPORT IMAGE</span></a><br>";
}else{	echo "<br><a href='mview_profile.php?uid=".$uid."&report=1'><span style='color:black'>REPORT IMAGE</span></a><br>";

}}}

//FAKE REAL
if($availability == 'anyone'){
if($fake == 0){
	if(isset($_GET['fake'])){} else {
	echo "<br><a href='mview_profile.php?uid=".$uid."&fake'><span style='color:black'>REPORT FAKE USER</span></a><br>";
}}elseif($fake == 1){
	if(isset($_GET['real'])){} else {
	echo "<br><a href='mview_profile.php?uid=".$uid."&real'><span style='color:black'>REPORT USER REAL</span></a><br>";
}}else{
	echo "<br><a href='mview_profile.php?uid=".$uid."&fake'><span style='color:black'>REPORT FAKE USER</span></a><br>";
}}

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
		echo "<a href='view_profile.php?image=".$who."'><span style='color:red'>CHANGE IMAGE</span></a><br>";
		echo "<br><a href='mprofile.php?login=".$email."'><h4>".$email."</h4></a>";
if($sex == 'M'){
	echo "<form action='mview_profile.php' method='GET'><input type='hidden' name='uid' value='$uid'><input type='radio' name='mfchange' value='M' checked>MALE<input type='radio' name='mfchange' value='F'>FEMALE<input type='submit' name='mf' value='CHANGE'></form>";				 
}		

if($sex == 'F'){
	echo "<form action='mview_profile.php' method='GET'><input type='hidden' name='uid' value='$uid'><input type='radio' name='mfchange' value='M'>MALE<input type='radio' name='mfchange' value='F' checked>FEMALE<input type='submit' name='mf' value='CHANGE'></form>";				 
}

if($regioncode == 'AF'){echo "<form action='mview_profile.php' method='GET'><input type='hidden' name='uid' value='$uid'><input type='radio' name='region' value='AF' checked>AFRICA<input type='radio' name='region' value='AS'>ASIA<input type='radio' name='region' value='EU'>EUROPE<input type='radio' name='region' value='ME'>MIDDLE EAST<input type='radio' name='region' value='NA'>NORTH AMERICA<input type='radio' name='region' value='SA'>SOUTH AMERICA<input type='radio' name='region' value='OC'>OCEANIA<input type='submit' name='re' value='SET'></form>";$echoed = TRUE;}
if($regioncode == 'AS'){echo "<form action='mview_profile.php' method='GET'><input type='hidden' name='uid' value='$uid'><input type='radio' name='region' value='AF'>AFRICA<input type='radio' name='region' value='AS' checked>ASIA<input type='radio' name='region' value='EU'>EUROPE<input type='radio' name='region' value='ME'>MIDDLE EAST<input type='radio' name='region' value='NA'>NORTH AMERICA<input type='radio' name='region' value='SA'>SOUTH AMERICA<input type='radio' name='region' value='OC'>OCEANIA<input type='submit' name='re' value='SET'></form>";$echoed = TRUE;}
if($regioncode == 'EU'){echo "<form action='mview_profile.php' method='GET'><input type='hidden' name='uid' value='$uid'><input type='radio' name='region' value='AF'>AFRICA<input type='radio' name='region' value='AS'>ASIA<input type='radio' name='region' value='EU' checked>EUROPE<input type='radio' name='region' value='ME'>MIDDLE EAST<input type='radio' name='region' value='NA'>NORTH AMERICA<input type='radio' name='region' value='SA'>SOUTH AMERICA<input type='radio' name='region' value='OC'>OCEANIA<input type='submit' name='re' value='SET'></form>";$echoed = TRUE;}
if($regioncode == 'ME'){echo "<form action='mview_profile.php' method='GET'><input type='hidden' name='uid' value='$uid'><input type='radio' name='region' value='AF'>AFRICA<input type='radio' name='region' value='AS'>ASIA<input type='radio' name='region' value='EU'>EUROPE<input type='radio' name='region' value='ME' checked>MIDDLE EAST<input type='radio' name='region' value='NA'>NORTH AMERICA<input type='radio' name='region' value='SA'>SOUTH AMERICA<input type='radio' name='region' value='OC'>OCEANIA<input type='submit' name='re' value='SET'></form>";$echoed = TRUE;}
if($regioncode == 'NA'){echo "<form action='mview_profile.php' method='GET'><input type='hidden' name='uid' value='$uid'><input type='radio' name='region' value='AF'>AFRICA<input type='radio' name='region' value='AS'>ASIA<input type='radio' name='region' value='EU'>EUROPE<input type='radio' name='region' value='ME'>MIDDLE EAST<input type='radio' name='region' value='NA' checked>NORTH AMERICA<input type='radio' name='region' value='SA'>SOUTH AMERICA<input type='radio' name='region' value='OC'>OCEANIA<input type='submit' name='re' value='SET'></form>";$echoed = TRUE;}
if($regioncode == 'SA'){echo "<form action='mview_profile.php' method='GET'><input type='hidden' name='uid' value='$uid'><input type='radio' name='region' value='AF'>AFRICA<input type='radio' name='region' value='AS'>ASIA<input type='radio' name='region' value='EU'>EUROPE<input type='radio' name='region' value='ME'>MIDDLE EAST<input type='radio' name='region' value='NA'>NORTH AMERICA<input type='radio' name='region' value='SA' checked>SOUTH AMERICA<input type='radio' name='region' value='OC'>OCEANIA<input type='submit' name='re' value='SET'></form>";$echoed = TRUE;}
if($regioncode == 'OC'){echo "<form action='mview_profile.php' method='GET'><input type='hidden' name='uid' value='$uid'><input type='radio' name='region' value='AF'>AFRICA<input type='radio' name='region' value='AS'>ASIA<input type='radio' name='region' value='EU'>EUROPE<input type='radio' name='region' value='ME'>MIDDLE EAST<input type='radio' name='region' value='NA'>NORTH AMERICA<input type='radio' name='region' value='SA'>SOUTH AMERICA<input type='radio' name='region' value='OC' checked>OCEANIA<input type='submit' name='re' value='SET'></form>";$echoed = TRUE;}

if($regioncode == Null){echo "<form action='mview_profile.php' method='GET'><input type='hidden' name='uid' value='$uid'><input type='radio' name='region' value='AF'>AFRICA<input type='radio' name='region' value='AS'>ASIA<input type='radio' name='region' value='EU'>EUROPE<input type='radio' name='region' value='ME'>MIDDLE EAST<input type='radio' name='region' value='NA'>NORTH AMERICA<input type='radio' name='region' value='SA'>SOUTH AMERICA<input type='radio' name='region' value='OC'>OCEANIA<input type='submit' name='re' value='SET'></form>";$echoed = TRUE;}
elseif($echoed == FALSE){echo "<form action='mview_profile.php' method='GET'><input type='hidden' name='uid' value='$uid'><input type='radio' name='region' value='AF'>AFRICA<input type='radio' name='region' value='AS'>ASIA<input type='radio' name='region' value='EU'>EUROPE<input type='radio' name='region' value='ME'>MIDDLE EAST<input type='radio' name='region' value='NA'>NORTH AMERICA<input type='radio' name='region' value='SA'>SOUTH AMERICA<input type='radio' name='region' value='OC'>OCEANIA<input type='submit' name='re' value='SET'></form>";}				 
				 

echo "<form action='mview_profile.php' method='GET'><input type='hidden' name='uid' value='$uid'><input type='text' name='country' placeholder='".$country."'><br><input type='submit' name='countryinput' value='Country'></form>";

$url1 = "https://pro.ip-api.com/json/";
$url2="?key=YzwVIWdSwM0qpXy";
$url = $url1.$ip.$url2;		
echo "<a href='".$url."' target='blank'>".$ip."</a><br>";

}	
	
	
	
	
	
	
	
	
	
	

/*	
	
		$counter = 0;
			
	
	$mrcall = "SELECT * FROM messages WHERE myrelationship='$who' ORDER BY timestamp DESC";
	$mrload = mysqli_query($mysqli,$mrcall);
		while ($mr = mysqli_fetch_row($mrload)) {
			if ($counter == 10){break;} else {
			$quote = $mr['2'];
				$date = $mr['3'];
					echo "<div class='qmr'><article><span style='font-size:20px'>".$quote."</span></article></div>";
					$counter++;}
								}
							mysqli_free_result($mr);*/
						mysqli_close($mysqli);
						
						
						
						
						
						
						
						
						
						}
						
	elseif (isset($_GET['u'])){
		
		$who = $_GET['u'];


// DELETE MY QMR		
		if($who == $id) {
$number = $_GET['n'];
echo "<div id='topheader'><a href='qmr.php?delete=".$number."' id='link'><img src='img/x.png' width='30px'></a></div>";
	echo "<div id='topheader'><a href='qmr.php' id='link'><img src='img/central.png' width='30px'></a></div>";
exit();	}

	$uidcall = "SELECT * FROM users WHERE id='$who' ORDER BY id DESC LIMIT 1";
	$uidload = mysqli_query($mysqli,$uidcall);
	$callit = mysqli_fetch_array($uidload);	
		$uid = $callit['0'];
		
		

		
	// PROFILE LOAD
				
	$call = "SELECT * FROM users WHERE id='$who'";
	$infoload = mysqli_query($mysqli,$call);
	$row = mysqli_fetch_array($infoload);
		$profile = $row['1'];
		$contact = $row['3'];
		$city = $row['4'];
		$image = $row['5'];
		$qmr = $row['6'];
		$availability = $row['7'];
		$bitcoin = $row['8'];
		$ori = $row['11'];
		$sex = $row['12'];		
		$g = $row['13'];
		$y = $row['14'];
		$r = $row['15'];
		$popularity = $row['20'];
		$popularity += 1;
			$pop = "UPDATE users SET popularity='$popularity' WHERE id='$who'";
			mysqli_query($mysqli,$pop);			
		
		
			$everyone = "anyone";
			
				
			
include 'quote.php';
				
				
				
				
include 'rate.php';				
				
				
				
				
				
				
		
		if ($availability == $everyone) {
		
		
		
	echo "<div><div id='topheader'><a href='mqmr.php' id='link'><img src='img/centralw.png' width='30px'></a></div><br>";
	
	
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

if($ori == 'gay'){
		echo "<img src='img/lgbt.png' width='20px'><br>";
	}

	echo "<article><span style='font-size:25px'>".$city."</span></article>";
	echo "<article><span style='font-size:20px'>".$qmr."</span></article>";
	echo "<br>".$contact."<br>";
	echo "<br><article><span style='font-size:20px'>+</span><br><span style='font-size:100px'>?</span></article>";



//GYR
if($voted != 1){
	echo "<a href='mview_profile.php?u=".$who."&rate=green'><img src='img/g.png' width='20px'></a>&nbsp;&nbsp;";
	if($g < 25){
		echo "&nbsp;&nbsp;&nbsp;";
	echo "<a href='mview_profile.php?u=".$who."&rate=yellow'><img src='img/y.png' width='20px'></a>&nbsp;&nbsp;";
		echo "&nbsp;&nbsp;&nbsp;";
	echo "<a href='mview_profile.php?u=".$who."&rate=red'><img src='img/r.png' width='20px'></a>&nbsp;&nbsp;<br>";
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
}
//GYR	


	
//	echo "<footer><a href='mquotemy_profile.php?u=".$who."' id='mssg'>QUOTE MY RELATIONSHIP +</a></footer>";
	
	
	
	} else {
		
	
	
	echo "<div><div id='topheader'><strong><a href='mqmr.php' id='link'><img src='img/centralw.png' width='30px'></a></div><br>";

	echo "<article>TOUCH TO SEND CONTACT INFO</article><a href='mforum.php?add=".$uid."'>";
	if($image == 'prof051487.jpg'){
			if($sex == 'M'){
	echo "<img width='300px' border='2px' src='profileimg/m.jpg'><br><br>";
			}
			if($sex == 'F'){
	echo "<img width='300px' border='2px' src='profileimg/f.jpg'><br><br>";
			}}
			
if($image != 'prof051487.jpg'){
	echo "<img width='300px' border='2px' src='profileimg/".$image."'><br><br>";
}

if($ori == 'gay'){
		echo "<img src='img/lgbt.png' width='20px'><br>";
	}
	
	echo "<article><span style='font-size:25px'>".$city."</span></article>";
	echo "<article><span style='font-size:20px'>".$qmr."</span></article>";
//	echo "<br><img src='img/na.png' width='18px'><br>";
	echo "<br><article>TOUCH IMAGE TO SEND CONTACT INFO</article></a><br>";
if($g >= 25){
	echo "<img src='img/g.png' width='20px'>&nbsp;&nbsp;";	
}else{
echo $g."<img src='img/g.png' width='20px'>&nbsp;&nbsp;";	
echo $y."<img src='img/y.png' width='20px'>&nbsp;&nbsp;";
echo $r."<img src='img/r.png' width='20px'>&nbsp;&nbsp;<br><br>";
}	
//	echo "<footer><a href='mquotemy_profile.php?u=".$who."' id='mssg'>WRITE +</a></footer>";
	
	
	}	
	
	
	
	/*
		$counter = 0;
			
	
	$mrcall = "SELECT * FROM messages WHERE myrelationship='$who' ORDER BY timestamp DESC";
	$mrload = mysqli_query($mysqli,$mrcall);
		while ($mr = mysqli_fetch_row($mrload)) {
			if ($counter == 10){break;} else {
			$quote = $mr['2'];
				$date = $mr['3'];
					echo "<div class='qmr'><article><span style='font-size:20px'>".$quote."</span></article></div>";
					$counter++;}
								}
							mysqli_free_result($mr);*/
	mysqli_close($mysqli);
	}
	
if($bitcoin != "0"){
echo "<br><br><span style='color:#ff69b4'><strong>DONATE ME</strong></span><br><img width='250px' src='img/sol.png'><br><span style='color:#ff69b4;font-size: 10pt'><br>Address:<br>".$bitcoin."</span>";		
}else{
echo "<br><br><span style='color:#ff69b4'><strong>DONATE HERE</strong></span><br><img width='250px' src='img/sol.png'><br><span style='color:#ff69b4;font-size: 10pt'><br>Address:<br>Gq9Gv34h6Y8noDiKpPk1HcT5gCJJD8Z6xNj1aSChtpv2</span>";	
}	
	

?>



</div></body>
</html>