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
				

// REGION

	if (isset($_POST['region'])){
		if($_SESSION['region'] == 'NO'){
			$_SESSION['region'] = Null;
		}
		$region = $_POST['continent'];
		$_SESSION['region'] = $region;}
	
	if($_SESSION['region'] == 'NO'){
			$_SESSION['region'] = Null;
		} else {
	$region = $_SESSION['region'];
		}			
if($id == Null){
	mysqli_close($mysqli);
}				
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

#cell{width:275px;font-size:15px;text-transform:uppercase;}

	
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

#b{display:block;border:4px solid black;color:black;font-size:30px;text-decoration:none;}
#a{display:block;border:1px solid #608bd1;color:#efdcee;font-size:35px;text-decoration:none;}

header{background-image:url("img/rainbow2.gif");font-family:'Roboto Mono',monospace;color:white;background-color:black;font-size:30px;}
	
table{width:100%;margin:0;}	

#container{text-align:center;}

</style>
</head>
<body><div id="container">


<header>

<table><tr>

<td>


<?php


echo "<a id='b' href='forum_everyone.php'><strong>EVERYONE</strong></a>";


if($_SESSION['ori'] == 'gay'){
	
echo "</td><td>";	

if(isset($_GET['qmr']) || isset($_GET['return'])){}
else{
	if($_SESSION['orisearch'] == Null){
	$_SESSION['orisearch'] = 1;
}}	


if(isset($_GET['lgbt'])){
if($_GET['lgbt'] == 0){
	$_SESSION['orisearch'] = Null;
}else{
	$_SESSION['orisearch'] = 1;
}}

if($_SESSION['orisearch'] == 1){
		echo "<a href='pforum_everyone.php?lgbt=0'><img src='img/lgbt.png' width='40px'></a>";
}else{
		echo "<a href='pforum_everyone.php?lgbt=1'><img src='img/lgbtunclicked.png' width='40px'></a>";	
}
}

?>




</td>
<td>

<?php

if(isset($_GET['f'])){
	if($_GET['f'] == 1){
			echo "<a href='pforum_everyone.php?f=2'><img src='img/forumflinkclicked.png' width='55px'></a><a href='pforum_everyone.php?m=1'><img src='img/forummlink.png' width='40px'></a>";	
	$_SESSION['f'] = 1;
	$_SESSION['m'] = Null;}
	if($_GET['f'] == 2){
		echo "<a href='pforum_everyone.php?f=1'><img src='img/forumflink.png' width='40px'></a><a href='pforum_everyone.php?m=1'><img src='img/forummlink.png' width='40px'></a>";	
$_SESSION['f'] = Null;
}}
elseif(isset($_GET['m'])){
	if($_GET['m'] == 1){
			echo "<a href='pforum_everyone.php?f=1'><img src='img/forumflink.png' width='40px'></a><a href='pforum_everyone.php?m=2'><img src='img/forummlinkclicked.png' width='55px'></a>";
	$_SESSION['m'] = 1;	
	$_SESSION['f'] = Null;}
	if($_GET['m'] == 2){
		echo "<a href='pforum_everyone.php?f=1'><img src='img/forumflink.png' width='40px'></a><a href='pforum_everyone.php?m=1'><img src='img/forummlink.png' width='40px'></a>";	
$_SESSION['m'] = Null;
		}
}
elseif(isset($_SESSION['f'])){
	echo "<a href='pforum_everyone.php?f=2'><img src='img/forumflinkclicked.png' width='55px'></a><a href='pforum_everyone.php?m=1'><img src='img/forummlink.png' width='40px'></a>";
}
elseif(isset($_SESSION['m'])){
	echo "<a href='pforum_everyone.php?f=1'><img src='img/forumflink.png' width='40px'></a><a href='pforum_everyone.php?m=2'><img src='img/forummlinkclicked.png' width='55px'></a>";
}else{
echo "<a href='pforum_everyone.php?f=1'><img src='img/forumflink.png' width='40px'></a><a href='pforum_everyone.php?m=1'><img src='img/forummlink.png' width='40px'></a>";	
}
?>

</td>
<td>

<a id="b" href="pforum.php"><strong><?php echo $_SESSION['city'];?></strong></a>


</td><td>

<?php echo "<a id='b' href='profile.php'><span style='text-transform:uppercase'><strong>MY PAGE</strong></span></a>"; ?>

</td><td>

<?php 
if(isset($_SESSION['country'])){
	$mycountry = strtoupper($_SESSION['country']);
echo "<a id='b' href='cforum.php'><strong>".$mycountry."</strong></a>";	
}
 ?>

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

echo "<div id='btc'><br><form action='forum_everyone.php' method='POST'><select name='continent'>";
if($_SESSION['region'] == 'AF' ){echo "<option value='AF'>Africa</option><option value='AS'>Asia</option><option value='EU'>Europe</option><option value='ME'>Middle East</option><option value='NA'>North America</option><option value='OC'>Oceania</option><option value='SA'>South America</option><option value='NO'>GLOBAL</option></select>";}
if($_SESSION['region'] == 'AS' ){echo "<option value='AS'>Asia</option><option value='AF'>Africa</option><option value='EU'>Europe</option><option value='ME'>Middle East</option><option value='NA'>North America</option><option value='OC'>Oceania</option><option value='SA'>South America</option><option value='NO'>GLOBAL</option></select>";}
if($_SESSION['region'] == 'EU' ){echo "<option value='EU'>Europe</option><option value='AF'>Africa</option><option value='AS'>Asia</option><option value='ME'>Middle East</option><option value='NA'>North America</option><option value='OC'>Oceania</option><option value='SA'>South America</option><option value='NO'>GLOBAL</option></select>";}
if($_SESSION['region'] == 'ME' ){echo "<option value='ME'>Middle East</option><option value='AF'>Africa</option><option value='AS'>Asia</option><option value='EU'>Europe</option><option value='NA'>North America</option><option value='OC'>Oceania</option><option value='SA'>South America</option><option value='NO'>GLOBAL</option></select>";}
if($_SESSION['region'] == 'NA' ){echo "<option value='NA'>North America</option><option value='AF'>Africa</option><option value='AS'>Asia</option><option value='EU'>Europe</option><option value='ME'>Middle East</option><option value='OC'>Oceania</option><option value='SA'>South America</option><option value='NO'>GLOBAL</option></select>";}
if($_SESSION['region'] == 'OC' ){echo "<option value='OC'>Oceania</option><option value='AF'>Africa</option><option value='AS'>Asia</option><option value='EU'>Europe</option><option value='ME'>Middle East</option><option value='NA'>North America</option><option value='SA'>South America</option><option value='NO'>GLOBAL</option></select>";}
if($_SESSION['region'] == 'SA' ){echo "<option value='SA'>South America</option><option value='AF'>Africa</option><option value='AS'>Asia</option><option value='EU'>Europe</option><option value='ME'>Middle East</option><option value='NA'>North America</option><option value='OC'>Oceania</option><option value='NO'>GLOBAL</option></select>";}
if($_SESSION['region'] == Null ){echo "<option value='NO'>GLOBAL</option><option value='AF'>Africa</option><option value='AS'>Asia</option><option value='EU'>Europe</option><option value='ME'>Middle East</option><option value='NA'>North America</option><option value='OC'>Oceania</option><option value='SA'>South America</option></select>";}
echo "<input type='submit' name='region' value='REGION'></form>";
	
	echo "<h1>Pay .0005 Bitcoin to gain access to ".$iwantregion.".</h1>";
	echo "<h2>to email: tkimssg@gmail.com</h2>";
	echo "<br><h3>Include your Login Email when sending payment</h3></div>";
	$_SESSION['region'] = $_SESSION['myr'];
	
}



// RETURN FROM VIEW PROFILE NO ADD
if(isset($_GET['return'])){
		$return = $_GET['return'];
		
		
	
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
$others = "SELECT * FROM users WHERE orientation='gay' AND image != 'prof051487.jpg' AND sex='$mfsql' AND id <= '$return' AND region = '$region' ORDER BY id DESC LIMIT 9";
		} else {				
		
		$others = "SELECT * FROM users WHERE orientation='gay' AND image != 'prof051487.jpg' AND sex='$mfsql' AND id <= '$return' ORDER BY id DESC LIMIT 9";
}


}else{
	
if(isset($_SESSION['region'])){
		
		$region = $_SESSION['region'];
$others = "SELECT * FROM users WHERE orientation='gay' AND image != 'prof051487.jpg' AND id <= '$return' AND region = '$region' ORDER BY id DESC LIMIT 9";
		} else {				
		
		$others = "SELECT * FROM users WHERE orientation='gay' AND image != 'prof051487.jpg' AND id <= '$return' ORDER BY id DESC LIMIT 9";
}	
	
}	}else{
	

if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}

if(isset($_SESSION['region'])){
		
		$region = $_SESSION['region'];
$others = "SELECT * FROM users WHERE image != 'prof051487.jpg' AND sex='$mfsql' AND id <= '$return' AND region = '$region' ORDER BY id DESC LIMIT 9";
		} else {				
		
		$others = "SELECT * FROM users WHERE image != 'prof051487.jpg' AND sex='$mfsql' AND id <= '$return' ORDER BY id DESC LIMIT 9";
}


}else{
	
if(isset($_SESSION['region'])){
		
		$region = $_SESSION['region'];
$others = "SELECT * FROM users WHERE image != 'prof051487.jpg' AND id <= '$return' AND region = '$region' ORDER BY id DESC LIMIT 9";
		} else {				
		
		$others = "SELECT * FROM users WHERE image != 'prof051487.jpg' AND id <= '$return' ORDER BY id DESC LIMIT 9";
}	
	
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
						echo "<br><a id='a' href='pforum_everyone.php?qmr=".$contents['0']."'>NEXT</a><br><br>";
						break;}
					
		echo "<td><a href='viewe_profile.php?uid=".$contents['0']."&p=1'><img src='profileimg/".$contents['5']."' width='100%'></a>";
		echo "<div id='cell'>".$contents['4']."</div></td>";
		$count++;
		$rowcount++;
	}
				mysqli_close($mysqli);}
				
}
				
				
				
				

//ADD
elseif(isset($_GET['add'])){
	
	$uidcode = $_GET['add'];

	
		$uidlookup = "SELECT * FROM users WHERE image != 'prof051487.jpg' AND id='$uidcode'";
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
	
	$sessionrepeater = $_SESSION['click'];
	
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
		$others = "SELECT * FROM users WHERE orientation='gay' AND image != 'prof051487.jpg' AND sex='$mfsql' AND id <= '$sessionrepeater' AND region = '$region' ORDER BY id DESC LIMIT 9";
		} else {	

		$others = "SELECT * FROM users WHERE orientation='gay' AND image != 'prof051487.jpg' AND sex='$mfsql' AND id <= '$sessionrepeater' ORDER BY id DESC LIMIT 9"; 
}

}else{				

if(isset($_SESSION['region'])){				
		$region = $_SESSION['region'];
		$others = "SELECT * FROM users WHERE orientation='gay' AND image != 'prof051487.jpg' AND id <= '$sessionrepeater' AND region = '$region' ORDER BY id DESC LIMIT 9";
		} else {	

		$others = "SELECT * FROM users WHERE orientation='gay' AND image != 'prof051487.jpg' AND id <= '$sessionrepeater' ORDER BY id DESC LIMIT 9"; 
}}}else{
	

if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}

if(isset($_SESSION['region'])){				
		$region = $_SESSION['region'];
		$others = "SELECT * FROM users WHERE image != 'prof051487.jpg' AND sex='$mfsql' AND id <= '$sessionrepeater' AND region = '$region' ORDER BY id DESC LIMIT 9";
		} else {	

		$others = "SELECT * FROM users WHERE image != 'prof051487.jpg' AND sex='$mfsql' AND id <= '$sessionrepeater' ORDER BY id DESC LIMIT 9"; 
}

}else{				

if(isset($_SESSION['region'])){				
		$region = $_SESSION['region'];
		$others = "SELECT * FROM users WHERE image != 'prof051487.jpg' AND id <= '$sessionrepeater' AND region = '$region' ORDER BY id DESC LIMIT 9";
		} else {	

		$others = "SELECT * FROM users WHERE image != 'prof051487.jpg' AND id <= '$sessionrepeater' ORDER BY id DESC LIMIT 9"; 
}}	
	
	
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
						echo "<br><a id='a' href='pforum_everyone.php?qmr=".$contents['0']."'>NEXT</a><br><br>";
						break;}
					
		echo "<td><a href='viewe_profile.php?uid=".$contents['0']."&p=1'><img src='profileimg/".$contents['5']."' width='100%'></a>";
		echo "<div id='cell'>".$contents['4']."</div></td>";
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
		$others = "SELECT * FROM users WHERE orientation='gay' AND image != 'prof051487.jpg' AND sex='$mfsql' AND id <= '$updatedid' AND region = '$region' ORDER BY id DESC LIMIT 9";
		} else {

		$others = "SELECT * FROM users WHERE orientation='gay' AND image != 'prof051487.jpg' AND sex='$mfsql' AND id <= '$updatedid' ORDER BY id DESC LIMIT 9";
		}
}else{
if(isset($_SESSION['region'])){				
		$region = $_SESSION['region'];
		$others = "SELECT * FROM users WHERE orientation='gay' AND image != 'prof051487.jpg' AND id <= '$updatedid' AND region = '$region' ORDER BY id DESC LIMIT 9";
		} else {

		$others = "SELECT * FROM users WHERE orientation='gay' AND image != 'prof051487.jpg' AND id <= '$updatedid' ORDER BY id DESC LIMIT 9";
		}	
}}else{
	

if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}
if(isset($_SESSION['region'])){				
		$region = $_SESSION['region'];
		$others = "SELECT * FROM users WHERE image != 'prof051487.jpg' AND sex='$mfsql' AND id <= '$updatedid' AND region = '$region' ORDER BY id DESC LIMIT 9";
		} else {

		$others = "SELECT * FROM users WHERE image != 'prof051487.jpg' AND sex='$mfsql' AND id <= '$updatedid' ORDER BY id DESC LIMIT 9";
		}
}else{
if(isset($_SESSION['region'])){				
		$region = $_SESSION['region'];
		$others = "SELECT * FROM users WHERE image != 'prof051487.jpg' AND id <= '$updatedid' AND region = '$region' ORDER BY id DESC LIMIT 9";
		} else {

		$others = "SELECT * FROM users WHERE image != 'prof051487.jpg' AND id <= '$updatedid' ORDER BY id DESC LIMIT 9";
		}	
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
						echo "<br><a id='a' href='pforum_everyone.php?qmr=".$contents['0']."'>NEXT</a><br><br>";
						break;}
					
		echo "<td><a href='viewe_profile.php?uid=".$contents['0']."&p=1'><img src='profileimg/".$contents['5']."' width='100%'></a>";
		echo "<div id='cell'>".$contents['4']."</div></td>";
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
		$others = "SELECT * FROM users WHERE orientation='gay' AND image != 'prof051487.jpg' AND sex='$mfsql' AND region = '$region' ORDER BY id DESC LIMIT 9";
		} else {
				
		$others = "SELECT * FROM users WHERE orientation='gay' AND image != 'prof051487.jpg' AND sex='$mfsql' ORDER BY id DESC LIMIT 9"; }
}else{
if(isset($_SESSION['region'])){				
		$region = $_SESSION['region'];
		$others = "SELECT * FROM users WHERE orientation='gay' AND image != 'prof051487.jpg' AND region = '$region' ORDER BY id DESC LIMIT 9";
		} else {
				
		$others = "SELECT * FROM users WHERE orientation='gay' AND image != 'prof051487.jpg' ORDER BY id DESC LIMIT 9"; }	
}}else{
	

if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}
if(isset($_SESSION['region'])){				
		$region = $_SESSION['region'];
		$others = "SELECT * FROM users WHERE image != 'prof051487.jpg' AND sex='$mfsql' AND region = '$region' ORDER BY id DESC LIMIT 9";
		} else {
				
		$others = "SELECT * FROM users WHERE image != 'prof051487.jpg' AND sex='$mfsql' ORDER BY id DESC LIMIT 9"; }
}else{
if(isset($_SESSION['region'])){				
		$region = $_SESSION['region'];
		$others = "SELECT * FROM users WHERE image != 'prof051487.jpg' AND region = '$region' ORDER BY id DESC LIMIT 9";
		} else {
				
		$others = "SELECT * FROM users WHERE image != 'prof051487.jpg' ORDER BY id DESC LIMIT 9"; }	
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
						if ($count == $total){ 
						echo "</tr></table>";
						echo "<br><a id='a' href='pforum_everyone.php?qmr=".$contents['0']."'>NEXT</a><br><br>";
						break;}
					
		echo "<td><a href='viewe_profile.php?uid=".$contents['0']."&p=1'><img src='profileimg/".$contents['5']."' width='100%'></a>";
		echo "<div id='cell'>".$contents['4']."</div></td>";
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
		$others = "SELECT * FROM users WHERE orientation='gay' AND image != 'prof051487.jpg' AND sex='$mfsql' AND id <= '$return' AND region = '$region' ORDER BY id DESC LIMIT 9";
		} else {
		
		$others = "SELECT * FROM users WHERE orientation='gay' AND image != 'prof051487.jpg' AND sex='$mfsql' AND id <= '$return' ORDER BY id DESC LIMIT 9";
		}
}else{
if(isset($_SESSION['region'])){				
		$region = $_SESSION['region'];
		$others = "SELECT * FROM users WHERE orientation='gay' AND image != 'prof051487.jpg' AND id <= '$return' AND region = '$region' ORDER BY id DESC LIMIT 9";
		} else {
		
		$others = "SELECT * FROM users WHERE orientation='gay' AND image != 'prof051487.jpg' AND id <= '$return' ORDER BY id DESC LIMIT 9";
		}	
}}else{
	

if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}
if(isset($_SESSION['region'])){				
		$region = $_SESSION['region'];
		$others = "SELECT * FROM users WHERE image != 'prof051487.jpg' AND sex='$mfsql' AND id <= '$return' AND region = '$region' ORDER BY id DESC LIMIT 9";
		} else {
		
		$others = "SELECT * FROM users WHERE image != 'prof051487.jpg' AND sex='$mfsql' AND id <= '$return' ORDER BY id DESC LIMIT 9";
		}
}else{
if(isset($_SESSION['region'])){				
		$region = $_SESSION['region'];
		$others = "SELECT * FROM users WHERE image != 'prof051487.jpg' AND id <= '$return' AND region = '$region' ORDER BY id DESC LIMIT 9";
		} else {
		
		$others = "SELECT * FROM users WHERE image != 'prof051487.jpg' AND id <= '$return' ORDER BY id DESC LIMIT 9";
		}	
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
						echo "<br><a id='a' href='pforum_everyone.php?qmr=".$contents['0']."'>NEXT</a><br><br>";
						break;}
					
		echo "<td><a href='viewe_profile.php?uid=".$contents['0']."&p=1'><img src='profileimg/".$contents['5']."' width='100%'></a>";
		echo "<div id='cell'>".$contents['4']."</div></td>";
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
	$others = "SELECT * FROM users WHERE orientation='gay' AND image != 'prof051487.jpg' AND sex='$mfsql' AND region = '$region' ORDER BY id DESC LIMIT 9";
		} else {	
	
	
	$others = "SELECT * FROM users WHERE orientation='gay' AND image != 'prof051487.jpg' AND sex='$mfsql' ORDER BY id DESC LIMIT 9";
		}
}else{
if(isset($_SESSION['region'])){				
		$region = $_SESSION['region'];
	$others = "SELECT * FROM users WHERE orientation='gay' AND image != 'prof051487.jpg' AND region = '$region' ORDER BY id DESC LIMIT 9";
		} else {	
	
	
	$others = "SELECT * FROM users WHERE orientation='gay' AND image != 'prof051487.jpg' ORDER BY id DESC LIMIT 9";
		}	
}}else{
	

if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}
if(isset($_SESSION['region'])){				
		$region = $_SESSION['region'];
	$others = "SELECT * FROM users WHERE image != 'prof051487.jpg' AND sex='$mfsql' AND region = '$region' ORDER BY id DESC LIMIT 9";
		} else {	
	
	
	$others = "SELECT * FROM users WHERE image != 'prof051487.jpg' AND sex='$mfsql' ORDER BY id DESC LIMIT 9";
		}
}else{
if(isset($_SESSION['region'])){				
		$region = $_SESSION['region'];
	$others = "SELECT * FROM users WHERE image != 'prof051487.jpg' AND region = '$region' ORDER BY id DESC LIMIT 9";
		} else {	
	
	
	$others = "SELECT * FROM users WHERE image != 'prof051487.jpg' ORDER BY id DESC LIMIT 9";
		}	
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
						echo "<br><a id='a' href='pforum_everyone.php?qmr=".$contents['0']."'>NEXT</a><br><br>";
						break;}
					
		echo "<td><a href='viewe_profile.php?uid=".$contents['0']."&p=1'><img src='profileimg/".$contents['5']."' width='100%'></a>";
		echo "<div id='cell'>".$contents['4']."</div></td>";
		$count++;
		$rowcount++;

				mysqli_close($mysqli);}
	}}}
?>

<br><br><br>

<form id='region' action='pforum_everyone.php' method='POST'>
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
</div>
</body>
</html>