-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 05, 2017 at 10:45 PM
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
  `year` int(11) NOT NULL,
  `branch` int(11) NOT NULL COMMENT '1=cs,2=ee,3=me,4=ce,5=cb',
  `rating` float NOT NULL,
  `ratedby` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `sublist`
--

CREATE TABLE `sublist` (
  `subID` int(11) NOT NULL,
  `uID` int(11) NOT NULL,
  `coID` int(11) NOT NULL,
  `clID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ttable`
--

CREATE TABLE `ttable` (
  `cID` int(11) NOT NULL,
  `cName` varchar(2000) NOT NULL,
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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uID` int(11) NOT NULL,
  `SHA_pswd` varchar(180) NOT NULL,
  `uName` varchar(200) NOT NULL,
  `email` varchar(2000) DEFAULT NULL,
  `uRole` int(11) NOT NULL,
  `uAlias` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uID`, `SHA_pswd`, `uName`, `email`, `uRole`, `uAlias`) VALUES
(1, '9d516530dba7ae296eac0599b016c6038f230397', 'Tameesh Biswas', 'biswas.cs16@iitp.ac.in', 0, 'tameeshb'),
(3, 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'Test User', 'test.cs16@iitp.ac.in', 0, 'test007');

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
  MODIFY `cID` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `subID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
