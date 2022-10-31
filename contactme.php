<!DOCTYPE html>
<head><title>Contact QMR</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style type="text/css">
p{text-align:center;color:white;font-size:150%;}
@import url('https://fonts.googleapis.com/css?family=Roboto+Mono:500');
body{background-image:url("img/bg.png");font-family: 'Roboto', sans-serif;}
.form-style-3{
    max-width: 350px;
    font-family: 'Roboto Mono',monospace;
	text-align:center;
	margin:auto;
}
.form-style-3 label{
    display:block;
    margin-bottom: 10px;
}
.form-style-3 label > span{
    float: left;
    width: 100px;
    color: black;
    font-weight: bold;
    font-size: 20px;
    text-shadow: 1px 1px 1px black;
}
.form-style-3 fieldset{
    border-radius: 10px;
    -webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    margin: 0px 0px 10px 0px;
    border: 1px solid #fffdd1;
    padding: 20px;
    background: #ebe7dd;
}
.form-style-3 fieldset legend{
    color: black;
    border-top: 1px solid #ffffd1;
    border-left: 1px solid #ffffd1;
    border-right: 1px solid #ffffd1;
    border-radius: 5px 5px 0px 0px;
    -webkit-border-radius: 5px 5px 0px 0px;
    -moz-border-radius: 5px 5px 0px 0px;
    background: #fffff5;
    padding: 0px 8px 3px 8px;
    font-weight: normal;
    font-size: 14px;
}
.form-style-3 textarea{
    width:300px;
    height:200px;
}
.form-style-3 input[type=text],
.form-style-3 input[type=date],
.form-style-3 input[type=datetime],
.form-style-3 input[type=number],
.form-style-3 input[type=search],
.form-style-3 input[type=time],
.form-style-3 input[type=url],
.form-style-3 input[type=email],
.form-style-3 select, 
.form-style-3 textarea{
    border-radius: 3px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border: 1px solid #f9ffc2;
    outline: none;
    color: black;
    padding: 5px 8px 5px 8px;
    background: #e5e5e5;
    width:50%;
}
.form-style-3  input[type=submit],
.form-style-3  input[type=button]{
    background: #ebe7dd;
    border: 1px solid #c9c54b;
    padding: 5px 15px 5px 15px;
    color: black;
    border-radius: 3px;
    border-radius: 3px;
    -moz-border-radius: 3px;    
    font-weight: bold;
}
.required{
    color:red;
    font-weight:normal;
}
body{background-color:#000;}
	a{color:white;text-decoration:none;}
	mark{background-color:black;}
</style>
<body>
<div class="form-style-3">
<form action="contactme.php" method="POST">
<fieldset><legend>Optional</legend>
<label for="field1"><span>NAME<span class="required"></span></span><input type="text" class="input-field" name="name" value="" /></label>
<label for="field2"><span>EMAIL<span class="required"></span></span><input type="email" class="input-field" name="email" value="" /></label>
<label for="field3"><span>PHONE<span class="required"></span></span><input type="text" class="input-field" name="phone" value="" /></label>
</fieldset>
<fieldset>
<label for="field6"><span>MESSAGE<span class="required">*</span></span><textarea name="message" class="textarea-field"></textarea></label>
<label><span>&nbsp;</span><input type="submit" name="contact" value="Submit" /></label>
</fieldset>
</form>
<br>
<mark>
<a href="index.php">BACK</a>
</mark>
<br>
<?php
if (isset($_POST['contact'])){
if (empty($_POST['message'])){echo "<p>YOU DID NOT WRITE A MESSAGE.</p>";}else{
$msg = $_POST['message'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$name = $_POST['name'];
$send = "thomas@karba.com";
// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);
//mail(to,subject,message,headers,parameters);

$headers = 'From: QuoteMyRelationship.com' . "\r\n".
		'Reply-To: '.$email.'' . "\r\n" .
		'X-Mailer: PHP/' . phpversion() . "\r\n" .
		'Content-type: text/html; charset=iso-8859-1';
		
		
mail($address,$subject,$body,$headers);


mail($send,"QMR ".$phone." ".$email,$msg,$headers);
echo "<p>YOUR MESSAGE HAS BEEN SENT.</p>";}}
?>
<br>
<br>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="U8TS6F2FB3BGE">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
<br>

</div>
</body>
</html>