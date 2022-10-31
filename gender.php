<?php
require 'db.php';
session_start();
if(isset($_GET['m'])){
$_SESSION['mf'] = "M";
}
if(isset($_GET['f'])){
$_SESSION['mf'] = "F";
}
$_SESSION['country']=NULL;
?>
<!DOCTYPE html>
<html>
<head>
<title>QMR</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style type="text/css">
body{background-color:black;text-align:center;font-family:'Roboto Mono',monospace;font-size:25px;}
@import url('https://fonts.googleapis.com/css?family=Roboto+Mono:500');
#link{font-family:'Roboto Mono',monospace;font-size:25px;padding:20px;text-decoration:none;display:block;}
#link:link,a:visited{background-color:yellow;color:black;}
#link:hover{background-color:#eb1e66;}
#link:active{background-color:#000000;}
a {width:280px;text-align:center;margin:auto;}
</style>

<body>
<strong>

<?php
if(is_null($_SESSION['mf'])){
echo '<a href="gender.php?f" id="link">I AM FEMALE</a><br><br><a href="gender.php?m" id="link">I AM MALE</a>';	
}else{
echo '<p><span style="color:yellow">MUST BE 18 YEARS OLD</span></p><a href="orientation.php?straight" id="link">STRAIGHT</a><img src="img/ro.png" width="50px"><a href="orientation.php?gay" id="link">GAY</a><p><span style="color:yellow">NO NUDITY</span></p>';
}
?>

</strong>
</body>
</html>