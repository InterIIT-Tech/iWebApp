-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 25, 2017 at 02:41 PM
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
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `uID` int(11) NOT NULL,
  `type` int(11) NOT NULL COMMENT '1=course;2=club',
  `cID` int(11) NOT NULL,
  `cName` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`uID`, `type`, `cID`, `cName`) VALUES
(1, 1, 1, 'Intro to CS');

-- --------------------------------------------------------

--
-- Table structure for table `around`
--

CREATE TABLE `around` (
  `pID` int(11) NOT NULL,
  `pName` varchar(2000) NOT NULL,
  `pX` varchar(200) NOT NULL,
  `pY` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `around`
--

INSERT INTO `around` (`pID`, `pName`, `pX`, `pY`) VALUES
(1, 'Main Gate', '25.533542', '84.855469'),
(2, 'Admin Block', '25.535587', '84.851309'),
(3, 'Tutorial Block 9', '25.532431', '84.851975'),
(4, 'Mechanical Workshop', '25.532693', '84.849391'),
(5, 'IITP Canteen', '25.537215', '84.851754'),
(6, 'Boys\' Hostel', '25.540570', '84.851472');

-- --------------------------------------------------------

--
-- Table structure for table `assign`
--

CREATE TABLE `assign` (
  `aID` int(11) NOT NULL,
  `aName` varchar(200) NOT NULL,
  `aScope` int(11) NOT NULL,
  `dir` varchar(2000) NOT NULL,
  `lastdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign`
--

INSERT INTO `assign` (`aID`, `aName`, `aScope`, `dir`, `lastdate`) VALUES
(1, 'lol', 1, 'cs', '2017-03-24'),
(2, 'Data Structures', 1, '1111\r\n', '2017-03-01');

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
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `eID` int(11) NOT NULL,
  `eName` varchar(200) NOT NULL,
  `eDate` date NOT NULL,
  `eScope` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `gID` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `user` int(11) NOT NULL,
  `path` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`gID`, `title`, `user`, `path`) VALUES
(10, 'Auroras<3', 1, 'gallery/1490229837.0172_1_a9eced2a0014bf18c7c0fcf713cb36147791254f.jpg'),
(11, 'NY', 1, 'gallery/1490229852.0565_1_c633844bb97edfc9c7776861fcdf281a2b9c347d.jpg'),
(12, 'Some random Mountains', 1, 'gallery/1490263538.7904_1_45c1243c8f7f2084fbaf559396bdd1354df392b3.jpg'),
(13, 'Some random Mountains', 1, 'gallery/1490263542.3684_1_45c1243c8f7f2084fbaf559396bdd1354df392b3.jpg'),
(14, 'Some random Mountains', 1, 'gallery/1490263545.8233_1_45c1243c8f7f2084fbaf559396bdd1354df392b3.jpg'),
(15, 'Some random image', 1, 'gallery/1490263828.5857_1_b712857b069893c93bc60c578923be4c0afc2260.jpg'),
(16, 'This is some text', 1, 'gallery/1490263930.0124_1_512b750ae8061f8bf29d8c85251cb7afb5319d0c.jpg'),
(17, 'Random', 1, 'gallery/1490263972.7397_1_c6ec3a5b817feb32dafdab422116de69b5dc5de2.jpg'),
(18, '', 1, 'gallery/1490286489.79_1_406b4bca34125d7b1bf530d18a572daeeba36522.png'),
(19, '', 1, 'gallery/1490368877.1498_1_39c9f0e980faa7dbdf5b3480f3fe07c5197b4346.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `lnf`
--

CREATE TABLE `lnf` (
  `iID` int(11) NOT NULL,
  `uID` int(11) NOT NULL,
  `type` int(11) NOT NULL COMMENT '1 for lost 2 for found',
  `contact` varchar(20) NOT NULL,
  `iName` varchar(200) NOT NULL,
  `iPlace` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lnf`
--

INSERT INTO `lnf` (`iID`, `uID`, `type`, `contact`, `iName`, `iPlace`) VALUES
(1, 1, 2, '99', 'Thing', 'Placelol'),
(2, 1, 1, '3', '4', NULL),
(3, 1, 1, '3', '4', NULL),
(4, 1, 2, '9920126830', 'Mobile Phone', 'Canteen'),
(22, 1, 1, '99', 'mobile', NULL),
(23, 1, 1, '99', 'mobile', NULL),
(24, 1, 1, '', '', NULL),
(25, 1, 1, '', '', NULL),
(26, 1, 2, '9920126830', 'Mobile', 'Canteen'),
(27, 1, 1, '0', 'Mobile', NULL),
(28, 1, 1, '0', 'Mobile', NULL),
(29, 1, 1, '0', 'Mobile', NULL),
(30, 1, 1, '0', 'Umbrella', NULL),
(31, 1, 2, 'lol', 'Water Bottle', 'canteen'),
(32, 1, 1, 'sef', 'bottle', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notify`
--

CREATE TABLE `notify` (
  `nID` int(11) NOT NULL,
  `nContent` varchar(2000) NOT NULL,
  `nGroup` int(11) NOT NULL,
  `nSender` int(11) NOT NULL,
  `url` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notify`
--

INSERT INTO `notify` (`nID`, `nContent`, `nGroup`, `nSender`, `url`) VALUES
(1, 'New Assignment!', 1, 1, 'http://gmail.com');

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

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postID`, `postTitle`, `postContent`, `postType`, `featured`, `postAuthor`, `postDate`, `notice`, `priority`, `hidden`, `image`, `notify`, `audience`) VALUES
(8, 'Test Post1', 'Hello World!', 1, 1, 1, '2017-03-12 05:19:03', 0, 1, 0, 'http://cdn01.androidauthority.net/wp-content/uploads/2015/11/00-best-backgrounds-and-wallpaper-apps-for-android.jpg', 0, '1'),
(9, 'test', 'test', 1, 1, 1, '2017-03-12 05:20:13', 0, 1, 0, 'http://media02.hongkiat.com/ww-flower-wallpapers/dandelion.jpg', 0, '1'),
(12, 'Hey ! New Post!', 'Check if this works?', 1, 1, 1, '2017-03-23 05:58:00', 0, 1, 0, 'gallery/1490228869.3927_1_c19b2a6ac3b9450cdc276a0c4b417ecf84c99a1cpng', 0, '1'),
(13, '', '', 1, 1, 1, '2017-03-24 01:55:51', 0, 1, 0, '', 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
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
(67, 1, 4, NULL),
(68, 1, 1, NULL),
(69, 1, 2, NULL),
(70, 1, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `submission`
--

CREATE TABLE `submission` (
  `aID` int(11) NOT NULL,
  `date` date NOT NULL,
  `filename` int(11) NOT NULL,
  `marks` int(11) DEFAULT NULL,
  `uID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submission`
--

INSERT INTO `submission` (`aID`, `date`, `filename`, `marks`, `uID`) VALUES
(1, '2017-03-22', 1, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ttable`
--

CREATE TABLE `ttable` (
  `cID` int(11) NOT NULL,
  `cName` varchar(2000) NOT NULL,
  `cCode` varchar(6) NOT NULL,
  `cColor` varchar(6) DEFAULT '35ad5d',
  `mon` int(11) DEFAULT NULL,
  `mon_` int(11) DEFAULT NULL,
  `tue` int(11) DEFAULT NULL,
  `tue_` int(11) DEFAULT NULL,
  `wed` int(11) DEFAULT NULL,
  `wed_` int(11) DEFAULT NULL,
  `thur` int(11) DEFAULT NULL,
  `thur_` int(11) DEFAULT NULL,
  `fri` int(11) DEFAULT NULL,
  `fri_` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ttable`
--

INSERT INTO `ttable` (`cID`, `cName`, `cCode`, `cColor`, `mon`, `mon_`, `tue`, `tue_`, `wed`, `wed_`, `thur`, `thur_`, `fri`, `fri_`) VALUES
(1, 'Intro to CS', 'CS101', '35ad5d', 900, 1100, 900, 1100, NULL, NULL, 900, 1100, 900, 1100),
(2, 'Intro to CS lab', 'CS112', '6398ed', 1400, 1700, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Electrical Circuits', 'EE101', 'b25520', NULL, NULL, 1100, 1300, NULL, NULL, NULL, NULL, NULL, NULL);

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
  `uAlias` varchar(200) NOT NULL,
  `lsn` int(11) DEFAULT NULL COMMENT 'Last seen notification ID'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uID`, `SHA_pswd`, `uName`, `email`, `year`, `uRole`, `uAlias`, `lsn`) VALUES
(1, '9d516530dba7ae296eac0599b016c6038f230397', 'Tameesh Biswas', 'biswas.cs16@iitp.ac.in', 1, 0, 'tameeshb', 0),
(3, 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'Test User', 'test.cs16@iitp.ac.in', 1, 0, 'test007', 0),
(5, 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', '', 1, 0, '', 0),
(7, '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'Full name', 'email', 1, 0, 'usrname', 0),
(8, '3c363836cf4e16666669a25da280a1865c2d2874', 'a', 'c', 1, 0, 'b', 0),
(9, 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'test', 'test', 1, 0, 'test', 0),
(11, 'b444ac06613fc8d63795be9ad0beaf55011936ac', 'test1', 'test1', 1, 0, 'test1', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`cID`);

--
-- Indexes for table `around`
--
ALTER TABLE `around`
  ADD UNIQUE KEY `pID` (`pID`);

--
-- Indexes for table `assign`
--
ALTER TABLE `assign`
  ADD PRIMARY KEY (`aID`);

--
-- Indexes for table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`clID`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`cID`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD UNIQUE KEY `eID` (`eID`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`gID`);

--
-- Indexes for table `lnf`
--
ALTER TABLE `lnf`
  ADD UNIQUE KEY `iID` (`iID`);

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
-- Indexes for table `ttable`
--
ALTER TABLE `ttable`
  ADD PRIMARY KEY (`cID`),
  ADD UNIQUE KEY `cID` (`cID`);

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
-- AUTO_INCREMENT for table `around`
--
ALTER TABLE `around`
  MODIFY `pID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `assign`
--
ALTER TABLE `assign`
  MODIFY `aID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `clID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `cID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `eID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `lnf`
--
ALTER TABLE `lnf`
  MODIFY `iID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `notify`
--
ALTER TABLE `notify`
  MODIFY `nID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `sublist`
--
ALTER TABLE `sublist`
  MODIFY `subID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
