<?php

// NEW QMR UPLOAD
	if (isset($_POST['qmr'])){
			$quote = $_POST['message'];
if ($_POST['message'] == Null){}else{					
				$dollar = '/\$/';
		if (preg_match($dollar,$quote)) {
			echo "PROSTITUTION IS A NOT ALLOWED"; 
				} elseif(preg_match('/[0-9]/', $quote)) {
			echo "USE CONTACT FOR YOUR NUMBER";
		} else {

					
					$id = $_SESSION['id'];
					$combi = "\'\'".$quote."\'\'"; 
					$combi = mysqli_real_escape_string($mysqli,$_POST['message']);
						$newmessage = "INSERT INTO messages (myrelationship,message,senderlink) VALUES ('$who','$combi','$id')";
							mysqli_query($mysqli,$newmessage);
				
				
// EMAIL
	
	$theirinfo = "SELECT * FROM users WHERE id='$who'";
	$noting = mysqli_query($mysqli, $theirinfo);
	$letemknow = mysqli_fetch_row($noting);
	if($letemknow['10'] == 'on' && $id != $who){
		
		$headers = 'From: QuoteMyRelationship.com' . "\r\n".
		'Reply-To: tkimssg@gmail.com' . "\r\n" .
		'X-Mailer: PHP/' . phpversion() . "\r\n" .
		'Content-type: text/html; charset=iso-8859-1';
		
		$address = $letemknow['2'];
		$subject = "QMR ~ ".$quote;
		$body = "You have a new QUOTE! 
<br>
		<h3>\"".$quote."\"</h3>
<br><br>
Click <a href='http://QuoteMyRelationship.com/contact_profile.php?id=".$who."&uid=".$id."&ib'>QUOTE</a> to see who wrote it!
<br><br>		
To stop receiving these Emails <a href='http://QuoteMyRelationship.com/settings.php?unsubscribe=".$who."'>Unsubscribe</a>";	
mail($address,$subject,$body,$headers);
	}
		
	}}}