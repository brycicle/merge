-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2023 at 06:42 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `activate_request`
--

CREATE TABLE `activate_request` (
  `id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  `username` varchar(100) NOT NULL,
  `upline_id` varchar(100) DEFAULT NULL,
  `sponsor_id` varchar(100) NOT NULL,
  `position` varchar(20) NOT NULL,
  `ref_num` varchar(100) NOT NULL,
  `upload` varchar(100) NOT NULL,
  `amount` int(12) NOT NULL,
  `description` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `limitedadminid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activate_request`
--

INSERT INTO `activate_request` (`id`, `user_id`, `username`, `upline_id`, `sponsor_id`, `position`, `ref_num`, `upload`, `amount`, `description`, `status`, `date`, `limitedadminid`) VALUES
(166, 187, 'test2', NULL, '33927967775', '', '23423423', 'payment/5.jpg', 2500, 'Payment for Activation Account', 'Waiting', '2023-10-04 13:51:24', 'LA333333331');

-- --------------------------------------------------------

--
-- Table structure for table `admin_withdraw`
--

CREATE TABLE `admin_withdraw` (
  `id` int(12) NOT NULL,
  `withdrawer` varchar(50) NOT NULL,
  `withdrawal_type` varchar(50) NOT NULL,
  `amount` int(12) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `commission`
--

CREATE TABLE `commission` (
  `id` int(12) NOT NULL,
  `DRB` int(12) NOT NULL,
  `pairing_bonus` int(12) NOT NULL,
  `admin_fee` int(12) NOT NULL,
  `si_payment` int(12) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `commission`
--

INSERT INTO `commission` (`id`, `DRB`, `pairing_bonus`, `admin_fee`, `si_payment`, `date`) VALUES
(1, 200, 100, 100, 14988, '2023-09-17 13:37:39');

-- --------------------------------------------------------

--
-- Table structure for table `encashment`
--

CREATE TABLE `encashment` (
  `id` int(12) NOT NULL,
  `usertype` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `tax` varchar(50) NOT NULL,
  `net_balance` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date_request` datetime NOT NULL DEFAULT current_timestamp(),
  `date_approve` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `genealogy`
--

CREATE TABLE `genealogy` (
  `id` int(12) NOT NULL,
  `accountid` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `sponsorid` varchar(50) NOT NULL,
  `uplineid` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `leftdownlineid` varchar(50) DEFAULT NULL,
  `rightdownlineid` varchar(50) DEFAULT NULL,
  `groupid` varchar(50) NOT NULL,
  `limitedadminid` varchar(50) NOT NULL,
  `adminid` varchar(50) NOT NULL,
  `DRB` int(12) NOT NULL,
  `left_count` int(12) NOT NULL,
  `right_count` int(12) NOT NULL,
  `pairing_count_AM` int(12) NOT NULL,
  `pairing_count_PM` int(12) NOT NULL,
  `pairing` int(12) NOT NULL,
  `payin` int(12) NOT NULL,
  `usertype` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `notif` int(12) NOT NULL,
  `admin_fee` int(12) NOT NULL,
  `si_payment` int(12) NOT NULL,
  `tax` int(12) NOT NULL,
  `member_payment` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genealogy`
--

INSERT INTO `genealogy` (`id`, `accountid`, `username`, `sponsorid`, `uplineid`, `position`, `leftdownlineid`, `rightdownlineid`, `groupid`, `limitedadminid`, `adminid`, `DRB`, `left_count`, `right_count`, `pairing_count_AM`, `pairing_count_PM`, `pairing`, `payin`, `usertype`, `status`, `date`, `notif`, `admin_fee`, `si_payment`, `tax`, `member_payment`) VALUES
(1, 'ADMIN-1', 'admin', '', '', '', NULL, NULL, '', '', 'ADMIN-1', 0, 0, 0, 0, 0, 0, 0, 'admin', 'active', '2023-09-06 13:28:11', 1, 100, 0, 0, 5),
(2, 'LA333333331', 'limited', 'MULTI-0001', 'MULTI-0001', 'left', 'F0000000001', 'F0000000002', '', 'LA333333331', 'ADMIN-1', 0, 1, 0, 0, 0, 0, 0, 'limited_admin', 'active', '2023-09-07 22:53:11', 1, 0, 0, 0, 0),
(3, 'LA333333332', 'limited2', 'MULTI-0002', 'MULTI-0002', 'left', NULL, NULL, '', 'LA333333332', 'ADMIN-1', 0, 0, 0, 0, 0, 0, 0, 'limited_admin', 'active', '2023-09-23 22:22:47', 1, 0, 0, 0, 0),
(4, 'HEAD-00001', 'Albert09', 'ADMIN-1', 'ADMIN-1', '', 'MULTI-0001', 'MULTI-0002', 'HEAD-00001', '', 'ADMIN-1', 0, 1, 0, 0, 0, 0, 0, 'head_account', 'active', '2023-09-05 22:48:56', 1, 0, 0, 0, 0),
(7, 'HEAD-00002', 'Mark09', 'ADMIN-1', 'ADMIN-1', '', NULL, NULL, 'HEAD-00002', '', 'ADMIN-1', 0, 0, 0, 0, 0, 0, 0, 'head_account', 'active', '2023-09-18 18:20:03', 1, 0, 0, 0, 0),
(8, 'MULTI-0001', 'multi09', 'HEAD-00001', 'HEAD-00001', 'left', 'LA333333331', NULL, 'HEAD-00001', '', 'ADMIN-1', 0, 1, 0, 0, 0, 0, 0, 'multi_account', 'active', '2023-09-23 21:26:59', 1, 0, 0, 0, 0),
(9, 'MULTI-0002', 'multi10', 'HEAD-00001', 'HEAD-00001', 'right', NULL, NULL, 'HEAD-00001', '', 'ADMIN-1', 0, 0, 0, 0, 0, 0, 0, 'multi_account', 'active', '2023-09-23 22:29:37', 1, 0, 0, 0, 0),
(113, 'F0000000001', 'free1', 'LA333333331', 'LA333333331', 'left', '33927967775', NULL, 'HEAD-00001', 'LA333333331', 'ADMIN-1', 200, 1, 0, 0, 0, 0, 0, 'free_account', 'active', '2023-09-22 16:48:33', 1, 0, 0, 0, 0),
(114, 'F0000000002', 'free2', 'LA333333331', 'LA333333331', 'right', NULL, NULL, 'HEAD-00001', 'LA333333331', 'ADMIN-1', 0, 0, 0, 0, 0, 0, 0, 'free_account', 'active', '2023-09-22 16:50:42', 1, 0, 0, 0, 0),
(137, 'ADMIN-1', 'admin2', '', '', '', NULL, NULL, '', '', 'ADMIN-1', 0, 0, 0, 0, 0, 0, 0, 'admin', 'active', '2023-09-27 16:10:49', 1, 100, 0, 0, 5),
(138, 'ADMIN-1', 'admin3', '', '', '', NULL, NULL, '', '', 'ADMIN-1', 0, 0, 0, 0, 0, 0, 0, 'admin', 'active', '2023-09-27 16:17:50', 1, 100, 0, 0, 5),
(139, 'ADMIN-1', 'admin4', '', '', '', NULL, NULL, '', '', 'ADMIN-1', 0, 0, 0, 0, 0, 0, 0, 'admin', 'active', '2023-09-27 16:19:13', 1, 100, 0, 0, 5),
(143, '33927967775', 'test1', 'F0000000001', 'F0000000001', 'left', NULL, NULL, 'HEAD-00001', 'LA333333331', 'ADMIN-1', 0, 0, 0, 0, 0, 0, 2500, 'user', 'active', '2023-10-04 13:46:32', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `member_withdraw`
--

CREATE TABLE `member_withdraw` (
  `id` int(12) NOT NULL,
  `withdrawal_type` varchar(50) NOT NULL,
  `amount` int(12) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mode_payment`
--

CREATE TABLE `mode_payment` (
  `id` int(12) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `account_num` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mode_payment`
--

INSERT INTO `mode_payment` (`id`, `bank_name`, `account_name`, `account_num`, `amount`, `date`) VALUES
(2, 'BDO Unibank', 'Angelica O. Chan', '003410258900', '2500', '2023-09-17 13:36:21');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  `username` varchar(50) NOT NULL,
  `upline_id` varchar(50) DEFAULT NULL,
  `sponsor_id` varchar(20) NOT NULL,
  `position` varchar(20) NOT NULL,
  `ref_num` varchar(50) NOT NULL,
  `upload` varchar(50) NOT NULL,
  `amount` int(12) NOT NULL,
  `description` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `limitedadminid` varchar(50) NOT NULL,
  `approver` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `user_id`, `username`, `upline_id`, `sponsor_id`, `position`, `ref_num`, `upload`, `amount`, `description`, `status`, `date`, `limitedadminid`, `approver`) VALUES
(351, 186, 'test1', NULL, 'F0000000001', '', '443435', 'payment/5.jpg', 2500, 'Payment for Activation Account', 'Waiting', '2023-10-04 11:20:19', 'LA333333331', ''),
(352, 186, 'test1', '', 'F0000000001', '', '443435', 'payment/5.jpg', 2500, 'Payment for Activation Account', 'Approved', '2023-10-04 13:45:30', 'LA333333331', 'admin'),
(353, 187, 'test2', NULL, '33927967775', '', '23423423', 'payment/5.jpg', 2500, 'Payment for Activation Account', 'Waiting', '2023-10-04 13:51:24', 'LA333333331', '');

-- --------------------------------------------------------

--
-- Table structure for table `pdf_files`
--

CREATE TABLE `pdf_files` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `uploaded_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pdf_files`
--

INSERT INTO `pdf_files` (`id`, `file_name`, `file_path`, `uploaded_at`) VALUES
(1, 'REQUEST-FORM2.pdf', 'uploads/REQUEST-FORM2.pdf', '2023-08-03 09:59:33');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(12) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `accountid` varchar(50) NOT NULL,
  `sponsorid` varchar(50) NOT NULL,
  `groupid` varchar(50) NOT NULL,
  `limitedadminid` varchar(50) NOT NULL,
  `adminid` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usertype` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  `account` varchar(50) NOT NULL,
  `bl_date` datetime NOT NULL,
  `nbl_date` datetime NOT NULL,
  `activate_date` datetime NOT NULL,
  `switch` int(12) NOT NULL,
  `si_switch` int(12) NOT NULL,
  `onn` int(12) NOT NULL,
  `off` int(12) NOT NULL,
  `withdrawal_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `fname`, `lname`, `address`, `email`, `contact`, `username`, `accountid`, `sponsorid`, `groupid`, `limitedadminid`, `adminid`, `position`, `status`, `password`, `usertype`, `date`, `account`, `bl_date`, `nbl_date`, `activate_date`, `switch`, `si_switch`, `onn`, `off`, `withdrawal_status`) VALUES
(16, 'admin2', 'admin2', 'admin2', 'admin2@gmail.com', '090909090909', 'admin2', 'ADMIN-1', '', '', '', 'ADMIN-1', '', 'active account', 'admin212345', 'admin', '2023-09-27 16:10:49', 'unblock', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 1, 0, 'ON'),
(17, 'Peter Paul', 'San Diego', 'Legazpi City, Albay', 'admin0909@gmail.com', '09123456789', 'admin', 'ADMIN-1', '', '', '', 'ADMIN-1', '', 'active account', 'admin0909', 'admin', '2023-07-22 12:40:29', 'unblock', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, 1, 0, 'ON'),
(18, 'Limited', 'Limited', 'Daraga, Albay', 'limited@gmail.com', '09645637849', 'limited', 'LA333333331', 'MULTI-0001', 'MULTI-0001', '', 'ADMIN-1', 'left', 'active account', 'limited12345', 'limited_admin', '2023-09-07 16:48:08', 'unblock', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, 1, 0, 'ON'),
(19, 'limited2', 'limited2', 'Daraga, Albay', 'limited2@gmail.com', '09645637849', 'limited2', 'LA333333332', 'MULTI-0002', 'MULTI-0002', '', 'ADMIN-1', 'left', 'active account', 'limited212345', 'limited_admin', '2023-09-23 16:31:45', 'unblock', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, 1, 0, 'ON'),
(51, 'Albert', 'Danao', 'Legazpi City, Albay', 'albertdanao09@gmal.com', '09736548927', 'Albert09', 'HEAD-00001', 'ADMIN-1', 'HEAD-00001', '', 'ADMIN-1', '', 'active account', 'albert12345', 'head_account', '2023-08-07 17:20:57', 'unblock', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, 1, 0, 'ON'),
(52, 'Mark', 'Bandol', 'Daraga, Albay', 'markbandol@gmail.com', '09876543212', 'Mark09', 'HEAD-00002', 'ADMIN-1', 'HEAD-00002', '', 'ADMIN-1', '', 'active account', 'mark12345', 'head_account', '2023-09-18 18:20:03', 'unblock', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, 1, 0, 'ON'),
(150, 'free1', 'free1', 'Daraga, Albay', 'free1@gmail.com', '09876543212', 'free1', 'F0000000001', 'LA333333331', 'HEAD-00001', 'LA333333331', 'ADMIN-1', 'left', 'active account', 'free12345', 'free_account', '2023-09-22 10:38:59', 'unblock', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, 1, 0, 'ON'),
(151, 'free2', 'free2', 'Daraga, Albay', 'free2@gmail.com', '09645637849', 'free2', 'F0000000002', 'LA333333331', 'HEAD-00001', 'LA333333331', 'ADMIN-1', 'right', 'active account', 'free212345', 'free_account', '2023-09-22 10:42:50', 'unblock', '2023-09-23 20:38:08', '2023-09-23 20:43:49', '0000-00-00 00:00:00', 1, 1, 1, 0, 'ON'),
(157, 'multi09', 'multi09', 'Daraga, Albay', 'multi@gmail.com', '09645637849', 'multi09', 'MULTI-0001', 'HEAD-00001', 'HEAD-00001', '', 'ADMIN-1', 'left', 'active account', 'multi12345', 'multi_account', '2023-09-23 15:20:14', 'unblock', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, 1, 0, 'ON'),
(160, 'multi10', 'multi10', 'Daraga, Albay', 'multi10@gmail.com', '09645637849', 'multi10', 'MULTI-0002', 'HEAD-00001', 'HEAD-00001', '', 'ADMIN-1', 'right', 'active account', 'multi1012345', 'multi_account', '2023-09-23 16:35:20', 'unblock', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, 1, 0, 'ON'),
(178, 'admin3', 'admin3', 'admin3', 'admin3@gmail.com', '090909090909', 'admin3', 'ADMIN-1', '', '', '', 'ADMIN-1', '', 'active account', 'admin312345', 'admin', '2023-09-27 16:17:50', 'unblock', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 1, 0, 'ON'),
(179, 'admin4', 'admin4', 'admin4', 'admin4@gmail.com', '090909090909', 'admin4', 'ADMIN-1', '', '', '', 'ADMIN-1', '', 'active account', 'admin41234', 'admin', '2023-09-27 16:19:13', 'unblock', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 1, 0, 'ON'),
(186, 'test1', 'test1', 'address', 'email@gmail.com', '09305280879', 'test1', '33927967775', 'F0000000001', 'HEAD-00001', 'LA333333331', 'ADMIN-1', 'xxxxx', 'active account', 'test112345', 'user', '2023-10-04 11:20:05', 'unblock', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0, 0, ''),
(187, 'test2', 'tes2', 'address', 'email@gmail.com', '09305280879', 'test2', 'xxxxx', '33927967775', 'HEAD-00001', 'LA333333331', 'ADMIN-1', '', 'inactive account', 'test212345', 'user', '2023-10-04 13:50:52', 'unblock', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `reset_pairing`
--

CREATE TABLE `reset_pairing` (
  `id` int(12) NOT NULL,
  `admin_reseter` varchar(50) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reset_pairing`
--

INSERT INTO `reset_pairing` (`id`, `admin_reseter`, `date`) VALUES
(1, 'admin', '2023-10-03 16:26:39');

-- --------------------------------------------------------

--
-- Table structure for table `si_request`
--

CREATE TABLE `si_request` (
  `id` int(12) NOT NULL,
  `accountid` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `sponsorid` varchar(50) NOT NULL,
  `si_payment` int(12) NOT NULL,
  `status` varchar(50) NOT NULL,
  `upload` varchar(100) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `r_date` datetime NOT NULL DEFAULT current_timestamp(),
  `a_date` datetime NOT NULL,
  `d_date` datetime NOT NULL,
  `limitedadminid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `si_withdraw`
--

CREATE TABLE `si_withdraw` (
  `id` int(12) NOT NULL,
  `withdrawal_type` varchar(50) NOT NULL,
  `amount` int(12) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tax_withdraw`
--

CREATE TABLE `tax_withdraw` (
  `id` int(12) NOT NULL,
  `withdrawal_type` varchar(50) NOT NULL,
  `amount` int(12) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wallet_balance`
--

CREATE TABLE `wallet_balance` (
  `id` int(12) NOT NULL,
  `username` varchar(50) NOT NULL,
  `wallet` int(12) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `DRB` int(12) NOT NULL,
  `pairing` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wallet_balance`
--

INSERT INTO `wallet_balance` (`id`, `username`, `wallet`, `date`, `DRB`, `pairing`) VALUES
(1, 'limited', 0, '2023-09-23 21:04:43', 0, 100),
(2, 'limited2', 0, '2023-09-23 22:21:49', 0, 0),
(16, 'Albert09', 0, '2023-09-21 21:19:19', 0, 1100),
(19, 'Mark09', 0, '2023-09-23 22:38:33', 0, 0),
(20, 'admin2', 0, '2023-09-24 15:46:48', 0, 0),
(22, 'admin3', 0, '2023-09-27 16:17:50', 0, 0),
(23, 'admin4', 0, '2023-09-27 16:19:13', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `withdrawal_set`
--

CREATE TABLE `withdrawal_set` (
  `id` int(12) NOT NULL,
  `reseter` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `withdrawal_set`
--

INSERT INTO `withdrawal_set` (`id`, `reseter`, `status`, `date`) VALUES
(2, 'admin2', 'ON', '2023-09-27 22:10:34'),
(3, 'admin2', 'OFF', '2023-09-27 22:20:10'),
(4, 'admin', 'ON', '2023-10-04 06:51:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activate_request`
--
ALTER TABLE `activate_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_withdraw`
--
ALTER TABLE `admin_withdraw`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commission`
--
ALTER TABLE `commission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `encashment`
--
ALTER TABLE `encashment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genealogy`
--
ALTER TABLE `genealogy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_withdraw`
--
ALTER TABLE `member_withdraw`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mode_payment`
--
ALTER TABLE `mode_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pdf_files`
--
ALTER TABLE `pdf_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reset_pairing`
--
ALTER TABLE `reset_pairing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `si_request`
--
ALTER TABLE `si_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `si_withdraw`
--
ALTER TABLE `si_withdraw`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tax_withdraw`
--
ALTER TABLE `tax_withdraw`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallet_balance`
--
ALTER TABLE `wallet_balance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawal_set`
--
ALTER TABLE `withdrawal_set`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activate_request`
--
ALTER TABLE `activate_request`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `admin_withdraw`
--
ALTER TABLE `admin_withdraw`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `commission`
--
ALTER TABLE `commission`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `encashment`
--
ALTER TABLE `encashment`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `genealogy`
--
ALTER TABLE `genealogy`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `member_withdraw`
--
ALTER TABLE `member_withdraw`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mode_payment`
--
ALTER TABLE `mode_payment`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=354;

--
-- AUTO_INCREMENT for table `pdf_files`
--
ALTER TABLE `pdf_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT for table `reset_pairing`
--
ALTER TABLE `reset_pairing`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `si_request`
--
ALTER TABLE `si_request`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `si_withdraw`
--
ALTER TABLE `si_withdraw`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tax_withdraw`
--
ALTER TABLE `tax_withdraw`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wallet_balance`
--
ALTER TABLE `wallet_balance`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `withdrawal_set`
--
ALTER TABLE `withdrawal_set`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
