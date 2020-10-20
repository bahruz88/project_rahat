-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2020 at 08:51 AM
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
  `insert_date` date NOT NULL DEFAULT current_timestamp(),
  `update_date` date NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_additions_deductions_salary`
--

INSERT INTO `tbl_additions_deductions_salary` (`id`, `company_id`, `emp_id`, `add_salary_id`, `salary`, `additions_currency`, `begin_date`, `end_date`, `insert_date`, `update_date`, `status`) VALUES
(10, 2, 38, 1, '45', 2, '2020-10-26', '2020-10-28', '2020-10-03', '2020-10-03', 1),
(11, 2, 38, 2004, '300', 2, '2020-10-26', '2020-10-29', '2020-10-03', '2020-10-03', 1),
(12, 2, 41, 2004, '300', 1, '2020-09-29', '2020-10-29', '2020-10-03', '2020-10-03', 1),
(13, 2, 38, 6, '300', 1, '2020-09-27', '2020-10-23', '2020-10-03', '2020-10-03', 1),
(14, 1, 76, 2004, '45', 1, '2020-09-27', '2020-11-06', '2020-10-03', '2020-10-03', 1);

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
(178, 'Casioglu innovativ', NULL, 'S00000016', 'images/icons/box1.png', 4, 0, 1, 2, NULL, '1900-01-01', 1, '9999-12-31', '2020-08-21', '2020-08-21 18:00:25'),
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
(271, 'dddhhh', 266, 'P00000024', 'images/icons/man2.png', 0, 1, 1, 3, 40, '1900-01-01', 1, '9999-12-31', '2020-09-08', '2020-09-08 12:15:41'),
(273, 'Yeni', NULL, 'S00000001', 'images/icons/box1.png', 1, 0, 1, 1, 0, '1900-01-01', 1, '9999-12-31', '2020-09-18', '2020-09-18 10:18:57'),
(274, 'aaa1', 273, 'S00000003', 'images/icons/box1.png', 2, 0, 1, 1, 0, '1900-01-01', 1, '9999-12-31', '2020-09-18', '2020-09-18 03:38:56'),
(275, 'aa2', 274, 'S00000004', 'images/icons/box1.png', 3, 0, 1, 1, 0, '1900-01-01', 1, '9999-12-31', '2020-09-18', '2020-09-18 03:38:56'),
(276, 'aa3', 275, 'S00000005', 'images/icons/box1.png', 4, 0, 1, 1, 0, '1900-01-01', 1, '9999-12-31', '2020-09-18', '2020-09-18 03:38:56'),
(277, 'aa4', 276, 'S00000008', 'images/icons/box1.png', 5, 0, 1, 1, 0, '1900-01-01', 1, '9999-12-31', '2020-09-18', '2020-09-18 03:38:56'),
(278, 'salam deyisdim', 288, 'P00000001', 'images/icons/man2.png', 0, 1, 1, 1, 39, '1900-01-01', 1, '9999-12-31', '2020-09-18', '2020-10-17 06:11:50'),
(279, 'bb1', 273, 'S00000009', 'images/icons/box1.png', 2, 0, 1, 1, 0, '1900-01-01', 1, '9999-12-31', '2020-09-20', '2020-09-20 11:37:33'),
(280, 'bb2', 279, 'S00000010', 'images/icons/box1.png', 3, 0, 1, 1, 0, '1900-01-01', 1, '9999-12-31', '2020-09-20', '2020-09-20 11:37:46'),
(281, 'bb3', 280, 'S00000011', 'images/icons/box1.png', 4, 0, 1, 1, 0, '1900-01-01', 1, '9999-12-31', '2020-09-20', '2020-09-20 11:38:02'),
(282, 'bb4', 281, 'S00000012', 'images/icons/box1.png', 5, 0, 1, 1, 0, '1900-01-01', 1, '9999-12-31', '2020-09-20', '2020-09-20 11:38:12'),
(285, 'aa05', 288, 'P00000006', 'images/icons/capman3.png', 0, 2, 1, 1, 44, '1900-01-01', 1, '9999-12-31', '2020-09-20', '2020-09-22 02:49:41'),
(286, '555aa04', 276, 'P00000007', 'images/icons/capman3.png', 0, 2, 1, 1, 44, '1900-01-01', 1, '9999-12-31', '2020-09-20', '2020-09-20 12:01:31'),
(287, 'aaa2', 274, 'S00000013', 'images/icons/box1.png', 3, 0, 1, 1, 44, '1900-01-01', 1, '9999-12-31', '2020-09-20', '2020-09-20 19:24:25'),
(288, 'aa41', 276, 'S00000015', 'images/icons/box1.png', 5, 0, 1, 1, 44, '1900-01-01', 1, '9999-12-31', '2020-09-20', '2020-09-20 22:13:05'),
(289, 'aa03', 276, 'P00000008', 'images/icons/capman3.png', 0, 2, 1, 1, 46, '1900-01-01', 1, '9999-12-31', '2020-09-22', '2020-09-22 16:17:35'),
(305, 'yeni vezife', 282, NULL, NULL, NULL, NULL, 2, NULL, 46, NULL, 1, NULL, '2020-09-23', '2020-09-23 09:41:08'),
(306, 'yeni vezife', 282, NULL, NULL, NULL, 1, 2, 1, 46, '9999-12-31', 1, '0000-00-00', '2020-09-23', '2020-09-23 09:46:40'),
(308, 'proqramci react', 282, 'P00000010', 'images/icons/man2.png', NULL, 1, 2, 1, 39, '1900-01-01', 1, '9999-12-31', '2020-09-23', '2020-09-23 08:58:39'),
(309, 'ddddd555ccccdyeni vezife1', 277, 'P00000002', 'images/icons/man2.png', NULL, 1, 2, 1, 74, '1900-01-01', 1, '9999-12-31', '2020-09-27', '2020-09-27 16:57:04'),
(310, 'ikii', 246, 'P00000003', 'images/icons/man2.png', 0, 1, 1, 3, 40, '1900-01-01', 1, '9999-12-31', '2020-09-28', '2020-09-28 22:18:54'),
(311, 'ggg2', 246, 'S00000017', 'images/icons/box1.png', 4, 0, 1, 3, 0, '2020-09-29', 1, '2020-07-10', '2020-09-29', '2020-09-29 11:16:33'),
(312, 'ggg', 246, 'P00000011', 'images/icons/man2.png', 0, 1, 1, 3, 59, '1900-01-01', 1, '9999-12-31', '2020-09-29', '2020-09-29 11:17:35'),
(314, 'yeni vezife3qwew', 287, 'P00000012', 'images/icons/man2.png', NULL, 1, 2, 0, 76, '1900-01-01', 1, '9999-12-31', '2020-10-07', '2020-10-07 17:04:50'),
(315, 'aa21', 275, 'P00000015', 'images/icons/capman3.png', 0, 2, 1, 1, 39, '1900-01-01', 1, '9999-12-31', '2020-10-12', '2020-10-12 10:41:15'),
(316, 'aaa11', 274, 'P00000025', 'images/icons/capman3.png', 0, 2, 1, 1, 46, '1900-01-01', 1, '9999-12-31', '2020-10-12', '2020-10-12 10:41:58'),
(317, 'direktor', 246, 'S00000018', 'images/icons/box1.png', 2, 0, 1, 3, 0, '1900-01-01', 1, '9999-12-31', '2020-10-17', '2020-10-17 20:53:57'),
(318, 'department', 317, 'S00000019', 'images/icons/box1.png', 3, 0, 1, 3, 0, '1900-01-01', 1, '9999-12-31', '2020-10-17', '2020-10-17 20:54:30'),
(319, 'depart', 318, 'S00000020', 'images/icons/box1.png', 4, 0, 1, 3, 0, '1900-01-01', 1, '9999-12-31', '2020-10-17', '2020-10-17 20:54:42'),
(320, 'sahe_bolmele', 319, 'S00000023', 'images/icons/box1.png', 5, 0, 1, 3, 0, '1900-01-01', 1, '9999-12-31', '2020-10-17', '2020-10-17 20:55:05'),
(321, 'fffyeniler oldu yenisi ooo', 320, 'P00000009', 'images/icons/man2.png', 0, 1, 1, 3, 79, '1900-01-01', 1, '9999-12-31', '2020-10-17', '2020-10-17 07:32:59'),
(322, 'aaaa', 320, 'P00000026', 'images/icons/man2.png', 0, 1, 1, 3, 79, '1900-01-01', 1, '9999-12-31', '2020-10-18', '2020-10-18 17:17:58'),
(323, 'Yeni', NULL, 'S00000024', 'images/icons/box1.png', 1, 0, 1, 4, 0, '1900-01-01', 1, '9999-12-31', '2020-10-19', '2020-10-19 22:35:01');

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

--
-- Dumping data for table `tbl_companies`
--

INSERT INTO `tbl_companies` (`id`, `company_name`) VALUES
(1, 'Rahathr\r\n');

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
  `insert_date` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_contracts`
--

INSERT INTO `tbl_contracts` (`id`, `emp_id`, `company_id`, `company_name`, `company_address`, `company_tel`, `voen`, `sun`, `enterprise_head_position`, `enterprise_head_fullname`, `qualification`, `uni_name`, `profession`, `create_date`, `structure1`, `structure2`, `structure3`, `structure4`, `structure5`, `military_reg_group`, `military_reg_category`, `military_staff`, `military_rank`, `military_specialty_acc`, `military_fitness_service`, `military_registration_service`, `military_registration_date`, `military_general`, `military_special`, `military_no_official`, `military_additional_information`, `military_date_completion`, `insert_date`) VALUES
(48, 46, 0, 'cybernet MMC', NULL, NULL, '1234', '3453', 'dddde', 'ssssw', 'Magistr', '	Bakı Dövlət Universiteti', 'Ä°nformatika', '2020-07-01', '', 'aa1', 'aa2', 'aa3', 'aa4', '1', '1\r\n    ', '1', '1', 'eeeee', 'rrrrrrrrrr', 'ttttttttt', '2020-05-05', 'yyyyyyyyu', 'uuuuuuuuuuu', 'iiiiiiiiiiiiiiiii', 'ooooooooooooo', '2020-06-26', '2020-08-14'),
(49, 44, 0, 'cybernet MMC', NULL, NULL, '1234', '3453', 'dddde', 'ssssw', 'Bakalavr', '	Azərbaycan Dövlət Pedaqoji Universiteti', 'Tarix müəllimi', '1970-01-01', '', '', '', '', '', '', '\r\n    ', '', '', '', '', '', '1970-01-01', '', '', '', '', '1970-01-01', '2020-08-14'),
(50, 38, 0, 'Casioglu', NULL, NULL, '123', 'dddd', '7777777', '777777', 'Bakalavr', '	Azərbaycan Respublikası Prezidenti Yanında Dövlət İdarəçilik Akademiyası', 'ideaetmenin  esaslari', '1970-01-01', '', '', '', '', '', '1', '2\r\n    ', '4', '3', 'rr', 'rr', 'rr', '2020-05-07', 'rr', 'rr', 'rr', 'rr', '2020-05-06', '2020-08-14'),
(51, 41, 0, 'Casioglu', NULL, NULL, '123', 'dddd', '7777777', '777777', '', '', '', '1900-01-01', '', '', '', '', '', '', '\r\n    ', '', '', '', '', '', '1970-01-01', '', '', '', '', '1970-01-01', '2020-08-14'),
(52, 74, 1, 'cybernet MMC', 'qarayevw', '0558092990w', '43211', '3453', 'dddde', 'ssssw', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-26'),
(54, 76, 1, 'cybernet MMC', 'qarayevw', '0558092990w', '43211', '3453', 'dddde', 'ssssw', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-26'),
(55, 77, 1, 'cybernet MMC', 'qarayevw', '0558092990w', '43211', '3453', 'Serencam verici direktor, Bas direktor', 'AGAYEV Mehemmed Beybala', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-07'),
(56, 78, 1, 'cybernet MMC', 'qarayevw', '0558092990w', '43211', '3453', 'Serencam verici direktor, Bas direktor', 'AGAYEV Mehemmed Beybala', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-14'),
(57, 79, 3, 'PASHA', 'dddddddddddd', 'ddddddddd', '2147483647', 'ssss', 'dddddddddd', 'ddddddddddd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-18'),
(58, 80, 3, 'PASHA', 'dddddddddddd', 'ddddddddd', '2147483647', 'ssss', 'dddddddddd', 'ddddddddddd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-19');

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
  `company_id` int(11) DEFAULT NULL,
  `firstname` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `sex` int(11) NOT NULL,
  `marital_status` int(11) NOT NULL,
  `birth_date` date NOT NULL,
  `birth_place` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `citizenship` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
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
(38, 2, 'Namiq', 'Cavad', 'Isa', 1, 1, '1987-03-02', 'Qax  rayonu ', 'Az?rbaycanl?', '2q87s71', 'AZ456789', '2044-02-03', '2020-02-11', 'Asan2', 'Bak? ??h?ri X?rdalan', 'Baki seheri xetai rayonu', '58886754', '014458798', 'bahruzqasimov@gmail.com', '0552380188', 1, 'BX19449584', 'images/users/SZD46332451.png'),
(39, 1, 'Eli', 'Veliyev', 'Memmed', 1, 1, '2020-02-13', 'Qax  rayonu Əmircan kəndi', 'Azərbaycanli', '2q87s71', 'AZ456789', '2020-02-03', '2020-02-11', 'Asan2', 'Bakı şəhəri Xırdalan', 'Baki seheri xetai rayonu', '58886754', '014458798', 'bahruzqasimov@gmail.com', '0552380188', 1, 'TY99641903', ''),
(40, 3, 'Tahir', 'Memmedov', '?akir', 1, 1, '2020-02-13', 'Qax  rayonu ?mircan k?ndi', 'Az?rbaycanli', '2q87s71', 'AZ456789', '2020-02-03', '2020-02-11', 'Asan2', 'Bak? ??h?ri X?rdalan', 'Baki seheri xetai rayonu', '58886754', '014458798', 'bahruzqasimov@gmail.com', '0552380188', 0, 'PM91611607', 'images/users/SPM91611607.png'),
(41, 2, 'Orxan', 'Mustafa', 'Fikrət', 1, 2, '2020-02-13', 'Baki  azerbaycan', 'Azərbaycanli', '2q87s71', 'AZ456789', '2020-02-03', '2020-02-11', 'Asan2', 'Bakı şəhəri ', 'Baki seheri ', '58886754', '014458798', 'bahruzqasimov@gmail.com', '0552380188', 1, 'OE19872145', ''),
(44, 1, 'Ravin', 'Məmmədov', 'Paşa', 1, 2, '1989-08-01', 'Bakı', 'AZERBAYCAN', '45DF56RE', 'AZE123456', '2020-05-03', '2020-05-19', 'ASAN2', 'Bakı şəhəri', 'Bakı şəhəri', '0527898895', '1248792', 'ravin@gmail.com', '012897456', 1, 'PQ35486847', ''),
(46, 1, 'Mayya', 'Soltanova', 'Ənnaqı', 2, 1, '2020-06-04', 'Azerbaycan ', 'Nizami', '123456', '6543215', '2020-06-01', '2020-06-30', '', 'Nizami Rizvan Teymurov', 'Sabirabad rayonu', '0125465454', '0558092990', 'mayyasoltanova@GMAIL.COM', '', 1, '9004', 'images/users/S-9004.png'),
(59, 3, 'Mayya', 'erer', 'Ennaqi', 1, 1, '1970-01-01', '', '', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', 'sarallahnur1@gmail.com', '', 0, 'LY26883007', 'images/users/def.png'),
(74, 1, 'Vusal', 'Israfilov', 'Hesimm', 1, 1, '2020-09-01', 'Baki', 'Azerbaycanligi', '454545', 'aaa', '2020-09-04', '2020-09-25', 'asan2', 'Sabirabad', 'Sabirabad', '0705543435', '0123236113', 'mehemmedntl85@gmail.com', '43434343', 1, 'ZM43910374', 'images/users/def.png'),
(76, 1, 'Ruqeyye', 'Israfilova', 'Vusal', 2, 2, '2020-09-03', 'Sabirabad', 'Azerbaycanligi', '454545', 'aaa', '2020-07-28', '2020-09-25', 'asan2', 'Baki', 'Baki nizami', '0705543435', '3434343', 'mayyasoltanova29@gmail.com', '43434343', 1, 'HP31023565', 'images/users/def.png'),
(77, 1, 'Vusall', 'Israfilov', 'ww', 2, 1, '2020-01-29', 'Sabirabad', '', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', 'sarallahnur1@gmail.com', '', 1, 'SZ22370887', 'images/users/def.png'),
(78, 1, '', '', '', 0, 0, '1970-01-01', '', '', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', '', '', 1, 'OM68131159', 'images/users/def.png'),
(79, 3, 'Vusale', 'Israfilova', 'Ennaqi', 2, 2, '2020-09-28', 'Baki', 'Azerbaycanligi', '454545', 'aaa', '2020-10-12', '2020-10-28', 'fghfhf', 'Sabirabad', 'Sabirabad', '0705543435', '3434343', 'sarallahnur1@gmail.com', '43434343', 1, 'ZD44929223', 'images/users/def.png'),
(80, 3, 'MMM', 'MMM', 'MMM', 1, 1, '2020-09-28', 'Baki', 'Azerbaycanligi', '454545', 'aaa', '2020-10-26', '2020-10-31', 'asan2', 'Baki', 'Baki nizami', '5555555', '3434343', 'mayyasoltanova29@gmail.com', '43434343', 1, 'SX29647725', 'images/users/def.png');

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
(1, 36, 'SFA academy', 'Oracle Sql dərsləri', '2020-03-10', '2020-03-11', '2020-03-17 00:00:00', '2020-05-01 09:47:15', 1, 1, 1),
(2, 36, 'xxx', 'yyy', '2020-03-10', '2020-03-19', '2020-03-18 00:00:00', '2020-03-26 00:00:00', 1, 1, 0),
(3, 0, '', '', '1970-01-01', '1970-01-01', '2020-03-23 00:00:00', '2020-03-23 00:00:00', 0, 0, 1),
(4, 38, 'HR', 'Hr Telimi', '2020-03-22', '2019-11-27', '2020-03-23 00:00:00', '2020-05-01 09:47:40', 38, 38, 1),
(5, 40, 'HR', 'Hr Telimi', '2020-03-21', '2020-03-24', '2020-03-23 00:00:00', '2020-04-13 09:26:59', 40, 40, 1),
(6, 41, 'test mmc', 'kendde beden terbiye', '2020-03-21', '2020-03-11', '2020-03-23 00:00:00', '2020-03-23 00:00:00', 41, 41, 1),
(7, 38, 'test mmc', 'kendde beden terbiye', '2020-03-24', '2020-03-24', '2020-03-23 00:00:00', '2020-03-23 00:00:00', 38, 38, 0),
(8, 41, 'sdfasd', 'asdasdasdasd', '2020-03-30', '2020-03-30', '2020-04-07 00:00:00', '2020-04-07 00:00:00', 41, 41, 0),
(9, 46, 'riyaziyyat', 'riyaziyyat dersi', '2020-06-01', '2020-06-30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 1),
(10, 46, 'php MMC', 'php dersleri', '2020-06-02', '2020-06-30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 1);

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
  `insert_date` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_employee_commands`
--

INSERT INTO `tbl_employee_commands` (`id`, `command_id`, `emp_id`, `command_no`, `company_id`, `company_name`, `company_address`, `company_tel`, `voen`, `sun`, `enterprise_head_position`, `enterprise_head_fullname`, `qualification`, `uni_name`, `profession`, `create_date`, `structure1`, `structure2`, `structure3`, `structure4`, `structure5`, `military_reg_group`, `military_reg_category`, `military_staff`, `military_rank`, `military_specialty_acc`, `military_fitness_service`, `military_registration_service`, `military_registration_date`, `military_general`, `military_special`, `military_no_official`, `military_additional_information`, `military_date_completion`, `insert_date`) VALUES
(49, 5, 44, '01/K', 1, 'cybernet MMC', NULL, NULL, '1234', '3453', 'dddde', 'ssssw', 'Bakalavr', '	Azərbaycan Dövlət Pedaqoji Universiteti', 'Tarix müəllimi', '1970-01-01', '', '', '', '', '', '', '\r\n    ', '', '', '', '', '', '1970-01-01', '', '', '', '', '1970-01-01', '2020-08-14'),
(50, 5, 39, '02/K', 1, 'cybernet MMC', 'aaaa ssss dddd', '123456', '12344', '4332111', 'Direktor', 'Ilham', 'Bakalavr', 'BDU', 'IT', '2020-07-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-08-22'),
(51, 5, 44, '', 1, 'cybernet MMC', 'aaaa ssss dddd', '123456', '12344', '4332111', 'Direktor', 'Ilham', 'Bakalavr', 'BDU', 'IT', '2020-07-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-08-22'),
(65, 5, 74, '15/K', 1, 'cybernet MMC', 'qarayevw', '0558092990w', '43211', '3453', 'dddde', 'ssssw', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-26'),
(67, 5, 76, '03/K', 1, 'cybernet MMC', 'qarayevw', '0558092990w', '43211', '3453', 'dddde', 'ssssw', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-26'),
(68, 6, 40, '01/K', 3, 'PASHA', 'dddddddddddd', 'ddddddddd', '2147483647', 'ssss', 'dddddddddd', 'ddddddddddd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-03'),
(69, 1, 41, '01/K', 2, 'Casioglu MMC', '777', '7777777777777', '2147483647', 'dddd', '7777777', '777777', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-03'),
(70, 1, 76, '', 1, 'cybernet MMC', 'qarayevw', '0558092990w', '43211', '3453', 'Serencam verici direktor, Bas direktor', 'AGAYEV Mehemmed Beybala', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-03'),
(71, 5, 77, '', 1, 'cybernet MMC', 'qarayevw', '0558092990w', '43211', '3453', 'Serencam verici direktor, Bas direktor', 'AGAYEV Mehemmed Beybala', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-07'),
(72, 6, 40, '', 3, 'PASHA', 'dddddddddddd', 'ddddddddd', '2147483647', 'ssss', 'dddddddddd', 'ddddddddddd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-11'),
(73, 5, 78, '', 1, 'cybernet MMC', 'qarayevw', '0558092990w', '43211', '3453', 'Serencam verici direktor, Bas direktor', 'AGAYEV Mehemmed Beybala', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-14'),
(78, 18, 46, '', 1, 'cybernet MMC', 'qarayevw', '0558092990w', '43211', '3453', 'Serencam verici direktor, Bas direktor', 'AGAYEV Mehemmed Beybala', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-17'),
(79, 18, 46, '', 1, 'cybernet MMC', 'qarayevw', '0558092990w', '43211', '3453', 'Serencam verici direktor, Bas direktor', 'AGAYEV Mehemmed Beybala', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-17'),
(80, 18, 46, '', 1, 'cybernet MMC', 'qarayevw', '0558092990w', '43211', '3453', 'Serencam verici direktor, Bas direktor', 'AGAYEV Mehemmed Beybala', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-17'),
(81, 18, 74, '', 1, 'cybernet MMC', 'qarayevw', '0558092990w', '43211', '3453', 'Serencam verici direktor, Bas direktor', 'AGAYEV Mehemmed Beybala', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-17'),
(82, 18, 74, '', 1, 'cybernet MMC', 'qarayevw', '0558092990w', '43211', '3453', 'Serencam verici direktor, Bas direktor', 'AGAYEV Mehemmed Beybala', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-17'),
(83, 18, 46, '', 1, 'cybernet MMC', 'qarayevw', '0558092990w', '43211', '3453', 'Serencam verici direktor, Bas direktor', 'AGAYEV Mehemmed Beybala', NULL, NULL, NULL, NULL, NULL, '274', '275', '276', '288', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-17'),
(89, 18, 59, '', 3, 'PASHA', 'dddddddddddd', 'ddddddddd', '2147483647', 'ssss', 'dddddddddd', 'ddddddddddd', NULL, NULL, NULL, NULL, 'yeniler oldu yenisi ooo', '317', '318', '319', '320', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-17'),
(91, 18, 59, '', 3, 'PASHA', 'dddddddddddd', 'ddddddddd', '2147483647', 'ssss', 'dddddddddd', 'ddddddddddd', NULL, NULL, NULL, NULL, 'fffyeniler oldu yenisi ooo', '317', '318', '319', '320', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-17'),
(96, 19, 40, '01/K', 3, 'PASHA', 'dddddddddddd', 'ddddddddd', '2147483647', 'ssss', 'dddddddddd', 'ddddddddddd', NULL, NULL, NULL, NULL, 'ikii', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-18'),
(97, 19, 59, '01/K', 3, 'PASHA', 'dddddddddddd', 'ddddddddd', '2147483647', 'ssss', 'dddddddddd', 'ddddddddddd', NULL, NULL, NULL, NULL, 'fffyeniler oldu yenisi ooo', '317', '318', '319', '320', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-18'),
(120, 11, 79, '', 3, 'PASHA', 'dddddddddddd', 'ddddddddd', '2147483647', 'ssss', 'dddddddddd', 'ddddddddddd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-19'),
(121, 6, 79, '', 3, 'PASHA', 'dddddddddddd', 'ddddddddd', '2147483647', 'ssss', 'dddddddddd', 'ddddddddddd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-19'),
(122, 11, 79, '', 3, 'PASHA', 'dddddddddddd', 'ddddddddd', '2147483647', 'ssss', 'dddddddddd', 'ddddddddddd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-19'),
(123, 6, 79, '', 3, 'PASHA', 'dddddddddddd', 'ddddddddd', '2147483647', 'ssss', 'dddddddddd', 'ddddddddddd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-19'),
(124, 5, 80, '', 3, 'PASHA', 'dddddddddddd', 'ddddddddd', '2147483647', 'ssss', 'dddddddddd', 'ddddddddddd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-19'),
(125, 18, 0, '', 3, 'PASHA', 'dddddddddddd', 'ddddddddd', '2147483647', 'ssss', 'dddddddddd', 'ddddddddddd', NULL, NULL, NULL, NULL, 'ggg2', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-19');

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
  `service` int(11) NOT NULL DEFAULT 1,
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
(1, 'cybernet MMC', 1234, '3453', 'accessw', 'access filiald', '1232', 43211, 'sdssss1', 'tew34444441', '121', '341', '551', 'azerbw', 'bakiw', 'qarayevw', '1002w', '0558092990w', 'AGAYEV Mehemmed Beybala', 'Serencam verici direktor, Bas direktor', 'gggggggw22', 1, NULL, NULL, NULL, NULL, 1),
(2, 'Casioglu MMC', 123, 'dddd', 'qwwww', 'dfdsf', 'ffff', 2147483647, 'werwe', '7777', 'werwer', '7777', '777', '777', '777', '777', '777', '7777777777777', '777777', '7777777', '777777777', 1, NULL, NULL, NULL, NULL, 1),
(3, 'PASHA', 2147483647, 'ssss', 'qwwww', 'sss', 'ssss', 2147483647, 'werwe', 'edddddd', 'ddddddd', 'ddddd', 'dddddd', 'ddddddd', 'ddddddddddddd', 'dddddddddddd', 'dddddddd', 'ddddddddd', 'ddddddddddd', 'dddddddddd', 'ddddddddddd', 2, NULL, NULL, NULL, NULL, 1),
(4, 'VMRS', 2147483647, '777', 'ACCESS', 'wewew', '1234', 2147483647, 'werwe', '8878', 'werwer', '878', '787', 'AZER', 'werer', 'eret', '777', '122324', 'vvvvvvvvvvv', 'bbbbbbbbbbbbb', 'nnnnnnnnnnn', 1, NULL, NULL, NULL, NULL, 1);

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
(10, 37, 2, 7, 'IPAF', 'Istehsalat  Proseslərinin avtomatlaşdırılması', '2020-03-18', 'AZE0251456', '2020-03-30', '2020-03-12', '2020-03-12 00:00:00', 37, 37, 0),
(11, 37, 3, 5, 'İdareetme', 'Yol  hereketinin  teskili', '2020-03-17', 'AZE0251456', '2020-03-10', '2020-03-12', '2020-03-12 00:00:00', 37, 37, 0),
(13, 38, 2, 30, 'İqtisadiyyat', 'ideaetmenin  esaslari', '2010-05-12', 'AZE55684512', '2020-02-15', '2020-03-15', '2020-04-09 09:42:20', 38, 38, 1),
(17, 36, 2, 4, 'IPAF', 'ideaetmenin  esaslari', '2020-03-17', 'AZE0251456', '2020-04-01', '2020-03-20', '2020-05-01 09:48:27', 37, 37, 1),
(20, 40, 0, 0, '', '', '1970-01-01', '', '1970-01-01', '2020-03-22', '2020-03-22 00:00:00', 40, 40, 0),
(21, 40, 2, 5, 'İqtisadiyyat', 'Yol  hereketinin  teskili', '2020-03-26', 'AZE987540', '2020-04-01', '2020-03-22', '2020-05-01 09:48:14', 40, 40, 1),
(22, 36, 3, 37, 'İdareetme', 'ideaetmenin  esaslari', '2020-03-19', 'AZE0251456', '2020-03-18', '2020-03-23', '2020-03-23 00:00:00', 36, 36, 0),
(23, 44, 2, 22, 'Tarix şünaslıq', 'Tarix müəllimi', '2020-05-03', 'AZE456789', '2020-05-03', '2020-05-03', '2020-05-03 00:00:00', 44, 44, 1),
(24, 45, 2, 12, 'Tarix şünaslıq', 'Tarix müəlliməsi', '2020-05-05', 'AZE4565498', '2020-05-11', '2020-05-03', '2020-05-03 00:00:00', 45, 45, 1),
(25, 46, 3, 16, 'TÉ™tbiqi riyaziyyat vÉ™ kibernetika', 'Ä°nformatika', '2013-06-04', 'asdfrf', '2013-07-01', '2020-06-04', '2020-06-04 00:00:00', 46, 46, 1),
(26, 56, 1, 1, '1qüqüe', 'qüeüe', '2020-05-29', 'üeqüeq', '2020-06-03', '2020-05-29', '0000-00-00 00:00:00', 0, 0, 1);

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
  `guarantees_termination_contract` varchar(300) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_employee_exit`
--

INSERT INTO `tbl_employee_exit` (`id`, `company_id`, `emp_id`, `exit_date`, `type_dismissal_id`, `termination_clause_id`, `note_id`, `main`, `guarantees_termination_contract`) VALUES
(6, 3, 40, '2020-10-17', 1, 1, 5, 'Əsas Əsas Əsas', 'Əmək müqaviləsinə xitam verilərkən işçilərin təminatları'),
(7, 3, 40, '2020-10-17', 1, 1, 5, 'Əsas Əsas Əsas', 'Əmək müqaviləsinə xitam verilərkən işçilərin təminatları '),
(8, 3, 40, '2020-10-17', 1, 1, 5, 'Əsas Əsas Əsas', 'Əmək müqaviləsinə xitam verilərkən işçilərin təminatları'),
(9, 3, 40, '2020-10-17', 1, 1, 5, 'eeeee', 'Əmək müqaviləsinə xitam verilərkən işçilərin təminatları'),
(10, 3, 40, '2020-10-17', 1, 1, 5, 'Əsas Əsas Əsas', 'Əmək müqaviləsinə xitam verilərkən işçilərin təminatları'),
(11, 3, 59, '2020-10-18', 2, 2, 13, 'İşçinin ərizəsi', 'Əmək müqaviləsinə xitam verilərkən işçilərin təminatları ');

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
  `insert_date` date NOT NULL DEFAULT current_timestamp(),
  `update_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_employee_medical_information`
--

INSERT INTO `tbl_employee_medical_information` (`id`, `emp_id`, `medical_app`, `renew_interval`, `last_renew_date`, `physical_deficiency`, `deficiency_desc`, `insert_user`, `update_user`, `insert_date`, `update_date`, `status`) VALUES
(5, 36, 2, 2, '2020-05-02', 1, 'eeehghghg', 0, 0, '2020-05-01', '2020-05-27', 1),
(6, 38, 1, 1, '2020-05-06', 1, 'jjjjjj', 0, 0, '2020-05-27', '0000-00-00', 0),
(7, 46, 1, 1, '2020-05-06', 2, '222wqwqwqwsa', 0, 0, '0000-00-00', '0000-00-00', 1),
(8, 38, 1, 1, '2020-09-28', 2, '', 0, 0, '2020-09-02', '0000-00-00', 1),
(9, 39, 1, 2, '2020-09-04', 2, '', 0, 0, '2020-09-02', '0000-00-00', 1);

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
  `insert_date` date NOT NULL DEFAULT current_timestamp(),
  `update_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_employee_position`
--

INSERT INTO `tbl_employee_position` (`id`, `category`, `parent`, `category_id`, `st_type`, `company_id`, `create_date`, `insert_date`, `update_date`) VALUES
(5, 'direktor', 0, 5, NULL, NULL, NULL, '2020-07-19', '2020-07-19 15:10:24');

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
  `insert_date` date NOT NULL DEFAULT current_timestamp(),
  `update_date` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_employee_prev_positions`
--

INSERT INTO `tbl_employee_prev_positions` (`id`, `emp_id`, `prev_employer`, `start_date`, `end_date`, `leave_reason`, `sector`, `insert_user`, `update_user`, `insert_date`, `update_date`, `status`) VALUES
(1, 36, 'gfghfft4', '2020-05-15', '2020-05-27', 'gfhfgh444', 'fghfgh444', 0, 0, '2020-05-22', 2020, 1),
(2, 38, 'eeeee', '2020-05-05', '2020-06-06', 'dddd', 'sdsdasda', 0, 0, '2020-05-28', 0, 0),
(3, 38, 'eeeee', '2020-05-01', '2020-06-01', 'dddd', 'sdsdasda', 0, 0, '2020-05-28', 0, 1),
(4, 46, 'aaaa', '2020-06-01', '2020-06-27', 'ddd', 'fffffff', 0, 0, '0000-00-00', 0, 1);

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
(1, 36, 'Traktor sürə bilir', 'Traktoru  ilə 5 il iş təcrübəsi  mövcuddur', 1, 0, 0, '0000-00-00', '2020-05-03'),
(2, 38, 'Excell  bilikləri', 'Yaxşı  səviyyədə  Excell  bilikləri var', 1, 0, 0, '2020-04-23', '2020-05-01'),
(3, 40, 'sdfs', 'sdf', 0, 0, 0, '2020-04-23', '0000-00-00'),
(4, 40, 'adsfsda', 'dfasdfs', 0, 0, 0, '2020-04-23', '0000-00-00'),
(5, 44, 'Oracle Sql bilkləri', 'Sql  Plsql  bilkləri var', 1, 0, 0, '2020-05-03', '0000-00-00'),
(6, 46, 'React bilikleri', 'React biliklerine yiyelenmeye devam edir', 1, 0, 0, '2020-06-04', '0000-00-00'),
(7, 46, 'Angular', ' Angular bilirem', 1, 0, 0, '0000-00-00', '0000-00-00');

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
  `insert_date` date NOT NULL DEFAULT current_timestamp(),
  `update_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_employye_driver_license`
--

INSERT INTO `tbl_employye_driver_license` (`id`, `emp_id`, `lic_seria_number`, `category`, `lic_issuer`, `lic_issue_date`, `expire_date`, `insert_user`, `update_user`, `insert_date`, `update_date`, `status`) VALUES
(4, 36, '222223', 2, 'fdfg23', '2020-05-02', '2020-05-03', 36, 36, '2020-05-04', '2020-05-25', 0),
(6, 38, 'sdsdasdasd56', 5, 'ssd56', '2020-05-10', '2020-05-10', 0, 0, '2020-05-25', '2020-05-25', 1),
(7, 40, '22222', 1, 'rrrrrr', '2020-05-01', '2020-05-01', 0, 0, '2020-05-26', '0000-00-00', 1);

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
  `type_desc` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_family_member_types`
--

INSERT INTO `tbl_family_member_types` (`id`, `type_desc`, `lang`) VALUES
(1, 'Ata', 'az'),
(2, 'Ana', 'az'),
(3, 'Bacı', 'az'),
(4, 'Qardaş', 'az'),
(5, 'Oğul', 'az'),
(6, 'Qız', 'az'),
(7, 'Ər', 'az'),
(8, 'Arvad', 'az');

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
  `insert_date` date NOT NULL DEFAULT current_timestamp(),
  `update_date` date NOT NULL DEFAULT current_timestamp(),
  `insert_user` int(11) NOT NULL,
  `update_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_language_knowledge`
--

INSERT INTO `tbl_language_knowledge` (`id`, `emp_id`, `lang_id`, `lang_reading`, `lang_speaking`, `lang_writing`, `lang_understanding`, `lang_status`, `insert_date`, `update_date`, `insert_user`, `update_user`) VALUES
(1, 36, 3, '5', 4, 3, 1, 1, '2020-05-03', '2020-05-08', 0, 0),
(2, 36, 2, '5', 4, 3, 2, 1, '2020-05-03', '2020-05-03', 0, 0),
(6, 40, 3, '2', 4, 3, 5, 1, '2020-05-03', '2020-05-08', 0, 0),
(8, 41, 2, '1', 3, 5, 3, 1, '2020-05-03', '2020-05-10', 0, 0),
(9, 38, 4, '5', 5, 5, 5, 1, '2020-05-03', '2020-05-03', 0, 0),
(10, 36, 4, '5', 5, 5, 5, 1, '2020-05-03', '2020-05-03', 0, 0),
(11, 41, 3, '3', 3, 3, 4, 1, '2020-05-03', '2020-05-03', 0, 0),
(12, 41, 4, '5', 5, 5, 5, 1, '2020-05-03', '2020-05-03', 0, 0),
(13, 38, 3, '5', 5, 5, 5, 1, '2020-05-03', '2020-05-03', 0, 0),
(14, 38, 2, '3', 2, 3, 3, 1, '2020-05-03', '2020-05-03', 0, 0),
(15, 40, 2, '4', 3, 2, 2, 1, '2020-05-03', '2020-05-03', 0, 0),
(16, 40, 4, '5', 5, 5, 5, 1, '2020-05-03', '2020-05-03', 0, 0),
(17, 40, 3, '4', 2, 1, 2, 1, '2020-05-03', '2020-05-03', 0, 0),
(18, 46, 2, '2', 2, 2, 2, 1, '0000-00-00', '0000-00-00', 0, 0),
(19, 46, 3, '3', 3, 3, 3, 1, '0000-00-00', '0000-00-00', 0, 0);

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
  `insert_date` date NOT NULL DEFAULT current_timestamp(),
  `update_date` date NOT NULL,
  `insert_user` int(11) NOT NULL,
  `update_user` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_migration_info`
--

INSERT INTO `tbl_migration_info` (`id`, `emp_id`, `trp_seria_number`, `trp_permit_reason`, `trp_permit_date`, `trp_valid_date`, `trp_issuer`, `prp_seria_number`, `prp_permit_date`, `prp_valid_date`, `prp_issuer`, `wp_seria_number`, `wp_permit_date`, `wp_valid_date`, `insert_date`, `update_date`, `insert_user`, `update_user`, `status`) VALUES
(1, 36, 'sss7', 'ssssy7', '2020-05-02', '2020-05-06', 'sssdsdfff', 'sdsdgrrrr5', '2020-05-14', '2020-05-16', 'sdsdsddssd55', 'ffcxcxcv55', '2020-05-27', '2020-05-30', '2020-05-28', '2020-05-30', 0, 0, 1),
(2, 40, 'tyt', 'ftytfy', '2020-04-29', '2020-06-03', 'tyty', 'tytryty', '2020-04-28', '2020-05-27', 'tyrty', 'tryrty', '2020-05-05', '2020-05-27', '2020-05-31', '0000-00-00', 0, 0, 1),
(3, 46, '123456', 'ddddd', '2020-06-01', '2020-06-02', 'ttttt', '321', '2020-06-03', '2020-06-04', 'eeee', '543', '2020-06-05', '2020-06-06', '0000-00-00', '0000-00-00', 0, 0, 1);

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
(23, 36, 1, 2, 1, 2, 'qq1', 'qq2', 'qq2', '2020-05-02', 'qq2', 'qq2', 'qq2', 'qq2', '2020-05-08', '2020-05-09', '2020-05-20', 0, 0, 1),
(24, 38, 1, 2, 4, 3, 'rr', 'rr', 'rr', '2020-05-07', 'rr', 'rr', 'rr', 'rr', '2020-05-06', '2020-05-19', '0000-00-00', 0, 0, 1),
(25, 38, 0, 0, 0, 0, '', '', '', '1970-01-01', '', '', '', '', '1970-01-01', '2020-05-27', '0000-00-00', 0, 0, 1),
(26, 38, 0, 0, 0, 0, '', '', '', '1970-01-01', '', '', '', '', '1970-01-01', '2020-05-28', '0000-00-00', 0, 0, 1),
(27, 46, 1, 1, 1, 1, 'eeeee', 'rrrrrrrrrr', 'ttttttttt', '2020-05-05', 'yyyyyyyyu', 'uuuuuuuuuuu', 'iiiiiiiiiiiiiiiii', 'ooooooooooooo', '2020-06-26', '0000-00-00', '0000-00-00', 0, 0, 1),
(28, 46, 2, 2, 2, 2, 'wwwwwwwwwwwwww', 'sssssssssss', 'ddddddddddddd', '2020-06-17', 'ffffffffffffffffffffff', 'ggggggggggggggggggg', 'hhhhhhhhhhhhhhhhhhhhhhh', 'jjjjjjjjjjjjjjjjjj', '2020-05-01', '0000-00-00', '0000-00-00', 0, 0, 1);

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
(1, '', 'Aylıq', 1, 'az'),
(2, '', 'Rüblük', 2, 'az'),
(3, '', 'İllik', 3, 'az');

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
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_salary_info`
--

INSERT INTO `tbl_salary_info` (`id`, `emp_id`, `company_id`, `tariff_rate`, `position_status_id`, `wage`, `wage_currency`, `total_monthly_salary`, `prize_amount`, `prize_amount_currency`, `reward_period`, `place_expenditure_id`, `salary_change_reason`, `other_conditions1`, `other_conditions2`, `other_conditions3`, `status`) VALUES
(1, 59, 1, '2', 2, '4444', 0, '5555', '111', 0, '2', 2, 'deyisibdeee', 'fffwweqwe', 'ss', 'sdfdfd', 0),
(17, 40, 3, '2', 3, '1500', 2, '1000', '600', 1, '2', 4, 'oooo', 'uuuu', 'uuuiii', 'ooo', 1),
(18, 41, 2, '2', 6, '900', 1, '9990', '8906', 0, '1', 4, 'bilmirem', 'uuuu', 'www', 'pppp', 1),
(19, 39, 3, '7', 5, '700', 2, '1000', '1044', 1, '2', 3, 'oooo', 'aaq', 'ggg', 'ttt', 1),
(20, 38, 1, '6', 5, '700', 1, '9990', '650', 3, '1', 5, 'uuu', 'qqq', 'www', 'eee', 1),
(21, 39, 2, '1', 7, '704', 2, '2345', '347', 0, '1', 2, 'aasssq', 'qq', 'ww', 'eee', 0),
(26, 0, 0, '1', 1, '123', 1, '1000', '600', 1, '1', 3, 'oooo', 'uuuu', 'dde', 'hhh', 0),
(27, 0, 0, '1', 2, '700', 1, '1000', '600', 1, '2', 4, 'oooo', 'uuuu', 'dde', 'hhh', 0),
(28, 0, 0, '1', 1, '700', 1, '1000', '600', 1, '1', 3, 'oooo', 'uuuu', 'dde', 'hhh', 0),
(29, 0, 0, '1', 1, '123', 1, '214', '34', 1, '2', 4, 'aaaa', 'uuuu', 'dde', 'eee', 0),
(30, 0, 0, '1', 1, '400', 1, '214', '600', 1, '1', 4, 'oooo', 'uuuu', 'www', 'hhh', 0),
(31, 0, 0, '1', 2, '700', 1, '1000', '600', 1, '1', 2, 'oooo', 'uuuu', 'dde', 'hhh', 0),
(32, 0, 0, '2', 1, '700', 1, '1000', '600', 1, '1', 1, 'oooo', 'uuuu', 'dde', 'hhh', 0),
(33, 0, 0, '1', 2, '700', 1, '1000', '600', 1, '1', 5, 'oooo', 'uuuu', 'dde', 'hhh', 0),
(34, 0, 0, '1', 2, '700', 1, '214', '600', 1, '2', 4, 'oooo', 'fff', '', 'hhh', 0),
(35, 79, 3, '1', 2, '700', 1, '1000', '600', 1, '1', 3, 'oooo', 'uuuu', 'dde', 'eee', 0),
(36, 79, 3, '1', 2, '700', 1, '214', '600', 1, '1', 2, 'oooo', 'uuuu', 'dde', 'hhh', 1),
(37, 79, 3, '1', 2, '700', 1, '214', '600', 1, '1', 2, 'fghgh', 'uuuu', 'dde', 'hhh', 1);

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
  `posit_code` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `percent` int(11) DEFAULT NULL,
  `icon` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_structure_positions`
--

INSERT INTO `tbl_structure_positions` (`id`, `role_id`, `emp_id`, `company_id`, `posit_code`, `percent`, `icon`, `start_date`, `end_date`) VALUES
(136, 1, 39, 1, 'P00000001', 100, NULL, '1900-01-01', '9999-12-31'),
(143, 1, 38, 2, 'P00000016', 100, NULL, '1900-01-01', '9999-12-31'),
(144, 1, 40, 3, 'P00000003', 100, NULL, '1900-01-01', '9999-12-31'),
(145, 2, 40, 3, 'P00000024', 100, NULL, '1900-01-01', '9999-12-31'),
(146, 2, 39, 1, 'P00000001', 100, NULL, '1900-01-01', '9999-12-31'),
(147, 3, 46, 1, 'P00000009', 100, NULL, '1900-01-01', '9999-12-31'),
(148, 3, 40, 3, 'P00000024', 100, NULL, '1900-01-01', '9999-12-31');

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
  `job_description` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
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
(6, 38, 2, 1, 'aAas', '1970-01-01', 0, 2, '1970-01-01', '1970-01-01', '1970-01-01', '', '', '', 0, 0, '', '', 1, '', '2020-10-07', '0000-00-00'),
(7, 46, 1, 1, 'sss', '2020-09-27', 3, 1, '2020-10-08', '2020-10-02', '2020-10-29', 'wwww', 'eeeee', 'tttt', 1, 1, 'yyyy', 'uuuuuu', 1, '', '2020-10-07', '0000-00-00'),
(8, 76, 1, 1, 'sss', '2020-09-30', 78, 1, '2020-10-20', '2020-10-08', '2020-09-29', 'wwww', 'dsfsdfsdf', 'tttt', 1, 2, 'fdf', 'uuuuuu', 1, '', '2020-10-07', '0000-00-00');

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
  `emp_id` int(11) NOT NULL,
  `ustatus` int(11) NOT NULL,
  `u_photo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `firstname`, `lastname`, `upass`, `reg_mail`, `company_id`, `def_lang`, `emp_id`, `ustatus`, `u_photo`) VALUES
(1, 'bahruz', 'Bəhruz', 'Qasımov', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'bahruz_qasimov@yahoo.com', 1, 'az', 90051676, 1, NULL),
(2, 'bahruzpbb', 'Bahruz', 'Qasimov', 'e10adc3949ba59abbe56e057f20f883e', 'bahruzqasimov@yahoo.com', 1, 'az', 90051676, 1, NULL),
(39, 'dsf', '', '', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'e21ee@sdsf.com', 1, 'az', 40, 0, NULL),
(40, 'Namiq', '', '', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'namiq@dsdf.com', 1, 'tr', 90051676, 0, 'images/users/SPM91611607.png'),
(41, 'sdfsdfsd', '', '', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'dfsd@sdfsd.com', 1, 'az', 90051676, 0, NULL),
(42, 'mehmet', 'Mehmet', 'Mehmedov', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'mehmet@gmail.com', 1, 'az', 90051676, 0, NULL),
(43, 'rtyrtyrty', 'rtyrty', 'dfgfdg', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'saffsd@sdfsd.com', 1, '', 90051677, 0, NULL),
(44, 'ISRAFIL', 'israfil', 'memmedov', 'e10adc3949ba59abbe56e057f20f883e', 'israfi1ldsd@fsd.com', 1, 'az', 90051678, 1, NULL),
(45, 'jjjjjj', '', '', 'd8578edf8458ce06fbc5bb76a58c5ca4', '', 1, '', 0, 0, NULL),
(46, 'fffffjj', 'fghfgh', 'Mehmedov', '46', 'aagsdffsdfsd@sdfsd.com', 1, 'az', 90051676, 1, NULL),
(47, 'yyy', 'yyyyy', 'yyyyyy', '', 'aayysd@sdfsd.com', 1, '', 0, 0, NULL),
(48, 'yyyyy', 'hjhjk', 'hjkhj', '48', 'agaggsd@sdfsd.com', 1, 'tr', 38, 0, NULL),
(49, 'rrrrrrgg', 'ddddddddd', 'ddddddddd', '49', 'd@ds.com', 1, 'az', 90051676, 1, NULL),
(50, 'dfgdfgd', 'dfgdfgqqqqq', 'dfgdfgdf', '50', 'aaggsd@sdfsd.com', 1, 'az', 90051678, 0, NULL),
(51, 'ffff', 'ffff', 'ffffff', '51', 'tesffft22@test.com', 1, 'az', 90051678, 0, NULL),
(52, 'hhh', 'rrrrrrrrr', 'rrrrrrrrrr', '52', 'arrrasd@sdfsd.com', 1, 'az', 90051676, 0, NULL),
(53, 'ttt', 'ttt', 'ttt', '53', 'tetttst22@test.com', 1, 'az', 0, 0, NULL),
(54, 'nmq', 'namiq', 'cavad', '54', 'nmq@mmail.com', 1, 'eng', 0, 1, NULL),
(55, 'dfgdfg', 'dfgdfg', 'dfgdfg', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'dfsggd@sdfsd.com', 1, 'az', 90051676, 0, NULL),
(56, 'fgfh', 'fghfg', 'fghf', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'aahhsggd@sdfsd.com', 1, 'az', 90051676, 0, NULL),
(57, 'dfdfg', 'Mehmet', 'cavad', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'aasd@sdfsd.com', 1, 'az', 90051676, 1, NULL),
(58, 'hghfgh', 'fghf', 'fghfgh', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'dfsggd@sdfsd.com', 1, 'az', 90051676, 1, NULL),
(59, 'rtyryrty', 'rtyrtyrt', 'rtyrtyrt', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'ggg@dfg.com', 1, 'az', 90051676, 0, NULL),
(60, 'sdfsdf', 'sdfsdf', 'sdf', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'dfsggd@sdfsd.com', 1, 'az', 90051676, 0, NULL),
(61, 'ngh', 'vbn', 'vbnv', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'ggg@dfg.com', 1, 'az', 90051676, 0, NULL),
(63, 'zsads', 'asasd', 'asasd', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'bahruzqasimov@gmail.com', 1, 'az', 90051676, 1, NULL),
(64, 'aaaaa', 'aaaa', 'bahruz@ddfdf.com', '64', 'bahruz@ddfdf.com', 1, 'az', 90051676, 0, NULL),
(65, '', 'namiq', 'cavad', '', '', NULL, '', 0, 0, NULL),
(66, 'bhbh', 'kjaksdnjasnd', 'asjndasjdnaj', '827ccb0eea8a706c4c34a16891f84e7b', 'sad@sdfdsf.com', 1, 'az', 39, 0, NULL),
(67, 'mayya', 'mayya', 'soltanova', 'e10adc3949ba59abbe56e057f20f883e', 'mayyasoltanova@gmail.com', 1, 'az', 46, 0, 'images/users/S9004.jpg');

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
  `update_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_work_experience`
--

INSERT INTO `tbl_work_experience` (`id`, `emp_id`, `work_experience_before_enterprise`, `work_experience_enterprise`, `general_work_experience`, `status`, `insert_date`, `update_date`) VALUES
(1, 38, '7,1,1', '2,7,2', '3,3,7', 0, '0000-00-00', '2020-09-16'),
(2, 0, '1,2,3', '4,5,6', '7,8,9', 1, '2020-09-16', '2020-09-16'),
(3, 39, '8,2,3', '4,8,6', '7,8,8', 1, '2020-09-16', '2020-09-16');

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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user`, `parent`) VALUES
(1, 'M. D.', NULL),
(2, 'Project manager', 1),
(3, 'Project manager', 1),
(4, 'Team Lead', 2),
(9, 'Team Lead', 2),
(12, 'Sr. Dev', 4),
(13, 'Sr. Dev', 9),
(14, 'Dev', 12),
(15, 'Team Lead', 3),
(16, 'Team Lead', 3),
(229, 'Project manager2', 3),
(230, 'Project manager3', 230),
(231, 'M. D.ss', 1),
(232, 'M. D.sss', 1),
(233, 'M. D.ssssss', 232),
(234, 'M. D.sssssssss', 233),
(235, 'M. D.1', 1),
(236, 'M. D.12', 235),
(237, 'Project manager3w', 230);

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
  ADD KEY `parent` (`parent`);

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
-- Indexes for table `tbl_currency`
--
ALTER TABLE `tbl_currency`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_additions_deductions_salary`
--
ALTER TABLE `tbl_additions_deductions_salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_additions_salary`
--
ALTER TABLE `tbl_additions_salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=324;

--
-- AUTO_INCREMENT for table `tbl_commands`
--
ALTER TABLE `tbl_commands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_companies`
--
ALTER TABLE `tbl_companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_contracts`
--
ALTER TABLE `tbl_contracts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `tbl_currency`
--
ALTER TABLE `tbl_currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `tbl_employee_certification`
--
ALTER TABLE `tbl_employee_certification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_employee_commands`
--
ALTER TABLE `tbl_employee_commands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `tbl_employee_company`
--
ALTER TABLE `tbl_employee_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_employee_education`
--
ALTER TABLE `tbl_employee_education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_employee_exit`
--
ALTER TABLE `tbl_employee_exit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_employee_family_info`
--
ALTER TABLE `tbl_employee_family_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_employee_medical_information`
--
ALTER TABLE `tbl_employee_medical_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_employee_military_info`
--
ALTER TABLE `tbl_employee_military_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_employee_position`
--
ALTER TABLE `tbl_employee_position`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_employee_prev_positions`
--
ALTER TABLE `tbl_employee_prev_positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_employee_skills`
--
ALTER TABLE `tbl_employee_skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_employye_driver_license`
--
ALTER TABLE `tbl_employye_driver_license`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_exist_not_exist`
--
ALTER TABLE `tbl_exist_not_exist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_family_member_types`
--
ALTER TABLE `tbl_family_member_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_languages`
--
ALTER TABLE `tbl_languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_language_knowledge`
--
ALTER TABLE `tbl_language_knowledge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_military_information`
--
ALTER TABLE `tbl_military_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
-- AUTO_INCREMENT for table `tbl_place_expenditure`
--
ALTER TABLE `tbl_place_expenditure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_position_level`
--
ALTER TABLE `tbl_position_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_structure_positions`
--
ALTER TABLE `tbl_structure_positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=238;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD CONSTRAINT `tbl_category_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `tbl_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_employee_position`
--
ALTER TABLE `tbl_employee_position`
  ADD CONSTRAINT `tbl_employee_position_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `tbl_employee_position` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
