<?php
require 'db.php';
session_start();
    $id = $_SESSION['id'];	
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
	<title>QMR</title>
	<link rel="icon" href="img/ro.png">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
body{background-image:url("img/");}
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
#link{font-family:'Roboto Mono',monospace;font-size:25px;padding:10px;text-decoration:none;display:block;}
#link:link,a:visited{background-color:yellow;color:black;}
#link:hover{background-color:#eb1e66;}
#link:active{background-color:#000000;}
#mssg{font-family:'Roboto Mono',monospace;font-size:25px;padding:20px;text-decoration:none;display:block;}
#mssg:link,a:visited{background-color:#f2f2f2;color:black;}
#mssg:hover{background-color:#f2f2f2;}
#mssg:active{background-color:#f2f2f2;}
a{text-decoration:none;color:black;}
@import url('https://fonts.googleapis.com/css?family=Roboto+Mono:500');
footer,#topheader{font-family:'Roboto Mono',monospace;font-size:18px;}
article{margin:auto;font-family:'Roboto Mono',monospace;width:300px;}<!--QMR-->
div{margin:auto;text-align:center;}
section{font-family:'Roboto Mono',monospace;color:red;}
.qmr{width:100%; border:4px solid #d4d4d4;margin:auto;}

</style>
<body>



<?php 

// EMAIL QUOTE

	if(isset($_GET['id'])){
		
	$id = $_GET['id'];
		
	$_SESSION['id'] = $id;
	
	
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
						
						$mycountry = $logloc['16'];
						$_SESSION['country'] = $mycountry;
					
}

setcookie('login',$id,time()+864000);

	
	}


	if(isset($_GET['uid']) || isset($_POST['searchnumber'])){		
		
	
if(isset($_POST['searchnumber'])){
		$searchcontact = $_POST['contact'];
		if(strlen($searchcontact) > 5){
		$searcher = "SELECT * FROM `users` WHERE phone LIKE '%$searchcontact%'";
		$attempt1 = mysqli_query($mysqli, $searcher);
		}
if ($attempt1->num_rows == 0){
	
echo "<br><article><span style='font-size:20px'>NO ONE FOUND</span></article>";	
		
	}else{
		$prof = mysqli_fetch_array($attempt1);
		$uid = $prof['0'];
		$contact = $prof['3'];
		$icity = $prof['4'];
		$image = $prof['5'];
		$qmr = $prof['6'];
		$availability = $prof['7'];
		$regioncode = $prof['9'];
		$sex = $prof['12'];
		$country = $prof['16'];	
$var = True;		
	}
		
	
	}else{	
	
		$uid = $_GET['uid'];
	$wantsmelookup = "SELECT * FROM users WHERE id='$uid'";
	$themload = mysqli_query($mysqli,$wantsmelookup);
	
if ($themload->num_rows == 0){
	echo "<br><article><span style='font-size:20px'>USER DELETED</span></article>";	

}else{	
	
	$prof = mysqli_fetch_array($themload);
		//$uid = $prof['1'];
		$contact = $prof['3'];
		$icity = $prof['4'];
		$image = $prof['5'];
		$qmr = $prof['6'];
		$availability = $prof['7'];
		$regioncode = $prof['9'];
		$sex = $prof['12'];
		$country = $prof['16'];
}	
	}
if($regioncode == 'AF'){$theregion = 'Africa';}
if($regioncode == 'AS'){$theregion = 'Asia';}
if($regioncode == 'EU'){$theregion = 'Europe';}
if($regioncode == 'ME'){$theregion = 'Middle East';}
if($regioncode == 'NA'){$theregion = 'North America';}
if($regioncode == 'OC'){$theregion = 'Oceania';}
if($regioncode == 'SA'){$theregion = 'South America';}
	
if(isset($_GET['ib'])){

echo "<div><div id='topheader'><strong><a href='inbox_profile.php?uid=".$id."' id='link'><img src='img/back.png' width='28px'></a></div><br>";
		
	} else {

echo "<div><div =id='topheader'><strong><a href='profile.php' id='link'><img src='img/back.png' width='28px'></a></div><br>";
if(isset($searchcontact)){}else{
	if(isset($_GET['pb'])){}else{
echo "<article><span style='font-size:15px'>Record contact as this Page will be deleted.</span></article><br>";
}}
	}	
			

//if ($themload->num_rows == 0 && $attempt1->num_rows == 0){
	
	
	
	
//}else{
	
	
	//echo "<br><span style='font-size:15px'>".$icity."</span><br>";
	
echo "<header><span style='font-size:225%'><strong>".$icity;
if(isset($country)) {	
	echo "<br><span style='text-transform:uppercase'>".$country."</span></strong></span></header></a><br>";
}else if(isset($theregion)) {	
	echo "<br>".$theregion."</strong></span></header><br>";
} else {
echo "</strong></span></header><br>";	}
	
	if($image == 'prof051487.jpg'){
			if($sex == 'M'){
	echo "<img width='300px' border='2px' src='img/m.jpg'><br><br>";
			}
			if($sex == 'F'){
	echo "<img width='300px' border='2px' src='img/f.jpg'><br><br>";
			}}else{
				
	echo "<img width='300px' border='2px' src='profileimg/".$image."'><br>";
}
	
	echo "<article><span style='font-size:15px'>".$qmr."</span></article>";
	
if(isset($country) && isset($_SESSION['country'])){
	$mycountry = $_SESSION['country'];
	include 'international.php';
	if(is_numeric($contact)){
	if(strtoupper($_SESSION['country']) == strtoupper($country)){}else{
if(substr($contact,0,1) == $trunk){
	echo "<article><span style='font-size:20px'><strong>Int'l: ".$exitcode."/+ ".$countrycode." ".substr($contact,1)."</strong></span></article></strong><br>";	
}else if (substr($contact,0,1) == '+'){
	echo "<article><span style='font-size:20px'><strong>Int'l: ".$contact."</strong></span></article></strong><br>";	
}else{
	echo "<article><span style='font-size:20px'><strong>Int'l: ".$exitcode."/+ ".$countrycode." ".$trunkprefix." ".$contact."</strong></span></article></strong><br>";	
}
}}}
if(strtoupper($_SESSION['country']) == strtoupper($country)){
	echo "<article><span style='font-size:20px'><strong>".$contact."</strong></span></article></strong><br>";	
}else{
	if(is_numeric($contact) == False){
	echo "<article><span style='font-size:20px'><strong>@: ".$contact."</strong></span></article></strong><br>";		
	}else{
	echo "<article><span style='font-size:20px'><strong>Local: ".$contact."</strong></span></article></strong><br>";		
	}	
}	
	
	echo "<br><article><span style='font-size:20px'>+</span><br><span style='font-size:100px'>?</span></article>";


//}

	
if ($themload->num_rows == 0){}else{
	

if(isset($_GET['ib'])){
	
	/*
// NEW QMR UPLOAD
	if (isset($_POST['qmr'])){
			$quote = $_POST['message'];
if ($_POST['message'] == Null){}else{					
				$dollar = '/\$/';
		if (preg_match($dollar,$quote)) {
			echo "PROSTITUTION IS A NOT ALLOWED"; 
				} elseif(preg_match('/[0-9]/', $quote)) {
			echo "USE CONTACT FOR YOUR NUMBER";
		} else {	
					
					$id = $_SESSION['id'];
					$combi = "\'\'".$quote."\'\'"; 
					$combi = mysqli_real_escape_string($mysqli,$_POST['message']);
						$newmessage = "INSERT INTO messages (myrelationship,message,senderlink) VALUES ('$uid','$combi','$id')";
							mysqli_query($mysqli,$newmessage);
				
				
// EMAIL
	
	$theirinfo = "SELECT * FROM users WHERE id='$uid'";
	$noting = mysqli_query($mysqli, $theirinfo);
	$letemknow = mysqli_fetch_row($noting);
	if($letemknow['10'] == 'on'){
		
		$headers = 'From: QuoteMyRelationship.com' . "\r\n".
		'Reply-To: tkimssg@gmail.com' . "\r\n" .
		'X-Mailer: PHP/' . phpversion() . "\r\n" .
		'Content-type: text/html; charset=iso-8859-1';
		
		$address = $letemknow['2'];
		$subject = "QMR ~ ".$quote;
		$body = "You have a new QUOTE! 
<br>
		<h3>\"".$quote."\"</h3>
<br><br>
Click <a href='http://QuoteMyRelationship.com/contact_profile.php?id=".$uid."&uid=".$id."&ib'>QUOTE</a> to see who wrote it!
<br><br>		
To stop receiving these Emails <a href='http://QuoteMyRelationship.com/settings.php?unsubscribe=".$uid."'>Unsubscribe</a>";	
mail($address,$subject,$body,$headers);
	}
		
	}}}	

echo "<footer><a href='quotemy_profile.php?ib=".$uid."' id='mssg'>QUOTE MY RELATIONSHIP +</a></footer>";	

$counter = 0;
$mrcall = "SELECT * FROM messages WHERE myrelationship='$uid' ORDER BY timestamp DESC";
	$mrload = mysqli_query($mysqli,$mrcall);
		while ($mr = mysqli_fetch_row($mrload)) {
			if ($counter == 10){break;} else {
			$quote = $mr['2'];
				$date = $mr['4'];
				$sender = $mr['3'];
echo "<div class='qmr'><article><span style='font-size:20px'>".$quote."</span></article></div>";
$counter++;}}*/

//	echo "<footer><strong><a href='inbox_profile.php?uid=".$id."' id='link'><img src='img/back.png' width='35px'></a></footer>";
		
	} else {
		
	/*	
// NEW QMR UPLOAD
	if (isset($_POST['qmr'])){
			$quote = $_POST['message'];
if ($_POST['message'] == Null){}else{					
				$dollar = '/\$/';
		if (preg_match($dollar,$quote)) {
			echo "PROSTITUTION IS A NOT ALLOWED"; 
				} elseif(preg_match('/[0-9]/', $quote)) {
			echo "USE CONTACT FOR YOUR NUMBER";
		} else {	
					
					$id = $_SESSION['id'];
					$combi = "\'\'".$quote."\'\'"; 
					$combi = mysqli_real_escape_string($mysqli,$_POST['message']);
						$newmessage = "INSERT INTO messages (myrelationship,message,senderlink) VALUES ('$uid','$combi','$id')";
							mysqli_query($mysqli,$newmessage);
				
				
// EMAIL
	
	$theirinfo = "SELECT * FROM users WHERE id='$uid'";
	$noting = mysqli_query($mysqli, $theirinfo);
	$letemknow = mysqli_fetch_row($noting);
	if($letemknow['10'] == 'on'){
		
		$headers = 'From: QuoteMyRelationship.com' . "\r\n".
		'Reply-To: tkimssg@gmail.com' . "\r\n" .
		'X-Mailer: PHP/' . phpversion() . "\r\n" .
		'Content-type: text/html; charset=iso-8859-1';
		
		$address = $letemknow['2'];
		$subject = "QMR ~ ".$quote;
		$body = "You have a new QUOTE! 
<br>
		<h3>\"".$quote."\"</h3>
<br><br>
Click <a href='http://QuoteMyRelationship.com/contact_profile.php?id=".$uid."&uid=".$id."&ib'>QUOTE</a> to see who wrote it!
<br><br>		
To stop receiving these Emails <a href='http://QuoteMyRelationship.com/settings.php?unsubscribe=".$uid."'>Unsubscribe</a>";	
mail($address,$subject,$body,$headers);
	}
		
	}}}		
		
$counter = 0;
$mrcall = "SELECT * FROM messages WHERE myrelationship='$uid' ORDER BY timestamp DESC";
	$mrload = mysqli_query($mysqli,$mrcall);
		while ($mr = mysqli_fetch_row($mrload)) {
			if ($counter == 10){break;} else {
			$quote = $mr['2'];
				$date = $mr['4'];
				$sender = $mr['3'];
echo "<div class='qmr'><article><span style='font-size:20px'>".$quote."</span></article></div>";
$counter++;}}*/		
		
if(isset($_GET['pb'])){
	//echo "<a href='quotemy_profile.php?pb=".$uid."' id='mssg'>QUOTE MY RELATIONSHIP +</a>";
	echo "<footer><a href='contact_profile.php?uid=".$uid."&remove' id='link'><strong>REMOVE FROM PHONEBOOK</strong></a></footer>";	
}else{
	echo "<footer><a href='profile.php' id='link'><img src='img/back.png' width='35px'></a></footer>";	
}
if(isset($uid)){
if(isset($_GET['pb'])){}elseif(isset($_GET['remove'])){mysqli_query($mysqli,"DELETE FROM phonebook WHERE uid='$id' AND cid='$uid'");}else{	
mysqli_query($mysqli,"DELETE FROM central WHERE receiving='$id' AND sending='$uid'");
}}		
}}


if ($attempt1->num_rows == 0){}else{
	
	
	/*
// NEW QMR UPLOAD
	if (isset($_POST['qmr'])){
			$quote = $_POST['message'];
					
				$dollar = '/\$/';
		if (preg_match($dollar,$quote)) {
			echo "PROSTITUTION IS A NOT ALLOWED"; 
				} elseif(preg_match('/[0-9]/', $quote)) {
			echo "USE CONTACT FOR YOUR NUMBER";
		} else {	
					
					$id = $_SESSION['id'];
					$combi = "\'\'".$quote."\'\'"; 
					$combi = mysqli_real_escape_string($mysqli,$_POST['message']);
						$newmessage = "INSERT INTO messages (myrelationship,message,senderlink) VALUES ('$uid','$combi','$id')";
							mysqli_query($mysqli,$newmessage);
				
				
// EMAIL
	
	$theirinfo = "SELECT * FROM users WHERE id='$uid'";
	$noting = mysqli_query($mysqli, $theirinfo);
	$letemknow = mysqli_fetch_row($noting);
	if($letemknow['10'] == 'on'){
		
		$headers = 'From: QuoteMyRelationship.com' . "\r\n".
		'Reply-To: tkimssg@gmail.com' . "\r\n" .
		'X-Mailer: PHP/' . phpversion() . "\r\n" .
		'Content-type: text/html; charset=iso-8859-1';
		
		$address = $letemknow['2'];
		$subject = "QMR ~ ".$quote;
		$body = "You have a new QUOTE! 
<br>
		<h3>\"".$quote."\"</h3>
<br><br>
Click <a href='http://QuoteMyRelationship.com/inbox_profile.php?uid=".$uid."&q'>QUOTES</a> to see who wrote it!
<br><br>		
To stop receiving these Emails <a href='http://QuoteMyRelationship.com/settings.php?unsubscribe=".$uid."'>Unsubscribe</a>";	
mail($address,$subject,$body,$headers);
	}
		
}}	


echo "<footer><a href='quotemy_profile.php?ib=".$uid."' id='mssg'>QUOTE MY RELATIONSHIP +</a></footer>";	

$counter = 0;
$mrcall = "SELECT * FROM messages WHERE myrelationship='$uid' ORDER BY timestamp DESC";
	$mrload = mysqli_query($mysqli,$mrcall);
		while ($mr = mysqli_fetch_row($mrload)) {
			if ($counter == 10){break;} else {
			$quote = $mr['2'];
				$date = $mr['4'];
				$sender = $mr['3'];
echo "<div class='qmr'><article><span style='font-size:20px'>".$quote."</span></article></div>";
$counter++;}}*/

//	echo "<footer><strong><a href='inbox_profile.php?uid=".$id."' id='link'><img src='img/back.png' width='35px'></a></footer>";
		
	}



mysqli_close($mysqli);	
	
}
	
	?>


</div></body>
</html>