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
				
if(isset($_GET['country'])){
$_SESSION['searchcountry'] = NULL;
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

if (isset($_POST['searchcountry'])){
		$country = $_POST['country'];
		$_SESSION['searchcountry'] = $country;}

if (isset($_GET['searchcountry'])){
		$country = $_GET['country'];
		$_SESSION['searchcountry'] = $country;}		

if(isset($_GET['f'])){
	if($_GET['f'] == 1){
	$_SESSION['f'] = 1;	
	$_SESSION['m'] = Null;}
	if($_GET['f'] == 2){
$_SESSION['f'] = Null;
}}
elseif(isset($_GET['m'])){
	if($_GET['m'] == 1){
	$_SESSION['m'] = 1;	
	$_SESSION['f'] = Null;}
	if($_GET['m'] == 2){
$_SESSION['m'] = Null;
		}
}

//M TRAVEL SEARCH .PHP
if(isset($_GET['ts'])){
	$_SESSION['searchcountry']=$_GET['ts'];
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
#cell{font-size:65%;text-transform:uppercase;}
hr{border:0;height:0;size:1px;color:#799971}
nav{text-align:center;font-family:'Roboto Mono',monospace;font-size:20px;}
	a{text-decoration:none;color:white;}
	
footer{width:300px;text-align:center;
	font-family:'Roboto Mono',monospace;color:white;
	margin:auto;}

	table,td{text-align:center;}
	p{text-transform:uppercase;color:white;}
	
#link{font-family:'Roboto Mono',monospace;font-size:25px;padding:20px;text-decoration:none;display:block;}
#link:link,a:visited{background-color:#191919;color:#515151;border:1px solid #282828;}
table{width:100%;padding:0;margin:0;}
table#forum{width:100%;position: relative;left: 0;margin:0;padding:0;background-image:url("<?php if($_SESSION['f']==1){echo "img/fsmall.jpg";} if($_SESSION['m']==1){echo "img/msmall.jpg";}?>");background-repeat:repeat-y;background-position: left;}
td{padding:0;margin:0;text-align: center;}

#btc{border:3px solid white;}
#space{width: 50%;}

	p{height:10px;text-indent: 0px;}



</style>
</head>
<body><div id="container">


<a id="link" href="mtravel_search.php"><span style='text-transform:uppercase'>COUNTRIES</span></a>	


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
	$_SESSION['orisearch'] = Null;
}else{
	$_SESSION['orisearch'] = 1;
}}

if($_SESSION['orisearch'] == 1){
		echo "<a href='mcforum.php?lgbt=0'><img src='img/lgbt.png' width='40%'></a>";
}else{
		echo "<a href='mcforum.php?lgbt=1'><img src='img/lgbtunclicked.png' width='40%'></a>";	
}
}

?>


</tr><tr>
<?php

if(isset($_GET['f'])){
	if($_GET['f'] == 1){
			echo "<td><a href='mcforum.php?f=2#forum'><img src='img/mforumflinkclicked.png' width='50%'></a></td><td><a href='mcforum.php?m=1#forum'><img src='img/mforummlink.png' width='50%'></a></td>";	
	$_SESSION['f'] = 1;
	$_SESSION['m'] = Null;}
	if($_GET['f'] == 2){
		echo "<td><a href='mcforum.php?f=1#forum'><img src='img/mforumflink.png' width='50%'></a></td><td><a href='mcforum.php?m=1#forum'><img src='img/mforummlink.png' width='50%'></a></td>";	
$_SESSION['f'] = Null;
}}
elseif(isset($_GET['m'])){
	if($_GET['m'] == 1){
			echo "<td><a href='mcforum.php?f=1#forum'><img src='img/mforumflink.png' width='50%'></a></td><td><a href='mcforum.php?m=2#forum'><img src='img/mforummlinkclicked.png' width='50%'></a></td>";
	$_SESSION['m'] = 1;	
	$_SESSION['f'] = Null;}
	if($_GET['m'] == 2){
		echo "<td><a href='mcforum.php?f=1#forum'><img src='img/mforumflink.png' width='50%'></a></td><td><a href='mcforum.php?m=1#forum'><img src='img/mforummlink.png' width='50%'></a></td>";	
$_SESSION['m'] = Null;
		}
}
elseif(isset($_SESSION['f'])){
	echo "<td><a href='mcforum.php?f=2#forum'><img src='img/mforumflinkclicked.png' width='50%'></a></td><td><a href='mcforum.php?m=1#forum'><img src='img/mforummlink.png' width='50%'></a></td>";
}
elseif(isset($_SESSION['m'])){
	echo "<td><a href='mcforum.php?f=1#forum'><img src='img/mforumflink.png' width='50%'></a></td><td><a href='mcforum.php?m=2#forum'><img src='img/mforummlinkclicked.png' width='50%'></a></td>";
}else{
echo "<td><a href='mcforum.php?f=1#forum'><img src='img/mforumflink.png' width='50%'></a></td><td><a href='mcforum.php?m=1#forum'><img src='img/mforummlink.png' width='50%'></a></td>";	
}
?>
</tr>

<!--<a id="link" href="mpforum_everyone.php#forum">+ IMAGE</a><br>-->


<?php 

if(isset($_SESSION['searchcountry'])){
	$country = $_SESSION['searchcountry'];
}
else{
	$country = $_SESSION['country'];
}

if($_SESSION['id'] == Null){
	mysqli_close($mysqli);
			setcookie('login',Null,time()+1);
session_unset();
session_destroy(); 
}

if($_SESSION['id']==1){}
else{
if($_SESSION['myr'] == Null){
	mysqli_close($mysqli);
}}


if($_SESSION['orisearch'] == 1){
	
if(isset($_SESSION['m']) || isset($_SESSION['f'])){
if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}
		$others = "SELECT DISTINCT(city) FROM users WHERE orientation = 'gay' AND sex='$mfsql' AND country = '$country' ORDER BY city ASC";
}else{
		$others = "SELECT DISTINCT(city) FROM users WHERE orientation = 'gay' AND country = '$country' ORDER BY city ASC";
}
}else{

if(isset($_SESSION['m']) || isset($_SESSION['f'])){
if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}
		$others = "SELECT DISTINCT(city) FROM users WHERE sex='$mfsql' AND country = '$country' ORDER BY city ASC";
}else{
// EVERYONE
		$others = "SELECT DISTINCT(city) FROM users WHERE country = '$country' ORDER BY city ASC";
}}

	
			if ($crowd = mysqli_query($mysqli, $others)){
$total  = $crowd->num_rows;
		echo "<table id='forum'><tr>";
echo "<td><span style='font-size:65%;text-transform:uppercase;'><a href='#A'>A </a>";
echo "<a href='#B'>B </a><a href='#C'>C </a><a href='#D'>D </a><a href='#E'>E </a>";
echo "<a href='#F'>F </a><a href='#G'>G </a><a href='#H'>H </a><a href='#I'>I </a>";
echo "<a href='#J'>J </a><a href='#K'>K </a><a href='#L'>L </a><a href='#M'>M </a><br>";
echo "<a href='#N'>N </a><a href='#O'>O </a><a href='#P'>P </a><a href='#Q'>Q </a>";
echo "<a href='#R'>R </a><a href='#S'>S </a><a href='#T'>T </a><a href='#U'>U </a>";
echo "<a href='#V'>V </a><a href='#W'>W </a><a href='#X'>X </a><a href='#Y'>Y </a>";
echo "<a href='#Z'>Z</a></span></td></tr>";
$count = 1;
$two = 0;
		while($contents = mysqli_fetch_row($crowd)){
			if ( $two == 1 ) { echo "</tr><tr>"; $two = 0; }
				if ($count == $total){ 
						echo "</tr></table>";
						break;}
						
echo "<td id='".substr($contents['0'],0,1)."'><a href='mforum.php?city=".$contents['0']."'>";						
echo "<p><span style='font-size:65%;text-transform:uppercase;'>".$contents['0']."</span></p></a></td>";
			$two++;	
			$count++;
			}}
			
			
			
mysqli_close($mysqli);			
?>




</td></tr>

<br><a id='link' href='mtravel_search.php'>COUNTRIES</a>

<tr><td>
<br><a id="link" href="mprofile.php"><span style='text-transform:uppercase'>MY PAGE</span></a><br>
</td></tr>


<tr><td>
<a id="link" href="logout.php"><span style='text-transform:uppercase'>LOGOUT</span></a>
</td></tr>

<tr><td>
<?php
//DONATE
echo "<br><br><span style='color:#ff69b4'><strong>DONATE HERE</strong></span><br><img width='250px' src='img/sol.png'><br><span style='color:#ff69b4;font-size: 10pt'>Address:<br>Gq9Gv34h6Y8noDiKpPk1HcT5gCJJD8Z6xNj1aSChtpv2</span>";
?>
</td></tr>

</table>

</div>
</body>
</html>