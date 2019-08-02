-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 06, 2019 at 07:53 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `api_tk`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apiKey` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ACNo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted` int(191) DEFAULT '0',
  `updated_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `company_id`, `apiKey`, `ACNo`, `name`, `email`, `email_verified_at`, `password`, `deleted`, `updated_by`, `created_by`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '2018-101', NULL, '5', 'ABUEVA', 'abueva@gmail.com', NULL, '$2y$10$MP4BPAbSSwE1gZEarp8qlu7mFZruGkiOy7J1IjH.LFe0r4m0.Cno2', 0, '2018-103', '2018-101', NULL, '2019-05-06 02:48:49', '2019-05-06 02:48:49'),
(7, '2018-102', NULL, '13', 'CLINT', 'clint@gmail.com', NULL, '$2y$10$Fyvy5HgtjPoN3JMn4IkM4eHJu9c9DdHeEcwSwq/xCCLpdqnw4vXnS', 0, NULL, '2018-101', NULL, '2019-05-10 01:03:23', '2019-05-10 01:03:23'),
(8, '2018-103', NULL, '7', 'KINGRG', 'mangkwepweng@gmail.com', NULL, '$2y$10$/kGwXpXprfPklU5yiQLLvOAYAQTDzIgCVygW9.oakBMS5lPT.DFoO', 0, '2018-103', '2018-101', NULL, '2019-05-16 04:38:12', '2019-05-16 04:38:12'),
(19, '2018-004', NULL, '99', 'ADMIN', 'admin@admin.admin', NULL, '$2y$10$lemFG9UP64QFe2nwkzPYH.L3B.DDjN./Hxlik..N6FKa.s/Iw5KGy', 0, NULL, '2018-103', NULL, '2019-05-27 02:43:45', '2019-05-27 02:43:45'),
(20, '2018-1234', NULL, '9999', 'Beverly', 'sample@yahoo.com', NULL, '$2y$10$orL3/9Ngl11DilccMhKjh.Xidvvsi.MwfHjJXFbBw9exMG9DEEnv2', 0, NULL, '2018-004', NULL, '2019-05-27 02:51:21', '2019-05-27 02:51:21'),
(22, '2018-046', NULL, '0', 'Miguel, Juan', 'belarminomarlon@yahoo.com', NULL, '$2y$10$jQ1qunn8XronnqRvvupPn.vHNeTLx79MHWsEigHidgPJMB8weLpr2', 0, NULL, '2018-004', NULL, '2019-05-29 05:12:46', '2019-05-29 05:12:46'),
(23, '2018-1940', NULL, '0', 'Test, Test', 'test@test.com', NULL, '$2y$10$H857Rbd1MrUJ/8IAzN9azOdmx5/YH709FMQ1SgaKFC07uxAj1E7K2', 0, NULL, '2018-004', NULL, '2019-05-30 08:37:35', '2019-05-30 08:37:35'),
(24, '1234-1234', NULL, '9999', 'Bever', 'auto_api@test.test', NULL, '$2y$10$py/WGDK5rquhbV.IEt.GM.Zltqgx/0EhHQ4FhNle86WMg2RmV3/jK', 0, NULL, '2018-1940', NULL, '2019-05-31 08:24:50', '2019-05-31 08:24:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
