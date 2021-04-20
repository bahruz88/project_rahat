-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2021 at 09:39 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `folder`
--

CREATE TABLE `folder` (
  `idFolder` int(11) DEFAULT NULL,
  `FolderName` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idFolderParent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_additions_deductions_salary`
--

CREATE TABLE `tbl_additions_deductions_salary` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `add_salary_id` int(11) NOT NULL,
  `salary` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `additions_currency` int(11) NOT NULL,
  `begin_date` date NOT NULL,
  `end_date` text COLLATE utf8_unicode_ci NOT NULL,
  `insert_date` date NOT NULL,
  `update_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_additions_deductions_salary`
--

INSERT INTO `tbl_additions_deductions_salary` (`id`, `company_id`, `emp_id`, `add_salary_id`, `salary`, `additions_currency`, `begin_date`, `end_date`, `insert_date`, `update_date`, `status`) VALUES
(9, 5, 53, 5, '500', 1, '2020-09-24', '2020-09-09', '2020-09-17', '0000-00-00', 1),
(10, 5, 53, 5, '200', 1, '2020-09-01', '2020-09-23', '2020-09-18', '0000-00-00', 1),
(11, 5, 53, 4, '200', 2, '2020-09-18', '2020-10-01', '2020-09-18', '0000-00-00', 1),
(12, 5, 54, 3, '200', 1, '2020-09-19', '2020-09-30', '2020-09-19', '0000-00-00', 1),
(13, 5, 53, 6, '554', 1, '2020-09-12', '2020-09-16', '2020-09-22', '0000-00-00', 1),
(14, 5, 53, 6, '200', 1, '2020-09-23', '2020-10-08', '2020-09-23', '0000-00-00', 1),
(15, 5, 58, 2004, '200', 1, '2020-10-19', '2020-10-30', '2020-10-19', '0000-00-00', 1),
(16, 5, 61, 2004, '200', 1, '2020-10-19', '2020-10-19', '2020-10-19', '0000-00-00', 1),
(17, 8, 66, 2004, '200', 1, '2020-10-28', '2020-10-28', '2020-10-28', '0000-00-00', 1),
(18, 8, 65, 2004, '100', 1, '2020-10-29', '2020-10-29', '2020-10-29', '0000-00-00', 1),
(19, 8, 65, 2004, '100', 1, '2020-10-29', '2020-10-29', '2020-10-29', '0000-00-00', 1),
(20, 8, 72, 2004, '12', 1, '2020-10-29', '2020-10-29', '2020-10-29', '0000-00-00', 1),
(21, 8, 72, 2004, '12', 1, '2020-10-29', '2020-10-29', '2020-10-29', '0000-00-00', 1),
(22, 8, 70, 2004, '123', 1, '2020-10-29', '2020-10-29', '2020-10-29', '0000-00-00', 1),
(23, 8, 70, 2004, '123', 1, '2020-10-29', '2020-10-29', '2020-10-29', '0000-00-00', 1),
(24, 8, 70, 2004, '123', 1, '2020-10-29', '2020-10-29', '2020-10-29', '0000-00-00', 1),
(25, 7, 74, 2004, '300', 1, '2020-10-26', '2020-10-20', '2020-10-29', '0000-00-00', 1),
(26, 7, 74, 2004, '300', 1, '2020-09-29', '2020-10-29', '2020-10-29', '0000-00-00', 1),
(27, 8, 78, 2004, '200', 1, '2020-11-01', '2020-11-30', '2020-11-01', '0000-00-00', 1),
(28, 8, 81, 2004, '200', 1, '2020-11-01', '2020-11-30', '2020-11-02', '0000-00-00', 1),
(29, 8, 87, 2004, '999', 1, '2020-11-04', '2020-11-30', '2020-11-03', '0000-00-00', 1),
(30, 8, 87, 4008, '100', 1, '2020-10-19', '2020-11-01', '2020-11-03', '0000-00-00', 1),
(31, 8, 81, 2004, '5000', 1, '2020-11-06', '2020-12-01', '2020-11-05', '0000-00-00', 1),
(32, 7, 89, 2004, '300', 1, '2020-11-02', '2020-12-05', '2020-11-06', '0000-00-00', 1),
(33, 8, 91, 2004, '200', 1, '2020-11-09', '2020-11-23', '2020-11-09', '0000-00-00', 1),
(34, 8, 92, 2004, '200', 1, '2020-11-09', '2020-11-09', '2020-11-09', '0000-00-00', 1),
(35, 8, 92, 2004, '222', 1, '2020-10-19', '2020-11-30', '2020-11-09', '0000-00-00', 1),
(36, 8, 94, 4008, '100', 1, '2020-11-01', '2020-11-23', '2020-11-21', '0000-00-00', 1),
(37, 8, 103, 2004, '100', 1, '2020-12-13', '2020-12-14', '2020-12-12', '0000-00-00', 1),
(38, 8, 103, 2004, '200', 1, '2020-10-25', '2020-11-30', '2020-12-12', '0000-00-00', 1),
(39, 0, 106, 2004, '222', 1, '2020-12-20', '2020-12-31', '2020-12-20', '0000-00-00', 1),
(40, 8, 110, 2004, '200', 1, '2020-12-23', '2020-12-30', '2020-12-22', '0000-00-00', 1),
(41, 8, 112, 2004, '47', 1, '2020-11-30', '2020-12-25', '2020-12-25', '0000-00-00', 1),
(42, 8, 112, 2004, '47', 1, '2020-11-01', '2021-01-01', '2020-12-25', '0000-00-00', 0);

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
(6, '2004', 'Avans', 6, 'az'),
(7, '2005', 'Əmək kitabçası kəsintisi', 7, 'az'),
(8, '2006', 'Həyat sığorta kəsintisi', 8, 'az'),
(9, '2007', 'Artıq əmək haqqı kəsintisi', 9, 'az'),
(10, '4001', 'İşdən çıxma müavinəti', 10, 'az'),
(11, '4002', 'Ağır iş şəraiti əlavəsi', 11, 'az'),
(12, '4004', 'Ev icarəsi ödəməsi', 12, 'az'),
(13, '4005', 'Qalan məzuniyyət günü ödəməsi', 13, 'az'),
(14, '4006', 'Yol pulu ödəməsi', 14, 'az'),
(15, '4007', 'Zərərli işə görə əlavə', 15, 'az'),
(16, '4008', 'Maaşına əlavə - müqavilə', 16, 'az'),
(17, '4009', 'Tədris ödəməsi', 17, 'az'),
(18, '4010', 'Yemək pulu ödəməsi', 18, 'az'),
(19, '4011', 'Əskik əmək haqqı ödəməsi', 19, 'az'),
(20, '2008', 'YAP üzvülük kesintisi', 20, 'az'),
(22, '2009', 'Həmkarlar kəsintisi', 21, 'az');

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
  `end_date` date DEFAULT NULL,
  `insert_date` datetime NOT NULL DEFAULT current_timestamp(),
  `update_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `category`, `parent`, `code`, `icon`, `structure_level`, `position_level`, `work_status`, `company_id`, `emp_id`, `create_date`, `end_date`, `insert_date`, `update_date`) VALUES
(1, 'Abseron trade', NULL, 'S00000001', 'images/icons/box1.png', 1, 0, 1, 5, 0, '2020-10-01', '9999-12-31', '2020-10-20 11:31:35', '0000-00-00 00:00:00'),
(2, 'Hr', 1, 'S00000002', 'images/icons/box1.png', 2, 0, 1, 5, 0, '2020-10-01', '9999-12-31', '2020-10-20 11:33:02', '0000-00-00 00:00:00'),
(3, 'finance', 1, 'S00000003', 'images/icons/box1.png', 2, 0, 1, 5, 0, '1900-01-01', '9999-12-31', '2020-10-20 11:33:36', '0000-00-00 00:00:00'),
(4, 'inf.tex', 1, 'S00000004', 'images/icons/box1.png', 2, 0, 1, 5, 0, '2020-10-01', '9999-12-31', '2020-10-20 11:34:40', '0000-00-00 00:00:00'),
(5, 'manager hr', 2, 'P00000001', 'images/icons/capman3.png', 0, 2, 1, 5, 53, '1900-01-01', '9999-12-31', '2020-10-20 11:35:06', '2020-10-20 11:37:09'),
(6, 'mudir', 3, 'P00000002', 'images/icons/capman3.png', 0, 2, 1, 5, 58, '1900-01-01', '9999-12-31', '2020-10-20 11:35:28', '0000-00-00 00:00:00'),
(7, 'reis', 4, 'P00000003', 'images/icons/capman3.png', 0, 2, 1, 5, 61, '1900-01-01', '9999-12-31', '2020-10-20 11:35:51', '0000-00-00 00:00:00'),
(8, 'kassir', 3, 'P00000004', 'images/icons/man2.png', NULL, 1, 1, 5, 60, '1900-01-01', '9999-12-31', '2020-10-20 11:38:31', '0000-00-00 00:00:00'),
(9, 'Yeni', NULL, 'S00000005', 'images/icons/box1.png', 1, 0, 1, 0, 0, '2020-10-01', '9999-12-31', '2020-10-21 05:54:33', '0000-00-00 00:00:00'),
(10, 'Səbət Market MMC', NULL, 'S00000006', 'images/icons/box1.png', 1, 0, 1, 8, 66, '2020-10-01', '9999-12-31', '2020-10-21 06:00:58', '0000-00-00 00:00:00'),
(11, 'İnsan Resursları', 10, 'S00000007', 'images/icons/box1.png', 2, 0, 1, 8, 0, '2020-10-01', '9999-12-31', '2020-10-21 06:01:50', '0000-00-00 00:00:00'),
(12, 'Maliyyə Direktorluğu', 10, 'S00000008', 'images/icons/box1.png', 2, 0, 1, 8, 0, '2020-10-01', '9999-12-31', '2020-10-21 06:02:38', '0000-00-00 00:00:00'),
(13, 'Audit', 10, 'S00000009', 'images/icons/box1.png', 4, 0, 1, 8, 0, '2020-10-01', '9999-12-31', '2020-10-21 06:05:38', '0000-00-00 00:00:00'),
(14, 'Satış Direktorluğu', 10, 'S00000010', 'images/icons/box1.png', 2, 0, 1, 8, 0, '2020-10-01', '9999-12-31', '2020-10-21 06:06:08', '0000-00-00 00:00:00'),
(15, 'İnformasiya Texnologiyaları', 10, 'S00000011', 'images/icons/box1.png', 2, 0, 1, 8, 0, '1900-01-01', '9999-12-31', '2020-10-21 06:08:00', '0000-00-00 00:00:00'),
(16, 'Hüquq Departamenti', 10, 'S00000012', 'images/icons/box1.png', 3, 0, 1, 8, 0, '2020-10-01', '9999-12-31', '2020-10-21 06:08:46', '0000-00-00 00:00:00'),
(17, 'Sənədləşdirmə işləri bölməsi', 16, 'S00000013', 'images/icons/box1.png', 5, 0, 1, 8, 0, '2020-10-01', '1969-12-31', '2020-10-21 06:10:19', '0000-00-00 00:00:00'),
(18, 'Məhkəmələrlə iş üzrə sahə', 16, 'S00000014', 'images/icons/box1.png', 5, 0, 1, 8, 0, '2020-10-01', '9999-12-31', '2020-10-21 06:11:42', '0000-00-00 00:00:00'),
(19, 'Satış audit', 13, 'S00000015', 'images/icons/box1.png', 3, 0, 1, 8, 0, '2020-10-01', '9999-12-31', '2020-10-21 06:12:01', '0000-00-00 00:00:00'),
(20, 'İR audit', 13, 'S00000016', 'images/icons/box1.png', 3, 0, 1, 8, 0, '2020-10-01', '9999-12-31', '2020-10-21 06:12:16', '0000-00-00 00:00:00'),
(21, 'İşə qəbul', 11, 'S00000017', 'images/icons/box1.png', 4, 0, 1, 8, 0, '2020-10-01', '9999-12-31', '2020-10-21 06:12:36', '0000-00-00 00:00:00'),
(22, 'Təlim və tədris', 11, 'S00000018', 'images/icons/box1.png', 4, 0, 1, 8, 0, '2020-10-01', '9999-12-31', '2020-10-21 06:12:58', '0000-00-00 00:00:00'),
(23, 'Əmək haqqı', 11, 'S00000019', 'images/icons/box1.png', 4, 0, 1, 8, 0, '1900-01-01', '9999-12-31', '2020-10-21 06:13:20', '0000-00-00 00:00:00'),
(24, 'Muhasibatlıq', 12, 'S00000020', 'images/icons/box1.png', 4, 0, 1, 8, 0, '2020-10-01', '9999-12-31', '2020-10-21 06:14:10', '0000-00-00 00:00:00'),
(25, 'Maliyyə analizi', 12, 'S00000021', 'images/icons/box1.png', 4, 0, 1, 8, 0, '2020-10-01', '9999-12-31', '2020-10-21 06:15:06', '0000-00-00 00:00:00'),
(26, 'Qida sektoru', 14, 'S00000022', 'images/icons/box1.png', 4, 0, 1, 8, 0, '2020-10-01', '9999-12-31', '2020-10-21 06:15:32', '0000-00-00 00:00:00'),
(27, 'Qeyri qida sektoru', 14, 'S00000023', 'images/icons/box1.png', 4, 0, 1, 8, 0, '2020-10-01', '9999-12-31', '2020-10-21 06:15:49', '0000-00-00 00:00:00'),
(28, 'Şöbə müdiri', 21, 'P00000005', 'images/icons/capman3.png', 0, 2, 1, 8, 65, '2020-10-01', '9999-12-31', '2020-10-21 06:16:59', '0000-00-00 00:00:00'),
(29, 'Baş mütəxəssis', 21, 'P00000006', 'images/icons/man2.png', 0, 1, 1, 8, 0, '1900-01-01', '9999-12-31', '2020-10-21 06:17:17', '0000-00-00 00:00:00'),
(30, 'Aparıcı mütəxəssis', 21, 'P00000007', 'images/icons/man2.png', 0, 1, 1, 8, 0, '1900-01-01', '9999-12-31', '2020-10-21 06:17:36', '0000-00-00 00:00:00'),
(31, 'Şöbə müdiri', 27, 'P00000008', 'images/icons/capman3.png', 0, 2, 1, 8, 67, '1900-01-01', '9999-12-31', '2020-10-21 06:18:16', '2020-10-22 10:38:58'),
(32, 'Mütəxxəssis', 22, 'P00000009', 'images/icons/man2.png', 0, 1, 1, 8, 110, '1900-01-01', '9999-12-31', '2020-10-21 06:18:30', '0000-00-00 00:00:00'),
(33, 'Şöbə müdiri', 23, 'P00000010', 'images/icons/capman3.png', 0, 2, 1, 8, 68, '1900-01-01', '9999-12-31', '2020-10-21 06:19:57', '0000-00-00 00:00:00'),
(34, 'Mütəxəssis', 23, 'P00000011', 'images/icons/man2.png', 0, 1, 1, 8, 0, '1900-01-01', '9999-12-31', '2020-10-21 06:20:10', '0000-00-00 00:00:00'),
(35, 'Aparıcı mütəxəssis', 23, 'P00000012', 'images/icons/man2.png', 0, 1, 1, 8, 0, '1900-01-01', '9999-12-31', '2020-10-21 06:20:25', '0000-00-00 00:00:00'),
(36, 'Aparıcı mütəxəssis', 23, 'P00000013', 'images/icons/man2.png', 0, 1, 1, 8, 0, '1900-01-01', '9999-12-31', '2020-10-21 06:20:42', '0000-00-00 00:00:00'),
(40, 'Şöbə müdiri', 24, 'P00000014', 'images/icons/capman3.png', 0, 2, 1, 8, 0, '1900-01-01', '9999-12-31', '2020-10-21 06:27:03', '0000-00-00 00:00:00'),
(41, 'Şöbə müdiri', 25, 'P00000015', 'images/icons/capman3.png', 0, 2, 1, 8, 69, '1900-01-01', '9999-12-31', '2020-10-21 06:27:23', '0000-00-00 00:00:00'),
(42, 'Şöbə müdiri', 26, 'P00000016', 'images/icons/capman3.png', 0, 2, 1, 8, 0, '1900-01-01', '9999-12-31', '2020-10-21 06:27:31', '0000-00-00 00:00:00'),
(43, 'Şöbə müdiri', 27, 'P00000017', 'images/icons/capman3.png', 0, 2, 1, 8, 94, '1900-01-01', '9999-12-31', '2020-10-21 06:27:40', '0000-00-00 00:00:00'),
(44, 'Muhasib', 24, 'P00000018', 'images/icons/man2.png', 0, 1, 1, 8, 0, '1900-01-01', '9999-12-31', '2020-10-21 06:28:09', '0000-00-00 00:00:00'),
(45, 'Analitik', 25, 'P00000019', 'images/icons/man2.png', 0, 1, 1, 8, 0, '1900-01-01', '9999-12-31', '2020-10-21 06:28:21', '0000-00-00 00:00:00'),
(46, 'Direktor', 15, 'P00000020', 'images/icons/capman3.png', 0, 2, 1, 8, 70, '1900-01-01', '9999-12-31', '2020-10-21 06:28:43', '0000-00-00 00:00:00'),
(47, 'Bölmə rəisi', 17, 'P00000021', 'images/icons/capman3.png', 0, 2, 1, 8, 102, '1900-01-01', '9999-12-31', '2020-10-21 06:29:04', '0000-00-00 00:00:00'),
(48, 'Bölmə rəisi', 18, 'P00000022', 'images/icons/capman3.png', 0, 2, 1, 8, 73, '1900-01-01', '9999-12-31', '2020-10-21 06:29:15', '0000-00-00 00:00:00'),
(49, 'Baş mütəxəssis', 18, 'P00000023', 'images/icons/man2.png', 0, 1, 1, 8, 101, '1900-01-01', '9999-12-31', '2020-10-21 06:30:21', '0000-00-00 00:00:00'),
(50, 'Aparıcı mütəxəssis', 17, 'P00000024', 'images/icons/man2.png', 0, 1, 1, 8, 82, '1900-01-01', '9999-12-31', '2020-10-21 06:30:40', '0000-00-00 00:00:00'),
(52, 'Help Desk', 15, 'S00000024', 'images/icons/box1.png', 5, 0, 1, 8, 70, '2020-10-01', '9999-12-31', '2020-10-21 06:32:51', '0000-00-00 00:00:00'),
(53, 'Proqramlaşdırma', 15, 'S00000025', 'images/icons/box1.png', 5, 0, 1, 8, 0, '1900-01-01', '9999-12-31', '2020-10-21 06:33:06', '0000-00-00 00:00:00'),
(54, 'Mütəxəssis', 52, 'P00000026', 'images/icons/man2.png', 0, 1, 1, 8, 0, '1900-01-01', '9999-12-31', '2020-10-21 06:33:19', '0000-00-00 00:00:00'),
(55, 'Aparıcı mütəxəssis', 53, 'P00000027', 'images/icons/man2.png', 0, 1, 1, 8, 103, '1900-01-01', '9999-12-31', '2020-10-21 06:33:33', '0000-00-00 00:00:00'),
(56, 'Mütəxəssis', 53, 'P00000028', 'images/icons/man2.png', 0, 1, 1, 8, 70, '1900-01-01', '9999-12-31', '2020-10-21 06:33:50', '0000-00-00 00:00:00'),
(59, 'tes4 vezifesi', 24, 'P00000025', 'images/icons/capman3.png', NULL, 2, 1, 8, 73, '1900-01-01', '9999-12-31', '2020-10-25 04:12:08', '0000-00-00 00:00:00'),
(60, 'Direktor', 11, 'P00000029', 'images/icons/capman3.png', 0, 2, 1, 8, 0, '1900-01-01', '9999-12-31', '2020-10-26 05:34:26', '0000-00-00 00:00:00'),
(61, 'Texnik', 21, 'P00000030', 'images/icons/man2.png', 0, 1, 1, 8, 72, '2020-10-26', '9999-12-31', '2020-10-26 07:00:10', '0000-00-00 00:00:00'),
(62, 'Yeni', NULL, 'S00000026', 'images/icons/box1.png', 1, 0, 1, 7, 0, '1900-01-01', '9999-12-31', '2020-10-29 14:01:24', '0000-00-00 00:00:00'),
(63, 'direk', 62, 'S00000027', 'images/icons/box1.png', 2, 0, 1, 7, 0, '1900-01-01', '9999-12-31', '2020-10-29 14:01:38', '0000-00-00 00:00:00'),
(64, 'depart', 63, 'S00000028', 'images/icons/box1.png', 3, 0, 1, 7, 0, '1900-01-01', '9999-12-31', '2020-10-29 14:01:50', '0000-00-00 00:00:00'),
(65, 'dep', 64, 'S00000029', 'images/icons/box1.png', 4, 0, 1, 7, 0, '1900-01-01', '9999-12-31', '2020-10-29 14:02:00', '0000-00-00 00:00:00'),
(66, 'sahe', 65, 'S00000030', 'images/icons/box1.png', 5, 0, 1, 7, 0, '1900-01-01', '9999-12-31', '2020-10-29 14:02:11', '0000-00-00 00:00:00'),
(67, 'yeni vezife', 66, 'P00000031', 'images/icons/man2.png', 0, 1, 1, 7, 74, '1900-01-01', '9999-12-31', '2020-10-29 14:02:30', '0000-00-00 00:00:00'),
(68, 'hmngjk', 17, 'S00000031', 'images/icons/box1.png', 3, 0, 1, 8, 0, '2020-10-30', '9999-12-31', '2020-10-30 03:22:22', '0000-00-00 00:00:00'),
(69, 'ffgg67', 66, 'P00000032', 'images/icons/man2.png', NULL, 1, 1, 7, 71, '1900-01-01', '9999-12-31', '2020-11-01 01:44:03', '0000-00-00 00:00:00'),
(71, 'Diretor', 12, 'P00000034', 'images/icons/capman3.png', 0, 2, 1, 8, 81, '1900-01-01', '9999-12-31', '2020-11-01 14:42:54', '0000-00-00 00:00:00'),
(72, 'kassir', 3, 'P00000035', 'images/icons/man2.png', 0, 1, 1, 5, 0, '1900-01-01', '9999-12-31', '2020-11-02 01:55:14', '0000-00-00 00:00:00'),
(73, 'Kasir', 3, 'P00000036', 'images/icons/man2.png', 0, 1, 1, 5, 0, '1900-01-01', '9999-12-31', '2020-11-02 01:55:29', '0000-00-00 00:00:00'),
(74, 'satici', 26, 'P00000037', 'images/icons/man2.png', 0, 1, 1, 8, 81, '1900-01-01', '9999-12-31', '2020-11-02 12:41:59', '2020-11-02 12:48:47'),
(75, 'Mütəxəssis', 52, 'P00000038', 'images/icons/man2.png', 0, 1, 1, 8, 87, '1900-01-01', '9999-12-31', '2020-11-03 02:02:37', '0000-00-00 00:00:00'),
(76, 'yeni vezife', 66, 'P00000033', 'images/icons/man2.png', 0, 1, 1, 7, 88, '1900-01-01', '9999-12-31', '2020-11-04 01:27:23', '0000-00-00 00:00:00'),
(77, 'yeni vezife', 66, 'P00000039', 'images/icons/man2.png', 0, 1, 1, 7, 89, '1900-01-01', '9999-12-31', '2020-11-04 03:20:49', '0000-00-00 00:00:00'),
(78, 'Şöbə müdiri', 23, 'P00000040', 'images/icons/capman3.png', 0, 2, 1, 8, 90, '1900-01-01', '9999-12-31', '2020-11-05 03:05:34', '0000-00-00 00:00:00'),
(79, 'Şöbə müdiri', 26, 'P00000041', 'images/icons/capman3.png', 0, 2, 1, 8, 91, '1900-01-01', '9999-12-31', '2020-11-09 02:16:14', '0000-00-00 00:00:00'),
(80, 'Mütəxəssis', 52, 'P00000042', 'images/icons/man2.png', 0, 1, 1, 8, 92, '1900-01-01', '9999-12-31', '2020-11-09 03:01:56', '0000-00-00 00:00:00'),
(81, 'Direktor', 53, 'P00000043', 'images/icons/man2.png', 0, 1, 1, 8, 78, '1900-01-01', '9999-12-31', '2020-11-09 03:18:47', '0000-00-00 00:00:00'),
(82, '', 0, 'P00000044', 'images/icons/capman3.png', 0, 2, 1, 8, 0, '1900-01-01', '9999-12-31', '2020-11-09 03:29:23', '0000-00-00 00:00:00'),
(83, 'Mütəxəssis', 52, 'P00000045', 'images/icons/man2.png', 0, 1, 2, 8, 98, '1900-01-01', '9999-12-31', '2020-11-25 12:58:29', '2020-11-25 12:58:29'),
(84, 'Texnik2', 21, 'P00000046', 'images/icons/man2.png', 0, 1, 1, 8, 105, '1900-01-01', '9999-12-31', '2020-12-18 10:28:03', '2020-12-18 10:28:03'),
(85, 'Texnik2', 21, 'P00000047', 'images/icons/man2.png', 0, 1, 1, 8, 103, '1900-01-01', '9999-12-31', '2020-12-18 11:38:42', '2020-12-18 11:38:42'),
(86, 'Mudir', 20, 'P00000048', 'images/icons/capman3.png', 0, 2, 1, 8, 106, '2020-12-20', '9999-12-31', '2020-12-20 13:50:19', '2020-12-20 13:50:19'),
(87, 'texnik4', 21, 'P00000049', 'images/icons/man2.png', 0, 1, 1, 8, 108, '1900-01-01', '9999-12-31', '2020-12-22 08:51:11', '2020-12-22 08:51:11'),
(88, 'Baş mütəxəssis', 21, 'P00000050', 'images/icons/man2.png', 0, 1, 2, 0, 109, '1900-01-01', '9999-12-31', '2020-12-22 12:52:59', '2020-12-22 12:52:59'),
(89, 'Mütəxəssis', 52, 'P00000051', 'images/icons/man2.png', 0, 1, 2, 0, 110, '1900-01-01', '9999-12-31', '2020-12-22 12:53:52', '2020-12-22 12:53:52'),
(90, 'texnik5', 21, 'P00000052', 'images/icons/man2.png', 0, 1, 1, 8, 109, '1900-01-01', '9999-12-31', '2020-12-23 00:35:08', '2020-12-23 00:35:08'),
(91, 'texnik5', 21, 'P00000053', 'images/icons/man2.png', 0, 1, 1, 0, 111, '1900-01-01', '9999-12-31', '2020-12-23 12:42:41', '2020-12-23 00:42:41'),
(92, 'texnik yeni ad', 21, 'P00000054', 'images/icons/man2.png', 0, 1, 1, 8, 112, '1900-01-01', '9999-12-31', '2020-12-25 01:04:15', '2020-12-25 01:04:15'),
(93, 'tre', NULL, 'S00000032', 'images/icons/box1.png', 1, 0, 1, 8, 0, '1900-01-01', '9999-12-31', '2020-12-26 12:47:22', '2020-12-26 12:47:22'),
(94, 'Sherwood MMC', NULL, 'S00000033', 'images/icons/box1.png', 1, 0, 1, 0, 0, '2020-12-28', '9999-12-31', '2020-12-26 12:49:00', '2020-12-26 12:49:00'),
(95, 'Sherwood MMC', NULL, 'S00000034', 'images/icons/box1.png', 1, 0, 1, 0, 0, '1900-01-01', '9999-12-31', '2020-12-26 12:49:40', '2020-12-26 12:49:40'),
(96, 'fw', NULL, 'S00000035', 'images/icons/box1.png', 2, 0, 1, 0, 0, '1900-01-01', '9999-12-31', '2020-12-26 12:50:13', '2020-12-26 12:50:13'),
(97, 'Sherwood MMC', NULL, 'S00000036', 'images/icons/box1.png', 1, 0, 1, 0, 0, '2020-12-28', '9999-12-31', '2020-12-26 12:51:05', '2020-12-26 12:51:05'),
(98, 'Sherwood MMC', NULL, 'S00000037', 'images/icons/box1.png', 1, 0, 1, 0, 0, '2020-12-28', '9999-12-31', '2020-12-26 12:53:55', '2020-12-26 12:53:55'),
(99, 'fdsf', NULL, 'S00000038', 'images/icons/box1.png', 1, 0, 1, 0, 0, '1900-01-01', '9999-12-31', '2020-12-27 11:31:58', '2020-12-27 11:31:58'),
(100, 'Sobe2', 64, 'S00000039', 'images/icons/box1.png', 4, 0, 1, 7, 0, '2021-03-09', '2021-03-10', '2021-03-08 00:34:11', '2021-03-08 00:34:11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_commands`
--

CREATE TABLE `tbl_commands` (
  `id` int(11) NOT NULL,
  `title` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `command_id` int(11) NOT NULL,
  `lang` varchar(11) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_commands`
--

INSERT INTO `tbl_commands` (`id`, `title`, `command_id`, `lang`) VALUES
(1, 'Avans əmri', 1, 'az'),
(2, 'Əvəzgün verilmesi hq emr', 2, 'az'),
(3, 'Ezamiyyət əmri', 3, 'az'),
(4, 'İş vaxtından artıq iş emri', 4, 'az'),
(5, 'İşə qəbul əmri', 5, 'az'),
(6, 'Maaş dəyişikliyi əmri', 6, 'az'),
(7, 'Məzuniyyət (qismən ödənişli)', 7, 'az'),
(8, 'Məzuniyyət əmri - ödənişsiz', 8, 'az'),
(9, 'Məzuniyyət əmri -əmək', 9, 'az'),
(10, 'Məzuniyyətdən geri çağrılma əmri', 10, 'az'),
(11, 'Mükafat əmri', 11, 'az'),
(12, 'qısaldılmış iş vaxti əmri', 12, 'az'),
(13, 'qrafik deyişikliyi əmri', 13, 'az'),
(14, 'Sosial məzuniyyət əmri', 14, 'az'),
(15, 'Ştat əmri -əlavə', 15, 'az'),
(16, 'Ştat əmri -ləğv', 16, 'az'),
(17, 'Ştat əmri- ştat cədvəlinin təsdiqi', 17, 'az'),
(18, 'Vəzifə dəyişikliyi əmri', 18, 'az'),
(19, 'Xitam əmri', 19, 'az');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_companies`
--

CREATE TABLE `tbl_companies` (
  `id` int(11) NOT NULL,
  `company_name` varchar(300) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contracts`
--

CREATE TABLE `tbl_contracts` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
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
  `insert_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_contracts`
--

INSERT INTO `tbl_contracts` (`id`, `emp_id`, `company_id`, `company_name`, `company_address`, `company_tel`, `voen`, `sun`, `enterprise_head_position`, `enterprise_head_fullname`, `qualification`, `uni_name`, `profession`, `create_date`, `structure1`, `structure2`, `structure3`, `structure4`, `structure5`, `military_reg_group`, `military_reg_category`, `military_staff`, `military_rank`, `military_specialty_acc`, `military_fitness_service`, `military_registration_service`, `military_registration_date`, `military_general`, `military_special`, `military_no_official`, `military_additional_information`, `military_date_completion`, `insert_date`) VALUES
(43, 58, 5, 'ABŞERON TREYD MƏHDUD MƏSULİYYƏTLİ CƏMİYYƏTİ', 'Bakı ş, Binəqədi r-nu, M.Rəsulzadə Stq. Agamalı oğlu (Rəsulzadə qəs.,) ev 5a            Faktiki Ünvan: Xətai r-nu, Babək prospekti, Babək plaza, A blok, 9-cu mərtəbə', '0124041919; 0', '2147483647', '10110078950', 'Sərəncamverici direktor, müəssisə', 'ABDİYEV  AFTANDİL  FAİQ OĞLU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 59, 0, '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, 60, 5, 'ABŞERON TREYD MƏHDUD MƏSULİYYƏTLİ CƏMİYYƏTİ', 'Bakı ş, Binəqədi r-nu, M.Rəsulzadə Stq. Agamalı oğlu (Rəsulzadə qəs.,) ev 5a            Faktiki Ünvan: Xətai r-nu, Babək prospekti, Babək plaza, A blok, 9-cu mərtəbə', '0124041919; 0', '2147483647', '10110078950', 'Sərəncamverici direktor, müəssisə', 'ABDİYEV  AFTANDİL  FAİQ OĞLU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, 61, 5, 'ABŞERON TREYD MƏHDUD MƏSULİYYƏTLİ CƏMİYYƏTİ', 'Bakı ş, Binəqədi r-nu, M.Rəsulzadə Stq. Agamalı oğlu (Rəsulzadə qəs.,) ev 5a            Faktiki Ünvan: Xətai r-nu, Babək prospekti, Babək plaza, A blok, 9-cu mərtəbə', '0124041919; 0', '2147483647', '10110078950', 'Sərəncamverici direktor, müəssisə', 'ABDİYEV  AFTANDİL  FAİQ OĞLU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, 62, 5, 'ABŞERON TREYD MƏHDUD MƏSULİYYƏTLİ CƏMİYYƏTİ', 'Bakı ş, Binəqədi r-nu, M.Rəsulzadə Stq. Agamalı oğlu (Rəsulzadə qəs.,) ev 5a            Faktiki Ünvan: Xətai r-nu, Babək prospekti, Babək plaza, A blok, 9-cu mərtəbə', '0124041919; 0', '2147483647', '10110078950', 'Sərəncamverici direktor, müəssisə', 'ABDİYEV  AFTANDİL  FAİQ OĞLU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, 63, 5, 'ABŞERON TREYD MƏHDUD MƏSULİYYƏTLİ CƏMİYYƏTİ', 'Bakı ş, Binəqədi r-nu, M.Rəsulzadə Stq. Agamalı oğlu (Rəsulzadə qəs.,) ev 5a            Faktiki Ünvan: Xətai r-nu, Babək prospekti, Babək plaza, A blok, 9-cu mərtəbə', '0124041919; 0', '2147483647', '10110078950', 'Sərəncamverici direktor, müəssisə', 'ABDİYEV  AFTANDİL  FAİQ OĞLU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, 64, 7, 'Yeni sirket', 'Baki Nizami', '122324', '2147483647', '777', 'Direktor', 'Soyadov Ad ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, 65, 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, 66, 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, 67, 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, 68, 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(54, 69, 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, 70, 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, 71, 7, 'Yeni sirket', 'Baki Nizami', '122324', '2147483647', '777', 'Direktor', 'Soyadov Ad ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(57, 72, 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(58, 73, 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(59, 74, 7, 'Yeni sirket', 'Baki Nizami', '122324', '2147483647', '777', 'Direktor', 'Soyadov Ad ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(60, 77, 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(61, 78, 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(62, 79, 7, 'Yeni sirket', 'Baki Nizami', '122324', '2147483647', '777', 'Direktor', 'Soyadov Ad ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(63, 80, 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(64, 81, 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(65, 82, 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(66, 87, 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(67, 88, 7, 'Yeni sirket', 'Baki Nizami', '122324', '2147483647', '777', 'Direktor', 'Soyadov Ad ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(68, 89, 7, 'Yeni sirket', 'Baki Nizami', '122324', '2147483647', '777', 'Direktor', 'Soyadov Ad ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(69, 90, 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(70, 91, 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(71, 92, 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(72, 94, 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(73, 95, 7, 'Yeni sirket', 'Baki Nizami', '122324', '2147483647', '777', 'Direktor', 'Soyadov Ad ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(74, 96, 7, 'Yeni sirket', 'Baki Nizami', '122324', '2147483647', '777', 'Direktor', 'Soyadov Ad ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(75, 97, 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(76, 98, 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(77, 103, 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(78, 104, 0, 'HRM', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(79, 105, 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(80, 106, 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(81, 107, 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(82, 108, 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(83, 109, 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(84, 110, 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(85, 111, 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(86, 112, 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(87, 113, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(88, 114, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(89, 115, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(90, 116, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(91, 117, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(92, 118, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(93, 119, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(94, 120, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(95, 121, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(96, 122, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(97, 123, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(98, 124, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(99, 125, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(100, 126, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(101, 127, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(102, 128, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(103, 129, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(104, 130, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(105, 131, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(106, 132, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(107, 133, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(108, 134, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(109, 135, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(110, 136, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(111, 137, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(112, 138, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(113, 139, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(114, 140, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(115, 141, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(116, 142, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(117, 143, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(118, 144, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(119, 145, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(120, 146, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(121, 147, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(122, 148, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(123, 149, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(124, 150, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(125, 151, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(126, 152, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(127, 153, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(128, 154, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(129, 155, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(130, 156, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(131, 157, 0, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(132, 158, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(133, 159, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(134, 160, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(135, 161, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(136, 162, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(137, 163, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(138, 164, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(139, 165, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(140, 166, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(141, 167, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(142, 168, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(143, 169, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(144, 170, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(145, 171, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(146, 172, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(147, 173, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(148, 174, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(149, 175, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(150, 176, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(151, 177, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(152, 178, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(153, 179, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(154, 180, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(155, 181, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(156, 182, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(157, 183, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(158, 184, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(159, 185, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(160, 186, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(161, 187, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(162, 188, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(163, 189, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(164, 190, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(165, 191, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(166, 192, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(167, 193, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(168, 194, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(169, 195, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(170, 196, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(171, 197, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(172, 198, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(173, 199, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(174, 200, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(175, 201, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(176, 202, 0, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(177, 203, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(178, 204, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(179, 205, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(180, 206, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(181, 207, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(182, 208, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(183, 209, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(184, 210, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(185, 211, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(186, 212, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(187, 213, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(188, 214, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(189, 215, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(190, 216, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(191, 217, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(192, 218, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(193, 219, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(194, 220, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(195, 221, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(196, 222, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(197, 223, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(198, 224, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(199, 225, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(200, 226, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(201, 227, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(202, 228, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(203, 229, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(204, 230, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(205, 231, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(206, 232, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(207, 233, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(208, 234, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(209, 235, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(210, 236, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(211, 237, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(212, 238, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(213, 239, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(214, 240, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(215, 241, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(216, 242, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(217, 243, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(218, 244, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_contracts` (`id`, `emp_id`, `company_id`, `company_name`, `company_address`, `company_tel`, `voen`, `sun`, `enterprise_head_position`, `enterprise_head_fullname`, `qualification`, `uni_name`, `profession`, `create_date`, `structure1`, `structure2`, `structure3`, `structure4`, `structure5`, `military_reg_group`, `military_reg_category`, `military_staff`, `military_rank`, `military_specialty_acc`, `military_fitness_service`, `military_registration_service`, `military_registration_date`, `military_general`, `military_special`, `military_no_official`, `military_additional_information`, `military_date_completion`, `insert_date`) VALUES
(219, 245, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(220, 246, 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(221, 247, 0, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_country`
--

CREATE TABLE `tbl_country` (
  `id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_country`
--

INSERT INTO `tbl_country` (`id`, `level_id`, `title`, `lang`) VALUES
(1, 1, 'Azərbaycanlı', 'az'),
(2, 2, 'Rus', 'az'),
(3, 3, 'Türk', 'az'),
(4, 4, 'İngilis', 'az');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_currency`
--

CREATE TABLE `tbl_currency` (
  `id` int(11) NOT NULL,
  `title` varchar(300) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_currency`
--

INSERT INTO `tbl_currency` (`id`, `title`) VALUES
(1, 'AZN'),
(2, 'USD'),
(3, 'EUR');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dates`
--

CREATE TABLE `tbl_dates` (
  `id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(300) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_dates`
--

INSERT INTO `tbl_dates` (`id`, `level_id`, `title`, `lang`) VALUES
(1, 1, 'Ay', 'az'),
(2, 2, 'Həftə', 'az');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_driver_lic_cat`
--

CREATE TABLE `tbl_driver_lic_cat` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `cat_desc` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_driver_lic_cat`
--

INSERT INTO `tbl_driver_lic_cat` (`id`, `cat_id`, `cat_desc`, `lang`) VALUES
(1, 1, 'A', 'az'),
(2, 2, 'B', 'az'),
(3, 3, 'C', 'az'),
(4, 4, 'D', 'az'),
(5, 5, 'E', 'az'),
(6, 6, 'BC', 'az'),
(7, 7, 'BD', 'az'),
(8, 8, 'BE', 'az'),
(9, 9, 'DE', 'az'),
(10, 10, 'CE', 'az');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employees`
--

CREATE TABLE `tbl_employees` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `firstname` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `sex` int(11) NOT NULL,
  `marital_status` int(11) NOT NULL,
  `birth_date` date NOT NULL,
  `birth_place` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `citizenship` int(11) NOT NULL,
  `pincode` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `passport_seria_number` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `passport_date` date NOT NULL,
  `passport_end_date` date NOT NULL,
  `pass_given_authority` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `living_address` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `reg_address` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `home_tel` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `mob_tel` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `emr_contact` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `emp_status` int(11) NOT NULL DEFAULT 1,
  `empno` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_employees`
--

INSERT INTO `tbl_employees` (`id`, `company_id`, `firstname`, `lastname`, `surname`, `sex`, `marital_status`, `birth_date`, `birth_place`, `citizenship`, `pincode`, `passport_seria_number`, `passport_date`, `passport_end_date`, `pass_given_authority`, `living_address`, `reg_address`, `home_tel`, `mob_tel`, `email`, `emr_contact`, `emp_status`, `empno`, `image_name`) VALUES
(52, 5, 'Bəhlul', 'Rəhimov', 'İbad', 1, 1, '1985-05-16', 'Lənkəran', 0, '1234567', 'Aze2587795', '2016-08-21', '2023-10-05', 'Asan3', '', 'Baki şəhəri,Səbail rayonu', '050 200 00 01', '012 400 00 01', 'behlulrehimov@gmail.com', '050 500 00 01', 0, 'YD59308416', 'images/users/Sundefined.png'),
(53, 5, 'Aftandil', 'Abdiyev', 'Faiq', 1, 2, '1976-03-28', '', 0, '', '', '2020-09-02', '2020-09-02', '', '', '', '012 500 00 05', '050 500 00 05', 'mail@gmail.com', '', 0, 'KN31603598', 'images/users/SBP76972020.jfif'),
(54, 0, 'test', 'asdsad', 'asd', 0, 0, '1969-12-31', '', 0, '1234567889', '', '1969-12-31', '1969-12-31', '', '', '', '', '', 'asdasd@gmail.com', '', 0, 'BP76972020', 'images/users/SBP76972020.jpeg'),
(55, 5, 'test', 'test', 'test', 1, 2, '1969-12-31', 'tesdf', 0, 'asdsad', 'asdasd', '1969-12-31', '1969-12-31', '', '', '', '', '', 'namiqcavad@hotmail.com', '', 0, 'UZ50879806', 'images/users/def.png'),
(56, 0, 'sdf', 'sdf', 'sdf', 0, 0, '1969-12-31', '', 0, '', '', '1969-12-31', '1969-12-31', '', '', '', '', '', 'rahathr@hotmail.com', '', 0, 'JS73858998', 'images/users/def.png'),
(57, 0, 'Vusal', 'Israfilov', 'Hesim', 1, 1, '2020-10-07', 'Baki', 0, '454545', 'aaa', '2020-09-29', '2020-10-26', 'asan2', '', 'Baki nizami', '0705543435', '3434343', 'sarallahnur1@gmail.com', '43434343', 0, 'NV43763241', 'images/users/def.png'),
(58, 5, 'Rasim', 'Rasim', 'Rasim', 1, 2, '1976-05-12', '', 0, '', '', '1969-12-31', '1969-12-31', '', '', '', '', '', 'sadas@mail.ru', '', 0, 'WR22006228', 'images/users/def.png'),
(59, 0, 'Anar', 'Suleymanov', 'Rasim', 0, 0, '1969-12-31', '', 0, '', '', '1969-12-31', '2020-10-19', '', '', '', '', '', 'asdas@sadf', '', 0, 'MI62111914', 'images/users/def.png'),
(60, 5, 'Anar', 'Abdiyev', 'Rasim', 0, 0, '1969-12-31', '', 0, '', '', '1969-12-31', '1969-12-31', '', '', '', '', '', 'depcons2020@gmail.com', '', 1, 'ZH97843475', 'images/users/S60.png'),
(61, 5, 'Anar', 'Anarov', 'Anar', 1, 0, '1969-12-31', '', 0, '', '', '1969-12-31', '1969-12-31', '', '', '', '', '', 'depcons2020@gmail.com', '', 0, 'XJ10406548', 'images/users/def.png'),
(62, 5, 'VVV', 'VVV', 'VVV', 1, 1, '2020-10-19', 'Baki', 0, '454545', 'aaa', '2020-10-27', '2020-10-29', 'fghfhf', 'Baki', 'Baki nizami', '5555555', '3434343', 'mayyasoltanova29@gmail.com', '43434343', 0, 'JG69993760', 'images/users/def.png'),
(63, 5, 'test123', 'test123', 'test123', 0, 0, '1969-12-31', '', 0, '', '', '1969-12-31', '1969-12-31', '', '', '', '', '', 'test123@mail.ru', '', 0, 'UK12019394', 'images/users/def.png'),
(64, 7, 'XXX', 'ZZZ', 'XXX', 1, 1, '2020-09-28', 'Baki', 0, '454545', 'aaa', '2020-09-29', '2020-10-31', 'asan2', 'Baki', 'Baki nizami', '5555555', '3434343', 'sarallahnur1@gmail.com', '43434343', 0, 'AW53676909', 'images/users/def.png'),
(65, 8, 'Samir', 'Əliyev', 'Dadaş', 1, 2, '1975-05-14', 'Laçın şəhəri', 0, '26N5M7F', 'Aze2587795', '2016-05-18', '2024-03-08', 'Asan3', 'Baki şəhəri Badamdar qəsəbəsi', 'Baki şəhəri,Səbail rayonu', '050 500 00 00', '012 400 00 01', 'samireliyev@sebet.az', '050 500 00 05', 1, 'OT38841251', 'images/users/S65.png'),
(66, 8, 'Şamil ', 'Məmmədov', 'Cəlil', 1, 2, '1964-08-13', 'Zaqatala şəhəri', 1, '26N5M3G', 'Aze25877261', '2019-05-22', '2040-05-09', 'Asan3', 'Baki şəhəri Badamdar qəsəbəsi', 'Baki şəhəri,Səbail rayonu', '050 500 00 00', '012 400 00 01', 'samilmemmedov@sebet.az', '050 500 00 05', 1, 'FK60734353', 'images/users/SHF30579267.jfif'),
(67, 8, 'Rasim', 'Rəhimov', 'Anar', 1, 1, '1989-05-24', 'Zaqatala şəhəri', 0, '26N577T', 'Aze2587795', '2020-10-22', '2021-09-22', 'Asan3', 'Baki şəhəri Badamdar qəsəbəsi', 'Baki şəhəri,Səbail rayonu', '050 500 00 00', '012 400 00 01', 'rasim@mail.ru', '050 500 00 10', 0, 'HF30579267', 'images/users/SFK60734353.jfif'),
(68, 8, 'Sənan', 'Dadaşov', 'Cəlil', 1, 2, '1995-05-24', 'Bərdə şəhəri', 0, '26N5M7F', 'Aze2587795', '2014-02-06', '2023-05-11', 'Asan3', 'Baki şəhəri Badamdar qəsəbəsi', 'Baki şəhəri,Səbail rayonu', '050 500 00 00', '012 400 00 01', 'test123@mail.ru', '050 500 00 01', 0, 'AV18607136', 'images/users/SVB28009375.jfif'),
(69, 8, 'Zaur', 'Abdiyev', 'Anar', 1, 2, '1999-06-02', 'Bakı şəhəri', 0, '26N5M7F', 'Aze2587795', '2019-08-22', '2026-09-23', 'Asan3', 'Baki şəhəri Badamdar qəsəbəsi', 'Baki şəhəri,Səbail rayonu', '050 500 00 00', '012 400 00 01', 'Zaur@mail.ru', '050 500 00 11', 0, 'VB28009375', 'images/users/SAV18607136.jfif'),
(70, 8, 'Fazil', 'Məmmədov', 'Əhməd', 1, 2, '1999-05-20', 'Bakı şəhəri', 0, '26N5M7F', 'Aze25877252', '2018-02-14', '2022-08-18', 'Asan2', 'Baki şəhəri Novxani qəsəbəsi', 'Baki şəhəri,Səbail rayonu', '050 500 00 30', '012 400 00 77', 'fazil@mail.ru', '', 0, 'YZ36691306', 'images/users/SYZ36691306.jfif'),
(71, 7, '45ty54', '45y', '45y6', 1, 1, '1969-12-31', '', 0, '', '', '1969-12-31', '1969-12-31', '', '', '', '', '', 'namiqcavad@hotmail.com', '', 0, 'FU32863892', 'images/users/def.png'),
(72, 8, 'tyui', 'tyui', 'tyui', 1, 2, '2016-05-11', '', 0, '', '', '1969-12-31', '1969-12-31', '', '', '', '', '', 'namiqcavad@hotmail.com', '', 0, 'PI63228244', 'images/users/def.png'),
(73, 8, 'test4', 'test4', 'test4', 1, 1, '1988-05-19', 'Zaqatala şəhəri', 0, '1234567899', 'Aze2587795', '2020-10-26', '2020-10-26', 'Asan3', 'Baki şəhəri Badamdar qəsəbəsi', 'Baki şəhəri,Səbail rayonu', '050 500 00 00', '012 400 00 01', 'sdavad@gmail.com', '050 500 00 05', 1, 'AL20655661', 'images/users/def.png'),
(74, 7, 'XXX', 'VVV', 'MMM', 2, 1, '2020-09-29', 'Baki', 1, '454545', 'aaa', '2020-10-06', '2020-10-20', 'asan2', 'Baki', 'Baki nizami', '0705555555', '3434343', 'mayya_603@mail.ru', '43434343', 0, 'TP22487698', 'images/users/def.png'),
(75, 0, 'rr', 'rr', 'rr', 2, 2, '1990-06-04', 'rr', 2, 'rr', 'rr', '1969-12-31', '1990-06-04', 'rr', 'rr', 'rr', '111', 'rr', '33', 'rr@mail.ru', 0, 'VY28826088', ''),
(76, 0, 'rr', 'rr', 'rr', 2, 2, '1990-06-04', 'rr', 2, 'rr', 'rr', '1969-12-31', '1990-06-04', 'rr', 'rr', 'rr', '111', 'rr', '33', 'rr@mail.ru', 1, 'WU65768876', ''),
(77, 8, 'test5', 'test5', 'test5', 1, 1, '2020-11-01', 'Zaqatala şəhəri', 1, '123456m', 'Aze2587795', '2020-11-02', '2020-11-11', 'Asan3', 'Baki şəhəri Badamdar qəsəbəsi', 'Baki şəhəri,Səbail rayonu', '050 500 00 00', '012 400 00 01', 'test5@mail.ru', '050 500 00 05', 0, 'ZL73529632', 'images/users/def.png'),
(78, 8, 'Rasim', 'sdf', 'Anar', 0, 0, '1969-12-31', '', 0, '', '', '1969-12-31', '1969-12-31', '', '', '', '', '', 'depcons2020@gmail.com', '', 1, 'NB55842105', 'images/users/def.png'),
(79, 7, 'ss', 'sss', 'sss', 1, 2, '2020-11-02', 'Sabirabad', 3, '454545', 'aaa', '2020-11-30', '2020-11-23', 'asan2', 'Baki', 'Sabirabad', '0705555555', '3434343', 'sarallahnur1@gmail.com', '43434343', 0, 'CR95967137', 'images/users/def.png'),
(80, 8, 'test6', '', '', 0, 0, '1969-12-31', '', 0, '', '', '1969-12-31', '1969-12-31', '', '', '', '', '', 'test123@mail.ru', '', 0, 'YL16961429', 'images/users/S79.jpg'),
(81, 8, 'test7', '', '', 0, 0, '1969-12-31', '', 0, '', '', '1969-12-31', '1969-12-31', '', '', '', '', '', 'bahruz.qasimov@gmail.com', '', 0, 'LO90949062', 'images/users/SYL16961429.jpg'),
(82, 8, 'test8', 'test8', 'test8', 1, 1, '1969-12-31', '', 0, '', '', '1969-12-31', '1969-12-31', '', '', '', '', '', 's2020@gmail.com', '', 0, 'RB95449634', 'images/users/def.png'),
(83, 0, 'üü', 'ee', 'rr', 2, 2, '2015-09-03', 'sabirabad', 1, '111111', '222333', '2015-09-03', '2020-09-03', 'sab asan', 'baki', 'nizami', '5555555', '888', 'd@d.r', '9999999', 0, 'LZ46871530', 'images/users/SNE18594206.jpg'),
(84, 0, 'qq', 'ee', '??', 1, 2, '2015-09-04', 'SEki', 2, '22222', '444444', '2015-07-03', '2021-07-03', 'seki asan', 'seki', 'seki xan', '4444444', '7777777', 'r@r.t', '3333333', 1, 'DK46712268', ''),
(85, 0, 'üü', 'ee', 'rr', 2, 2, '2015-09-03', 'sabirabad', 1, '111111', '222333', '2015-09-03', '2020-09-03', 'sab asan', 'baki', 'nizami', '5555555', '888', 'd@d.r', '9999999', 1, 'PB10566144', ''),
(86, 0, 'qq', 'ee', '??', 1, 2, '2015-09-04', 'SEki', 2, '22222', '444444', '2015-07-03', '2021-07-03', 'seki asan', 'seki', 'seki xan', '4444444', '7777777', 'r@r.t', '3333333', 1, 'RJ88867718', ''),
(87, 8, 'TEST10', 'test10', 'test10', 1, 2, '1987-01-01', 'Zaqatala şəhəri', 1, '26N5m12', 'AZE1234567', '2018-11-04', '2022-11-04', 'Asan3', 'Baki şəhəri Badamdar qəsəbəsi', 'Baki şəhəri,Səbail rayonu', '050 500 00 00', '012 400 00 77', 'rahathr@hotmail.com', '050 500 00 01', 0, 'BL85980437', 'images/users/SBL85980437.jpg'),
(88, 7, 'aa', 'aa', 'aa', 1, 1, '2020-11-02', 'Baki', 2, '454545', 'aaa', '2020-11-30', '2020-11-02', 'asan2', 'Baki', 'erere', '0705543435nnm', '3434343', 'sarallahnur1@gmail.com', '43434343', 0, 'YE22021751', 'images/users/def.png'),
(89, 7, 'uu', 'uu', 'uu', 1, 1, '2020-11-23', 'Baki', 2, '454545', 'aaa', '2020-11-02', '2020-12-01', 'asan2', 'Baki', 'jhkhjk', '5555555', '3434343', 'mayyasoltanova29@gmail.com', '43434343', 1, 'PX66394277', 'images/users/def.png'),
(90, 8, 'yeni', 'yeni', 'teze', 2, 2, '2001-11-01', 'Bərdə şəhəri', 3, 'dsfdsfd', 'Aze2587795', '2020-11-05', '1969-12-31', '', '', '', '', '', 'nad@gmail.com', '', 1, 'PI82487507', 'images/users/def.png'),
(91, 8, 'Azər', 'Səmədov', 'Elçin', 1, 2, '1987-11-05', 'Şuşa', 1, '0811202', 'AZE585858', '2010-11-09', '2030-11-09', 'ASAN3', 'Baki şəhəri Novxani qəsəbəsi', 'Baki şəhəri,Səbail rayonu', '050 500 00 00', '012 400 00 01', 'susa@mail.ru', '050 500 00 05', 0, 'CU37042814', 'images/users/def.png'),
(92, 8, 'test11', 'test11', 'test11', 2, 2, '1969-12-31', 'Bakı şəhəri', 4, '26N5M3G', 'Aze2587795', '1969-12-31', '1969-12-31', 'Asan3', 'Baki şəhəri Badamdar qəsəbəsi', 'Baki şəhəri,Səbail rayonu', '012 400 00 01', '050 500 00 00', 'test123@mail.ru', '050 500 00 01', 0, 'NE18594206', 'images/users/SNE18594206.png'),
(93, 0, 'yeni isci1', 'yeni isci1', 'yeni isci1', 1, 2, '1990-06-04', 'Baki', 0, '12345', '54321', '1990-06-09', '2090-06-09', 'Asan3', 'Baki Nizami', 'Nizami', '0554094089', '0125659878', 'd@mail.ru', '3244646', 1, 'NA40874495', 'images/users/SNA40874495.jpg'),
(94, 8, 'İlqar', 'Rzayev', 'Rüstəm', 1, 1, '1961-12-23', 'Lerik r-nu, Monidigah', 1, '12365N9', 'AZE278745034', '2017-12-11', '2019-10-01', 'ASAN2', 'İmişli şəh. P.Həsənov  küç. ev', 'Xocasən qəs, F.Ağazadə  küç ev', '012 400 00 77', '050-881-80-70', 'testmail1@mail.ru', '050 500 00 05', 0, 'EF81141398', 'images/users/SEF81141398.png'),
(95, 7, 'ss', 'ss', 'ss', 2, 2, '2020-11-02', 'Baki', 4, '454545', 'aaa', '2020-11-24', '2020-12-12', 'asan2', 'Baki', 'Baki nizami', '54565676', '5555555', 'mayya_603@mail.ru', '43434343', 1, 'YQ92320574', 'images/users/SYQ92320574.png'),
(96, 7, 'qq', 'qq', 'qq', 2, 2, '2020-11-02', 'Baki', 2, '454545', 'aaa', '2020-12-01', '2020-12-12', 'asan2', 'Baki', 'Baki nizami', '0123236113', '5555555', 'mayyasoltanova29@gmail.com', '43434343', 1, 'FT45099840', 'images/users/SYQ92320574.png'),
(97, 8, 'test11', 'test11', 'test11', 1, 2, '2000-11-25', 'Zaqatala şəhəri', 1, '26N5M7F', 'Aze25877261', '2020-11-04', '2020-11-27', 'Asan2', 'Baki şəhəri Badamdar qəsəbəsi', 'Xocasən qəs, F.Ağazadə  küç ev', '012 400 00 77', '050 500 00 00', 'rahathr@hotmail.com', '050 500 00 05', 0, 'VJ67654228', 'images/users/def.png'),
(98, 8, 'test15', 'test15', 'test15', 1, 1, '2000-11-26', 'Zaqatala şəhəri', 4, '26N5M3G', 'AZE1234567', '2020-11-24', '2020-11-27', 'ASAN3', 'Baki şəhəri Badamdar qəsəbəsi', 'Xocasən qəs, F.Ağazadə  küç ev', '012 400 00 77', '050 500 00 30', 'test123@mail.ru', '050 500 00 10', 1, 'BT38176693', 'images/users/SBT38176693.png'),
(99, 0, 'Test555', 'Test555', 'Test555', 1, 2, '1969-12-31', '', 0, '', '', '1969-12-31', '1969-12-31', '', '', '', '', '', 'Test555@mail.ru', '', 1, 'PZ31929549', ''),
(100, 0, 'Test556', 'Test556', 'Test556', 1, 2, '1969-12-31', '', 0, '', '', '1969-12-31', '1969-12-31', '', '', '', '', '', 'Test556@mail.ru', '', 1, 'GF83051414', ''),
(101, 8, 'Sərdar', 'Hüseynov', 'Aqil', 1, 2, '1969-12-31', 'Şərur rayonu', 0, '2548695', 'AZE1212125', '1969-12-31', '1969-12-31', 'ASAN3', 'Bakı şəhəri', 'Bakı şəhəri', '505554433', '124040444', 'Test555@mail.ru', '202000202', 1, 'XP75876069', ''),
(102, 8, 'Səlimə', 'Əliyeva', 'Şakir', 1, 2, '1969-12-31', 'İmişli şəhəri', 0, '1847251', 'TR45456', '1969-12-31', '1969-12-31', 'ASAN3', 'Bakı şəhəri', 'Bakı şəhəri', '505554433', '124040444', 'Test556@mail.ru', '202000202', 1, 'RK91628499', ''),
(103, 8, 'Həmid', 'Dünyamalıyev', 'Anar', 1, 1, '1975-02-05', 'Zaqatala şəhəri', 4, '123456m', 'Aze25877261', '2020-12-02', '2020-12-16', 'ASAN3', 'Baki şəhəri Badamdar qəsəbəsi', 'Xocasən qəs, F.Ağazadə  küç ev', '012 400 00 77', '050 500 00 00', 'samireliyev@sebet.az', '050 500 00 10', 1, 'CI39558860', 'images/users/SCI39558860.png'),
(104, 0, 'Hesen', 'Süleymanov', 'Dadas', 1, 2, '1969-12-31', 'İmisli', 0, '1234567', 'asc45879', '1987-12-02', '2021-02-02', 'asan150', 'yasamal', 'yasamal', '50', '12', 'mail@mail.ri', '70', 1, 'HQ40456461', ''),
(105, 8, 'Ruqeyye', 'RRR', 'WAAA', 1, 2, '1969-12-31', '', 0, '', '', '1969-12-31', '1969-12-31', '', '', '', '', '', '', '', 1, 'TY98344903', ''),
(106, 8, 'Fazil', 'test7', 'test7', 1, 1, '1990-12-20', 'Bakı şəhəri', 2, '26N5M7F', 'Aze25877261', '2020-11-29', '2025-12-20', 'Asan2', 'Baki şəhəri Badamdar qəsəbəsi', 'Xocasən qəs, F.Ağazadə  küç ev', '012 400 00 77', '050 500 00 00', 'test123@mail.ru', '050 500 00 10', 1, 'RE66718268', 'images/users/def.png'),
(107, 8, 'xeyir', 'saaa', '', 1, 2, '1969-12-31', '', 0, '', '', '1969-12-31', '1969-12-31', '', '', '', '', '', '', '', 1, 'SG89442993', ''),
(108, 8, 'xeyir', 'saaa', '', 1, 2, '1969-12-31', '', 0, '', '', '1969-12-31', '1969-12-31', '', '', '', '', '', '', '', 1, 'EU54618289', ''),
(109, 8, 'Murad', 'Əliyev', 'Sənan', 1, 2, '1969-12-31', 'Zaqatala şəhəri', 2, '1234567', 'Aze123456', '1995-01-01', '2021-01-01', 'Zaqatala RPŞ', 'Bakı şəh..Badamdar qes.', 'Zaqatala şeheri', '050 300 2020', '012 400 2020', 'murad@mail.ru', '070 300 3300', 1, 'XM53986401', ''),
(110, 8, 'Səbinə', 'Məhərrəmova', 'Akif', 1, 2, '1969-12-31', 'Şəmkir rayonu', 0, '1234567', 'Aze123456', '1995-01-01', '2021-01-01', 'Asan4', 'Bakı şəh..Badamdar qes.', 'Zaqatala şeheri', '050 300 2020', '012 400 2020', 'sebine@mail.ru', '070 300 3300', 1, 'PG81519777', ''),
(111, 8, 'yeni', 'yeni', 'yeni', 1, 2, '1969-12-31', '', 0, '', '', '1969-12-31', '1969-12-31', '', '', '', '', '', '', '', 1, 'NC65404049', ''),
(112, 8, 'yeni Ad', 'yeni Ad', 'yeni Ad', 1, 2, '1969-12-31', '', 0, '', '', '1969-12-31', '1969-12-31', '', '', '', '', '', '', '', 1, 'XJ30124900', ''),
(113, 9, 'Qurbanağa', 'Hüseynov', 'Böyükağa', 1, 2, '1964-10-12', 'Bakı şəhəri', 0, '23EP2DN', '13574156', '1969-12-31', '1969-12-31', 'ASAN 4', 'Bakı/Sabunçu Balaxanı', 'Bakı/Sabunçu Balaxanı', '553315951', '553315951', 'Qurbanağa@sherwood.com', '553315951', 1, 'IO93687362', ''),
(114, 9, 'Nazim', 'İbrahimov', 'Nadir', 1, 2, '1969-12-31', 'Bakı şəh.', 0, '2LKD45L', '08574074', '1969-12-31', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı/Sabunçu Sabunçu', 'Bakı/Sabunçu Sabunçu', '124501361', '124501361', 'Nazim@sherwood.com', '124501361', 1, 'FC83233045', ''),
(115, 9, 'Rəbiyyət', 'Ağayeva', 'Muradxan', 1, 2, '1959-03-03', 'Bakı şəh.', 0, '1TV1FDX', '07206924', '1969-12-31', '1969-12-31', 'BAKI ŞƏHƏRI', 'Bakıxanov', 'Bakıxanov', '050 3571959', '050 3571959', 'Rəbiyyət@sherwood.com', '050 3571959', 1, 'TF36512925', ''),
(116, 9, 'Şəhla', 'Şıxəliyeva', 'Teymur', 1, 2, '1959-03-03', 'Bakı şəh.', 0, '1TV1FDX', '07206924', '1969-12-31', '1969-12-31', 'BAKI ŞƏHƏRI', 'Bakıxanov', 'Bakıxanov', '506744487', '506744487', 'Şəhla@sherwood.com', '506744487', 1, 'HY35564611', ''),
(117, 9, 'Təranə', 'Mirzəliyeva', 'Sədr', 1, 2, '1969-12-31', 'Bakı şəh.', 0, '2HN4798', '08859874', '1969-12-31', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı/Sabunçu Sabunçu', 'Bakı/Sabunçu Sabunçu', '504840052', '504840052', 'Təranə@sherwood.com', '504840052', 1, 'ZY45005882', ''),
(118, 9, 'Məhəmməd', 'İmanov', 'Bahadur', 1, 2, '1969-12-31', 'Bakı şəh.', 0, '2HN4798', '08859874', '1969-12-31', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı/Sabunçu Sabunçu', 'Bakı/Sabunçu Sabunçu', '503709172', '503709172', 'Məhəmməd@sherwood.com', '503709172', 1, 'VX21993860', ''),
(119, 9, 'Xanımbacı', 'Rzayeva', 'Vəli', 1, 2, '1969-12-31', 'Gədəbəy ray.', 0, '2W0EJ80', '16103648', '2016-10-07', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı/Sabunçu Zabrat qəs.', 'Bakı/Sabunçu Zabrat qəs.', '553609957', '553609957', 'Xanımbacı@sherwood.com', '553609957', 1, 'NY87822759', ''),
(120, 9, 'Yeganə', 'Əhmədova', 'Nurəddin', 1, 2, '1969-12-31', 'Gədəbəy ray.', 0, '2W0EJ80', '16103648', '2016-10-07', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı/Sabunçu Zabrat qəs.', 'Bakı/Sabunçu Zabrat qəs.', '(+994 50) 402', '(+994 50) 402', 'Yeganə@sherwood.com', '(+994 50) 402 07 60', 1, 'SX40334716', ''),
(121, 9, 'Mehbarə', 'Abdulkərimova', 'Tahir', 1, 2, '1969-12-31', 'Ermənistan, Qafan', 0, '2X727PK', '09827472', '1969-12-31', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı/Suraxanı Qaraçuxur', 'Bakı/Suraxanı Qaraçuxur', '506627786', '506627786', 'Mehbarə@sherwood.com', '506627786', 1, 'QV42684694', ''),
(122, 9, 'Nuriyyə', 'Rəhmanova', 'Damanəli', 1, 2, '1969-12-31', 'Ermənistan, Qafan', 0, '2X727PK', '09827472', '1969-12-31', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı/Suraxanı Qaraçuxur', 'Bakı/Suraxanı Qaraçuxur', '517570273', '517570273', 'Nuriyyə@sherwood.com', '517570273', 1, 'WV82455179', ''),
(123, 9, 'Valentina', 'Çerkezova', 'Lukyanovna', 1, 2, '1966-08-02', 'Bakı şəh.', 0, '4JHNHH0', '16204977', '2016-10-06', '1969-12-31', 'ASAN 4', 'Bakı/Suraxanı Bülbülə', 'Bakı/Suraxanı Bülbülə', '505661529', '505661529', 'Valentina@sherwood.com', '505661529', 1, 'JD18078460', ''),
(124, 9, 'Hicran', 'Yaqubova', 'Hacıağa', 1, 2, '1966-08-02', 'Bakı şəh.', 0, '4JHNHH0', '16204977', '2016-10-06', '1969-12-31', 'ASAN 4', 'Bakı/Suraxanı Bülbülə', 'Bakı/Suraxanı Bülbülə', '556437176', '556437176', 'Hicran@sherwood.com', '556437176', 1, 'YT24120424', ''),
(125, 9, 'Rübabə', 'Qasımova', 'Mirzə', 1, 2, '1973-07-12', 'Ermənistan, Masis ray.', 0, '16HFR7W', '07118340', '1969-12-31', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı/Sabunçu Bakıxanov', 'Bakı/Sabunçu Bakıxanov', '518790092', '518790092', 'Rübabə@sherwood.com', '518790092', 1, 'YG16036608', ''),
(126, 9, 'Sevinc', 'Yermez', 'Tofiq', 1, 2, '1973-07-12', 'Ermənistan, Masis ray.', 0, '16HFR7W', '07118340', '1969-12-31', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı/Sabunçu Bakıxanov', 'Bakı/Sabunçu Bakıxanov', '503032017', '503032017', 'Sevinc@sherwood.com', '503032017', 1, 'YO30000807', ''),
(127, 9, 'Samirə', 'Qurbanova', 'Əlibala', 1, 2, '1969-12-31', 'Bakı şəh.', 0, '0Y8AB7R', '05596058', '2011-05-07', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı/Sabunçu Bakıxanov', 'Bakı/Sabunçu Bakıxanov', '504932914', '504932914', 'Samirə@sherwood.com', '504932914', 1, 'US23204991', ''),
(128, 9, 'Gültəkin', 'Abdulkərımova', 'Qəndi', 1, 2, '1969-12-31', 'Bakı şəh.', 0, '0Y8AB7R', '05596058', '2011-05-07', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı/Sabunçu Bakıxanov', 'Bakı/Sabunçu Bakıxanov', '703664408', '703664408', 'Gültəkin@sherwood.com', '703664408', 1, 'PS55342015', ''),
(129, 9, 'Kamran', 'Tağıyev', 'Ənvər', 1, 2, '1969-12-31', 'Azərbaycan , Bakı şəhəri', 0, '16KCY5J', '09827458', '1969-12-31', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı şəhəri/Suraxanı rayonu', 'Bakı şəhəri/Suraxanı rayonu', '554662560', '554662560', 'Kamran@sherwood.com', '554662560', 1, 'EZ52575862', ''),
(130, 9, 'Rəfiqə', 'Rəhimova', 'Gülməmməd', 1, 2, '1969-12-31', 'Azərbaycan , Bakı şəhəri', 0, '16KCY5J', '09827458', '1969-12-31', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı şəhəri/Suraxanı rayonu', 'Bakı şəhəri/Suraxanı rayonu', '554370244', '554370244', 'Rəfiqə@sherwood.com', '554370244', 1, 'XD70879975', ''),
(131, 9, 'Xanım', 'Əskərova', 'Bilman', 1, 2, '1969-12-31', 'QAX Ray, MUĞAL K.', 0, '1KLX0EX', '06763689', '1969-12-31', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı/Sabunçu Sabunçu', 'Bakı/Sabunçu Sabunçu', '558548615', '558548615', 'Xanım@sherwood.com', '558548615', 1, 'ZC37522273', ''),
(132, 9, 'Nəzakət', 'Əsgərova', 'Rəfaddin', 1, 2, '1969-12-31', 'Bakı şəh.', 0, '1EGFNS0', '13600289', '1969-12-31', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı/Suraxanı Bülbülə', 'Bakı/Suraxanı Bülbülə', '558548615', '558548615', 'Nəzakət@sherwood.com', '558548615', 1, 'ZT51029546', ''),
(133, 9, 'Yaralı', 'Hacıəliyev', 'Sabir', 1, 2, '1969-12-31', 'Bakı şəh.', 0, '1EGFNS0', '13600289', '1969-12-31', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı/Suraxanı Bülbülə', 'Bakı/Suraxanı Bülbülə', '507341734', '507341734', 'Yaralı@sherwood.com', '507341734', 1, 'LG34396699', ''),
(134, 9, 'Firuzə', 'Abdullayeva', 'Nadir', 1, 2, '1965-05-06', 'Rusiya Federasiyası, Başqırıstan', 0, '1A0QG9F', '05674079', '2015-08-06', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakl/Xətai Əhmədli', 'Bakl/Xətai Əhmədli', '555605781', '555605781', 'Firuzə@sherwood.com', '555605781', 1, 'QH63860516', ''),
(135, 9, 'İradə', 'Quliyeva', 'Nəsir', 1, 2, '1965-05-06', 'Rusiya Federasiyası, Başqırıstan', 0, '1A0QG9F', '05674079', '2015-08-06', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakl/Xətai Əhmədli', 'Bakl/Xətai Əhmədli', '502651919', '502651919', 'İradə@sherwood.com', '502651919', 1, 'HR68538893', ''),
(136, 9, 'Peyman', 'Nəməkfruş', 'Məhərrəm', 1, 2, '1971-05-07', 'Bakı şəh.', 0, '2T4RCTU', '08916313', '1969-12-31', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı/Suraxanı Yeni Suraxanı', 'Bakı/Suraxanı Yeni Suraxanı', '506641174', '506641174', 'Peyman@sherwood.com', '506641174', 0, 'TK90903408', ''),
(137, 9, 'Əlizamin', 'Mustafazadə', 'Lətif', 1, 2, '1971-05-07', 'Bakı şəh.', 0, '2T4RCTU', '08916313', '1969-12-31', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı/Suraxanı Yeni Suraxanı', 'Bakı/Suraxanı Yeni Suraxanı', '505429125', '505429125', 'Əlizamin@sherwood.com', '505429125', 0, 'OF51053000', ''),
(138, 9, 'Məhəmməd', 'Nağıyev', 'Şükür', 1, 2, '1963-03-11', 'Bakı ş.', 0, '1U5CX4M', '13872882', '1969-12-31', '1969-12-31', 'DİĞER', 'Bakl/Xətai Əhmədli', 'Bakl/Xətai Əhmədli', '557076178', '557076178', 'Məhəmməd@sherwood.com', '557076178', 1, 'BH72932346', ''),
(139, 9, 'Şamamaxanım', 'Mirzəcanova', 'Zahir', 1, 2, '1963-03-11', 'Bakı ş.', 0, '1U5CX4M', '13872882', '1969-12-31', '1969-12-31', 'DİĞER', 'Bakl/Xətai Əhmədli', 'Bakl/Xətai Əhmədli', '554595335', '554595335', 'Şamamaxanım@sherwood.com', '554595335', 1, 'MK62414166', ''),
(140, 9, 'Nasiyat', 'Cəfərova', 'Məhəmmədbəyovna', 1, 2, '1969-12-31', 'Tovuz ray.', 0, '2UQVGP7', '06899187', '1969-12-31', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı/Sabunçu Maştağa', 'Bakı/Sabunçu Maştağa', '(+994 50) 389', '(+994 50) 389', 'Nasiyat@sherwood.com', '(+994 50) 389 83 34', 1, 'MP42996802', ''),
(141, 9, 'Hüseyn', 'İmanov', 'Bahadur', 1, 2, '1969-12-31', 'Tovuz ray.', 0, '2UQVGP7', '06899187', '1969-12-31', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı/Sabunçu Maştağa', 'Bakı/Sabunçu Maştağa', '557150557', '557150557', 'Hüseyn@sherwood.com', '557150557', 1, 'OZ44271607', ''),
(142, 9, 'Fəridə', 'Mustafayeva', 'Murad', 1, 2, '1969-12-31', 'Bakı şəh.', 0, '1Z0JJPL', '13317712', '2013-02-05', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı/Sabunçu Ramana', 'Bakı/Sabunçu Ramana', '503092025', '503092025', 'Fəridə@sherwood.com', '503092025', 1, 'NO99119711', ''),
(143, 9, 'İlqar', 'Qocayev', 'Əhməd', 1, 2, '1969-12-31', 'Qəbələ', 0, '1RJ1778', '07697307', '1969-12-31', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı/Suraxanı Qaraçuxur', 'Bakı/Suraxanı Qaraçuxur', '557664068', '557664068', 'İlqar@sherwood.com', '557664068', 1, 'DM74490382', ''),
(144, 9, 'Hikmət', 'Həsənov', 'Baladadaş', 1, 2, '1969-12-31', 'Qəbələ', 0, '1RJ1778', '07697307', '1969-12-31', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı/Suraxanı Qaraçuxur', 'Bakı/Suraxanı Qaraçuxur', '(+994 50) 453', '(+994 50) 453', 'Hikmət@sherwood.com', '(+994 50) 453 93 90', 1, 'VE38987857', ''),
(145, 9, 'Rufulla', 'Həsənov', 'Eynulla', 1, 2, '1970-08-09', 'Bakı şəh.', 0, '2P415GH', '08573485', '1969-12-31', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı/Sabunçu Balaxanı', 'Bakı/Sabunçu Balaxanı', '504744341', '504744341', 'Rufulla@sherwood.com', '504744341', 1, 'BT30073048', ''),
(146, 9, 'Serdar', 'Akdağ', 'İhsan', 1, 2, '1970-08-09', 'Bakı şəh.', 0, '2P415GH', '08573485', '1969-12-31', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı/Sabunçu Balaxanı', 'Bakı/Sabunçu Balaxanı', '(+994 50) 250', '(+994 50) 250', 'Serdar@sherwood.com', '(+994 50) 250 56 40', 0, 'LA34066180', ''),
(147, 9, 'Əlimirzə', 'Əliyev', 'Ziyad', 1, 2, '1972-08-10', 'Bakı şəh.', 0, '485HB6H', '09974564', '2011-04-10', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı/Sabunçu Sabunçu', 'Bakı/Sabunçu Sabunçu', '(+994 50) 250', '(+994 50) 250', 'Əlimirzə@sherwood.com', '(+994 50) 250 60 65', 1, 'FO41074337', ''),
(148, 9, 'Natiq', 'Rufiyev', 'Həsənağa', 1, 2, '1972-08-10', 'Bakı şəh.', 0, '485HB6H', '09974564', '2011-04-10', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı/Sabunçu Sabunçu', 'Bakı/Sabunçu Sabunçu', '517917163', '517917163', 'Natiq@sherwood.com', '517917163', 1, 'RG47806243', ''),
(149, 9, 'Nizami', 'Rəsulov', 'Abdulla', 1, 2, '1969-12-31', 'Ermənistan. Ararat  ray.', 0, '2RD9708', '13317489', '2013-10-05', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı/Sabunçu Bakıxanov', 'Bakı/Sabunçu Bakıxanov', '504481032', '504481032', 'Nizami@sherwood.com', '504481032', 1, 'DA24473544', ''),
(150, 9, 'Xalidə', 'Qasımova', 'Xanoğlan', 1, 2, '1969-12-31', 'Ermənistan. Ararat  ray.', 0, '2RD9708', '13317489', '2013-10-05', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı/Sabunçu Bakıxanov', 'Bakı/Sabunçu Bakıxanov', '502053732', '502053732', 'Xalidə@sherwood.com', '502053732', 1, 'XZ33093427', ''),
(151, 9, 'Tahir', 'Mirzəyev', 'Həbib', 1, 2, '1969-12-31', 'Lenkeran ş.', 0, '1DXWBJN', '09824881', '2012-01-10', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı/Suraxanı Bülbülə', 'Bakı/Suraxanı Bülbülə', '503509510', '503509510', 'Tahir@sherwood.com', '503509510', 1, 'RB66008678', ''),
(152, 9, 'Yusif', 'Baxşıyev', 'Xanoğlan', 1, 2, '1969-12-31', 'Lenkeran ş.', 0, '1DXWBJN', 'AA0754288', '2019-10-09', '1969-12-31', 'ASAN', 'Bakı/Suraxanı Bülbülə', 'Bakı/Suraxanı Bülbülə', '703509510', '703509510', 'Yusif@sherwood.com', '703509510', 1, 'PH57515723', ''),
(153, 9, 'Nailə', 'Zamanova', 'Zaman', 1, 2, '1960-07-02', 'Xaçmaz ray. Dədəli kən', 0, '3ASTYJN', '08365046', '1969-12-31', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı/Suraxanı Yeni Günəşli qəs. D/S', 'Bakı/Suraxanı Yeni Günəşli qəs. D/S', '506271656', '506271656', 'Nailə@sherwood.com', '506271656', 1, 'AJ32110888', ''),
(154, 9, 'İlkin', 'Ağayev', 'Əhmədağa', 1, 2, '1960-07-02', 'Xaçmaz ray. Dədəli kən', 0, '3ASTYJN', '08365046', '1969-12-31', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı/Suraxanı Yeni Günəşli qəs. D/S', 'Bakı/Suraxanı Yeni Günəşli qəs. D/S', '506705003', '506705003', 'İlkin@sherwood.com', '506705003', 1, 'XW96173519', ''),
(155, 9, 'Altay', 'Abbasov', 'Nurəddin', 1, 2, '1975-01-03', 'Bakı şəh.', 0, '4GQ2ZMZ', '08106085', '1969-12-31', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı/Suraxanı Bülbülə', 'Bakı/Suraxanı Bülbülə', '505258961', '505258961', 'Altay@sherwood.com', '505258961', 1, 'KF55251472', ''),
(156, 9, 'Hakim', 'Əliyev', 'Qəmbərəli', 1, 2, '1969-12-31', 'Bakı şəh.', 0, '2PR68EW', '08021419', '1969-12-31', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı/Sabunçu Bakıxanov', 'Bakı/Sabunçu Bakıxanov', '557924387', '557924387', 'Hakim@sherwood.com', '557924387', 1, 'YO61901800', ''),
(157, 0, 'Nazim', 'İbadov', 'Səfail', 1, 2, '1969-12-31', 'Bakı şəh.', 0, '2PR68EW', '08021419', '1969-12-31', '1969-12-31', '', '', '', '', '', '', '', 1, 'MO40116991', ''),
(158, 9, 'İftixar', 'Məhərrəmov', 'Camal', 1, 2, '1969-12-31', 'Iran. Maku  ş.', 2, '41F7303', '95277300', '1969-12-31', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı/Sabunçu Bakıxanov', 'Bakı/Sabunçu Bakıxanov', '518066091', '518066091', 'İftixar@sherwood.com', '518066091', 1, 'VX36926028', ''),
(159, 9, 'Şahnisə', 'İmamverdiyeva', 'Teyyub', 1, 2, '1969-12-31', 'Iran. Maku  ş.', 2, '41F7303', '95277300', '1969-12-31', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı/Sabunçu Bakıxanov', 'Bakı/Sabunçu Bakıxanov', '503301490', '503301490', 'Şahnisə@sherwood.com', '503301490', 1, 'RQ13098812', ''),
(160, 9, 'Reyhan', 'Zairova', 'Ağaməmməd', 1, 2, '1969-12-31', 'Şamaxı ray.', 0, '3HXAFNA', '03706714', '1969-12-31', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı/Nizami Keşlə', 'Bakı/Nizami Keşlə', '558676420', '558676420', 'Reyhan@sherwood.com', '558676420', 1, 'JE49433232', ''),
(161, 9, 'Xubnaz', 'Qasımova', 'Baloğlan', 1, 2, '1969-12-31', 'Şamaxı ray.', 0, '3HXAFNA', '03706714', '1969-12-31', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı/Nizami Keşlə', 'Bakı/Nizami Keşlə', '505462323', '505462323', 'Xubnaz@sherwood.com', '505462323', 1, 'LV61296700', ''),
(162, 9, 'Xatirə', 'Baxşəliyeva', 'Yasin', 1, 2, '1969-12-31', 'Ermənistan, Amasiya ray', 0, '3T96G5F', '15527607', '2015-06-02', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı/Sabunçu Ramana', 'Bakı/Sabunçu Ramana', '(+994 50) 344', '(+994 50) 344', 'Xatirə@sherwood.com', '(+994 50) 344 08 89', 1, 'OX77876674', ''),
(163, 9, 'Sultan', 'Vəliyev', 'Sucəddin', 1, 2, '1969-12-31', 'Ermənistan, Amasiya ray', 0, '3T96G5F', '15527607', '2015-06-02', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı/Sabunçu Ramana', 'Bakı/Sabunçu Ramana', '050344 08 89', '050344 08 89', 'Sultan@sherwood.com', '050344 08 89', 1, 'IO89117553', ''),
(164, 9, 'Sevil', 'Musayeva', 'Tofiq', 1, 2, '1969-12-31', 'Bakı şəh.', 0, '4RM9GVV', '16174595', '1969-12-31', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı/Xəzər Binə', 'Bakı/Xəzər Binə', '556870633', '556870633', 'Sevil@sherwood.com', '556870633', 1, 'ST31192326', ''),
(165, 9, 'Elmira', 'Nəcəfova', 'Əlikərim', 1, 2, '1969-12-31', 'Bakı şəh.', 0, '4RM9GVV', '16174595', '1969-12-31', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı/Xəzər Binə', 'Bakı/Xəzər Binə', '518690808', '518690808', 'Elmira@sherwood.com', '518690808', 1, 'XE39950063', ''),
(166, 9, 'Hicran', 'Qurbanova', 'Əzizağa', 1, 2, '1969-12-31', 'RF, Maxaçkala şəhəri', 0, '17BQ2RH', '06151064', '2008-03-04', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı şəhəri/Yasamal rayonu', 'Bakı şəhəri/Yasamal rayonu', '518892002', '518892002', 'Hicran@sherwood.com', '518892002', 1, 'FK63080938', ''),
(167, 9, 'Şahnigar', 'Məmmədova', 'Məcid', 1, 2, '1969-12-31', 'RF, Maxaçkala şəhəri', 0, '17BQ2RH', '06151064', '2008-03-04', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı şəhəri/Yasamal rayonu', 'Bakı şəhəri/Yasamal rayonu', '558850630', '558850630', 'Şahnigar@sherwood.com', '558850630', 1, 'GS98163443', ''),
(168, 9, 'Zabitə', 'Hacıəliyeva', 'Bəylər', 1, 2, '1964-02-04', 'Ermənistan,Qafan ray,', 0, '2MQAPTJ', '14555007', '1969-12-31', '1969-12-31', 'DİĞER', 'Bakı/Suraxanı Qaraçuxur', 'Bakı/Suraxanı Qaraçuxur', '504984630', '504984630', 'Zabitə@sherwood.com', '504984630', 1, 'FV69869923', ''),
(169, 9, 'Əmanət', 'Məmmədova', 'Məmmədhüseyn', 1, 2, '1964-02-04', 'Ermənistan,Qafan ray,', 0, '2MQAPTJ', '14555007', '1969-12-31', '1969-12-31', 'DİĞER', 'Bakı/Suraxanı Qaraçuxur', 'Bakı/Suraxanı Qaraçuxur', '556771181', '556771181', 'Əmanət@sherwood.com', '556771181', 1, 'NI73039116', ''),
(170, 9, 'Mətanət', 'Adıgözəlova', 'Medal', 1, 2, '1977-06-03', 'Bakı şəhəri', 0, '1GF8Y9L', '09438389', '2012-11-06', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı/Xətai Əhmədli', 'Bakı/Xətai Əhmədli', '055-993-31-70', '055-993-31-70', 'Mətanət@sherwood.com', '055-993-31-70', 1, 'PM96714840', ''),
(171, 9, 'Səriyyəxanım', 'Ağacanova', 'Adgözəl', 1, 2, '1977-06-03', 'Bakı şəhəri', 0, '1GF8Y9L', '09438389', '2012-11-06', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı/Xətai Əhmədli', 'Bakı/Xətai Əhmədli', '519092411', '519092411', 'Səriyyəxanım@sherwood.com', '519092411', 1, 'OY18926396', ''),
(172, 9, 'Səmərqənd', 'Cabbarova', 'Srəfil', 1, 2, '1969-12-31', 'GÜRCÜSTAN R. MARNEULİ ray.Yux. Saral K.', 0, '55UNQPG', '05783874', '1969-12-31', '1969-12-31', 'KAZAH', 'Bakı/Binəqədi Xutor', 'Bakı/Binəqədi Xutor', '(+994 55) 835', '(+994 55) 835', 'Səmərqənd@sherwood.com', '(+994 55) 835 74 94', 1, 'OH17526599', ''),
(173, 9, 'Zərminə', 'Bünyatova', 'Baloğlan', 1, 2, '1969-12-31', 'GÜRCÜSTAN R. MARNEULİ ray.Yux. Saral K.', 0, '55UNQPG', '05783874', '1969-12-31', '1969-12-31', 'KAZAH', 'Bakı/Binəqədi Xutor', 'Bakı/Binəqədi Xutor', '507533518', '507533518', 'Zərminə@sherwood.com', '507533518', 1, 'XH95809760', ''),
(174, 9, 'Elxan', 'Əzimov', 'Balaağa', 1, 2, '1969-12-31', 'Azərbaycan , Bakı şəhəri', 0, '1TMPG04', '14228735', '1969-12-31', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı şəhəri/Nərimanov rayonu Baki şeh', 'Bakı şəhəri/Nərimanov rayonu Baki şeh', '517255318', '517255318', 'Elxan@sherwood.com', '517255318', 1, 'BJ14131533', ''),
(175, 9, 'Sahib', 'Məmmədov', 'Məmməd', 1, 2, '1969-12-31', 'Azərbaycan , Bakı şəhəri', 0, '1TMPG04', '14228735', '1969-12-31', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı şəhəri/Nərimanov rayonu Baki şeh', 'Bakı şəhəri/Nərimanov rayonu Baki şeh', '558788644', '558788644', 'Sahib@sherwood.com', '558788644', 1, 'UA45503780', ''),
(176, 9, 'Xaqani', 'Ağasıyev', 'Xanoğlan', 1, 2, '1969-12-31', 'Astara', 0, '3MLWHAD', '08161786', '1969-12-31', '1969-12-31', 'ASTARA', 'Astara/Astara Suparibağ', 'Astara/Astara Suparibağ', '517094817', '517094817', 'Xaqani@sherwood.com', '517094817', 1, 'GJ66463186', ''),
(177, 9, 'Nağı', 'Talıbov', 'Səməd', 1, 2, '1978-02-04', 'Erciş', 0, 'F74BF<<', '09299090', '1969-12-31', '1969-12-31', 'DİĞER', 'H.Əliyev pr.90', 'H.Əliyev pr.90', '556319267', '556319267', 'Nağı@sherwood.com', '556319267', 1, 'MG38703963', ''),
(178, 9, 'Xanım', 'Ağayeva', 'Zakir', 1, 2, '1978-02-04', 'Erciş', 0, 'F74BF<<', '09299090', '1969-12-31', '1969-12-31', 'DİĞER', 'H.Əliyev pr.90', 'H.Əliyev pr.90', '519352686', '519352686', 'Xanım@sherwood.com', '519352686', 1, 'FM48301332', ''),
(179, 9, 'Malik', 'Alıyev', 'Dilqəm', 1, 2, '1969-12-31', 'Qərbi Azərbaycan, Amasiya ray.', 0, '0Z8VCVQ', '09141831', '1969-12-31', '1969-12-31', 'SƏBAIL RPİ', '34-cu məhəllə 2/48', '34-cu məhəllə 2/48', '504191405', '504191405', 'Malik@sherwood.com', '504191405', 1, 'XY15015128', ''),
(180, 9, 'Məlahət', 'Ataşova', 'Ərzuman', 1, 2, '1969-12-31', 'Qərbi Azərbaycan, Amasiya ray.', 0, '0Z8VCVQ', '09141831', '1969-12-31', '1969-12-31', 'SƏBAIL RPİ', '34-cu məhəllə 2/48', '34-cu məhəllə 2/48', '556335470', '556335470', 'Məlahət@sherwood.com', '556335470', 1, 'IQ82365726', ''),
(181, 9, 'Diləzbər', 'Hüseynova', 'Muğan', 1, 2, '1969-12-31', 'Lənkəran ray., İstisu qəs.', 0, '4X0CSLM', '13045575', '2012-10-12', '1969-12-31', 'LENKERAN ŞEHRI', 'Lənkəran/Lənkəran Haftoni', 'Lənkəran/Lənkəran Haftoni', '077-419-15-75', '077-419-15-75', 'Diləzbər@sherwood.com', '077-419-15-75', 1, 'LF21591933', ''),
(182, 9, 'Saleh', 'Orucov', 'Balagül', 1, 2, '1969-12-31', 'Lənkəran ray., İstisu qəs.', 0, '4X0CSLM', '13045575', '2012-10-12', '1969-12-31', 'LENKERAN ŞEHRI', 'Lənkəran/Lənkəran Haftoni', 'Lənkəran/Lənkəran Haftoni', '505722779', '505722779', 'Saleh@sherwood.com', '505722779', 1, 'CH47391254', ''),
(183, 9, 'Elmira', 'Mirzəyeva', 'Astanpaşa', 1, 2, '1969-12-31', 'Lənkəran ray, Kirov qəs', 0, '34Z2T47', '07924302', '1969-12-31', '1969-12-31', 'LENKERAN ŞEHRI', 'Lənkəran/Lənkəran İstisu', 'Lənkəran/Lənkəran İstisu', '706674457', '706674457', 'Elmira@sherwood.com', '706674457', 1, 'JK47935015', ''),
(184, 9, 'Yuxabə', 'Məmmədova', 'Zeynabdin', 1, 2, '1969-12-31', 'Lənkəran ray, Kirov qəs', 0, '34Z2T47', '07924302', '1969-12-31', '1969-12-31', 'LENKERAN ŞEHRI', 'Lənkəran/Lənkəran İstisu', 'Lənkəran/Lənkəran İstisu', '(+994 55) 714', '(+994 55) 714', 'Yuxabə@sherwood.com', '(+994 55) 714 32 92', 1, 'DM63339584', ''),
(185, 9, 'Kifayət', 'Səfərova', 'Seyidəhməd', 1, 2, '1969-12-31', 'Lənkəran ray., Xanlıqlı Kən', 0, '2LD7BC9', '07926624', '2010-02-08', '1969-12-31', 'LENKERAN ŞEHRI', 'Lənkəran/Lənkəran Haftoni', 'Lənkəran/Lənkəran Haftoni', '505854842', '505854842', 'Kifayət@sherwood.com', '505854842', 1, 'GC45095081', ''),
(186, 9, 'Raya', 'Bəşirova', 'Abasqulu', 1, 2, '1969-12-31', 'Lənkəran ray., Xanlıqlı Kən', 0, '2LD7BC9', '07926624', '2010-02-08', '1969-12-31', 'LENKERAN ŞEHRI', 'Lənkəran/Lənkəran Haftoni', 'Lənkəran/Lənkəran Haftoni', '772434347', '772434347', 'Raya@sherwood.com', '772434347', 1, 'DC31060213', ''),
(187, 9, 'Təranə', 'Eyyubova', 'Minas', 1, 2, '1969-12-31', 'Astara ray., Loyavin K.', 0, '2RXNH1B', '13179127', '1969-12-31', '1969-12-31', 'ASTARA RPŞ', 'Astara/Astara Kijəbə', 'Astara/Astara Kijəbə', '0502059905', '0502059905', 'Təranə@sherwood.com', '0502059905', 1, 'SP93624128', ''),
(188, 9, 'Rəşad', 'Aslanov', 'Rəşid', 1, 2, '1969-12-31', 'Astara ray., Loyavin K.', 0, '2RXNH1B', '13179127', '1969-12-31', '1969-12-31', 'ASTARA RPŞ', 'Astara/Astara Kijəbə', 'Astara/Astara Kijəbə', '555626509', '555626509', 'Rəşad@sherwood.com', '555626509', 1, 'LQ94424357', ''),
(189, 9, 'Nizami', 'Cavadov', 'Alim', 1, 2, '1969-12-31', 'Astara ray., Loyavin K.', 0, '2RXNH1B', '13179127', '1969-12-31', '1969-12-31', 'ASTARA RPŞ', 'Astara/Astara Kijəbə', 'Astara/Astara Kijəbə', '(+994 55) 793', '(+994 55) 793', 'Nizami@sherwood.com', '(+994 55) 793 26 42', 1, 'HV53118637', ''),
(190, 9, 'Elvin', 'Şükürov', 'Bayram', 1, 2, '1969-12-31', 'Lənkəran ray., Kirov qəs.', 0, '371ZHTK', '13604497', '1969-12-31', '1969-12-31', 'LƏNKƏRAN ŞRPŞ', 'Lənkəran/Lənkəran İstisu', 'Lənkəran/Lənkəran İstisu', '(+994 55) 384', '(+994 55) 384', 'Elvin@sherwood.com', '(+994 55) 384 54 24', 1, 'BV90201264', ''),
(191, 9, 'Rəşad', 'Balayev', 'Xidməddin', 1, 2, '1969-12-31', 'Lənkəran, Kirov qəs.', 0, '3HCNLR4', '13604534', '1969-12-31', '1969-12-31', 'LENKERAN ŞEHRI', 'Lənkəran/Lənkəran İstisu', 'Lənkəran/Lənkəran İstisu', '055 384 54 24', '055 384 54 24', 'Rəşad@sherwood.com', '055 384 54 24', 1, 'IC43058780', ''),
(192, 9, 'Vüsal', 'Abdullayev', 'Nazim', 1, 2, '1969-12-31', 'Lənkəran, Kirov qəs.', 0, '3HCNLR4', '13604534', '1969-12-31', '1969-12-31', 'LENKERAN ŞEHRI', 'Lənkəran/Lənkəran İstisu', 'Lənkəran/Lənkəran İstisu', '505358202', '505358202', 'Vüsal@sherwood.com', '505358202', 1, 'KR84899559', ''),
(193, 9, 'Məmməd', 'Kərimov', 'Nadir', 1, 2, '1969-01-04', 'Lənkəran ray., Kirov qəs.', 0, '4GNVN1R', '05160044', '1969-12-31', '1969-12-31', 'LENKERAN ŞEHRI', 'Lənkəran/Lənkəran İstisu', 'Lənkəran/Lənkəran İstisu', '055-709-37-35', '055-709-37-35', 'Məmməd@sherwood.com', '055-709-37-35', 1, 'AV71290396', ''),
(194, 9, 'Sabir', 'Rəhimov', 'Rəhim', 1, 2, '1969-01-04', 'Lənkəran ray., Kirov qəs.', 0, '4GNVN1R', '05160044', '1969-12-31', '1969-12-31', 'LENKERAN ŞEHRI', 'Lənkəran/Lənkəran İstisu', 'Lənkəran/Lənkəran İstisu', '507668522', '507668522', 'Sabir@sherwood.com', '507668522', 1, 'KX86697055', ''),
(195, 9, 'Natiq', 'Qasımov', 'Şahid', 1, 2, '1967-12-08', 'Xaçmaz', 0, '26ZZKY3', '17422969', '2017-12-10', '1969-12-31', 'HAÇMAZ', 'Bakı/Suraxanı Qaraçuxur', 'Bakı/Suraxanı Qaraçuxur', '556369221', '556369221', 'Natiq@sherwood.com', '556369221', 1, 'MZ17129242', ''),
(196, 9, 'Zakir', 'Bədəlov', 'Çingiz', 1, 2, '1967-12-08', 'Xaçmaz', 0, '26ZZKY3', '17422969', '2017-12-10', '1969-12-31', 'HAÇMAZ', 'Bakı/Suraxanı Qaraçuxur', 'Bakı/Suraxanı Qaraçuxur', '515385510', '515385510', 'Zakir@sherwood.com', '515385510', 1, 'CJ32031990', ''),
(197, 9, 'Azər', 'Məmmədov', 'Tahir', 1, 2, '1976-10-08', 'Astara', 0, '1L84PQY', '08219517', '2011-01-11', '1969-12-31', 'ASTARA RPŞ', 'Astara/Astara Ərçivan', 'Astara/Astara Ərçivan', '055-921-86-58', '055-921-86-58', 'Azər@sherwood.com', '055-921-86-58', 1, 'SK58727877', ''),
(198, 9, 'Kəmalə', 'Həmidova', 'Şəyyub', 1, 2, '1977-09-07', 'Astara', 0, '3M4KQSF', '09794083', '2012-03-09', '1969-12-31', 'ASTARA RPŞ', 'Astara/Astara Seləkəran', 'Astara/Astara Seləkəran', '554595335', '554595335', 'Kəmalə@sherwood.com', '554595335', 1, 'RU80989180', ''),
(199, 9, 'Məleykə', 'Amoyeva', 'Əhməd', 1, 2, '1969-12-31', 'Bakı', 0, '0YFEUN1', '05520319', '2011-08-07', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı/Xəzər Buzovna', 'Bakı/Xəzər Buzovna', '557428499', '557428499', 'Məleykə@sherwood.com', '557428499', 1, 'BA63607414', ''),
(200, 9, 'Nəzakət', 'Nağıyeva', 'Nazim', 1, 2, '1969-12-31', 'Bakı', 0, '0YFEUN1', '05520319', '2011-08-07', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı/Xəzər Buzovna', 'Bakı/Xəzər Buzovna', '055-965-36-09', '055-965-36-09', 'Nəzakət@sherwood.com', '055-965-36-09', 1, 'BV94417021', ''),
(201, 9, 'Təhməz', 'İbrahimov', 'Fərhad', 1, 2, '1972-10-05', 'Beyləqan', 0, '0XM01DD', '07992122', '2010-11-05', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı/Sabunçu Bakıxanov', 'Bakı/Sabunçu Bakıxanov', '(+994  70) 20', '(+994  70) 20', 'Təhməz@sherwood.com', '(+994  70) 200 40 47', 1, 'FE50063316', ''),
(202, 0, 'Emil', 'Ibadlı', 'Davud', 1, 2, '1972-10-05', 'Beyləqan', 0, '0XM01DD', '07992122', '1969-12-31', '1969-12-31', '', '', '', '', '', '', '', 1, 'RM64614730', ''),
(203, 9, 'Məlahət', 'Məmmədova', 'Səfqulu', 1, 2, '1979-03-08', 'Bakı', 0, '21H26Q8', '15394124', '1969-12-31', '1969-12-31', 'ASAN 2', 'Bakı/Xətai', 'Bakı/Xətai', '(+994 70) 829', '(+994 70) 829', 'Məlahət@sherwood.com', '(+994 70) 829 07 76', 1, 'SX98470820', ''),
(204, 9, 'Səbinə', 'Ərəbəliyeva', 'Fərman', 1, 2, '1979-03-08', 'Bakı', 0, '21H26Q8', '15394124', '1969-12-31', '1969-12-31', 'ASAN 2', 'Bakı/Xətai', 'Bakı/Xətai', '055 828 04 17', '055 828 04 17', 'Səbinə@sherwood.com', '055 828 04 17', 1, 'JF11856642', ''),
(205, 9, 'Ülviyyə', 'Məmmədova', 'Murtuz', 1, 2, '1978-04-01', 'Astara ray.,Şahağacı K.', 0, '3981BPN', '13178114', '1969-12-31', '1969-12-31', 'ASTARA RPŞ', 'Astara/Şahağacı', 'Astara/Şahağacı', '557738028', '557738028', 'Ülviyyə@sherwood.com', '557738028', 1, 'ZA60480630', ''),
(206, 9, 'Asiyə', 'Baxşıyeva', 'Ağamməd', 1, 2, '1978-04-01', 'Astara ray.,Şahağacı K.', 0, '3981BPN', '13178114', '1969-12-31', '1969-12-31', 'ASTARA RPŞ', 'Astara/Şahağacı', 'Astara/Şahağacı', '077-219-18-53', '077-219-18-53', 'Asiyə@sherwood.com', '077-219-18-53', 1, 'DC98373845', ''),
(207, 9, 'Nəzakət', 'Hüseynova', 'İmam', 1, 2, '1967-12-05', 'Tər-Tər şəhəri', 0, '2XVSEJS', '03561554', '1969-12-31', '1969-12-31', 'TƏRTƏR RPŞ', 'Sabunçu rayonu', 'Sabunçu rayonu', '(+994 77) 722', '(+994 77) 722', 'Nəzakət@sherwood.com', '(+994 77) 722 92 52', 1, 'GC49370816', ''),
(208, 9, 'Eldar', 'Hacıyev', 'İlqar', 1, 2, '1967-12-05', 'Tər-Tər şəhəri', 0, '2XVSEJS', '03561554', '1969-12-31', '1969-12-31', 'TƏRTƏR RPŞ', 'Sabunçu rayonu', 'Sabunçu rayonu', '055 722 92 52', '055 722 92 52', 'Eldar@sherwood.com', '055 722 92 52', 1, 'GJ51688404', ''),
(209, 9, 'Aqil', 'Alxasov', 'Kərim', 1, 2, '1967-12-05', 'Tər-Tər şəhəri', 0, '2XVSEJS', '03561554', '1969-12-31', '1969-12-31', 'TƏRTƏR RPŞ', 'Sabunçu rayonu', 'Sabunçu rayonu', '(+994 55) 427', '(+994 55) 427', 'Aqil@sherwood.com', '(+994 55) 427 40 25', 1, 'MS37968829', ''),
(210, 9, 'Süleyman', 'Əsgərov', 'Səməd', 1, 2, '1960-08-12', 'Bakı şəh.', 0, '30NU2TZ', '08554151', '2011-09-03', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı/Nəsimi', 'Bakı/Nəsimi', '(+994 50) 265', '(+994 50) 265', 'Süleyman@sherwood.com', '(+994 50) 265 41 85', 1, 'KI85092530', ''),
(211, 9, 'Hafizə', 'Ələkbərova', 'Məhər', 1, 2, '1960-08-12', 'Bakı şəh.', 0, '30NU2TZ', '08554151', '2011-09-03', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı/Nəsimi', 'Bakı/Nəsimi', '555746329', '555746329', 'Hafizə@sherwood.com', '555746329', 1, 'NW93811648', ''),
(212, 9, 'Mirhəmid', 'Babayev', 'Səyad', 1, 2, '1963-12-03', 'Bilesuvar şəh.', 0, '2AUK72Y', '13392404', '1969-12-31', '1969-12-31', 'DİĞER', 'Bakı/Xətai Əhmədli', 'Bakı/Xətai Əhmədli', '555359035', '555359035', 'Mirhəmid@sherwood.com', '555359035', 1, 'TR20124818', ''),
(213, 9, 'Fuad', 'Salmanlı', 'İxtiyar', 1, 2, '1963-12-03', 'Bilesuvar şəh.', 0, '2AUK72Y', '13392404', '1969-12-31', '1969-12-31', 'DİĞER', 'Bakı/Xətai Əhmədli', 'Bakı/Xətai Əhmədli', '552194331', '552194331', 'Fuad@sherwood.com', '552194331', 1, 'VY79997891', ''),
(214, 9, 'Səma', 'Qədirli', 'Qədir', 1, 2, '1969-12-31', 'Ermenistan, Masis', 0, '39RGV0L', '08530928', '1969-12-31', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı/Sabunçu Bakıxanov', 'Bakı/Sabunçu Bakıxanov', '(+994 55) 601', '(+994 55) 601', 'Səma@sherwood.com', '(+994 55) 601 93 22', 1, 'RE67642325', ''),
(215, 9, 'Sara', 'Mehdiyeva', 'Musa', 1, 2, '1966-12-05', 'Bakı ş', 0, '2QPXPA1', '16103755', '2016-11-07', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı/Suraxanı Əmircan', 'Bakı/Suraxanı Əmircan', '(+99450) 549 ', '(+99450) 549 ', 'Sara@sherwood.com', '(+99450) 549 62 38', 1, 'JS87746695', ''),
(216, 9, 'Şakir', 'Quliyev', 'Şahi', 1, 2, '1966-12-05', 'Bakı ş', 0, '2QPXPA1', '16103755', '2016-11-07', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı/Suraxanı Əmircan', 'Bakı/Suraxanı Əmircan', '055 883 16 83', '055 883 16 83', 'Şakir@sherwood.com', '055 883 16 83', 1, 'VP86628244', ''),
(217, 9, 'Azər', 'Məmmədov', 'Cəlal', 1, 2, '1968-01-01', 'Masallı ray.', 0, '3SQ04Z7', '17309137', '1969-12-31', '1969-12-31', 'MASALLI', 'Bakı/Sabunçu Bakıxanov', 'Bakı/Sabunçu Bakıxanov', '(+99455) 427 ', '(+99455) 427 ', 'Azər@sherwood.com', '(+99455) 427 44 56', 1, 'CH57817642', ''),
(218, 9, 'Rahib', 'Məmmədov', 'Vahid', 1, 2, '1968-01-01', 'Masallı ray.', 0, '3SQ04Z7', '17309137', '1969-12-31', '1969-12-31', 'MASALLI', 'Bakı/Sabunçu Bakıxanov', 'Bakı/Sabunçu Bakıxanov', '051-876-75-69', '051-876-75-69', 'Rahib@sherwood.com', '051-876-75-69', 1, 'LE93019135', ''),
(219, 9, 'Allahşükür', 'Baxşiyev', 'İdris', 1, 2, '1963-07-11', 'Ermenistan, Masis', 0, '3XGFSAP', '14587480', '1969-12-31', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı/Sabunçu Bakıxanov', 'Bakı/Sabunçu Bakıxanov', '555181778', '555181778', 'Allahşükür@sherwood.com', '555181778', 1, 'XM21975087', ''),
(220, 9, 'Pərviz', 'Tağıyev', 'Cabir', 1, 2, '1963-07-11', 'Ermenistan, Masis', 0, '3XGFSAP', '14587480', '1969-12-31', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı/Sabunçu Bakıxanov', 'Bakı/Sabunçu Bakıxanov', '556103993', '556103993', 'Pərviz@sherwood.com', '556103993', 1, 'KS59027291', ''),
(221, 9, 'Nüsrət', 'Məlikov', 'Vüqar', 1, 2, '1974-01-07', 'Tovuz ray., Yuxarı Öysüzlü kəndi', 0, '30QT06G', '08921984', '1969-12-31', '1969-12-31', 'TOVUZ', 'Bakı/Sabunçu Zabrat', 'Bakı/Sabunçu Zabrat', '506103993', '506103993', 'Nüsrət@sherwood.com', '506103993', 1, 'KD76067819', ''),
(222, 9, 'Elmar', 'Məmmədov', 'Fazil', 1, 2, '1974-01-07', 'Tovuz ray., Yuxarı Öysüzlü kəndi', 0, '30QT06G', '08921984', '1969-12-31', '1969-12-31', 'TOVUZ', 'Bakı/Sabunçu Zabrat', 'Bakı/Sabunçu Zabrat', '051-5153645', '051-5153645', 'Elmar@sherwood.com', '051-5153645', 1, 'WY36394545', ''),
(223, 9, 'Mirfarid', 'Baxşıizadə', 'Xanəhməd', 1, 2, '1969-12-31', 'Tovuz ray., Aşağı Öysüzlü kəndi', 0, '30Q50EC', '09604971', '1969-12-31', '1969-12-31', 'TOVUZ', 'Bakı/Sabunçu Zabrat', 'Bakı/Sabunçu Zabrat', '055 886 01 49', '055 886 01 49', 'Mirfarid@sherwood.com', '055 886 01 49', 1, 'QZ21445298', ''),
(224, 9, 'Nicat', 'Əzizli', 'Seymur', 1, 2, '1969-12-31', 'Tovuz ray., Aşağı Öysüzlü kəndi', 0, '30Q50EC', '09604971', '1969-12-31', '1969-12-31', 'TOVUZ', 'Bakı/Sabunçu Zabrat', 'Bakı/Sabunçu Zabrat', '051 850 08 91', '051 850 08 91', 'Nicat@sherwood.com', '051 850 08 91', 1, 'FG10365153', ''),
(225, 9, 'Elvin', 'Rzayev', 'Anatoliy', 1, 2, '1961-05-02', 'Oğuz ray, Hezre k', 0, '241D4XU', '08523899', '2011-03-03', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı/Suraxanı', 'Bakı/Suraxanı', '(+99455) 571 ', '(+99455) 571 ', 'Elvin@sherwood.com', '(+99455) 571 77 19', 1, 'FI38776694', ''),
(226, 9, 'Məmməd', 'Əliyev', 'Ələskər', 1, 2, '1961-05-02', 'Oğuz ray, Hezre k', 0, '241D4XU', '08523899', '2011-03-03', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı/Suraxanı', 'Bakı/Suraxanı', '051 892 19 71', '051 892 19 71', 'Məmməd@sherwood.com', '051 892 19 71', 1, 'YJ58890334', ''),
(227, 9, 'Natiq', 'Əliyev', 'Əliəşrəf', 1, 2, '1977-05-03', 'Azərbaycan , Bakı şəhəri', 0, '4GQ3CVF', '04579932', '1969-12-31', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı şəhəri/Suraxanı rayonu', 'Bakı şəhəri/Suraxanı rayonu', '0558784362', '0558784362', 'Natiq@sherwood.com', '0558784362', 1, 'JE38196450', ''),
(228, 9, 'Cavad', 'Şahbazov', 'Səyadulla', 1, 2, '1977-05-03', 'Azərbaycan , Bakı şəhəri', 0, '4GQ3CVF', '04579932', '1969-12-31', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı şəhəri/Suraxanı rayonu', 'Bakı şəhəri/Suraxanı rayonu', '0515591926', '0515591926', 'Cavad@sherwood.com', '0515591926', 1, 'QA92024918', ''),
(229, 9, 'Vüsal', 'Qulamzadə', 'Təhməz', 1, 2, '1958-04-05', 'Tovuz r-nu, Moruxlu K.', 0, '43CRKQM', '08404422', '1969-12-31', '1969-12-31', 'GEDEBEY', 'Bakı/Suraxanı Qaraçuxur', 'Bakı/Suraxanı Qaraçuxur', '558471886', '558471886', 'Vüsal@sherwood.com', '558471886', 1, 'AE72153781', ''),
(230, 9, 'Şamil', 'Zülfüqarov', 'Yaşar', 1, 2, '1958-04-05', 'Tovuz r-nu, Moruxlu K.', 0, '43CRKQM', '08404422', '1969-12-31', '1969-12-31', 'GEDEBEY', 'Bakı/Suraxanı Qaraçuxur', 'Bakı/Suraxanı Qaraçuxur', '051 328 60 51', '051 328 60 51', 'Şamil@sherwood.com', '051 328 60 51', 1, 'ZH53641084', ''),
(231, 9, 'Əlimərdan', 'Bəşirov', 'Ağaqulu', 1, 2, '1963-04-09', 'Bakı ş.', 0, '3ASRRMD', '13760463', '2013-04-10', '1969-12-31', 'DİĞER', 'Bakı/Suraxanı Yeni Günəşli', 'Bakı/Suraxanı Yeni Günəşli', '051 455 23 45', '051 455 23 45', 'Əlimərdan@sherwood.com', '051 455 23 45', 1, 'CQ37664068', ''),
(232, 9, 'Hüseyn', 'Mamedov', 'Əli', 1, 2, '1963-04-09', 'Bakı ş.', 0, '3ASRRMD', '13760463', '2013-04-10', '1969-12-31', 'DİĞER', 'Bakı/Suraxanı Yeni Günəşli', 'Bakı/Suraxanı Yeni Günəşli', '0503990625', '0503990625', 'Hüseyn@sherwood.com', '0503990625', 1, 'PF65253632', ''),
(233, 9, 'Ədalət', 'Əliyeva', 'Mirzəmməd', 1, 2, '1969-12-31', 'Lenkeran r-u', 0, '4V7PQM1', '14016975', '1969-12-31', '1969-12-31', 'DİĞER', 'Bakı/Suraxanı Y/Günəşli qəs.', 'Bakı/Suraxanı Y/Günəşli qəs.', '553478970', '553478970', 'Ədalət@sherwood.com', '553478970', 1, 'ZS53950239', ''),
(234, 9, 'Vahid', 'Abbaszadə', 'Hikmət', 1, 2, '1969-12-31', 'Lenkeran r-u', 0, '4V7PQM1', '14016975', '1969-12-31', '1969-12-31', 'DİĞER', 'Bakı/Suraxanı Y/Günəşli qəs.', 'Bakı/Suraxanı Y/Günəşli qəs.', '513043403', '513043403', 'Vahid@sherwood.com', '513043403', 1, 'LZ88796668', ''),
(235, 9, 'Elvar', 'Şirəlizadə', 'Kamil', 1, 2, '1964-06-11', 'Bakı şəh.', 0, '4HW3C56', '14644514', '1969-12-31', '1969-12-31', 'DİĞER', 'Bakı/Yasamal', 'Bakı/Yasamal', '558289481', '558289481', 'Elvar@sherwood.com', '558289481', 1, 'HN29497828', ''),
(236, 9, 'Siruz', 'Məmmədzadə', 'Əli', 1, 2, '1964-06-11', 'Bakı şəh.', 0, '4HW3C56', '14644514', '1969-12-31', '1969-12-31', 'DİĞER', 'Bakı/Yasamal', 'Bakı/Yasamal', '553478092', '553478092', 'Siruz@sherwood.com', '553478092', 1, 'CU44458467', '');
INSERT INTO `tbl_employees` (`id`, `company_id`, `firstname`, `lastname`, `surname`, `sex`, `marital_status`, `birth_date`, `birth_place`, `citizenship`, `pincode`, `passport_seria_number`, `passport_date`, `passport_end_date`, `pass_given_authority`, `living_address`, `reg_address`, `home_tel`, `mob_tel`, `email`, `emr_contact`, `emp_status`, `empno`, `image_name`) VALUES
(237, 9, 'Rubail', 'Ağayev', 'Alı', 1, 2, '1969-12-31', 'Bakı şəh.', 0, '2KWY42H', '13311780', '2013-03-05', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı/Sabunçu Balaxanı', 'Bakı/Sabunçu Balaxanı', '(+99451)47760', '(+99451)47760', 'Rubail@sherwood.com', '(+99451)4776015', 1, 'QC17163492', ''),
(238, 9, 'Nurlan', 'Piriyev', 'Fazil', 1, 2, '1969-12-31', 'Bakı şəh.', 0, '2KWY42H', '13311780', '2013-03-05', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı/Sabunçu Balaxanı', 'Bakı/Sabunçu Balaxanı', '0555064305', '0555064305', 'Nurlan@sherwood.com', '0555064305', 1, 'OG84978582', ''),
(239, 9, 'Elşən', 'Mirzəyev', 'Məzahir', 1, 2, '1969-12-31', 'Bakı şəh.', 0, '2KWY42H', '13311780', '2013-03-05', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı/Sabunçu Balaxanı', 'Bakı/Sabunçu Balaxanı', '0558701197', '0558701197', 'Elşən@sherwood.com', '0558701197', 1, 'CQ59223850', ''),
(240, 9, 'Cabbar', 'Cabbarov', 'Çingiz', 1, 2, '1969-12-31', 'Qazax ray. orta salahlı kəndi', 0, '43B7CHP', '13411088', '1969-12-31', '1969-12-31', 'KAZAH', 'Bakı/Sabunçu Bakıxanov', 'Bakı/Sabunçu Bakıxanov', '0508864520', '0508864520', 'Cabbar@sherwood.com', '0508864520', 1, 'KB77622705', ''),
(241, 9, 'Murad', 'Əmrahi', 'İbrahim', 1, 2, '1969-12-31', 'Qazax ray. orta salahlı kəndi', 0, '43B7CHP', '13411088', '1969-12-31', '1969-12-31', 'KAZAH', 'Bakı/Sabunçu Bakıxanov', 'Bakı/Sabunçu Bakıxanov', '705960744', '705960744', 'Murad@sherwood.com', '705960744', 1, 'ZF21834215', ''),
(242, 9, 'Kənan', 'Qabilzadə', 'Ravil', 1, 2, '1969-12-31', 'Türkmenistan, Krasnodovsk', 0, '2K7SGE4', '13351964', '2013-07-05', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı/Xətai Əhmədli', 'Bakı/Xətai Əhmədli', '556009493', '556009493', 'Kənan@sherwood.com', '556009493', 1, 'PE51648255', ''),
(243, 9, 'Nabat', 'Tapdıqova', 'Eldar', 1, 2, '1969-12-31', 'Türkmenistan, Krasnodovsk', 0, '2K7SGE4', '13351964', '2013-07-05', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı/Xətai Əhmədli', 'Bakı/Xətai Əhmədli', '773001242', '773001242', 'Nabat@sherwood.com', '773001242', 1, 'KX89573033', ''),
(244, 9, 'Polad', 'Səyidov', 'Mirzəağa', 1, 2, '1969-12-31', 'Bakı şəh', 0, '348K7VF', '09944643', '2012-02-05', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı/Suraxanı Bülbülə', 'Bakı/Suraxanı Bülbülə', '0554274478', '0554274478', 'Polad@sherwood.com', '0554274478', 1, 'UK21446741', ''),
(245, 9, 'Raya', 'Mahmudova', 'Lətif', 1, 2, '1969-12-31', 'Bakı şəh', 0, '348K7VF', '09944643', '2012-02-05', '1969-12-31', 'BAKÜ ŞEHRI', 'Bakı/Suraxanı Bülbülə', 'Bakı/Suraxanı Bülbülə', '554474819', '554474819', 'Raya@sherwood.com', '554474819', 1, 'BA49399785', ''),
(246, 9, 'Ceyhun', 'Qocayev', 'Ədalət', 1, 2, '1969-12-31', 'Ermenistan/Qaradiğa  r-n', 0, '1GVVQ0P', '13763266', '1969-12-31', '1969-12-31', 'DİĞER', 'Bakı/Nizami Keşlə', 'Bakı/Nizami Keşlə', '558684563', '558684563', 'Ceyhun@sherwood.com', '558684563', 1, 'OE13241338', ''),
(247, 0, 'Gülyaz', 'Əsgərova', 'Rəhim', 1, 2, '1969-12-31', 'Ermenistan/Qaradiğa  r-n', 0, '1GVVQ0P', '13763266', '1969-12-31', '1969-12-31', '', '', '', '', '', '', '', 1, 'WP22592939', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_category`
--

CREATE TABLE `tbl_employee_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(10) UNSIGNED DEFAULT NULL,
  `code` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `structure_level` int(11) DEFAULT NULL,
  `position_level` int(11) DEFAULT NULL,
  `work_status` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `insert_date` date NOT NULL,
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_employee_category`
--

INSERT INTO `tbl_employee_category` (`id`, `category`, `parent`, `code`, `icon`, `structure_level`, `position_level`, `work_status`, `company_id`, `emp_id`, `create_date`, `insert_date`, `update_date`) VALUES
(197, 'Yeni', NULL, 'qsRHi', '../images/icons/box1.png', 3, 0, NULL, NULL, 0, '2020-07-01', '2020-07-22', '2020-07-22 17:32:31'),
(206, 'aaa', 197, '9mUFT', '../images/icons/box1.png', 2, 0, NULL, NULL, 0, '2020-07-03', '2020-07-22', '2020-07-22 17:45:30'),
(207, 'sss', 197, '9gO2E', '../images/icons/man2.png', 0, 1, NULL, NULL, 41, '2020-07-02', '2020-07-22', '2020-07-22 17:45:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_certification`
--

CREATE TABLE `tbl_employee_certification` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `training_center_name` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `training_name` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `training_date` date NOT NULL,
  `cert_given_date` date NOT NULL,
  `insert_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `insert_user` int(11) NOT NULL,
  `update_user` int(11) NOT NULL,
  `cert_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_employee_certification`
--

INSERT INTO `tbl_employee_certification` (`id`, `emp_id`, `training_center_name`, `training_name`, `training_date`, `cert_given_date`, `insert_date`, `update_date`, `insert_user`, `update_user`, `cert_status`) VALUES
(9, 52, 'Success Factors Academy', 'ACCA F3', '2020-05-13', '2020-08-06', '2020-08-28 00:00:00', '2020-08-28 00:00:00', 52, 52, 1),
(10, 53, '', '', '2020-09-08', '1969-12-31', '2020-09-08 00:00:00', '2020-09-08 00:00:00', 53, 53, 1),
(11, 60, 'SFA AKADEMY', 'Test', '2021-04-13', '2021-04-09', '2021-04-09 00:00:00', '2021-04-09 08:49:52', 60, 60, 1);

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
  `insert_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_employee_commands`
--

INSERT INTO `tbl_employee_commands` (`id`, `command_id`, `emp_id`, `command_no`, `company_id`, `company_name`, `company_address`, `company_tel`, `voen`, `sun`, `enterprise_head_position`, `enterprise_head_fullname`, `qualification`, `uni_name`, `profession`, `create_date`, `structure1`, `structure2`, `structure3`, `structure4`, `structure5`, `military_reg_group`, `military_reg_category`, `military_staff`, `military_rank`, `military_specialty_acc`, `military_fitness_service`, `military_registration_service`, `military_registration_date`, `military_general`, `military_special`, `military_no_official`, `military_additional_information`, `military_date_completion`, `insert_date`) VALUES
(52, 5, 55, '', 0, '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, 5, 56, '', 0, '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(54, 5, 57, '', 0, '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, 5, 58, '', 5, 'ABŞERON TREYD MƏHDUD MƏSULİYYƏTLİ CƏMİYYƏTİ', 'Bakı ş, Binəqədi r-nu, M.Rəsulzadə Stq. Agamalı oğlu (Rəsulzadə qəs.,) ev 5a            Faktiki Ünvan: Xətai r-nu, Babək prospekti, Babək plaza, A blok, 9-cu mərtəbə', '0124041919; 0', '2147483647', '10110078950', 'Sərəncamverici direktor, müəssisə', 'ABDİYEV  AFTANDİL  FAİQ OĞLU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, 1, 58, '', 5, 'ABŞERON TREYD MƏHDUD MƏSULİYYƏTLİ CƏMİYYƏTİ', 'Bakı ş, Binəqədi r-nu, M.Rəsulzadə Stq. Agamalı oğlu (Rəsulzadə qəs.,) ev 5a            Faktiki Ünvan: Xətai r-nu, Babək prospekti, Babək plaza, A blok, 9-cu mərtəbə', '0124041919; 0', '2147483647', '10110078950', 'Sərəncamverici direktor, müəssisə', 'ABDİYEV  AFTANDİL  FAİQ OĞLU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(57, 5, 59, '', 0, '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(58, 5, 60, '', 5, 'ABŞERON TREYD MƏHDUD MƏSULİYYƏTLİ CƏMİYYƏTİ', 'Bakı ş, Binəqədi r-nu, M.Rəsulzadə Stq. Agamalı oğlu (Rəsulzadə qəs.,) ev 5a            Faktiki Ünvan: Xətai r-nu, Babək prospekti, Babək plaza, A blok, 9-cu mərtəbə', '0124041919; 0', '2147483647', '10110078950', 'Sərəncamverici direktor, müəssisə', 'ABDİYEV  AFTANDİL  FAİQ OĞLU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(59, 5, 61, '', 5, 'ABŞERON TREYD MƏHDUD MƏSULİYYƏTLİ CƏMİYYƏTİ', 'Bakı ş, Binəqədi r-nu, M.Rəsulzadə Stq. Agamalı oğlu (Rəsulzadə qəs.,) ev 5a            Faktiki Ünvan: Xətai r-nu, Babək prospekti, Babək plaza, A blok, 9-cu mərtəbə', '0124041919; 0', '2147483647', '10110078950', 'Sərəncamverici direktor, müəssisə', 'ABDİYEV  AFTANDİL  FAİQ OĞLU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(60, 5, 62, '', 5, 'ABŞERON TREYD MƏHDUD MƏSULİYYƏTLİ CƏMİYYƏTİ', 'Bakı ş, Binəqədi r-nu, M.Rəsulzadə Stq. Agamalı oğlu (Rəsulzadə qəs.,) ev 5a            Faktiki Ünvan: Xətai r-nu, Babək prospekti, Babək plaza, A blok, 9-cu mərtəbə', '0124041919; 0', '2147483647', '10110078950', 'Sərəncamverici direktor, müəssisə', 'ABDİYEV  AFTANDİL  FAİQ OĞLU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(61, 6, 61, '', 5, 'ABŞERON TREYD MƏHDUD MƏSULİYYƏTLİ CƏMİYYƏTİ', 'Bakı ş, Binəqədi r-nu, M.Rəsulzadə Stq. Agamalı oğlu (Rəsulzadə qəs.,) ev 5a            Faktiki Ünvan: Xətai r-nu, Babək prospekti, Babək plaza, A blok, 9-cu mərtəbə', '0124041919; 0', '2147483647', '10110078950', 'Sərəncamverici direktor, müəssisə', 'ABDİYEV  AFTANDİL  FAİQ OĞLU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(62, 11, 61, '', 5, 'ABŞERON TREYD MƏHDUD MƏSULİYYƏTLİ CƏMİYYƏTİ', 'Bakı ş, Binəqədi r-nu, M.Rəsulzadə Stq. Agamalı oğlu (Rəsulzadə qəs.,) ev 5a            Faktiki Ünvan: Xətai r-nu, Babək prospekti, Babək plaza, A blok, 9-cu mərtəbə', '0124041919; 0', '2147483647', '10110078950', 'Sərəncamverici direktor, müəssisə', 'ABDİYEV  AFTANDİL  FAİQ OĞLU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(63, 6, 61, '', 5, 'ABŞERON TREYD MƏHDUD MƏSULİYYƏTLİ CƏMİYYƏTİ', 'Bakı ş, Binəqədi r-nu, M.Rəsulzadə Stq. Agamalı oğlu (Rəsulzadə qəs.,) ev 5a            Faktiki Ünvan: Xətai r-nu, Babək prospekti, Babək plaza, A blok, 9-cu mərtəbə', '0124041919; 0', '2147483647', '10110078950', 'Sərəncamverici direktor, müəssisə', 'ABDİYEV  AFTANDİL  FAİQ OĞLU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(64, 1, 61, '', 5, 'ABŞERON TREYD MƏHDUD MƏSULİYYƏTLİ CƏMİYYƏTİ', 'Bakı ş, Binəqədi r-nu, M.Rəsulzadə Stq. Agamalı oğlu (Rəsulzadə qəs.,) ev 5a            Faktiki Ünvan: Xətai r-nu, Babək prospekti, Babək plaza, A blok, 9-cu mərtəbə', '0124041919; 0', '2147483647', '10110078950', 'Sərəncamverici direktor, müəssisə', 'ABDİYEV  AFTANDİL  FAİQ OĞLU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(65, 5, 63, '', 5, 'ABŞERON TREYD MƏHDUD MƏSULİYYƏTLİ CƏMİYYƏTİ', 'Bakı ş, Binəqədi r-nu, M.Rəsulzadə Stq. Agamalı oğlu (Rəsulzadə qəs.,) ev 5a            Faktiki Ünvan: Xətai r-nu, Babək prospekti, Babək plaza, A blok, 9-cu mərtəbə', '0124041919; 0', '2147483647', '10110078950', 'Sərəncamverici direktor, müəssisə', 'ABDİYEV  AFTANDİL  FAİQ OĞLU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(66, 18, 0, '', 5, 'ABŞERON TREYD MƏHDUD MƏSULİYYƏTLİ CƏMİYYƏTİ', 'Bakı ş, Binəqədi r-nu, M.Rəsulzadə Stq. Agamalı oğlu (Rəsulzadə qəs.,) ev 5a            Faktiki Ünvan: Xətai r-nu, Babək prospekti, Babək plaza, A blok, 9-cu mərtəbə', '0124041919; 0', '2147483647', '10110078950', 'Sərəncamverici direktor, müəssisə', 'ABDİYEV  AFTANDİL  FAİQ OĞLU', NULL, NULL, NULL, NULL, 'Abseron trade', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(67, 18, 53, '', 5, 'ABŞERON TREYD MƏHDUD MƏSULİYYƏTLİ CƏMİYYƏTİ', 'Bakı ş, Binəqədi r-nu, M.Rəsulzadə Stq. Agamalı oğlu (Rəsulzadə qəs.,) ev 5a            Faktiki Ünvan: Xətai r-nu, Babək prospekti, Babək plaza, A blok, 9-cu mərtəbə', '0124041919; 0', '2147483647', '10110078950', 'Sərəncamverici direktor, müəssisə', 'ABDİYEV  AFTANDİL  FAİQ OĞLU', NULL, NULL, NULL, NULL, 'manager hr', '2', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(68, 5, 64, '', 7, 'Yeni sirket', 'Baki Nizami', '122324', '2147483647', '777', 'Direktor', 'Soyadov Ad ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(69, 18, 0, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, 'Səbət Market MMC', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(70, 18, 0, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, 'Əmək haqqı', '11', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(71, 18, 0, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, 'Maliyyə Direktorluğu', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(72, 18, 0, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, 'Aparıcı mütəxəssis', '11', '', '21', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(73, 18, 0, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, 'Analitik', '12', '', '25', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(74, 5, 65, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(75, 5, 66, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(76, 5, 67, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(77, 5, 68, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(78, 5, 69, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(79, 5, 70, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(80, 6, 65, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(81, 19, 61, '', 5, 'ABŞERON TREYD MƏHDUD MƏSULİYYƏTLİ CƏMİYYƏTİ', 'Bakı ş, Binəqədi r-nu, M.Rəsulzadə Stq. Agamalı oğlu (Rəsulzadə qəs.,) ev 5a            Faktiki Ünvan: Xətai r-nu, Babək prospekti, Babək plaza, A blok, 9-cu mərtəbə', '0124041919; 0', '2147483647', '10110078950', 'Sərəncamverici direktor, müəssisə', 'ABDİYEV  AFTANDİL  FAİQ OĞLU', NULL, NULL, NULL, NULL, 'kassir', '3', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(82, 6, 65, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(83, 11, 65, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(84, 5, 71, '', 7, 'Yeni sirket', 'Baki Nizami', '122324', '2147483647', '777', 'Direktor', 'Soyadov Ad ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(85, 5, 72, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(86, 5, 73, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(87, 6, 73, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(88, 11, 73, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(89, 19, 68, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, 'Şöbə müdiri', '11', '', '23', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(90, 1, 66, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(91, 6, 65, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(92, 11, 65, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(93, 6, 66, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(94, 11, 66, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(95, 6, 66, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(96, 11, 66, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(97, 6, 66, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(98, 11, 66, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(99, 1, 65, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(100, 1, 65, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(101, 6, 65, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-29 13:00:00'),
(102, 11, 65, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-29 13:00:00'),
(103, 6, 65, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-29 13:01:09'),
(104, 11, 65, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-29 13:01:09'),
(105, 6, 72, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-29 13:01:24'),
(106, 11, 72, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-29 13:01:24'),
(107, 6, 72, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-29 13:01:33'),
(108, 11, 72, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-29 13:01:33'),
(109, 6, 69, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-29 13:02:21'),
(110, 11, 69, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-29 13:02:21'),
(111, 1, 72, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-29 13:03:59'),
(112, 1, 72, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-29 13:04:15'),
(113, 1, 70, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-29 13:05:02'),
(114, 1, 70, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-29 13:05:11'),
(115, 1, 70, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-29 13:05:22'),
(116, 5, 74, '01/K', 7, 'Yeni sirket', 'Baki Nizami', '122324', '2147483647', '777', 'Direktor', 'Soyadov Ad ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-29 14:00:19'),
(117, 1, 74, '', 7, 'Yeni sirket', 'Baki Nizami', '122324', '2147483647', '777', 'Direktor', 'Soyadov Ad ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-29 14:00:49'),
(118, 1, 74, '', 7, 'Yeni sirket', 'Baki Nizami', '122324', '2147483647', '777', 'Direktor', 'Soyadov Ad ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-29 14:02:57'),
(119, 6, 74, '', 7, 'Yeni sirket', 'Baki Nizami', '122324', '2147483647', '777', 'Direktor', 'Soyadov Ad ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-29 14:12:56'),
(120, 11, 74, '', 7, 'Yeni sirket', 'Baki Nizami', '122324', '2147483647', '777', 'Direktor', 'Soyadov Ad ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-29 14:12:56'),
(121, 6, 70, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-30 03:25:56'),
(122, 11, 70, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-30 03:25:56'),
(123, 5, 77, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-01 13:05:16'),
(124, 5, 78, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-01 13:08:27'),
(125, 6, 65, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-01 13:17:08'),
(126, 11, 65, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-01 13:17:08'),
(127, 1, 78, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-01 13:20:00'),
(128, 5, 79, '', 7, 'Yeni sirket', 'Baki Nizami', '122324', '2147483647', '777', 'Direktor', 'Soyadov Ad ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-01 13:48:52'),
(129, 6, 79, '', 7, 'Yeni sirket', 'Baki Nizami', '122324', '2147483647', '777', 'Direktor', 'Soyadov Ad ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-01 13:53:33'),
(130, 11, 79, '', 7, 'Yeni sirket', 'Baki Nizami', '122324', '2147483647', '777', 'Direktor', 'Soyadov Ad ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-01 13:53:33'),
(131, 19, 72, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, 'Texnik', '11', '', '21', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-01 14:23:43'),
(132, 19, 79, '', 7, 'Yeni sirket', 'Baki Nizami', '122324', '2147483647', '777', 'Direktor', 'Soyadov Ad ', NULL, NULL, NULL, NULL, '67', '63', '64', '65', '66', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-02 01:17:12'),
(133, 5, 80, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-02 01:19:38'),
(134, 5, 81, '02/K', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-02 01:21:22'),
(135, 6, 81, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-02 01:23:30'),
(136, 11, 81, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-02 01:23:30'),
(137, 18, 79, '', 7, 'Yeni sirket', 'Baki Nizami', '122324', '2147483647', '777', 'Direktor', 'Soyadov Ad ', NULL, NULL, NULL, NULL, 'ddf67', '63', '64', '65', '66', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-02 06:41:16'),
(138, 18, 71, '', 7, 'Yeni sirket', 'Baki Nizami', '122324', '2147483647', '777', 'Direktor', 'Soyadov Ad ', NULL, NULL, NULL, NULL, 'ffgg67', '63', '64', '65', '66', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-02 06:41:21'),
(139, 19, 74, '', 7, 'Yeni sirket', 'Baki Nizami', '122324', '2147483647', '777', 'Direktor', 'Soyadov Ad ', NULL, NULL, NULL, NULL, 'yeni vezife', '63', '64', '65', '66', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-02 07:32:01'),
(140, 19, 75, '', 7, 'Yeni sirket', 'Baki Nizami', '122324', '2147483647', '777', 'Direktor', 'Soyadov Ad ', NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-02 08:00:18'),
(141, 19, 71, '', 7, 'Yeni sirket', 'Baki Nizami', '122324', '2147483647', '777', 'Direktor', 'Soyadov Ad ', NULL, NULL, NULL, NULL, 'ffgg67', '63', '64', '65', '66', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-02 08:02:04'),
(142, 5, 82, '01/K', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-02 11:33:25'),
(143, 6, 82, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-02 11:54:47'),
(144, 11, 82, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-02 11:54:47'),
(145, 19, 82, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, 'Aparıcı mütəxəssis', '', '16', '', '17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-02 11:57:52'),
(146, 6, 81, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-02 12:45:03'),
(147, 11, 81, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-02 12:45:03'),
(148, 18, 81, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, 'satici', '14', '', '26', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-02 12:48:47'),
(149, 1, 81, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-02 12:51:47'),
(150, 5, 87, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-03 14:01:20'),
(151, 6, 87, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-03 14:12:23'),
(152, 11, 87, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-03 14:12:23'),
(153, 1, 87, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-03 14:22:28'),
(154, 19, 69, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, 'Şöbə müdiri', '12', '', '25', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-03 14:44:20'),
(155, 19, 77, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-03 14:45:29'),
(156, 5, 88, '02/K', 7, 'Yeni sirket', 'Baki Nizami', '122324', '2147483647', '777', 'Direktor', 'Soyadov Ad ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-04 01:26:53'),
(157, 5, 89, '', 7, 'Yeni sirket', 'Baki Nizami', '122324', '2147483647', '777', 'Direktor', 'Soyadov Ad ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-04 03:20:21'),
(158, 6, 65, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-05 14:44:06'),
(159, 6, 65, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-05 14:45:43'),
(160, 1, 81, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-05 14:50:20'),
(161, 1, 81, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-05 14:52:21'),
(162, 11, 80, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-05 15:01:45'),
(163, 5, 90, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-05 15:04:25'),
(164, 11, 90, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-05 15:07:06'),
(165, 19, 87, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, 'Mütəxəssis', '15', '', '', '52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-05 15:14:45'),
(166, 11, 60, '', 5, 'ABŞERON TREYD MMC', 'Bakı ş, Binəqədi r-nu, M.Rəsulzadə Stq. Agamalı oğlu (Rəsulzadə qəs.,) ev 5a            Faktiki Ünvan: Xətai r-nu, Babək prospekti, Babək plaza, A blok, 9-cu mərtəbə', '0124041919; 0', '2147483647', '10110078950', 'Sərəncamverici direktor, müəssisə', 'ABDİYEV  AFTANDİL  FAİQ OĞLU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-06 06:42:10'),
(167, 1, 89, '', 7, 'Yeni sirket', 'Baki Nizami', '122324', '2147483647', '777', 'Direktor', 'Soyadov Ad ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-06 11:51:08'),
(168, 5, 91, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-09 02:15:37'),
(169, 11, 91, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-09 02:19:06'),
(170, 1, 91, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-09 02:24:18'),
(171, 19, 67, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, 'Şöbə müdiri', '14', '', '27', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-09 02:34:32'),
(172, 19, 91, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, 'Şöbə müdiri', '14', '', '26', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-09 02:36:43'),
(173, 5, 92, '03/K', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-09 02:43:09'),
(174, 1, 92, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-09 03:00:05'),
(175, 1, 92, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-09 03:00:47'),
(176, 11, 78, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-09 03:01:42'),
(177, 11, 92, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-09 03:23:22'),
(178, 18, 0, '', 5, 'ABŞERON TREYD MMC', 'Bakı ş, Binəqədi r-nu, M.Rəsulzadə Stq. Agamalı oğlu (Rəsulzadə qəs.,) ev 5a            Faktiki Ünvan: Xətai r-nu, Babək prospekti, Babək plaza, A blok, 9-cu mərtəbə', '0124041919; 0', '2147483647', '10110078950', 'Sərəncamverici direktor, müəssisə', 'ABDİYEV  AFTANDİL  FAİQ OĞLU', NULL, NULL, NULL, NULL, 'Kasir', '3', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-20 03:32:06'),
(179, 19, 70, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, 'Mütəxəssis', '15', '', '', '53', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-21 04:08:08'),
(180, 19, 70, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, 'Mütəxəssis', '15', '', '', '53', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-21 04:16:29'),
(181, 19, 80, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-21 14:14:55'),
(182, 5, 94, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-21 14:57:16'),
(183, 11, 94, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-21 15:31:06'),
(184, 5, 95, '', 7, 'Yeni sirket', 'Baki Nizami', '122324', '2147483647', '777', 'Direktor', 'Soyadov Ad ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-22 09:32:06'),
(185, 5, 96, '', 7, 'Yeni sirket', 'Baki Nizami', '122324', '2147483647', '777', 'Direktor', 'Soyadov Ad ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-22 09:41:07'),
(186, 19, 88, '', 7, 'Yeni sirket', 'Baki Nizami', '122324', '2147483647', '777', 'Direktor', 'Soyadov Ad ', NULL, NULL, NULL, NULL, 'yeni vezife', '63', '64', '65', '66', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-23 05:56:11'),
(187, 19, 81, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, 'satici', '14', '', '26', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-23 06:00:52'),
(188, 5, 97, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-25 12:53:40'),
(189, 5, 98, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-25 12:57:29'),
(190, 19, 92, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, 'Mütəxəssis', '15', '', '', '52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-25 13:56:24'),
(191, 5, 103, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-12 15:27:10'),
(192, 11, 103, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-12 15:28:29'),
(193, 1, 103, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-12 15:55:57'),
(194, 1, 103, '02/K', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-12 15:57:17'),
(195, 19, 94, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, 'Şöbə müdiri', '14', '', '27', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-12 17:29:40'),
(196, 5, 104, '', 0, 'HRM', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-17 15:38:47'),
(197, 5, 105, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-18 10:27:28'),
(198, 5, 106, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-20 13:49:18'),
(199, 11, 106, '', 0, 'HRM', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-20 13:51:10'),
(200, 1, 106, '', 0, 'HRM', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-20 13:52:13'),
(201, 19, 97, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-20 14:20:52'),
(202, 5, 107, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-22 07:39:36'),
(203, 5, 108, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-22 08:40:21'),
(204, 11, 108, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-22 08:53:57'),
(205, 5, 109, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-22 12:51:52'),
(206, 5, 110, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-22 12:51:52');
INSERT INTO `tbl_employee_commands` (`id`, `command_id`, `emp_id`, `command_no`, `company_id`, `company_name`, `company_address`, `company_tel`, `voen`, `sun`, `enterprise_head_position`, `enterprise_head_fullname`, `qualification`, `uni_name`, `profession`, `create_date`, `structure1`, `structure2`, `structure3`, `structure4`, `structure5`, `military_reg_group`, `military_reg_category`, `military_staff`, `military_rank`, `military_specialty_acc`, `military_fitness_service`, `military_registration_service`, `military_registration_date`, `military_general`, `military_special`, `military_no_official`, `military_additional_information`, `military_date_completion`, `insert_date`) VALUES
(207, 1, 110, '01/K', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-22 14:51:23'),
(208, 5, 111, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-23 00:39:34'),
(209, 5, 112, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-25 01:01:41'),
(210, 1, 112, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-25 01:02:15'),
(211, 1, 112, '', 8, 'Səbət market MMC', 'Binəqədi ray., Əliyar Əliyev küç', '+99412  404 4', '2147483647', '10110075362', 'Baş Direktor', 'Məmmədov Şamil Cəlil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-25 01:03:05'),
(212, 5, 113, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 12:28:30'),
(213, 5, 114, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 12:28:30'),
(214, 5, 115, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 12:28:30'),
(215, 5, 116, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 12:28:30'),
(216, 5, 117, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 12:28:30'),
(217, 5, 118, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 12:28:30'),
(218, 5, 119, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 12:28:30'),
(219, 5, 120, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 12:28:30'),
(220, 5, 121, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 12:28:30'),
(221, 5, 122, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 12:28:30'),
(222, 5, 123, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 12:28:30'),
(223, 5, 124, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 12:28:30'),
(224, 5, 125, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 12:28:30'),
(225, 5, 126, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 12:28:30'),
(226, 5, 127, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 12:28:30'),
(227, 5, 128, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 12:28:30'),
(228, 5, 129, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 12:28:30'),
(229, 5, 130, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 12:28:30'),
(230, 5, 131, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 12:28:30'),
(231, 5, 132, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 12:28:30'),
(232, 5, 133, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 12:28:30'),
(233, 5, 134, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 12:28:30'),
(234, 5, 135, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 12:28:30'),
(235, 5, 136, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 12:28:30'),
(236, 5, 137, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 12:28:30'),
(237, 5, 138, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 12:28:30'),
(238, 5, 139, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 12:28:30'),
(239, 5, 140, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 12:28:30'),
(240, 5, 141, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 12:28:30'),
(241, 5, 142, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 12:28:30'),
(242, 5, 143, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 12:28:30'),
(243, 5, 144, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 12:28:30'),
(244, 5, 145, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 12:28:30'),
(245, 5, 146, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 12:28:30'),
(246, 5, 147, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 12:28:30'),
(247, 5, 148, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 12:28:30'),
(248, 5, 149, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 12:28:30'),
(249, 5, 150, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 12:28:30'),
(250, 5, 151, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 12:28:30'),
(251, 5, 152, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 12:28:30'),
(252, 5, 153, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 12:28:30'),
(253, 5, 154, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 12:28:30'),
(254, 5, 155, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 12:28:30'),
(255, 5, 156, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 12:28:30'),
(256, 5, 157, '', 0, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 12:28:30'),
(257, 5, 158, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:31:04'),
(258, 5, 159, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:31:04'),
(259, 5, 160, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:31:04'),
(260, 5, 161, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:31:04'),
(261, 5, 162, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:31:04'),
(262, 5, 163, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:31:04'),
(263, 5, 164, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:31:04'),
(264, 5, 165, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:31:04'),
(265, 5, 166, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:31:04'),
(266, 5, 167, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:31:04'),
(267, 5, 168, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:31:04'),
(268, 5, 169, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:31:04'),
(269, 5, 170, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:31:04'),
(270, 5, 171, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:31:04'),
(271, 5, 172, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:31:04'),
(272, 5, 173, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:31:04'),
(273, 5, 174, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:31:04'),
(274, 5, 175, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:31:04'),
(275, 5, 176, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:31:04'),
(276, 5, 177, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:31:04'),
(277, 5, 178, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:31:04'),
(278, 5, 179, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:31:04'),
(279, 5, 180, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:31:04'),
(280, 5, 181, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:31:04'),
(281, 5, 182, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:31:04'),
(282, 5, 183, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:31:04'),
(283, 5, 184, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:31:04'),
(284, 5, 185, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:31:04'),
(285, 5, 186, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:31:04'),
(286, 5, 187, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:31:04'),
(287, 5, 188, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:31:04'),
(288, 5, 189, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:31:04'),
(289, 5, 190, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:31:04'),
(290, 5, 191, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:31:04'),
(291, 5, 192, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:31:04'),
(292, 5, 193, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:31:04'),
(293, 5, 194, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:31:04'),
(294, 5, 195, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:31:04'),
(295, 5, 196, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:31:04'),
(296, 5, 197, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:31:04'),
(297, 5, 198, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:31:04'),
(298, 5, 199, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:31:04'),
(299, 5, 200, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:31:04'),
(300, 5, 201, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:31:04'),
(301, 5, 202, '', 0, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:31:04'),
(302, 5, 203, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:40:09'),
(303, 5, 204, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:40:09'),
(304, 5, 205, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:40:09'),
(305, 5, 206, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:40:09'),
(306, 5, 207, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:40:09'),
(307, 5, 208, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:40:09'),
(308, 5, 209, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:40:09'),
(309, 5, 210, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:40:09'),
(310, 5, 211, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:40:09'),
(311, 5, 212, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:40:09'),
(312, 5, 213, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:40:09'),
(313, 5, 214, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:40:09'),
(314, 5, 215, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:40:09'),
(315, 5, 216, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:40:09'),
(316, 5, 217, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:40:09'),
(317, 5, 218, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:40:09'),
(318, 5, 219, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:40:09'),
(319, 5, 220, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:40:09'),
(320, 5, 221, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:40:09'),
(321, 5, 222, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:40:09'),
(322, 5, 223, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:40:09'),
(323, 5, 224, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:40:09'),
(324, 5, 225, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:40:09'),
(325, 5, 226, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:40:09'),
(326, 5, 227, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:40:09'),
(327, 5, 228, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:40:09'),
(328, 5, 229, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:40:09'),
(329, 5, 230, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:40:09'),
(330, 5, 231, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:40:09'),
(331, 5, 232, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:40:09'),
(332, 5, 233, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:40:09'),
(333, 5, 234, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:40:09'),
(334, 5, 235, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:40:09'),
(335, 5, 236, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:40:09'),
(336, 5, 237, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:40:09'),
(337, 5, 238, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:40:09'),
(338, 5, 239, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:40:09'),
(339, 5, 240, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:40:09'),
(340, 5, 241, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:40:09'),
(341, 5, 242, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:40:09'),
(342, 5, 243, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:40:09'),
(343, 5, 244, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:40:09'),
(344, 5, 245, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:40:09'),
(345, 5, 246, '', 9, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:40:09'),
(346, 5, 247, '', 0, 'Sherwood MMC', 'Bakı şəhəri, Nizami rayonu', '012 400 40 04', '987653211', 'Sun12121515', 'Direktor', 'Hacımusa Nəzirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-26 13:40:09');

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
  `service` int(11) DEFAULT NULL,
  `insert_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `insert_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_employee_company`
--

INSERT INTO `tbl_employee_company` (`id`, `company_name`, `voen`, `sun`, `bank_name`, `bank_filial`, `kod`, `bank_voen`, `cor_account`, `swift`, `azn_account`, `usd_account`, `eur_account`, `country`, `city`, `address`, `poct_index`, `tel`, `enterprise_head_fullname`, `enterprise_head_position`, `founder`, `service`, `insert_date`, `update_date`, `insert_user`, `update_user`, `status`) VALUES
(5, 'ABŞERON TREYD MMC', 1005720351, '10110078950', 'Azərbaycan Sənaye Bankı', 'Gözəl Ofis filialı', '510954', 2147483647, 'AZ12NABZ01350100000000016944', 'CAPNAZ22', 'AZ43CAPN00000000010867200001', '', '', 'Azərbaycan', 'Bakı', 'Bakı ş, Binəqədi r-nu, M.Rəsulzadə Stq. Agamalı oğlu (Rəsulzadə qəs.,) ev 5a   ', '', '0124041919; 0', 'ABDİYEV  AFTANDİL  FAİQ OĞLU', 'Sərəncamverici direktor, müəssisə', '', 0, NULL, NULL, NULL, NULL, 1),
(6, 'asdsad', 0, '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, 0),
(7, 'Yeni sirket', 2147483647, '777', 'ACCESS', 'dfdsf', '1234', 2147483647, 'werwe', '8878', 'werwer', '878', '777', 'AZER', 'werer', 'Baki Nizami', '1002', '122324', 'Soyadov Ad ', 'Direktor', 'werwerwe', 1, NULL, NULL, NULL, NULL, 1),
(8, 'Səbət market MMC', 1005498281, '10110075362', 'AZƏRBAYCAN BEYNƏLXALQ BANKI ASC', 'Mərkəz', '510954', 2147483647, 'AZ12NABZ01350100000000016944', 'CAPNAZ22', 'AZ89CAPN00000000010629600001', 'AZ62CAPN00000000010629600002', 'AZ35CAPN00000000010629600003', 'Azərbaycan', 'Bakı', 'Binəqədi ray., Əliyar Əliyev küç', 'AZ1000', '+99412  404 4', 'Məmmədov Şamil Cəlil', 'Baş Direktor', 'Carfoor İnt.', 1, NULL, NULL, NULL, NULL, 1),
(9, 'Sherwood MMC', 2147483647, 'Sun12121515', 'Rabitəbank', 'Nərimanov filialı', '3245423423', 987653211, '215544959979799', '215544959979799', '215544959979799', '215544959979799', '215544959979799', 'Azərbaycan', 'Bakı', 'Bakı şəhəri, Nizami rayonu', 'AZ1021', '012 400 40 04', 'Hacımusa Nəzirov', 'Direktor', 'Səbuhi Muxtarov', 1, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_education`
--

CREATE TABLE `tbl_employee_education` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `qualification_id` int(11) NOT NULL,
  `institution_id` int(11) NOT NULL,
  `faculty` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `profession` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `end_date` date NOT NULL,
  `diplom_seria_num` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `diplom_issue_date` date NOT NULL,
  `insert_date` date NOT NULL,
  `update_date` datetime NOT NULL,
  `insert_user` int(11) NOT NULL,
  `update_user` int(11) NOT NULL,
  `edu_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_employee_education`
--

INSERT INTO `tbl_employee_education` (`id`, `emp_id`, `qualification_id`, `institution_id`, `faculty`, `profession`, `end_date`, `diplom_seria_num`, `diplom_issue_date`, `insert_date`, `update_date`, `insert_user`, `update_user`, `edu_status`) VALUES
(27, 52, 2, 4, 'Mühəndislik', 'Kompuyuter mühəndisi', '2020-02-05', '21312344', '2016-05-18', '2020-08-28', '2020-08-28 00:00:00', 52, 52, 1),
(28, 65, 3, 5, 'Menecment', 'Bələdiyyə idarəetməsi', '2015-05-21', '21312344', '2015-05-21', '2020-10-21', '2020-10-21 00:00:00', 65, 65, 1),
(29, 73, 3, 4, 'Mühəndislik', 'Bələdiyyə idarəetməsi', '2020-10-13', '21312344', '2020-10-26', '2020-10-25', '2020-10-25 00:00:00', 73, 73, 1),
(30, 78, 3, 4, 'Mühəndislik', 'Bələdiyyə idarəetməsi', '2020-11-03', '21312344', '2020-11-03', '2020-11-02', '2020-11-02 00:00:00', 78, 78, 1),
(31, 81, 2, 7, 'Menecment', 'Bələdiyyə idarəetməsi', '1969-12-31', '', '1969-12-31', '2020-11-02', '2020-11-02 00:00:00', 81, 81, 1),
(32, 77, 0, 0, '', '', '1969-12-31', '', '1969-12-31', '2020-11-02', '2020-11-02 00:00:00', 77, 77, 1),
(33, 77, 0, 0, '', '', '1969-12-31', '', '1969-12-31', '2020-11-02', '2020-11-02 00:00:00', 77, 77, 1),
(34, 87, 3, 12, 'Mühəndislik', 'Bələdiyyə idarəetməsi', '2014-11-04', '21312344', '2010-11-04', '2020-11-03', '2020-11-03 00:00:00', 87, 87, 1),
(35, 92, 3, 15, 'Menecment', 'Bələdiyyə idarəetməsi', '2020-12-03', '21312344', '2020-11-25', '2020-11-09', '2020-11-09 03:24:15', 92, 92, 1),
(36, 60, 1, 4, '', '', '1969-12-31', '', '1969-12-31', '2020-11-09', '2020-11-09 00:00:00', 60, 60, 1),
(37, 60, 2, 6, '', '', '1969-12-31', '', '1969-12-31', '2020-11-09', '2020-11-09 00:00:00', 60, 60, 1),
(38, 84, 0, 0, '', '', '1969-12-31', '', '1969-12-31', '2020-11-09', '2020-11-09 00:00:00', 84, 84, 1),
(39, 94, 3, 17, 'Menecment', 'Bələdiyyə idarəetməsi', '2020-11-20', 'dss5155', '2020-11-19', '2020-11-21', '2020-11-21 00:00:00', 94, 94, 1),
(40, 73, 2, 5, 'Menecment', 'Bələdiyyə idarəetməsi', '2020-11-04', 'dss5155', '2020-11-25', '2020-11-25', '2020-11-25 00:00:00', 73, 73, 1),
(41, 60, 2, 6, 'Menecment', 'Bələdiyyə idarəetməsi', '2015-05-21', 'dss5155', '2015-05-21', '2020-11-25', '2020-11-25 00:00:00', 60, 60, 1),
(42, 73, 0, 0, '', '', '1969-12-31', '', '1969-12-31', '2020-12-12', '2020-12-12 00:00:00', 73, 73, 1),
(43, 0, 2, 12, '', '', '1969-12-31', '', '1969-12-31', '2020-12-17', '2020-12-17 00:00:00', 0, 0, 1),
(44, 0, 2, 7, 'Tətbiqi riyaziyyat və kibernetika', 'aaa', '2020-12-22', 'asdfrf', '2020-12-28', '2020-12-18', '2020-12-18 00:00:00', 0, 0, 1),
(45, 0, 3, 10, 'Tətbiqi riyaziyyat və kibernetika', 'aaa', '2020-12-30', 'asdfrf', '2020-12-02', '2020-12-20', '2020-12-20 00:00:00', 0, 0, 1),
(46, 0, 2, 11, 'Menecment', 'Bələdiyyə idarəetməsi', '2021-01-01', 'dss5155', '2020-12-17', '2020-12-20', '2020-12-20 00:00:00', 0, 0, 1),
(47, 0, 2, 12, 'Menecment', 'Bələdiyyə idarəetməsi', '2020-11-29', 'dss5155', '2020-11-30', '2020-12-20', '2020-12-20 00:00:00', 0, 0, 1),
(48, 0, 3, 10, 'Menecment', 'Bələdiyyə idarəetməsi', '2020-11-29', 'dss5155', '2020-11-30', '2020-12-20', '2020-12-20 00:00:00', 0, 0, 1),
(49, 0, 1, 5, 'Tətbiqi riyaziyyat və kibernetika', 'aaa', '2020-12-30', 'asdfrf', '2020-12-01', '2020-12-21', '2020-12-21 00:00:00', 0, 0, 1),
(50, 109, 2, 11, 'Menecment', 'Bələdiyyə idarəetməsi', '2020-12-08', 'dss5155', '2020-12-22', '2020-12-22', '2020-12-22 00:00:00', 109, 109, 1),
(51, 110, 3, 18, 'Menecment', 'Bələdiyyə idarəetməsi', '2020-12-07', 'dss51sdf', '2020-12-08', '2020-12-22', '2020-12-22 00:00:00', 110, 110, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_exemption`
--

CREATE TABLE `tbl_employee_exemption` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `exempt_id` int(11) NOT NULL,
  `insert_date` date NOT NULL,
  `update_date` date NOT NULL,
  `insert_user` int(11) NOT NULL,
  `update_user` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_exit`
--

CREATE TABLE `tbl_employee_exit` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `exit_date` date NOT NULL,
  `type_dismissal_id` int(11) NOT NULL,
  `termination_clause_id` int(11) NOT NULL,
  `note_id` int(11) NOT NULL,
  `main` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `guarantees_termination_contract` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `insert_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_employee_exit`
--

INSERT INTO `tbl_employee_exit` (`id`, `company_id`, `emp_id`, `exit_date`, `type_dismissal_id`, `termination_clause_id`, `note_id`, `main`, `guarantees_termination_contract`, `insert_date`) VALUES
(6, 5, 61, '2020-10-21', 0, 0, 0, '', '', '0000-00-00 00:00:00'),
(7, 8, 68, '2020-10-26', 7, 11, 24, 'Əmək müqaviləsi', '', '0000-00-00 00:00:00'),
(8, 8, 72, '2020-11-02', 6, 9, 17, 'test', 'test', '0000-00-00 00:00:00'),
(9, 7, 79, '2020-11-10', 0, 0, 0, '', '', '0000-00-00 00:00:00'),
(10, 7, 74, '2020-11-03', 2, 2, 13, 'İşçinin ərizəsi', 'Əmək müqaviləsinə xitam verilərkən işçilərin təminatları', '0000-00-00 00:00:00'),
(11, 7, 75, '2020-11-01', 1, 1, 5, 'Əmək müqaviləsi', 'Əmək müqaviləsinə xitam verilərkən işçilərin təminatları', '0000-00-00 00:00:00'),
(12, 7, 71, '2020-11-02', 1, 1, 2, 'Əmək müqaviləsi', 'Əmək müqaviləsinə xitam verilərkən işçilərin təminatları', '0000-00-00 00:00:00'),
(13, 8, 82, '2020-11-11', 7, 10, 0, 'Əmək müqaviləsi', 'test', '0000-00-00 00:00:00'),
(14, 8, 69, '2020-11-05', 1, 1, 5, 'Əmək müqaviləsi', 'test', '0000-00-00 00:00:00'),
(15, 8, 77, '2020-11-14', 1, 1, 4, 'Əmək müqaviləsi', 'test', '0000-00-00 00:00:00'),
(16, 8, 87, '2020-11-06', 1, 1, 5, '', '', '0000-00-00 00:00:00'),
(17, 8, 67, '2020-11-09', 1, 1, 5, 'Əmək müqaviləsi', 'test', '0000-00-00 00:00:00'),
(18, 8, 91, '2020-11-09', 1, 1, 5, 'Əmək müqaviləsi', 'test', '0000-00-00 00:00:00'),
(19, 8, 70, '2020-11-28', 2, 2, 12, 'İşçinin ərizəsi', 'test', '0000-00-00 00:00:00'),
(20, 0, 0, '1969-12-31', 0, 0, 0, 'İşçinin ərizəsi', '', '0000-00-00 00:00:00'),
(21, 0, 0, '1969-12-31', 0, 0, 0, 'İşçinin ərizəsi', '', '0000-00-00 00:00:00'),
(22, 8, 70, '2020-11-28', 2, 2, 12, 'İşçinin ərizəsi', 'test', '0000-00-00 00:00:00'),
(23, 8, 80, '2020-11-12', 1, 1, 5, 'Əmək müqaviləsi', 'test', '0000-00-00 00:00:00'),
(24, 0, 0, '1969-12-31', 0, 0, 0, '', '', '0000-00-00 00:00:00'),
(25, 0, 0, '1969-12-31', 0, 0, 0, '', '', '0000-00-00 00:00:00'),
(26, 7, 88, '2020-11-02', 1, 1, 4, 'Əmək müqaviləsi', 'Əmək müqaviləsinə xitam verilərkən işçilərin təminatları', '0000-00-00 00:00:00'),
(27, 8, 81, '2020-11-23', 1, 1, 1, 'Əmək müqaviləsi', 'test', '0000-00-00 00:00:00'),
(28, 7, 0, '1969-12-31', 0, 0, 0, '', '', '0000-00-00 00:00:00'),
(29, 8, 92, '2020-11-25', 1, 1, 1, 'Əmək müqaviləsi', 'test', '0000-00-00 00:00:00'),
(30, 8, 94, '1969-12-31', 0, 0, 0, '', '', '0000-00-00 00:00:00'),
(31, 8, 97, '2020-12-22', 1, 1, 6, 'Əmək müqaviləsi', 'test', '0000-00-00 00:00:00');

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
  `status` int(11) NOT NULL DEFAULT 1,
  `insert_user` int(11) NOT NULL,
  `update_user` int(11) NOT NULL,
  `insert_date` date NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_employee_family_info`
--

INSERT INTO `tbl_employee_family_info` (`id`, `emp_id`, `member_type`, `m_firstname`, `m_lastname`, `m_surname`, `gender`, `birth_date`, `contact_number`, `adress`, `status`, `insert_user`, `update_user`, `insert_date`, `update_date`) VALUES
(10, 52, 1, 'İbad', 'Rəhimov', 'Seyfi', 1, '1965-08-28', '0508880001', 'Baki ş', 0, 69, 0, '0000-00-00', '0000-00-00'),
(11, 0, 2, 'Nailə', 'Rəhimova', 'Seyfu', 2, '1965-08-28', '0508880002', 'Baki ş', 1, 69, 0, '0000-00-00', '0000-00-00'),
(12, 52, 2, 'Nailə', 'Rəhimova', 'Seyfu', 2, '1965-08-28', '0508880002', 'Baki ş', 0, 69, 0, '0000-00-00', '0000-00-00'),
(13, 65, 1, 'İbad', 'Rəhimov', 'Seyfi', 1, '1958-08-22', '0508880002', 'Baki şəhəri Badamdar qəsəbəsi', 0, 69, 0, '0000-00-00', '0000-00-00'),
(14, 0, 2, 'Nailə', 'Rəhimova', 'Seyfu', 2, '1965-08-28', '0502652244', 'Baki şəhəri Badamdar qəsəbəsi', 1, 69, 0, '0000-00-00', '0000-00-00'),
(15, 67, 1, 'İbad', '', '', 0, '1969-12-31', '', '', 1, 69, 0, '0000-00-00', '0000-00-00'),
(16, 65, 1, 'İbad', 'Rəhimov', 'Seyfi', 1, '1958-08-22', '0508880002', 'Baki şəhəri Badamdar qəsəbəsi', 1, 69, 0, '0000-00-00', '0000-00-00'),
(17, 65, 2, 'Nailə', 'Rəhimova', 'Seyfu', 2, '1955-08-22', '0508880001', 'Baki şəhəri Badamdar qəsəbəsi', 1, 69, 0, '0000-00-00', '0000-00-00'),
(18, 60, 1, 'İbad', 'Rəhimov', 'Seyfi', 0, '1969-12-31', '', '', 1, 69, 0, '0000-00-00', '0000-00-00'),
(19, 60, 1, 'İbad', 'Rəhimov', 'Seyfi', 1, '1958-08-22', '0508880002', 'Baki şəhəri Badamdar qəsəbəsi', 1, 69, 0, '0000-00-00', '0000-00-00'),
(20, 61, 1, 'İbad', 'Rəhimov', 'Seyfi', 1, '1958-08-22', '0508880002', 'Baki şəhəri Badamdar qəsəbəsi', 1, 69, 0, '0000-00-00', '0000-00-00'),
(21, 60, 4, 'İbad', 'Rəhimov', 'Seyfi', 1, '2020-10-07', '0508880002', 'Baki şəhəri Badamdar qəsəbəsi', 1, 69, 0, '0000-00-00', '0000-00-00'),
(22, 0, 3, '', '', '', 0, '1969-12-31', '', '', 1, 69, 0, '0000-00-00', '0000-00-00'),
(23, 0, 0, 'Nailə', 'Rəhimova', 'Seyfu', 2, '1965-08-28', '0508880002', 'Baki ş', 1, 69, 0, '0000-00-00', '0000-00-00'),
(24, 60, 3, 'İbad', 'Rəhimova', 'Seyfu', 2, '2020-10-14', '0502652244', 'Baki şəhəri Badamdar qəsəbəsi', 1, 69, 0, '0000-00-00', '0000-00-00'),
(25, 0, 3, 'asd', 'asd', 'Seyfi', 2, '2020-10-07', '0508880002', 'Baki şəhəri Badamdar qəsəbəsi', 1, 69, 0, '0000-00-00', '0000-00-00'),
(26, 72, 2, 'İbad', 'Rəhimova', 'Seyfu', 2, '2020-09-29', '0508880002', 'Baki şəhəri Badamdar qəsəbəsi', 1, 69, 0, '0000-00-00', '0000-00-00'),
(27, 72, 3, 'Nailə', 'Rəhimova', 'Seyfi', 2, '2020-09-28', '0508880002', 'Baki şəhəri Badamdar qəsəbəsi', 1, 69, 0, '0000-00-00', '0000-00-00'),
(28, 66, 1, 'İbad', 'Rəhimova', 'Seyfi', 0, '1958-08-12', '0508880002', 'Baki şəhəri Badamdar qəsəbəsi', 1, 69, 0, '0000-00-00', '0000-00-00'),
(29, 66, 2, 'İbad', 'Rəhimova', 'Seyfu', 1, '2020-09-29', '0508880002', 'Baki şəhəri Badamdar qəsəbəsi', 1, 69, 0, '0000-00-00', '0000-00-00'),
(30, 70, 1, 'İbad', 'Rəhimova', 'Seyfi', 2, '1958-08-05', '0508880002', 'Baki şəhəri Badamdar qəsəbəsi', 1, 69, 0, '0000-00-00', '0000-00-00'),
(31, 71, 1, 'İbad', 'Rəhimova', 'Seyfi', 2, '2020-10-06', '0508880002', 'Baki şəhəri Badamdar qəsəbəsi', 1, 69, 0, '0000-00-00', '0000-00-00'),
(32, 74, 2, 'Nailə', 'Rəhimova', 'Seyfu', 1, '2020-11-02', '0508880002', '', 1, 69, 0, '0000-00-00', '0000-00-00'),
(33, 78, 0, '', '', '', 0, '1969-12-31', '', '', 1, 69, 0, '0000-00-00', '0000-00-00'),
(34, 78, 2, '', '', '', 2, '1969-12-31', '', '', 1, 69, 0, '0000-00-00', '0000-00-00'),
(35, 69, 4, '', '', '', 0, '1969-12-31', '', '', 1, 69, 0, '0000-00-00', '0000-00-00'),
(36, 69, 4, '', '', '', 0, '1969-12-31', '', '', 1, 69, 0, '0000-00-00', '0000-00-00'),
(37, 60, 2, 'İbad', 'asd', 'Seyfi', 1, '2020-11-25', '0502652244', 'Baki şəhəri Badamdar qəsəbəsi', 1, 69, 0, '0000-00-00', '0000-00-00'),
(38, 69, 1, '', '', '', 0, '1969-12-31', '', '', 1, 69, 0, '0000-00-00', '0000-00-00'),
(39, 0, 0, '', '', '', 0, '1969-12-31', '', '', 1, 69, 0, '0000-00-00', '0000-00-00'),
(40, 80, 0, '', '', '', 0, '1969-12-31', '', '', 1, 69, 0, '0000-00-00', '0000-00-00'),
(41, 67, 2, 'İbad', '', '', 0, '1969-12-31', '', '', 1, 69, 0, '0000-00-00', '0000-00-00'),
(42, 76, 0, '', '', '', 0, '1969-12-31', '', '', 1, 69, 0, '0000-00-00', '0000-00-00'),
(43, 0, 0, '', '', '', 0, '1969-12-31', '', '', 1, 69, 0, '0000-00-00', '0000-00-00'),
(44, 94, 1, 'asd', 'asd', 'Ehmed', 1, '2020-11-03', '0503332211', 'Baki şəhəri Badamdar qəsəbəsi', 1, 69, 0, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_inout`
--

CREATE TABLE `tbl_employee_inout` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `action_date` date NOT NULL,
  `action_time` time NOT NULL,
  `action_type` int(11) NOT NULL,
  `insert_date` date NOT NULL,
  `update_date` date NOT NULL,
  `insert_user` int(11) NOT NULL,
  `update_user` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_medical_information`
--

CREATE TABLE `tbl_employee_medical_information` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `medical_app` int(11) NOT NULL,
  `renew_interval` int(11) NOT NULL,
  `last_renew_date` date NOT NULL,
  `physical_deficiency` int(11) NOT NULL,
  `deficiency_desc` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `insert_user` int(11) NOT NULL,
  `update_user` int(11) NOT NULL,
  `insert_date` date NOT NULL,
  `update_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_employee_medical_information`
--

INSERT INTO `tbl_employee_medical_information` (`id`, `emp_id`, `medical_app`, `renew_interval`, `last_renew_date`, `physical_deficiency`, `deficiency_desc`, `insert_user`, `update_user`, `insert_date`, `update_date`, `status`) VALUES
(8, 52, 1, 2, '2020-08-28', 1, 'bilinmir', 0, 0, '2020-08-28', '0000-00-00', 1),
(9, 65, 1, 4, '2020-08-12', 2, '', 0, 0, '2020-10-21', '0000-00-00', 1),
(10, 66, 0, 4, '1969-12-31', 0, '', 0, 0, '2020-11-05', '0000-00-00', 1),
(11, 70, 1, 1, '1969-12-31', 0, '', 0, 0, '2020-11-05', '0000-00-00', 1),
(12, 92, 0, 3, '2020-11-09', 1, 'bilinmir', 0, 0, '2020-11-09', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_military_info`
--

CREATE TABLE `tbl_employee_military_info` (
  `id` int(11) NOT NULL,
  `reg_group` int(11) NOT NULL,
  `reg_category` int(11) NOT NULL,
  `mil_staff` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_overtimes`
--

CREATE TABLE `tbl_employee_overtimes` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `expire_date` date NOT NULL,
  `calc_status` int(11) NOT NULL,
  `overtime_status` int(11) NOT NULL,
  `overtime_period` int(11) NOT NULL,
  `insert_user` int(11) NOT NULL,
  `update_user` int(11) NOT NULL,
  `insert_date` datetime NOT NULL DEFAULT current_timestamp(),
  `update_date` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_employee_overtimes`
--

INSERT INTO `tbl_employee_overtimes` (`id`, `emp_id`, `start_date`, `expire_date`, `calc_status`, `overtime_status`, `overtime_period`, `insert_user`, `update_user`, `insert_date`, `update_date`, `status`) VALUES
(2, 0, '2020-10-07', '2020-10-07', 1, 2, 2, 69, 69, '2020-10-06 18:01:00', '0000-00-00 00:00:00', 1),
(3, 60, '2020-11-17', '2020-11-18', 1, 1, 2, 69, 69, '2020-11-16 14:33:51', '0000-00-00 00:00:00', 0),
(4, 60, '2020-11-18', '2020-11-18', 1, 1, 1, 69, 0, '2020-11-16 14:35:29', '0000-00-00 00:00:00', 1),
(5, 65, '2020-11-17', '2020-11-17', 1, 1, 1, 69, 69, '2020-11-16 16:11:24', '0000-00-00 00:00:00', 1),
(6, 89, '2021-03-09', '2021-03-01', 1, 1, 1, 69, 0, '2021-03-07 21:44:41', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_overtime_list`
--

CREATE TABLE `tbl_employee_overtime_list` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `overtime_reason` int(11) NOT NULL,
  `insert_user` int(11) NOT NULL,
  `update_user` int(11) NOT NULL,
  `insert_date` date NOT NULL,
  `update_date` date NOT NULL,
  `aprove_status` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_permits`
--

CREATE TABLE `tbl_employee_permits` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `permit_status` int(11) NOT NULL DEFAULT 0,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `permit_days` int(11) NOT NULL,
  `calendar_days` int(11) NOT NULL,
  `quota_usage` int(11) NOT NULL,
  `insert_date` date NOT NULL,
  `update_date` date NOT NULL,
  `insert_user` int(11) NOT NULL,
  `update_user` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_position`
--

CREATE TABLE `tbl_employee_position` (
  `id` int(10) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `st_type` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `insert_date` date NOT NULL,
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_prev_positions`
--

CREATE TABLE `tbl_employee_prev_positions` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `prev_employer` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `leave_reason` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `sector` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `insert_user` int(11) NOT NULL,
  `update_user` int(11) NOT NULL,
  `insert_date` int(11) NOT NULL,
  `update_date` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_employee_prev_positions`
--

INSERT INTO `tbl_employee_prev_positions` (`id`, `emp_id`, `prev_employer`, `start_date`, `end_date`, `leave_reason`, `sector`, `insert_user`, `update_user`, `insert_date`, `update_date`, `status`) VALUES
(2, 53, '', '2020-09-23', '2020-08-04', '', '', 0, 0, 2020, 0, 1),
(3, 65, 'Trade MMC', '2018-02-14', '2019-02-14', 'Öz xahişi ilə', 'Satış', 0, 0, 2020, 0, 1),
(4, 67, '', '1969-12-31', '1969-12-31', '', '', 0, 0, 2020, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_schedules`
--

CREATE TABLE `tbl_employee_schedules` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `sch_id` int(11) NOT NULL,
  `tm_type` int(11) NOT NULL,
  `reduce_type` int(11) NOT NULL,
  `reduce_reason` int(11) NOT NULL,
  `reduce_hours` int(11) NOT NULL,
  `insert_date` datetime NOT NULL DEFAULT current_timestamp(),
  `update_date` datetime NOT NULL DEFAULT current_timestamp(),
  `insert_user` int(11) NOT NULL,
  `update_user` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_employee_schedules`
--

INSERT INTO `tbl_employee_schedules` (`id`, `emp_id`, `sch_id`, `tm_type`, `reduce_type`, `reduce_reason`, `reduce_hours`, `insert_date`, `update_date`, `insert_user`, `update_user`, `status`) VALUES
(1, 96, 27, 1, 1, 1, 1, '2021-03-07 20:52:54', '2021-03-07 20:52:54', 69, 0, 1),
(2, 60, 3, 1, 1, 2, 3, '2021-03-15 18:02:34', '2021-03-15 18:02:34', 69, 69, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_skills`
--

CREATE TABLE `tbl_employee_skills` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `skill_name` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `skill_descr` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `skill_status` int(11) NOT NULL DEFAULT 1,
  `insert_user` int(11) NOT NULL,
  `update_user` int(11) NOT NULL,
  `insert_date` date NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_employee_skills`
--

INSERT INTO `tbl_employee_skills` (`id`, `emp_id`, `skill_name`, `skill_descr`, `skill_status`, `insert_user`, `update_user`, `insert_date`, `update_date`) VALUES
(6, 52, 'Bacarır', 'Bacarır da', 1, 0, 0, '2020-08-28', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employye_driver_license`
--

CREATE TABLE `tbl_employye_driver_license` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `lic_seria_number` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `category` int(11) NOT NULL,
  `lic_issuer` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lic_issue_date` date NOT NULL,
  `expire_date` date NOT NULL,
  `insert_user` int(11) NOT NULL,
  `update_user` int(11) NOT NULL,
  `insert_date` date NOT NULL,
  `update_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_employye_driver_license`
--

INSERT INTO `tbl_employye_driver_license` (`id`, `emp_id`, `lic_seria_number`, `category`, `lic_issuer`, `lic_issue_date`, `expire_date`, `insert_user`, `update_user`, `insert_date`, `update_date`, `status`) VALUES
(8, 52, '3424', 4, 'asan3', '2020-08-27', '2030-08-28', 0, 0, '2020-08-28', '0000-00-00', 1),
(9, 65, '3424', 2, 'asan3', '2020-04-23', '2021-01-13', 0, 0, '2020-10-21', '0000-00-00', 1),
(10, 60, 'sdfsdf', 2, 'sdfsdf', '2021-04-06', '2021-04-12', 0, 0, '2021-04-09', '0000-00-00', 0),
(11, 60, 'sdfsd', 7, 'sdfsdf', '2021-04-20', '2021-04-14', 0, 0, '2021-04-09', '0000-00-00', 0),
(12, 60, 'sdfsd', 7, '', '2021-04-26', '1970-01-01', 0, 0, '2021-04-09', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exemptions`
--

CREATE TABLE `tbl_exemptions` (
  `id` int(11) NOT NULL,
  `descr` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `insert_date` date NOT NULL,
  `update_date` date NOT NULL,
  `insert_user` int(11) NOT NULL,
  `update_user` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exist_not_exist`
--

CREATE TABLE `tbl_exist_not_exist` (
  `id` int(11) NOT NULL,
  `exist_id` int(11) NOT NULL,
  `exist_desc` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_exist_not_exist`
--

INSERT INTO `tbl_exist_not_exist` (`id`, `exist_id`, `exist_desc`, `lang`) VALUES
(1, 1, 'Var', 'az'),
(2, 2, 'Yox', 'az');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_family_member_types`
--

CREATE TABLE `tbl_family_member_types` (
  `id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `type_desc` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_family_member_types`
--

INSERT INTO `tbl_family_member_types` (`id`, `type_id`, `type_desc`, `lang`) VALUES
(1, 1, 'Ata', 'az'),
(2, 2, 'Ana', 'az'),
(3, 3, 'Bacı', 'az'),
(4, 4, 'Qardaş', 'az'),
(5, 5, 'Övlad', 'az');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_languages`
--

CREATE TABLE `tbl_languages` (
  `id` int(11) NOT NULL,
  `lang_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_languages`
--

INSERT INTO `tbl_languages` (`id`, `lang_name`) VALUES
(1, 'Azərbaycan dili'),
(2, 'Rus dili'),
(3, 'İngilis dili'),
(4, 'Türk dili');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_language_knowledge`
--

CREATE TABLE `tbl_language_knowledge` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `lang_reading` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `lang_speaking` int(11) NOT NULL,
  `lang_writing` int(11) NOT NULL,
  `lang_understanding` int(11) NOT NULL,
  `lang_status` int(11) NOT NULL DEFAULT 1,
  `insert_date` date NOT NULL,
  `update_date` date NOT NULL,
  `insert_user` int(11) NOT NULL,
  `update_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_language_knowledge`
--

INSERT INTO `tbl_language_knowledge` (`id`, `emp_id`, `lang_id`, `lang_reading`, `lang_speaking`, `lang_writing`, `lang_understanding`, `lang_status`, `insert_date`, `update_date`, `insert_user`, `update_user`) VALUES
(1, 52, 2, '2', 3, 2, 4, 1, '0000-00-00', '0000-00-00', 0, 0),
(2, 52, 3, '', 0, 0, 0, 1, '0000-00-00', '0000-00-00', 0, 0),
(3, 52, 4, '1', 4, 5, 2, 1, '0000-00-00', '0000-00-00', 0, 0),
(4, 53, 1, '1', 3, 2, 4, 1, '0000-00-00', '0000-00-00', 0, 0),
(5, 53, 3, '4', 0, 0, 4, 1, '0000-00-00', '0000-00-00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lang_level`
--

CREATE TABLE `tbl_lang_level` (
  `id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `level_name` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `lang_short_name` varchar(3) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_lang_level`
--

INSERT INTO `tbl_lang_level` (`id`, `level_id`, `level_name`, `lang_short_name`) VALUES
(1, 1, 'Elementary Proficiency', 'eng'),
(2, 2, 'Limited Working Proficiency', 'eng'),
(3, 3, 'Professional Working Proficiency', 'eng'),
(4, 4, 'Full Professional Proficiency', 'eng'),
(5, 5, 'Native or Bilingual Proficiency', 'eng'),
(6, 1, 'Ibtidai biliklər', 'az'),
(7, 2, 'Məhdud iş qabiliyyəti', 'az'),
(8, 3, 'Profisional  işləmə  qabiliyyəti', 'az'),
(9, 4, 'Tam Profisional  işləmə  qabiliyyəti', 'az'),
(10, 5, 'Doğma dil və ya ikinci dil biliyi', 'az');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_marital_status`
--

CREATE TABLE `tbl_marital_status` (
  `id` int(11) NOT NULL,
  `descr` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_marital_status`
--

INSERT INTO `tbl_marital_status` (`id`, `descr`) VALUES
(1, 'Evli'),
(2, 'Subay');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_migration_info`
--

CREATE TABLE `tbl_migration_info` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `trp_seria_number` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `trp_permit_reason` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `trp_permit_date` date NOT NULL,
  `trp_valid_date` date NOT NULL,
  `trp_issuer` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `prp_seria_number` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `prp_permit_date` date NOT NULL,
  `prp_valid_date` date NOT NULL,
  `prp_issuer` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `wp_seria_number` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `wp_permit_date` date NOT NULL,
  `wp_valid_date` date NOT NULL,
  `insert_date` date NOT NULL,
  `update_date` date NOT NULL,
  `insert_user` int(11) NOT NULL,
  `update_user` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_migration_info`
--

INSERT INTO `tbl_migration_info` (`id`, `emp_id`, `trp_seria_number`, `trp_permit_reason`, `trp_permit_date`, `trp_valid_date`, `trp_issuer`, `prp_seria_number`, `prp_permit_date`, `prp_valid_date`, `prp_issuer`, `wp_seria_number`, `wp_permit_date`, `wp_valid_date`, `insert_date`, `update_date`, `insert_user`, `update_user`, `status`) VALUES
(2, 60, 'sdfs', 'sdf', '2020-12-14', '2020-12-14', 'sdf', 'sdf', '2020-12-14', '2020-12-14', 'sdf', 'sdf', '2020-12-14', '2020-12-14', '2020-12-13', '0000-00-00', 0, 0, 0);

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
  `update_user` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='tbl_military_information';

--
-- Dumping data for table `tbl_military_information`
--

INSERT INTO `tbl_military_information` (`id`, `emp_id`, `military_reg_group`, `military_reg_category`, `military_staff`, `military_rank`, `military_specialty_acc`, `military_fitness_service`, `military_registration_service`, `military_registration_date`, `military_general`, `military_special`, `military_no_official`, `military_additional_information`, `military_date_completion`, `insert_date`, `update_date`, `insert_user`, `update_user`, `status`) VALUES
(29, 52, 1, 1, 7, 7, 'tester', 'yararlı', 'Goranboy', '2020-02-05', '123', '', '', '', '1969-12-31', '2020-08-28', '0000-00-00', 0, 0, 1),
(30, 53, 1, 1, 1, 1, '', '', '', '1969-12-31', '', '', '', '', '1969-12-31', '2020-09-07', '0000-00-00', 0, 0, 1),
(31, 65, 2, 1, 6, 5, 'Maxe', 'yararlı', 'Goranboy', '2020-10-07', '123', '', '', '', '2020-10-21', '2020-10-21', '0000-00-00', 0, 0, 1),
(32, 67, 2, 2, 6, 7, 'asdas', 'asda', 'asd', '2020-10-06', 'asdas', 'asd', 'asd', 'asd', '2020-10-06', '2020-10-24', '0000-00-00', 0, 0, 1),
(33, 69, 2, 1, 7, 8, '', '', '', '2020-10-22', '', '', '', '', '1969-12-31', '2020-10-25', '0000-00-00', 0, 0, 1),
(34, 69, 2, 0, 0, 0, '', '', '', '1969-12-31', '', '', '', '', '1969-12-31', '2020-10-25', '0000-00-00', 0, 0, 1),
(35, 70, 2, 1, 7, 8, '', '', '', '1969-12-31', '', '', '', '', '1969-12-31', '2020-10-25', '0000-00-00', 0, 0, 1),
(36, 76, 2, 0, 0, 0, '', '', '', '1969-12-31', '', '', '', '', '1969-12-31', '2020-11-02', '0000-00-00', 0, 0, 1),
(37, 75, 1, 1, 7, 8, '', '', '', '1969-12-31', '', '', '', '', '1969-12-31', '2020-11-02', '0000-00-00', 0, 0, 1),
(38, 73, 1, 1, 2, 2, 'qq', 'qq', 'qq', '2020-11-02', 'qq', 'qq', 'qq', 'qq', '2020-11-29', '2020-11-02', '0000-00-00', 0, 0, 1),
(39, 71, 1, 2, 5, 2, 'rr', 'tt', 'qq', '2020-12-08', 'qq', 'qq', 'qq', 'rr', '2020-10-27', '2020-11-02', '0000-00-00', 0, 0, 1),
(40, 83, 2, 0, 0, 0, '', '', '', '1969-12-31', '', '', '', '', '1969-12-31', '2020-11-05', '0000-00-00', 0, 0, 1),
(41, 76, 2, 2, 0, 8, '', '', '', '1969-12-31', '', '', '', '', '1969-12-31', '2020-11-05', '0000-00-00', 0, 0, 1),
(42, 0, 0, 0, 0, 0, '', '', '', '1969-12-31', '', '', '', '', '1969-12-31', '2020-11-09', '0000-00-00', 0, 0, 1);

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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_modules`
--

CREATE TABLE `tbl_modules` (
  `id` int(11) NOT NULL,
  `module_name` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `module_descr` varchar(300) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_modules`
--

INSERT INTO `tbl_modules` (`id`, `module_name`, `module_descr`) VALUES
(1, 'admin', 'Module for administrative operations'),
(2, 'employees', 'Module  from  operation on  employees');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_month`
--

CREATE TABLE `tbl_month` (
  `id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_month`
--

INSERT INTO `tbl_month` (`id`, `level_id`, `title`, `lang`) VALUES
(1, 1, 'Yanvar', 'az'),
(2, 2, 'Fevral', 'az'),
(3, 3, 'Mart', 'az'),
(4, 4, 'Aprel', 'az'),
(5, 5, 'May', 'az'),
(6, 6, 'İyun', 'az'),
(7, 7, 'İyul', 'az'),
(8, 8, 'Avqust', 'az'),
(9, 9, 'Sentyabr', 'az'),
(10, 10, 'Oktyabr', 'az'),
(11, 11, 'Noyabr', 'az'),
(12, 12, 'Dekabr', 'az');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notes`
--

CREATE TABLE `tbl_notes` (
  `id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `termination_id` int(11) NOT NULL,
  `lang` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_notes`
--

INSERT INTO `tbl_notes` (`id`, `level_id`, `title`, `termination_id`, `lang`) VALUES
(1, 1, 'a) bəndinə əsasən (müəssisə ləğv edildikdə)', 1, 'az'),
(2, 2, 'b) bəndinə əsasən (işçilərin sayı və ya ştatları ixtisar edildikdə)', 1, 'az'),
(3, 3, 'a) bəndinə əsasən (müəssisə ləğv edildikdə)', 1, 'az'),
(4, 4, 'b) bəndinə əsasən (işçilərin sayı və ya ştatları ixtisar edildikdə)', 1, 'az'),
(5, 5, 'c) bəndinə əsasən (peşəkarlıq səviyyəsinin, ixtisasının (peşəsinin) kifayət dərəcədə olmadığına görə işçinin tutduğu vəzifəyə uyğun gəlmədiyi barədə səlahiyyətli orqan tərəfindən müvafiq qərar qəbul edildikdə)', 1, 'az'),
(6, 6, 'ç) bəndinə əsasən ( işçi özünün əmək funksiyasını və ya əmək müqaviləsi üzrə öhdəliklərini yerinə yetirmədikdə)', 1, 'az'),
(7, 7, 'ç) bəndinə əsasən ( AR - nin ƏM  - nin 72-ci maddəsində sadalanan hallarda əmək vəzifələrini kobud şəkildə pozduqda)', 1, 'az'),
(8, 8, 'd) bəndinə əsasən ( sınaq müddəti ərzində işçi özünü doğrultmadıqda)', 1, 'az'),
(9, 9, 'yaşa görə təqaüdə çıxdıqda', 2, 'az'),
(10, 10, 'əlilliyə görə təqaüdə çıxdıqda', 2, 'az'),
(11, 11, 'təhsilini davam etdirmək üçün müvafiq təhsil müəssisəsinə daxil olduqda', 2, 'az'),
(12, 12, 'yeni yaşayış yerinə köçdükdə', 2, 'az'),
(13, 13, 'başqa işəgötürənlə əmək müqaviləsi bağladıqda', 2, 'az'),
(14, 14, 'seksual qısnamaya məruz qaldıqda', 2, 'az'),
(15, 15, 'qanunvericilikdə nəzərdə tutulmuş digər hallarda', 2, 'az'),
(16, 16, 'a) bəndinə əsasən (işçi hərbi və ya alternativ xidmətə çağırıldıqda)', 9, 'az'),
(17, 17, 'b) bəndinə əsasən (əvvəllər müvafiq işdə (vəzifədə) çalışan işçinin işinə (vəzifəsinə) bərpa edilməsi barədə məhkəmənin qanuni qüvvəyə minmiş qətnaməsi (qərarı) olduqda)', 9, 'az'),
(18, 18, 'c) bəndinə əsasən (qanunvericiliklə daha uzun müddət müəyyən edilməyibsə, əmək qabiliyyətinin fasiləsiz olaraq altı aydan çox müddətə tam itirilməsi ilə əlaqədar işçi əmək funksiyasını yerinə yetirə bilmədikdə)', 9, 'az'),
(19, 19, 'ç) bəndinə əsasən (İşçinin nəqliyyat vasitəsini idarəetmə hüququndan məhrum etmə, müəyyən vəzifə tutma və ya müəyyən fəaliyyətlə məşğul olma hüququndan məhrum etmə, müəyyən müddətə azadlıqdan məhrum etmə və ya ömürlük azadlıqdan məhrum etmə cəzasına ', 9, 'az'),
(20, 20, 'd) bəndinə əsasən (məhkəmənin qanuni qüvvəyə minmiş qərarı ilə işçinin fəaliyyət qabiliyyətsizliyi təsdiq edildikdə)', 9, 'az'),
(21, 21, 'e) bəndinə əsasən (işçi vəfat etdikdə)', 9, 'az'),
(22, 22, 'ə) bəndinə əsasən (əvvəllər həmin müəssisədə çalışan işçi müddətli həqiqi hərbi xidmətdən ehtiyata buraxıldıqdan sonra öz iş yerinə (vəzifəsinə) qayıtmaq hüququndan istifadə etdikdə)', 9, 'az'),
(23, 23, 'a) bəndinə əsasən (tərəflərin qarşılıqlı razılığı)', 11, 'az'),
(24, 24, 'b) bəndinə əsasən (səhhəti ilə əlaqədar olaraq işçinin müvafiq vəzifədə (peşədə) çalışması sağlamlığı üçün təhlükəli olduğu barədə səhiyyə müəssisəsinin müvafiq rəyinə görə)', 11, 'az'),
(25, 25, 'c) bəndinə əsasən (əmək funksiyasının müəyyən müddətdə icrası zamanı müvafiq iş yerində peşə xəstəliyinə tutulmanın yüksək ehtimalı olduğu halda)', 11, 'az'),
(26, 23, 'ç) bəndinə əsasən (işin və ya göstərilən xidmətlərin həcminin azalması ilə əlaqədar müəyyən dövr keçdikdən sonra işçi ilə hökmən yenidən əmək müqaviləsi bağlayacağı şərti ilə işəgötürən yazılı formada məcburi öhdəlik götürdükdə)', 11, 'az'),
(27, 24, 'd) bəndinə əsasən (bu maddənin tələblərinə əməl edilməklə tərəflərin müəyyən etdiyi digər hallar)', 11, 'az');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_overtime_approve_reasons`
--

CREATE TABLE `tbl_overtime_approve_reasons` (
  `id` int(11) NOT NULL,
  `reason_id` int(11) NOT NULL,
  `reason_descr` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_overtime_approve_reasons`
--

INSERT INTO `tbl_overtime_approve_reasons` (`id`, `reason_id`, `reason_descr`, `lang`) VALUES
(1, 1, 'Dövlətin müdafiəsinin təmin olunması üçün, habelə təbii fəlakətin, istehsal qəzasının qarşısını almaq və ya onların nəticələrini aradan qaldırmaq üçün yerinə yetirilməsi zəruri olan ən vacib işlərin görülməsinə', 'az'),
(2, 2, 'Su, qaz və elektrik təchizatı, isitmə, kanalizasiya, rabitə və digər kommunal müəssisələrində işlərin, xidmətlərin pozulmasına səbəb olan gözlənilməz hadisələrin nəticələrini aradan qaldırmaq üçün zəruri işlərin görülməsini təmin etmək üçün', 'az'),
(3, 3, 'Başlanmış və istehsalın texniki şəraitinə görə iş gününün sonunadək tamamlana bilməyən işlərin dayandırılması avadanlıqların, əmtəələrin qarşısıalınmaz korlanması, sıradan çıxması təhlükəsi zamanı işlərin tamamlanması zəruriyyəti olduqda', 'az'),
(4, 4, 'İşçilərin əksəriyyətinin işinin dayandırılmasına səbəb olan sıradan çıxmış mexanizmlərin, qurğuların təmiri, bərpası ilə əlaqədar işlərin görülməsi zərurəti olduqda', 'az'),
(5, 5, 'Əvəz edən işçinin işdə olmaması ilə əlaqədar işə fasilə verilməsinə yol vermək mümkün olmadıqda', 'az');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_overtime_calc_status`
--

CREATE TABLE `tbl_overtime_calc_status` (
  `id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `status_desc` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_overtime_calc_status`
--

INSERT INTO `tbl_overtime_calc_status` (`id`, `status_id`, `status_desc`, `lang`) VALUES
(1, 1, 'overtime/off', 'az'),
(2, 2, 'ph overtime', 'az');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_periods`
--

CREATE TABLE `tbl_periods` (
  `id` int(11) NOT NULL,
  `period_id` int(11) NOT NULL,
  `period_desc` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_periods`
--

INSERT INTO `tbl_periods` (`id`, `period_id`, `period_desc`, `lang`) VALUES
(1, 1, 'Aylıq', 'az'),
(2, 2, 'İllik', 'az');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permit_types`
--

CREATE TABLE `tbl_permit_types` (
  `id` int(11) NOT NULL,
  `descr` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `insert_date` date NOT NULL,
  `update_date` date NOT NULL,
  `insert_user` int(11) NOT NULL,
  `update_user` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place_expenditure`
--

CREATE TABLE `tbl_place_expenditure` (
  `id` int(11) NOT NULL,
  `code` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `place_id` int(11) NOT NULL,
  `lang` varchar(11) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_place_expenditure`
--

INSERT INTO `tbl_place_expenditure` (`id`, `code`, `title`, `place_id`, `lang`) VALUES
(1, '0100 ', 'Məsrəf yeri 1\r\n', 1, 'az'),
(2, '0533 ', 'Məsrəf yeri 2', 2, 'az'),
(3, '0200', 'Məsrəf yeri 3', 3, 'az'),
(4, '0400', 'Məsrəf yeri 4', 4, 'az'),
(5, '0277', 'Məsrəf yeri 5', 5, 'az');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_position_level`
--

CREATE TABLE `tbl_position_level` (
  `id` int(11) NOT NULL,
  `posit_id` int(11) NOT NULL,
  `title` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `posit_icon` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang` varchar(11) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_position_level`
--

INSERT INTO `tbl_position_level` (`id`, `posit_id`, `title`, `posit_icon`, `lang`) VALUES
(1, 1, 'İsçi ', 'images/icons/man2.png', 'az'),
(2, 2, 'Rəhbər', 'images/icons/capman3.png', 'az');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_position_status`
--

CREATE TABLE `tbl_position_status` (
  `id` int(11) NOT NULL,
  `position_status_id` int(11) NOT NULL,
  `code` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_position_status`
--

INSERT INTO `tbl_position_status` (`id`, `position_status_id`, `code`, `title`, `lang`) VALUES
(1, 1, '01', 'İdarə Heyəti Sədri', 'az'),
(2, 2, '02', 'İdarə Heyəti Üzvü', 'az'),
(3, 3, '03', 'Direktor', 'az'),
(4, 4, '04', 'Departament Müdiri', 'az'),
(5, 5, '05', 'Şöbə müdiri', 'az'),
(6, 6, '06', 'Bölmə Rəisi', 'az'),
(7, 7, '07', 'Baş mütəxəssis', 'az'),
(8, 8, '08', 'Aparıcı mütəxəssis', 'az'),
(9, 9, '09', 'Mütəxəssis', 'az'),
(10, 10, '10', 'İcraçı mütəxəssis', 'az'),
(11, 11, '11', 'Fəhlə', 'az'),
(12, 12, '12', 'Məsləhətçi', 'az'),
(13, 13, '13', 'Nəzarətçi', 'az');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_priviliges`
--

CREATE TABLE `tbl_priviliges` (
  `id` int(11) NOT NULL,
  `PRIV_NAME` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_priviliges`
--

INSERT INTO `tbl_priviliges` (`id`, `PRIV_NAME`, `status`) VALUES
(1, 'new', 1),
(2, 'update', 1),
(4, 'delete', 1),
(5, 'view', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_qualification_dic`
--

CREATE TABLE `tbl_qualification_dic` (
  `id` int(11) NOT NULL,
  `qualification` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `langid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_qualification_dic`
--

INSERT INTO `tbl_qualification_dic` (`id`, `qualification`, `langid`) VALUES
(1, 'Orta Təhsil', 2),
(2, 'Bakalavr', 2),
(3, 'Magistr', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reward_period`
--

CREATE TABLE `tbl_reward_period` (
  `id` int(11) NOT NULL,
  `code` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `reward_id` int(11) NOT NULL,
  `lang` varchar(11) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_reward_period`
--

INSERT INTO `tbl_reward_period` (`id`, `code`, `title`, `reward_id`, `lang`) VALUES
(1, '1', 'Aylıq', 1, 'az'),
(2, '2', 'Rüblük', 2, 'az'),
(3, '3', 'İllik', 3, 'az');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`id`, `role_name`, `status`, `position`) VALUES
(1, 'Admin', 1, 1),
(2, 'Employee', 1, 1),
(3, 'Manager', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles_pivilges`
--

CREATE TABLE `tbl_roles_pivilges` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `priv_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_salary_info`
--

CREATE TABLE `tbl_salary_info` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `tariff_rate` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `position_status_id` int(11) NOT NULL,
  `wage` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `wage_currency` int(11) NOT NULL,
  `total_monthly_salary` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `prize_amount` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `prize_amount_currency` int(11) NOT NULL,
  `reward_period` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `place_expenditure_id` int(11) NOT NULL,
  `salary_change_reason` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `other_conditions1` text COLLATE utf8_unicode_ci NOT NULL,
  `other_conditions2` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `other_conditions3` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `insert_date` datetime NOT NULL DEFAULT current_timestamp(),
  `update_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_salary_info`
--

INSERT INTO `tbl_salary_info` (`id`, `emp_id`, `company_id`, `tariff_rate`, `position_status_id`, `wage`, `wage_currency`, `total_monthly_salary`, `prize_amount`, `prize_amount_currency`, `reward_period`, `place_expenditure_id`, `salary_change_reason`, `other_conditions1`, `other_conditions2`, `other_conditions3`, `status`, `insert_date`, `update_date`) VALUES
(1, 59, 1, '2', 2, '4444', 0, '5555', '111', 0, '2', 2, 'deyisibdeee', 'fffwweqwe', 'ss', 'sdfdfd', 0, '0000-00-00 00:00:00', '2020-11-16 04:12:05'),
(17, 40, 3, '2', 3, '600', 2, '1000', '600', 1, '2', 4, 'oooo', 'uuuu', 'uuuiii', 'ooo', 0, '0000-00-00 00:00:00', '2020-11-16 04:12:05'),
(18, 41, 2, '2', 6, '900', 1, '9990', '8906', 0, '1', 4, 'bilmirem', 'uuuu', 'www', 'pppp', 0, '0000-00-00 00:00:00', '2020-11-16 04:12:05'),
(19, 39, 3, '7', 5, '700', 2, '1000', '1044', 1, '2', 3, 'oooo', 'aaq', 'ggg', 'ttt', 0, '0000-00-00 00:00:00', '2020-11-16 04:12:05'),
(20, 65, 8, '6', 5, '700', 1, '9990', '650', 1, '1', 5, 'işə qəbul', '', '', '', 0, '0000-00-00 00:00:00', '2020-11-16 04:12:05'),
(21, 39, 2, '1', 7, '704', 2, '2345', '347', 0, '1', 2, 'aasssq', 'qq', 'ww', 'eee', 0, '0000-00-00 00:00:00', '2020-11-16 04:12:05'),
(26, 0, 0, '3', 5, '100', 1, '1000', '1000', 1, '1', 1, 'sdfsdf', 'sdfsdf', 'sdf', 'sdf', 0, '0000-00-00 00:00:00', '2020-11-16 04:12:05'),
(27, 0, 0, '1', 1, '100', 1, '100', '100', 1, '1', 3, 'gghjgh', 'fghjghj', 'fghjgf', 'fghj', 0, '0000-00-00 00:00:00', '2020-11-16 04:12:05'),
(28, 0, 0, '4', 4, '400', 1, '500', '100', 1, '1', 1, 'Test', '', '', '', 0, '0000-00-00 00:00:00', '2020-11-16 04:12:05'),
(29, 0, 0, '5', 8, '5000', 1, '5100', '100', 1, '2', 3, 'test', '', '', '', 0, '0000-00-00 00:00:00', '2020-11-16 04:12:05'),
(30, 0, 0, '3', 7, '400', 1, '400', '100', 1, '1', 4, 'test', '', '', '', 0, '0000-00-00 00:00:00', '2020-11-16 04:12:05'),
(31, 0, 0, '6', 8, '400', 1, '23233', '32', 1, '1', 4, 'test', '', '', '', 0, '0000-00-00 00:00:00', '2020-11-16 04:12:05'),
(32, 61, 5, '5', 8, '9876', 1, '342', '34', 1, '1', 5, 'ds', '', '', '', 0, '0000-00-00 00:00:00', '2020-11-16 04:12:05'),
(33, 65, 8, '5', 5, '1000', 1, '6000', '5000', 1, '1', 5, 'işe qebul', 'Maaş hər ay 2 dəfə ödəniləcək', '', '', 1, '0000-00-00 00:00:00', '2020-11-16 04:12:05'),
(34, 73, 8, '4', 7, '2000', 1, '2500', '500', 1, '3', 5, 'işe qebul', '', '', '', 1, '0000-00-00 00:00:00', '2020-11-16 04:12:05'),
(35, 65, 8, '10', 10, '5000', 1, '5500', '500', 1, '1', 5, 'test5', '', '', '', 1, '0000-00-00 00:00:00', '2020-11-16 04:12:05'),
(36, 66, 8, '4', 6, '1000', 1, '1200', '200', 1, '2', 2, 'test5', '', '', '', 1, '0000-00-00 00:00:00', '2020-11-16 04:12:05'),
(37, 66, 8, '4', 6, '1000', 1, '1200', '200', 1, '2', 2, 'test5', '', '', '', 1, '0000-00-00 00:00:00', '2020-11-16 04:12:05'),
(38, 66, 8, '4', 6, '1000', 1, '1200', '200', 1, '2', 2, 'test5', '', '', '', 1, '0000-00-00 00:00:00', '2020-11-16 04:12:05'),
(39, 65, 8, '5', 7, '20202', 1, '22222', '2020', 1, '2', 2, 'aasddsa', '', '', '', 1, '0000-00-00 00:00:00', '2020-11-16 04:12:05'),
(40, 65, 8, '5', 7, '20202', 1, '22222', '2020', 1, '2', 2, 'aasddsa', '', '', '', 1, '0000-00-00 00:00:00', '2020-11-16 04:12:05'),
(41, 72, 8, '5', 7, '20202', 1, '22222', '2020', 1, '2', 2, 'aasddsa', '', '', '', 1, '0000-00-00 00:00:00', '2020-11-16 04:12:05'),
(42, 72, 8, '5', 7, '20202', 1, '22222', '2020', 1, '2', 2, 'aasddsa', '', '', '', 1, '0000-00-00 00:00:00', '2020-11-16 04:12:05'),
(43, 69, 8, '5', 7, '20202', 1, '22222', '2020', 1, '2', 2, 'aasddsa', '', '', '', 1, '0000-00-00 00:00:00', '2020-11-16 04:12:05'),
(44, 74, 7, '1', 1, '333', 1, '377', '44', 1, '1', 1, 'oooo', 'a1', 'a2', 'a3', 1, '0000-00-00 00:00:00', '2020-11-16 04:12:05'),
(45, 70, 8, '7', 10, '1000', 1, '1500', '500', 1, '2', 3, 'tet', '', '', '', 1, '0000-00-00 00:00:00', '2020-11-16 04:12:05'),
(46, 65, 8, '5', 5, '500', 1, '1000', '500', 1, '3', 5, 'test5', '', '', '', 1, '0000-00-00 00:00:00', '2020-11-16 04:12:05'),
(47, 79, 7, '1', 1, '033', 1, '36', '03', 1, '2', 4, 'yaxsi islemek', '', '', '', 1, '0000-00-00 00:00:00', '2020-11-16 04:12:05'),
(48, 81, 8, '5', 6, '3', 1, '3', '0', 1, '2', 4, 'test', '', '', '', 1, '0000-00-00 00:00:00', '2020-11-16 04:12:05'),
(49, 82, 8, '4', 6, '123', 1, '143', '20', 1, '2', 4, 'işe qebul', '', '', '', 1, '0000-00-00 00:00:00', '2020-11-16 04:12:05'),
(50, 81, 8, '5', 6, '234', 1, '558', '324', 1, '2', 3, 'işe qebul', '', '', '', 1, '0000-00-00 00:00:00', '2020-11-16 04:12:05'),
(51, 87, 8, '6', 9, '2500', 1, '2800', '300', 1, '2', 5, 'işe qebul', '', '', '', 1, '0000-00-00 00:00:00', '2020-11-16 04:12:05'),
(52, 80, 8, '3', 0, '0', 1, '0', '0', 0, '', 0, '', '', '', '', 1, '0000-00-00 00:00:00', '2020-11-16 04:12:05'),
(53, 90, 8, '3', 7, '888', 1, '1110', '222', 1, '1', 5, '', '', '', '', 1, '0000-00-00 00:00:00', '2020-11-16 04:12:05'),
(54, 60, 5, '1', 2, '025', 1, '28', '03', 1, '2', 3, '', '', '', '', 1, '0000-00-00 00:00:00', '2020-11-16 04:12:05'),
(55, 91, 8, '3', 5, '500', 1, '1300', '800', 1, '2', 3, '', '', '', '', 1, '0000-00-00 00:00:00', '2020-11-16 04:12:05'),
(56, 78, 8, '4', 8, '0', 1, '0', '0', 0, '', 0, '', '', '', '', 1, '0000-00-00 00:00:00', '2020-11-16 04:12:05'),
(57, 92, 8, '7', 9, '123', 1, '444', '321', 1, '3', 4, '', '', '', '', 1, '0000-00-00 00:00:00', '2020-11-16 04:12:05'),
(58, 94, 8, '5', 6, '333', 1, '444', '111', 1, '1', 5, '', '', '', '', 1, '2020-11-21 15:31:06', '2020-11-21 15:31:06'),
(59, 103, 8, '5', 6, '251', 1, '351', '100', 1, '2', 3, '', '', '', '', 1, '2020-12-12 15:28:29', '2020-12-12 15:28:29'),
(60, 106, 0, '6', 6, '1000', 1, '1500', '500', 1, '2', 5, '', '', '', '', 1, '2020-12-20 13:51:10', '2020-12-20 13:51:10'),
(61, 108, 8, '2', 3, '037', 1, '40', '03', 1, '1', 2, '', 'yyyy', 'ww', 'eee', 1, '2020-12-22 08:53:57', '2020-12-22 08:53:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schedules`
--

CREATE TABLE `tbl_schedules` (
  `id` int(11) NOT NULL,
  `sch_name` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `sch_code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `company_id` int(11) NOT NULL,
  `start_date` date DEFAULT NULL,
  `expire_date` date NOT NULL,
  `sch_type` int(11) NOT NULL,
  `night_time` int(11) NOT NULL,
  `insert_user` int(11) NOT NULL,
  `update_user` int(11) NOT NULL,
  `insert_date` date DEFAULT NULL,
  `update_date` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_schedules`
--

INSERT INTO `tbl_schedules` (`id`, `sch_name`, `sch_code`, `company_id`, `start_date`, `expire_date`, `sch_type`, `night_time`, `insert_user`, `update_user`, `insert_date`, `update_date`, `status`) VALUES
(2, 'Test  Qrafik', 'HL9860', 8, '2020-07-12', '2020-07-20', 1, 2, 1, 69, '2020-07-19', 0, 1),
(3, 'Test  Qrafik2', 'DF5517', 5, '2020-07-19', '2020-07-13', 2, 1, 1, 69, '2020-07-19', 0, 1),
(4, 'Dep1 Qrafik', 'ZA7977', 4, '2020-07-08', '2020-07-31', 2, 1, 1, 1, '2020-07-19', 0, 1),
(5, 'Test  Qrafik2', 'BH9197', 4, '2020-07-19', '2020-07-19', 1, 1, 1, 0, '2020-07-19', 0, 1),
(6, 'Test  Qrafik3', 'IM9820', 3, '2020-07-20', '2020-07-20', 2, 2, 1, 1, '2020-07-20', 0, 1),
(7, '', 'EK5602', 4, '1970-01-01', '1970-01-01', 0, 0, 1, 0, '2020-08-14', 0, 0),
(8, '', 'CT8456', 4, '1970-01-01', '1970-01-01', 0, 0, 1, 0, '2020-08-14', 0, 0),
(9, '', 'YQ4102', 4, '1970-01-01', '1970-01-01', 0, 0, 1, 0, '2020-08-15', 0, 0),
(10, 'AA qrafik', 'MP6317', 4, '1970-01-01', '1970-01-01', 1, 1, 1, 1, '2020-08-15', 0, 1),
(11, 'Normal Qrafik2', 'GY3597', 4, '2020-08-19', '2020-08-20', 1, 2, 1, 1, '2020-08-15', 0, 1),
(12, '', 'OI4762', 1, '1970-01-01', '1970-01-01', 0, 0, 1, 0, '2020-09-27', 0, 0),
(13, '', 'SX1462', 1, '1970-01-01', '1970-01-01', 0, 0, 1, 0, '2020-09-27', 0, 0),
(14, '', 'FR8055', 1, '1970-01-01', '1970-01-01', 0, 0, 1, 0, '2020-09-27', 0, 0),
(15, '', 'JE6415', 1, '1970-01-01', '1970-01-01', 0, 0, 1, 0, '2020-09-27', 0, 0),
(16, '', 'ST3923', 1, '1970-01-01', '1970-01-01', 0, 0, 1, 0, '2020-09-27', 0, 0),
(17, '', 'AS8681', 1, '1970-01-01', '1970-01-01', 0, 0, 1, 0, '2020-09-27', 0, 0),
(18, '', 'LG5486', 0, '1970-01-01', '1970-01-01', 0, 0, 1, 0, '2020-10-26', 0, 0),
(19, 'mmmmmmmmmmm', 'TU2876', 1, '1970-01-01', '1970-01-01', 0, 0, 1, 1, '2020-10-27', 0, 0),
(20, '', 'MU9353', 0, '1970-01-01', '1970-01-01', 0, 0, 1, 0, '2020-10-29', 0, 0),
(21, '', 'IJ3537', 0, '1970-01-01', '1970-01-01', 0, 0, 1, 0, '2020-11-09', 0, 0),
(22, 'XXXYYYY', 'YF9661', 4, '2020-11-09', '2020-11-28', 1, 1, 1, 0, '2020-11-09', 0, 1),
(23, 'df', 'FC2821', 1, '2020-11-20', '2020-11-13', 1, 1, 1, 0, '2020-11-09', 0, 0),
(24, 'ssda', 'JU6935', 1, '2020-11-11', '2020-11-12', 1, 1, 1, 0, '2020-11-09', 0, 0),
(25, 'sdfgsdfsdf', 'WY9956', 3, '2020-11-09', '2020-11-30', 2, 1, 1, 1, '2020-11-09', 0, 1),
(26, 'ssda', 'RN4843', 1, '2020-11-12', '2020-11-12', 1, 1, 1, 0, '2020-11-11', 0, 0),
(27, 'ofis 2', 'VO2681', 7, '2020-11-01', '2020-11-30', 1, 2, 69, 0, NULL, 0, 1),
(28, 'Ofis3', 'JM1772', 8, '2020-11-17', '2020-11-17', 1, 1, 69, 0, NULL, 0, 1),
(29, 'ofis 3', 'AD7652', 8, '2020-11-21', '2020-12-10', 1, 2, 69, 0, NULL, 0, 1),
(30, 'ofis 4', 'GK5307', 8, '2020-11-01', '2020-12-11', 1, 2, 69, 0, NULL, 0, 1),
(31, 'sdfdssss', 'BT3227', 5, '2021-01-21', '2021-02-04', 1, 1, 69, 69, NULL, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schedules_additional`
--

CREATE TABLE `tbl_schedules_additional` (
  `id` int(11) NOT NULL,
  `schid` int(11) NOT NULL,
  `start_time_1` time NOT NULL,
  `start_time_2` time NOT NULL,
  `start_time_3` time NOT NULL,
  `start_time_4` time NOT NULL,
  `start_time_5` time NOT NULL,
  `start_time_6` time NOT NULL,
  `start_time_7` time NOT NULL,
  `end_time_1` time NOT NULL,
  `end_time_2` time NOT NULL,
  `end_time_3` time NOT NULL,
  `end_time_4` time NOT NULL,
  `end_time_5` time NOT NULL,
  `end_time_6` time NOT NULL,
  `end_time_7` time NOT NULL,
  `breake_start_time_1` time NOT NULL,
  `breake_start_time_2` time NOT NULL,
  `breake_start_time_3` time NOT NULL,
  `breake_start_time_4` time NOT NULL,
  `breake_start_time_5` time NOT NULL,
  `breake_start_time_6` time NOT NULL,
  `breake_start_time_7` time NOT NULL,
  `breake_end_time_1` time NOT NULL,
  `breake_end_time_2` time NOT NULL,
  `breake_end_time_3` time NOT NULL,
  `breake_end_time_4` time NOT NULL,
  `breake_end_time_5` time NOT NULL,
  `breake_end_time_6` time NOT NULL,
  `breake_end_time_7` time NOT NULL,
  `dinner_start_time_1` time NOT NULL,
  `dinner_start_time_2` time NOT NULL,
  `dinner_start_time_3` time NOT NULL,
  `dinner_start_time_4` time NOT NULL,
  `dinner_start_time_5` time NOT NULL,
  `dinner_start_time_6` time NOT NULL,
  `dinner_start_time_7` time NOT NULL,
  `dinner_end_time_1` time NOT NULL,
  `dinner_end_time_2` time NOT NULL,
  `dinner_end_time_3` time NOT NULL,
  `dinner_end_time_4` time NOT NULL,
  `dinner_end_time_5` time NOT NULL,
  `dinner_end_time_6` time NOT NULL,
  `dinner_end_time_7` time NOT NULL,
  `work_day_status_1` int(11) NOT NULL,
  `work_day_status_2` int(11) NOT NULL,
  `work_day_status_3` int(11) NOT NULL,
  `work_day_status_4` int(11) NOT NULL,
  `work_day_status_5` int(11) NOT NULL,
  `work_day_status_6` int(11) NOT NULL,
  `work_day_status_7` int(11) NOT NULL,
  `insert_date` datetime NOT NULL DEFAULT current_timestamp(),
  `update_date` datetime NOT NULL,
  `insert_user` int(11) NOT NULL,
  `update_user` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_schedules_additional`
--

INSERT INTO `tbl_schedules_additional` (`id`, `schid`, `start_time_1`, `start_time_2`, `start_time_3`, `start_time_4`, `start_time_5`, `start_time_6`, `start_time_7`, `end_time_1`, `end_time_2`, `end_time_3`, `end_time_4`, `end_time_5`, `end_time_6`, `end_time_7`, `breake_start_time_1`, `breake_start_time_2`, `breake_start_time_3`, `breake_start_time_4`, `breake_start_time_5`, `breake_start_time_6`, `breake_start_time_7`, `breake_end_time_1`, `breake_end_time_2`, `breake_end_time_3`, `breake_end_time_4`, `breake_end_time_5`, `breake_end_time_6`, `breake_end_time_7`, `dinner_start_time_1`, `dinner_start_time_2`, `dinner_start_time_3`, `dinner_start_time_4`, `dinner_start_time_5`, `dinner_start_time_6`, `dinner_start_time_7`, `dinner_end_time_1`, `dinner_end_time_2`, `dinner_end_time_3`, `dinner_end_time_4`, `dinner_end_time_5`, `dinner_end_time_6`, `dinner_end_time_7`, `work_day_status_1`, `work_day_status_2`, `work_day_status_3`, `work_day_status_4`, `work_day_status_5`, `work_day_status_6`, `work_day_status_7`, `insert_date`, `update_date`, `insert_user`, `update_user`, `status`) VALUES
(25, 2, '01:51:00', '01:51:00', '01:51:00', '01:51:00', '01:51:00', '01:51:00', '01:51:00', '01:51:00', '01:51:00', '01:51:00', '01:51:00', '01:51:00', '01:51:00', '01:51:00', '01:51:00', '01:51:00', '01:51:00', '01:51:00', '01:51:00', '01:51:00', '01:51:00', '01:51:00', '01:51:00', '01:51:00', '01:51:00', '01:51:00', '01:51:00', '01:51:00', '01:51:00', '01:51:00', '01:51:00', '01:51:00', '01:51:00', '01:51:00', '01:51:00', '01:51:00', '01:51:00', '01:51:00', '01:51:00', '01:51:00', '01:51:00', '01:51:00', 0, 0, 0, 0, 1, 1, 0, '2020-11-15 01:51:44', '0000-00-00 00:00:00', 1, 69, 1),
(27, 6, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '03:35:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '23:55:00', 0, 0, 1, 1, 1, 0, 0, '2020-11-15 03:22:32', '0000-00-00 00:00:00', 1, 0, 1),
(28, 3, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 1, 1, 0, 0, 0, 0, '2020-11-14 18:11:51', '0000-00-00 00:00:00', 69, 69, 1),
(29, 27, '09:00:00', '09:00:00', '09:00:00', '09:00:00', '09:00:00', '00:00:00', '00:00:00', '18:00:00', '18:00:00', '18:00:00', '18:00:00', '18:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '13:00:00', '13:00:00', '13:00:00', '13:00:00', '13:00:00', '00:00:00', '00:00:00', '14:00:00', '14:00:00', '14:00:00', '14:00:00', '14:00:00', '00:00:00', '00:00:00', 1, 1, 1, 1, 1, 0, 0, '2020-11-16 06:45:04', '0000-00-00 00:00:00', 69, 69, 1),
(30, 28, '00:27:00', '00:27:00', '00:27:00', '00:27:00', '00:00:00', '00:00:00', '00:00:00', '00:27:00', '00:27:00', '00:27:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:27:00', '00:27:00', '00:27:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:27:00', '00:27:00', '00:27:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:27:00', '00:27:00', '00:27:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:27:00', '00:27:00', '00:27:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 0, 0, 0, 0, 0, 1, '2020-11-16 14:27:45', '0000-00-00 00:00:00', 69, 0, 1),
(31, 30, '13:54:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '13:54:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '13:54:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '13:54:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '13:54:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 1, 1, 1, 1, 0, 0, '2020-11-21 03:55:09', '0000-00-00 00:00:00', 69, 0, 1),
(32, 31, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 1, 0, 1, 1, 0, 0, '2021-01-22 00:55:52', '0000-00-00 00:00:00', 69, 69, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sch_reduce_from`
--

CREATE TABLE `tbl_sch_reduce_from` (
  `id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `type_descr` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_sch_reduce_from`
--

INSERT INTO `tbl_sch_reduce_from` (`id`, `type_id`, `type_descr`, `lang`) VALUES
(1, 1, 'Girişdən', 'az'),
(2, 2, 'Çıxışdan', 'az');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sch_reduce_reason`
--

CREATE TABLE `tbl_sch_reduce_reason` (
  `id` int(11) NOT NULL,
  `reason_id` int(11) NOT NULL,
  `res_desc` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_sch_reduce_reason`
--

INSERT INTO `tbl_sch_reduce_reason` (`id`, `reason_id`, `res_desc`, `lang`) VALUES
(1, 1, ' 1 və ya 2 ci qrup əlil olduğu üçün', 'az'),
(2, 2, 'Hamilə və ya yaşyarımadək uşağı olan qadın olduğu üçün', 'az'),
(3, 3, '3 yaşınadək uşağı təkbaşına böyüdən valideyn olduğu üçün', 'az');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sch_schtype`
--

CREATE TABLE `tbl_sch_schtype` (
  `id` int(11) NOT NULL,
  `sch_type_id` int(11) NOT NULL,
  `sch_type_desc` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_sch_schtype`
--

INSERT INTO `tbl_sch_schtype` (`id`, `sch_type_id`, `sch_type_desc`, `lang`) VALUES
(1, 1, 'Office', 'az'),
(2, 2, 'Shift', 'az');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sch_time_managment_type`
--

CREATE TABLE `tbl_sch_time_managment_type` (
  `id` int(11) NOT NULL,
  `tm_id` int(11) NOT NULL,
  `tm_descr` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_sch_time_managment_type`
--

INSERT INTO `tbl_sch_time_managment_type` (`id`, `tm_id`, `tm_descr`, `lang`) VALUES
(1, 1, 'Positive', 'az'),
(2, 2, 'Manuel', 'az');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sex`
--

CREATE TABLE `tbl_sex` (
  `id` int(11) NOT NULL,
  `descr` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_sex`
--

INSERT INTO `tbl_sex` (`id`, `descr`) VALUES
(1, 'Kişi'),
(2, 'Qadın');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_site_languages`
--

CREATE TABLE `tbl_site_languages` (
  `id` int(11) NOT NULL,
  `short_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lang_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `image_path` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_site_languages`
--

INSERT INTO `tbl_site_languages` (`id`, `short_name`, `lang_code`, `status`, `image_path`, `position`) VALUES
(1, 'geo', 'geodil', 1, 'dist/img/geo.png', 5),
(2, 'az', 'azdil', 1, 'dist/img/az.png', 1),
(3, 'tr', 'trdil', 1, 'dist/img/tr.png', 2),
(4, 'rus', 'rusdil', 1, 'dist/img/rus.png', 3),
(5, 'eng', 'engdil', 1, 'dist/img/uk.png', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_structure_level`
--

CREATE TABLE `tbl_structure_level` (
  `id` int(11) NOT NULL,
  `struc_id` int(11) NOT NULL,
  `title` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang` varchar(11) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_structure_level`
--

INSERT INTO `tbl_structure_level` (`id`, `struc_id`, `title`, `lang`) VALUES
(1, 1, 'Müəssisə', 'az'),
(2, 2, 'Direktorluq', 'az'),
(3, 3, 'Departament', 'az'),
(4, 4, 'Şöbə', 'az'),
(5, 5, 'Sahə / Bölmə', 'az');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_structure_positions`
--

CREATE TABLE `tbl_structure_positions` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `emp_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `struc_id` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `posit_code` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `percent` int(11) DEFAULT NULL,
  `icon` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_structure_positions`
--

INSERT INTO `tbl_structure_positions` (`id`, `role_id`, `emp_id`, `company_id`, `struc_id`, `posit_code`, `percent`, `icon`, `start_date`, `end_date`) VALUES
(1, 1, 70, 8, '', 'P00000023', 100, NULL, '1900-01-01', '9999-12-31'),
(2, 1, 74, 7, '', 'P00000031', 100, NULL, '1900-01-01', '9999-12-31'),
(3, 2, 90, 8, '', 'P00000015', 100, NULL, '1900-01-01', '9999-12-31'),
(4, 0, 0, 0, '', '', 100, NULL, '1969-12-31', '1969-12-31'),
(5, 2, 71, 7, '', 'P00000033', 100, NULL, '1900-01-01', '9999-12-31'),
(6, 1, 53, 5, '', 'P00000001', 100, NULL, '1900-01-01', '9999-12-31'),
(7, 3, 68, 8, '', 'P00000015', 100, NULL, '1900-01-01', '9999-12-31'),
(8, 3, 88, 7, '', 'P00000033', 100, NULL, '1900-01-01', '9999-12-31'),
(9, 4, 89, 7, '', 'P00000039', 100, NULL, '1900-01-01', '9999-12-31'),
(10, 4, 58, 5, '', 'P00000002', 100, NULL, '1900-01-01', '9999-12-31'),
(11, 3, 61, 5, '', 'P00000003', 100, NULL, '1900-01-01', '9999-12-31'),
(12, 4, 106, 8, '', 'P00000048', 100, NULL, '2020-12-20', '9999-12-31'),
(13, 1, 69, 8, '15', 'P00000015', 100, NULL, '1900-01-01', '9999-12-31'),
(14, 1, 65, 8, '20', 'P00000005', 100, NULL, '2020-10-01', '9999-12-31'),
(15, 2, 110, 8, '16', 'P00000015', 100, NULL, '1900-01-01', '9999-12-31'),
(16, 0, 0, 0, 'undefined', '2020-10-01', 100, NULL, '2020-10-01', '9999-12-31'),
(17, 3, 94, 8, '16', 'P00000017', 100, NULL, '1900-01-01', '9999-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_structure_roles`
--

CREATE TABLE `tbl_structure_roles` (
  `id` int(11) NOT NULL,
  `role` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `struc_id` int(11) NOT NULL,
  `lang` varchar(11) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_structure_roles`
--

INSERT INTO `tbl_structure_roles` (`id`, `role`, `struc_id`, `lang`) VALUES
(1, 'İnsan resursları təmsilçisi', 1, 'az'),
(2, 'Baş mühasib', 2, 'az'),
(3, 'Birbaşa rəhbər', 3, 'az'),
(4, 'İkinci rəhbər', 4, 'az');

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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_terms_employment_contract`
--

CREATE TABLE `tbl_terms_employment_contract` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `indefinite` int(11) NOT NULL,
  `reasons_temporary_closure` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `date_contract` date NOT NULL,
  `probation` int(11) NOT NULL,
  `probation_dates` int(11) NOT NULL,
  `trial_expiration_date` date NOT NULL,
  `employee_start_date` date NOT NULL,
  `date_conclusion_contract` date NOT NULL,
  `regulation_property_relations` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `termination_cases` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `other_condition_wages` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `workplace_status` int(11) NOT NULL,
  `working_conditions` int(11) NOT NULL,
  `job_description` text COLLATE utf8_unicode_ci NOT NULL,
  `kvota` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `lang` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `insert_date` date NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_terms_employment_contract`
--

INSERT INTO `tbl_terms_employment_contract` (`id`, `emp_id`, `company_id`, `indefinite`, `reasons_temporary_closure`, `date_contract`, `probation`, `probation_dates`, `trial_expiration_date`, `employee_start_date`, `date_conclusion_contract`, `regulation_property_relations`, `termination_cases`, `other_condition_wages`, `workplace_status`, `working_conditions`, `job_description`, `kvota`, `status`, `lang`, `insert_date`, `update_date`) VALUES
(1, 46, 0, 1, 'aa', '2020-09-01', 0, 0, '2020-09-02', '2020-09-03', '2020-09-04', 'cc', 'dd', 'ee', 1, 2, 'rrr', 'ttt', 1, 'az', '2020-09-14', '2020-09-15'),
(2, 39, 0, 0, '', '1970-01-01', 1, 0, '2020-09-02', '2020-09-23', '1970-01-01', 'dfsdf', 'dsfsdfsdf', '', 1, 1, '', 'gdfgdfgdf', 1, '', '2020-09-15', '0000-00-00'),
(3, 39, 0, 2, 'aAas', '2020-09-08', 1, 0, '2020-09-15', '2020-09-15', '2020-09-15', 'dfsdf', 'dsfsdfsdf', 'dfdsfsdfs', 1, 1, 'fdf', 'gdfgdfgdf', 1, '', '2020-09-15', '0000-00-00'),
(5, 74, 0, 2, 'aAas', '2020-10-08', 1, 0, '2020-09-28', '2020-09-27', '2020-10-30', 'dfsdf', 'dsfsdfsdf', 'dfdsfsdfs', 2, 2, 'fdf', 'gdfgdfgdf', 1, '', '2020-10-07', '0000-00-00'),
(6, 38, 2, 1, 'aAas', '1970-01-01', 0, 0, '1970-01-01', '1970-01-01', '1970-01-01', '', '', '', 0, 0, '', '', 1, '', '2020-10-07', '0000-00-00'),
(7, 46, 1, 1, 'sss', '2020-09-27', 3, 0, '2020-10-08', '2020-10-02', '2020-10-29', 'wwww', 'eeeee', 'tttt', 1, 1, 'yyyy', 'uuuuuu', 1, '', '2020-10-07', '0000-00-00'),
(8, 65, 8, 1, '', '1969-12-31', 3, 0, '2020-12-17', '2020-10-01', '2020-10-01', 'Avtomobilini istifade edecektir', 'Pensiya yasi catanda isine son verilecek', 'əmək haqqı saatlıq ödenir', 1, 1, '- İR idarə olunması üzrə ədalətli siyasət və sistemin işləyib hazırlamaq; - Qanunvericiliyə və qabaqcıl beynəlxalq təcrübəyə uyğun olaraq əmək münasibətlərini idarə etmək; - Bankın işəgötürən qismində təqdimatının təkmilləşdirilməsində işlər görmək; - Tədris, inkişaf və ardıcıl planlaşdırma imkanlar', '', 1, '', '2020-10-21', '0000-00-00'),
(9, 65, 8, 1, '', '1969-12-31', 3, 0, '2021-01-13', '2020-10-01', '2020-10-01', '', '', '', 0, 0, '', '', 1, '', '2020-10-21', '0000-00-00'),
(10, 65, 8, 1, '', '1969-12-31', 0, 0, '1969-12-31', '1969-12-31', '1969-12-31', '', '', '', 0, 0, '', '', 1, '', '2020-10-22', '0000-00-00'),
(11, 66, 8, 1, 'aAas', '2020-09-29', 2, 0, '2020-09-30', '2020-09-28', '2020-10-07', 'fghfh', 'fghfg', 'ghfgh', 1, 1, 'fdf', 'gdfgdfgdf', 1, '', '2020-10-22', '0000-00-00'),
(12, 60, 5, 1, '', '1969-12-31', 0, 0, '1969-12-31', '1969-12-31', '1969-12-31', '', '', '', 0, 0, '', '', 1, '', '2020-10-24', '0000-00-00'),
(13, 60, 5, 1, 'asd', '2020-10-24', 3, 1, '2020-10-24', '2020-10-24', '2020-10-24', 'adsd', 'asd', 'asd', 1, 1, 'asdas', 'asda', 1, '', '2020-10-24', '0000-00-00'),
(14, 67, 8, 1, '', '1969-12-31', 0, 0, '1969-12-31', '1969-12-31', '1969-12-31', '', '', '', 0, 0, '', '', 1, '', '2020-10-25', '0000-00-00'),
(15, 67, 8, 2, 'rty', '2020-09-30', 5, 1, '2020-10-20', '2020-10-13', '2020-10-21', 'rty', 'rty', 'rty', 2, 3, 'rty', 'rty', 1, '', '2020-10-25', '0000-00-00'),
(16, 69, 8, 1, '', '1969-12-31', 0, 1, '2020-10-19', '1969-12-31', '1969-12-31', '', '', '', 0, 0, '', '', 1, '', '2020-10-25', '0000-00-00'),
(17, 69, 8, 1, 'test', '2020-10-05', 0, 1, '2020-10-05', '2020-10-21', '2020-10-29', 'Avtomobilini istifade edecektir', 'Pensiya yasi catanda isine son verilecek', 'əmək haqqı saatlıq ödenir', 2, 2, '- İR idarə olunması üzrə ədalətli siyasət və sistemin işləyib hazırlamaq; - Qanunvericiliyə və qabaqcıl beynəlxalq təcrübəyə uyğun olaraq əmək münasibətlərini idarə etmək; - Bankın işəgötürən qismində təqdimatının təkmilləşdirilməsində işlər görmək; - Tədris, inkişaf və ardıcıl planlaşdırma imkanlar', 'yox', 1, '', '2020-10-25', '0000-00-00'),
(18, 73, 8, 2, 'mövsumluk', '2020-10-27', 1, 2, '2020-10-27', '2020-10-26', '2020-10-26', 'Avtomobilini istifade edecektir', 'Pensiya yasi catanda isine son verilecek', 'əmək haqqı saatlıq ödenir', 1, 2, '- İR idarə olunması üzrə ədalətli siyasət və sistemin işləyib hazırlamaq; - Qanunvericiliyə və qabaqcıl beynəlxalq təcrübəyə uyğun olaraq əmək münasibətlərini idarə etmək; - Bankın işəgötürən qismində təqdimatının təkmilləşdirilməsində işlər görmək; - Tədris, inkişaf və ardıcıl planlaşdırma imkanlar', 'yox', 1, '', '2020-10-25', '0000-00-00'),
(19, 79, 7, 1, '', '1969-12-31', 1, 1, '2020-12-01', '2020-11-10', '2020-11-04', 'wwww', 'dsfsdfsdf', 'dfdsfsdfs', 1, 2, 'fdf', 'gdfgdfgdf', 1, '', '2020-11-01', '0000-00-00'),
(20, 78, 8, 1, '', '1969-12-31', 2, 1, '2020-11-02', '2020-11-02', '2020-11-02', 'Avtomobilini istifade edecektir', 'Pensiya yasi catanda isine son verilecek', 'əmək haqqı saatlıq ödenir', 1, 1, '- İR idarə olunması üzrə ədalətli siyasət və sistemin işləyib hazırlamaq; - Qanunvericiliyə və qabaqcıl beynəlxalq təcrübəyə uyğun olaraq əmək münasibətlərini idarə etmək; - Bankın işəgötürən qismində təqdimatının təkmilləşdirilməsində işlər görmək; - Tədris, inkişaf və ardıcıl planlaşdırma imkanlar', 'yox', 1, '', '2020-11-02', '0000-00-00'),
(21, 71, 7, 1, '', '1969-12-31', 1, 1, '2020-11-03', '2020-11-03', '2020-11-04', 'wwww', 'eeeee', 'dfdsfsdfs', 1, 2, 'fdf', 'gdfgdfgdf', 1, '', '2020-11-02', '0000-00-00'),
(22, 82, 8, 1, '', '1969-12-31', 3, 1, '2020-11-02', '2020-11-03', '2020-11-03', 'Avtomobilini istifade edecektir', 'Pensiya yasi catanda isine son verilecek', 'əmək haqqı saatlıq ödenir', 1, 1, '- İR idarə olunması üzrə ədalətli siyasət və sistemin işləyib hazırlamaq; - Qanunvericiliyə və qabaqcıl beynəlxalq təcrübəyə uyğun olaraq əmək münasibətlərini idarə etmək; - Bankın işəgötürən qismində təqdimatının təkmilləşdirilməsində işlər görmək; - Tədris, inkişaf və ardıcıl planlaşdırma imkanlar', 'yox', 1, '', '2020-11-02', '0000-00-00'),
(23, 87, 8, 2, 'mövsumluk', '2021-11-04', 3, 2, '2020-12-04', '2020-11-05', '2020-11-05', 'Avtomobilini istifade edecektir', 'Pensiya yasi catanda isine son verilecek', 'əmək haqqı saatlıq ödenir', 2, 2, ' Telimata esasen tapşırılan obyektin müeyyen olunmuş vaxt çerçivesinde mühafizesinin teşkili,  Vezife yerini istisna hallar xaric terk etmemek,  Hadiselere qarşı diqqetli davranmaq,  Baş veren hadise barede üst rehberi mütemadi olaraq melumatlandırmaq,  Obyekti periodik olaraq olaraq gezerek, g', 'yox', 1, '', '2020-11-03', '0000-00-00'),
(24, 87, 8, 2, '', '1969-12-31', 0, 0, '1969-12-31', '2020-11-06', '1969-12-31', '', '', '', 0, 0, '', '', 1, '', '2020-11-05', '0000-00-00'),
(25, 92, 8, 1, '', '1969-12-31', 8, 2, '1969-12-31', '1969-12-31', '1969-12-31', 'avtomobil', 'diger hallara da baxilacaq', 'ayda 3 defe maas', 1, 1, 'vezife telimati bura yazilacaqvezife telimati bura yazilacaqvezife telimati bura yazilacaqvezife telimati bura yazilacaqvezife telimati bura yazilacaqvezife telimati bura yazilacaqvezife telimati bura yazilacaqvezife telimati bura yazilacaqvezife telimati bura yazilacaqvezife telimati bura yazilacaq', 'kvotalidir', 1, '', '2020-11-09', '2020-11-09'),
(26, 89, 7, 1, '', '1969-12-31', 1, 1, '2020-11-03', '2020-11-02', '2020-11-04', 'dfsdf', 'dsfsdfsdf', 'dfdsfsdfs', 1, 1, 'Əmək müqaviləsinə xitam verilməsi barədə tərəflərin müəyyən etdiyi hallar Tərəflərin əmək haqqının ödənilməsi barədə razılığa gəldikləri digər şərtlər İş yerinin statusu123456789Əmək şaraiti', 'gdfgdfgdf', 1, '', '2020-11-13', '0000-00-00'),
(27, 94, 8, 1, '', '1969-12-31', 5, 1, '2021-02-17', '2020-11-23', '2020-11-23', 'Avtomobilini istifade edecektir', 'Pensiya yasi catanda isine son verilecek', 'əmək haqqı saatlıq ödenir', 2, 3, 'Mülakatçı objektif kriterle nasıl bir çalışan aradığını bilir. Bu sayede kariyer sitesinde ilan çıkarken hedef kitleyi iyi belirle ve ilan metni elinde hazır olur, Mülakatçı, adayları cv üzerinden objektif kriterlere göre değerlendirir, Aynı şekilde mülakatta da objektif kriterler dahilinde belirlenir (Diğer koşullar: Ceteris Paribus) Çalışan hedeflerin, yetki ve sorumluluklarının ne olduğunu bilir, Performans kriterlerinin ne olabileceğini bilir, Performans sistemi kurulacaksa kriterlerinin ne olduğunu tahmin edilir, Kurumsal Eğitim/Gelişim uzmanı söz konusu pozisyon için olması gereken eğitim kriterlerini bilir, Kalite sistemi kurulmak isteniyorsa sistemin altyapısı küçükte olsa hazırlanmış olur, Çalışanla veya eski çalışanla davalık bir durumda yargıçların sorduğu ilk belgelerden biri görev tanımıdır.', 'yox', 1, '', '2020-11-21', '0000-00-00'),
(28, 65, 8, 1, '', '1969-12-31', 1, 1, '2020-12-01', '2020-12-30', '2020-12-01', 'Mülkiyyət münasibətlərinin tənzimlənməsi', 'eeeee', 'tttt', 2, 3, 'Əmək müqaviləsinə xitam verilməsi barədə tərəflərin müəyyən etdiyi hallar Tərəflərin əmək haqqının ödənilməsi barədə razılığa gəldikləri digər şərtlər İş yerinin statusu123456789Əmək şaraiti', 'uuuuuu', 1, '', '2020-12-14', '0000-00-00'),
(29, 103, 8, 1, '', '1969-12-31', 3, 1, '2020-12-01', '2020-09-29', '2020-10-29', 'Mülkiyyət münasibətlərinin tənzimlənməsi', 'dsfsdfsdf', 'dfdsfsdfs', 1, 2, 'Əmək müqaviləsinə xitam verilməsi barədə tərəflərin müəyyən etdiyi hallar Tərəflərin əmək haqqının ödənilməsi barədə razılığa gəldikləri digər şərtlər İş yerinin statusu123456789Əmək şaraiti', 'Kvot', 1, '', '2020-12-14', '0000-00-00'),
(30, 103, 8, 1, '', '1969-12-31', 2, 1, '2020-12-01', '2020-12-01', '2020-12-01', 'Mülkiyyət münasibətlərinin tənzimlənməsi', 'dsfsdfsdf', 'dfdsfsdfs', 1, 2, 'Əmək müqaviləsinə xitam verilməsi barədə tərəflərin müəyyən etdiyi hallar Tərəflərin əmək haqqının ödənilməsi barədə razılığa gəldikləri digər şərtlər İş yerinin statusu123456789Əmək şaraiti', 'uuuuuu', 1, '', '2020-12-14', '0000-00-00'),
(31, 103, 8, 1, '', '1969-12-31', 3, 2, '2020-12-01', '2020-09-29', '2020-12-30', 'Mülkiyyət münasibətlərinin tənzimlənməsi Mülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibət', 'Mülkiyyət münasibətlərinin tənzimlənməsi Mülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibət', 'Mülkiyyət münasibətlərinin tənzimlənməsi Mülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibət', 1, 2, 'Mülkiyyət münasibətlərinin tənzimlənməsi Mülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsi', 'Mülkiyyət münasibətlərinin tənzimlənməsi Mülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibət', 1, '', '2020-12-14', '0000-00-00'),
(32, 65, 8, 1, '', '1969-12-31', 3, 1, '2020-12-01', '2020-09-01', '2020-12-02', 'Mülkiyyət münasibətlərinin tənzimlənməsi Mülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibət', 'Mülkiyyət münasibətlərinin tənzimlənməsi Mülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibət', 'Mülkiyyət münasibətlərinin tənzimlənməsi Mülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibət', 1, 3, 'Mülkiyyət münasibətlərinin tənzimlənməsi Mülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsi Mülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsi Mülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsi Mülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsi Mülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsi Mülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsi Mülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsi', 'Mülkiyyət münasibətlərinin tənzimlənməsi Mülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibət', 1, '', '2020-12-14', '0000-00-00'),
(33, 103, 8, 1, '', '1969-12-31', 1, 1, '2020-12-01', '2020-12-24', '2020-12-30', 'Mülkiyyət münasibətlərinin tənzimlənməsi Mülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibət', 'Mülkiyyət münasibətlərinin tənzimlənməsi Mülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibət', 'Mülkiyyət münasibətlərinin tənzimlənməsi Mülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibət', 1, 3, 'Əmək müqaviləsinə xitam verilməsi barədə tərəflərin müəyyən etdiyi hallar Tərəflərin əmək haqqının ödənilməsi barədə razılığa gəldikləri digər şərtlər İş yerinin statusu123456789Əmək şaraiti', 'Mülkiyyət münasibətlərinin tənzimlənməsi Mülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibətlərinin tənzimlənməsiMülkiyyət münasibət', 1, '', '2020-12-16', '0000-00-00');

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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_universities`
--

CREATE TABLE `tbl_universities` (
  `id` int(11) NOT NULL,
  `uni_name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_universities`
--

INSERT INTO `tbl_universities` (`id`, `uni_name`, `status`) VALUES
(4, 'Qərb Universiteti', 1),
(5, '	Bakı Asiya Universiteti', 1),
(6, 'Elm və Təhsil Mərkəzi Təfəkkür Universiteti', 1),
(7, '	Azərbaycan Universiteti', 1),
(8, '	Qafqaz Universiteti', 1),
(9, '	Xəzər Universiteti', 1),
(10, '	Odlar Yurdu Universiteti', 1),
(11, '	Avrasiya Universiteti', 1),
(12, '	Bakı Qızlar Universiteti', 1),
(13, '	Azərbaycan Beynəlxalq Universiteti', 1),
(14, '	Azərbaycan Kooperasiya Universiteti', 1),
(15, '	Bakı Biznes', 1),
(16, '	Bakı Dövlət Universiteti', 1),
(17, '	Azərbaycan Dövlət Neft Akademiyası', 1),
(18, '	Azərbaycan Tibb Universiteti', 1),
(19, '	Azərbaycan Texniki Universiteti', 1),
(20, '	\"Azərbaycan Dövlətİqtisad Universiteti\"', 1),
(21, '	Azərbaycan Dövlət İqtisad Universitetinin Dərbənd filialı', 1),
(22, '	Azərbaycan Dövlət Pedaqoji Universiteti', 1),
(23, '	Azərbaycan Memarlıq və İnşaat Universiteti', 1),
(24, '	Bakı Slavyan Universiteti', 1),
(25, '	Azərbaycan Dillər Universiteti', 1),
(26, '	Azərbaycan Dövlət Bədən Tərbiyəsi və İdman Akademiyası', 1),
(27, '	Azərbaycan Dövlət Aqrar Universiteti', 1),
(28, '	Bakı Musiqi Akademiyası', 1),
(29, '	Azərbaycan Dövlət Mədəniyyət və İncəsənət Universiteti', 1),
(30, '	Azərbaycan Respublikası Prezidenti Yanında Dövlət İdarəçilik Akademiyası', 1),
(31, '	Azərbaycan Dövlət Dəniz Akademiyası', 1),
(32, '	Milli Aviasiya Akademiyası', 1),
(33, '	Sumqayıt Dövlət Universiteti', 1),
(34, '	Lənkəran Dövlət Universiteti', 1),
(35, '	Gəncə Dövlət Universiteti', 1),
(36, '	Azərbaycan Texnologiya Universiteti	', 1),
(37, '	\"Mingəçevir Politexnikİnstitutu\"', 1),
(38, '	Naxçıvan Dövlət Universiteti', 1),
(39, '	Azərbaycan Rəssamlıq Akademiyası', 1),
(40, '	Azərbaycan Milli Konservatoriyası', 1),
(41, '	\"Naxçıvan Müəllimlər İnstitutu\"', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `upass` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `reg_mail` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `def_lang` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `emp_id` int(100) NOT NULL,
  `ustatus` int(11) NOT NULL,
  `u_photo` varchar(300) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `firstname`, `lastname`, `upass`, `reg_mail`, `company_id`, `def_lang`, `emp_id`, `ustatus`, `u_photo`) VALUES
(69, 'admin', 'admin', 'admin', '6b4912ffcb44ddc29c48367da3ef25db', 'admin@demo2.com', 1, 'az', 0, 1, 'images/users/SCI39558860.png'),
(70, 'sdfsdf', 'İbad', 'Rəhimova', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'rahathr@hotmail.com', 1, 'az', 0, 1, 'images/users/SYZ36691306.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_priviliges`
--

CREATE TABLE `tbl_user_priviliges` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `priv_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_roles`
--

CREATE TABLE `tbl_user_roles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_working_conditions`
--

CREATE TABLE `tbl_working_conditions` (
  `id` int(11) NOT NULL,
  `cond_id` int(11) NOT NULL,
  `title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(11) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_working_conditions`
--

INSERT INTO `tbl_working_conditions` (`id`, `cond_id`, `title`, `lang`) VALUES
(1, 1, 'Normal', 'az'),
(2, 2, 'Ağır', 'az'),
(3, 3, 'Zərərli', 'az');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_workplace_status`
--

CREATE TABLE `tbl_workplace_status` (
  `id` int(11) NOT NULL,
  `work_status_id` int(11) NOT NULL,
  `title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(11) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_workplace_status`
--

INSERT INTO `tbl_workplace_status` (`id`, `work_status_id`, `title`, `lang`) VALUES
(1, 1, 'Əsas', 'az'),
(2, 2, 'Əlavə', 'az');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_work_experience`
--

CREATE TABLE `tbl_work_experience` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `work_experience_before_enterprise` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `work_experience_enterprise` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `general_work_experience` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `insert_date` date NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_work_experience`
--

INSERT INTO `tbl_work_experience` (`id`, `emp_id`, `work_experience_before_enterprise`, `work_experience_enterprise`, `general_work_experience`, `status`, `insert_date`, `update_date`) VALUES
(1, 38, '7,1,1', '2,7,2', '3,3,7', 0, '0000-00-00', '2020-09-16'),
(2, 0, '1,2,3', '4,5,6', '7,8,9', 1, '2020-09-16', '2020-09-16'),
(3, 39, '8,2,3', '4,8,6', '7,8,8', 1, '2020-09-16', '2020-09-16'),
(4, 65, '4,2,20', '1,3,', '5,5,20', 1, '2020-10-21', '0000-00-00'),
(5, 69, '4,2,20', '1,3,', ',,', 0, '2020-10-25', '0000-00-00'),
(6, 67, '4,2,20', '1,3,', ',,', 1, '2020-10-26', '0000-00-00'),
(7, 78, '3,3,55', '4,4,100', '7,7,155', 1, '2020-11-02', '0000-00-00'),
(8, 81, '0,0,0', '0,0,0', '0,0,0', 1, '2020-11-05', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_work_status`
--

CREATE TABLE `tbl_work_status` (
  `id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_work_status`
--

INSERT INTO `tbl_work_status` (`id`, `level_id`, `title`, `lang`) VALUES
(1, 1, 'Fəhlə', 'az'),
(2, 2, 'Qulluqçu', 'az');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yesno`
--

CREATE TABLE `tbl_yesno` (
  `id` int(11) NOT NULL,
  `chois_id` int(11) NOT NULL,
  `chois_desc` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_yesno`
--

INSERT INTO `tbl_yesno` (`id`, `chois_id`, `chois_desc`, `lang`) VALUES
(1, 1, 'Bəli', 'az'),
(2, 2, 'Xeyr', 'az');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `parent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_additions_deductions_salary`
--
ALTER TABLE `tbl_additions_deductions_salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_additions_salary`
--
ALTER TABLE `tbl_additions_salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent` (`parent`),
  ADD KEY `code` (`code`);

--
-- Indexes for table `tbl_commands`
--
ALTER TABLE `tbl_commands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_companies`
--
ALTER TABLE `tbl_companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contracts`
--
ALTER TABLE `tbl_contracts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_country`
--
ALTER TABLE `tbl_country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_dates`
--
ALTER TABLE `tbl_dates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_driver_lic_cat`
--
ALTER TABLE `tbl_driver_lic_cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_employees`
--
ALTER TABLE `tbl_employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emp_status` (`emp_status`);

--
-- Indexes for table `tbl_employee_category`
--
ALTER TABLE `tbl_employee_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent` (`parent`) USING BTREE;

--
-- Indexes for table `tbl_employee_certification`
--
ALTER TABLE `tbl_employee_certification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `cert_status` (`cert_status`);

--
-- Indexes for table `tbl_employee_commands`
--
ALTER TABLE `tbl_employee_commands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_employee_company`
--
ALTER TABLE `tbl_employee_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_employee_education`
--
ALTER TABLE `tbl_employee_education`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `qualification_id` (`qualification_id`),
  ADD KEY `institution_id` (`institution_id`),
  ADD KEY `edu_status` (`edu_status`);

--
-- Indexes for table `tbl_employee_exemption`
--
ALTER TABLE `tbl_employee_exemption`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_employee_exit`
--
ALTER TABLE `tbl_employee_exit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_employee_family_info`
--
ALTER TABLE `tbl_employee_family_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_employee_inout`
--
ALTER TABLE `tbl_employee_inout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_employee_medical_information`
--
ALTER TABLE `tbl_employee_medical_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_employee_military_info`
--
ALTER TABLE `tbl_employee_military_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_employee_overtimes`
--
ALTER TABLE `tbl_employee_overtimes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_employee_overtime_list`
--
ALTER TABLE `tbl_employee_overtime_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_employee_permits`
--
ALTER TABLE `tbl_employee_permits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_employee_position`
--
ALTER TABLE `tbl_employee_position`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent` (`parent`);

--
-- Indexes for table `tbl_employee_prev_positions`
--
ALTER TABLE `tbl_employee_prev_positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_employee_schedules`
--
ALTER TABLE `tbl_employee_schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_employee_skills`
--
ALTER TABLE `tbl_employee_skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_employye_driver_license`
--
ALTER TABLE `tbl_employye_driver_license`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_exemptions`
--
ALTER TABLE `tbl_exemptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_exist_not_exist`
--
ALTER TABLE `tbl_exist_not_exist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_family_member_types`
--
ALTER TABLE `tbl_family_member_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_languages`
--
ALTER TABLE `tbl_languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_language_knowledge`
--
ALTER TABLE `tbl_language_knowledge`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_lang_level`
--
ALTER TABLE `tbl_lang_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_marital_status`
--
ALTER TABLE `tbl_marital_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_migration_info`
--
ALTER TABLE `tbl_migration_info`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tbl_modules`
--
ALTER TABLE `tbl_modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_month`
--
ALTER TABLE `tbl_month`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_notes`
--
ALTER TABLE `tbl_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_overtime_approve_reasons`
--
ALTER TABLE `tbl_overtime_approve_reasons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_overtime_calc_status`
--
ALTER TABLE `tbl_overtime_calc_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_periods`
--
ALTER TABLE `tbl_periods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_permit_types`
--
ALTER TABLE `tbl_permit_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_place_expenditure`
--
ALTER TABLE `tbl_place_expenditure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_position_level`
--
ALTER TABLE `tbl_position_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_position_status`
--
ALTER TABLE `tbl_position_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_priviliges`
--
ALTER TABLE `tbl_priviliges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_qualification_dic`
--
ALTER TABLE `tbl_qualification_dic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_reward_period`
--
ALTER TABLE `tbl_reward_period`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_roles_pivilges`
--
ALTER TABLE `tbl_roles_pivilges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_salary_info`
--
ALTER TABLE `tbl_salary_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_schedules`
--
ALTER TABLE `tbl_schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_schedules_additional`
--
ALTER TABLE `tbl_schedules_additional`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sch_reduce_from`
--
ALTER TABLE `tbl_sch_reduce_from`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sch_reduce_reason`
--
ALTER TABLE `tbl_sch_reduce_reason`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sch_schtype`
--
ALTER TABLE `tbl_sch_schtype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sch_time_managment_type`
--
ALTER TABLE `tbl_sch_time_managment_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sex`
--
ALTER TABLE `tbl_sex`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_site_languages`
--
ALTER TABLE `tbl_site_languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_structure_level`
--
ALTER TABLE `tbl_structure_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_structure_positions`
--
ALTER TABLE `tbl_structure_positions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posit_code` (`posit_code`);

--
-- Indexes for table `tbl_structure_roles`
--
ALTER TABLE `tbl_structure_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_termination_clause`
--
ALTER TABLE `tbl_termination_clause`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_terms_employment_contract`
--
ALTER TABLE `tbl_terms_employment_contract`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_type_dismissal`
--
ALTER TABLE `tbl_type_dismissal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_universities`
--
ALTER TABLE `tbl_universities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_userid` (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tbl_user_priviliges`
--
ALTER TABLE `tbl_user_priviliges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_roles`
--
ALTER TABLE `tbl_user_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_working_conditions`
--
ALTER TABLE `tbl_working_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_workplace_status`
--
ALTER TABLE `tbl_workplace_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_work_experience`
--
ALTER TABLE `tbl_work_experience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_work_status`
--
ALTER TABLE `tbl_work_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_yesno`
--
ALTER TABLE `tbl_yesno`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_additions_deductions_salary`
--
ALTER TABLE `tbl_additions_deductions_salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_additions_salary`
--
ALTER TABLE `tbl_additions_salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `tbl_commands`
--
ALTER TABLE `tbl_commands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_companies`
--
ALTER TABLE `tbl_companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_contracts`
--
ALTER TABLE `tbl_contracts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222;

--
-- AUTO_INCREMENT for table `tbl_country`
--
ALTER TABLE `tbl_country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_dates`
--
ALTER TABLE `tbl_dates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_driver_lic_cat`
--
ALTER TABLE `tbl_driver_lic_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_employees`
--
ALTER TABLE `tbl_employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;

--
-- AUTO_INCREMENT for table `tbl_employee_category`
--
ALTER TABLE `tbl_employee_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;

--
-- AUTO_INCREMENT for table `tbl_employee_certification`
--
ALTER TABLE `tbl_employee_certification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_employee_commands`
--
ALTER TABLE `tbl_employee_commands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=347;

--
-- AUTO_INCREMENT for table `tbl_employee_company`
--
ALTER TABLE `tbl_employee_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_employee_education`
--
ALTER TABLE `tbl_employee_education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `tbl_employee_exemption`
--
ALTER TABLE `tbl_employee_exemption`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_employee_exit`
--
ALTER TABLE `tbl_employee_exit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_employee_family_info`
--
ALTER TABLE `tbl_employee_family_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tbl_employee_inout`
--
ALTER TABLE `tbl_employee_inout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_employee_medical_information`
--
ALTER TABLE `tbl_employee_medical_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_employee_military_info`
--
ALTER TABLE `tbl_employee_military_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_employee_overtimes`
--
ALTER TABLE `tbl_employee_overtimes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_employee_overtime_list`
--
ALTER TABLE `tbl_employee_overtime_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_employee_permits`
--
ALTER TABLE `tbl_employee_permits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_employee_position`
--
ALTER TABLE `tbl_employee_position`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_employee_prev_positions`
--
ALTER TABLE `tbl_employee_prev_positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_employee_schedules`
--
ALTER TABLE `tbl_employee_schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_employee_skills`
--
ALTER TABLE `tbl_employee_skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_employye_driver_license`
--
ALTER TABLE `tbl_employye_driver_license`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_exemptions`
--
ALTER TABLE `tbl_exemptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_exist_not_exist`
--
ALTER TABLE `tbl_exist_not_exist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_family_member_types`
--
ALTER TABLE `tbl_family_member_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_languages`
--
ALTER TABLE `tbl_languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_language_knowledge`
--
ALTER TABLE `tbl_language_knowledge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_lang_level`
--
ALTER TABLE `tbl_lang_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_marital_status`
--
ALTER TABLE `tbl_marital_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_migration_info`
--
ALTER TABLE `tbl_migration_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_military_information`
--
ALTER TABLE `tbl_military_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

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

--
-- AUTO_INCREMENT for table `tbl_modules`
--
ALTER TABLE `tbl_modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_month`
--
ALTER TABLE `tbl_month`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_notes`
--
ALTER TABLE `tbl_notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_overtime_approve_reasons`
--
ALTER TABLE `tbl_overtime_approve_reasons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_overtime_calc_status`
--
ALTER TABLE `tbl_overtime_calc_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_periods`
--
ALTER TABLE `tbl_periods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_permit_types`
--
ALTER TABLE `tbl_permit_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_place_expenditure`
--
ALTER TABLE `tbl_place_expenditure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_position_level`
--
ALTER TABLE `tbl_position_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_position_status`
--
ALTER TABLE `tbl_position_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_priviliges`
--
ALTER TABLE `tbl_priviliges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_qualification_dic`
--
ALTER TABLE `tbl_qualification_dic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_reward_period`
--
ALTER TABLE `tbl_reward_period`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_roles_pivilges`
--
ALTER TABLE `tbl_roles_pivilges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_salary_info`
--
ALTER TABLE `tbl_salary_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `tbl_schedules`
--
ALTER TABLE `tbl_schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_schedules_additional`
--
ALTER TABLE `tbl_schedules_additional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_sch_reduce_from`
--
ALTER TABLE `tbl_sch_reduce_from`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_sch_reduce_reason`
--
ALTER TABLE `tbl_sch_reduce_reason`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_sch_schtype`
--
ALTER TABLE `tbl_sch_schtype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_sch_time_managment_type`
--
ALTER TABLE `tbl_sch_time_managment_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_sex`
--
ALTER TABLE `tbl_sex`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_site_languages`
--
ALTER TABLE `tbl_site_languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_structure_level`
--
ALTER TABLE `tbl_structure_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_structure_positions`
--
ALTER TABLE `tbl_structure_positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_structure_roles`
--
ALTER TABLE `tbl_structure_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_termination_clause`
--
ALTER TABLE `tbl_termination_clause`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_terms_employment_contract`
--
ALTER TABLE `tbl_terms_employment_contract`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_type_dismissal`
--
ALTER TABLE `tbl_type_dismissal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_universities`
--
ALTER TABLE `tbl_universities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `tbl_user_priviliges`
--
ALTER TABLE `tbl_user_priviliges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user_roles`
--
ALTER TABLE `tbl_user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_working_conditions`
--
ALTER TABLE `tbl_working_conditions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_workplace_status`
--
ALTER TABLE `tbl_workplace_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_work_experience`
--
ALTER TABLE `tbl_work_experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_work_status`
--
ALTER TABLE `tbl_work_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_yesno`
--
ALTER TABLE `tbl_yesno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_employee_category`
--
ALTER TABLE `tbl_employee_category`
  ADD CONSTRAINT `tbl_employee_category_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `tbl_employee_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
