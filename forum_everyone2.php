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

/*
//TRAVEL
$home = $_SESSION['country'];

$travel = "SELECT go FROM travel WHERE home='$home'";	

$array = array();

while($row = mysql_fetch_assoc($travel)){

$array[]=$row;

}

foreach($array as $or){
	$sql = ' OR country=';
	$or = $sql.'\''.$or.''.' ';
}
*/
		
?>
<!DOCTYPE html>
<html>
<head>
<title>QMR</title>
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
</style>
</head>
<body><div id="container">


<header>

<table><tr>

<td>

<a id="b" href="pforum_everyone.php"><strong>+ IMAGE</strong></a>



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
		echo "<a href='forum_everyone.php?lgbt=0'><img src='img/lgbt.png' width='40px'></a>";
}else if($_SESSION['orisearch'] == 2){
		echo "<a href='forum_everyone.php?lgbt=1'><img src='img/lgbtunclicked.png' width='40px'></a>";	
}
}

?>

</td>
<td>

<?php

if(isset($_GET['f'])){
	if($_GET['f'] == 1){
			echo "<a href='forum_everyone.php?f=2'><img src='img/forumflinkclicked.png' height='50px'></a><a href='forum_everyone.php?m=1'><img src='img/forummlink.png' height='50px'></a>";	
	$_SESSION['f'] = 1;
	$_SESSION['m'] = Null;}
	if($_GET['f'] == 2){
		echo "<a href='forum_everyone.php?f=1'><img src='img/forumflink.png' height='50px'></a><a href='forum_everyone.php?m=1'><img src='img/forummlink.png' height='50px'></a>";	
$_SESSION['f'] = Null;
}}
elseif(isset($_GET['m'])){
	if($_GET['m'] == 1){
			echo "<a href='forum_everyone.php?f=1'><img src='img/forumflink.png' height='50px'></a><a href='forum_everyone.php?m=2'><img src='img/forummlinkclicked.png' height='50px'></a>";
	$_SESSION['m'] = 1;	
	$_SESSION['f'] = Null;}
	if($_GET['m'] == 2){
		echo "<a href='forum_everyone.php?f=1'><img src='img/forumflink.png' height='50px'></a><a href='forum_everyone.php?m=1'><img src='img/forummlink.png' height='50px'></a>";	
$_SESSION['m'] = Null;
		}
}
elseif(isset($_SESSION['f'])){
	echo "<a href='forum_everyone.php?f=2'><img src='img/forumflinkclicked.png' height='50px'></a><a href='forum_everyone.php?m=1'><img src='img/forummlink.png' height='50px'></a>";
}
elseif(isset($_SESSION['m'])){
	echo "<a href='forum_everyone.php?f=1'><img src='img/forumflink.png' height='50px'></a><a href='forum_everyone.php?m=2'><img src='img/forummlinkclicked.png' height='50px'></a>";
}else{
echo "<a href='forum_everyone.php?f=1'><img src='img/forumflink.png' height='50px'></a><a href='forum_everyone.php?m=1'><img src='img/forummlink.png' height='50px'></a>";	
}
?>

</td>
<td>

<a id="b" href="forum.php"><span style='text-transform:uppercase'><strong><?php echo $_SESSION['city'];?></strong></span></a>

<!--</td><td>

<a id="b" href="qmr.php"><strong>write</strong></a>
-->
</td><td>

<?php
/*
$myprof = "SELECT * FROM users WHERE id='$id'";
$prof = mysqli_query($mysqli,$myprof);
$myinfo = mysqli_fetch_row($prof);
$picture = $myinfo['sex'];
*/
echo "<a href='profile.php'><img src='img/ro.png' width='40px'></a>";
?>


</td><td>

<?php

if(isset($_SESSION['country'])){
	$mycountry = strtoupper($_SESSION['country']);
echo "<a id='b' href='cforum.php'><strong>".$mycountry."</strong></a>";	
}



/*
// CITIES FORUM
if($_SESSION['region'] == Null){
$l = "SELECT DISTINCT location FROM users ORDER BY location ASC";
} else {
	$region = $_SESSION['region'];
$l = "SELECT DISTINCT location FROM users WHERE region='$region' ORDER BY location ASC";
}
$lsql = mysqli_query($mysqli, $l);
	echo "<form id='region' action='forum.php' method='POST'><select name='city'>";
					echo "<option value=''>CITY</option>";
				while ($loclist = mysqli_fetch_row($lsql)){
					$location = $loclist['0'];
					echo "<option value='$location'>".$location."</option>";
				}
echo "</select><input type='submit' name='searchcity' value='SEARCH'></form>";
*/

?>

<?php // if (isset($id)){ echo "<a id='b' href='logout.php'><strong>LOGOUT</strong></a>"; } else { echo "<a id='b' href='index.php'><strong>LOGIN/REGISTER</strong></a>"; } ?>

</td></tr>
</table>

</header>

<?php // HOUSEKEEPING
/*
$newest = "SELECT * FROM users WHERE id='$id'	ORDER BY id DESC LIMIT 1"; landing
	$move = mysqli_query($mysqli, $newest);
		$imagerow = mysqli_fetch_row($move);
		$latest = $imagerow['0'];
			$newimg = "DELETE FROM users WHERE id='$id' AND id!='$latest'";
			mysqli_query($mysqli, $newimg);


//MF FAIL			
$cleanit = "SELECT * FROM users WHERE mf != 'M' AND mf != 'F'";
	$sweep = mysqli_query($mysqli, $cleanit);
		while($housekeeping = mysqli_fetch_row($sweep)){
		$account = $housekeeping['1'];
	$deleteone = "DELETE FROM central WHERE receiving='$account' OR sending='$account'";
	$deletetwo = "DELETE FROM messages WHERE myrelationship='$account'";
	$deletethree = "DELETE FROM users WHERE id='$account'";
	$deletefour = "DELETE FROM users WHERE id='$account'";
	$deletefive = "DELETE FROM qmr WHERE id='$account'";
		mysqli_query($mysqli,$deleteone);
		mysqli_query($mysqli,$deletetwo);
		mysqli_query($mysqli,$deletethree);
		mysqli_query($mysqli,$deletefour);
		mysqli_query($mysqli,$deletefive);
}

//LOCATION FAIL			
$cleanit = "SELECT * FROM users WHERE location = ' '";
	$sweep = mysqli_query($mysqli, $cleanit);
		while($housekeeping = mysqli_fetch_row($sweep)){
		$account = $housekeeping['1'];
	$deleteone = "DELETE FROM central WHERE receiving='$account' OR sending='$account'";
	$deletetwo = "DELETE FROM messages WHERE myrelationship='$account'";
	$deletethree = "DELETE FROM users WHERE id='$account'";
	$deletefour = "DELETE FROM users WHERE id='$account'";
	$deletefive = "DELETE FROM qmr WHERE id='$account'";
		mysqli_query($mysqli,$deleteone);
		mysqli_query($mysqli,$deletetwo);
		mysqli_query($mysqli,$deletethree);
		mysqli_query($mysqli,$deletefour);
		mysqli_query($mysqli,$deletefive);
}

//CONTACT AVAILABILITY FAIL			
$cleanit = "SELECT * FROM users WHERE phone = ' ' AND availability = 'anyone'";
	$sweep = mysqli_query($mysqli, $cleanit);
		while($housekeeping = mysqli_fetch_row($sweep)){
		$account = $housekeeping['0'];
	$deleteone = "DELETE FROM central WHERE receiving='$account' OR sending='$account'";
	$deletetwo = "DELETE FROM messages WHERE myrelationship='$account'";
	$deletethree = "DELETE FROM users WHERE id='$account'";
	$deletefour = "DELETE FROM users WHERE id='$account'";
	$deletefive = "DELETE FROM qmr WHERE id='$account'";
		mysqli_query($mysqli,$deleteone);
		mysqli_query($mysqli,$deletetwo);
		mysqli_query($mysqli,$deletethree);
		mysqli_query($mysqli,$deletefour);
		mysqli_query($mysqli,$deletefive);
}*/
?>


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
	echo "<h2>to email: <a href='https://www.coinbase.com/international'><u>tkimssg@gmail.com</u></a></h2>";
	echo "<br><h3>Include your Login Email when sending payment</h3></div>";
	$_SESSION['region'] = $_SESSION['myr'];
	
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

if(isset($_SESSION['region'])){
		
		$region = $_SESSION['region'];
		$others = "SELECT * FROM users WHERE orientation='gay' AND id<='$s' AND sex='$mfsql' AND region='$region' AND country!='$mycountry' ORDER BY id DESC LIMIT 9";		
		} else {
		$others = "SELECT * FROM users WHERE orientation='gay' AND id<='$s' AND sex='$mfsql' AND country!='$mycountry' ORDER BY id DESC LIMIT 9";	
}	
}else{				
				

if(isset($_SESSION['region'])){
		
		$region = $_SESSION['region'];
		$others = "SELECT * FROM users WHERE orientation='gay' AND id<='$s' AND region='$region' AND country!='$mycountry' ORDER BY id DESC LIMIT 9";		
		} else {
		$others = "SELECT * FROM users WHERE orientation='gay' AND country!='$mycountry' AND id<='$s' ORDER BY id DESC LIMIT 9";	
}	}	
	
}else{
				
if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}

if(isset($_SESSION['region'])){
		
		$region = $_SESSION['region'];
		$others = "SELECT * FROM users WHERE id<='$s' AND sex='$mfsql' AND country!='$mycountry' AND region='$region' ORDER BY id DESC LIMIT 9";		
		} else {
		$others = "SELECT * FROM users WHERE id<='$s' AND sex='$mfsql' AND country!='$mycountry' ORDER BY id DESC LIMIT 9";	
}	
}else{				
				

if(isset($_SESSION['region'])){
		
		$region = $_SESSION['region'];
		$others = "SELECT * FROM users WHERE id<='$s' AND country!='$mycountry' AND region='$region' ORDER BY id DESC LIMIT 9";		
		} else {
		$others = "SELECT * FROM users WHERE id<='$s' AND country!='$mycountry' ORDER BY id DESC LIMIT 9";	
}	}}
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
						echo "<br><a id='next' href='forum_everyone.php?qmr=".$contents['0']."'>NEXT</a>";
						break;}

	if($contents['0'] == $plain){
		
		$who = $plain;

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

echo '<iframe src="//rcm-na.amazon-adsystem.com/e/cm?o=1&p=41&l=ur1&category=amazonhomepage&f=ifr&linkID=b84f15f3b6fd1de6bc517a715d6bf4cc&t=tkimssg-20&tracking_id=tkimssg-20" width="88" height="31" scrolling="no" border="0" marginwidth="0" style="border:none;" frameborder="0"></iframe>';
	
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
	echo "<form action='forum_everyone.php?plain=".$plain."&s=".$s."#a' method='POST'><textarea name='message' rows='2' cols='25'></textarea><br><input type='submit' name='qmr' value='QMR+'></form>";
}else{
	echo "<form action='forum_everyone.php?plain=".$plain."&s=".$s."' method='POST'><textarea name='message' rows='2' cols='25'></textarea><br><input type='submit' name='qmr' value='QMR+'></form>";	
}
	}*/
	if($hide != 1){
	if($ori == "gay"){
		echo "<img src='img/lgbt.png' width='30px'><br><br>";
	}}else{
		echo "<br><br>";
	}
	
		//GYR CHANGE AND DELETE
if (isset($_GET['rate'])){
				
			if($_GET['rate'] == "green") {				
			$green = $g + 5;
			$rate = "UPDATE users SET g='$green' WHERE id='$who'";
			mysqli_query($mysqli,$rate);
			$v ='g';
			}
				if($_GET['rate'] == "yellow") {
				$yellow = $y + 5;
				
				if($yellow == 30){
					
	$deleteone = "DELETE FROM central WHERE receiving='$who' OR sending='$who'";
	$deletetwo = "DELETE FROM messages WHERE myrelationship='$who'";
	$deletethree = "DELETE FROM users WHERE id='$who'";
	$deletefour = "DELETE FROM users WHERE id='$who'";
	$deletefive = "DELETE FROM qmr WHERE id='$who'";
		mysqli_query($mysqli,$deleteone);
		mysqli_query($mysqli,$deletetwo);
		mysqli_query($mysqli,$deletethree);
		mysqli_query($mysqli,$deletefour);
		mysqli_query($mysqli,$deletefive);
					
				}else{
					$rate = "UPDATE users SET y='$yellow' WHERE id='$who'";
					mysqli_query($mysqli,$rate);
				}
		$v ='y';		
				}
					if($_GET['rate'] == "red") {
					$red = $r + 5;
					
				if($red == 15){
					
	$deleteone = "DELETE FROM central WHERE receiving='$who' OR sending='$who'";
	$deletetwo = "DELETE FROM messages WHERE myrelationship='$who'";
	$deletethree = "DELETE FROM users WHERE id='$who'";
	$deletefour = "DELETE FROM users WHERE id='$who'";
	$deletefive = "DELETE FROM qmr WHERE id='$who'";
		mysqli_query($mysqli,$deleteone);
		mysqli_query($mysqli,$deletetwo);
		mysqli_query($mysqli,$deletethree);
		mysqli_query($mysqli,$deletefour);
		mysqli_query($mysqli,$deletefive);					
					
				}else{	
					$rate = "UPDATE users SET r='$red' WHERE id='$who'";
					mysqli_query($mysqli,$rate);
					}
				$v = 'r';	
					}
		$voted = 1;			
					}	
	


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
echo "<a href='forum_everyone.php?plain=".$plain."&s=".$s."&rate=green#a'><img src='img/g.png' width='20px'></a>&nbsp;<a href='forum_everyone.php?plain=".$plain."&s=".$s."&rate=yellow#a'><img src='img/y.png' width='20px'></a>&nbsp;<a href='forum_everyone.php?plain=".$plain."&s=".$s."&rate=red#a'><img src='img/r.png' width='20px'></a><br>";
}else{
echo "<a href='forum_everyone.php?plain=".$plain."&s=".$s."&rate=green'><img src='img/g.png' width='20px'></a>&nbsp;<a href='forum_everyone.php?plain=".$plain."&s=".$s."&rate=yellow'><img src='img/y.png' width='20px'></a>&nbsp;<a href='forum_everyone.php?plain=".$plain."&s=".$s."&rate=red'><img src='img/r.png' width='20px'></a><br>";
}}
		

	echo "<article><span style='font-size:14px'><strong>".$qmr."</strong></span></article></strong><br>";
	
	

echo "<a href='viewe_profile.php?uid=".$who."&more&cell#cell'><article>More numbers from ".$city."</article></a>";	
	
	
	
	}	
	
		if($id == 1){

		echo "<table><tr><td>";	
		echo "<a href='delete.php?delete=".$who."' id='mylink'>DELETE</a>&nbsp;&nbsp;";
		echo "<a href='viewe_profile.php?uid=".$who."' id='mylink'>VIEWE</a></td></tr><tr><td>";
		echo "<a href='profile.php?login=".$email."' id='mylink'>".$email."</a></td></tr></table>";
		echo "<br>".$contact;
	}
	
	echo "</td>";
}


							
						
	if($contents['5'] == 'prof051487.jpg' AND $contents['0'] != $plain){
if($count > 3){
	echo "<td><a href='forum_everyone.php?plain=".$contents['0']."&s=".$s."'>";
}else{
	echo "<td><a href='forum_everyone.php?plain=".$contents['0']."&s=".$s."'>";
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
echo "<td><a href='viewe_profile.php?uid=".$contents['0']."'><img src='profileimg/".$contents['5']."' width='100%'></a>";
echo "<div id='cell'>".$contents['4']."</div></td>";		
}
		$count++;
		$rowcount++;
	}
mysqli_close($mysqli);
}} else	{
	
// PLAIN	
	
		$plain = $_GET['plain'];
		$id = $_SESSION['id'];
				$sessionloc = $_SESSION['city'];
				$mycountry = $_SESSION['country'];
// SQL				
if($_SESSION['orisearch'] == 1){

if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}

if(isset($_SESSION['region'])){
		
		$region = $_SESSION['region'];
		$others = "SELECT * FROM users WHERE orientation='gay' AND country!='$mycountry' AND region='$region' AND sex='$mfsql' ORDER BY id DESC LIMIT 9";
		} else {
		$others = "SELECT * FROM users WHERE orientation='gay' AND country!='$mycountry' AND sex='$mfsql' ORDER BY id DESC LIMIT 9";
}

//echo $others;

}else{				
				
if(isset($_SESSION['region'])){
		
		$region = $_SESSION['region'];
		$others = "SELECT * FROM users WHERE orientation='gay' AND country!='$mycountry' AND region='$region' ORDER BY id DESC LIMIT 9";
		} else {
		$others = "SELECT * FROM users WHERE orientation='gay' AND country!='$mycountry' ORDER BY id DESC LIMIT 9";
}}


}else{				
				
if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}


if(isset($_SESSION['region'])){
		
		$region = $_SESSION['region'];
		$others = "SELECT * FROM users WHERE region='$region' AND sex='$mfsql' AND country!='$mycountry' ORDER BY id DESC LIMIT 9";
		} else {
		$others = "SELECT * FROM users WHERE sex='$mfsql' AND country!='$mycountry' ORDER BY id DESC LIMIT 9";
}	

//echo $others;


}else{				
				
if(isset($_SESSION['region'])){
		
		$region = $_SESSION['region'];
		$others = "SELECT * FROM users WHERE region='$region' AND country!='$mycountry' ORDER BY id DESC LIMIT 9";
		} else {
		$others = "SELECT * FROM users WHERE country!='$mycountry' ORDER BY id DESC LIMIT 9";
}}}
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
						echo "<br><a id='next' href='forum_everyone.php?qmr=".$contents['0']."'>NEXT</a>";
						break;}

	if($contents['0'] == $plain){
		
		$who = $plain;
		
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
	if($_SESSION['paid']==1){
	$availability = $row['7'];		
	}
	$theregion = $row['9'];
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

echo '<iframe src="//rcm-na.amazon-adsystem.com/e/cm?o=1&p=41&l=ur1&category=amazonhomepage&f=ifr&linkID=b84f15f3b6fd1de6bc517a715d6bf4cc&t=tkimssg-20&tracking_id=tkimssg-20" width="88" height="31" scrolling="no" border="0" marginwidth="0" style="border:none;" frameborder="0"></iframe>';
		
	if($count > 3){
		echo "<br><br><br><br><a id='a' href='forum_everyone.php?return=".$who."#a'><img id='d' src='img/centralw.png' width='45px'></a>";
	} else {
		echo "<br><br><br><br><a id='a' href='forum_everyone.php?return=".$who."'><img src='img/centralw.png' width='45px'></a>";
	}
			
	
	if($availability != 'anyone'){
	
	echo "<br><br><a href='forum_everyone.php?add=".$who."'><article><span style='color:red'><strong>SEND CONTACT</strong></span><br><img src='img/na.png' width='35px'></article></a><br>";
if($country == Null){
if($_SESSION['region'] == Null ){	
if($theregion == 'AF' ){echo "Africa";}
if($theregion == 'AS' ){echo "Asia";}
if($theregion == 'EU' ){echo "Europe";}
if($theregion == 'ME' ){echo "Middle East";}
if($theregion == 'NA' ){echo "North America";}
if($theregion == 'OC' ){echo "Oceania";}
if($theregion == 'SA' ){echo "South America";}}	
}else{
	echo "<br>".$country;
}
	echo "<article><span style='font-size:14px'>".$qmr."</span></article>";
	
echo "<a href='viewe_profile.php?uid=".$who."&more&cell#cell'><article>More numbers from ".$city."</article></a>";		

	} else {
		
if($country == Null){		

if($_SESSION['region'] == Null ){	
if($theregion == 'AF' ){echo "<br>Africa";}
if($theregion == 'AS' ){echo "<br>Asia";}
if($theregion == 'EU' ){echo "<br>Europe";}
if($theregion == 'ME' ){echo "<br>Middle East";}
if($theregion == 'NA' ){echo "<br>North America";}
if($theregion == 'OC' ){echo "<br>Oceania";}
if($theregion == 'SA' ){echo "<br>South America";}}	
}else{
	echo "<br>".$country;
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
}else if (substr($contact,0,1) == '+'){
	echo "<article><span style='font-size:20px'><strong>Int'l: ".$contact."</strong></span></article></strong><br>";	
}else{
	echo "<article><span style='font-size:20px'><strong>Int'l: ".$exitcode."/+ ".$countrycode." ".$trunkprefix." ".$contact."</strong></span></article></strong><br>";	
}
}}else{
	echo "<br><br><article><span style='font-size:20px'><strong>@:".$contact."</strong></span></article></strong><br>";	
}}else{
			
	echo "<br><br><article><span style='font-size:20px'><strong>".$contact."</strong></span></article></strong><br>";


}}

// NEW QMR UPLOAD cell
				
	/*			if (isset($_POST['qmr'])){
					
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
	echo "<form action='forum_everyone.php?plain=".$plain."#a' method='POST'><textarea name='message' rows='2' cols='25'></textarea><br><input type='submit' name='qmr' value='QMR+'></form>";
}else{
	echo "<form action='forum_everyone.php?plain=".$plain."' method='POST'><textarea name='message' rows='2' cols='25'></textarea><br><input type='submit' name='qmr' value='QMR+'></form>";	
}
	}*/
	
			if($hide != 1){
			if($ori == "gay"){
		echo "<img src='img/lgbt.png' width='30px'><br><br>";
			}}else{
		echo "<br><br>";
	}
	
		//GYR CHANGE AND DELETE
if (isset($_GET['rate'])){
				
			if($_GET['rate'] == "green") {				
			$green = $g + 5;
			$rate = "UPDATE users SET g='$green' WHERE id='$who'";
			mysqli_query($mysqli,$rate);
			$v ='g';
			}
				if($_GET['rate'] == "yellow") {
				$yellow = $y + 5;
				
				if($yellow == 30){
					
// EMAIL
	
	$theirinfo = "SELECT * FROM users WHERE id='$who'";
	$noting = mysqli_query($mysqli, $theirinfo);
	$letemknow = mysqli_fetch_row($noting);
		$address = $letemknow['2'];
		$subject = "QMR ~ REMOVED FROM SITE";
		$body = "You have been removed from http://QuoteMyRelationship.com for rating YELLOW. There was a problem with your information or your interaction or lack thereof with other people on QMR. You are welcome to create a new account.";	
mail($address,$subject,$body);					
					
	$deleteone = "DELETE FROM central WHERE receiving='$who' OR sending='$who'";
	$deletetwo = "DELETE FROM messages WHERE myrelationship='$who'";
	$deletethree = "DELETE FROM users WHERE id='$who'";
	$deletefour = "DELETE FROM users WHERE id='$who'";
	$deletefive = "DELETE FROM qmr WHERE id='$who'";
		mysqli_query($mysqli,$deleteone);
		mysqli_query($mysqli,$deletetwo);
		mysqli_query($mysqli,$deletethree);
		mysqli_query($mysqli,$deletefour);
		mysqli_query($mysqli,$deletefive);
					
				}else{
					$rate = "UPDATE users SET y='$yellow' WHERE id='$who'";
					mysqli_query($mysqli,$rate);
				}
		$v ='y';		
				}
					if($_GET['rate'] == "red") {
					$red = $r + 5;
					
				if($red == 15){
					
// EMAIL
	
	$theirinfo = "SELECT * FROM users WHERE id='$who'";
	$noting = mysqli_query($mysqli, $theirinfo);
	$letemknow = mysqli_fetch_row($noting);
		$address = $letemknow['2'];
		$subject = "QMR ~ REMOVED FROM SITE";
		$body = "You have been removed from http://QuoteMyRelationship.com for rating RED. There was a problem with your information or your interaction or lack thereof with other people on QMR. You are welcome to create a new account.";	
mail($address,$subject,$body);					
					
	$deleteone = "DELETE FROM central WHERE receiving='$who' OR sending='$who'";
	$deletetwo = "DELETE FROM messages WHERE myrelationship='$who'";
	$deletethree = "DELETE FROM users WHERE id='$who'";
	$deletefour = "DELETE FROM users WHERE id='$who'";
	$deletefive = "DELETE FROM qmr WHERE id='$who'";
		mysqli_query($mysqli,$deleteone);
		mysqli_query($mysqli,$deletetwo);
		mysqli_query($mysqli,$deletethree);
		mysqli_query($mysqli,$deletefour);
		mysqli_query($mysqli,$deletefive);					
					
				}else{	
					$rate = "UPDATE users SET r='$red' WHERE id='$who'";
					mysqli_query($mysqli,$rate);
					}
				$v = 'r';	
					}
		$voted = 1;			
	}

	



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
echo "<a href='forum_everyone.php?plain=".$plain."&rate=green#a'><img src='img/g.png' width='20px'></a>&nbsp;<a href='forum_everyone.php?plain=".$plain."&rate=yellow#a'><img src='img/y.png' width='20px'></a>&nbsp;<a href='forum_everyone.php?plain=".$plain."&rate=red#a'><img src='img/r.png' width='20px'></a><br>";	
}else{
echo "<a href='forum_everyone.php?plain=".$plain."&rate=green'><img src='img/g.png' width='20px'></a>&nbsp;<a href='forum_everyone.php?plain=".$plain."&rate=yellow'><img src='img/y.png' width='20px'></a>&nbsp;<a href='forum_everyone.php?plain=".$plain."&rate=red'><img src='img/r.png' width='20px'></a><br>";	
	}}


	echo "<article><span style='font-size:14px'><strong>".$qmr."</strong></span></article></strong><br>";
	
	echo "<a href='viewe_profile.php?uid=".$who."&more&cell#cell'><article>More numbers from ".$city."</article></a>";	
	
	}	
	
		if($id == 1){

		echo "<table><tr><td>";	
		echo "<a href='delete.php?delete=".$who."' id='mylink'>DELETE</a></td>&nbsp;&nbsp;<td>";
		echo "<a href='viewe_profile.php?uid=".$who."' id='mylink'>VIEWE</a></td></tr><tr><td>";
		echo "<a href='profile.php?login=".$email."' id='mylink'>".$email."</a></td></tr></table>";
		echo "<br>".$contact;
	}
	
	echo "</td>";
}							
						
	if($contents['5'] == 'prof051487.jpg' AND $contents['0'] != $plain){
		
if($count > 3){ 
	echo "<td><a href='forum_everyone.php?plain=".$contents['0']."'>";
		}else{		
			echo "<td><a href='forum_everyone.php?plain=".$contents['0']."'>"; }		
		
if($contents['12'] == 'M'){ 
echo "<img src='img/m.gif' width='100%'>";
}
if($contents['12'] == 'F'){
echo "<img src='img/f.gif' width='100%'>";	
}
echo "<div id='cell'>".$contents['4']."</div></td>";
} 

if($contents['5'] != 'prof051487.jpg' AND $contents['0'] != $plain){	
echo "<td><a href='viewe_profile.php?uid=".$contents['0']."'><img src='profileimg/".$contents['5']."' width='100%'></a>";
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

if(isset($_SESSION['region'])){

		$region = $_SESSION['region'];
		$others = "SELECT * FROM users WHERE orientation='gay' AND sex='$mfsql' AND country!='$mycountry' AND id <= '$return' AND region = '$region' ORDER BY id DESC LIMIT 9";
		} else {
		$others = "SELECT * FROM users WHERE orientation='gay' AND sex='$mfsql' AND country!='$mycountry' AND id <= '$return' ORDER BY id DESC LIMIT 9";
		}	
}else{
	
	if(isset($_SESSION['region'])){
		
		$region = $_SESSION['region'];
		$others = "SELECT * FROM users WHERE orientation = 'gay' AND country!='$mycountry' AND id <= '$return' AND region = '$region' ORDER BY id DESC LIMIT 9";
		} else {
		$others = "SELECT * FROM users WHERE orientation ='gay' AND country!='$mycountry' AND id <= '$return' ORDER BY id DESC LIMIT 9";
		}
}
	
	
}else{				

if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}

if(isset($_SESSION['region'])){

		$region = $_SESSION['region'];
		$others = "SELECT * FROM users WHERE sex='$mfsql' AND country!='$mycountry' AND id <= '$return' AND region = '$region' ORDER BY id DESC LIMIT 9";
		} else {
		$others = "SELECT * FROM users WHERE sex='$mfsql' AND country!='$mycountry' AND id <= '$return' ORDER BY id DESC LIMIT 9";
		}	
}else{
	
	if(isset($_SESSION['region'])){
		
		$region = $_SESSION['region'];
		$others = "SELECT * FROM users WHERE id <= '$return' AND country!='$mycountry' AND region = '$region' ORDER BY id DESC LIMIT 9";
		} else {
		$others = "SELECT * FROM users WHERE id <= '$return' AND country!='$mycountry' ORDER BY id DESC LIMIT 9";
		}
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
						echo "<br><a id='next' href='forum_everyone.php?qmr=".$contents['0']."'>NEXT</a>";
						break;}

	if($contents['5'] == 'prof051487.jpg'){
		
if($count > 3){ 
	echo "<td><a href='forum_everyone.php?plain=".$contents['0']."&s=".$return."'>";
		}else{		
			echo "<td><a href='forum_everyone.php?plain=".$contents['0']."&s=".$return."'>"; }

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
echo "<td><a href='viewe_profile.php?uid=".$contents['0']."&s=".$return."'><img src='profileimg/".$contents['5']."' width='100%'></a>";
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
					$iwant = $updaterrow['1'];
					$where = $updaterrow['3'];

	$myinfo = "SELECT * FROM users WHERE id='$id'";
	$adding = mysqli_query($mysqli, $myinfo);
	$myinfo = mysqli_fetch_row($adding);
	$contactinfo = $myinfo['3'];
		$today = date("m/d");
		$country = $_SESSION['country'];
	$sendcontact = "INSERT INTO central (sending,receiving,phone,timeout,country) VALUES ('$id','$iwant','$contactinfo','$today','$country')";
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

if(isset($_SESSION['region'])){
		
		$region = $_SESSION['region'];
		$others = "SELECT * FROM users WHERE orientation = 'gay' AND country!='$mycountry' AND id <= '$sessionrepeater' AND sex='$mfsql' AND region = '$region' ORDER BY id DESC LIMIT 9";
} else {
		$others = "SELECT * FROM users WHERE orientation = 'gay' AND country!='$mycountry' AND id <= '$sessionrepeater' AND sex='$mfsql' ORDER BY id DESC LIMIT 9";
		}	

		
}else{				
				
if(isset($_SESSION['region'])){
		
		$region = $_SESSION['region'];
		$others = "SELECT * FROM users WHERE orientation = 'gay' AND country!='$mycountry' AND id <= '$sessionrepeater' AND region = '$region' ORDER BY id DESC LIMIT 9";
} else {
		$others = "SELECT * FROM users WHERE orientation = 'gay' AND country!='$mycountry' AND id <= '$sessionrepeater' ORDER BY id DESC LIMIT 9";
}}	
	
	
}else{				
				
				
if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}

if(isset($_SESSION['region'])){
		
		$region = $_SESSION['region'];
		$others = "SELECT * FROM users WHERE id <= '$sessionrepeater' AND sex='$mfsql' AND country!='$mycountry' AND region = '$region' ORDER BY id DESC LIMIT 9";
} else {
		$others = "SELECT * FROM users WHERE id <= '$sessionrepeater' AND sex='$mfsql' AND country!='$mycountry' ORDER BY id DESC LIMIT 9";
		}	

		
}else{				
				
if(isset($_SESSION['region'])){
		
		$region = $_SESSION['region'];
		$others = "SELECT * FROM users WHERE id <= '$sessionrepeater' AND region = '$region' AND country!='$mycountry' ORDER BY id DESC LIMIT 9";
} else {
		$others = "SELECT * FROM users WHERE id <= '$sessionrepeater' AND country!='$mycountry' ORDER BY id DESC LIMIT 9";
}}	}

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
						echo "<br><a id='next' href='forum_everyone.php?qmr=".$contents['0']."'>NEXT</a>";
						break;}
					
	if($contents['5'] == 'prof051487.jpg'){
		
if($count > 3){ 
	echo "<td><a href='forum_everyone.php?plain=".$contents['0']."&s=".$sessionrepeater."'>";
		}else{		
			echo "<td><a href='forum_everyone.php?plain=".$contents['0']."&s=".$sessionrepeater."'>"; 
			}		
		
if($contents['12'] == 'M'){ 
echo "<img src='img/m.gif' width='100%'>";
}
if($contents['12'] == 'F'){
echo "<img src='img/f.gif' width='100%'>";	
}
echo "<div id='cell'>".$contents['4']."</div></td>";
	} 
	
if($contents['5'] != 'prof051487.jpg'){	
echo "<td><a href='viewe_profile.php?uid=".$contents['0']."&s=".$sessionrepeater."'><img src='profileimg/".$contents['5']."' width='100%'></a>";
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

if(isset($_SESSION['region'])){
		
		$region = $_SESSION['region'];
		$others = "SELECT * FROM users WHERE orientation = 'gay' AND id <= '$updatedid' AND sex='$mfsql' AND country!='$mycountry' AND region = '$region' ORDER BY id DESC LIMIT 9";
} else {
		$others = "SELECT * FROM users WHERE orientation = 'gay' AND id <= '$updatedid' AND sex='$mfsql' AND country!='$mycountry' ORDER BY id DESC LIMIT 9";
}	

		
}else{				
				
				
if(isset($_SESSION['region'])){
		
		$region = $_SESSION['region'];
		$others = "SELECT * FROM users WHERE orientation = 'gay' AND id <= '$updatedid' AND country!='$mycountry' AND region = '$region' ORDER BY id DESC LIMIT 9";
} else {
		$others = "SELECT * FROM users WHERE orientation = 'gay' AND id <= '$updatedid' AND country!='$mycountry' ORDER BY id DESC LIMIT 9";
}}
	
	
	
}else{				
				
if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}

if(isset($_SESSION['region'])){
		
		$region = $_SESSION['region'];
		$others = "SELECT * FROM users WHERE id <= '$updatedid' AND sex='$mfsql' AND country!='$mycountry' AND region = '$region' ORDER BY id DESC";
} else {
		$others = "SELECT * FROM users WHERE id <= '$updatedid' AND sex='$mfsql' AND country!='$mycountry' ORDER BY id DESC";
}	

		
}else{				
				
				
if(isset($_SESSION['region'])){
		
		$region = $_SESSION['region'];
		$others = "SELECT * FROM users WHERE id <= '$updatedid' AND country!='$mycountry' AND region = '$region' ORDER BY id DESC LIMIT 9";
} else {
		$others = "SELECT * FROM users WHERE id <= '$updatedid' AND country!='$mycountry' ORDER BY id DESC LIMIT 9";
}}}

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
						echo "<br><a id='next' href='forum_everyone.php?qmr=".$contents['0']."'>NEXT</a>";
						break;}
					
	if($contents['5'] == 'prof051487.jpg'){
		
if($count > 3){ 
	echo "<td><a href='forum_everyone.php?plain=".$contents['0']."&s=".$updatedid."#a'>";
		}else{		
			echo "<td><a href='forum_everyone.php?plain=".$contents['0']."&s=".$updatedid."'>"; }
		

if($contents['12'] == 'M'){ 
echo "<img src='img/m.gif' width='100%'>";
}
if($contents['12'] == 'F'){
echo "<img src='img/f.gif' width='100%'>";	
}
echo "<div id='cell'>".$contents['4']."</div></td>";
	} 
if($contents['5'] != 'prof051487.jpg'){
echo "<td><a href='viewe_profile.php?uid=".$contents['0']."&s=".$updatedid."'><img src='profileimg/".$contents['5']."' width='100%'></a>";
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

if(isset($_SESSION['region'])){
		
		$region = $_SESSION['region'];
		$others = "SELECT * FROM users WHERE orientation = 'gay' AND country!='$mycountry' AND region = '$region' AND sex='$mfsql'  ORDER BY id DESC LIMIT 9";
} else {
		$others = "SELECT * FROM users WHERE orientation = 'gay' AND country!='$mycountry' AND sex='$mfsql' ORDER BY id DESC LIMIT 9";
}	

		
}else{				

if(isset($_SESSION['region'])){
		
		$region = $_SESSION['region'];
		$others = "SELECT * FROM users WHERE orientation = 'gay' AND country!='$mycountry' AND region = '$region'  ORDER BY id DESC LIMIT 9";
} else {
		$others = "SELECT * FROM users WHERE  orientation = 'gay' AND country!='$mycountry' AND ORDER BY id DESC LIMIT 9";
}}	
	
	
}else{				

if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}

if(isset($_SESSION['region'])){
		
		$region = $_SESSION['region'];
		$others = "SELECT * FROM users WHERE region = '$region' AND sex='$mfsql' AND country!='$mycountry'  ORDER BY id DESC LIMIT 9";
} else {
		$others = "SELECT * FROM users WHERE sex='$mfsql' AND country!='$mycountry' ORDER BY id DESC LIMIT 9";
}	

		
}else{				

if(isset($_SESSION['region'])){
		
		$region = $_SESSION['region'];
		$others = "SELECT * FROM users WHERE region = '$region' AND country!='$mycountry'  ORDER BY id DESC LIMIT 9";
} else {
		$others = "SELECT * FROM users WHERE country!='$mycountry' ORDER BY id DESC LIMIT 9";
}}}


				
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
						echo "<br><a id='next' href='forum_everyone.php?qmr=".$contents['0']."'>NEXT</a>";
						break;}
					
	if($contents['5'] == 'prof051487.jpg'){
		
if($count > 3){ 
	echo "<td><a href='forum_everyone.php?plain=".$contents['0']."#d'>";
		}else{		
			echo "<td><a href='forum_everyone.php?plain=".$contents['0']."'>"; }		

if($contents['12'] == 'M'){ 
echo "<img src='img/m.gif' width='100%'>";
}
if($contents['12'] == 'F'){
echo "<img src='img/f.gif' width='100%'>";	
}
echo "<div id='cell'>".$contents['4']."</div></td>";
	} else {
echo "<td><a href='viewe_profile.php?uid=".$contents['0']."'><img src='profileimg/".$contents['5']."' width='100%'></a>";
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

	if(isset($_SESSION['region'])){
		
		$region = $_SESSION['region'];
		$others = "SELECT * FROM users WHERE orientation = 'gay' AND id <= '$return' AND country!='$mycountry' AND region = '$region' AND sex='$mfsql' ORDER BY id DESC LIMIT 9";
	} else {
		$others = "SELECT * FROM users WHERE orientation = 'gay' AND id <= '$return' AND country!='$mycountry' AND sex='$mfsql' ORDER BY id DESC LIMIT 9";
}	

		
}else{		
		
	if(isset($_SESSION['region'])){
		
		$region = $_SESSION['region'];
		$others = "SELECT * FROM users WHERE orientation = 'gay' AND id <= '$return' AND country!='$mycountry' AND region = '$region' ORDER BY id DESC LIMIT 9";
	} else {
		$others = "SELECT * FROM users WHERE orientation = 'gay' AND id <= '$return' AND country!='$mycountry' ORDER BY id DESC LIMIT 9";
}}	
	
	
}else{		
		
		
if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}

	if(isset($_SESSION['region'])){
		
		$region = $_SESSION['region'];
		$others = "SELECT * FROM users WHERE id <= '$return' AND region = '$region' AND country!='$mycountry' AND sex='$mfsql' ORDER BY id DESC LIMIT 9";
	} else {
		$others = "SELECT * FROM users WHERE id <= '$return' AND sex='$mfsql' AND country!='$mycountry' ORDER BY id DESC LIMIT 9";
}	

		
}else{		
		
	if(isset($_SESSION['region'])){
		
		$region = $_SESSION['region'];
		$others = "SELECT * FROM users WHERE id <= '$return' AND country!='$mycountry' AND region = '$region' ORDER BY id DESC LIMIT 9";
	} else {
		$others = "SELECT * FROM users WHERE id <= '$return' AND country!='$mycountry' ORDER BY id DESC LIMIT 9";
}}	}	
		
		
		
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
						echo "<br><a id='next' href='forum_everyone.php?qmr=".$contents['0']."'>NEXT</a>";
						break;}
					
	if($contents['5'] == 'prof051487.jpg'){
if($count > 3){ 
	echo "<td><a href='forum_everyone.php?plain=".$contents['0']."&s=".$return."#a'>";
		}else{		
			echo "<td><a href='forum_everyone.php?plain=".$contents['0']."&s=".$return."'>"; }		
if($contents['12'] == 'M'){ 
echo "<img src='img/m.gif' width='100%'>";
}
if($contents['12'] == 'F'){
echo "<img src='img/f.gif' width='100%'>";	
}
echo "<div id='cell'>".$contents['4']."</div></td>";
	} 
if($contents['5'] != 'prof051487.jpg'){
echo "<td><a href='viewe_profile.php?uid=".$contents['0']."&s=".$return."'><img src='profileimg/".$contents['5']."' width='100%'></a>";
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

	if(isset($_SESSION['region'])){
		
		$region = $_SESSION['region'];
		
			$others = "SELECT * FROM users WHERE orientation = 'gay' AND country!='$mycountry' AND region = '$region' AND sex='$mfsql' ORDER BY id DESC LIMIT 9";
	} else {
			$others = "SELECT * FROM users WHERE orientation = 'gay' AND country!='$mycountry' AND sex='$mfsql' ORDER BY id DESC LIMIT 9";
}	
	
}else{
	
	if(isset($_SESSION['region'])){
		
		$region = $_SESSION['region'];
		
			$others = "SELECT * FROM users WHERE orientation = 'gay' AND country!='$mycountry' AND region = '$region' ORDER BY id DESC LIMIT 9";
	} else {
			$others = "SELECT * FROM users WHERE orientation = 'gay' AND country!='$mycountry' ORDER BY id DESC LIMIT 9";
}}	

		
}else{	

if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}

	if(isset($_SESSION['region'])){
		
		$region = $_SESSION['region'];
		
			$others = "SELECT * FROM users WHERE region = '$region' AND country!='$mycountry' AND sex='$mfsql' ORDER BY id DESC LIMIT 9";
	} else {
			$others = "SELECT * FROM users WHERE sex='$mfsql' AND country!='$mycountry' ORDER BY id DESC LIMIT 9";
}	
	
}else{
	
	if(isset($_SESSION['region'])){
		
		$region = $_SESSION['region'];
		
			$others = "SELECT * FROM users WHERE region = '$region' AND country!='$mycountry' ORDER BY id DESC LIMIT 9";
	} else {
			$others = "SELECT * FROM users WHERE country!='$mycountry' ORDER BY id DESC LIMIT 9";
}}



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
						echo "<br><a id='next' href='forum_everyone.php?qmr=".$contents['0']."'>NEXT</a>";
						break;}
					
	if($contents['5'] == 'prof051487.jpg'){
if($count > 3){ 
	echo "<td><a href='forum_everyone.php?plain=".$contents['0']."#d'>";
		}else{		
			echo "<td><a href='forum_everyone.php?plain=".$contents['0']."'>";}
if($contents['12'] == 'M'){ 
echo "<img src='img/m.gif' width='100%'>";
}
if($contents['12'] == 'F'){
echo "<img src='img/f.gif' width='100%'>";	
}
echo "<div id='cell'>".$contents['4']."</div></td>";
	} else {
echo "<td><a href='viewe_profile.php?uid=".$contents['0']."'><img src='profileimg/".$contents['5']."' width='100%'></a>";
echo "<div id='cell'>".$contents['4']."</div></td>";		
}
		$count++;
		$rowcount++;

				mysqli_close($mysqli);}
	}}}
?>
<br>
<div id='ad'>
<iframe src="//rcm-na.amazon-adsystem.com/e/cm?o=1&p=48&l=ez&f=ifr&linkID=ff3cd6a8e364b55c9442f632f0aff892&t=tkimssg-20&tracking_id=tkimssg-20" width="728" height="90" scrolling="no" border="0" marginwidth="0" style="border:none;" frameborder="0"></iframe>
</div>

<table><tr><td>

<form action='forum_everyone.php' method='POST'>
<select name='continent'>
<?php
if($_SESSION['region'] == 'AF' ){echo "<option value='AF'>Africa</option><option value='AS'>Asia</option><option value='EU'>Europe</option><option value='ME'>Middle East</option><option value='NA'>North America</option><option value='OC'>Oceania</option><option value='SA'>South America</option><option value='NO'>GLOBAL</option></select>";}
if($_SESSION['region'] == 'AS' ){echo "<option value='AS'>Asia</option><option value='AF'>Africa</option><option value='EU'>Europe</option><option value='ME'>Middle East</option><option value='NA'>North America</option><option value='OC'>Oceania</option><option value='SA'>South America</option><option value='NO'>GLOBAL</option></select>";}
if($_SESSION['region'] == 'EU' ){echo "<option value='EU'>Europe</option><option value='AF'>Africa</option><option value='AS'>Asia</option><option value='ME'>Middle East</option><option value='NA'>North America</option><option value='OC'>Oceania</option><option value='SA'>South America</option><option value='NO'>GLOBAL</option></select>";}
if($_SESSION['region'] == 'ME' ){echo "<option value='ME'>Middle East</option><option value='AF'>Africa</option><option value='AS'>Asia</option><option value='EU'>Europe</option><option value='NA'>North America</option><option value='OC'>Oceania</option><option value='SA'>South America</option><option value='NO'>GLOBAL</option></select>";}
if($_SESSION['region'] == 'NA' ){echo "<option value='NA'>North America</option><option value='AF'>Africa</option><option value='AS'>Asia</option><option value='EU'>Europe</option><option value='ME'>Middle East</option><option value='OC'>Oceania</option><option value='SA'>South America</option><option value='NO'>GLOBAL</option></select>";}
if($_SESSION['region'] == 'OC' ){echo "<option value='OC'>Oceania</option><option value='AF'>Africa</option><option value='AS'>Asia</option><option value='EU'>Europe</option><option value='ME'>Middle East</option><option value='NA'>North America</option><option value='SA'>South America</option><option value='NO'>GLOBAL</option></select>";}
if($_SESSION['region'] == 'SA' ){echo "<option value='SA'>South America</option><option value='AF'>Africa</option><option value='AS'>Asia</option><option value='EU'>Europe</option><option value='ME'>Middle East</option><option value='NA'>North America</option><option value='OC'>Oceania</option><option value='NO'>GLOBAL</option></select>";}
if($_SESSION['region'] == Null ){echo "<option value='NO'>GLOBAL</option><option value='AF'>Africa</option><option value='AS'>Asia</option><option value='EU'>Europe</option><option value='ME'>Middle East</option><option value='NA'>North America</option><option value='OC'>Oceania</option><option value='SA'>South America</option></select>";}
?>
<input type='submit' name='region' value='REGION'></form>


</td></tr><tr><td>

<?php

//DONATE
echo "<br><br><span style='color:#ff69b4'><strong>DONATE HERE</strong></span><br><img width='250px' src='img/BC.png'><br><img width='250px'  src='img/recieve.png'><br><span style='color:#ff69b4;font-size: 10pt'>14f9DyK2CokMPdwnhFS9ttnU73UaGrQaz8</span>";

?>

</td></tr></table>

</div>
</body>
</html>