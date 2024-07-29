-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2024 at 10:38 AM
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
(4, 'BSCpE'),
(5, 'Cavite'),
(6, 'BSIT');

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
(5, '2024-07-29');

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
(5, '2024-07-01');

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
(4, 240);

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
(2, 'Emilio Aguinaldo College');

-- --------------------------------------------------------

--
-- Table structure for table `studentinfo`
--

CREATE TABLE `studentinfo` (
  `id` int(9) NOT NULL,
  `fname` varchar(60) NOT NULL,
  `mname` varchar(60) NOT NULL,
  `lname` varchar(60) NOT NULL,
  `age` int(3) NOT NULL,
  `sex` enum('M','F') NOT NULL,
  `course` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentinfo`
--

INSERT INTO `studentinfo` (`id`, `fname`, `mname`, `lname`, `age`, `sex`, `course`) VALUES
(1, 'trial', 'trial', '', 21, 'M', ''),
(2, 'rew', 'rew', 'erw', 23, 'M', ''),
(3, 'rew', 'rew', 'erw', 23, 'M', 'BSIT'),
(4, 'trial', 'trial', 'trial', 21, 'M', 'Cavite'),
(5, 'eqw', 'ewq', 'ewew', 20, 'M', 'BSCS'),
(6, 'weq', 'ewq', 'eeww', 21, 'M', 'BSIS'),
(7, 'weq', 'ewq', 'eeww', 21, 'M', 'BSIS');

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
-- Indexes for table `studentinfo`
--
ALTER TABLE `studentinfo`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `end_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `datestart`
--
ALTER TABLE `datestart`
  MODIFY `dateid` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hoursreq`
--
ALTER TABLE `hoursreq`
  MODIFY `hreq_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hours_rendered`
--
ALTER TABLE `hours_rendered`
  MODIFY `render_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `studentinfo`
--
ALTER TABLE `studentinfo`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
