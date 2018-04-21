<?php
	include("includes/db.php");

	session_start();

	$errors = array();

	if(isset($_POST['register_user'])){
		//maybe use later.
		//$ip = getIp();
		//add randomizer for id

	$user_id = rand(1,100000);
	//$user_id = getGUID();


	$user_username = addslashes($_POST['username']);
	$user_address = addslashes($_POST['address']);
	$user_city = addslashes($_POST['city']);
	$user_state = addslashes($_POST['state']);
	$user_zip = addslashes($_POST['zip']);
	$user_nickname = addslashes($_POST['nickname']);
	//fetching user variables.
	$u_first_name = addslashes($_POST['first_name']);
	$u_last_name = addslashes($_POST['last_name']);

	$u_email = addslashes($_POST['email']);
	$u_con_email = addslashes($_POST['con_email']);

	$u_password = addslashes($_POST['password']);
	$u_re_password = addslashes($_POST['re_password']);


	$u_phone = addslashes($_POST['phone']);
if(!(preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $u_phone))) {
  // $phone is not valid
	array_push($errors, "Please enter a phone number with the right format. (123-456-7890)");

}

	//Validation between passwords.
	if ($u_password != $u_re_password) {
		array_push($errors, "The two passwords do not match");
	}

	if (!filter_var($u_email, FILTER_VALIDATE_EMAIL)) {
	    array_push($errors, "Enter a valid email");
	}

	//making sure both emails are the same.
	if ($u_email != $u_con_email) {
		array_push($errors, "The two emails do not match");
	}

	// Password validation.
if(preg_match("/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/", $u_password) === 0){
	array_push($errors, "Password must be at least 8 characters and must contain at least one lower case letter, one uppercase, and one number.");
	//$errPass = '<p class="errText">Password must be at least 8 characters and must contain at least one lower case letter, one upper case letter and one digit</p>';
}

if(preg_match("#[0-9]{5}#", $user_zip) === 0){
array_push($errors, "Zip must be 5 numbers.");

//$errZip = '<p class="errText">Zip must be 4 digits</p>';
}
/*
	$insert_u = "insert into users (fName, lName, email, password)
	values ('$u_first_name','$u_last_name','$u_con_email','$u_re_password_') ";
*/

// a user does not already exist with the same username and/or email
$user_check_query = "SELECT * FROM users WHERE username='$user_username' OR email='$u_email' LIMIT 1";
$result = mysqli_query($con, $user_check_query);
$user = mysqli_fetch_assoc($result);

if ($user) { // if user exists
	if ($user['username'] === $user_username) {
		array_push($errors, "Username already exists");
	}

	if ($user['email'] === $u_email) {
		array_push($errors, "Email already exists");
	}
}

  if (count($errors) == 0) {
/*
			$insert_u = "insert into users (userID, username, password, fName, lName, email, homeStreet, homeCity,homeState, homeZip, nickname)
			values ('$user_id','$user_username','$u_password','$u_first_name','$u_last_name','$u_email','$user_address','$user_city', '$user_state' '$user_zip', '$user_nickname') ";
*/
			$insert_u = "insert into users (userID, username, password, fName, lName, email, homeStreet, homeCity, homeState, homeZip, nickname, entireNumber) values ('$user_id','$user_username','$u_password','$u_first_name','$u_last_name','$u_email','$user_address','$user_city', '$user_state', '$user_zip', '$user_nickname', '$u_phone')";
			$run_c = mysqli_query($con, $insert_u);

			//Adding 4 shipping address slots.
			for ($c = 1; $c < 5; $c++) {
				$guid = rand(1, 9) + rand(10, 90) + rand(100, 900) + rand(1000, 9000);
				$add_shp_add = mysqli_query($con, "INSERT INTO shippingaddresses (shippingaddressID, shippingStreet, shippingCity, shippingState, shippingzip) values ('$guid', '-', '-', '-', '-')");
				$add_to_shp_mapper = mysqli_query($con, "INSERT INTO shippingaddressmapper (users_userID, shippingaddresses_shippingaddressID, address_order) values ('$user_id', '$guid', '$c')");
			}

			//Adding 4 credit card slots.
			for ($c = 1; $c < 5; $c++) {
				$guid = rand(1, 9) + rand(10, 90) + rand(100, 900) + rand(1000, 9000);
				$add_shp_add = mysqli_query($con, "INSERT INTO credit_cards (cc_ID, cc_number, cc_name, exp_date, sec_code) values ('$guid', '-', '-', '-', '-')");
				$add_to_shp_mapper = mysqli_query($con, "INSERT INTO credit_cards_mapper (userID, cc_ID, cc_order) values ('$user_id', '$guid', '$c')");
			}

			if($run_c){
				echo "<script>alert('user registered successfully!')</script>";
				header("Location: loginForm.php", true, 301);
			}
			else{
				echo "<script>alert('could not register user :\')</script>";
			}
		}
}



?>
