-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2017 at 05:59 PM
-- Server version: 5.5.57-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `codeshows`
--

-- --------------------------------------------------------

--
-- Table structure for table `asg`
--

CREATE TABLE IF NOT EXISTS `asg` (
  `asg_id` int(11) NOT NULL AUTO_INCREMENT,
  `asg_name` varchar(100) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `total_marks` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `time_of_addition` datetime NOT NULL,
  PRIMARY KEY (`asg_id`),
  KEY `t_idb` (`batch_id`),
  KEY `u_asg` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `asg`
--

INSERT INTO `asg` (`asg_id`, `asg_name`, `start_time`, `end_time`, `total_marks`, `user_id`, `batch_id`, `time_of_addition`) VALUES
(22, 'DSA 1', '2017-12-31 23:59:00', '2017-12-31 23:59:00', NULL, 385459, 1, '2017-10-29 23:41:46'),
(23, 'DSA 2', '2017-12-30 23:59:00', '2017-12-31 23:59:00', NULL, 385459, 2, '2017-10-29 23:42:19'),
(24, 'PM 1', '2017-12-31 23:59:00', '2016-12-31 23:59:00', NULL, 385457, 1, '2017-10-29 23:43:51'),
(25, 'PM 2', '2017-12-31 22:59:00', '2017-12-31 23:59:00', NULL, 385457, 2, '2017-10-29 23:44:14'),
(26, 'PM3', '2017-10-31 23:03:00', '2018-12-31 23:59:00', NULL, 385457, 2, '2017-10-29 23:45:28');

-- --------------------------------------------------------

--
-- Table structure for table `asg_prob`
--

CREATE TABLE IF NOT EXISTS `asg_prob` (
  `asg_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `marks` int(11) NOT NULL,
  PRIMARY KEY (`asg_id`,`p_id`),
  KEY `b` (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asg_prob`
--

INSERT INTO `asg_prob` (`asg_id`, `p_id`, `marks`) VALUES
(22, 7, 100),
(22, 8, 100),
(23, 7, 100),
(23, 8, 100),
(24, 7, 100),
(24, 8, 100),
(25, 7, 100),
(25, 8, 100),
(26, 7, 50),
(26, 8, 50);

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `c_id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  KEY `c_id` (`c_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`c_id`, `image`) VALUES
(6, 'banner1.jpg'),
(7, 'banner2.jpg'),
(8, 'banner3.jpg'),
(9, 'banner4.jpg'),
(10, 'banner5.jpg'),
(11, 'banner6.jpg'),
(12, 'banner7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE IF NOT EXISTS `batch` (
  `batch_name` varchar(15) NOT NULL,
  `sem` int(11) NOT NULL,
  `branch` varchar(35) NOT NULL,
  `batch_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`batch_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`batch_name`, `sem`, `branch`, `batch_id`) VALUES
('A1A2', 5, 'CSE', 1),
('A3A4', 5, 'CSE', 2);

-- --------------------------------------------------------

--
-- Table structure for table `contest`
--

CREATE TABLE IF NOT EXISTS `contest` (
  `c_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `contest_name` varchar(100) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `no_of_problems` int(11) NOT NULL,
  `about_contest` text NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contest`
--

INSERT INTO `contest` (`c_id`, `admin_id`, `contest_name`, `start_time`, `end_time`, `no_of_problems`, `about_contest`) VALUES
(1, 1, 'Aug Challenge', '2017-09-01 00:00:00', '2017-09-30 23:59:59', 5, 'KA BOOM!'),
(2, 2, 'Oct Challenge', '2017-10-01 21:30:00', '2017-10-17 23:59:59', 5, 'YIPEE!'),
(3, 1, 'October Lunchtime 2017', '2017-10-17 00:00:00', '2017-10-18 00:00:00', 5, 'About the Contest:\n\nOrganiser: The contest is hosted by Amalthea ''17, MNIT.\nPrizes: 10000\nRegistrations for prizes: NA\n'),
(4, 2, 'ICO and ICPC 2018 Preparatory Series ', '2017-11-01 00:00:00', '2017-11-04 00:00:00', 5, 'About Contest:\n\nThe contest is hosted as a practice for the upcoming ZCO,\n INOI and ICPC for those who are aspiring to be a part of the ICO and ICPC.\nThis is unrated and is hosted just for the sake of problem solving practice. \nThe problems will be set by a group of students who have qualified for IOITC or have had the pain of not clearing it in INOI.\n\n\nRanking format: IOI type\nPrizes: We will reimburse the Indian Computing Olympiad registration fees for 5 random Indian school students'),
(5, 3, 'CodePhase', '2017-11-03 00:00:00', '2017-11-04 00:00:00', 5, 'About the Contest:\n\nOrganiser: The contest is hosted by NIT Meghalaya.\nPrizes: Prizes worth 17k.\nRegistrations for prizes: NA\nContest Details:\n\nDuration: 24 hours\nStart time: 3rd November 2017, 0000 hrs IST\nEnd time: 4th November 2017, 0000 hrs IST'),
(6, 4, 'November challenge', '2017-11-01 00:00:00', '2017-11-21 00:00:00', 5, 'About the Contest:\n\nOrganiser: The contest is hosted by MNIT.\nPrizes: Worth Rs 10,000 From siNUsoid.( Only for registered participants )\nContest Details:'),
(7, 1, 'D''Code ', '2017-11-05 00:00:00', '2017-11-10 00:00:00', 5, 'About the Contest:\n\nOrganiser: The contest is hosted by GLA University.\nPrizes: Not declared\nRegistrations for prizes: NA\n\n\n'),
(8, 3, 'Codenesia 2.0', '2017-11-02 00:00:00', '2017-11-30 00:00:00', 5, 'About the Contest:\r\nOrganiser: The contest is hosted by NIT Raipur\r\nPrizes: 5k & 3k'),
(9, 1, 'LoC 2017', '2017-11-05 00:00:00', '2017-11-08 00:00:00', 5, 'Lord of the Code (LoC) is a series of competitive programming contests hosted every month, by Code@Amrita, the coding club at Amrita School of Engineering, Amritapuri campus. One of the aims of this monthly contest is to create awareness about the competitive programming and problem solving among the school students. While the focus is on the students in Kerala, anybody who is interested in coding can participate in the contest. The contest is conducted on CodeChef every month. Contest spans over three days – Friday through Sunday. The contest will focus on problem solving rather than direct implementation of the programming language syntax and built in functions.\r\nOrganizer: The contest is hosted by Amrita University in association with CodeChef.'),
(10, 2, 'Code-In-History 1.0', '2017-11-01 00:00:00', '2017-11-15 00:00:00', 5, 'For Indians:\r\n\r\nTop 10 school students from ranklist will get CodeChef laddus\r\nFor Rest of World:\r\n\r\nTop 10 school students from ranklist will get CodeChef laddus'),
(11, 3, 'ProCon Junior 2017', '2017-11-12 00:00:00', '2017-12-25 00:00:00', 5, 'About the Contest:\r\n\r\nOrganiser: The contest is hosted by Esya''17, IIIT Delhi''s techfest.\r\nPrizes: Bonus Marks for admission in IIITD will be given to the top 3 winners of the onsite finals. Moreover, 25k worth prizes are up for grab for the top 5 participants'),
(12, 2, 'November Lunchtime', '2017-11-20 00:00:00', '2017-11-21 00:00:00', 5, 'November Lunchtime\r\nPrize: Rs 10000\r\nOrganised by : MNIT Jaipur'),
(13, 2, 'Dec Challenge', '2017-12-01 17:00:00', '2018-03-31 23:59:59', 5, 'OOOOPS!'),
(14, 3, 'Jan Challenge', '2018-01-01 17:00:00', '2018-01-11 23:59:59', 5, 'HURRAY!'),
(15, 4, 'Feb Challenge', '2018-02-03 00:00:00', '2018-02-13 23:59:59', 5, 'GREAT!');

-- --------------------------------------------------------

--
-- Table structure for table `contest_prob`
--

CREATE TABLE IF NOT EXISTS `contest_prob` (
  `c_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  PRIMARY KEY (`c_id`,`p_id`),
  KEY `p_id` (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contest_prob`
--

INSERT INTO `contest_prob` (`c_id`, `p_id`, `score`) VALUES
(1, 13, 100),
(1, 14, 100),
(1, 15, 100),
(1, 16, 100),
(2, 17, 100),
(2, 18, 100),
(2, 19, 100),
(2, 20, 100),
(3, 21, 100),
(3, 22, 100),
(3, 23, 100),
(3, 24, 100),
(4, 25, 100),
(4, 26, 100),
(4, 27, 100),
(4, 28, 100),
(5, 29, 100),
(5, 30, 100),
(5, 31, 100),
(5, 32, 100),
(6, 30, 100),
(6, 31, 100),
(6, 35, 100),
(6, 36, 100),
(7, 37, 100),
(7, 38, 100),
(7, 39, 100),
(7, 40, 100),
(8, 40, 100),
(8, 41, 100),
(8, 42, 100),
(8, 43, 100),
(9, 45, 100),
(9, 46, 100),
(9, 47, 100),
(9, 48, 100),
(10, 45, 100),
(10, 46, 100),
(10, 47, 100),
(10, 48, 100),
(11, 49, 100),
(11, 50, 100);

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE IF NOT EXISTS `language` (
  `language_id` int(11) NOT NULL,
  `language_name` varchar(10) NOT NULL,
  PRIMARY KEY (`language_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`language_id`, `language_name`) VALUES
(1, 'C'),
(2, 'C++'),
(3, 'Java'),
(5, 'Python 2.0'),
(6, 'Perl'),
(7, 'PHP'),
(8, 'RUBY'),
(9, 'C#'),
(10, 'Mysql'),
(11, 'Oracle'),
(12, 'Haskell'),
(13, 'Clojure'),
(14, 'Bash'),
(15, 'Scala'),
(16, 'Erlang'),
(17, 'CLISP'),
(18, 'Lua'),
(21, 'Go');

-- --------------------------------------------------------

--
-- Table structure for table `languages_allowed`
--

CREATE TABLE IF NOT EXISTS `languages_allowed` (
  `p_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  PRIMARY KEY (`p_id`,`language_id`),
  KEY `language_id` (`language_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `languages_allowed`
--

INSERT INTO `languages_allowed` (`p_id`, `language_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(18, 2),
(19, 2),
(20, 2),
(21, 2),
(22, 2),
(23, 2),
(24, 2),
(25, 2),
(26, 2),
(27, 2),
(28, 2),
(29, 2),
(30, 2),
(31, 2),
(32, 2),
(33, 2),
(34, 2),
(35, 2),
(36, 2),
(37, 2),
(38, 2),
(39, 2),
(40, 2),
(41, 2),
(42, 2),
(43, 2),
(44, 2),
(45, 2),
(46, 2),
(47, 2),
(48, 2),
(49, 2),
(50, 2),
(1, 3),
(2, 3),
(3, 3),
(4, 3),
(5, 3),
(6, 3),
(7, 3),
(8, 3),
(9, 3),
(10, 3),
(11, 3),
(12, 3),
(13, 3),
(14, 3),
(15, 3),
(16, 3),
(17, 3),
(18, 3),
(19, 3),
(20, 3),
(21, 3),
(22, 3),
(23, 3),
(24, 3),
(25, 3),
(26, 3),
(27, 3),
(28, 3),
(30, 3),
(31, 3),
(32, 3),
(33, 3),
(34, 3),
(35, 3),
(36, 3),
(37, 3),
(38, 3),
(39, 3),
(40, 3),
(41, 3),
(42, 3),
(43, 3),
(44, 3),
(45, 3),
(46, 3),
(47, 3),
(48, 3),
(49, 3),
(50, 3),
(1, 5),
(2, 5),
(3, 5),
(4, 5),
(5, 5),
(6, 5),
(7, 5),
(8, 5),
(9, 5),
(10, 5),
(11, 5),
(12, 5),
(13, 5),
(14, 5),
(15, 5),
(16, 5),
(17, 5),
(18, 5),
(19, 5),
(20, 5),
(21, 5),
(22, 5),
(23, 5),
(24, 5),
(25, 5),
(26, 5),
(27, 5),
(28, 5),
(30, 5),
(31, 5),
(32, 5),
(33, 5),
(34, 5),
(35, 5),
(36, 5),
(37, 5),
(38, 5),
(39, 5),
(40, 5),
(41, 5),
(42, 5),
(43, 5),
(44, 5),
(45, 5),
(46, 5),
(47, 5),
(48, 5),
(49, 5),
(50, 5);

-- --------------------------------------------------------

--
-- Table structure for table `participation`
--

CREATE TABLE IF NOT EXISTS `participation` (
  `user_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`c_id`,`p_id`),
  KEY `c_id` (`c_id`),
  KEY `p_id` (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `problem`
--

CREATE TABLE IF NOT EXISTS `problem` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_name` varchar(50) NOT NULL,
  `p_code` varchar(20) NOT NULL,
  `p_setter` varchar(20) NOT NULL,
  `date_added` date NOT NULL,
  `p_filename` varchar(20) NOT NULL,
  `u_attempt` int(11) NOT NULL,
  `u_solve` int(11) NOT NULL,
  `accepted` int(11) NOT NULL,
  `submitted` int(11) NOT NULL,
  `time_limit` float(15,2) NOT NULL,
  `source_limit` int(11) NOT NULL,
  `difficulty` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`p_id`),
  UNIQUE KEY `p_code` (`p_code`,`p_filename`),
  KEY `difficulty` (`difficulty`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `problem`
--

INSERT INTO `problem` (`p_id`, `p_name`, `p_code`, `p_setter`, `date_added`, `p_filename`, `u_attempt`, `u_solve`, `accepted`, `submitted`, `time_limit`, `source_limit`, `difficulty`, `status`) VALUES
(1, 'Buggy Calculator', 'BUGCAL', 'Vinayak', '2017-07-01', 'p1', 15, 7, 7, 7, 2.00, 50000, 1, 0),
(2, 'A Balanced Contest', 'PERFCONT', 'Shivanjal', '2017-08-01', 'p2', 0, 0, 0, 0, 2.00, 50000, 2, 0),
(3, 'Chef and Employment Test', 'CK87MEDI', 'Lav Kush', '2017-08-03', 'p3', 0, 0, 0, 0, 2.00, 50000, 3, 0),
(4, 'Rupsa And The Game', 'RGAME', 'Lav Kush', '2017-08-03', 'p4', 0, 0, 0, 0, 2.00, 50000, 1, 0),
(5, 'Chef and Way', 'CHRL4', 'Vinayak', '2017-08-03', 'p5', 0, 0, 0, 0, 2.00, 50000, 2, 0),
(6, 'Weird Competition', 'WEICOM', 'Shivanjal', '2017-08-03', 'p6', 0, 0, 0, 0, 2.00, 50000, 3, 0),
(7, 'Hull Sum', 'HULLSUM', 'Vinayak', '2017-08-03', 'p7', 0, 0, 0, 0, 2.00, 50000, 2, 2),
(8, 'Year 3017', 'UNIVERSE', 'Lav Kush', '2017-08-03', 'p8', 0, 0, 0, 0, 2.00, 50000, 2, 2),
(9, 'Minimax', 'MINIMAX	', 'Shivanjal', '2017-08-03', 'p9', 0, 0, 0, 0, 2.00, 50000, 2, 2),
(10, 'Animesh practices some programming contests', 'CHN03', 'Shivanjal', '2017-08-03', 'p10', 0, 0, 0, 0, 2.00, 50000, 3, 2),
(11, 'Animesh has a war with tribal leader Malvika', 'CHN11', 'Vinayak', '2017-08-03', 'p11', 0, 0, 0, 0, 2.00, 50000, 3, 2),
(12, 'TreeLand Journey', 'JRNTREE', 'Lav Kush', '2017-08-03', 'p12', 0, 0, 0, 0, 2.00, 50000, 3, 2),
(13, 'Optimal Subset', 'OPTSSET', 'Vinayak', '2017-08-03', 'p13', 0, 0, 0, 0, 2.00, 50000, 3, 1),
(14, 'King Animesh decides to have a voyage to the sun', 'CHN06', 'Lav Kush', '2017-08-03', 'p14', 0, 0, 0, 0, 2.00, 50000, 3, 1),
(15, 'Catch Spider-Chef', 'CATCHSM', 'Shivanjal', '2017-08-03', 'p15', 0, 0, 0, 0, 2.00, 50000, 3, 1),
(16, 'array sum', 'arr16', 'vinayak', '2017-11-01', 'p16', 0, 0, 0, 0, 2.02, 3000, 1, 1),
(17, 'Kangaroo', 'Kangaroo', 'lavkush', '2017-11-02', 'p17', 0, 0, 0, 0, 2.00, 3000, 2, 1),
(18, 'Maximum', 'maximum', 'shivanjal', '2017-11-02', 'p18', 0, 0, 0, 0, 2.00, 3000, 1, 1),
(19, 'perfect', 'perfection', 'vinayak', '2017-11-02', 'p19', 0, 0, 0, 0, 2.00, 3000, 3, 1),
(20, 'Compare the Triplets', 'Triplets', 'lavkush', '2017-11-02', 'p20', 0, 0, 0, 0, 2.00, 3000, 3, 1),
(21, 'A Very Big Sum', 'Big Sum', 'shivanjal', '2017-11-01', 'p21', 0, 0, 0, 0, 2.00, 3000, 2, 1),
(22, 'Diagonal Difference', 'Diagonal_Diff', 'lavkush', '2017-11-01', 'p22', 0, 0, 0, 0, 2.00, 3000, 3, 1),
(23, 'Plus Minus', 'Plus_Minus', 'vinayak', '2017-10-18', 'p23', 0, 0, 0, 0, 2.00, 3000, 2, 1),
(24, 'Staircase', 'Staircase', 'shivanjal', '2017-10-03', 'p24', 0, 0, 0, 0, 2.00, 3000, 1, 1),
(25, 'Mini-Max Sum', 'Min_Max_Sum', 'lavkush', '2017-10-18', 'p25', 0, 0, 0, 0, 2.00, 3000, 1, 1),
(26, 'Birthday Cake Candles', 'Cake_Candles', 'lavkush', '2017-10-18', 'p26', 0, 0, 0, 0, 2.00, 3000, 3, 1),
(27, 'Time Conversion', 'Time_Convers', 'shivanjal', '2017-10-18', 'p27', 0, 0, 0, 0, 2.00, 3000, 2, 1),
(28, 'Pangrams', 'Pangrams', 'lavkush', '2017-10-26', 'p28', 0, 0, 0, 0, 2.00, 3000, 2, 1),
(29, 'Weird Competition', 'Weird_Competition', 'vinayak', '2017-10-19', 'p29', 0, 0, 0, 0, 2.00, 3000, 3, 1),
(30, 'Hull Sum', 'Hull_Sum', 'shivanjal', '2017-10-18', 'p30', 0, 0, 0, 0, 2.00, 3000, 2, 1),
(31, 'Minimax', 'Minimax', 'lavkush', '2017-10-04', 'p31', 0, 0, 0, 0, 2.00, 3000, 2, 1),
(32, 'Black Nodes in Subgraphs', 'Noce_Subgraphs', 'vinayak', '2017-11-01', 'p32', 0, 0, 0, 0, 2.00, 3000, 3, 1),
(33, 'Malvika conducts her own ACM-ICPC contest series', 'ACM-ICPC', 'lavkush', '2017-11-07', 'p33', 0, 0, 0, 0, 2.00, 3000, 3, 1),
(34, 'Mathison and the teleportation game', 'game', 'shivanjal', '2017-11-08', 'p34', 0, 0, 0, 0, 2.00, 3000, 2, 1),
(35, 'Chef and Cycled Cycles', 'Cycles', 'shivanjal', '2017-10-11', 'p35', 0, 0, 0, 0, 2.00, 3000, 1, 1),
(36, 'Post Tree', 'Post Tree', 'shivanjal', '2017-11-01', 'p36', 0, 0, 0, 0, 2.00, 3000, 2, 1),
(37, 'Chef and Yoda', 'Chef and Yoda', 'SHIVANJAL', '2017-10-19', 'p37', 0, 0, 0, 0, 2.00, 3000, 3, 1),
(38, 'Interval Game', 'Interval Game', 'lavkush', '2017-10-10', 'p38', 0, 0, 0, 0, 2.00, 3000, 2, 1),
(39, 'Short in Average', 'Short in Average', 'vinayak', '2017-11-01', 'p39', 0, 0, 0, 0, 2.00, 3000, 3, 1),
(40, 'Sereja and Two Strings 2', 'SerejaStrings', 'lavkush', '2017-11-01', 'p40', 0, 0, 0, 0, 2.00, 3000, 2, 1),
(41, 'Chef and Inflation', 'ChefInflation', 'lavkush', '2017-11-01', 'p41', 0, 0, 0, 0, 2.00, 3000, 3, 1),
(42, 'Chef Shifu and Celebration', 'ChefCelebration', 'lavkush', '2017-10-04', 'p42', 0, 0, 0, 0, 2.00, 3000, 1, 1),
(43, 'Sereja and Two Lines', 'SerejaLines', 'vinayak', '2017-10-03', 'p43', 0, 0, 0, 0, 2.00, 3000, 2, 1),
(44, 'Chef and His Garden', 'ChefGarden', 'lavkush', '2017-10-10', 'p44', 0, 0, 0, 0, 2.00, 3000, 1, 1),
(45, 'Maximum Disjoint Subarrays', 'MaximumSubarrays', 'vinayak', '2017-10-11', 'p45', 0, 0, 0, 0, 2.00, 3000, 3, 1),
(46, 'Chef and Two String', 'ChefString', 'shivanjal', '2017-11-01', 'p46', 0, 0, 0, 0, 2.00, 3000, 3, 1),
(47, 'Company and Club Hierarchies', 'CompanyHierarchies', 'lavkush', '2017-11-01', 'p47', 0, 0, 0, 0, 2.00, 3000, 1, 1),
(48, 'Palindromic Queries', 'PalindromicQueries', 'shivanjal', '2017-11-01', 'p48', 0, 0, 0, 0, 2.00, 3000, 3, 1),
(49, 'Big Queries', 'BigQueries', 'vinayak', '2017-11-01', 'p49', 0, 0, 0, 0, 2.00, 3000, 3, 1),
(50, 'Chef and Triangles', 'ChefTriangles', 'lavkush', '2017-11-01', 'p50', 0, 0, 0, 0, 2.00, 3000, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `solves`
--

CREATE TABLE IF NOT EXISTS `solves` (
  `p_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `time` float(15,2) NOT NULL,
  `memory` int(11) NOT NULL,
  `submit_time` datetime NOT NULL,
  `language_id` int(11) NOT NULL,
  `penalty` int(11) NOT NULL,
  PRIMARY KEY (`p_id`,`user_id`),
  KEY `user_id` (`user_id`),
  KEY `language_id` (`language_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `user_id` int(11) NOT NULL,
  `sem` int(11) NOT NULL,
  `cg` decimal(10,2) NOT NULL,
  `batch_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `student_ibfk_2` (`batch_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`user_id`, `sem`, `cg`, `batch_id`) VALUES
(385454, 5, '9.67', 1),
(385455, 5, '8.00', 2),
(385456, 5, '9.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE IF NOT EXISTS `subscription` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`s_id`, `name`, `email`) VALUES
(1, 'Virender Sehwag', 'viru@rediff.com');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=385460 ;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`user_id`, `status`) VALUES
(385457, 1),
(385458, 1),
(385459, 1);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_batch`
--

CREATE TABLE IF NOT EXISTS `teacher_batch` (
  `user_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`batch_id`),
  KEY `batch_id` (`batch_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_batch`
--

INSERT INTO `teacher_batch` (`user_id`, `batch_id`) VALUES
(385457, 1),
(385459, 1),
(385457, 2),
(385458, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `institute_id` char(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(100) NOT NULL,
  `branch` char(20) NOT NULL,
  `dob` date NOT NULL,
  `type` int(11) NOT NULL,
  `about_me` text NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `institute_id` (`institute_id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=385460 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fname`, `lname`, `username`, `institute_id`, `email`, `password`, `branch`, `dob`, `type`, `about_me`) VALUES
(385454, 'Vinayak', 'Sachdeva', 'vishusachdeva', '2015ucp1057', 'vishusachdeva228@gmail.com', '$2y$10$Pid9CsIoNyiEOs7OehqwW.4d8dDPLKfdlGVYBEvhkjx7fIyGaA4Dm', 'CSE', '1998-01-01', 1, ''),
(385455, 'Shivanjal', 'Arora', 'shivi', '2015UCP1229', 'shivanjal9@gmail.com', '$2y$10$b853NQF9Yf0l6r6mkmHip.qPzkJoYx6Rz0bYZzH8pGEAOKfXEyL82', 'CSE', '1997-01-01', 1, ''),
(385456, 'Lavkush', 'Kumar', 'lavkush', '2015UCP1463', '2015UCP1463@mnit.ac.in', '$2y$10$FBeBh7whGtCgAUmjViu1j.3WAxHnBNbUPFQq10PzAhWoI.j9dCwbS', 'CSE', '1997-12-31', 1, ''),
(385457, 'Rahul', 'Gandhi', 'rahul', 'rgcse', 'rgcse@congress.com', '$2y$10$cVDMY1w0339hqfafDaLIu.VRRIzVf4lnqtYfYT55NtB/n0eZRM3sG', 'CSE', '1963-11-29', 2, ''),
(385458, 'Arvind', 'Kejriwal', 'kejri', 'akcse', 'akcse@hotmail.com', '$2y$10$mpfdTXFa7j.zn2sn0pbjbuUrdC1sZqtn/krrcvh/GsEbv.W5qVQh.', 'CSE', '1930-02-02', 2, ''),
(385459, 'Narendra', 'Modi', 'namo', 'nmcse', 'nmcse@yahoo.in', '$2y$10$9iiL0FqXHgsFoT.sP0ByIea/OeVvEkk3.7sTD0iVK4V51J5di/UzW', 'CSE', '1970-02-03', 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `winner`
--

CREATE TABLE IF NOT EXISTS `winner` (
  `c_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rank` int(11) NOT NULL,
  `prize` varchar(100) NOT NULL,
  PRIMARY KEY (`c_id`,`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `asg`
--
ALTER TABLE `asg`
  ADD CONSTRAINT `t_idb` FOREIGN KEY (`batch_id`) REFERENCES `batch` (`batch_id`),
  ADD CONSTRAINT `u_asg` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `asg_prob`
--
ALTER TABLE `asg_prob`
  ADD CONSTRAINT `a` FOREIGN KEY (`asg_id`) REFERENCES `asg` (`asg_id`),
  ADD CONSTRAINT `b` FOREIGN KEY (`p_id`) REFERENCES `problem` (`p_id`);

--
-- Constraints for table `banner`
--
ALTER TABLE `banner`
  ADD CONSTRAINT `banner_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `contest` (`c_id`);

--
-- Constraints for table `contest_prob`
--
ALTER TABLE `contest_prob`
  ADD CONSTRAINT `contest_prob_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `contest` (`c_id`),
  ADD CONSTRAINT `contest_prob_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `problem` (`p_id`);

--
-- Constraints for table `languages_allowed`
--
ALTER TABLE `languages_allowed`
  ADD CONSTRAINT `languages_allowed_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `problem` (`p_id`),
  ADD CONSTRAINT `languages_allowed_ibfk_2` FOREIGN KEY (`language_id`) REFERENCES `language` (`language_id`);

--
-- Constraints for table `participation`
--
ALTER TABLE `participation`
  ADD CONSTRAINT `participation_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `participation_ibfk_2` FOREIGN KEY (`c_id`) REFERENCES `contest` (`c_id`),
  ADD CONSTRAINT `participation_ibfk_3` FOREIGN KEY (`p_id`) REFERENCES `problem` (`p_id`);

--
-- Constraints for table `solves`
--
ALTER TABLE `solves`
  ADD CONSTRAINT `solves_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `problem` (`p_id`),
  ADD CONSTRAINT `solves_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `solves_ibfk_3` FOREIGN KEY (`language_id`) REFERENCES `language` (`language_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`batch_id`) REFERENCES `batch` (`batch_id`) ON UPDATE CASCADE;

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `u_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `teacher_batch`
--
ALTER TABLE `teacher_batch`
  ADD CONSTRAINT `teacher_batch_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `teacher` (`user_id`),
  ADD CONSTRAINT `teacher_batch_ibfk_2` FOREIGN KEY (`batch_id`) REFERENCES `batch` (`batch_id`);

--
-- Constraints for table `winner`
--
ALTER TABLE `winner`
  ADD CONSTRAINT `winner_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `contest` (`c_id`),
  ADD CONSTRAINT `winner_ibfk_2` FOREIGN KEY (`c_id`) REFERENCES `contest` (`c_id`),
  ADD CONSTRAINT `winner_ibfk_3` FOREIGN KEY (`c_id`) REFERENCES `contest` (`c_id`),
  ADD CONSTRAINT `winner_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
