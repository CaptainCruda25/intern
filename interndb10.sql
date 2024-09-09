-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2024 at 10:22 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
  `h_rend` int(9) NOT NULL,
  `studid` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hours_rendered`
--

INSERT INTO `hours_rendered` (`render_id`, `h_rend`, `studid`) VALUES
(1, 21, 0);

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
  `bday` varchar(255) NOT NULL,
  `age` int(3) NOT NULL,
  `sex` enum('M','F') NOT NULL,
  `courseid` int(9) NOT NULL,
  `schoolid` int(9) NOT NULL,
  `hrequired` int(9) NOT NULL,
  `hoursrem` int(9) NOT NULL,
  `startdate` varchar(255) NOT NULL,
  `end_date` int(9) NOT NULL,
  `status` enum('On-Going','Completed') NOT NULL,
  `image` varchar(255) NOT NULL,
  `view` enum('Yes','No') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentinfo`
--

INSERT INTO `studentinfo` (`studid`, `fname`, `mname`, `lname`, `bday`, `age`, `sex`, `courseid`, `schoolid`, `hrequired`, `hoursrem`, `startdate`, `end_date`, `status`, `image`, `view`) VALUES
(102, 'Ysrael', 'Garcia', 'Fernandez', '2002-06-02', 22, 'M', 1, 1, 864000, -2147483648, '1725206400', 1728835200, 'On-Going', 'images (3).jpg', 'Yes'),
(104, 'Carl Emmanuel', 'Tejano', 'Cruda', '2003-10-25', 20, 'M', 1, 1, 864000, 806073, '1721577600', 1725206400, 'On-Going', 'CRUDA, CARL EMMANUEL T. 136438080238.jpg', 'Yes'),
(105, 'Juan', 'Serano', 'De Leon', '2002-02-03', 22, 'M', 1, 1, 1728000, -2147483648, '1725984000', 1733241600, 'On-Going', '', 'No'),
(106, 'Juan', 'Serano', 'De Leon', '2002-02-03', 22, 'M', 1, 1, 1728000, -2147483648, '1725984000', 1733241600, 'On-Going', '', 'No'),
(107, 'Juan', 'Cruz', 'Leon', '2002-05-03', 22, 'M', 3, 3, 1728000, 1726695, '1725292800', 1732550400, 'Completed', 'MD.png', 'Yes'),
(108, 'Juan', 'Cruz', 'Leon', '2002-05-03', 22, 'M', 3, 3, 1728000, 1734761, '1725292800', 1732550400, 'On-Going', '', 'Yes'),
(109, 'Juan', 'Cruz', 'Marquez', '2002-05-19', 22, 'M', 4, 2, 864000, -2147483648, '1725292800', 1728921600, 'On-Going', 'images (3).jpg', 'No'),
(110, 'Juan', 'Cruz', 'Marquez', '2002-05-19', 22, 'M', 4, 2, 864000, -2147483648, '1725292800', 1728921600, 'On-Going', '451702559_8808228559193914_1301865525681839869_n.jpg', 'No');

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

-- --------------------------------------------------------

--
-- Table structure for table `time_record`
--

CREATE TABLE `time_record` (
  `timeid` int(9) NOT NULL,
  `date` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `time_in` int(255) NOT NULL,
  `time_out` int(255) NOT NULL,
  `hours_render` int(255) NOT NULL,
  `remHours` int(11) NOT NULL,
  `studid` varchar(9) NOT NULL,
  `allowOT` enum('Yes','No') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `time_record`
--

INSERT INTO `time_record` (`timeid`, `date`, `day`, `time_in`, `time_out`, `hours_render`, `remHours`, `studid`, `allowOT`) VALUES
(353179, '08-22-24', 'Thursday', 4, 5, 0, 0, '67', 'No'),
(353180, '08-22-24', 'Thursday', 4, 5, 0, 0, '67', 'No'),
(353181, '08-22-24', 'Thursday', 4, 5, 0, 0, '67', 'No'),
(353182, '08-22-24', 'Thursday', 4, 5, 0, 0, '66', 'Yes'),
(353183, '08-22-24', 'Thursday', 4, 5, 0, 0, '66', 'No'),
(353184, '08-22-24', 'Thursday', 4, 5, 0, 0, '66', 'No'),
(353185, '08-22-24', 'Thursday', 4, 5, 0, 0, '66', 'No'),
(353186, '08-22-24', 'Thursday', 4, 5, 0, 0, '64', 'Yes'),
(353187, '08-22-24', 'Thursday', 4, 5, 0, 0, '64', 'No'),
(353188, '08-22-24', 'Thursday', 4, 5, 0, 0, '64', 'No'),
(353189, '08-22-24', 'Thursday', 4, 5, 0, 0, '64', 'No'),
(353190, '08-22-24', 'Thursday', 4, 5, 0, 0, '64', 'No'),
(353191, '08-22-24', 'Thursday', 5, 5, 0, 0, '62', 'Yes'),
(353192, '08-22-24', 'Thursday', 5, 5, 0, 0, '39', 'No'),
(353193, '08-22-24', 'Thursday', 5, 5, 0, 0, '35', 'No'),
(353194, '08-22-24', 'Thursday', 5, 5, 0, 0, '70', 'No'),
(353195, '08-22-24', 'Thursday', 5, 5, 0, 0, '69', 'Yes'),
(353196, '08-27-24', 'Tuesday', 9, 1724750121, 1724750112, 2308, '71', 'Yes'),
(353197, '08-27-24', 'Tuesday', 9, 1724750121, 1724750112, 2308, '70', 'No'),
(353198, '08-27-24', 'Tuesday', 9, 1724750121, 1724750112, 2308, '67', 'No'),
(353199, '08-27-24', 'Tuesday', 10, 1724750121, 1724750111, 2308, '68', 'No'),
(353200, '08-27-24', 'Tuesday', 10, 1724750121, 1724750111, 2308, '64', 'No'),
(353201, '08-27-24', 'Tuesday', 1724728606, 1724750121, 21515, 2308, '37', 'No'),
(353202, '08-27-24', 'Tuesday', 1724729116, 1724750121, 21005, 2308, '34', 'No'),
(353203, '08-27-24', 'Tuesday', 1724729272, 1724750121, 20849, 2308, '39', 'No'),
(353204, '08-27-24', 'Tuesday', 1724729366, 1724750121, 20755, 2308, '62', 'No'),
(353205, '08-27-24', 'Tuesday', 1724729779, 1724750121, 20342, 2308, '38', 'No'),
(353206, '08-27-24', 'Tuesday', 1724729825, 1724750121, 20296, 2308, '35', 'No'),
(353207, '08-27-24', 'Tuesday', 1724730525, 1724750121, 19596, 2308, '33', 'No'),
(353208, '08-27-24', 'Tuesday', 1724736531, 1724750121, 13590, 2308, '66', 'No'),
(353209, '08-27-24', 'Tuesday', 1724739311, 1724750121, 10810, 2308, '28', 'No'),
(353210, '08-27-24', 'Tuesday', 1724740805, 1724750121, 9316, 2308, '72', 'No'),
(353211, '08-27-24', 'Tuesday', 1724744479, 1724750121, 5642, 234, '73', 'No'),
(353212, '08-27-24', 'Tuesday', 1724805086, 0, 0, 0, '74', 'No'),
(353213, '08-28-24', 'Wednesday', 1724807390, 1724839128, 31738, 239, '35', 'No'),
(353214, '08-28-24', 'Wednesday', 1724807844, 1724839128, 31284, 239, '68', 'No'),
(353215, '08-28-24', 'Wednesday', 1724807994, 1724839128, 31134, 239, '71', 'No'),
(353216, '08-28-24', 'Wednesday', 1724808541, 1724839128, 30587, 239, '69', 'No'),
(353217, '08-28-24', 'Wednesday', 1724809471, 1724839128, 29657, 239, '75', 'No'),
(353218, '08-28-24', 'Wednesday', 1724810386, 1724839128, 28742, 239, '70', 'No'),
(353219, '08-28-24', 'Wednesday', 1724813969, 1724839128, 25159, 239, '73', 'No'),
(353220, '08-28-24', 'Wednesday', 1724824779, 1724839128, 14349, 239, '67', 'No'),
(353221, '08-28-24', 'Wednesday', 1724825057, 1724839128, 14071, 239, '76', 'No'),
(353222, '08-28-24', 'Wednesday', 1724827563, 1724839128, 11565, 239, '38', 'No'),
(353223, '08-28-24', 'Wednesday', 1724828365, 1724839128, 10763, 239, '34', 'No'),
(353224, '08-28-24', 'Wednesday', 1724828454, 1724839128, 10674, 239, '33', 'No'),
(353225, '08-28-24', 'Wednesday', 1724828642, 1724839128, 10486, 239, '77', 'No'),
(353226, '08-28-24', 'Wednesday', 1724828800, 1724839128, 10328, 239, '77', 'No'),
(353227, '08-28-24', 'Wednesday', 1724828807, 1724839128, 10321, 239, '77', 'No'),
(353228, '08-28-24', 'Wednesday', 1724828886, 1724839128, 10242, 239, '77', 'No'),
(353229, '08-28-24', 'Wednesday', 1724828896, 1724839128, 10232, 239, '77', 'No'),
(353230, '08-28-24', 'Wednesday', 1724829097, 1724839128, 10031, 239, '77', 'No'),
(353231, '08-28-24', 'Wednesday', 1724829452, 1724839128, 9676, 239, '77', 'No'),
(353232, '08-28-24', 'Wednesday', 1724830039, 1724839128, 9089, 239, '71', 'No'),
(353233, '08-28-24', 'Wednesday', 1724830651, 1724839128, 8477, 239, '71', 'No'),
(353234, '08-28-24', 'Wednesday', 1724830676, 1724839128, 8452, 239, '76', 'No'),
(353235, '08-28-24', 'Wednesday', 1724831345, 1724839128, 7783, 239, '76', 'No'),
(353236, '08-28-24', 'Wednesday', 1724831371, 1724839128, 7757, 239, '72', 'No'),
(353237, '08-28-24', 'Wednesday', 1724831387, 1724839128, 7741, 239, '72', 'No'),
(353238, '08-28-24', 'Wednesday', 1724831431, 1724839128, 7697, 239, '72', 'No'),
(353239, '08-28-24', 'Wednesday', 1724831521, 1724839128, 7607, 239, '72', 'No'),
(353240, '08-28-24', 'Wednesday', 1724831586, 1724839128, 7542, 239, '72', 'No'),
(353241, '08-28-24', 'Wednesday', 1724831926, 1724839128, 7202, 239, '75', 'No'),
(353242, '08-28-24', 'Wednesday', 1724831959, 1724839128, 7169, 239, '75', 'No'),
(353243, '08-28-24', 'Wednesday', 1724832750, 1724839128, 6378, 239, '77', 'No'),
(353244, '08-28-24', 'Wednesday', 1724832924, 1724839128, 6204, 239, '77', 'No'),
(353245, '08-28-24', 'Wednesday', 1724833775, 1724839128, 5353, 239, '77', 'No'),
(353246, '08-28-24', 'Wednesday', 1724833912, 1724839128, 5216, 239, '77', 'No'),
(353247, '08-28-24', 'Wednesday', 1724834224, 1724839128, 4904, 239, '71', 'No'),
(353248, '08-28-24', 'Wednesday', 1724834312, 1724839128, 4816, 239, '71', 'No'),
(353249, '08-28-24', 'Wednesday', 1724834346, 1724839128, 4782, 239, '70', 'No'),
(353250, '08-28-24', 'Wednesday', 1724834382, 1724839128, 4746, 239, '66', 'No'),
(353251, '08-28-24', 'Wednesday', 1724834637, 1724839128, 4491, 239, '76', 'No'),
(353252, '08-28-24', 'Wednesday', 1724836509, 1724839128, 2619, 239, '74', 'No'),
(353253, '08-28-24', 'Wednesday', 1724837492, 1724839128, 1636, 239, '74', 'No'),
(353254, '08-28-24', 'Wednesday', 1724837582, 1724839128, 1546, 239, '74', 'No'),
(353255, '08-28-24', 'Wednesday', 1724837688, 1724839128, 1440, 999999999, '39', 'No'),
(353256, '08-28-24', 'Wednesday', 1724837851, 1724839128, 1277, 239, '62', 'No'),
(353257, '08-28-24', 'Wednesday', 1724838159, 1724839128, 969, 239, '78', 'No'),
(353258, '08-28-24', 'Wednesday', 1724838286, 1724839128, 842, 209, '79', 'No'),
(353259, '08-28-24', 'Wednesday', 1724838656, 0, 472, 239, '80', 'No'),
(353260, '08-29-24', 'Thursday', 1724888522, 1724899303, 10781, 0, '74', 'No'),
(353261, '08-29-24', 'Thursday', 1724895129, 1724899303, 4174, 239, '80', 'No'),
(353268, '08-29-24', 'Thursday', 1724902907, 1724907228, 4321, -4081, '86', 'No'),
(353271, '08-29-24', 'Thursday', 1724906626, 1724919031, 12405, 851595, '87', 'No'),
(353272, '08-29-24', 'Thursday', 1724906685, 1724906702, 17, 223, '84', 'No'),
(353273, 'Monday', '8-29-24', 8, 1724983997, 8281, 855719, '88', 'No'),
(353274, '08-30-24', 'Friday', 1724975726, 1724975799, 73, 863927, '87', 'No'),
(353275, 'Monday', '8-29-24', 8, 1724985252, 87, 863913, '88', 'No'),
(353276, '08-39-24', 'Monday', 8, 1724985573, 4, 863996, '88', 'No'),
(353277, '08-29-24', 'Monday', 10, 1724985810, 1724985800, -1724121800, '88', 'No'),
(353278, '08-29-24', 'Thursday', 1724985840, 1724985844, 4, 863996, '88', 'No'),
(353279, '08-28-24', 'Monday', 1724987432, 1724987463, 31, 863969, '88', 'No'),
(353280, '08-28-24', 'Wednesday', 1724987616, 0, 0, 0, '88', 'No'),
(353281, '08-29-24', 'Thursday', 1724987643, 1724987647, 4, 863996, '88', 'No'),
(353282, '08-29-24', 'Monday', 1724987672, 1724987781, 109, 863891, '88', 'No'),
(353283, '08-29-24', 'Tuesday', 1724987808, 1724987838, 30, 863970, '88', 'No'),
(353284, '08-28-24', 'Wednesday', 1724987866, 1724987871, 5, 863995, '88', 'No'),
(353285, '08-26-24', 'Monday', 1724987947, 1724988090, 143, 863857, '88', 'No'),
(353286, '08-27-24', 'Tuesday', 1724988115, 1724989192, 1077, 862923, '88', 'No'),
(353287, '08-29-24', 'Thursday', 1724989467, 1724989471, 4, 863996, '88', 'No'),
(353288, '08-2-24', 'Tuesday', 1724993091, 1724993353, 0, 0, '88', 'No'),
(353289, '08-12-24', 'Monday', 1724993372, 1724993548, 0, 0, '88', 'No'),
(353290, '08-23-24', 'Tuesday', 1724993607, 1724993650, 43, 863957, '88', 'No'),
(353291, '08-21-24', 'Wednesday', 1724994187, 1724994190, 3, 863997, '88', 'No'),
(353292, '08-30-24', 'Friday', 1724994309, 1724996942, 2633, 861367, '88', 'No'),
(353293, '08-30-24', 'Friday', 1724994568, 1724994665, 97, 143, '84', 'No'),
(353294, '08-30-24', 'Friday', 1724994719, 1724994780, 61, 827939, '89', 'No'),
(353296, '08-29-24', 'Wednesday', 1725000780, 1725005791, 5053, 858947, '93', 'No'),
(353298, '08-30-24', 'Friday', 1725002426, 1725002430, 4, 863996, '94', 'No'),
(353299, '2024-08-30', 'Tuesday', 1725023160, 1725006825, 73, 863927, '93', 'No'),
(353300, '2024-08-31', 'Friday', 1724976000, 1725007344, 31344, 832656, '96', 'No'),
(353303, '08-30-24', 'Friday', 1725234618, 1725234836, 218, 863782, '96', 'No'),
(353308, '09-02-24', 'Monday', 1725239176, 1725266602, 27426, 831444, '93', 'No'),
(353309, '08-30-24', 'Saturday', 1725239326, 1725241471, 2145, 858824, '94', 'No'),
(353316, '09-02-24', 'Monday', 1725243378, 1725244674, -2304, 857900, '94', 'No'),
(353322, '09-02-24', 'Monday', 1725244553, 1725261596, 17043, 815209, '96', 'No'),
(353323, '08-31-24', 'Saturday', 1725244817, 1725244862, 45, 864000, '97', 'No'),
(353325, '09-02-24', 'Monday', 1725245076, 1725245606, 530, 864000, '97', 'No'),
(353328, '08-31-24', 'Saturday', 1725245658, 1725245697, 39, 863961, '98', 'No'),
(353329, '09-02-24', 'Monday', 1725245780, 1725246497, 717, 863714, '98', 'No'),
(353330, '09-01-24', 'Sunday', 1725247504, 1725247612, 108, 0, '99', 'No'),
(353331, '09-02-24', 'Monday', 1725247695, 1725261461, 13766, 849270, '99', 'No'),
(353332, '09-02-24', 'Monday', 1725254743, 1725255217, 474, 860929, '100', 'No'),
(353333, '08-31-24', 'Saturday', 1725255359, 1725256129, 770, 856087, '101', 'No'),
(353334, '08-30-24', 'Friday', 1725256207, 1725258198, 1991, 859352, '101', 'No'),
(353335, '2024-08-30', 'Friday', 1725268260, 1725264719, 1340, 859745, '101', 'No'),
(353336, '2024-08-06', 'Tuesday', 1725222840, 1725266069, 41, 859822, '101', 'No'),
(353337, '09-02-24', 'Monday', 1725266421, 1725266482, 61, 859755, '101', 'No'),
(353338, '09-02-24', 'Monday', 1725267183, 1725267603, 420, 863580, '102', 'No'),
(353339, '09-02-24', 'Monday', 1725320306, 0, 0, 0, '102', 'No'),
(353340, '09-03-24', 'Tuesday', 1725321628, 0, 0, 864000, '104', 'No'),
(353341, '24-09-03', 'Tuesday', 1725341527, 0, 0, 1728000, '106', 'No'),
(353342, '09-03-24', 'Tuesday', 1725342637, 1725342705, -3532, 1731532, '105', 'No'),
(353343, '09-03-24', 'Tuesday', 1725347248, 0, 0, 1728000, '108', 'No'),
(353344, '09-04-24', 'Wednesday', 1725408282, 1725440523, 28641, 835359, '104', 'No'),
(353345, '09-04-24', 'Wednesday', 1725428083, 0, 0, 1728000, '108', 'No'),
(353346, '09-05-24', 'Thursday', 1725494453, 1725527339, 29286, 806073, '104', 'No'),
(353347, '09-05-24', 'Thursday', 1725500127, 1725505032, 1305, 1726695, '107', 'No'),
(353348, '09-05-24', 'Thursday', 1725503968, 1725504398, -3170, 1731170, '108', 'No'),
(353350, '09-05-24', 'Thursday', 1725504744, 1725504808, -3536, 867116, '102', 'No'),
(353353, '09-06-24', 'Friday', 1725581735, 0, 0, 806073, '104', 'No'),
(353354, '09-06-24', 'Friday', 1725581907, 0, 0, -2147483648, '102', 'No'),
(353355, '09-06-24', 'Friday', 1725608193, 0, 0, 1726695, '107', 'No'),
(353356, '09-06-24', 'Friday', 1725610124, 1725610133, -3591, 1734761, '108', 'No');

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
-- Indexes for table `time_record`
--
ALTER TABLE `time_record`
  ADD PRIMARY KEY (`timeid`);

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
  MODIFY `studid` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

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

--
-- AUTO_INCREMENT for table `time_record`
--
ALTER TABLE `time_record`
  MODIFY `timeid` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=353357;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
