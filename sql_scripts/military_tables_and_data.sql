-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2020 at 08:52 PM
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
-- Table structure for table `tbl_military_information`
--

CREATE TABLE `tbl_military_information` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `military_reg_group` int(11) NOT NULL,
  `military_reg_category` int(11) NOT NULL,
  `military_staff` int(11) NOT NULL,
  `military_rank` int(11) NOT NULL,
  `military_specialty_acc` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `military_fitness_service` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `military_registration_service` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `military_registration_date` date NOT NULL,
  `military_general` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `military_special` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `military_no_official` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `military_additional_information` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `military_date_completion` date NOT NULL,
  `insert_date` date NOT NULL,
  `update_date` date NOT NULL,
  `insert_user` int(11) NOT NULL,
  `update_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='tbl_military_information';

--
-- Truncate table before insert `tbl_military_information`
--

TRUNCATE TABLE `tbl_military_information`;
-- --------------------------------------------------------

--
-- Table structure for table `tbl_military_rank`
--

CREATE TABLE `tbl_military_rank` (
  `id` int(11) NOT NULL,
  `rank_id` int(11) NOT NULL,
  `rank_desc` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(11) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Truncate table before insert `tbl_military_rank`
--

TRUNCATE TABLE `tbl_military_rank`;
--
-- Dumping data for table `tbl_military_rank`
--

INSERT INTO `tbl_military_rank` (`id`, `rank_id`, `rank_desc`, `lang`) VALUES
(1, 1, 'Əsgər(kursant)', 'az'),
(2, 2, 'Başəsgər', 'az'),
(3, 3, 'Matros(kursant)', 'az'),
(4, 4, 'Başmatros', 'az'),
(5, 5, 'Kiçikçavuş', 'az'),
(6, 6, 'Çavuş', 'az'),
(7, 7, 'Başçavuş', 'az'),
(8, 8, 'Kiçikgizir', 'az'),
(9, 9, 'Gizir', 'az'),
(10, 10, 'Başgizir', 'az'),
(11, 11, 'Kiçikmiçman', 'az'),
(12, 12, 'Miçman', 'az'),
(13, 13, 'Başmiçman', 'az'),
(14, 14, 'Kiçikleytenant', 'az'),
(15, 15, 'Leytenant', 'az'),
(16, 16, 'Başleytenant', 'az'),
(17, 17, 'Kapitan', 'az'),
(18, 18, 'Kapitan-leytenant', 'az'),
(19, 19, 'Mayor', 'az'),
(20, 20, '3-cüdərəcəlikapitan', 'az'),
(21, 21, 'Polkovnik-leytenant', 'az'),
(22, 22, '2-cidərəcəlikapitan', 'az'),
(23, 23, 'Polkovnik', 'az'),
(24, 24, '1-cidərəcəlikapitan', 'az'),
(25, 25, 'General-mayor', 'az'),
(26, 26, 'Kontr-admiral', 'az'),
(27, 27, 'General-leytenant', 'az'),
(28, 28, 'Vitse-admiral', 'az'),
(29, 29, 'General-polkovnik', 'az'),
(30, 30, 'Admiral', 'az'),
(31, 31, 'Ordugeneralı', 'az');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_military_staff`
--

CREATE TABLE `tbl_military_staff` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `staff_desc` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(11) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Truncate table before insert `tbl_military_staff`
--

TRUNCATE TABLE `tbl_military_staff`;
--
-- Dumping data for table `tbl_military_staff`
--

INSERT INTO `tbl_military_staff` (`id`, `staff_id`, `staff_desc`, `lang`) VALUES
(1, 1, 'Əsgər', 'az'),
(2, 2, 'Matros', 'az'),
(3, 3, 'Çavuş', 'az'),
(4, 4, 'Gizir', 'az'),
(5, 5, 'Miçman', 'az'),
(6, 6, 'Kiçik zabit', 'az'),
(7, 7, 'Baş zabit', 'az'),
(8, 8, 'Ali zabit', 'az');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_military_information`
--
ALTER TABLE `tbl_military_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_military_rank`
--
ALTER TABLE `tbl_military_rank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_military_staff`
--
ALTER TABLE `tbl_military_staff`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_military_information`
--
ALTER TABLE `tbl_military_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_military_rank`
--
ALTER TABLE `tbl_military_rank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_military_staff`
--
ALTER TABLE `tbl_military_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
