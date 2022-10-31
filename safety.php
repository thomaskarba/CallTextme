<?php
require 'db.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>QMR</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style type="text/css">
@import url('https://fonts.googleapis.com/css?family=Roboto+Mono:500');
p{font-size:18px;}
#link{font-size:25px;padding:20px;text-decoration:none;display:block;}
#link:link,a:visited{background-color:yellow;color:black;}
#link:hover{background-color:#eb1e66;}
#link:active{background-color:#000000;}
a{text-decoration:none;}
footer{font-family:'Roboto Mono',monospace;}
p{text-transform:uppercase;font-family:'Roboto Mono',monospace;}
#container{margin:auto;text-align:center;width:300px;}
mark{background-color:yellow;}
div{text-align:left;}
</style>
<body>
<div id="container">
<h1>SAFETY</h1>
<strong><p>IF YOU PLAN ON MEETING SOMEONE:<br>
<div>
<ul><li>WRITE A NOTE WHERE</li>
<li>TELL A FRIEND OR FAMILY MEMBER</li>
<li>BE PREPARED</li></p>
</div><br>
<!--<p><mark><em>A Picture is worth a Thousand Words<br><br>Don't judge a Book by its Cover!</em></mark></strong></p>-->

<!--
<p>If you or someone you know or notice is a victim of Sex Trafficking or forced prostitution, enter the username below</p><br>
<?php		
/*	if(isset($_POST['st'])){
		$input = $_POST['username'];
				$nopin = Null;
					$deleteone = "UPDATE users SET pin='$nopin' WHERE username='$input'";
			if (mysqli_query($mysqli,$deleteone)){
	echo "<p> THANK YOU FOR USING QMR.</p>";
	$deleteone = "DELETE FROM central WHERE receiving='$input'";
	$deletetwo = "DELETE FROM messages WHERE myrelationship='$input'";
	$deletethree = "DELETE FROM updater WHERE username='$input'";
		mysqli_query($mysqli,$deletetwo);
		mysqli_query($mysqli,$deletethree);
		mysqli_query($mysqli,$deletefour);
			}}	*/			
?>
<form action="safety.php" method="POST">
<input type="text" name='username' placeholder="username">
<input type='submit' name='st' value='REPORT'></form><br>
-->


<footer>
<?php
if(isset($_GET['settings'])){echo "<a href='settings.php' id='link'>BACK</a>";}else{echo "<a href='index.php' id='link'>BACK</a>";}
?>
</footer></div>
</body>
</html>