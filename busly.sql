-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2026 at 02:45 AM
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
-- Database: `busly`
--

-- --------------------------------------------------------

--
-- Table structure for table `carriers`
--

CREATE TABLE `carriers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carriers`
--

INSERT INTO `carriers` (`id`, `name`, `email`, `phone`, `image`, `city_id`, `created_at`, `updated_at`) VALUES
(1, 'Gaga Turs', 'gaga@turs.rs', '064000001', 'NDHvGF5YMpCsZuiSGoy96QLjD4TQIRSFluE6BqnN.png', 12, '2026-04-04 21:41:38', '2026-04-04 21:41:38'),
(2, 'Janjušević', 'janjus@gmail.com', '064000002', 'daAku3Yjrvojcx9RbEdWQgexuliYyKgm3TUuFEOf.jpg', 7, '2026-04-04 21:42:34', '2026-04-04 21:42:34'),
(3, 'Lasta', 'lasta@gmail.com', '064000003', 'Pm2ltJEGo4Q6xMBylQPnTlmco0ioCDdUcDJfEykH.jpg', 3, '2026-04-04 21:43:03', '2026-04-04 21:43:03'),
(4, 'Niš Ekspres', 'nisekspress@gmail.com', '064000004', '0OacwS8e2ag1ptlOHcvkL7wBT9T08i7bCpG4YuGy.jpg', 4, '2026-04-04 21:43:47', '2026-04-04 21:43:47'),
(5, 'Jugoprevoz', 'jugoprevoz@gmail.com', '064000005', 'OYILTfL2mjVmNPIOAtGM6Zqp0ASD0HO8M9XltTVF.png', 11, '2026-04-04 21:46:11', '2026-04-04 21:47:22'),
(6, 'Kavim', 'kavim@gmail.com', '064000006', 'I5kzjKMjMpJPMBnGrujVaxG0sz6KZDrSs7ZxClaS.jpg', 6, '2026-04-04 21:51:11', '2026-04-04 21:51:11'),
(7, 'MobiLitas', 'mobilitas@gmail.com', '0640429179', 'UIO8fEgh39AJ2vWYTv2lQmm5TVVbPniKC7D01P7Q.png', 14, '2026-04-04 21:53:32', '2026-04-04 21:53:32');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(3, 'Belgrade', 'Fl3q2BVoR9V4vRvgUPA2SogEdEyoSBwB1g5gq6MZ.jpg', '2026-04-04 21:22:39', '2026-04-04 21:22:39'),
(4, 'Niš', 'ZjVXW1aM85uYultkfHWYvNYZ9Fu5Qwh5fhRDGmWx.jpg', '2026-04-04 21:22:53', '2026-04-04 21:22:53'),
(5, 'Kragujevac', 'JfNDe5Ypo4bOpNpivlkQpEDcVfOIJkP1qOWJo8ol.jpg', '2026-04-04 21:23:35', '2026-04-04 21:23:35'),
(6, 'Čačak', '91RHXnf2y9ideAn5bM2vwOlMvBCXNDYaxebkYnfu.jpg', '2026-04-04 21:24:16', '2026-04-04 21:24:16'),
(7, 'Užice', 'whuAlk2jlZWAOLUyLUtdrzmb047HWYQ7YY18wtSY.jpg', '2026-04-04 21:24:34', '2026-04-04 21:24:34'),
(8, 'Novi Sad', 'z2mi385VZALhnGFmObkZSEp9iPL5SOAxAKEd3OyD.jpg', '2026-04-04 21:25:53', '2026-04-04 21:25:53'),
(9, 'Kraljevo', '14Ksr62bBmH0p1tKPLIrhs8k698UckAAbbpe07Gm.jpg', '2026-04-04 21:26:08', '2026-04-04 21:26:08'),
(10, 'Subotica', 'TVE1ZBBlDxQfQNZ0oXVkKMSAymjbxAylhUYxJKjs.jpg', '2026-04-04 21:26:29', '2026-04-04 21:26:29'),
(11, 'Kruševac', 'bdqzO0Sk3maL44ED8snCzGFPK2lBRUOgOJ9thKDV.jpg', '2026-04-04 21:27:54', '2026-04-04 21:27:54'),
(12, 'Nova Varoš', 'FcBZLQ2Nck0zDG5maWEWRggu00g9rXO3gXecEAtz.jpg', '2026-04-04 21:29:59', '2026-04-04 21:29:59'),
(13, 'Prijepolje', '8fQQGBPsS3QpJTYwKsTRGi3MavdXIUFb1f71CGOc.jpg', '2026-04-04 21:30:36', '2026-04-04 21:30:36'),
(14, 'Zrenjanin', 'dqJTeBlImwbAy95weGZryi5Gq4LGIj10HKY3eoND.jpg', '2026-04-04 21:34:01', '2026-04-04 21:34:01');

-- --------------------------------------------------------

--
-- Table structure for table `departures`
--

CREATE TABLE `departures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `route_id` bigint(20) UNSIGNED NOT NULL,
  `time` time NOT NULL,
  `one_time` tinyint(1) NOT NULL,
  `date` date DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departures`
--

INSERT INTO `departures` (`id`, `route_id`, `time`, `one_time`, `date`, `active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, '07:30:00', 0, NULL, 1, NULL, '2026-04-04 22:30:26', '2026-04-04 22:30:26'),
(2, 1, '16:40:00', 0, NULL, 1, NULL, '2026-04-04 22:30:42', '2026-04-04 22:30:42'),
(3, 3, '08:00:00', 0, NULL, 1, NULL, '2026-04-04 22:34:17', '2026-04-04 22:34:17'),
(4, 3, '18:00:00', 0, NULL, 1, NULL, '2026-04-04 22:34:50', '2026-04-04 22:34:50'),
(5, 2, '07:00:00', 0, NULL, 1, NULL, '2026-04-04 22:35:26', '2026-04-04 22:35:26'),
(6, 2, '15:30:00', 0, NULL, 1, NULL, '2026-04-04 22:37:09', '2026-04-04 22:37:09'),
(7, 4, '07:00:00', 0, NULL, 1, NULL, '2026-04-04 22:37:42', '2026-04-04 22:37:42'),
(8, 4, '16:00:00', 0, NULL, 1, NULL, '2026-04-04 22:38:54', '2026-04-04 22:38:54'),
(9, 5, '15:00:00', 0, NULL, 1, NULL, '2026-04-04 22:39:34', '2026-04-04 22:39:34'),
(10, 6, '12:00:00', 0, NULL, 1, NULL, '2026-04-04 22:39:45', '2026-04-04 22:39:45'),
(11, 7, '08:00:00', 0, NULL, 1, NULL, '2026-04-04 22:41:36', '2026-04-04 22:41:36'),
(12, 8, '13:00:00', 0, NULL, 1, NULL, '2026-04-04 22:41:55', '2026-04-04 22:41:55'),
(13, 9, '14:00:00', 0, NULL, 1, NULL, '2026-04-04 22:42:16', '2026-04-04 22:42:16'),
(14, 10, '16:00:00', 0, NULL, 1, NULL, '2026-04-04 22:43:33', '2026-04-04 22:43:33'),
(15, 11, '11:00:00', 0, NULL, 1, NULL, '2026-04-04 22:43:43', '2026-04-04 22:43:43'),
(16, 12, '20:00:00', 0, NULL, 1, NULL, '2026-04-04 22:43:52', '2026-04-04 22:43:52');

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
(1, '2026_03_25_221424_create_cities_table', 1),
(2, '2026_03_25_221920_create_carriers_table', 1),
(3, '2026_03_25_222419_create_routes_table', 1),
(4, '2026_03_25_222800_create_route_stops_table', 1),
(5, '2026_03_25_230932_create_departures_table', 1),
(6, '2026_03_25_234028_create_roles_table', 1),
(7, '2026_03_25_234459_create_users_table', 1),
(8, '2026_03_25_235328_create_tickets_table', 1),
(9, '2026_03_26_195315_create_newsletters_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'user', '2026-04-04 23:07:51', '2026-04-04 23:07:51'),
(2, 'admin', '2026-04-04 23:07:51', '2026-04-04 23:07:51');

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `carrier_id` bigint(20) UNSIGNED NOT NULL,
  `seats` smallint(6) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`id`, `carrier_id`, `seats`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 50, 650.00, '2026-04-04 21:59:13', '2026-04-04 21:59:13'),
(2, 1, 50, 650.00, '2026-04-04 22:00:31', '2026-04-04 22:00:31'),
(3, 2, 48, 550.00, '2026-04-04 22:03:24', '2026-04-04 22:03:24'),
(4, 2, 48, 550.00, '2026-04-04 22:05:24', '2026-04-04 22:05:24'),
(5, 3, 52, 550.00, '2026-04-04 22:07:57', '2026-04-04 22:07:57'),
(6, 3, 52, 550.00, '2026-04-04 22:09:15', '2026-04-04 22:09:15'),
(7, 4, 60, 550.00, '2026-04-04 22:14:17', '2026-04-04 22:14:17'),
(8, 4, 60, 550.00, '2026-04-04 22:15:53', '2026-04-04 22:15:53'),
(9, 5, 50, 550.00, '2026-04-04 22:16:57', '2026-04-04 22:16:57'),
(10, 5, 50, 550.00, '2026-04-04 22:17:20', '2026-04-04 22:17:20'),
(11, 4, 54, 550.00, '2026-04-04 22:18:37', '2026-04-04 22:18:37'),
(12, 4, 54, 550.00, '2026-04-04 22:19:10', '2026-04-04 22:19:10');

-- --------------------------------------------------------

--
-- Table structure for table `route_stops`
--

CREATE TABLE `route_stops` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `route_id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `order` smallint(6) NOT NULL,
  `duration` smallint(6) DEFAULT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `route_stops`
--

INSERT INTO `route_stops` (`id`, `route_id`, `city_id`, `order`, `duration`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 1, NULL, NULL, '2026-04-04 21:59:13', '2026-04-04 21:59:13'),
(2, 1, 7, 2, 145, 500.00, '2026-04-04 21:59:13', '2026-04-04 21:59:13'),
(3, 1, 12, 3, 60, 200.00, '2026-04-04 21:59:13', '2026-04-04 21:59:13'),
(4, 1, 13, 4, 30, 150.00, '2026-04-04 21:59:13', '2026-04-04 21:59:13'),
(5, 2, 13, 1, NULL, NULL, '2026-04-04 22:00:31', '2026-04-04 22:00:31'),
(6, 2, 12, 2, 30, 150.00, '2026-04-04 22:00:31', '2026-04-04 22:00:31'),
(7, 2, 7, 3, 60, 200.00, '2026-04-04 22:00:31', '2026-04-04 22:00:31'),
(8, 2, 3, 4, 145, 500.00, '2026-04-04 22:00:31', '2026-04-04 22:00:31'),
(9, 3, 3, 1, NULL, NULL, '2026-04-04 22:03:24', '2026-04-04 22:03:24'),
(10, 3, 6, 2, 90, 350.00, '2026-04-04 22:03:24', '2026-04-04 22:03:24'),
(11, 3, 7, 3, 70, 300.00, '2026-04-04 22:03:24', '2026-04-04 22:03:24'),
(12, 3, 12, 4, 60, 250.00, '2026-04-04 22:03:24', '2026-04-04 22:03:24'),
(13, 3, 13, 5, 30, 150.00, '2026-04-04 22:03:24', '2026-04-04 22:03:24'),
(14, 4, 13, 1, NULL, NULL, '2026-04-04 22:05:24', '2026-04-04 22:05:24'),
(15, 4, 12, 2, 30, 150.00, '2026-04-04 22:05:24', '2026-04-04 22:05:24'),
(16, 4, 7, 3, 60, 250.00, '2026-04-04 22:05:24', '2026-04-04 22:05:24'),
(17, 4, 6, 4, 70, 300.00, '2026-04-04 22:05:24', '2026-04-04 22:05:24'),
(18, 4, 3, 5, 90, 350.00, '2026-04-04 22:05:24', '2026-04-04 22:05:24'),
(19, 5, 10, 1, NULL, NULL, '2026-04-04 22:07:57', '2026-04-04 22:07:57'),
(20, 5, 14, 2, 55, 250.00, '2026-04-04 22:07:57', '2026-04-04 22:07:57'),
(21, 5, 8, 3, 45, 200.00, '2026-04-04 22:07:57', '2026-04-04 22:07:57'),
(22, 5, 3, 4, 60, 300.00, '2026-04-04 22:07:57', '2026-04-04 22:07:57'),
(23, 6, 3, 1, NULL, NULL, '2026-04-04 22:09:15', '2026-04-04 22:09:15'),
(24, 6, 8, 2, 60, 300.00, '2026-04-04 22:09:15', '2026-04-04 22:09:15'),
(25, 6, 14, 3, 45, 200.00, '2026-04-04 22:09:15', '2026-04-04 22:09:15'),
(26, 6, 10, 4, 55, 250.00, '2026-04-04 22:09:15', '2026-04-04 22:09:15'),
(27, 7, 13, 1, NULL, NULL, '2026-04-04 22:14:17', '2026-04-04 22:14:17'),
(28, 7, 12, 2, 30, 150.00, '2026-04-04 22:14:17', '2026-04-04 22:14:17'),
(29, 7, 7, 3, 60, 300.00, '2026-04-04 22:14:17', '2026-04-04 22:14:17'),
(30, 7, 6, 4, 45, 250.00, '2026-04-04 22:14:17', '2026-04-04 22:14:17'),
(31, 7, 9, 5, 35, 200.00, '2026-04-04 22:14:17', '2026-04-04 22:14:17'),
(32, 7, 5, 6, 40, 200.00, '2026-04-04 22:14:17', '2026-04-04 22:14:17'),
(33, 7, 11, 7, 30, 150.00, '2026-04-04 22:14:17', '2026-04-04 22:14:17'),
(34, 7, 4, 8, 60, 300.00, '2026-04-04 22:14:17', '2026-04-04 22:14:17'),
(35, 8, 4, 1, NULL, NULL, '2026-04-04 22:15:53', '2026-04-04 22:15:53'),
(36, 8, 11, 2, 60, 300.00, '2026-04-04 22:15:53', '2026-04-04 22:15:53'),
(37, 8, 5, 3, 30, 150.00, '2026-04-04 22:15:53', '2026-04-04 22:15:53'),
(38, 8, 9, 4, 40, 200.00, '2026-04-04 22:15:53', '2026-04-04 22:15:53'),
(39, 8, 6, 5, 35, 200.00, '2026-04-04 22:15:53', '2026-04-04 22:15:53'),
(40, 8, 7, 6, 45, 250.00, '2026-04-04 22:15:53', '2026-04-04 22:15:53'),
(41, 8, 12, 7, 60, 300.00, '2026-04-04 22:15:53', '2026-04-04 22:15:53'),
(42, 8, 13, 8, 30, 150.00, '2026-04-04 22:15:53', '2026-04-04 22:15:53'),
(43, 9, 3, 1, NULL, NULL, '2026-04-04 22:16:57', '2026-04-04 22:16:57'),
(44, 9, 11, 2, 190, 900.00, '2026-04-04 22:16:57', '2026-04-04 22:16:57'),
(49, 12, 4, 1, NULL, NULL, '2026-04-04 22:19:10', '2026-04-04 22:19:10'),
(50, 12, 3, 2, 210, 1200.00, '2026-04-04 22:19:10', '2026-04-04 22:19:10'),
(51, 11, 3, 1, NULL, NULL, '2026-04-04 22:19:12', '2026-04-04 22:19:12'),
(52, 11, 4, 2, 210, 1200.00, '2026-04-04 22:19:12', '2026-04-04 22:19:12'),
(53, 10, 11, 1, NULL, NULL, '2026-04-04 22:42:42', '2026-04-04 22:42:42'),
(54, 10, 3, 2, 190, 900.00, '2026-04-04 22:42:42', '2026-04-04 22:42:42');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `departure_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `seat_number` smallint(6) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `date` date NOT NULL,
  `start_city` varchar(255) NOT NULL,
  `end_city` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `carrier_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `activation_code`, `password`, `role_id`, `carrier_id`, `created_at`, `updated_at`) VALUES
(1, 'Vuk', 'Drobnjakovic', 'user@gmail.com', '2026-04-04 23:10:04', NULL, '8bd90450f27706cf44aee43b5f691786', 1, NULL, '2026-04-04 21:09:32', '2026-04-04 21:09:32'),
(2, 'Vuk', 'Drobnjakovic', 'admin@gmail.com', '2026-04-04 23:11:19', NULL, '8bd90450f27706cf44aee43b5f691786', 2, NULL, '2026-04-04 21:11:00', '2026-04-04 21:11:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carriers`
--
ALTER TABLE `carriers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `carriers_name_unique` (`name`),
  ADD UNIQUE KEY `carriers_email_unique` (`email`),
  ADD UNIQUE KEY `carriers_phone_unique` (`phone`),
  ADD KEY `carriers_city_id_foreign` (`city_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cities_name_unique` (`name`);

--
-- Indexes for table `departures`
--
ALTER TABLE `departures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departures_route_id_date_index` (`route_id`,`date`),
  ADD KEY `departures_route_id_time_index` (`route_id`,`time`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `newsletters_email_unique` (`email`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `routes_carrier_id_foreign` (`carrier_id`);

--
-- Indexes for table `route_stops`
--
ALTER TABLE `route_stops`
  ADD PRIMARY KEY (`id`),
  ADD KEY `route_stops_city_id_foreign` (`city_id`),
  ADD KEY `route_stops_route_id_order_index` (`route_id`,`order`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_user_id_foreign` (`user_id`),
  ADD KEY `tickets_departure_id_date_index` (`departure_id`,`date`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`),
  ADD KEY `users_carrier_id_foreign` (`carrier_id`),
  ADD KEY `users_activation_code_index` (`activation_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carriers`
--
ALTER TABLE `carriers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `departures`
--
ALTER TABLE `departures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `route_stops`
--
ALTER TABLE `route_stops`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carriers`
--
ALTER TABLE `carriers`
  ADD CONSTRAINT `carriers_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`);

--
-- Constraints for table `departures`
--
ALTER TABLE `departures`
  ADD CONSTRAINT `departures_route_id_foreign` FOREIGN KEY (`route_id`) REFERENCES `routes` (`id`);

--
-- Constraints for table `routes`
--
ALTER TABLE `routes`
  ADD CONSTRAINT `routes_carrier_id_foreign` FOREIGN KEY (`carrier_id`) REFERENCES `carriers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `route_stops`
--
ALTER TABLE `route_stops`
  ADD CONSTRAINT `route_stops_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `route_stops_route_id_foreign` FOREIGN KEY (`route_id`) REFERENCES `routes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_departure_id_foreign` FOREIGN KEY (`departure_id`) REFERENCES `departures` (`id`),
  ADD CONSTRAINT `tickets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_carrier_id_foreign` FOREIGN KEY (`carrier_id`) REFERENCES `carriers` (`id`),
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
