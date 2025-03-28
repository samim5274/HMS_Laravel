-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2025 at 10:10 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `superAdmin` int(11) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `status`, `superAdmin`, `photo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'SAMIM', 'samim@gmail.com', '$2y$10$jQTOpv4gWnSNN3QC4LDl5e3EL.lZVF1Ih0VpSSX6ulrV7E4vELsli', 1, 1, NULL, NULL, '2025-02-18 23:09:08', '2025-02-18 23:09:08'),
(4, 'Taslima', 'samim2@gmail.com', '$2y$10$uwMYszs9PFZ43Qq6xu15H.eGBOLVRcqifrMzs5TIBEZkC9iL1zIly', 1, 1, NULL, NULL, '2025-02-18 23:15:17', '2025-02-18 23:15:17'),
(5, 'Farjana', 'farjana@gmail.com', '$2y$10$y6gNb0lQoMpaAyh/WDy5LewFX0wSCtILe3yX438pu0ZaQ3KcddlQS', 1, 1, NULL, NULL, '2025-03-23 07:08:07', '2025-03-23 07:08:07');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `catName` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `catName`, `created_at`, `updated_at`) VALUES
(1, 'Pathology', '2025-02-25 04:54:40', '2025-02-25 04:54:40'),
(2, 'Imagin/Radiology', '2025-02-25 04:54:40', '2025-02-25 04:54:40'),
(3, 'Urine', '2025-02-25 04:55:27', '2025-02-25 04:55:27');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctName` varchar(255) NOT NULL,
  `doctDesignation` varchar(255) NOT NULL,
  `doctPhone` int(11) NOT NULL,
  `doctFee` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `doctName`, `doctDesignation`, `doctPhone`, `doctFee`, `created_at`, `updated_at`) VALUES
(1, 'Dr. Abdur Rahim', 'MBBS, FCPS, ABS', 1762164746, 500, '2025-02-25 12:33:31', '2025-02-25 12:33:31'),
(2, 'Dr Saidur Rahman', 'MBBS, FCPS, ABS', 1762164746, 500, '2025-02-25 12:33:43', '2025-02-25 12:33:43'),
(3, 'Dr. Mahfuz Rahman', 'MBBS, FCPS, ABS', 1762164746, 500, '2025-02-25 12:33:56', '2025-02-25 12:33:56'),
(4, 'Dr. Nilofa', 'MBBS, FCPS, ABS', 1762164746, 500, '2025-03-12 00:45:33', '2025-03-12 00:45:33'),
(5, 'Dr. Monir Hossain', 'MBBS, FCPS, ABS', 1762164746, 500, '2025-03-12 23:30:44', '2025-03-12 23:30:44'),
(6, 'Dr. Shahed Parves', 'MBBS, FCPS, ABS', 1762164746, 500, '2025-03-12 23:33:02', '2025-03-12 23:33:02');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Biochemistry', '2025-02-25 04:01:26', '2025-02-25 04:01:26'),
(2, 'Clinical Pathology', '2025-02-25 04:01:32', '2025-02-25 04:01:32'),
(3, 'Haematology', '2025-02-25 04:01:36', '2025-02-25 04:01:36'),
(4, 'Immunology', '2025-02-25 04:01:41', '2025-02-25 04:01:41'),
(5, 'Serology', '2025-02-25 04:01:45', '2025-02-25 04:01:45'),
(6, 'Ultrasnogram', '2025-02-25 04:01:50', '2025-02-25 04:01:50'),
(7, 'Hormone Test', '2025-02-25 04:01:54', '2025-02-25 04:01:54'),
(8, 'As Required', '2025-02-25 04:01:59', '2025-02-25 04:01:59');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_02_18_110015_create_admins_table', 1),
(6, '2025_02_25_045103_create_categories_table', 2),
(7, '2025_02_25_045155_create_subcategories_table', 2),
(10, '2025_02_25_062048_create_specimens_table', 3),
(14, '2025_02_25_064741_create_groups_table', 4),
(15, '2025_02_25_101703_create_testdetails_table', 5),
(16, '2025_02_25_181245_create_doctors_table', 6),
(17, '2025_02_25_184929_create_references_table', 7),
(36, '2025_02_26_062433_create_storetests_table', 8),
(37, '2025_02_26_065804_create_testsaledetails_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `references`
--

CREATE TABLE `references` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `refName` varchar(255) NOT NULL,
  `refAddress` varchar(255) NOT NULL,
  `refPhone` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `references`
--

INSERT INTO `references` (`id`, `refName`, `refAddress`, `refPhone`, `created_at`, `updated_at`) VALUES
(1, 'Taslima Akter Eity', 'Gazipur, Dhaka', 1762164746, '2025-02-25 23:13:46', '2025-02-25 23:13:46'),
(2, 'Shamim Hossain', 'Gazipur, Dhaka', 1762164746, '2025-02-25 23:16:28', '2025-02-25 23:16:28'),
(3, 'Sabbir Hossain', 'Gazipur, Dhaka', 1762164746, '2025-02-27 03:19:10', '2025-02-27 03:19:10'),
(4, 'Akbor Ali', 'Gazipur, Dhaka', 1762164746, '2025-02-27 03:19:17', '2025-02-27 03:19:17'),
(5, 'Tania Akter Tony', 'Gazipur, Dhaka', 1762164746, '2025-03-12 00:45:52', '2025-03-12 00:45:52');

-- --------------------------------------------------------

--
-- Table structure for table `specimens`
--

CREATE TABLE `specimens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specimens`
--

INSERT INTO `specimens` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Blood', '2025-02-25 00:26:53', '2025-02-25 00:26:53'),
(2, 'Urine', '2025-02-25 00:41:36', '2025-02-25 00:41:36'),
(3, 'Stool', '2025-02-25 00:42:52', '2025-02-25 00:42:52'),
(4, 'Semen', '2025-02-25 00:43:00', '2025-02-25 00:43:00'),
(5, 'Histo Pathology', '2025-02-25 00:43:07', '2025-02-25 00:43:07'),
(6, 'Echo', '2025-02-25 00:43:14', '2025-02-25 00:43:14'),
(7, 'ECG', '2025-02-25 00:43:20', '2025-02-25 00:43:20'),
(8, 'X-Ray', '2025-02-25 00:43:26', '2025-02-25 00:43:26'),
(9, 'Serum', '2025-02-25 00:43:32', '2025-02-25 00:43:32'),
(10, 'Skin', '2025-02-25 00:43:46', '2025-02-25 00:43:46'),
(11, 'USG', '2025-02-25 00:43:52', '2025-02-25 00:43:52'),
(12, 'As Required', '2025-02-25 00:44:00', '2025-02-25 00:44:00');

-- --------------------------------------------------------

--
-- Table structure for table `storetests`
--

CREATE TABLE `storetests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `regNum` int(11) NOT NULL,
  `testId` int(11) NOT NULL,
  `testprice` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `subcategoryId` int(11) NOT NULL,
  `specimenId` int(11) NOT NULL,
  `groupId` int(11) NOT NULL,
  `room` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `reportstatus` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `storetests`
--

INSERT INTO `storetests` (`id`, `regNum`, `testId`, `testprice`, `categoryId`, `subcategoryId`, `specimenId`, `groupId`, `room`, `status`, `reportstatus`, `created_at`, `updated_at`) VALUES
(1, 2025032451, 2, 200, 1, 1, 1, 1, 103, 1, 0, '2025-03-24 06:49:45', '2025-03-24 06:49:45'),
(2, 2025032451, 4, 5400, 2, 7, 8, 2, 103, 1, 0, '2025-03-24 06:49:46', '2025-03-24 06:49:46'),
(3, 2025032451, 5, 5000, 2, 6, 11, 5, 103, 1, 0, '2025-03-24 06:49:47', '2025-03-24 06:49:47'),
(4, 2025032451, 7, 2500, 2, 7, 4, 6, 103, 1, 0, '2025-03-24 06:49:48', '2025-03-24 06:49:48'),
(5, 2025032452, 3, 450, 1, 1, 1, 2, 103, 1, 0, '2025-03-24 07:43:06', '2025-03-24 07:43:06'),
(6, 2025032452, 8, 3200, 2, 7, 8, 2, 103, 1, 0, '2025-03-24 07:43:07', '2025-03-24 07:43:07'),
(7, 2025032443, 7, 2500, 2, 7, 4, 6, 103, 1, 0, '2025-03-24 07:44:36', '2025-03-24 07:44:36'),
(8, 2025032443, 8, 3200, 2, 7, 8, 2, 103, 1, 0, '2025-03-24 07:44:37', '2025-03-24 07:44:37'),
(9, 2025032443, 3, 450, 1, 1, 1, 2, 103, 1, 0, '2025-03-24 07:44:39', '2025-03-24 07:44:39'),
(10, 2025032414, 4, 5400, 2, 7, 8, 2, 103, 0, 0, '2025-03-24 07:46:30', '2025-03-24 08:16:05'),
(11, 2025032414, 5, 5000, 2, 6, 11, 5, 103, 0, 0, '2025-03-24 07:46:31', '2025-03-24 08:16:05'),
(12, 2025032415, 6, 1300, 2, 6, 7, 6, 103, 1, 0, '2025-03-24 08:33:29', '2025-03-24 08:33:29');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `catId` int(11) NOT NULL,
  `subCatName` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `catId`, `subCatName`, `created_at`, `updated_at`) VALUES
(1, 1, 'Blood', '2025-02-24 23:15:24', '2025-02-24 23:15:24'),
(2, 3, 'Urine', '2025-02-24 23:16:11', '2025-02-24 23:16:11'),
(3, 3, 'Stool', '2025-02-24 23:16:31', '2025-02-24 23:16:31'),
(4, 2, 'Ultra', '2025-02-24 23:16:47', '2025-02-24 23:16:47'),
(5, 1, 'Echo', '2025-02-24 23:16:55', '2025-02-24 23:16:55'),
(6, 2, 'Ecg', '2025-02-24 23:17:01', '2025-02-24 23:17:01'),
(7, 2, 'X-Ray', '2025-02-24 23:17:10', '2025-02-24 23:17:10'),
(8, 1, 'Hormon', '2025-02-25 00:09:59', '2025-02-25 00:09:59'),
(9, 1, 'Histopathology', '2025-02-25 00:10:06', '2025-02-25 00:10:06'),
(10, 1, 'Other', '2025-02-25 00:10:17', '2025-02-25 00:10:17');

-- --------------------------------------------------------

--
-- Table structure for table `testdetails`
--

CREATE TABLE `testdetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `testName` varchar(255) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `subcategoryId` int(11) NOT NULL,
  `specimenId` int(11) NOT NULL,
  `groupId` int(11) NOT NULL,
  `testPrice` double(8,2) NOT NULL,
  `rprice` double(8,2) NOT NULL,
  `room` varchar(255) NOT NULL,
  `testDescription` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testdetails`
--

INSERT INTO `testdetails` (`id`, `testName`, `categoryId`, `subcategoryId`, `specimenId`, `groupId`, `testPrice`, `rprice`, `room`, `testDescription`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ABO', 1, 1, 1, 1, 650.00, 500.00, '103', 'Test Description', 1, '2025-02-25 04:20:05', '2025-02-25 04:20:05'),
(2, 'RBS', 1, 1, 1, 1, 200.00, 100.00, '103', 'Test Description', 2, '2025-02-25 04:26:17', '2025-02-25 04:26:17'),
(3, 'HbsAg', 1, 1, 1, 2, 450.00, 400.00, '103', 'Test Description', 2, '2025-02-25 04:26:47', '2025-02-25 04:26:47'),
(4, '3D x-ray', 2, 7, 8, 2, 5400.00, 1000.00, '103', 'Test Description', 1, '2025-03-23 09:08:25', '2025-03-23 09:08:25'),
(5, 'USG', 2, 6, 11, 5, 5000.00, 100.00, '103', 'Test Description', 1, '2025-03-23 09:10:01', '2025-03-23 09:10:01'),
(6, 'Anesthesia for CT.Scan of Brain', 2, 6, 7, 6, 1300.00, 300.00, '103', 'Test Description', 2, '2025-03-23 09:11:09', '2025-03-23 09:11:09'),
(7, 'Anesthesia for CT.Scan of Brain + EEG', 2, 7, 4, 6, 2500.00, 750.00, '103', 'Test Description', 1, '2025-03-23 09:11:40', '2025-03-23 09:11:40'),
(8, 'CT.Scan Color', 2, 7, 8, 2, 3200.00, 800.00, '103', 'Test Description', 1, '2025-03-23 09:53:32', '2025-03-23 09:53:32');

-- --------------------------------------------------------

--
-- Table structure for table `testsaledetails`
--

CREATE TABLE `testsaledetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reg` int(11) NOT NULL,
  `date` date NOT NULL,
  `name` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `doctorId` int(11) NOT NULL,
  `referId` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `payable` int(11) NOT NULL,
  `pay` int(11) NOT NULL,
  `duestatus` int(11) NOT NULL,
  `due` int(11) NOT NULL,
  `return` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testsaledetails`
--

INSERT INTO `testsaledetails` (`id`, `reg`, `date`, `name`, `dob`, `gender`, `phone`, `address`, `doctorId`, `referId`, `total`, `discount`, `payable`, `pay`, `duestatus`, `due`, `return`, `status`, `userId`, `created_at`, `updated_at`) VALUES
(1, 2025032451, '2025-03-24', 'Shamim Hossain', '2001-12-31', 'Male', 1762164746, 'Kaliakair, Gazipur, Dhaka, Bangladesh', 1, 1, 13100, 0, 13100, 5000, 1, 8100, 0, 1, 5, '2025-03-24 06:49:55', '2025-03-24 06:49:55'),
(2, 2025032452, '2025-03-24', 'Faria Akter', '2001-12-31', 'Female', 1762164746, 'Kaliakair, Gazipur, Dhaka, Bangladesh', 4, 4, 3650, 800, 2850, 2500, 1, 350, 0, 1, 5, '2025-03-24 07:43:32', '2025-03-24 07:43:32'),
(3, 2025032443, '2025-03-24', 'Rafiya Akter', '2001-12-31', 'Female', 1762164746, 'Kaliakair, Gazipur, Dhaka, Bangladesh', 3, 2, 6150, 500, 5650, 4500, 1, 1150, 0, 1, 4, '2025-03-24 07:44:57', '2025-03-24 07:44:57'),
(4, 2025032414, '2025-03-24', 'Monir Hossain', '2001-12-31', 'Male', 1762164746, 'Kaliakair, Gazipur, Dhaka, Bangladesh', 6, 4, 10400, 1200, 9200, 0, 3, 0, 7500, 0, 1, '2025-03-24 07:46:50', '2025-03-24 08:16:05'),
(5, 2025032415, '2025-03-24', 'Shamim Hossain', '2001-12-31', 'Male', 1762164746, 'Kaliakair, Gazipur, Dhaka, Bangladesh', 3, 5, 1300, 0, 1300, 1300, 0, 0, 0, 1, 1, '2025-03-24 08:33:40', '2025-03-24 08:59:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `references`
--
ALTER TABLE `references`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specimens`
--
ALTER TABLE `specimens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `storetests`
--
ALTER TABLE `storetests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testdetails`
--
ALTER TABLE `testdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testsaledetails`
--
ALTER TABLE `testsaledetails`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `references`
--
ALTER TABLE `references`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `specimens`
--
ALTER TABLE `specimens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `storetests`
--
ALTER TABLE `storetests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `testdetails`
--
ALTER TABLE `testdetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `testsaledetails`
--
ALTER TABLE `testsaledetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
