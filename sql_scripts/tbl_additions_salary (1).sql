-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2020 at 01:41 PM
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
-- Table structure for table `tbl_additions_salary`
--

CREATE TABLE `tbl_additions_salary` (
  `id` int(11) NOT NULL,
  `code` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `add_sal_id` int(11) NOT NULL,
  `lang` varchar(11) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_additions_salary`
--

INSERT INTO `tbl_additions_salary` (`id`, `code`, `title`, `add_sal_id`, `lang`) VALUES
(1, '2000', 'Nizam-intizam kəsintisi', 1, 'az'),
(2, '2001', 'Könüllü tibbi sığorta kəsintisi', 2, 'az'),
(3, '2002', 'Ezamiyyət geri ödəməsi', 3, 'az'),
(4, '2003', 'Məhkəmə icra sənədi', 4, 'az'),
(5, '4000', 'Satış bonusu', 5, 'az'),
(6, '2005', 'Əmək kitabçası kəsintisi', 6, 'az'),
(7, '2006', 'Həyat sığorta kəsintisi', 7, 'az'),
(8, '2007', 'Artıq əmək haqqı kəsintisi', 8, 'az'),
(9, '4001', 'İşdən çıxma müavinəti', 9, 'az'),
(10, '4002', 'Ağır iş şəraiti əlavəsi', 10, 'az'),
(11, '4004', 'Ev icarəsi ödəməsi', 11, 'az'),
(12, '4005', 'Qalan məzuniyyət günü ödəməsi', 12, 'az'),
(13, '4006', 'Yol pulu ödəməsi', 13, 'az'),
(14, '4007', 'Zərərli işə görə əlavə', 14, 'az'),
(15, '4008', 'Maaşına əlavə - müqavilə', 15, 'az'),
(16, '4009', 'Tədris ödəməsi', 16, 'az'),
(17, '4010', 'Yemək pulu ödəməsi', 17, 'az'),
(18, '4011', 'Əskik əmək haqqı ödəməsi', 18, 'az'),
(19, '2008', 'YAP üzvülük kesintisi', 19, 'az'),
(20, '2009', 'Həmkarlar kəsintisi', 20, 'az');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_additions_salary`
--
ALTER TABLE `tbl_additions_salary`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_additions_salary`
--
ALTER TABLE `tbl_additions_salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
