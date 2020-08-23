-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2020 at 11:59 AM
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
-- Table structure for table `folder`
--

CREATE TABLE `folder` (
  `idFolder` int(11) DEFAULT NULL,
  `FolderName` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idFolderParent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `folder`
--

INSERT INTO `folder` (`idFolder`, `FolderName`, `idFolderParent`) VALUES
(1, 'ADoc', NULL),
(2, 'ADoc1', 1),
(3, 'ADoc2', 2),
(4, 'ADoc3', 3),
(5, 'ADoc4', 4),
(6, 'ADoc5', 5),
(7, 'ADoc6', 4),
(8, 'ADoc7', 1);

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
  `company_id` int(11) DEFAULT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `insert_date` date NOT NULL DEFAULT current_timestamp(),
  `update_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `category`, `parent`, `code`, `icon`, `structure_level`, `position_level`, `company_id`, `emp_id`, `create_date`, `end_date`, `insert_date`, `update_date`) VALUES
(81, 'Cybernet', NULL, 'S00000001', 'images/icons/box1.png', 1, 0, 1, 0, '1900-01-01', '9999-12-31', '2020-08-19', '2020-08-19 17:04:36'),
(83, 'ggg', 81, 'S00000003', 'images/icons/box1.png', 2, 0, 1, 0, '1900-01-01', '9999-12-31', '2020-08-19', '2020-08-19 17:06:50'),
(93, 'Casioglu', NULL, 'S00000006', 'images/icons/box1.png', 4, 0, 2, 0, '1900-01-01', '9999-12-31', '2020-08-19', '2020-08-19 21:54:00'),
(99, 'bb', 83, 'P00000002', 'images/icons/man2.png', 0, 1, 1, 44, '2020-07-01', '2020-07-08', '2020-08-19', '2020-08-19 21:57:20'),
(113, 'www', 83, 'P00000003', 'images/icons/man2.png', 0, 1, 1, 39, '1900-01-01', '9999-12-31', '2020-08-20', '2020-08-20 14:47:05'),
(116, 'pp', 83, 'P00000001', 'images/icons/man2.png', 0, 1, 1, 46, '1900-01-01', '9999-12-31', '2020-08-20', '2020-08-20 15:31:12'),
(164, 'gggaaa', 93, 'S00000002', 'images/icons/box1.png', 4, 0, 2, 0, '1900-01-01', '9999-12-31', '2020-08-21', '2020-08-21 17:20:51'),
(165, 'ddd', 164, 'P00000004', 'images/icons/capman3.png', 0, 2, 2, 38, '1900-01-01', '9999-12-31', '2020-08-21', '2020-08-21 17:22:59'),
(166, 'aaa', 164, 'P00000005', 'images/icons/man2.png', 0, 1, 2, 41, '1900-01-01', '9999-12-31', '2020-08-21', '2020-08-21 17:35:58'),
(169, 'sss', NULL, 'S00000007', 'images/icons/box1.png', 1, 0, 0, 0, '1900-01-01', '9999-12-31', '2020-08-21', '2020-08-21 17:42:18'),
(170, 'ffff', NULL, 'S00000008', 'images/icons/box1.png', 2, 0, 0, 0, '1900-01-01', '9999-12-31', '2020-08-21', '2020-08-21 17:43:05'),
(171, 'sss', NULL, 'S00000009', 'images/icons/box1.png', 3, 0, 0, 0, '1900-01-01', '9999-12-31', '2020-08-21', '2020-08-21 17:46:31'),
(172, 'sss', NULL, 'S00000010', 'images/icons/box1.png', 2, 0, 0, 0, '1900-01-01', '9999-12-31', '2020-08-21', '2020-08-21 17:47:39'),
(173, 'sss', NULL, 'S00000011', 'images/icons/box1.png', 1, 0, 0, 0, '1900-01-01', '9999-12-31', '2020-08-21', '2020-08-21 17:48:18'),
(174, 'ssss', NULL, 'S00000012', 'images/icons/box1.png', 3, 0, 0, 0, '1900-01-01', '9999-12-31', '2020-08-21', '2020-08-21 17:50:50'),
(175, 'sssss', NULL, 'S00000013', 'images/icons/box1.png', 2, 0, 0, 0, '1900-01-01', '9999-12-31', '2020-08-21', '2020-08-21 17:52:06'),
(176, 'dddd', NULL, 'S00000015', 'images/icons/box1.png', 3, 0, 0, 0, '1900-01-01', '9999-12-31', '2020-08-21', '2020-08-21 17:57:19'),
(178, 'Casioglu innovativ', NULL, 'S00000016', 'images/icons/box1.png', 4, 0, 2, 38, '1900-01-01', '9999-12-31', '2020-08-21', '2020-08-21 18:00:25'),
(179, 'aaaaa', NULL, 'S00000004', 'images/icons/box1.png', 1, 0, 0, 0, '1900-01-01', '9999-12-31', '2020-08-21', '2020-08-21 21:46:21'),
(180, 'ddd', NULL, 'S00000005', 'images/icons/box1.png', 1, 0, 0, 0, '1900-01-01', '9999-12-31', '2020-08-21', '2020-08-21 21:46:46'),
(181, 'dddd', NULL, 'S00000014', 'images/icons/box1.png', 2, 0, 2, 0, '1900-01-01', '9999-12-31', '2020-08-21', '2020-08-21 21:48:49'),
(182, 'aaa', 83, 'P00000006', 'images/icons/man2.png', 0, 1, 1, 44, '1900-01-01', '9999-12-31', '2020-08-22', '2020-08-22 17:49:25'),
(184, 'IT', 81, 'S00000017', 'images/icons/box1.png', 3, 0, 1, 0, '1900-01-01', '9999-12-31', '2020-08-22', '2020-08-22 22:15:56'),
(185, 'IT1', 184, 'P00000007', 'images/icons/man2.png', 0, 1, 1, 39, '1900-01-01', '9999-12-31', '2020-08-22', '2020-08-22 22:16:11'),
(186, 'aaa', NULL, 'S00000018', 'images/icons/box1.png', 1, 0, 0, 0, '1900-01-01', '9999-12-31', '2020-08-23', '2020-08-23 13:20:24'),
(187, 'aaa', NULL, 'S00000019', 'images/icons/box1.png', 2, 0, 0, 0, '1900-01-01', '9999-12-31', '2020-08-23', '2020-08-23 13:24:07'),
(188, 'iiii', NULL, 'S00000020', 'images/icons/box1.png', 1, 0, 0, 0, '1900-01-01', '9999-12-31', '2020-08-23', '2020-08-23 13:25:32'),
(189, 'jjj', 178, 'S00000021', 'images/icons/box1.png', 2, 0, 2, 0, '1900-01-01', '9999-12-31', '2020-08-23', '2020-08-23 13:25:42'),
(190, 'kkkk', 189, 'P00000008', 'images/icons/man2.png', 0, 1, 2, 38, '1900-01-01', '9999-12-31', '2020-08-23', '2020-08-23 13:30:30');

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
(51, 41, 0, 'Casioglu', NULL, NULL, '123', 'dddd', '7777777', '777777', '', '', '', '1900-01-01', '', '', '', '', '', '', '\r\n    ', '', '', '', '', '', '1970-01-01', '', '', '', '', '1970-01-01', '2020-08-14');

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
(40, 3, 'Tahir', 'Memmedov', '?akir', 1, 1, '2020-02-13', 'Qax  rayonu ?mircan k?ndi', 'Az?rbaycanli', '2q87s71', 'AZ456789', '2020-02-03', '2020-02-11', 'Asan2', 'Bak? ??h?ri X?rdalan', 'Baki seheri xetai rayonu', '58886754', '014458798', 'bahruzqasimov@gmail.com', '0552380188', 1, 'PM91611607', 'images/users/SPM91611607.png'),
(41, 2, 'Orxan', 'Mustafa', 'Fikrət', 1, 2, '2020-02-13', 'Baki  azerbaycan', 'Azərbaycanli', '2q87s71', 'AZ456789', '2020-02-03', '2020-02-11', 'Asan2', 'Bakı şəhəri ', 'Baki seheri ', '58886754', '014458798', 'bahruzqasimov@gmail.com', '0552380188', 1, 'OE19872145', ''),
(44, 1, 'Ravin', 'Məmmədov', 'Paşa', 1, 2, '1989-08-01', 'Bakı', 'AZERBAYCAN', '45DF56RE', 'AZE123456', '2020-05-03', '2020-05-19', 'ASAN2', 'Bakı şəhəri', 'Bakı şəhəri', '0527898895', '1248792', 'ravin@gmail.com', '012897456', 1, 'PQ35486847', ''),
(46, 1, 'Mayya', 'Soltanova', 'Ənnaqı', 2, 1, '2020-06-04', 'Azerbaycan ', 'Nizami', '123456', '6543215', '2020-06-01', '2020-06-30', '', 'Nizami Rizvan Teymurov', 'Sabirabad rayonu', '0125465454', '0558092990', 'mayyasoltanova@GMAIL.COM', '', 1, '9004', 'images/users/S-9004.png'),
(59, 3, 'Mayya', 'erer', 'Ennaqi', 1, 1, '1970-01-01', '', '', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', 'sarallahnur1@gmail.com', '', 1, 'LY26883007', 'images/users/def.png');

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
(50, 5, 39, '', 1, 'cybernet MMC', 'aaaa ssss dddd', '123456', '12344', '4332111', 'Direktor', 'Ilham', 'Bakalavr', 'BDU', 'IT', '2020-07-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-08-22'),
(51, 5, 44, '', 1, 'cybernet MMC', 'aaaa ssss dddd', '123456', '12344', '4332111', 'Direktor', 'Ilham', 'Bakalavr', 'BDU', 'IT', '2020-07-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-08-22');

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
  `insert_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `insert_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_employee_company`
--

INSERT INTO `tbl_employee_company` (`id`, `company_name`, `voen`, `sun`, `bank_name`, `bank_filial`, `kod`, `bank_voen`, `cor_account`, `swift`, `azn_account`, `usd_account`, `eur_account`, `country`, `city`, `address`, `poct_index`, `tel`, `enterprise_head_fullname`, `enterprise_head_position`, `founder`, `insert_date`, `update_date`, `insert_user`, `update_user`, `status`) VALUES
(1, 'cybernet MMC', 1234, '3453', 'accessw', 'access filiald', '1232', 43211, 'sdssss1', 'tew34444441', '121', '341', '551', 'azerbw', 'bakiw', 'qarayevw', '1002w', '0558092990w', 'ssssw', 'dddde', 'gggggggw22', NULL, NULL, NULL, NULL, 1),
(2, 'Casioglu', 123, 'dddd', 'qwwww', 'dfdsf', 'ffff', 2147483647, 'werwe', '7777', 'werwer', '7777', '777', '777', '777', '777', '777', '7777777777777', '777777', '7777777', '777777777', NULL, NULL, NULL, NULL, 1),
(3, 'sss', 2147483647, 'ssss', 'qwwww', 'sss', 'ssss', 2147483647, 'werwe', 'edddddd', 'ddddddd', 'ddddd', 'dddddd', 'ddddddd', 'ddddddddddddd', 'dddddddddddd', 'dddddddd', 'ddddddddd', 'ddddddddddd', 'dddddddddd', 'ddddddddddd', NULL, NULL, NULL, NULL, 1);

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
(7, 46, 1, 1, '2020-05-06', 2, '222wqwqwqwsa', 0, 0, '0000-00-00', '0000-00-00', 1);

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
-- Table structure for table `tbl_position_level`
--

CREATE TABLE `tbl_position_level` (
  `id` int(11) NOT NULL,
  `posit_id` int(11) NOT NULL,
  `title` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `posit_icon` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_position_level`
--

INSERT INTO `tbl_position_level` (`id`, `posit_id`, `title`, `posit_icon`) VALUES
(1, 1, 'İsçi ', 'images/icons/man2.png'),
(2, 2, 'Rəhbər', 'images/icons/capman3.png');

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
  `title` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_structure_level`
--

INSERT INTO `tbl_structure_level` (`id`, `struc_id`, `title`) VALUES
(1, 1, 'Müəssisə'),
(2, 2, 'Direktorluq'),
(3, 3, 'Departament'),
(4, 4, 'Şöbə'),
(5, 5, 'Sahə / Bölmə');

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
(108, 0, 46, 1, 'P00000002', 10, NULL, '2020-07-01', '2020-07-08'),
(116, 2, 39, 1, 'P00000003', 100, NULL, '1900-01-01', '9999-12-31'),
(122, 3, 46, 1, 'P00000001', 100, NULL, '1900-01-01', '9999-12-31'),
(123, 4, 39, 1, 'P00000003', 100, NULL, '1900-01-01', '9999-12-31'),
(124, 1, 38, 2, 'P00000005', 100, NULL, '1900-01-01', '9999-12-31'),
(125, 2, 38, 2, 'P00000004', 100, NULL, '1900-01-01', '9999-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_structure_roles`
--

CREATE TABLE `tbl_structure_roles` (
  `id` int(11) NOT NULL,
  `role` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_structure_roles`
--

INSERT INTO `tbl_structure_roles` (`id`, `role`) VALUES
(1, 'İnsan resursları təmsilçisi'),
(2, 'Baş mühasib'),
(3, 'Birbaşa rəhbər'),
(4, 'İkinci rəhbər');

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
-- Indexes for table `tbl_position_level`
--
ALTER TABLE `tbl_position_level`
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
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `tbl_driver_lic_cat`
--
ALTER TABLE `tbl_driver_lic_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_employees`
--
ALTER TABLE `tbl_employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `tbl_employee_certification`
--
ALTER TABLE `tbl_employee_certification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_employee_commands`
--
ALTER TABLE `tbl_employee_commands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `tbl_employee_company`
--
ALTER TABLE `tbl_employee_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_employee_education`
--
ALTER TABLE `tbl_employee_education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_employee_family_info`
--
ALTER TABLE `tbl_employee_family_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_employee_medical_information`
--
ALTER TABLE `tbl_employee_medical_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- AUTO_INCREMENT for table `tbl_position_level`
--
ALTER TABLE `tbl_position_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `tbl_structure_roles`
--
ALTER TABLE `tbl_structure_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
