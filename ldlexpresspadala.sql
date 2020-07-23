-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 23, 2020 at 01:05 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id13211271_db_ldlexpress`
--
CREATE DATABASE IF NOT EXISTS `id13211271_db_ldlexpress` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `id13211271_db_ldlexpress`;

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
(1, 'SIG-041220020710-KAL', 'Claimed', '5000', 'Lorence Laudenio', '09488157847', 'Kalibo', 'Ervel Laudenio', '09272053904', 'Family', 'Donation', '2020-04-12 02:07:10', '2020-04-12 02:09:41', 'admin - sigma', 'admin - sigma'),
(2, 'SIG-041220021132-KAL', 'Unclaim', '5000', 'Lorence Laudenio', '09488157847', 'Kalibo', 'Ervel Laudenio', '09272053904', 'Family', 'Allowance', '2020-04-12 02:11:32', '', 'admin - sigma', ''),
(3, 'SIG-041220023026-KAL', 'Unclaim', '5000', 'Lorence Laudenio', '09488157847', 'Kalibo', 'Ervel Laudenio', '09272053904', 'Family', 'Allowance', '2020-04-12 02:30:26', '', 'admin - sigma', ''),
(4, 'SIG-041220023726-SAN', 'Unclaim', '5000', 'Jake Vargas', '09488157847', 'San Jose', 'Ervel Laudenio', '09272053904', 'Family', 'Allowance', '2020-04-12 02:37:26', '', 'admin - sigma', ''),
(5, 'SIG-041220024628-KAL', 'Claimed', '5000', 'Lorence Laudenio', '09488157847', 'Kalibo', 'Ervel Laudenio', '09272053904', 'Family', 'Allowance', '2020-04-12 02:46:28', '2020-04-12 02:59:01', 'admin - sigma', 'admin - sigma'),
(6, 'SIG-041220030244-KAL', 'Claimed', '5000', 'Lorence Laudenio', '09488157847', 'Kalibo', 'Ervel Laudenio', '09272053904', 'Family', 'Allowance', '2020-04-12 03:02:44', '2020-04-12 03:03:15', 'admin - sigma', 'admin - sigma'),
(7, 'USE-041220033431-KAL', 'Claimed', '1000', 'Lorence Laudenio', '09488157847', 'Kalibo', 'Ervel Laudenio', '09272053904', 'Common Friend', 'Allowance', '2020-04-12 03:34:31', '2020-04-12 03:35:21', 'user - user', 'user - user'),
(8, 'SIG-041320100413-KAL', 'Claimed', '5000', 'Lorence Laudenio', '09488157847', 'Kalibo', 'Ervel Laudenio', '09272053904', 'Family', 'Cellphone', '2020-04-13 10:04:13', '2020-07-23 12:40:17', 'admin - sigma', 'admin - sigma'),
(9, 'MIN-043020051100-SAN', 'Claimed', '3000', 'lorence', '09488157847', 'San Jose', 'Dan Aguirre ', '09272053904', 'Friend', 'Allowance', '2020-04-30 05:11:00', '2020-04-30 05:13:20', 'lorence - mindoro', 'lorence - mindoro'),
(10, 'USE-050120035329-SAN', 'Claimed', '6000', 'lorence', '09488157847', 'San Jose', 'Dan Aguirre ', '09272053904', 'hello', 'Allowance', '2020-05-01 03:53:29', '2020-05-01 03:54:53', 'user - user', 'user - user');

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
(1, 'admin', '04072020Ldl', 'sigma', 'admin', '04/07/2020'),
(2, 'lorence', '10151989Ldl', 'mindoro', 'admin', '04/07/2020'),
(3, 'hello', 'hello', 'sigma', 'emp', '04/09/20 12:16:53'),
(4, 'user', 'user', 'user', 'emp', '04/09/20 01:02:05'),
(5, 'guest', 'guest', 'Manila', 'emp', '04/09/20 01:12:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
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
  MODIFY `id_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
