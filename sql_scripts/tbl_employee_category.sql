-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2020 at 02:11 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rhr`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_category`
--

CREATE TABLE `tbl_employee_category` (
  `id` int(11) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `category` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_employee_category`
--

INSERT INTO `tbl_employee_category` (`id`, `parent`, `category`, `icon`) VALUES
(1, NULL, 'M. D.', NULL),
(2, 1, 'Project manager', NULL),
(3, 1, 'Project manager', NULL),
(4, 2, 'Team Lead', NULL),
(9, 2, 'Team Lead', NULL),
(12, 4, 'Sr. Dev', NULL),
(13, 9, 'Sr. Dev', NULL),
(14, 12, 'Dev', NULL),
(15, 3, 'Team Lead', NULL),
(16, 3, 'Team Lead', NULL),
(229, 3, 'Project manager2', NULL),
(230, 230, 'Project manager3', NULL),
(231, 1, 'sad', NULL),
(232, 1, 'M. D.sss', NULL),
(233, 232, 'M. D.ssssss', NULL),
(234, 233, 'M. D.sssssssss', NULL),
(235, 1, 'M. D.1', NULL),
(236, 235, 'M. D.12', NULL),
(237, 230, 'Project manager3w', NULL),
(238, 3, 'Project managerssss', NULL),
(239, 3, 'sssss', NULL),
(240, 15, 'Team Leadjjj', NULL),
(241, 3, 'Project manager', NULL),
(242, 3, 'Project managerjjjjj', NULL),
(243, 230, 'Project manager3jjjj', NULL),
(244, 230, 'Project manager3sss', NULL),
(245, 3, 'Project manager', NULL),
(246, 230, 'Project manager3d', NULL),
(247, 230, 'Project manager3ss', NULL),
(248, 230, 'Project manager3', NULL),
(249, 230, 'Project manager3ss', NULL),
(250, 230, 'Project manager3', NULL),
(251, 11, 'leaf node 1-1ddd', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_employee_category`
--
ALTER TABLE `tbl_employee_category`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_employee_category`
--
ALTER TABLE `tbl_employee_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=252;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
