<?php
	include('functions/functions.php');
	
	//Start session
	session_start();
	
	$id=$_SESSION['SESS_USERID'];
	
    function filter($date)
    {
        return trim(htmlspecialchars($date));
    }

    $fname = filter($_POST['fname']);
	$lname = filter($_POST['lname']);
	$nickname = filter($_POST['nickname']);
	$password = filter($_POST['password']);
	$homestreet = filter($_POST['homestreet']);
	$homecity = filter($_POST['homecity']);
	$homestate = filter($_POST['homestate']);
	$homezip = filter($_POST['homezip']);
	$email = filter($_POST['email']);
	$entireNumber = filter($_POST['entireNumber']);
	
	//Check where you are logged in
	if(isset($_SESSION['SESS_USERID'])) {
		if(!empty ($fname))
		{
			$query = mysqli_query($con, "UPDATE users SET fName = '$fname' WHERE userID='$id'");
		}
		if(!empty ($lname))
		{
			$query = mysqli_query($con, "UPDATE users SET lName = '$lname' WHERE userID='$id'");
		}
		if(!empty ($nickname))
		{
			$query = mysqli_query($con, "UPDATE users SET nickname = '$nickname' WHERE userID='$id'");
		}
		if(!empty ($email))
		{
			$query = mysqli_query($con, "UPDATE users SET email = '$email' WHERE userID='$id'");
		}
		if(!empty ($password))
		{
			$query = mysqli_query($con, "UPDATE users SET password = '$password' WHERE userID='$id'");
		}
		if(!empty ($homestreet))
		{
			$query = mysqli_query($con, "UPDATE users SET homeStreet = '$homestreet' WHERE userID='$id'");
		}
		if(!empty ($homestate))
		{
			$query = mysqli_query($con, "UPDATE users SET homeState = '$homestate' WHERE userID='$id'");
		}
		if(!empty ($homecity))
		{
			$query = mysqli_query($con, "UPDATE users SET homeCity = '$homecity' WHERE userID='$id'");
		}
		if(!empty ($homezip))
		{
			$query = mysqli_query($con, "UPDATE users SET homeZip = '$homezip' WHERE userID='$id'");
		}
		if(!empty ($entireNumber))
		{
			$query = mysqli_query($con, "UPDATE users SET entireNumber = '$entireNumber' WHERE userID='$id'");
		}
	}
	header('Location: myAccount.php');
	
?>