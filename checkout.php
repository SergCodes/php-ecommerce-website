<!DOCTYPE html>
<html>

<?php
	include("html/header.php");
?>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="styles/new_style.css" media="all" </link>
</head>
<body style="font-family: Helvetica">


	<div class= "shopping_cart" >

		<head>
		<title> Review Order</title>
		</head>
		<body>

		<?php echo '<h1>' . '</h1>'; ?>
		<p align = "center"> <b>Review your Order</b></p>
		<style type = "text/text/css">
		p {
			font-size: 20px;
			color: blue;
			text-decoration: underline;
			font-family: Times;
		}
		</style>
		</body>




	<form action = "" method = "post" enctype="multipart/form-data">

			<table align = "center" width = "700" bgcolor = "white" style="border-left: solid; border-right: solid; border-color: gray; border-radius: 3px;">

					<tr align = "center">
								<th>Books</th>
								<th>Quantity</th>
								<th>Book Price</th>
					</tr>

					<?php
					global $con;
					$total = 0;

					$user_ID = $_SESSION['SESS_USERID'];

					$sel_price = "select * from cart where user_id= '$user_ID'";

					$run_price = mysqli_query($con, $sel_price);

					while ($p_price=mysqli_fetch_array($run_price)){

							$pro_id = $p_price['book_id'];

							$bk_quantity = $p_price['quantity'];

							$pro_price = "select * from books where isbn='$pro_id'";

							$run_book_price = mysqli_query($con, $pro_price);

							while ($b_price = mysqli_fetch_array($run_book_price)){

									$book_price = array($b_price['price'] * $bk_quantity);

									$book_tit = $b_price['book_title'];

									$book_img = $b_price['book_image'];

									$single_price = $b_price['price'];

									$values = array_sum($book_price);

									$total +=$values;


					?>



					<tr align = "center">

							<td>
							<img src='admin/book_images/<?php echo $book_img;?>' width ='150' height='200'/>
							</td>
							<td><?php echo $bk_quantity; ?><br>
							<?php

							if(isset($_POST['update_cart'])){

								//if quantity is set
									if(is_numeric($_POST['quantity'])){

											$qty = $_POST['quantity'];

											$update_qty = "update cart set quantity='$qty'";

											$run_qty = mysqli_query($con, $update_qty);

											$_SESSION['quantity'] = $qty;

											$total = $total * $qty;
										}
										//checking if remove checkbox was set
										if(isset($_POST['remove'])){
										foreach ($_POST['remove'] as $remove_id) {

											$delete_book = "delete from cart where book_id= '$remove_id' AND user_id = '$user_ID'";

											$run_delete = mysqli_query($con, $delete_book);

											if($run_delete){
												echo "<script>window.open('shoppingcart.php','_self')</script>";

											}

										}//end of for each

									}//end of remove if

							}//end of outer if


							?>



							<td><?php echo "$" . $single_price; ?></td>
					</tr>


				<?php } } ?><!--end of the while loops-->


				<?php
				/*
				$cart_isbn = "";

				$order_ISBNS = array();

				$cart_query = "select * from cart where user_id";

 				echo $cart_isbn;

				if(isset($_POST['place_order'])){
				$run_isbn = mysqli_query($con, $cart_query);

				while($row_b=mysqli_fetch_array($run_isbn)){
						$temp_isbn = $row_b['book_id'];
						$same_isbn = "select * from books where isbn = '$temp_isbn'";
						array_push($order_ISBNS, $same_isbn);
						$run_temp = mysqli_query($con, $same_isbn);

						while($rowb_temp=mysqli_fetch_array($run_temp)){
								$sold_amnt = $rowb_temp['sold'];
								$sold_amnt = $sold_amnt + 1;
								$sql_update = "update books set sold = '$sold_amnt' where isbn = '$temp_isbn'";
								$update_run = mysqli_query($con, $sql_update);
								$delete_sql = "delete from cart where book_id = '$temp_isbn'";
								$run_dlt = mysqli_query($con, $delete_sql);
						}	//Closes second while

				}	//Closes first while
			}	//Closes if statement
			*/
				?>




				<tr align = "right">
						<td colspan="4"><b>Total:</b></td>
						<td><?php echo "$" . $total; ?></td>
				</tr>

				<tr align = "center">
							<td><button><a href = "shoppingcart.php" style="text-decoration: none; color:black;">Back to Cart</a></button></a></td>
							<td colspan ="2"><input type= "submit" name= "place_order" value= "Place Order" style= "text-decoration: underline;"/></td>
							<td></td>




							 <?php
							 $cardexists = True;
							 $addressexists = True;
							 $user_ready = False;
							 $myID = $_SESSION['SESS_USERID'];
							 $check_address = "select * from shippingaddressmapper INNER JOIN shippingaddresses ON shippingaddressmapper.shippingaddresses_shippingaddressID = shippingaddresses.shippingaddressID where users_userID = '$myID' AND shippingstreet = '-'";
							 $run_address = mysqli_query($con, $check_address);

							 $shipping_rows = mysqli_num_rows($run_address);
							 if($shipping_rows == 4){
								 $addressexists = False;
							 }

							 $check_card = "select * from credit_cards_mapper INNER JOIN credit_cards ON credit_cards_mapper.cc_id = credit_cards.cc_id where userID = '$myID' AND cc_number = '-'";
							 $run_card = mysqli_query($con, $check_card);

							 $card_rows = mysqli_num_rows($run_card);
							 if($card_rows == 4){
								 $cardexists = False;
							 }


							 if($_SESSION['SESS_USERID'] == 0){
								 header('Location: loginForm.php');
							 }
							 elseif($cardexists == False){
								 echo '<center><a href="creditCardManager.php">A valid credit card is required to place an order.</a></center><br>';
							 }
							 elseif($addressexists == False){
								 echo "<center><a href='addressManager.php'>A valid shipping address is required to place an order. </a></center><br>";
							 }
							 else{
								 $user_ready = True;
							 }

							  ?>

								<?php

								$cart_isbn = "";

								$user_ID = $_SESSION['SESS_USERID'];

								$cart_query = "select * from cart where user_id = '$user_ID'";

								$order_isbn = array();

				 				echo $cart_isbn;

								if(isset($_POST['place_order']) && $user_ready == True){
								$run_isbn = mysqli_query($con, $cart_query);

								while($row_b=mysqli_fetch_array($run_isbn)){
										$temp_isbn = $row_b['book_id'];
										$cart_qty = $row_b['quantity'];
										$same_isbn = "select * from books where isbn = '$temp_isbn'";
										$run_temp = mysqli_query($con, $same_isbn);
										//array_push($order_isbn, $run_temp);
										$usernum = $_SESSION['SESS_USERID'];
										//$cur_isbn = $run_temp['isbn'];
										$run_lib = mysqli_query($con, "insert into myLibrary (userID, bookID) values ({$usernum}, {$temp_isbn})");

										while($rowb_temp=mysqli_fetch_array($run_temp)){
												$sold_amnt = $rowb_temp['sold'];
												$sold_amnt = $sold_amnt + $cart_qty;
												$sql_update = "update books set sold = '$sold_amnt' where isbn = '$temp_isbn'";
												$update_run = mysqli_query($con, $sql_update);
												$delete_sql = "delete from cart where book_id = '$temp_isbn' and user_id = '$user_ID'";
												$run_dlt = mysqli_query($con, $delete_sql);
										}	//Closes second while

								}	//Closes first while


							}	//Closes if statement

								?>

								<?php //if user clicks place order, this will take him to the order review page.
									if(isset($_POST['place_order'])){
										if($user_ready == True){
											echo "<script>window.open('orderreview.php','_self')</script>";
										}
										else{
											echo "<script>window.open('checkout.php','_self')</script>";
										}

									}
								 ?>
				</tr>




		</div>

	</div>

</body>
</html>
