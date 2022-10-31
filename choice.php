<?php
session_start();
include_once 'db.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>QMR</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
@import url('https://fonts.googleapis.com/css?family=Roboto+Mono:500');
div{text-align:center;}
body{color:black;background-color:yellow;}
#link{font-size:25px;padding:20px;text-decoration:none;display:block;}
#link:link,a:visited{background-color:yellow;color:black;}
#link:hover{background-color:#eb1e66;}
#link:active{background-color:#000000;}
a{text-decoration:none;font-family:'Roboto Mono',monospace;font-size:18px;}

input[type=submit]{
	background-color:yellow;
	color:black;
	border:0;
	margin-bottom:20px;
	margin-top:5px;
	font-size:75px;
	padding:100px 350px;}

</style>
</head>
<body><div>
<form action="choice.php" method="POST">
<input type="submit" name="add" value="SEND YOUR NUMBER">
</form>
<?php if( isset($_POST['add']){ 
	
	echo "SENT";
	?>
	
	
	
	
<a href="forum.php" id="link"><strong>CENTRAL<strong></a>
</div>
</body>
</html>
