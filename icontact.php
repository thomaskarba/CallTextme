<?php
require 'db.php';
session_start();
$city = $_POST['city'];
$_SESSION['city'] = $city;
$email = $_POST['email'];
$_SESSION['email'] = $email;
?>
<!DOCTYPE html>
<html>
<head>
<title>QMR</title>
<link rel="stylesheet" type="text/css" href="style.css"/>
<style type="text/css">
body{color:white;}
section{text-align:center;}
</style>

<body>
<section>
<?php 

if($_POST['email'] == Null){
echo "<form action='icontact.php' method='POST'><input type='email' name='email' placeholder='EMAIL*'><input type='text' name='city' placeholder='CITY*'><br><input type='submit' name='location' value='ENTER'>";	
} else {
echo "<strong><form action='ime.php' method='POST'><input type='text' name='contact' placeholder='PHONE NUMBER'><br><input type='submit' name='info' value='NEXT'></form></strong>";
}
?>
</section>
</body>
</html>