-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2016 at 01:48 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lead2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `EMAIL` varchar(50) NOT NULL,
  PRIMARY KEY (`EMAIL`),
  KEY `EMAIL` (`EMAIL`),
  KEY `EMAIL_2` (`EMAIL`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`EMAIL`) VALUES
('yyyyyyy');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `PIC` varchar(500) NOT NULL,
  PRIMARY KEY (`email`),
  KEY `EMAIL` (`email`),
  KEY `EMAIL_2` (`email`),
  KEY `EMAIL_3` (`email`),
  KEY `PASS` (`password`),
  KEY `EMAIL_4` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`fname`, `lname`, `email`, `password`, `PIC`) VALUES
('w', 'e', 'aq', '3', ''),
('mwmw', 'ww', 'qqq', 'www', 'images/profile_default.png'),
('n', 'm', 'yyyyyyy', 'vb', '');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `PostId` int(11) NOT NULL,
  `COMMENT` varchar(500) NOT NULL,
  `clientEmail` varchar(50) NOT NULL,
  PRIMARY KEY (`PostId`,`COMMENT`,`clientEmail`),
  KEY `PostId` (`PostId`),
  KEY `clientEmail` (`clientEmail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE IF NOT EXISTS `follow` (
  `PostId` int(11) NOT NULL,
  `userEMAIL` varchar(50) NOT NULL,
  PRIMARY KEY (`PostId`,`userEMAIL`),
  KEY `PostId` (`PostId`),
  KEY `userEMAIL` (`userEMAIL`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE IF NOT EXISTS `likes` (
  `tyname` varchar(15) NOT NULL,
  `useremail` varchar(50) NOT NULL,
  PRIMARY KEY (`tyname`,`useremail`),
  KEY `tyname` (`tyname`),
  KEY `useremail` (`useremail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`tyname`, `useremail`) VALUES
('q', 'yyyyyyy');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `posts` varchar(500) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Email` (`Email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `TypeName` varchar(15) NOT NULL,
  PRIMARY KEY (`TypeName`),
  KEY `type` (`TypeName`),
  KEY `type_2` (`TypeName`),
  KEY `type_3` (`TypeName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`TypeName`) VALUES
('q');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`email`),
  KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`) VALUES
('yyyyyyy');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `Foreign key` FOREIGN KEY (`EMAIL`) REFERENCES `client` (`EMAIL`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `Comment-Client` FOREIGN KEY (`clientEmail`) REFERENCES `client` (`EMAIL`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Comment-Post` FOREIGN KEY (`PostId`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `follow`
--
ALTER TABLE `follow`
  ADD CONSTRAINT `User-Follow` FOREIGN KEY (`userEMAIL`) REFERENCES `user` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Post-Follow` FOREIGN KEY (`PostId`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `User-Like` FOREIGN KEY (`useremail`) REFERENCES `user` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Type-Like` FOREIGN KEY (`tyname`) REFERENCES `type` (`TypeName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `Admin-Post` FOREIGN KEY (`Email`) REFERENCES `admin` (`EMAIL`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `Admin-Client` FOREIGN KEY (`email`) REFERENCES `client` (`EMAIL`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
