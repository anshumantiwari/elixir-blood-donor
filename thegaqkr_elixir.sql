-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Sep 01, 2016 at 09:25 AM
-- Server version: 5.6.23-72.1-log
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `thegaqkr_elixir`
--

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE IF NOT EXISTS `banks` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `address` varchar(400) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pin` int(11) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lang` float(10,6) NOT NULL,
  `time_open` varchar(100) NOT NULL,
  `days` varchar(100) NOT NULL,
  `phone_numbers` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(100) NOT NULL,
  `blood_group` varchar(20) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `notif_title` varchar(300) NOT NULL,
  `notif_text` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pins`
--

CREATE TABLE IF NOT EXISTS `pins` (
  `country_code` varchar(2) COLLATE armscii8_bin NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `pin_code` varchar(20) COLLATE armscii8_bin NOT NULL,
  `place_name` varchar(180) COLLATE armscii8_bin NOT NULL,
  `state` varchar(100) COLLATE armscii8_bin NOT NULL,
  `state_code` varchar(20) COLLATE armscii8_bin NOT NULL,
  `sub_1` varchar(100) COLLATE armscii8_bin NOT NULL,
  `sub_code_1` varchar(20) COLLATE armscii8_bin NOT NULL,
  `sub_2` varchar(100) COLLATE armscii8_bin NOT NULL,
  `sub_code_2` varchar(20) COLLATE armscii8_bin NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lang` float(10,6) NOT NULL,
  `accuracy` int(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin AUTO_INCREMENT=925181 ;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `para` text NOT NULL,
  `city` varchar(200) NOT NULL,
  `blood_group` varchar(4) NOT NULL,
  `phon_number` varchar(10) NOT NULL,
  `time` int(11) NOT NULL,
  `pin` int(11) NOT NULL,
  `address` varchar(400) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lang` float(10,6) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `pin` int(11) NOT NULL,
  `user_login` varchar(200) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `user_pass` varchar(200) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `donated_to` text NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lang` float(10,6) NOT NULL,
  `blood_group` varchar(5) NOT NULL,
  `city` varchar(100) NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `user_login` (`user_login`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
