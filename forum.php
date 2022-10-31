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
		$sessionloc = $_SESSION['city'];
		
$csearch = "SELECT * FROM users WHERE city='$city' AND region!='0'  AND country IS NOT NULL LIMIT 1";
if($cload = mysqli_query($mysqli,$csearch)){
$countryrow = mysqli_fetch_row($cload);
	$searchcountry = $countryrow['16'];
	$_SESSION['searchcountry'] = $searchcountry;	
}	
		
		}		

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

// REGION

	if (isset($_POST['region'])){
		
		$region = $_POST['continent'];
		$_SESSION['region'] = $region;}
	
	if($_SESSION['region'] == Null){
		
$myregion = "SELECT * FROM users WHERE id='$id'";
	$regionmove = mysqli_query($mysqli, $myregion);
		$mr = mysqli_fetch_row($regionmove);
		$_SESSION['region'] = $mr['9'];
			$region = $_SESSION['region'];
		} else {
	$region = $_SESSION['region'];
		}	

if(isset($_GET['city'])){
	$sessionloc = $_GET['city'];
	$_SESSION['city'] = $_GET['city'];
	
	if(isset($_GET['email'])){
$email = $_GET['email'];
		$login = "SELECT * FROM users WHERE email='$email'";		
			$loginsend = mysqli_query($mysqli, $login);
				$mylogin = mysqli_fetch_row($loginsend);
										
						$id = $mylogin['0'];
						$_SESSION['id'] = $id;
					
						$myregion = $mylogin['9'];
						$_SESSION['myr'] = $myregion;
						
						$homelocation = $mylogin['4'];
						$_SESSION['city'] = $homelocation;
					
						$paid = $mylogin['8'];
						$_SESSION['paid'] = $paid;
						
						$homeorientation = $mylogin['11'];
						$_SESSION['ori'] = $homeorientation;
						
						$homesex = $mylogin['12'];
						$_SESSION['mf'] = $homesex;
						
	$city = $_SESSION['city'];
	
$rsearch = "SELECT * FROM users WHERE city='$city' AND region!='0' LIMIT 1";
if($rload = mysqli_query($mysqli,$rsearch)){
	$regionrow = mysqli_fetch_row($rload);
		$cityregionc = $regionrow['9'];
$_SESSION['region'] = $cityregionc;}

						$homeorientation = $mylogin['11'];
						$_SESSION['ori'] = $homeorientation;
						$homeori = $_SESSION['ori'];
						
						$homesex = $mylogin['12'];
						$_SESSION['mf'] = $homesex;
						$homemf = $_SESSION['mf'];
}}


if(isset($_GET['email'])){
$email = $_GET['email'];
		$login = "SELECT * FROM users WHERE email='$email'";		
			$loginsend = mysqli_query($mysqli, $login);
				$mylogin = mysqli_fetch_row($loginsend);
										
						$id = $mylogin['0'];
						$_SESSION['id'] = $id;
					
						$myregion = $mylogin['9'];
						$_SESSION['myr'] = $myregion;
						$_SESSION['region'] = $myregion;
						
						$homelocation = $mylogin['4'];
						$_SESSION['city'] = $homelocation;
						
						$homeimage = $mylogin['5'];
						$_SESSION['img'] = $homeimage;
					
						$paid = $mylogin['8'];
						$_SESSION['paid'] = $paid;
						
						$homeorientation = $mylogin['11'];
						$_SESSION['ori'] = $homeorientation;
						
						$homesex = $mylogin['12'];
						$_SESSION['mf'] = $homesex;
}
				
?>
<!DOCTYPE html>
<html>
<head>
<title>CallText.<?php echo $_SESSION['city'];?></title>
<script type="text/javascript">
if (screen.width<700){
	window.location="mforum.php";
}
</script>
<script type="text/javascript" src="qrcode.js"></script>
<script src="https://solpay.togatech.org/sdk.js" type="text/javascript"></script>
<script src="pay.js" type="text/javascript"></script>
<link rel="icon" href="img/ro.png">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
@import url('https://fonts.googleapis.com/css?family=Roboto+Mono:500');

body{font-family:'Roboto Mono',monospace;color:white;background-image:url("img/forum10.jpg");text-align:center;}

header{<!--background-image:url("img/rainbow2.gif");-->text-align:center;font-family:'Roboto Mono',monospace;color:#6A6874;
	margin:auto;background-color:black;}

#center{text-align:center;}

#cell{text-align:center;width:275px;font-size:20px;text-transform:uppercase;}

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

footer{position: relative;left: 0;width: 100%;bottom: 0;}
table{width:100%;margin:0;}

#a{display:block;border:4px solid #6A6874;color:#6A6874;font-size:20px;text-decoration:none;}
#b{display:block;border:1px solid #608bd1;color:#efdcee;font-size:35px;text-decoration:none;}

p{text-transform:uppercase;color:white;}

option{text-transform:capitalize;}
#ad{margin:0 auto;}

#pic{max-height:250px;width: auto;}
</style>
</head>
<body>


<header>

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

// BITCOIN

if($_SESSION['region'] != $_SESSION['myr'] && $_SESSION['paid'] != 1){
	
if($_SESSION['region'] == 'AF' ){$iwantregion = 'Africa';}
if($_SESSION['region'] == 'AS' ){$iwantregion = 'Asia';}
if($_SESSION['region'] == 'EU' ){$iwantregion = 'Europe';}
if($_SESSION['region'] == 'ME' ){$iwantregion = 'Middle East';}
if($_SESSION['region'] == 'NA' ){$iwantregion = 'North America';}
if($_SESSION['region'] == 'OC' ){$iwantregion = 'Oceania';}
if($_SESSION['region'] == 'SA' ){$iwantregion = 'South America';}
if($_SESSION['region'] == Null ){$iwantregion = 'GLOBAL';}

echo "<div id='btc'><h1>Pay 0.0005 Bitcoin to gain access to ".$iwantregion.".</h1>";
	echo "<h2>to email: tkimssg@gmail.com</h2>";
	echo "<br><h3>Include your Login Email when sending payment</h3></div>";
	$_SESSION['region'] = $_SESSION['myr'];
	
}


?>

<table><tr><td>

<?php


echo $_SESSION['city'].", ";
if(isset($_SESSION['searchcountry'])){echo $_SESSION['searchcountry'];}else{echo $_SESSION['country'];};

echo "</td><td>";

// LGBT SETTING
if($_SESSION['ori'] == 'gay'){
	
echo "</td><td>";	

if(isset($_GET['qmr']) || isset($_GET['return'])){}
else{
	if($_SESSION['orisearch'] == Null){
	$_SESSION['orisearch'] = 1;
}else if ($_SESSION['orisearch'] == 1){
}else{
	$_SESSION['orisearch'] = 2;
}}	


if(isset($_GET['lgbt'])){
if($_GET['lgbt'] == 0){
	$_SESSION['orisearch'] = 2;
}else{
	$_SESSION['orisearch'] = 1;
}}

if($_SESSION['orisearch'] == 1){
		echo "<a href='forum.php?lgbt=0'><img src='img/lgbt.png' width='40px'></a>";
}else if($_SESSION['orisearch'] == 2){
		echo "<a href='forum.php?lgbt=1'><img src='img/lgbtunclicked.png' width='40px'></a>";	
}
}

// F M
if(isset($_GET['f'])){
	if($_GET['f'] == 1){
			echo "<a href='forum.php?f=2'><img src='img/forumflinkclicked.png' height='60px'></a><a href='forum.php?m=1'><img src='img/forummlink.png' height='60px'></a>";	
	$_SESSION['f'] = 1;
	$_SESSION['m'] = Null;}
	if($_GET['f'] == 2){
		echo "<a href='forum.php?f=1'><img src='img/forumflink.png' height='60px'></a><a href='forum.php?m=1'><img src='img/forummlink.png' height='60px'></a>";	
$_SESSION['m'] = Null;
$_SESSION['f'] = Null;
}}
elseif(isset($_GET['m'])){
	if($_GET['m'] == 1){
			echo "<a href='forum.php?f=1'><img src='img/forumflink.png' height='60px'></a><a href='forum.php?m=2'><img src='img/forummlinkclicked.png' height='60px'></a>";
	$_SESSION['m'] = 1;	
	$_SESSION['f'] = Null;}
	if($_GET['m'] == 2){
		echo "<a href='forum.php?f=1'><img src='img/forumflink.png' height='60px'></a><a href='forum.php?m=1'><img src='img/forummlink.png' height='60px'></a>";	
$_SESSION['f'] = Null;
$_SESSION['m'] = Null;
		}
}
elseif(isset($_SESSION['f'])){
	echo "<a href='forum.php?f=2'><img src='img/forumflinkclicked.png' height='60px'></a><a href='forum.php?m=1'><img src='img/forummlink.png' height='60px'></a>";
}
elseif(isset($_SESSION['m'])){
	echo "<a href='forum.php?f=1'><img src='img/forumflink.png' height='60px'></a><a href='forum.php?m=2'><img src='img/forummlinkclicked.png' height='60px'></a>";
}else{
echo "<a href='forum.php?f=1'><img src='img/forumflink.png' height='60px'></a><a href='forum.php?m=1'><img src='img/forummlink.png' height='60px'></a>";	
}
?>


</td><td>


<a id='a' href='travel_search.php'><strong>&#9992;&#65039; &#128506;&#65039; &#128663;</strong></a>

</td><td>

<a id='a' href=<?php 


if(isset($_SESSION['searchcountry'])){echo 'cforum.php?ts=2';}else{echo 'cforum.php?ts=1';}?>><strong><?php if(isset($_SESSION['searchcountry'])){echo $_SESSION['searchcountry'];}else{echo $_SESSION['country'];}?></strong></a>


</td><td>

<a id="a" href='profile.php'><strong>PROFILE</strong></a>

</td>
<td>

<a href='https://phantom.app' target='_blank'><img src='img/phantom.png' width='35px'></a>

</td><td>
Connect 
<a href='' onclick="connectPhantom();return false;">Phantom</a>
<a href='' onclick="connectSolflare();return false;">Solflare</a> Wallet
<button onclick="buyItem();">Donate 0.001 SOL</button>

</td>


</tr>
</table>

</header>

<?php 

if(isset($_GET['return'])){
	
		if(isset($_GET['s'])){
		
		$return = $_GET['s'];
		} else {
		$return = $_GET['return'];}
		
	
	//AFTER ADD FORUM LOAD
	
	$id = $_SESSION['id'];
		$sessionmf = $_SESSION['mf'];
			$sessionori = $_SESSION['ori'];
				$sessionloc = $_SESSION['city'];
				
if($_SESSION['orisearch'] == 1){				

if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if(is_null($_SESSION['m']) == FALSE){
$mfsql = 'M';}
if(is_null($_SESSION['f']) == FALSE){
$mfsql = 'F';	}

$others = "SELECT * FROM users WHERE orientation='gay' AND city = '$sessionloc' AND sex='$mfsql' AND id <= '$return' ORDER BY id DESC LIMIT 9";}
	
else{				
				
$others = "SELECT * FROM users WHERE orientation='gay' AND city = '$sessionloc' AND id <= '$return' ORDER BY id DESC LIMIT 9";

}
				
}else{
	

if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if(is_null($_SESSION['m']) == FALSE){
$mfsql = 'M';}
if(is_null($_SESSION['f']) == FALSE){
$mfsql = 'F';	}

$others = "SELECT * FROM users WHERE city = '$sessionloc' AND sex='$mfsql' AND id <= '$return' ORDER BY id DESC LIMIT 9";

}else{				
				
$others = "SELECT * FROM users WHERE city = '$sessionloc' AND id <= '$return' ORDER BY id DESC LIMIT 9";

}


}	
		
		
		
		
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
					
	if($contents['5'] == 'prof051487.jpg'){
//echo "<td><a href='forum.php?plain=".$contents['0']."&s=".$return."'>";
echo "<td>";
if($contents['12'] == 'M'){ 
if(isset($_SESSION['searchcountry'])){$country = $_SESSION['searchcountry'];}
// FREE QR CREATOR
if(isset($country) && isset($_SESSION['country'])){
	$mycountry = $_SESSION['country'];
	include 'international.php';
	if(is_numeric($contents['3'])){
	
if($localintl == '1'){
	$print = False;
						}else{	
						
if($countrycode == substr($contents['3'],0,strlen($countrycode))){
	$phone = "+".str_replace(' ', '',$contents['3']);
}elseif(substr($contents['3'],0,1) == $trunk){
	$phone = "+".$countrycode.str_replace(' ', '',substr($contents['3'],1));
}else if (substr($contents['3'],0,1) == '+'){
	$phone = "+".str_replace(' ', '',substr($contents['3'],1));
}else{
$phone = "+".$countrycode.str_replace(' ', '',$contents['3']);
}
echo "<div id='qr".$contents['0']."' style='max-width: 150px;z-index:1;position: absolute;'></div><input id='M".$contents['0']."' type='hidden' value=".$phone.">";
echo "<img onclick='disappear".$contents['0']."();return false;' id='M".$contents['0']."' src='img/mqr.png' style='max-height:250px;width: auto;'>";
echo "<script type='text/javascript'>
										
	function disappear".$contents['0']."() {
		var qrcode".$contents['0']." = new QRCode('qr".$contents['0']."', {
    width: 125,
    height: 125,
    colorDark : '#000000',
    colorLight : '#ffffff',
    correctLevel : QRCode.CorrectLevel.H
});
		var elText".$contents['0']." = document.getElementById('M".$contents['0']."');
		qrcode".$contents['0'].".makeCode(elText".$contents['0'].".value);	
		makeCode();
	}
	</script>";

	}}else{ // NOT NUMERIC
		
echo "<img id='pic' src='img/m.png'>";		
		
	}}

}
if($contents['12'] == 'F'){
//echo "<img id='pic' src='img/f.png'>";	

if(isset($_SESSION['searchcountry'])){$country = $_SESSION['searchcountry'];}
// FREE QR CREATOR
if(isset($country) && isset($_SESSION['country'])){
	$mycountry = $_SESSION['country'];
	include 'international.php';
	if(is_numeric($contents['3'])){
	
if($localintl == '1'){
	$print = False;
						}else{	
if($countrycode == substr($contents['3'],0,strlen($countrycode))){
	$phone = "+".str_replace(' ', '',$contents['3']);
}elseif(substr($contents['3'],0,1) == $trunk){
	$phone = "+".$countrycode.str_replace(' ', '',substr($contents['3'],1));
}else if (substr($contents['3'],0,1) == '+'){
	$phone = "+".str_replace(' ', '',substr($contents['3'],1));
}else{
$phone = "+".$countrycode.str_replace(' ', '',$contents['3']);
}
echo "<div id='qr".$contents['0']."' style='max-width: 150px;z-index:1;position: absolute;'></div><input id='F".$contents['0']."' type='hidden' value=".$phone.">";
echo "<img onclick='disappear".$contents['0']."();return false;' id='F".$contents['0']."' src='img/fqr.png' style='max-height:250px;width: auto;'>";
echo "<script type='text/javascript'>
										
	function disappear".$contents['0']."() {
		var qrcode".$contents['0']." = new QRCode('qr".$contents['0']."', {
    width: 125,
    height: 125,
    colorDark : '#000000',
    colorLight : '#ffffff',
    correctLevel : QRCode.CorrectLevel.H
});
		var elText".$contents['0']." = document.getElementById('F".$contents['0']."');
		qrcode".$contents['0'].".makeCode(elText".$contents['0'].".value);	
		makeCode();
	}
	</script>";
	}}else{ // NOT NUMERIC
		
echo "<img id='pic' src='img/f.png'>";		
		
	}}

}
if($contents['7'] != 'choice'){

if($contents['16'] != $_SESSION['country'] && $contents['19'] == '1'){
echo "<div id='cell'>NOT AVAILABLE</div></td>";	
}else{	
if(isset($_SESSION['searchcountry'])){$country = $_SESSION['searchcountry'];}		
$country = $contents['16'];		
if(isset($country) && isset($_SESSION['country'])){
	$mycountry = $_SESSION['country'];
	include 'international.php';
	if(is_numeric($contents['3'])){
	if(strtoupper($_SESSION['country']) == strtoupper($country)){
		
echo "<br><br><article><span style='font-size:20px'><strong>".$contents['3']."</strong></span></article></strong><br>";		
		
	}else{

if($localintl == '1'){
echo "<article><span style='font-size:20px'><strong>NOT AVAILABLE</strong></span></article></strong><br>";			
	}else{		
		
if($countrycode == substr($contents['3'],0,strlen($countrycode))){
	echo "<article><span style='font-size:20px'><strong>".$exitcode."/+ ".$contents['3']."</strong></span></article></strong><br>";		
}	
elseif(substr($contents['3'],0,1) == $trunk){
	echo "<article><span style='font-size:20px'><strong>".$exitcode."/+ ".$countrycode." ".substr($contents['3'],1)."</strong></span></article></strong><br>";	
}elseif (substr($contents['3'],0,1) == '+'){
	echo "<article><span style='font-size:20px'><strong>".$contents['3']."</strong></span></article></strong><br>";	
}else{
	echo "<article><span style='font-size:20px'><strong>".$exitcode."/+ ".$countrycode." ".$trunkprefix." ".$contents['3']."</strong></span></article></strong><br>";	
}
	}}}else{
	echo "<br><br><article><span style='font-size:20px'><strong>".$contents['3']."</strong></span></article></strong><br>";	
}}else{
			
	echo "<br><br><article><span style='font-size:20px'><strong>".$contents['3']."</strong></span></article></strong><br>";


}
}}} else {
	
if($contents['7'] == 'choice'){
	
$country = 	$contents['16'];
$contact = 	$contents['3'];


if(strpos($_SERVER['HTTP_REFERER'],"sol.calltext")==True){
$country = $contents['16'];		
$mycountry = $_SESSION['country'];
include 'international.php';	
if($countrycode == substr($contents['3'],0,strlen($countrycode))){
	$phone = "+".str_replace(' ', '',$contents['3']);
}elseif(substr($contents['3'],0,1) == $trunk){
	$phone = "+".$countrycode.str_replace(' ', '',substr($contents['3'],1));
}else if (substr($contents['3'],0,1) == '+'){
	$phone = "+".str_replace(' ', '',substr($contents['3'],1));
}else{
$phone = "+".$countrycode.str_replace(' ', '',$contents['3']);
}
echo "<div id='qr".$contents['0']."' style='max-width: 150px;z-index:1;position: absolute;'></div>";
echo "<input id='P".$contents['0']."' value='".$phone."' hidden>";
echo "<img onclick='disappear".$contents['0']."();return false;' id='P".$contents['0']."' src='profileimg/".$contents['5']."' style='max-height:250px;width: auto;'>";
echo "<script type='text/javascript'>
										
	function disappear".$contents['0']."() {
		var qrcode".$contents['0']." = new QRCode('qr".$contents['0']."', {
    width: 125,
    height: 125,
    colorDark : '#000000',
    colorLight : '#ffffff',
    correctLevel : QRCode.CorrectLevel.H
});
		var elText".$contents['0']." = document.getElementById('P".$contents['0']."');
		qrcode".$contents['0'].".makeCode(elText".$contents['0'].".value);	
		makeCode();
	}
	</script>";	
//echo "<img id='pic' src='profileimg/".$contents['5']."' width='100%'></a>";			
if(isset($country) && isset($_SESSION['country'])){
	$mycountry = $_SESSION['country'];
	include 'international.php';
	if(is_numeric($contact)){
	if(strtoupper($_SESSION['country']) == strtoupper($country)){}else{

if($countrycode == substr($contact,0,strlen($countrycode))){
	echo "<article><span style='font-size:20px'><strong>Int'l: ".$exitcode."/+ ".$contact."</strong></span></article></strong><br>";		
}elseif(substr($contact,0,2) == $trunk && strtoupper($country) == "HUNGARY"){
	echo "<article><span style='font-size:20px'><strong>Int'l: ".$exitcode."/+ ".$countrycode." ".substr($contact,2)."</strong></span></article></strong><br>";	
}elseif(substr($contact,0,1) == $trunk){
	echo "<article><span style='font-size:20px'><strong>Int'l: ".$exitcode."/+ ".$countrycode." ".substr($contact,1)."</strong></span></article></strong><br>";	
}else if (substr($contact,0,1) == '+'){
	echo "<article><span style='font-size:20px'><strong>Int'l: ".$contact."</strong></span></article></strong><br>";	
}else{
	echo "<article><span style='font-size:20px'><strong>Int'l: ".$exitcode."/+ ".$countrycode." ".$contact."</strong></span></article></strong><br>";	
}
	}}}
if(strtoupper($_SESSION['country']) == strtoupper($country)){
	if (substr($contact,0,1) == '+'){
		$start = 1 + strlen($countrycode);
echo "<article><span style='font-size:20px'><strong>".substr($contact,$start)."</strong></span></article></strong><br>";		
	}else{
echo "<article><span style='font-size:20px'><strong>".$contact."</strong></span></article></strong><br>";	
	}}else{		
		
	if(is_numeric($contact) == False){
echo "<article><span style='font-size:20px'><strong>@: ".$contact."</strong></span></article></strong><br>";		
	}else{
if($countrycode == substr($contact,0,strlen($countrycode))){
echo "<article><span style='font-size:20px'><strong>Local: ".substr($contact,strlen($countrycode))."</strong></span></article></strong><br>";	
}elseif(substr($contact,0,1) == '+'){
$start = 1 + strlen($countrycode);
echo "<article><span style='font-size:20px'><strong>Local: ".substr($contact,$start)."</strong></span></article></strong><br>";
	}else{		
echo "<article><span style='font-size:20px'><strong>Local: ".$contact."</strong></span></article></strong><br>";		
	}}}	
}else{	
	
	$solme = $_SESSION['SOL'];
echo "<td>";
if($solme == '0'){
	
}else{
//	echo "<span style='color:red'>CallText: ".$contents['14']." SOL</span><br>";
//echo "<a href='http://sol.calltext.me/download?from_addr=".$solme."&amount=".$contents['14']."&to_addr=".$contents['8']."&return=".$contents['0']."&s=".$contents['0']."'>";
}


echo "<button onclick='buyPhone();'>Buy with SOL</button>";
echo "<div id='qr".$contents['0']."' style='max-width: 150px;z-index:1;position: absolute;'></div>";


$country = $contents['16'];		
$mycountry = $_SESSION['country'];
include 'international.php';	
if($countrycode == substr($contents['3'],0,strlen($countrycode))){
	$phone = "+".str_replace(' ', '',$contents['3']);
}elseif(substr($contents['3'],0,1) == $trunk){
	$phone = "+".$countrycode.str_replace(' ', '',substr($contents['3'],1));
}else if (substr($contents['3'],0,1) == '+'){
	$phone = "+".str_replace(' ', '',substr($contents['3'],1));
}else{
$phone = "+".$countrycode.str_replace(' ', '',$contents['3']);
}



echo "<input id='phone".$contents['0']."' value='".$phone."' hidden>";
echo "<img id='pic' src='profileimg/".$contents['5']."' width='100%'></a>";	


$amount = (float)$contents['14']*1000000000;
echo "<script type='text/javascript'>
async function buyPhone() {
    let address = '".$contents['8']."'; // replace with the Solana address of the seller
    let lamports = ".$amount.";
    let payment_details = await SOLPay.sendSolanaLamports(address, lamports);
    if (payment_details.signature){
		document.getElementById('paidphone".$contents['0']."').innerHTML = ".$phone.";
	}
}
</script>";

echo "<br><span onclick='disappear".$contents['0']."();return false;' id='paidphone".$contents['0']."'></span>";
echo "<script type='text/javascript'>
	function disappear".$contents['0']."() {
		var qrcode".$contents['0']." = new QRCode('qr".$contents['0']."', {
    width: 125,
    height: 125,
    colorDark : '#000000',
    colorLight : '#ffffff',
    correctLevel : QRCode.CorrectLevel.H
});
		var elText".$contents['0']." = document.getElementById('phone".$contents['0']."');
		qrcode".$contents['0'].".makeCode(elText".$contents['0'].".value);	
		makeCode();
	}
	</script>";	


}}		
else{	
	
echo "<td>";
if(isset($_SESSION['searchcountry'])){$country = $_SESSION['searchcountry'];}else{$country = $contents['16'];}
if(isset($country) && isset($_SESSION['country'])){
	$mycountry = $_SESSION['country'];
	include 'international.php';

if($countrycode == substr($contents['3'],0,strlen($countrycode))){
echo "<a href='http://freeqrcreator.us-west-1.elasticbeanstalk.com/forum?number=%2B".str_replace(' ', '',$contents['3'])."&return=".$contents['0']."&page=forum&s=".$contents['0']."'>";
}	
elseif(substr($contents['3'],0,1) == $trunk){
echo "<a href='http://freeqrcreator.us-west-1.elasticbeanstalk.com/forum?number=%2B".$countrycode.str_replace(' ', '',substr($contents['3'],1))."&return=".$contents['0']."&page=forum&s=".$contents['0']."'>";
}else if (substr($contents['3'],0,1) == '+'){
echo "<a href='http://freeqrcreator.us-west-1.elasticbeanstalk.com/forum?number=%2B".str_replace(' ', '',substr($contents['3'],1))."&return=".$contents['0']."&page=forum&s=".$contents['0']."'>";
}else{
echo "<a href='http://freeqrcreator.us-west-1.elasticbeanstalk.com/forum?number=%2B".$countrycode.str_replace(' ', '',$contents['3'])."&return=".$contents['0']."&page=forum&s=".$contents['0']."'>";
}}
echo "<img id='pic' src='profileimg/".$contents['5']."' width='100%'></a>";	
//echo "<td><a href='viewe_profile.php?uid=".$contents['0']."&s=".$return."'><img id='pic' src='profileimg/".$contents['5']."'></a>";
}
if($contents['7'] != 'choice'){
if($contents['16'] != $_SESSION['country'] && $contents['19'] == '1'){
echo "<div id='cell'>NOT AVAILABLE</div></td>";	
}else{	
if(isset($_SESSION['searchcountry'])){$country = $_SESSION['searchcountry'];}		
$country = $contents['16'];		
if(isset($country) && isset($_SESSION['country'])){
	$mycountry = $_SESSION['country'];
	include 'international.php';
	if(is_numeric($contents['3'])){
	if(strtoupper($_SESSION['country']) == strtoupper($country)){
		
echo "<div id='cell'><span style='font-size:20px'><strong>".$contents['3']."</strong></span></strong></div></td>";		
		
	}else{

if($localintl == '1'){
echo "<div id='cell'><span style='font-size:20px'><strong>NOT AVAILABLE</strong></span></strong></div></td>";			
	}else{		
		
if($countrycode == substr($contents['3'],0,strlen($countrycode))){
	echo "<div id='cell'><span style='font-size:20px'><strong>".$exitcode."/+ ".$contents['3']."</strong></span></strong></div></td>";		
}	
elseif(substr($contents['3'],0,1) == $trunk){
	echo "<div id='cell'><span style='font-size:20px'><strong>".$exitcode."/+ ".$countrycode." ".substr($contents['3'],1)."</strong></span></strong></div></td>";	
}elseif (substr($contents['3'],0,1) == '+'){
	echo "<div id='cell'><span style='font-size:20px'><strong>".$contents['3']."</strong></span></strong></div></td>";	
}else{
	echo "<div id='cell'><span style='font-size:20px'><strong>".$exitcode."/+ ".$countrycode." ".$trunkprefix." ".$contents['3']."</strong></span></strong></div></td>";	
}
	}}}else{
	echo "<div id='cell'><span style='font-size:20px'><strong>".$contents['3']."</strong></span></strong></div></td>";	
}}else{
			
	echo "<div id='cell'><span style='font-size:20px'><strong>".$contents['3']."</strong></span></strong></div></td>";


}		
}}}
		$count++;
		$rowcount++;
	}
}
}elseif(isset($_GET['qmr'])){
		
		$updatedid = $_GET['qmr'];	

	$id = $_SESSION['id'];
		$sessionmf = $_SESSION['mf'];
			$sessionori = $_SESSION['ori'];
				$sessionloc = $_SESSION['city'];
				
if($_SESSION['orisearch'] == 1){				
				
if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if(is_null($_SESSION['m']) == FALSE){
$mfsql = 'M';}
if(is_null($_SESSION['f']) == FALSE){
$mfsql = 'F';	}

$others = "SELECT * FROM users WHERE orientation='gay' AND city = '$sessionloc' AND sex='$mfsql' AND id <= '$updatedid' ORDER BY id DESC LIMIT 9";
}
	
else{	

$others = "SELECT * FROM users WHERE orientation='gay' AND city = '$sessionloc' AND id <= '$updatedid' ORDER BY id DESC LIMIT 9";

}

}else{

if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if(is_null($_SESSION['m']) == FALSE){
$mfsql = 'M';}
if(is_null($_SESSION['f']) == FALSE){
$mfsql = 'F';	}

$others = "SELECT * FROM users WHERE city = '$sessionloc' AND sex='$mfsql' AND id <= '$updatedid' ORDER BY id DESC LIMIT 9";}
	
else{	

$others = "SELECT * FROM users WHERE city = '$sessionloc' AND id <= '$updatedid' ORDER BY id DESC LIMIT 9";

}

}	
				

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
					
	if($contents['5'] == 'prof051487.jpg'){
/*		
if($count > 3){			
echo "<td><a href='forum.php?plain=".$contents['0']."&s=".$updatedid."#a'>";
}else{
	echo "<td><a href='forum.php?plain=".$contents['0']."&s=".$updatedid."'>";
}*/

echo "<td>";

if($contents['12'] == 'M'){ 
if(isset($_SESSION['searchcountry'])){$country = $_SESSION['searchcountry'];}
// FREE QR CREATOR
if(isset($country) && isset($_SESSION['country'])){
	$mycountry = $_SESSION['country'];
	include 'international.php';
	if(is_numeric($contents['3'])){
	
if($localintl == '1'){
	$print = False;
						}else{	
if($countrycode == substr($contents['3'],0,strlen($countrycode))){
	$phone = "+".str_replace(' ', '',$contents['3']);
}elseif(substr($contents['3'],0,1) == $trunk){
	$phone = "+".$countrycode.str_replace(' ', '',substr($contents['3'],1));
}else if (substr($contents['3'],0,1) == '+'){
	$phone = "+".str_replace(' ', '',substr($contents['3'],1));
}else{
$phone = "+".$countrycode.str_replace(' ', '',$contents['3']);
}
echo "<div id='qr".$contents['0']."' style='max-width: 150px;z-index:1;position: absolute;'></div><input id='M".$contents['0']."' value='".$phone."' hidden>";
echo "<img onclick='disappear".$contents['0']."();return false;' id='M".$contents['0']."' src='img/mqr.png' style='max-height:250px;width: auto;'>";
echo "<script type='text/javascript'>
										
	function disappear".$contents['0']."() {
		var qrcode".$contents['0']." = new QRCode('qr".$contents['0']."', {
    width: 125,
    height: 125,
    colorDark : '#000000',
    colorLight : '#ffffff',
    correctLevel : QRCode.CorrectLevel.H
});
		var elText".$contents['0']." = document.getElementById('M".$contents['0']."');
		qrcode".$contents['0'].".makeCode(elText".$contents['0'].".value);	
		makeCode();
	}
	</script>";
	}}else{ // NOT NUMERIC
		
echo "<img id='pic' src='img/m.png'>";		
		
	}}

}
if($contents['12'] == 'F'){
if(isset($_SESSION['searchcountry'])){$country = $_SESSION['searchcountry'];}
// FREE QR CREATOR
if(isset($country) && isset($_SESSION['country'])){
	$mycountry = $_SESSION['country'];
	include 'international.php';
	if(is_numeric($contents['3'])){
	
if($localintl == '1'){
	$print = False;
						}else{	
if($countrycode == substr($contents['3'],0,strlen($countrycode))){
	$phone = "+".str_replace(' ', '',$contents['3']);
}elseif(substr($contents['3'],0,1) == $trunk){
	$phone = "+".$countrycode.str_replace(' ', '',substr($contents['3'],1));
}else if (substr($contents['3'],0,1) == '+'){
	$phone = "+".str_replace(' ', '',substr($contents['3'],1));
}else{
$phone = "+".$countrycode.str_replace(' ', '',$contents['3']);
}
echo "<div id='qr".$contents['0']."' style='max-width: 150px;z-index:1;position: absolute;'></div><input id='F".$contents['0']."' value='".$phone."' hidden>";
echo "<img onclick='disappear".$contents['0']."();return false;' id='F".$contents['0']."' src='img/fqr.png' style='max-height:250px;width: auto;'>";
echo "<script type='text/javascript'>
										
	function disappear".$contents['0']."() {
		var qrcode".$contents['0']." = new QRCode('qr".$contents['0']."', {
    width: 125,
    height: 125,
    colorDark : '#000000',
    colorLight : '#ffffff',
    correctLevel : QRCode.CorrectLevel.H
});
		var elText".$contents['0']." = document.getElementById('F".$contents['0']."');
		qrcode".$contents['0'].".makeCode(elText".$contents['0'].".value);	
		makeCode();
	}
	</script>";
	}}else{ // NOT NUMERIC
		
echo "<img id='pic' src='img/f.png'>";		
		
	}}
	
}
if($contents['7'] != 'choice'){
	
if($contents['16'] != $_SESSION['country'] && $contents['19'] == '1'){
echo "<div id='cell'>NOT AVAILABLE</div></td>";	
}else{	
	
if(isset($_SESSION['searchcountry'])){$country = $_SESSION['searchcountry'];}		
$country = $contents['16'];		
if(isset($country) && isset($_SESSION['country'])){
	$mycountry = $_SESSION['country'];
	include 'international.php';
	if(is_numeric($contents['3'])){
	if(strtoupper($_SESSION['country']) == strtoupper($country)){
		
echo "<div id='cell'><span style='font-size:20px'><strong>".$contents['3']."</strong></span></strong></div></td>";		
		
	}else{

if($localintl == '1'){
echo "<div id='cell'><span style='font-size:20px'><strong>NOT AVAILABLE</strong></span></strong></div></td>";			
	}else{		
		
if($countrycode == substr($contents['3'],0,strlen($countrycode))){
	echo "<div id='cell'><span style='font-size:20px'><strong>".$exitcode."/+ ".$contents['3']."</strong></span></strong></div></td>";		
}	
elseif(substr($contents['3'],0,1) == $trunk){
	echo "<div id='cell'><span style='font-size:20px'><strong>".$exitcode."/+ ".$countrycode." ".substr($contents['3'],1)."</strong></span></strong></div></td>";	
}elseif (substr($contents['3'],0,1) == '+'){
	echo "<div id='cell'><span style='font-size:20px'><strong>".$contents['3']."</strong></span></strong></div></td>";	
}else{
	echo "<div id='cell'><span style='font-size:20px'><strong>".$exitcode."/+ ".$countrycode." ".$trunkprefix." ".$contents['3']."</strong></span></strong></div></td>";	
}
	}}}else{
	echo "<div id='cell'><span style='font-size:20px'><strong>".$contents['3']."</strong></span></strong></div></td>";	
}}else{
			
	echo "<div id='cell'><span style='font-size:20px'><strong>".$contents['3']."</strong></span></strong></div></td>";


}
}}
	} else {
if($contents['7'] == 'choice'){
	
	$country = 	$contents['16'];
	
if(strpos($_SERVER['HTTP_REFERER'],"sol.calltext")==True){
$country = $contents['16'];		
$mycountry = $_SESSION['country'];
include 'international.php';	
if($countrycode == substr($contents['3'],0,strlen($countrycode))){
	$phone = "+".str_replace(' ', '',$contents['3']);
}elseif(substr($contents['3'],0,1) == $trunk){
	$phone = "+".$countrycode.str_replace(' ', '',substr($contents['3'],1));
}else if (substr($contents['3'],0,1) == '+'){
	$phone = "+".str_replace(' ', '',substr($contents['3'],1));
}else{
$phone = "+".$countrycode.str_replace(' ', '',$contents['3']);
}
echo "<div id='qr".$contents['0']."' style='max-width: 150px;z-index:1;position: absolute;'></div><input id='P".$contents['0']."' value='".$phone."' hidden>";
echo "<img onclick='disappear".$contents['0']."();return false;' id='P".$contents['0']."' src='profileimg/".$contents['5']."' style='max-height:250px;width: auto;'>";
echo "<script type='text/javascript'>
										
	function disappear".$contents['0']."() {
		var qrcode".$contents['0']." = new QRCode('qr".$contents['0']."', {
    width: 125,
    height: 125,
    colorDark : '#000000',
    colorLight : '#ffffff',
    correctLevel : QRCode.CorrectLevel.H
});
		var elText".$contents['0']." = document.getElementById('P".$contents['0']."');
		qrcode".$contents['0'].".makeCode(elText".$contents['0'].".value);	
		makeCode();
	}
	</script>";	
//echo "<img id='pic' src='profileimg/".$contents['5']."' width='100%'></a>";		
if(isset($country) && isset($_SESSION['country'])){
	$mycountry = $_SESSION['country'];
	include 'international.php';
	if(is_numeric($contact)){
	if(strtoupper($_SESSION['country']) == strtoupper($country)){}else{

if($countrycode == substr($contact,0,strlen($countrycode))){
	echo "<article><span style='font-size:20px'><strong>Int'l: ".$exitcode."/+ ".$contact."</strong></span></article></strong><br>";		
}elseif(substr($contact,0,2) == $trunk && strtoupper($country) == "HUNGARY"){
	echo "<article><span style='font-size:20px'><strong>Int'l: ".$exitcode."/+ ".$countrycode." ".substr($contact,2)."</strong></span></article></strong><br>";	
}elseif(substr($contact,0,1) == $trunk){
	echo "<article><span style='font-size:20px'><strong>Int'l: ".$exitcode."/+ ".$countrycode." ".substr($contact,1)."</strong></span></article></strong><br>";	
}else if (substr($contact,0,1) == '+'){
	echo "<article><span style='font-size:20px'><strong>Int'l: ".$contact."</strong></span></article></strong><br>";	
}else{
	echo "<article><span style='font-size:20px'><strong>Int'l: ".$exitcode."/+ ".$countrycode." ".$contact."</strong></span></article></strong><br>";	
}
	}}}
if(strtoupper($_SESSION['country']) == strtoupper($country)){
	if (substr($contact,0,1) == '+'){
		$start = 1 + strlen($countrycode);
echo "<article><span style='font-size:20px'><strong>".substr($contact,$start)."</strong></span></article></strong><br>";		
	}else{
echo "<article><span style='font-size:20px'><strong>".$contact."</strong></span></article></strong><br>";	
	}}else{		
		
	if(is_numeric($contact) == False){
echo "<article><span style='font-size:20px'><strong>@: ".$contact."</strong></span></article></strong><br>";		
	}else{
if($countrycode == substr($contact,0,strlen($countrycode))){
echo "<article><span style='font-size:20px'><strong>Local: ".substr($contact,strlen($countrycode))."</strong></span></article></strong><br>";	
}elseif(substr($contact,0,1) == '+'){
$start = 1 + strlen($countrycode);
echo "<article><span style='font-size:20px'><strong>Local: ".substr($contact,$start)."</strong></span></article></strong><br>";
	}else{		
echo "<article><span style='font-size:20px'><strong>Local: ".$contact."</strong></span></article></strong><br>";		
	}}}	
}else{	
	
echo "<td>";
$solme = $_SESSION['SOL'];
if($solme == '0'){
	
}else{
//	echo "<span style='color:red'>CallText: ".$contents['14']." SOL</span><br>";
//echo "<a href='http://sol.calltext.me/download?from_addr=".$solme."&amount=".$contents['14']."&to_addr=".$contents['8']."&return=".$contents['0']."&s=".$contents['0']."'>";
}

echo "<br><button onclick='buyPhone();'>".$contents['14']." SOL</button><br>";

echo "<div id='qr".$contents['0']."' style='max-width: 150px;z-index:1;position: absolute;'></div>";


$country = $contents['16'];		
$mycountry = $_SESSION['country'];
include 'international.php';	
if($countrycode == substr($contents['3'],0,strlen($countrycode))){
	$phone = "+".str_replace(' ', '',$contents['3']);
}elseif(substr($contents['3'],0,1) == $trunk){
	$phone = "+".$countrycode.str_replace(' ', '',substr($contents['3'],1));
}else if (substr($contents['3'],0,1) == '+'){
	$phone = "+".str_replace(' ', '',substr($contents['3'],1));
}else{
$phone = "+".$countrycode.str_replace(' ', '',$contents['3']);
}



echo "<input id='phone".$contents['0']."' value='".$phone."' hidden>";
echo "<img id='pic' src='profileimg/".$contents['5']."' width='100%'></a>";	


$amount = (float)$contents['14']*1000000000;
echo "<script type='text/javascript'>
async function buyPhone() {
    let address = '".$contents['8']."'; // replace with the Solana address of the seller
    let lamports = ".$amount.";
    let payment_details = await SOLPay.sendSolanaLamports(address, lamports);
    if (payment_details.signature){
		document.getElementById('paidphone".$contents['0']."').innerHTML = ".$phone.";
	}
}
</script>";
echo "<br><span onclick='disappear".$contents['0']."();return false;' id='paidphone".$contents['0']."'></span>";
echo "<script type='text/javascript'>
	function disappear".$contents['0']."() {
		var qrcode".$contents['0']." = new QRCode('qr".$contents['0']."', {
    width: 125,
    height: 125,
    colorDark : '#000000',
    colorLight : '#ffffff',
    correctLevel : QRCode.CorrectLevel.H
});
		var elText".$contents['0']." = document.getElementById('phone".$contents['0']."');
		qrcode".$contents['0'].".makeCode(elText".$contents['0'].".value);	
		makeCode();
	}
	</script>";	
}}		
else{		
echo "<td>";
if(isset($_SESSION['searchcountry'])){$country = $_SESSION['searchcountry'];}else{$country = $contents['16'];}
if(isset($country) && isset($_SESSION['country'])){
	$mycountry = $_SESSION['country'];
	include 'international.php';


if($countrycode == substr($contents['3'],0,strlen($countrycode))){
	$phone = "+".str_replace(' ', '',$contents['3']);
}elseif(substr($contents['3'],0,1) == $trunk){
	$phone = "+".$countrycode.str_replace(' ', '',substr($contents['3'],1));
}else if (substr($contents['3'],0,1) == '+'){
	$phone = "+".str_replace(' ', '',substr($contents['3'],1));
}else{
$phone = "+".$countrycode.str_replace(' ', '',$contents['3']);
}

echo "<div id='qr".$contents['0']."' style='max-width: 150px;z-index:1;position: absolute;'></div><input id='M".$contents['0']."' value='".$phone."' hidden>";
echo "<img onclick='disappear".$contents['0']."();return false;' id='M".$contents['0']."' src='profileimg/".$contents['5']."' style='max-height:250px;width: auto;'>";
echo "<script type='text/javascript'>
										
	function disappear".$contents['0']."() {
		var qrcode".$contents['0']." = new QRCode('qr".$contents['0']."', {
    width: 125,
    height: 125,
    colorDark : '#000000',
    colorLight : '#ffffff',
    correctLevel : QRCode.CorrectLevel.H
});
		var elText".$contents['0']." = document.getElementById('M".$contents['0']."');
		qrcode".$contents['0'].".makeCode(elText".$contents['0'].".value);	
		makeCode();
	}
	</script>";



}
//echo "<img id='pic' src='profileimg/".$contents['5']."' width='100%'></a>";
//echo "<td><a href='viewe_profile.php?uid=".$contents['0']."&s=".$updatedid."'><img id='pic' src='profileimg/".$contents['5']."'></a>";
	}
if($contents['7'] != 'choice'){
	
if($contents['16'] != $_SESSION['country'] && $contents['19'] == '1'){
echo "<div id='cell'>NOT AVAILABLE</div></td>";	
}else{	
	
if(isset($_SESSION['searchcountry'])){$country = $_SESSION['searchcountry'];}		
$country = $contents['16'];		
if(isset($country) && isset($_SESSION['country'])){
	$mycountry = $_SESSION['country'];
	include 'international.php';
	if(is_numeric($contents['3'])){
	if(strtoupper($_SESSION['country']) == strtoupper($country)){
		
echo "<div id='cell'><span style='font-size:20px'><strong>".$contents['3']."</strong></span></strong></div></td>";		
		
	}else{

if($localintl == '1'){
echo "<div id='cell'><span style='font-size:20px'><strong>NOT AVAILABLE</strong></span></strong></div></td>";			
	}else{		
		
if($countrycode == substr($contents['3'],0,strlen($countrycode))){
	echo "<div id='cell'><span style='font-size:20px'><strong>".$exitcode."/+ ".$contents['3']."</strong></span></strong></div></td>";		
}	
elseif(substr($contents['3'],0,1) == $trunk){
	echo "<div id='cell'><span style='font-size:20px'><strong>".$exitcode."/+ ".$countrycode." ".substr($contents['3'],1)."</strong></span></strong></div></td>";	
}elseif (substr($contents['3'],0,1) == '+'){
	echo "<div id='cell'><span style='font-size:20px'><strong>".$contents['3']."</strong></span></strong></div></td>";	
}else{
	echo "<div id='cell'><span style='font-size:20px'><strong>".$exitcode."/+ ".$countrycode." ".$trunkprefix." ".$contents['3']."</strong></span></strong></div></td>";	
}
	}}}else{
	echo "<div id='cell'><span style='font-size:20px'><strong>".$contents['3']."</strong></span></strong></div></td>";	
}}else{
			
	echo "<div id='cell'><span style='font-size:20px'><strong>".$contents['3']."</strong></span></strong></div></td>";


}	
}	}
}
		$count++;
		$rowcount++;
	}
} 

	
	
	
	
	
	
	
	// THE RED SEA
	
	} else {
	
	// OF MOSES
	
	
	
	
	
	
	$id = $_SESSION['id'];
		$sessionmf = $_SESSION['mf'];
			$sessionori = $_SESSION['ori'];
				$sessionloc = $_SESSION['city'];
				
				
if($_SESSION['orisearch'] == 1){				

if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if(is_null($_SESSION['m']) == FALSE){
$mfsql = 'M';}
if(is_null($_SESSION['f']) == FALSE){
$mfsql = 'F';	}

$others = "SELECT * FROM users WHERE orientation='gay' AND city = '$sessionloc' AND sex='$mfsql' ORDER BY id DESC LIMIT 9";}
	
else{				
				
$others = "SELECT * FROM users WHERE orientation='gay' AND city = '$sessionloc' ORDER BY id DESC LIMIT 9";

}

}else{

if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if(is_null($_SESSION['m']) == FALSE){
$mfsql = 'M';}
if(is_null($_SESSION['f']) == FALSE){
$mfsql = 'F';	}

$others = "SELECT * FROM users WHERE city = '$sessionloc' AND sex='$mfsql' ORDER BY id DESC LIMIT 9";}
	
else{				

$others = "SELECT * FROM users WHERE city = '$sessionloc' ORDER BY id DESC LIMIT 9";

}

}	
				



		
			if($crowd = mysqli_query($mysqli, $others)){

if ($crowd->num_rows == 0){
	
	
if($sessionori == "str"){	
		if($sessionmf == 'M'){
		echo "<br><br><br><br><span style='color:white'><h3>There are no females in ".$sessionloc.".</h3><br>Donate to help get more people on CallText.me</span><br>";
				echo "<br><br><img width='200px' src='img/sol.png'><br><span style='color:white;font-size: 10pt'>Gq9Gv34h6Y8noDiKpPk1HcT5gCJJD8Z6xNj1aSChtpv2</span>";	
		}
		if($sessionmf == 'F'){
echo "<br><br><br><br><span style='color:white'><h3>There are no males in ".$sessionloc.".</h3><br>Donate to help get more people on CallText.me</span><br>";
				echo "<br><br><img width='200px' src='img/sol.png'><br><span style='color:white;font-size: 10pt'>Gq9Gv34h6Y8noDiKpPk1HcT5gCJJD8Z6xNj1aSChtpv2</span>";			
		}
}		
if($sessionori == "gay"){		
		if($sessionmf == 'M'){
		echo "<br><br><br><br><span style='color:white'><h3>There are no males in ".$sessionloc.".</h3><br>Donate to help get more people on CallText.me</span><br>";
				echo "<br><br><img width='200px' src='img/sol.png'><br><span style='color:white;font-size: 10pt'>Gq9Gv34h6Y8noDiKpPk1HcT5gCJJD8Z6xNj1aSChtpv2</span>";	
		}
		if($sessionmf == 'F'){
		echo "<br><br><br><br><span style='color:white'><h3>There are no females in ".$sessionloc.".</h3><br>Donate to help get more people on CallText.me</span><br>";
			echo "<br><br><img width='200px' src='img/sol.png'><br><span style='color:white;font-size: 10pt'>Gq9Gv34h6Y8noDiKpPk1HcT5gCJJD8Z6xNj1aSChtpv2</span>";
		}
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
					
	if($contents['5'] == 'prof051487.jpg'){

echo "<td>";

if($contents['12'] == 'M'){ 
if(isset($_SESSION['searchcountry'])){$country = $_SESSION['searchcountry'];}
// FREE QR CREATOR
if(isset($country) && isset($_SESSION['country'])){
	$mycountry = $_SESSION['country'];
	include 'international.php';
	if(is_numeric($contents['3'])){
	
if($localintl == '1'){
	$print = False;
						}else{

if($countrycode == substr($contents['3'],0,strlen($countrycode))){
	$phone = "+".str_replace(' ', '',$contents['3']);
}elseif(substr($contents['3'],0,1) == $trunk){
	$phone = "+".$countrycode.str_replace(' ', '',substr($contents['3'],1));
}else if (substr($contents['3'],0,1) == '+'){
	$phone = "+".str_replace(' ', '',substr($contents['3'],1));
}else{
$phone = "+".$countrycode.str_replace(' ', '',$contents['3']);
}
echo "<div id='qr".$contents['0']."' style='max-width: 150px;z-index:1;position: absolute;'></div><input id='M".$contents['0']."' value='".$phone."' hidden>";
echo "<img onclick='disappear".$contents['0']."();return false;' id='M".$contents['0']."' src='img/mqr.png' style='max-height:250px;width: auto;'>";
echo "<script type='text/javascript'>
										
	function disappear".$contents['0']."() {
		var qrcode".$contents['0']." = new QRCode('qr".$contents['0']."', {
    width: 125,
    height: 125,
    colorDark : '#000000',
    colorLight : '#ffffff',
    correctLevel : QRCode.CorrectLevel.H
});
		var elText".$contents['0']." = document.getElementById('M".$contents['0']."');
		qrcode".$contents['0'].".makeCode(elText".$contents['0'].".value);	
		makeCode();
	}
	</script>";

	}}else{ // NOT NUMERIC
		
echo "<img id='pic' src='img/m.png'>";		
		
	}}

}
if($contents['12'] == 'F'){
if(isset($_SESSION['searchcountry'])){$country = $_SESSION['searchcountry'];}
// FREE QR CREATOR
if(isset($country) && isset($_SESSION['country'])){
	$mycountry = $_SESSION['country'];
	include 'international.php';
	if(is_numeric($contents['3'])){
	
if($localintl == '1'){
	$print = False;
						}else{


if($countrycode == substr($contents['3'],0,strlen($countrycode))){
	$phone = "+".str_replace(' ', '',$contents['3']);
}elseif(substr($contents['3'],0,1) == $trunk){
	$phone = "+".$countrycode.str_replace(' ', '',substr($contents['3'],1));
}else if (substr($contents['3'],0,1) == '+'){
	$phone = "+".str_replace(' ', '',substr($contents['3'],1));
}else{
$phone = "+".$countrycode.str_replace(' ', '',$contents['3']);
}
echo "<div id='qr".$contents['0']."' style='max-width: 150px;z-index:1;position: absolute;'></div><input id='F".$contents['0']."' value='".$phone."' hidden>";
echo "<img onclick='disappear".$contents['0']."();return false;' id='F".$contents['0']."' src='img/fqr.png' style='max-height:250px;width: auto;'>";
echo "<script type='text/javascript'>
										
	function disappear".$contents['0']."() {
		var qrcode".$contents['0']." = new QRCode('qr".$contents['0']."', {
    width: 125,
    height: 125,
    colorDark : '#000000',
    colorLight : '#ffffff',
    correctLevel : QRCode.CorrectLevel.H
});
		var elText".$contents['0']." = document.getElementById('F".$contents['0']."');
		qrcode".$contents['0'].".makeCode(elText".$contents['0'].".value);	
		makeCode();
	}
	</script>";

	}}else{ // NOT NUMERIC
		
echo "<img id='pic' src='img/f.png'>";		
		
	}
	
	
	}
	
}
if($contents['7'] != 'choice'){
	
if($contents['16'] != $_SESSION['country'] && $contents['19'] == '1'){
echo "<div id='cell'>NOT AVAILABLE</div></td>";	
}else{	
	
if(isset($_SESSION['searchcountry'])){$country = $_SESSION['searchcountry'];}		
$country = $contents['16'];		
if(isset($country) && isset($_SESSION['country'])){
	$mycountry = $_SESSION['country'];
	include 'international.php';
	if(is_numeric($contents['3'])){
	if(strtoupper($_SESSION['country']) == strtoupper($country)){
		
echo "<div id='cell'><span style='font-size:20px'><strong>".$contents['3']."</strong></span></strong></div></td>";		
		
	}else{

if($localintl == '1'){
echo "<div id='cell'><span style='font-size:20px'><strong>NOT AVAILABLE</strong></span></strong></div></td>";			
	}else{		
		
if($countrycode == substr($contents['3'],0,strlen($countrycode))){
	echo "<div id='cell'><span style='font-size:20px'><strong>".$exitcode."/+ ".$contents['3']."</strong></span></strong></div></td>";		
}	
elseif(substr($contents['3'],0,1) == $trunk){
	echo "<div id='cell'><span style='font-size:20px'><strong>".$exitcode."/+ ".$countrycode." ".substr($contents['3'],1)."</strong></span></strong></div></td>";	
}elseif (substr($contents['3'],0,1) == '+'){
	echo "<div id='cell'><span style='font-size:20px'><strong>".$contents['3']."</strong></span></strong></div></td>";	
}else{
	echo "<div id='cell'><span style='font-size:20px'><strong>".$exitcode."/+ ".$countrycode." ".$trunkprefix." ".$contents['3']."</strong></span></strong></div></td>";	
}
	}}}else{
	echo "<div id='cell'><span style='font-size:20px'><strong>".$contents['3']."</strong></span></strong></div></td>";	
}}else{
			
	echo "<div id='cell'><span style='font-size:20px'><strong>".$contents['3']."</strong></span></strong></div></td>";


}
}}
	} else {
		
if($contents['7'] == 'choice'){
	
	$country = 	$contents['16'];
	
if(strpos($_SERVER['HTTP_REFERER'],"sol.calltext")==True){
$country = $contents['16'];		
$mycountry = $_SESSION['country'];
include 'international.php';	
if($countrycode == substr($contents['3'],0,strlen($countrycode))){
	$phone = "+".str_replace(' ', '',$contents['3']);
}elseif(substr($contents['3'],0,1) == $trunk){
	$phone = "+".$countrycode.str_replace(' ', '',substr($contents['3'],1));
}else if (substr($contents['3'],0,1) == '+'){
	$phone = "+".str_replace(' ', '',substr($contents['3'],1));
}else{
$phone = "+".$countrycode.str_replace(' ', '',$contents['3']);
}
echo "<div id='qr".$contents['0']."' style='max-width: 150px;z-index:1;position: absolute;'></div><input id='P".$contents['0']."' value='".$phone."' hidden>";
echo "<img onclick='disappear".$contents['0']."();return false;' id='P".$contents['0']."' src='profileimg/".$contents['5']."' style='max-height:250px;width: auto;'>";
echo "<script type='text/javascript'>
	function disappear".$contents['0']."() {
		var qrcode".$contents['0']." = new QRCode('qr".$contents['0']."', {
    width: 125,
    height: 125,
    colorDark : '#000000',
    colorLight : '#ffffff',
    correctLevel : QRCode.CorrectLevel.H
});
		var elText".$contents['0']." = document.getElementById('P".$contents['0']."');
		qrcode".$contents['0'].".makeCode(elText".$contents['0'].".value);	
		makeCode();
	}
	</script>";	
//echo "<img id='pic' src='profileimg/".$contents['5']."' width='100%'></a>";			
if(isset($country) && isset($_SESSION['country'])){
	$mycountry = $_SESSION['country'];
	include 'international.php';
	if(is_numeric($contact)){
	if(strtoupper($_SESSION['country']) == strtoupper($country)){}else{

if($countrycode == substr($contact,0,strlen($countrycode))){
	echo "<article><span style='font-size:20px'><strong>Int'l: ".$exitcode."/+ ".$contact."</strong></span></article></strong><br>";		
}elseif(substr($contact,0,2) == $trunk && strtoupper($country) == "HUNGARY"){
	echo "<article><span style='font-size:20px'><strong>Int'l: ".$exitcode."/+ ".$countrycode." ".substr($contact,2)."</strong></span></article></strong><br>";	
}elseif(substr($contact,0,1) == $trunk){
	echo "<article><span style='font-size:20px'><strong>Int'l: ".$exitcode."/+ ".$countrycode." ".substr($contact,1)."</strong></span></article></strong><br>";	
}else if (substr($contact,0,1) == '+'){
	echo "<article><span style='font-size:20px'><strong>Int'l: ".$contact."</strong></span></article></strong><br>";	
}else{
	echo "<article><span style='font-size:20px'><strong>Int'l: ".$exitcode."/+ ".$countrycode." ".$contact."</strong></span></article></strong><br>";	
}
	}}}
if(strtoupper($_SESSION['country']) == strtoupper($country)){
	if (substr($contact,0,1) == '+'){
		$start = 1 + strlen($countrycode);
echo "<article><span style='font-size:20px'><strong>".substr($contact,$start)."</strong></span></article></strong><br>";		
	}else{
echo "<article><span style='font-size:20px'><strong>".$contact."</strong></span></article></strong><br>";	
	}}else{		
		
	if(is_numeric($contact) == False){
echo "<article><span style='font-size:20px'><strong>@: ".$contact."</strong></span></article></strong><br>";		
	}else{
if($countrycode == substr($contact,0,strlen($countrycode))){
echo "<article><span style='font-size:20px'><strong>Local: ".substr($contact,strlen($countrycode))."</strong></span></article></strong><br>";	
}elseif(substr($contact,0,1) == '+'){
$start = 1 + strlen($countrycode);
echo "<article><span style='font-size:20px'><strong>Local: ".substr($contact,$start)."</strong></span></article></strong><br>";
	}else{		
echo "<article><span style='font-size:20px'><strong>Local: ".$contact."</strong></span></article></strong><br>";		
	}}}	
	
	
// END ELASTIC BEANSTALK	
}else{	
	
echo "<td>";
$solme = $_SESSION['SOL'];
if($solme == '0'){

}else{
//	echo "<span style='color:red'>CallText: ".$contents['14']." SOL</span><br>";
//echo "<a href='http://sol.calltext.me/download?from_addr=".$solme."&amount=".$contents['14']."&to_addr=".$contents['8']."&return=".$contents['0']."&s=".$contents['0']."'>";
}

echo "<br><button onclick='buyPhone();'>".$contents['14']." SOL</button><br>";

echo "<div id='qr".$contents['0']."' style='max-width: 150px;z-index:1;position: absolute;'></div>";


$country = $contents['16'];		
$mycountry = $_SESSION['country'];
include 'international.php';	
if($countrycode == substr($contents['3'],0,strlen($countrycode))){
	$phone = "+".str_replace(' ', '',$contents['3']);
}elseif(substr($contents['3'],0,1) == $trunk){
	$phone = "+".$countrycode.str_replace(' ', '',substr($contents['3'],1));
}else if (substr($contents['3'],0,1) == '+'){
	$phone = "+".str_replace(' ', '',substr($contents['3'],1));
}else{
$phone = "+".$countrycode.str_replace(' ', '',$contents['3']);
}



echo "<input id='phone".$contents['0']."' value='".$phone."' hidden>";
echo "<img id='pic' src='profileimg/".$contents['5']."' width='100%'></a>";	


$amount = (float)$contents['14']*1000000000;
echo "<script type='text/javascript'>
async function buyPhone() {
    let address = '".$contents['8']."'; // replace with the Solana address of the seller
    let lamports = ".$amount.";
    let payment_details = await SOLPay.sendSolanaLamports(address, lamports);
    if (payment_details.signature){
		document.getElementById('paidphone".$contents['0']."').innerHTML = ".$phone.";
	}
}
</script>";
echo "<br><span onclick='disappear".$contents['0']."();return false;' id='paidphone".$contents['0']."'></span>";
echo "<script type='text/javascript'>
	function disappear".$contents['0']."() {
		var qrcode".$contents['0']." = new QRCode('qr".$contents['0']."', {
    width: 125,
    height: 125,
    colorDark : '#000000',
    colorLight : '#ffffff',
    correctLevel : QRCode.CorrectLevel.H
});
		var elText".$contents['0']." = document.getElementById('phone".$contents['0']."');
		qrcode".$contents['0'].".makeCode(elText".$contents['0'].".value);	
		makeCode();
	}
	</script>";	
}}

// ANYONE
		
else{		
echo "<td>";
$country = $contents['16'];
if(isset($country) && isset($_SESSION['country'])){
	$mycountry = $_SESSION['country'];
	include 'international.php';

if($countrycode == substr($contents['3'],0,strlen($countrycode))){
	$phone = "+".str_replace(' ', '',$contents['3']);
}elseif(substr($contents['3'],0,1) == $trunk){
	$phone = "+".$countrycode.str_replace(' ', '',substr($contents['3'],1));
}else if (substr($contents['3'],0,1) == '+'){
	$phone = "+".str_replace(' ', '',substr($contents['3'],1));
}else{
$phone = "+".$countrycode.str_replace(' ', '',$contents['3']);
}

echo "<div id='qr".$contents['0']."' style='max-width: 150px;z-index:1;position: absolute;'></div><input id='M".$contents['0']."' value='".$phone."' hidden>";
echo "<img onclick='disappear".$contents['0']."();return false;' id='M".$contents['0']."' src='profileimg/".$contents['5']."' style='max-height:250px;width: auto;'>";
echo "<script type='text/javascript'>
										
	function disappear".$contents['0']."() {
		var qrcode".$contents['0']." = new QRCode('qr".$contents['0']."', {
    width: 125,
    height: 125,
    colorDark : '#000000',
    colorLight : '#ffffff',
    correctLevel : QRCode.CorrectLevel.H
});
		var elText".$contents['0']." = document.getElementById('M".$contents['0']."');
		qrcode".$contents['0'].".makeCode(elText".$contents['0'].".value);	
		makeCode();
	}
	</script>";
//echo "<img id='pic' src='profileimg/".$contents['5']."' width='100%'></a>";
//echo "<td><a href='viewe_profile.php?uid=".$contents['0']."'><img id='pic' src='profileimg/".$contents['5']."'></a>";
	}}

if($contents['7'] != 'choice'){
	
if($contents['16'] != $_SESSION['country'] && $contents['19'] == '1'){
echo "<div id='cell'>NOT AVAILABLE</div></td>";	
}else{	
	
if(isset($_SESSION['searchcountry'])){$country = $_SESSION['searchcountry'];}		
$country = $contents['16'];		
if(isset($country) && isset($_SESSION['country'])){
	$mycountry = $_SESSION['country'];
	include 'international.php';
	if(is_numeric($contents['3'])){
	if(strtoupper($_SESSION['country']) == strtoupper($country)){
		
echo "<div id='cell'><span style='font-size:20px'><strong>".$contents['3']."</strong></span></strong></div></td>";		
		
	}else{

if($localintl == '1'){
echo "<div id='cell'><span style='font-size:20px'><strong>NOT AVAILABLE</strong></span></strong></div></td>";			
	}else{		
		
if($countrycode == substr($contents['3'],0,strlen($countrycode))){
	echo "<div id='cell'><span style='font-size:20px'><strong>".$exitcode."/+ ".$contents['3']."</strong></span></strong></div></td>";		
}	
elseif(substr($contents['3'],0,1) == $trunk){
	echo "<div id='cell'><span style='font-size:20px'><strong>".$exitcode."/+ ".$countrycode." ".substr($contents['3'],1)."</strong></span></strong></div></td>";	
}elseif (substr($contents['3'],0,1) == '+'){
	echo "<div id='cell'><span style='font-size:20px'><strong>".$contents['3']."</strong></span></strong></div></td>";	
}else{
	echo "<div id='cell'><span style='font-size:20px'><strong>".$exitcode."/+ ".$countrycode." ".$trunkprefix." ".$contents['3']."</strong></span></strong></div></td>";	
}
	}}}else{
	echo "<div id='cell'><span style='font-size:20px'><strong>".$contents['3']."</strong></span></strong></div></td>";	
}}else{
			
	echo "<div id='cell'><span style='font-size:20px'><strong>".$contents['3']."</strong></span></strong></div></td>";


}
}}		
}
		$count++;
		$rowcount++;
}
			

} 
				


				
			
}
mysqli_close($mysqli);
?>
<!--<table><tr><td><span style='color:#ff69b4'><strong>BUY SOLANA</strong></span></td><td>
<?php 
//if($_SESSION['country']=='USA'){echo "<a href='https://ftx.us/#a=4478369' target='blank'>";}
//else{echo "<a href='https://ftx.com/#a=4478369' target='blank'>";}
?>
<img height="40" src='img/ftx.png'></a></td>
<td>
<span style='color:#ff69b4'><strong>DONATE to CallText.me</strong></span></td>
<td><img width='200px' src='img/sol.png'></td><td><!--<img width='150px'  src='img/recieve.png'><br>
<input type="text" value="Gq9Gv34h6Y8noDiKpPk1HcT5gCJJD8Z6xNj1aSChtpv2" id="myInput" size="43">
<button onclick="copyAddress()">Copy</button>
    <script>
        function copyAddress() {
        var copyText = document.getElementById("myInput");
        copyText.select();
        copyText.setSelectionRange(0, 99999); /* For mobile devices */
        document.execCommand("copy");
      }
	  </script>
<!--<span style='color:#ff69b4;font-size: 10pt'>Gq9Gv34h6Y8noDiKpPk1HcT5gCJJD8Z6xNj1aSChtpv2</span></td></tr></table>-->
</body>
</html>