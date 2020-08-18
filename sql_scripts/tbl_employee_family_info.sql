-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2020 at 07:26 AM
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
-- Table structure for table `tbl_employee_family_info`
--

CREATE TABLE `tbl_employee_family_info` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `member_type` int(11) NOT NULL,
  `m_firstname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `m_lastname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `m_surname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `gender` int(11) NOT NULL,
  `birth_date` date NOT NULL,
  `contact_number` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `adress` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_employee_family_info`
--

INSERT INTO `tbl_employee_family_info` (`id`, `emp_id`, `member_type`, `m_firstname`, `m_lastname`, `m_surname`, `gender`, `birth_date`, `contact_number`, `adress`, `status`) VALUES
(1, 36, 1, 'Ismayıl', 'Qasımov', 'Yunus', 1, '2020-05-28', '0552720188', 'Qax Əmircan kəndi ', 1),
(2, 46, 1, 'Ennagi', 'Soltanov', 'Gulmemmed', 1, '1962-05-05', '0503719162', 'Sabirabad', 1),
(3, 46, 2, 'Mehpare', 'Soltanova', 'Ferman', 2, '1964-01-17', '0553969206', 'Sabirabad', 1),
(4, 46, 5, 'Ebelfez', 'Israfilov', 'Vusal', 1, '2020-11-22', '', '', 1),
(5, 46, 6, 'Ruqeyye', 'Israfilova', 'Vusal', 2, '2015-09-03', '', '', 1),
(6, 46, 5, 'Huseyn', 'Israfilov', 'Vusal', 1, '2021-08-28', '', '', 1),
(7, 46, 7, 'Vusal', 'Israfilov', 'Hasim', 1, '1983-05-02', '', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_employee_family_info`
--
ALTER TABLE `tbl_employee_family_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_employee_family_info`
--
ALTER TABLE `tbl_employee_family_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
