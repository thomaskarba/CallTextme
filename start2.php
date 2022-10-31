<?php
require 'db.php';
session_start();

if(isset($_COOKIE['login'])){
	header("location: mprofile.php");
}

if(isset($_POST['write'])){
	$contact = $_POST['contact'];
	$gender = $_POST['gender'];
	$test = $_POST['qmr'];
	$location = $_POST['location'];
	$_SESSION['location'] = $location;
		if(($test != Null)||($contact != Null)||($location != Null)) {

$dollar = '/\$/';
		if (preg_match($dollar,$test)) {
		exit('PROSTITUTION IS A NOT ALLOWED');}

		$qmr = mysqli_real_escape_string($mysqli,$_POST['qmr']);
		$sql = "INSERT INTO start (location,gender,contact,txt) VALUES ('$location','$gender','$contact','$qmr')";
		mysqli_query($mysqli,$sql);
}}

if(isset($_GET['join'])){
	$_SESSION['region'] = Null;
	$_SESSION['city'] = Null;
}

?>
<!DOCTYPE html>
<html>
<head>
<title>CallText.me</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Dating">
<meta name="keywords" content="quotemyrelationship,single,boyfriend,girlfriend,gf,bf,relationship,dating,meet singles,social media">
<style type="text/css">
@import url('https://fonts.googleapis.com/css?family=Playfair+Display:900');

body{background-color:black;text-align:center;}

@import url('https://fonts.googleapis.com/css?family=Roboto+Mono:500');

#linkf{font-family:'Roboto Mono',monospace;font-size:25px;text-align:center;padding:7px;text-decoration:none;display:block;}
#linkf:link,a:visited{background:yellow linear-gradient(to right,#636300,yellow,yellow,#636300);color:black;}
#linkf:hover{background-color:#eb1e66;}
#linkf:active{background-color:#000000;}

#linkm{font-family:'Roboto Mono',monospace;font-size:25px;text-align:center;padding:7px;text-decoration:none;display:block;}
#linkm:link,a:visited{background:yellow linear-gradient(to right,#636300,yellow,yellow,#636300);color:black;}
#linkm:hover{background-color:#eb1e66;}
#linkm:active{background-color:#000000;}

a {width:100%;}

.form{margin:auto;background:linear-gradient(#5e5151,#bab9c7,#c7ced6);width:200px;border-radius:12px;}

form{font-family:'Roboto', sans-serif;font-size:17px;text-decoration:none;}

@import url('https://fonts.googleapis.com/css?family=Dosis:500');
input[type=email]{width:150px;padding: 3px 3px;margin: 5px;border: 1px solid #dce4f2;border-radius:10px;
	font-family: 'Dosis', sans-serif;font-size:18px;background-color:#dae3e1;color:black;}

input[type=submit]{
	background-color:#4a4e82;color:black;border:0;margin-bottom:5px;margin-top:5px;
	font-family: 'Dosis', sans-serif;font-size:15px;padding:15px 55px;}

input[type=submit]:hover{
	background-color:#75778f;
}

input[type=text]:focus,
input[type=email]:focus,
input[type=password]:focus{
	background-color:#f7f7f7;border: 1px solid #868e9c;}

h3{color:gray;font-family:'Roboto Mono',monospace;}
section{background-color:#e8eaed;}

#a{font-family:'Playfair Display',serif;font-size:200%;padding:20px;text-decoration:none;display:block;}
#a:link,#a:visited{background-color:black;color:yellow;border:1px solid yellow;}

#male {color:#dda1b9;}

#female {color:#d7efec;}

article{background-color:black;width:100%;font-size:22px;}

pre{font-family: 'Playfair Display', serif;text-align:left;white-space: pre-wrap;}

#top{width:100%;}

#center{margin:auto;}
</style>

<body>


<?php /* RELATIONSHIPS
if(isset($_GET['l'])){
	echo "<a id='a' href='mforum_everyone.php'>".$_GET['l']."</a>";
} else {
	echo "<a id='a' href='mforum_everyone.php'>Relationships</a>";
}

img/row.png
*/
?>

<a href="mtravel_search.php?enter">
<img src="img/himher1enter2.png" width="100%">
</a>


<div id="top">
<strong>



<table width="100%"><tr><td>
<a href="gender.php?f" id="linkf">I AM FEMALE</a></td><td><a href="gender.php?m" id="linkm">I AM MALE</a></td></tr></table>

<?php

	$Fcount = "SELECT COUNT(sex) FROM users WHERE sex = 'F'";
	$ft = mysqli_query($mysqli,$Fcount);
	$frow = mysqli_fetch_row($ft);
	echo "<table><tr><td><h3>".$frow['0']." Females</h3></td>";
echo "<td> and </td>";
	$Mcount = "SELECT COUNT(sex) FROM users WHERE sex = 'M'";
	$mt = mysqli_query($mysqli,$Mcount);
	$mrow = mysqli_fetch_row($mt);
	echo "<td><h3>".$mrow['0']." Males</h3></td></tr></table>";



?>

<br>

<div class="form">
<form action="mprofile.php" method="POST">
<input type="email" name="uid" placeholder="EMAIL"><br>
<input type="submit" name="login" value="LOGIN">
</form>
</div><br>
</div>

<table width="100%">


<!--<tr><td colspan="3"><img src="img/heart.gif" width="100%"></td></tr>-->

<tr><td colspan="3">

<?php
/*	$citycount = "SELECT COUNT(DISTINCT location) FROM updater";
	$cc = mysqli_query($mysqli,$citycount);
	$cshowrow = mysqli_fetch_row($cc);
	echo "<h3>".$cshowrow['0']." LOCATIONS WORLDWIDE</h3>";
*/
?>

<?php
/*
$l = "SELECT DISTINCT country FROM updater ORDER BY country ASC";
$lsql = mysqli_query($mysqli, $l);
	echo "<form action='mforumstart.php' method='POST'><select name='country'>";
					echo "<option value=''>COUNTRY</option>";
				while ($loclist = mysqli_fetch_row($lsql)){
					$country = $loclist['0'];
					echo "<option value='$country'>".strtoupper($country)."</option>";
				}
echo "</select><input type='submit' name='searchcountry' value='SEARCH'></form>";
*/
?>


</td></tr><tr><td colspan="3"><img src="img/world3.gif" width="100%"></td></tr>

<!--
<tr><td>


<div class="tradingview-widget-container">
  <div id="tradingview_27433"></div>
  <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/symbols/NYSE-NIO/" rel="noopener" target="_blank"><span class="blue-text">NIO Chart</span></a> by TradingView</div>
  <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
  <script type="text/javascript">
  new TradingView.widget(
  {
  "width": 280,
  "height": 300,
  "symbol": "NYSE:NIO",
  "interval": "D",
  "timezone": "Etc/UTC",
  "theme": "dark",
  "style": "1",
  "locale": "en",
  "toolbar_bg": "#f1f3f6",
  "enable_publishing": false,
  "container_id": "tradingview_27433"
}
  );
  </script>
</div>

</td></tr>
-->

</table>

<!--<span style="color:yellow">SEE WHO'S HERE</span>

<a href="http://freeqrcreator.us-west-1.elasticbeanstalk.com/"><span style="color:yellow">***FREE QR CReATOR***</span></a>
<br><br><br><br><br><br>
-->
</strong>
</body>
</html>