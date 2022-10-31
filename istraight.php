<?php
require 'db.php';
session_start();
$_SESSION['orientation'] = "str";
?>
<!DOCTYPE html>
<html>
<head>
<title>QMR</title>
<style type="text/css">
body{background-color:black;}
@import url('https://fonts.googleapis.com/css?family=Roboto+Mono:500');
#link{font-family:'Roboto Mono',monospace;font-size:25px;padding:20px;text-decoration:none;display:block;}
#link:link,a:visited{background-color:yellow;color:black;}
#link:hover{background-color:#eb1e66;}
#link:active{background-color:#000000;}
a {width:200px;text-align:center;margin:auto;}
section{text-align:center;}

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
</style>

<body>
<section>
<strong>
<form action="icountryregion.php" method="POST">
<input type="email" name="email" placeholder="EMAIL*">
<!--<input type="text" name="city" placeholder="CITY*">--><br>
<input type="submit" name="location" value="ENTER">
</form>
</strong>
</section>
</body>
</html>