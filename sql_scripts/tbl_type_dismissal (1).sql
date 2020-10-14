-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2020 at 09:04 AM
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
-- Table structure for table `tbl_type_dismissal`
--

CREATE TABLE `tbl_type_dismissal` (
  `id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_type_dismissal`
--

INSERT INTO `tbl_type_dismissal` (`id`, `level_id`, `title`, `lang`) VALUES
(1, 1, 'İşəgötürənin təşəbbüsü', 'az'),
(2, 2, 'İşçinin təşəbbüsü', 'az'),
(3, 3, 'ƏM müddətinin qurtarması', 'az'),
(4, 4, 'Əmək şəraiti şərtlərinin dəyişdirilməsi', 'az'),
(5, 5, 'Müəssisə mülkiyyətçisinin dəyişməsi', 'az'),
(6, 6, 'Tərəflərin iradəsindən asılı olmayan hallar;', 'az'),
(7, 7, 'Tərəflərin əmək müqaviləsində müəyyən etdiyi hallar', 'az');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_type_dismissal`
--
ALTER TABLE `tbl_type_dismissal`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_type_dismissal`
--
ALTER TABLE `tbl_type_dismissal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
