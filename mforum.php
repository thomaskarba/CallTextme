<?php 
require 'db.php';
session_start();

	if (isset($_POST['search'])){
		$city = $_POST['city'];
		$_SESSION['city'] = $city;}
		
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

//mviewe city link
if(isset($_GET['city'])){
	$sessionloc = $_GET['city'];
	$_SESSION['city'] = $_GET['city'];
}				

?>
<!DOCTYPE html>
<html>
<head>
<title>QMR</title>
<link rel="icon" href="img/ro.png">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
@import url('https://fonts.googleapis.com/css?family=Roboto+Mono:500');
body{font-family:'Roboto Mono',monospace;color:white;background-color:#000000;}

	header{width:300px;text-align:center;
	font-family:'Roboto Mono',monospace;color:white;
	margin:auto;}
div{text-align:center;font-size:26px;margin:auto;}
#container{text-align:center;}
#center{text-align:center;}
#cell{width:275px;font-size:30px;text-transform:uppercase;}
hr{border:0;height:0;size:1px;color:#799971}
nav{text-align:center;font-family:'Roboto Mono',monospace;font-size:20px;}
	a{text-decoration:none;color:white;}
	
#link{font-family:'Roboto Mono',monospace;font-size:25px;padding:20px;text-decoration:none;display:block;}
#link:link,a:visited{background-color:#191919;color:#515151;border:1px solid #282828;}
	
input[type=text],select,button
	{padding: 3px 3px;
	margin: 5px;
	border-radius:10px;
	font-family: 'Dosis', sans-serif;
	font-size:20px;
	background-color:#FFFFFF;
	color:black;}

input[type=submit]{
	background-color:#FFFFFF;
	color:black;
	border:0;
	margin-bottom:20px;
	margin-top:5px;
	font-size:15px;
	padding:9px 18px;}

input[type=submit]:hover{
	background-color:yellow;
}
	form{border:none;}
	table,td{text-align:center;}
	p{text-transform:uppercase;color:white;}
	
table{width:100%;}
</style>
</head>
<body>

<table><tr>

<?php

if($_SESSION['ori'] == 'gay'){
	
if(isset($_GET['qmr']) || isset($_GET['return'])){}
else{
	if($_SESSION['orisearch'] == Null){
	$_SESSION['orisearch'] = 1;
}}	


if(isset($_GET['lgbt'])){
if($_GET['lgbt'] == 0){
	$_SESSION['orisearch'] = 2;
}else{
	$_SESSION['orisearch'] = 1;
}}

if($_SESSION['orisearch'] == 1){
		echo "<td><a href='mforum.php?lgbt=0'><img src='img/lgbt.png' width='60%'></a></td>";
}else{
		echo "<td><a href='mforum.php?lgbt=1'><img src='img/lgbtunclicked.png' width='60%'></a></td>";	
}
}

?>
</tr>
<tr>
<?php




if(isset($_GET['f'])){
	if($_GET['f'] == 1){
			echo "<td><a href='mforum.php?f=2#forum'><img src='img/mforumflinkclicked.png' width='100%'></a></td><td><a href='mforum.php?m=1#forum'><img src='img/mforummlink.png' width='100%'></a></td>";	
	$_SESSION['f'] = 1;
	$_SESSION['m'] = Null;}
	if($_GET['f'] == 2){
		echo "<td><a href='mforum.php?f=1#forum'><img src='img/mforumflink.png' width='100%'></a></td><td><a href='mforum.php?m=1#forum'><img src='img/mforummlink.png' width='100%'></a></td>";	
$_SESSION['f'] = Null;
}}
elseif(isset($_GET['m'])){
	if($_GET['m'] == 1){
			echo "<td><a href='mforum.php?f=1#forum'><img src='img/mforumflink.png' width='100%'></a></td><td><a href='mforum.php?m=2#forum'><img src='img/mforummlinkclicked.png' width='100%'></a></td>";
	$_SESSION['m'] = 1;	
	$_SESSION['f'] = Null;}
	if($_GET['m'] == 2){
		echo "<td><a href='mforum.php?f=1#forum'><img src='img/mforumflink.png' width='100%'></a></td><td><a href='mforum.php?m=1#forum'><img src='img/mforummlink.png' width='100%'></a></td>";	
$_SESSION['m'] = Null;
		}
}
elseif(isset($_SESSION['f'])){
	echo "<td><a href='mforum.php?f=2#forum'><img src='img/mforumflinkclicked.png' width='100%'></a></td><td><a href='mforum.php?m=1#forum'><img src='img/mforummlink.png' width='100%'></a></td>";
}
elseif(isset($_SESSION['m'])){
	echo "<td><a href='mforum.php?f=1#forum'><img src='img/mforumflink.png' width='100%'></a></td><td><a href='mforum.php?m=2#forum'><img src='img/mforummlinkclicked.png' width='100%'></a></td>";
}else{
echo "<td><a href='mforum.php?f=1#forum'><img src='img/mforumflink.png' width='100%'></a></td><td><a href='mforum.php?m=1#forum'><img src='img/mforummlink.png' width='100%'></a></td>";	
}
?>
</tr></table>

<table><tr><td>
<div>	

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

$country = $_SESSION['searchcountry'];

if(isset($_POST['available'])){
	$asetting = $_POST['availability'];
		if($asetting == "both") { $asetting = Null; } else {
			$_SESSION['availability'] = $asetting;
				echo $asetting;}}

// RETURN FROM VIEW PROFILE NO ADD
if(isset($_GET['return'])){
		$return = $_GET['return'];
		
	
	//AFTER ADD FORUM LOAD
	
	$id = $_SESSION['id'];
		$sessionmf = $_SESSION['mf'];
			$sessionori = $_SESSION['ori'];
				$sessionloc = $_SESSION['city'];
				

if($_SESSION['orisearch'] == 1){				

if(isset($_SESSION['m']) || isset($_SESSION['f'])){
if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}
	$others = "SELECT * FROM users WHERE orientation='gay' AND city = '$sessionloc' AND sex='$mfsql' AND id <= '$return' ORDER BY id DESC LIMIT 11";
}else{
	$others = "SELECT * FROM users WHERE orientation='gay' AND city = '$sessionloc' AND id <= '$return' ORDER BY id DESC LIMIT 11";
}
}else{				
/////////////////				
if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}
	$others = "SELECT * FROM users WHERE city = '$sessionloc' AND sex='$mfsql' AND id <= '$return' ORDER BY id DESC LIMIT 11";
}else{
	$others = "SELECT * FROM users WHERE city = '$sessionloc' AND id <= '$return' ORDER BY id DESC LIMIT 11";
}
}



			if ($crowd = mysqli_query($mysqli, $others)){

		echo "<table>";
$count = 0;
		while($contents = mysqli_fetch_row($crowd)){
				
echo "<tr>";						
	if($contents['5'] == 'prof051487.jpg'){
echo "<td width='50%'>";//<a href='mview_profile.php?uid=".$contents['0']."'>

if($contents['11'] == 'gay'){
if($contents['12'] == 'M'){ 
echo "<img src='img/mlgbt.gif' width='25%'></a>";
}
if($contents['12'] == 'F'){
echo "<img src='img/flgbt.gif' width='25%'></a>";	
}	
}else{
if($contents['12'] == 'M'){ 
echo "<img src='img/m.gif' width='25%'></a>";
}
if($contents['12'] == 'F'){
echo "<img src='img/f.gif' width='25%'></a>";	
}
}
if($contents['7'] != 'choice'){
	
	
	
$country = $_SESSION['searchcountry'];
	
if(isset($country) && isset($_SESSION['country'])){
	$mycountry = $_SESSION['country'];
	include 'international.php';
	if(is_numeric($contents['3'])){
	if(strtoupper($_SESSION['country']) == strtoupper($country)){
		
echo "<div id='cell'>".$contents['3']."</div></td>";		
		
	}else{ 
	if($localintl == '1'){
echo "<div id='cell'>NOT AVAILABLE</div></td>";			
	}else{
if($countrycode == substr($contents['3'],0,strlen($countrycode))){
	echo "<div id='cell'>".$exitcode."/ +".$contents['3']."</div></td>";		
}	
elseif(substr($contents['3'],0,1) == $trunk){
	echo "<div id='cell'>".$exitcode."/ +".$countrycode.substr($contents['3'],1)."</div></td>";	
}elseif (substr($contents['3'],0,1) == '+'){
	echo "<div id='cell'>".$contents['3']."</div></td>";	
}else{
	echo "<div id='cell'>".$exitcode."/ +".$countrycode.$trunkprefix.$contents['3']."</div></td>";	
}
	}}}else{
	echo "<div id='cell'>".$contents['3']."</div></td>";	
}}else{
			
	echo "<div id='cell'>".$contents['3']."</div></td>";


}	
	
	
	
	
	
	
	
//echo "<div id='cell'>".$contents['3']."</div></td>";
}


	} else {

		//<a href='mview_profile.php?uid=".$contents['0']."'>

echo "<td width='50%'>";

if($contents['7'] != 'choice'){
	
echo "<img src='profileimg/".$contents['5']."' width='100%'>";	



	$country = $_SESSION['searchcountry'];
	
if(isset($country) && isset($_SESSION['country'])){
	$mycountry = $_SESSION['country'];
	include 'international.php';
	if(is_numeric($contents['3'])){
	if(strtoupper($_SESSION['country']) == strtoupper($country)){
		
echo "<div id='cell'>".$contents['3']."</div></td>";		
		
	}else{ 
	if($localintl == '1'){
echo "<div id='cell'>NOT AVAILABLE</div></td>";			
	}else{
if($countrycode == substr($contents['3'],0,strlen($countrycode))){
	echo "<div id='cell'>".$exitcode."/ +".$contents['3']."</div></td>";		
}	
elseif(substr($contents['3'],0,1) == $trunk){
	echo "<div id='cell'>".$exitcode."/ +".$countrycode.substr($contents['3'],1)."</div></td>";	
}elseif (substr($contents['3'],0,1) == '+'){
	echo "<div id='cell'>".$contents['3']."</div></td>";	
}else{
	echo "<div id='cell'>".$exitcode."/ +".$countrycode.$trunkprefix.$contents['3']."</div></td>";	
}
	}}}else{
	echo "<div id='cell'>".$contents['3']."</div></td>";	
}}else{
			
	echo "<div id='cell'>".$contents['3']."</div></td>";


}



//echo "<div id='cell'>".$contents['3']."</div></td>";
}else{
	
if($_GET['noacctbuyer']=='1'){}
	// HTTP REFERER
elseif(strpos($_SERVER['HTTP_REFERER'],"sol.calltext")==True){
	
echo "<img src='profileimg/".$contents['5']."' width='100%'>";

	$country = $_SESSION['searchcountry'];
	
if(isset($country) && isset($_SESSION['country'])){
	$mycountry = $_SESSION['country'];
	include 'international.php';
	if(is_numeric($contents['3'])){
	if(strtoupper($_SESSION['country']) == strtoupper($country)){
		
echo "<div id='cell'>".$contents['3']."</div></td>";		
		
	}else{ 
	if($localintl == '1'){
echo "<div id='cell'>NOT AVAILABLE</div></td>";			
	}else{
if($countrycode == substr($contents['3'],0,strlen($countrycode))){
	echo "<div id='cell'>".$exitcode."/ +".$contents['3']."</div></td>";		
}	
elseif(substr($contents['3'],0,1) == $trunk){
	echo "<div id='cell'>".$exitcode."/ +".$countrycode.substr($contents['3'],1)."</div></td>";	
}elseif (substr($contents['3'],0,1) == '+'){
	echo "<div id='cell'>".$contents['3']."</div></td>";	
}else{
	echo "<div id='cell'>".$exitcode."/ +".$countrycode.$trunkprefix.$contents['3']."</div></td>";	
}
	}}}else{
	echo "<div id='cell'>".$contents['3']."</div></td>";	
}}else{			
	echo "<div id='cell'>".$contents['3']."</div></td>";
}	
	
	
}elseif($_GET['noacctbuyer']=='form'){		
echo "<form id='b' action='mforum.php?return=".$contents['0']."&noacctbuyer=1#b' method='POST'><input type='text' name='from_addr' size='50' placeholder='ENTER YOUR SOL ADDRESS'><br><input type='submit' name='noacctbuyform' value='SUBMIT'></form>"; 	
}elseif($_GET['noacctbuyer']=='1'){
if(isset($_POST['noacctbuyform'])){
	$solme = $_POST['from_addr'];
	echo "<a href='http://sol.calltext.me/download?from_addr=".$solme."&amount=".$contents['14']."&to_addr=".$contents['8']."&return=".$contents['0']."&page=mforum'>";	
}	
echo "<span style='color:red'>CLICK ON IMAGE</span><br>";
echo "<img id='b' src='profileimg/".$contents['5']."' width='100%'></a>";
echo "<span style='color:red'>CLICK ON IMAGE</span><br>";
}else{	




if($_SESSION['id']=='0'){ // NO ACCT BUYER
echo "<a href=mforum.php?return=".$contents['0']."&noacctbuyer=form#b>'";	
}else{	
$solme = $_SESSION['SOL'];
echo "<a href='http://sol.calltext.me/download?from_addr=".$solme."&amount=".$contents['14']."&to_addr=".$contents['8']."&return=".$contents['0']."&page=mforum'>";	
}
echo "<img src='profileimg/".$contents['5']."' width='100%'></a>";	
	
	
$solme = $_SESSION['SOL'];
if($solme == '0'){
	echo "<span style='color:red'>Add SOL address in Settings<br>to buy this contact</span><br>";
}else{
	echo "<span style='color:red'>BUY: ".$contents['14']." SOL</span><br>";

}





}	
	
	
}


	}						
echo "</tr>";
		$count++;
		if($count == 4){
		
						echo "</table>";
						echo "<br><a id='link' href='mforum.php?return=".$contents['0']."'><p>NEXT</p></a><br><br>";
						break;
}}}

	// RED SEA
	
} else {
	
	// OF MOSES
	
	
	
	
	
	
	$id = $_SESSION['id'];
		$sessionmf = $_SESSION['mf'];
			$sessionori = $_SESSION['ori'];
				$sessionloc = $_SESSION['city'];
				
				
				
if($_SESSION['orisearch'] == 1){				

if(isset($_SESSION['m']) || isset($_SESSION['f'])){
if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}
	$others = "SELECT * FROM users WHERE orientation='gay' AND city = '$sessionloc' AND sex='$mfsql' ORDER BY id DESC LIMIT 11";
}else{
	$others = "SELECT * FROM users WHERE orientation='gay' AND city = '$sessionloc' ORDER BY id DESC LIMIT 11";
}
}else{				
/////////////////				
if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}
	$others = "SELECT * FROM users WHERE city = '$sessionloc' AND sex='$mfsql' ORDER BY id DESC LIMIT 11";
}else{
	$others = "SELECT * FROM users WHERE city = '$sessionloc' ORDER BY id DESC LIMIT 11";
}
}							
				


			if($crowd = mysqli_query($mysqli, $others)){
	
		echo "<table>";
$count = 0;



if ($crowd->num_rows == 0){
	
if($sessionori == "str" || $_SESSION['orisearch'] == 0){	
		if($mfsql == 'F'){
		echo "<span style='color:white'>No females in<br>".$sessionloc.".<br>";	
		}
		if($mfsql == 'M'){
echo "<span style='color:white'>No males in<br>".$sessionloc.".<br>";			
		}
}
		
if($_SESSION['orisearch'] == 1){
	if($mfsql == 'M'){
		echo "<span style='color:white'>No males in<br>".$sessionloc.".<br>";	
		}
		if($mfsql == 'F'){
echo "<span style='color:white'>No females in<br>".$sessionloc.".<br>";			
		}
}		
		
		
		
}
		

			
		while($contents = mysqli_fetch_row($crowd)){
	
echo "<tr>";						
	if($contents['5'] == 'prof051487.jpg'){
echo "<td width='50%'>";//<a href='mview_profile.php?uid=".$contents['0']."'>
if($contents['11'] == 'gay'){
if($contents['12'] == 'M'){ 
echo "<img src='img/mlgbt.gif' width='25%'></a>";
}
if($contents['12'] == 'F'){
echo "<img src='img/flgbt.gif' width='25%'></a>";	
}	
}else{
if($contents['12'] == 'M'){ 
echo "<img src='img/m.gif' width='25%'></a>";
}
if($contents['12'] == 'F'){
echo "<img src='img/f.gif' width='25%'></a>";	
}}
if($contents['7'] != 'choice'){

$country = $_SESSION['searchcountry'];
	if(isset($country) && isset($_SESSION['country'])){
	$mycountry = $_SESSION['country'];
	include 'international.php';
	if(is_numeric($contents['3'])){
	if(strtoupper($_SESSION['country']) == strtoupper($country)){
		
echo "<div id='cell'>".$contents['3']."</div></td>";		
		
	}else{ 
	if($localintl == '1'){
echo "<div id='cell'>NOT AVAILABLE</div></td>";			
	}else{
if($countrycode == substr($contents['3'],0,strlen($countrycode))){
	echo "<div id='cell'>".$exitcode."/ +".$contents['3']."</div></td>";		
}	
elseif(substr($contents['3'],0,1) == $trunk){
	echo "<div id='cell'>".$exitcode."/ +".$countrycode.substr($contents['3'],1)."</div></td>";	
}elseif (substr($contents['3'],0,1) == '+'){
	echo "<div id='cell'>".$contents['3']."</div></td>";	
}else{
	echo "<div id='cell'>".$exitcode."/ +".$countrycode.$trunkprefix.$contents['3']."</div></td>";	
}
	}}}else{
	echo "<div id='cell'>".$contents['3']."</div></td>";	
}}else{
			
	echo "<div id='cell'>".$contents['3']."</div></td>";


}
	
//echo "<div id='cell'>".$contents['3']."</div></td>";
}

	} else {	
//IMG	
	
echo "<td width='50%'>";

if($contents['7'] != 'choice'){
	
echo "<img src='profileimg/".$contents['5']."' width='100%'>";	
	
	
$country = $_SESSION['searchcountry'];	
	
if(isset($country) && isset($_SESSION['country'])){
	$mycountry = $_SESSION['country'];
	include 'international.php';
	if(is_numeric($contents['3'])){
	if(strtoupper($_SESSION['country']) == strtoupper($country)){
		
echo "<div id='cell'>".$contents['3']."</div></td>";		
		
	}else{ 
	if($localintl == '1'){
echo "<div id='cell'>NOT AVAILABLE</div></td>";			
	}else{
if($countrycode == substr($contents['3'],0,strlen($countrycode))){
	echo "<div id='cell'>".$exitcode."/ +".$contents['3']."</div></td>";		
}	
elseif(substr($contents['3'],0,1) == $trunk){
	echo "<div id='cell'>".$exitcode."/ +".$countrycode.substr($contents['3'],1)."</div></td>";	
}elseif (substr($contents['3'],0,1) == '+'){
	echo "<div id='cell'>".$contents['3']."</div></td>";	
}else{
	echo "<div id='cell'>".$exitcode."/ +".$countrycode.$trunkprefix.$contents['3']."</div></td>";	
}
	}}}else{
	echo "<div id='cell'>".$contents['3']."</div></td>";	
}}else{
			
	echo "<div id='cell'>".$contents['3']."</div></td>";


}	
	
//echo "<div id='cell'>".$contents['3']."</div></td>";
}else{
	
if($_SESSION['id']=='0'){ // NO ACCT BUYER
echo "<a href=mforum.php?return=".$contents['0']."&noacctbuyer=form#b>'";	
}else{	
$solme = $_SESSION['SOL'];
echo "<a href='http://sol.calltext.me/download?from_addr=".$solme."&amount=".$contents['14']."&to_addr=".$contents['8']."&return=".$contents['0']."&page=mforum'>";	
}
echo "<img src='profileimg/".$contents['5']."' width='100%'></a>";	
	
	
$solme = $_SESSION['SOL'];
if($solme == '0'){
	echo "<span style='color:red'>Add SOL address in Settings<br>to buy this contact</span><br>";
}else{
	echo "<span style='color:red'>BUY: ".$contents['14']." SOL</span><br>";

}	
	
}

	}						
echo "</tr>";
		$count++;
		if($count == 4){
		
						echo "</table>";
						echo "<br><a id='link' href='mforum.php?return=".$contents['0']."'><p>NEXT</p></a><br><br>";
						break;
}}}







	
	
	

	
	
}
?>
</div>

</td></tr><tr><td>

<?php
/*
if($_SESSION['region'] == Null ){

$l = "SELECT DISTINCT city FROM users ORDER BY city ASC";
$lsql = mysqli_query($mysqli, $l);
	echo "<form id='changeloc' action='mforum.php' method='POST'><select name='city'><option value='".$_SESSION['city']."'>".$_SESSION['city']."</option>";
				while ($loclist = mysqli_fetch_row($lsql)){
					$location = $loclist['0'];
					echo "<option value='$location'>".$location."</option>";
				}
echo "<input type='submit' name='search' value='SEARCH'></form>";

} else {

$region = $_SESSION['region'];
$rc = "SELECT DISTINCT city FROM users WHERE region='$region' ORDER BY city ASC";
$rcsql = mysqli_query($mysqli, $rc);
	echo "<form id='changeloc' action='mforum.php' method='POST'><select name='city'><option value='".$_SESSION['city']."'>".$_SESSION['city']."</option>";
				while ($localist = mysqli_fetch_row($rcsql)){
					$rcity = $localist['0'];
					echo "<option value='$rcity'>".$rcity."</option>";
				}
echo "</select><input type='submit' name='search' value='SEARCH'></form>";
}
*/
?>


<!--</td></tr><tr><td>

<a id="link" href="mqmr.php">WRITE</a><br>
-->
</td></tr><tr><td>


<?php
	if(isset($_SESSION['searchcountry'])){$button=$_SESSION['searchcountry'];}elseif($_SESSION['id'] != '0'){
		$button=$_SESSION['country'];}
echo "<a id='link' href='mcforum.php#forum'>".$button."</a></span><br>";
?>
</td></tr><tr><td>

<?php

echo "<a id='link' href='mtravel_search.php'>COUNTRIES</a><br>";
?>

</td></tr><tr><td>

<?php
if($_SESSION['id'] != '0'){
echo "<a id='link' href='mprofile.php#mssg'><span style='text-transform:uppercase'>MY PAGE</span></a><br>";
}
?>
</td></tr><tr><td>

<!--<form action="forum.php" method="POST">
<select name="availability"><option value="anyone">ANYONE</option><option value="choice">CHOICE</option><option value="both">BOTH</option>
<input type="submit" name="available" value="AVAILABILITY">
</form>
-->

</td><tr><td>

<?php // ME
/*
$melookup = "SELECT * FROM users WHERE id='$id' ORDER BY id DESC LIMIT 1";
	$meload = mysqli_query($mysqli,$melookup);
	$hereiam = mysqli_fetch_array($meload);
		$uid = $hereiam['0'];
$myprof = "SELECT * FROM users WHERE id='$id'";
$prof = mysqli_query($mysqli,$myprof);
$myinfo = mysqli_fetch_row($prof);
$picture = $myinfo['5'];
$myqmr = $myinfo['6'];

echo "<table><tr><td><a href='mview_profile.php?uid=".$uid."'><img src='profileimg/".$picture."' width='100%'></a></td></tr>";
echo "<tr><td><div id='cell'>".$myqmr."</div></td></tr></table>";*/

//DONATE
echo "<br><br><span style='color:#ff69b4'><strong>DONATE</strong></span><br><img width='250px' src='img/sol.png'><br><span style='color:#ff69b4;font-size: 10pt'>Address:<br>Gq9Gv34h6Y8noDiKpPk1HcT5gCJJD8Z6xNj1aSChtpv2</span>";



mysqli_close($mysqli);
?>

</td></tr><tr><td>



</td></tr>
</table>
</div>
</body>
</html>