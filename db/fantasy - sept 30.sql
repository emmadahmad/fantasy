-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2014 at 09:34 PM
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
(3, 0, 0, 0, 0);

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
(3, 0, 0, 0, 0);

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
(10, 1, 0, 1, 3, 1, 260, 8, 0, 256, 6, 0),
(11, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`player_id`, `player_name`, `player_country`, `player_type`, `player_photo`) VALUES
(2, 'Emmad', 4, 3, NULL),
(3, 'Ahmad', 3, 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `player_match_info`
--

CREATE TABLE IF NOT EXISTS `player_match_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `match_id` int(10) NOT NULL,
  `player_id` int(10) NOT NULL,
  `batted` tinyint(1) NOT NULL DEFAULT '0',
  `bowled` tinyint(1) NOT NULL DEFAULT '0',
  `batting_position` int(10) NOT NULL DEFAULT '0',
  `bat_runs` int(10) NOT NULL DEFAULT '0',
  `balls_faced` int(10) NOT NULL DEFAULT '0',
  `bowl_runs` int(10) NOT NULL DEFAULT '0',
  `overs` float(10,1) NOT NULL DEFAULT '0.0',
  `wickets` int(10) NOT NULL DEFAULT '0',
  `dismissed` tinyint(1) NOT NULL DEFAULT '0',
  `catches` int(10) NOT NULL DEFAULT '0',
  `stumps` int(10) NOT NULL DEFAULT '0',
  `runouts` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
(3, 10, 0.00, 0.00, 0.00, 0.00, 0.00);

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
