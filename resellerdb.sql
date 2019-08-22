-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2019 at 12:25 PM
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
('204a93e0ac3a27bf466c3b8f60820db48299d6903864431bd9aa741bb236bc7279738e369df5b477', 3, 2, NULL, '[]', 0, '2019-08-05 01:57:21', '2019-08-05 01:57:21', '2019-08-06 09:57:21'),
('26602be1dafcdeaf83a258d1d214eaa7d06828462c891dea557130db3510a76a2b664959e9aa28b6', 3, 2, NULL, '[]', 0, '2019-08-05 09:38:36', '2019-08-05 09:38:36', '2019-08-06 17:38:36'),
('3d0fccae05b9b414a28551a16203f473f4db2ee7b8694cc2c62fd655b19e263152b6615e89b0d3cf', 3, 2, NULL, '[]', 0, '2019-08-19 10:26:21', '2019-08-19 10:26:21', '2019-08-20 18:26:20'),
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
('2e7f3cd0d366268ed133447d0b676d30da6441b5cb4122e303c9c49ef898ac194b0649f39dd3a06d', '3d0fccae05b9b414a28551a16203f473f4db2ee7b8694cc2c62fd655b19e263152b6615e89b0d3cf', 0, '2019-08-21 18:26:21'),
('4cb98210f395d35e480374243a9058d14da8c7aa873a5c31b0ff4cba8970799f20a8a61079df6865', '4453829f47145d7c741a4573a34fc047a88844658374efc41bb5f41cf9e9b567129a82dec0d4ddd4', 0, '2019-08-04 19:36:58'),
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

-- --------------------------------------------------------

--
-- Table structure for table `top_up_history`
--

CREATE TABLE `top_up_history` (
  `id` bigint(8) NOT NULL,
  `userId` bigint(8) NOT NULL,
  `txnid` varchar(50) NOT NULL,
  `dpRefNO` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `dpProcID` varchar(50) DEFAULT NULL,
  `refCode` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `procId` varchar(50) NOT NULL,
  `amount` decimal(13,2) NOT NULL,
  `is_paid` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `top_up_history`
--

INSERT INTO `top_up_history` (`id`, `userId`, `txnid`, `dpRefNO`, `status`, `dpProcID`, `refCode`, `email`, `procId`, `amount`, `is_paid`, `created_at`, `updated_at`) VALUES
(1, 3, 'IAHU1LOQHK00', 'NEW', 'NEW', 'BYAD', 'IAHU1LOQ', 'keighdee@gmail.com', 'DPAY', '10000.00', 1, '2019-08-26 16:00:00', '2019-08-20 16:00:00'),
(2, 3, 'IASDFHU1LOQ', 'YDGD', 'S', 'BAYD', 'IAHU', 'rgplayed@gmail.com', 'DPAY', '5000.00', 0, '2019-08-12 16:00:00', '2019-08-28 16:00:00'),
(3, 3, '878HASDXC', 'NEW', 'NEW', 'BYAD', '1LOQ', 'keighdee@gmail.com', 'DPAY', '10000.00', 1, '2019-08-05 16:00:00', '2019-08-12 16:00:00'),
(4, 9, 'HUTEV2R5', 'ZHC5', 'S', 'BAYD', 'D2DXD1D', 'keighdee@gmail.coma', 'DPAY', '150.00', 0, '2019-08-04 16:00:00', '2019-08-04 16:00:00'),
(6, 3, 'DADCVG64', 'VDT4XE', 'S', 'BYAD', '412DSF5', 'keighdee@gmail.com', 'DPAY', '275.00', 0, '2019-08-01 16:00:00', '2019-08-01 16:00:00'),
(7, 3, 'HI0MIQMQQQAB', 'NEW', 'NEW', 'BYAD', 'F5PP9S8J', 'keighdee@gmail.com', 'DPAY', '50.00', 1, '2019-08-01 16:00:00', '2019-08-01 16:00:00'),
(8, 3, 'DADCVG64', 'VDT4XE', 'S', 'BYAD', '412DSF5', 'keighdee@gmail.com', 'DPAY', '275.00', 0, '2019-08-01 16:00:00', '2019-08-01 16:00:00'),
(9, 3, 'WPYMLQWWIXAT', NULL, NULL, NULL, 'Y3SVEJ5E', 'keighdee@gmail.com', 'DPAY', '50.00', 0, '2019-08-04 16:00:00', '2019-08-04 16:00:00'),
(10, 3, 'OCEVETL6UERA', NULL, NULL, NULL, 'HBOCQHQR', 'keighdee@gmail.com', 'DPAY', '50.00', 0, '2019-08-04 16:00:00', '2019-08-04 16:00:00'),
(11, 3, 'NRW48ZBXZC0Z', NULL, NULL, NULL, 'LPAOBJCQ', 'keighdee@gmail.com', 'DPAY', '50.00', 0, '2019-08-04 16:00:00', '2019-08-04 16:00:00'),
(12, 3, 'FFSY5OFGDDNR', NULL, NULL, NULL, 'TPAPPEP8', 'keighdee@gmail.com', 'DPAY', '50.00', 0, '2019-08-04 16:00:00', '2019-08-04 16:00:00'),
(13, 3, 'N08YLZSB8TZJ', NULL, NULL, NULL, 'ADDEC9OO', 'keighdee@gmail.com', 'DPAY', '50.00', 0, '2019-08-04 16:00:00', '2019-08-04 16:00:00'),
(14, 3, '86THRATMFGAZ', NULL, NULL, NULL, 'FPPNKLEY', 'keighdee@gmail.com', 'DPAY', '50.00', 0, '2019-08-04 16:00:00', '2019-08-04 16:00:00'),
(15, 3, 'XMBRFGCJEUBM', NULL, NULL, NULL, 'GE1MAASV', 'keighdee@gmail.com', 'DPAY', '50.00', 0, '2019-08-04 16:00:00', '2019-08-04 16:00:00'),
(16, 3, 'I10FVMQ78XLZ', 'NEW', 'NEW', 'BYAD', 'MF03ZNX7', 'keighdee@gmail.com', 'DPAY', '50000.00', 1, '2019-08-04 16:00:00', '2019-08-04 16:00:00'),
(17, 3, '9FOUZDMSNPBX', 'NEW', 'NEW', 'BYAD', 'DMQQRHMW', 'keighdee@gmail.com', 'DPAY', '5000.00', 1, '2019-08-04 16:00:00', '2019-08-04 16:00:00'),
(18, 3, 'KLQDGGWG7GQM', 'NEW', 'NEW', 'BYAD', 'XDKA7FF7', 'keighdee@gmail.com', 'DPAY', '5000.00', 1, '2019-08-04 16:00:00', '2019-08-04 16:00:00'),
(19, 3, 'SWJ7KKYZLQFZ', 'NEW', 'NEW', 'BYAD', 'CGCKU3II', 'keighdee@gmail.com', 'DPAY', '5000.00', 1, '2019-08-04 16:00:00', '2019-08-04 16:00:00'),
(20, 3, 'NO29BPHPRS9S', 'NEW', 'NEW', 'BYAD', '1FMPPWHO', 'keighdee@gmail.com', 'DPAY', '50.00', 1, '2019-08-04 16:00:00', '2019-08-04 16:00:00'),
(21, 3, 'CEEOMFJN6I9Z', 'NEW', 'NEW', 'BYAD', 'GPXCBPUF', 'keighdee@gmail.com', 'DPAY', '50.00', 1, '2019-08-04 16:00:00', '2019-08-04 16:00:00'),
(22, 3, '26AA7U1VFLTN', 'NEW', 'NEW', 'BYAD', 'VTAPWW6W', 'keighdee@gmail.com', 'DPAY', '50.00', 1, '2019-08-04 16:00:00', '2019-08-04 16:00:00'),
(23, 3, 'N7UEAFONS8HW', NULL, NULL, NULL, 'U39GJRTD', 'keighdee@gmail.com', 'DPAY', '50.00', 0, '2019-08-04 16:00:00', '2019-08-04 16:00:00'),
(24, 3, 'OQH8GPMPY95Q', NULL, NULL, NULL, 'M0UOVZ3V', 'keighdee@gmail.com', 'DPAY', '50.00', 0, '2019-08-04 16:00:00', '2019-08-04 16:00:00'),
(25, 3, 'YHSGVZKNNSIF', NULL, NULL, NULL, 'L6LJRRKQ', 'keighdee@gmail.com', 'DPAY', '50.00', 0, '2019-08-04 16:00:00', '2019-08-04 16:00:00'),
(26, 3, 'ZTI7GUXO2WLZ', NULL, NULL, NULL, 'FESV8OWL', 'keighdee@gmail.com', 'DPAY', '50.00', 0, '2019-08-04 16:00:00', '2019-08-04 16:00:00'),
(27, 3, 'G76D5ZEL2LMO', NULL, NULL, NULL, 'NVHKWRUQ', 'keighdee@gmail.com', 'DPAY', '50.00', 0, '2019-08-04 16:00:00', '2019-08-04 16:00:00'),
(28, 3, 'SRBJUM9YXBRN', NULL, NULL, NULL, 'FF64MUII', 'keighdee@gmail.com', 'DPAY', '50.00', 0, '2019-08-04 16:00:00', '2019-08-04 16:00:00'),
(29, 3, 'AYNNFYPGBFGB', NULL, NULL, NULL, 'Q5PAWO4U', 'keighdee@gmail.com', 'DPAY', '50.00', 0, '2019-08-04 16:00:00', '2019-08-04 16:00:00'),
(30, 3, 'RP5JEYUUPNAS', NULL, NULL, NULL, 'JM2CAOEG', 'keighdee@gmail.com', 'DPAY', '50.00', 0, '2019-08-04 16:00:00', '2019-08-04 16:00:00'),
(31, 3, 'XMGXSK3KCNID', NULL, NULL, NULL, 'JP9XLJ49', 'keighdee@gmail.com', 'DPAY', '50.00', 0, '2019-08-04 16:00:00', '2019-08-04 16:00:00'),
(32, 3, 'U8GLPMYYJLRD', NULL, NULL, NULL, '4A4J07HI', 'keighdee@gmail.com', 'DPAY', '50.00', 0, '2019-08-04 16:00:00', '2019-08-04 16:00:00'),
(33, 3, 'PDMYUT9WFJXF', NULL, NULL, NULL, 'KTWZZ6J7', 'keighdee@gmail.com', 'DPAY', '50.00', 0, '2019-08-04 16:00:00', '2019-08-04 16:00:00'),
(34, 3, 'JJBGYAUDO32S', NULL, NULL, NULL, 'HJTQJK2V', 'keighdee@gmail.com', 'DPAY', '50.00', 0, '2019-08-04 16:00:00', '2019-08-04 16:00:00'),
(35, 3, 'SBM7PCVCBDRB', NULL, NULL, NULL, 'AML4HHP9', 'keighdee@gmail.com', 'DPAY', '50.00', 0, '2019-08-04 16:00:00', '2019-08-04 16:00:00'),
(36, 3, 'P3AK4USOHGMK', NULL, NULL, NULL, '7NBL71ST', 'keighdee@gmail.com', 'DPAY', '50.00', 0, '2019-08-04 16:00:00', '2019-08-04 16:00:00'),
(37, 3, 'QLCONPKT8BMZ', NULL, NULL, NULL, 'HOGJBMRU', 'keighdee@gmail.com', 'DPAY', '50.00', 0, '2019-08-04 16:00:00', '2019-08-04 16:00:00'),
(38, 3, '1BDECPKIRFKL', NULL, NULL, NULL, 'LYCI9F2A', 'keighdee@gmail.com', 'DPAY', '50.00', 0, '2019-08-04 16:00:00', '2019-08-04 16:00:00'),
(39, 3, 'PIEKL3SUCYWG', NULL, NULL, NULL, 'EFPRFWI8', 'keighdee@gmail.com', 'DPAY', '50.00', 0, '2019-08-04 16:00:00', '2019-08-04 16:00:00'),
(40, 3, '8YNUNVSTE4IL', NULL, NULL, NULL, 'C8QWHLIQ', 'keighdee@gmail.com', 'DPAY', '50.00', 0, '2019-08-04 16:00:00', '2019-08-04 16:00:00'),
(41, 3, '7VZLANTBIPR0', NULL, NULL, NULL, 'PZGRNNLW', 'keighdee@gmail.com', 'DPAY', '50.00', 0, '2019-08-04 16:00:00', '2019-08-04 16:00:00'),
(42, 3, 'NDWSGCXSGPLA', NULL, NULL, NULL, 'XW8VQMS1', 'keighdee@gmail.com', 'DPAY', '50.00', 0, '2019-08-04 16:00:00', '2019-08-04 16:00:00'),
(43, 3, 'A2WOTF1M9RNT', NULL, NULL, NULL, 'SSQRRGNY', 'keighdee@gmail.com', 'DPAY', '50.00', 0, '2019-08-04 16:00:00', '2019-08-04 16:00:00'),
(44, 3, 'Z8G5MG8FI24T', NULL, NULL, NULL, 'HVPKOI6C', 'keighdee@gmail.com', 'DPAY', '50.00', 0, '2019-08-04 16:00:00', '2019-08-04 16:00:00'),
(45, 3, 'HXUPNPN0X7FO', NULL, NULL, NULL, 'SHRJCSWK', 'keighdee@gmail.com', 'DPAY', '50.00', 0, '2019-08-04 16:00:00', '2019-08-04 16:00:00'),
(46, 3, 'QBEANP6ZESSZ', NULL, NULL, NULL, 'FHG0EWNF', 'keighdee@gmail.com', 'DPAY', '50.00', 0, '2019-08-04 16:00:00', '2019-08-04 16:00:00'),
(47, 3, 'VOFVDYPLUNTX', NULL, NULL, NULL, 'XDWVLCKW', 'keighdee@gmail.com', 'DPAY', '50.00', 0, '2019-08-04 16:00:00', '2019-08-04 16:00:00'),
(48, 3, 'DEAMF1AO9AOA', NULL, NULL, NULL, 'F8KREKAP', 'keighdee@gmail.com', 'DPAY', '50.00', 0, '2019-08-04 16:00:00', '2019-08-04 16:00:00'),
(49, 3, 'LGCICN2UZJ9W', NULL, NULL, NULL, 'EB6PLRLJ', 'keighdee@gmail.com', 'DPAY', '50.00', 0, '2019-08-04 16:00:00', '2019-08-04 16:00:00'),
(50, 3, 'WBXDYRHS8NGE', NULL, NULL, NULL, 'BM0HJR7V', 'keighdee@gmail.com', 'DPAY', '250.00', 0, '2019-08-04 16:00:00', '2019-08-04 16:00:00'),
(51, 3, 'U3MAX8YKJA8A', NULL, NULL, NULL, 'JH26WWZD', 'keighdee@gmail.com', 'DPAY', '300.00', 0, '2019-08-04 16:00:00', '2019-08-04 16:00:00'),
(52, 3, 'WHHDRBLYGAK8', NULL, NULL, NULL, '5GBZOWFU', 'keighdee@gmail.com', 'DPAY', '50.00', 0, '2019-08-04 16:00:00', '2019-08-04 16:00:00'),
(53, 3, 'FC12CZLYQ8OK', NULL, NULL, NULL, 'LDYKRA1L', 'keighdee@gmail.com', 'DPAY', '50.00', 0, '2019-08-04 16:00:00', '2019-08-04 16:00:00'),
(54, 3, 'UUFS0C7K42MH', NULL, NULL, NULL, 'AKQ67ENP', 'keighdee@gmail.com', 'DPAY', '50.00', 0, '2019-08-04 16:00:00', '2019-08-04 16:00:00'),
(55, 3, 'WDAVYRCK5TMR', NULL, NULL, NULL, '6N96EB2O', 'keighdee@gmail.com', 'DPAY', '2500.00', 0, '2019-08-04 16:00:00', '2019-08-04 16:00:00'),
(56, 3, 'UXER5NJAEEDZ', NULL, NULL, NULL, 'CLDMZFFP', 'keighdee@gmail.com', 'DPAY', '50.00', 0, '2019-08-04 16:00:00', '2019-08-04 16:00:00'),
(57, 3, 'SWEGYZ9TRAGX', NULL, NULL, NULL, 'HRGH58MG', 'keighdee@gmail.com', 'DPAY', '50.00', 0, '2019-08-04 16:00:00', '2019-08-04 16:00:00'),
(58, 3, 'POPSRCTQ7WKI', NULL, NULL, NULL, 'CGOMTRMU', 'keighdee@gmail.com', 'DPAY', '50.00', 0, '2019-08-04 16:00:00', '2019-08-04 16:00:00'),
(59, 3, 'PRGMOWVKXWTY', NULL, NULL, NULL, 'NNGMWJ72', 'keighdee@gmail.com', 'DPAY', '50.00', 0, '2019-08-04 16:00:00', '2019-08-04 16:00:00'),
(60, 3, 'XEKFTMFUSKU9', NULL, NULL, NULL, '1GKLVLBX', 'keighdee@gmail.com', 'DPAY', '50.00', 0, '2019-08-04 16:00:00', '2019-08-04 16:00:00'),
(61, 3, '7Z8PKN0CYKAA', NULL, NULL, NULL, 'BRX7LQTO', 'keighdee@gmail.com', 'DPAY', '50.00', 0, '2019-08-04 16:00:00', '2019-08-04 16:00:00'),
(62, 3, 'ICDHNOACWSOE', NULL, NULL, NULL, 'NO5WZ5UQ', 'keighdee@gmail.com', 'DPAY', '50.00', 0, '2019-08-04 16:00:00', '2019-08-04 16:00:00'),
(63, 3, 'DP3CI6DUQ46Q', NULL, NULL, NULL, 'UEKZQ3OH', 'keighdee@gmail.com', 'DPAY', '50.00', 0, '2019-08-04 16:00:00', '2019-08-04 16:00:00'),
(64, 3, 'VBCIMZGIQFW7', NULL, NULL, NULL, 'UGPTOZH0', 'keighdee@gmail.com', 'DPAY', '50.00', 0, '2019-08-04 16:00:00', '2019-08-04 16:00:00'),
(65, 3, 'DZG2RLAFNXZR', NULL, NULL, NULL, 'E0L5WGKH', 'keighdee@gmail.com', 'DPAY', '50.00', 0, '2019-08-04 16:00:00', '2019-08-04 16:00:00'),
(66, 3, 'ATJNORRF47CG', NULL, NULL, NULL, 'CFKI6AF2', 'keighdee@gmail.com', 'DPAY', '50.00', 0, '2019-08-04 16:00:00', '2019-08-04 16:00:00'),
(67, 9, 'S5ELQBIHW04B', NULL, NULL, NULL, 'ZJJGEZ5G', 'rgplayed@gmail.com', 'DPAY', '50.00', 0, '2019-08-21 16:00:00', '2019-08-21 16:00:00');

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
(1, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-14 08:00:00', '2019-08-14 08:00:00'),
(2, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-19 08:00:00', '2019-08-19 08:00:00'),
(3, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-01 08:00:00', '2019-08-01 08:00:00'),
(4, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-01 14:32:11', '2019-08-01 14:32:11'),
(5, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-01 14:34:53', '2019-08-01 14:34:53'),
(6, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-01 14:34:58', '2019-08-01 14:34:58'),
(7, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-01 15:18:38', '2019-08-01 15:18:38'),
(8, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-01 15:18:39', '2019-08-01 15:18:39'),
(9, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-01 15:21:10', '2019-08-01 15:21:10'),
(10, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-01 15:32:01', '2019-08-01 15:32:01'),
(11, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-01 15:32:19', '2019-08-01 15:32:19'),
(12, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-01 16:31:46', '2019-08-01 16:31:46'),
(13, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-05 02:18:23', '2019-08-05 02:18:23'),
(14, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-05 05:16:23', '2019-08-05 05:16:23'),
(15, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-05 05:16:53', '2019-08-05 05:16:53'),
(16, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-05 05:16:59', '2019-08-05 05:16:59'),
(17, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-05 05:17:17', '2019-08-05 05:17:17'),
(18, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-05 05:18:44', '2019-08-05 05:18:44'),
(19, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-15 01:49:05', '2019-08-15 01:49:05'),
(20, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-15 01:52:07', '2019-08-15 01:52:07'),
(21, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-15 01:52:07', '2019-08-15 01:52:07'),
(22, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-15 01:52:20', '2019-08-15 01:52:20'),
(23, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-15 01:55:37', '2019-08-15 01:55:37'),
(24, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-15 01:56:22', '2019-08-15 01:56:22'),
(25, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-15 01:58:17', '2019-08-15 01:58:17'),
(26, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-15 01:58:17', '2019-08-15 01:58:17'),
(27, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-15 02:03:55', '2019-08-15 02:03:55'),
(28, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-15 02:04:13', '2019-08-15 02:04:13'),
(29, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-15 02:10:37', '2019-08-15 02:10:37'),
(30, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-15 02:11:17', '2019-08-15 02:11:17'),
(31, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-15 02:11:48', '2019-08-15 02:11:48'),
(32, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-15 07:09:33', '2019-08-15 07:09:33'),
(33, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-15 07:15:45', '2019-08-15 07:15:45'),
(34, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-15 07:16:46', '2019-08-15 07:16:46'),
(35, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-15 08:04:20', '2019-08-15 08:04:20'),
(36, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-15 08:06:15', '2019-08-15 08:06:15'),
(37, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-15 08:16:14', '2019-08-15 08:16:14'),
(38, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-15 10:08:56', '2019-08-15 10:08:56'),
(39, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-15 10:10:27', '2019-08-15 10:10:27'),
(40, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-16 02:26:37', '2019-08-16 02:26:37'),
(41, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-16 07:08:09', '2019-08-16 07:08:09'),
(42, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-16 07:11:06', '2019-08-16 07:11:06'),
(43, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-16 07:12:06', '2019-08-16 07:12:06'),
(44, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-16 07:19:04', '2019-08-16 07:19:04'),
(45, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-16 07:20:41', '2019-08-16 07:20:41'),
(46, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-16 07:25:28', '2019-08-16 07:25:28'),
(47, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-16 07:26:59', '2019-08-16 07:26:59'),
(48, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-16 07:30:34', '2019-08-16 07:30:34'),
(49, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-16 07:31:27', '2019-08-16 07:31:27'),
(50, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-16 08:22:42', '2019-08-16 08:22:42'),
(51, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-19 01:41:44', '2019-08-19 01:41:44'),
(52, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-19 01:54:54', '2019-08-19 01:54:54'),
(53, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-19 03:00:17', '2019-08-19 03:00:17'),
(54, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-19 03:04:40', '2019-08-19 03:04:40'),
(55, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-19 03:14:25', '2019-08-19 03:14:25'),
(56, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-19 05:02:23', '2019-08-19 05:02:23'),
(57, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-19 05:03:18', '2019-08-19 05:03:18'),
(58, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-19 05:34:55', '2019-08-19 05:34:55'),
(59, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-19 05:49:50', '2019-08-19 05:49:50'),
(60, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-19 05:49:52', '2019-08-19 05:49:52'),
(61, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-19 05:50:25', '2019-08-19 05:50:25'),
(62, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-19 05:54:51', '2019-08-19 05:54:51'),
(63, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-19 05:57:25', '2019-08-19 05:57:25'),
(64, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-19 05:59:29', '2019-08-19 05:59:29'),
(65, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-19 06:01:35', '2019-08-19 06:01:35'),
(66, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-19 06:02:57', '2019-08-19 06:02:57'),
(67, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-19 06:05:50', '2019-08-19 06:05:50'),
(68, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-19 06:11:05', '2019-08-19 06:11:05'),
(69, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-19 06:17:33', '2019-08-19 06:17:33'),
(70, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-19 06:20:11', '2019-08-19 06:20:11'),
(71, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-19 06:27:02', '2019-08-19 06:27:02'),
(72, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-19 06:49:46', '2019-08-19 06:49:46'),
(73, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-19 06:55:52', '2019-08-19 06:55:52'),
(74, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-19 07:05:46', '2019-08-19 07:05:46'),
(75, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-19 07:06:17', '2019-08-19 07:06:17'),
(76, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-19 07:10:31', '2019-08-19 07:10:31'),
(77, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-19 07:10:44', '2019-08-19 07:10:44'),
(78, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-19 07:17:06', '2019-08-19 07:17:06'),
(79, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-19 07:17:11', '2019-08-19 07:17:11'),
(80, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-19 07:17:20', '2019-08-19 07:17:20'),
(81, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-19 07:20:33', '2019-08-19 07:20:33'),
(82, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-19 07:37:49', '2019-08-19 07:37:49'),
(83, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-19 07:42:13', '2019-08-19 07:42:13'),
(84, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-19 07:42:13', '2019-08-19 07:42:13'),
(85, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-19 07:42:16', '2019-08-19 07:42:16'),
(86, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-19 07:49:25', '2019-08-19 07:49:25'),
(87, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-19 07:49:33', '2019-08-19 07:49:33'),
(88, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-19 07:49:43', '2019-08-19 07:49:43'),
(89, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-19 07:50:30', '2019-08-19 07:50:30'),
(90, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-19 07:51:45', '2019-08-19 07:51:45'),
(91, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-19 07:52:20', '2019-08-19 07:52:20'),
(92, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-19 07:55:13', '2019-08-19 07:55:13'),
(93, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-19 07:55:37', '2019-08-19 07:55:37'),
(94, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-19 07:55:46', '2019-08-19 07:55:46'),
(95, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-19 08:11:00', '2019-08-19 08:11:00'),
(96, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-19 08:12:37', '2019-08-19 08:12:37'),
(97, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-19 08:26:39', '2019-08-19 08:26:39'),
(98, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-19 08:27:22', '2019-08-19 08:27:22'),
(99, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-20 04:03:00', '2019-08-20 04:03:00'),
(100, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-20 04:03:00', '2019-08-20 04:03:00'),
(101, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-20 04:03:49', '2019-08-20 04:03:49'),
(102, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-20 04:08:50', '2019-08-20 04:08:50'),
(103, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-20 06:01:31', '2019-08-20 06:01:31'),
(104, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-20 06:01:31', '2019-08-20 06:01:31'),
(105, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-20 06:01:31', '2019-08-20 06:01:31'),
(106, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-20 06:19:35', '2019-08-20 06:19:35'),
(107, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-20 06:24:13', '2019-08-20 06:24:13'),
(108, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-20 07:14:58', '2019-08-20 07:14:58'),
(109, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-22 01:38:35', '2019-08-22 01:38:35'),
(110, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-22 01:39:03', '2019-08-22 01:39:03'),
(111, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-22 05:07:37', '2019-08-22 05:07:37'),
(112, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-22 05:07:37', '2019-08-22 05:07:37'),
(113, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-22 07:20:26', '2019-08-22 07:20:26'),
(114, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-22 07:31:32', '2019-08-22 07:31:32'),
(115, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-22 10:11:58', '2019-08-22 10:11:58'),
(116, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-22 10:15:00', '2019-08-22 10:15:00'),
(117, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-22 10:17:04', '2019-08-22 10:17:04'),
(118, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-22 10:17:23', '2019-08-22 10:17:23'),
(119, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-22 10:17:23', '2019-08-22 10:17:23'),
(120, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-22 10:18:09', '2019-08-22 10:18:09'),
(121, 3, 'PINOYTRAVEL-EWALLET', '2DXGVFSOTEVD', '275.00', '2DXGVFSO', 'guevara.richard17@gmail.com', 'EWALLET', 0, '2019-08-22 10:18:38', '2019-08-22 10:18:38');

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
  `is_blocked` tinyint(4) DEFAULT NULL,
  `on_hold` tinyint(4) DEFAULT NULL,
  `wallet_bal` int(11) DEFAULT NULL,
  `is_admin` tinyint(4) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `address`, `contact_no`, `is_blocked`, `on_hold`, `wallet_bal`, `is_admin`, `remember_token`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'Sample One', 'sampOne@gmail.com', '2019-06-05 06:45:56', '123qwe', 'Sample Onee', '09184352441', 0, 0, 0, 1, NULL, 0, '2019-06-05 06:48:09', '2019-06-05 06:48:09'),
(2, 'Juan Dela Cruz', 'juandelacruz@gmail.com', NULL, '$2y$10$2Fgnu7sK0STxr9IuNHjz5u42/8dmBSvEO0NtViUZBbVQ5XvmMQ2qq', 'Sample Twoo', '09852421542', 0, 0, 0, 1, NULL, 0, '2019-06-05 07:16:18', '2019-06-05 07:16:18'),
(3, 'Keigh Dee', 'keighdee@gmail.com', NULL, '$2y$10$2Fgnu7sK0STxr9IuNHjz5u42/8dmBSvEO0NtViUZBbVQ5XvmMQ2qq', 'Sample Threee', '09562542154', 0, 0, 0, 0, NULL, 0, '2019-06-06 02:27:19', '2019-06-12 02:02:13'),
(9, 'King RG', 'rgplayed@gmail.com', NULL, '$2y$10$2Fgnu7sK0STxr9IuNHjz5u42/8dmBSvEO0NtViUZBbVQ5XvmMQ2qq', 'Stratford', '09254214524', 0, 0, 0, 0, NULL, 0, '2019-06-09 05:38:04', '2019-08-07 06:29:50');

-- --------------------------------------------------------

--
-- Structure for view `userbal`
--
DROP TABLE IF EXISTS `userbal`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `userbal`  AS  select `a`.`id` AS `userId`,(select sum(`tuhh`.`amount`) from `top_up_history` `tuhh` where `tuhh`.`userId` = `a`.`id` and `tuhh`.`is_paid` = 1) AS `total_topup`,(select sum(`trr`.`amount`) from `transaction_details` `trr` where `trr`.`userId` = `a`.`id`) AS `total_spent`,(select sum(`tuh`.`amount`) from `top_up_history` `tuh` where `tuh`.`userId` = `a`.`id` and `tuh`.`is_paid` = 1) - (select sum(`tr`.`amount`) from `transaction_details` `tr` where `tr`.`userId` = `a`.`id`) AS `total_balance` from ((`users` `a` left join `top_up_history` `b` on(`a`.`id` = `b`.`userId`)) left join `transaction_details` `c` on(`a`.`id` = `c`.`userId`)) where `b`.`is_paid` = 1 group by `a`.`id` ;

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
  MODIFY `id` bigint(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `id` bigint(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
