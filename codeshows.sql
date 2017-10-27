-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2017 at 09:36 PM
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
  `asg_id` int(11) NOT NULL,
  `asg_name` varchar(100) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `total_marks` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `date_of_addition` datetime NOT NULL,
  PRIMARY KEY (`asg_id`),
  KEY `t_idb` (`batch_id`),
  KEY `u_asg` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asg`
--

INSERT INTO `asg` (`asg_id`, `asg_name`, `start_time`, `end_time`, `total_marks`, `user_id`, `batch_id`, `date_of_addition`) VALUES
(1, 'first', '2017-10-27 00:00:00', '2018-02-08 00:00:00', 100, 385450, 1, '2017-10-27 00:00:00');

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
(1, 2, 100);

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `c_id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`c_id`, `image`) VALUES
(1, 'banner1.jpg'),
(2, 'banner2.jpg'),
(3, 'banner3.jpg');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`batch_name`, `sem`, `branch`, `batch_id`) VALUES
('A1A2', 5, 'CSE', 1);

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
(1, 1, 'vinayak', '2017-10-04 20:00:00', '2017-10-04 23:00:00', 5, 'hey you'),
(2, 2, 'shivi', '2017-10-25 21:30:00', '2017-10-31 00:00:00', 3, 'nothing'),
(3, 738927, 'lav kush', '2018-02-24 17:00:00', '2018-03-30 00:00:00', 2, 'Aabra ka dabra');

-- --------------------------------------------------------

--
-- Table structure for table `contest_prob`
--

CREATE TABLE IF NOT EXISTS `contest_prob` (
  `c_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  PRIMARY KEY (`c_id`,`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contest_prob`
--

INSERT INTO `contest_prob` (`c_id`, `p_id`, `score`) VALUES
(1, 4, 100),
(2, 5, 100),
(3, 6, 100);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `problem`
--

INSERT INTO `problem` (`p_id`, `p_name`, `p_code`, `p_setter`, `date_added`, `p_filename`, `u_attempt`, `u_solve`, `accepted`, `submitted`, `time_limit`, `source_limit`, `difficulty`, `status`) VALUES
(1, 'easy', 'rt', 'cdcedc', '2017-09-02', '0_practise', 3, 34, 23, 23, 2.02, 2879, 1, 0),
(2, 'med', 'rte', 'cdcedc', '2017-09-02', 'edcdcedcedcedcecec', 3, 34, 23, 23, 10.00, 2879, 2, 2),
(3, 'hard', 'rtet', 'cdcedc', '2017-09-02', 'edcdcedcedcedcecec', 3, 34, 23, 23, 2.02, 2879, 3, 0),
(4, 'hard', 'rtetsf', 'cdcedc', '2017-09-02', 'edcdcedcedcedcecec', 3, 34, 23, 23, 2.02, 2879, 3, 1),
(5, 'easy_c', 'rtyrt', 'yws', '2017-10-06', '1', 21, 123, 132, 123, 12.00, 30000, 1, 1),
(6, 'MED_C', 'askodh', 'asjkdh', '2017-10-03', '1', 1, 1, 1, 1, 1.00, 1, 2, 1);

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
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`user_id`, `sem`, `cg`, `batch_id`) VALUES
(385447, 5, '9.63', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE IF NOT EXISTS `subscription` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`s_id`, `name`, `email`) VALUES
(1, 'Vinayak', 'vishusachdeva228@gmail.com'),
(2, 'shivi', 'shivi@gmail.com'),
(3, 'lav', 'lav@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=385453 ;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`user_id`, `status`) VALUES
(385450, 0),
(385452, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=385453 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fname`, `lname`, `username`, `institute_id`, `email`, `password`, `branch`, `dob`, `type`, `about_me`) VALUES
(1, 'Shivanjal', 'Arora', 'shivi6011', '2015UCP5454', 'shivanjal9@gmail.com', '$2y$10$j6Vea7UtQkEW8UjpnkfVROxV6GDf4qpTmBsF1MTNfgWR3snSZWkWi', 'CSE', '0000-00-00', 1, 'aksndoanbso'),
(385446, 'a', 'a', 'a', '2015UCP1225', 'v@g32.ds', '$2y$10$XJ.aHo8IvpaFfVTemU/TJeGv5jz8r2lTuFcN3teZS9SScXE.v4CJq', 'AP', '2017-12-31', 1, ''),
(385447, 'Vinayak', 'Sachdeva', 'vishusachdeva', '2015UCP1057', 'vishusachdeva228@gmail.com', '$2y$10$uf0uksYSLfUfJeZhhPxXxe20tWzLvoJVfHBI2UmSEERfWuQXnR82m', 'CSE', '1998-02-06', 1, 'nothing!!'),
(385448, 'aa', 'aa', 'aa', '2015UCP5677', 'aa@gmail.com', '$2y$10$VvkB.33aWoSPL5ZSDJ0djurwLCy922feT6rcw/xJ/PZqPjvVKQJQe', 'CE', '1990-12-03', 1, 'aa'),
(385449, 'as', 'as', 'as', '2015UCP1111', 'sdfs@gmail.com', '$2y$10$dlc0vgqn/PyjyTHGw18fbuqwaLBH6FarLFiH7wvkaY5JRl6MmwiXm', 'CSE', '2017-10-05', 1, 'wswdc'),
(385450, 'Vinayakt', 'Sachdevat', 'vishusachdevat', 'wdqj', 'adjg@shd.asd', '$2y$10$qkXdNN1rkL5vo1flBZGkX.mKe29AgmNaIt9gigZcQEo.TasET0izS', 'CSE', '2015-12-31', 2, 'efdjgew'),
(385452, 'Vinayaktt', 'Sachdevatt', 'vishusachdevatt', 'qwerty', 'vishusachdeva228@gmail.comt', '$2y$10$mJ2jBOpBsqwUmDqUQkJr4eQiXrFfl60LggQAxvfBoReVC/cHlWcKm', 'CSE', '2006-11-30', 2, 'efke');

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
  ADD CONSTRAINT `b` FOREIGN KEY (`p_id`) REFERENCES `problem` (`p_id`),
  ADD CONSTRAINT `c` FOREIGN KEY (`asg_id`) REFERENCES `asg` (`asg_id`);

--
-- Constraints for table `participation`
--
ALTER TABLE `participation`
  ADD CONSTRAINT `participation_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `participation_ibfk_2` FOREIGN KEY (`c_id`) REFERENCES `contest` (`c_id`);

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
