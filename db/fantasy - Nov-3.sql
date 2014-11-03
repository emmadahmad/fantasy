-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2014 at 01:27 AM
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
(1, 27, 2, 564, 676),
(2, 1, 0, 5, 5),
(3, 10, 0, 185, 192),
(4, 17, 6, 169, 194),
(5, 12, 2, 119, 145),
(6, 6, 0, 72, 76),
(7, 70, 11, 775, 1114),
(8, 2, 1, 18, 15),
(9, 17, 4, 111, 129),
(10, 3, 3, 27, 27),
(11, 2, 2, 7, 3),
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
(22, 0, 0, 0, 0);

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
(1, 0, 0, 0, 0),
(2, 0, 0, 0, 0),
(3, 0, 0, 0, 0),
(4, 6, 90, 8, 95),
(5, 1, 6, 0, 12),
(6, 0, 0, 0, 0),
(7, 74, 1634, 78, 1758),
(8, 4, 54, 2, 86),
(9, 40, 819, 33, 973),
(10, 7, 156, 12, 185),
(11, 8, 136, 3, 168),
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
(22, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `country_id` int(10) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(25) NOT NULL,
  `country_flag` varchar(50) DEFAULT 'flag.jpg',
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`country_id`, `country_name`, `country_flag`) VALUES
(1, 'Pakistan', 'Pakistan.png'),
(2, 'India', 'India.png'),
(3, 'Australia', 'Australia.png'),
(4, 'New Zealand', 'New Zealand.png'),
(5, 'England', 'England.png'),
(6, 'South Africa', 'South Africa.png');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`match_id`, `home_team`, `away_team`, `match_venue`, `match_date`) VALUES
(1, 3, 1, 3, '2014-10-05 17:30:00');

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
(1, 1, 16, 3, 3, 3, 231, 9, 25, 230, 10, 5);

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
  `player_photo` varchar(25) NOT NULL DEFAULT 'default.jpg',
  PRIMARY KEY (`player_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`player_id`, `player_name`, `player_country`, `player_type`, `player_photo`) VALUES
(1, 'Ahmed Shehzad', 1, 1, '1.jpg'),
(2, 'Sarfraz Ahmed', 1, 4, '2.jpg'),
(3, 'Asad Shafiq', 1, 1, '3.jpg'),
(4, 'Fawad Alam', 1, 1, '4.jpg'),
(5, 'Sohaib Maqsood', 1, 1, '5.jpg'),
(6, 'Umar Amin', 1, 1, '6.jpg'),
(7, 'Shahid Afridi', 1, 3, '7.jpg'),
(8, 'Anwar Ali', 1, 2, '8.jpg'),
(9, 'Sohail Tanvir', 1, 2, '9.jpg'),
(10, 'Zulfiqar Babar', 1, 2, '10.jpg'),
(11, 'Mohammad Irfan', 1, 2, '11.jpg'),
(12, 'Aaron Finch', 3, 1, '12.jpg'),
(13, 'David Warner', 3, 1, '13.jpg'),
(14, 'Steven Smith', 3, 3, '14.jpg'),
(15, 'George Bailey', 3, 1, '15.jpg'),
(16, 'Glenn Maxwell', 3, 3, '16.jpg'),
(17, 'Phillip Hughes', 3, 1, '17.jpg'),
(18, 'Brad Haddin', 3, 4, '18.jpg'),
(19, 'James Faulkner', 3, 3, '19.jpg'),
(20, 'Mitchell Starc', 3, 2, '20.jpg'),
(21, 'Kane Richardson', 3, 2, '21.jpg'),
(22, 'Xavier Doherty', 3, 2, '22.jpg');

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
  `batting_sr` float(10,2) NOT NULL DEFAULT '0.00',
  `bowling_sr` float(10,2) NOT NULL DEFAULT '0.00',
  `bowling_econ` float(10,2) NOT NULL DEFAULT '0.00',
  `points` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `player_match_info`
--

INSERT INTO `player_match_info` (`id`, `match_id`, `player_id`, `country_id`, `batted`, `bowled`, `batting_position`, `bat_runs`, `balls_faced`, `bowl_runs`, `overs`, `wickets`, `dismissal_type`, `dismissed_player1`, `dismissed_player2`, `catches`, `stumps`, `runouts`, `batting_sr`, `bowling_sr`, `bowling_econ`, `points`) VALUES
(1, 1, 12, 3, 1, 0, 1, 18, 34, 0, 0.0, 0, 3, 8, 11, 0, 0, 0, 52.94, 0.00, 0.00, 18),
(2, 1, 8, 1, 1, 1, 8, 14, 28, 41, 10.0, 1, 3, 19, 16, 0, 0, 1, 50.00, 60.00, 4.10, 14),
(3, 1, 11, 1, 1, 1, 11, 0, 4, 61, 10.0, 1, 3, 16, 19, 1, 0, 1, 0.00, 60.00, 6.10, 0),
(4, 1, 13, 3, 1, 0, 2, 56, 63, 0, 0.0, 0, 3, 7, 7, 1, 0, 0, 88.89, 0.00, 0.00, 61),
(5, 1, 7, 1, 1, 1, 7, 6, 12, 44, 10.0, 2, 3, 21, 14, 1, 0, 0, 50.00, 30.00, 4.40, 11),
(6, 1, 14, 3, 1, 1, 3, 77, 105, 7, 2.0, 0, 1, 9, 0, 2, 0, 0, 73.33, 0.00, 3.50, 97),
(7, 1, 9, 1, 1, 1, 9, 10, 15, 40, 10.0, 3, 1, 16, 0, 0, 0, 0, 66.67, 20.00, 4.00, 10),
(8, 1, 15, 3, 1, 0, 4, 0, 3, 0, 0.0, 0, 3, 11, 1, 0, 0, 0, 0.00, 0.00, 0.00, 0),
(9, 1, 1, 1, 1, 0, 1, 26, 41, 0, 0.0, 0, 1, 22, 0, 1, 0, 0, 63.41, 0.00, 0.00, 26),
(10, 1, 16, 3, 1, 1, 5, 20, 22, 41, 8.0, 2, 3, 7, 6, 1, 0, 0, 90.91, 24.00, 5.12, 25),
(11, 1, 6, 1, 1, 0, 6, 19, 27, 0, 0.0, 0, 1, 20, 0, 2, 0, 0, 70.37, 0.00, 0.00, 19),
(12, 1, 17, 3, 1, 0, 6, 5, 14, 0, 0.0, 0, 2, 9, 0, 0, 0, 0, 35.71, 0.00, 0.00, 5),
(13, 1, 18, 3, 1, 0, 7, 2, 6, 0, 0.0, 0, 5, 8, 0, 0, 0, 0, 33.33, 0.00, 0.00, 2),
(14, 1, 19, 3, 1, 1, 8, 33, 42, 52, 10.0, 2, 3, 9, 6, 1, 0, 0, 78.57, 30.00, 5.20, 33),
(15, 1, 20, 3, 1, 1, 9, 5, 7, 33, 10.0, 1, 5, 11, 0, 0, 0, 1, 71.43, 60.00, 3.30, 15),
(16, 1, 21, 3, 1, 1, 10, 9, 4, 36, 10.0, 2, 7, 0, 0, 0, 0, 0, 225.00, 30.00, 3.60, 24),
(17, 1, 22, 3, 1, 1, 11, 1, 1, 54, 10.0, 2, 7, 0, 0, 0, 0, 0, 100.00, 30.00, 5.40, 11),
(18, 1, 2, 1, 1, 0, 2, 32, 39, 0, 0.0, 0, 5, 20, 0, 0, 0, 0, 82.05, 0.00, 0.00, 32),
(19, 1, 3, 1, 1, 0, 3, 50, 73, 0, 0.0, 0, 2, 19, 0, 0, 0, 0, 68.49, 0.00, 0.00, 55),
(20, 1, 4, 1, 1, 0, 4, 0, 4, 0, 0.0, 0, 3, 22, 14, 0, 0, 0, 0.00, 0.00, 0.00, 0),
(21, 1, 5, 1, 1, 0, 5, 34, 46, 0, 0.0, 0, 3, 21, 13, 0, 0, 0, 73.91, 0.00, 0.00, 34),
(22, 1, 10, 1, 1, 1, 10, 14, 11, 42, 10.0, 0, 7, 0, 0, 0, 0, 0, 127.27, 0.00, 4.20, 24);

-- --------------------------------------------------------

--
-- Table structure for table `player_match_stats`
--

CREATE TABLE IF NOT EXISTS `player_match_stats` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `player_id` int(10) NOT NULL DEFAULT '0',
  `matches` int(10) NOT NULL DEFAULT '0',
  `innings_batted` int(10) NOT NULL DEFAULT '0',
  `innings_bowled` int(10) NOT NULL DEFAULT '0',
  `not_outs` int(10) NOT NULL DEFAULT '0',
  `balls_faced` int(10) NOT NULL DEFAULT '0',
  `bat_runs` int(10) NOT NULL DEFAULT '0',
  `batting_avg` float(10,2) NOT NULL DEFAULT '0.00',
  `batting_sr` float(10,2) NOT NULL DEFAULT '0.00',
  `bowl_runs` int(10) NOT NULL DEFAULT '0',
  `wickets` int(10) NOT NULL DEFAULT '0',
  `balls` int(10) NOT NULL DEFAULT '0',
  `bowling_avg` float(10,2) NOT NULL DEFAULT '0.00',
  `bowling_sr` float(10,2) NOT NULL DEFAULT '0.00',
  `bowling_econ` float(10,2) NOT NULL DEFAULT '0.00',
  `points` int(10) NOT NULL DEFAULT '0',
  `catches_ratio` float(10,2) NOT NULL DEFAULT '0.00',
  `runouts_ratio` float(10,2) NOT NULL DEFAULT '0.00',
  `stumps_ratio` float(10,2) NOT NULL DEFAULT '0.00',
  `price` float(10,1) NOT NULL DEFAULT '1.0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `player_match_stats`
--

INSERT INTO `player_match_stats` (`id`, `player_id`, `matches`, `innings_batted`, `innings_bowled`, `not_outs`, `balls_faced`, `bat_runs`, `batting_avg`, `batting_sr`, `bowl_runs`, `wickets`, `balls`, `bowling_avg`, `bowling_sr`, `bowling_econ`, `points`, `catches_ratio`, `runouts_ratio`, `stumps_ratio`, `price`) VALUES
(2, 1, 1, 1, 0, 0, 41, 26, 26.00, 63.41, 0, 0, 0, 0.00, 0.00, 0.00, 26, 1.00, 0.00, 0.00, 2.2),
(3, 2, 1, 1, 0, 0, 39, 32, 32.00, 82.05, 0, 0, 0, 0.00, 0.00, 0.00, 32, 0.00, 0.00, 0.00, 1.2),
(4, 3, 1, 1, 0, 0, 73, 50, 50.00, 68.49, 0, 0, 0, 0.00, 0.00, 0.00, 55, 0.00, 0.00, 0.00, 1.9),
(5, 4, 1, 1, 0, 0, 4, 0, 0.00, 0.00, 0, 0, 0, 0.00, 0.00, 0.00, 0, 0.00, 0.00, 0.00, 1.7),
(6, 5, 1, 1, 0, 0, 46, 34, 34.00, 73.91, 0, 0, 0, 0.00, 0.00, 0.00, 34, 0.00, 0.00, 0.00, 1.5),
(7, 6, 1, 1, 0, 0, 27, 19, 19.00, 70.37, 0, 0, 0, 0.00, 0.00, 0.00, 19, 2.00, 0.00, 0.00, 1.4),
(8, 7, 1, 1, 1, 0, 12, 6, 6.00, 50.00, 44, 2, 60, 22.00, 22.00, 4.40, 11, 1.00, 0.00, 0.00, 3.5),
(9, 8, 1, 1, 1, 0, 28, 14, 14.00, 50.00, 41, 1, 60, 41.00, 41.00, 4.10, 14, 0.00, 1.00, 0.00, 1.4),
(10, 9, 1, 1, 1, 0, 15, 10, 10.00, 66.67, 40, 3, 60, 13.33, 13.33, 4.00, 10, 0.00, 0.00, 0.00, 1.7),
(11, 10, 1, 1, 1, 1, 11, 14, 0.00, 127.27, 42, 0, 60, 0.00, 0.00, 4.20, 24, 0.00, 0.00, 0.00, 1.6),
(12, 11, 1, 1, 1, 0, 4, 0, 0.00, 0.00, 61, 1, 60, 61.00, 61.00, 6.10, 0, 1.00, 1.00, 0.00, 2.1),
(13, 12, 1, 1, 0, 0, 34, 18, 18.00, 52.94, 0, 0, 0, 0.00, 0.00, 0.00, 18, 0.00, 0.00, 0.00, 2.2),
(14, 13, 1, 1, 0, 0, 63, 56, 56.00, 88.89, 0, 0, 0, 0.00, 0.00, 0.00, 61, 1.00, 0.00, 0.00, 2.1),
(15, 14, 1, 1, 1, 0, 105, 77, 77.00, 73.33, 7, 0, 12, 0.00, 0.00, 3.50, 97, 2.00, 0.00, 0.00, 1.9),
(16, 15, 1, 1, 0, 0, 3, 0, 0.00, 0.00, 0, 0, 0, 0.00, 0.00, 0.00, 0, 0.00, 0.00, 0.00, 1.4),
(17, 16, 1, 1, 1, 0, 22, 20, 20.00, 90.91, 41, 2, 48, 20.50, 20.50, 5.12, 25, 1.00, 0.00, 0.00, 1.2),
(18, 17, 1, 1, 0, 0, 14, 5, 5.00, 35.71, 0, 0, 0, 0.00, 0.00, 0.00, 5, 0.00, 0.00, 0.00, 1.0),
(19, 18, 1, 1, 0, 0, 6, 2, 2.00, 33.33, 0, 0, 0, 0.00, 0.00, 0.00, 2, 0.00, 0.00, 0.00, 1.5),
(20, 19, 1, 1, 1, 0, 42, 33, 33.00, 78.57, 52, 2, 60, 26.00, 26.00, 5.20, 33, 1.00, 0.00, 0.00, 1.4),
(21, 20, 1, 1, 1, 0, 7, 5, 5.00, 71.43, 33, 1, 60, 33.00, 33.00, 3.30, 15, 0.00, 1.00, 0.00, 2.1),
(22, 21, 1, 1, 1, 1, 4, 9, 0.00, 225.00, 36, 2, 60, 18.00, 18.00, 3.60, 24, 0.00, 0.00, 0.00, 1.1),
(23, 22, 1, 1, 1, 1, 1, 1, 0.00, 100.00, 54, 2, 60, 27.00, 27.00, 5.40, 11, 0.00, 0.00, 0.00, 2.8);

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
(1, 27, 27.04, 119.86, 0.00, 0.00, 0.00),
(2, 4, 5.00, 100.00, 0.00, 0.00, 0.00),
(3, 10, 19.20, 103.78, 0.00, 0.00, 0.00),
(4, 24, 17.64, 114.79, 11.88, 11.25, 6.33),
(5, 14, 14.50, 121.85, 0.00, 0.00, 12.00),
(6, 10, 12.67, 105.56, 0.00, 0.00, 0.00),
(7, 75, 18.88, 143.74, 22.54, 20.95, 6.46),
(8, 5, 15.00, 83.33, 43.00, 27.00, 9.56),
(9, 40, 9.92, 116.22, 29.48, 24.82, 7.13),
(10, 7, 0.00, 100.00, 15.42, 13.00, 7.12),
(11, 8, 0.00, 42.86, 56.00, 45.33, 7.41),
(12, 19, 0.00, 0.00, 0.00, 0.00, 0.00),
(13, 52, 0.00, 0.00, 0.00, 0.00, 0.00),
(14, 21, 0.00, 0.00, 0.00, 0.00, 0.00),
(15, 28, 0.00, 0.00, 0.00, 0.00, 0.00),
(16, 22, 0.00, 0.00, 0.00, 0.00, 0.00),
(17, 1, 0.00, 0.00, 0.00, 0.00, 0.00),
(18, 34, 0.00, 0.00, 0.00, 0.00, 0.00),
(19, 8, 0.00, 0.00, 0.00, 0.00, 0.00),
(20, 19, 0.00, 0.00, 0.00, 0.00, 0.00),
(21, 1, 0.00, 0.00, 0.00, 0.00, 0.00),
(22, 11, 0.00, 0.00, 0.00, 0.00, 0.00);

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
-- Table structure for table `teams`
--

CREATE TABLE IF NOT EXISTS `teams` (
  `team_id` int(10) NOT NULL AUTO_INCREMENT,
  `manager` int(10) NOT NULL,
  `team_name` varchar(150) NOT NULL,
  PRIMARY KEY (`team_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`team_id`, `manager`, `team_name`) VALUES
(1, 1, 'Daredevils');

-- --------------------------------------------------------

--
-- Table structure for table `team_players`
--

CREATE TABLE IF NOT EXISTS `team_players` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL DEFAULT '0',
  `player_id` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `team_players`
--

INSERT INTO `team_players` (`id`, `user_id`, `player_id`) VALUES
(1, 1, 12),
(2, 1, 15),
(3, 1, 5),
(4, 1, 4),
(5, 1, 3),
(6, 1, 1),
(7, 1, 8),
(8, 1, 9),
(9, 1, 10),
(10, 1, 11),
(11, 1, 22);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_type` varchar(20) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `country` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_type`, `user_name`, `email`, `password`, `country`, `gender`) VALUES
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `venues`
--

INSERT INTO `venues` (`venue_id`, `venue_name`, `venue_city`, `venue_capacity`, `venue_description`, `venue_photo`) VALUES
(1, 'Sheikh Zayed Stadium', 'Abu Dhabi', 20000, 'he Sheikh Zayed Stadium in Abu Dhabi cost $22 million to build and is arguably one of the world''s finest cricket grounds. It was opened in May 2004 and staged its first first-class match when Scotland played Kenya in the Intercontinental Cup that November.', '0'),
(2, 'Sharjah Cricket Stadium', 'Sharjah', 16000, 'The Sharjah Cricket Stadium, in the emirate of Sharjah in the United Arab Emirates, was built in the early 1980s and very quickly became a regular home for tournaments as the popularity of one-day cricket exploded following India''s World Cup win in 1983. Between 1984 and 2003 the ground hosted 198 ODIs and four Tests (in 2002 when Pakistan played games there due to political instability at home), attracting good crowds, mainly from the area''s large Asian expat population. It also hosted Masters (veterans) events and other second-string tournaments. All were played under the auspices of The Cricketers Benefit Fund Series (CBFS)" which had been established in 1981 by Abdul Rahman Bukhatir, and whose main aim was to honour cricketers of the past and present generations from India and Pakistan, with benefit purses in recognition of their services to the game of cricket. The stadium initially started with a few limited seats and very modest facilities but by 2002 had a 27,000 capacity and floodlights.', '0'),
(3, 'Dubai International Cricket Stadium', 'Dubai', 25000, 'End names Emirates Road End, Dubai Sports City End', '0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
