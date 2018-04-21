<!DOCTYPE html>
<html>
<?php
include("html/header.php");

	if(isset($_GET['book'], $_GET['rating'], $_GET['anonymous']) && ($_SESSION['SESS_USERID'] > 0) ){
		$book = (int)$_GET['book'];
		$rating = (int)$_GET['rating'];
		$anonymous = $_GET['anonymous'];
		if(in_array($rating, [1, 2, 3, 4, 5])){
			$exists = $con->query("SELECT isbn FROM books WHERE isbn = {$book}")->num_rows ? true : false;
			$rated = $con->query("SELECT book userID FROM book_ratings WHERE book = {$book} AND userID = {$_SESSION['SESS_USERID']}")->num_rows ? true : false;
			if($exists){
				if($rated){
					header('Location: index.php');
				}
				else{
					$con->query("INSERT INTO book_ratings (book, rating, userID, username, anonymous) VALUES ({$book}, {$rating}, '{$_SESSION['SESS_USERNAME']}', '{$_SESSION['SESS_NICKNAME']}', '{$anonymous}')");
					header('Location: index.php');
				}
			}
		}
	}
	else{
		header('Location: loginForm.php');
	}
?>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="styles/new_style.css" media="all" </link>
</head>
</html>
