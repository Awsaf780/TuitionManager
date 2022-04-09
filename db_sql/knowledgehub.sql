-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2022 at 02:07 PM
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
(14, 'awsaf321', 'AWSAF', 'MAHMOOD', 'Maths, Physics', 4, 'NSU', 8000, '89/4, North Badda, West Wind Point, Flat 11/C', '9'),
(15, 'awsaf321', 'AWSAF', 'MAHMOOD', 'English', 6, 'NSU', 8000, '89/4, North Badda, West Wind Point, Flat 11/C', '9'),
(16, 'awsaf321', 'AWSAF', 'MAHMOOD', 'Bangla', 3, 'NSU', 4000, '89/4, North Badda, West Wind Point, Flat 11/C', '9');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tuitionoffers`
--
ALTER TABLE `tuitionoffers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
