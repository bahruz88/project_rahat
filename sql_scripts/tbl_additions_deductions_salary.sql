-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2020 at 04:04 PM
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
-- Table structure for table `tbl_additions_deductions_salary`
--

CREATE TABLE `tbl_additions_deductions_salary` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `add_salary_id` int(11) NOT NULL,
  `salary` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `additions_currency` int(11) NOT NULL,
  `begin_date` date NOT NULL,
  `end_date` text COLLATE utf8_unicode_ci NOT NULL,
  `insert_date` date NOT NULL DEFAULT current_timestamp(),
  `update_date` date NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_additions_deductions_salary`
--

INSERT INTO `tbl_additions_deductions_salary` (`id`, `company_id`, `emp_id`, `add_salary_id`, `salary`, `additions_currency`, `begin_date`, `end_date`, `insert_date`, `update_date`, `status`) VALUES
(2, 2, 41, 4, '546', 1, '2020-08-01', '2020-09-03', '2020-08-31', '2020-08-31', 0),
(3, 0, 0, 3, '300', 2, '2020-08-01', '2020-09-05', '2020-08-31', '2020-08-31', 1),
(4, 1, 39, 0, '700', 2, '2020-07-28', '2020-09-05', '2020-08-31', '2020-08-31', 1),
(5, 0, 0, 0, '', 0, '1970-01-01', '1970-01-01', '2020-09-01', '2020-09-01', 1),
(6, 0, 0, 0, '', 0, '1970-01-01', '1970-01-01', '2020-09-01', '2020-09-01', 1),
(7, 0, 0, 0, '', 0, '1970-01-01', '1970-01-01', '2020-09-01', '2020-09-01', 1),
(8, 1, 39, 1, '45', 1, '2020-09-02', '2020-09-03', '2020-09-01', '2020-09-01', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_additions_deductions_salary`
--
ALTER TABLE `tbl_additions_deductions_salary`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_additions_deductions_salary`
--
ALTER TABLE `tbl_additions_deductions_salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
