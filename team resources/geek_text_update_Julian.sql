-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 07, 2018 at 01:30 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `geek_text`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_title` varchar(255) NOT NULL,
  `isbn` int(100) NOT NULL,
  `author` text NOT NULL,
  `author_bio` text NOT NULL,
  `genre` text NOT NULL,
  `release_date` text NOT NULL,
  `price` int(100) NOT NULL,
  `year` year(4) NOT NULL,
  `publisher` text NOT NULL,
  `description` text NOT NULL,
  `quantity` int(100) NOT NULL,
  `book_image` text NOT NULL,
  `sold` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_title`, `isbn`, `author`, `author_bio`, `genre`, `release_date`, `price`, `year`, `publisher`, `description`, `quantity`, `book_image`, `sold`) VALUES
('Metabolism Revolution', 1, 'Haylie Pomroy  ', 'About the Author\r\nHaylie Pomroy is the founder and CEO of Haylie Pomroy Group, which houses her clinical practice, a membership website, and coaching services. She is Hollywoodâ€™s top nutrition guru, and her celebrity clients include Jennifer Lopez, Robert Downey, Jr., LL Cool J, Reese Witherspoon, Raquel Welch, and Cher, along with professional and Olympic athletes and corporate executives of Fortune 500 companies. Her four internationally bestselling books have been published in fourteen languages.', '7', '2018-02-27', 18, 2018, 'HarperCollins Publishers', 'Metabolism Revolution: Lose 14 Pounds in 14 Days and Keep It Off for Life by Haylie Pomroy\r\nLose 14 pounds in 14 daysâ€”harness the power of food to reset your metabolism for good with this breakthrough program complete with recipes and a detailed, easy-to-use diet plan from the #1 New York Times bestselling author of The Fast Metabolism Diet.\r\n\r\nThe diet industry has been plagued with crazy fad diets that do nothing but slow your metabolism and prime your body for yo-yo weight gain. Itâ€™s time for a change. If you want to lose weight fast, do it in a healthful way, and have the tools and resources to keep it off for life, this is the book for you.', 50, '9780062691620_p0_v5_s550x406.jpg', 1),
('Armada', 4, 'Ernest Cline  ', '', '1', '2016-04-12', 14, 2016, 'Crown/Archetype', '', 50, '9780804137270_p0_v2_s550x406.jpg', 1),
('Breaking Point', 5, 'Allison Brennan', '', '4', '2018-01-30', 10, 2018, 'St. Martin\'s Press', '', 20, '9781250164452_p0_v1_s550x406.jpg', 0),
('Game of Thrones', 7, 'Geoge R.R Martin', '', '3', '2018-02-01', 20, 2018, 'Team 6', '', 30, '13496.jpg', 4),
('Harry Potter: Cursed Child', 8, 'J.K. Rowling', '', '1', '2018-02-06', 11, 2018, 'Arthur A. Levine Books; Special Rehearsal Script ed. edition (July 31, 2016)', '', 10, '518VhA3dH9L._SX329_BO1,204,203,200_.jpg', 2),
('The Da Vinci Code', 9, 'Dan Brown', '', '3', '2003-03-18', 11, 2003, 'Transworld', '', 150, '220px-DaVinciCode.jpg', 4),
('Fifty Shades of Grey', 10, 'E. L. James', '', '4', '2011-05-01', 16, 2011, 'Random House', '', 200, 'Fifty shades of grey.jpg', 0),
('Harry Potter: Cursed Child', 11, 'J.K. Rowling', '', '1', '2018-02-21', 10, 2019, 'Crown/Archetype', '', 50, 'Philosopher Stone.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `book_genres`
--

CREATE TABLE `book_genres` (
  `genre_id` int(100) NOT NULL,
  `genre_type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_genres`
--

INSERT INTO `book_genres` (`genre_id`, `genre_type`) VALUES
(1, 'Science Fiction'),
(2, 'Drama'),
(3, 'Action and Adventure'),
(4, 'Romance'),
(5, 'Mystery'),
(6, 'Horror'),
(7, 'Health'),
(8, 'History');

-- --------------------------------------------------------

--
-- Table structure for table `book_ratings`
--

CREATE TABLE `book_ratings` (
  `id` int(11) NOT NULL,
  `book` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `userID` int(10) UNSIGNED NOT NULL,
  `anonymous` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_ratings`
--

INSERT INTO `book_ratings` (`id`, `book`, `rating`, `userID`, `anonymous`) VALUES
(1, 1, 1, 1, 'no'),
(2, 4, 2, 1, 'no'),
(3, 5, 3, 1, 'no'),
(4, 7, 4, 1, 'no'),
(5, 8, 5, 1, 'no'),
(6, 9, 2, 1, 'no'),
(7, 10, 3, 1, 'no'),
(8, 11, 2, 1, 'no'),
(9, 1, 5, 2, 'no'),
(10, 4, 4, 2, 'no'),
(11, 5, 1, 2, 'no'),
(12, 7, 2, 2, 'no');

-- --------------------------------------------------------

--
-- Stand-in structure for view `book_ratings_view`
-- (See below for the actual view)
--
CREATE TABLE `book_ratings_view` (
`isbn` int(100)
,`book_title` varchar(255)
,`book_image` text
,`price` int(100)
,`avgRating` decimal(14,4)
);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `book_id` int(100) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shippingaddresses`
--

CREATE TABLE `shippingaddresses` (
  `shippingaddressID` int(11) NOT NULL,
  `shippingStreet` varchar(45) NOT NULL,
  `shippingCity` varchar(45) NOT NULL,
  `shippingState` varchar(45) DEFAULT NULL,
  `shippingZip` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shippingaddresses`
--

INSERT INTO `shippingaddresses` (`shippingaddressID`, `shippingStreet`, `shippingCity`, `shippingState`, `shippingZip`) VALUES
(0, '123 Abc St.', 'Magic City', 'Florida', '33133'),
(1, '456 Abc St.', 'Magic City', 'Florida', '33133');

-- --------------------------------------------------------

--
-- Table structure for table `shippingaddressmapper`
--

CREATE TABLE `shippingaddressmapper` (
  `users_userID` int(10) UNSIGNED NOT NULL,
  `shippingaddresses_shippingaddressID` int(11) NOT NULL,
	`address_order` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shippingaddressmapper`
--

INSERT INTO `shippingaddressmapper` (`users_userID`, `shippingaddresses_shippingaddressID`, `address_order`) VALUES
(0, 0, 1),
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(10) UNSIGNED NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `fName` varchar(45) NOT NULL,
  `lName` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `homeStreet` varchar(45) NOT NULL,
  `homeCity` varchar(45) NOT NULL,
  `homeState` varchar(45) NOT NULL,
  `homeZip` varchar(45) DEFAULT NULL,
  `nickname` varchar(45) NOT NULL,
  `entireNumber` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `password`, `fName`, `lName`, `email`, `homeStreet`, `homeCity`, `homeState`, `homeZip`, `nickname`, `entireNumber`) VALUES
(0, 'guest', 'guest', 'Guest', '', '', '', '', '', '', '', ''),
(1, 'user1', 'password1', 'Harry', 'Potter', 'harry@hogwarts.edu', '123 Abc St.', 'Magic City', 'Florida', '33133', 'hp', '305-444-1212'),
(2, 'user2', 'password2', 'Hermione', 'Granger', 'hermione@hogwarts.edu', '456 Abc St.', 'Magic City', 'Florida', '33133', 'hg', '305-555-2323');

-- --------------------------------------------------------

CREATE TABLE `credit_cards` (`cc_ID` INT(16) NOT NULL, `cc_number` TEXT NOT NULL , `cc_name` TEXT NOT NULL , `exp_date` TEXT NOT NULL , `sec_code` INT(16) NOT NULL ) ENGINE = InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE `credit_cards_mapper` ( `userID` INT(16) NOT NULL , `cc_ID` INT(16) NOT NULL, `cc_order` INT(16)) ENGINE = InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `credit_cards` (`cc_ID`, `cc_number`, `cc_name`, `exp_date`, `sec_code`) VALUES (0 ,'1234432112344321', 'Paul Kersey', '02/23', 123);

INSERT INTO `credit_cards_mapper` (`userID`, `cc_ID`, `cc_order`) VALUES (1, 0, 1);

--
-- Structure for view `book_ratings_view`
--
DROP TABLE IF EXISTS `book_ratings_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `book_ratings_view`  AS  select `b`.`isbn` AS `isbn`,`b`.`book_title` AS `book_title`,`b`.`book_image` AS `book_image`,`b`.`price` AS `price`,avg(`br`.`rating`) AS `avgRating` from (`books` `b` join `book_ratings` `br` on((`b`.`isbn` = `br`.`book`))) group by `b`.`isbn`,`b`.`book_title`,`b`.`book_image`,`b`.`price` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`isbn`);

--
-- Indexes for table `book_genres`
--
ALTER TABLE `book_genres`
  ADD PRIMARY KEY (`genre_id`);

--
-- Indexes for table `book_ratings`
--
ALTER TABLE `book_ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `shippingaddresses`
--
ALTER TABLE `shippingaddresses`
  ADD PRIMARY KEY (`shippingaddressID`);

--
-- Indexes for table `shippingaddressmapper`
--
ALTER TABLE `shippingaddressmapper`
  ADD KEY `fk_shippingaddressmapper_users1_idx` (`users_userID`),
  ADD KEY `fk_shippingaddressmapper_shippingaddresses1_idx` (`shippingaddresses_shippingaddressID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD UNIQUE KEY `userID_UNIQUE` (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `isbn` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `book_genres`
--
ALTER TABLE `book_genres`
  MODIFY `genre_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `book_ratings`
--
ALTER TABLE `book_ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `shippingaddressmapper`
--
ALTER TABLE `shippingaddressmapper`
  ADD CONSTRAINT `fk_shippingaddressmapper_shippingaddresses1` FOREIGN KEY (`shippingaddresses_shippingaddressID`) REFERENCES `shippingaddresses` (`shippingaddressID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_shippingaddressmapper_users1` FOREIGN KEY (`users_userID`) REFERENCES `users` (`userID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;




