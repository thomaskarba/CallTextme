<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>QMR</title>
  <style>
  div{text-align:center;}
  </style>
</head>
<body>
<div>
<p><?php echo $_SESSION['message'];

	header( "location: index.php" );?>
    </p>
    <a href="index.php"><button/>Home</button></a>
</div>
</body>
</html>
