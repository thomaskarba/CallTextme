<?php 
require 'db.php';
session_start();
	
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
		$_SESSION['region'] = Null;
		}

if(isset($_GET['g'])){
	$_SESSION['region'] = Null;
}

//TRAVEL SEARCH .PHP
if(isset($_GET['ts'])){
	$_SESSION['country']=$_GET['ts'];
}

		
?>
<!DOCTYPE html>
<html>
<head>
<title>CallText.<?php echo $_SESSION['country'];?></title>
<script type="text/javascript">
if (screen.width<700){
	window.location="mcforum.php";
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

#b{display:block;border:5px solid black;color:black;font-size:15px;text-decoration:none;}
#a{display:block;border:1px solid #608bd1;color:#efdcee;font-size:35px;text-decoration:none;}


header{background-image:url("img/rainbow2.gif");font-family:'Roboto Mono',monospace;color:white;background-color:black;font-size:30px;}
	
table{width:100%;margin:0;}	

#container{text-align:center;}

article{color:white;}

#btc{border:3px solid white;}
#ad{margin:0 auto;}
</style>
</head>
<body><div id="container">


<header>

<table><tr>

<td>

<!--<a id="b" href="pforum_everyone.php"><strong>+ IMAGE</strong></a>-->



<?php
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
		echo "<a href='cforum.php?lgbt=0'><img src='img/lgbt.png' width='40px'></a>";
}else if($_SESSION['orisearch'] == 2){
		echo "<a href='cforum.php?lgbt=1'><img src='img/lgbtunclicked.png' width='40px'></a>";	
}
}

?>

</td>
<td>

<?php

if(isset($_GET['f'])){
	if($_GET['f'] == 1){
			echo "<a href='cforum.php?f=2'><img src='img/forumflinkclicked.png' height='60px'></a><a href='cforum.php?m=1'><img src='img/forummlink.png' height='60px'></a>";	
	$_SESSION['f'] = 1;
	$_SESSION['m'] = Null;}
	if($_GET['f'] == 2){
		echo "<a href='cforum.php?f=1'><img src='img/forumflink.png' height='60px'></a><a href='cforum.php?m=1'><img src='img/forummlink.png' height='60px'></a>";	
$_SESSION['f'] = Null;
}}
elseif(isset($_GET['m'])){
	if($_GET['m'] == 1){
			echo "<a href='cforum.php?f=1'><img src='img/forumflink.png' height='60px'></a><a href='cforum.php?m=2'><img src='img/forummlinkclicked.png' height='60px'></a>";
	$_SESSION['m'] = 1;	
	$_SESSION['f'] = Null;}
	if($_GET['m'] == 2){
		echo "<a href='cforum.php?f=1'><img src='img/forumflink.png' height='60px'></a><a href='cforum.php?m=1'><img src='img/forummlink.png' height='60px'></a>";	
$_SESSION['m'] = Null;
		}
}
elseif(isset($_SESSION['f'])){
	echo "<a href='cforum.php?f=2'><img src='img/forumflinkclicked.png' height='60px'></a><a href='cforum.php?m=1'><img src='img/forummlink.png' height='60px'></a>";
}
elseif(isset($_SESSION['m'])){
	echo "<a href='cforum.php?f=1'><img src='img/forumflink.png' height='60px'></a><a href='cforum.php?m=2'><img src='img/forummlinkclicked.png' height='60px'></a>";
}else{
echo "<a href='cforum.php?f=1'><img src='img/forumflink.png' height='60px'></a><a href='cforum.php?m=1'><img src='img/forummlink.png' height='60px'></a>";	
}
?>

</td>

<td>
<a target="_blank" href="https://ad.admitad.com/g/vbnovi30pq942acd6855ed464edc45/?ulp=https%3A%2F%2Fwww.cleartrip.com%2Fflights">
<img src="https://www.awltovhc.com/image-100287312-12278899" width="500" alt="" border="0"/></a>
</td>


<td>
<a id='b' href='travel_search.php'><strong>COUNTRIES</strong></a><br>
<a id='b' href='profile.php'><strong>BACK</strong></a>
</td>

<?php
/*
$myregion = $_SESSION['myr'];

if($myregion == 'AF' ){$regionbutton = 'AFRICA';}
if($myregion == 'AS' ){$regionbutton = 'ASIA';}
if($myregion == 'EU' ){$regionbutton = 'EUROPE';}
if($myregion == 'ME' ){$regionbutton = 'MIDEAST';}
if($myregion == 'NA' ){$regionbutton = 'N. AMERICA';}
if($myregion == 'OC' ){$regionbutton = 'OCEANIA';}
if($myregion == 'SA' ){$regionbutton = 'S. AMERICA';}

echo "<a id='b' href='forum_everyone.php'><span style='text-transform:uppercase'><strong>".$regionbutton."</strong></span></a>";


echo "</td><td>";

echo "<a id='b' href='forum.php'><strong>".$_SESSION['city']."</strong></a>";

echo "</td><td>";

*/

?>





<td>

<?php
// CITIES FORUM
	$country = $_SESSION['country'];
$l = "SELECT DISTINCT city FROM users WHERE country='$country' ORDER BY city ASC";

$lsql = mysqli_query($mysqli, $l);
	echo "<form id='region' action='forum.php' method='POST'><select name='city'>";
					echo "<option value=''>CITY</option>";
				while ($loclist = mysqli_fetch_row($lsql)){
					$location = $loclist['0'];
					echo "<option value='$location'>".$location."</option>";
				}
echo "</select><input type='submit' name='searchcity' value='SEARCH'></form>";


?>

<?php // if (isset($id)){ echo "<a id='b' href='logout.php'><strong>LOGOUT</strong></a>"; } else { echo "<a id='b' href='index.php'><strong>LOGIN/REGISTER</strong></a>"; } ?>

</td></tr>
</table>

</header>


<?php 

if($_SESSION['id'] == Null){
	mysqli_close($mysqli);
			setcookie('login',Null,time()+1);
session_unset();
session_destroy(); 
}

if($_SESSION['country'] == Null){
	mysqli_close($mysqli);
}


//PLAIN

if(isset($_GET['plain'])){
	
	
if(isset($_GET['s'])){
		$plain = $_GET['plain'];
		$s = $_GET['s'];	
	$id = $_SESSION['id'];
				$sessionloc = $_SESSION['city'];
// SQL				
if($_SESSION['orisearch'] == 1){
	
if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}

		$country = $_SESSION['country'];
		$others = "SELECT * FROM users WHERE orientation='gay' AND id<='$s' AND sex='$mfsql' AND country='$country' ORDER BY id DESC";		
	
}else{				
		$country = $_SESSION['country'];
		$others = "SELECT * FROM users WHERE orientation='gay' AND id<='$s' AND country='$country' ORDER BY id DESC";		
}	
	
}else{
				
if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}
		
		$country = $_SESSION['country'];
		$others = "SELECT * FROM users WHERE id<='$s' AND sex='$mfsql' AND country='$country' ORDER BY id DESC";		

	
}else{				

		$country = $_SESSION['country'];
		$others = "SELECT * FROM users WHERE id<='$s' AND country='$country' ORDER BY id DESC";		
	

	}}
// SQL END			
		
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
						echo "<br><a id='a' href='cforum.php?qmr=".$contents['0']."'>NEXT</a>";
						break;}

	if($contents['0'] == $plain){
		
		$who = $plain;

	$call = "SELECT * FROM users WHERE id='$who'";
	$infoload = mysqli_query($mysqli,$call);
	$row = mysqli_fetch_array($infoload);
		$profile = $row['1'];
		$email = $row['2'];
		$contact = $row['3'];
		$city = $row['4'];
		$qmr = $row['6'];
	$availability = $row['7'];
if($_SESSION['region'] == Null ){		
$theregion = $row['9']; }
		$g = $row['13'];
		$y = $row['14'];
		$r = $row['15'];
		$popularity = $row['20'];
		$popularity += 1;
			$pop = "UPDATE users SET popularity='$popularity' WHERE id='$who'";
			mysqli_query($mysqli,$pop);			
		
echo "<td>";

echo '<iframe src="//rcm-na.amazon-adsystem.com/e/cm?o=1&p=41&l=ur1&category=amazonhomepage&f=ifr&linkID=b84f15f3b6fd1de6bc517a715d6bf4cc&t=tkimssg-20&tracking_id=tkimssg-20" width="88" height="31" scrolling="no" border="0" marginwidth="0" style="border:none;" frameborder="0"></iframe>';
		
/*	if($count > 3){
		echo "<br><br><br><br><a href='cforum.php?return=".$who."&s=".$s."#c'><img src='img/centralw.png' width='45px'></a>";
	} else {
		echo "<br><br><br><br><a href='cforum.php?return=".$who."&s=".$s."'><img src='img/centralw.png' width='45px'></a>";
	}
*/




	
	if($availability != 'anyone'){
	
	echo "<br><br><a href='cforum.php?add=".$who."'><article><span style='color:red'><strong>SEND CONTACT</strong></span><br><img src='img/na.png' width='35px'></article></a><br>";

echo "<article><span style='font-size:14px'>".strtoupper($_SESSION['country'])."</span></article>";
	
	echo "<article><span style='font-size:14px'>".$qmr."</span></article><br>";
	
		echo "<a href='viewc_profile.php?uid=".$who."&more#cell'><article>More numbers from ".$city."</article></a>";

	} else {
		
echo "<br><br>";		
		
// FREE QR CREATOR
if(isset($country) && isset($_SESSION['country'])){
	$mycountry = $_SESSION['country'];
	include 'international.php';
	if(is_numeric($contact)){
	
if($localintl == '1'){
	$print = False;
						}else{	
if($countrycode == substr($contact,0,strlen($countrycode))){
echo "<a href='http://freeqrcreator.us-west-1.elasticbeanstalk.com/forum?number=%2B".str_replace(' ', '',$contact)."&return=".$who."&page=cforum&s=".$s."'>";
echo "<img src='img/freeqrcreator.png' width='65px'></a>";
}elseif(substr($contact,0,2) == $trunk && strtoupper($country) == "HUNGARY"){
echo "<a href='http://freeqrcreator.us-west-1.elasticbeanstalk.com/forum?number=%2B".$countrycode.str_replace(' ', '',substr($contact,2))."&return=".$who."&page=cforum&s=".$s."'>";
echo "<img src='img/freeqrcreator.png' width='65px'></a>";		
}elseif(substr($contact,0,1) == $trunk){
echo "<a href='http://freeqrcreator.us-west-1.elasticbeanstalk.com/forum?number=%2B".$countrycode.str_replace(' ', '',substr($contact,1))."&return=".$who."&page=cforum&s=".$s."'>";
echo "<img src='img/freeqrcreator.png' width='65px'></a>";	
}else if (substr($contact,0,1) == '+'){
echo "<a href='http://freeqrcreator.us-west-1.elasticbeanstalk.com/forum?number=%2B".str_replace(' ', '',substr($contact,1))."&return=".$who."&page=cforum&s=".$s."'>";
echo "<img src='img/freeqrcreator.png' width='65px'></a>";	
}else{
echo "<a href='http://freeqrcreator.us-west-1.elasticbeanstalk.com/forum?number=%2B".$countrycode.str_replace(' ', '',$contact)."&return=".$who."&page=cforum&s=".$s."'>";
echo "<img src='img/freeqrcreator.png' width='65px'></a>";		
}
	}}}		
		

echo "<br><article><span style='font-size:14px'>".strtoupper($_SESSION['country'])."</span></article>";
		
	echo "<br><br><article><span style='font-size:20px'><strong>".$contact."</strong></span></article></strong><br>";

// NEW QMR UPLOAD
	/*			
				if (isset($_POST['qmr'])){
					
if ($_POST['message'] == Null){}else{					
					
					$quote = $_POST['message'];
					
				$dollar = '/\$/';
		if (preg_match($dollar,$quote)) {
			echo "PROSTITUTION IS A NOT ALLOWED"; 
				} elseif(preg_match('/[0-9]/', $quote)) {
			echo "USE CONTACT FOR YOUR NUMBER";
		} else {	
					
					
					$combi = "\'\'".$quote."\'\'"; 
					$combi = mysqli_real_escape_string($mysqli,$_POST['message']);
						$newmessage = "INSERT INTO messages (myrelationship,message,senderlink) VALUES ('$who','$combi','$id')";
							mysqli_query($mysqli,$newmessage);
				
// EMAIL
	
	$theirinfo = "SELECT * FROM users WHERE id='$who'";
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
Click <a href='http://QuoteMyRelationship.com/contact_profile.php?id=".$who."&uid=".$id."&ib'>QUOTE</a> to see who wrote it!
<br><br>		
To stop receiving these Emails <a href='http://QuoteMyRelationship.com/settings.php?unsubscribe=".$who."'>Unsubscribe</a>";	
mail($address,$subject,$body,$headers);
	}				
				
	}}}else{

if($count > 3){
	echo "<form action='cforum.php?plain=".$plain."&s=".$s."#a' method='POST'><textarea name='message' rows='2' cols='25'></textarea><br><input type='submit' name='qmr' value='QMR+'></form>";
}else{
	echo "<form action='cforum.php?plain=".$plain."&s=".$s."' method='POST'><textarea name='message' rows='2' cols='25'></textarea><br><input type='submit' name='qmr' value='QMR+'></form>";	
}
	}	*/
	
include 'rate.php';	
	


if(isset($voted)){
	
		switch ($v) {
		case 'g':
			echo "<br><img src='img/g.png' width='20px'>&nbsp;<br>";
			break;
		case 'y':
			echo "<br><img src='img/y.png' width='20px'>&nbsp;<br>";
			break;
		case 'r':
			echo "<br><img src='img/r.png' width='20px'>&nbsp;<br>";
		break;}
	
}else{	
	
if($count > 3){
echo "<a href='cforum.php?plain=".$plain."&s=".$s."&rate=green#a'><img src='img/g.png' width='20px'></a>&nbsp;<a href='cforum.php?plain=".$plain."&s=".$s."&rate=yellow#a'><img src='img/y.png' width='20px'></a>&nbsp;<a href='cforum.php?plain=".$plain."&s=".$s."&rate=red#a'><img src='img/r.png' width='20px'></a><br>";
}else{
echo "<a href='cforum.php?plain=".$plain."&s=".$s."&rate=green'><img src='img/g.png' width='20px'></a>&nbsp;<a href='cforum.php?plain=".$plain."&s=".$s."&rate=yellow'><img src='img/y.png' width='20px'></a>&nbsp;<a href='cforum.php?plain=".$plain."&s=".$s."&rate=red'><img src='img/r.png' width='20px'></a><br>";
}}
		

	echo "<article><span style='font-size:14px'><strong>".$qmr."</strong></span></article></strong><br>";
	
	echo "<a href='viewc_profile.php?uid=".$who."&more#cell'><article>More numbers from ".$city."</article></a>";
	
	
	}	
	
		if($id == 198){
		echo "<table><tr><td>";	
		echo "<a href='delete.php?delete=".$who."' id='mylink'>DELETE</a>&nbsp;&nbsp;";
		echo "<a href='viewe_profile.php?image=".$who."' id='mylink'>NUDITY</a></td></tr><tr><td>";
		echo "<a href='profile.php?login=".$email."' id='mylink'>".$email."</a></td></tr></table>";
		echo "<br>".$contact;
	}
	
	echo "</td>";
}


							
						
	if($contents['5'] == 'prof051487.jpg' AND $contents['0'] != $plain){
if($count > 3){
	echo "<td><a href='cforum.php?plain=".$contents['0']."&s=".$s."#a'>";
}else{
	echo "<td><a href='cforum.php?plain=".$contents['0']."&s=".$s."'>";
}		
if($contents['12'] == 'M'){ 
echo "<img src='img/m.gif' width='100%'>";
}
if($contents['12'] == 'F'){
echo "<img src='img/f.gif' width='100%'>";	
}
echo "<div id='cell'>".$contents['4']."</div></td>";
} 

if($contents['5'] != 'prof051487.jpg' AND $contents['0'] != $plain){	
echo "<td><a href='viewc_profile.php?uid=".$contents['0']."&c'><img src='profileimg/".$contents['5']."' width='100%'></a>";
echo "<div id='cell'>".$contents['4']."</div></td>";		
}
		$count++;
		$rowcount++;
	}
mysqli_close($mysqli);
}} else	{
	
	
	
		$plain = $_GET['plain'];
	$id = $_SESSION['id'];
				$sessionloc = $_SESSION['city'];
				
// SQL				
if($_SESSION['orisearch'] == 1){

if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}

		$country = $_SESSION['country'];
		$others = "SELECT * FROM users WHERE orientation='gay' AND country='$country' AND sex='$mfsql' ORDER BY id DESC";
			
}else{				
				
		$country = $_SESSION['country'];
		$others = "SELECT * FROM users WHERE orientation='gay' AND country='$country' ORDER BY id DESC";
		}


}else{				
				
if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}
		
		$country = $_SESSION['country'];
		$others = "SELECT * FROM users WHERE country='$country' AND sex='$mfsql' ORDER BY id DESC";
	
}else{				
				
		$country = $_SESSION['country'];
		$others = "SELECT * FROM users WHERE country='$country' ORDER BY id DESC";
}}
// END SQL


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
						echo "<br><a id='a' href='cforum.php?qmr=".$contents['0']."'>NEXT</a>";
						break;}

	if($contents['0'] == $plain){
		
		$who = $plain;
		
	$call = "SELECT * FROM users WHERE id='$who'";
	$infoload = mysqli_query($mysqli,$call);
	$row = mysqli_fetch_array($infoload);
		$profile = $row['1'];
		$email = $row['2'];
		$contact = $row['3'];
		$city = $row['4'];
		$qmr = $row['6'];

		
	$availability = $row['7'];
		$theregion = $found['9'];
		$g = $row['13'];
		$y = $row['14'];
		$r = $row['15'];
		$popularity = $row['20'];
		$popularity += 1;
			$pop = "UPDATE users SET popularity='$popularity' WHERE id='$who'";
			mysqli_query($mysqli,$pop);			
	
echo "<td>";	

echo '<iframe src="//rcm-na.amazon-adsystem.com/e/cm?o=1&p=41&l=ur1&category=amazonhomepage&f=ifr&linkID=b84f15f3b6fd1de6bc517a715d6bf4cc&t=tkimssg-20&tracking_id=tkimssg-20" width="88" height="31" scrolling="no" border="0" marginwidth="0" style="border:none;" frameborder="0"></iframe>';
	
/*	if($count > 3){
		echo "<br><br><br><br><a href='cforum.php?return=".$who."#a'><img id='d' src='img/centralw.png' width='45px'></a>";
	} else {
		echo "<br><br><br><br><a href='cforum.php?return=".$who."'><img src='img/centralw.png' width='45px'></a>";
	}
*/

	
	if($availability != 'anyone'){
	
	echo "<br><br><a href='cforum.php?add=".$who."'><article><span style='color:red'><strong>SEND CONTACT</strong></span><br><img src='img/na.png' width='35px'></article></a><br>";

echo $_SESSION['country'];	

	echo "<article><span style='font-size:14px'>".$qmr."</span></article>";

	echo "<a href='viewc_profile.php?uid=".$who."&more#cell'><article>More numbers from ".$city."</article></a>";
	

	} else {
		
echo "<br><br>";		
		
// FREE QR CREATOR
if(isset($country) && isset($_SESSION['country'])){
	$mycountry = $_SESSION['country'];
	include 'international.php';
	if(is_numeric($contact)){
	
if($localintl == '1'){
	$print = False;
						}else{	
if($countrycode == substr($contact,0,strlen($countrycode))){
echo "<a href='http://freeqrcreator.us-west-1.elasticbeanstalk.com/forum?number=%2B".str_replace(' ', '',$contact)."&return=".$who."&page=cforum&s=".$who."'>";
echo "<img src='img/freeqrcreator.png' width='65px'></a>";
}elseif(substr($contact,0,2) == $trunk && strtoupper($country) == "HUNGARY"){
echo "<a href='http://freeqrcreator.us-west-1.elasticbeanstalk.com/forum?number=%2B".$countrycode.str_replace(' ', '',substr($contact,2))."&return=".$who."&page=cforum&s=".$who."'>";
echo "<img src='img/freeqrcreator.png' width='65px'></a>";		
}elseif(substr($contact,0,1) == $trunk){
echo "<a href='http://freeqrcreator.us-west-1.elasticbeanstalk.com/forum?number=%2B".$countrycode.str_replace(' ', '',substr($contact,1))."&return=".$who."&page=cforum&s=".$who."'>";
echo "<img src='img/freeqrcreator.png' width='65px'></a>";	
}else if (substr($contact,0,1) == '+'){
echo "<a href='http://freeqrcreator.us-west-1.elasticbeanstalk.com/forum?number=%2B".str_replace(' ', '',substr($contact,1))."&return=".$who."&page=cforum&s=".$who."'>";
echo "<img src='img/freeqrcreator.png' width='65px'></a>";	
}else{
echo "<a href='http://freeqrcreator.us-west-1.elasticbeanstalk.com/forum?number=%2B".$countrycode.str_replace(' ', '',$contact)."&return=".$who."&page=cforum&s=".$who."'>";
echo "<img src='img/freeqrcreator.png' width='65px'></a>";		
}
	}}}		

echo "<br>".$_SESSION['country'];	








include 'rate.php';

	

	echo "<br><br><article><span style='font-size:20px'><strong>".$contact."</strong></span></article></strong><br>";




// NEW QMR UPLOAD
				
		/*		if (isset($_POST['qmr'])){
					
if ($_POST['message'] == Null){}else{					
					
					$quote = $_POST['message'];
					
				$dollar = '/\$/';
		if (preg_match($dollar,$quote)) {
			echo "PROSTITUTION IS A NOT ALLOWED"; 
				} elseif(preg_match('/[0-9]/', $quote)) {
			echo "USE CONTACT FOR YOUR NUMBER";
		} else {	
					
					
					$combi = "\'\'".$quote."\'\'"; 
					$combi = mysqli_real_escape_string($mysqli,$_POST['message']);
						$newmessage = "INSERT INTO messages (myrelationship,message,senderlink) VALUES ('$who','$combi','$id')";
							mysqli_query($mysqli,$newmessage);
				
// EMAIL
	
	$theirinfo = "SELECT * FROM users WHERE id='$who'";
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
Click <a href='http://QuoteMyRelationship.com/contact_profile.php?id=".$who."&uid=".$id."&ib'>QUOTE</a> to see who wrote it!
<br><br>		
To stop receiving these Emails <a href='http://QuoteMyRelationship.com/settings.php?unsubscribe=".$who."'>Unsubscribe</a>";	
mail($address,$subject,$body,$headers);
	}				
				
	}}}else{

if($count > 3){
	echo "<form action='cforum.php?plain=".$plain."#a' method='POST'><textarea name='message' rows='2' cols='25'></textarea><br><input type='submit' name='qmr' value='QMR+'></form>";
}else{
	echo "<form action='cforum.php?plain=".$plain."' method='POST'><textarea name='message' rows='2' cols='25'></textarea><br><input type='submit' name='qmr' value='QMR+'></form>";	
}
	}*/




if(isset($voted)){
	
		switch ($v) {
		case 'g':
			echo "<br><img src='img/g.png' width='20px'>&nbsp;<br>";
			break;
		case 'y':
			echo "<br><img src='img/y.png' width='20px'>&nbsp;<br>";
			break;
		case 'r':
			echo "<br><img src='img/r.png' width='20px'>&nbsp;<br>";
		break;}
	
}else{	
	
	
	if($count > 3){
echo "<a href='cforum.php?plain=".$plain."&rate=green#a'><img src='img/g.png' width='20px'></a>&nbsp;<a href='cforum.php?plain=".$plain."&rate=yellow#a'><img src='img/y.png' width='20px'></a>&nbsp;<a href='cforum.php?plain=".$plain."&rate=red#a'><img src='img/r.png' width='20px'></a><br>";	
}else{
echo "<a href='cforum.php?plain=".$plain."&rate=green'><img src='img/g.png' width='20px'></a>&nbsp;<a href='cforum.php?plain=".$plain."&rate=yellow'><img src='img/y.png' width='20px'></a>&nbsp;<a href='cforum.php?plain=".$plain."&rate=red'><img src='img/r.png' width='20px'></a><br>";	
	}}


	echo "<article><span style='font-size:14px'><strong>".$qmr."</strong></span></article></strong><br>";
	
	echo "<a href='viewc_profile.php?uid=".$who."&more#cell'><article>More numbers from ".$city."</article></a>";
	
	
	}	
	
		if($id == 198){
		echo "<table><tr><td>";	
		echo "<a href='delete.php?delete=".$who."' id='mylink'>DELETE</a></td>&nbsp;&nbsp;<td>";
		echo "<a href='viewe_profile.php?image=".$who."' id='mylink'>NUDITY</a></td></tr><tr><td>";
		echo "<a href='profile.php?login=".$email."' id='mylink'>".$email."</a></td></tr></table>";
		echo "<br>".$contact;
	}
	
	echo "</td>";
}							
						
	if($contents['5'] == 'prof051487.jpg' AND $contents['0'] != $plain){
		
if($count > 3){ 
	echo "<td><a href='cforum.php?plain=".$contents['0']."'>";//#a
		}else{		
			echo "<td><a href='cforum.php?plain=".$contents['0']."'>"; }		
		
if($contents['12'] == 'M'){ 
echo "<img src='img/m.gif' width='100%'>";
}
if($contents['12'] == 'F'){
echo "<img src='img/f.gif' width='100%'>";	
}
echo "<div id='cell'>".$contents['4']."</div></td>";
} 

if($contents['5'] != 'prof051487.jpg' AND $contents['0'] != $plain){	
echo "<td><a href='viewc_profile.php?uid=".$contents['0']."&c'><img src='profileimg/".$contents['5']."' width='100%'></a>";
echo "<div id='cell'>".$contents['4']."</div></td>";		
}
		$count++;
		$rowcount++;
	}
mysqli_close($mysqli);
}}}







				
				
				
				
// RETURN FROM VIEW PROFILE NO ADD
elseif(isset($_GET['return'])){
		
		if(isset($_GET['s'])){
		
		$return = $_GET['s'];
		} else {
		$return = $_GET['return'];}
		
	
	//AFTER ADD FORUM LOAD
	
	$id = $_SESSION['id'];
				$sessionloc = $_SESSION['city'];
				
				
if($_SESSION['orisearch'] == 1){
	
	
if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}

		$country = $_SESSION['country'];
		$others = "SELECT * FROM users WHERE orientation='gay' AND sex='$mfsql' AND id <= '$return' AND country = '$country' ORDER BY id DESC";
			
}else{

		$country = $_SESSION['country'];
		$others = "SELECT * FROM users WHERE orientation = 'gay' AND id <= '$return' AND country = '$country' ORDER BY id DESC";
		
}
	
	
}else{				

if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}


		$country = $_SESSION['country'];
		$others = "SELECT * FROM users WHERE sex='$mfsql' AND id <= '$return' AND country = '$country' ORDER BY id DESC";
			
}else{
	
	
		$country = $_SESSION['country'];
		$others = "SELECT * FROM users WHERE id <= '$return' AND country = '$country' ORDER BY id DESC";
		
}}

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
						echo "<br><a id='a' href='cforum.php?qmr=".$contents['0']."'>NEXT</a>";
						break;}

	if($contents['5'] == 'prof051487.jpg'){
		
if($count > 3){ 
	echo "<td><a href='cforum.php?plain=".$contents['0']."&s=".$return."#a'>";
		}else{		
			echo "<td><a href='cforum.php?plain=".$contents['0']."&s=".$return."'>"; }

if($_GET['return'] == $contents['0']){
if($contents['12'] == 'M'){ 
echo "<img id='c' src='img/m.gif' width='100%'>";
}
if($contents['12'] == 'F'){
echo "<img id='c' src='img/f.gif' width='100%'>";	
}
}else{
if($contents['12'] == 'M'){ 
echo "<img src='img/m.gif' width='100%'>";
}
if($contents['12'] == 'F'){
echo "<img src='img/f.gif' width='100%'>";	
}	
}
			

echo "<div id='cell'>".$contents['4']."</div></td>";
	} else {
echo "<td><a href='viewc_profile.php?uid=".$contents['0']."&s=".$return."&c'><img src='profileimg/".$contents['5']."' width='100%'></a>";
echo "<div id='cell'>".$contents['4']."</div></td>";		
}
		$count++;
		$rowcount++;
	}
				mysqli_close($mysqli);}
				
}				
				
				
				



//ADD
elseif(isset($_GET['add'])){
	
	$uidcode = $_GET['add'];

	
		$uidlookup = "SELECT * FROM users WHERE id='$uidcode'";
			$uidq = mysqli_query($mysqli, $uidlookup);
				$updaterrow = mysqli_fetch_row($uidq);
					$iwant = $updaterrow['0'];
					$where = $updaterrow['4'];

	$myinfo = "SELECT * FROM users WHERE id='$id'";
	$adding = mysqli_query($mysqli, $myinfo);
	$myinfo = mysqli_fetch_row($adding);
	$contactinfo = $myinfo['3'];
		$today = date("m/d");
	$sendcontact = "INSERT INTO central (sending,receiving,phone,timeout) VALUES ('$id','$iwant','$contactinfo','$today')";
	mysqli_query($mysqli,$sendcontact);

// EMAIL
	
	$theirinfo = "SELECT * FROM users WHERE id='$iwant'";
	$noting = mysqli_query($mysqli, $theirinfo);
	$letemknow = mysqli_fetch_row($noting);
	if($letemknow['10'] == 'on'){
		
		$headers = 'From: QuoteMyRelationship.com' . "\r\n".
		'Reply-To: no-reply@quotemyrelationship.com' . "\r\n" .
		'X-Mailer: PHP/' . phpversion() . "\r\n" .
		'Content-type: text/html; charset=iso-8859-1';
		
		
		$address = $letemknow['2'];
		$subject = "QMR ~ ".$contactinfo;
		$body = "<a href='http://QuoteMyRelationship.com/email_profile.php?uid=".$id."&meml=".$address."'>Someone wants a relationship with you on QuoteMyRelationship.com.</a><br><br> ".$contactinfo." 
		
		<br><br>
		
		<b>DO NOT REPLY</b><br>
		To stop receiving these Emails <a href='http://QuoteMyRelationship.com/settings.php?unsubscribe=".$iwant."'>Unsubscribe</a>";	
mail($address,$subject,$body,$headers);
echo "SENT";
	}
	
	if($letemknow['10'] == 'off'){
		echo "SENT";
	}

	
	//AFTER ADD FORUM LOAD
	
	$sessionrepeater = $_GET['add'];
	
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

		$country = $_SESSION['country'];
		$others = "SELECT * FROM users WHERE orientation = 'gay' AND id <= '$sessionrepeater' AND sex='$mfsql' AND country = '$country' ORDER BY id DESC";
		
}else{				
				

		$country = $_SESSION['country'];
		$others = "SELECT * FROM users WHERE orientation = 'gay' AND id <= '$sessionrepeater' AND country = '$country' ORDER BY id DESC";
}	
	
	
}else{				
				
				
if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}


		$country = $_SESSION['country'];
		$others = "SELECT * FROM users WHERE id <= '$sessionrepeater' AND sex='$mfsql' AND country = '$country' ORDER BY id DESC";
	

		
}else{				
				

		$country = $_SESSION['country'];
		$others = "SELECT * FROM users WHERE id <= '$sessionrepeater' AND country = '$country' ORDER BY id DESC";
}	}

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
						echo "<br><a id='a' href='cforum.php?qmr=".$contents['0']."'>NEXT</a>";
						break;}
					
	if($contents['5'] == 'prof051487.jpg'){
		
if($count > 3){ 
	echo "<td><a href='cforum.php?plain=".$contents['0']."&s=".$sessionrepeater."#a'>";
		}else{		
			echo "<td><a href='cforum.php?plain=".$contents['0']."&s=".$sessionrepeater."'>"; }		
		
if($contents['12'] == 'M'){ 
echo "<img src='img/m.gif' width='100%'>";
}
if($contents['12'] == 'F'){
echo "<img src='img/f.gif' width='100%'>";	
}
echo "<div id='cell'>".$contents['4']."</div></td>";
	} 
	
if($contents['5'] != 'prof051487.jpg'){	
echo "<td><a href='viewc_profile.php?uid=".$contents['0']."&s=".$sessionrepeater."&c'><img src='profileimg/".$contents['5']."' width='100%'></a>";
echo "<div id='cell'>".$contents['4']."</div></td>";		
}
		$count++;
		$rowcount++;
	}
mysqli_close($mysqli);} }



		// CENTRAL SESSION LOCATION

	elseif(isset($_GET['qmr'])){
		
		$updatedid = $_GET['qmr'];	

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

		$country = $_SESSION['country'];
		$others = "SELECT * FROM users WHERE orientation = 'gay' AND id <= '$updatedid' AND sex='$mfsql' AND country = '$country' ORDER BY id DESC";
		
}else{				
				
				
		$country = $_SESSION['country'];
		$others = "SELECT * FROM users WHERE orientation = 'gay' AND id <= '$updatedid' AND country = '$country' ORDER BY id DESC";
}
	
	
	
}else{				
				
if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}

		$country = $_SESSION['country'];
		$others = "SELECT * FROM users WHERE id <= '$updatedid' AND sex='$mfsql' AND country = '$country' ORDER BY id DESC";

}else{				
				
				
		$country = $_SESSION['country'];
		$others = "SELECT * FROM users WHERE id <= '$updatedid' AND country = '$country' ORDER BY id DESC";
}}

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
						echo "<br><a id='a' href='cforum.php?qmr=".$contents['0']."'>NEXT</a>";
						break;}
					
	if($contents['5'] == 'prof051487.jpg'){
		
if($count > 3){ 
	echo "<td><a href='cforum.php?plain=".$contents['0']."&s=".$updatedid."#a'>";
		}else{		
			echo "<td><a href='cforum.php?plain=".$contents['0']."&s=".$updatedid."'>"; }
		

if($contents['12'] == 'M'){ 
echo "<img src='img/m.gif' width='100%'>";
}
if($contents['12'] == 'F'){
echo "<img src='img/f.gif' width='100%'>";	
}
echo "<div id='cell'>".$contents['4']."</div></td>";
	} 
if($contents['5'] != 'prof051487.jpg'){
echo "<td><a href='viewc_profile.php?uid=".$contents['0']."&s=".$updatedid."&c'><img src='profileimg/".$contents['5']."' width='100%'></a>";
echo "<div id='cell'>".$contents['4']."</div></td>";		
}
		$count++;
		$rowcount++;
	}
				mysqli_close($mysqli);} 

	
	
	
	
	
	
	
	// THE RED SEA
	
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

		$country = $_SESSION['country'];
		$others = "SELECT * FROM users WHERE orientation = 'gay' AND country = '$country' AND sex='$mfsql'  ORDER BY id DESC";
}else{				

		$country = $_SESSION['country'];
		$others = "SELECT * FROM users WHERE orientation = 'gay' AND country = '$country'  ORDER BY id DESC";
}	
	
	
}else{				

if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}

		$country = $_SESSION['country'];
		$others = "SELECT * FROM users WHERE country = '$country' AND sex='$mfsql'  ORDER BY id DESC";

}else{				

		$country = $_SESSION['country'];
		$others = "SELECT * FROM users WHERE country = '$country'  ORDER BY id DESC";
}}


				
			if($crowd = mysqli_query($mysqli, $others)){
	
		echo "<table><tr>";
			$rowmax = 4;
			$rowcount = 0;
								$count = 0;
								$total = 8;

		while($contents = mysqli_fetch_row($crowd)){
				if ($rowcount == $rowmax){echo "</tr><tr>";$rowcount=0;}
						if ($count == $total){ 
						echo "</tr></table>";
						echo "<br><a id='a' href='cforum.php?qmr=".$contents['0']."'>NEXT</a>";
						break;}
					
	if($contents['5'] == 'prof051487.jpg'){
		
if($count > 3){ 
	echo "<td><a href='cforum.php?plain=".$contents['0']."#d'>";
		}else{		
			echo "<td><a href='cforum.php?plain=".$contents['0']."'>"; }		

if($contents['12'] == 'M'){ 
echo "<img src='img/m.gif' width='100%'>";
}
if($contents['12'] == 'F'){
echo "<img src='img/f.gif' width='100%'>";	
}
echo "<div id='cell'>".$contents['4']."</div></td>";
	} else {
echo "<td><a href='viewc_profile.php?uid=".$contents['0']."&c'><img src='profileimg/".$contents['5']."' width='100%'></a>";
echo "<div id='cell'>".$contents['4']."</div></td>";		
}
		$count++;
		$rowcount++;
	}
				mysqli_close($mysqli);} 
	

	
	// RETURN FROM VIEW PROFILE NO ADD
if(isset($_GET['return'])){
		$return = $_GET['return'];
		


if($_SESSION['orisearch'] == 1){
	
if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}

		$country = $_SESSION['country'];
		$others = "SELECT * FROM users WHERE orientation = 'gay' AND id <= '$return' AND country = '$country' AND sex='$mfsql' ORDER BY id DESC";
	
}else{		
		
	
		$country = $_SESSION['country'];
		$others = "SELECT * FROM users WHERE orientation = 'gay' AND id <= '$return' AND country = '$country' ORDER BY id DESC";
	}	
	
	
}else{		
		
		
if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}

		$country = $_SESSION['country'];
		$others = "SELECT * FROM users WHERE id <= '$return' AND country = '$country' AND sex='$mfsql' ORDER BY id DESC";
			
}else{		
		
	$country = $_SESSION['country'];
		$others = "SELECT * FROM users WHERE id <= '$return' AND country = '$country' ORDER BY id DESC";
	}	}	
		
		
		
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
						echo "<br><a id='a' href='cforum.php?qmr=".$contents['0']."'>NEXT</a>";
						break;}
					
	if($contents['5'] == 'prof051487.jpg'){
if($count > 3){ 
	echo "<td><a href='cforum.php?plain=".$contents['0']."&s=".$return."#a'>";
		}else{		
			echo "<td><a href='cforum.php?plain=".$contents['0']."&s=".$return."'>"; }		
if($contents['12'] == 'M'){ 
echo "<img src='img/m.gif' width='100%'>";
}
if($contents['12'] == 'F'){
echo "<img src='img/f.gif' width='100%'>";	
}
echo "<div id='cell'>".$contents['4']."</div></td>";
	} 
if($contents['5'] != 'prof051487.jpg'){
echo "<td><a href='viewc_profile.php?uid=".$contents['0']."&s=".$return."&c'><img src='profileimg/".$contents['5']."' width='100%'></a>";
echo "<div id='cell'>".$contents['4']."</div></td>";		
}
		$count++;
		$rowcount++;
	}
				mysqli_close($mysqli);}
				
				
} else {
	
	
if($_SESSION['orisearch'] == 1){
	

if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}

		$country = $_SESSION['country'];
		
			$others = "SELECT * FROM users WHERE orientation = 'gay' AND country = '$country' AND sex='$mfsql' ORDER BY id DESC";
		
}else{
	
		$country = $_SESSION['country'];
		
			$others = "SELECT * FROM users WHERE orientation = 'gay' AND country = '$country' ORDER BY id DESC";
	}	

		
}else{	

if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}

		$country = $_SESSION['country'];
		
			$others = "SELECT * FROM users WHERE country = '$country' AND sex='$mfsql' ORDER BY id DESC";
		
}else{
	
		$country = $_SESSION['country'];
		
			$others = "SELECT * FROM users WHERE country = '$country' ORDER BY id DESC";
	}



}
	
	
			if($crowd = mysqli_query($mysqli, $others)){
	
		echo "<table><tr>";
			$rowmax = 4;
			$rowcount = 0;
								$count = 0;
								$total = 8;

		while($contents = mysqli_fetch_row($crowd)){

				if ($rowcount == $rowmax){echo "</tr><tr>";$rowcount=0;}
						if ($count == $total){ echo "</tr></table>";
						echo "<br><a id='a' href='cforum.php?qmr=".$contents['0']."'>NEXT</a>";
						break;}
					
	if($contents['5'] == 'prof051487.jpg'){
if($count > 3){ 
	echo "<td><a href='cforum.php?plain=".$contents['0']."#d'>";
		}else{		
			echo "<td><a href='cforum.php?plain=".$contents['0']."'>";}
if($contents['12'] == 'M'){ 
echo "<img src='img/m.gif' width='100%'>";
}
if($contents['12'] == 'F'){
echo "<img src='img/f.gif' width='100%'>";	
}
echo "<div id='cell'>".$contents['4']."</div></td>";
	} else {
echo "<td><a href='viewc_profile.php?uid=".$contents['0']."&c'><img src='profileimg/".$contents['5']."' width='100%'></a>";
echo "<div id='cell'>".$contents['4']."</div></td>";		
}
		$count++;
		$rowcount++;

				mysqli_close($mysqli);}
	}}}
?>

<br>

<table><tr><tr>

<div id='ad'>
<iframe src="//rcm-na.amazon-adsystem.com/e/cm?o=1&p=48&l=ez&f=ifr&linkID=ff3cd6a8e364b55c9442f632f0aff892&t=tkimssg-20&tracking_id=tkimssg-20" width="728" height="90" scrolling="no" border="0" marginwidth="0" style="border:none;" frameborder="0"></iframe>
</div>

</td></tr><tr><td>

<br><br><span style='color:#ff69b4'><strong>DONATE HERE</strong></span><br><img width='250px' src='img/BC.png'><br><img width='250px'  src='img/recieve.png'><br><span style='color:#ff69b4;font-size: 10pt'>3JVj1pV8E3SuaNPmnz15FLNBdFU5rDkGSM<br>calltextme.crypto</span>

</td></tr></table>

</div>



</body>
</html>