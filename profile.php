<?php
require 'db.php';
session_start();

//if($_SESSION['id'] == Null){
//	if($_COOKIE['login'] == Null){ header("location: index.php"); }
//	$id = $_COOKIE['login'];
//	$_SESSION['id'] = $id;
//}

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
						
						$_SESSION['lon'] = $logloc['24'];
						$_SESSION['lat'] = $logloc['25'];
						
						$paid = $logloc['26'];
						$_SESSION['paid'] = $paid;						

						
					
						
						
setcookie('login',$id,time()+864000);						
}}

if(isset($_GET['login'])){
	$uid = $_GET['login'];
	

	
	
	$result = $mysqli->query("SELECT * FROM users WHERE email='$uid'");
if ($result->num_rows == 0){
	$_SESSION['message'] = "SIGNUP";
    header("location: error.php");
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
					
						$homeimage = $logloc['5'];
						$_SESSION['img'] = $homeimage;
						$homeimg = $_SESSION['img'];
					
						$name = $logloc['6'];
						$_SESSION['name']=$name;
						
						$availability = $logloc['7'];
						$_SESSION['a'] = $availability;
						
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
					
						$_SESSION['lon'] = $logloc['24'];
						$_SESSION['lat'] = $logloc['25'];	
						
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
						
						$availability = $logloc['7'];
						$_SESSION['a'] = $availability;
											
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

						$_SESSION['lon'] = $logloc['24'];
						$_SESSION['lat'] = $logloc['25'];	

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
if($id != 1){	
	
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





// PAY

if(isset($_POST['pay'])) {
$whopay = $_POST['uid'];
$mysqli->query("UPDATE users SET btc = 1 WHERE email='$whopay'");

	$headers = 'From: QuoteMyRelationship.com' . "\r\n".
		'Reply-To: tkimssg@gmail.com' . "\r\n" .
		'X-Mailer: PHP/' . phpversion() . "\r\n" .
		'Content-type: text/html; charset=iso-8859-1';
		
		
		$address = $whopay;
		$subject = "CallText.me ~ GLOBAL ACCESS";
		$body = "<a href='http://CallText.me/profile.php?login=".$whopay."'>YOU NOW HAVE GLOBAL ACCESS TO QMR!</a><br><br> 
		<br>ALL REGIONS ARE NOW AVAILABLE TO YOU.<br>
		Thank You for Donating
		<br><br>";	
mail($address,$subject,$body,$headers);

}
	
	$id = $_SESSION['id'];
$earliestid = "DELETE FROM users WHERE email='$uid' AND id!='$id'";
		mysqli_query($mysqli, $earliestid);		
	
	
if($_SESSION['id'] == 0){mysqli_close($mysqli); header("location: index.php"); }







if($_SESSION['new'] = 1){
$citytosend = $_SESSION['city'];
$oritosend = $_SESSION['ori'];
$mftosend = $_SESSION['mf'];
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

if ($crowd = mysqli_query($mysqli, $others)){

mysqli_query($mysqli, "DELETE FROM updater where repeater IN (SELECT repeater FROM (SELECT repeater, COUNT(id) as cid from updater GROUP BY id) t1 WHERE cid = 2)")	;


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
		$body = "<br>New ".$gender." in ".$citytosend." 
<br>
		<h3>".$contact."</h3>
<br><br><b>DO NOT REPLY</b><br>
To stop receiving these Emails <a href='http://CallText.me/settings.php?unsubscribe=".$contents['0']."'>Unsubscribe</a>";	
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
<script type="text/javascript">
if (screen.width<700){
	window.location="mprofile.php";
}
</script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
body{background-color:black;}
div{text-align:center;}
table{width:100%;height:100%;}
@import url('https://fonts.googleapis.com/css?family=Roboto+Mono:500');
header{background-color:yellow;width:296px;text-align:center;
	font-family:'Roboto Mono',monospace;color:#5b5b5b;margin:auto;}

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
#link{font-family:'Roboto Mono',monospace;font-size:25px;padding:15px;text-decoration:none;display:block;}
#link:link,#link:visited{background:#e8dc5f linear-gradient(to right,#565338,#e8dc5f,#e8dc5f,#565338);color:black;}
#link:hover{background:#eb1e66 linear-gradient(to right,#59182f,#eb1e66,#eb1e66,#59182f)}
#link:active{background:#000000 linear-gradient(to right,#000000,#000000,#000000,#000000);}

#link0{font-family:'Roboto Mono',monospace;font-size:25px;padding:15px;text-decoration:none;display:block;}
#link0:link,#link0:visited{background:#ba90d1 linear-gradient(to right,#47394f,#ba90d1,#ba90d1,#47394f);color:black;}
#link0:hover{background:#eb1e66 linear-gradient(to right,#59182f,#eb1e66,#eb1e66,#59182f)}
#link0:active{background:#000000 linear-gradient(to right,#000000,#000000,#000000,#000000);}

#link1{font-family:'Roboto Mono',monospace;font-size:25px;padding:15px;text-decoration:none;display:block;}
#link1:link,#link1:visited{background:#415cf4 linear-gradient(to right,#2a2f47,#415cf4,#415cf4,#2a2f47);color:black;}
#link1:hover{background:#eb1e66 linear-gradient(to right,#59182f,#eb1e66,#eb1e66,#59182f)}
#link1:active{background:#000000 linear-gradient(to right,#000000,#000000,#000000,#000000);}

#link2{font-family:'Roboto Mono',monospace;font-size:25px;padding:15px;text-decoration:none;display:block;}
#link2:link,#link2:visited{background:#f4a941 linear-gradient(to right,#593a0e,#f4a941,#f4a941,#593a0e);color:black;}
#link2:hover{background:#eb1e66 linear-gradient(to right,#59182f,#eb1e66,#eb1e66,#59182f)}
#link2:active{background:#000000 linear-gradient(to right,#000000,#000000,#000000,#000000);}

#link3{font-family:'Roboto Mono',monospace;font-size:25px;padding:15px;text-decoration:none;display:block;}
#link3:link,#link3:visited{background:#a6e283 linear-gradient(to right,#404f37,#a6e283,#a6e283,#404f37);color:black;}
#link3:hover{background:#eb1e66 linear-gradient(to right,#59182f,#eb1e66,#eb1e66,#59182f)}
#link3:active{background:#000000 linear-gradient(to right,#000000,#000000,#000000,#000000);}

#mssg{font-family:'Roboto Mono',monospace;font-size:25px;padding:15px;text-decoration:none;display:block;}
#mssg:link,#mssg:visited{background:#d4d4d4 linear-gradient(to right,#424242,#d4d4d4,#d4d4d4,#424242);color:black;}
#mssg:hover{background:#eb1e66 linear-gradient(to right,#59182f,#eb1e66,#eb1e66,#59182f)}
#mssg:active{background:#000000 linear-gradient(to right,#000000,#000000,#000000,#000000);}

#mssgib{font-family:'Roboto Mono',monospace;font-size:25px;padding:15px;text-decoration:none;display:block;}
#mssgib:link,#mssgib:visited{background:#c6597d linear-gradient(to right,#4c2130,#c6597d,#c6597d,#4c2130);color:black;}
#mssgib:hover{background:#eb1e66 linear-gradient(to right,#59182f,#eb1e66,#eb1e66,#59182f)}
#mssgib:active{background:#000000 linear-gradient(to right,#000000,#000000,#000000,#000000);}

#mssgic{font-family:'Roboto Mono',monospace;font-size:25px;padding:12px;text-decoration:none;display:block;}
#mssgic:link,#mssgib:visited{background:#FDFFB5 linear-gradient(to right,#929700,#FDFFB5,#FDFFB5,#929700);color:black;}
#mssgic:hover{background:#eb1e66 linear-gradient(to right,#2a2b00,#c5c938,#c5c938,#2a2b00);}
#mssgic:active{background-color:#000000;}

#music{font-family:'Roboto Mono',monospace;font-size:25px;padding:15px;text-decoration:none;display:block;visibility:visible;}
#music:link,#music:visited{background:#F5F2F2 linear-gradient(to right,#F5F2F2,#F5F2F2,#F5F2F2,#F5F2F2);color:black;}
#music:hover{background:#F5F2F2 linear-gradient(to right,#F5F2F2,#F5F2F2,#F5F2F2,#F5F2F2)}<!--878585-->
#music:active{background:#000000 linear-gradient(to right,#000000,#000000,#000000,#000000);}


a{text-decoration:none;color:black;}
@import url('https://fonts.googleapis.com/css?family=Roboto+Mono:500');
div,header,a{font-family:'Roboto Mono',monospace;text-align:center;}
form{font-family:'Roboto Mono',monospace;}
#qmr{margin:auto;text-align:center;width:280px;text-transform:uppercase;}
table{margin:0;padding:0;}
section{background:#6d6d6d linear-gradient(to right,#000000,#6d6d6d,#6d6d6d,#000000);height:450px;}
	p{margin:auto;font-family:'Roboto Mono',monospace;width:300px;}
	
article{color:white;}	
	
#region{background-color:white;}	
h1{color:red;}

#qmrs{border:1px solid white;}

#profileimage {max-height:80%;max-width:280px;}

#white {background:#FFFFFF;max-height:100px;}

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
			
				
			if(strpos(strtolower($qmr),"drop")==TRUE | strpos(strtolower($qmr),"delete")==TRUE){
		mysqli_close();
	}		

		$quote = mysqli_real_escape_string($mysqli,$_POST['fname']);
		$enter = "UPDATE users SET name='$quote' WHERE id='$id'";
		$result = mysqli_query($mysqli, $enter);
		$_SESSION['name'] = 1;	
			}}
//QMR FORM
if($_SESSION['new'] == 1 & $_SESSION['name'] == NULL){
echo "<form action='profile.php' method='POST'><textarea name='fname' rows='1' cols='26' placeholder='First Name'></textarea><br><input type='submit' name='name' value='WHAT IS YOUR NAME?'></form>"; 
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

#WRITE TO QMR
if (isset($_POST['writetoqmr'])){
	echo "<div><h1>Your Message will be reviewed.</h1></div>";
}
#WRITE TO USER
	if (isset($_POST['messagetouser'])){
		$uid = $_POST['uid'];
		$qmr = $_POST['quote'];
			$quote = mysqli_real_escape_string($mysqli,$_POST['quote']);
				$enter = "INSERT INTO messagetouser (touserid, message) VALUES ('$uid', '$qmr')";
					mysqli_query($mysqli, $enter);
	}
#USERS MESSAGE
$mycall = "SELECT * FROM messagetouser WHERE touserid = '$id'";
	$myload = mysqli_query($mysqli,$mycall);
		while ($mr = mysqli_fetch_row($myload)) {
			$mid = $mr['0'];
			$mymessage = $mr['2'];
	echo "<div><h1>".$mymessage."</h1></div>";

		$delete = "DELETE FROM messagetouser WHERE messageid='$mid'";
		mysqli_query($mysqli,$delete);	
	
}
	

// SECURITY

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
	
	$cancel = TRUE;
	
}	
	
	
}

// LOGIN COUNT
if($_SESSION['id'] != 0 && $_SESSION['id'] != 1){
if($_SESSION['logintoday'] != True){
$id = $_SESSION['id'];
$today = date("Y-m-d");
$mobile = 0;
$homeori = $_SESSION['ori'];
$homemf = $_SESSION['mf'];
$logincount = "INSERT INTO login (uid,logindate,sex,ori,mobile) VALUES ('$id','$today','$homemf','$homeori','$mobile')";
		mysqli_query($mysqli, $logincount);
	$_SESSION['logintoday'] = True;	
}}


if($_SESSION['myr'] == Null){
	
$rsearch = "SELECT * FROM updater WHERE location='$homecity' AND region!='0' LIMIT 1";
if($rload = mysqli_query($mysqli,$rsearch)){
	
	if ($rload->num_rows == 0){
		
echo "<div id='region'><p><h1>WHERE IS ".$homecity."???</h1></p><br><form action='profile.php' method='POST'><input type='hidden' name='lo' value='$homecity'><h1>".$homecity."</h1><input type='radio' name='region' value='AF'>AFRICA?&nbsp;<input type='radio' name='region' value='AS'>ASIA?&nbsp;<input type='radio' name='region' value='EU'>EUROPE?&nbsp;<input type='radio' name='region' value='ME'>MIDDLE EAST?&nbsp;<input type='radio' name='region' value='NA'>NORTH AMERICA?&nbsp;<input type='radio' name='region' value='SA'>SOUTH AMERICA?&nbsp;<input type='radio' name='region' value='OC'>OCEANIA? <input type='submit' name='re' value='SET'></form><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></div>";
		
	}else{
		
		
$regionrow = mysqli_fetch_row($rload);
	$cityregionc = $regionrow['2'];

	$setregion = "UPDATE updater SET region='$cityregionc' WHERE id='$id'";
	mysqli_query($mysqli, $setregion);
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
	
echo "<div id='region'><h1> Click REGION ".$cityregionc."</h1><a href='profile.php?change'><button>REGION</button></a><p>&nbsp;</p></div>";	
		
		
	}

	
	
}}

if($_SESSION['country'] == Null){
	
$csearch = "SELECT * FROM users WHERE city='$homecity' AND country IS NOT NULL LIMIT 1";
if($cload = mysqli_query($mysqli,$csearch)){
	
if ($cload->num_rows == 0){}else{	
	
$countryrow = mysqli_fetch_row($cload);
	$country = $countryrow['16'];

	$setcountry = "UPDATE updater SET country='$country' WHERE id='$id'";
	mysqli_query($mysqli, $setcountry);
	$_SESSION['country'] = $country;
	
	$setmycountry = "UPDATE users SET country='$country' WHERE id='$id'";
	mysqli_query($mysqli, $setmycountry);
}}}


if(isset($_GET['change'])){
	
echo "<div id='region'><p>WHERE IS ".$homecity."???</p><br><form action='profile.php' method='POST'><input type='hidden' name='lo' value='$homecity'><h1>".$homecity."</h1><input type='radio' name='region' value='AF'>AFRICA?&nbsp;<input type='radio' name='region' value='AS'>ASIA?&nbsp;<input type='radio' name='region' value='EU'>EUROPE?&nbsp;<input type='radio' name='region' value='ME'>MIDDLE EAST?&nbsp;<input type='radio' name='region' value='NA'>NORTH AMERICA?&nbsp;<input type='radio' name='region' value='SA'>SOUTH AMERICA?&nbsp;<input type='radio' name='region' value='OC'>OCEANIA? <input type='submit' name='re' value='SET'></form></div>";	
	
}


if($_SESSION['id']==1){
echo "<a href='travel_search.php?g' id='link1'><strong>Travel</strong></a>";
}
?>



<table width="100%">
	<tr>	
		
<?php	
$regionbutton = $_SESSION['myr'];

if($regionbutton == 'AF' ){$regionbutton = 'AFRICA';}
if($regionbutton == 'AS' ){$regionbutton = 'ASIA';}
if($regionbutton == 'EU' ){$regionbutton = 'EUROPE';}
if($regionbutton == 'ME' ){$regionbutton = 'MIDDLE EAST';}
if($regionbutton == 'NA' ){$regionbutton = 'NORTH AMERICA';}
if($regionbutton == 'OC' ){$regionbutton = 'OCEANIA';}
if($regionbutton == 'SA' ){$regionbutton = 'SOUTH AMERICA';}
if($cancel != TRUE){

if($_SESSION['id'] == 1) {
echo "<td width='33.33%'><a href='forum_everyone.php?g' id='link1'><strong>Forum E</strong></a>	</td><td width='33.3%'>";
}elseif($_SESSION['paid'] == 1) {
echo "<td width='33.3%'><a href='travel_search.php?g' id='link1'><strong>TRAVEL</strong></a>	</td><td width='33.3%'>";
}else{
	echo "<td width='33.3%'><a href='travel_search.php' id='link1'><strong>TRAVEL</strong></a>	</td><td width='33.3%'>";
}}		
?>	

<?php // SESSION CITY LINK TOP
$mycity = "SELECT * FROM users WHERE id='$id'";
		$mycityq = mysqli_query($mysqli,$mycity);
			if ($mc = mysqli_fetch_row($mycityq)){
				$homeagain = $mc['4'];
			echo "<a href='forum.php' id='link0'><span style='text-transform:uppercase'><strong>".$mc['4']."</strong></span></a>";
			$_SESSION['city'] = $homeagain; }
?>

</td>

<td width="33.3%">

<?php
if($cancel != TRUE){
if(isset($_SESSION['country'])){
	$mycountry = strtoupper($_SESSION['country']);
echo "<a href='cforum.php?ts=1' id='link'><strong>".$mycountry."</strong></a>";	
}else{
echo "<a href='profile.php' id='link'><strong>PROFILE</strong></a>";	
}}
?>
</td>

</tr><tr>

<td width="33.3%">
 
<!--<img src="img/heart.gif" width="100%" height="450px">-->

<!--
<a href="https://ad.admitad.com/g/vbnovi30pq942acd6855ed464edc45">
<p style="position:absolute;font-family: 'Roboto Mono',monospace;color:#C0C0C0;margin-top:8%;margin-left:3.5%">
With CallText.me you <br>have a friend almost <br>anywhere you travel.</p>
<img src="img/airplaneprofilebw.jpg">
</a>
-->

</td><td width="33.3%">

<section>

<?php
/*
if($id == 1){
echo "<form action='profile.php' method='POST'><input type='text' name='uid' placeholder='EMAIL'><br><input type='submit' name='pay' value='paid'></form>";
}
*/


?>



<?php //IMAGE LOAD

if(isset($_GET['rotate'])){
	
$direction = $_GET['direction'];
if ($direction == 'right'){
$direction = 90;}else{$direction = 270;}	
	
$myimage = $_SESSION['img'];
$path = "profileimg/".$myimage; 
$imgvar = explode('.',$myimage);
$imgext = end($imgvar);
$ext = strtolower($imgext);
	$jpg = "jpg";
		$jpeg = "jpeg";
			$png = "png";
				$gif ="gif";	 
header('Content-type: image/jpeg');
if ($ext == 'png' || $ext == 'PNG' || $ext == 'jpg' || $ext == 'JPG' || $ext == 'jpeg' || $ext == 'JPEG' || $ext == 'gif' || $ext == 'GIF'){
					if ($ext == 'jpg' || $ext == 'JPG' || $ext == 'jpeg' || $ext == 'JPEG'){
						$img = imagecreatefromjpeg($path);}
					if ($ext == 'png' || $ext == 'PNG'){
						$img = imagecreatefrompng($path);}
					if ($ext == 'gif' || $ext == 'GIF'){
						$img = imagecreatefromgif($path);} 
						
$rotate = imagerotate($img, $direction, 0);  
imagejpeg($rotate,"profileimg/$myimage",100);

echo "<img id='profileimage' border='2px' src='profileimg/$myimage'>";	
imagedestroy($img);
imagedestroy($image);	
}

echo "<br>IMAGE HAS BEEN ROTATED. MAY TAKE 1 HOUR TO SHOW.";

}else{

//IMAGE LOAD

$id = $_SESSION['id'];
$myimage = $_SESSION['img'];
		
if($myimage == 'prof051487.jpg'){
	if($_SESSION['mf'] == 'F'){
		echo "<img width='280px' border='2px' src='img/f.jpg'>";	
		}else if ($_SESSION['mf'] == 'M'){
		echo "<img width='280px' border='2px' src='img/m.jpg'>"; //m2 for ad and f2			
}}else{
	echo "<img id='profileimage' border='2px' src='profileimg/$myimage'>";
}		
}
	
// IMAGE SIZE	
	/*	$path = "profileimg/".$myimage;
		list($width,$height) = getimagesize($path);
	echo "<br><span style='color:white'>".$height."</span>"; */

	

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


	echo "<br><a href='profile.php'>IMAGE HAS BEEN UPLOADED</a><br>";
} else {

echo "<br><span style='color:white'>Image Format must be<br>JPG PNG or GIF</span>";
}}

if($myimage == "prof051487.jpg" ) {	echo "<br><span style='color:#ff69b4'>Upload Picture</span>"; }

elseif(isset($_GET['changeimage'])){

echo "<form action='profile.php' method='GET'>";
echo "<input type='radio' name='direction' value='left' checked>&#10549;";
echo "<input type='radio' name='direction' value='right' >&#10548;";
echo "<br><input type='submit' name='rotate' value='ROTATE'></form>";
	
}

if(isset($_GET['changeimage'])){
	
echo "<form id='changepic' action='profile.php' method='POST' enctype='multipart/form-data'>";
echo "<input type='file' name='image'><br><input type='submit' name='upload' value='UPLOAD'></form>";
	
	
}



?>

<br><a href='profile.php?changeimage=1'>CHANGE IMAGE</button></a>

<?php

if($id == 1){
	$usercount = "SELECT COUNT(id) FROM users";
	$uc = mysqli_query($mysqli,$usercount);
	$showrow = mysqli_fetch_row($uc);
	echo "<h1>".$showrow['0']." USERS ";
	
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

</td>
	
	<td width="33.3%">
	
<!--	<img src="img/heart.gif" width="100%" height="450px"> -->


<span style='color:#ff69b4'><strong>DONATE to CallText.me</strong></span><br><img width='30%'  src='img/sol.png'><br><img width='30%'  src='img/recieve.png'>
<br><small><span style='color:#ff69b4'>Gq9Gv34h6Y8noDiKpPk1HcT5gCJJD8Z6xNj1aSChtpv2</small></span>
<br>
<?php 
if($_SESSION['country']=='USA'){echo "<a href='https://ftx.us/#a=4478369' target='blank'>";}
else{echo "<a href='https://ftx.com/#a=4478369' target='blank'>";}
?>
<span style='color:#ff69b4'>BUY HERE</span></a>
<!--<br><a href='settings.php'><span style='color:#ffffff'>SELL YOUR PHONE NUMBER IN SETTINGS</span></a>-->
	
	</td></tr>
	
	<tr><td colspan="3">

<table width="100%">


<?php
/*
if($_SESSION['a']=='choice'){

echo "<tr><td width='33.3%'>";

// EDIT QUOTES
	echo "<a href='inbox_profile.php?uid=".$id."' id='link2'><strong>QUOTES</strong></a>";


echo "</td><td width='33.3%'><a href='settings.php' id='link3'><strong>SETTINGS</strong></a></td><td width='33.3%'><a href='logout.php' id='mssg'><strong>LOGOUT</strong></a></td></tr>";


}else{*/

echo "<td width='50%'><a href='settings.php' id='link3'><strong>SETTINGS</strong></a></td><td width='50%'><a href='logout.php' id='mssg'><strong>LOGOUT</strong></a></td></tr>";

//}

?>




<tr><td><ul>

<?php //INBOX
/*
if($_SESSION['a'] != 'anyone'){
$central = "SELECT * FROM central WHERE receiving='$id' ORDER BY timeout DESC";
$messages = mysqli_query($mysqli,$central);
	while ($listitem = mysqli_fetch_row($messages)) {
		if($listitem['5'] == Null || $listitem['5'] == $_SESSION['country']){
echo "<li><a href='contact_profile.php?uid=".$listitem['1']."' id='mssg'>".$listitem['3']." ".$listitem['4']."</a></li>";			
		}else{
$country = $listitem['5'];
	include 'international.php';
	if(substr($listitem['3'],0,1) == $trunk){

echo "<li><a href='contact_profile.php?uid=".$listitem['1']."' id='mssg'>".$exitcode."/+ ".$countrycode." ".substr($listitem['3'],1)." ".$listitem['4']."</a></li>";

}else if (substr($listitem['3'],0,1) == '+'){

echo "<li><a href='contact_profile.php?uid=".$listitem['1']."' id='mssg'>".$listitem['3']." ".$listitem['4']."</a></li>";

}else if(is_numeric($listitem['3']) == False){

echo "<li><a href='contact_profile.php?uid=".$listitem['1']."' id='mssg'>".$listitem['3']." ".$listitem['4']."</a></li>";

}else {
	
echo "<li><a href='contact_profile.php?uid=".$listitem['1']."' id='mssg'>".$exitcode."/+ ".$countrycode." ".$listitem['3']." ".$listitem['4']."</a></li>";	
	
}	

		}}
	echo "<li><a href='' id='mssgib'><img src='img/down.png' width='20px'><strong> CONTACT INBOX </strong><img src='img/down.png' width='20px'></a></li>";
}*/
?>


<?php
if($id == 1){
//	echo "<li><a href='nudity.php' id='mssgib'><strong> NUDITY </strong></a></li>";
	
}
/*
	echo "<li><a href='' id='mssgib'><img src='img/down.png' width='20px'><strong>PHONEBOOK</strong><img src='img/down.png' width='20px'></a></li>";
	
	
$pb = "SELECT * FROM phonebook WHERE uid='$id'";
$phonebook = mysqli_query($mysqli,$pb);
	while ($pbitem = mysqli_fetch_row($phonebook)) {
		if($pbitem['2'] == Null || $pbitem['2'] == $_SESSION['country']){
echo "<li><a href='contact_profile.php?uid=".$pbitem['3']."&pb' id='mssg'>".$pbitem['1']."</a></li>";			
		}else{
$country = $pbitem['2'];
	include 'international.php';
	if(substr($pbitem['1'],0,1) == $trunk){

echo "<li><a href='contact_profile.php?uid=".$pbitem['3']."&pb' id='mssg'>".$exitcode."/+ ".$countrycode." ".substr($pbitem['1'],1)."</a></li>";

}else if (substr($pbitem['1'],0,1) == '+'){

echo "<li><a href='contact_profile.php?uid=".$pbitem['3']."&pb' id='mssg'>".$pbitem['1']."</a></li>";

}else if(is_numeric($pbitem['1']) == False){

echo "<li><a href='contact_profile.php?uid=".$pbitem['3']."&pb' id='mssg'>".$pbitem['1']."</a></li>";

}else {
	
echo "<li><a href='contact_profile.php?uid=".$pbitem['3']."&pb' id='mssg'>".$exitcode."/+ ".$countrycode." ".$pbitem['1']."</a></li>";	
	
}	
}}*/
?>
</ul>

<a href="http://www.ibizaglobalradio.com/player/" target="popup" onclick="window.open('http://www.ibizaglobalradio.com/player/','name','width=600,height=600')"><img height="90" src='img/igr.jpg'></a>

<!--<a id='music' onclick="radio(); return false;" href=''><img height="90" src='img/igr.jpg'></a>
<script>
function radio() {
    document.getElementById("music").innerHTML = "<iframe src='http://www.ibizaglobalradio.com/player/' width='600px' height='900px' name='iframe' frameborder='0'></iframe>";
}
</script>
-->

	


</td></tr></table></table>

<?php

if($id == 1){
/*
	if(isset($_GET['mssg'])){
		$mssgid = $_GET['mssg'];
		$delete = "DELETE FROM messages WHERE messageid='$mssgid'";
		mysqli_query($mysqli,$delete);
	}


echo "<table id='qmrs'>";
$counter = 0;
$mrcall = "SELECT * FROM messages ORDER BY timestamp DESC LIMIT 20";
	$mrload = mysqli_query($mysqli,$mrcall);
		while ($mr = mysqli_fetch_row($mrload)) {
			if ($counter == 20){break;} else {
				$mid = $mr['0'];
			$quote = $mr['2'];
					echo "<tr><td id='qmrs'><a href='inbox_profile.php?mssg=".$mid."'><img src='img/x.png'></a></td><td id='qmrs'><a href='viewe_profile.php?mid=".$mid."'><article><span style='font-size:20px'>".$quote."</span></article></a></td></tr>";
					$counter++;}
								}
echo "</table>";	*/	




//$command = escapeshellcmd('mailgun.py');
//$output = shell_exec('mailgun.py');
//echo $output;



						
}				
								
								
?>



<?php	

// DONATE
if($_SESSION['paid'] != 1){
if($myregion == 'none' ){ // use to be == NA
echo "<br><span style='color:#ff69b4'><h2>Donate for Global Access</h2></span>";
echo "<form action='https://www.paypal.com/cgi-bin/webscr' method='post' target='_blank'>";
echo "<input type='hidden' name='cmd' value='_s-xclick'>";
echo "<input type='hidden' name='hosted_button_id' value='U8TS6F2FB3BGE'>";
echo "<input type='image' src='https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif' border='0' name='submit' alt='PayPal - The safer, easier way to pay online!'>";
echo "<img alt='' border='0' src='https://www.paypalobjects.com/en_US/i/scr/pixel.gif' width='1' height='1'>";
echo "</form>";
echo "<br><br><br>";
	
}else{
	//	echo "<a href='https://www.coinbase.com/' id='mssgic' target='_blank'><strong>DONATE to tkimssg@gmail.com for Global Access</strong><br><img width='50%'  src='img/BC.png'><br><strong>Include your login Email</strong></a>";
	//	echo "<span style='color:#ff69b4'><strong>DONATE HERE</strong></span><br><img width='30%'  src='img/BC.png'><br><img width='30%'  src='img/recieve.png'>";
}	
}

//echo "<form action='contact_profile.php' method='POST'><input type='text' name='contact' placeholder='Phone Number'><br><input type='submit' name='searchnumber' value='SEARCH'></form>";				 

//echo "<br><span style='color:#ff69b4'><strong>DONATE HERE</strong></span><br><img width='30%'  src='img/BC.png'><br><img width='30%'  src='img/recieve.png'><br><span style='color:#ff69b4'>14f9DyK2CokMPdwnhFS9ttnU73UaGrQaz8</span>";


if($id == 1){

/*

if(isset($_GET['donate'])){


// EMAIL
	
//	$theirinfo = "SELECT * FROM users WHERE id='$iwant'";
//	$noting = mysqli_query($mysqli, $theirinfo);
//	$letemknow = mysqli_fetch_row($noting);
		$address = 'thomas@karba.com';
		$subject = "DONATE";
		$body = "<form action='https://www.paypal.com/cgi-bin/webscr' method='post' target='_blank'><input type='hidden' name='cmd' value='_s-xclick'><input type='hidden' name='hosted_button_id' value='U8TS6F2FB3BGE'><input type='image' src='https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif' border='0' name='submit' alt='PayPal - The safer, easier way to pay online!'><img alt='' border='0' src='https://www.paypalobjects.com/en_US/i/scr/pixel.gif' width='1' height='1'></form>";	
mail($address,$subject,$body);
} else {
	echo "<a href='profile.php?donate=1'>DONATE</a>";
}*/
}

if($id != 1){
echo "<br><br><br><br><br><br><br><br><br><br><br><br>";
}
//WRITE TO QMR
$id = $_SESSION['id'];
	if (isset($_POST['writetoqmr'])){
		$qmr = $_POST['quote'];
			$quote = mysqli_real_escape_string($mysqli,$_POST['quote']);
			
			
//			if(strpos(strtolower($qmr),"drop")==TRUE | strpos(strtolower($qmr),"users")==TRUE){
//		mysqli_close();
//	}			
				$enter = "INSERT INTO writetoqmr (writerid, message) VALUES ('$id', '$qmr')";
					$result = mysqli_query($mysqli, $enter);
	}
$id = $_SESSION['id'];
$aboutmeload = "SELECT * FROM users WHERE id='$id'";
$amloading = mysqli_query($mysqli,$aboutmeload);
if ($row = mysqli_fetch_row($amloading)){
$aboutme = $row['6'];
echo "<form action='profile.php' method='POST'><textarea name='quote' rows='4' cols='50'></textarea><br><input type='submit' name='writetoqmr' value='SUPPORT ~ WRITE TO CallText.me'></form>"; }


if($id == 1){

	if(isset($_GET['writetodelete'])){
		$mssgid = $_GET['writetodelete'];
		$delete = "DELETE FROM writetoqmr WHERE messageid='$mssgid'";
		mysqli_query($mysqli,$delete);
	}


echo "<table id='qmrs'>";
$counter = 0;
$mrcall = "SELECT * FROM writetoqmr ORDER BY messageid DESC LIMIT 20";
	$mrload = mysqli_query($mysqli,$mrcall);
		while ($mr = mysqli_fetch_row($mrload)) {
			if ($counter == 20){break;} else {
				$mid = $mr['0'];
				$writerid = $mr['1'];
			$quote = $mr['2'];
					echo "<tr><td id='qmrs'><a href='profile.php?writetodelete=".$mid."#qmrs'><img src='img/x.png'></a></td><td id='qmrs'><a href='viewe_profile.php?mid=".$mid."'><article><span style='font-size:20px'>".$quote."</span></article></a></td></tr>";
					$counter++;}
								}
echo "</table>";							
}
?>
</div>
</body>
</html>