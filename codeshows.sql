-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2017 at 06:53 PM
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
  `cg` double(10,2) NOT NULL,
  `branch` char(20) NOT NULL,
  `dob` date NOT NULL,
  `batch` varchar(5) NOT NULL,
  `about_me` text NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `institute_id` (`institute_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fname`, `lname`, `username`, `institute_id`, `email`, `password`, `sem`, `cg`, `branch`, `dob`, `batch`, `about_me`) VALUES
(1, 'b', 'b', 'b', 'b', 'b@gmail.com', '$2y$10$weoksPS6HYql3nWVXtq/MefTUwFvv6PUNKAlTaG3vsKWMrkZmHwmu', 1, 45.00, 'Computer Science And', '2016-11-30', 'abi', 'alskmnd'),
(2, 'Shivanjal', 'Arora', 'shivi6011', '2015UCp1220', 'shivanjal9@gmail.com', '$2y$10$NGTCgo8fgV5FHIy4/pVLouwcGI4TyKmJcmLKuX4J98Zp06.s97.8q', 5, 1.00, 'CSE', '2017-01-01', 'baj', 'adjkl');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
