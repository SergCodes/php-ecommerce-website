<!DOCTYPE html>
<html>

<?php

//include('functions/functions.php');
include("html/header.php");
include("includes/db.php");
?>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="styles/new_style.css" media="all" </link>
</head>
<body>
	<div class="content" >

		<div id="book_container">

        <?php

					cart(); saveForLater();

            $rec_limit = 5;
            /* Get total number of records */
            $sql = "SELECT count(isbn) FROM book_ratings_view";
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


            $get_b = "SELECT * FROM book_ratings_view ORDER BY avgRating DESC LIMIT $rec_limit OFFSET $offset";

            $run_b = mysqli_query($con, $get_b);

        //connection to db
            global $con;
            //get 6 random books
            //$get_b = "SELECT * FROM book_ratings_view LIMIT ";

            $run_b = mysqli_query($con, $get_b);

            $pagLink = "<div class='pagination'>";
            for ($i=$total_pages; $i>=1; $i--) {
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
                    $b_author = $row_b['author'];
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
        ?>


		</div>

	</div>

</body>
</html>
