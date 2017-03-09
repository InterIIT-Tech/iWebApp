-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 09, 2017 at 04:27 PM
-- Server version: 5.7.17-0ubuntu0.16.04.1
-- PHP Version: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iwa`
--

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

CREATE TABLE `clubs` (
  `clID` int(11) NOT NULL,
  `clName` varchar(200) NOT NULL,
  `clOwner` int(11) NOT NULL COMMENT 'ID of admin of the club'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comID` int(11) NOT NULL,
  `comOn` int(11) NOT NULL COMMENT '1=post,2=course',
  `comTitle` varchar(2000) NOT NULL,
  `comContent` varchar(2000) NOT NULL,
  `hidden` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `cCode` varchar(5) NOT NULL,
  `cID` int(11) NOT NULL,
  `cName` varchar(200) NOT NULL,
  `Description` varchar(2000) NOT NULL,
  `year` int(11) NOT NULL,
  `branch` int(11) NOT NULL COMMENT '1=cs,2=ee,3=me,4=ce,5=cb',
  `rating` float NOT NULL,
  `img` varchar(200) DEFAULT 'pic01.jpg' COMMENT 'file name after img/courses/',
  `ratedby` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`cCode`, `cID`, `cName`, `Description`, `year`, `branch`, `rating`, `img`, `ratedby`) VALUES
('CS101', 1, 'Intro to CS', 'In this introduction to computer programming course, you’ll learn and practice key computer science concepts by building your own versions of popular web applications. You’ll learn Python, a powerful, easy-to-learn, and widely used programming language, and you’ll explore computer science basics, as you build your own search engine and social network.', 1, 1, 5, 'cs101.jpg', 1),
('CS112', 2, 'Intro to CS lab', 'Lab sessions based on CS101', 1, 1, 5, 'cs112.jpg', 1),
('EE101', 3, 'Electrical Circuits', 'This course introduces students to the basic components of electronics: diodes, transistors, and op amps.  It covers the basic operation and some common applications.', 1, 2, 3, 'ee101.jpg', 1),
('ME102', 4, 'Engineering Mechanics', 'Engineering mechanics is the application of mechanics to solve problems involving common engineering elements. The goal of this Engineering Mechanics course is to expose students to problems in mechanics as applied to plausibly real-world scenarios.', 1, 3, 3, 'me102.jpg', 1),
('CE110', 5, 'Engineering Drawing', 'An engineering drawing, a type of technical drawing, is used to fully and clearly define requirements for engineered items. Engineering drawing (the activity) produces engineering drawings (the documents). More than merely the drawing of pictures, it is also a language—a graphical language that communicates ideas and information from one mind to another.[1] Most especially, it communicates all needed information from the engineer, who designed a part, to the workers, who will make it.', 1, 4, 1, 'ce110.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notify`
--

CREATE TABLE `notify` (
  `nID` int(11) NOT NULL,
  `nContent` varchar(2000) NOT NULL,
  `nGroup` int(11) NOT NULL,
  `nSender` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `postID` int(11) NOT NULL,
  `postTitle` varchar(2000) NOT NULL,
  `postContent` varchar(10000) NOT NULL,
  `postType` int(11) DEFAULT NULL,
  `featured` int(11) NOT NULL DEFAULT '1',
  `postAuthor` int(11) NOT NULL,
  `postDate` datetime NOT NULL,
  `notice` int(11) NOT NULL DEFAULT '0',
  `priority` int(11) NOT NULL DEFAULT '1',
  `hidden` int(11) NOT NULL DEFAULT '0',
  `image` varchar(2000) DEFAULT NULL,
  `notify` int(11) NOT NULL DEFAULT '1',
  `audience` varchar(10) NOT NULL DEFAULT '1' COMMENT '1 for all and cID for course and clubid for clubs'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rev`
--

CREATE TABLE `rev` (
  `cID` int(11) NOT NULL,
  `uID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sublist`
--

CREATE TABLE `sublist` (
  `subID` int(11) NOT NULL,
  `uID` int(11) NOT NULL,
  `coID` int(11) DEFAULT NULL,
  `clID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sublist`
--

INSERT INTO `sublist` (`subID`, `uID`, `coID`, `clID`) VALUES
(13, 11, 2, NULL),
(14, 11, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ttable`
--

CREATE TABLE `ttable` (
  `cID` int(11) NOT NULL,
  `cName` varchar(2000) NOT NULL,
  `cCode` varchar(6) NOT NULL,
  `mon` int(11) NOT NULL,
  `mon_` int(11) NOT NULL,
  `tue` int(11) NOT NULL,
  `tue_` int(11) NOT NULL,
  `wed` int(11) NOT NULL,
  `wed_` int(11) NOT NULL,
  `thur` int(11) NOT NULL,
  `thur_` int(11) NOT NULL,
  `fri` int(11) NOT NULL,
  `fri_` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ttable`
--

INSERT INTO `ttable` (`cID`, `cName`, `cCode`, `mon`, `mon_`, `tue`, `tue_`, `wed`, `wed_`, `thur`, `thur_`, `fri`, `fri_`) VALUES
(1, 'Intro to CS', 'CS101', 900, 1100, 900, 1100, 900, 1100, 900, 1100, 900, 1100);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uID` int(11) NOT NULL,
  `SHA_pswd` varchar(180) NOT NULL,
  `uName` varchar(200) NOT NULL,
  `email` varchar(2000) DEFAULT NULL,
  `year` int(11) NOT NULL DEFAULT '1',
  `uRole` int(11) NOT NULL,
  `uAlias` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uID`, `SHA_pswd`, `uName`, `email`, `year`, `uRole`, `uAlias`) VALUES
(1, '9d516530dba7ae296eac0599b016c6038f230397', 'Tameesh Biswas', 'biswas.cs16@iitp.ac.in', 1, 0, 'tameeshb'),
(3, 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'Test User', 'test.cs16@iitp.ac.in', 1, 0, 'test007'),
(5, 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', '', 1, 0, ''),
(7, '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'Full name', 'email', 1, 0, 'usrname'),
(8, '3c363836cf4e16666669a25da280a1865c2d2874', 'a', 'c', 1, 0, 'b'),
(9, 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'test', 'test', 1, 0, 'test'),
(11, 'b444ac06613fc8d63795be9ad0beaf55011936ac', 'test1', 'test1', 1, 0, 'test1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`clID`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comID`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`cID`);

--
-- Indexes for table `notify`
--
ALTER TABLE `notify`
  ADD PRIMARY KEY (`nID`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postID`);

--
-- Indexes for table `sublist`
--
ALTER TABLE `sublist`
  ADD PRIMARY KEY (`subID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uID`),
  ADD UNIQUE KEY `uName` (`uName`),
  ADD UNIQUE KEY `uAlias` (`uAlias`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `clID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `cID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `notify`
--
ALTER TABLE `notify`
  MODIFY `nID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sublist`
--
ALTER TABLE `sublist`
  MODIFY `subID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
