<?php 
require 'db.php';
session_start();

if (isset($_GET['enter'])){
	$_SESSION['id']= '0';
	$_SESSION['mf'] = 'F';
	$_SESSION['ori']= 'str';
	$_SESSION['myr'] = 'AS';
	$_SESSION['region'] = 'AS';
	$_SESSION['country'] = 'INDIA';
	$_SESSION['paid']=1;
// LOGIN COUNT
$id = $_SESSION['id'];
$today = date("Y-m-d");
$mobile = 0;
$homeori = "0";
$homemf = "0";
$logincount = "INSERT INTO login (uid,logindate,sex,ori,mobile) VALUES ('$id','$today','$homemf','$homeori','$mobile')";
		mysqli_query($mysqli, $logincount);	
}

	
	if (isset($_POST['search'])){
		$city = $_POST['city'];
		$_SESSION['city'] = $city;}
	
if(isset($_SESSION['id'])){

	$id = $_SESSION['id'];
		$sessionmf = $_SESSION['mf'];
			$sessionori = $_SESSION['ori'];
			
// SESSION LOCATION			
	if(isset($_GET['c'])){
	$mycity = "SELECT * FROM users WHERE id='$id'";
		$citymove = mysqli_query($mysqli, $mycity);
			$thecity = mysqli_fetch_row($citymove);
				$_SESSION['city'] = $thecity['4'];
			$sessionloc = $_SESSION['city'];
} else {}
} else {
	    header("location: index.php");

}


// REGION

	if (isset($_POST['region'])){
		if($_POST['continent'] == 'NO'){
			$_SESSION['region'] = Null;
		} else {
		$region = $_POST['continent'];
		$_SESSION['region'] = $region;}}
	
	elseif(isset($_SESSION['region'])){
	$region = $_SESSION['region'];		
		} else {
		$_SESSION['region'] = $_SESSION['myr'];
		}	
?>
<!DOCTYPE html>
<html>
<head>
<title>CallText.travel</title>
<script type="text/javascript">
if (screen.width<700){
	window.location="mforum_everyone.php";
}
</script>
<link rel="icon" href="img/ro.png">
<style>
@import url('https://fonts.googleapis.com/css?family=Roboto+Mono:500');

body{font-family:'Roboto Mono',monospace;color:white;background-image:url("img/forum10.jpg");}

#container{text-align:center;}

#cell{width:275px;font-size:20px;text-transform:uppercase;color:white;text-decoration:none;}

a:link{text-decoration:none;}
a:visited{text-decoration:none;}
a:hover{text-decoration:none;}
a:active{text-decoration:none;}
	
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
	table{text-align:center;}

#b{display:block;border:5px solid black;color:black;font-size:30px;text-decoration:none;}
#next{display:block;border:1px solid #608bd1;color:#efdcee;font-size:35px;text-decoration:none;}


header{background-image:url("img/rainbow2.gif");font-family:'Roboto Mono',monospace;color:white;background-color:black;font-size:30px;}
	
table{width:100%;margin:0;}	

#container{text-align:center;}

article{color:white;}

#btc{border:3px solid white;}
#ad{margin:0 auto;}

#space{height: 100px;width: 100px;}


td{position:relative;}


</style>
</head>
<body><div id="container">


<header>

<table><tr>

<td>

<a href="mailto:calltextdotme@gmail.com"><span style="font-size:130%;color:#000000;font-family: 'Roboto Mono',monospace;">&#8592; Advertise Here &#8594;</span></a><br>

</td>
<td>

<form action='travel_search.php' method='POST'>
<select name='continent'>
<?php
if($_SESSION['region'] == 'AF' ){echo "<option value='AF'>Africa</option><option value='AS'>Asia</option><option value='EU'>Europe</option><option value='ME'>Middle East</option><option value='NA'>North America</option><option value='OC'>Oceania</option><option value='SA'>South America</option></select>";}//<option value='NO'>GLOBAL</option>
if($_SESSION['region'] == 'AS' ){echo "<option value='AS'>Asia</option><option value='AF'>Africa</option><option value='EU'>Europe</option><option value='ME'>Middle East</option><option value='NA'>North America</option><option value='OC'>Oceania</option><option value='SA'>South America</option></select>";}
if($_SESSION['region'] == 'EU' ){echo "<option value='EU'>Europe</option><option value='AF'>Africa</option><option value='AS'>Asia</option><option value='ME'>Middle East</option><option value='NA'>North America</option><option value='OC'>Oceania</option><option value='SA'>South America</option></select>";}
if($_SESSION['region'] == 'ME' ){echo "<option value='ME'>Middle East</option><option value='AF'>Africa</option><option value='AS'>Asia</option><option value='EU'>Europe</option><option value='NA'>North America</option><option value='OC'>Oceania</option><option value='SA'>South America</option></select>";}
if($_SESSION['region'] == 'NA' ){echo "<option value='NA'>North America</option><option value='AF'>Africa</option><option value='AS'>Asia</option><option value='EU'>Europe</option><option value='ME'>Middle East</option><option value='OC'>Oceania</option><option value='SA'>South America</option></select>";}
if($_SESSION['region'] == 'OC' ){echo "<option value='OC'>Oceania</option><option value='AF'>Africa</option><option value='AS'>Asia</option><option value='EU'>Europe</option><option value='ME'>Middle East</option><option value='NA'>North America</option><option value='SA'>South America</option></select>";}
if($_SESSION['region'] == 'SA' ){echo "<option value='SA'>South America</option><option value='AF'>Africa</option><option value='AS'>Asia</option><option value='EU'>Europe</option><option value='ME'>Middle East</option><option value='NA'>North America</option><option value='OC'>Oceania</option></select>";}
if($_SESSION['region'] == Null ){echo "<option value='NO'>GLOBAL</option><option value='AF'>Africa</option><option value='AS'>Asia</option><option value='EU'>Europe</option><option value='ME'>Middle East</option><option value='NA'>North America</option><option value='OC'>Oceania</option><option value='SA'>South America</option></select>";}
?>
<input type='submit' name='region' value='REGION'></form>



</td>
<td>

<a id='b' href='profile.php'><strong>BACK</strong></a>


</td></tr>
</table>

</header>

<?php 


if(isset($_SESSION['country']) & $_SESSION['id']!=1){
	$mycountry = strtoupper($_SESSION['country']);
}else{
	$mycountry = 'NoCountry';
}

if($_SESSION['id'] == Null){
	mysqli_close($mysqli);
			setcookie('login',Null,time()+1);
session_unset();
session_destroy(); 
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

echo "<div id='btc'><h1>Pay 0.0001 Bitcoin to gain access to ".$iwantregion.".</h1>";
	echo "<h2>to email: <a href='https://www.coinbase.com/international'>tkimssg@gmail.com on <u>Coinbase.com</u></a></h2>";
	echo "<h3>Include your Login Email when sending payment</h3></div>";
	$_SESSION['region'] = $_SESSION['myr'];
	
}

//Country





if(isset($_GET['country'])){

$start = $_GET['country'];

$myr = $_SESSION['myr'];
if($_SESSION['paid']==1){
$regionvar = $_SESSION['region'];
if($regionvar == NULL){
$l = "SELECT * from travel WHERE sp <= '$start' ORDER BY sp DESC";		
}else{
$l = "SELECT * from travel WHERE sp <= '$start' AND region='$regionvar' ORDER BY sp DESC";	
}	
}else{
$l = "SELECT * from travel WHERE sp <= '$start' AND region='$myr' ORDER BY sp DESC";	
}
if($_SESSION['id']=="0"){
$l = "SELECT * from travel WHERE sp <= '$start' ORDER BY sp DESC";			
}			
	
if ($crowd = mysqli_query($mysqli, $l)){
	$ncountries = $crowd->num_rows;
if($ncountries<8){$remaining=8-$ncountries;}
	$rowmax = 4;
	$rowcount = 0;
	$count = 0;
//	$total = 8;

	echo "<table><tr>";

while($contents = mysqli_fetch_row($crowd)){
	if ($rowcount == $rowmax){echo "</tr><tr>";$rowcount=0;}
	if ($count == 8){ 
		echo "</tr></table>";
		echo "<br><a id='next' href='travel_search.php?country=".$contents['2']."'>More Countries</a>";break;
	}elseif($ncountries==$count){
		for($x = 1; $x <= $remaining; $x++){
			echo "<td><div id='space'> </div></td>";$count++;
		}
	}else{
		echo "<td style='text-align: center;position:relative;'><a href='cforum.php?ts=".$contents['0']."'>";
		echo "<img style='position:absolute;margin-left:35%;margin-top:40%;' src='countryimg/flag/flag_".strtolower($contents['0']).".png' width='30%'><img src='countryimg/travelling.jpeg' width='100%'>";
		echo "</div></a>";//".strtolower($contents['0'])."
		echo "<div id='cell'>".$contents['0']."</div></td>";
		$rowcount++;$count++;
}}}



}else{
	
	
	
	
//SQL MAIN
$myr = $_SESSION['myr'];
if($_SESSION['paid']==1){
$regionvar = $_SESSION['region'];
if($regionvar == NULL){
$l = "SELECT * from travel ORDER BY sp DESC";	
}else{
$l = "SELECT * from travel WHERE region='$regionvar' ORDER BY sp DESC";	
}	
}else{
$l = "SELECT * from travel WHERE region='$myr' ORDER BY sp DESC";	
}
//if($_SESSION['id']==0){
//$l = "SELECT * from travel ORDER BY sp DESC";			
//}			
	
if ($crowd = mysqli_query($mysqli, $l)){
	$ncountries = $crowd->num_rows;
if($ncountries<8){$remaining=8-$ncountries;}
	$rowmax = 4;
	$rowcount = 0;
	$count = 0;
//	$total = 8;

	echo "<table><tr>";

while($contents = mysqli_fetch_row($crowd)){
	if ($rowcount == $rowmax){echo "</tr><tr>";$rowcount=0;}
	if ($count == 8){ 
		echo "</tr></table>";
		echo "<br><a id='next' href='travel_search.php?country=".$contents['2']."'>More Countries</a>";break;
	}elseif($ncountries==$count){
		for($x = 1; $x <= $remaining; $x++){
			echo "<td><div id='space'> </div></td>";$count++;
		}
	}else{
		echo "<td style='text-align: center;position:relative;'><a href='cforum.php?ts=".$contents['0']."'>";
	
		echo "<img style='position:absolute;margin-left:35%;margin-top:40%;' src='countryimg/flag/flag_".strtolower($contents['0']).".png' width='30%'><img src='countryimg/travelling.jpeg' width='100%'>";
		echo "</div></a>";//".strtolower($contents['0'])."
		echo "<div id='cell'>".$contents['0']."</div></td>";
		$rowcount++;$count++;
}}}}	

?>

<table><tr><td>


</td></tr><tr><td>

<?php

//DONATE
echo "<br><br><span style='color:#ff69b4'><strong>DONATE HERE</strong></span><br><img width='250px' src='img/sol.png'><br><img width='250px'  src='img/recieve.png'><br><span style='color:#ff69b4;font-size: 10pt'>Gq9Gv34h6Y8noDiKpPk1HcT5gCJJD8Z6xNj1aSChtpv2</span>";

?>

</td></tr></table>

</div>
</body>
</html>