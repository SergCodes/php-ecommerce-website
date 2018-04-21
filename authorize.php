<?php
	//Check where you are logged in
	if(!isset($_SESSION['SESS_USERID']) || (trim($_SESSION['SESS_USERID']) == '')) {
		header("location: login.php");
		exit();
	}
?>