-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2020 at 04:14 PM
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
-- Table structure for table `tbl_salary_info`
--

CREATE TABLE `tbl_salary_info` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `tariff_rate` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `position_status_id` int(11) NOT NULL,
  `wage` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `wage_currency` int(11) NOT NULL,
  `total_monthly_salary` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `prize_amount` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `prize_amount_currency` int(11) NOT NULL,
  `reward_period` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `place_expenditure_id` int(11) NOT NULL,
  `salary_change_reason` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `other_conditions1` text COLLATE utf8_unicode_ci NOT NULL,
  `other_conditions2` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `other_conditions3` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_salary_info`
--

INSERT INTO `tbl_salary_info` (`id`, `emp_id`, `company_id`, `tariff_rate`, `position_status_id`, `wage`, `wage_currency`, `total_monthly_salary`, `prize_amount`, `prize_amount_currency`, `reward_period`, `place_expenditure_id`, `salary_change_reason`, `other_conditions1`, `other_conditions2`, `other_conditions3`, `status`) VALUES
(1, 59, 1, '2', 2, '4444', 0, '5555', '111', 0, '2', 2, 'deyisibdeee', 'fffwweqwe', 'ss', 'sdfdfd', 0),
(17, 40, 3, '2', 3, '600', 2, '1000', '600', 1, '2', 4, 'oooo', 'uuuu', 'uuuiii', 'ooo', 1),
(18, 41, 2, '2', 6, '900', 1, '9990', '8906', 0, '1', 4, 'bilmirem', 'uuuu', 'www', 'pppp', 1),
(19, 39, 3, '7', 5, '700', 2, '1000', '1044', 1, '2', 3, 'oooo', 'aaq', 'ggg', 'ttt', 1),
(20, 38, 1, '6', 5, '700', 1, '9990', '650', 3, '1', 5, 'uuu', 'qqq', 'www', 'eee', 1),
(21, 39, 2, '1', 7, '704', 2, '2345', '347', 0, '1', 2, 'aasssq', 'qq', 'ww', 'eee', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_salary_info`
--
ALTER TABLE `tbl_salary_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_salary_info`
--
ALTER TABLE `tbl_salary_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
