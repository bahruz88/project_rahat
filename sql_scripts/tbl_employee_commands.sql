-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2020 at 07:07 PM
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
-- Table structure for table `tbl_employee_commands`
--

CREATE TABLE `tbl_employee_commands` (
  `id` int(11) NOT NULL,
  `command_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `command_no` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `company_id` int(11) NOT NULL,
  `company_name` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_address` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_tel` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `voen` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sun` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enterprise_head_position` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enterprise_head_fullname` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qualification` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uni_name` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profession` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `structure1` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `structure2` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `structure3` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `structure4` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `structure5` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `military_reg_group` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `military_reg_category` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `military_staff` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `military_rank` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `military_specialty_acc` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `military_fitness_service` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `military_registration_service` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `military_registration_date` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `military_general` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `military_special` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `military_no_official` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `military_additional_information` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `military_date_completion` date DEFAULT NULL,
  `insert_date` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_employee_commands`
--

INSERT INTO `tbl_employee_commands` (`id`, `command_id`, `emp_id`, `command_no`, `company_id`, `company_name`, `company_address`, `company_tel`, `voen`, `sun`, `enterprise_head_position`, `enterprise_head_fullname`, `qualification`, `uni_name`, `profession`, `create_date`, `structure1`, `structure2`, `structure3`, `structure4`, `structure5`, `military_reg_group`, `military_reg_category`, `military_staff`, `military_rank`, `military_specialty_acc`, `military_fitness_service`, `military_registration_service`, `military_registration_date`, `military_general`, `military_special`, `military_no_official`, `military_additional_information`, `military_date_completion`, `insert_date`) VALUES
(48, 5, 46, '02/K', 1, 'cybernet MMC', NULL, NULL, '1234', '3453', 'dddde', 'ssssw', 'Magistr', '	Bakı Dövlət Universiteti', 'Ä°nformatika', '2020-07-01', '', 'aa1', 'aa2', 'aa3', 'aa4', '1', '1\r\n    ', '1', '1', 'eeeee', 'rrrrrrrrrr', 'ttttttttt', '2020-05-05', 'yyyyyyyyu', 'uuuuuuuuuuu', 'iiiiiiiiiiiiiiiii', 'ooooooooooooo', '2020-06-26', '2020-08-14'),
(49, 5, 44, '03/K', 1, 'cybernet MMC', NULL, NULL, '1234', '3453', 'dddde', 'ssssw', 'Bakalavr', '	Azərbaycan Dövlət Pedaqoji Universiteti', 'Tarix müəllimi', '1970-01-01', '', '', '', '', '', '', '\r\n    ', '', '', '', '', '', '1970-01-01', '', '', '', '', '1970-01-01', '2020-08-14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_employee_commands`
--
ALTER TABLE `tbl_employee_commands`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_employee_commands`
--
ALTER TABLE `tbl_employee_commands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
