<!DOCTYPE html>
<html>

<?php
	include("functions/functions.php");
	include("includes/db.php");
	include('register_server.php');
?>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="styles/new_style.css" media="all" </link>
  <h1 align="center"> <a href="index.php"><img src="images/Book Monster.png" alt="home_logo" width="250" height="80"></a> </h1>
</head>

<body>
  <div id="register" class="login_div">
    <form class="user" action="register.php" method="post" enctype="multipart/form-data">

			<?php include('errors.php'); ?>

      <label for="first_name"><b><font face="helvetica">First Name</font></b></label>
      <input type="text" name="first_name" required placeholder="First Name" value="<?php if(isset($_POST['first_name'])){echo $_POST['first_name']; } ?>"/>

      <label for="last_name"><b><font face="helvetica">Last Name</font></b></label>
      <input type="text" name="last_name" required placeholder="Last Name" value="<?php if(isset($_POST['last_name'])){echo $_POST['last_name']; } ?>"/>

      <label for="email"><b><font face="helvetica">Email Address</font></b></label>
      <input type="text" name="email" required placeholder="someemail@emails.com" value="<?php if(isset($_POST['email'])){echo $_POST['email'];  $u_email = $_POST['email']; }?>"/>

      <label for="con_email"><b><font face="helvetica">Re-enter Email Address</font></b></label>
      <input class="user" type="text" name="con_email" required placeholder="someemail@emails.com" value="<?php if(isset($_POST['con_email'])){ $con_email = $_POST['con_email'];
				if ($u_email === $u_con_email) {
					echo $_POST['email'];
				}

			} ?>"/>

      <label for="password"><b><font face="helvetica">Password</font></b></label>
      <input type="password" name="password" required/>

      <label for="re_password"><b><font face="helvetica">Re-enter Password</font></b></label>
      <input type="password" name="re_password" required/>

			<label for="username"><b><font face="helvetica">Username</font></b></label>
			<input type="text" name="username" required placeholder="Username" value="<?php if(isset($_POST['username'])){echo $_POST['username']; } ?>"/>

			<label for="address"><b><font face="helvetica">Address</font></b></label>
			<input type="text" name="address" required placeholder="Address" value="<?php if(isset($_POST['address'])){echo $_POST['address']; } ?>"/>

			<label for="phone"><b><font face="helvetica">Phone Number</font></b></label>
			<input type="text" name="phone" required placeholder="Phone Number" value="<?php if(isset($_POST['phone'])){echo $_POST['phone']; } ?>"/>

			<label for="city"><b><font face="helvetica">City</font></b></label>
			<input type="text" name="city" required placeholder="City" value="<?php if(isset($_POST['city'])){echo $_POST['city']; } ?>"/>


			<label for="state"><b><font face="helvetica">State</font></b></label>
			<br>
			<select name="state" required>
				<option value=""> Select State</option>
				<option value="AL">Alabama</option>
				<option value="AK">Alaska</option>
				<option value="AZ">Arizona</option>
				<option value="AR">Arkansas</option>
				<option value="CA">California</option>
				<option value="CO">Colorado</option>
				<option value="CT">Connecticut</option>
				<option value="DE">Delaware</option>
				<option value="DC">District Of Columbia</option>
				<option value="FL">Florida</option>
				<option value="GA">Georgia</option>
				<option value="HI">Hawaii</option>
				<option value="ID">Idaho</option>
				<option value="IL">Illinois</option>
				<option value="IN">Indiana</option>
				<option value="IA">Iowa</option>
				<option value="KS">Kansas</option>
				<option value="KY">Kentucky</option>
				<option value="LA">Louisiana</option>
				<option value="ME">Maine</option>
				<option value="MD">Maryland</option>
				<option value="MA">Massachusetts</option>
				<option value="MI">Michigan</option>
				<option value="MN">Minnesota</option>
				<option value="MS">Mississippi</option>
				<option value="MO">Missouri</option>
				<option value="MT">Montana</option>
				<option value="NE">Nebraska</option>
				<option value="NV">Nevada</option>
				<option value="NH">New Hampshire</option>
				<option value="NJ">New Jersey</option>
				<option value="NM">New Mexico</option>
				<option value="NY">New York</option>
				<option value="NC">North Carolina</option>
				<option value="ND">North Dakota</option>
				<option value="OH">Ohio</option>
				<option value="OK">Oklahoma</option>
				<option value="OR">Oregon</option>
				<option value="PA">Pennsylvania</option>
				<option value="RI">Rhode Island</option>
				<option value="SC">South Carolina</option>
				<option value="SD">South Dakota</option>
				<option value="TN">Tennessee</option>
				<option value="TX">Texas</option>
				<option value="UT">Utah</option>
				<option value="VT">Vermont</option>
				<option value="VA">Virginia</option>
				<option value="WA">Washington</option>
				<option value="WV">West Virginia</option>
				<option value="WI">Wisconsin</option>
				<option value="WY">Wyoming</option>
			</select>
			<br>
			<!--
			<input type="text" name="state" required placeholder="State"/>
		-->

			<label for="zip"><b><font face="helvetica">Zip</font></b></label>
			<input type="text" name="zip" required placeholder="Zip" value="<?php if(isset($_POST['zip'])){echo $_POST['zip']; } ?>" />

			<label for="nickname"><b><font face="helvetica">Nickname</font></b></label>
			<input type="text" name="nickname" required placeholder="Nickname" value="<?php if(isset($_POST['nickname'])){echo $_POST['nickname']; } ?>"/>

      <!--
			<button class="signup_button"> Submit </button>
			-->
			<input type="submit" name="register_user" value="Create Account" />
    </form>
  </div>
</body>
</html>
