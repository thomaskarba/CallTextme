<?php
require 'db.php';
session_start();
if(isset($_GET['straight'])){
$_SESSION['ori'] = "str";
}
if(isset($_GET['gay'])){
$_SESSION['ori'] = "gay";
}
if(isset($_GET['friends'])){
$_SESSION['friends'] = 1;
}
//

?>
<!DOCTYPE html>
<html>
<head>
<title>QMR</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Dating">
<meta name="keywords" content="single,lonely,gf,bf,horny,sex,relationship,dating,xxx,latinas,meet singles,social media">
<style type="text/css">
@import url('https://fonts.googleapis.com/css?family=Dosis:500');
body{background-color:black;text-align:center;}
input[type=text],input[type=email],input[type=password],select{
	padding: 3px 3px;margin: 5px;border: 1px solid #dce4f2;border-radius:10px;
	font-family: 'Dosis', sans-serif;font-size:20px;background-color:#dae3e1;color:#7b868f;}

input[type=submit]{
	background-color:#4a4e82;color:black;border:0;margin-bottom:20px;margin-top:5px;
	font-family: 'Dosis', sans-serif;font-size:20px;padding:15px 55px;}
h3{color:gray;font-family:'Roboto Mono',monospace;}

@import url('https://fonts.googleapis.com/css?family=Roboto+Mono:500');
#link{font-family:'Roboto Mono',monospace;font-size:25px;padding:20px;text-decoration:none;display:block;}
#link:link,a:visited{background-color:yellow;color:black;}
#link:hover{background-color:#eb1e66;}
#link:active{background-color:#000000;}
a {width:280px;text-align:center;margin:auto;}

</style>

<body>

<?php
if(isset($_GET['straight']) | isset($_GET['gay'])){
echo "<strong><a href='orientation.php?friends' id='link'>FRIENDS</a>";
echo "<img src='img/ro.png' width='50px'>";
echo "<a href='orientation.php' id='link'>RELATIONSHIP</a></strong>";
}else{
echo "<img src='img/ro.png' width='100px'>";
echo "<h3>Enter an email you will remember<br>This will be your login </h3>";
echo "<strong><form action='countryregion.php' method='POST'><input type='email' name='email' placeholder='EMAIL*'><br><input type='submit' name='location' value='ENTER'></form></strong>";
//<input type='text' name='city' placeholder='CITY*'>
}
?>
</body>
</html>