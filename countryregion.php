<?php
require 'db.php';
session_start();
if(isset($_POST['location'])){
$city = $_POST['city'];
$_SESSION['city'] = $city;
$email = $_POST['email'];
$_SESSION['email'] = $email;
}

//$_SESSION['city']=$city;
//$_SESSION['country']=$country_name;

	if (isset($_POST['searchcountry'])){
		$country = $_POST['country'];
		$_SESSION['country'] = $country;	
		
		
		if($country == "NOTLISTED"){
			$_SESSION['country'] = "NOTLISTED";
		}
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
	
@import url('https://fonts.googleapis.com/css?family=Roboto+Mono:500');
#login{font-family:'Roboto Mono',monospace;font-size:25px;color:yellow;}
</style>

<body>
<section>


<img src="img/ro.png" width="60px"><br>

<?php


$email = $_SESSION['email'];
$result = $mysqli->query("SELECT * FROM users WHERE email='$email'");
if ($result->num_rows > 0){
	echo	"<a href='mprofile.php?login=".$email."' target='_parent'><div id='login'><strong>CLICK HERE, LOGIN WITH ".$email."</strong></div></a><br><br>";
   }else{

//IP

// Get client's IP address
if (isset($_SERVER['REMOTE_ADDR']) && array_key_exists('REMOTE_ADDR', $_SERVER)) {
    $ip = $_SERVER['REMOTE_ADDR'];

} 


/*
elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER)) {
    $ips = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
    $ips = array_map('trim', $ips);
    $ip = $ips[0];
}
*/
/*

'HTTP_CLIENT_IP'

(isset($_SERVER['HTTP_CLIENT_IP']) && array_key_exists('HTTP_CLIENT_IP', $_SERVER)) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];


'REMOTE_ADDR'


(isset($_SERVER['HTTP_X_FORWARDED_FOR']) && array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER)) {
    $ips = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
    $ips = array_map('trim', $ips);
    $ip = $ips[0];
	*/



$_SESSION['ip']=$ip;
$url1 = "https://pro.ip-api.com/json/";
$url2="?key=YzwVIWdSwM0qpXy";
$url = $url1.$ip.$url2;
$ch = curl_init();
curl_setopt ($ch, CURLOPT_URL, $url);
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 35);
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
$contents = curl_exec($ch);
if (curl_errno($ch)) {
 // echo curl_error($ch);
 // echo "\n<br />";
  $contents = '';
} else {
  curl_close($ch);
}
$data = json_decode($contents,True);

$_SESSION['city'] = $data['city'];
$_SESSION['country']= $data['country'];

if($_SESSION['city'] == ''){$_SESSION['city'] = $_SESSION['country'];}

$_SESSION['longitude']=$data['lon'];
$_SESSION['latitude']=$data['lat'];
if($_SESSION['country']=='United States'){$_SESSION['country']='USA';}
if($_SESSION['country']=='United Kingdom'){$_SESSION['country']='UK';}
if($_SESSION['country']=='United Arab Emirates'){$_SESSION['country']='UAE';}

if($data['status_code']==404 || $data['status']=='fail'){

$_SESSION['country']=NULL;	
$_SESSION['city']=NULL;	
}

$homecity = $city;


if(is_null($_SESSION['country'])){
	
$csearch = "SELECT DISTINCT country FROM users WHERE city='$homecity' AND region!='0'  AND country IS NOT NULL";
if($cload = mysqli_query($mysqli,$csearch)){
	
if ($cload->num_rows == 0){
	
	
$l = "SELECT DISTINCT country FROM updater ORDER BY country ASC";
$lsql = mysqli_query($mysqli, $l);
	echo "<form action='countryregion.php' method='POST'><select name='country'>";
					echo "<option value=''>COUNTRY</option>";
				echo "<option value='NOTLISTED'>NOT LISTED</option>";	
				while ($loclist = mysqli_fetch_row($lsql)){
					$country = $loclist['0'];
					echo "<option value='$country'>".strtoupper($country)."</option>";
				}
				echo "<option value='NOTLISTED'>NOT LISTED</option>";
echo "</select><input type='submit' name='searchcountry' value='SET'></form>";	
	
}elseif ($cload->num_rows > 1){
	
	
$l = "SELECT DISTINCT country FROM updater ORDER BY country ASC";
$lsql = mysqli_query($mysqli, $l);
	echo "<form action='countryregion.php' method='POST'><select name='country'>";
					echo "<option value=''>COUNTRY</option>";
				echo "<option value='NOTLISTED'>NOT LISTED</option>";	
				while ($loclist = mysqli_fetch_row($lsql)){
					$country = $loclist['0'];
					echo "<option value='$country'>".strtoupper($country)."</option>";
				}
				echo "<option value='NOTLISTED'>NOT LISTED</option>";
echo "</select><input type='submit' name='searchcountry' value='SET'></form>";	
	
	
	
}else{	


$csearch = "SELECT * FROM users WHERE city='$homecity' AND region!='0'  AND country IS NOT NULL";
$cload = mysqli_query($mysqli,$csearch);

$countryrow = mysqli_fetch_row($cload);
	$_SESSION['myr'] = $countryrow['9'];
	$_SESSION['region'] = $countryrow['9'];
	$_SESSION['country'] = $countryrow['16'];
	
if(is_null($_POST['email'])){
echo "<form action='countryregion.php' method='POST'><input type='email' name='email' placeholder='EMAIL*'><input type='text' name='city' placeholder='CITY*'><br><input type='submit' name='location' value='ENTER'>";	
} else {
echo "<strong>Please Use Real Information<br>Only Numbers or +<br><form action='login.php' method='POST'><input type='text' name='contact' placeholder='PHONE NUMBER'><br><input type='submit' name='info' value='NEXT'></form><br>SELL your Number in Settings</strong>";

$_SESSION['email'] = $_POST['email'];

}	
	

}}}






if($_SESSION['country'] == "NOTLISTED"){

	
if(is_null($_SESSION['email'])){
echo "<form action='countryregion.php' method='POST'><input type='email' name='email' placeholder='EMAIL*'><input type='text' name='city' placeholder='CITY*'><br><input type='submit' name='location' value='ENTER'>";	
} else {
echo "<strong>Please Use Real Information.<br>Only Numbers or +<br><form action='login.php' method='POST'><input type='text' name='contact' placeholder='PHONE NUMBER'><br><input type='text' name='country' placeholder='COUNTRY'><br><input type='submit' name='info' value='NEXT'></form><br>SELL your Number in Settings</strong>";
$print = TRUE;
}		
	
}

elseif($_SESSION['country'] !== Null){
	
	
if($print != TRUE){
echo "<strong>Please Use Real Information<br>Only Numbers or +<br><form action='login.php' method='POST'><input type='text' name='contact' placeholder='PHONE NUMBER'><br><input type='submit' name='info' value='NEXT'></form><br>SELL your Number in Settings</strong>";
}}

}
?>
</section>
</body>
</html>