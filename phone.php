<?php 
require 'db.php';
session_start();

		
?>
<!DOCTYPE html>
<html>
<head>
<title>CallText.me</title>
<link rel="icon" href="img/ro.png">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
@import url('https://fonts.googleapis.com/css?family=Roboto+Mono:500');
body{font-family:'Roboto Mono',monospace;color:white;background-color: black;background-position: center;}
	header{width:300px;text-align:center;
	font-family:'Roboto Mono',monospace;color:white;
	margin:auto;}
div{text-align:center;font-size:26px;margin:auto;}
#container{text-align:center;}
#center{text-align:center;}
#cell{width:50%;font-size:65%;text-transform:uppercase;}
hr{border:0;height:0;size:1px;color:#799971}
nav{text-align:center;font-family:'Roboto Mono',monospace;font-size:20px;}
	a{text-decoration:none;color:white;}
	
footer{width:300px;text-align:center;
	font-family:'Roboto Mono',monospace;color:white;
	margin:auto;}

	
input[type=text],select,button
	{padding: 3px 3px;
	margin: 5px;
	border-radius:10px;
	font-family:'Roboto Mono',monospace;
	font-size:20px;
	background-color:#c5cbd6;
	color:black;}

input[type=submit]{
	background-color:#c5cbd6;
	font-family:'Roboto Mono',monospace;
	color:black;
	border:0;
	margin-bottom:20px;
	margin-top:5px;
	font-size:15px;
	padding:9px 18px;}

input[type=submit]:hover{
	background-color:#c5cbd6;
}
	form{border:none;}
	table,td{text-align:center;}
	p{text-transform:uppercase;color:white;}
	
#link{font-family:'Roboto Mono',monospace;font-size:25px;padding:20px;text-decoration:none;display:block;}
#link:link,a:visited{background-color:#191919;color:#515151;border:1px solid #282828;}
table{padding:0;margin:0;}
table#forum{padding:0;margin:0;}
td{padding:0;margin:0;}

#btc{border:3px solid white;}

</style>
</head>
<body>
<div id="container">

<?php 
		
		
$phones = "SELECT * FROM AXphones ORDER BY RAND() LIMIT 20";
if ($crowd = mysqli_query($mysqli, $phones)){
echo "<table id='forum' width='100%'><tr>";
$one = 0;
		while($contents = mysqli_fetch_row($crowd)){
			if ( $one == 1 ) { echo "</tr><tr>"; $one = 0; }else {
						
echo "<td width='100%'><a href='".$contents['3']."' target='_blank'>";						
echo "<div id='cell'><img src='".$contents['2']."'><br><p><small>".$contents['1']."</small></p></div></a></td>";
$one = 1;
}}}
echo "</tr></table>";
echo "<br><a id='link' href='phone.php'><p>NEXT</p></a><br><br>";
?>
</div>


<table>
<tr><td>
<a id="link" href="mprofile.php"><span style='text-transform:uppercase'>profile</span></a>
</td></tr>
<tr><td>
<?php
//DONATE
echo "<br><br><span style='color:#ff69b4'><strong>DONATE HERE</strong></span><br><img width='250px' src='img/BC.png'><br><span style='color:#ff69b4;font-size: 10pt'>Address:<br>14f9DyK2CokMPdwnhFS9ttnU73UaGrQaz8</span>";?>
</td></tr>
</table>

</div>
</body>
</html>