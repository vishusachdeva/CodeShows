-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2017 at 07:56 PM
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
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `institute_id` char(15) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL,
  `sem` int(11) NOT NULL,
  `cg` decimal(10,0) NOT NULL,
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
(1, 'Vinayak', 'Sachdeva', 'vishusachdeva', '2015ucp1057', 'vishusachdeva228@gmail.com', '$2y$10$A6l6y0IMGebMv', 5, '10', 'CSE', '1998-02-06', 'A', 'fuck'),
(2, 'Shivanjal', 'Arora', 'shivi6011', '2015ucp1229', 'shivanjal9@gmail.com', '$2y$10$wKx/RPrZq/y0S', 5, '10', 'CSE', '1997-03-07', 'A', 'jhaatu Rockstar of MNIT');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
