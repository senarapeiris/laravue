SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



--
-- Database: `registration`
--

-- --------------------------------------------------------

-
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Iresha Perera', 'iresha@gmail.com', NULL, '$2y$10$lnKKrNzORknv4AXKi5FNS.RuakZDcbbyunrNxWdXCX0sAdgI0P.H6', NULL, 'admin', 1, '2022-03-11 05:05:33', '2022-03-11 05:05:33'),
(2, 'test user', 'user@gmail.com', NULL, '$2y$10$lnKKrNzORknv4AXKi5FNS.RuakZDcbbyunrNxWdXCX0sAdgI0P.H6', NULL, 'user', 1, NULL, NULL),
(3, 'iresha 2', 'iresha2@gmail.com', NULL, '$2y$10$VzwAqDH0mK2Vr4Maemhk1.PvpDgc.VV/NaW1ecXgG89GaMxJ5mR9q', NULL, 'user', 1, '2022-03-11 12:38:44', '2022-03-11 12:50:18');

