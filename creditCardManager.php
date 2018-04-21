<!DOCTYPE html>
<html>
<?php

include("html/header.php");

	$id=$_SESSION['SESS_USERID'];
    $cc_ID1 = $cc_name1 = $cc_number1 = $cc_expDate1 = $cc_code1 = "-";
    $cc_ID2 = $cc_name2 = $cc_number2 = $cc_expDate2 = $cc_code2 = "-";
    $cc_ID3 = $cc_name3 = $cc_number3 = $cc_expDate3 = $cc_code3 = "-";
    $cc_ID4 = $cc_name4 = $cc_number4 = $cc_expDate4 = $cc_code4 = "-";



    $query = mysqli_query($con, "SELECT c.cc_ID, c.cc_name, c.cc_number, c.exp_date, c.sec_code 
                                 FROM credit_cards c INNER JOIN credit_cards_mapper m1 ON c.cc_ID = m1.cc_ID
                                 WHERE cc_order=1 AND m1.userID=$id");
    while($result = mysqli_fetch_array($query))
    {
      $cc_ID1 = $result['cc_ID'];
      $cc_name1 = $result['cc_name'];
      $cc_number1 = $result['cc_number'];
      $cc_expDate1 = $result['exp_date'];
      $cc_code1 = $result['sec_code'];
    }

    $query = mysqli_query($con, "SELECT c.cc_ID, c.cc_name, c.cc_number, c.exp_date, c.sec_code 
                                 FROM credit_cards c INNER JOIN credit_cards_mapper m1 ON c.cc_ID = m1.cc_ID
                                 WHERE cc_order=2 AND m1.userID=$id");
    while($result = mysqli_fetch_array($query))
    {
      $cc_ID2 = $result['cc_ID'];
      $cc_name2 = $result['cc_name'];
      $cc_number2 = $result['cc_number'];
      $cc_expDate = $result['exp_date'];
      $cc_code2 = $result['sec_code'];
    }

    $query = mysqli_query($con, "SELECT c.cc_ID, c.cc_name, c.cc_number, c.exp_date, c.sec_code 
                                 FROM credit_cards c INNER JOIN credit_cards_mapper m1 ON c.cc_ID = m1.cc_ID
                                 WHERE cc_order=3 AND m1.userID=$id");
    while($result = mysqli_fetch_array($query))
    {
      $cc_ID3 = $result['cc_ID'];
      $cc_name3 = $result['cc_name'];
      $cc_number3 = $result['cc_number'];
      $cc_expDate3 = $result['exp_date'];
      $cc_code3 = $result['sec_code'];
    }

    $query = mysqli_query($con, "SELECT c.cc_ID, c.cc_name, c.cc_number, c.exp_date, c.sec_code 
                                 FROM credit_cards c INNER JOIN credit_cards_mapper m1 ON c.cc_ID = m1.cc_ID
                                 WHERE cc_order=4 AND m1.userID=$id");
    while($result = mysqli_fetch_array($query))
    {
      $cc_ID4 = $result['cc_ID'];
      $cc_name4 = $result['cc_name'];
      $cc_number4 = $result['cc_number'];
      $cc_expDate4 = $result['exp_date'];
      $cc_code4 = $result['sec_code'];
    }
?>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="styles/new_style.css" media="all" </link>
</head>
<body>
	<div class="shippingAddressManager" >
    <h3><b><font face="helvetica">Credit Cards</font></b></h2>
    <a style="float: right;" href="myAccount.php"><b><font face="helvetica">back</font></b></a>
		<div id="user_container">
			<div class="address_cell">
				<label for="address1" valign="top"><div align="left"><b><font face="helvetica">Credit Card 1</font></b></div></label>
				<p align="left" class="shipping_address"><?php echo $cc_name1?></p>
        <p align="left" class="shipping_address"><?php echo $cc_number1?></p>
        <form method="post" action="add_cc_form.php">
          <input type="hidden" name="ccID" id="ccID" value="<?php echo $_POST["ccID"] = $cc_ID1;?>" />
          <input type="submit" value="Edit Card" ></input>
        </form>
			</div>

      <div class="address_cell">
				<label for="address1" valign="top"><div align="left"><b><font face="helvetica">Credit Card 2</font></b></div></label>
				<p align="left" class="shipping_address"><?php echo $cc_name2?></p>
        <p align="left" class="shipping_address"><?php echo $cc_number2?></p>
        <form method="post" action="add_cc_form.php">
          <input type="hidden" name="ccID" id="ccID" value="<?php echo $_POST["ccID"] = $cc_ID2;?>" />
          <input type="submit" value="Edit Card" ></input>
        </form>
			</div>


      <div class="address_cell">
				<label for="address1" valign="top"><div align="left"><b><font face="helvetica">Credit Card 3</font></b></div></label>
				<p align="left" class="shipping_address"><?php echo $cc_name3?></p>
        <p align="left" class="shipping_address"><?php echo $cc_number3?></p>
        <form method="post" action="add_cc_form.php">
          <input type="hidden" name="ccID" id="ccID" value="<?php echo $_POST["ccID"] = $cc_ID3;?>" />
          <input type="submit" value="Edit Card" ></input>
        </form>
			</div>


      <div class="address_cell">
				<label for="address1" valign="top"><div align="left"><b><font face="helvetica">Credit Card 4</font></b></div></label>
				<p align="left" class="shipping_address"><?php echo $cc_name4?></p>
        <p align="left" class="shipping_address"><?php echo $cc_number4?></p>
        <form method="post" action="add_cc_form.php">
          <input type="hidden" name="ccID" id="ccID" value="<?php echo $_POST["ccID"] = $cc_ID4;?>" />
          <input type="submit" value="Edit Card" ></input>
        </form>
			</div>

		</div>

	</div>

</body>
</html>
