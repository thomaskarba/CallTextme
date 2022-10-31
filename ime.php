<?php
require 'db.php';
session_start();
$contact = $_POST['contact'];
	if(!preg_match("/[a-zA-Z]/",$contact)){
		$contact = str_replace(" ","",$contact);
	}
$_SESSION['contact'] = $contact;
$region = $_SESSION['myr'];
$_SESSION['region'] = $region;

if(isset($_POST['country'])){
	$_SESSION['country'] = strtoupper($_POST['country']);
	$countrytest = $_SESSION['country'];
}else{
$countrytest = $_SESSION['country'];
}


if(is_numeric($contact)){
	
if (substr($contact,0,1) == '+'){
	
	$contactsearch = substr($contact,1,2);
	include 'international.php';
	if($country == Null){
	$contactsearch = substr($contact,1,3);
	include 'international.php';
	}
	if($country == NULL){
		$country = $countrytest;
	}
}else{
	$country = $countrytest;
}}

if($country != $countrytest & substr($contact,0,1) == '+'){
	
$csearch = "SELECT * FROM users WHERE country='$country' AND region!='0' LIMIT 1";
if($cload = mysqli_query($mysqli,$csearch)){
$countryrow = mysqli_fetch_row($cload);
	$_SESSION['myr'] = $countryrow['9'];
	$_SESSION['region'] = $countryrow['9'];
	$region = $_SESSION['myr'];
	$_SESSION['city'] = $country;
	$_SESSION['country']=$country;
}
}

if(is_null($country)){
	$country = $countrytest;
}

?>
<!DOCTYPE html>
<html>
<head>
<title>QMR</title>
<link rel="stylesheet" type="text/css" href="style.css"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Dating">
<meta name="keywords" content="single,lonely,gf,bf,horny,sex,relationship,dating,xxx,latinas,meet singles,social media">
<style type="text/css">
body{background-color:black;}
@import url('https://fonts.googleapis.com/css?family=Roboto+Mono:500');
#link{font-family:'Roboto Mono',monospace;font-size:25px;padding:20px;text-decoration:none;display:block;}
#link:link,a:visited{background-color:yellow;color:black;}
#link:hover{background-color:#eb1e66;}
#link:active{background-color:#000000;}
a {width:200px;text-align:center;margin:auto;}
section{text-align:center;color:white;}
mark{background-color:red;}
#login{font-family:'Roboto Mono',monospace;font-size:25px;color:yellow;}
p{color:yellow;font-size:20px;text-align:center;background-color:black;font-size:30px;}
#form{margin:auto;}
</style>

<body>

<?php

if (isset($_POST['info'])){

if(isset($_SESSION['gender']) && isset($_SESSION['orientation']) && isset($_SESSION['city']) && isset($_SESSION['contact']) && isset($_SESSION['email'])){

$email = mysqli_real_escape_string($mysqli,$_SESSION['email']);
$sex = $_SESSION['gender'];
$orientation = $_SESSION['orientation'];
$city = mysqli_real_escape_string($mysqli,$_SESSION['city']);
$contact = mysqli_real_escape_string($mysqli,$_SESSION['contact']);

$country = $_SESSION['country'];

$csearch = "SELECT * FROM users WHERE country='$country' AND region!='0' LIMIT 1";
if($cload = mysqli_query($mysqli,$csearch)){
	
if ($cload->num_rows == 0){
	$variable = 1;
}else{	

$countryrow = mysqli_fetch_row($cload);
	$region = $countryrow['9'];
}
}


if($email == True || $city == True || $contact == True){
	
if($_SESSION['country'] == "NOTLISTED"){

$_SESSION['country'] == NULL;	
	$stepone = "INSERT INTO users (email,phone,city,orientation,sex) VALUES ('$email','$contact','$city','$orientation','$sex')";
	if ($mysqli->query($stepone)){
	$_SESSION['mf'] = $sex;
	$_SESSION['city'] = $city;
} 

$one = "SELECT id FROM users WHERE email='$email'";
	$two = mysqli_query($mysqli, $one);
		$idrow = mysqli_fetch_row($two);
		$id = $idrow['0'];
$avail = "anyone";
$img = "prof051487.jpg";


}else{
	
$_SESSION['myr']=$region;
$_SESSION['region'] = $_SESSION['myr'];
$country = $_SESSION['country'];
	
	$stepone = "INSERT INTO users (email,phone,city,orientation,sex) VALUES ('$email','$contact','$city','$orientation','$sex')";
	if ($mysqli->query($stepone)){
	$_SESSION['mf'] = $sex;
	$_SESSION['city'] = $city;
} 

	$steptwo = "UPDATE users SET region='$region',country='$country' WHERE email='$email'";
	mysqli_query($mysqli,$steptwo);

$one = "SELECT id FROM users WHERE email='$email'";
	$two = mysqli_query($mysqli, $one);
		$idrow = mysqli_fetch_row($two);
		$id = $idrow['0'];
$avail = "anyone";
$img = "prof051487.jpg";	
	
	
}
				
				

		$image = "profileimg/".$img;
		
		echo	"<a href='profile.php?login=".$email."' target='_parent'><div id='login'><strong>CLICK HERE, LOGIN WITH ".$email."</strong></div></a><br><br>";
		echo "<div id='form'><form action='https://www.paypal.com/cgi-bin/webscr' method='post' target='_blank'><input type='hidden' name='cmd' value='_s-xclick'><input type='hidden' name='hosted_button_id' value='U8TS6F2FB3BGE'><input type='image' src='https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif' border='0' name='submit' alt='PayPal - The safer, easier way to pay online!'><img alt='' border='0' src='https://www.paypalobjects.com/en_US/i/scr/pixel.gif' width='1' height='1'></form></div>";
} else { echo "<section><strong><form action='icontact.php' method='POST'><input type='email' name='email' placeholder='EMAIL*'><input type='text' name='city' placeholder='CITY*'><br><input type='submit' name='location' value='ENTER'></form></strong></section>"; 
}}}
$_SESSION['new'] = 1;
?>

</body>
</html>