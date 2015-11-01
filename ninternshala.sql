-- phpMyAdmin SQL Dump
-- version 4.2.12deb2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 26, 2015 at 02:30 PM
-- Server version: 5.6.25-0ubuntu0.15.04.1
-- PHP Version: 5.6.4-4ubuntu6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ninternshala`
--

-- --------------------------------------------------------

--
-- Table structure for table `applied`
--

CREATE TABLE IF NOT EXISTS `applied` (
  `job_id` int(11) NOT NULL,
  `student_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applied`
--

INSERT INTO `applied` (`job_id`, `student_id`) VALUES
(1, 'sunilagarwal'),
(2, 'sunilagarwal'),
(3, 'sunilagarwal'),
(1, 'vishalagarwal'),
(2, 'vishalagarwal'),
(3, 'vishalagarwal');

-- --------------------------------------------------------

--
-- Table structure for table `creates`
--

CREATE TABLE IF NOT EXISTS `creates` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `creates`
--

INSERT INTO `creates` (`id`, `emp_id`) VALUES
(3, 'hr@flipkart'),
(1, 'hr@paytm'),
(2, 'hr@paytm');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `company` varchar(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`company`, `username`, `password`) VALUES
('Flipkart', 'hr@flipkart', 'flipkart'),
('freecharge', 'hr@freecharge', 'freecharge'),
('Paytm', 'hr@paytm', 'paytm');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE IF NOT EXISTS `job` (
  `job_id` int(11) NOT NULL,
  `opening_post` varchar(30) NOT NULL,
  `start_date` date NOT NULL,
  `period` varchar(11) NOT NULL,
  `salary` varchar(20) NOT NULL,
  `posted_on` date NOT NULL,
  `expires` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`job_id`, `opening_post`, `start_date`, `period`, `salary`, `posted_on`, `expires`) VALUES
(1, 'Tester', '2015-07-30', '3 month', '15000 /-', '2015-07-12', '2015-07-18'),
(2, 'Software Developer', '2015-07-30', '3 month', '15000 /-', '2015-07-12', '2015-07-18'),
(3, 'Software Developer', '2015-07-30', '3 month', '15000 /-', '2015-07-12', '2015-07-15');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `college` varchar(50) NOT NULL,
  `percentage` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`name`, `username`, `password`, `college`, `percentage`) VALUES
('Sandeep Agarwal', 'sandeep.agarwal', 'sandeep', 'Jecrc', '80'),
('Sunil Agarwal', 'sunilagarwal', 'sunil', 'Jecrc', '76'),
('Vishal Agarwal', 'vishalagarwal', 'vishal', 'Jecrc', '85');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applied`
--
ALTER TABLE `applied`
 ADD PRIMARY KEY (`job_id`,`student_id`), ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `creates`
--
ALTER TABLE `creates`
 ADD PRIMARY KEY (`id`,`emp_id`), ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
 ADD PRIMARY KEY (`username`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
 ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
 ADD PRIMARY KEY (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applied`
--
ALTER TABLE `applied`
ADD CONSTRAINT `applied_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `job` (`job_id`),
ADD CONSTRAINT `applied_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`username`);

--
-- Constraints for table `creates`
--
ALTER TABLE `creates`
ADD CONSTRAINT `creates_ibfk_1` FOREIGN KEY (`id`) REFERENCES `job` (`job_id`),
ADD CONSTRAINT `creates_ibfk_2` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
