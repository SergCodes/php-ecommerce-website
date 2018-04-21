<!DOCTYPE html>
<html>

<?php
	include("includes/db.php");
?>
	<head>
		<title>Inserting Book</title>
		<link rel="stylesheet" href="../styles/admin_insert_book.css" media="all"</link>
	</head>

<body>

	<form action="insert_book.php" method="post" enctype="multipart/form-data" >

		<div >
			<table >
				<tr>
					<th colspan="2"><h2>Insert new Book here</h2></th>
				</tr>
				<br>
				<tr >
					<td>Book Title </td>
					<td><input type="text" name="book_title" required /></td>
				</tr>
				<!--
				<tr>
					<td>ISBN </td>
					<td><input type="text" name="isbn" required /></td>
				</tr>
				-->
				<tr>
					<td>Author </td>
					<td><input type="text" name="author"  required/></td>
				</tr>
				<tr>
					<td>Author bio </td>
					<td><textarea rows="4" cols="20" name="author_bio"  maxlength="250"/></textarea></td>
				</tr>
				<tr>
					<td>Genre</td>
					<td>
					<!--
					<input type="text" name="book_genre" />
					-->
					<select name="genre" required/>
						<option value=""> Select Genre</option>

						<?php
							$get_genres = "select * from book_genres";
							$run_genres =  mysqli_query($con, $get_genres);
							//loop that runs depending on the amount of rows on the book_genres table
							while($row_genres=mysqli_fetch_array($run_genres)){
								//fetching the information from the genre_type table on database
								$genre_id = $row_genres['genre_id'];
								$genre_type = $row_genres['genre_type'];
								//display genres
								echo "<option value='$genre_id'> $genre_type</option>";
							}

						?>
					</select>
					</td>
				</tr>
				<tr>
					<td>Release Date </td>
					<td><input type="date" name="release_date" required /></td>
				</tr>
				<tr>
					<td>Price </td>
					<td><input type="text" name="price" required /></td>
				</tr>
				<tr>
					<td>Year </td>
					<td><input type="text" name="year" required /></td>
				</tr>
				<tr>
					<td>Publisher </td>
					<td><input type="text" name="publisher"  required/></td>
				</tr>
				<tr>
					<td>Book Image </td>
					<td><input type="file" name="book_image" accept=".png, .jpg, .jpeg"  required /></td>
				</tr>
				<tr>
					<td>Quantity </td>
					<td><input type="text" name="quantity" required /></td>
				</tr>
				<tr>
					<td>Rating </td>
					<td><input type="text" name="rating" required /></td>
				</tr>
				<tr>
					<td>Description</td>
					<td><textarea rows="4" cols="20" name="description"  maxlength="250"/></textarea></td>
				</tr>
				<tr>
					<td><input type="submit" name="insert_book" value="Insert"></insert></td>
					<td><input type="reset"></input></td>
				</tr>
			</table>
		</div>
	</form>

</body>
</html>

<?php

	if(isset($_POST['insert_book'])){


		//fetching the data from fields.
		//$isbn = $_POST['isbn'];
		$book_title = addslashes($_POST['book_title']);
		$author = addslashes($_POST['author']);
		$author_bio = addslashes($_POST['author_bio']);
		$genre = addslashes($_POST['genre']);
		$release_date = addslashes($_POST['release_date']);
		$price = addslashes($_POST['price']);
		$year = addslashes($_POST['year']);
		$publisher = addslashes($_POST['publisher']);
		$description = addslashes($_POST['description']);
		$quantity = addslashes($_POST['quantity']);
		$rating = addslashes($_POST['rating']);

		/*

		$book_title = $_POST['book_title'];
		$author = $_POST['author'];

		$_author_bio = $_POST['author_bio'];
		$author_bio = addslashes($_author_bio);
		$genre = $_POST['genre'];
		$release_date = $_POST['release_date'];
		$price = $_POST['price'];
		$year = $_POST['year'];
		$publisher = $_POST['publisher'];
		$_description = $_POST['description'];
		$description = addslashes($_description);
		$quantity = $_POST['quantity'];
		$rating = $_POST['rating'];

		*/


		//fetching image
		$book_image = $_FILES['book_image']['name'];
		$book_image_temp = $_FILES['book_image']['tmp_name'];

		move_uploaded_file($book_image_temp, "book_images/$book_image");

		$insert_book = "insert into books (book_title, author, author_bio, genre, release_date, price, year, publisher, description, quantity, rating, book_image) values ('$book_title','$author','$author_bio','$genre','$release_date','$price','$year','$publisher', '$description','$quantity', '$rating', '$book_image')";

		echo $insert_book = "insert into books (book_title, author, author_bio, genre, release_date, price, year, publisher, description, quantity, rating, book_image) values ('$book_title','$author','$author_bio','$genre','$release_date','$price','$year','$publisher', '$description','$quantity', '$rating', '$book_image')";

		$insert_b = mysqli_query($con, $insert_book);

		if($insert_b){
			echo "<script>alert('Book has been inserted!')</script>";
			echo "<script>window.open('insert_book.php', '_self')</script>";

		}else{
			echo "<script>alert('Book was not added')</script>";
		}




	}

?>
