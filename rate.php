<?php

//GYR CHANGE AND DELETE
if (isset($_GET['rate'])){
				
			if($_GET['rate'] == "green") {				
			$green = $g + 5;
			$rate = "UPDATE users SET g='$green' WHERE id='$who'";
			mysqli_query($mysqli,$rate);
			$v ='g';
			}
				if($_GET['rate'] == "yellow") {
				$yellow = $y + 5;
				
				if($yellow == 30){
					
// EMAIL
	
	$theirinfo = "SELECT * FROM users WHERE id='$who'";
	$noting = mysqli_query($mysqli, $theirinfo);
	$letemknow = mysqli_fetch_row($noting);
		$address = $letemknow['2'];
		$subject = "QMR ~ REMOVED FROM SITE";
		$body = "You have been removed from http://QuoteMyRelationship.com for rating YELLOW. There was a problem with your information or your interaction or lack thereof with other people on QMR. You are welcome to create a new account.";	
mail($address,$subject,$body);					
					
	$deleteone = "DELETE FROM central WHERE receiving='$who' OR sending='$who'";
	$deletetwo = "DELETE FROM messages WHERE myrelationship='$who'";
	$deletethree = "DELETE FROM updater WHERE id='$who'";
	$deletefour = "DELETE FROM users WHERE id='$who'";
	$deletefive = "DELETE FROM qmr WHERE id='$who'";
		mysqli_query($mysqli,$deleteone);
		mysqli_query($mysqli,$deletetwo);
		mysqli_query($mysqli,$deletethree);
		mysqli_query($mysqli,$deletefour);
		mysqli_query($mysqli,$deletefive);
					
				}else{
					$rate = "UPDATE users SET y='$yellow' WHERE id='$who'";
					mysqli_query($mysqli,$rate);
				}
		$v ='y';		
				}
					if($_GET['rate'] == "red") {
					$red = $r + 5;
					
				if($red == 15){
					
// EMAIL
	
	$theirinfo = "SELECT * FROM users WHERE id='$who'";
	$noting = mysqli_query($mysqli, $theirinfo);
	$letemknow = mysqli_fetch_row($noting);
		$address = $letemknow['2'];
		$subject = "QMR ~ REMOVED FROM SITE";
		$body = "You have been removed from http://QuoteMyRelationship.com for rating RED. There was a problem with your information or your interaction or lack thereof with other people on QMR. You are welcome to create a new account.";	
mail($address,$subject,$body);					
					
	$deleteone = "DELETE FROM central WHERE receiving='$who' OR sending='$who'";
	$deletetwo = "DELETE FROM messages WHERE myrelationship='$who'";
	$deletethree = "DELETE FROM updater WHERE id='$who'";
	$deletefour = "DELETE FROM users WHERE id='$who'";
	$deletefive = "DELETE FROM qmr WHERE id='$who'";
		mysqli_query($mysqli,$deleteone);
		mysqli_query($mysqli,$deletetwo);
		mysqli_query($mysqli,$deletethree);
		mysqli_query($mysqli,$deletefour);
		mysqli_query($mysqli,$deletefive);					
					
				}else{	
					$rate = "UPDATE users SET r='$red' WHERE id='$who'";
					mysqli_query($mysqli,$rate);
					}
				$v = 'r';	
					}
		$voted = 1;			
					}