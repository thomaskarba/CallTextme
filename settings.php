<?php
require 'db.php';
session_start();

if ($_SESSION['id'] == Null){
	header("location: index.php");
}

$id = $_SESSION['id'];



if (isset($_GET['unsubscribe'])){
	

	$uid = $_GET['unsubscribe'];
	
	
	$result = $mysqli->query("SELECT * FROM users WHERE id='$uid'");

	$user = $result->fetch_assoc();

	
	$_SESSION['id'] = $user['id'];
	$id = $_SESSION['id'];
	

	
		// SESSION LOAD
				$sessionload = "SELECT * FROM users WHERE id='$id'";
				$loginquery = mysqli_query($mysqli, $sessionload);
				if ($logloc = mysqli_fetch_row($loginquery)){

				
						$homelocation = $logloc['4'];
						$_SESSION['city'] = $homelocation;
					
						$homeimage = $logloc['5'];
						$_SESSION['img'] = $homeimage;
					
						$homeq = $logloc['6'];
						$_SESSION['qmr'] = $homeq;
					
						$paid = $logloc['8'];
						$_SESSION['paid'] = $paid;
						
						$myregion = $logloc['9'];
						$_SESSION['myr'] = $myregion;

						$homeorientation = $logloc['11'];
						$_SESSION['ori'] = $homeorientation;
						
						$homesex = $logloc['12'];
						$_SESSION['mf'] = $homesex;
					
}

setcookie('login',$id,time()+864000);	
	
	
			$off = "off";
			$eupdate = "UPDATE users SET emailnotifications='$off' WHERE id='$id'";
			mysqli_query($mysqli,$eupdate);
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
	<title>QMR</title>
	<link rel="icon" href="img/ro.png">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
body{background-color:black;}
section{background-image:url("img/profile3.jpg");}
div{text-align:center;}
span{text-transform:uppercase;}
@import url('https://fonts.googleapis.com/css?family=Roboto+Mono:500');
	header{background-color:yellow;width:300px;text-align:center;
	font-family:'Roboto Mono',monospace;color:black;
	border:3px solid #000000;margin:auto;}

input[type=text]
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
	padding:5px 10px;}

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

#link1{font-family:'Roboto Mono',monospace;font-size:25px;padding:15px;text-decoration:none;display:block;}
#link1:link,#link1:visited{background:#415cf4 linear-gradient(to right,#2a2f47,#415cf4,#415cf4,#2a2f47);color:black;}
#link1:hover{background:#eb1e66 linear-gradient(to right,#59182f,#eb1e66,#eb1e66,#59182f);}
#link1:active{background-color:#000000;}

#mssg{font-family:'Roboto Mono',monospace;font-size:25px;padding:20px;text-decoration:none;display:block;}
#mssg:link,a:visited{background-color:#d4d4d4;color:black;}
#mssg:hover{background-color:#d4d4d4;}
#mssg:active{background-color:#000000;}
a{text-decoration:none;color:black;}
@import url('https://fonts.googleapis.com/css?family=Roboto+Mono:500');
footer{font-family:'Roboto Mono',monospace;font-size:18px;}
div{font-family:'Roboto Mono',monospace;}
mark{background-color:white;}
#warning{background-color:yellow;}
#tip{width:280px;margin:auto;}

nav{background-color:white;}
</style>
<body><div>

<nav>
<?php
if($id == 198){
	
	if(isset($_POST['re'])){
		$reg = mysqli_real_escape_string($mysqli,$_POST['region']);
		$loc = mysqli_real_escape_string($mysqli,$_POST['loc']);
		$setregion = "UPDATE updater SET region='$reg' WHERE location='$loc'";
		mysqli_query($mysqli, $setregion);
		$setmyregion = "UPDATE users SET region='$reg' WHERE city='$loc'";
		mysqli_query($mysqli, $setmyregion);		
	}
	
		$region = "SELECT * FROM updater WHERE region = '' LIMIT 1";
		$regions = mysqli_query($mysqli,$region);
			while ($rs = mysqli_fetch_row($regions)){
				$location = $rs['3'];
echo "<form action='settings.php' method='POST'><input type='hidden' name='loc' value='$location'><h3>".$location."</h3><input type='radio' name='region' value='AF'>AFRICA<input type='radio' name='region' value='AS'>ASIA<input type='radio' name='region' value='EU'>EUROPE<input type='radio' name='region' value='ME'>MIDDLE EAST<input type='radio' name='region' value='NA'>NORTH AMERICA<input type='radio' name='region' value='SA'>SOUTH AMERICA<input type='radio' name='region' value='OC'>OCEANIA<input type='submit' name='re' value='SET'></form>";				 
}

if(isset($_POST['countryinput'])){
		$country = $_POST['country'];
		$loc = mysqli_real_escape_string($mysqli,$_POST['loc']);
		$setmycountry = "UPDATE users SET country='$country' WHERE city='$loc'";
		mysqli_query($mysqli, $setmycountry);		
	}

		$cc = "SELECT * FROM users WHERE country IS NULL LIMIT 1";
		$country = mysqli_query($mysqli,$cc);
			while ($countryc = mysqli_fetch_row($country)){
				$location = $countryc['4'];
echo "<form action='settings.php' method='POST'><input type='hidden' name='loc' value='$location'><h3>".$location."</h3><input type='text' name='country' placeholder='".$location."'><br><input type='submit' name='countryinput' value='Country'></form>";				 
}
}
?>
</nav>


<?php
if(isset($_GET['m'])){
	echo "<a href='mprofile.php' id='link1'><img src='img/back.png' width='30px'></a>";
}else{
	echo "<a href='profile.php' id='link1'><img src='img/back.png' width='30px'></a>";
}
?>

<section>

<br>

<?php

// REGION
if(isset($_POST['re'])){
		$r = $_POST['region'];
		
if($r != $_SESSION['myr'] && $_SESSION['paid'] != 1){
// BITCOIN

if($r == 'AF' ){$iwantregion = 'Africa';}
if($r == 'AS' ){$iwantregion = 'Asia';}
if($r == 'EU' ){$iwantregion = 'Europe';}
if($r == 'ME' ){$iwantregion = 'Middle East';}
if($r == 'NA' ){$iwantregion = 'North America';}
if($r == 'OC' ){$iwantregion = 'Oceania';}
if($r == 'SA' ){$iwantregion = 'South America';}
if($r == Null ){$iwantregion = 'GLOBAL';}

	echo "<h1>Pay $5 in Bitcoin to gain access to ".$iwantregion.".</h1>";
	echo "<h2>to email: tkimssg@gmail.com</h2>";
	echo "<h3>Include your Login Email when sending payment</h3>";
	
if($id != 198){	$_SESSION['region'] = $_SESSION['myr'];}
	
}else{
if($id != 198){		
		$setmyregion = "UPDATE users SET region='$r' WHERE id='$id'";
		mysqli_query($mysqli,$setmyregion);				
}}}

?>

<?php // CONTACT & LOCATION TIMESTAMP 
if(isset($_POST['settings'])){
	
		if (($_POST['city'] == Null) && ($_POST['phone'] == Null)){}else {

		if (($_POST['city'] != Null) && ($_POST['phone'] != Null)){
			//CONTACT
			$pvar = $_POST['phone'];
			$phone = $pvar;
			$_SESSION['contact'] = $phone;
			$contact = "UPDATE users SET phone='$phone' WHERE id='$id'";
			mysqli_query($mysqli,$contact);
			echo "CONTACT CHANGED.";
				//CENTRAL LOCATION FORM
				$cvar = $_POST['city'];
				$city = mysqli_real_escape_string($mysqli,$cvar);
				$scontact = "UPDATE users SET city='$city' WHERE id='$id'";
				mysqli_query($mysqli,$scontact);
					$_SESSION['city'] = $city;
					
/*	$ccall = "SELECT country FROM users WHERE city='$city' LIMIT 1";
		$ccc = mysqli_query($mysqli,$ccall);
		if ($ccc->num_rows == 0){
			$_SESSION['country'] = Null;
			$country = Null;
		}else{
			$cinfo = mysqli_fetch_row($ccc);
		$newcountry = $cinfo['0'];
		$_SESSION['country'] = $newcountry;
		$country = $newcountry;
		}*/				
									
					
}
		
		elseif ($_POST['city'] == Null) {	
			//CONTACT
			$pvar = $_POST['phone'];
			$_SESSION['contact'] = $pvar;
			$phone = mysqli_real_escape_string($mysqli,$pvar);
			$contact = "UPDATE users SET phone='$phone' WHERE id='$id'";
			mysqli_query($mysqli,$contact);
			}
		
		elseif ($_POST['phone'] == Null){
		//CENTRAL LOCATION FORM
			$cvar = $_POST['city'];
			$city = mysqli_real_escape_string($mysqli,$cvar);
			$scontact = "UPDATE users SET city='$city' WHERE id='$id'";
			mysqli_query($mysqli,$scontact);
			$_SESSION['city'] = $city;
			
			
/*$ccall = "SELECT country FROM users WHERE city='$city' LIMIT 1";
		$ccc = mysqli_query($mysqli,$ccall);
		$cinfo = mysqli_fetch_row($ccc);
		$newcountry = $cinfo['country'];
		$_SESSION['country'] = $newcountry;
		$country = $newcountry;
				
	*/			
		
	
			
			
}
		
		// TIMESTAMP
		$scall = "SELECT * FROM users WHERE id='$id'";
		$settings = mysqli_query($mysqli,$scall);
			if ($myinfo = mysqli_fetch_row($settings)){
				$scon = $myinfo['3'];
					$scity = $myinfo['4'];
						$simage = $myinfo['5'];
							$sqmr = $myinfo['6'];
								$sa = $myinfo['7'];
									$sori = $myinfo['11'];
										$smf = $myinfo['12'];
	$country = $_SESSION['country'];
	
	




	//TIMESTAMP

$rsearch = "SELECT * FROM users WHERE city='$scity' AND region!='0' LIMIT 1";
if($rload = mysqli_query($mysqli,$rsearch)){
$regionrow = mysqli_fetch_row($rload);
	$cityregionc = $regionrow['9'];

	

if($cityregionc == Null){

echo "<form action='settings.php' method='POST'><input type='hidden' name='lo' value='$city'><h1>".$city."</h1><input type='radio' name='region' value='AF'>AFRICA?&nbsp;<input type='radio' name='region' value='AS'>ASIA?&nbsp;<input type='radio' name='region' value='EU'>EUROPE?&nbsp;<input type='radio' name='region' value='ME'>MIDDLE EAST?&nbsp;<input type='radio' name='region' value='NA'>NORTH AMERICA?&nbsp;<input type='radio' name='region' value='SA'>SOUTH AMERICA?&nbsp;<input type='radio' name='region' value='OC'>OCEANIA? <input type='submit' name='re' value='SET'></form>";
	
} elseif($cityregionc != $_SESSION['myr']) {

	echo "<h1>Pay $5 in Bitcoin to gain access to <small>Africa, Asia, Europe, Middle East, North America, Oceania, South America</small>.</h1>";
	echo "<h2>email: tkimssg@gmail.com</h2><br><h3>Include your Login Email when sending payment</h3></div>";
	$_SESSION['region'] = $_SESSION['myr'];




}else{
		$setmyregion = "UPDATE users SET region='$cityregionc' WHERE id='$id'";
		mysqli_query($mysqli,$setmyregion);		
	$_SESSION['region'] = $cityregionc;
	
}		

//$formcheck = "SELECT * FROM updater WHERE location='$scity' AND region!='0' LIMIT 1";
//$rload = mysqli_query($mysqli,$formcheck);
}			
			
	//TIMESTAMP
		}
		
		echo "Updated";
		
	
}		
}
?>

<?php 
//AVAILABILITY FORM works
	if(isset($_POST['ava'])){
		
		$avail = $_POST['availability'];
		$contact = "UPDATE users SET availability='$avail' WHERE id='$id'";
	mysqli_query($mysqli,$contact);
	}
	
// EMAIL NOTIFICATIONS
		if (isset($_POST['emailon'])){
			$on = "on";
			$eupdate = "UPDATE users SET emailnotifications='$on' WHERE id='$id'";
			mysqli_query($mysqli,$eupdate);
}
		
		if (isset($_POST['emailoff'])){
			$off = "off";
			$eupdate = "UPDATE users SET emailnotifications='$off' WHERE id='$id'";
			mysqli_query($mysqli,$eupdate);
}
//SHARE			
if(isset($_GET['share1'])){
		$sethide = "UPDATE users SET share='1' WHERE id='$id'";
		mysqli_query($mysqli, $sethide);
$share = 1;		
}
if(isset($_GET['share0'])){
		$sethide = "UPDATE users SET share='0' WHERE id='$id'";
		mysqli_query($mysqli, $sethide);
$share = 0;		
}
// INTL OR LOCAL
	if(isset($_POST['localintl'])){
		$callsetting = $_POST['callsetting'];
	$callsetting = "UPDATE users SET localintl='$callsetting' WHERE id='$id'";
	mysqli_query($mysqli,$callsetting);
	
}
//SHOW ORIENTATION
		if (isset($_POST['ori'])){
			$strgay = $_POST['orientation'];
			$sorient = "UPDATE users SET orientation='$strgay' WHERE id='$id'";
			mysqli_query($mysqli,$sorient);
		$_SESSION['ori'] = $strgay;			 							
										
}
// GAY PRIVACY
if(isset($_GET['hide'])){
		$sethide = "UPDATE users SET hide='1' WHERE id='$id'";
		mysqli_query($mysqli, $sethide);
$hide = 1;		
}
if(isset($_GET['hide1'])){
		$sethide = "UPDATE users SET hide='0' WHERE id='$id'";
		mysqli_query($mysqli, $sethide);
$hide = 0;		
}
//WALLET FORM
	if(isset($_POST['bitcoin'])){
		$postbitcoin = $_POST['wallet'];
		$bitcoin = mysqli_real_escape_string($mysqli,$postbitcoin);
	mysqli_query($mysqli,"UPDATE users SET btc='$bitcoin' WHERE id='$id'");
	}
	
//AMOUNT FORM
	if(isset($_POST['solform'])){
		$postbitcoin = $_POST['sol'];
		$bitcoin = mysqli_real_escape_string($mysqli,$postbitcoin);
	mysqli_query($mysqli,"UPDATE users SET price='$bitcoin' WHERE id='$id'");
	}	





// INPUT CONTACT & LOCATION
$id = $_SESSION['id'];
$aboutmeload = "SELECT * FROM users WHERE id='$id'";
$amloading = mysqli_query($mysqli,$aboutmeload);
$row = mysqli_fetch_row($amloading);
$mycontact = $row['3'];
$mycity = $row['4'];
$availability = $row['7'];
$bitcoin = $row['8'];
$email=$row['10'];
$orientation = $row['11'];
$price = $row['14'];
$localintl = $row['19'];
$share = $row['21'];
echo "<form action='settings.php' method='POST'><input type='text' name='phone' placeholder='".$mycontact."'><br><input type='text' name='city' placeholder='".$mycity."'><br><input type='submit' name='settings' value='CHANGE'></form>"; 

// SHOW NOTIFICATIONS

if($email == 'off'){
echo "<mark><strong> EMAIL NOTIFICATIONS: </strong><form action='settings.php' method='POST'><input type='submit' name='emailon' value='TURN ON'></mark>"; } else {
echo "<mark><strong> EMAIL NOTIFICATIONS: </strong><form action='settings.php' method='POST'><input type='submit' name='emailoff' value='TURN OFF'></mark>"; }
			
echo "<br>";
// SHOW SHARE
/*
if($share == 1){
	echo "<a href='settings.php?share0'><mark>SHARING TO FACEBOOK</mark></a><br><br>";
}elseif($share == 0){
	echo "<a href='settings.php?share1'><mark>NO SHARING TO FACEBOOK</mark></a><br><br>";
}
*/			
//SHOW LOCALINTL
if ($localintl == 0){
echo "<form action='settings.php' method='POST'><input type='radio' name='callsetting' value='0' checked><mark>INT'L</mark><input type='radio' name='callsetting' value='1'><mark>".$_SESSION['country']." ONLY</mark><input type='submit' name='localintl' value='CHANGE'></form>";				
}
if ($localintl == 1){
echo "<form action='settings.php' method='POST'><input type='radio' name='callsetting' value='0'><mark>INT'L</mark><input type='radio' name='callsetting' value='1' checked><mark>".$_SESSION['country']." ONLY</mark><input type='submit' name='localintl' value='CHANGE'></form>";
}
				
// SHOW ORIENTATION
			if($orientation=='str'){
echo "<form action='settings.php' method='POST'><input type='radio' name='orientation' value='str' checked><mark>STR</mark><input type='radio' name='orientation' value='gay'><mark>GAY</mark><input type='submit' name='ori' value='CHANGE'></form>";				 
			 }
			if($orientation=='gay'){
echo "<form action='settings.php' method='POST'><input type='radio' name='orientation' value='str'><mark>STR</mark><input type='radio' name='orientation' value='gay' checked><mark>GAY</mark><input type='submit' name='ori' value='CHANGE'></form>";				
}

// SHOW GAY PRIVACY
if($_SESSION['ori'] == 'gay' & $hide == 0){
	echo "<a href='profile.php?hide'>CLICK FOR GAY ONLY PRIVACY</a><br><br>";
}elseif($_SESSION['ori'] == 'gay' & $hide == 1){
	echo "<a href='profile.php?hide1'>CLICK FOR OPENLY GAY</a><br><br>";
}

//SHOW AVAILABILITY
			if ($availability == 'choice'){
echo "<form action='settings.php' method='POST'><input type='radio' name='availability' value='choice' checked><mark>SELL</mark><input type='radio' name='availability' value='anyone'><mark>ANYONE</mark><input type='submit' name='ava' value='PRIVACY'></form>";				
//AMOUNT			
echo "<form action='settings.php' method='POST'><input type='text' name='sol' placeholder='Enter Amount (SOL)'><br><input type='submit' name='solform' value='SET AMOUNT'></form>";			
if(isset($price)){
	echo "<b>Your Price:".$price." SOL</b><br>";
}
echo "MUST SET WALLET BELOW<br><br>";
}
				if ($availability == 'anyone'){
echo "<form action='settings.php' method='POST'><input type='radio' name='availability' value='choice'><mark>SELL</mark><input type='radio' name='availability' value='anyone' checked><mark>ANYONE</mark><input type='submit' name='ava' value='PRIVACY'></form>";
				}

// RECEIVE BITCOIN

if($bitcoin == "0"){$bitcoin = "Solana Address";}
echo "<form action='settings.php' method='POST'><input type='text' name='wallet' placeholder='".$bitcoin."'><br><input type='submit' name='bitcoin' value='SET SOLANA: WALLET'></form>";

/*
if(isset($_GET['paid'])){
	
echo "<br>Pay 0.0001 Bitcoin to gain access Everyone";
echo "<br>to email: <a id='paid' target='_blank' href='https://www.coinbase.com/international'>Click <u>tkimssg@gmail.com</u></a>";
echo "<br>Include your Login Email when sending payment<br><br>";
	
}else{

echo "<a href='settings.php?paid#paid'><button>I want more numbers</button></a><br><br>";	

}
*/

?>


<a href="safety.php?settings"><mark><span style="color:red">SAFETY</span></mark></a>&nbsp;&nbsp;&nbsp;&nbsp;

<a href="quote_disclaimer.html"><mark><span style="color:#eb1e66">RULES</span></mark></a><br>

<?php
//echo "<br><a href='delete.php?delete=".$id."'><span style='color:red'>DELETE ACCOUNT</span></a>";


echo "<br><form action='delete.php' method='POST'><input type='hidden' name='id' value='$id'><input type='submit' name='delete' value='DELETE ACCOUNT'></form>";				




?>

<br><br>
</section>
<footer>

<?php
if(isset($_GET['m'])){
	echo "<a href='mprofile.php' id='link1'><img src='img/back.png' width='30px'></a>";
}else{
	echo "<a href='profile.php' id='link1'><img src='img/back.png' width='30px'></a>";
}
?>

</footer>

</div></body>
</html>