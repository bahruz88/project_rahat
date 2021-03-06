-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2020 at 04:06 PM
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
-- Table structure for table `tbl_position_status`
--

CREATE TABLE `tbl_position_status` (
  `id` int(11) NOT NULL,
  `code` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_position_status`
--

INSERT INTO `tbl_position_status` (`id`, `code`, `title`) VALUES
(1, '01', 'İdarə Heyəti Sədri'),
(2, '02', 'İdarə Heyəti Üzvü'),
(3, '03', 'Direktor'),
(4, '04', 'Departament Müdiri'),
(5, '05', 'Şöbə müdiri'),
(6, '06', 'Bölmə Rəisi'),
(7, '07', 'Baş mütəxəssis'),
(8, '08', 'Aparıcı mütəxəssis'),
(9, '09', 'Mütəxəssis'),
(10, '10', 'İcraçı mütəxəssis'),
(11, '11', 'Fəhlə'),
(12, '12', 'Məsləhətçi'),
(13, '13', 'Nəzarətçi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_position_status`
--
ALTER TABLE `tbl_position_status`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_position_status`
--
ALTER TABLE `tbl_position_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
