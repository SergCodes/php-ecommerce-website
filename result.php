<!DOCTYPE html>
<html>

<?php

	include("html/adv_search.php");
?>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="styles/new_style.css" media="all" </link>
</head>
<body>
	<div class="content" >

		<div id="book_container">

				<?php
				@cart(); @saveForLater();
				if(isset($_GET['search'])){
					$search_query = $_GET['search'];

					if(isset($_GET['sort'])){
						$sort = $_GET['sort'];
					}else{
						$sort = "";
					}

					$rec_limit;
					if(isset($_GET['results'])){
						$rec_limit = $_GET['results'];
					}else{
						$rec_limit = 5;
						}


	         /* Get total number of records */
	         $sql = "SELECT count(isbn) FROM books WHERE book_title like '%$search_query%' ";
	         $retval = mysqli_query($con, $sql );

	         if(! $retval ) {
	            die('Could not get data: ' . mysqli_error($con));
	         }
	         $row = mysqli_fetch_array($retval  );
	         $rec_count = $row[0];

	         if(isset($_GET{'page'} ) && ($_GET{'page'} > 0) ) {
	            $page = $_GET{'page'};
	            $offset = $rec_limit * ($page - 1);
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


					//No filter.
				$get_b = "select * from books where book_title like '%$search_query%'";


				//<!--Author Filter  -->
				if($sort == "author"){
					$get_b = "SELECT * FROM books WHERE book_title like '%$search_query%' ORDER BY author";
					//echo "<script>alert('Author Query')</script>";
				}

				//<!-- Low to High Price -->

				if($sort == "low-price"){
					$get_b = "SELECT * FROM books WHERE book_title like '%$search_query%' ORDER BY price ASC";
				//	echo "<script>alert('low-price Query')</script>";
				}
				//<!-- High to Low Price -->

				if($sort == "high-price"){
					$get_b = "SELECT * FROM books WHERE book_title like '%$search_query%' ORDER BY price DESC";
				//	echo "<script>alert('high-price Query')</script>";
				}
				//<!-- Year: new to old -->

				if($sort == "new-release"){
					$get_b = "SELECT * FROM books WHERE book_title like '%$search_query%' ORDER BY year DESC";
				//	echo "<script>alert('new-release Query')</script>";
				}
				//<!-- Year: old to new -->
				if($sort == "old-release"){
					$get_b = "SELECT * FROM books WHERE book_title like '%$search_query%' ORDER BY year ASC";
				//	echo "<script>alert('old-release Query')</script>";
				}

				//<!-- Book Title  -->
				if($sort == "title"){
					$get_b = "SELECT * FROM books WHERE book_title like '%$search_query%' ORDER BY book_title";
				//	echo "<script>alert('Title Query')</script>";
				}

				$test = $get_b . " LIMIT $rec_limit OFFSET $offset";
				//echo $test;
				//Getting book info and printing
				$run_b = mysqli_query($con, $test);

				//Printing Pagination Links
					$pagLink = "<div class='pagination'>";
					for ($i=$total_pages; $i>=1; $i--) {
						if($page == $i){
							$pagLink .= "<a class='active' href='result.php?page=".$i."&sort=".$sort."&search=".$search_query."&results=".$rec_limit."'>".$i."</a>";
						}else{
							$pagLink .= "<a  href='result.php?page=".$i."&sort=".$sort."&search=".$search_query."&results=".$rec_limit."'>".$i."</a>";
						}

					};
					echo $pagLink . "</div>";

				while($row_b=mysqli_fetch_array($run_b)){
						//initializing variable with book name.
						$b_title = $row_b['book_title'];
						$b_author = $row_b['author'];
						$b_genre = $row_b['genre'];
						$b_release = $row_b['year'];
						$b_price = $row_b['price'];
						$b_image = $row_b['book_image'];
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
								<p>$b_release</p>
								<p><a href='details.php?b_isbn=$b_isbn' style='float:left; margin-left: 0px;'>More Info</a></p>
								<p style=\"margin-top: 100px\">
								<a href='index.php?add_cart=$b_isbn&page=$page'><button class=\"book_browsing_button\" style='float:right'; margin-right: 10px; >Add to Cart</button></a>
								<a href='index.php?save_later=$b_isbn'><button class=\"book_browsing_button\" style='float:right'>Save for later</button></a>
								<p>

							</div>
						</div>

					";
					}
				} else {

					if(isset($_GET['sort'])){
						$sort = $_GET['sort'];
					}else{
						$sort = "";
					}

					$rec_limit;
					if(isset($_GET['results'])){
						$rec_limit = $_GET['results'];
					}else{
						$rec_limit = 5;
						}


	         /* Get total number of records */
	         $sql = "SELECT count(isbn) FROM books WHERE 1";
	         $retval = mysqli_query($con, $sql );

	         if(! $retval ) {
	            die('Could not get data: ' . mysqli_error($con));
	         }
	         $row = mysqli_fetch_array($retval  );
	         $rec_count = $row[0];

	         if(isset($_GET{'page'} ) && ($_GET{'page'} > 0) ) {
	            $page = $_GET{'page'};
	            $offset = $rec_limit * ($page - 1);
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


					//No filter.
				$get_b = "select * from books where 1 ";


				//<!--Author Filter  -->
				if($sort == "author"){
					$get_b = "SELECT * FROM books WHERE 1 ORDER BY author";
					//echo "<script>alert('Author Query')</script>";
				}

				//<!-- Low to High Price -->

				else if($sort == "low-price"){
					$get_b = "SELECT * FROM books WHERE 1 ORDER BY price ASC";
				//	echo "<script>alert('low-price Query')</script>";
				}
				//<!-- High to Low Price -->

				else if($sort == "high-price"){
					$get_b = "SELECT * FROM books WHERE 1 ORDER BY price DESC";
				//	echo "<script>alert('high-price Query')</script>";
				}
				//<!-- Year: new to old -->

				else if($sort == "new-release"){
					$get_b = "SELECT * FROM books WHERE 1 ORDER BY year DESC";
				//	echo "<script>alert('new-release Query')</script>";
				}
				//<!-- Year: old to new -->
				else if($sort == "old-release"){
					$get_b = "SELECT * FROM books WHERE 1 ORDER BY year ASC";
				//	echo "<script>alert('old-release Query')</script>";
				}

				//<!-- Book Title  -->
				else if($sort == "title"){
					$get_b = "SELECT * FROM books WHERE 1 ORDER BY book_title";
				//	echo "<script>alert('Title Query')</script>";
				}

				$test = $get_b . " LIMIT $rec_limit OFFSET $offset";
				//echo $test;
				//Getting book info and printing
				$run_b = mysqli_query($con, $test);

				//Printing Pagination Links
					$pagLink = "<div class='pagination'>";
					for ($i=$total_pages; $i>=1; $i--) {
						if($page == $i){
							$pagLink .= "<a class='active' href='result.php?page=".$i."&sort=".$sort."&results=".$rec_limit."'>".$i."</a>";
						}else{
							$pagLink .= "<a  href='result.php?page=".$i."&sort=".$sort."&results=".$rec_limit."'>".$i."</a>";
						}

					};
					echo $pagLink . "</div>";

				while($row_b=mysqli_fetch_array($run_b)){
						//initializing variable with book name.
						$b_title = $row_b['book_title'];
						$b_author = $row_b['author'];
						$b_genre = $row_b['genre'];
						$b_release = $row_b['year'];
						$b_price = $row_b['price'];
						$b_image = $row_b['book_image'];
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
								<p>$b_release</p>
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

				 ?>


		</div>

	</div>

</body>
</html>
