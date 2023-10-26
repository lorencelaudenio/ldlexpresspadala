-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql104.infinityfree.com
-- Generation Time: Oct 25, 2023 at 10:05 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_34821151_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `origin` varchar(100) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `config` varchar(256) NOT NULL,
  `logo` varchar(256) NOT NULL,
  `compName` varchar(256) NOT NULL,
  `compAdd` varchar(256) NOT NULL,
  `compContact` varchar(256) NOT NULL,
  `compTagline` varchar(256) NOT NULL,
  `notice` varchar(256) NOT NULL,
  `interest` decimal(3,2) NOT NULL,
  `email` varchar(256) NOT NULL,
  `fb` varchar(256) NOT NULL,
  `mission` varchar(999) NOT NULL,
  `vision` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `config`, `logo`, `compName`, `compAdd`, `compContact`, `compTagline`, `notice`, `interest`, `email`, `fb`, `mission`, `vision`) VALUES
(1, 'config', 'img/logo.png', 'Remit Easy Philippines', 'Makati', '09272053904', 'Seamless Remittances, Happy Recipients.', 'PAALALA: Wag makipagtransact sa hindi kakilala.', '0.05', 'cust@pinoypaypro.com', 'https://facebook.com/remiteasyphilippines', 'Our mission is to empower individuals and businesses with a user-friendly platform for managing Send/Receive Money transactions and money remittance. We are committed to providing accessible, efficient, and customizable solutions that simplify financial transactions, fostering financial inclusion, and enhancing the customer experience.', 'Our vision is to become a trusted and leading provider of financial transaction management solutions. We aspire to continually innovate, adapting to the evolving needs of our users and the financial industry. We aim to be the go-to platform for anyone seeking a secure, user-friendly, and customizable way to handle money remittance and transaction management, making financial transactions seamless and accessible for all.');

-- --------------------------------------------------------

--
-- Table structure for table `online`
--

CREATE TABLE `online` (
  `id` int(11) NOT NULL,
  `origin` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ldlpadalaexpress`
--

CREATE TABLE `tbl_ldlpadalaexpress` (
  `id_no` int(11) NOT NULL,
  `txn_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sender_cp_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dest` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `receiver` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `receiver_cp_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `relship` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `purp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_time_sent` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_time_claimed` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `processed_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `released_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_ldlpadalaexpress`
--

INSERT INTO `tbl_ldlpadalaexpress` (`id_no`, `txn_no`, `status`, `amt`, `sender`, `sender_cp_no`, `dest`, `receiver`, `receiver_cp_no`, `relship`, `purp`, `date_time_sent`, `date_time_claimed`, `processed_by`, `released_by`) VALUES
(2, 'SIG-101723103529-MAK', 'Claimed', '1000', 'Rhose Foronda', '09123456789', 'Makati', 'Yoko Matsunami', '09123456789', 'Admin', 'Deposit', '2023-10-17 10:35:29', '2023-10-17 10:56:08', 'admin - sigma', 'admin - sigma'),
(3, 'SIG-101723104944-MAK', 'Claimed', '1000', 'Rhose Foronda', '09123456789', 'Makati', 'Yoko Matsunami', '09123456789', 'Mother', 'Deposit', '2023-10-17 10:49:44', '2023-10-17 10:53:59', 'admin - sigma', 'admin - sigma'),
(4, 'SIG-101723122306-GIL', 'Claimed', '1000', 'Rhose Foronda', '09123456789', 'Gil Puyat', 'Yoko Matsunami', '09123456789', 'fdfdf', 'Deposit', '2023-10-17 12:23:06', '2023-10-17 12:55:35', 'admin - sigma', 'admin - sigma'),
(5, 'SIG-101823122529-MAK', 'Claimed', '1000', 'Rhose Foronda', '09123456789', 'Makati', 'Yoko Matsunami', '09123456789', 'fdfdfd', 'Deposit', '2023-10-18 12:25:29', '2023-10-20 04:57:57', 'admin - sigma', 'admin - sigma'),
(6, 'SIG-102023051218-MAK', 'Claimed', '1000', 'Rhose Foronda', '09123456789', 'Makati', 'Yoko Matsunami', '09123456789', 'fdfdfd', 'Allowance', '2023-10-20 05:12:18', '2023-10-20 05:12:37', 'admin - sigma', 'admin - sigma'),
(7, 'SIG-102023051953-MAK', 'Claimed', '1000', 'Rhose Foronda', '09123456789', 'Makati', 'Yoko Matsunami', '09123456789', 'Admin', 'Deposit', '2023-10-20 05:19:53', '2023-10-20 05:20:05', 'admin - sigma', 'admin - sigma'),
(8, 'SIG-102023070445-MAK', 'Claimed', '1000', 'Rhose Foronda', '09123456789', 'Makati', 'Yoko Matsunami', '09123456789', 'fdfdfd', 'Deposit', '2023-10-20 07:04:45', '2023-10-24 07:59:30', 'admin - sigma', 'admin - sigma'),
(9, 'SIG-102023071855-MAK', 'Claimed', '1000', 'Rhose Foronda', '09123456789', 'Makati', 'Yoko Matsunami', '09123456789', 'fdfdf', 'Deposit', '2023-10-20 07:18:55', '2023-10-20 07:20:36', 'admin - sigma', 'admin - sigma'),
(10, 'SIG-102023095700-MAK', 'Unclaim', '1000', 'Rhose Foronda', '09123456789', 'Makati', 'Yoko Matsunami', '09123456789', 'fdfdfd', 'Deposit', '2023-10-20 09:57:00', '', 'admin - sigma', ''),
(11, 'SIG-102023100709-MAK', 'Unclaim', '1000', 'Rhose Foronda', '09123456789', 'Makati', 'Yoko Matsunami', '09123456789', 'Mother', 'Deposit', '2023-10-20 10:07:09', '', 'admin - sigma', ''),
(12, 'SIG-102023105226-MAK', 'Claimed', '1000', 'Rhose Foronda', '09123456789', 'Makati', 'Yoko Matsunami', '09123456789', 'fdfd', 'Deposit', '2023-10-20 10:52:26', '2023-10-24 08:26:00', 'admin - sigma', 'admin - sigma'),
(13, 'SIG-102023105318-MAK', 'Claimed', '1000', 'Rhose Foronda', '09123456789', 'Makati', 'Yoko Matsunami', '09123456789', 'gfgf', 'Deposit', '2023-10-20 10:53:18', '2023-10-24 08:05:56', 'admin - sigma', 'admin - sigma'),
(14, 'SIG-102023105437-MAK', 'Claimed', '1000', 'Rhose Foronda', '09123456789', 'Makati', 'Yoko Matsunami', '09123456789', 'gfgf', 'Deposit', '2023-10-20 10:54:37', '2023-10-25 12:09:20', 'admin - sigma', 'admin - sigma'),
(15, 'LEP102023105626', 'Claimed', '1000', 'Rhose Foronda', '09123456789', 'Makati', 'Yoko Matsunami', '09123456789', 'fdfdf', 'Deposit', '2023-10-20 10:56:26', '2023-10-24 07:50:05', 'admin - sigma', 'admin - sigma'),
(16, 'REP102023110108', 'Claimed', '1000', 'Rhose Foronda', '09123456789', 'Makati', 'Yoko Matsunami', '09123456789', 'gfgf', 'Deposit', '2023-10-20 11:01:08', '2023-10-20 11:23:28', 'admin - sigma', 'admin - sigma'),
(17, 'REP102023110306', 'Claimed', '1000', 'Rhose Foronda', '09123456789', 'Makati', 'Yoko Matsunami', '09123456789', 'fdfdfd', 'Deposit', '2023-10-20 11:03:06', '2023-10-20 11:07:36', 'admin - sigma', 'admin - sigma'),
(18, 'REP102023110416', 'Claimed', '1000', 'Rhose Foronda', '09123456789', 'Makati', 'Yoko Matsunami', '09123456789', 'fdfdf', 'Deposit', '2023-10-20 11:04:16', '2023-10-20 11:04:45', 'admin - sigma', 'admin - sigma'),
(19, 'REP102223120639', 'Claimed', '1000', 'Rhose Foronda', '09123456789', 'Makati', 'Yoko Matsunami', '09123456789', 'gfgf', 'Deposit', '2023-10-22 12:06:39', '2023-10-22 12:38:13', 'admin - sigma', 'admin - sigma');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id_no` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `branch` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_enrolled` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id_no`, `username`, `password`, `branch`, `type`, `date_enrolled`) VALUES
(1, 'admin', 'dfc05edcaffc898873222be3500db883', 'sigma', 'admin', '04/07/2020'),
(2, 'lorence', '30ca0a06fa3e19eaed3b4b5a33b8c985', 'mindoro', 'admin', '04/07/2020'),
(3, 'hello', '5d41402abc4b2a76b9719d911017c592', 'sigma', 'emp', '04/09/20 12:16:53'),
(4, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user', 'emp', '04/09/20 01:02:05'),
(5, 'guest', '084e0343a0486ff05530df6c705c8bb4', 'Manila', 'emp', '04/09/20 01:12:40'),
(6, 'paul', '81dc9bdb52d04dc20036dbd8313ed055', 'Dian - Makati', 'emp', '2023-09-21 10:59:56'),
(7, 'soy', '91a5c1de1fb151b6924cbefa6e68fb9b', 'Makati', 'emp', '2023-10-25 04:55:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `online`
--
ALTER TABLE `online`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ldlpadalaexpress`
--
ALTER TABLE `tbl_ldlpadalaexpress`
  ADD PRIMARY KEY (`id_no`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `online`
--
ALTER TABLE `online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1023;

--
-- AUTO_INCREMENT for table `tbl_ldlpadalaexpress`
--
ALTER TABLE `tbl_ldlpadalaexpress`
  MODIFY `id_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
