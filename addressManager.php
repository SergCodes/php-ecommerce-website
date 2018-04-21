<!DOCTYPE html>
<html>
<?php

include("html/header.php");


	$id=$_SESSION['SESS_USERID'];
    $shippingStreet1 = $shippingId1 = $shippingCity1 = $shippingState1 = $shippingZip1 = "-";
    $shippingStreet2 = $shippingId2 = $shippingCity2 = $shippingState2 = $shippingZip2 = "-";
    $shippingStreet3 = $shippingId3 = $shippingCity3 = $shippingState3 = $shippingZip3 = "-";
    $shippingStreet4 = $shippingId4 = $shippingCity4 = $shippingState4 = $shippingZip4 = "-";



    $query = mysqli_query($con, "SELECT a.shippingStreet, a.shippingCity, a.shippingState, a.shippingZip, a.shippingaddressID 
                                  FROM shippingaddresses a INNER JOIN shippingaddressmapper m1 ON a.shippingaddressID = m1.shippingaddresses_shippingaddressID 
                                  WHERE address_order=1 AND m1.users_userID=$id");
    while($result = mysqli_fetch_array($query))
    {
      $shippingStreet1 = $result['shippingStreet'];
      $shippingCity1 = $result['shippingCity'];
      $shippingState1 = $result['shippingState'];
      $shippingZip1 = $result['shippingZip'];
      $shippingId1 = $result['shippingaddressID'];
    }

    $query = mysqli_query($con, "SELECT a.shippingStreet, a.shippingCity, a.shippingState, a.shippingZip, a.shippingaddressID 
                                  FROM shippingaddresses a INNER JOIN shippingaddressmapper m1 ON a.shippingaddressID = m1.shippingaddresses_shippingaddressID 
                                  WHERE address_order=2 AND m1.users_userID=$id");
    while($result = mysqli_fetch_array($query))
    {
      $shippingStreet2 = $result['shippingStreet'];
      $shippingCity2 = $result['shippingCity'];
      $shippingState2 = $result['shippingState'];
      $shippingZip2 = $result['shippingZip'];
      $shippingId2 = $result['shippingaddressID'];
    }

    $query = mysqli_query($con, "SELECT a.shippingStreet, a.shippingCity, a.shippingState, a.shippingZip, a.shippingaddressID 
                                  FROM shippingaddresses a INNER JOIN shippingaddressmapper m1 ON a.shippingaddressID = m1.shippingaddresses_shippingaddressID 
                                  WHERE address_order=3 AND m1.users_userID=$id");
    while($result = mysqli_fetch_array($query))
    {
      $shippingStreet3 = $result['shippingStreet'];
      $shippingCity3 = $result['shippingCity'];
      $shippingState3 = $result['shippingState'];
      $shippingZip3 = $result['shippingZip'];
      $shippingId3 = $result['shippingaddressID'];
    }

    $query = mysqli_query($con, "SELECT a.shippingStreet, a.shippingCity, a.shippingState, a.shippingZip, a.shippingaddressID 
                                  FROM shippingaddresses a INNER JOIN shippingaddressmapper m1 ON a.shippingaddressID = m1.shippingaddresses_shippingaddressID 
                                  WHERE address_order=4 AND m1.users_userID=$id");
    while($result = mysqli_fetch_array($query))
    {
      $shippingStreet4 = $result['shippingStreet'];
      $shippingCity4 = $result['shippingCity'];
      $shippingState4 = $result['shippingState'];
      $shippingZip4 = $result['shippingZip'];
      $shippingId4 = $result['shippingaddressID'];
    }
?>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="styles/new_style.css" media="all" </link>
</head>
<body>
	<div class="shippingAddressManager" >
    <h3><b><font face="helvetica">Shipping Addresses</font></b></h2>
    <a style="float: right;" href="myAccount.php"><b><font face="helvetica">back</font></b></a>
		<div id="user_container">
			<div class="address_cell">
				<label for="address1" valign="top"><div align="left"><b><font face="helvetica">Address 1</font></b></div></label>
				<p align="left" class="shipping_address"><?php echo $shippingStreet1?></p>
        <p align="left" class="shipping_address"><?php echo $shippingCity1?></p>
        <p align="left" class="shipping_address"><?php echo $shippingState1, ', ', $shippingZip1 ?></p>
        <form method="post" action="add_shipping_form.php">
          <input type="hidden" name="shpID" id="shpID" value="<?php echo $_POST["shpID"] = $shippingId1;?>" />
          <input type="submit" value="Edit Address" ></input>
        </form>
			</div>

      <div class="address_cell">
				<label for="address2" valign="top"><div align="left"><b><font face="helvetica">Address 2</font></b></div></label>
				<p align="left" class="shipping_address"><?php echo $shippingStreet2?></p>
        <p align="left" class="shipping_address"><?php echo $shippingCity2?></p>
        <p align="left" class="shipping_address"><?php echo $shippingState2, ', ', $shippingZip2 ?></p>
        <form method="post" action="add_shipping_form.php">
          <input type="hidden" name="shpID" id="shpID" value="<?php echo $_POST["shpID"] = $shippingId2;?>" />
          <input type="submit" value="Edit Address" ></input>
        </form>
			</div>

      <div class="address_cell">
				<label for="address3" valign="top"><div align="left"><b><font face="helvetica">Address 3</font></b></div></label>
				<p align="left" class="shipping_address"><?php echo $shippingStreet3?></p>
        <p align="left" class="shipping_address"><?php echo $shippingCity3?></p>
        <p align="left" class="shipping_address"><?php echo $shippingState3, ', ', $shippingZip3 ?></p>
        <form method="post" action="add_shipping_form.php">
          <input type="hidden" name="shpID" id="shpID" value="<?php echo $_POST["shpID"] = $shippingId3;?>" />
          <input type="submit" value="Edit Address" ></input>
        </form>
			</div>

      <div class="address_cell">
				<label for="address4" valign="top"><div align="left"><b><font face="helvetica">Address 4</font></b></div></label>
				<p align="left" class="shipping_address"><?php echo $shippingStreet4?></p>
        <p align="left" class="shipping_address"><?php echo $shippingCity4?></p>
        <p align="left" class="shipping_address"><?php echo $shippingState4, ', ', $shippingZip4 ?></p>
        <form method="post" action="add_shipping_form.php">
          <input type="hidden" name="shpID" id="shpID" value="<?php echo $_POST["shpID"] = $shippingId4;?>" />
          <input type="submit" value="Edit Address" ></input>
        </form>
			</div>
		</div>

	</div>

</body>
</html>
