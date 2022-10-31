<!DOCTYPE html>
<html>
<head>
<title>QMR</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Dating">
<meta name="keywords" content="single,lonely,gf,bf,horny,sex,relationship,dating,xxx,latinas,meet singles,social media">
<style type="text/css">
@import url('https://fonts.googleapis.com/css?family=Playfair+Display:900');

@import url('https://fonts.googleapis.com/css?family=Roboto+Mono:500');

body{background-color:black;text-align:center;}

#link{font-family:'Roboto Mono',monospace;font-size:25px;padding:20px;text-decoration:none;display:block;}
#link:link,a:visited{background-color:yellow;color:black;}
#link:hover{background-color:#eb1e66;}
#link:active{background-color:#000000;}

a {width:100%;}

.form{margin:auto;background:linear-gradient(#5e5151,#bab9c7,#c7ced6);width:275px;border-radius:12px;}

form{font-family:'Roboto', sans-serif;font-size:17px;text-decoration:none;}

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

header{background:#48D1CC linear-gradient(to bottom,#2c7067,#48D1CC);width:100%;
	font-family: 'Playfair Display', serif;color:black;
	border:1px solid #52ffe8;}

</style>

<body>
<?php

		$who = $_GET['who'];

	$call = "SELECT * FROM users WHERE id='$who'";
	$infoload = mysqli_query($mysqli,$call);
	$row = mysqli_fetch_array($infoload);
		$email = $row['2'];
		$contact = $row['3'];
		$city = $row['4'];
		$qmr = $row['6'];
	if($_SESSION['myr'] != $_SESSION['region']){
		$availability = 'choice';
	}else{	
	$availability = $row['7'];}
	if($_SESSION['paid'] == 1){
	$availability = $row['7'];		
	}
	if($_SESSION['region'] == Null ){		
$theregion = $row['9']; }
	
		$ori = $row['11'];
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
		
echo "<td>";		
	if($count > 3){
		echo "<br><br><br><br><a href='forum_everyone.php?return=".$who."&s=".$s."'><img src='img/centralw.png' width='45px'></a>";
	} else {
		echo "<br><br><br><br><a href='forum_everyone.php?return=".$who."&s=".$s."'><img src='img/centralw.png' width='45px'></a>";
	}
			
	
	if($availability != 'anyone'){
	
	echo "<br><br><a href='forum_everyone.php?add=".$who."'><article><span style='color:red'><strong>SEND CONTACT</strong></span><br><img src='img/na.png' width='35px'></article></a><br>";

if($country == Null){

if($_SESSION['region'] == Null ){	
if($theregion == 'AF' ){echo "<article><span style='font-size:14px'>Africa</span></article>";}
if($theregion == 'AS' ){echo "<article><span style='font-size:14px'>Asia</span></article>";}
if($theregion == 'EU' ){echo "<article><span style='font-size:14px'>Europe</span></article>";}
if($theregion == 'ME' ){echo "<article><span style='font-size:14px'>Middle East</span></article>";}
if($theregion == 'NA' ){echo "<article><span style='font-size:14px'>North America</span></article>";}
if($theregion == 'OC' ){echo "<article><span style='font-size:14px'>Oceania</span></article>";}
if($theregion == 'SA' ){echo "<article><span style='font-size:14px'>South America</span></article>";}}
}else{
echo "<article><span style='font-size:14px'>".$country."</span></article>";	
}
	echo "<article><span style='font-size:14px'>".$qmr."</span></article>";
	
echo "<a href='viewe_profile.php?uid=".$who."&more&cell#cell'><article>More numbers from ".$city."</article></a>";		

	} else {
		
if($country == Null){

if($_SESSION['region'] == Null ){	
if($theregion == 'AF' ){echo "<br><article><span style='font-size:14px'>Africa</span></article>";}
if($theregion == 'AS' ){echo "<br><article><span style='font-size:14px'>Asia</span></article>";}
if($theregion == 'EU' ){echo "<br><article><span style='font-size:14px'>Europe</span></article>";}
if($theregion == 'ME' ){echo "<br><article><span style='font-size:14px'>Middle East</span></article>";}
if($theregion == 'NA' ){echo "<br><article><span style='font-size:14px'>North America</span></article>";}
if($theregion == 'OC' ){echo "<br><article><span style='font-size:14px'>Oceania</span></article>";}
if($theregion == 'SA' ){echo "<br><article><span style='font-size:14px'>South America</span></article>";}}
}else{
echo "<article><span style='font-size:14px'>".$country."</span></article>";	
}
if($hide != 1){
if(isset($country) && isset($_SESSION['country'])){
	$mycountry = $_SESSION['country'];
	include 'international.php';
	if(is_numeric($contact)){
	if(strtoupper($_SESSION['country']) == strtoupper($country)){
		
echo "<br><br><article><span style='font-size:20px'><strong>".$contact."</strong></span></article></strong><br>";		
		
	}else{
if($countrycode == substr($contact,0,strlen($countrycode))){
	echo "<article><span style='font-size:20px'><strong>Int'l: ".$exitcode."/+ ".$contact."</strong></span></article></strong><br>";		
}	
elseif(substr($contact,0,1) == $trunk){
	echo "<article><span style='font-size:20px'><strong>Int'l: ".$exitcode."/+ ".$countrycode." ".substr($contact,1)."</strong></span></article></strong><br>";	
}elseif (substr($contact,0,1) == '+'){
	echo "<article><span style='font-size:20px'><strong>Int'l: ".$contact."</strong></span></article></strong><br>";	
}else{
	echo "<article><span style='font-size:20px'><strong>Int'l: ".$exitcode."/+ ".$countrycode." ".$trunkprefix." ".$contact."</strong></span></article></strong><br>";	
}
}}else{
	echo "<br><br><article><span style='font-size:20px'><strong>".$contact."</strong></span></article></strong><br>";	
}}else{
			
	echo "<br><br><article><span style='font-size:20px'><strong>".$contact."</strong></span></article></strong><br>";


}}

	if($hide != 1){
	if($ori == "gay"){
		echo "<img src='img/lgbt.png' width='30px'><br><br>";
	}}else{
		echo "<br><br>";
	}
		

	echo "<article><span style='font-size:14px'><strong>".$qmr."</strong></span></article></strong><br>";
	
	

echo "<a href='viewe_profile.php?uid=".$who."&more&cell#cell'><article>More numbers from ".$city."</article></a>";	
	
	
	
	}	
	
		if($id == 198){

		echo "<table><tr><td>";	
		echo "<a href='delete.php?delete=".$who."' id='mylink'>DELETE</a>&nbsp;&nbsp;";
		echo "<a href='viewe_profile.php?uid=".$who."' id='mylink'>VIEWE</a></td></tr><tr><td>";
		echo "<a href='profile.php?login=".$email."' id='mylink'>".$email."</a></td></tr></table>";
		echo "<br>".$contact;
	}

?>
</body>
</html>