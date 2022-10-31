<?php 
require 'db.php';
session_start();

	if (isset($_POST['searchcountry'])){
		$country = $_POST['country'];
		$_SESSION['country'] = $country;}
		
?>
<!DOCTYPE html>
<html>
<head>
<title>QMR</title>
<link rel="icon" href="img/ro.png">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body{font-family:'Roboto Mono',monospace;color:white;background-color:#000000;}
@import url('https://fonts.googleapis.com/css?family=Roboto+Mono:500');
	header{width:300px;text-align:center;
	font-family:'Roboto Mono',monospace;color:white;
	margin:auto;}
div{text-align:center;font-size:26px;margin:auto;}
#container{text-align:center;}
#center{text-align:center;}
#cell{width:275px;font-size:15px;text-transform:uppercase;}
hr{border:0;height:0;size:1px;color:#799971}
nav{text-align:center;font-family:'Roboto Mono',monospace;font-size:20px;}
	a{text-decoration:none;color:white;}
	
#link{font-family:'Roboto Mono',monospace;font-size:25px;padding:20px;text-decoration:none;display:block;}
#link:link,a:visited{background-color:#191919;color:#def4eb;border:1px solid #26664b;}
	
input[type=text],select,button
	{padding: 3px 3px;
	margin: 5px;
	border-radius:10px;
	font-family: 'Dosis', sans-serif;
	font-size:20px;
	background-color:#f0ec8d;
	color:black;}

input[type=submit]{
	background-color:#f0ec8d;
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

if(isset($_GET['f'])){
	if($_GET['f'] == 1){
			echo "<td><a href='mforumstart.php?f=2#forum'><img src='img/mforumflinkclicked.png' width='100%'></a></td><td><a href='mforumstart.php?m=1#forum'><img src='img/mforummlink.png' width='100%'></a></td>";	
	$_SESSION['f'] = 1;
	$_SESSION['m'] = Null;}
	if($_GET['f'] == 2){
		echo "<td><a href='mforumstart.php?f=1#forum'><img src='img/mforumflink.png' width='100%'></a></td><td><a href='mforumstart.php?m=1#forum'><img src='img/mforummlink.png' width='100%'></a></td>";	
$_SESSION['f'] = Null;
}}
elseif(isset($_GET['m'])){
	if($_GET['m'] == 1){
			echo "<td><a href='mforumstart.php?f=1#forum'><img src='img/mforumflink.png' width='100%'></a></td><td><a href='mforumstart.php?m=2#forum'><img src='img/mforummlinkclicked.png' width='100%'></a></td>";
	$_SESSION['m'] = 1;	
	$_SESSION['f'] = Null;}
	if($_GET['m'] == 2){
		echo "<td><a href='mforumstart.php?f=1#forum'><img src='img/mforumflink.png' width='100%'></a></td><td><a href='mforumstart.php?m=1#forum'><img src='img/mforummlink.png' width='100%'></a></td>";	
$_SESSION['m'] = Null;
		}
}
elseif(isset($_SESSION['f'])){
	echo "<td><a href='mforumstart.php?f=2#forum'><img src='img/mforumflinkclicked.png' width='100%'></a></td><td><a href='mforumstart.php?m=1#forum'><img src='img/mforummlink.png' width='100%'></a></td>";
}
elseif(isset($_SESSION['m'])){
	echo "<td><a href='mforumstart.php?f=1#forum'><img src='img/mforumflink.png' width='100%'></a></td><td><a href='mforumstart.php?m=2#forum'><img src='img/mforummlinkclicked.png' width='100%'></a></td>";
}else{
echo "<td><a href='mforumstart.php?f=1#forum'><img src='img/mforumflink.png' width='100%'></a></td><td><a href='mforumstart.php?m=1#forum'><img src='img/mforummlink.png' width='100%'></a></td>";	
}
?>
</tr></table>




<table><tr><td>
<div>	

<?php 

if(isset($_GET['qmr'])){
	$updatedid = $_GET['qmr'];	
		$country = $_SESSION['country'];
	
if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}				


		$others = "SELECT * FROM updater WHERE country = '$country' AND repeater <= '$updatedid' AND mf='$mfsql' AND availability = 'anyone' ORDER BY repeater DESC";
}else{

		$others = "SELECT * FROM updater WHERE country = '$country' AND repeater <= '$updatedid' AND availability = 'anyone' ORDER BY repeater DESC";
	
}

//$others = "SELECT * FROM updater WHERE location = '$sessionloc' AND repeater <= '$updatedid' ORDER BY repeater DESC";
	
	if ($crowd = mysqli_query($mysqli, $others)){

		echo "<table>";
$count = 0;
		while($contents = mysqli_fetch_row($crowd)){
				
echo "<tr>";						
	if($contents['8'] == 'prof051487.jpg'){
echo "<td width='50%'><a href='mviewstart.php?uid=".$contents['0']."'>";
if($contents['5'] == 'M'){ 
echo "<img src='img/m.gif' width='100%'>";
}
if($contents['5'] == 'F'){
echo "<img src='img/f.gif' width='100%'>";	
}
echo "<div id='cell'>".$contents['3']."</div></a></td>";
	} else {
echo "<td width='50%'><a href='mviewstart.php?uid=".$contents['0']."'><img src='profileimg/".$contents['8']."' width='100%'><div id='cell'>".$contents['3']."</div></a></td>";
	}						
echo "</tr>";
		$count++;
		if($count == 4){
		
						echo "</table>";
						echo "<br><a id='link' href='mforumstart.php?qmr=".$contents['0']."'><p>NEXT</p></a><br><br>";
						break;
}}} 


	} else {
		
		$country = $_SESSION['country'];		

if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}				


		$others = "SELECT * FROM updater WHERE country = '$country' AND mf='$mfsql' AND availability = 'anyone' ORDER BY repeater DESC";
}else{

		$others = "SELECT * FROM updater WHERE country = '$country' AND availability = 'anyone' ORDER BY repeater DESC";
		
}

//$others = "SELECT * FROM updater WHERE location = '$city' ORDER BY repeater DESC";
	if($crowd = mysqli_query($mysqli, $others)){

		echo "<table>";
$count = 0;

	while($contents = mysqli_fetch_row($crowd)){

echo "<tr>";						
	if($contents['8'] == 'prof051487.jpg'){
echo "<td width='50%'><a href='mviewstart.php?uid=".$contents['0']."'>";
if($contents['5'] == 'M'){ 
echo "<img src='img/m.gif' width='100%'>";
}
if($contents['5'] == 'F'){
echo "<img src='img/f.gif' width='100%'>";	
}
echo "<div id='cell'>".$contents['3']."</div></a></td>";
	} else {
echo "<td width='50%'><a href='mviewstart?uid=".$contents['0'].".php'><img src='profileimg/".$contents['8']."' width='100%'><div id='cell'>".$contents['3']."</div></a></td>";
	}						
echo "</tr>";
		$count++;
		if($count == 4){
		
						echo "</table>";
						echo "<br><a id='link' href='mforumstart.php?qmr=".$contents['0']."'><p>NEXT</p></a><br><br>";
						break;
}}
}}

//<a href='mview_profile.php?uid=".$contents['0']."'>
?>
</div>

</td></tr><tr><td>

<a id="link" href="start2.php">+ JOIN +</a><br>

</td></tr>
</table>
</div>
</body>
</html>