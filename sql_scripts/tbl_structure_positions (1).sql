-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2020 at 08:23 PM
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
  `posit_code` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `percent` int(11) DEFAULT NULL,
  `icon` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_structure_positions`
--

INSERT INTO `tbl_structure_positions` (`id`, `role_id`, `posit_code`, `percent`, `icon`, `start_date`, `end_date`) VALUES
(77, 2, 'P00000001', 100, NULL, '1900-01-01', '9999-12-31');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
