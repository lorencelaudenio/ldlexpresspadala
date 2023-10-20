-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2023 at 07:22 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id13211271_db_ldlexpress`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `origin` varchar(100) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
  `interest` decimal(3,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `config`, `logo`, `compName`, `compAdd`, `compContact`, `compTagline`, `notice`, `interest`) VALUES
(1, 'config', 'img/logo.png', 'LDL Express Padalaaa', 'Makati', '09272053904', 'Walang kuskos Balungos', 'PAALALA: Wag makipagtransact sa hindi kakilala.', 0.05);

-- --------------------------------------------------------

--
-- Table structure for table `online`
--

CREATE TABLE `online` (
  `id` int(11) NOT NULL,
  `origin` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ldlpadalaexpress`
--

CREATE TABLE `tbl_ldlpadalaexpress` (
  `id_no` int(11) NOT NULL,
  `txn_no` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `amt` varchar(255) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `sender_cp_no` varchar(255) NOT NULL,
  `dest` varchar(255) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `receiver_cp_no` varchar(255) NOT NULL,
  `relship` varchar(255) NOT NULL,
  `purp` varchar(255) NOT NULL,
  `date_time_sent` varchar(255) NOT NULL,
  `date_time_claimed` varchar(255) NOT NULL,
  `processed_by` varchar(255) NOT NULL,
  `released_by` varchar(255) NOT NULL
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
(8, 'SIG-102023070445-MAK', 'Unclaim', '1000', 'Rhose Foronda', '09123456789', 'Makati', 'Yoko Matsunami', '09123456789', 'fdfdfd', 'Deposit', '2023-10-20 07:04:45', '', 'admin - sigma', ''),
(9, 'SIG-102023071855-MAK', 'Claimed', '1000', 'Rhose Foronda', '09123456789', 'Makati', 'Yoko Matsunami', '09123456789', 'fdfdf', 'Deposit', '2023-10-20 07:18:55', '2023-10-20 07:20:36', 'admin - sigma', 'admin - sigma');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id_no` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `date_enrolled` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id_no`, `username`, `password`, `branch`, `type`, `date_enrolled`) VALUES
(1, 'admin', '04072020Ldl', 'sigma', 'admin', '04/07/2020'),
(2, 'lorence', '10151989Ldl', 'mindoro', 'admin', '04/07/2020'),
(3, 'hello', 'hello', 'sigma', 'emp', '04/09/20 12:16:53'),
(4, 'user', 'user', 'user', 'emp', '04/09/20 01:02:05'),
(5, 'guest', 'guest', 'Manila', 'emp', '04/09/20 01:12:40'),
(6, 'paul', '1234', 'Dian - Makati', 'emp', '2023-09-21 10:59:56');

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
  MODIFY `id_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
