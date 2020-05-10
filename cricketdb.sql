-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2020 at 10:03 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cricketdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team1` int(11) NOT NULL,
  `team2` int(11) NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `match_status` enum('win','loss') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`id`, `team1`, `team2`, `location`, `match_status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Mumbai', 'win', '2020-05-08 15:36:44', '2020-05-10 10:25:47'),
(2, 2, 1, 'Chennai', 'loss', '2020-05-09 11:13:27', '2020-05-09 15:18:41'),
(3, 3, 4, 'Delhi', 'win', '2020-05-09 12:07:40', '2020-05-09 12:07:40'),
(4, 5, 2, 'Kolkata', 'loss', '2020-05-09 12:07:59', '2020-05-09 12:07:59'),
(6, 2, 4, 'Mumbai', 'win', '2020-05-09 12:09:11', '2020-05-09 13:18:00'),
(7, 2, 4, 'Mumbai', 'loss', '2020-05-09 13:19:31', '2020-05-09 13:19:39'),
(8, 4, 3, 'Delhi', 'loss', '2020-05-09 15:19:21', '2020-05-09 15:19:40'),
(9, 1, 3, 'Kolkata', 'win', '2020-05-10 06:58:12', '2020-05-10 06:58:12'),
(10, 1, 3, 'Mumbai', 'win', '2020-05-10 07:20:17', '2020-05-10 07:20:17'),
(11, 3, 2, 'Delhi', 'loss', '2020-05-10 08:37:39', '2020-05-10 08:37:39'),
(12, 1, 4, 'Delhi', 'win', '2020-05-10 08:40:26', '2020-05-10 12:46:13'),
(14, 4, 7, 'Delhi', 'loss', '2020-05-10 12:50:48', '2020-05-10 12:50:57');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(19, '2014_10_12_000000_create_users_table', 1),
(20, '2014_10_12_100000_create_password_resets_table', 1),
(21, '2020_05_05_113923_create_teams_table', 1),
(22, '2020_05_05_114210_create_players_table', 1),
(23, '2020_05_05_115251_create_players_history_table', 1),
(24, '2020_05_05_120101_create_matches_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `identifier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imageUri` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `playerJerseyNumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `team_id`, `identifier`, `firstName`, `lastName`, `imageUri`, `playerJerseyNumber`, `country`, `created_at`, `updated_at`) VALUES
(10, 1, 'DB', 'Dwane', 'Bravo', 'uploads/1588941970.jpg', '45', 'NewZ', '2020-05-08 07:16:10', '2020-05-08 07:22:09'),
(11, 1, 'SW', 'Shane', 'Watsan', 'uploads/1588944219.jpg', '23', 'Australia', '2020-05-08 07:53:39', '2020-05-08 07:53:39'),
(12, 1, 'MSD', 'MS', 'Dhoni', 'uploads/1588945479.jpg', '7', 'India', '2020-05-08 08:14:39', '2020-05-08 08:14:39'),
(13, 2, 'Hitman', 'Rohit', 'Sharma', 'uploads/1588945532.jpg', '45', 'India', '2020-05-08 08:15:32', '2020-05-08 08:15:32'),
(14, 5, 'DK', 'Dinesh', 'Kartik', 'uploads/1589126624.jpg', '555', 'India', '2020-05-10 10:33:44', '2020-05-10 10:34:38'),
(15, 4, 'GG', 'Gautam', 'Gambhir', 'uploads/1589134809.jpg', '8', 'India', '2020-05-10 12:50:09', '2020-05-10 12:50:29');

-- --------------------------------------------------------

--
-- Table structure for table `players_history`
--

CREATE TABLE `players_history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `player_id` bigint(20) UNSIGNED DEFAULT NULL,
  `matches` int(11) DEFAULT NULL,
  `run` int(11) DEFAULT NULL,
  `highest_score` int(11) DEFAULT NULL,
  `fifties` int(11) DEFAULT NULL,
  `hundreds` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `players_history`
--

INSERT INTO `players_history` (`id`, `player_id`, `matches`, `run`, `highest_score`, `fifties`, `hundreds`, `created_at`, `updated_at`) VALUES
(1, NULL, 300, 10000, NULL, NULL, NULL, '2020-05-08 06:53:49', '2020-05-08 06:53:49'),
(4, NULL, 66, 6600, NULL, NULL, NULL, '2020-05-08 07:11:59', '2020-05-08 07:11:59'),
(5, 10, 450, 555, NULL, NULL, NULL, '2020-05-08 07:16:10', '2020-05-08 07:48:48'),
(6, 11, 665, 2589, NULL, NULL, NULL, '2020-05-08 07:53:39', '2020-05-08 07:53:39'),
(7, 12, 280, 15000, NULL, NULL, NULL, '2020-05-08 08:14:39', '2020-05-08 08:14:39'),
(8, 13, 200, 20000, NULL, NULL, NULL, '2020-05-08 08:15:32', '2020-05-08 08:15:32'),
(9, 14, 998, 255225, NULL, NULL, NULL, '2020-05-10 10:33:45', '2020-05-10 10:34:38'),
(10, 15, 2656, 4545, NULL, NULL, NULL, '2020-05-10 12:50:10', '2020-05-10 12:50:29');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `identifier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logoUri` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clubState` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `identifier`, `name`, `logoUri`, `clubState`, `created_at`, `updated_at`) VALUES
(1, 'CSk', 'Chennai Super Kings', 'uploads/1588940380.jpg', 'Chennai', '2020-05-08 06:49:40', '2020-05-08 06:49:40'),
(2, 'MI', 'Mumbai Indians', 'uploads/1588945427.png', 'Mumbai', '2020-05-08 08:13:47', '2020-05-08 08:13:47'),
(3, 'HYD', 'Hyderabad Team', 'uploads/1589045641.png', 'Hyderabad', '2020-05-09 12:04:01', '2020-05-09 12:04:01'),
(4, 'DC', 'Delhi Capitals', 'uploads/1589045698.png', 'Delhi', '2020-05-09 12:04:58', '2020-05-09 12:04:58'),
(5, 'KKR', 'kolkata knighter riders', 'uploads/1589045792.png', 'Kolkata', '2020-05-09 12:06:32', '2020-05-09 12:06:32'),
(7, 'RCB', 'Royal Challengers Banglore', 'uploads/1589134071.jpg', 'Banglore', '2020-05-10 12:37:51', '2020-05-10 12:40:57'),
(11, 'RR', 'Rajashthan Royals', 'uploads/1589140390.png', 'Rajasthan', '2020-05-10 14:23:10', '2020-05-10 14:27:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Vinod Pal', 'vinod161191@gmail.com', NULL, '$2y$10$p5a7dZVM9L/vAduvSLg7Cu.eC6SAfbro6XVjdF9Hyvbrjx/E61svS', NULL, '2020-05-08 06:49:04', '2020-05-08 06:49:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
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
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `players_identifier_unique` (`identifier`),
  ADD KEY `players_team_id_foreign` (`team_id`);

--
-- Indexes for table `players_history`
--
ALTER TABLE `players_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `players_history_player_id_foreign` (`player_id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teams_identifier_unique` (`identifier`);

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
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `players_history`
--
ALTER TABLE `players_history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `players_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `players_history`
--
ALTER TABLE `players_history`
  ADD CONSTRAINT `players_history_player_id_foreign` FOREIGN KEY (`player_id`) REFERENCES `players` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
