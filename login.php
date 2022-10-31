<?php
require 'db.php';
session_start();



$region = $_SESSION['myr'];
$_SESSION['region'] = $region;
	
$contact = $_POST['contact'];
	if(!preg_match("/[a-zA-Z]/",$contact)){
		$contact = str_replace(" ","",$contact);
	}
$_SESSION['contact']=$contact;
	

if(isset($_POST['country'])){
	$_SESSION['country'] = strtoupper($_POST['country']);
	$countrytest = $_SESSION['country'];
}else{
$countrytest = $_SESSION['country'];
}


if(is_numeric($contact)){
	
	echo "NUMERIC";//
	
if (substr($contact,0,1) == '+'){
	
	$contactsearch = substr($contact,1,2);
	include 'international.php';
	if($country == Null){
	$contactsearch = substr($contact,1,3);
	include 'international.php';
	}
	
	echo $contactsearch;//
	echo $country;//
	
	
	if($country == NULL){
		$country = $countrytest;
	}
}else{
	$country = $countrytest;
}}

	echo $country;//

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
}else{
	
$country = $_SESSION['country'];


		$rsearch = "SELECT DISTINCT region FROM users WHERE country='$country' AND region!='0'";
		$rload = mysqli_query($mysqli,$rsearch);
		$regionrow = mysqli_fetch_row($rload);
		$_SESSION['myr'] = $regionrow['0'];
		$_SESSION['region'] = $regionrow['0'];	
	
}

if(is_null($country)){
	$country = $countrytest;
}	



?>
<!DOCTYPE html>
<html>
<head>
<title>QMR</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Dating">
<meta name="keywords" content="single,lonely,gf,bf,horny,sex,relationship,dating,xxx,latinas,meet singles,social media">
<style type="text/css">
@import url('https://fonts.googleapis.com/css?family=Playfair+Display:900');
@import url('https://fonts.googleapis.com/css?family=Roboto+Mono');
p{color:#d9d8e8;font-size:20px;text-align:center;background-color:black;font-size:30px;}
.form{background:linear-gradient(#5e5151,#bab9c7,#c7ced6);width:275px;border-radius:12px;}
a:link,a:visited,a:hover,a:active{color:#d9d8e8;}
li{font-size:20px;}
nav,footer{text-align:center;font-family:'Roboto Mono',monospace;font-size:20px;}
iframe{text-align:center;}
aside{font-family:'Roboto Mono',monospace;font-size:10px;text-align:left;color:black;width:300px;}
table{width:100%;}
td{float:left;}
mark{background-color:white;}
h1{background-color:white;}

body{background-color:black;text-align:center;font-family: 'Roboto', sans-serif;text-align:center;}
<!--body{background-image:url("img/bg.png");font-family: 'Roboto', sans-serif;text-align:center;}-->
header{background:#48D1CC linear-gradient(to bottom,#2c7067,#48D1CC);width:180px;text-align:center;
font-family: 'Playfair Display', serif;color:#29245c;
border:1px solid #52ffe8;margin:auto;}
form{font-family:'Roboto', sans-serif;font-size:17px;text-decoration:none;}
div{text-align:center;margin:auto;}
h2{color:#f2f2f2;}

a {text-decoration:none;}

ul li {list-style-type:none;margin:0;padding:0;}
li{/*display:inline*/;margin:0;padding:0;}
li a{padding:10px;}
footer{text-align:center;font-size:12px;}

@import url('https://fonts.googleapis.com/css?family=Dosis:500');
input[type=text],input[type=email],input[type=password],select{
	padding: 3px 3px;margin: 5px;border: 1px solid #dce4f2;border-radius:10px;
	font-family: 'Dosis', sans-serif;font-size:20px;background-color:#dae3e1;color:#7b868f;}

input[type=submit]{
	background-color:#4a4e82;color:black;border:0;margin-bottom:20px;margin-top:5px;
	font-family: 'Dosis', sans-serif;font-size:20px;padding:15px 55px;}

input[type=submit]:hover{
	background-color:#75778f;
}

input[type=text]:focus,
input[type=email]:focus,
input[type=password]:focus{
	background-color:#f7f7f7;border: 1px solid #868e9c;}

article{text-align:center;background-color:#221f38;width:600px;margin:auto;border:1px solid #a15778;border-radius:15px;}

header{background:#48D1CC linear-gradient(to bottom,#2c7067,#48D1CC);width:200px;text-align:center;
color:#29245c;
border:1px solid #52ffe8;margin:auto;}
form{font-family:'Roboto', sans-serif;font-size:17px;text-decoration:none;}
div{text-align:center;margin:auto;}
h2{color:#f2f2f2;}

.form{margin:auto;background:linear-gradient(#5e5151,#bab9c7,#c7ced6);width:200px;border-radius:12px;}

form{font-family:'Roboto', sans-serif;font-size:17px;text-decoration:none;}

</style>

<body>

<?php
///////////////////////////////////////////////////////////////////
if (isset($_POST['info'])){

if ($_POST['contact'] == Null) {

echo "<img src='img/ro.png' width='100px'><strong><form action='login.php' method='POST'><input type='text' name='contact' placeholder='CONTACT*'><br><input type='submit' name='info' value='NEXT'></form></strong>";

 } else {

$contact = mysqli_real_escape_string($mysqli,$_SESSION['contact']);	

$email = mysqli_real_escape_string($mysqli,$_SESSION['email']);
$sex = $_SESSION['mf'];
$ori = $_SESSION['ori'];
$city = mysqli_real_escape_string($mysqli,$_SESSION['city']);


	$country = $_SESSION['country'];
	
	
	
$csearch = "SELECT DISTINCT * FROM users WHERE country='$country' AND region!='0'";
if($cload = mysqli_query($mysqli,$csearch)){
	
if ($cload->num_rows == 0){
	$variable = 1;
	
}else{	

if($_SESSION['myr']==NULL){
$countryrow = mysqli_fetch_row($cload);
	$region = $countryrow['9'];
}else{

$region=$_SESSION['myr'];	
	
}



}
}


if($_SESSION['country'] == "NOTLISTED"){

$_SESSION['country'] == NULL;	
	
$stepone = "INSERT INTO users (email,phone) VALUES ('$email','$contact')";
	mysqli_query($mysqli,$stepone);
	
	$steptwo = "UPDATE users SET city='$city',orientation='$ori',sex='$sex' WHERE email='$email'";
	mysqli_query($mysqli,$steptwo);	
	
	
}else{
	
		$country = $_SESSION['country'];

		$rsearch = "SELECT DISTINCT region FROM users WHERE country='$country' AND region!='0'";
		$rload = mysqli_query($mysqli,$rsearch);
		$regionrow = mysqli_fetch_row($rload);
		$_SESSION['myr'] = $regionrow['0'];
		$_SESSION['region'] = $regionrow['0'];	
	

$region = $_SESSION['myr'];
$_SESSION['region'] = $region;	


$_SESSION['myr']=$region;
$_SESSION['region'] = $_SESSION['myr'];
$country = $_SESSION['country'];	
	
$stepone = "INSERT INTO users (email,phone) VALUES ('$email','$contact')";
	mysqli_query($mysqli,$stepone);
	
	$steptwo = "UPDATE users SET city='$city',region='$region',orientation='$ori',sex='$sex',country='$country' WHERE email='$email'";
	mysqli_query($mysqli,$steptwo);	



}

	/*
	$to = $email;
	$subject = 'QuoteMyRelationship.com - EMAIL VERIFY';
	$body = '
        Hello '.$user.',

        ACTIVATE ACCOUNT. CLICK ON LINK http://QuoteMyRelationship.com/verify.php?email='.$email.'&hash='.$hash;

		mail($to,$subject,$body);	*/
	
$one = "SELECT id FROM users WHERE email='$email'";
	$two = mysqli_query($mysqli, $one);
		$idrow = mysqli_fetch_row($two);
		$id = $idrow['0'];	
	
	
	$avail = "anyone";
	$img = "prof051487.jpg";

		echo "<a href='mprofile.php?login=".$email."' target='_parent'><div id='login'><span style='font-size:30px'><strong>CLICK HERE, LOGIN WITH ".$email."</strong></span></div></a><br><div class='form'><form action='profile.php' method='POST'><input type='email' name='uid' placeholder='EMAIL'><br><input type='submit' name='login' value='LOGIN'></form></div><br>";
		echo "<a href='terms.html'>TERMS</a>";
echo "<br><br><a href='#'>OPENS NEW WINDOW TO \/</a><br><div id='form'><form action='https://www.paypal.com/cgi-bin/webscr' method='post' target='_blank'><input type='hidden' name='cmd' value='_s-xclick'><input type='hidden' name='hosted_button_id' value='U8TS6F2FB3BGE'><input type='image' src='https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif' border='0' name='submit' alt='PayPal - The safer, easier way to pay online!'><img alt='' border='0' src='https://www.paypalobjects.com/en_US/i/scr/pixel.gif' width='1' height='1'></form></div>";
}}
$_SESSION['new'] = 1;
?>

</footer>

<br>

</body>
</html>