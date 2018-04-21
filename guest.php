<?php
	//Start session
	session_start();
	
	//Check where you are logged in
	$_SESSION['SESS_USERID'] = 0;
	$_SESSION['SESS_USERNAME'] = guest;
	header("location: index.php");
	

?>