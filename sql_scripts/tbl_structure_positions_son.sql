-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2020 at 07:17 PM
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
-- Table structure for table `tbl_structure_positions`
--

CREATE TABLE `tbl_structure_positions` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `emp_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `posit_code` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `percent` int(11) DEFAULT NULL,
  `icon` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_structure_positions`
--

INSERT INTO `tbl_structure_positions` (`id`, `role_id`, `emp_id`, `company_id`, `posit_code`, `percent`, `icon`, `start_date`, `end_date`) VALUES
(136, 1, 39, 1, 'P00000001', 100, NULL, '1900-01-01', '9999-12-31'),
(143, 1, 38, 2, 'P00000016', 100, NULL, '1900-01-01', '9999-12-31'),
(144, 1, 40, 3, 'P00000003', 100, NULL, '1900-01-01', '9999-12-31'),
(145, 2, 40, 3, 'P00000024', 100, NULL, '1900-01-01', '9999-12-31'),
(146, 2, 39, 1, 'P00000008', 100, NULL, '1900-01-01', '9999-12-31'),
(147, 3, 46, 1, 'P00000002', 100, NULL, '1900-01-01', '9999-12-31'),
(148, 3, 40, 3, 'P00000024', 100, NULL, '1900-01-01', '9999-12-31'),
(149, 4, 39, 1, 'P00000015', 100, NULL, '1900-01-01', '9999-12-31'),
(150, 1, 80, 4, 'P00000029', 100, NULL, '1900-01-01', '9999-12-31'),
(151, 2, 80, 4, 'P00000030', 100, NULL, '1900-01-01', '9999-12-31'),
(152, 3, 81, 4, 'P00000027', 100, NULL, '1900-01-01', '9999-12-31'),
(154, 4, 186, 4, 'P00000029', 100, NULL, '1900-01-01', '9999-12-31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_structure_positions`
--
ALTER TABLE `tbl_structure_positions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posit_code` (`posit_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_structure_positions`
--
ALTER TABLE `tbl_structure_positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
