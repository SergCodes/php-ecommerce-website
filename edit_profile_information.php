<!DOCTYPE html>
<html>

<?php
	include("html/header.php");
?>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="styles/new_style.css" media="all" </link>
  <h3 align="center"> <b><font face="helvetica">Edit Profile Information</font></b></h1>
</head>

<body>

  <div id="editProfile" class="login_div">
    <form class="user" action="./editProfile.php" method="post">
				<label for="fname"><b><font face="helvetica">First Name</font></b></label>
        <input type="text" name="fname"><br />
				<label for="lanme"><b><font face="helvetica">Last Name</font></b></label>
        <input type="text" name="lname"><br />
				<label for="nickname"><b><font face="helvetica">Nickname</font></b></label>
        <input type="text" name="nickname"><br />
				<label for="homestreet"><b><font face="helvetica">Home Street Address</font></b></label>
        <input type="text" name="homestreet"><br />
				<label for="homecity"><b><font face="helvetica">Home City</font></b></label>
        <input type="text" name="homecity"><br />
				<label for="homestate"><b><font face="helvetica">Home State</font></b></label>
        <input type="text" name="homestate"><br />
				<label for="homezip"><b><font face="helvetica">Home Zip</font></b></label>
        <input type="text" name="homezip"><br />
				<label for="email"><b><font face="helvetica">Email<br></font></b></label>
        <input type="email" name="email" style="width: 292px"><br />
				<label for="entireNumber"><b><font face="helvetica">Password</font></b></label>
		<input type="password" name="password"><br />
				<label for="entireNumber"><b><font face="helvetica">Phone Number</font></b></label>
        <input type="text" name="entireNumber"><br />

        <input type="submit" value="Submit">
			</form>
  </div>
</body>
</html>
