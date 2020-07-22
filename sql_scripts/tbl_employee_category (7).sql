-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2020 at 03:53 PM
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
  `id` int(10) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(10) UNSIGNED DEFAULT NULL,
  `code` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `structure_level` int(11) DEFAULT NULL,
  `position_level` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `insert_date` date NOT NULL DEFAULT current_timestamp(),
  `update_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_employee_category`
--

INSERT INTO `tbl_employee_category` (`id`, `category`, `parent`, `code`, `icon`, `structure_level`, `position_level`, `company_id`, `emp_id`, `create_date`, `insert_date`, `update_date`) VALUES
(197, 'Yeni', NULL, 'qsRHi', '../images/icons/box1.png', 3, 0, NULL, 0, '2020-07-01', '2020-07-22', '2020-07-22 17:32:31'),
(206, 'aaa', 197, '9mUFT', '../images/icons/box1.png', 2, 0, NULL, 0, '2020-07-03', '2020-07-22', '2020-07-22 17:45:30'),
(207, 'sss', 197, '9gO2E', '../images/icons/man2.png', 0, 1, NULL, 41, '2020-07-02', '2020-07-22', '2020-07-22 17:45:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_employee_category`
--
ALTER TABLE `tbl_employee_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent` (`parent`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_employee_category`
--
ALTER TABLE `tbl_employee_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_employee_category`
--
ALTER TABLE `tbl_employee_category`
  ADD CONSTRAINT `tbl_employee_category_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `tbl_employee_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
