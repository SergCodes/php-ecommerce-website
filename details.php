<!DOCTYPE html>
<html>

<?php

	include("html/header.php");

?>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="styles/new_style.css" media="all" </link>
</head>
<body>

	<?php
		//check url for the isbn
		if(isset($_GET['b_isbn'])){

		$isbn = $_GET['b_isbn'];

		$bookBought = False;
		$userID = $_SESSION['SESS_USERID'];

		$checkBought = "SELECT * FROM myLibrary where userID='$userID' AND bookID='$isbn'";
		$run_checkBought = mysqli_query($con, $checkBought);
		$numberOfRows = mysqli_num_rows($run_checkBought);
		if($numberOfRows == 0){
			$bookBought = False;
		}
		else{
			$bookBought = True;
		}
	?>

	<div class="content-details" >

		<div id="book_container-details">

			<?php

				$book = null;

				// query that gets the isbn
				$get_b = "select *, AVG(book_ratings.rating) AS rating from books LEFT JOIN book_ratings
				ON books.isbn = book_ratings.book where isbn='$isbn'";

				//running query
				$run_b = mysqli_query($con, $get_b);

				while($row_b=mysqli_fetch_array($run_b)){

					//initializing variable with book name.
					$b_title = $row_b['book_title'];
					$b_author = $row_b['author'];
					$b_genre = $row_b['genre'];
					$b_release = $row_b['release_date'];
					$b_price = $row_b['price'];
					$b_image = $row_b['book_image'];
					$b_description = $row_b['description'];
					$b_a_description = $row_b['author_bio'];
					$b_a_description = $row_b['author_bio'];
					$b_rating = round ($row_b['rating']);

					//primary key
					//used to display individual datails page.
					$b_isbn = $row_b['isbn'];

					echo "
						<div id='single_book-details' width: 70%; height: auto;>";
					?>

  					<?php

						$sql_genre = "SELECT * FROM book_genres WHERE genre_id=$b_genre";
						$run_g = mysqli_query($con, $sql_genre);
						$genre_name;

						while($row_g = mysqli_fetch_array($run_g)){
							$genre_name = $row_g['genre_type'];
						}
					echo"
						<img src='admin/book_images/$b_image' class='thumbnail' width='300px' height='400px' />

						<div id='book_info'>
						
						<p><img src='images/$b_rating.png' style = 'border: 0px; float: right'></p>
						<h3>$b_title</h3>
						<p> <a href='author.php?b_author=$b_author'>by $b_author </a> </p>
						<p> Genre: <a href='genres.php?genre=$b_genre'>$genre_name</a> </p>
						<p> $ $b_price.00</p>

						<p> Book Description: $b_description

						<div style='margin: auto; '>
						<a href='index.php' style='float:right;'> Go Back</a>

						<a href='index.php?add_cart=$b_isbn'><button style='float:left; color: white; background-color: #15325C; padding: 15px 32px'>Add to Cart</button></a>
							
									
								</div>
							</div>
						</div>

									";
								}
							}

						?>
		</div>
	</div>

	<div class = "bottom-of-details">
		<div id = "ratings">
			<?php

						if($bookBought == True){
						?>
							<h3> Rate this book: </h3>
							<form action="rate.php" method="get" enctype="multipart/form-data">
								<input type="hidden" name="book" value="<?php echo $b_isbn; ?>">
								<select name="rating">
									<option value="1" >1 Star</option>
									<option value="2" >2 Stars</option>
									<option value="3" >3 Stars</option>
									<option value="4" >4 Stars</option>
									<option value="5" >5 Stars</option>
								</select>
								<input type="radio" name="anonymous" value="yes"> Anonymous
								<input type="radio" name="anonymous" value="no"> Use Username
								<p><input type="submit" value="Submit"></p>
							</form>
						<?php
						}
						?>


			<h2> Reviews </h2>
			<?php

			$get_ratings = "SELECT * FROM book_ratings WHERE book = $isbn";

			$run_get_ratings = mysqli_query($con, $get_ratings);

			while($row_b=mysqli_fetch_array($run_get_ratings)){
				$b_rating = $row_b['rating'];
				$b_username = $row_b['username'];
				$b_anonymous = $row_b['anonymous'];
				if($b_anonymous != 'yes'){
					echo "<p>Rating: <img src='images/$b_rating.png'> by $b_username</p>";
				}
				else{
					echo "<p>Rating: <img src='images/$b_rating.png'> by anonymous</p>";
				}
			}
			

			$loggedIn = True;
			$promptToLogIn = "";

			$filename = "comments/" . $isbn . 'comments.html';

			$id=$_SESSION['SESS_USERID'];
			$query = mysqli_query($con, "SELECT * FROM users INNER JOIN shippingaddresses WHERE userID=$id");
			while($result = mysqli_fetch_array($query))
			{
			$nickname = $result['nickname'];
			}

			if($_POST){
				$comment = $_POST['commentArea'];
				$name = $nickname;
				$annonymous_answer = $_POST['anonymous'];
				if($name != 'guest' && $annonymous_answer =="no" && $bookBought == True){
					$handle = fopen($filename, "a");
					fwrite($handle, "<b>" . $name. "</b>:</br>" . $comment . "</br>" );
					fclose($handle);
				}
				elseif($name != 'guest' && $annonymous_answer =="yes" && $bookBought == True){
					$handle = fopen($filename, "a");
					fwrite($handle, "<b>" . "anonymous". "</b>:</br>" . $comment . "</br>" );
					fclose($handle);
				}
				else{
					$loggedIn = False;
					$promptToLogIn = "You have either not purchased the book, did not select a posting option, or are not logged in.";
				}
			}
			?>
		</div>
		<div id = "comments">

				<h2> Submit a comment </h2>
				<?php
				if($loggedIn == False){
					echo "$promptToLogIn";?>
					<a href='login.php'>Login.</a><?php
				}
				?><p></p>
				<form action = "" method = "POST">
				<textarea rows = "10" cols = "100" name = "commentArea"></textarea></br>
				<input type="radio" name="anonymous" value="yes"> Anonymous
				<input type="radio" name="anonymous" value="no"> Use Username
				<input type = "submit" value = "Post">
				</form>
				<h2> Comments </h2>
				<?php include	$filename;
			?>
		</div>
	</div>
</body>
</html
