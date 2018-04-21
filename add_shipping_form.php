<!DOCTYPE html>
<html>
<?php
	session_start();
	$addressID = $_POST['shpID'];
?>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="styles/new_style.css" media="all" </link>
  <h1 align="center"> <a href="index.php"><img src="images/Book Monster.png" alt="home_logo" width="250" height="80"></a> </h1>  
</head>
	
<body>
  <div id="add_shp" class="login_div">
    <form class="user" action="add_shipping.php" method="post" enctype="multipart/form-data">
      <label for="address"><b><font face="helvetica">Address</font></b></label>
			<input type="text" name="address" required placeholder="Address" value="<?php if(isset($_POST['address'])){echo $_POST['address']; } ?>"/>

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
			<input type="hidden" name="shpID" value="<?php echo $_POST['shpID'] = $addressID?>" />
      <input type="submit" name="sub_editshp" value="Edit Address" />
    </form>
  </div>
</body>
</html>
