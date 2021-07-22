-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2019 at 07:12 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `question`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `ID` int(11) NOT NULL,
  `Answer` text NOT NULL,
  `Question_ID` int(11) NOT NULL,
  `Answer_UserID` int(11) NOT NULL,
  `upvote` int(11) NOT NULL,
  `downvote` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`ID`, `Answer`, `Question_ID`, `Answer_UserID`, `upvote`, `downvote`) VALUES
(37, 'kaung p', 7, 1, 3, 3),
(38, 'kaung p', 7, 1, 0, 0),
(39, 'kaung p', 7, 1, 0, 0),
(40, 'kaung p', 7, 1, 0, 0),
(41, 'ok', 9, 1, 0, 0),
(42, 'ok', 9, 1, 0, 0),
(43, 'ok', 9, 1, 0, 0),
(44, 'ok', 9, 1, 0, 0),
(45, 'ok', 9, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `ID` int(11) NOT NULL,
  `Title` text,
  `Type` text,
  `Question` text,
  `DATE` date DEFAULT NULL,
  `Question_UserID` int(11) NOT NULL,
  `upvote_count` int(11) NOT NULL,
  `downvote_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`ID`, `Title`, `Type`, `Question`, `DATE`, `Question_UserID`, `upvote_count`, `downvote_count`) VALUES
(7, 'Test2', 'Gym, Health, Beauty', '\r\nTest 2', '2019-07-24', 1, 9, 2),
(9, 'Hello', 'Tech, Beauty, Sport', 'Hi Ngr Pr', '2019-07-25', 1, 3, 1),
(10, 'What is Machine Learning?', 'Tech', 'ok', '2019-07-26', 1, 2, 0),
(11, 'What is Machine Learning?', 'Tech', 'ok', '2019-07-26', 1, 0, 0),
(12, 'What is Machine Learning?', 'Tech', 'ok', '2019-07-26', 1, 0, 1),
(13, 'br ll?', 'Gym', 'ok', '2019-07-26', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `BD_Date` date NOT NULL,
  `University` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `Type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Name`, `Password`, `Email`, `BD_Date`, `University`, `Gender`, `Type`) VALUES
(1, 'Kaung ', 'kaung', 'kuang@gmail.com', '0000-00-00', '', '', ''),
(2, 'BakeBake', 'bakebake', 'bake1@gmail.com', '0000-00-00', '', '', ''),
(3, 'BakeBake', 'bake', 'bake@gmail.com', '0000-00-00', '', '', ''),
(4, 'Lol', '123', 'rofl@gmail.com', '0000-00-00', '', '', ''),
(5, 'Myat', '123', 'kaung@gmail.com', '0000-00-00', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
