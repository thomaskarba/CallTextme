<?php
require 'db.php';
session_start();
if( isset($_GET['email']) && !empty($_GET['email']) )
{
    $email = $mysqli->escape_string($_GET['email']); 
    $hash = $mysqli->escape_string($_GET['hash']); 

    $result = $mysqli->query("SELECT * FROM users WHERE email='$email' AND hash='$hash'");

    if ( $result->num_rows == 0 )
    {	$_SESSION['message'] = "Error!";
		header("location: error.php");}
} else {
    $_SESSION['message'] = "Sorry, verification failed, try again!";
    header("location: error.php");  
}
?>
<!DOCTYPE html>
<html >
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>QMR</title>
<style>
div{text-align:center;}
div{text-align:center;}
body{font-family:'Roboto Mono',monospace;color:black;background-color:yellow;}
@import url('https://fonts.googleapis.com/css?family=Roboto+Mono:500');
	header{width:300px;text-align:center;
	font-family:'Roboto Mono',monospace;color:white;
	margin:auto;}
div{text-align:center;font-size:26px;}
#container{text-align:center;}
#cell{width:275px;font-size:15px;text-transform:uppercase;}
hr{border:0;height:0;size:1px;color:#799971}
nav{text-align:center;font-family:'Roboto Mono',monospace;font-size:20px;}
	a{text-decoration:none;color:black;}
	
input[type=password],select
	{padding: 3px 3px;
	margin: 5px;
	border-radius:10px;
	font-family: 'Dosis', sans-serif;
	font-size:20px;
	background-color:#f0ec8d;
	color:black;}

button{
	background-color:#f0ec8d;
	color:black;
	border:0;
	margin-bottom:20px;
	margin-top:5px;
	font-size:15px;
	padding:9px 18px;}

button:hover{
	background-color:black;
}
	form{border:none;}


</style>
</head>

<body><div>
          <h1>NEW PIN</h1>
          
          <form action="reset_pin.php" method="post">
 
			<label>
              4 DIGITS
            </label>
            <input type="password" name="pin" autocomplete="off"/>
          
          <input type="hidden" name="email" value="<?= $email ?>">    
          <input type="hidden" name="hash" value="<?= $hash ?>">    
              
          <button/>SET</button>
          
          </form>
</div>
</body>
</html>
