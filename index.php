<?php
require 'db.php';

//if(isset($_COOKIE['login'])){
//	header("location: profile.php");
//}

if(isset($_POST['send'])){
	$words = $_POST['message'];
$insertchat = "INSERT INTO chat (message) VALUES ('$words')";
	mysqli_query($mysqli, $insertchat);}
?>
<!DOCTYPE html>
<html>
<head>
<title>LOGIN/JOIN CallText.me</title>
<link rel="icon" href="img/ro.png">
<script type="text/javascript">
if (screen.width<700){
window.location="start2.php";
}
</script>

<meta name="verify-admitad" content="942acd6855" />
<!--<link rel="stylesheet" type="text/css" href="style.css"/>-->
<meta property="og:image" content="img/ro.png">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Phonebook for Singles and Friends">
<meta name="keywords" content="quotemyrelationship,dating,single,lonely,girlfriend,boyfriend,gf,bf,relationship,meet singles">
<style type="text/css">

@import url('https://fonts.googleapis.com/css?family=Playfair+Display:900');
body{background-color: black;background-image:url("img/tile.gif");}
<!--@import url('https://fonts.googleapis.com/css?family=Roboto+Mono');
in style.css body{background-image:url("img/bg.gif");}-->
p{text-align:center;height:20px;margin:0;padding:0;}
.form{background:linear-gradient(#5e5151,#bab9c7,#c7ced6);width:275px;border-radius:12px;}
a:link,a:visited,a:hover,a:active{color:#d9d8e8;}
li{font-size:20px;}
nav,footer{text-align:center;font-family:'Roboto Mono',monospace;font-size:20px;background-color:#403F47;border:1px solid #535259;}
footer{position: fixed;left: 0;width: 100%;bottom: 0;}
iframe{text-align:center;}
	aside{background-image:url("img/ihu.png");font-family:'Roboto Mono',monospace;font-size:15px;text-align:left;color:black;width:450px;}
table{text-align:center;margin:auto;}
	mark{background-color:black;opacity:0.2;}
	h1{background-color:#bab9c7;}
header{background:#000000;width:250px;text-align:center; <!--linear-gradient(to bottom,#2c7067,#BBF798)-->
font-family: 'Roboto Mono',monospace;<!--'Playfair Display', serif-->
border:1px solid #52ffe8;margin:auto;}

#about{color:yellow;text-transform:underline;}

#link{font-family:'Roboto Mono',monospace;font-size:25px;display:block;}
#link:link,#link:visited{background-color:black;color:white;border:1px solid #535259;}

#cell{width:150px;font-size:15px;text-transform:uppercase;color:white;}




body{font-family: 'Roboto', sans-serif;}
font-family: 'Playfair Display', serif;color:black;
border:1px solid #52ffe8;margin:auto;}
form{font-family:'Roboto', sans-serif;font-size:17px;text-decoration:none;}
div{text-align:center;margin:auto;}
h2{color:#f2f2f2;}

a {text-decoration:none;}

ul li {list-style-type:none;margin:0;padding:0;}
li{/*display:inline*/;margin:0;padding:0;}
li a{padding:10px;}

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
#ad{margin: 0 auto;}
#music{margin:0 auto;}
</style>

<body>

<header>
<span style="font-size:250%;color:#BBF798;font-family: 'Roboto Mono',monospace;">CallText.me</span><br>
</header>

<p><span style="font-family: 'Roboto Mono',monospace;color:#86b06d">The World's Phonebook</span></p>

<br>

<section>

<table>


<td width='350px'>

<!--<script type="text/javascript">
if (screen.width<700){
	window.location="start2.php";
}
</script>-->

<a href="travel_search.php?enter">
<img src="img/himher1enter2.png" width="100%"><br>
<img src="img/world3.gif" width="100%">
</a>


<?php // USERS



/*
if(isset($_GET['qmr'])){
	$updatedid = $_GET['qmr'];	
		$others = "SELECT * FROM users WHERE image!='prof051487.jpg' AND id < '$updatedid' ORDER BY id DESC LIMIT 15";
			if ($crowd = mysqli_query($mysqli, $others)){
		echo "<table><tr>";
$count = 0;
	while($contents = mysqli_fetch_row($crowd)){
		if ($contents == Null){ echo "</tr></table>"; }
			else {
		if($count == 3){
		echo "</tr><tr>"; }			
echo "<td><a href='viewe_profile.php?me=".$contents['0']."'><img src='profileimg/".$contents['5']."' width='100px'></a></td>";
		$count++;
		if($count == 6){
						echo "</tr></table>";
						echo "<br><a id='link' href='index.php?qmr=".$contents['0']."'>NEXT</a><br><br>";
						break;
}}}}} else {
	$others = "SELECT * FROM users WHERE image!='prof051487.jpg' ORDER BY id DESC LIMIT 15";
		if($crowd = mysqli_query($mysqli, $others)){
		echo "<table><tr>";
$count = 0;
	while($contents = mysqli_fetch_row($crowd)){
		if ($contents == Null){ echo "</tr></table>"; }
			else {
		if($count == 3){
		echo "</tr><tr>"; }			
echo "<td><a href='viewe_profile.php?me=".$contents['0']."'><img src='profileimg/".$contents['5']."' width='100px'></a></td>";
		$count++;
		if($count == 6){
						echo "</tr></table>";
						echo "<br><a id='link' href='index.php?qmr=".$contents['0']."'>NEXT</a><br><br>";
						break;
}}}}}*/
?>


</td>

<td width='100px'></td>

<td>

<!--<script type="text/javascript">
if (screen.width<700){
document.getElementById("login").action = "mprofile.php";
//document.getElementById("login").submit();

//window.location="start2.php";
}
</script>-->

<div class="form">
<form id='login' action="profile.php" method="POST">
<input type="text" name="uid" placeholder="EMAIL"><br>
<input type="submit" name="login" value="LOGIN">
</form>
</div>

<br>

<p><span style="color:yellow">FREE / MUST BE 18</span></p>
<iframe src="istart.html"
width="280px"
height="220px" frameborder="0">
</iframe>



</td>
<!--
<td>

<iframe src="startindex.php"
width="400px"
height="500px" frameborder="0">
</iframe>

</td>
-->
</tr></table>


</section>

<?php
/*$phones = "SELECT * FROM AXphones ORDER BY RAND() LIMIT 5";
if ($crowd = mysqli_query($mysqli, $phones)){
echo "<table width='500px'><tr>";
$one = 0;
		while($contents = mysqli_fetch_row($crowd)){
			if ( $one == 4 ) { echo "</tr><tr>"; $one = 0; }else {
						
echo "<td><a href='".$contents['3']."' target='_blank'><img src='".$contents['2']."'></a></td>";
$one = $one + 1;
}}}
echo "</tr></table>";*/
echo "<br><a href='phone.php'><p><span style='font-family: 'Roboto Mono',monospace;color:#86b06d'>SHOP PHONES</span></p></a><br>";



//echo "<br><p><span style='font-family: 'Roboto Mono',monospace;color:#86b06d'>".$_SERVER['HTTP_REFERER']."</span></p></a><br>";
?>


<div id="bottom">


<br>

<?php
if(isset($_GET['donate'])){
echo "<br id='a'><span style='color:#ff69b4'><strong>ACCEPTING DONATIONS</strong></span><br><img width='25%'  src='img/sol.png'><br><img width='25%'  src='img/recieve.png'><br><br><span style='color:#ff69b4'>Gq9Gv34h6Y8noDiKpPk1HcT5gCJJD8Z6xNj1aSChtpv2</span><br><br>";
	
/*
echo '<br><br><span style="color:#ff69b4"><strong>PAYPAL</strong></span><br>';
echo "<img src='img/paypalqr.png' width='30%'><br><br>";

echo '<form action="https://www.paypal.com/donate" method="post" target="_top">';
echo '<input type="hidden" name="hosted_button_id" value="U8TS6F2FB3BGE" />';
echo '<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />';
echo '<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" />';
echo '</form>';
echo "<br><br><br>";
*/
}
?>

<table><tr><td>

</div id='ad'>

<a href="http://www.ibizaglobalradio.com/player/" target="popup" onclick="window.open('http://www.ibizaglobalradio.com/player/','name','width=600,height=600')"><img height="90" src='img/igr.jpg'></a>

</td><td><a href='https://ftx.com' target='blank'><img height="90" src='img/ftx.png'></a></td></tr></table>

<br>

<footer>



<table width="100%">

<!--<tr><td>

<a href="contactme.php">CONTACT</a>
-->
</td><td>

<a href="index.php?donate#a">DONATE</a>

</td><td>

<a href="safety.php">SAFETY</a>

</td><td>

<a href="terms.html">TERMS</a>

</td><td>

<a href="about.html">ABOUT</a>

</td><td>

<a href="keyboard.html">KARBA LAYOUT KEYBOARD</a>

</td><td>

<a href="https://digitaleyes.market/collections/ColorFieldBlack" target="_blank">NFT</a>

</td><td>

<!--<a href="http://freeqrcreator.us-west-1.elasticbeanstalk.com/">PHONE # QR</a>

</td><td>
-->

<a href="index.php">&copy; CallText.me 2021</a>

</td><!--<td>

<a href="https://www.instagram.com/free.dating.qmr/"><img src="img/insta.png" width="40px"></a>

</td><td>

<a href="https://www.facebook.com/QUOTEMYRELATIONSHIP/"><img src="img/facebook.png" width="40px"></a>

</td><td>

<a href="https://www.twitter.com/freedatingqmr/"><img src="img/twitter.png" width="40px"></a>

</td>--></tr></table>

</footer>



</body>
</html>