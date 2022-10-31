<?php
require 'db.php';
session_start();
$_SESSION['gender'] = "F";
?>
<!DOCTYPE html>
<html>
<head>
<title>QMR</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Dating">
<meta name="keywords" content="single,lonely,gf,bf,horny,sex,relationship,dating,xxx,latinas,meet singles,social media">
<style type="text/css">
body{background-color:black;}
@import url('https://fonts.googleapis.com/css?family=Roboto+Mono:500');
#link{font-family:'Roboto Mono',monospace;font-size:25px;padding:20px;text-decoration:none;display:block;}
#link:link,a:visited{background-color:yellow;color:black;}
#link:hover{background-color:#eb1e66;}
#link:active{background-color:#000000;}
a {width:200px;text-align:center;margin:auto;}
</style>

<body>
<strong>
<a href="istraight.php" id="link">STRAIGHT</a>

<a href="igay.php" id="link">GAY</a>
</strong>
</body>
</html>