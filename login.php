<?php
	include('functions/functions.php');
	
	//Start session
	session_start();
 
	//Store validation error, validate error flag, and get username and password.
	$errmsg_arr = array();
	$errflag = false;
	$username = $_POST['username'];
	$password = $_POST['password'];
 
	//Create query
	$query="SELECT * FROM users WHERE username='$username' AND password='$password'";
	$result=mysqli_query($con, $query);
 
	//Check query
	if($result) {
		if(mysqli_num_rows($result) > 0) {
			//Login Successful
			session_regenerate_id();
			$user = mysqli_fetch_assoc($result);
			$_SESSION['SESS_USERID'] = $user['userID'];
			$_SESSION['SESS_USERNAME'] = $user['username'];
			$_SESSION['SESS_PASSWORD'] = $user['password'];
			$_SESSION['SESS_NICKNAME'] = $user['nickname'];
			session_write_close();
			header("location: myAccount.php");
			exit();
		}else {
			//Login failed
			$errmsg_arr[] = 'Username and password not found!';
			$errflag = true;
			if($errflag) {
				$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
				session_write_close();
				header("location: loginForm.php");
				exit();
			}
		}
	}else {
		die("Fatal error!!!");
	}
	
?>