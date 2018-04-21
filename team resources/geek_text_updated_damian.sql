-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2018 at 04:44 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

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
-- Table structure for table `books`, 'phone numbers', 'shipping address mappers', 'shipping addresses' and 'users'
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
  `rating` int(100) NOT NULL,
  `book_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `users` (
  `userID` int(10) unsigned NOT NULL,
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
  `entireNumber` varchar(45) NOT NULL,
  
  PRIMARY KEY (`userID`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `userID_UNIQUE` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `shippingaddresses` (
  `shippingaddressID` int(11) NOT NULL,
  `shippingStreet` varchar(45) NOT NULL,
  `shippingCity` varchar(45) NOT NULL,
  `shippingState` varchar(45) DEFAULT NULL,
  `shippingZip` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`shippingaddressID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `shippingaddressmapper` (
  `users_userID` int(10) unsigned NOT NULL,
  `shippingaddresses_shippingaddressID` int(11) NOT NULL,
  KEY `fk_shippingaddressmapper_users1_idx` (`users_userID`),
  KEY `fk_shippingaddressmapper_shippingaddresses1_idx` (`shippingaddresses_shippingaddressID`),
  CONSTRAINT `fk_shippingaddressmapper_shippingaddresses1` FOREIGN KEY (`shippingaddresses_shippingaddressID`) REFERENCES `shippingaddresses` (`shippingaddressID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_shippingaddressmapper_users1` FOREIGN KEY (`users_userID`) REFERENCES `users` (`userID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`, 'phone numbers', 'shipping address mappers', 'shipping addresses' and 'users'
--

INSERT INTO `books` (`book_title`, `isbn`, `author`, `author_bio`, `genre`, `release_date`, `price`, `year`, `publisher`, `description`, `quantity`, `rating`, `book_image`) VALUES
('Metabolism Revolution', 1, 'Haylie Pomroy  ', 'About the Author\r\nHaylie Pomroy is the founder and CEO of Haylie Pomroy Group, which houses her clinical practice, a membership website, and coaching services. She is Hollywoodâ€™s top nutrition guru, and her celebrity clients include Jennifer Lopez, Robert Downey, Jr., LL Cool J, Reese Witherspoon, Raquel Welch, and Cher, along with professional and Olympic athletes and corporate executives of Fortune 500 companies. Her four internationally bestselling books have been published in fourteen languages.', '7', '2018-02-27', 18, 2018, 'HarperCollins Publishers', 'Metabolism Revolution: Lose 14 Pounds in 14 Days and Keep It Off for Life by Haylie Pomroy\r\nLose 14 pounds in 14 daysâ€”harness the power of food to reset your metabolism for good with this breakthrough program complete with recipes and a detailed, easy-to-use diet plan from the #1 New York Times bestselling author of The Fast Metabolism Diet.\r\n\r\nThe diet industry has been plagued with crazy fad diets that do nothing but slow your metabolism and prime your body for yo-yo weight gain. Itâ€™s time for a change. If you want to lose weight fast, do it in a healthful way, and have the tools and resources to keep it off for life, this is the book for you.', 50, 5, '9780062691620_p0_v5_s550x406.jpg'),
('Armada', 4, 'Ernest Cline  ', '', '1', '2016-04-12', 14, 2016, 'Crown/Archetype', '', 50, 4, '9780804137270_p0_v2_s550x406.jpg'),
('Breaking Point', 5, 'Allison Brennan', '', '4', '2018-01-30', 10, 2018, 'St. Martin\'s Press', '', 20, 5, '9781250164452_p0_v1_s550x406.jpg'),
('Game of Thrones', 7, 'Geoge R.R Martin', '', '3', '2018-02-01', 20, 2018, 'Team 6', '', 30, 5, '13496.jpg'),
('Harry Potter: Cursed Child', 8, 'J.K. Rowling', '', '1', '2018-02-06', 11, 2018, 'Arthur A. Levine Books; Special Rehearsal Script ed. edition (July 31, 2016)', '', 10, 5, '518VhA3dH9L._SX329_BO1,204,203,200_.jpg'),
('The Da Vinci Code', 9, 'Dan Brown', '', '3', '2003-03-18', 11, 2003, 'Transworld', '', 150, 3, '220px-DaVinciCode.jpg'),
('Fifty Shades of Grey', 10, 'E. L. James', '', '4', '2011-05-01', 16, 2011, 'Random House', '', 200, 4234, 'Fifty shades of grey.jpg'),
('Harry Potter: Cursed Child', 11, 'J.K. Rowling', '', '1', '2018-02-21', 10, 2019, 'Crown/Archetype', '', 50, 5, 'Philosopher Stone.jpg');

INSERT INTO `users` (`userID`, `username`, `password`, `fName`, `lName`, `email`, `homeStreet`, `homeCity`, `homeState`, `homeZip`, `nickname`, `entireNumber`) VALUES
(1, 'user1', 'password1', 'Harry', 'Potter', 'harry@hogwarts.edu', '123 Abc St.', 'Magic City', 'Florida', '33133', 'hp', '305-444-1212'),
(2, 'user2', 'password2', 'Hermione', 'Granger', 'hermione@hogwarts.edu', '456 Abc St.', 'Magic City', 'Florida', '33133', 'hg', '305-555-2323'),
(0, 'guest', 'guest', 'Guest', '', '', '', '', '', '', '', '');

INSERT INTO `shippingaddresses` (`shippingaddressID`, `shippingStreet`, shippingCity, shippingState, shippingZip) VALUES
(1, '123 Abc St.', 'Magic City', 'Florida', '33133'),
(2, '456 Abc St.', 'Magic City', 'Florida', '33133');

INSERT INTO `shippingaddressmapper` (`users_userID`, `shippingaddresses_shippingaddressID`) VALUES
(1, 1),
(2, 2);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
