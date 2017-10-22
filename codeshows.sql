-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2017 at 12:44 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codeshows`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `c_id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`c_id`, `image`) VALUES
(1, 'banner2.jpg'),
(2, 'banner3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contest`
--

CREATE TABLE `contest` (
  `c_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `contest_name` varchar(100) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `no_of_problems` int(11) NOT NULL,
  `about_contest` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contest`
--

INSERT INTO `contest` (`c_id`, `admin_id`, `contest_name`, `start_time`, `end_time`, `no_of_problems`, `about_contest`) VALUES
(1, 1, 'vinayak', '2017-10-04 20:00:00', '2017-10-04 23:00:00', 5, 'hey you'),
(2, 2, 'shivi', '2017-10-25 21:30:00', '2017-10-26 00:00:00', 3, 'nothing');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `language_id` int(11) NOT NULL,
  `language_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `languages_allowed`
--

CREATE TABLE `languages_allowed` (
  `p_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `participation`
--

CREATE TABLE `participation` (
  `user_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `problem`
--

CREATE TABLE `problem` (
  `p_id` int(11) NOT NULL,
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
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `solves` (
  `p_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `time` float(15,2) NOT NULL,
  `memory` int(11) NOT NULL,
  `date` date NOT NULL,
  `language_id` int(11) NOT NULL,
  `penalty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
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
  `about_me` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fname`, `lname`, `username`, `institute_id`, `email`, `password`, `sem`, `cg`, `branch`, `dob`, `batch`, `about_me`) VALUES
(1, 'Shivanjal', 'Arora', 'shivi6011', '2015UCP5454', 'shivanjal9@gmail.com', '$2y$10$wd79a0v0ZxQub8nTDH5h8eL23cBbyQ43FrIRClSaLUWJYyVd3gMim', 5, '8', 'CSE', '0000-00-00', 'A1A2', 'aksndoanbso'),
(385446, 'a', 'a', 'a', '2015UCP1225', 'v@g32.ds', '$2y$10$XJ.aHo8IvpaFfVTemU/TJeGv5jz8r2lTuFcN3teZS9SScXE.v4CJq', 1, '10', 'AP', '2017-12-31', 'A', ''),
(385447, 'Vinayak', 'Sachdeva', 'vishusachdeva', '2015UCP1057', 'vishusachdeva228@gmail.com', '$2y$10$uf0uksYSLfUfJeZhhPxXxe20tWzLvoJVfHBI2UmSEERfWuQXnR82m', 5, '10', 'CSE', '1998-02-06', 'A', 'nothing!!');

-- --------------------------------------------------------

--
-- Table structure for table `winner`
--

CREATE TABLE `winner` (
  `c_id` int(11) NOT NULL,
  `winner_id` int(11) NOT NULL,
  `prize` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contest`
--
ALTER TABLE `contest`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`language_id`);

--
-- Indexes for table `languages_allowed`
--
ALTER TABLE `languages_allowed`
  ADD PRIMARY KEY (`p_id`,`language_id`);

--
-- Indexes for table `participation`
--
ALTER TABLE `participation`
  ADD PRIMARY KEY (`user_id`,`c_id`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `problem`
--
ALTER TABLE `problem`
  ADD PRIMARY KEY (`p_id`),
  ADD UNIQUE KEY `p_code` (`p_code`,`p_filename`),
  ADD KEY `difficulty` (`difficulty`);

--
-- Indexes for table `solves`
--
ALTER TABLE `solves`
  ADD PRIMARY KEY (`p_id`,`user_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `language_id` (`language_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `institute_id` (`institute_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `winner`
--
ALTER TABLE `winner`
  ADD PRIMARY KEY (`c_id`,`winner_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `problem`
--
ALTER TABLE `problem`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=385448;
--
-- Constraints for dumped tables
--

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
