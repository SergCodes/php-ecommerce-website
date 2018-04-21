-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2018 at 03:25 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

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
-- Table structure for table `book_ratings`
--

CREATE TABLE `book_ratings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `userID` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `anonymous` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_ratings`
--

INSERT INTO `book_ratings` (`book`, `rating`, `userID`, `username`, `anonymous`) VALUES
(1, 1, '1', 'user1', 'no'),
(4, 2, '1', 'user1', 'no'),
(5, 3, '1', 'user1', 'no'),
(7, 4, '1', 'user1', 'no'),
(8, 5, '1', 'user1', 'no'),
(9, 2, '1', 'user1', 'no'),
(10, 3, '1', 'user1', 'no'),
(11, 2, '1', 'user1', 'no'),
(1, 5, '2', 'user2', 'no'),
(4, 4, '2', 'user2', 'no'),
(5, 1, '2', 'user2', 'no'),
(7, 2, '2', 'user2', 'no'),
(20, 5, '1', 'user1', 'no'),
(21, 1, '1', 'user1', 'no'),
(22, 2, '1', 'user1', 'no'),
(23, 3, '1', 'user1', 'no'),
(24, 4, '1', 'user1', 'no'),
(25, 5, '1', 'user1', 'no'),
(26, 4, '1', 'user1', 'no'),
(27, 3, '1', 'user1', 'no'),
(28, 2, '1', 'user1', 'no'),
(29, 1, '1', 'user1', 'no'),
(30, 4, '1', 'user1', 'no'),
(31, 5, '1', 'user1', 'no');

-- --------------------------------------------------------

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_title`, `isbn`, `author`, `author_bio`, `genre`, `release_date`, `price`, `year`, `publisher`, `description`, `quantity`, `book_image`) VALUES
('Metabolism Revolution', 1, 'Haylie Pomroy  ', 'About the Author\r\nHaylie Pomroy is the founder and CEO of Haylie Pomroy Group, which houses her clinical practice, a membership website, and coaching services. She is Hollywoodâ€™s top nutrition guru, and her celebrity clients include Jennifer Lopez, Robert Downey, Jr., LL Cool J, Reese Witherspoon, Raquel Welch, and Cher, along with professional and Olympic athletes and corporate executives of Fortune 500 companies. Her four internationally bestselling books have been published in fourteen languages.', '7', '2018-02-27', 18, 2018, 'HarperCollins Publishers', 'Metabolism Revolution: Lose 14 Pounds in 14 Days and Keep It Off for Life by Haylie Pomroy\r\nLose 14 pounds in 14 daysâ€”harness the power of food to reset your metabolism for good with this breakthrough program complete with recipes and a detailed, easy-to-use diet plan from the #1 New York Times bestselling author of The Fast Metabolism Diet.\r\n\r\nThe diet industry has been plagued with crazy fad diets that do nothing but slow your metabolism and prime your body for yo-yo weight gain. Itâ€™s time for a change. If you want to lose weight fast, do it in a healthful way, and have the tools and resources to keep it off for life, this is the book for you.', 50, '9780062691620_p0_v5_s550x406.jpg'),
('Armada', 4, 'Ernest Cline  ', '', '1', '2016-04-12', 14, 2016, 'Crown/Archetype', '', 50, '9780804137270_p0_v2_s550x406.jpg'),
('Breaking Point', 5, 'Allison Brennan', '', '4', '2018-01-30', 10, 2018, 'St. Martin\'s Press', '', 20, '9781250164452_p0_v1_s550x406.jpg'),
('Game of Thrones', 7, 'Geoge R.R Martin', '', '3', '2018-02-01', 20, 2018, 'Team 6', '', 30, '13496.jpg'),
('Harry Potter: Cursed Child', 8, 'J.K. Rowling', '', '1', '2018-02-06', 11, 2018, 'Arthur A. Levine Books; Special Rehearsal Script ed. edition (July 31, 2016)', '', 10, '518VhA3dH9L._SX329_BO1,204,203,200_.jpg'),
('The Da Vinci Code', 9, 'Dan Brown', '', '3', '2003-03-18', 11, 2003, 'Transworld', '', 150, '220px-DaVinciCode.jpg'),
('Fifty Shades of Grey', 10, 'E. L. James', '', '4', '2011-05-01', 16, 2011, 'Random House', '', 200, 'Fifty shades of grey.jpg'),
('Harry Potter: Philosophers Stone', 11, 'J.K. Rowling', '', '1', '2018-02-21', 10, 2019, 'Crown/Archetype', '', 50, 'Philosopher Stone.jpg'),
('The Hunger Games', 20, 'Suzanne Collins', 'Since 1991, Suzanne Collins has been busy writing for children’s television. She has worked on the staffs of several Nickelodeon shows, including the Emmy-nominated hit Clarissa Explains it All and The Mystery Files of Shelby Woo. For preschool viewers, she penned multiple stories for the Emmy-nominated Little Bear and Oswald. She also co-wrote the critically acclaimed Rankin/Bass Christmas special, Santa, Baby! Most recently she was the Head Writer for Scholastic Entertainment’s Clifford’s Puppy Days. While working on a Kids WB show called Generation O! she met children’s author James Proimos, who talked her into giving children’s books a try. Thinking one day about Alice in Wonderland, she was struck by how pastoral the setting must seem to kids who, like her own, lived in urban surroundings. In New York City, you’re much more likely to fall down a manhole than a rabbit hole and, if you do, you’re not going to find a tea party. What you might find...? Well, that’s the story of Gregor the Overlander, the first book in her five-part series, The Underland Chronicles. Suzanne also has a rhyming picture book illustrated by Mike Lester entitled When Charlie McButton Lost Power. She currently lives in Connecticut with her family and a pair of feral kittens they adopted from their backyard. The books she is most successful for in teenage eyes are The Hunger Games, Catching Fire and Mockingjay. These books have won several awards, including the GA Peach Award.', '3', '2008-09-14', 15, 2008, 'Scholastic Press', 'The nation of Panem, formed from a post-apocalyptic North America, is a country that consists of a wealthy Capitol region surrounded by 12 poorer districts. Early in its history, a rebellion led by a 13th district against the Capitol resulted in its destruction and the creation of an annual televised event known as the Hunger Games. In punishment, and as a reminder of the power and grace of the Capitol, each district must yield one boy and one girl between the ages of 12 and 18 through a lottery system to participate in the games. The tributes are chosen during the annual Reaping and are forced to fight to the death, leaving only one survivor to claim victory. When 16-year-old Katnisss young sister, Prim, is selected as District 12s female representative, Katniss volunteers to take her place. She and her male counterpart Peeta, are pitted against bigger, stronger representatives, some of whom have trained for this their whole lives. , she sees it as a death sentence. But Katniss has been close to death before. For her, survival is second nature.', 100, '2767052.jpg'),
('To Kill a Mockingbird', 21, 'Harper Lee ', 'Harper Lee, known as Nelle, was born in the Alabama town of Monroeville, the youngest of four children of Amasa Coleman Lee and Frances Cunningham Finch Lee. Her father, a former newspaper editor and proprietor, was a lawyer who served on the state legislature from 1926 to 1938. As a child, Lee was a tomboy and a precocious reader, and enjoyed the friendship of her schoolmate and neighbor, the young Truman Capote. After graduating from high school in Monroeville, Lee enrolled at the all-female Huntingdon College in Montgomery (1944-45), and then pursued a law degree at the University of Alabama (1945-50), pledging the Chi Omega sorority. While there, she wrote for several student publications and spent a year as editor of the campus humor magazine, "Ramma-Jamma". Though she did not complete the law degree, she studied for a summer in Oxford, England, before moving to New York in 1950, where she worked as a reservation clerk with Eastern Air Lines and BOAC. Lee continued as a reservation clerk until the late 50s, when she devoted herself to writing. She lived a frugal life, traveling between her cold-water-only apartment in New York to her family home in Alabama to care for her father. Having written several long stories, Harper Lee located an agent in November 1956. The following month at the East 50th townhouse of her friends Michael Brown and Joy Williams Brown, she received a gift of a years wages with a note: "You have one year off from your job to write whatever you please. Merry Christmas." Within a year, she had a first draft. Working with J. B. Lippincott & Co. editor Tay Hohoff, she completed To Kill a Mockingbird in the summer of 1959. Published July 11, 1960, the novel was an immediate bestseller and won great critical acclaim, including the Pulitzer Prize for Fiction in 1961. It remains a bestseller with more than 30 million copies in print. In 1999, it was voted "Best Novel of the Century" in a poll by the Library Journal.', '8', '2006-23-05', 15, 2006, 'Harper Perennial Modern Classics', 'The unforgettable novel of a childhood in a sleepy Southern town and the crisis of conscience that rocked it, To Kill A Mockingbird became both an instant bestseller and a critical success when it was first published in 1960. It went on to win the Pulitzer Prize in 1961 and was later made into an Academy Award-winning film, also a classic. Compassionate, dramatic, and deeply moving, To Kill A Mockingbird takes readers to the roots of human behavior - to innocence and experience, kindness and cruelty, love and hatred, humor and pathos. Now with over 18 million copies in print and translated into forty languages, this regional story by a young Alabama woman claims universal appeal. Harper Lee always considered her book to be a simple love story. Today it is regarded as a masterpiece of American literature.', 100, '2657.jpg'),
('Twilight', 22, 'Stephenie Meyer', 'I was born in Connecticut in 1973, during a brief blip in my familys otherwise western U.S. existence. We were settled in Phoenix by the time I was four, and I think of myself as a native. The unusual spelling of my name was a gift from my father, Stephen (+ ie = me). Though I have had my name spelled wrong on pretty much everything my entire life long, I must admit that it makes it easier to Google myself now. I filled the "Jan Brady" spot in my family--the second of three girls; however, unlike the Bradys, none of my three brothers are steps, and all of them are younger than all the girls. I went to high school in Scottsdale, Arizona, the kind of place where every fall a few girls would come back to school with new noses and there were Porsches in the student lot. (For the record, I have my original nose and never had a car until I was in my twenties.) I was awarded a National Merit Scholarship, and I used it to pay my way to Brigham Young University, in Provo, Utah. I majored in English but concentrated on literature rather than creative writing, mostly because I didnt consider reading books "work." (As long as I was going to be doing something anyway, I might as well get course credit for it, right?) I met my husband, Pancho (his real name is Christiaan), when I was four, but we were never anywhere close to being childhood sweethearts; in fact, though we saw each other at least weekly through church activities, I cant recall a single instance when we so much as greeted each other with a friendly wave, let alone exchanged actual words. This may have been for the best, because when we did eventually get around to exchanging words, sixteen years after our first meeting, it only took nine months from the first "hello" to the wedding; of course, we were able to skip over a lot of the getting-to-know you parts. (Many of our conversations would go something like this: "This one time, when I was ten, I broke my hand at a party when--" "Yeah. I know what happened. I was there, remember?") Weve been married for ten-and-a-half years now and have three beautiful, brilliant, wonderful boys who often remind me of chimpanzees on crack. I cant write without music, and my biggest muse is, ironically enough, the band Muse. My other favorite sources of inspiration are Linkin Park, My Chemical Romance, Coldplay, The All American Rejects, Travis, The Strokes, Brand New, U2, Kasabian, Jimmy Eat World, and Weezer, to mention a few.', '1', '2006-06-09', 10, 2006, 'Little, Brown and Company', 'About three things I was absolutely positive. First, Edward was a vampire. Second, there was a part of him—and I didnt know how dominant that part might be—that thirsted for my blood. And third, I was unconditionally and irrevocably in love with him. In the first book of the Twilight Saga, internationally bestselling author Stephenie Meyer introduces Bella Swan and Edward Cullen, a pair of star-crossed lovers whose forbidden relationship ripens against the backdrop of small-town suspicion and a mysterious coven of vampires. This is a love story with bite.', 100, '41865.jpg'),
('Harry Potter and the Order of the Phoenix', 23, 'J.K. Rowling', '', '1', '2004-10-08', 10, 2004, 'Scholastic Inc.', 'Harry Potter and the Order of the Phoenix is the fifth novel in the Harry Potter series, written by J. K. Rowling. It follows Harry Potters struggles through his fifth year at Hogwarts School of Witchcraft and Wizardry, including the surreptitious return of the antagonist Lord Voldemort, O.W.L. exams, and an obstructive Ministry of Magic. The novel was published on 21 June 2003 by Bloomsbury in the United Kingdom, Scholastic in the United States, and Raincoast in Canada. Five million copies were sold in the first 24 hours of publication. It is the longest book of the series. Harry Potter and the Order of the Phoenix has won several awards, including being named an American Library Association Best Book for Young Adults in 2003. The book has also been made into a film, which was released in 2007, and into a video game by Electronic Arts.', 100, '2.jpg'),
('The Book Thief', 24, 'Markus Zusak', 'Markus Zusak was born in 1975 and is the author of five books, including the international bestseller, The Book Thief , which is translated into more than forty languages. First released in 2005, The Book Thief has spent more than a decade on the New York Times bestseller list, and still remains there to this day. His first three books, The Underdog, Fighting Ruben Wolfe and When Dogs Cry (also known as Getting the Girl) , released between 1999 and 2001, were all published internationally and garnered a number of awards and honours in his native Australia and the USA.', '8', '2006-14-03', 12, 2006, 'Alfred A. Knopf', 'Trying to make sense of the horrors of World War II, Death relates the story of Liesel--a young German girl whose book-stealing and story-telling talents help sustain her family and the Jewish man they are hiding, as well as their neighbors.', 100, '19063.jpg'),
('The Chronicles of Narnia', 25, 'C.S. Lewis', '', '1', '2001-02-10', 15, 2001, 'HarperCollins', 'Journeys to the end of the world, fantastic creatures, and epic battles between good and evil—what more could any reader ask for in one book? The book that has it all is The Lion, the Witch and the Wardrobe, written in 1949 by Clive Staples Lewis. But Lewis did not stop there. Six more books followed, and together they became known as The Chronicles of Narnia. For the past fifty years, The Chronicles of Narnia have transcended the fantasy genre to become part of the canon of classic literature. Each of the seven books is a masterpiece, drawing the reader into a land where magic meets reality, and the result is a fictional world whose scope has fascinated generations. This edition presents all seven books—unabridged—in one impressive volume. The books are presented here in chronlogical order, each chapter graced with an illustration by the original artist, Pauline Baynes. Deceptively simple and direct, The Chronicles of Narnia continue to captivate fans with adventures, characters, and truths that speak to readers of all ages, even fifty years after they were first published.', 100, '519BHPC8P2L.jpg'),
('Animal Farm', 26, 'George Orwell', '', '8', '1945-17-08', 5, 1945, 'George Orwell', 'As ferociously fresh as it was more than a half century ago, this remarkable allegory of a downtrodden society of overworked, mistreated animals, and their quest to create a paradise of progress, justice, and equality is one of the most scathing satires ever published. As we witness the rise and bloody fall of the revolutionary animals, we begin to recognize the seeds of totalitarianism in the most idealistic organization; and in our most charismatic leaders, the souls of our cruelest oppressors.', 100, '7613.jpg'),
('Gone with the Wind', 27, 'Margaret Mitchell', '', '4', '1940-17-01', 5, 1940, 'Macmillan Publishers', 'Gone with the Wind is a novel written by Margaret Mitchell, first published in 1936. The story is set in Clayton County, Georgia, and Atlanta during the American Civil War and Reconstruction era. It depicts the struggles of young Scarlett OHara, the spoiled daughter of a well-to-do plantation owner, who must use every means at her disposal to claw her way out of the poverty she finds herself in after Shermans March to the Sea. A historical novel, the story is a Bildungsroman or coming-of-age story, with the title taken from a poem written by Ernest Dowson. Gone with the Wind was popular with American readers from the onset and was the top American fiction bestseller in the year it was published and in 1937. As of 2014, a Harris poll found it to be the second favorite book of American readers, just behind the Bible. More than 30 million copies have been printed worldwide.', 100, '18405.jpg'),
('The Fault in Our Stars', 28, 'John Green', '', '2', '2014-14-06', 25, 2014, 'Dutton Books', 'Despite the tumor-shrinking medical miracle that has bought her a few years, Hazel has never been anything but terminal, her final chapter inscribed upon diagnosis. But when a gorgeous plot twist named Augustus Waters suddenly appears at Cancer Kid Support Group, Hazels story is about to be completely rewritten. Insightful, bold, irreverent, and raw, The Fault in Our Stars is award-winning author John Greens most ambitious and heartbreaking work yet, brilliantly exploring the funny, thrilling, and tragic business of being alive and in love.', 100, '11870085.jpg'),
('The Hobbit', 29, 'J. R. R. Tolkien', '', '1', '2012-06-12', 20, 2012, 'Allen & Unwin', 'A great modern classic and the prelude to The Lord of the Rings. Bilbo Baggins is a hobbit who enjoys a comfortable, unambitious life, rarely traveling any farther than his pantry or cellar. But his contentment is disturbed when the wizard Gandalf and a company of dwarves arrive on his doorstep one day to whisk him away on an adventure. They have launched a plot to raid the treasure hoard guarded by Smaug the Magnificent, a large and very dangerous dragon. Bilbo reluctantly joins their quest, unaware that on his journey to the Lonely Mountain he will encounter both a magic ring and a frightening creature known as Gollum.', 100, '51uLvJlKpNL._SX321_BO1,204,203,200_.jpg'),
('Temple of the Dragonslayer', 30, 'Tim Waggoner', '', '1', '2004-07-01', 15, 2004, 'Mirrorstone', 'Dragonlance: The New Adventures is a series of young adult novels based on the long-running adult fantasy book series, Dragonlance. The series is published by Mirrorstone Books, the young reader imprint of Wizards of the Coast. Launched in July 2004 with the release of its first two books, Dragonlance: The New Adventures continues to release new books on a bimonthly schedule. The series begins in the summer after the events of the Dragonlance Chronicles trilogy by Margaret Weis and Tracy Hickman. Written by a recurring group of authors and featuring all new characters created specifically for The New Adventures, the series begins when a young girl named Nearra wakes up on a forest path with no idea how she got there, and no memory of who she is. She is soon joined by several new friends who plan to unravel the mystery behind her missing memories. Together these new companions begin a journey across the lands of Krynn that will test them to their limits as they deal with the trials of growing up in a harsh world filled with mystical beasts and power hungry villains.', 100, '51UPTkuJgdL._SX324_BO1,204,203,200_.jpg'),
('Essential Scrum: A Practical Guide', 31, 'Kenneth S. Rubin', '', '7', '2012-01-01', 14, 2012, 'Addison-Wesley Professional', 'If you want to use Scrum to develop innovative products and services that delight your customers, Essential Scrum is the complete, single-source reference you’ve been searching for. Leading Scrum coach and trainer Kenny Rubin illuminates the values, principles, and practices of Scrum, and describes flexible, proven approaches that can help you implement it far more effectively. Whether you are new to Scrum or years into your use, this book will introduce, clarify, and deepen your Scrum knowledge at the team, product, and portfolio levels. Drawing from Rubin’s experience helping hundreds of organizations succeed with Scrum, this book provides easy-to-digest descriptions enhanced by more than two hundred illustrations based on an entirely new visual icon language for describing Scrum’s roles, artifacts, and activities. Essential Scrum will provide every team member, manager, and executive with a common understanding of Scrum, a shared vocabulary they can use in applying it, and practical knowledge for deriving maximum value from it.', 100, '516Z45foGsL._SX381_BO1,204,203,200_.jpg');


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
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `book_id` int(100) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

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
(1, 'user1', 'password1', 'Harry', 'Potter', 'harry@hogwarts.edu', '123 Abc St.', 'Magic City', 'Florida', '33133', 'hp', '305-444-1212'),
(2, 'user2', 'password2', 'Hermione', 'Granger', 'hermione@hogwarts.edu', '456 Abc St.', 'Magic City', 'Florida', '33133', 'hg', '305-555-2323'),
(0, 'guest', 'guest', 'Guest', '', '', '', '', '', '', '', '');




CREATE TABLE `credit_cards` (`cc_ID` INT(16) NOT NULL, `cc_number` TEXT NOT NULL , `cc_name` TEXT NOT NULL , `exp_date` TEXT NOT NULL , `sec_code` INT(16) NOT NULL ) ENGINE = InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE `credit_cards_mapper` ( `userID` INT(16) NOT NULL , `cc_ID` INT(16) NOT NULL, `cc_order` INT(16)) ENGINE = InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `credit_cards` (`cc_ID`, `cc_number`, `cc_name`, `exp_date`, `sec_code`) VALUES (0 ,'1234432112344321', 'Paul Kersey', '02/23', 123);

INSERT INTO `credit_cards_mapper` (`userID`, `cc_ID`, `cc_order`) VALUES (1, 0, 1);


--
-- View for vs and ratings, no duplicates.
--

CREATE VIEW book_ratings_view
AS
SELECT
      b.isbn
    , b.book_title
    , b.book_image
    , b.price
    , b.year
	, b.author
    , AVG(br.rating) AS avgRating
FROM books b
INNER JOIN book_ratings br ON b.isbn = br.book
GROUP BY
      b.isbn
    , b.book_title
    , b.author
    , b.book_image
    , b.price
    , b. year
;
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
