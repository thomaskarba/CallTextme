<?php
require 'db.php';
session_start();
$contact = $_POST['contact'];
$_SESSION['contact'] = $contact;
$username = $_POST['username'];
$_SESSION['username'] = $username;
$pin = $_POST['password'];
$_SESSION['pin'] = $pin;
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
section{text-align:center;}
</style>
<body>
<section>
<strong>
<form action="me.php" method="POST" enctype="multipart/form-data">
<input type="file" name="img"><br>
<input type="submit" value="IMAGE">
</form>
</strong>
</section>
</body>
</html>