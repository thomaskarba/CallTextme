<?php

$_SESSION['email'] = $_POST['email'];
$_SESSION['username'] = $_POST['username'];

$username = $mysqli->escape_string($_POST['username']);
$email = $mysqli->escape_string($_POST['email']);
$pin = $mysqli->escape_string(password_hash($_POST['pin'], PASSWORD_BCRYPT));
$hash = $mysqli->escape_string( md5( rand(0,1000) ) );

$check = $mysqli->query("SELECT * FROM users WHERE email='$email'");
$usernamecheck = $mysqli->query("SELECT * FROM users WHERE username='$username'");

if ( $check->num_rows > 0 ){echo "You have already registered.";} 

elseif ( $usernamecheck->num_rows > 0 ){echo "Username has already been taken.";}

else {      

$sql = "INSERT INTO users (username, email, pin, hash) " 
            . "VALUES ('$username','$email','$pin', '$hash')";

if ( $mysqli->query($sql) ){

        $_SESSION['active'] = 0; //0 until user activates their account with verify.php
        $_SESSION['logged_in'] = true; // So we know the user has logged in
        $_SESSION['message'] =
                
                 "Confirmation link has been sent to $email, please verify
                 your account by clicking on the link in the message!";

        // Send registration confirmation link (verify.php)
        $to      = $email;
        $subject = 'Account Verification ( QuoteMyRelationship.com )';
        $message_body = '
        Hello '.$username.',

        Thank you for signing up!

        Please click this link to activate your account:

        http://quotemyrelationship.com/verify.php?email='.$email.'&hash='.$hash;  

        mail( $to, $subject, $message_body );

        header("location: profile.php"); 

    }

    else {
        $_SESSION['message'] = 'Registration failed!';
        header("location: error.php");
}}