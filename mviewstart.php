<?php
require 'db.php';
session_start();
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
	<title>QMR</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
body{background-image:url("img/mpbg.jpg");}
div{text-align:center;}

@import url('https://fonts.googleapis.com/css?family=Roboto+Mono:500');
	header{background-color:yellow;width:300px;text-align:center;
	font-family:'Roboto Mono',monospace;color:black;
	<!--border:3px solid #000000;-->margin:auto;}

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
ul{margin:0;padding:0;overflow:hidden;list-style-type:none;}

#left{display:block;padding:20px;}
#left:link,a:visited{background:#ffffc6 linear-gradient(to right,#ffffff,#ffffc6,#ffffc6,#ffffc6);}
#left:hover{background:#eb1e66 linear-gradient(to right,#ffffff,#ffe2ec,#ffe2ec,#ffe2ec)}	
#left:active{background:#ffffff linear-gradient(to right,#ffffff,#ffffff,#ffffff,#ffffc6);}

#return{display:block;padding:20px;}
#return:link,a:visited{background:#ffffc6 linear-gradient(to right,#ffffc6,#ffffc6,#ffffc6,#ffffc6);}
#return:hover{background:#eb1e66 linear-gradient(to right,#ffffff,#ffe2ec,#ffe2ec,#ffffff)}	
#return:active{background:#ffffff linear-gradient(to right,#ffffc6,#ffffff,#ffffff,#ffffc6);}

#right{display:block;padding:20px;}
#right:link,a:visited{background:#ffffc6 linear-gradient(to right,#ffffc6,#ffffc6,#ffffc6,#ffffff);}
#right:hover{background:#eb1e66 linear-gradient(to right,#ffe2ec,#ffe2ec,#ffe2ec,#ffffff)}	
#right:active{background:#ffffff linear-gradient(to right,#ffffc6,#ffffff,#ffffff,#ffffff);}

#mssg{font-family:'Roboto Mono',monospace;font-size:25px;padding:20px;text-decoration:none;display:block;}
#mssg:link,a:visited{background-color:#f2f2f2;color:black;}
#mssg:hover{background-color:#f2f2f2;}
#mssg:active{background-color:#000000;}

a{text-decoration:none;color:black;}
@import url('https://fonts.googleapis.com/css?family=Roboto+Mono:500');
footer,#topheader{font-family:'Roboto Mono',monospace;font-size:15px;color:#969696;}
article{margin:auto;font-family:'Roboto Mono',monospace;width:300px;}<!--QMR-->
div{margin:auto;text-align:center;}
section{font-family:'Roboto Mono',monospace;color:red;}
article{text-transform:uppercase;color:#c4c4c4;}
#qmrs{border:3px solid #c4c4c4;text-transform:uppercase;color:#7a7a7a;}
table{width:100%;margin:0;padding:0;}

</style>
<body>



<?php 
	if(isset($_GET['uid'])){
	$uid = $_GET['uid'];
	$_SESSION['click'] = $uid;
	$repeaterlookup = "SELECT * FROM updater WHERE repeater='$uid'";
	$rload = mysqli_query($mysqli,$repeaterlookup);
	$found = mysqli_fetch_array($rload);
		$who = $found['1'];
		
	
		
		
		
		
// LEFT
if(isset($_GET['l'])){
	
	
if($_SESSION['orisearch'] == 1){	
	
// PFORUM	
if(isset($_GET['i'])){
	
	
//MF	
if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}


$country = $_SESSION['country'];		
	$repeaterlookup = "SELECT * FROM updater WHERE country='$country' AND ori='gay' AND mf='$mfsql' AND img != 'prof051487.jpg' AND repeater>'$uid' AND availability = 'anyone' ORDER BY repeater ASC LIMIT 1"; 
		$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
	$who = $found['1'];
}


}	else {



$country = $_SESSION['country'];		
	$repeaterlookup = "SELECT * FROM updater WHERE country='$country' AND ori='gay' AND img != 'prof051487.jpg' AND repeater>'$uid' AND availability = 'anyone' ORDER BY repeater ASC LIMIT 1"; 
		$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
	$who = $found['1'];
}
	
}
	
	
		
}else{
// PFORUM	


if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}


$country = $_SESSION['country'];		
	$repeaterlookup = "SELECT * FROM updater WHERE country='$country' AND ori='gay' AND mf='$mfsql' AND repeater>'$uid' AND availability = 'anyone' ORDER BY repeater ASC LIMIT 1"; 
		$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
	$who = $found['1'];
	}

}else{


$country = $_SESSION['country'];		
	$repeaterlookup = "SELECT * FROM updater WHERE country='$country' AND repeater>'$uid' AND ori='gay' AND availability = 'anyone' ORDER BY repeater ASC LIMIT 1"; 
		$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
	$who = $found['1'];
	}
	
}

		
}}else{
	
	
// ORISEARCH DIVIDE



// PFORUM	
if(isset($_GET['i'])){
	
	
//MF	
if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}


$country = $_SESSION['country'];		
	$repeaterlookup = "SELECT * FROM updater WHERE country='$country' AND mf='$mfsql' AND img != 'prof051487.jpg' AND repeater>'$uid' AND availability = 'anyone' ORDER BY repeater ASC LIMIT 1"; 
		$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
	$who = $found['1'];
}


}	else {



$country = $_SESSION['country'];		
	$repeaterlookup = "SELECT * FROM updater WHERE country='$country' AND img != 'prof051487.jpg' AND repeater>'$uid' AND availability = 'anyone' ORDER BY repeater ASC LIMIT 1"; 
		$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
	$who = $found['1'];
}
	
}
	
	
		
}else{
// PFORUM	


if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}


$country = $_SESSION['country'];		
	$repeaterlookup = "SELECT * FROM updater WHERE country='$country' AND mf='$mfsql' AND repeater>'$uid' AND availability = 'anyone' ORDER BY repeater ASC LIMIT 1"; 
		$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
	$who = $found['1'];
	}

}else{


$country = $_SESSION['country'];		
	$repeaterlookup = "SELECT * FROM updater WHERE country='$country' AND repeater>'$uid' AND availability = 'anyone' ORDER BY repeater ASC LIMIT 1"; 
		$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
	$who = $found['1'];
	}
	
}

		
}	
	
}}

// RIGHT
if(isset($_GET['r'])){
	
	
if($_SESSION['orisearch'] == 1){	

// PFORUM
if(isset($_GET['i'])){
	
	
if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}


$country = $_SESSION['country'];		
	$repeaterlookup = "SELECT * FROM updater WHERE country='$country' AND ori='gay' AND mf='$mfsql' AND img != 'prof051487.jpg' AND repeater<'$uid' AND availability = 'anyone' ORDER BY repeater DESC LIMIT 1"; 
		$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
	$who = $found['1'];
}

}else{
	

$country = $_SESSION['country'];		
	$repeaterlookup = "SELECT * FROM updater WHERE country='$country' AND ori='gay' AND img != 'prof051487.jpg' AND repeater<'$uid' AND availability = 'anyone' ORDER BY repeater DESC LIMIT 1"; 
		$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
	$who = $found['1'];
}	
	
}	
	
	
		
}else{	
//PFORUM	


if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}


$country = $_SESSION['country'];		
	$repeaterlookup = "SELECT * FROM updater WHERE country='$country' AND ori='gay' AND mf='$mfsql' AND repeater<'$uid' AND availability = 'anyone' ORDER BY repeater DESC LIMIT 1"; 
		$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
	$who = $found['1'];
}

}else{
	

$country = $_SESSION['country'];		
	$repeaterlookup = "SELECT * FROM updater WHERE country='$country' AND repeater<'$uid' AND ori='gay' AND availability = 'anyone' ORDER BY repeater DESC LIMIT 1"; 
		$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
	$who = $found['1'];
}	
	
}

		
}}else{
	
// ORISEARCH DIVIDE	
	
	
// PFORUM
if(isset($_GET['i'])){
	
	
if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}


$country = $_SESSION['country'];		
	$repeaterlookup = "SELECT * FROM updater WHERE country='$country' AND mf='$mfsql' AND img != 'prof051487.jpg' AND repeater<'$uid' AND availability = 'anyone' ORDER BY repeater DESC LIMIT 1"; 
		$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
	$who = $found['1'];
}

}else{
	

$country = $_SESSION['country'];		
	$repeaterlookup = "SELECT * FROM updater WHERE country='$country' AND img != 'prof051487.jpg' AND repeater<'$uid' AND availability = 'anyone' ORDER BY repeater DESC LIMIT 1"; 
		$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
	$who = $found['1'];
}	
	
}	
	
	
		
}else{	
//PFORUM	


if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}


$country = $_SESSION['country'];		
	$repeaterlookup = "SELECT * FROM updater WHERE country='$country' AND mf='$mfsql' AND repeater<'$uid' AND availability = 'anyone' ORDER BY repeater DESC LIMIT 1"; 
		$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
	$who = $found['1'];
}

}else{
	

$country = $_SESSION['country'];		
	$repeaterlookup = "SELECT * FROM updater WHERE country='$country' AND repeater<'$uid' AND availability = 'anyone' ORDER BY repeater DESC LIMIT 1"; 
		$rload = mysqli_query($mysqli,$repeaterlookup);
	if ($rload->num_rows == 1){
		$found = mysqli_fetch_array($rload);
	$who = $found['1'];
}	
	
}

		
}	
}}	
		
		
		
		
		
		
		
		
/*
if($_SESSION['region'] == Null) {		
		$regioncode = $found['2'];
		
if($_SESSION['myr'] != $regioncode && $_SESSION['paid'] != 1){mysqli_close($mysqli);}		

if($regioncode == 'AF'){$theregion = 'Africa';}
if($regioncode == 'AS'){$theregion = 'Asia';}
if($regioncode == 'EU'){$theregion = 'Europe';}
if($regioncode == 'ME'){$theregion = 'Middle East';}
if($regioncode == 'NA'){$theregion = 'North America';}
if($regioncode == 'OC'){$theregion = 'Oceania';}
if($regioncode == 'SA'){$theregion = 'South America';}
if($regioncode == '0'){$theregion = Null;} }		
*/
	$call = "SELECT * FROM users WHERE id='$who'";
	$infoload = mysqli_query($mysqli,$call);
	$row = mysqli_fetch_array($infoload);
		$profile = $row['1'];
		$contact = $row['3'];
		$city = $row['4'];
		$image = $row['5'];
		$qmr = $row['6'];
		$availability = $row['7'];
		
		$ori = $row['11'];
		$sex = $row['12'];
		$country = $row['16'];

				
		
if(isset($_GET['p'])){
	
if(isset($_GET['r'])){
$call = "SELECT * FROM updater WHERE id='$who'";
$infoload = mysqli_query($mysqli,$call);
$row = mysqli_fetch_row($infoload);
$uid = $row['0'];	
}
if(isset($_GET['l'])){
$call = "SELECT * FROM updater WHERE id='$who'";
$infoload = mysqli_query($mysqli,$call);
$row = mysqli_fetch_row($infoload);
$uid = $row['0'];	
}
echo "<div><div id='topheader'><table><tr><td><a href='mviewstart.php?uid=".$uid."&l=1&i=1#a' id='left'><img src='img/left.png' width='30px'></a></td><td><a href='mforumstart.php?return=".$uid."#forum' id='return'><img src='img/central.png' width='30px'></a></td><td><a href='mviewstart.php?uid=".$uid."&r=1&i=1#a' id='right'><img src='img/right.png' width='30px'></a></td></tr></table></div><br>";
}elseif(isset($_GET['i'])){
	
if(isset($_GET['r'])){
$call = "SELECT * FROM updater WHERE id='$who'";
$infoload = mysqli_query($mysqli,$call);
$row = mysqli_fetch_row($infoload);
$uid = $row['0'];	
}
if(isset($_GET['l'])){
$call = "SELECT * FROM updater WHERE id='$who'";
$infoload = mysqli_query($mysqli,$call);
$row = mysqli_fetch_row($infoload);
$uid = $row['0'];	
}
echo "<div><div id='topheader'><table><tr><td><a href='mviewstart.php?uid=".$uid."&l=1&i=1#a' id='left'><img src='img/left.png' width='30px'></a></td><td><a href='mforumstart.php?return=".$uid."#forum' id='return'><img src='img/central.png' width='30px'></a></td><td><a href='mviewstart.php?uid=".$uid."&r=1&i=1#a' id='right'><img src='img/right.png' width='30px'></a></td></tr></table></div><br>";
}else{
if(isset($_GET['r'])){
$call = "SELECT * FROM updater WHERE id='$who'";
$infoload = mysqli_query($mysqli,$call);
$row = mysqli_fetch_row($infoload);
$uid = $row['0'];	
}
if(isset($_GET['l'])){
$call = "SELECT * FROM updater WHERE id='$who'";
$infoload = mysqli_query($mysqli,$call);
$row = mysqli_fetch_row($infoload);
$uid = $row['0'];	
}
echo "<div><div id='topheader'><table><tr><td><a href='mviewstart.php?uid=".$uid."&l=1#a' id='left'><img src='img/left.png' width='30px'></a></td><td><a href='mforumstart.php?return=".$uid."#forum' id='return'><img src='img/central.png' width='30px'></a></td><td><a href='mviewstart.php?uid=".$uid."&r=1#a' id='right'><img src='img/right.png' width='30px'></a></td></tr></table></div><br>";
}
	

if($availability == 'anyone'){

	echo "<header><span style='font-size:225%'>".$city;
if(isset($country)) {	
	echo "<br><span style='text-transform:uppercase'>".$country."</span></strong></span></header><br>";
echo "</span></header></a><br>";
}
		
	if($image == 'prof051487.jpg'){
			if($sex == 'M'){
	echo "<img id='a' width='50%' border='2px' src='img/m.jpg'><br><br>";
			}
			if($sex == 'F'){
	echo "<img id='a' width='50%' border='2px' src='img/f.jpg'><br><br>";
			}}
			
	if($image != 'prof051487.jpg'){
		echo "<img id='a' width='100%' border='2px' src='profileimg/".$image."'><br><br>";
	}
	
	if($ori == 'gay'){
		echo "<br><img src='img/lgbt.png' width='25px'><br>";
	}

	echo "<a href='start2.php'><article><span style='font-size:25px'>Join to See Contact info</span></article></a><br>";
			

		echo "<article><span style='font-size:14px'>".$qmr."</span></article><br><br>";
	
	


							mysqli_free_result($mr);

	
	
	
	}	
	}
	
	?>


</div></body>
</html>