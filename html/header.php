<!DOCTYPE html>
<html>

<?php

	$con = mysqli_connect("localhost","root","","geek_text");
	global $con;
	include("functions/functions.php");
	session_start();
?>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="styles/new_style.css" media="all">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
  <body>
    <div class="topnav">
      <div class="mini_topnav">
        <a>Contact Us</a>
		<?php
			if(($_SESSION['SESS_USERID'] == 0)) {
				echo "<a class='menu_link' href='login.php'> Login </a>";
			}
			else {

				echo "<a href='logout.php'>Logout</a>";
				echo "<a href='myAccount.php'>My Account</a>";
			}
		?>
      </div>
      <div class=topnav_mid>
        <a href="index.php"><img src="images/Book Monster.png" alt="home_logo" width="250" height="80"></a>
        <div class="search-container">
          <form action="result.php" class="search_form">
						<button type="submit"><i class="fa fa-search"></i></button>
						<div style="overflow: hidden;" >
            	<input type="text" placeholder="Search.." name="search">
						</div>
          </form>
        </div>
      </div>
      <div class="topnav_menu">
        <a href="index.php">Home</a>
				<a href="top_rated.php"> Top Rated </a>
				<a href="top_sellers.php"> Top Sellers </a>


				<a href="shoppingCart.php" style="float: right"> <?php echo getNumOfItems() ?> Items/Shopping Cart</a>




        <div class="dropdown">

					<button class="dropbtn">Genres</button>
					<div class="dropdown-content">
				<?php
				//getting and displying genres
				global $con;
					$get_genres = "select * from book_genres";
					$run_genres =  mysqli_query($con, $get_genres);
					//loop that runs depending on the amount of rows on the book_genres table

					while($row_genres=mysqli_fetch_array($run_genres)){
						//fetching the information from the genre_type table on database
						$genre_id = $row_genres['genre_id'];
						$genre_type = $row_genres['genre_type'];
						//display genres
						echo "<a href=genres.php?genre=$genre_id>$genre_type </a>";

					}

					?>
				</div>
			</div>


					<!--



        <form class="user" action="genres.php">
        	<label for="label_genre"><b><font face="helvetica">Genres</font></b></label>
        	<select name="genre">




	          $get_genres = "select * from book_genres";
	          $run_genres =  mysqli_query($con, $get_genres);



	          //loop that runs depending on the amount of rows on the book_genres table

	          while($row_genres=mysqli_fetch_array($run_genres)){
	            //fetching the information from the genre_type table on database
	            $genre_id = $row_genres['genre_id'];
	            $genre_type = $row_genres['genre_type'];
	            //display genres
	            echo "<option value='$genre_id'>$genre_type</option>";
	          }





					?>
          <input type="submit" value="Go" />
					</select>
        <form>
				-->



      </div>
    </div>
  </body>
</html>
