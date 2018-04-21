<!DOCTYPE html>
<html>

<?php
	include("html/header.php");
	require_once('authorize.php');
?>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="styles/new_style.css" media="all" </link>
</head>
<body>
	  <center><b><font color="black" face="Helvetica" size="5"> Welcome back,
		<?php
			$id=$_SESSION['SESS_USERID'];
			$query = mysqli_query($con, "SELECT * FROM users INNER JOIN shippingaddresses WHERE userID=$id");
			while($result = mysqli_fetch_array($query))
			{
			$nickname = $result['nickname'];
			}
			echo $nickname;
		?>! </b></center></font>
	<div class="content" >

	<?php cart();  saveForLater();?>


		<div id="book_container">
			<?php getBook(); ?>


		</div>

	</div>

</body>
</html>
