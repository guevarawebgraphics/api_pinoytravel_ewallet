-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2019 at 01:25 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resellerdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `top_up_history`
--

CREATE TABLE `top_up_history` (
  `id` bigint(8) NOT NULL,
  `userId` bigint(8) NOT NULL,
  `txnid` varchar(50) NOT NULL,
  `dpRefNO` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `dpProcID` varchar(50) NOT NULL,
  `refCode` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `paymentId` varchar(30) NOT NULL,
  `paymentDesc` varchar(50) NOT NULL,
  `amount` decimal(13,2) NOT NULL,
  `is_paid` int(11) NOT NULL DEFAULT 1,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `top_up_history`
--

INSERT INTO `top_up_history` (`id`, `userId`, `txnid`, `dpRefNO`, `status`, `dpProcID`, `refCode`, `email`, `paymentId`, `paymentDesc`, `amount`, `is_paid`, `created_at`, `updated_at`) VALUES
(1, 3, 'AAA', 'AAA', 'AAA', 'AAA', 'AAA', 'AAA', '1', 'DRAGONPAY', '10000.00', 1, '2019-08-27', '2019-08-21'),
(2, 3, 'BBB', 'BBB', 'BBB', 'BBB', 'BBB', 'BBB', '1', 'DRAGONPAY', '5000.00', 1, '2019-08-13', '2019-08-29'),
(3, 9, 'CCC', 'CCC', 'CCC', 'CCC', 'CCC', 'CCC', '1', 'DRAGONPAY', '10000.00', 1, '2019-08-06', '2019-08-13'),
(4, 9, 'DDD', 'DDD', 'DDD', 'DDD', 'DDD', 'DDD', '1', 'DRAGONPAY', '150.00', 1, '2019-08-05', '2019-08-05');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_details`
--

CREATE TABLE `transaction_details` (
  `id` bigint(8) NOT NULL,
  `userId` bigint(8) NOT NULL,
  `merchId` varchar(50) NOT NULL,
  `transId` varchar(50) NOT NULL,
  `amount` decimal(13,2) NOT NULL,
  `refCode` varchar(50) NOT NULL,
  `transEmail` varchar(50) NOT NULL,
  `procId` varchar(50) NOT NULL,
  `deleted` int(2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_details`
--

INSERT INTO `transaction_details` (`id`, `userId`, `merchId`, `transId`, `amount`, `refCode`, `transEmail`, `procId`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-14 16:00:00', '2019-08-14 16:00:00'),
(2, 9, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-19 16:00:00', '2019-08-19 16:00:00'),
(3, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-01 16:00:00', '2019-08-01 16:00:00'),
(4, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-01 22:32:11', '2019-08-01 22:32:11'),
(5, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-01 22:34:53', '2019-08-01 22:34:53'),
(6, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-01 22:34:58', '2019-08-01 22:34:58'),
(7, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-01 23:18:38', '2019-08-01 23:18:38'),
(8, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-01 23:18:39', '2019-08-01 23:18:39'),
(9, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-01 23:21:10', '2019-08-01 23:21:10'),
(10, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-01 23:32:01', '2019-08-01 23:32:01'),
(11, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-01 23:32:19', '2019-08-01 23:32:19'),
(12, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-02 00:31:46', '2019-08-02 00:31:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_blocked` tinyint(4) DEFAULT NULL,
  `on_hold` tinyint(4) DEFAULT NULL,
  `wallet_bal` decimal(13,2) DEFAULT NULL,
  `is_admin` tinyint(4) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` bigint(2) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `address`, `contact_no`, `is_blocked`, `on_hold`, `wallet_bal`, `is_admin`, `remember_token`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'Sample One', 'sampOne@gmail.com', '2019-06-05 14:45:56', '123qwe', 'Sample Onee', '09184352441', 0, 0, '0.00', 1, NULL, 0, '2019-06-05 14:48:09', '2019-06-05 14:48:09'),
(2, 'Juan Dela Cruz', 'juandelacruz@gmail.com', NULL, '$2y$10$9pIU.awsdzuP0bjRhmbrKeKLlnwa2tPfLTB0kOpdPbJjlvRJ.ACRy', 'Sample Twoo', '09852421542', 0, 0, '0.00', 1, NULL, 0, '2019-06-05 15:16:18', '2019-06-05 15:16:18'),
(3, 'Keigh Dee', 'keighdee@gmail.com', NULL, '$2y$10$2Fgnu7sK0STxr9IuNHjz5u42/8dmBSvEO0NtViUZBbVQ5XvmMQ2qq', 'Sample Threee', '09562542154', 0, 0, '0.00', 0, NULL, 0, '2019-06-06 10:27:19', '2019-06-12 10:02:13'),
(9, 'King RG', 'rgplayed@gmail.com', NULL, '$2y$10$Ts8kOHLePyULSS6Z.nKVWeQhL4rb9wSAfyhgUBAPv5vGENXEN/0Q.', 'Samplef', '09254214524', 0, 0, '0.00', 0, NULL, 0, '2019-06-09 13:38:04', '2019-06-12 10:05:53');

-- --------------------------------------------------------

--
-- Stand-in structure for view `user_balance`
-- (See below for the actual view)
--
CREATE TABLE `user_balance` (
`userId` int(10) unsigned
,`total_topup` decimal(35,2)
,`total_balance` decimal(36,2)
);

-- --------------------------------------------------------

--
-- Structure for view `user_balance`
--
DROP TABLE IF EXISTS `user_balance`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_balance`  AS  select `a`.`id` AS `userId`,(select sum(`tuhh`.`amount`) from `top_up_history` `tuhh` where `tuhh`.`userId` = `a`.`id`) AS `total_topup`,(select sum(`tuh`.`amount`) from `top_up_history` `tuh` where `tuh`.`userId` = `a`.`id`) - (select sum(`tr`.`amount`) from `transaction_details` `tr` where `tr`.`userId` = `a`.`id`) AS `total_balance` from ((`users` `a` left join `top_up_history` `b` on(`a`.`id` = `b`.`userId`)) left join `transaction_details` `c` on(`a`.`id` = `c`.`userId`)) where `b`.`is_paid` = 1 group by `a`.`id` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `top_up_history`
--
ALTER TABLE `top_up_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `top_up_history`
--
ALTER TABLE `top_up_history`
  MODIFY `id` bigint(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `id` bigint(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
