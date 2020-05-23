-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2020 at 01:18 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

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
-- Table structure for table `tbl_driver_lic_cat`
--

CREATE TABLE `tbl_driver_lic_cat` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `cat_desc` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_driver_lic_cat`
--

INSERT INTO `tbl_driver_lic_cat` (`id`, `cat_id`, `cat_desc`, `lang`) VALUES
(1, 1, 'A', 'az'),
(2, 2, 'B', 'az'),
(3, 3, 'C', 'az'),
(4, 4, 'D', 'az'),
(5, 5, 'E', 'az'),
(6, 6, 'BC', 'az'),
(7, 7, 'BD', 'az'),
(8, 8, 'BE', 'az'),
(9, 9, 'DE', 'az'),
(10, 10, 'CE', 'az');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_driver_lic_cat`
--
ALTER TABLE `tbl_driver_lic_cat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_driver_lic_cat`
--
ALTER TABLE `tbl_driver_lic_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
