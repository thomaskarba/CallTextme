<?php
require 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if ( $_POST['pin'] == $_POST['pin'] ) { 

        $new_pin = $_POST['pin'];
		$email = $mysqli->escape_string($_POST['email']);

		$sql = "UPDATE users SET pin='$new_pin' WHERE email='$email'";

		if ( $mysqli->query($sql) ) {

		$_SESSION['message'] = "Your password has been reset successfully!";
		header("location: success.php");}} else {
		$_SESSION['message'] = "Something wrong on our end!";
		header("location: error.php");}}
?>