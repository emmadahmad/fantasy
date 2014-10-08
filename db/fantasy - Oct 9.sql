-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2014 at 12:30 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fantasy`
--

-- --------------------------------------------------------

--
-- Table structure for table `batting_stats`
--

CREATE TABLE IF NOT EXISTS `batting_stats` (
  `player_id` int(10) NOT NULL,
  `innings` int(10) NOT NULL DEFAULT '0',
  `not_outs` int(10) NOT NULL DEFAULT '0',
  `balls_faced` int(10) NOT NULL DEFAULT '0',
  `runs` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`player_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batting_stats`
--

INSERT INTO `batting_stats` (`player_id`, `innings`, `not_outs`, `balls_faced`, `runs`) VALUES
(2, 2, 1, 60, 120),
(3, 0, 0, 0, 0),
(4, 0, 0, 0, 0),
(5, 0, 0, 0, 0),
(6, 0, 0, 0, 0),
(7, 0, 0, 0, 0),
(8, 0, 0, 0, 0),
(9, 0, 0, 0, 0),
(10, 0, 0, 0, 0),
(11, 0, 0, 0, 0),
(12, 0, 0, 0, 0),
(13, 0, 0, 0, 0),
(14, 0, 0, 0, 0),
(15, 0, 0, 0, 0),
(16, 0, 0, 0, 0),
(17, 0, 0, 0, 0),
(18, 0, 0, 0, 0),
(19, 0, 0, 0, 0),
(20, 0, 0, 0, 0),
(21, 0, 0, 0, 0),
(22, 0, 0, 0, 0),
(23, 0, 0, 0, 0),
(24, 0, 0, 0, 0),
(25, 0, 0, 0, 0),
(26, 0, 0, 0, 0),
(27, 0, 0, 0, 0),
(28, 0, 0, 0, 0),
(29, 0, 0, 0, 0),
(30, 0, 0, 0, 0),
(31, 0, 0, 0, 0),
(32, 0, 0, 0, 0),
(33, 0, 0, 0, 0),
(34, 0, 0, 0, 0),
(35, 0, 0, 0, 0),
(36, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bowling_stats`
--

CREATE TABLE IF NOT EXISTS `bowling_stats` (
  `player_id` int(10) NOT NULL,
  `innings` int(10) NOT NULL DEFAULT '0',
  `balls` int(10) NOT NULL DEFAULT '0',
  `wickets` int(10) NOT NULL DEFAULT '0',
  `runs` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`player_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bowling_stats`
--

INSERT INTO `bowling_stats` (`player_id`, `innings`, `balls`, `wickets`, `runs`) VALUES
(2, 0, 0, 0, 0),
(3, 0, 0, 0, 0),
(4, 0, 0, 0, 0),
(5, 0, 0, 0, 0),
(6, 0, 0, 0, 0),
(7, 0, 0, 0, 0),
(8, 0, 0, 0, 0),
(9, 0, 0, 0, 0),
(10, 0, 0, 0, 0),
(11, 0, 0, 0, 0),
(12, 0, 0, 0, 0),
(13, 0, 0, 0, 0),
(14, 0, 0, 0, 0),
(15, 0, 0, 0, 0),
(16, 0, 0, 0, 0),
(17, 0, 0, 0, 0),
(18, 0, 0, 0, 0),
(19, 0, 0, 0, 0),
(20, 0, 0, 0, 0),
(21, 0, 0, 0, 0),
(22, 0, 0, 0, 0),
(23, 0, 0, 0, 0),
(24, 0, 0, 0, 0),
(25, 0, 0, 0, 0),
(26, 0, 0, 0, 0),
(27, 0, 0, 0, 0),
(28, 0, 0, 0, 0),
(29, 0, 0, 0, 0),
(30, 0, 0, 0, 0),
(31, 0, 0, 0, 0),
(32, 0, 0, 0, 0),
(33, 0, 0, 0, 0),
(34, 0, 0, 0, 0),
(35, 0, 0, 0, 0),
(36, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `country_id` int(10) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(25) NOT NULL,
  `country_flag` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`country_id`, `country_name`, `country_flag`) VALUES
(1, 'Pakistan', '0'),
(3, 'India', '0'),
(4, 'England', '0');

-- --------------------------------------------------------

--
-- Table structure for table `dismissal_types`
--

CREATE TABLE IF NOT EXISTS `dismissal_types` (
  `dismissal_id` int(3) NOT NULL AUTO_INCREMENT,
  `dismissal_name` varchar(25) NOT NULL,
  `dismissal_abbr` varchar(25) NOT NULL,
  PRIMARY KEY (`dismissal_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `dismissal_types`
--

INSERT INTO `dismissal_types` (`dismissal_id`, `dismissal_name`, `dismissal_abbr`) VALUES
(1, 'Bowled', 'b'),
(2, 'LBW', 'lbw'),
(3, 'Caught', 'c'),
(4, 'Stumped', 'st'),
(5, 'Run Out', 'run out'),
(6, 'Hit Wicket', 'hit wicket'),
(7, 'NOT OUT', 'NOT OUT');

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE IF NOT EXISTS `matches` (
  `match_id` int(10) NOT NULL AUTO_INCREMENT,
  `home_team` int(10) NOT NULL,
  `away_team` int(10) NOT NULL,
  `match_venue` int(10) NOT NULL,
  `match_date` datetime NOT NULL,
  PRIMARY KEY (`match_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`match_id`, `home_team`, `away_team`, `match_venue`, `match_date`) VALUES
(10, 1, 3, 1, '2014-09-27 19:06:00'),
(11, 1, 4, 1, '2014-09-27 22:06:00'),
(12, 3, 1, 1, '2014-09-28 19:07:00'),
(13, 3, 4, 1, '2014-09-28 22:07:00'),
(14, 4, 1, 1, '2014-09-29 19:07:00'),
(15, 4, 3, 1, '2014-09-29 22:08:00');

-- --------------------------------------------------------

--
-- Table structure for table `match_info`
--

CREATE TABLE IF NOT EXISTS `match_info` (
  `match_id` int(10) NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `man_of_the_match` int(10) NOT NULL DEFAULT '0',
  `toss_won` int(10) NOT NULL DEFAULT '0',
  `batting_first` int(10) NOT NULL DEFAULT '0',
  `winner` int(10) NOT NULL DEFAULT '0',
  `winner_runs` int(10) NOT NULL DEFAULT '0',
  `winner_wickets` int(10) NOT NULL DEFAULT '0',
  `winner_extras` int(10) NOT NULL DEFAULT '0',
  `loser_runs` int(10) NOT NULL DEFAULT '0',
  `loser_wickets` int(10) NOT NULL DEFAULT '0',
  `loser_extras` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`match_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `match_info`
--

INSERT INTO `match_info` (`match_id`, `completed`, `man_of_the_match`, `toss_won`, `batting_first`, `winner`, `winner_runs`, `winner_wickets`, `winner_extras`, `loser_runs`, `loser_wickets`, `loser_extras`) VALUES
(10, 1, 0, 3, 1, 1, 321, 6, 30, 197, 10, 15),
(11, 1, 0, 4, 4, 4, 315, 10, 0, 314, 9, 0),
(12, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(13, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(14, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(15, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

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
-- Table structure for table `players`
--

CREATE TABLE IF NOT EXISTS `players` (
  `player_id` int(10) NOT NULL AUTO_INCREMENT,
  `player_name` varchar(50) NOT NULL,
  `player_country` int(10) NOT NULL,
  `player_type` int(10) NOT NULL,
  `player_photo` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`player_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`player_id`, `player_name`, `player_country`, `player_type`, `player_photo`) VALUES
(4, 'Pak1', 1, 1, NULL),
(5, 'Pak2', 1, 1, NULL),
(6, 'Pak3', 1, 1, NULL),
(7, 'Pak4', 1, 3, NULL),
(8, 'Pak5', 1, 2, NULL),
(9, 'Pak6', 1, 2, NULL),
(10, 'pak7', 1, 4, NULL),
(11, 'pak8', 1, 3, NULL),
(12, 'Pak9', 1, 2, NULL),
(13, 'Pak10', 1, 1, NULL),
(14, 'Pak11', 1, 2, NULL),
(15, 'Eng1', 4, 1, NULL),
(16, 'Eng2', 4, 1, NULL),
(17, 'Eng3', 4, 1, NULL),
(18, 'Eng4', 4, 1, NULL),
(19, 'Eng5', 4, 3, NULL),
(20, 'Eng6', 4, 3, NULL),
(21, 'Eng7', 4, 2, NULL),
(22, 'Eng8', 4, 2, NULL),
(23, 'Eng9', 4, 2, NULL),
(24, 'Eng10', 4, 2, NULL),
(25, 'Eng11', 4, 4, NULL),
(26, 'Ind1', 3, 1, NULL),
(27, 'Ind2', 3, 1, NULL),
(28, 'Ind3', 3, 1, NULL),
(29, 'Ind4', 3, 1, NULL),
(30, 'Ind5', 3, 2, NULL),
(31, 'Ind6', 3, 2, NULL),
(32, 'Ind7', 3, 2, NULL),
(33, 'Ind8', 3, 2, NULL),
(34, 'Ind9', 3, 3, NULL),
(35, 'Ind10', 3, 3, NULL),
(36, 'Ind11', 3, 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `player_match_info`
--

CREATE TABLE IF NOT EXISTS `player_match_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `match_id` int(10) NOT NULL,
  `player_id` int(10) NOT NULL,
  `country_id` int(10) NOT NULL DEFAULT '0',
  `batted` tinyint(1) NOT NULL DEFAULT '0',
  `bowled` tinyint(1) NOT NULL DEFAULT '0',
  `batting_position` int(10) NOT NULL DEFAULT '0',
  `bat_runs` int(10) NOT NULL DEFAULT '0',
  `balls_faced` int(10) NOT NULL DEFAULT '0',
  `bowl_runs` int(10) NOT NULL DEFAULT '0',
  `overs` float(10,1) NOT NULL DEFAULT '0.0',
  `wickets` int(10) NOT NULL DEFAULT '0',
  `dismissal_type` int(5) NOT NULL DEFAULT '0',
  `dismissed_player1` int(10) NOT NULL DEFAULT '0',
  `dismissed_player2` int(10) NOT NULL DEFAULT '0',
  `catches` int(10) NOT NULL DEFAULT '0',
  `stumps` int(10) NOT NULL DEFAULT '0',
  `runouts` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `player_match_info`
--

INSERT INTO `player_match_info` (`id`, `match_id`, `player_id`, `country_id`, `batted`, `bowled`, `batting_position`, `bat_runs`, `balls_faced`, `bowl_runs`, `overs`, `wickets`, `dismissal_type`, `dismissed_player1`, `dismissed_player2`, `catches`, `stumps`, `runouts`) VALUES
(1, 10, 4, 1, 1, 0, 1, 46, 45, 0, 0.0, 0, 1, 32, 27, 0, 0, 0),
(2, 10, 5, 1, 1, 0, 2, 17, 24, 0, 0.0, 0, 3, 36, 27, 0, 0, 0),
(3, 10, 6, 1, 1, 0, 3, 28, 45, 0, 0.0, 0, 3, 34, 27, 0, 0, 0),
(4, 10, 7, 1, 1, 0, 4, 126, 116, 0, 0.0, 0, 7, 26, 26, 0, 0, 0),
(5, 10, 8, 1, 1, 0, 5, 61, 59, 0, 0.0, 0, 3, 36, 32, 0, 0, 0),
(6, 10, 9, 1, 1, 0, 6, 2, 4, 0, 0.0, 0, 1, 36, 26, 0, 0, 0),
(7, 10, 10, 1, 1, 0, 7, 1, 2, 0, 0.0, 0, 3, 36, 28, 0, 0, 0),
(8, 10, 11, 1, 1, 0, 8, 10, 6, 0, 0.0, 0, 7, 26, 26, 0, 0, 0),
(9, 10, 12, 1, 0, 0, 15, 0, 0, 0, 0.0, 0, 7, 26, 26, 0, 0, 0),
(10, 10, 13, 1, 0, 0, 15, 0, 0, 0, 0.0, 0, 7, 26, 26, 0, 0, 0),
(11, 10, 14, 1, 0, 0, 15, 0, 0, 0, 0.0, 0, 7, 26, 26, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `player_stats`
--

CREATE TABLE IF NOT EXISTS `player_stats` (
  `player_id` int(10) NOT NULL,
  `matches` int(10) NOT NULL DEFAULT '0',
  `batting_avg` float(10,2) NOT NULL DEFAULT '0.00',
  `batting_sr` float(10,2) NOT NULL DEFAULT '0.00',
  `bowling_avg` float(10,2) NOT NULL DEFAULT '0.00',
  `bowling_sr` float(10,2) NOT NULL DEFAULT '0.00',
  `bowling_econ` float(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`player_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `player_stats`
--

INSERT INTO `player_stats` (`player_id`, `matches`, `batting_avg`, `batting_sr`, `bowling_avg`, `bowling_sr`, `bowling_econ`) VALUES
(2, 20, 120.00, 200.00, 0.00, 0.00, 0.00),
(3, 10, 0.00, 0.00, 0.00, 0.00, 0.00),
(4, 15, 0.00, 0.00, 0.00, 0.00, 0.00),
(5, 23, 0.00, 0.00, 0.00, 0.00, 0.00),
(6, 21, 0.00, 0.00, 0.00, 0.00, 0.00),
(7, 12, 0.00, 0.00, 0.00, 0.00, 0.00),
(8, 54, 0.00, 0.00, 0.00, 0.00, 0.00),
(9, 76, 0.00, 0.00, 0.00, 0.00, 0.00),
(10, 32, 0.00, 0.00, 0.00, 0.00, 0.00),
(11, 23, 0.00, 0.00, 0.00, 0.00, 0.00),
(12, 51, 0.00, 0.00, 0.00, 0.00, 0.00),
(13, 19, 0.00, 0.00, 0.00, 0.00, 0.00),
(14, 37, 0.00, 0.00, 0.00, 0.00, 0.00),
(15, 21, 0.00, 0.00, 0.00, 0.00, 0.00),
(16, 27, 0.00, 0.00, 0.00, 0.00, 0.00),
(17, 23, 0.00, 0.00, 0.00, 0.00, 0.00),
(18, 66, 0.00, 0.00, 0.00, 0.00, 0.00),
(19, 143, 0.00, 0.00, 0.00, 0.00, 0.00),
(20, 67, 0.00, 0.00, 0.00, 0.00, 0.00),
(21, 43, 0.00, 0.00, 0.00, 0.00, 0.00),
(22, 4, 0.00, 0.00, 0.00, 0.00, 0.00),
(23, 85, 0.00, 0.00, 0.00, 0.00, 0.00),
(24, 13, 0.00, 0.00, 0.00, 0.00, 0.00),
(25, 98, 0.00, 0.00, 0.00, 0.00, 0.00),
(26, 54, 0.00, 0.00, 0.00, 0.00, 0.00),
(27, 65, 0.00, 0.00, 0.00, 0.00, 0.00),
(28, 52, 0.00, 0.00, 0.00, 0.00, 0.00),
(29, 78, 0.00, 0.00, 0.00, 0.00, 0.00),
(30, 65, 0.00, 0.00, 0.00, 0.00, 0.00),
(31, 69, 0.00, 0.00, 0.00, 0.00, 0.00),
(32, 21, 0.00, 0.00, 0.00, 0.00, 0.00),
(33, 25, 0.00, 0.00, 0.00, 0.00, 0.00),
(34, 9, 0.00, 0.00, 0.00, 0.00, 0.00),
(35, 12, 0.00, 0.00, 0.00, 0.00, 0.00),
(36, 21, 0.00, 0.00, 0.00, 0.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `player_types`
--

CREATE TABLE IF NOT EXISTS `player_types` (
  `type_id` int(10) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(25) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `player_types`
--

INSERT INTO `player_types` (`type_id`, `type_name`) VALUES
(1, 'Batsman'),
(2, 'Bowler'),
(3, 'All Rounder'),
(4, 'Wicket Keeper');

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

-- --------------------------------------------------------

--
-- Table structure for table `venues`
--

CREATE TABLE IF NOT EXISTS `venues` (
  `venue_id` int(10) NOT NULL AUTO_INCREMENT,
  `venue_name` varchar(50) NOT NULL,
  `venue_city` varchar(50) NOT NULL,
  `venue_capacity` int(10) NOT NULL DEFAULT '0',
  `venue_description` text,
  `venue_photo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`venue_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `venues`
--

INSERT INTO `venues` (`venue_id`, `venue_name`, `venue_city`, `venue_capacity`, `venue_description`, `venue_photo`) VALUES
(1, 'The Gabba', 'Queensland', 42000, 'The Gabba is an icon of Australian sport. The hallowed turf hosts the Queensland Bulls Sheffield Shield team and the Brisbane Heat in the Big Bash League during the summer and is home to the Brisbane Lions AFL team during the winter. \r\n \r\nThe stadium is named after the suburb of Woolloongabba, in which it is located. The venue was gradually redeveloped from 1993 to 2005 from an oblong shaped field surrounded by a greyhound racing track to a modern state-of-the-art stadium, with a 42,000 seat capacity.\r\n \r\nThe stadium is located two kilometres from the Brisbane’s CBD and is well serviced by public transport.', '0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
