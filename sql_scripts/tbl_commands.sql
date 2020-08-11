-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2020 at 10:03 PM
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
-- Table structure for table `tbl_commands`
--

CREATE TABLE `tbl_commands` (
  `id` int(11) NOT NULL,
  `title` varchar(300) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_commands`
--

INSERT INTO `tbl_commands` (`id`, `title`) VALUES
(1, 'Avans əmri'),
(2, 'Əvəzgün verilmesi hq emr'),
(3, 'Ezamiyyət əmri'),
(4, 'İş vaxtından artıq iş emri'),
(5, 'İşə qəbul əmri'),
(6, 'Maaş dəyişikliyi əmri'),
(7, 'Məzuniyyət (qismən ödənişli)'),
(8, 'Məzuniyyət əmri - ödənişsiz'),
(9, 'Məzuniyyət əmri -əmək'),
(10, 'Məzuniyyətdən geri çağrılma əmri'),
(11, 'Mükafat əmri'),
(12, 'qısaldılmış iş vaxti əmri'),
(13, 'qrafik deyişikliyi əmri'),
(14, 'Sosial məzuniyyət əmri'),
(15, 'Ştat əmri -əlavə'),
(16, 'Ştat əmri -ləğv'),
(17, 'Ştat əmri- ştat cədvəlinin təsdiqi'),
(18, 'Vəzifə dəyişikliyi əmri'),
(19, 'Xitam əmri');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_commands`
--
ALTER TABLE `tbl_commands`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_commands`
--
ALTER TABLE `tbl_commands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
