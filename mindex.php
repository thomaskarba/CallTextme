<?php
require 'db.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>QMR</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Dating">
<meta name="keywords" content="single,lonely,gf,bf,horny,sex,relationship,dating,xxx,latinas,meet singles,social media">
<style type="text/css">
@import url('https://fonts.googleapis.com/css?family=Playfair+Display:900');
@import url('https://fonts.googleapis.com/css?family=Roboto+Mono');
p{color:#d9d8e8;font-size:20px;text-align:center;background-color:black;font-size:30px;}
.form{background:linear-gradient(#5e5151,#bab9c7,#c7ced6);width:275px;border-radius:12px;}
a:link,a:visited,a:hover,a:active{color:#d9d8e8;}
li{font-size:20px;}
nav,footer{text-align:center;font-family:'Roboto Mono',monospace;font-size:20px;}
iframe{text-align:center;}
aside{font-family:'Roboto Mono',monospace;font-size:10px;text-align:left;color:black;width:300px;}
table{width:100%;}
td{float:left;}
mark{background-color:white;}
h1{background-color:white;}

body{background-image:url("img/bg.png");font-family: 'Roboto', sans-serif;}
header{background:#48D1CC linear-gradient(to bottom,#2c7067,#48D1CC);width:180px;text-align:center;
font-family: 'Playfair Display', serif;color:#29245c;
border:1px solid #52ffe8;margin:auto;}
form{font-family:'Roboto', sans-serif;font-size:17px;text-decoration:none;}
div{text-align:center;margin:auto;}
h2{color:#f2f2f2;}

a {text-decoration:none;}

ul li {list-style-type:none;margin:0;padding:0;}
li{/*display:inline*/;margin:0;padding:0;}
li a{padding:10px;}
footer{text-align:center;font-size:12px;}

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

article{text-align:center;background-color:#221f38;width:600px;margin:auto;border:1px solid #a15778;border-radius:15px;}

header{background:#48D1CC linear-gradient(to bottom,#2c7067,#48D1CC);width:200px;text-align:center;
color:#29245c;
border:1px solid #52ffe8;margin:auto;}
form{font-family:'Roboto', sans-serif;font-size:17px;text-decoration:none;}
div{text-align:center;margin:auto;}
h2{color:#f2f2f2;}

</style>

<body>

<header>
<span style="font-size:275%">Q M R</span><br>
</header>

<?php
if (isset($_GET['delete'])){
	$account = $_GET['delete'];
	$deleteone = "DELETE FROM central WHERE receiving='$account'";
	$deletetwo = "DELETE FROM messages WHERE myrelationship='$account'";
	$deletethree = "DELETE FROM updater WHERE username='$account'";
	$deletefour = "DELETE FROM users WHERE username='$account'";
		mysqli_query($mysqli,$deleteone);
		mysqli_query($mysqli,$deletetwo);
		mysqli_query($mysqli,$deletethree);
		mysqli_query($mysqli,$deletefour);
	echo "<br><a href='contactme.php'><p>USER DELETED. THANK YOU FOR USING QMR!<br>FEEL FREE TO CONTACT US<br>ABOUT YOUR EXPERIENCE BELOW</p></a>";
	}

?>

<br>

<aside><mark>
<h1>Less time in traffic, more time together.</h1></mark></aside>

<br>


<div class="form">
<form action="profile.php" method="POST">
<input type="text" name="uid" placeholder="EMAIL USERNAME"><br>
<input type="submit" name="login" value="LOGIN">
</form>
</div>

<br>

<a href="start.html">CREATE PAGE</a>

<br>

<aside><mark>
<h1>Worried about Privacy?</h1>
Decide who you want to see your contact information. You can choose and send your info to select people in Central, or you can 
be more welcoming and show your info to anyone in your neighborhood. Who doesn't love a message from your neighborhood? You can also
delete your profile any time, removing all contact information from the site after you've met someone. Come back any time!
<h1>How Should People Contact me?</h1>
Not brave enough to supply your number? That's perfectly understandable. This is why QMR allows you to choose which type of 
contact suits you best. It can be a messenger, an email, or PO Box! It's up to you how you'd like to start a relationship.
</mark></aside>

<footer>

<a href="contactme.php">CONTACT / DONATE</a>

<br><br>

<a href="safety.php">SAFETY</a>

<br><br>

<a href="terms.html">TERMS</a>

</footer>

<br>

</body>
</html>