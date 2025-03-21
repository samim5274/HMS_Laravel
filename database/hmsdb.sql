-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2025 at 10:29 AM
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
(4, 'Taslima', 'samim2@gmail.com', '$2y$10$uwMYszs9PFZ43Qq6xu15H.eGBOLVRcqifrMzs5TIBEZkC9iL1zIly', 1, 1, NULL, NULL, '2025-02-18 23:15:17', '2025-02-18 23:15:17');

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
(26, '2025_02_26_062433_create_storetests_table', 8),
(27, '2025_02_26_065804_create_testsaledetails_table', 8);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `storetests`
--

INSERT INTO `storetests` (`id`, `regNum`, `testId`, `testprice`, `categoryId`, `subcategoryId`, `specimenId`, `groupId`, `room`, `status`, `created_at`, `updated_at`) VALUES
(34, 2025031811, 2, 200, 1, 1, 1, 1, 103, 0, '2025-03-18 01:26:35', '2025-03-18 01:27:07'),
(35, 2025031811, 3, 450, 1, 1, 1, 2, 103, 0, '2025-03-18 01:26:36', '2025-03-18 01:27:05'),
(36, 2025031811, 1, 650, 1, 1, 1, 1, 103, 0, '2025-03-18 01:26:38', '2025-03-18 01:27:02'),
(37, 2025031812, 2, 200, 1, 1, 1, 1, 103, 0, '2025-03-18 01:28:14', '2025-03-18 01:28:42'),
(38, 2025031812, 3, 450, 1, 1, 1, 2, 103, 0, '2025-03-18 01:28:15', '2025-03-18 01:28:46'),
(39, 2025031813, 3, 450, 1, 1, 1, 2, 103, 0, '2025-03-18 01:29:32', '2025-03-18 01:30:03'),
(40, 2025031813, 2, 200, 1, 1, 1, 1, 103, 0, '2025-03-18 01:29:33', '2025-03-18 01:30:07'),
(41, 2025031814, 2, 200, 1, 1, 1, 1, 103, 0, '2025-03-18 01:30:14', '2025-03-18 01:30:38'),
(42, 2025031814, 1, 650, 1, 1, 1, 1, 103, 0, '2025-03-18 01:30:15', '2025-03-18 01:30:44'),
(43, 2025031814, 3, 450, 1, 1, 1, 2, 103, 0, '2025-03-18 01:30:16', '2025-03-18 01:30:47'),
(44, 2025031815, 1, 650, 1, 1, 1, 1, 103, 0, '2025-03-18 01:31:23', '2025-03-18 01:31:50'),
(45, 2025031815, 2, 200, 1, 1, 1, 1, 103, 0, '2025-03-18 01:31:24', '2025-03-18 01:31:54'),
(46, 2025031815, 3, 450, 1, 1, 1, 2, 103, 0, '2025-03-18 01:31:25', '2025-03-18 01:31:57'),
(47, 2025031816, 3, 450, 1, 1, 1, 2, 103, 1, '2025-03-18 01:34:16', '2025-03-18 01:34:16'),
(48, 2025031816, 2, 200, 1, 1, 1, 1, 103, 1, '2025-03-18 01:34:17', '2025-03-18 01:34:17'),
(49, 2025031816, 1, 650, 1, 1, 1, 1, 103, 1, '2025-03-18 01:34:18', '2025-03-18 01:34:18');

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
(3, 'HbsAg', 1, 1, 1, 2, 450.00, 400.00, '103', 'Test Description', 2, '2025-02-25 04:26:47', '2025-02-25 04:26:47');

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
  `reportstatus` int(11) NOT NULL,
  `teststatus` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testsaledetails`
--

INSERT INTO `testsaledetails` (`id`, `reg`, `date`, `name`, `dob`, `gender`, `phone`, `address`, `doctorId`, `referId`, `total`, `discount`, `payable`, `pay`, `duestatus`, `due`, `reportstatus`, `teststatus`, `created_at`, `updated_at`) VALUES
(17, 2025031811, '2025-03-18', 'Shamim Hossain', '2001-12-31', 'Male', 1762164746, 'Kaliakair, Gazipur, Dhaka, Bangladesh', 2, 3, -200, 500, 100, 500, 1, 300, 1, 1, '2025-03-18 01:26:51', '2025-03-18 01:27:07'),
(18, 2025031812, '2025-03-18', 'Rafi Hossain', '2001-12-31', 'Male', 1762164746, 'Kaliakair, Gazipur, Dhaka, Bangladesh', 2, 1, 750, 50, 50, 500, 1, 100, 1, 1, '2025-03-18 01:28:26', '2025-03-18 01:28:46'),
(19, 2025031813, '2025-03-18', 'Hossain', '2001-12-31', 'Male', 1762164746, 'Kaliakair, Gazipur, Dhaka, Bangladesh', 6, 1, 350, 0, 0, 500, 1, 150, 1, 1, '2025-03-18 01:29:43', '2025-03-18 01:30:07'),
(20, 2025031814, '2025-03-18', 'Akter Hossain', '2001-12-31', 'Male', 1762164746, 'Kaliakair, Gazipur, Dhaka, Bangladesh', 6, 1, -1100, 200, 400, 500, 1, 600, 1, 1, '2025-03-18 01:30:28', '2025-03-18 01:30:47'),
(21, 2025031815, '2025-03-18', 'Monir Hossain', '2001-12-31', 'Male', 1762164746, 'Kaliakair, Gazipur, Dhaka, Bangladesh', 6, 3, 700, 200, 400, 500, 1, 600, 1, 1, '2025-03-18 01:31:35', '2025-03-18 01:31:57'),
(22, 2025031816, '2025-03-18', 'Emran Hossain', '2001-12-31', 'Male', 1762164746, 'Kaliakair, Gazipur, Dhaka, Bangladesh', 5, 3, 1300, 200, 1100, 500, 1, 600, 1, 1, '2025-03-18 01:34:32', '2025-03-18 01:34:32');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `testdetails`
--
ALTER TABLE `testdetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `testsaledetails`
--
ALTER TABLE `testsaledetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
