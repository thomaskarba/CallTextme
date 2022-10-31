<?php
require 'db.php';
session_start();
if(isset($_POST['location'])){
$city = $_POST['city'];
$_SESSION['city'] = $city;
$email = $_POST['email'];
$_SESSION['email'] = $email;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>QMR</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Dating">
<meta name="keywords" content="single,lonely,gf,bf,horny,sex,relationship,dating,xxx,latinas,meet singles,social media">
<style type="text/css">
body{background-color:black;color:white;text-align:center;}
section{text-align:center;}
	p{color:white;text-transform:uppercase;}
	@import url('https://fonts.googleapis.com/css?family=Dosis:500');
input[type=text],input[type=email],input[type=password],select{
	padding: 3px 3px;margin: 5px;border: 1px solid #dce4f2;border-radius:10px;
	font-family: 'Dosis', sans-serif;font-size:20px;background-color:#dae3e1;color:#7b868f;}

input[type=submit]{
	background-color:#4a4e82;color:black;border:0;margin-bottom:20px;margin-top:5px;
	font-family: 'Dosis', sans-serif;font-size:20px;padding:15px 55px;}
</style>

<body>
<section>


<img src="img/ro.png" width="100px">

<?php

if($_POST['email'] == Null){
echo "<form action='contact.php' method='POST'><input type='email' name='email' placeholder='EMAIL*'><input type='text' name='city' placeholder='CITY*'><br><input type='submit' name='location' value='ENTER'>";	
} else {
echo "<strong>Please Use Real Information<br><form action='login.php' method='POST'><input type='text' name='contact' placeholder='PHONE NUMBER'><br><input type='submit' name='info' value='NEXT'></form></strong>";
}
?>
</section>
</body>
</html>