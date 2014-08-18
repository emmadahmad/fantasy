-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 11, 2014 at 02:58 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fantasy`
--
CREATE DATABASE IF NOT EXISTS `fantasy` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `fantasy`;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `page_id` int(10) NOT NULL AUTO_INCREMENT,
  `page_name` varchar(20) NOT NULL,
  `page_content` text,
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_id`, `page_name`, `page_content`) VALUES
(1, 'prizes', 'This is the prizes pages'),
(2, 'how_to_play', 'This is How to Play page');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_type` varchar(20) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(25) NOT NULL,
  `user_password` varchar(25) NOT NULL,
  `user_country` varchar(20) NOT NULL,
  `user_gender` varchar(10) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_type`, `user_name`, `user_email`, `user_password`, `user_country`, `user_gender`) VALUES
(1, '1', 'Emmad Ahmad', 'emmad.ahmad@gmail.com', 'emmad', 'Pakistan', 'Male');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
