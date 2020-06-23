-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2020 at 12:22 PM
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
-- Table structure for table `tbl_employee_company`
--

CREATE TABLE `tbl_employee_company` (
  `id` int(11) NOT NULL,
  `company_name` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `voen` int(30) DEFAULT NULL,
  `sun` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_name` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_filial` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kod` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_voen` int(30) DEFAULT NULL,
  `cor_account` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `swift` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `azn_account` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usd_account` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `eur_account` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `poct_index` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel` varchar(13) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enterprise_head_fullname` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enterprise_head_position` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `founder` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `insert_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `insert_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_employee_company`
--

INSERT INTO `tbl_employee_company` (`id`, `company_name`, `voen`, `sun`, `bank_name`, `bank_filial`, `kod`, `bank_voen`, `cor_account`, `swift`, `azn_account`, `usd_account`, `eur_account`, `country`, `city`, `address`, `poct_index`, `tel`, `enterprise_head_fullname`, `enterprise_head_position`, `founder`, `insert_date`, `update_date`, `insert_user`, `update_user`, `status`) VALUES
(1, 'cybernet MMC', 1234, '3453', 'accessw', 'access filiald', '1232', 43211, 'sdssss1', 'tew34444441', '121', '341', '551', 'azerbw', 'bakiw', 'qarayevw', '1002w', '0558092990w', 'ssssw', 'dddde', 'gggggggw22', NULL, NULL, NULL, NULL, 1),
(2, 'Casioglu', 123, 'dddd', 'qwwww', 'dfdsf', 'ffff', 2147483647, 'werwe', '7777', 'werwer', '7777', '777', '777', '777', '777', '777', '7777777777777', '777777', '7777777', '777777777', NULL, NULL, NULL, NULL, 0),
(3, 'sss', 2147483647, 'ssss', 'qwwww', 'sss', 'ssss', 2147483647, 'werwe', 'edddddd', 'ddddddd', 'ddddd', 'dddddd', 'ddddddd', 'ddddddddddddd', 'dddddddddddd', 'dddddddd', 'ddddddddd', 'ddddddddddd', 'dddddddddd', 'ddddddddddd', NULL, NULL, NULL, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_employee_company`
--
ALTER TABLE `tbl_employee_company`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_employee_company`
--
ALTER TABLE `tbl_employee_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
