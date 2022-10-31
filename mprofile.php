<?php
require 'db.php';
session_start();

//if($_SESSION['id'] == Null){
//	if($_COOKIE['login'] == Null){ header("location: index.php"); }
//	$id = $_COOKIE['login'];
//	$_SESSION['id'] = $id;
//	}

if($_SESSION['friends'] == 1){
	$setfriend = "UPDATE users SET friend=1 WHERE id='$id'";
	mysqli_query($mysqli,$setfriend);
}	

if(isset($_COOKIE['login'])){
		$_COOKIE['login'] = $id;
		$id = $_SESSION['id'];

		$load = "SELECT * FROM users WHERE id='$id'";
			$enter = mysqli_query($mysqli, $load);
				if ($logloc = mysqli_fetch_row($enter)){
					
						$homelocation = $logloc['4'];
						$_SESSION['city'] = $homelocation;
						$homeplace = $_SESSION['city'];
					
						$homeimage = $logloc['5'];
						$_SESSION['img'] = $homeimage;
						$homeimg = $_SESSION['img'];
					
						$name = $logloc['6'];
						$_SESSION['name']=$name;
						
						$availability = $logloc['7'];
						$_SESSION['a'] = $availability;	
						
						$sol = $logloc['8'];
						$_SESSION['SOL'] = $sol;
						
						$homer = $logloc['9'];
						$_SESSION['myr'] = $homer;	
					
						$homeorientation = $logloc['11'];
						$_SESSION['ori'] = $homeorientation;
						$homeori = $_SESSION['ori'];
					
						$homesex = $logloc['12'];
						$_SESSION['mf'] = $homesex;
						$homemf = $_SESSION['mf'];
						
						$mycountry = $logloc['16'];
						$_SESSION['country'] = $mycountry;
						
						$hide = $logloc['18'];
						
						$friends = $logloc['22'];
						
						$paid = $logloc['26'];
						$_SESSION['paid'] = $paid;
					
					
						
					 
						
					
					
						
						
setcookie('login',$id,time()+864000);						
}}

if(isset($_GET['login'])){
	$uid = $_GET['login'];
	
	
	$result = $mysqli->query("SELECT * FROM users WHERE email='$uid'");
if ($result->num_rows == 0){
	$_SESSION['message'] = "SIGNUP";
    header("location: gender.php");
} else {
	$user = $result->fetch_assoc();

	
	$_SESSION['id'] = $user['id'];
	$id = $_SESSION['id'];
	
		
		// SESSION LOAD
				$sessionload = "SELECT * FROM users WHERE id='$id'";
				$loginquery = mysqli_query($mysqli, $sessionload);
				if ($logloc = mysqli_fetch_row($loginquery)){
					
						$homelocation = $logloc['4'];
						$_SESSION['city'] = $homelocation;
						$homeplace = $_SESSION['city'];
						
if($_SESSION['region']==NULL){
$rsearch = "SELECT * FROM updater WHERE location='$homelocation' AND region!='0' LIMIT 1";
if($rload = mysqli_query($mysqli,$rsearch)){
	
$regionrow = mysqli_fetch_row($rload);
	$cityregionc = $regionrow['2'];

if(Null !== $cityregionc){

$setregion = "UPDATE updater SET region='$cityregionc' WHERE id='$id'";
	mysqli_query($mysqli, $setregion);
		$setmyregion = "UPDATE users SET region='$cityregionc' WHERE id='$id'";
		mysqli_query($mysqli,$setmyregion);		
	$_SESSION['region'] = $cityregionc;
	
}}	}					
						$homelocation = $logloc['4'];
						$_SESSION['city'] = $homelocation;
						$homeplace = $_SESSION['city'];
						
						
						$homeimage = $logloc['5'];
						$_SESSION['img'] = $homeimage;
						$homeimg = $_SESSION['img'];
						
						$name = $logloc['6'];
						$_SESSION['name']=$name;
						
						$myavailability = $logloc['7'];
						$_SESSION['a'] = $myavailability;
						$mya = $_SESSION['a'];
						
						$sol = $logloc['8'];
						$_SESSION['SOL'] = $sol;
						
						$myregion = $logloc['9'];
						$_SESSION['myr'] = $myregion;

						$homeorientation = $logloc['11'];
						$_SESSION['ori'] = $homeorientation;
						$homeori = $_SESSION['ori'];
						
						$homesex = $logloc['12'];
						$_SESSION['mf'] = $homesex;
						$homemf = $_SESSION['mf'];
						
						$mycountry = $logloc['16'];
						$_SESSION['country'] = $mycountry;
						
						$hide = $logloc['18'];
						
						$friends = $logloc['22'];
						
						$paid = $logloc['26'];
						$_SESSION['paid'] = $paid;	
						

	} else {
	$_SESSION['message'] = "THERE IS A PROBLEM WITH YOUR ACCOUNT. MAKE A NEW ACCOUNT.";
	header("location: error.php");} 
	
}
setcookie('login',$id,time()+864000);
}

if(isset($_POST['login'])) {
$uid = $mysqli->escape_string($_POST['uid']);
$result = $mysqli->query("SELECT * FROM users WHERE email='$uid'");
if ($result->num_rows == 0){
	$_SESSION['message'] = "SIGNUP";
    header("location: gender.php");
} else {
	$user = $result->fetch_assoc();

	
	$_SESSION['id'] = $user['id'];
//	$_SESSION['email'] = $user['email'];
	//$_SESSION['active'] = $user['active'];
//	$_SESSION['logged_in'] = true;
	
	$id = $_SESSION['id'];
	
		// SESSION LOAD
				$sessionload = "SELECT * FROM users WHERE id='$id'";
				$loginquery = mysqli_query($mysqli, $sessionload);
				if ($logloc = mysqli_fetch_row($loginquery)){
					
					
						$homelocation = $logloc['4'];
						$_SESSION['city'] = $homelocation;
						$homeplace = $_SESSION['city'];
					
						$homeimage = $logloc['5'];
						$_SESSION['img'] = $homeimage;
						$homeimg = $_SESSION['img'];
						
						$name = $logloc['6'];
						$_SESSION['name']=$name;

						$myavailability = $logloc['7'];
						$_SESSION['a'] = $myavailability;
						$mya = $_SESSION['a'];

						$sol = $logloc['8'];
						$_SESSION['SOL'] = $sol;							
						
						$myregion = $logloc['9'];
						$_SESSION['myr'] = $myregion;
					
						$homeorientation = $logloc['11'];
						$_SESSION['ori'] = $homeorientation;
						$homeori = $_SESSION['ori'];
										
						$homesex = $logloc['12'];
						$_SESSION['mf'] = $homesex;
						$homemf = $_SESSION['mf'];
						
						$mycountry = $logloc['16'];
						$_SESSION['country'] = $mycountry;
						
						$hide = $logloc['18'];
						
						$friends = $logloc['22'];
						
						$paid = $logloc['26'];
						$_SESSION['paid'] = $paid;	
					
	} else {
	$_SESSION['message'] = "THERE IS A PROBLEM WITH YOUR ACCOUNT. MAKE A NEW ACCOUNT.";
	header("location: error.php");} 
	
}
setcookie('login',$id,time()+864000);
} 

// REGION
if(isset($_POST['re'])){
		$r = $_POST['region'];
		$setregion = "UPDATE updater SET region='$r' WHERE id='$id'";
		mysqli_query($mysqli,$setregion);	
		$setmyregion = "UPDATE users SET region='$r' WHERE id='$id'";
		mysqli_query($mysqli,$setmyregion);		
$_SESSION['region'] = $r;
$_SESSION['myr'] = $r;
		} else {
			if($_SESSION['paid']==1){$_SESSION['region']=Null;}else{
		$_SESSION['region'] = $_SESSION['myr'];
		}} 
			
	$id = $_SESSION['id'];
	$homemf = $_SESSION['mf'];
	$homecity = $_SESSION['city'];
	
/*
if($id != 1 & $friends == 0 & $_SESSION['friends'] != 1){	
	
if($_SESSION['f'] == Null && $_SESSION['m'] == Null){
	if($_SESSION['ori'] == 'str'){
		if($_SESSION['mf'] == 'F'){
			$_SESSION['m'] = 1;
		}
		if($_SESSION['mf'] == 'M'){
			$_SESSION['f'] = 1;
		}	
	}
if($_SESSION['ori'] == 'gay'){	
	if($_SESSION['mf'] == 'F'){
		$_SESSION['f'] = 1;
	}
	if($_SESSION['mf'] == 'M'){
		$_SESSION['m'] = 1;
}}}}	
	*/
	
	
if($_SESSION['paid'] == 1){
	$_SESSION['region'] = Null;
}	

	$id = $_SESSION['id'];
$earliestid = "DELETE FROM users WHERE email='$uid' AND id!='$id'";
		mysqli_query($mysqli, $earliestid);	
		
if($_SESSION['id'] == 0){mysqli_close($mysqli); header("location: start2.php");}


if($_SESSION['new'] = 1){
$citytosend = $_SESSION['city'];
$oritosend = $_SESSION['ori'];
$mftosend = $_SESSION['mf'];

if($_SESSION['friends'] == 1){
	$others = "SELECT * FROM users WHERE city = '$citytosend' AND emailnotifications='on' ORDER BY id DESC LIMIT 50";
}else{

if($mftosend == 'M'){
	if($oritosend == 'str'){
		$others = "SELECT * FROM users WHERE city = '$citytosend' AND emailnotifications='on' AND orientation = '$oritosend' AND sex != '$mftosend' ORDER BY id DESC LIMIT 50";
	}else{
		$others = "SELECT * FROM users WHERE city = '$citytosend' AND emailnotifications='on' AND orientation = '$oritosend' AND sex = '$mftosend' ORDER BY id DESC LIMIT 50";
	}
}
if($mftosend == 'F'){
	if($oritosend == 'str'){
		$others = "SELECT * FROM users WHERE city = '$citytosend' AND emailnotifications='on' AND orientation = '$oritosend' AND sex != '$mftosend' ORDER BY id DESC LIMIT 50";
	}else{
		$others = "SELECT * FROM users WHERE city = '$citytosend' AND emailnotifications='on' AND orientation = '$oritosend' AND sex = '$mftosend' ORDER BY id DESC LIMIT 50";
	}
}
}	

if ($crowd = mysqli_query($mysqli, $others)){
	
	
mysqli_query($mysqli, "DELETE FROM updater where repeater IN (SELECT repeater FROM (SELECT repeater, COUNT(id) as cid from updater GROUP BY id) t1 WHERE cid = 2)");



		while($contents = mysqli_fetch_row($crowd)){
			
// EMAIL
		$headers = 'From: CallText.me' . "\r\n".
		'Reply-To: no-reply@CallText.me' . "\r\n" .
		'X-Mailer: PHP/' . phpversion() . "\r\n" .
		'Content-type: text/html; charset=iso-8859-1';
		$contact = $_SESSION['contact'];
		$address = $contents['2'];
		$subject = "QMR ~ ".$contact;
		if($mftosend=='M'){$gender = 'Male';}else{$gender='Female';}
		if($_SESSION['friends'] == 1){
		$body = "<br>New Friend in ".$citytosend."<br><h3>".$contact."</h3><br><br><b>DO NOT REPLY</b><br>
To stop receiving these Emails <a href='http://CallText.me/settings.php?unsubscribe=".$contents['0']."'>Unsubscribe</a>";
$_SESSION['friends'] = NULL;			
		}else{
		$body = "<b>DO NOT REPLY</b><br>New ".$gender." in ".$citytosend."<br><h3>".$contact."</h3><br><br>
To stop receiving these Emails <a href='http://CallText.me/settings.php?unsubscribe=".$contents['0']."'>Unsubscribe</a>";	
		}
mail($address,$subject,$body,$headers);
			

}	}


if(is_null($_SESSION['longitude']) && is_null($_SESSION['latitude'])){
$ip = $_SESSION['ip'];
$setip = "UPDATE users SET ip='$ip' WHERE id='$id'";
mysqli_query($mysqli,$setip);	
}else{
$ip = $_SESSION['ip'];$longitude = $_SESSION['longitude'];$latitude=$_SESSION['latitude'];
$setip = "UPDATE users SET ip='$ip',longitude='$longitude',latitude='$latitude' WHERE id='$id'";
mysqli_query($mysqli,$setip);
}



}	

$_SESSION['searchcountry']=Null;
	
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
	<title>CallText.me</title>
	<link rel="icon" href="img/ro.png">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
body{background-color:black;}
div{text-align:center;}
table{width:100%;height:100%;}
@import url('https://fonts.googleapis.com/css?family=Roboto+Mono:500');
header{background-color:yellow;font-family:'Roboto Mono',monospace;color:#5b5b5b;}

input[type=text],input[type=email],input[type=password],select,button,textarea
	{padding: 3px 3px;
	margin: 5px;
	border: 1px solid #dce4f2;
	border-radius:10px;
	font-family: 'Dosis', sans-serif;
	font-size:20px;
	background-color:white;
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

input[type=text]:focus,
input[type=email]:focus,
input[type=password]:focus{
	background-color:#f7f7f7;
	border: 1px solid #868e9c;
	}

ul{margin:0;padding:0;overflow:hidden;list-style-type:none;}

#link0{font-family:'Roboto Mono',monospace;font-size:25px;padding:12px;text-decoration:none;display:block;}
#link0:link,#link0:visited{background:#f4a941 linear-gradient(to right,#59401e,#f4a941,#f4a941,#59401e);color:black;}
#link0:hover{background:#eb1e66 linear-gradient(to right,#59182f,#eb1e66,#eb1e66,#59182f);}
#link0:active{background-color:#000000;}

#link1{font-family:'Roboto Mono',monospace;font-size:25px;padding:12px;text-decoration:none;display:block;}
#link1:link,#link1:visited{background:#e8dc5f linear-gradient(to right,#514d24,#e8dc5f,#e8dc5f,#514d24);color:black;}
#link1:hover{background:#eb1e66 linear-gradient(to right,#59182f,#eb1e66,#eb1e66,#59182f);}
#link1:active{background-color:#000000;}

#link2{font-family:'Roboto Mono',monospace;font-size:25px;padding:12px;text-decoration:none;display:block;}
#link2:link,#link2:visited{background:#a6e283 linear-gradient(to right,#455e37,#a6e283,#a6e283,#455e37);color:black;}
#link2:hover{background:#eb1e66 linear-gradient(to right,#59182f,#eb1e66,#eb1e66,#59182f);}
#link2:active{background-color:#000000;}

#linkmusic{font-family:'Roboto Mono',monospace;font-size:25px;padding:12px;text-decoration:none;display:block;}
#linkmusic:link,#link2:visited{background:#C1FFF0 linear-gradient(to right,#64847D,#C1FFF0,#C1FFF0,#64847D);color:black;}
#linkmusic:hover{background:#eb1e66 linear-gradient(to right,#59182f,#eb1e66,#eb1e66,#59182f);}
#linkmusic:active{background-color:#000000;}

#link3{font-family:'Roboto Mono',monospace;font-size:25px;padding:12px;text-decoration:none;display:block;}
#link3:link,#link3:visited{background:#415cf4 linear-gradient(to right,#171f4c,#415cf4,#415cf4,#171f4c);color:black;}
#link3:hover{background:#eb1e66 linear-gradient(to right,#59182f,#eb1e66,#eb1e66,#59182f);}
#link3:active{background-color:#000000;}

#link4{font-family:'Roboto Mono',monospace;font-size:25px;padding:12px;text-decoration:none;display:block;}
#link4:link,#link4:visited{background:#ba90d1 linear-gradient(to right,#4a3754,#ba90d1,#ba90d1,#4a3754);color:black;}
#link4:hover{background:#eb1e66 linear-gradient(to right,#59182f,#eb1e66,#eb1e66,#59182f);}
#link4:active{background-color:#000000;}

#mssg{font-family:'Roboto Mono',monospace;font-size:25px;padding:12px;text-decoration:none;display:block;}
#mssg:link,#mssg:visited{background:#d4d4d4 linear-gradient(to right,#383838,#d4d4d4,#d4d4d4,#383838);color:black;}
#mssg:hover{background:#eb1e66 linear-gradient(to right,#59182f,#eb1e66,#eb1e66,#59182f);}
#mssg:active{background-color:#000000;}

#pb{font-family:'Roboto Mono',monospace;font-size:25px;padding:12px;text-decoration:none;display:block;}
#pb:link,#mssg:visited{background:#d4d4d4 linear-gradient(to right,#383838,#d4d4d4,#d4d4d4,#383838);color:black;}
#pb:hover{background:#eb1e66 linear-gradient(to right,#59182f,#eb1e66,#eb1e66,#59182f);}
#pb:active{background-color:#000000;}

#logout{font-family:'Roboto Mono',monospace;font-size:25px;padding:12px;text-decoration:none;display:block;}
#logout:link,#logout:visited{background:#d4d4d4 linear-gradient(to right,#383838,#d4d4d4,#d4d4d4,#383838);color:black;}
#logout:hover{background:#eb1e66 linear-gradient(to right,#59182f,#eb1e66,#eb1e66,#59182f);}
#logout:active{background-color:#000000;}

#mssgib{font-family:'Roboto Mono',monospace;font-size:25px;padding:12px;text-decoration:none;display:block;}
#mssgib:link,#mssgib:visited{background:#c6597d linear-gradient(to right,#512836,#c6597d,#c6597d,#512836);color:black;}
#mssgib:hover{background:#eb1e66 linear-gradient(to right,#59182f,#eb1e66,#eb1e66,#59182f);}
#mssgib:active{background-color:#000000;}

#mssgic{font-family:'Roboto Mono',monospace;font-size:25px;padding:12px;text-decoration:none;display:block;}
#mssgic:link,#mssgib:visited{background:#FDFFB5 linear-gradient(to right,#929700,#FDFFB5,#FDFFB5,#929700);color:black;}
#mssgic:hover{background:#eb1e66 linear-gradient(to right,#59182f,#eb1e66,#eb1e66,#59182f);}
#mssgic:active{background-color:#000000;}

a{text-decoration:none;color:black;}
@import url('https://fonts.googleapis.com/css?family=Roboto+Mono:500');
footer{font-family:'Roboto Mono',monospace;font-size:18px;}
div,header,a{font-family:'Roboto Mono',monospace;text-align:center;}
form{font-family:'Roboto Mono',monospace;}
#qmr{margin:auto;text-align:center;text-transform:uppercase;}
table{margin:0;padding:0;}
section{background:#6d6d6d linear-gradient(to right,#000000,#6d6d6d,#6d6d6d,#000000);}
	p{margin:auto;font-family:'Roboto Mono',monospace;}
h1{color:red;}
#region{background-color:white;}	
</style>
<body><div>

<?php //NAME
//INSERT works
	if (isset($_POST['name'])){
		$qmr = $_POST['fname'];
		$dollar = '/\$/';
		if (preg_match($dollar,$qmr)) {
			echo "PROSTITUTION IS A NO-NO"; 
				} elseif(preg_match('/[0-9]/', $qmr)) {
			echo "USE CONTACT FOR YOUR NUMBER";
				
			
		} else {
					

		$quote = mysqli_real_escape_string($mysqli,$_POST['fname']);
		$enter = "UPDATE users SET name='$quote' WHERE id='$id'";
		$result = mysqli_query($mysqli, $enter);
		$_SESSION['name'] = 1;	
			}}
//QMR FORM
if($_SESSION['new'] == 1 & $_SESSION['name'] == NULL){
echo "<form action='mprofile.php' method='POST'><textarea name='fname' rows='1' cols='26' placeholder='First Name'></textarea><br><input type='submit' name='name' value='WHAT IS YOUR NAME?'></form>"; 
}
?>

<?php //DUPLICATES
/*
if($_SESSION['ran']==FALSE && $_SESSION['id']==1){
mysqli_query($mysqli,"DELETE FROM users WHERE id IN (SELECT t1.id FROM (SELECT id, email, COUNT(email) as CE FROM users GROUP BY email) t1 WHERE t1.CE >1)");
$_SESSION['ran']=TRUE;
}
*/
?>

<?php

if($_SESSION['country']=="USA"){
	

if(substr($_SESSION['contact'],0,1) === '0'){
	
	$account = $_SESSION['id'];	
	
	$imageload = "SELECT * FROM users WHERE id='$account'";
		$loading = mysqli_query($mysqli,$imageload);
	if (($row = mysqli_fetch_row($loading))){
		$myimage = $row['5'];
		if($myimage != "prof051487.jpg"){
		unlink("profileimg/$myimage"); }}		
		
		setcookie('login',Null,time()+1);	

	$deleteone = "DELETE FROM central WHERE receiving='$account' OR sending='$account'";
	$deletetwo = "DELETE FROM messages WHERE myrelationship='$account'";
	$deletethree = "DELETE FROM updater WHERE id='$account'";
	$deletefour = "DELETE FROM users WHERE id='$account'";
	$deletefive = "DELETE FROM qmr WHERE id='$account'";
	$deletesix = "DELETE FROM phonebook WHERE cid='$account' OR uid='$account'";
		mysqli_query($mysqli,$deleteone);
		mysqli_query($mysqli,$deletetwo);
		mysqli_query($mysqli,$deletethree);
		mysqli_query($mysqli,$deletefour);
		mysqli_query($mysqli,$deletefive);
		mysqli_query($mysqli,$deletesix);
		
echo "<h1>USER DELETED</h1>";	
	session_destroy();	
	
	$_SESSION['cancel'] = TRUE;
	
}	
	
	
}

// LOGIN COUNT
if($_SESSION['id'] != 1 && $_SESSION['id'] != 0){
if($_SESSION['logintoday'] != True){
$id = $_SESSION['id'];
$today = date("Y-m-d");
$mobile = 1;
$homeori = $_SESSION['ori'];
$homemf = $_SESSION['mf'];
$logincount = "INSERT INTO login (uid,logindate,sex,ori,mobile) VALUES ('$id','$today','$homemf','$homeori','$mobile')";
		mysqli_query($mysqli, $logincount);
	$_SESSION['logintoday'] = True;	
}}

if($_SESSION['cancel'] != TRUE){
if($_SESSION['myr'] == Null){
	
$rsearch = "SELECT * FROM users WHERE city='$homecity' AND region!='0' LIMIT 1";
if($rload = mysqli_query($mysqli,$rsearch)){
	
	if ($rload->num_rows == 0){
		
echo "<div id='region'><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><form action='profile.php' method='POST'><input type='hidden' name='lo' value='$homecity'><h1>WHERE IS ".$homecity."???</h1><input type='radio' name='region' value='AF'>AFRICA?<br><input type='radio' name='region' value='AS'>ASIA?<br><input type='radio' name='region' value='EU'>EUROPE?<br><input type='radio' name='region' value='ME'>MIDDLE EAST?<br><input type='radio' name='region' value='NA'>NORTH AMERICA?<br><input type='radio' name='region' value='SA'>SOUTH AMERICA?<br><input type='radio' name='region' value='OC'>OCEANIA?<br><input type='submit' name='re' value='SET'></form><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p></div>";
		
	}else{
		
		
$regionrow = mysqli_fetch_row($rload);
	$cityregionc = $regionrow['2'];

	$_SESSION['region'] = $cityregionc;
	
	$setmyregion = "UPDATE users SET region='$cityregionc' WHERE id='$id'";
	mysqli_query($mysqli, $setmyregion);
	$_SESSION['myr'] = $cityregionc;	

if($cityregionc == 'AF' ){$cityregionc = 'Africa';}
if($cityregionc == 'AS' ){$cityregionc = 'Asia';}
if($cityregionc == 'EU' ){$cityregionc = 'Europe';}
if($cityregionc == 'ME' ){$cityregionc = 'Middle East';}
if($cityregionc == 'NA' ){$cityregionc = 'North America';}
if($cityregionc == 'OC' ){$cityregionc = 'Oceania';}
if($cityregionc == 'SA' ){$cityregionc = 'South America';}
	
//echo "<div id='region'><h1>".$homecity." in ".$cityregionc."</h1><a href='profile.php?change'><button>CHANGE</button></a><p>&nbsp;</p></div>";	
		
}}}}

if($_SESSION['country'] == Null){
	
$csearch = "SELECT * FROM users WHERE city='$homecity' AND country IS NOT NULL LIMIT 1";
if($cload = mysqli_query($mysqli,$csearch)){
	
if ($cload->num_rows == 0){}else{	
	
$countryrow = mysqli_fetch_row($cload);
	$country = $countryrow['16'];


	$_SESSION['country'] = $country;
	
	$setmycountry = "UPDATE users SET country='$country' WHERE id='$id'";
	mysqli_query($mysqli, $setmycountry);
}}}
?>




<?php 

$myregion = $_SESSION['myr'];
if($_SESSION['cancel'] != TRUE){
if($myregion == 'AF' ){$regionbutton = 'AFRICA';}
if($myregion == 'AS' ){$regionbutton = 'ASIA';}
if($myregion == 'EU' ){$regionbutton = 'EUROPE';}
if($myregion == 'ME' ){$regionbutton = 'MIDEAST';}
if($myregion == 'NA' ){$regionbutton = 'N. AMERICA';}
if($myregion == 'OC' ){$regionbutton = 'OCEANIA';}
if($myregion == 'SA' ){$regionbutton = 'S. AMERICA';}

if($_SESSION['paid'] == 1) {
echo "<table><tr><td>";
if($_SESSION['id']==1){echo "<a href='mforum_everyone.php' id='link1'>";}else{echo "<a href='mtravel_search.php' id='link1'>";}
echo "&#127758;&#127757;&#127759;</a></td>"; //unicode-table.com
if(isset($_SESSION['country'])){
	$mycountry = $_SESSION['country'];
	$_SESSION['searchcountry'] = NULL;
echo "<td><a href='mcforum.php#forum' id='link0'><strong>".$mycountry."</strong></a></td></tr></table>";	
}else{
echo "<td><a href='mqmr.php' id='link0'><strong>WRITE</strong></a></td></tr></table>";
}
}else{
	
echo "<table><tr><td><a href='mtravel_search.php' id='link1'><strong>TRAVEL</strong></a></td>";//mforum_everyone.php#forum OLD LINK
if(isset($_SESSION['country'])){
	$mycountry = strtoupper($_SESSION['country']);
echo "<td><a href='mcforum.php#forum' id='link0'><strong>".$mycountry."</strong></a></td></tr></table>";	
}else{
echo "<td><a href='mprofile.php' id='link0'><strong>PROFILE</strong></a></td></tr></table>";
}	
	
}
}

// SESSION CITY LINK TOP
$mycity = "SELECT * FROM users WHERE id='$id'";
		$mycityq = mysqli_query($mysqli,$mycity);
			if ($mc = mysqli_fetch_row($mycityq)){
				$homeagain = $mc['4'];
			echo "<a href='mforum.php' id='link2'><strong>".$mc['4']."</strong></a>";
			$_SESSION['city'] = $homeagain; }
			
			

			
?>

<section>

<!--<a href='mprofile.php?myimage'><button>VIEW MY IMAGE</button></a>-->



<?php //IMAGE LOAD
$id = $_SESSION['id'];

$imageload = "SELECT * FROM users WHERE id='$id'";
	$loading = mysqli_query($mysqli,$imageload);
	if (($row = mysqli_fetch_row($loading))){
		$myimage = $row['5'];
		
if($myimage == 'prof051487.jpg'){
	if($_SESSION['mf'] == 'F'){
		echo "<img width='100%'  src='img/f.jpg'>";	
		}else if ($_SESSION['mf'] == 'M'){
		echo "<img width='100%'  src='img/m.jpg'>";			
}}else{
	echo "<img width='100%'  src='profileimg/$myimage'>";
}}

//	echo "<img width='100%' src='profileimg/$homeimage'>";
	
//IMG FORM
if(isset($_POST['upload'])){
	
// IMAGE VARIABLES
$name = $_FILES['image']['name'];
	$type = $_FILES['image']['type'];
		$size = $_FILES['image']['size'];
			$temp = $_FILES['image']['tmp_name'];
				$error = $_FILES['image']['error'];
		$imgvar = explode('.',$name);
		$imgext = end($imgvar);
		$trueext = strtolower($imgext);
		
	$jpg = "jpg";
		$jpeg = "jpeg";
			$png = "png";
				$gif ="gif";
		
if($trueext == $jpg || $trueext == $jpeg || $trueext == $png || $trueext == $gif){

// DELETE OLD IMAGE
$id = $_SESSION['id'];
	$imageload = "SELECT * FROM users WHERE id='$id'";
		$loading = mysqli_query($mysqli,$imageload);
	if (($row = mysqli_fetch_row($loading))){
		$myimage = $row['5'];
		$id = $row['0'];
		if($myimage != "prof051487.jpg"){
		unlink("profileimg/$myimage"); }}

// CONTINUE	
	$profile = $id.'.'.$trueext;
	
	$change = "UPDATE users SET image='$profile' WHERE id='$id'";
	mysqli_query($mysqli, $change);


ini_set('memory_limit', '100M');	

		$post_photo = $_FILES['image']['name'];
				$post_photo_tmp = $_FILES['image']['tmp_name'];
					$fext = pathinfo($post_photo, PATHINFO_EXTENSION);
					$ext = strtolower($fext);
				if ($ext == 'png' || $ext == 'PNG' || $ext == 'jpg' || $ext == 'JPG' || $ext == 'jpeg' || $ext == 'JPEG' || $ext == 'gif' || $ext == 'GIF'){
					if ($ext == 'jpg' || $ext == 'JPG' || $ext == 'jpeg' || $ext == 'JPEG'){
						$src = imagecreatefromjpeg($post_photo_tmp);}
					if ($ext == 'png' || $ext == 'PNG'){
						$src = imagecreatefrompng($post_photo_tmp);}
					if ($ext == 'gif' || $ext == 'GIF'){
						$src = imagecreatefromgif($post_photo_tmp);}
				list($w,$h)=getimagesize($post_photo_tmp);
				$neww = 300;
				$newh = ($h/$w)*$neww;
				$newtemp = imagecreatetruecolor($neww,$newh);
				imagecopyresampled($newtemp,$src,0,0,0,0,$neww,$newh,$w,$h);
				imagejpeg($newtemp,"profileimg/$profile",80);
				imagedestroy($src);
					imagedestroy($newtemp);}


	echo "<br><a href='mprofile.php'><h1>IMAGE HAS BEEN UPLOADED.</h1></a><br>";
	$newupload = True;
} else {
echo "<br><span style='color:white'>jpg, png, or gif</span>";
}}

if($homeimage == "prof051487.jpg" ) {	echo "<br><span style='color:#ff69b4'>Please Upload A Picture</span>"; }

if($newupload == True){}else{

echo "<br>";

echo "<form id='changepic' action='mprofile.php' method='POST' enctype='multipart/form-data'>";
echo "<input type='file' name='image'><input type='submit' name='upload' value='UPLOAD'></form>";
}
?>


<?php

if($id == 1){
	$usercount = "SELECT COUNT(id) FROM users";
	$uc = mysqli_query($mysqli,$usercount);
	$showrow = mysqli_fetch_row($uc);
	echo "<h1>".$showrow['0']." USRS ";
	
	$citycount = "SELECT COUNT(DISTINCT city) FROM users";
	$cc = mysqli_query($mysqli,$citycount);
	$cshowrow = mysqli_fetch_row($cc);
	echo $cshowrow['0']." CITIES<br>";
	
	$today = date("Y-m-d");
	$todaycount = "SELECT COUNT(uid) FROM login WHERE logindate = '$today'";
	$ct = mysqli_query($mysqli,$todaycount);
	$deletecount = "DELETE FROM login WHERE logindate != '$today'";
	mysqli_query($mysqli,$deletecount);
	$todayrow = mysqli_fetch_row($ct);
	echo $todayrow['0']." TODAY</h1>";
}

?>

</section>


<footer>
<a href='https://ibizaglobalradio.com/player/' id='linkmusic' target='_blank'><strong>music</strong></a>
<table><tr><td>
<a href="settings.php?m" id="link3"><strong>SETTINGS</strong></a></td><td>
<a href="logout.php?m" id="logout"><strong>LOGOUT</strong></a></td></tr></table>


<?php

/*

echo "<ul>";

 /* EDIT QUOTES
$me = "SELECT * FROM users WHERE id='$id'";
$mein = mysqli_query($mysqli,$me);
	while ($listitem = mysqli_fetch_row($mein)) {
	echo "<li><a href='minbox_profile.php?uid=".$listitem['0']."' id='link4'><strong>QUOTES</strong></a></li>";}


 //INBOX

if($_SESSION['a'] != 'anyone'){
$central = "SELECT * FROM central WHERE receiving='$id' ORDER BY timeout DESC";
$messages = mysqli_query($mysqli,$central);
	while ($listitem = mysqli_fetch_row($messages)) {
if ($messages->num_rows > 0){
	
if($listitem['5'] == Null || $listitem['5'] == $_SESSION['country']){
echo "<li><a href='contact_profile.php?uid=".$listitem['1']."' id='mssg'>".$listitem['3']."</a></li>";			
		}else{
$country = $listitem['5'];
	include 'international.php';	
if(substr($listitem['3'],0,1) == $trunk){

echo "<li><a href='contact_profile.php?uid=".$listitem['1']."' id='mssg'>".$exitcode."/+ ".$countrycode." ".substr($listitem['3'],1)."</a></li>";

}else if (substr($listitem['3'],0,1) == '+'){

echo "<li><a href='contact_profile.php?uid=".$listitem['1']."' id='mssg'>".$listitem['3']."</a></li>";

}else if(is_numeric($listitem['3']) == False){

echo "<li><a href='contact_profile.php?uid=".$listitem['1']."' id='mssg'>".$listitem['3']."</a></li>";

}else {
	
echo "<li><a href='contact_profile.php?uid=".$listitem['1']."' id='mssg'>".$exitcode."/+ ".$countrycode." ".$listitem['3']."</a></li>";	
	
}
	}}}	

	//echo "<li><a href='contact_profile.php?uid=".$listitem['1']."' id='mssg'>".$listitem['3']."</a></li>";}}
	echo "<li><a href='' id='mssgib'><img src='img/down.png' width='20px'><strong> CONTACT INBOX </strong><img src='img/down.png' width='20px'></a></li>";
}



if($id == 1){
	echo "<li><a href='nudity.php' id='mssgib'><strong> NUDITY </strong></a></li>";
}
	echo "<li><a href='' id='mssgib'><img src='img/down.png' width='20px'><strong>PHONEBOOK</strong><img src='img/down.png' width='20px'></a></li>";
	
	
$pb = "SELECT * FROM phonebook WHERE uid='$id'";
$phonebook = mysqli_query($mysqli,$pb);
	while ($pbitem = mysqli_fetch_row($phonebook)) {
		if($pbitem['2'] == Null || $pbitem['2'] == $_SESSION['country']){
echo "<li><a href='contact_profile.php?uid=".$pbitem['3']."&pb' id='pb'>".$pbitem['1']."</a></li>";			
		}else{
$country = $pbitem['2'];
	include 'international.php';
	if(substr($pbitem['1'],0,1) == $trunk){

echo "<li><a href='contact_profile.php?uid=".$pbitem['3']."&pb' id='pb'>".$exitcode."/+ ".$countrycode." ".substr($pbitem['1'],1)."</a></li>";

}else if (substr($pbitem['1'],0,1) == '+'){

echo "<li><a href='contact_profile.php?uid=".$pbitem['3']."&pb' id='pb'>".$pbitem['1']."</a></li>";

}else if(is_numeric($pbitem['1']) == False){

echo "<li><a href='contact_profile.php?uid=".$pbitem['3']."&pb' id='pb'>".$pbitem['1']."</a></li>";

}else {
	
echo "<li><a href='contact_profile.php?uid=".$pbitem['3']."&pb' id='pb'>".$exitcode."/+ ".$countrycode." ".$pbitem['1']."</a></li>";	
	
}	
}}



echo "</ul>";





echo "<form action='contact_profile.php' method='POST'><h3>Search By Phone Number</h3><input type='text' name='contact' placeholder='Phone Number'><br><input type='submit' name='searchnumber' value='SEARCH'></form>";				 
	
	
*/	
	
// DONATE

if($myregion == 'none' ){
echo "<br><br><br>";
echo "<br><span style='color:#ff69b4'>Donate for Global Access</span>";
echo "<form action='https://www.paypal.com/cgi-bin/webscr' method='post' target='_blank'>";
echo "<input type='hidden' name='cmd' value='_s-xclick'>";
echo "<input type='hidden' name='hosted_button_id' value='U8TS6F2FB3BGE'>";
echo "<input type='image' src='https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif' border='0' name='submit' alt='PayPal - The safer, easier way to pay online!'>";
echo "<img alt='' border='0' src='https://www.paypalobjects.com/en_US/i/scr/pixel.gif' width='1' height='1'>";
echo "</form>";
echo "<br><br><br>";
	
}else{
//		echo "<li><a href='https://www.coinbase.com/' id='mssgic' target='_blank'><strong>DONATE to tkimssg@gmail.com for Global Access</strong><img width='100%'  src='img/BC.png'><strong>Include your login Email</strong></a></li>";
echo "<br><br><span style='color:#ff69b4'><strong>DONATE</strong></span><br><img width='250px' src='img/sol.png'><br><span style='color:#ff69b4;font-size: 10pt'>Address:<br>Gq9Gv34h6Y8noDiKpPk1HcT5gCJJD8Z6xNj1aSChtpv2</span>";	
		
}	
	
	

?>
</footer>

</div>
</body>
</html>