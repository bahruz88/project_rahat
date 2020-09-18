-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2020 at 07:41 AM
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
-- Table structure for table `tbl_work_experience`
--

CREATE TABLE `tbl_work_experience` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `work_experience_before_enterprise` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `work_experience_enterprise` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `general_work_experience` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `insert_date` date NOT NULL,
  `update_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_work_experience`
--

INSERT INTO `tbl_work_experience` (`id`, `emp_id`, `work_experience_before_enterprise`, `work_experience_enterprise`, `general_work_experience`, `status`, `insert_date`, `update_date`) VALUES
(1, 38, '7,1,1', '2,7,2', '3,3,7', 0, '0000-00-00', '2020-09-16'),
(2, 0, '1,2,3', '4,5,6', '7,8,9', 1, '2020-09-16', '2020-09-16'),
(3, 39, '8,2,3', '4,8,6', '7,8,8', 1, '2020-09-16', '2020-09-16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_work_experience`
--
ALTER TABLE `tbl_work_experience`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_work_experience`
--
ALTER TABLE `tbl_work_experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
