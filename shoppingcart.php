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

	<div class="content" style="width: 60%; border-left: solid; border-right: solid; border-color: gray;">

	<form action = "" method = "post" enctype="multipart/form-data" >

			<table align = "center" width = "800" bgcolor = "white">

					<tr align = "center">
								<th>Remove</th>
								<th>Books</th>
								<th>Quantity</th>
								<th>Price</th>
					</tr>

					<?php
					global $con;
					$total = 0;
					$user_ID = $_SESSION['SESS_USERID'];
					$sel_price = "select * from cart where user_id = '$user_ID'";
					$run_price = mysqli_query($con, $sel_price);
					while ($p_price=mysqli_fetch_array($run_price)){
							$pro_id = $p_price['book_id'];
							$pro_qty = $p_price['quantity'];
							$pro_price = "select * from books where isbn='$pro_id'";
							$run_book_price = mysqli_query($con, $pro_price);
							while ($b_price = mysqli_fetch_array($run_book_price)){
									$book_tit = $b_price['book_title'];
									$book_img = $b_price['book_image'];
									$single_price = $b_price['price'];
									$values = $single_price * $pro_qty;
									$total += $values;
					?>

					<tr align = "center">
							<td style="padding-bottom: 10px; border-bottom: solid; border-color: darkgray; border-width: 1px;"><input type = "checkbox" name = "remove[]" value = "<?php echo $pro_id;?>"/></td>
							<td style="padding-bottom: 10px; border-bottom: solid; border-color: darkgray; border-width: 1px;"><?php echo $book_tit; ?><br>
							<img src='admin/book_images/<?php echo $book_img;?>' width ='100' height='120' />
							</td>
							<td width = "2" style="padding-bottom: 10px; border-bottom: solid; border-color: darkgray; border-width: 1px;">
                <label><?php echo $pro_qty ?></label>
                <!--<select name = "quantity">
  								<option value="1">1</option>
  								<option value="2">2</option>
  								<option value="3">3</option>
  								<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
								</select>-->
							</td>
							<?php
							$q = 1;
							if(isset($_POST['quantity'])){
								$q = $_POST['quantity'];
								$update_q = "update cart set quantity='$q' where book_id = '$pro_id'";
								$run_q = mysqli_query($con, $update_q);
							} ?>
							<td style="padding-bottom: 10px; border-bottom: solid; border-color: darkgray; border-width: 1px;"><?php echo "$" . $single_price; ?></td>
					</tr>


				<?php
			} } ?><!--end of the while loops-->


				<tr align = "right" >

							<td colspan= "10"><b>Total: <?php echo "$" . $total; ?></b></td>

							<?php //if user clicks continue shopping, this will take him back to the main page
								if(isset($_POST['continue'])){
									echo "<script>window.open('index.php','_self')</script>";
								}
							 ?>
				</tr>

				<!--if there are things in save for later table, no need to have this <tr>-->
				<?php
					global $con;
					$user_ID = $_SESSION['SESS_USERID'];
					$check = "select book_id from save_cart where user_id = '$user_ID'";
					$run_check = mysqli_query($con, $check);
					$row = mysqli_fetch_array($run_check);
					if(!$row){
						echo "
							<tr align='center'>
								<td ><input type= 'submit' name = 'update_cart' value = 'Update Cart'/></td>
								<td><input type= 'submit' name = 'continue' value = 'Continue Shopping'/></td>
								<td ><button ><a href = 'checkout.php' style='text-decoration: none; color:black;'>Checkout</a></button></a></td>
							</tr> ";
					}?>


					<?php
					global $con;
					/*
					$total = 0;
					$user_ID = $_SESSION['SESS_USERID'];
					if(isset($_POST['quantity'])){
						$arr = array("");
						array_push($arr, $_POST['quantity']);
						$getALL = "select * from cart where user_id = '$user_ID'";
						$running = mysqli_query($con, $getALL);
						while ($p = mysqli_fetch_array($running)){
							$id = $p['book_id'];
							$theqty = $p['quantity'];
							$onePrice = $p['the_price'];
							foreach ($arr as $x) {
							$update_qty = "update cart set quantity='$x' where book_id = '$id'";
							$run_qty = mysqli_query($con, $update_qty);
							$values = $onePrice * $x;
							$total += $values;
								break;
							}
						}
						//if quantity is set
 */
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
					?>

			</table>
		</from>


	<!--This table is for the "save me later"-->
	<form action = "" method = "post" enctype="multipart/form-data">

		<?php //show nothing if there is nothing in save cart.
			global $con;
			$user_ID = $_SESSION['SESS_USERID'];
			$check = "select book_id from save_cart where user_id = '$user_ID'";
			$run_check = mysqli_query($con, $check);
			$row = mysqli_fetch_array($run_check);
			if($row){
				echo "
				<table align = 'center' width = '1000' bgcolor = 'white' cellspacing='20'>
				<tr align = 'center'>
							<th><h2>Books saved for later:</h2></th>
				</tr>
				<tr align = 'center'>
							<th>Books</th>
							<th>Add to cart</th>
							<th>Remove</th>
				</tr>
				"
				?>

				<?php
				global $con;
				$user_ID = $_SESSION['SESS_USERID'];
				$getAll = "select * from save_cart where user_id = '$user_ID'";
				$run_q = mysqli_query($con, $getAll);
				while ($p = mysqli_fetch_array($run_q)){
						$pro_id = $p['book_id'];
						$products = "select * from books where isbn='$pro_id'";
						$run_book_products = mysqli_query($con, $products);
						while ($b = mysqli_fetch_array($run_book_products)){
								$book_tit = $b['book_title'];
								$book_img = $b['book_image'];
								$single_price = $b['price'];
				?>

				<tr align = "center">
						<td><?php echo $book_tit; ?><br>
						<img src='admin/book_images/<?php echo $book_img;?>' width ='100' height='120'/>
						</td>
						<td><input type = "checkbox" name= "sav[]" value = "<?php echo $pro_id;?>"/></td>
						<td><input type = "checkbox" name= "rem[]" value = "<?php echo $pro_id;?>"/></td>

						<?php
								//moving saved items to shopping cart
								if(isset($_POST['sav'])){
									foreach ($_POST['sav'] as $save_id) {
										$addToCart = "insert into cart (book_id, user_id, quantity) values ('$save_id','$user_ID', '1')";
										$delete_book = "delete from save_cart where book_id= '$save_id' AND user_id = '$user_ID'";
										$run_delete = mysqli_query($con, $addToCart);
										$run_delete2 = mysqli_query($con, $delete_book);
										if($run_delete2){
											echo "<script>window.open('shoppingcart.php','_self')</script>";
										}
									}//end of for each
								}//end of save if
									//checking if remove checkbox was set
									if(isset($_POST['rem'])){
									foreach ($_POST['rem'] as $remove_id) {
										$delete_book = "delete from save_cart where book_id= '$remove_id' AND user_id = '$user_ID'";
										$run_delete = mysqli_query($con, $delete_book);
										if($run_delete){
											echo "<script>window.open('shoppingcart.php','_self')</script>";
										}
									}//end of for each
								}//end of remove if
						?>
				</tr>


			<?php } } ?><!--end of the while loops-->

			<tr align="center">
				<td ><input type= "submit" name = "update_cart" value = "Update Cart"/></td>
				<td><input type= "submit" name = "continue" value = "Continue Shopping"/></td>
				<td ><button ><a href = "checkout.php" style="text-decoration: none; color:black;">Checkout</a></button></a></td>
			</tr>

			</table>
		<?php } ?><!--end of IF statement at the top of "save cart"-->
	</form>

	</div>

</body>
</html>
