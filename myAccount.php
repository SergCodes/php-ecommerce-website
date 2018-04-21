	<!DOCTYPE html>
<html>
<?php

	include("html/header.php");

	$id=$_SESSION['SESS_USERID'];
	$query = mysqli_query($con, "SELECT * FROM users INNER JOIN shippingaddresses WHERE userID=$id");
	while($result = mysqli_fetch_array($query))
	{
    $fname = $result['fName'];
    $lname = $result['lName'];
    $nickname = $result['nickname'];
    $email = $result['email'];
    $entireNumber = $result['entireNumber'];
    $homeStreet = $result['homeStreet'];
    $homeCity = $result['homeCity'];
    $homeState = $result['homeState'];
    $homeZip = $result['homeZip'];
    $shippingStreet = $result['shippingStreet'];
    $shippingCity = $result['shippingCity'];
    $shippingState = $result['shippingState'];
    $shippingZip = $result['shippingZip'];
	}
?>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="styles/new_style.css" media="all" </link>
</head>
<body>

	<div class="myAccountPage">
		<div class="userProfileName">
			<h2 style="margin-bottom: 0px; padding-left: 10px;"><b><?php echo $fname ?> <?php echo $lname ?></b></h2>
			<h4 style="margin-top: 0px; padding-left: 10px;"><b><?php echo $nickname ?></b></h4>
		</div>
		<div class="myAccountSideBox">
        <a href="creditCardManager.php"  style="float: right;">Credit Cards</a>
        <a href="addressManager.php"  style="float: right;">Shipping Addresses</a>
				<a href="edit_profile_information.php"  style="float: right;">Edit Profile</a>
  	</div>

	</div>

	<div class="myAccountPage" style="font-family: Helvetica;">
		<div style="float: left; width: 30%; padding-left: 10px;">
			<h3 style="margin-bottom: 0;">Home Address</h3>
			<p style="margin-top: 0; margin-bottom: 0;"><?php echo $homeStreet ?></p>
			<p style="margin-top: 0; margin-bottom: 0;"><?php echo $homeCity ?></p>
			<p style="margin-top: 0; margin-bottom: 0;"><?php echo $homeState ?>,<?php echo $homeZip ?></p>
		</div>

		<div style="float: right; width: 30%; padding-right: 400px; margin-top: 20px;">
			<h3 style="margin-top: 0; margin-bottom: 0;">Email Address</h3>
			<p style="margin-top: 0px; margin-bottom: 10px;"><?php echo $email ?></p>

			<h3 style="margin-bottom: 0;">Phone Number</h3>
			<p style="margin-top: 0; margin-bottom: 0;"><?php echo $entireNumber ?></p>
		</div>
	</div>

	<br><center><h2><font face="helvetica">My Purchased Books</font></h2>
	<div id='myBooks'>
	<?php
	$checkBought = "SELECT * FROM myLibrary INNER JOIN books ON myLibrary.bookID = books.isbn where userID='$id'";
	$run_checkBought = mysqli_query($con, $checkBought);
	$numberOfRows = mysqli_num_rows($run_checkBought);
	if($numberOfRows == 0){
		echo "No books purchased yet.";
	}
	else{
		while($row_books=mysqli_fetch_array($run_checkBought)){
			$b_title = $row_books['book_title'];
			$b_isbn = $row_books['isbn'];
			$b_author = $row_books['author'];
			$b_image = $row_books['book_image'];

			echo "<div id='book' style='display:inline-block'><h4><font face=\"helvetica\">$b_title</font></h4>
			<p> <a href='author.php?b_author=$b_author'><font face=\"helvetica\">by $b_author </font></a> </p>
			<a href='details.php?b_isbn=$b_isbn'><img src='admin/book_images/$b_image' width='150px' height='200px' style='padding-right: 20px'/></a></div>";
		}
	}
	?></center>
</body>
</html>
