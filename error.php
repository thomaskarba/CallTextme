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
body{color:black;}
#link{font-size:25px;padding:20px;text-decoration:none;display:block;}
#link:link,a:visited{background-color:yellow;color:black;}
#link:hover{background-color:#eb1e66;}
#link:active{background-color:#000000;}
a{text-decoration:none;font-family:'Roboto Mono',monospace;font-size:18px;}
</style>
</head>
<body><div>
<h1><?php if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ): 
	echo $_SESSION['message'];    
    else:
        header( "location: index.php" );
    endif;
    ?>
    </h1>     
    <a href="index.php" id="link"><strong>Back<strong></a>
</div>
</body>
</html>
