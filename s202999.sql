-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 16, 2016 at 04:37 PM
-- Server version: 5.5.49
-- PHP Version: 5.3.10-1ubuntu3.22

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `s202999`
--

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
  `RegId` bigint(20) NOT NULL AUTO_INCREMENT,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `name` text NOT NULL,
  `Fname` text NOT NULL,
  PRIMARY KEY (`RegId`),
  UNIQUE KEY `RegId` (`RegId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`RegId`, `email`, `password`, `name`, `Fname`) VALUES
(47, 'u1@p.it', 'p', 'user', 'one'),
(48, 'u2@p.it', 'p2', 'user', 'second'),
(49, 'u3@p.it', 'p3', 'user', 'third');

-- --------------------------------------------------------

--
-- Table structure for table `tblreservation`
--

CREATE TABLE IF NOT EXISTS `tblreservation` (
  `ResId` bigint(20) NOT NULL AUTO_INCREMENT,
  `UserId` bigint(20) NOT NULL,
  `DeviceId` int(11) NOT NULL,
  `StartHour` int(11) NOT NULL,
  `StartMin` int(11) NOT NULL,
  `durationTime` int(11) NOT NULL,
  `EndHour` int(11) DEFAULT NULL,
  `EndMin` int(11) DEFAULT NULL,
  `StartSeedIndex` int(11) NOT NULL DEFAULT '0',
  `EndSeedIndex` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ResId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=75 ;

--
-- Dumping data for table `tblreservation`
--

INSERT INTO `tblreservation` (`ResId`, `UserId`, `DeviceId`, `StartHour`, `StartMin`, `durationTime`, `EndHour`, `EndMin`, `StartSeedIndex`, `EndSeedIndex`) VALUES
(66, 47, 1, 7, 10, 20, 7, 30, 430, 450),
(68, 47, 2, 7, 25, 30, 7, 55, 445, 475),
(69, 48, 1, 10, 15, 20, 10, 35, 615, 635),
(70, 48, 2, 10, 30, 40, 11, 10, 630, 670),
(71, 49, 1, 12, 25, 33, 12, 58, 745, 778),
(72, 49, 2, 12, 40, 50, 13, 30, 760, 810),
(73, 47, 1, 15, 11, 33, 15, 44, 911, 944),
(74, 48, 2, 15, 30, 40, 16, 10, 930, 970);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
