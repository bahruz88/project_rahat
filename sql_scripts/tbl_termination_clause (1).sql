-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2020 at 09:08 AM
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
-- Table structure for table `tbl_termination_clause`
--

CREATE TABLE `tbl_termination_clause` (
  `id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `type_id` int(11) NOT NULL,
  `lang` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_termination_clause`
--

INSERT INTO `tbl_termination_clause` (`id`, `level_id`, `title`, `type_id`, `lang`) VALUES
(1, 1, 'Azərbaycan Respublikası ƏM-nin 70 - ci maddəsinin', 1, 'az'),
(2, 2, 'Azərbaycan Respublikası ƏM-nin 69 -cu maddəsinin 3-cü hissəsinə əsasən', 2, 'az'),
(3, 3, 'Azərbaycan Respublikası ƏM-nin 68 -ci maddəsinin 2 - ci hissəsinin a bəndinə əsasən\r\n', 2, 'az'),
(4, 4, 'Azərbaycan Respublikası ƏM-nin 68 -ci maddəsinin 2 - ci hissəsinin b bəndinə əsasən', 3, 'az'),
(5, 5, 'Azərbaycan Respublikası ƏM-nin 73 -cü maddəsinin 1 - ci hissəsinə əsasən', 3, 'az'),
(6, 6, 'Azərbaycan Respublikası ƏM-nin 68 - ci maddəsinin 2 - ci hissəsinin c bəndinə əsasən', 4, 'az'),
(7, 7, 'Azərbaycan Respublikası ƏM-nin 68 - ci maddəsinin 2 - ci hissəsinin ç bəndinə əsasən', 5, 'az'),
(8, 8, 'Azərbaycan Respublikası ƏM-nin 68 - ci maddəsinin 2 - ci hissəsinin d bəndinə əsasən', 6, 'az'),
(9, 9, 'Azərbaycan Respublikası ƏM-nin 74 - cü maddəsinin 1 - ci hissəsinin', 6, 'az'),
(10, 10, 'Azərbaycan Respublikası ƏM-nin 68 - ci maddəsinin 2 - ci hissəsinin e bəndinə əsasən', 7, 'az'),
(11, 11, 'Azərbaycan Respublikası Əmək Məcəlləsinin 75-ci maddəsinin 2-ci hissəsinin', 7, 'az');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_termination_clause`
--
ALTER TABLE `tbl_termination_clause`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_termination_clause`
--
ALTER TABLE `tbl_termination_clause`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
