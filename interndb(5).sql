-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2024 at 05:47 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `interndb`
--
CREATE DATABASE IF NOT EXISTS `interndb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `interndb`;

-- --------------------------------------------------------

--
-- Table structure for table `accountrole`
--

CREATE TABLE `accountrole` (
  `roleid` int(2) NOT NULL,
  `accrole` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `accounttbl`
--

CREATE TABLE `accounttbl` (
  `id` int(9) NOT NULL,
  `accrole` enum('Administrator') NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounttbl`
--

INSERT INTO `accounttbl` (`id`, `accrole`, `username`, `password`) VALUES
(1, 'Administrator', 'admin', '$2y$10$acRfTwm9LrVeUVT3kQUo8OAy26PSS42.aeKDMe4fVovA4X/kJ0CgG');

-- --------------------------------------------------------

--
-- Table structure for table `coursetbl`
--

CREATE TABLE `coursetbl` (
  `courseid` int(9) NOT NULL,
  `course` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coursetbl`
--

INSERT INTO `coursetbl` (`courseid`, `course`) VALUES
(1, 'BSCS'),
(2, 'BSIT'),
(3, 'BSIS'),
(4, 'BSCpE');

-- --------------------------------------------------------

--
-- Table structure for table `dateend`
--

CREATE TABLE `dateend` (
  `end_id` int(9) NOT NULL,
  `endate` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dateend`
--

INSERT INTO `dateend` (`end_id`, `endate`) VALUES
(1, '2024-08-31'),
(2, '2024-08-30'),
(3, '2024-08-31'),
(4, '2024-08-29'),
(5, '2024-07-29'),
(6, '2024-08-30'),
(7, '2024-08-12'),
(8, '2024-08-12'),
(9, '2024-08-31'),
(10, '2024-09-25'),
(11, '2026-05-31'),
(12, '2026-05-31'),
(13, '2024-08-29'),
(14, '2024-08-28'),
(15, '2024-08-10'),
(16, '2024-08-10'),
(17, '2024-08-31'),
(18, '2024-09-25'),
(19, '2024-10-08'),
(20, '2024-10-09'),
(21, '2024-10-01'),
(22, '2024-08-01'),
(23, '2024-10-02'),
(24, '2024-10-08'),
(25, '2024-09-11'),
(26, '2024-08-30'),
(27, '2024-10-01'),
(28, '2024-10-01'),
(29, '2024-08-30'),
(30, '2024-08-30'),
(31, '2024-08-30'),
(32, '2024-08-30'),
(33, '2024-08-30'),
(34, '2024-08-30'),
(35, '2024-10-29'),
(36, '2024-09-25');

-- --------------------------------------------------------

--
-- Table structure for table `datestart`
--

CREATE TABLE `datestart` (
  `dateid` int(9) NOT NULL,
  `datestart` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `datestart`
--

INSERT INTO `datestart` (`dateid`, `datestart`) VALUES
(1, '2024-07-22'),
(2, '2024-07-29'),
(3, '2024-07-22'),
(4, '2024-07-29'),
(5, '2024-07-01'),
(6, '2024-07-30'),
(7, '2024-07-30'),
(8, '2024-07-30'),
(9, '2024-07-22'),
(10, '2024-07-31'),
(11, '2024-07-31'),
(12, '2024-07-31'),
(13, '2024-07-31'),
(14, '2024-07-31'),
(15, '2024-07-01'),
(16, '2024-07-01'),
(17, '2024-07-31'),
(18, '2024-08-01'),
(19, '2024-08-01'),
(20, '2024-08-01'),
(21, '2024-08-21'),
(22, '2024-08-01'),
(23, '2024-08-01'),
(24, '2024-08-14'),
(25, '2024-08-01'),
(26, '2024-07-22'),
(27, '2024-08-02'),
(28, '2024-08-02'),
(29, '2024-08-02'),
(30, '2024-08-02'),
(31, '2024-08-02'),
(32, '2024-08-02'),
(33, '2024-08-02'),
(34, '2024-08-02'),
(35, '2024-08-31'),
(36, '2024-08-05');

-- --------------------------------------------------------

--
-- Table structure for table `hoursreq`
--

CREATE TABLE `hoursreq` (
  `hreq_id` int(9) NOT NULL,
  `hreq` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hoursreq`
--

INSERT INTO `hoursreq` (`hreq_id`, `hreq`) VALUES
(1, 240),
(2, 240),
(3, 240),
(4, 240),
(5, 240),
(6, 300),
(7, 300),
(8, 240),
(9, 230),
(10, 240),
(11, 240),
(12, 120),
(13, 240),
(14, 120),
(15, 120),
(16, 240),
(17, 240),
(18, 240),
(19, 240),
(20, 2113),
(21, 2112),
(22, 2312),
(23, 2132131241),
(24, 231),
(25, 240),
(26, 240),
(27, 480),
(28, 480),
(29, 480),
(30, 480),
(31, 480),
(32, 560),
(33, 560),
(34, 500),
(35, 240);

-- --------------------------------------------------------

--
-- Table structure for table `hours_rendered`
--

CREATE TABLE `hours_rendered` (
  `render_id` int(9) NOT NULL,
  `h_rend` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hours_rendered`
--

INSERT INTO `hours_rendered` (`render_id`, `h_rend`) VALUES
(1, 21);

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `id` int(9) NOT NULL,
  `schoolname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`id`, `schoolname`) VALUES
(1, 'Cavite State University - Naic'),
(2, 'Emilio Aguinaldo College'),
(3, 'Cavite State University - Imus');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(2) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status`) VALUES
(1, 'On-Going'),
(2, 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `studentinfo`
--

CREATE TABLE `studentinfo` (
  `studid` int(9) NOT NULL,
  `fname` varchar(60) NOT NULL,
  `mname` varchar(60) NOT NULL,
  `lname` varchar(60) NOT NULL,
  `age` int(3) NOT NULL,
  `sex` enum('M','F') NOT NULL,
  `courseid` int(9) NOT NULL,
  `schoolid` int(9) NOT NULL,
  `hrequired` int(9) NOT NULL,
  `startdate` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `status_id` int(2) NOT NULL,
  `status` enum('On-Going','Completed') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentinfo`
--

INSERT INTO `studentinfo` (`studid`, `fname`, `mname`, `lname`, `age`, `sex`, `courseid`, `schoolid`, `hrequired`, `startdate`, `end_date`, `status_id`, `status`) VALUES
(1, 'trial', 'trial', '', 21, 'M', 0, 0, 0, '', '', 0, 'On-Going'),
(2, 'rew', 'rew', 'erw', 23, 'M', 0, 0, 0, '', '', 0, 'On-Going'),
(3, 'rew', 'rew', 'erw', 23, 'M', 0, 0, 0, '', '', 0, 'On-Going'),
(4, 'trial', 'trial', 'trial', 21, 'M', 0, 0, 0, '', '', 0, 'On-Going'),
(5, 'eqw', 'ewq', 'ewew', 20, 'M', 0, 0, 0, '', '', 0, 'On-Going'),
(6, 'weq', 'ewq', 'eeww', 21, 'M', 0, 0, 0, '', '', 0, 'On-Going'),
(7, 'weq', 'ewq', 'eeww', 21, 'M', 0, 0, 0, '', '', 0, 'On-Going'),
(8, 'qwet', 'wqwerq', 'rqwrq', 23, 'M', 0, 0, 0, '', '', 0, 'On-Going'),
(9, 'ewqeqw', 'qwwqeq', 'weq', 23, 'M', 0, 0, 0, '', '', 0, 'On-Going'),
(10, 'ewqeqw', 'qwwqeq', 'weq', 23, 'M', 0, 0, 0, '', '', 0, 'On-Going'),
(11, 'Carl Emmanuel', 'Tejano', 'Cruda', 20, 'M', 0, 0, 0, '', '', 0, 'On-Going'),
(12, 'ewqeqw', 'weqe1', 'e312', 23, 'F', 0, 0, 0, '', '', 0, 'On-Going'),
(13, 'ewqe', 'ewqeq', 'ewq', 20, 'M', 0, 0, 0, '', '', 0, 'On-Going'),
(14, 'ewqe', 'ewqeq', 'ewq', 20, 'M', 0, 0, 0, '', '', 0, 'On-Going'),
(15, '431312edas', 'sqeq', 'eqweq', 20, 'M', 0, 0, 0, '', '', 0, 'On-Going'),
(16, '431312edas', 'ewqeq', 'eqweq', 20, 'M', 0, 0, 0, '', '', 0, 'On-Going'),
(17, 'Carl Emmanuel', 'ewqeq', 'eqweq', 23, 'F', 0, 0, 0, '', '', 0, 'On-Going'),
(18, 'Carl Emmanuel', 'ewqeq', 'eqweq', 23, 'F', 0, 0, 0, '', '', 0, 'On-Going'),
(19, 'weqeq', 'ewqeqw', 'eqwe', 20, 'M', 0, 0, 0, '', '', 0, 'On-Going'),
(20, 'eqweqw', 'ewqeq', '3123', 21, 'M', 0, 0, 0, '', '', 0, 'On-Going'),
(21, '241', 'weq', 'ewq', 21, 'M', 0, 0, 0, '', '', 0, 'On-Going'),
(22, 'eqw', 'wqeq', 'ewq', 21, 'M', 0, 0, 0, '', '', 0, 'On-Going'),
(23, 'ewqeq', 'dsad', 'ewq', 21, 'M', 0, 0, 0, '', '', 0, 'On-Going'),
(24, 'qe', 'ew', 'ew', 21, 'M', 1, 1, 0, '', '', 0, 'On-Going'),
(25, 'ewq', 'ewqe', 'ewqe', 21321, 'M', 1, 2, 0, '', '', 0, 'On-Going'),
(26, 'fds', 'fdsfds', 'fer', 21, 'M', 3, 2, 0, '', '', 0, 'On-Going'),
(27, '321', '231', '231', 21, 'F', 4, 2, 0, '', '', 0, 'On-Going'),
(28, 'Carl Emmanuel', 'Tejano', 'Cruda', 20, 'M', 1, 1, 0, '', '', 0, 'On-Going'),
(29, 'eqw', '2131', 'wqeqw', 21, 'M', 2, 2, 0, '', '', 0, 'On-Going'),
(30, 'eqw', '5tre', 'wqeqw', 21, 'M', 2, 2, 0, '', '', 0, 'On-Going'),
(31, 'juan', 'cristiano', 'cruz', 20, 'M', 1, 1, 0, '', '', 0, 'On-Going'),
(32, 'pedro', 'cristiano', 'cruz', 20, 'M', 1, 1, 0, '', '', 0, 'On-Going'),
(33, 'Jomar', 'cristiano', 'Briones', 23, 'M', 1, 1, 0, '', '', 0, 'On-Going'),
(34, 'paulo', 'benavidez', 'morete', 22, 'M', 3, 2, 0, '', '', 0, 'On-Going'),
(35, 'Poncio', 'ddqw', 'Pilato', 24, 'M', 2, 2, 240, '2024-08-05', '2024-09-25', 0, 'On-Going'),
(37, 'Zyrael', 'G', 'dadadadada', 113131313, 'F', 1, 2, 200000, '2024-08-05', '2024-09-07', 0, 'On-Going'),
(38, 'Macmac', 'dddjgadhjd', 'Delacruz', 122222222, 'M', 3, 3, 1000000000, '2024-08-08', '2032-06-08', 0, 'Completed'),
(39, 'Macmac', 'dddjgadhjd', 'Delacruz', 122222222, 'M', 3, 3, 1000000000, '2024-08-08', '2032-06-08', 0, 'On-Going'),
(40, 'stephen', 'Mader', 'Marasigan', 23, 'M', 2, 1, 486, '2024-10-08', '2024-12-25', 0, 'On-Going'),
(41, 'ewqeq', 'ewqeqw', 'ewqe', 21, 'F', 3, 1, 240, '2024-08-09', '2024-10-17', 0, 'On-Going'),
(49, 'ewqeq', 'weqe', 'ewq', 21, 'M', 2, 1, 240, '2024-08-09', '2024-10-02', 0, 'On-Going');

-- --------------------------------------------------------

--
-- Table structure for table `time_in`
--

CREATE TABLE `time_in` (
  `In_id` int(9) NOT NULL,
  `intime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `time_out`
--

CREATE TABLE `time_out` (
  `out_id` int(9) NOT NULL,
  `out_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountrole`
--
ALTER TABLE `accountrole`
  ADD PRIMARY KEY (`roleid`);

--
-- Indexes for table `accounttbl`
--
ALTER TABLE `accounttbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coursetbl`
--
ALTER TABLE `coursetbl`
  ADD PRIMARY KEY (`courseid`);

--
-- Indexes for table `dateend`
--
ALTER TABLE `dateend`
  ADD PRIMARY KEY (`end_id`);

--
-- Indexes for table `datestart`
--
ALTER TABLE `datestart`
  ADD PRIMARY KEY (`dateid`);

--
-- Indexes for table `hoursreq`
--
ALTER TABLE `hoursreq`
  ADD PRIMARY KEY (`hreq_id`);

--
-- Indexes for table `hours_rendered`
--
ALTER TABLE `hours_rendered`
  ADD PRIMARY KEY (`render_id`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `studentinfo`
--
ALTER TABLE `studentinfo`
  ADD PRIMARY KEY (`studid`);

--
-- Indexes for table `time_in`
--
ALTER TABLE `time_in`
  ADD PRIMARY KEY (`In_id`);

--
-- Indexes for table `time_out`
--
ALTER TABLE `time_out`
  ADD PRIMARY KEY (`out_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accountrole`
--
ALTER TABLE `accountrole`
  MODIFY `roleid` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `accounttbl`
--
ALTER TABLE `accounttbl`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coursetbl`
--
ALTER TABLE `coursetbl`
  MODIFY `courseid` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dateend`
--
ALTER TABLE `dateend`
  MODIFY `end_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `datestart`
--
ALTER TABLE `datestart`
  MODIFY `dateid` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `hoursreq`
--
ALTER TABLE `hoursreq`
  MODIFY `hreq_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `hours_rendered`
--
ALTER TABLE `hours_rendered`
  MODIFY `render_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `studentinfo`
--
ALTER TABLE `studentinfo`
  MODIFY `studid` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `time_in`
--
ALTER TABLE `time_in`
  MODIFY `In_id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `time_out`
--
ALTER TABLE `time_out`
  MODIFY `out_id` int(9) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
