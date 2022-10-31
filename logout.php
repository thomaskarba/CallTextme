<?php
/* Log out process, unsets and destroys session variables */
session_start();
session_unset();
session_destroy(); 
setcookie('login',Null,time()+5);
if(isset($_GET['m'])){
header("location: start2.php");	
}else{
header("location: index.php");	
}

?>