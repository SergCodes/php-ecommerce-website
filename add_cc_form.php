<!DOCTYPE html>
<html>
<?php
	session_start();
	$ccID = $_POST['ccID'];
?>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="styles/new_style.css" media="all" </link>
  <h1 align="center"> <a href="index.php"><img src="images/Book Monster.png" alt="home_logo" width="250" height="80"></a> </h1>  
</head>

	

<body>
  <div id="add_shp" class="login_div">
    <form class="user" action="add_cc.php" method="post" enctype="multipart/form-data">
      <label for="cc_name"><b><font face="helvetica">Name on Credit Card</font></b></label>
			<input type="text" name="cc_name" required placeholder="Name" value="<?php if(isset($_POST['cc_name'])){echo $_POST['cc_name']; } ?>"/>
			<label for="cc_number"><b><font face="helvetica">Credit Card Number</font></b></label>
			<input type="text" name="cc_number" required placeholder="CC Number" value="<?php if(isset($_POST['cc_number'])){echo $_POST['cc_number']; } ?>"/>
			<label for="cc_exp_date"><b><font face="helvetica">Exp. Date</font></b></label>
			<input style="width: 100px; margin-right: 100%" type="text" name="cc_exp_date" required placeholder="MM / YY" value="<?php if(isset($_POST['cc_exp_date'])){echo $_POST['cc_exp_date']; } ?>" />
      <label for="cc_sec_code"><b><font face="helvetica">Sec Code</font></b></label>
			<input style="width: 100px; margin-right: 100%" type="text" name="cc_sec_code" required placeholder="Code is found on the back of your card" value="<?php if(isset($_POST['cc_sec_code'])){echo $_POST['cc_sec_code']; } ?>" />
			<input type="hidden" name="ccID" value="<?php echo $_POST['ccID'] = $ccID?>" />
      <input type="submit" name="sub_editshp" value="Edit Credit Card" />
    </form>
  </div>
</body>
</html>
