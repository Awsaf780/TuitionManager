-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2022 at 06:04 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `knowledgehub`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `firstname`, `lastname`) VALUES
('awsaf', '$2y$10$vb3mkmavYqciYyLzMrhqUOlmF95539v1p2tg.rxuM/CnNJjB/UIUG', 'Awsaf', 'Mahmood');

-- --------------------------------------------------------

--
-- Table structure for table `currenttuitions`
--

CREATE TABLE `currenttuitions` (
  `id` int(11) NOT NULL,
  `student` varchar(30) NOT NULL,
  `teacher` varchar(30) NOT NULL,
  `teacherphone` varchar(15) NOT NULL,
  `studentphone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currenttuitions`
--

INSERT INTO `currenttuitions` (`id`, `student`, `teacher`, `teacherphone`, `studentphone`) VALUES
(18, 'awsaf_s', 'awsaf_t', '01625604871', '01625604871'),
(19, 'raghib_noor', 'asif_dewan', '01957375831', '01675648371'),
(20, 'raghib_noor', 'awsaf_t', '01625604871', '01675648371');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `message_to` varchar(30) NOT NULL,
  `message_from` varchar(30) NOT NULL,
  `message` varchar(500) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `student` varchar(30) NOT NULL,
  `teacher` varchar(30) NOT NULL,
  `star` int(10) NOT NULL,
  `review` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `nid` varchar(20) NOT NULL,
  `region` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `curriculum` varchar(30) NOT NULL,
  `class` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`username`, `password`, `firstname`, `lastname`, `phone`, `nid`, `region`, `address`, `curriculum`, `class`) VALUES
('awsaf_s', '$2y$10$N1QS1tqFAYMrXh4g1.aKH.YyDkGua.xVBwBTO.JzwYC0tmrJWuhCS', 'Awsaf', 'Mahmood', '01625604871', '', 'Mohammadpur', '? - 89/4, North Badda, West Wind Point, Flat 11/C', 'English Medium', '5'),
('raghib_noor', '$2y$10$6EKo0uS6gYaQMsf.YlS8P.mvHtIg7EnRjtFdXruAkIrCpbkMyezdm', 'Raghib', 'Noor', '01675648371', '9577603609', 'Dhanmondi', 'Random Address 2', 'English Medium', '9');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `nid` varchar(20) NOT NULL,
  `institution` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`username`, `password`, `firstname`, `lastname`, `phone`, `nid`, `institution`, `address`) VALUES
('asif_dewan', '$2y$10$aox4R8Wvk99qI0RZK.0joOeXSuyPW.gFcGhjBgY2V4.aoVayrhnZW', 'Asif', 'Dewan', '01957375831', '9577603609', 'BRAC', 'Random Address'),
('awsaf_t', '$2y$10$hatRagInW9k0TH0CB/mAmO5dGbBqkr2VayUOr/BTKfip5jLFSGD6C', 'Awsaf', 'Mahmood', '01625604871', '', 'DU', '89/4, North Badda, West Wind Point, Flat 11/C'),
('awsaf_t2', '$2y$10$5YWc1ef7Z2hbJTa38pcmpuLTSq6bkkxI8aPQKbMd.yxhDQkJA3Tc6', 'Awsaf', 'Mahmood', '01625604871', '', 'BRAC', '? - 89/4, North Badda, West Wind Point, Flat 11/C');

-- --------------------------------------------------------

--
-- Table structure for table `tuitionoffers`
--

CREATE TABLE `tuitionoffers` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `subjects` varchar(150) NOT NULL,
  `days` int(10) NOT NULL,
  `prefferedinstitution` varchar(30) NOT NULL,
  `fee` int(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `class` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tuitionoffers`
--

INSERT INTO `tuitionoffers` (`id`, `username`, `firstname`, `lastname`, `subjects`, `days`, `prefferedinstitution`, `fee`, `address`, `class`) VALUES
(23, 'awsaf_s', 'Awsaf', 'Mahmood', 'Maths, Physics', 4, 'NSU', 5000, '? - 89/4, North Badda, West Wind Point, Flat 11/C', '5'),
(24, 'awsaf_s', 'Awsaf', 'Mahmood', 'English, Bangla', 5, 'BUET', 9000, '? - 89/4, North Badda, West Wind Point, Flat 11/C', '5'),
(26, 'raghib_noor', 'Raghib', 'Noor', 'Science', 4, 'DMC', 8000, 'Random Address 2', '9');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `currenttuitions`
--
ALTER TABLE `currenttuitions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tuitionoffers`
--
ALTER TABLE `tuitionoffers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `currenttuitions`
--
ALTER TABLE `currenttuitions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tuitionoffers`
--
ALTER TABLE `tuitionoffers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
