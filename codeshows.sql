-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2017 at 03:24 PM
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
(1, 1, 'vinayak ko pito', '2017-10-04 20:00:00', '2017-10-04 23:00:00', 5, 'hey you');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE IF NOT EXISTS `language` (
  `language_id` int(11) NOT NULL,
  `language_name` varchar(10) NOT NULL,
  PRIMARY KEY (`language_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `languages_allowed`
--

CREATE TABLE IF NOT EXISTS `languages_allowed` (
  `p_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  PRIMARY KEY (`p_id`,`language_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `participation`
--

CREATE TABLE IF NOT EXISTS `participation` (
  `user_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`c_id`),
  KEY `c_id` (`c_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `problem`
--

CREATE TABLE IF NOT EXISTS `problem` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_name` varchar(50) NOT NULL,
  `p_code` varchar(10) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `problem`
--

INSERT INTO `problem` (`p_id`, `p_name`, `p_code`, `p_setter`, `date_added`, `p_filename`, `u_attempt`, `u_solve`, `accepted`, `submitted`, `time_limit`, `source_limit`, `difficulty`, `status`) VALUES
(1, 'easy', 'rt', 'cdcedc', '2017-09-02', 'edcdcedcedcedcecec', 3, 34, 23, 23, 2.02, 2879, 1, 0),
(2, 'med', 'rte', 'cdcedc', '2017-09-02', 'edcdcedcedcedcecec', 3, 34, 23, 23, 10.00, 2879, 2, 1),
(3, 'hard', 'rtet', 'cdcedc', '2017-09-02', 'edcdcedcedcedcecec', 3, 34, 23, 23, 2.02, 2879, 3, 0),
(4, 'hard', 'rtetsf', 'cdcedc', '2017-09-02', 'edcdcedcedcedcecec', 3, 34, 23, 23, 2.02, 2879, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `solves`
--

CREATE TABLE IF NOT EXISTS `solves` (
  `p_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `time` float(15,2) NOT NULL,
  `memory` int(11) NOT NULL,
  `date` date NOT NULL,
  `language_id` int(11) NOT NULL,
  `penalty` int(11) NOT NULL,
  PRIMARY KEY (`p_id`,`user_id`),
  KEY `user_id` (`user_id`),
  KEY `language_id` (`language_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `institute_id` char(15) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(100) NOT NULL,
  `sem` int(11) NOT NULL,
  `cg` decimal(10,0) NOT NULL,
  `branch` char(20) NOT NULL,
  `dob` date NOT NULL,
  `batch` varchar(5) NOT NULL,
  `about_me` text NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `institute_id` (`institute_id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=385447 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fname`, `lname`, `username`, `institute_id`, `email`, `password`, `sem`, `cg`, `branch`, `dob`, `batch`, `about_me`) VALUES
(1, 'Shivanjal', 'Arora', 'shivi6011', '2015UCP5454', 'shivanjal9@gmail.com', '$2y$10$wd79a0v0ZxQub8nTDH5h8eL23cBbyQ43FrIRClSaLUWJYyVd3gMim', 5, '8', 'CSE', '0000-00-00', 'A1A2', 'aksndoanbso'),
(385446, 'a', 'a', 'a', '2015UCP1225', 'v@g32.ds', '$2y$10$XJ.aHo8IvpaFfVTemU/TJeGv5jz8r2lTuFcN3teZS9SScXE.v4CJq', 1, '10', 'AP', '2017-12-31', 'A', '');

-- --------------------------------------------------------

--
-- Table structure for table `winner`
--

CREATE TABLE IF NOT EXISTS `winner` (
  `c_id` int(11) NOT NULL,
  `winner_id` int(11) NOT NULL,
  `prize` varchar(100) NOT NULL,
  PRIMARY KEY (`c_id`,`winner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `participation`
--
ALTER TABLE `participation`
  ADD CONSTRAINT `participation_ibfk_2` FOREIGN KEY (`c_id`) REFERENCES `contest` (`c_id`),
  ADD CONSTRAINT `participation_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `solves`
--
ALTER TABLE `solves`
  ADD CONSTRAINT `solves_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `problem` (`p_id`),
  ADD CONSTRAINT `solves_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `solves_ibfk_3` FOREIGN KEY (`language_id`) REFERENCES `language` (`language_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
