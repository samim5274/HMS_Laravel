-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2025 at 01:45 PM
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
(4, 'Taslima', 'samim2@gmail.com', '$2y$10$uwMYszs9PFZ43Qq6xu15H.eGBOLVRcqifrMzs5TIBEZkC9iL1zIly', 1, 0, NULL, NULL, '2025-02-18 23:15:17', '2025-02-18 23:15:17'),
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
-- Table structure for table `excategories`
--

CREATE TABLE `excategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `excategories`
--

INSERT INTO `excategories` (`id`, `category`, `created_at`, `updated_at`) VALUES
(1, 'Entertainment', '2025-03-30 12:02:37', '2025-03-30 12:02:37'),
(2, 'Food', '2025-03-30 12:02:40', '2025-03-30 12:02:40'),
(3, 'Fuel', '2025-03-30 12:02:42', '2025-03-30 12:02:42');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` int(11) NOT NULL,
  `catId` int(11) NOT NULL,
  `subCatId` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL,
  `remark` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `userId`, `catId`, `subCatId`, `amount`, `date`, `remark`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 450, '2025-04-06', 'N/A', 0, '2025-04-06 05:55:04', '2025-04-06 11:15:39'),
(2, 1, 1, 1, 450, '2025-04-06', 'N/A', 1, '2025-04-06 06:18:44', '2025-04-06 06:18:44'),
(3, 1, 2, 3, 450, '2025-04-06', 'N/A', 2, '2025-04-06 06:18:48', '2025-04-06 06:18:48'),
(4, 1, 3, 5, 450, '2025-04-06', 'N/A', 3, '2025-04-06 06:18:52', '2025-04-06 06:52:01'),
(5, 1, 3, 4, 450, '2025-04-06', 'N/A', 2, '2025-04-06 06:18:58', '2025-04-06 06:47:56'),
(6, 1, 1, 1, 450, '2025-04-07', 'N/A', 3, '2025-04-07 09:37:50', '2025-04-07 09:38:12'),
(7, 1, 3, 4, 450, '2025-04-07', 'N/A', 1, '2025-04-07 09:37:53', '2025-04-07 09:38:01'),
(8, 1, 2, 3, 450, '2025-04-07', 'N/A', 2, '2025-04-07 09:37:55', '2025-04-07 09:38:05'),
(9, 1, 1, 2, 450, '2025-04-07', 'N/A', 0, '2025-04-07 09:38:18', '2025-04-07 09:38:18'),
(10, 1, 2, 3, 450, '2025-04-08', 'N/A', 1, '2025-04-08 05:30:12', '2025-04-08 05:30:46'),
(11, 1, 3, 4, 150, '2025-04-08', 'N/A', 2, '2025-04-08 05:30:15', '2025-04-08 05:30:50'),
(12, 1, 3, 5, 1500, '2025-04-08', 'N/A', 3, '2025-04-08 05:30:20', '2025-04-08 05:30:53'),
(13, 1, 1, 1, 750, '2025-04-08', 'N/A', 2, '2025-04-08 05:30:25', '2025-04-08 05:30:57'),
(14, 1, 1, 2, 1200, '2025-04-08', 'N/A', 0, '2025-04-08 05:30:31', '2025-04-08 05:30:31');

-- --------------------------------------------------------

--
-- Table structure for table `exsubcategories`
--

CREATE TABLE `exsubcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categoryId` int(11) NOT NULL,
  `subcategory` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exsubcategories`
--

INSERT INTO `exsubcategories` (`id`, `categoryId`, `subcategory`, `created_at`, `updated_at`) VALUES
(1, 1, 'Birthday Party', '2025-03-30 12:02:48', '2025-03-30 12:02:48'),
(2, 1, 'Office Party', '2025-03-30 12:02:58', '2025-03-30 12:02:58'),
(3, 2, 'Evening Food', '2025-03-30 12:03:03', '2025-03-30 12:03:03'),
(4, 3, 'Car Fuel', '2025-03-30 12:03:12', '2025-03-30 12:03:12'),
(5, 3, 'Generator Fuel', '2025-03-30 12:03:17', '2025-03-30 12:03:17');

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
(42, '2025_02_26_062433_create_storetests_table', 8),
(43, '2025_02_26_065804_create_testsaledetails_table', 8),
(46, '2025_03_28_023545_create_refercosts_table', 9),
(50, '2025_03_30_153629_create_expenses_table', 10),
(51, '2025_03_30_171123_create_excategories_table', 10),
(52, '2025_03_30_171257_create_exsubcategories_table', 10);

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
-- Table structure for table `refercosts`
--

CREATE TABLE `refercosts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `regNum` int(11) NOT NULL,
  `patientId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `referId` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `paid` int(11) NOT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'unpaid',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `refercosts`
--

INSERT INTO `refercosts` (`id`, `date`, `regNum`, `patientId`, `userId`, `referId`, `amount`, `paid`, `remarks`, `status`, `created_at`, `updated_at`) VALUES
(1, '2025-03-12', 2025032851, 1, 1, 1, 400, 400, 'Full Paid', '1', '2025-03-28 19:45:17', '2025-03-28 19:45:17'),
(2, '2025-03-27', 2025032852, 2, 1, 1, 1320, 1320, 'Full Paid', '1', '2025-03-28 19:45:23', '2025-03-28 19:45:23'),
(3, '2025-03-29', 2025032914, 8, 1, 1, 1000, 1000, 'Full Paid', '1', '2025-03-28 19:45:29', '2025-03-28 19:45:29'),
(4, '2025-03-29', 2025032912, 6, 1, 4, 850, 850, 'Full Paid', '1', '2025-03-28 19:46:57', '2025-03-28 19:46:57'),
(5, '2025-03-29', 2025032854, 4, 1, 2, 70, 70, 'Full Paid', '1', '2025-03-28 19:47:07', '2025-03-28 19:47:07'),
(6, '2025-03-29', 2025032915, 9, 1, 5, 300, 300, 'Full Paid', '1', '2025-03-28 21:02:41', '2025-03-28 21:02:41'),
(7, '2025-03-29', 2025032913, 7, 1, 3, 200, 200, 'Full Paid', '1', '2025-03-28 21:22:27', '2025-03-28 21:22:27'),
(8, '2025-03-29', 2025032916, 10, 1, 4, 820, 820, 'N/A', '1', '2025-03-28 21:23:58', '2025-03-28 21:23:58'),
(9, '2025-04-07', 2025040711, 11, 4, 1, 1150, 1150, 'N/A', '1', '2025-04-07 09:46:14', '2025-04-07 09:46:14'),
(10, '2025-04-08', 2025040812, 13, 1, 5, 1650, 1650, 'N/A', '1', '2025-04-08 05:32:38', '2025-04-08 05:32:38');

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
  `regNum` bigint(20) NOT NULL,
  `testId` int(11) NOT NULL,
  `testprice` int(11) NOT NULL,
  `referprice` int(11) NOT NULL,
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

INSERT INTO `storetests` (`id`, `regNum`, `testId`, `testprice`, `referprice`, `categoryId`, `subcategoryId`, `specimenId`, `groupId`, `room`, `status`, `reportstatus`, `created_at`, `updated_at`) VALUES
(1, 2025032851, 6, 1300, 300, 2, 6, 7, 6, 103, 1, 0, '2025-03-27 20:28:31', '2025-03-27 20:28:31'),
(2, 2025032851, 5, 5000, 100, 2, 6, 11, 5, 103, 1, 0, '2025-03-27 20:28:32', '2025-03-27 20:28:32'),
(3, 2025032852, 4, 5400, 1000, 2, 7, 8, 2, 103, 1, 0, '2025-03-27 20:28:50', '2025-03-27 20:28:50'),
(4, 2025032852, 3, 450, 70, 1, 1, 1, 2, 103, 1, 0, '2025-03-27 20:28:51', '2025-03-27 20:28:51'),
(5, 2025032852, 2, 200, 50, 1, 1, 1, 1, 103, 1, 0, '2025-03-27 20:28:52', '2025-03-27 20:28:52'),
(6, 2025032852, 1, 650, 200, 1, 1, 1, 1, 103, 1, 0, '2025-03-27 20:28:53', '2025-03-27 20:28:53'),
(7, 2025032853, 1, 650, 200, 1, 1, 1, 1, 103, 1, 0, '2025-03-27 20:29:28', '2025-03-27 20:29:28'),
(8, 2025032853, 2, 200, 50, 1, 1, 1, 1, 103, 1, 0, '2025-03-27 20:29:29', '2025-03-27 20:29:29'),
(9, 2025032853, 3, 450, 70, 1, 1, 1, 2, 103, 1, 0, '2025-03-27 20:29:30', '2025-03-27 20:29:30'),
(10, 2025032853, 5, 5000, 100, 2, 6, 11, 5, 103, 1, 0, '2025-03-27 20:29:32', '2025-03-27 20:29:32'),
(11, 2025032854, 3, 450, 70, 1, 1, 1, 2, 103, 1, 0, '2025-03-27 21:35:59', '2025-03-27 21:35:59'),
(12, 2025032911, 2, 200, 50, 1, 1, 1, 1, 103, 1, 0, '2025-03-28 19:16:49', '2025-03-28 19:16:49'),
(13, 2025032911, 1, 650, 200, 1, 1, 1, 1, 103, 1, 0, '2025-03-28 19:16:51', '2025-03-28 19:16:51'),
(14, 2025032911, 3, 450, 70, 1, 1, 1, 2, 103, 1, 0, '2025-03-28 19:16:53', '2025-03-28 19:16:53'),
(15, 2025032911, 4, 5400, 1000, 2, 7, 8, 2, 103, 1, 0, '2025-03-28 19:16:54', '2025-03-28 19:16:54'),
(16, 2025032912, 5, 5000, 100, 2, 6, 11, 5, 103, 1, 0, '2025-03-28 19:18:24', '2025-03-28 19:18:24'),
(17, 2025032912, 7, 2500, 750, 2, 7, 4, 6, 103, 1, 0, '2025-03-28 19:18:26', '2025-03-28 19:18:26'),
(18, 2025032913, 1, 650, 200, 1, 1, 1, 1, 103, 1, 0, '2025-03-28 19:21:36', '2025-03-28 19:21:36'),
(19, 2025032914, 4, 5400, 1000, 2, 7, 8, 2, 103, 1, 0, '2025-03-28 19:22:18', '2025-03-28 19:22:18'),
(20, 2025032915, 6, 1300, 300, 2, 6, 7, 6, 103, 1, 0, '2025-03-28 21:02:09', '2025-03-28 21:02:09'),
(21, 2025032916, 7, 2500, 750, 2, 7, 4, 6, 103, 1, 0, '2025-03-28 21:23:30', '2025-03-28 21:23:30'),
(22, 2025032916, 3, 450, 70, 1, 1, 1, 2, 103, 1, 0, '2025-03-28 21:23:33', '2025-03-28 21:23:33'),
(23, 2025040711, 2, 200, 50, 1, 1, 1, 1, 103, 1, 0, '2025-04-07 09:38:48', '2025-04-07 09:38:48'),
(24, 2025040711, 4, 5400, 1000, 2, 7, 8, 2, 103, 1, 0, '2025-04-07 09:38:49', '2025-04-07 09:38:49'),
(25, 2025040711, 5, 5000, 100, 2, 6, 11, 5, 103, 1, 0, '2025-04-07 09:38:50', '2025-04-07 09:38:50'),
(26, 2025040811, 1, 650, 200, 1, 1, 1, 1, 103, 1, 1, '2025-04-08 05:31:03', '2025-04-08 05:31:03'),
(27, 2025040811, 2, 200, 50, 1, 1, 1, 1, 103, 1, 1, '2025-04-08 05:31:04', '2025-04-08 05:31:04'),
(28, 2025040811, 4, 5400, 1000, 2, 7, 8, 2, 103, 1, 1, '2025-04-08 05:31:05', '2025-04-08 05:31:05'),
(29, 2025040811, 5, 5000, 100, 2, 6, 11, 5, 103, 1, 4, '2025-04-08 05:31:06', '2025-04-08 05:31:06'),
(30, 2025040811, 6, 1300, 300, 2, 6, 7, 6, 103, 1, 0, '2025-04-08 05:31:06', '2025-04-08 05:31:06'),
(31, 2025040812, 5, 5000, 100, 2, 6, 11, 5, 103, 0, 0, '2025-04-08 05:31:24', '2025-04-08 05:48:11'),
(32, 2025040812, 7, 2500, 750, 2, 7, 4, 6, 103, 0, 0, '2025-04-08 05:31:26', '2025-04-08 05:48:11'),
(33, 2025040812, 8, 3200, 800, 2, 7, 8, 2, 103, 0, 0, '2025-04-08 05:31:26', '2025-04-08 05:48:11'),
(34, 2025041341, 4, 5400, 1000, 2, 7, 8, 2, 103, 0, 0, '2025-04-13 05:48:43', '2025-04-13 11:01:40'),
(35, 2025041341, 3, 450, 70, 1, 1, 1, 2, 103, 1, 3, '2025-04-13 05:48:44', '2025-04-13 11:02:56'),
(36, 2025041341, 2, 200, 50, 1, 1, 1, 1, 103, 1, 4, '2025-04-13 05:48:45', '2025-04-13 11:03:00'),
(37, 2025041341, 1, 650, 200, 1, 1, 1, 1, 103, 1, 1, '2025-04-13 05:48:45', '2025-04-13 11:03:03'),
(38, 2025041312, 3, 450, 70, 1, 1, 1, 2, 103, 1, 1, '2025-04-13 10:26:19', '2025-04-13 11:02:48'),
(39, 2025041312, 2, 200, 50, 1, 1, 1, 1, 103, 1, 4, '2025-04-13 10:26:20', '2025-04-13 11:02:19'),
(40, 2025041312, 1, 650, 200, 1, 1, 1, 1, 103, 1, 2, '2025-04-13 10:26:21', '2025-04-13 11:02:05'),
(41, 2025041313, 1, 650, 200, 1, 1, 1, 1, 103, 0, 0, '2025-04-13 11:07:21', '2025-04-13 11:07:49'),
(42, 2025041313, 2, 200, 50, 1, 1, 1, 1, 103, 0, 0, '2025-04-13 11:07:22', '2025-04-13 11:07:49'),
(43, 2025041314, 1, 650, 200, 1, 1, 1, 1, 103, 0, 3, '2025-04-13 11:11:10', '2025-04-13 11:11:46'),
(44, 2025041315, 1, 650, 200, 1, 1, 1, 1, 103, 0, 4, '2025-04-13 11:13:50', '2025-04-13 11:16:27'),
(45, 2025041316, 1, 650, 200, 1, 1, 1, 1, 103, 0, 1, '2025-04-13 11:19:29', '2025-04-13 11:21:03'),
(46, 2025041317, 6, 1300, 300, 2, 6, 7, 6, 103, 0, 0, '2025-04-13 11:32:15', '2025-04-13 11:33:22'),
(47, 2025041318, 1, 650, 200, 1, 1, 1, 1, 103, 0, 0, '2025-04-13 11:36:05', '2025-04-13 11:38:01'),
(48, 2025041319, 6, 1300, 300, 2, 6, 7, 6, 103, 0, 0, '2025-04-13 11:41:04', '2025-04-13 11:42:06'),
(49, 20250413110, 1, 650, 200, 1, 1, 1, 1, 103, 1, 1, '2025-04-13 11:42:57', '2025-04-13 11:44:30'),
(50, 20250413110, 3, 450, 70, 1, 1, 1, 2, 103, 1, 2, '2025-04-13 11:42:59', '2025-04-13 11:44:35'),
(51, 20250413110, 5, 5000, 100, 2, 6, 11, 5, 103, 1, 3, '2025-04-13 11:43:00', '2025-04-13 11:44:38'),
(52, 20250413110, 6, 1300, 300, 2, 6, 7, 6, 103, 1, 4, '2025-04-13 11:43:02', '2025-04-13 11:44:13');

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
(1, 'ABO', 1, 1, 1, 1, 650.00, 200.00, '103', 'Test Description', 1, '2025-02-25 04:20:05', '2025-02-25 04:20:05'),
(2, 'RBS', 1, 1, 1, 1, 200.00, 50.00, '103', 'Test Description', 2, '2025-02-25 04:26:17', '2025-02-25 04:26:17'),
(3, 'HbsAg', 1, 1, 1, 2, 450.00, 70.00, '103', 'Test Description', 2, '2025-02-25 04:26:47', '2025-02-25 04:26:47'),
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
  `reg` bigint(20) NOT NULL,
  `date` date NOT NULL,
  `name` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `doctorId` int(11) NOT NULL,
  `referId` int(11) NOT NULL,
  `referStatus` int(11) NOT NULL,
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

INSERT INTO `testsaledetails` (`id`, `reg`, `date`, `name`, `dob`, `gender`, `phone`, `address`, `doctorId`, `referId`, `referStatus`, `total`, `discount`, `payable`, `pay`, `duestatus`, `due`, `return`, `status`, `userId`, `created_at`, `updated_at`) VALUES
(1, 2025032851, '2025-03-28', 'Shamim Hossain', '2001-12-31', 'Male', 1762164746, 'Kaliakair, Gazipur, Dhaka, Bangladesh', 1, 1, 0, 6300, 0, 6300, 5000, 1, 1300, 0, 1, 5, '2025-03-27 20:28:48', '2025-03-28 19:45:17'),
(2, 2025032852, '2025-03-28', 'Mizan Hossain', '2001-12-31', 'Male', 1762164746, 'Kaliakair, Gazipur, Dhaka, Bangladesh', 1, 1, 0, 6700, 0, 6700, 4000, 1, 2700, 0, 1, 5, '2025-03-27 20:29:26', '2025-03-28 19:45:23'),
(3, 2025032853, '2025-03-28', 'Fahmida Akter', '2001-12-31', 'Female', 1762164746, 'Kaliakair, Gazipur, Dhaka, Bangladesh', 3, 1, 1, 6300, 0, 6300, 3500, 1, 2800, 0, 1, 5, '2025-03-27 20:29:49', '2025-03-27 21:56:38'),
(4, 2025032854, '2025-03-28', 'Shamim Hossain', '2001-12-31', 'Male', 1762164746, 'Kaliakair, Gazipur, Dhaka, Bangladesh', 3, 2, 0, 450, 0, 450, 200, 1, 250, 0, 1, 5, '2025-03-27 21:36:07', '2025-03-28 19:47:07'),
(5, 2025032911, '2025-03-29', 'Trishna', '2001-12-31', 'Female', 1762164746, 'Kaliakair, Gazipur, Dhaka, Bangladesh', 3, 1, 1, 6700, 0, 6700, 5000, 1, 1700, 0, 1, 1, '2025-03-28 19:17:14', '2025-03-28 19:17:54'),
(6, 2025032912, '2025-03-29', 'Farabi Hossain', '2001-12-31', 'Male', 1762164746, 'Kaliakair, Gazipur, Dhaka, Bangladesh', 5, 4, 0, 7500, 1700, 5800, 5800, 0, 0, 0, 1, 1, '2025-03-28 19:18:46', '2025-03-28 19:46:57'),
(7, 2025032913, '2025-03-29', 'Somon', '2001-12-31', 'Male', 1762164746, 'Kaliakair, Gazipur, Dhaka, Bangladesh', 2, 3, 0, 650, 0, 650, 500, 1, 150, 0, 1, 1, '2025-03-28 19:21:54', '2025-03-28 21:15:09'),
(8, 2025032914, '2025-03-29', 'Ashraful Islam', '2001-12-31', 'Male', 1762164746, 'Kaliakair, Gazipur, Dhaka, Bangladesh', 4, 1, 0, 5400, 200, 5200, 5200, 0, 0, 0, 1, 1, '2025-03-28 19:22:32', '2025-03-28 19:45:29'),
(9, 2025032915, '2025-03-29', 'Fahim Hossain', '2001-12-31', 'Male', 1762164746, 'Kaliakair, Gazipur, Dhaka, Bangladesh', 1, 5, 0, 1300, 0, 1300, 500, 1, 800, 0, 1, 1, '2025-03-28 21:02:29', '2025-03-28 21:02:41'),
(10, 2025032916, '2025-03-29', 'Ekra', '2001-12-31', 'Male', 1762164746, 'Kaliakair, Gazipur, Dhaka, Bangladesh', 2, 4, 0, 2950, 450, 2500, 2500, 0, 0, 0, 1, 1, '2025-03-28 21:23:47', '2025-04-08 05:32:10'),
(11, 2025040711, '2025-04-07', 'Shamim Hossain', '2001-12-31', 'Male', 1762164746, 'Kaliakair, Gazipur, Dhaka, Bangladesh', 2, 1, 0, 10600, 0, 10600, 10000, 1, 600, 0, 1, 1, '2025-04-07 09:39:00', '2025-04-07 09:46:14'),
(12, 2025040811, '2025-04-08', 'Abir Hossain', '2001-12-31', 'Male', 1762164746, 'Kaliakair, Gazipur, Dhaka, Bangladesh', 2, 2, 1, 12550, 1050, 11500, 11500, 0, 0, 0, 1, 1, '2025-04-08 05:31:21', '2025-04-08 05:32:02'),
(13, 2025040812, '2025-04-08', 'Koddos Hossain', '2001-12-31', 'Male', 1762164746, 'Kaliakair, Gazipur, Dhaka, Bangladesh', 2, 5, 0, 10700, 1000, 9700, 0, 3, 0, 9000, 3, 1, '2025-04-08 05:31:41', '2025-04-08 05:48:11'),
(14, 2025041341, '2025-04-13', 'Ripom Hossain', '2001-12-31', 'Male', 1762164746, 'Kaliakair, Gazipur, Dhaka, Bangladesh', 2, 4, 1, 6700, 700, 6000, 5000, 1, 1000, 0, 1, 4, '2025-04-13 05:49:00', '2025-04-13 05:49:00'),
(15, 2025041312, '2025-04-13', 'Rakib Hossain', '2001-12-31', 'Male', 1762164746, 'Kaliakair, Gazipur, Dhaka, Bangladesh', 3, 3, 1, 1300, 0, 1300, 1000, 1, 300, 0, 1, 1, '2025-04-13 10:26:32', '2025-04-13 10:26:32'),
(16, 2025041313, '2025-04-13', 'Shamim Hossain', '2001-12-31', 'Male', 1762164746, 'Kaliakair, Gazipur, Dhaka, Bangladesh', 3, 1, 1, 850, 0, 850, 0, 3, 0, 500, 3, 1, '2025-04-13 11:07:29', '2025-04-13 11:07:49'),
(17, 2025041314, '2025-04-13', 'Mizan Hossain', '2001-12-31', 'Male', 1762164746, 'Kaliakair, Gazipur, Dhaka, Bangladesh', 3, 3, 1, 650, 0, 650, 0, 3, 0, 650, 3, 1, '2025-04-13 11:11:21', '2025-04-13 11:11:46'),
(18, 2025041315, '2025-04-13', 'Fahim', '2001-12-31', 'Male', 1762164746, 'Kaliakair, Gazipur, Dhaka, Bangladesh', 2, 3, 1, 650, 0, 650, 0, 3, 0, 650, 3, 1, '2025-04-13 11:13:58', '2025-04-13 11:16:27'),
(19, 2025041316, '2025-04-13', 'Mimi', '2001-12-31', 'Female', 1762164746, 'Kaliakair, Gazipur, Dhaka, Bangladesh', 3, 3, 1, 650, 0, 650, 0, 3, 0, 650, 3, 1, '2025-04-13 11:19:38', '2025-04-13 11:21:03'),
(20, 2025041317, '2025-04-13', 'Prothoma Akter', '2001-12-31', 'Female', 1762164746, 'Kaliakair, Gazipur, Dhaka, Bangladesh', 3, 5, 1, 1300, 0, 1300, 0, 3, 0, 1300, 3, 1, '2025-04-13 11:32:27', '2025-04-13 11:33:22'),
(21, 2025041318, '2025-04-13', 'Biswajit', '2001-12-31', 'Male', 1762164746, 'Kaliakair, Gazipur, Dhaka, Bangladesh', 3, 3, 1, 650, 0, 650, 0, 3, 0, 650, 3, 1, '2025-04-13 11:36:15', '2025-04-13 11:38:01'),
(22, 2025041319, '2025-04-13', 'Meghlal', '2001-12-31', 'Female', 1762164746, 'Kaliakair, Gazipur, Dhaka, Bangladesh', 4, 1, 1, 1300, 0, 1300, 0, 3, 0, 1200, 3, 1, '2025-04-13 11:41:17', '2025-04-13 11:42:06'),
(23, 20250413110, '2025-04-13', 'Awlad Hossain', '2001-12-31', 'Male', 1762164746, 'Kaliakair, Gazipur, Dhaka, Bangladesh', 3, 4, 1, 7400, 400, 7000, 7000, 0, 0, 0, 1, 1, '2025-04-13 11:43:50', '2025-04-13 11:43:50');

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
-- Indexes for table `excategories`
--
ALTER TABLE `excategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exsubcategories`
--
ALTER TABLE `exsubcategories`
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
-- Indexes for table `refercosts`
--
ALTER TABLE `refercosts`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `excategories`
--
ALTER TABLE `excategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `exsubcategories`
--
ALTER TABLE `exsubcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `refercosts`
--
ALTER TABLE `refercosts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
