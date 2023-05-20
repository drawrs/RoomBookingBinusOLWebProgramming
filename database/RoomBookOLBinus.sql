-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 20, 2023 at 11:14 PM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `RoomBookOLBinus`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_transactions`
--

CREATE TABLE `detail_transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `trans_id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `days` int(11) NOT NULL,
  `sub_total_room` decimal(10,2) NOT NULL,
  `extra_charge` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `detail_transactions`
--

INSERT INTO `detail_transactions` (`id`, `trans_id`, `room_id`, `days`, `sub_total_room`, `extra_charge`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3, '600.00', '30.00', NULL, NULL),
(2, 2, 2, 2, '300.00', '10.00', NULL, NULL),
(3, 3, 3, 4, '1000.00', '50.00', NULL, NULL),
(5, 12, 4, 3, '750.00', '500.00', '2023-05-19 18:37:06', '2023-05-19 18:37:06'),
(6, 13, 1, 3, '600.00', '500.00', '2023-05-19 19:19:34', '2023-05-19 19:19:34'),
(7, 14, 8, 30, '600000.00', '2000.00', '2023-05-19 19:21:48', '2023-05-19 19:21:48'),
(8, 15, 1, 2, '400.00', '135000.00', '2023-05-19 19:44:37', '2023-05-19 19:44:37'),
(9, 16, 4, 3, '750.00', '115000.00', '2023-05-19 19:48:08', '2023-05-19 19:48:08');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2023_05_19_041802_create_rooms_table', 1),
(4, '2023_05_19_041803_create_detail_transactions_table', 1),
(5, '2023_05_19_041803_create_room_types_table', 1),
(6, '2023_05_19_041803_create_transactions_table', 1),
(7, '2014_10_12_000000_create_users_table', 2);

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
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `room_type_id` bigint(20) UNSIGNED NOT NULL,
  `room_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `area` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `facility` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_type_id`, `room_name`, `area`, `price`, `facility`, `created_at`, `updated_at`) VALUES
(1, 1, 'Deluxe Room 12', 30, '200.00', 'Wi-Fi, TV', NULL, '2023-05-19 00:26:50'),
(2, 2, 'Standard Room 1', 25, '150.00', 'Wi-Fi', NULL, NULL),
(3, 1, 'Deluxe Room 2', 30, '200.00', 'Wi-Fi, TV', NULL, NULL),
(4, 3, 'Executive Room 1', 40, '250.00', 'Wi-Fi, Minibar', NULL, NULL),
(7, 2, 'Deluxe Room 1XD', 20, '300.00', 'All things worked', '2023-05-19 00:36:48', '2023-05-19 00:36:48'),
(8, 1, 'Deluxe Room 1XD', 20, '20000.00', 'wow', '2023-05-19 00:39:07', '2023-05-19 00:39:07');

-- --------------------------------------------------------

--
-- Table structure for table `room_types`
--

CREATE TABLE `room_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `room_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `room_types`
--

INSERT INTO `room_types` (`id`, `room_type`, `created_at`, `updated_at`) VALUES
(1, 'Deluxe', NULL, NULL),
(2, 'Standard', NULL, NULL),
(3, 'Executive', NULL, NULL),
(5, 'Super Room 3', '2023-05-19 02:49:51', '2023-05-19 03:01:38'),
(7, 'Agus Room', '2023-05-19 03:05:53', '2023-05-19 03:05:53');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `trans_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trans_date` date NOT NULL,
  `cust_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_room_price` decimal(10,2) NOT NULL,
  `total_extra_charge` decimal(10,2) NOT NULL,
  `final_total` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `trans_code`, `trans_date`, `cust_name`, `total_room_price`, `total_extra_charge`, `final_total`, `created_at`, `updated_at`) VALUES
(1, 'ABC123', '2023-05-01', 'John Doe Du', '400.00', '50.00', '450.00', NULL, '2023-05-19 03:31:37'),
(2, 'DEF456', '2023-05-27', 'Jane Smith', '300.00', '25.00', '325.00', NULL, '2023-05-19 03:31:47'),
(3, 'GHI789', '2023-05-03', 'Michael Brown', '500.00', '75.00', '575.00', NULL, NULL),
(12, 'aso23j', '2023-05-12', 'Asep', '2250.00', '1500.00', '2250.00', '2023-05-19 18:37:06', '2023-05-19 18:37:06'),
(13, 'qW0O6Kni', '2023-05-20', 'Joko', '2100.00', '1500.00', '2100.00', '2023-05-19 19:19:34', '2023-05-19 19:19:34'),
(14, 'PZusrdWK', '2023-05-30', 'Joko', '660000.00', '60000.00', '660000.00', '2023-05-19 19:21:48', '2023-05-19 19:21:48'),
(15, 'cZpnSGh1', '2023-05-20', 'Joko', '400.00', '270000.00', '270400.00', '2023-05-19 19:44:37', '2023-05-19 19:44:37'),
(16, 'w7u1PEF2', '2023-05-17', 'Agus', '345750.00', '345000.00', '345750.00', '2023-05-19 19:48:08', '2023-05-19 19:48:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_type` enum('Admin','User') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'User',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `user_type`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$x/78TmsCSM9wUaVh2gDr2uFNv07Efs9Ko8PAiz2FD3xw7eKWj.66.', 'CmEN3BeIvdaYT07Zfq2KCKGwDEeUD6qxrWQrGKZTcM4zBQvsuCDhbBkaWG4a', 'Admin', '2023-05-18 23:20:47', '2023-05-19 19:37:48'),
(2, 'Joko', 'joko@gmail.com', '$2y$10$4Pb2At0ijJXYG7TXp7bYP.V2MkeOFOdcOnBuUrhlEBL24cnw79pSW', 'iAgkb7GJk4tJL6DQho0cZ0qJwEI0peyuEUHZh7dxEEz4uTN8OyAEbF4p09g8', 'User', '2023-05-19 19:08:42', '2023-05-20 16:06:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_transactions`
--
ALTER TABLE `detail_transactions`
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
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_types`
--
ALTER TABLE `room_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
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
-- AUTO_INCREMENT for table `detail_transactions`
--
ALTER TABLE `detail_transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `room_types`
--
ALTER TABLE `room_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
