-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2019 at 12:30 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.2.20

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
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('17e582527d8215f0eba9b46fca5601eb2d43ae06eb3eeb31d1ee64709a4391713c7a35e233782457', 3, 2, NULL, '[]', 0, '2019-08-28 02:36:48', '2019-08-28 02:36:48', '2019-08-29 10:36:47'),
('204a93e0ac3a27bf466c3b8f60820db48299d6903864431bd9aa741bb236bc7279738e369df5b477', 3, 2, NULL, '[]', 0, '2019-08-05 01:57:21', '2019-08-05 01:57:21', '2019-08-06 09:57:21'),
('26602be1dafcdeaf83a258d1d214eaa7d06828462c891dea557130db3510a76a2b664959e9aa28b6', 3, 2, NULL, '[]', 0, '2019-08-05 09:38:36', '2019-08-05 09:38:36', '2019-08-06 17:38:36'),
('3d0fccae05b9b414a28551a16203f473f4db2ee7b8694cc2c62fd655b19e263152b6615e89b0d3cf', 3, 2, NULL, '[]', 0, '2019-08-19 10:26:21', '2019-08-19 10:26:21', '2019-08-20 18:26:20'),
('4218c67a280d90ef78ee4c3091bd7dee3825542710f5e40c3a77d623a8ff27140d6783964560b087', 3, 2, NULL, '[]', 0, '2019-09-09 03:05:22', '2019-09-09 03:05:22', '2019-09-10 11:05:22'),
('4453829f47145d7c741a4573a34fc047a88844658374efc41bb5f41cf9e9b567129a82dec0d4ddd4', 3, 2, NULL, '[]', 1, '2019-08-02 11:36:58', '2019-08-02 11:36:58', '2019-08-03 19:36:58'),
('8bcecc85768ec6f9073a62d4134d452ad1daec973f9ad57a717d78a5a0a42cc0a97bb5cb41d50d7b', 3, 2, NULL, '[]', 0, '2019-08-09 11:40:40', '2019-08-09 11:40:40', '2019-08-10 19:40:40'),
('b08d8af1991558a878daa3a7bf4bf52431531599f9f55701f5bada625e9604bc86f5737271168271', 3, 2, NULL, '[]', 0, '2019-08-05 01:57:30', '2019-08-05 01:57:30', '2019-08-06 09:57:30'),
('ea399361c29f2537a5a1847479bf8198d163bcfe41be3ab67b86992570650ef517fdbf9273eb9ae1', 3, 2, NULL, '[]', 0, '2019-08-02 16:11:12', '2019-08-02 16:11:12', '2019-08-04 00:11:12'),
('eaf5013d0389251ae19d11e042299137c42759186db6c745bb38d8c7d90411556a0e086cb177f76d', 3, 2, NULL, '[]', 0, '2019-08-02 15:07:49', '2019-08-02 15:07:49', '2019-08-03 23:07:49');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'uretj6e8pI3B0S7iUu4frlloF1szntlOAUu387bF', 'http://localhost', 1, 0, 0, '2019-08-02 11:26:40', '2019-08-02 11:26:40'),
(2, NULL, 'Laravel Password Grant Client', 'E76r80LtfyMMPi7bUEAn8shiIkLmSoEXYQyzfIHW', 'http://localhost', 0, 1, 0, '2019-08-02 11:26:40', '2019-08-02 11:26:40');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2019-08-02 11:26:40', '2019-08-02 11:26:40');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_refresh_tokens`
--

INSERT INTO `oauth_refresh_tokens` (`id`, `access_token_id`, `revoked`, `expires_at`) VALUES
('0daa9d6c78a00fa031506c17c8d781a5a037a4e10aac9c172de6b64c89d45b7f1978d55391f0ec9a', '17e582527d8215f0eba9b46fca5601eb2d43ae06eb3eeb31d1ee64709a4391713c7a35e233782457', 0, '2019-08-30 10:36:48'),
('2e7f3cd0d366268ed133447d0b676d30da6441b5cb4122e303c9c49ef898ac194b0649f39dd3a06d', '3d0fccae05b9b414a28551a16203f473f4db2ee7b8694cc2c62fd655b19e263152b6615e89b0d3cf', 0, '2019-08-21 18:26:21'),
('4cb98210f395d35e480374243a9058d14da8c7aa873a5c31b0ff4cba8970799f20a8a61079df6865', '4453829f47145d7c741a4573a34fc047a88844658374efc41bb5f41cf9e9b567129a82dec0d4ddd4', 0, '2019-08-04 19:36:58'),
('6b051a6de368bdf6d614b1bc7eb600114e6797426dd9c3008a7083d71430f471b17ff9fe72e561a5', '4218c67a280d90ef78ee4c3091bd7dee3825542710f5e40c3a77d623a8ff27140d6783964560b087', 0, '2019-09-11 11:05:22'),
('6d2a302e01ca59cec88322146713f3c77a3ed7f53d7cf8397bd16559baac7c9da49ac2dc462b1e68', 'ea399361c29f2537a5a1847479bf8198d163bcfe41be3ab67b86992570650ef517fdbf9273eb9ae1', 0, '2019-08-05 00:11:12'),
('7ccead5660cc291cdf6bc0011dcd856d73810829ca2fd11d0cae25c2fa3678cb0de51ffa158a17a5', '26602be1dafcdeaf83a258d1d214eaa7d06828462c891dea557130db3510a76a2b664959e9aa28b6', 0, '2019-08-07 17:38:36'),
('94e7793fe273ac15940d3ba0d6f983f2cfe3a8552d1473226521d69259b057d6213d32ecaf13bd69', '8bcecc85768ec6f9073a62d4134d452ad1daec973f9ad57a717d78a5a0a42cc0a97bb5cb41d50d7b', 0, '2019-08-11 19:40:40'),
('b2d467862643acbc5ccf4f62ac145553431bc89914bd55f61b3081e44a68c0fda8ab5aa6913b333c', '204a93e0ac3a27bf466c3b8f60820db48299d6903864431bd9aa741bb236bc7279738e369df5b477', 0, '2019-08-07 09:57:21'),
('bb5a37fa052e3d53c44d68efc21d973436bea35f7e824d4b4bb735bfc07d020288dcc7eec9e78208', 'eaf5013d0389251ae19d11e042299137c42759186db6c745bb38d8c7d90411556a0e086cb177f76d', 0, '2019-08-04 23:07:49'),
('d568cef8057b616c9a7d05aa72e316f47eca6fd685d90f037f24b3bd02ec0d203ad2875c2a85bd66', 'b08d8af1991558a878daa3a7bf4bf52431531599f9f55701f5bada625e9604bc86f5737271168271', 0, '2019-08-07 09:57:30');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('keighdee@gmail.com', '$2y$10$9/efHvo3uu4ujWitWs8mX.BwDSavAIdewjUxS6DmLHvGsTPcV6w.e', '2019-09-04 03:13:11'),
('guevara.richard17@gmail.com', '$2y$10$RUXRga8J/gGVjfTgyLrMFevLqk8xhGmcTrP.KQgKGdIZE1zkq281G', '2019-09-10 05:22:27'),
('kignrgdev@gmail.com', '$2y$10$TpjhnK/NLmoO5866J09LKu9fFmnQu5DzbxeovhRTIT.7kf5DQT0Ni', '2019-09-10 05:27:05');

-- --------------------------------------------------------

--
-- Table structure for table `top_up_history`
--

CREATE TABLE `top_up_history` (
  `id` bigint(8) NOT NULL,
  `userId` bigint(8) NOT NULL,
  `txnid` varchar(50) DEFAULT NULL,
  `dpRefNO` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `dpProcID` varchar(50) DEFAULT NULL,
  `refCode` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `procId` varchar(50) NOT NULL,
  `amount` decimal(13,2) NOT NULL,
  `is_paid` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `top_up_history`
--

INSERT INTO `top_up_history` (`id`, `userId`, `txnid`, `dpRefNO`, `status`, `dpProcID`, `refCode`, `email`, `procId`, `amount`, `is_paid`, `created_at`, `updated_at`) VALUES
(1, 3, 'VQY3OKERIRSA', 'NEW', 'NEW', 'BYAD', 'KTAHNDQY', 'keighdee@gmail.com', 'BPIB', '10000.00', 1, '2019-09-20 07:33:57', '2019-09-20 07:34:30'),
(2, 3, 'WNUXI5RYK1TB', 'NEW', 'NEW', 'BYAD', 'UAEHR5SL', 'keighdee@gmail.com', 'DPAY', '50.00', 1, '2019-09-20 10:09:34', '2019-09-20 10:11:10'),
(3, 3, 'UC3YHACQ2MJY', NULL, NULL, NULL, 'NZXIZRB6', 'keighdee@gmail.com', 'DPAY', '50.00', 1, '2019-09-20 10:09:34', '2019-09-27 09:58:28'),
(4, 3, 'GVFHSSTBOLS4', NULL, NULL, NULL, '93MMH1MQ', 'keighdee@gmail.com', 'RCBC', '50.00', 1, '2019-09-23 02:53:28', '2019-09-27 08:42:52'),
(5, 3, NULL, NULL, NULL, NULL, NULL, 'keighdee@gmail.com', 'DIRECTD', '50.00', 1, '2019-09-27 07:12:24', '2019-09-27 08:36:49'),
(6, 3, NULL, NULL, NULL, NULL, NULL, 'keighdee@gmail.com', 'DIRECTD', '50.00', 1, '2019-09-27 07:15:07', '2019-09-27 08:33:53'),
(17, 3, NULL, NULL, NULL, NULL, NULL, 'keighdee@gmail.com', 'DIRECTD', '50.00', 0, '2019-09-27 10:24:49', '2019-09-27 10:24:49');

-- --------------------------------------------------------

--
-- Table structure for table `total_userbalance`
--

CREATE TABLE `total_userbalance` (
  `id` bigint(11) NOT NULL,
  `userId` bigint(11) NOT NULL,
  `txhistoryId` bigint(11) DEFAULT NULL,
  `tophistoryId` bigint(11) DEFAULT NULL,
  `total_balance` decimal(13,2) NOT NULL,
  `txnamount` decimal(13,2) DEFAULT NULL,
  `description` varchar(191) DEFAULT NULL,
  `updated_by` varchar(191) DEFAULT NULL,
  `type` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `total_userbalance`
--

INSERT INTO `total_userbalance` (`id`, `userId`, `txhistoryId`, `tophistoryId`, `total_balance`, `txnamount`, `description`, `updated_by`, `type`, `created_at`, `updated_at`) VALUES
(1, 3, NULL, 1, '10000.00', '10000.00', NULL, NULL, 'TOPUP', '2019-09-20 07:34:30', '2019-09-20 07:34:30'),
(2, 3, 1, NULL, '9725.00', '275.00', NULL, NULL, 'TXN', '2019-09-20 07:36:12', '2019-09-20 07:36:12'),
(3, 3, NULL, NULL, '10959.00', '1234.00', NULL, 'Juan Dela Cruz', 'ADD', '2019-09-20 08:05:19', '2019-09-20 08:05:19'),
(4, 3, NULL, NULL, '10900.00', '59.00', NULL, 'Juan Dela Cruz', 'DEDUCT', '2019-09-20 08:41:37', '2019-09-20 08:41:37'),
(5, 3, NULL, 2, '10950.00', '50.00', NULL, NULL, 'TOPUP', '2019-09-20 10:11:10', '2019-09-20 10:11:10'),
(6, 9, NULL, NULL, '1234.00', '1234.00', NULL, 'Juan Dela Cruz', 'ADD', '2019-09-20 10:19:57', '2019-09-20 10:19:57'),
(7, 9, NULL, NULL, '0.00', '1234.00', NULL, 'Juan Dela Cruz', 'DEDUCT', '2019-09-20 10:20:07', '2019-09-20 10:20:07'),
(8, 9, NULL, NULL, '123.00', '123.00', NULL, 'Juan Dela Cruz', 'ADD', '2019-09-20 10:20:16', '2019-09-20 10:20:16'),
(9, 23, NULL, NULL, '150.99', '150.99', NULL, 'Juan Dela Cruz', 'ADD', '2019-09-23 09:42:45', '2019-09-23 09:42:45'),
(10, 9, NULL, NULL, '118.00', '5.00', NULL, 'Reseller Super', 'DEDUCT', '2019-09-27 06:11:44', '2019-09-27 06:11:44'),
(11, 3, NULL, 6, '11000.00', '50.00', NULL, NULL, 'TOPUP', '2019-09-27 08:33:53', '2019-09-27 08:33:53'),
(12, 3, NULL, 5, '11050.00', '50.00', NULL, NULL, 'TOPUP', '2019-09-27 08:36:49', '2019-09-27 08:36:49'),
(13, 3, NULL, 4, '11100.00', '50.00', NULL, NULL, 'TOPUP', '2019-09-27 08:42:52', '2019-09-27 08:42:52'),
(14, 3, NULL, 3, '11150.00', '50.00', NULL, NULL, 'TOPUP', '2019-09-27 09:58:28', '2019-09-27 09:58:28');

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
(1, 3, 'PINOYTRAVEL-EWALLET', 'IDGTXOJSXHOX', '275.00', 'IDGTXOJS', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-09-20 07:36:12', '2019-09-20 07:36:12');

-- --------------------------------------------------------

--
-- Stand-in structure for view `userbal`
-- (See below for the actual view)
--
CREATE TABLE `userbal` (
`userId` int(10) unsigned
,`total_topup` decimal(35,2)
,`total_spent` decimal(35,2)
,`total_balance` decimal(36,2)
);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_blocked` tinyint(4) DEFAULT 0,
  `on_hold` tinyint(4) DEFAULT 0,
  `wallet_bal` decimal(13,2) DEFAULT NULL,
  `is_admin` tinyint(4) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `address`, `contact_no`, `is_blocked`, `on_hold`, `wallet_bal`, `is_admin`, `remember_token`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'Sample One', 'sampOne@gmail.com', '2019-06-05 06:45:56', '123qwe', 'Sample Onee', '09184352441', 1, 0, '0.00', 1, NULL, 0, '2019-06-05 06:48:09', '2019-06-05 06:48:09'),
(2, 'Juan Dela Cruz', 'juandelacruz@gmail.com', NULL, '$2y$10$2Fgnu7sK0STxr9IuNHjz5u42/8dmBSvEO0NtViUZBbVQ5XvmMQ2qq', 'Sample Twoo', '09852421542', 0, 0, '0.00', 1, NULL, 0, '2019-06-05 07:16:18', '2019-06-05 07:16:18'),
(3, 'Keigh Dee', 'keighdee@gmail.com', NULL, '$2y$10$2Fgnu7sK0STxr9IuNHjz5u42/8dmBSvEO0NtViUZBbVQ5XvmMQ2qq', 'JRU', '09776927838', 0, 0, '3000.00', 0, 'y1XwoVi30zE4Lm7Gajf2hdFdS37tL8KQn1BWGAHG1pF4YVcC8QCEW1tnhtF8', 0, '2019-06-06 02:27:19', '2019-09-18 10:38:14'),
(9, 'King RG', 'kingrgdev@gmail.com', NULL, '$2y$10$aeySRF7/h1VOrc6B6gZoK.xNIel0Wq/8d5g.xGS8VC4fobUPD61IK', 'Stratford, Ontario', '09254214520', 0, 1, '0.00', 0, '4UYxuZ3eH0NL2d3wA7Zhq0RQ11g4kV1oEPqs7baIRkk8aXXS1ZvfsxEuiTsd', 0, '2019-06-09 05:38:04', '2019-09-24 08:15:25'),
(10, 'Kay Louise Diaz', 'kaydiaz@gmail.com', NULL, '$2y$10$bQoCj9I8Yk88sJarnMySh.y1TAMUJDgKaIuMMWtUOq.7rGkgCNNju', 'Mandaluyong', '09776927838', 0, 0, '0.00', 1, NULL, 0, '2019-09-19 06:05:32', '2019-09-24 08:10:56'),
(16, 'Richard Guevara', 'guevara.richard17@gmail.com', NULL, '$2y$10$nG8tk6VyX8ah.EoeRZnkCekktp2Rdrwx74YXE/DDXT6hTdqxRKuZO', '49 Peralta compound san miguel pasig city, NCR Manila Philippines Asia', '12341234', 0, 0, '0.00', 1, NULL, 0, '2019-09-19 08:45:05', '2019-09-19 08:45:05'),
(22, 'Reseller Super', 'superreseller@mail.com', NULL, '$2y$10$NUsyGO0RH3bK/.0xJE/AQugSsvNTCwrwAdgjKpmCUVU0t6yRoDi4O', '49 Peralta compound san miguel pasig city, NCR Manila Philippines Asia', '09776927838', 0, 0, '0.00', 2, NULL, 0, '2019-09-23 03:44:51', '2019-09-23 03:44:51'),
(23, 'Post Malone', 'postmalone@pm.com', NULL, '$2y$10$LGg0E2b4Q6WdlmqUOU0hEusjxJfXhS7XfuXxmrWLxuCfxa5pA7vuG', '49 Peralta compound san miguel pasig city, NCR Manila Philippines Asia', '09776927838', 1, 0, '0.00', 0, NULL, 1, '2019-09-23 09:36:19', '2019-09-27 05:52:27');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_deleted_users`
-- (See below for the actual view)
--
CREATE TABLE `view_deleted_users` (
`id` int(10) unsigned
,`name` varchar(191)
,`email` varchar(191)
,`email_verified_at` timestamp
,`password` varchar(191)
,`address` varchar(191)
,`contact_no` varchar(191)
,`is_blocked` tinyint(4)
,`on_hold` tinyint(4)
,`is_admin` tinyint(4)
,`tu_id` bigint(20)
,`userId` bigint(20)
,`txhistoryId` bigint(20)
,`tophistoryId` bigint(20)
,`total_balance` decimal(13,2)
,`description` varchar(191)
,`updated_by` varchar(191)
,`created_at` timestamp
,`updated_at` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_passbook`
-- (See below for the actual view)
--
CREATE TABLE `view_passbook` (
`id` bigint(11)
,`userId` bigint(11)
,`txhistoryId` bigint(11)
,`txmerchId` varchar(50)
,`txtransId` varchar(50)
,`txbookingAmount` decimal(13,2)
,`txrefCode` varchar(50)
,`txtransEmail` varchar(50)
,`txprocId` varchar(50)
,`txbookingCreated` timestamp
,`txbookingUpdated` timestamp
,`tophistoryId` bigint(11)
,`tptxnid` varchar(50)
,`tpdpRefNo` varchar(50)
,`tpstatus` varchar(50)
,`tpdpProcID` varchar(50)
,`tprefCode` varchar(50)
,`tpemail` varchar(50)
,`tpprocId` varchar(50)
,`tpamount` decimal(13,2)
,`tpis_paid` int(11)
,`tpup_created` timestamp
,`tpup_updated` timestamp
,`total_balance` decimal(13,2)
,`txnamount` decimal(13,2)
,`description` varchar(191)
,`updated_by` varchar(191)
,`type` varchar(191)
,`created_at` timestamp
,`updated_at` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_total_userbalance`
-- (See below for the actual view)
--
CREATE TABLE `view_total_userbalance` (
`id` int(10) unsigned
,`name` varchar(191)
,`email` varchar(191)
,`email_verified_at` timestamp
,`password` varchar(191)
,`address` varchar(191)
,`contact_no` varchar(191)
,`is_blocked` tinyint(4)
,`on_hold` tinyint(4)
,`is_admin` tinyint(4)
,`tu_id` bigint(20)
,`userId` bigint(20)
,`txhistoryId` bigint(20)
,`tophistoryId` bigint(20)
,`total_balance` decimal(13,2)
,`description` varchar(191)
,`updated_by` varchar(191)
,`created_at` timestamp
,`updated_at` timestamp
);

-- --------------------------------------------------------

--
-- Structure for view `userbal`
--
DROP TABLE IF EXISTS `userbal`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `userbal`  AS  select `a`.`id` AS `userId`,(select sum(`tuhh`.`amount`) from `top_up_history` `tuhh` where `tuhh`.`userId` = `a`.`id` and `tuhh`.`is_paid` = 1) AS `total_topup`,(select sum(`trr`.`amount`) from `transaction_details` `trr` where `trr`.`userId` = `a`.`id`) AS `total_spent`,(select sum(`tuh`.`amount`) from `top_up_history` `tuh` where `tuh`.`userId` = `a`.`id` and `tuh`.`is_paid` = 1) - (select sum(`tr`.`amount`) from `transaction_details` `tr` where `tr`.`userId` = `a`.`id`) AS `total_balance` from ((`users` `a` left join `top_up_history` `b` on(`a`.`id` = `b`.`userId`)) left join `transaction_details` `c` on(`a`.`id` = `c`.`userId`)) where `b`.`is_paid` = 1 group by `a`.`id` ;

-- --------------------------------------------------------

--
-- Structure for view `view_deleted_users`
--
DROP TABLE IF EXISTS `view_deleted_users`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_deleted_users`  AS  select `a`.`id` AS `id`,`a`.`name` AS `name`,`a`.`email` AS `email`,`a`.`email_verified_at` AS `email_verified_at`,`a`.`password` AS `password`,`a`.`address` AS `address`,`a`.`contact_no` AS `contact_no`,`a`.`is_blocked` AS `is_blocked`,`a`.`on_hold` AS `on_hold`,`a`.`is_admin` AS `is_admin`,(select `tu`.`id` from `total_userbalance` `tu` where `tu`.`userId` = `a`.`id` order by `tu`.`created_at` desc limit 1) AS `tu_id`,(select `tu`.`userId` from `total_userbalance` `tu` where `tu`.`userId` = `a`.`id` order by `tu`.`created_at` desc limit 1) AS `userId`,(select `tu`.`txhistoryId` from `total_userbalance` `tu` where `tu`.`userId` = `a`.`id` order by `tu`.`created_at` desc limit 1) AS `txhistoryId`,(select `tu`.`tophistoryId` from `total_userbalance` `tu` where `tu`.`userId` = `a`.`id` order by `tu`.`created_at` desc limit 1) AS `tophistoryId`,(select `tu`.`total_balance` from `total_userbalance` `tu` where `tu`.`userId` = `a`.`id` order by `tu`.`created_at` desc limit 1) AS `total_balance`,(select `tu`.`description` from `total_userbalance` `tu` where `tu`.`userId` = `a`.`id` order by `tu`.`created_at` desc limit 1) AS `description`,(select `tu`.`updated_by` from `total_userbalance` `tu` where `tu`.`userId` = `a`.`id` order by `tu`.`created_at` desc limit 1) AS `updated_by`,(select max(`tu`.`created_at`) from `total_userbalance` `tu` where `tu`.`userId` = `a`.`id`) AS `created_at`,(select max(`tu`.`updated_at`) from `total_userbalance` `tu` where `tu`.`userId` = `a`.`id`) AS `updated_at` from (`users` `a` left join `total_userbalance` `b` on(`a`.`id` = `b`.`userId`)) where `a`.`is_blocked` = 1 group by `a`.`id` order by `b`.`created_at` desc ;

-- --------------------------------------------------------

--
-- Structure for view `view_passbook`
--
DROP TABLE IF EXISTS `view_passbook`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_passbook`  AS  select `a`.`id` AS `id`,`a`.`userId` AS `userId`,`a`.`txhistoryId` AS `txhistoryId`,(select `tu`.`merchId` from `transaction_details` `tu` where `tu`.`userId` = `a`.`userId` and `tu`.`id` = `a`.`txhistoryId`) AS `txmerchId`,(select `tu`.`transId` from `transaction_details` `tu` where `tu`.`userId` = `a`.`userId` and `tu`.`id` = `a`.`txhistoryId`) AS `txtransId`,(select `tu`.`amount` from `transaction_details` `tu` where `tu`.`userId` = `a`.`userId` and `tu`.`id` = `a`.`txhistoryId`) AS `txbookingAmount`,(select `tu`.`refCode` from `transaction_details` `tu` where `tu`.`userId` = `a`.`userId` and `tu`.`id` = `a`.`txhistoryId`) AS `txrefCode`,(select `tu`.`transEmail` from `transaction_details` `tu` where `tu`.`userId` = `a`.`userId` and `tu`.`id` = `a`.`txhistoryId`) AS `txtransEmail`,(select `tu`.`procId` from `transaction_details` `tu` where `tu`.`userId` = `a`.`userId` and `tu`.`id` = `a`.`txhistoryId`) AS `txprocId`,(select `tu`.`created_at` from `transaction_details` `tu` where `tu`.`userId` = `a`.`userId` and `tu`.`id` = `a`.`txhistoryId`) AS `txbookingCreated`,(select `tu`.`updated_at` from `transaction_details` `tu` where `tu`.`userId` = `a`.`userId` and `tu`.`id` = `a`.`txhistoryId`) AS `txbookingUpdated`,`a`.`tophistoryId` AS `tophistoryId`,(select `tu`.`txnid` from `top_up_history` `tu` where `tu`.`userId` = `a`.`userId` and `tu`.`id` = `a`.`tophistoryId` and `tu`.`is_paid` = 1) AS `tptxnid`,(select `tu`.`dpRefNO` from `top_up_history` `tu` where `tu`.`userId` = `a`.`userId` and `tu`.`id` = `a`.`tophistoryId` and `tu`.`is_paid` = 1) AS `tpdpRefNo`,(select `tu`.`status` from `top_up_history` `tu` where `tu`.`userId` = `a`.`userId` and `tu`.`id` = `a`.`tophistoryId` and `tu`.`is_paid` = 1) AS `tpstatus`,(select `tu`.`dpProcID` from `top_up_history` `tu` where `tu`.`userId` = `a`.`userId` and `tu`.`id` = `a`.`tophistoryId` and `tu`.`is_paid` = 1) AS `tpdpProcID`,(select `tu`.`refCode` from `top_up_history` `tu` where `tu`.`userId` = `a`.`userId` and `tu`.`id` = `a`.`tophistoryId` and `tu`.`is_paid` = 1) AS `tprefCode`,(select `tu`.`email` from `top_up_history` `tu` where `tu`.`userId` = `a`.`userId` and `tu`.`id` = `a`.`tophistoryId` and `tu`.`is_paid` = 1) AS `tpemail`,(select `tu`.`procId` from `top_up_history` `tu` where `tu`.`userId` = `a`.`userId` and `tu`.`id` = `a`.`tophistoryId` and `tu`.`is_paid` = 1) AS `tpprocId`,(select `tu`.`amount` from `top_up_history` `tu` where `tu`.`userId` = `a`.`userId` and `tu`.`id` = `a`.`tophistoryId` and `tu`.`is_paid` = 1) AS `tpamount`,(select `tu`.`is_paid` from `top_up_history` `tu` where `tu`.`userId` = `a`.`userId` and `tu`.`id` = `a`.`tophistoryId` and `tu`.`is_paid` = 1) AS `tpis_paid`,(select `tu`.`created_at` from `top_up_history` `tu` where `tu`.`userId` = `a`.`userId` and `tu`.`id` = `a`.`tophistoryId` and `tu`.`is_paid` = 1) AS `tpup_created`,(select `tu`.`updated_at` from `top_up_history` `tu` where `tu`.`userId` = `a`.`userId` and `tu`.`id` = `a`.`tophistoryId` and `tu`.`is_paid` = 1) AS `tpup_updated`,`a`.`total_balance` AS `total_balance`,`a`.`txnamount` AS `txnamount`,`a`.`description` AS `description`,`a`.`updated_by` AS `updated_by`,`a`.`type` AS `type`,`a`.`created_at` AS `created_at`,`a`.`updated_at` AS `updated_at` from ((`total_userbalance` `a` left join `transaction_details` `b` on(`a`.`txhistoryId` = `b`.`id`)) left join `top_up_history` `c` on(`a`.`tophistoryId` = `c`.`id`)) order by `a`.`created_at` desc ;

-- --------------------------------------------------------

--
-- Structure for view `view_total_userbalance`
--
DROP TABLE IF EXISTS `view_total_userbalance`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_total_userbalance`  AS  select `a`.`id` AS `id`,`a`.`name` AS `name`,`a`.`email` AS `email`,`a`.`email_verified_at` AS `email_verified_at`,`a`.`password` AS `password`,`a`.`address` AS `address`,`a`.`contact_no` AS `contact_no`,`a`.`is_blocked` AS `is_blocked`,`a`.`on_hold` AS `on_hold`,`a`.`is_admin` AS `is_admin`,(select `tu`.`id` from `total_userbalance` `tu` where `tu`.`userId` = `a`.`id` order by `tu`.`created_at` desc limit 1) AS `tu_id`,(select `tu`.`userId` from `total_userbalance` `tu` where `tu`.`userId` = `a`.`id` order by `tu`.`created_at` desc limit 1) AS `userId`,(select `tu`.`txhistoryId` from `total_userbalance` `tu` where `tu`.`userId` = `a`.`id` order by `tu`.`created_at` desc limit 1) AS `txhistoryId`,(select `tu`.`tophistoryId` from `total_userbalance` `tu` where `tu`.`userId` = `a`.`id` order by `tu`.`created_at` desc limit 1) AS `tophistoryId`,(select `tu`.`total_balance` from `total_userbalance` `tu` where `tu`.`userId` = `a`.`id` order by `tu`.`created_at` desc limit 1) AS `total_balance`,(select `tu`.`description` from `total_userbalance` `tu` where `tu`.`userId` = `a`.`id` order by `tu`.`created_at` desc limit 1) AS `description`,(select `tu`.`updated_by` from `total_userbalance` `tu` where `tu`.`userId` = `a`.`id` order by `tu`.`created_at` desc limit 1) AS `updated_by`,(select max(`tu`.`created_at`) from `total_userbalance` `tu` where `tu`.`userId` = `a`.`id`) AS `created_at`,(select max(`tu`.`updated_at`) from `total_userbalance` `tu` where `tu`.`userId` = `a`.`id`) AS `updated_at` from (`users` `a` left join `total_userbalance` `b` on(`a`.`id` = `b`.`userId`)) where `a`.`is_admin` = 0 group by `a`.`id` order by `b`.`created_at` desc ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

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
-- Indexes for table `total_userbalance`
--
ALTER TABLE `total_userbalance`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `top_up_history`
--
ALTER TABLE `top_up_history`
  MODIFY `id` bigint(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `total_userbalance`
--
ALTER TABLE `total_userbalance`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `id` bigint(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
