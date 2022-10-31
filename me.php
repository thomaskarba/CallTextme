<?php
require 'db.php';

if(isset($_POST['upload'])){
	
$id = $_GET['qmr'];
	
// IMAGE VARIABLES
$name = $_FILES['image']['name'];
	$type = $_FILES['image']['type'];
		$size = $_FILES['image']['size'];
			$temp = $_FILES['image']['tmp_name'];
				$error = $_FILES['image']['error'];
		$imgvar = explode('.',$name);
		$imgext = end($imgvar);
	$profile = $id.'.'.$imgext;
	
$change = "UPDATE start SET image='$profile' WHERE id='$id'";
mysqli_query($mysqli, $change);

	ini_set('memory_limit', '50M');	

		$post_photo = $_FILES['image']['name'];
				$post_photo_tmp = $_FILES['image']['tmp_name'];
					$ext = pathinfo($post_photo, PATHINFO_EXTENSION);
				if ($ext == 'png' || $ext == 'PNG' || $ext == 'jpg' || $ext == 'JPG' || $ext == 'jpeg' || $ext == 'JPEG' || $ext == 'gif' || $ext == 'GIF'){
					if ($ext == 'jpg' || $ext == 'JPG' || $ext == 'jpeg' || $ext == 'JPEG'){
						$src = imagecreatefromjpeg($post_photo_tmp);}
					if ($ext == 'png' || $ext == 'PNG'){
						$src = imagecreatefrompng($post_photo_tmp);}
					if ($ext == 'gif' || $ext == 'GIF'){
						$src = imagecreatefromgif($post_photo_tmp);}
				list($w,$h)=getimagesize($post_photo_tmp);
				$neww = 300;
				$newh = ($h/$w)*$neww;
				$newtemp = imagecreatetruecolor($neww,$newh);
				imagecopyresampled($newtemp,$src,0,0,0,0,$neww,$newh,$w,$h);
				imagejpeg($newtemp,"startimg/$profile",80);
				imagedestroy($src);
				imagedestroy($newtemp);
}}
?>
<!DOCTYPE html>
<html>
<head>
<title>QMR</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style type="text/css">
a{text-decoration:none;}
</style>

<body>
<?php 
if(isset($_GET['qmr'])){
	
	$id = $_GET['qmr'];
	
	$m = "SELECT * FROM start WHERE id='$id'";
	
	$mloading = mysqli_query($mysqli,$m);

	while($me = mysqli_fetch_row($mloading)){
		
		$info = $me['2'];
		$date = strtotime($me['5']);
		$image = $me['6'];
		$today = date("m/d",$date);
		
	echo "<span style='font-size:45px;color:blue'>".$info."</span><br><span style='font-size:24px'>".$today."</span>";
	
if($image == Null){

	echo "<form action='me.php?qmr=".$id."' method='POST' enctype='multipart/form-data'><input type='file' name='image'><input type='submit' name='upload' value='IMAGE'></form>";

} else {

echo "<img width='100%' src='startimg/".$image."'>";
	
	}
	
	
$back = "<table width='100%' height='100%'><tr><td><img src='img/lt.png'></td><td><img src='img/lt.png'></td><td><img src='img/lt.png'></td><td><img src='img/lt.png'></td><td><img src='img/lt.png'></td></tr></table>";
$delete = "<table width='100%' height='100%'><tr><td><img src='img/x.png'></td><td><img src='img/x.png'></td><td><img src='img/x.png'></td><td><img src='img/x.png'></td><td><img src='img/x.png'></td></tr></table>";	

echo "<table width='100%' height='100%'><tr><td><a href='start.php'><div>";

$count = 0;	
echo "<table width='100%' height='100%'>";
while($count != 5){
	echo "<tr><td>";
	echo $back;
	echo "</td></tr>";
$count++;
}
echo "</table></div></a></td><td><a href='start.php?delete=".$id."'><div>";	
$count = 0;	
echo "<table width='100%' height='100%'>";
while($count != 5){
	echo "<tr><td>";
		echo $delete;
	echo "</td></tr>";
$count++;
}
echo "</table></div></a>";	
}}
?>

</body>
</html>