-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2022 at 02:04 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `age` int(100) NOT NULL,
  `sex` varchar(100) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `fname`, `mname`, `lname`, `address`, `email`, `age`, `sex`, `uname`, `pass`) VALUES
(1, 'Eyerusalem', 'Tadesse', 'Ayele', 'arbaminchi', 'eu1@eu1', 22, 'fmale', 'eu1', '123');

-- --------------------------------------------------------

--
-- Table structure for table `class room`
--

CREATE TABLE `class room` (
  `id` int(11) NOT NULL,
  `block_no` varchar(100) NOT NULL,
  `room_no` varchar(100) NOT NULL,
  `capacity` int(100) NOT NULL,
  `status` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class room`
--

INSERT INTO `class room` (`id`, `block_no`, `room_no`, `capacity`, `status`) VALUES
(1, 'LH-Q', '105', 40, 0);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `c_code` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `sem` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `c_code`, `name`, `sem`) VALUES
(1, 'CS02', 'Java', 'Sem I'),
(2, '2020cs', 'C++', 'Summer');

-- --------------------------------------------------------

--
-- Table structure for table `head`
--

CREATE TABLE `head` (
  `hed_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `age` int(100) NOT NULL,
  `sex` varchar(100) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `head`
--

INSERT INTO `head` (`hed_id`, `fname`, `mname`, `lname`, `address`, `email`, `age`, `sex`, `uname`, `pass`) VALUES
(3, 'Betelhame', 'Kidane', 'Guduru', 'arbaminchi', 'btl@btl', 22, 'fmale', 'bt1', '123');

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `ins_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `age` int(100) NOT NULL,
  `sex` varchar(100) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `status` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`ins_id`, `fname`, `mname`, `lname`, `address`, `email`, `age`, `sex`, `uname`, `pass`, `status`) VALUES
(0, 'Adissalem', 'yayeh', 'ayele', 'arbaminchi', 'ad@ad', 24, 'fmale', 'Adiss', '123456', 0);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `fromm` varchar(100) NOT NULL,
  `too` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `fromm`, `too`, `content`, `status`) VALUES
(12, '', '', 'chigir ale', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_exam`
--

CREATE TABLE `m_exam` (
  `id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `sem` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_exam`
--

INSERT INTO `m_exam` (`id`, `type`, `sem`, `year`) VALUES
(1, 'Midterm', 'Summer', '2022'),
(2, 'Finalterm', 'Sem I', '2023'),
(4, 'Finalterm', 'sem I', '2020');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `course` varchar(255) NOT NULL,
  `sem` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `room` varchar(255) NOT NULL,
  `ins_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `type`, `course`, `sem`, `year`, `room`, `ins_id`) VALUES
(1, 'Finalterm', '1', 'Sem I', '2023', '1', 'Adissalem yayeh  ayele'),
(2, 'Finalterm', 'Java', 'Sem I', '2023', 'LH-Q: 105:  50', 'Adissalem yayeh  ayele'),
(3, 'Midterm', 'C++', 'Summer', '2022', 'LH-Q: 105:  50', 'Adissalem yayeh  ayele'),
(4, 'Finalterm', 'Compliler', 'sem I', '2020', 'LH-Q: 105:  40', 'Adissalem yayeh  ayele');

-- --------------------------------------------------------

--
-- Table structure for table `semister`
--

CREATE TABLE `semister` (
  `id` int(11) NOT NULL,
  `sem` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `status` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semister`
--

INSERT INTO `semister` (`id`, `sem`, `year`, `status`) VALUES
(1, 'sem I', '2020', 1),
(4, 'Sem I', '2023', 0),
(6, 'Summer', '2022', 0),
(7, 'Sem II', '2023', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `u_type` varchar(255) NOT NULL,
  `status` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `username`, `pass`, `email`, `u_type`, `status`) VALUES
(1, 'eu1', '123', 'eu1@eu1', 'admin', 1),
(3, 'bt1', '123', 'btl@btl', 'head', 1),
(4, 'Adiss', '123456', 'ad@ad', 'instructor', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class room`
--
ALTER TABLE `class room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `head`
--
ALTER TABLE `head`
  ADD PRIMARY KEY (`hed_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_exam`
--
ALTER TABLE `m_exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semister`
--
ALTER TABLE `semister`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class room`
--
ALTER TABLE `class room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `head`
--
ALTER TABLE `head`
  MODIFY `hed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `m_exam`
--
ALTER TABLE `m_exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `semister`
--
ALTER TABLE `semister`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
