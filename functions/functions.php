<?php

	//connect to database. //server, user, password, database
	$con = mysqli_connect("localhost","root","","geek_text");

	if(mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_errno();
	}


function getNumOfItems(){
			global $con;
			$user_ID = $_SESSION['SESS_USERID'];
			$check_book = "select * from cart where user_id = $user_ID";
			$run_check = mysqli_query($con, $check_book);

			$count = mysqli_num_rows($run_check);

			echo $count ;
}
	//creating save for later
	function saveForLater(){

		global $con;

		if(isset($_GET['save_later'])){

				$user_ID = $_SESSION['SESS_USERID'];

				$book_id = $_GET['save_later'];

				$check_book = "select * from save_cart where user_id='$user_ID' AND book_id='$book_id' ";

				$run_check = mysqli_query($con, $check_book);

				if(mysqli_num_rows($run_check)>0){

					echo "";


				}
				else {

					$insert_book = "insert into save_cart (book_id, user_id) values ('$book_id','$user_ID')";

					$run_pro = mysqli_query($con, $insert_book);



				}


			}


	}
	//Creating the shopping cart
	function cart(){

			global $con;

			if(isset($_GET['add_cart'])){

					$user_ID = $_SESSION['SESS_USERID'];
					$book_id = $_GET['add_cart'];

					$check_book = "select * from cart where user_id='$user_ID' AND book_id='$book_id' ";

					$run_check = mysqli_query($con, $check_book);

					if(mysqli_num_rows($run_check)>0){

						$sql_add1 = "select * from cart where user_id='$user_ID' AND book_id='$book_id'";
						$run_add1 = mysqli_query($con, $sql_add1);

						while($row1 = mysqli_fetch_array($run_add1)){
							$b_quantity = $row1['quantity'];
							$b_quantity = $b_quantity + 1;
							$sql_update = "update cart set quantity = '$b_quantity' where book_id = '$book_id' and user_id = '$user_ID'";
							$run_update = mysqli_query($con, $sql_update);
						}


					}
					else {
						$id = $_GET['add_cart'];
						$check = "select * from books where isbn='$id' ";
						$running = mysqli_query($con, $check);
						while($p = mysqli_fetch_array($running)){
							$singlePrice = $p['price'];

							$insert_book = "insert into cart (book_id, user_id, the_price, quantity) values ('$id','$user_ID', '$singlePrice', '1')";
							$run_pro = mysqli_query($con, $insert_book);
						}



					}


				}
	}

//getting the total books added
function total_books() {

	if(isset($_GET['add_cart'])){

		global $con;

		$user_ID = $_SESSION['SESS_USERID'];

		$get_items = "select * from cart where user_id = '$user_ID'";

		$run_items = mysqli_query($con, $get_items);

		$count_items = mysqli_num_rows($run_items);
	}

		else {

			global $con;


			$get_items = "select * from cart where user_id = '$user_ID'";

			$run_items = mysqli_query($con, $get_items);

			$count_items = mysqli_num_rows($run_items);

		}



echo $count_items;
}

//Getting total price of books in the cart
function total_price(){

	$total = 0;

	global $con;

	$user_ID = $_SESSION['SESS_USERID'];

	$sel_price = "select * from cart where user_id= '$user_ID'";

	$run_price = mysqli_query($con, $sel_price);

	while ($p_price=mysqli_fetch_array($run_price)){

			$pro_id = $p_price['book_id'];

			$pro_price = "select * from books where isbn='$pro_id'";

			$run_book_price = mysqli_query($con, $pro_price);

			while ($b_price = mysqli_fetch_array($run_book_price)){

					$book_price = array($b_price['price']);

					$values = array_sum($book_price);

					$total +=$values;
			}


	}

	echo "$" . $total;
}


//getting customer IP
	//function getIp() {
	//$ip = $_SERVER['REMOTE_ADDR'];

	//if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			//$ip = $_SERVER['HTTP_CLIENT_IP'];
	//} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		//	$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	//}

	//return $ip;
//}

	//function to get genres
	function getGenres(){

		if(!isset($_GET['genre'])){

			//make variable global
			global $con;

			//variable that gets items from book_genres table
			$get_genres = "select * from book_genres order by genre_type";

			$run_genres =  mysqli_query($con, $get_genres);

			//loop that runs depending on the amount of rows on the book_genres table
			while($row_genres=mysqli_fetch_array($run_genres)){
				//fetching the information from the genre_type table on database
				$genre_id = $row_genres['genre_id'];
				$genre_type = $row_genres['genre_type'];
				//display genres
				echo "<li><a href='genres.php?genre=$genre_id'>$genre_type </a></li>";
			}

		}

	}

	//function to display books on main page.
	function getBook(){

		global $con;
		if(!isset($_GET['genre'])){

			$rec_limit = 5;
			/* Get total number of records */
			$sql = "SELECT count(isbn) FROM books";
			$retval = mysqli_query($con, $sql );

			if(! $retval ) {
			die('Could not get data: ' . mysqli_error($con));
			}
			$row = mysqli_fetch_array($retval  );
			$rec_count = $row[0];

			if( isset($_GET{'page'} ) && ($_GET{'page'} > 0) ) {
			$page = $_GET{'page'};
			$offset = $rec_limit * ($page - 1) ;
			}else {
			$page = 0;
			$offset = 0;
			}

			$left_rec = $rec_count - ($page * $rec_limit);
					$total_pages = ceil($rec_count / $rec_limit);


			$retval = mysqli_query($con, $sql );

			if(! $retval ) {
			die('Could not get data: ' . mysql_error());
			}


			$get_b = "SELECT * FROM books LIMIT $rec_limit OFFSET $offset";

			$run_b = mysqli_query($con, $get_b);

		//connection to db
			global $con;
			//get 6 random books
			//$get_b = "SELECT * FROM book_ratings_view LIMIT ";

			$run_b = mysqli_query($con, $get_b);

			$pagLink = "<div class='pagination'>";
				for ($i=$total_pages; $i>=1; $i--) {
					if($page == $i){
						$pagLink .= "<a class='active' href='index.php?page=".$i."'>".$i."</a>";
					}else{
						$pagLink .= "<a  href='index.php?page=".$i."'>".$i."</a>";
					}
				};
			echo $pagLink . "</div>";

			//echo $get_b;
			while($row_b=mysqli_fetch_array($run_b)){

				//initializing variable with book name.
				$b_title = $row_b['book_title'];
				$b_price = $row_b['price'];
				$b_image = $row_b['book_image'];
				$b_author = $row_b['author'];
        $b_year = $row_b['year'];


				//primary key
				//used to display individual details page.
				$b_isbn = $row_b['isbn'];

				echo "
					<div id='single_book'>
						<div style=\"display=inline-block; float: left;\"> 
							<a href='details.php?b_isbn=$b_isbn' style=\"margin-right: 20px;\"><img src='admin/book_images/$b_image' width='150px' height='200px' style=\"margin-right: 20px;\"/></a>
						</div>
						<div class=\"book_browsing_details\">
							<a href='details.php?b_isbn=$b_isbn'> <h3 style=\"text-align: left;\"><font face=\"helvetica\">$b_title</font></h3></a>
							<p><a href='author.php?b_author=$b_author' style=\"margin-left: 0px;\">by $b_author </a> </p>
							
							<p><b>$$b_price.00</b></p>
							<p>$b_year</p>
							<p><a href='details.php?b_isbn=$b_isbn' style='float:left; margin-left: 0px;'>More Info</a></p>
							<p style=\"margin-top: 100px\">
							<a href='index.php?add_cart=$b_isbn&page=$page'><button class=\"book_browsing_button\" style='float:right'; margin-right: 10px; >Add to Cart</button></a>
							<a href='index.php?save_later=$b_isbn'><button class=\"book_browsing_button\" style='float:right'>Save for later</button></a>
							<p>

						</div>
					</div>

				";

			}
			
		}

	}




	function getBookGenre(){

		$book_genre;

		if(isset($_GET['genre'])){

			global $con;


				$rec_limit = 5;
				//getting book genre from url
				$book_genre = $_GET['genre'];

				/* Get total number of records */
				$sql = "SELECT count(isbn) FROM books WHERE genre = '$book_genre'";
				$retval = mysqli_query($con, $sql );

				if(! $retval ) {
				die('Could not get data: ' . mysqli_error($con));
				}
				$row = mysqli_fetch_array($retval  );
				$rec_count = $row[0];

				if( isset($_GET{'page'} ) && ($_GET{'page'} > 0) ) {
				$page = $_GET{'page'};
				$offset = $rec_limit * ($page - 1) ;
				}else {
				$page = 0;
				$offset = 0;
				}

				$left_rec = $rec_count - ($page * $rec_limit);
						$total_pages = ceil($rec_count / $rec_limit);


				$retval = mysqli_query($con, $sql );

				if(! $retval ) {
				die('Could not get data: ' . mysql_error());
				}


				$get_b = "SELECT * FROM books LIMIT $rec_limit OFFSET $offset";

				$run_b = mysqli_query($con, $get_b);



			//connection to db
			global $con;

			//get 6 random books
			$get_books_genre = "select * from books where genre ='$book_genre' LIMIT $rec_limit OFFSET $offset";;
			$run_books_genre = mysqli_query($con, $get_books_genre);
			$book_counter = mysqli_num_rows($run_books_genre);

			if($book_counter == 0){
					echo "<h2>There are no books on this genre!</h2>";
			}
			else{

				$pagLink = "<div class='pagination'>";
				for ($i=$total_pages; $i>=4; $i--) {
					if($page == $i){
						$pagLink .= "<a class='active' href='genres.php?genre=$book_genre&page=".$i."'>".$i."</a>";
					}else{
						$pagLink .= "<a  href='genres.php?genre=$book_genre&page=".$i."'>".$i."</a>";
					}
			};

			echo $pagLink . "</div>";

				while($row_books_genre=mysqli_fetch_array($run_books_genre)){

						//initializing variable with book name.
					$b_title = $row_books_genre['book_title'];
					$b_author = $row_books_genre['author'];
					$b_genre = $row_books_genre['genre'];
					$b_release = $row_books_genre['release_date'];
					$b_price = $row_books_genre['price'];
					$b_image = $row_books_genre['book_image'];
						//primary key
						//used to display individual datails page.
					$b_isbn = $row_books_genre['isbn'];
					$b_year = $row_books_genre['year'];
					echo "
					<div id='single_book'>
						<div style=\"display=inline-block; float: left;\"> 
							<a href='details.php?b_isbn=$b_isbn' style=\"margin-right: 20px;\"><img src='admin/book_images/$b_image' width='150px' height='200px' style=\"margin-right: 20px;\"/></a>
						</div>
						<div class=\"book_browsing_details\">
							<a href='details.php?b_isbn=$b_isbn'> <h3 style=\"text-align: left;\"><font face=\"helvetica\">$b_title</font></h3></a>
							<p><a href='author.php?b_author=$b_author' style=\"margin-left: 0px;\">by $b_author </a> </p>
							
							<p><b>$$b_price.00</b></p>
							<p>$b_year</p>
							<p><a href='details.php?b_isbn=$b_isbn' style='float:left; margin-left: 0px;'>More Info</a></p>
							<p style=\"margin-top: 100px\">
							<a href='index.php?add_cart=$b_isbn&page=$page'><button class=\"book_browsing_button\" style='float:right'; margin-right: 10px; >Add to Cart</button></a>
							<a href='index.php?save_later=$b_isbn'><button class=\"book_browsing_button\" style='float:right'>Save for later</button></a>
							<p>

						</div>
					</div>

				";
				}
		}
	}
}



		//function to display books on main page.
		function getTopRatedBooks(){

			global $con;
			if(isset($_GET['toprated'])){

				$rec_limit = 5;
				/* Get total number of records */
				$sql = "SELECT count(isbn) FROM book_ratings_view";
				$retval = mysqli_query($con, $sql );

				if(! $retval ) {
				die('Could not get data: ' . mysqli_error($con));
				}
				$row = mysqli_fetch_array($retval  );
				$rec_count = $row[0];

				if( isset($_GET{'page'} ) ) {
				$page = $_GET{'page'};
				$offset = $rec_limit * ($page - 1) ;
				}else {
				$page = 0;
				$offset = 0;
				}

				$left_rec = $rec_count - ($page * $rec_limit);
						$total_pages = ceil($rec_count / $rec_limit);


				$retval = mysqli_query($con, $sql );

				if(! $retval ) {
				die('Could not get data: ' . mysql_error());
				}


				$get_b = "SELECT * FROM book_ratings_view ORDER BY avgRating DESC LIMIT $rec_limit OFFSET $offset";

				$run_b = mysqli_query($con, $get_b);

			//connection to db
				global $con;
				//get 6 random books
				//$get_b = "SELECT * FROM book_ratings_view LIMIT ";

				$run_b = mysqli_query($con, $get_b);

				$pagLink = "<div class='pagination'>";
				for ($i=$total_pages; $i>=4; $i--) {
					if($page == $i){
						$pagLink .= "<a class='active' href='top_rated.php?page=".$i."'>".$i."</a>";
					}else{
						$pagLink .= "<a  href='top_rated.php?page=".$i."'>".$i."</a>";
					}

				};
				echo $pagLink . "</div>";

				while($row_b=mysqli_fetch_array($run_b)){
						//initializing variable with book name.
						$b_title = $row_b['book_title'];
						$b_price = $row_b['price'];
						$b_image = $row_b['book_image'];
						$b_year = $row_b['year'];
						$b_rating = round ($row_b['avgRating']);

						//primary key
						//used to display individual details page.
						$b_isbn = $row_b['isbn'];

						echo "
						<div id='single_book'>
							<div style=\"display=inline-block; float: left;\"> 
								<a href='details.php?b_isbn=$b_isbn' style=\"margin-right: 20px;\"><img src='admin/book_images/$b_image' width='150px' height='200px' style=\"margin-right: 20px;\"/></a>
							</div>
							<div class=\"book_browsing_details\">
								<a href='details.php?b_isbn=$b_isbn'> <h3 style=\"text-align: left;\"><font face=\"helvetica\">$b_title</font></h3></a>
								<p><a href='author.php?b_author=$b_author' style=\"margin-left: 0px;\">by $b_author </a> </p>
								
								<p><b>$$b_price.00</b></p>
								<p>$b_year</p>
								<p> Rating: $b_rating/5</p>
								<p><a href='details.php?b_isbn=$b_isbn' style='float:left; margin-left: 0px;'>More Info</a></p>
								<p style=\"margin-top: 100px\">
								<a href='index.php?add_cart=$b_isbn&page=$page'><button class=\"book_browsing_button\" style='float:right'; margin-right: 10px; >Add to Cart</button></a>
								<a href='index.php?save_later=$b_isbn'><button class=\"book_browsing_button\" style='float:right'>Save for later</button></a>
								<p>

							</div>
						</div>

					";

				}
			}
		}


	function getGUID(){
    if (function_exists('com_create_guid')){
        return com_create_guid();
    }
    else {
        mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
        $charid = strtoupper(md5(uniqid(rand(), true)));
        $hyphen = chr(45);// "-"
        $uuid = chr(123)// "{"
            .substr($charid, 0, 8).$hyphen
            .substr($charid, 8, 4).$hyphen
            .substr($charid,12, 4).$hyphen
            .substr($charid,16, 4).$hyphen
            .substr($charid,20,12)
            .chr(125);// "}"
        return $uuid;
    }
}

?>
