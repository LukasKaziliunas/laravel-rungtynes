-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2019 m. Grd 06 d. 21:41
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rungtynes`
--

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `matches`
--

CREATE TABLE `matches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `place` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team1` int(10) UNSIGNED NOT NULL,
  `team2` int(10) UNSIGNED NOT NULL,
  `sport` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sukurta duomenų kopija lentelei `matches`
--

INSERT INTO `matches` (`id`, `name`, `time`, `date`, `place`, `team1`, `team2`, `sport`) VALUES
(10, 'ABC', '14:00:00', '2019-11-15', 'Žalgirio arena', 5, 6, 1),
(12, 'A lyga', '13:00:00', '2019-11-20', 'Panevėžio stadionas', 7, 10, 2);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sukurta duomenų kopija lentelei `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '2014_10_12_000000_create_users_table', 1),
(7, '2019_10_14_164919_create_sports_table', 1),
(8, '2019_10_14_164943_create_teams_table', 1),
(9, '2019_10_14_165008_create_news_table', 1),
(10, '2019_10_14_165436_create_matches_table', 1);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `sport_fk` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sukurta duomenų kopija lentelei `news`
--

INSERT INTO `news` (`id`, `description`, `text`, `sport_fk`) VALUES
(1, 'krepsinionaujiena1', 'aaaaaaaasfkasnkdjfbkhdfhawlvsvahjsvhjashdvfjhsadvn asdjkvkgaddugasdkfkdshfDSDasdshjdgnvshdhvdhvhsdv ghdvdhvdjhvhd', 1),
(2, 'futbolo naujiena 1', 'ejfvsdfsdfgsfhfadb', 2),
(3, 'futbolo naujiena 2 ', 'efgasdfsdfasfsdfas', 2);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `sports`
--

CREATE TABLE `sports` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sukurta duomenų kopija lentelei `sports`
--

INSERT INTO `sports` (`id`, `name`) VALUES
(1, 'krepsinis'),
(2, 'futbolas'),
(3, 'ledoritulys'),
(4, 'tenisas');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `teams`
--

CREATE TABLE `teams` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sport_fk` int(10) UNSIGNED NOT NULL,
  `trum` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sukurta duomenų kopija lentelei `teams`
--

INSERT INTO `teams` (`id`, `name`, `sport_fk`, `trum`) VALUES
(5, 'Kauno Žalgiris', 1, NULL),
(6, 'Lietuvos rytas', 1, NULL),
(7, 'Sūduva', 2, NULL),
(8, 'FK Jonava', 2, NULL),
(9, 'Rygos Dinamo ', 3, NULL),
(10, 'Bruins', 3, NULL),
(11, 'Klaipedos \"Neptunas\"', 1, NULL),
(18, 'test', 2, NULL);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sukurta duomenų kopija lentelei `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Lukas', 'test@123', NULL, '$2y$10$f1Ql7chnD1130HOrjhsd7..9eWsyllzw8/oxmpIf8nn9ThR6FXuRm', NULL, '2019-11-17 16:11:33', '2019-11-17 16:11:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matches_team1_foreign` (`team1`),
  ADD KEY `matches_team2_foreign` (`team2`),
  ADD KEY `matches_sport_foreign` (`sport`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_sport_fk_foreign` (`sport_fk`);

--
-- Indexes for table `sports`
--
ALTER TABLE `sports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_sport_fk_foreign` (`sport_fk`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sports`
--
ALTER TABLE `sports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Apribojimai eksportuotom lentelėm
--

--
-- Apribojimai lentelei `matches`
--
ALTER TABLE `matches`
  ADD CONSTRAINT `matches_sport_foreign` FOREIGN KEY (`sport`) REFERENCES `sports` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `matches_team1_foreign` FOREIGN KEY (`team1`) REFERENCES `teams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `matches_team2_foreign` FOREIGN KEY (`team2`) REFERENCES `teams` (`id`) ON DELETE CASCADE;

--
-- Apribojimai lentelei `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_sport_fk_foreign` FOREIGN KEY (`sport_fk`) REFERENCES `sports` (`id`) ON DELETE CASCADE;

--
-- Apribojimai lentelei `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `teams_sport_fk_foreign` FOREIGN KEY (`sport_fk`) REFERENCES `sports` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
