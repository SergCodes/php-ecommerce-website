<!DOCTYPE html>
<html>
<?php
	include("functions/functions.php");
?>
	<head>
		<title>GeekText</title>
		<link rel="stylesheet" href="styles/styles.css" media="all"</link>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
	</head>
	
	
	<body>
	
		<!-- Container -->
		<div class="main_wrapper">
		
			<!-- Header -->
			<div class="header_wrapper" >
				<img id="geek_logo" src="images/logo.pn" atl="GeekText Logo"</img>
				<img id="geek_banner" src="images/sponsor.png" atl="banner Logo"</img>
				
				
			</div>
			
			<!-- Navbar -->
			
			<div class="menubar"> 
			
				<ul id="menu">
				
					
						<a href="#"><li>Home</li></a>
						<a href="#"><li>Books</li></a>
						<a href="#"><li>My Account</li></a>
						<a href="#"><li>Sign up</li></a>
						<a href="#"><li>Shopping Cart</li></a>
						<a href="#"><li>Contact Us</li></a>
					

				</ul>
				
				
					<div id="search_form">
						<form method="get" action="results.php" enctype="multipart.form-data">
							<input type="text" name="book_query" placeholder="Book Search">
							<input type="submit" name="search_button" value="Search" >
							
						</form>
					</div>
				
			</div>
			<!-- Content -->
			<div class="content_wrapper">  
			
				<div id="sidebar">
				
					<div id="sidebar_title">Categories</div>
					
						<div id="book_categories"> 
							<ul>
								<!--
								
								
								<li><a href="#">Top Sellers</a></li>
								<li><a href="#">Best Rated</a></li>
								<li><a href="#">Genres</a></li>
								
								
								-->
								<?php getGenres(); ?>
							</ul>
						
						</div>
					
					
					
					<div id="sidebar_title">Placeholder section</div>
					
						<div id="book_categories"> 
							<ul>
								<li><a href="#">Placeholder</a></li>
								<li><a href="#">Placeholder</a></li>
								<li><a href="#">Placeholder</a></li>
								
							</ul>
						
						</div>
					
					
				</div>
				
				<div id="content_area">
				
					<div id="shopping_cart">
					
						<span > </span>
							
						
					</div>
					
					<div id="books_container">
					
						
						<?php
						
							//check url for the isbn
							if(isset($_GET['b_isbn'])){
								
								$isbn = $_GET['b_isbn'];
								
							
							
							// query that gets the isbn
							$get_b = "select * from books where isbn='$isbn'";
							
							//running query
							$run_b = mysqli_query($con, $get_b);
							
							while($row_b=mysqli_fetch_array($run_b)){
									
									//initializing variable with book name.
									$b_title = $row_b['book_title']; 
									$b_author = $row_b['author']; 
									$b_genre = $row_b['genre']; 
									$b_release = $row_b['release_date'];
									$b_price = $row_b['price']; 
									$b_rating = $row_b['rating']; 
									$b_image = $row_b['book_image'];	
									$b_description = $row_b['description'];
									$b_a_description = $row_b['author_bio'];
									$b_a_description = $row_b['author_bio'];

									//primary key
									//used to display individual datails page.
									$b_isbn = $row_b['isbn'];

									echo "
										<div id='single_book' width: 70%; height: auto;>
										
											<h3>$b_title</h3>
											<img src='admin/book_images/$b_image' width='300px' height='400px' />
										
											<p> $ $b_price </p>
											<p> Book Description: $b_description

											<div style='margin: auto; '>
											<a href='index.php' style='float:left;'> Go Back</a>
											
											
											
											<a href='index.php?b_isbn=$b_isbn'><button style='float:right'>Add to Cart</button></a>
											
											</div>
										</div>
				
									";
								}
							}
						
						?>
						
						
					
					</div>
				
				
				</div>
			
			</div>
			
			<!-- Footer -->
			<div id="footer"> 
				<h2 style ="text-align: center; padding: 30px;">Geek Text - Team 6<sup>&copy;</sup> </h2>
			
			</div>
				
		
		
		</div>
		
	</body>

</html>