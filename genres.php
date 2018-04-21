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
	<div class="content" >

		<div id="book_container">
			<?php cart(); saveForLater(); ?>
			<?php getGenres(); ?>
			<?php getBookGenre(); ?>
		</div>

	</div>

</body>
</html>
