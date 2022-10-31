<?php 

		
//		$updatedid = $_GET['qmr'];	

	$id = $_SESSION['id'];
		$sessionmf = $_SESSION['mf'];
			$sessionori = $_SESSION['ori'];
				$sessionloc = $_SESSION['city'];
				
if($_SESSION['orisearch'] == 1){				
				
if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if(is_null($_SESSION['m']) == FALSE){
$mfsql = 'M';}
if(is_null($_SESSION['f']) == FALSE){
$mfsql = 'F';	}

$others = "SELECT * FROM users WHERE orientation='gay' AND city = '$sessionloc' AND sex='$mfsql' AND id <= '$updatedid' ORDER BY id DESC LIMIT 9";
}
	
else{	

$others = "SELECT * FROM users WHERE orientation='gay' AND city = '$sessionloc' AND id <= '$updatedid' ORDER BY id DESC LIMIT 9";

}

}else{

if(isset($_SESSION['m']) || isset($_SESSION['f'])){

if(is_null($_SESSION['m']) == FALSE){
$mfsql = 'M';}
if(is_null($_SESSION['f']) == FALSE){
$mfsql = 'F';	}

$others = "SELECT * FROM users WHERE city = '$sessionloc' AND sex='$mfsql' AND id <= '$updatedid' ORDER BY id DESC LIMIT 9";}
	
else{	

$others = "SELECT * FROM users WHERE city = '$sessionloc' AND id <= '$updatedid' ORDER BY id DESC LIMIT 9";

}

}	
				

			if ($crowd = mysqli_query($mysqli, $others)){

		echo "<table><tr>";
			$rowmax = 4;
			$rowcount = 0;
								$count = 0;
								$total = 8;
								


		while($contents = mysqli_fetch_row($crowd)){
				if ($rowcount == $rowmax){echo "</tr><tr>";$rowcount=0;}
						if ($count == $total){ 
						echo "</tr></table>";
						echo "<br><a id='b' href='forum.php?qmr=".$contents['0']."'>NEXT</a><br><br>";
						break;}
					
	if($contents['5'] == 'prof051487.jpg'){
/*		
if($count > 3){			
echo "<td><a href='forum.php?plain=".$contents['0']."&s=".$updatedid."#a'>";
}else{
	echo "<td><a href='forum.php?plain=".$contents['0']."&s=".$updatedid."'>";
}*/

echo "<td>";

if($contents['12'] == 'M'){ 
if(isset($_SESSION['searchcountry'])){$country = $_SESSION['searchcountry'];}
// FREE QR CREATOR
if(isset($country) && isset($_SESSION['country'])){
	$mycountry = $_SESSION['country'];
	include 'international.php';
	if(is_numeric($contents['3'])){
	
if($localintl == '1'){
	$print = False;
						}else{	
if($countrycode == substr($contents['3'],0,strlen($countrycode))){
echo "<a href='http://freeqrcreator.us-west-1.elasticbeanstalk.com/forum?number=%2B".str_replace(' ', '',$contents['3'])."&return=".$contents['0']."&page=forum&s=".$contents['0']."'>";
echo "<img id='pic' src='img/mqr.png'></a>";
}	
elseif(substr($contents['3'],0,1) == $trunk){
echo "<a href='http://freeqrcreator.us-west-1.elasticbeanstalk.com/forum?number=%2B".$countrycode.str_replace(' ', '',substr($contents['3'],1))."&return=".$contents['0']."&page=forum&s=".$contents['0']."'>";
echo "<img id='pic' src='img/mqr.png'></a>";	
}else if (substr($contents['3'],0,1) == '+'){
echo "<a href='http://freeqrcreator.us-west-1.elasticbeanstalk.com/forum?number=%2B".str_replace(' ', '',substr($contents['3'],1))."&return=".$contents['0']."&page=forum&s=".$contents['0']."'>";
echo "<img id='pic' src='img/mqr.png'></a>";	
}else{
echo "<a href='http://freeqrcreator.us-west-1.elasticbeanstalk.com/forum?number=%2B".$countrycode.str_replace(' ', '',$contents['3'])."&return=".$contents['0']."&page=forum&s=".$contents['0']."'>";
echo "<img id='pic' src='img/mqr.png'></a>";		
}
	}}else{ // NOT NUMERIC
		
echo "<img id='pic' src='img/m.png'>";		
		
	}}

}
if($contents['12'] == 'F'){
if(isset($_SESSION['searchcountry'])){$country = $_SESSION['searchcountry'];}
// FREE QR CREATOR
if(isset($country) && isset($_SESSION['country'])){
	$mycountry = $_SESSION['country'];
	include 'international.php';
	if(is_numeric($contents['3'])){
	
if($localintl == '1'){
	$print = False;
						}else{	
if($countrycode == substr($contents['3'],0,strlen($countrycode))){
echo "<a href='http://freeqrcreator.us-west-1.elasticbeanstalk.com/forum?number=%2B".str_replace(' ', '',$contents['3'])."&return=".$contents['0']."&page=forum&s=".$contents['0']."'>";
echo "<img id='pic' src='img/fqr.png'></a>";
}	
elseif(substr($contents['3'],0,1) == $trunk){
echo "<a href='http://freeqrcreator.us-west-1.elasticbeanstalk.com/forum?number=%2B".$countrycode.str_replace(' ', '',substr($contents['3'],1))."&return=".$contents['0']."&page=forum&s=".$contents['0']."'>";
echo "<img id='pic' src='img/fqr.png'></a>";	
}else if (substr($contents['3'],0,1) == '+'){
echo "<a href='http://freeqrcreator.us-west-1.elasticbeanstalk.com/forum?number=%2B".str_replace(' ', '',substr($contents['3'],1))."&return=".$contents['0']."&page=forum&s=".$contents['0']."'>";
echo "<img id='pic' src='img/fqr.png'></a>";	
}else{
echo "<a href='http://freeqrcreator.us-west-1.elasticbeanstalk.com/forum?number=%2B".$countrycode.str_replace(' ', '',$contents['3'])."&return=".$contents['0']."&page=forum&s=".$contents['0']."'>";
echo "<img id='pic' src='img/fqr.png'></a>";		
}
	}}else{ // NOT NUMERIC
		
echo "<img id='pic' src='img/f.png'>";		
		
	}}
	
}
if($contents['7'] != 'choice'){
	
if($contents['16'] != $_SESSION['country'] && $contents['19'] == '1'){
echo "<div id='cell'>NOT AVAILABLE</div></td>";	
}else{	
	
if(isset($_SESSION['searchcountry'])){$country = $_SESSION['searchcountry'];}		
$country = $contents['16'];		
if(isset($country) && isset($_SESSION['country'])){
	$mycountry = $_SESSION['country'];
	include 'international.php';
	if(is_numeric($contents['3'])){
	if(strtoupper($_SESSION['country']) == strtoupper($country)){
		
echo "<div id='cell'><span style='font-size:20px'><strong>".$contents['3']."</strong></span></strong></div></td>";		
		
	}else{

if($localintl == '1'){
echo "<div id='cell'><span style='font-size:20px'><strong>NOT AVAILABLE</strong></span></strong></div></td>";			
	}else{		
		
if($countrycode == substr($contents['3'],0,strlen($countrycode))){
	echo "<div id='cell'><span style='font-size:20px'><strong>".$exitcode."/+ ".$contents['3']."</strong></span></strong></div></td>";		
}	
elseif(substr($contents['3'],0,1) == $trunk){
	echo "<div id='cell'><span style='font-size:20px'><strong>".$exitcode."/+ ".$countrycode." ".substr($contents['3'],1)."</strong></span></strong></div></td>";	
}elseif (substr($contents['3'],0,1) == '+'){
	echo "<div id='cell'><span style='font-size:20px'><strong>".$contents['3']."</strong></span></strong></div></td>";	
}else{
	echo "<div id='cell'><span style='font-size:20px'><strong>".$exitcode."/+ ".$countrycode." ".$trunkprefix." ".$contents['3']."</strong></span></strong></div></td>";	
}
	}}}else{
	echo "<div id='cell'><span style='font-size:20px'><strong>".$contents['3']."</strong></span></strong></div></td>";	
}}else{
			
	echo "<div id='cell'><span style='font-size:20px'><strong>".$contents['3']."</strong></span></strong></div></td>";


}
}}
	} else {
if($contents['7'] == 'choice'){
	
	$country = 	$contents['16'];
	
if(strpos($_SERVER['HTTP_REFERER'],"elasticbeanstalk")==True){
// FREE QR CREATOR
if(isset($country) && isset($_SESSION['country'])){
	$mycountry = $_SESSION['country'];
	include 'international.php';
	if(is_numeric($contact)){
	
if($countrycode == substr($contact,0,strlen($countrycode))){//freeqrcreator
echo "<a href='http://freeqrcreator.us-west-1.elasticbeanstalk.com/calltextme?number=%2B".str_replace(' ', '',$contact)."&return=".$contents['0']."&page=forum&s=".$contents['0']."'>";
echo "<img src='profileimg/".$contents['5']."' width='100%'></a>";
}elseif(substr($contact,0,2) == $trunk && strtoupper($country) == "HUNGARY"){
echo "<a href='http://freeqrcreator.us-west-1.elasticbeanstalk.com/calltextme?number=%2B".$countrycode.str_replace(' ', '',substr($contact,2))."&return=".$contents['0']."&page=forum&s=".$contents['0']."'>";
echo "<img src='profileimg/".$contents['5']."' width='100%'></a>";	
}elseif(substr($contact,0,1) == $trunk){
echo "<a href='http://freeqrcreator.us-west-1.elasticbeanstalk.com/calltextme?number=%2B".$countrycode.str_replace(' ', '',substr($contact,1))."&return=".$contents['0']."&page=forum&s=".$contents['0']."'>";
echo "<img src='profileimg/".$contents['5']."' width='100%'></a>";
}else if (substr($contact,0,1) == '+'){
echo "<a href='http://freeqrcreator.us-west-1.elasticbeanstalk.com/calltextme?number=%2B".str_replace(' ', '',substr($contact,1))."&return=".$contents['0']."&page=forum&s=".$contents['0']."'>";
echo "<img src='profileimg/".$contents['5']."' width='100%'></a>";	
}else{
echo "<a href='http://freeqrcreator.us-west-1.elasticbeanstalk.com/calltextme?number=%2B".$countrycode.str_replace(' ', '',$contact)."&return=".$contents['0']."&page=forum&s=".$contents['0']."'>";
echo "<img src='profileimg/".$contents['5']."' width='100%'></a>";		
}
	}}		
if(isset($country) && isset($_SESSION['country'])){
	$mycountry = $_SESSION['country'];
	include 'international.php';
	if(is_numeric($contact)){
	if(strtoupper($_SESSION['country']) == strtoupper($country)){}else{

if($countrycode == substr($contact,0,strlen($countrycode))){
	echo "<article><span style='font-size:20px'><strong>Int'l: ".$exitcode."/+ ".$contact."</strong></span></article></strong><br>";		
}elseif(substr($contact,0,2) == $trunk && strtoupper($country) == "HUNGARY"){
	echo "<article><span style='font-size:20px'><strong>Int'l: ".$exitcode."/+ ".$countrycode." ".substr($contact,2)."</strong></span></article></strong><br>";	
}elseif(substr($contact,0,1) == $trunk){
	echo "<article><span style='font-size:20px'><strong>Int'l: ".$exitcode."/+ ".$countrycode." ".substr($contact,1)."</strong></span></article></strong><br>";	
}else if (substr($contact,0,1) == '+'){
	echo "<article><span style='font-size:20px'><strong>Int'l: ".$contact."</strong></span></article></strong><br>";	
}else{
	echo "<article><span style='font-size:20px'><strong>Int'l: ".$exitcode."/+ ".$countrycode." ".$contact."</strong></span></article></strong><br>";	
}
	}}}
if(strtoupper($_SESSION['country']) == strtoupper($country)){
	if (substr($contact,0,1) == '+'){
		$start = 1 + strlen($countrycode);
echo "<article><span style='font-size:20px'><strong>".substr($contact,$start)."</strong></span></article></strong><br>";		
	}else{
echo "<article><span style='font-size:20px'><strong>".$contact."</strong></span></article></strong><br>";	
	}}else{		
		
	if(is_numeric($contact) == False){
echo "<article><span style='font-size:20px'><strong>@: ".$contact."</strong></span></article></strong><br>";		
	}else{
if($countrycode == substr($contact,0,strlen($countrycode))){
echo "<article><span style='font-size:20px'><strong>Local: ".substr($contact,strlen($countrycode))."</strong></span></article></strong><br>";	
}elseif(substr($contact,0,1) == '+'){
$start = 1 + strlen($countrycode);
echo "<article><span style='font-size:20px'><strong>Local: ".substr($contact,$start)."</strong></span></article></strong><br>";
	}else{		
echo "<article><span style='font-size:20px'><strong>Local: ".$contact."</strong></span></article></strong><br>";		
	}}}	
}else{	
	
echo "<td>";
$solme = $_SESSION['SOL'];
if($solme == '0'){
	echo "<span style='color:red'>Add SOL address in Settings<br>to buy this contact</span><br>";
}else{
	echo "<span style='color:red'>CallText: ".$contents['14']." SOL</span><br>";
echo "<a href='http://ctmtransaction.eba-s8yjwpbp.us-west-1.elasticbeanstalk.com/download?from_addr=".$solme."&amount=".$contents['14']."&to_addr=".$contents['8']."&return=".$contents['0']."&s=".$contents['0']."'>";
}
echo "<img id='pic' src='profileimg/".$contents['5']."' width='100%'></a>";	
}}		
else{		
echo "<td>";
if(isset($_SESSION['searchcountry'])){$country = $_SESSION['searchcountry'];}else{$country = $contents['16'];}
if(isset($country) && isset($_SESSION['country'])){
	$mycountry = $_SESSION['country'];
	include 'international.php';

if($countrycode == substr($contents['3'],0,strlen($countrycode))){
echo "<a href='http://freeqrcreator.us-west-1.elasticbeanstalk.com/forum?number=%2B".str_replace(' ', '',$contents['3'])."&return=".$contents['0']."&page=forum&s=".$contents['0']."'>";
}	
elseif(substr($contents['3'],0,1) == $trunk){
echo "<a href='http://freeqrcreator.us-west-1.elasticbeanstalk.com/forum?number=%2B".$countrycode.str_replace(' ', '',substr($contents['3'],1))."&return=".$contents['0']."&page=forum&s=".$contents['0']."'>";
}else if (substr($contents['3'],0,1) == '+'){
echo "<a href='http://freeqrcreator.us-west-1.elasticbeanstalk.com/forum?number=%2B".str_replace(' ', '',substr($contents['3'],1))."&return=".$contents['0']."&page=forum&s=".$contents['0']."'>";
}else{
echo "<a href='http://freeqrcreator.us-west-1.elasticbeanstalk.com/forum?number=%2B".$countrycode.str_replace(' ', '',$contents['3'])."&return=".$contents['0']."&page=forum&s=".$contents['0']."'>";
}}
echo "<img id='pic' src='profileimg/".$contents['5']."' width='100%'></a>";
//echo "<td><a href='viewe_profile.php?uid=".$contents['0']."&s=".$updatedid."'><img id='pic' src='profileimg/".$contents['5']."'></a>";
	}
if($contents['7'] != 'choice'){
	
if($contents['16'] != $_SESSION['country'] && $contents['19'] == '1'){
echo "<div id='cell'>NOT AVAILABLE</div></td>";	
}else{	
	
if(isset($_SESSION['searchcountry'])){$country = $_SESSION['searchcountry'];}		
$country = $contents['16'];		
if(isset($country) && isset($_SESSION['country'])){
	$mycountry = $_SESSION['country'];
	include 'international.php';
	if(is_numeric($contents['3'])){
	if(strtoupper($_SESSION['country']) == strtoupper($country)){
		
echo "<div id='cell'><span style='font-size:20px'><strong>".$contents['3']."</strong></span></strong></div></td>";		
		
	}else{

if($localintl == '1'){
echo "<div id='cell'><span style='font-size:20px'><strong>NOT AVAILABLE</strong></span></strong></div></td>";			
	}else{		
		
if($countrycode == substr($contents['3'],0,strlen($countrycode))){
	echo "<div id='cell'><span style='font-size:20px'><strong>".$exitcode."/+ ".$contents['3']."</strong></span></strong></div></td>";		
}	
elseif(substr($contents['3'],0,1) == $trunk){
	echo "<div id='cell'><span style='font-size:20px'><strong>".$exitcode."/+ ".$countrycode." ".substr($contents['3'],1)."</strong></span></strong></div></td>";	
}elseif (substr($contents['3'],0,1) == '+'){
	echo "<div id='cell'><span style='font-size:20px'><strong>".$contents['3']."</strong></span></strong></div></td>";	
}else{
	echo "<div id='cell'><span style='font-size:20px'><strong>".$exitcode."/+ ".$countrycode." ".$trunkprefix." ".$contents['3']."</strong></span></strong></div></td>";	
}
	}}}else{
	echo "<div id='cell'><span style='font-size:20px'><strong>".$contents['3']."</strong></span></strong></div></td>";	
}}else{
			
	echo "<div id='cell'><span style='font-size:20px'><strong>".$contents['3']."</strong></span></strong></div></td>";


}	
}	}
}
		$count++;
		$rowcount++;
	}
} 

				
		

?>