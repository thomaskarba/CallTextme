<?php
session_start();
include_once 'db.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Calltext.me</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
@import url('https://fonts.googleapis.com/css?family=Roboto+Mono:500');
div{text-align:center;}
body{color:black;}
#link{font-size:25px;padding:20px;text-decoration:none;display:block;
position: fixed;left: 0;width: 100%;bottom: 0;}
#link:link,a:visited{background-color:yellow;color:black;}
#link:hover{background-color:#eb1e66;}
#link:active{background-color:#000000;}
a{text-decoration:none;font-family:'Roboto Mono',monospace;font-size:18px;}
</style>
</head>
<body><div>
<h1>
<?php
$id = $_SESSION['id'];
if (isset($_GET['delete']) && ($id == 1)){
	
	$account = $_GET['delete'];	
	
	$imageload = "SELECT * FROM users WHERE id='$account'";
		$loading = mysqli_query($mysqli,$imageload);
	if (($row = mysqli_fetch_row($loading))){
		$myimage = $row['5'];
		if($myimage != "prof051487.jpg"){
		unlink("profileimg/$myimage"); }}		
		
		setcookie('login',Null,time()+1);	

	$deleteone = "DELETE FROM central WHERE receiving='$account' OR sending='$account'";
	$deletetwo = "DELETE FROM messages WHERE myrelationship='$account'";
	$deletethree = "DELETE FROM updater WHERE id='$account'";
	$deletefour = "DELETE FROM users WHERE id='$account'";
	$deletefive = "DELETE FROM qmr WHERE id='$account'";
	$deletesix = "DELETE FROM phonebook WHERE cid='$account' OR uid='$account'";
		mysqli_query($mysqli,$deleteone);
		mysqli_query($mysqli,$deletetwo);
		mysqli_query($mysqli,$deletethree);
		mysqli_query($mysqli,$deletefour);
		mysqli_query($mysqli,$deletefive);
		mysqli_query($mysqli,$deletesix);
		


		
		
		
	echo "<br><a href='forum_everyone.php'><p>USER DELETED</p></a>";
	}


if (isset($_POST['delete'])){
	
	$account = $_POST['id'];	
	
	$imageload = "SELECT * FROM users WHERE id='$account'";
		$loading = mysqli_query($mysqli,$imageload);
	if (($row = mysqli_fetch_row($loading))){
		$myimage = $row['5'];
		if($myimage != "prof051487.jpg"){
		unlink("profileimg/$myimage"); }}		
		
		setcookie('login',Null,time()+1);	

	$deleteone = "DELETE FROM central WHERE receiving='$account' OR sending='$account'";
	$deletetwo = "DELETE FROM messages WHERE myrelationship='$account'";
	$deletethree = "DELETE FROM updater WHERE id='$account'";
	$deletefour = "DELETE FROM users WHERE id='$account'";
	$deletefive = "DELETE FROM qmr WHERE id='$account'";
	$deletesix = "DELETE FROM phonebook WHERE cid='$account' OR uid='$account'";
		mysqli_query($mysqli,$deleteone);
		mysqli_query($mysqli,$deletetwo);
		mysqli_query($mysqli,$deletethree);
		mysqli_query($mysqli,$deletefour);
		mysqli_query($mysqli,$deletefive);
		mysqli_query($mysqli,$deletesix);
		
		session_destroy();
		


		
		
		
	echo "<br><p>USER DATA DELETED.<br>THANK YOU FOR USING CallText.me!</p>";
	}
	
	echo "<br><img src='img/ro.png' width='100px'>";
?>
</h1>     
<a href="index.php" id="link"><strong>Home<strong></a>
</div>
</body>
</html>
