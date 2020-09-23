-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2020 at 01:53 PM
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
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(10) UNSIGNED DEFAULT NULL,
  `code` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `structure_level` int(11) DEFAULT NULL,
  `position_level` int(11) DEFAULT NULL,
  `work_status` int(11) NOT NULL DEFAULT 1,
  `company_id` int(11) DEFAULT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `end_date` date DEFAULT NULL,
  `insert_date` date NOT NULL DEFAULT current_timestamp(),
  `update_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `category`, `parent`, `code`, `icon`, `structure_level`, `position_level`, `work_status`, `company_id`, `emp_id`, `create_date`, `status`, `end_date`, `insert_date`, `update_date`) VALUES
(93, 'Casioglu', NULL, 'S00000006', 'images/icons/box1.png', 4, 0, 1, 2, 0, '1900-01-01', 1, '9999-12-31', '2020-08-19', '2020-08-19 21:54:00'),
(164, 'gggaaa', 93, 'S00000002', 'images/icons/box1.png', 4, 0, 1, 2, 0, '1900-01-01', 1, '9999-12-31', '2020-08-21', '2020-08-21 17:20:51'),
(165, 'ddd', 164, 'P00000004', 'images/icons/capman3.png', 0, 2, 1, 2, 38, '1900-01-01', 1, '9999-12-31', '2020-08-21', '2020-08-21 17:22:59'),
(166, 'aaa', 164, 'P00000005', 'images/icons/man2.png', 0, 2, 1, 2, 41, '1900-01-01', 1, '9999-12-31', '2020-08-21', '2020-08-21 17:35:58'),
(178, 'Casioglu innovativ', NULL, 'S00000016', 'images/icons/box1.png', 4, 0, 1, 2, 38, '1900-01-01', 1, '9999-12-31', '2020-08-21', '2020-08-21 18:00:25'),
(189, 'jjj', 178, 'S00000021', 'images/icons/box1.png', 2, 0, 1, 2, 0, '1900-01-01', 1, '9999-12-31', '2020-08-23', '2020-08-23 13:25:42'),
(194, 'aaa', 178, 'S00000014', 'images/icons/box1.png', 3, 0, 1, 2, 0, '1900-01-01', 1, '9999-12-31', '2020-08-25', '2020-08-25 14:51:17'),
(245, 'ggg', 178, 'P00000016', 'images/icons/man2.png', 0, 1, 1, 2, 38, '1900-01-01', 1, '9999-12-31', '2020-09-03', '2020-09-03 15:44:48'),
(246, 'Yeni', NULL, 'S00000007', 'images/icons/box1.png', 1, 0, 1, 3, 40, '2020-06-30', 1, '2020-09-24', '2020-09-03', '2020-09-03 15:56:38'),
(251, 'aaa', 164, 'P00000013', 'images/icons/man2.png', 0, 1, 1, 2, 38, '1900-01-01', 1, '9999-12-31', '2020-09-04', '2020-09-04 10:22:27'),
(252, 'ddd', 164, 'P00000014', 'images/icons/man2.png', 0, 1, 1, 2, 38, '1900-01-01', 1, '9999-12-31', '2020-09-05', '2020-09-05 17:12:52'),
(253, 'mm', 164, 'P00000017', 'images/icons/man2.png', 0, 1, 1, 2, 41, '1900-01-01', 1, '9999-12-31', '2020-09-05', '2020-09-05 17:47:44'),
(255, 'fff', 164, 'P00000019', 'images/icons/man2.png', 0, 1, 1, 2, 38, '1900-01-01', 1, '9999-12-31', '2020-09-05', '2020-09-05 17:50:15'),
(256, 'tt', 164, 'P00000020', 'images/icons/man2.png', 0, 1, 1, 2, 38, '1900-01-01', 1, '9999-12-31', '2020-09-05', '2020-09-05 17:50:29'),
(257, 'tt', 164, 'P00000018', 'images/icons/man2.png', 0, 1, 1, 2, 41, '1900-01-01', 1, '9999-12-31', '2020-09-05', '2020-09-05 17:50:50'),
(258, 'dddf', 164, 'P00000021', 'images/icons/man2.png', 0, 1, 1, 2, 41, '1900-01-01', 1, '9999-12-31', '2020-09-06', '2020-09-06 18:29:04'),
(260, 'hhh', 164, 'P00000022', 'images/icons/man2.png', 0, 1, 1, 2, 38, '1900-01-01', 1, '9999-12-31', '2020-09-06', '2020-09-06 18:34:21'),
(261, 'dddf', 164, 'P00000023', 'images/icons/man2.png', 0, 1, 1, 2, 38, '1900-01-01', 1, '9999-12-31', '2020-09-06', '2020-09-06 18:34:33'),
(266, 'bas ofis', 246, 'S00000022', 'images/icons/box1.png', 3, 0, 1, 3, 0, '1900-01-01', 1, '9999-12-31', '2020-09-08', '2020-09-08 09:55:11'),
(271, 'hhh', 266, 'P00000024', 'images/icons/man2.png', 0, 1, 1, 3, 40, '1900-01-01', 1, '9999-12-31', '2020-09-08', '2020-09-08 12:15:41'),
(273, 'Yeni', NULL, 'S00000001', 'images/icons/box1.png', 1, 0, 1, 1, 0, '1900-01-01', 1, '9999-12-31', '2020-09-18', '2020-09-18 10:18:57'),
(274, 'aaa1', 273, 'S00000003', 'images/icons/box1.png', 2, 0, 1, 1, 0, '1900-01-01', 1, '9999-12-31', '2020-09-18', '2020-09-18 03:38:56'),
(275, 'aa2', 274, 'S00000004', 'images/icons/box1.png', 3, 0, 1, 1, 0, '1900-01-01', 1, '9999-12-31', '2020-09-18', '2020-09-18 03:38:56'),
(276, 'aa3', 275, 'S00000005', 'images/icons/box1.png', 4, 0, 1, 1, 0, '1900-01-01', 1, '9999-12-31', '2020-09-18', '2020-09-18 03:38:56'),
(277, 'aa4', 276, 'S00000008', 'images/icons/box1.png', 5, 0, 1, 1, 0, '1900-01-01', 1, '9999-12-31', '2020-09-18', '2020-09-18 03:38:56'),
(278, 'aa5', 288, 'P00000001', 'images/icons/man2.png', 0, 1, 1, 1, 39, '1900-01-01', 1, '9999-12-31', '2020-09-18', '2020-09-20 08:27:02'),
(279, 'bb1', 273, 'S00000009', 'images/icons/box1.png', 2, 0, 1, 1, 0, '1900-01-01', 1, '9999-12-31', '2020-09-20', '2020-09-20 11:37:33'),
(280, 'bb2', 279, 'S00000010', 'images/icons/box1.png', 3, 0, 1, 1, 0, '1900-01-01', 1, '9999-12-31', '2020-09-20', '2020-09-20 11:37:46'),
(281, 'bb3', 280, 'S00000011', 'images/icons/box1.png', 4, 0, 1, 1, 0, '1900-01-01', 1, '9999-12-31', '2020-09-20', '2020-09-20 11:38:02'),
(282, 'bb4', 281, 'S00000012', 'images/icons/box1.png', 5, 0, 1, 1, 0, '1900-01-01', 1, '9999-12-31', '2020-09-20', '2020-09-20 11:38:12'),
(283, 'bb5', 282, 'P00000002', 'images/icons/man2.png', 0, 1, 1, 1, 44, '1900-01-01', 1, '9999-12-31', '2020-09-20', '2020-09-20 11:38:58'),
(284, 'aaa11', 274, 'P00000003', 'images/icons/capman3.png', 0, 2, 1, 1, 46, '1900-01-01', 1, '9999-12-31', '2020-09-20', '2020-09-20 12:00:09'),
(285, 'aa05', 288, 'P00000006', 'images/icons/capman3.png', 0, 2, 1, 1, 44, '1900-01-01', 1, '9999-12-31', '2020-09-20', '2020-09-22 02:49:41'),
(286, 'aa04', 276, 'P00000007', 'images/icons/capman3.png', 0, 2, 1, 1, 44, '1900-01-01', 1, '9999-12-31', '2020-09-20', '2020-09-20 12:01:31'),
(287, 'aaa2', 274, 'S00000013', 'images/icons/box1.png', 3, 0, 1, 1, 44, '1900-01-01', 1, '9999-12-31', '2020-09-20', '2020-09-20 19:24:25'),
(288, 'aa41', 276, 'S00000015', 'images/icons/box1.png', 5, 0, 1, 1, 44, '1900-01-01', 1, '9999-12-31', '2020-09-20', '2020-09-20 22:13:05'),
(289, 'aa03', 276, 'P00000008', 'images/icons/capman3.png', 0, 2, 1, 1, 46, '1900-01-01', 1, '9999-12-31', '2020-09-22', '2020-09-22 16:17:35'),
(305, 'yeni vezife', 282, NULL, NULL, NULL, NULL, 2, NULL, 46, NULL, 1, NULL, '2020-09-23', '2020-09-23 09:41:08'),
(306, 'yeni vezife', 282, NULL, NULL, NULL, 1, 2, 1, 46, '9999-12-31', 1, '0000-00-00', '2020-09-23', '2020-09-23 09:46:40'),
(307, 'proqramci', 282, 'P00000009', NULL, NULL, 1, 2, 1, 46, '1900-01-01', 1, '9999-12-31', '2020-09-23', '2020-09-23 10:17:43'),
(308, 'proqramci react', 282, 'P00000010', 'images/icons/man2.png', NULL, 1, 2, 1, 39, '1900-01-01', 1, '9999-12-31', '2020-09-23', '2020-09-23 08:58:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent` (`parent`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=309;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD CONSTRAINT `tbl_category_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `tbl_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
