-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2017 at 07:36 PM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.5.9-1ubuntu4.20

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
  `time_limit` float(3,2) NOT NULL,
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
(1, 'easy', 'rt', 'cdcedc', '2017-09-02', 'edcdcedcedcedcecec', 3, 34, 23, 23, 2.02, 2879, 1, 1),
(2, 'med', 'rte', 'cdcedc', '2017-09-02', 'edcdcedcedcedcecec', 3, 34, 23, 23, 2.02, 2879, 2, 1),
(3, 'hard', 'rtet', 'cdcedc', '2017-09-02', 'edcdcedcedcedcecec', 3, 34, 23, 23, 2.02, 2879, 3, 1),
(4, 'hard', 'rtetsf', 'cdcedc', '2017-09-02', 'edcdcedcedcedcecec', 3, 34, 23, 23, 2.02, 2879, 3, 0);

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
