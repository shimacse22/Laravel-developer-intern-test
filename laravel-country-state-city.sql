-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2025 at 07:11 AM
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
-- Database: `laravel-country-state-city`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `state_id`, `name`, `created_at`, `updated_at`) VALUES
(4, 2, 'Houston', '2025-09-01 22:56:18', '2025-09-01 22:56:18'),
(5, 2, 'Dallas', '2025-09-01 22:56:18', '2025-09-01 22:56:18'),
(6, 2, 'Austin', '2025-09-01 22:56:18', '2025-09-01 22:56:18'),
(7, 3, 'New York City', '2025-09-01 22:56:18', '2025-09-01 22:56:18'),
(8, 3, 'Buffalo', '2025-09-01 22:56:18', '2025-09-01 22:56:18'),
(9, 3, 'Rochester', '2025-09-01 22:56:18', '2025-09-01 22:56:18'),
(10, 4, 'Toronto', '2025-09-01 22:56:18', '2025-09-01 22:56:18'),
(11, 4, 'Ottawa', '2025-09-01 22:56:18', '2025-09-01 22:56:18'),
(12, 4, 'Hamilton', '2025-09-01 22:56:18', '2025-09-01 22:56:18'),
(13, 5, 'Montreal', '2025-09-01 22:56:18', '2025-09-01 22:56:18'),
(14, 5, 'Quebec City', '2025-09-01 22:56:19', '2025-09-01 22:56:19'),
(15, 5, 'Laval', '2025-09-01 22:56:19', '2025-09-01 22:56:19'),
(16, 7, 'Mumbai', '2025-09-01 22:56:19', '2025-09-01 22:56:19'),
(17, 7, 'Pune', '2025-09-01 22:56:19', '2025-09-01 22:56:19'),
(18, 7, 'Nagpur', '2025-09-01 22:56:19', '2025-09-01 22:56:19'),
(19, 8, 'New Delhi', '2025-09-01 22:56:19', '2025-09-01 22:56:19'),
(20, 8, 'Dwarka', '2025-09-01 22:56:19', '2025-09-01 22:56:19'),
(21, 8, 'Rohini', '2025-09-01 22:56:19', '2025-09-01 22:56:19'),
(22, 10, 'Dhaka City', '2025-09-01 22:56:19', '2025-09-01 22:56:19'),
(23, 10, 'Narayanganj', '2025-09-01 22:56:19', '2025-09-01 22:56:19'),
(24, 10, 'Gazipur', '2025-09-01 22:56:19', '2025-09-01 22:56:19'),
(25, 11, 'Chattogram City', '2025-09-01 22:56:19', '2025-09-01 22:56:19'),
(26, 11, 'Cox’s Bazar', '2025-09-01 22:56:19', '2025-09-01 22:56:19'),
(27, 11, 'Rangamati', '2025-09-01 22:56:19', '2025-09-01 22:56:19');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `iso_code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `iso_code`, `created_at`, `updated_at`) VALUES
(1, 'Bangladesh', 'BD', NULL, NULL),
(2, 'India', 'IN', NULL, NULL),
(3, 'Pakistan', 'PK', NULL, NULL),
(4, 'Nepal', 'NP', NULL, NULL),
(5, 'Sri Lanka', 'LK', NULL, NULL),
(6, 'Bhutan', 'BT', NULL, NULL),
(7, 'Maldives', 'MV', NULL, NULL),
(8, 'United States', 'US', NULL, NULL),
(9, 'United Kingdom', 'UK', NULL, NULL),
(10, 'Canada', 'CA', NULL, NULL),
(11, 'Australia', 'AU', NULL, NULL),
(12, 'Germany', 'DE', NULL, NULL),
(13, 'France', 'FR', NULL, NULL),
(14, 'Italy', 'IT', NULL, NULL),
(15, 'Spain', 'ES', NULL, NULL),
(16, 'Netherlands', 'NL', NULL, NULL),
(17, 'Switzerland', 'CH', NULL, NULL),
(18, 'Japan', 'JP', NULL, NULL),
(19, 'China', 'CN', NULL, NULL),
(20, 'Singapore', 'SG', NULL, NULL),
(21, 'Malaysia', 'MY', NULL, NULL),
(22, 'Thailand', 'TH', NULL, NULL),
(23, 'Indonesia', 'ID', NULL, NULL),
(24, 'Philippines', 'PH', NULL, NULL),
(25, 'Brazil', 'BR', NULL, NULL),
(26, 'Mexico', 'MX', NULL, NULL),
(27, 'South Africa', 'ZA', NULL, NULL),
(28, 'Nigeria', 'NG', NULL, NULL),
(29, 'Kenya', 'KE', NULL, NULL);

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_08_31_133930_create_countries_table', 1),
(5, '2025_08_31_134019_create_states_table', 1),
(6, '2025_08_31_134117_create_cities_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('pPaOSK8bHuDRYVpA0YRvBzbdsfw3yvcsnHxACAmM', NULL, '127.0.0.1', 'Symfony', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTkxFWFV4cHhwUVlKZjE5UVU1QmtKZXlmM2x3Mlp1ZmxBcnpjVWhhSiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTY6Imh0dHA6Ly9sb2NhbGhvc3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756788959),
('Wx9OWrcPnNSEmcGyWd3TFoXylZVLrqPH1CGuwrqD', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRHF6dWtpcXNVb0F4QWlnd3hKeVVCVndPcFVTYWlrOGFYUUtvemdiVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zdGF0ZXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756789023);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `country_id`, `name`, `created_at`, `updated_at`) VALUES
(2, 8, 'Texas', '2025-09-01 22:56:17', '2025-09-01 22:56:17'),
(3, 8, 'New York', '2025-09-01 22:56:17', '2025-09-01 22:56:17'),
(4, 10, 'Ontario', '2025-09-01 22:56:17', '2025-09-01 22:56:17'),
(5, 10, 'Quebec', '2025-09-01 22:56:17', '2025-09-01 22:56:17'),
(6, 10, 'British Columbia', '2025-09-01 22:56:17', '2025-09-01 22:56:17'),
(7, 2, 'Maharashtra', '2025-09-01 22:56:17', '2025-09-01 22:56:17'),
(8, 2, 'Delhi', '2025-09-01 22:56:17', '2025-09-01 22:56:17'),
(9, 2, 'Karnataka', '2025-09-01 22:56:17', '2025-09-01 22:56:17'),
(10, 1, 'Dhaka', '2025-09-01 22:56:17', '2025-09-01 22:56:17'),
(11, 1, 'Chittagong', '2025-09-01 22:56:17', '2025-09-01 22:56:17'),
(12, 1, 'Khulna', '2025-09-01 22:56:17', '2025-09-01 22:56:17');

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
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cities_state_id_name_unique` (`state_id`,`name`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `countries_name_unique` (`name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `states_country_id_name_unique` (`country_id`,`name`);

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
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `states`
--
ALTER TABLE `states`
  ADD CONSTRAINT `states_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
