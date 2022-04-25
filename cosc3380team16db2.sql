-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2022 at 04:29 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cosc3380team16db2`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `bookID` mediumint(8) UNSIGNED NOT NULL,
  `bookISBN` varchar(17) NOT NULL,
  `bookAuthor` varchar(100) NOT NULL,
  `bookTitle` varchar(100) NOT NULL,
  `bookGenre` varchar(20) NOT NULL,
  `bookDescription` varchar(200) NOT NULL,
  `bookPublisher` varchar(40) NOT NULL,
  `bookFormat` varchar(20) NOT NULL,
  `bookSection` varchar(5) NOT NULL,
  `userID` mediumint(8) UNSIGNED NOT NULL,
  `checkOutDate` date NOT NULL,
  `returnDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bookID`, `bookISBN`, `bookAuthor`, `bookTitle`, `bookGenre`, `bookDescription`, `bookPublisher`, `bookFormat`, `bookSection`, `userID`, `checkOutDate`, `returnDate`) VALUES
(1, '0000', 'Doe, John', 'The Book of Doe', 'Religion', 'Revealing the revelations of John Doe', 'Penguin', 'Book', 'B', 2, '2022-04-23', '2022-04-23'),
(2, '9781843794622', 'Marx, Karl', 'The Communist Manifesto', 'Audiobooks', 'Often referred to but rarely read, The Communist Manifesto is one of the great documents of world history. Written by Marx and Engels and published in London in 1848 (in German originally) it presente', 'Naxos', 'CD', '6', 2, '2022-04-23', '2022-04-23'),
(3, '49781440629792', 'Green, John', 'An Abundance of Katherines', 'Young Adult', 'Having been recently dumped for the nineteenth time by a girl named Katherine, recent high school graduate and former child prodigy Colin sets off on a road trip with his best friend to try to find so', 'Penguin Young Readers Group', 'Book', '4', 4, '2022-04-25', '2022-04-24'),
(4, '6969420100696', 'Summers, Michael', 'Intro to Keyboard Building', 'Non-Fiction', 'N/A', 'New York : DK, 2014.', 'DVD', '11', 2, '2022-04-23', '0000-00-00'),
(5, '0003', 'Sun Tzu', 'Art of War', 'Strategy', 'Art of War', '', 'Print', '1', 3, '2022-04-25', '2022-04-25'),
(6, '0004', 'Art of War v.2', 'Sun Tzu and Translator', 'Strategy', 'Art of War', '', 'Paper', '1', 0, '0000-00-00', '0000-00-00'),
(7, '9781634705219 163', 'Zeiger, James', 'Minecraft: Mining and Farming', 'Minecraft', '\"Learn all about the many resources found in the world of Minecraft, from how they are gathered to what they are used for.\" --Amazon.com.', 'Ann Arbor, Michigan : Cherry Lake Publis', 'Book', '12', 0, '0000-00-00', '0000-00-00'),
(8, 'N/A', 'Rowling, J.K.', 'Harry Potter and the Deathly Hallows', 'Fantasy', '\'Give me Harry Potter,\' said Voldemort\'s voice, \'and none shall be harmed. Give me Harry Potter, and I shall leave the school untouched. Give me Harry Potter, and you will be rewarded.\' As he climbs i', 'MWT13367846', 'CD', '3', 0, '0000-00-00', '0000-00-00'),
(9, '0812035720', 'Shakespeare, William', 'Romeo and Juliet', 'Tragedies', 'Presents the original text of Shakespeare\'s play side by side with a modern version, discusses the author and the theater of his time, and provides quizzes and other study activities.', 'Woodbury, N.Y. : Barron\'s, 1985.', 'Book', '1', 0, '0000-00-00', '0000-00-00'),
(10, 'None', 'Shakespeare, William', 'Romeo and Juliet', 'Tragedies', '3 sound discs (2:50 hr.) : digital ; 4 3/4 in.', 'Naxos Audio Books, 1997.', 'CD', '5', 0, '0000-00-00', '0000-00-00'),
(11, '9780062059932 006', 'Cass, Kiera', 'The Selection', 'Young Adult Fiction', 'Sixteen-year-old America Singer is living in the caste-divided nation of Illea, which formed after the war that destroyed the United States. America is chosen to compete in the Selection--a contest to', 'New York : HarperTeen, [2012]', 'Book', '2', 0, '0000-00-00', '0000-00-00'),
(12, '9780062059963 006', 'Cass, Kiera', 'The Elite', 'Love Stories', 'Sixteen-year-old America Singer is one of only six girls still competing in the Selection--but before she can fight to win Prince Maxon and the Illean crown, she must decide where her own heart truly ', 'New York : HarperTeen, 2013.', 'Book', '2', 2, '2022-04-23', '0000-00-00'),
(13, '0307245306 978030', 'Riordan, Rick', 'The Lightning Thief', 'Fantasy', 'Twelve-year-old Percy Jackson learns he is a demigod, the son of a mortal woman and Poseidon, god of the sea. His mother sends him to a summer camp for demigods where he and his new friends set out on', 'New York : Random House/Listening Librar', 'Book', '3', 2, '2022-04-23', '0000-00-00'),
(14, 'N/A', 'Marvel', 'Spider-dlkfjg: Homecoming', 'Action', 'Thrilled by his experience with the Avengers, young Peter Parker returns home to live with his Aunt May. Under the watchful eye of mentor Tony Stark, Parker starts to embrace his newfound identity as ', 'Feige, Kevin', 'DVD', '10', 2, '2022-04-23', '0000-00-00'),
(15, '23423', 'sdfgsdfg', 'adfgsdfg', '2', 'sdfgd', 'sdgf', 'Book', 'fsgds', 0, '2022-04-23', '2022-04-23');

-- --------------------------------------------------------

--
-- Table structure for table `booktransaction`
--

CREATE TABLE `booktransaction` (
  `transactionID` int(10) UNSIGNED NOT NULL,
  `bookID` mediumint(8) UNSIGNED NOT NULL,
  `userID` mediumint(8) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `transactionType` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booktransaction`
--

INSERT INTO `booktransaction` (`transactionID`, `bookID`, `userID`, `date`, `transactionType`) VALUES
(1, 3, 4, '2022-04-24', 'out'),
(2, 3, 4, '2022-04-24', 'out'),
(3, 3, 4, '2022-04-24', 'out'),
(4, 3, 4, '2022-04-24', 'in'),
(5, 5, 4, '2022-04-24', 'out'),
(6, 5, 4, '2022-04-24', 'in'),
(7, 3, 4, '2022-04-25', 'out'),
(8, 5, 3, '2022-04-25', 'out'),
(9, 5, 3, '2022-04-25', 'in'),
(10, 5, 3, '2022-04-25', 'out');

-- --------------------------------------------------------

--
-- Table structure for table `deletedbook`
--

CREATE TABLE `deletedbook` (
  `bookISBN` varchar(17) NOT NULL,
  `bookAuthor` varchar(100) NOT NULL,
  `bookTitle` varchar(100) NOT NULL,
  `bookGenre` varchar(20) NOT NULL,
  `bookDescription` varchar(200) NOT NULL,
  `bookPublisher` varchar(40) NOT NULL,
  `bookFormat` varchar(20) NOT NULL,
  `reasonDeleted` varchar(50) NOT NULL,
  `dateDeleted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deletedbook`
--

INSERT INTO `deletedbook` (`bookISBN`, `bookAuthor`, `bookTitle`, `bookGenre`, `bookDescription`, `bookPublisher`, `bookFormat`, `reasonDeleted`, `dateDeleted`) VALUES
('123456789', 'Nathan Brueckner', 'Test Book2', 'Fiction', 'TestDescription', 'TestPublisher', 'Book', 'Destroyed', '2022-04-25');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `itemID` smallint(5) UNSIGNED NOT NULL,
  `itemName` varchar(100) NOT NULL,
  `itemSection` varchar(5) NOT NULL,
  `userID` mediumint(8) UNSIGNED NOT NULL,
  `checkOutDate` date NOT NULL,
  `returnDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`itemID`, `itemName`, `itemSection`, `userID`, `checkOutDate`, `returnDate`) VALUES
(1, 'Red Marker', '01', 1, '2022-04-23', '2022-04-23'),
(2, 'Black Marker', 'A', 2, '2022-04-23', '2022-04-23'),
(3, 'Blue Marker', '01', 0, '2022-04-25', '2022-04-25'),
(4, 'Test Item', '1', 3, '2022-04-25', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `studyroom`
--

CREATE TABLE `studyroom` (
  `roomID` tinyint(3) UNSIGNED NOT NULL,
  `roomCapacity` tinyint(3) UNSIGNED NOT NULL,
  `roomAccommodations` varchar(50) NOT NULL,
  `roomAvailable` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studyroom`
--

INSERT INTO `studyroom` (`roomID`, `roomCapacity`, `roomAccommodations`, `roomAvailable`) VALUES
(1, 10, 'Test', 0),
(2, 15, 'Project', 0),
(3, 10, 'asg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` mediumint(8) UNSIGNED NOT NULL,
  `userUsername` varchar(30) NOT NULL,
  `userPassword` varchar(30) NOT NULL,
  `userFirstName` varchar(30) NOT NULL,
  `userLastName` varchar(30) NOT NULL,
  `userType` tinyint(4) NOT NULL,
  `userBirthDate` date NOT NULL,
  `userAddressLine1` varchar(100) NOT NULL,
  `userAddressLine2` varchar(20) NOT NULL,
  `userCity` varchar(50) NOT NULL,
  `userState` varchar(15) NOT NULL,
  `userZIP` varchar(5) NOT NULL,
  `itemLimit` tinyint(3) UNSIGNED NOT NULL,
  `itemsCheckedOut` tinyint(3) UNSIGNED NOT NULL,
  `bookLimit` tinyint(3) UNSIGNED NOT NULL,
  `booksCheckedOut` tinyint(3) UNSIGNED NOT NULL,
  `libraryFines` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `userUsername`, `userPassword`, `userFirstName`, `userLastName`, `userType`, `userBirthDate`, `userAddressLine1`, `userAddressLine2`, `userCity`, `userState`, `userZIP`, `itemLimit`, `itemsCheckedOut`, `bookLimit`, `booksCheckedOut`, `libraryFines`) VALUES
(1, 'testUser', '1234', 'Test', 'User', 1, '1995-04-20', '123 Test Address', 'Apt. 2401', 'Houston', 'TX', '77026', 6, 0, 5, 2, 0),
(2, 'testUser2', '1234', 'Test', 'User', 2, '2002-04-03', 'Test Address', ' ', 'Houston', 'TX', '77025', 10, 1, 10, 4, 0),
(3, 'admin', 'admin', 'Admin', 'Account', 1, '1993-04-07', '6120 Sam Houston Pkwy E', '', 'Houston', 'TX', '77066', 5, 0, 5, 0, 0),
(4, 'user', 'user', 'User', 'Account', 2, '0000-00-00', '6120 Sam Houston Pkwy E', '', 'Houston', 'TX', '77066', 5, 0, 5, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bookID`);

--
-- Indexes for table `booktransaction`
--
ALTER TABLE `booktransaction`
  ADD PRIMARY KEY (`transactionID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`itemID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `studyroom`
--
ALTER TABLE `studyroom`
  ADD PRIMARY KEY (`roomID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `userUsername` (`userUsername`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `bookID` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `booktransaction`
--
ALTER TABLE `booktransaction`
  MODIFY `transactionID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `itemID` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `studyroom`
--
ALTER TABLE `studyroom`
  MODIFY `roomID` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
