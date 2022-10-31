<?php 
require 'db.php';
session_start();
	
	if (isset($_POST['search'])){
		$city = $_POST['city'];
		$_SESSION['city'] = $city;}
	
if(isset($_SESSION['id'])){

	$id = $_SESSION['id'];
		$sessionmf = $_SESSION['mf'];
			$sessionori = $_SESSION['ori'];
			
// SESSION LOCATION			
	if(isset($_GET['c'])){
	$mycity = "SELECT * FROM users WHERE id='$id'";
		$citymove = mysqli_query($mysqli, $mycity);
			$thecity = mysqli_fetch_row($citymove);
				$_SESSION['city'] = $thecity['4'];
			$sessionloc = $_SESSION['city'];
} else {}
} else {
	    header("location: index.php");

}


// REGION

	if (isset($_POST['region'])){
		if($_POST['continent'] == 'NO'){
			$_SESSION['region'] = Null;
		} else {
		$region = $_POST['continent'];
		$_SESSION['region'] = $region;}}
	
	elseif(isset($_SESSION['region'])){
	$region = $_SESSION['region'];		
		} else {
		$_SESSION['region'] = Null;
		}

if(isset($_GET['g'])){
	$_SESSION['region'] = Null;
}

//TRAVEL SEARCH .PHP
if(isset($_GET['ts'])){
	if($_GET['ts']==1){$_SESSION['searchcountry']=$_SESSION['country'];}elseif($_GET['ts']==2){}else{

	$_SESSION['searchcountry']=$_GET['ts'];
	$cy=$_GET['ts'];
	
// POPULARITY
$pop = "UPDATE travel SET sp=sp+1 WHERE country='$cy'";
mysqli_query($mysqli,$pop);	
	
}}

		
?>
<!DOCTYPE html>
<html>
<head>
<title>CallText.<?php if(isset($_SESSION['searchcountry'])){echo $_SESSION['searchcountry'];}else{echo $_SESSION['country'];}?></title>
<script type="text/javascript">
if (screen.width<700){
	window.location="mcforum.php";
}
</script>
<link rel="icon" href="img/ro.png">
<style>
@import url('https://fonts.googleapis.com/css?family=Roboto+Mono:500');

body{font-family:'Roboto Mono',monospace;color:white;background-image:url("img/forum10.jpg");}

#container{text-align:center;}

#cell{width:275px;font-size:20px;text-transform:uppercase;color:white;text-decoration:none;}

a:link{text-decoration:none;}
a:visited{text-decoration:none;}
a:hover{text-decoration:none;}
a:active{text-decoration:none;}
	
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
	table{text-align:center;}

#b{display:block;border:3px solid black;color:black;font-size:25px;text-decoration:none;}
#a{display:block;border:1px solid #608bd1;color:#efdcee;font-size:35px;text-decoration:none;}


header{background-image:url("img/rainbow2.gif");font-family:'Roboto Mono',monospace;color:white;background-color:black;font-size:30px;}
	
#forum{width:100%;margin:0;}	

#container{text-align:center;}

article{color:white;}

#btc{border:3px solid white;}
#ad{margin:0 auto;}
footer{position: fixed;left: 0;width: 100%;bottom: 0; background-color:black;}

</style>
</head>
<body><div id="container">


<header>

<table id='forum'><tr>

<td>

<?php
// LGBT SETTING
if($_SESSION['ori'] == 'gay'){
	
echo "</td><td>";	

if(isset($_GET['qmr']) || isset($_GET['return'])){}
else{
	if($_SESSION['orisearch'] == Null){
	$_SESSION['orisearch'] = 1;
}else if ($_SESSION['orisearch'] == 1){
}else{
	$_SESSION['orisearch'] = 2;
}}	


if(isset($_GET['lgbt'])){
if($_GET['lgbt'] == 0){
	$_SESSION['orisearch'] = 2;
}else{
	$_SESSION['orisearch'] = 1;
}}

if($_SESSION['orisearch'] == 1){
		echo "<a href='cforum.php?lgbt=0'><img src='img/lgbt.png' width='40px'></a>";
}else if($_SESSION['orisearch'] == 2){
		echo "<a href='cforum.php?lgbt=1'><img src='img/lgbtunclicked.png' width='40px'></a>";	
}
}

?>

</td>

<td>
<a href='https://ftx.com' target='blank'><span style='color:black; font-size:24px;'>Buy SOL; </span></a>
<span style='color:black; font-size:24px;'><strong>DONATE Solana to CallText.me : </span>
<br><input type="text" value="Gq9Gv34h6Y8noDiKpPk1HcT5gCJJD8Z6xNj1aSChtpv2" id="myInput" size="43">
<button onclick="copyAddress()">Copy</button>
    <script>
        function copyAddress() {
        var copyText = document.getElementById("myInput");
        copyText.select();
        copyText.setSelectionRange(0, 99999); /* For mobile devices */
        document.execCommand("copy");
      }
	  </script>
</td>


<td>
<a id='b' href='travel_search.php'><strong>COUNTRIES</strong></a>

</td><td>

<a id='b' href='profile.php'><strong>PROFILE</strong></a>
</td>

<td>

<?php
// CITIES FORUM
/*	if(isset($_SESSION['searchcountry'])){$country = $_SESSION['searchcountry'];}else{
$country = $_SESSION['country'];}
$l = "SELECT DISTINCT city FROM users WHERE country='$country' ORDER BY city ASC";

$lsql = mysqli_query($mysqli, $l);
	echo "<form id='region' action='forum.php' method='POST'><select name='city'>";
					echo "<option value=''>CITY</option>";
				while ($loclist = mysqli_fetch_row($lsql)){
					$location = $loclist['0'];
					echo "<option value='$location'>".$location."</option>";
				}
echo "</select><input type='submit' name='searchcity' value='SEARCH'></form>";

*/
?>

<?php // if (isset($id)){ echo "<a id='b' href='logout.php'><strong>LOGOUT</strong></a>"; } else { echo "<a id='b' href='index.php'><strong>LOGIN/REGISTER</strong></a>"; } ?>

</td></tr>
</table>

</header>


<?php 

if($_SESSION['id'] == Null){
	mysqli_close($mysqli);
			setcookie('login',Null,time()+1);
session_unset();
session_destroy(); 
}

if($_SESSION['country'] == Null){
	mysqli_close($mysqli);
}


if($_SESSION['orisearch'] == 1){
	
if(isset($_SESSION['m']) || isset($_SESSION['f'])){
if($_SESSION['m'] == Null){
$mfsql = 'F';}
if($_SESSION['f'] == Null){
$mfsql = 'M';	}
		$country = $_SESSION['searchcountry'];
		$others = "SELECT DISTINCT(city) FROM users WHERE orientation = 'gay' AND sex='$mfsql' AND country = '$country' ORDER BY city ASC";
}else{						
		$country = $_SESSION['searchcountry'];
		$others = "SELECT DISTINCT(city) FROM users WHERE orientation = 'gay' AND country = '$country' ORDER BY city ASC";
}
}else{				
// EVERYONE
		$country = $_SESSION['searchcountry'];
		$others = "SELECT DISTINCT(city) FROM users WHERE country = '$country' ORDER BY city ASC";
}

			if ($crowd = mysqli_query($mysqli, $others)){
$total  = $crowd->num_rows;
		echo "<table id='forum'><tr>";
			$rowmax = 4;
			$rowcount = 0;
								$count = 0;
								
		while($contents = mysqli_fetch_row($crowd)){
				if ($rowcount == $rowmax){echo "</tr><tr>";$rowcount=0;}
						if ($count == $total){ 
						echo "</tr></table>";
						break;}
							 
echo "<td><a href='forum.php?city=".$contents['0']."'>";
echo "<div id='cell'>".$contents['0']."</div></td>";
		$count++;
		$rowcount++;
	}
				mysqli_close($mysqli);} 

?>

<br>



</div>


</body>
</html>