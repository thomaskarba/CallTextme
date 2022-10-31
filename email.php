<?php
require 'db.php';
session_start();
$city = $_POST['city'];
$_SESSION['city'] = $city;
?>
<!DOCTYPE html>
<html>
<head>
<title>QMR</title>
<link rel="stylesheet" type="text/css" href="style.css"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Dating">
<meta name="keywords" content="single,lonely,gf,bf,horny,sex,relationship,dating,xxx,latinas,meet singles,social media">
<style type="text/css">
body{color:white;}
section{text-align:center;}
</style>

<body>
<section>
<strong>
<form action="image.php" method="POST">
PHONE, EMAIL, MESSENGER: <br>
<input type="text" name="contact"><br>
<input type="submit" name="info" value='CONTACT'>
</form>
</strong>
</section>
</body>
</html>