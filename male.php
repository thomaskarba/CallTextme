<?php
require 'db.php';
session_start();
$_SESSION['mf'] = "M";
?>
<!DOCTYPE html>
<html>
<head>
<title>QMR</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style type="text/css">
body{background-color:black;text-align:center;}
@import url('https://fonts.googleapis.com/css?family=Roboto+Mono:500');
#link{font-family:'Roboto Mono',monospace;font-size:25px;padding:20px;text-decoration:none;display:block;}
#link:link,a:visited{background-color:yellow;color:black;}
#link:hover{background-color:#eb1e66;}
#link:active{background-color:#000000;}
a {width:280px;text-align:center;margin:auto;}
</style>

<body>
<strong>
<a href="straight.php" id="link">STRAIGHT</a>

<img src="img/ro.png" width="50px">

<a href="gay.php" id="link">GAY</a>
</strong>
</body>
</html>