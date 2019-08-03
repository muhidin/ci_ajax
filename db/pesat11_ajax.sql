-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 03, 2019 at 06:53 AM
-- Server version: 5.7.27-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pesat11_ajax`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `first_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gender` enum('Male','Female') COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=Active | 0=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `first_name`, `last_name`, `email`, `gender`, `country`, `created`, `modified`, `status`) VALUES
(1, 'Tes', 'Dah Ok', 'email@aja.nih', 'Male', 'English', '2019-02-09 11:03:27', '2019-02-09 11:03:27', 1),
(2, 'Faza', 'Joe', 'faza@joe.ardiansyaah', 'Male', 'Cibinong', '2019-02-09 11:07:10', '2019-02-09 11:07:10', 1),
(3, 'tar', 'dulu', 'yah@aja.deh', 'Male', 'tes', '2019-02-09 11:33:11', '2019-02-09 11:33:11', 1),
(4, 'Siakoe', 'nih', 'nih@gmail.aja', 'Male', 'Indonesia', '2019-08-03 06:52:59', '2019-08-03 06:52:59', 1);

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `id` int(5) NOT NULL,
  `voucher` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voucher`
--

INSERT INTO `voucher` (`id`, `voucher`) VALUES
(1, 'jkkg6776Hjsde'),
(2, 'fdgghfh467474'),
(5, 'HJFGHFHJFG65438'),
(6, 'HJFGHFG6543879b'),
(7, 'HJHFG65479bhjgk'),
(11, 'HJHFG65479bhjgk'),
(13, 'HJHFG65479bhjgk'),
(14, 'HJHFG65479bhjgk'),
(16, 'HJHFG65479bhjgk'),
(17, 'HJHFG65479bhjgk'),
(18, 'HJHFG65479bhjgk'),
(19, 'HJHFG65479bhjgk'),
(20, 'HJHFG65479bhjgk'),
(21, 'HJHFG65479bhjgk'),
(22, 'HJHFG65479bhjgk'),
(23, '32323OJJHH'),
(24, '32323OJJHH'),
(25, '35OGNN661HJA7QF'),
(26, 'B5C11MMGILCT6RR'),
(27, '45RDF7R8LTQ4BLE'),
(28, '5RFMLJ077I7J0BS'),
(29, 'CD5S7K6H8FRP78A'),
(30, 'RMO2J1IGQOROH2G'),
(31, '1PMQR9HOOK3TAKA'),
(32, 'SQ96K8F9KO98FKC'),
(33, 'H8TF93033Q5D8H3'),
(34, '8B0BI42D4H5DAEM'),
(35, '7444J5H460FPQHM'),
(36, '066MK3GHDD2BNRL'),
(37, 'DR2E2BKQPQTJG2A'),
(38, 'UTS22AK5JA7F35O'),
(39, 'FE544CHC60DTT52'),
(40, 'NGGSEG7B2Q33752');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
