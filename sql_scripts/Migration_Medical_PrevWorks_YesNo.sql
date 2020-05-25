-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2020 at 02:46 PM
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
-- Table structure for table `tbl_employee_medical_information`
--

CREATE TABLE `tbl_employee_medical_information` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `medical_app` int(11) NOT NULL,
  `renew_interval` int(11) NOT NULL,
  `last_renew_date` date NOT NULL,
  `physical_deficiency` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `deficiency_desc` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `insert_user` int(11) NOT NULL,
  `update_user` int(11) NOT NULL,
  `insert_date` date NOT NULL DEFAULT current_timestamp(),
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_prev_positions`
--

CREATE TABLE `tbl_employee_prev_positions` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `prev_employer` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `leave_reason` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `sector` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `insert_user` int(11) NOT NULL,
  `update_user` int(11) NOT NULL,
  `insert_date` int(11) NOT NULL DEFAULT current_timestamp(),
  `update_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exist_not_exist`
--

CREATE TABLE `tbl_exist_not_exist` (
  `id` int(11) NOT NULL,
  `exist_id` int(11) NOT NULL,
  `exist_desc` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_exist_not_exist`
--

INSERT INTO `tbl_exist_not_exist` (`id`, `exist_id`, `exist_desc`, `lang`) VALUES
(1, 1, 'Var', 'az'),
(2, 2, 'Yox', 'az');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_migration_info`
--

CREATE TABLE `tbl_migration_info` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `trp_seria_number` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `trp_permit_reason` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `trp_permit_date` date NOT NULL,
  `trp_valid_date` date NOT NULL,
  `trp_issuer` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `prp_seria_number` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `prp_permit_date` date NOT NULL,
  `prp_valid_date` date NOT NULL,
  `prp_issuer` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `wp_seria_number` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `wp_permit_date` date NOT NULL,
  `wp_valid_date` date NOT NULL,
  `insert_date` date NOT NULL DEFAULT current_timestamp(),
  `update_date` date NOT NULL,
  `insert_user` int(11) NOT NULL,
  `update_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yesno`
--

CREATE TABLE `tbl_yesno` (
  `id` int(11) NOT NULL,
  `chois_id` int(11) NOT NULL,
  `chois_desc` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_yesno`
--

INSERT INTO `tbl_yesno` (`id`, `chois_id`, `chois_desc`, `lang`) VALUES
(1, 1, 'Bəli', 'az'),
(2, 2, 'Xeyr', 'az');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_employee_medical_information`
--
ALTER TABLE `tbl_employee_medical_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_employee_prev_positions`
--
ALTER TABLE `tbl_employee_prev_positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_exist_not_exist`
--
ALTER TABLE `tbl_exist_not_exist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_migration_info`
--
ALTER TABLE `tbl_migration_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_yesno`
--
ALTER TABLE `tbl_yesno`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_employee_medical_information`
--
ALTER TABLE `tbl_employee_medical_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_employee_prev_positions`
--
ALTER TABLE `tbl_employee_prev_positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_exist_not_exist`
--
ALTER TABLE `tbl_exist_not_exist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_migration_info`
--
ALTER TABLE `tbl_migration_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_yesno`
--
ALTER TABLE `tbl_yesno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
