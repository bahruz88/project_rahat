-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2020 at 07:42 AM
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
-- Table structure for table `tbl_terms_employment_contract`
--

CREATE TABLE `tbl_terms_employment_contract` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `indefinite` int(11) NOT NULL,
  `reasons_temporary_closure` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `date_contract` date NOT NULL,
  `probation` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
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

INSERT INTO `tbl_terms_employment_contract` (`id`, `emp_id`, `company_id`, `indefinite`, `reasons_temporary_closure`, `date_contract`, `probation`, `trial_expiration_date`, `employee_start_date`, `date_conclusion_contract`, `regulation_property_relations`, `termination_cases`, `other_condition_wages`, `workplace_status`, `working_conditions`, `job_description`, `kvota`, `status`, `lang`, `insert_date`, `update_date`) VALUES
(1, 46, 0, 1, 'aa', '2020-09-01', 'bb', '2020-09-02', '2020-09-03', '2020-09-04', 'cc', 'dd', 'ee', 1, 2, 'rrr', 'ttt', 1, 'az', '2020-09-14', '2020-09-15'),
(2, 39, 0, 0, '', '1970-01-01', '1ay', '2020-09-02', '2020-09-23', '1970-01-01', 'dfsdf', 'dsfsdfsdf', '', 1, 1, '', 'gdfgdfgdf', 1, '', '2020-09-15', '0000-00-00'),
(3, 39, 0, 2, 'aAas', '2020-09-08', '1ay', '2020-09-15', '2020-09-15', '2020-09-15', 'dfsdf', 'dsfsdfsdf', 'dfdsfsdfs', 1, 1, 'fdf', 'gdfgdfgdf', 1, '', '2020-09-15', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_terms_employment_contract`
--
ALTER TABLE `tbl_terms_employment_contract`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_terms_employment_contract`
--
ALTER TABLE `tbl_terms_employment_contract`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
