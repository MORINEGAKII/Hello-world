-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 31, 2015 at 06:40 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sodetso_sottuc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Username` (`Username`,`Email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `Name`, `Username`, `Email`, `Password`, `date_added`) VALUES
(2, 'admin', 'admin', 'admin@mail.com', 'admin', '2015-03-30 18:19:10');

-- --------------------------------------------------------

--
-- Table structure for table `contestants`
--

CREATE TABLE IF NOT EXISTS `contestants` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `RegNo` varchar(255) NOT NULL,
  `Course` varchar(255) NOT NULL,
  `Year` varchar(255) NOT NULL,
  `Semester` varchar(255) NOT NULL,
  `Post` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `RegNo` (`RegNo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `contestants`
--

INSERT INTO `contestants` (`ID`, `Name`, `RegNo`, `Course`, `Year`, `Semester`, `Post`, `date_added`) VALUES
(1, 'Francis Maina', '214', '1', 'First', 'First', '1', '2015-03-31 19:11:22'),
(2, 'Maureen Gackii', '46sfdv', '1', 'Second', 'Second', '2', '2015-03-31 19:11:42');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CourseCode` varchar(255) NOT NULL,
  `CourseName` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `CourseCode` (`CourseCode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`ID`, `CourseCode`, `CourseName`, `date_added`) VALUES
(1, 'BIT', 'BSC. IT', '2015-03-31 19:10:24'),
(2, 'BBIT', 'BSC. BIT', '2015-03-31 19:10:39');

-- --------------------------------------------------------

--
-- Table structure for table `log_details`
--

CREATE TABLE IF NOT EXISTS `log_details` (
  `userid` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `log` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_details`
--

INSERT INTO `log_details` (`userid`, `date`, `log`) VALUES
(1, '2015-03-31 19:12:41', 1),
(1, '2015-03-31 19:38:57', 1),
(0, '2031-03-15 06:39:10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Message` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `messages`
--


-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Postcode` varchar(255) NOT NULL,
  `Postname` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Postcode` (`Postcode`,`Postname`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`ID`, `Postcode`, `Postname`, `date_added`) VALUES
(1, 'Chr', 'Chairman', '2015-03-31 19:09:54'),
(2, 'V.CHr', 'Vice Chairman', '2015-03-31 19:10:07');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Surname` varchar(255) NOT NULL,
  `Othernames` varchar(255) NOT NULL,
  `RegNo` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Course` varchar(255) NOT NULL,
  `Year` varchar(255) NOT NULL,
  `Semester` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `Voted` int(11) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `RegNo` (`RegNo`,`Email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`ID`, `Surname`, `Othernames`, `RegNo`, `Email`, `Password`, `Course`, `Year`, `Semester`, `Status`, `Voted`, `date_added`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@mail.com', 'admin', 'BSC. IT', 'Second', 'First', 'Active', 1, '2015-03-31 19:12:11');

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE IF NOT EXISTS `voters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post` int(4) NOT NULL,
  `userid` int(4) NOT NULL,
  `cont_id` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`id`, `post`, `userid`, `cont_id`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 2);
