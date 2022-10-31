<?php 
require 'db.php';
session_start();
if ( $_SERVER['REQUEST_METHOD'] == 'POST' ){   
    $email = $mysqli->escape_string($_POST['email']);
    $result = $mysqli->query("SELECT * FROM users WHERE email='$email'");
if ( $result->num_rows == 0 ){ 
	$_SESSION['message'] = "That email address is not registered.";
		header("location: error.php");
	} elseif (result['8'] == Null) {header(location: index.php);} else {
		$user = $result->fetch_assoc();
		$email = $user['email'];
        $hash = $user['hash'];
        
		$_SESSION['message'] = "<p>Please check your email, $email for a confirmation link.</p>";

		$to = $email;
		$subject = 'Password Reset Link (QuoteMyRelationship.com)';
		$message = '
		QuoteMyRelationship.com PIN reset: http://quotemyrelationship.com/reset.php?email='.$email.'&hash='.$hash;  

		mail($to,$subject,$message);

		header("location: success.php");}}
?>
<!DOCTYPE html>
<html>
<head>
  <title>QMR</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
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
	
input[type=email],select
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
<body>
<div>
<h1>Reset Your PIN</h1>
<form action="forgot.php" method="post">
<label>
Email Address
</label>
<input type="email" name="email"/>
<button>Reset</button>
</form>

<a href="index.php">BACK</a>
</div>
</body>

</html>
