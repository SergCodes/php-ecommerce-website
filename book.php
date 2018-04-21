<!DOCTYPE html>
<html>
<?php
	session_start();
	
	include("functions/functions.php");
	include("html/header.php");
	
	$book = null;
	if(isset($_GET['isbn'])){
		
		$isbn = (int)$_GET['isbn'];
		$book = $con->query("
			SELECT books.isbn, books.book_title, AVG(book_ratings.rating) AS rating
			FROM books
			LEFT JOIN book_ratings
			ON books.isbn = book_ratings.book
			WHERE books.isbn = {$isbn}
		")->fetch_object();
}
?>	

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="styles/new_style.css" media="all" </link>
	<body>
		<?php if($book): ?>
  		<div class="book">
  			This is book "<?php echo $book->book_title; ?>".
  			<div class="book-rating">Rating: <?php echo round($book->rating); ?>/5</div>
  			<div class="book-rate">
  				Rate this book:
  				<?php foreach(range(1, 5) as $rating): ?>
  					<a href="rate.php?book=<?php echo $book->isbn; ?>&rating=<?php echo $rating; ?>"><?php echo $rating; ?></a>
  				<?php endforeach; ?>
  			</div>
  		</div>
  	<?php endif; ?>
	</body>
</head>
</html>
