-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 07 juin 2022 à 10:13
-- Version du serveur : 5.7.33
-- Version de PHP : 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestsalle`
--

-- --------------------------------------------------------

--
-- Structure de la table `csv_data`
--

CREATE TABLE `csv_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `csv_filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `csv_header` tinyint(1) NOT NULL DEFAULT '0',
  `csv_data` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `csv_data`
--

INSERT INTO `csv_data` (`id`, `csv_filename`, `csv_header`, `csv_data`, `created_at`, `updated_at`) VALUES
(1, 'Classeur1.csv', 1, '[{\"5\": 2, \"a\": \"b\", \"12\": 321, \"salle_de_classe\": \"Salle de classe\"}]', '2022-03-02 09:13:49', '2022-03-02 09:13:49'),
(2, 'Classeur1.csv', 1, '[{\"5\": 2, \"a\": \"b\", \"12\": 321, \"salle_de_classe\": \"Salle de classe\"}]', '2022-03-02 09:15:00', '2022-03-02 09:15:00'),
(3, 'Classeur1.csv', 0, '[[\"a;5;12;Salle de classe\"], [\"b;2;321;Salle de classe\"]]', '2022-03-02 09:23:25', '2022-03-02 09:23:25'),
(4, 'Classeur1.csv', 1, '[{\"5\": 2, \"a\": \"b\", \"12\": 321, \"salle_de_classe\": \"Salle de classe\"}]', '2022-03-02 09:24:10', '2022-03-02 09:24:10'),
(5, 'Classeur1.csv', 1, '[{\"nom\": \"Salle de classe\", \"num\": 12, \"etage\": 5, \"batiment\": \"a\"}, {\"nom\": \"Salle de classe\", \"num\": 321, \"etage\": 2, \"batiment\": \"b\"}]', '2022-03-02 09:31:01', '2022-03-02 09:31:01'),
(6, 'Classeur1.csv', 1, '[{\"nom\": \"Salle de classe\", \"num\": 12, \"etage\": 5, \"batiment\": \"a\"}, {\"nom\": \"Salle de classe\", \"num\": 321, \"etage\": 2, \"batiment\": \"b\"}]', '2022-03-02 09:31:20', '2022-03-02 09:31:20'),
(7, 'Classeur1.csv', 0, '[[\"batiment;etage;num;nom\"], [\"a;5;12;Salle de classe\"], [\"b;2;321;Salle de classe\"]]', '2022-03-02 09:46:56', '2022-03-02 09:46:56'),
(8, 'Classeur1.csv', 0, '[[\"batiment;etage;num;nom\"], [\"a;5;12;Salle de classe\"], [\"b;2;321;Salle de classe\"]]', '2022-03-02 09:48:26', '2022-03-02 09:48:26'),
(9, 'Classeur1.csv', 1, '[{\"nom\": \"Salle de classe\", \"num\": 12, \"etage\": 5, \"batiment\": \"a\"}, {\"nom\": \"Salle de classe\", \"num\": 321, \"etage\": 2, \"batiment\": \"b\"}]', '2022-03-02 09:48:30', '2022-03-02 09:48:30'),
(10, 'Classeur1.csv', 1, '[{\"nom\": \"Salle de classe\", \"num\": 12, \"etage\": 5, \"batiment\": \"a\"}, {\"nom\": \"Salle de classe\", \"num\": 321, \"etage\": 2, \"batiment\": \"b\"}]', '2022-03-02 09:48:39', '2022-03-02 09:48:39'),
(11, 'Classeur1.csv', 1, '[{\"nom\": \"Salle de classe\", \"num\": 12, \"etage\": 5, \"batiment\": \"a\"}, {\"nom\": \"Salle de classe\", \"num\": 321, \"etage\": 2, \"batiment\": \"b\"}]', '2022-03-02 09:49:01', '2022-03-02 09:49:01'),
(12, 'Classeur1.csv', 0, '[[\"batiment;etage;num;nom\"], [\"a;5;12;Salle de classe\"], [\"b;2;321;Salle de classe\"]]', '2022-03-02 09:49:50', '2022-03-02 09:49:50'),
(13, 'Classeur1.csv', 1, '[{\"nom\": \"Salle de classe\", \"num\": 12, \"etage\": 5, \"batiment\": \"a\"}, {\"nom\": \"Salle de classe\", \"num\": 321, \"etage\": 2, \"batiment\": \"b\"}]', '2022-03-02 09:49:59', '2022-03-02 09:49:59'),
(14, 'Classeur1.csv', 0, '[[\"batiment;etage;num;nom\"], [\"a;5;12;Salle de classe\"], [\"b;2;321;Salle de classe\"]]', '2022-03-02 09:51:37', '2022-03-02 09:51:37'),
(15, 'Classeur1.csv', 0, '[[\"batiment;etage;num;nom\"], [\"a;5;12;Salle de classe\"], [\"b;2;321;Salle de classe\"]]', '2022-03-02 09:51:59', '2022-03-02 09:51:59'),
(16, 'Classeur1.csv', 0, '[[\"batiment;etage;num;nom\"], [\"a;5;12;Salle de classe\"], [\"b;2;321;Salle de classe\"]]', '2022-03-02 09:52:25', '2022-03-02 09:52:25'),
(17, 'Classeur1.csv', 0, '[[\"batiment;etage;num;nom\"], [\"a;5;12;Salle de classe\"], [\"b;2;321;Salle de classe\"]]', '2022-03-02 09:53:07', '2022-03-02 09:53:07'),
(18, 'Classeur1.csv', 1, '[{\"nom\": \"Salle de classe\", \"num\": 12, \"etage\": 5, \"batiment\": \"a\"}, {\"nom\": \"Salle de classe\", \"num\": 321, \"etage\": 2, \"batiment\": \"b\"}]', '2022-03-02 09:54:00', '2022-03-02 09:54:00'),
(19, 'Classeur1.csv', 1, '[{\"nom\": \"Salle de classe\", \"num\": 12, \"etage\": 5, \"batiment\": \"a\"}, {\"nom\": \"Salle de classe\", \"num\": 321, \"etage\": 2, \"batiment\": \"b\"}]', '2022-03-04 07:47:28', '2022-03-04 07:47:28'),
(20, 'Classeur1.csv', 1, '[{\"nom\": \"Salle de classe\", \"num\": 12, \"etage\": \"a\", \"batiment\": \"a\"}, {\"nom\": \"Salle de classe\", \"num\": 321, \"etage\": 2, \"batiment\": \"b\"}]', '2022-03-04 07:59:18', '2022-03-04 07:59:18'),
(21, 'Classeur1.csv', 1, '[{\"nom\": \"Salle de classe\", \"num\": 12, \"etage\": \"a\", \"batiment\": \"a\"}, {\"nom\": \"Salle de classe\", \"num\": 321, \"etage\": 2, \"batiment\": \"b\"}]', '2022-03-04 08:14:50', '2022-03-04 08:14:50'),
(22, 'Classeur1.csv', 1, '[{\"nom\": \"Salle de classe\", \"num\": 12, \"etage\": \"a\", \"batiment\": \"a\"}, {\"nom\": \"Salle de classe\", \"num\": 321, \"etage\": 2, \"batiment\": \"b\"}]', '2022-03-04 08:15:43', '2022-03-04 08:15:43'),
(23, 'Classeur1.csv', 1, '[{\"nom\": \"Salle de classe\", \"num\": 12, \"etage\": \"a\", \"batiment\": \"a\"}, {\"nom\": \"Salle de classe\", \"num\": 321, \"etage\": 2, \"batiment\": \"b\"}]', '2022-03-04 08:19:00', '2022-03-04 08:19:00'),
(24, 'Classeur1.csv', 1, '[{\"nom\": \"Salle de classe\", \"num\": 12, \"etage\": \"a\", \"batiment\": \"a\"}, {\"nom\": \"Salle de classe\", \"num\": 321, \"etage\": 2, \"batiment\": \"b\"}]', '2022-03-04 08:26:25', '2022-03-04 08:26:25'),
(25, 'Classeur1.csv', 1, '[{\"nom\": \"Salle de classe\", \"num\": 12, \"etage\": \"a\", \"batiment\": \"a\"}, {\"nom\": \"Salle de classe\", \"num\": 321, \"etage\": 2, \"batiment\": \"b\"}]', '2022-03-04 08:28:55', '2022-03-04 08:28:55'),
(26, 'Classeur1.csv', 1, '[{\"nom\": \"Salle de classe\", \"num\": 12, \"etage\": \"a\", \"batiment\": \"a\"}, {\"nom\": \"Salle de classe\", \"num\": 321, \"etage\": 2, \"batiment\": \"b\"}]', '2022-03-04 08:33:09', '2022-03-04 08:33:09'),
(27, 'Classeur1.csv', 1, '[{\"nom\": \"Salle de classe\", \"num\": 12, \"etage\": \"a\", \"batiment\": \"a\"}, {\"nom\": \"Salle de classe\", \"num\": 321, \"etage\": 2, \"batiment\": \"b\"}]', '2022-03-04 08:42:58', '2022-03-04 08:42:58'),
(28, 'Classeur1.csv', 1, '[{\"nom\": \"Salle de classe\", \"num\": 12, \"etage\": \"a\", \"batiment\": \"a\"}, {\"nom\": \"Salle de classe\", \"num\": 321, \"etage\": 2, \"batiment\": \"b\"}]', '2022-03-04 08:45:26', '2022-03-04 08:45:26'),
(29, 'Classeur1.csv', 1, '[{\"nom\": \"Salle de classe\", \"num\": 12, \"etage\": \"a\", \"batiment\": \"a\"}, {\"nom\": \"Salle de classe\", \"num\": 321, \"etage\": 2, \"batiment\": \"b\"}]', '2022-03-04 08:45:41', '2022-03-04 08:45:41'),
(30, 'Classeur1.csv', 1, '[{\"nom\": \"Salle de classe\", \"num\": 12, \"etage\": \"a\", \"batiment\": \"a\"}, {\"nom\": \"Salle de classe\", \"num\": 321, \"etage\": 2, \"batiment\": \"b\"}]', '2022-03-04 08:58:57', '2022-03-04 08:58:57'),
(31, 'Classeur1.csv', 1, '[{\"nom\": \"Salle de classe\", \"num\": 12, \"etage\": \"a\", \"batiment\": \"a\"}, {\"nom\": \"Salle de classe\", \"num\": 321, \"etage\": 2, \"batiment\": \"b\"}]', '2022-03-04 09:02:13', '2022-03-04 09:02:13'),
(32, 'Classeur1.csv', 1, '[{\"nom\": \"Salle de classe\", \"num\": 12, \"etage\": \"a\", \"batiment\": \"a\"}, {\"nom\": \"Salle de classe\", \"num\": 321, \"etage\": 2, \"batiment\": \"b\"}]', '2022-03-04 09:04:57', '2022-03-04 09:04:57'),
(33, 'Classeur1.csv', 1, '[{\"nom\": \"Salle de classe\", \"num\": 12, \"etage\": \"a\", \"batiment\": \"a\"}, {\"nom\": \"Salle de classe\", \"num\": 321, \"etage\": 2, \"batiment\": \"b\"}]', '2022-03-04 09:27:57', '2022-03-04 09:27:57'),
(34, 'Classeur1.csv', 1, '[{\"nom\": \"Salle de classe\", \"num\": 12, \"etage\": \"a\", \"batiment\": \"a\"}, {\"nom\": \"Salle de classe\", \"num\": 321, \"etage\": 2, \"batiment\": \"b\"}]', '2022-03-04 09:34:04', '2022-03-04 09:34:04'),
(35, 'Classeur1.csv', 1, '[{\"nom\": \"Salle de classe\", \"num\": 12, \"etage\": \"a\", \"batiment\": \"a\"}, {\"nom\": \"Salle de classe\", \"num\": 321, \"etage\": 2, \"batiment\": \"b\"}]', '2022-03-04 09:36:04', '2022-03-04 09:36:04'),
(36, 'Classeur1.csv', 1, '[{\"nom\": \"Salle de classe\", \"num\": 12, \"etage\": \"a\", \"batiment\": \"a\"}, {\"nom\": \"Salle de classe\", \"num\": 321, \"etage\": 2, \"batiment\": \"b\"}]', '2022-03-04 12:40:18', '2022-03-04 12:40:18'),
(37, 'Classeur1.csv', 1, '[{\"nom\": \"Salle de classe\", \"num\": 12, \"etage\": \"a\", \"batiment\": \"a\"}, {\"nom\": \"Salle de classe\", \"num\": 321, \"etage\": 2, \"batiment\": \"b\"}]', '2022-03-04 12:55:50', '2022-03-04 12:55:50'),
(38, 'Classeur1.csv', 1, '[{\"nom\": \"Salle de classe\", \"num\": 12, \"etage\": \"a\", \"batiment\": \"a\"}, {\"nom\": \"Salle de classe\", \"num\": 321, \"etage\": 2, \"batiment\": \"b\"}]', '2022-03-04 12:58:13', '2022-03-04 12:58:13'),
(39, 'Classeur1.csv', 1, '[{\"nom\": \"Salle de classe\", \"num\": 12, \"etage\": \"a\", \"batiment\": \"a\"}, {\"nom\": \"Salle de classe\", \"num\": 321, \"etage\": 2, \"batiment\": \"b\"}]', '2022-03-04 12:58:26', '2022-03-04 12:58:26'),
(40, 'Classeur1.csv', 1, '[{\"nom\": \"Salle de classe\", \"num\": 12, \"etage\": \"a\", \"batiment\": \"a\"}, {\"nom\": \"Salle de classe\", \"num\": 321, \"etage\": 2, \"batiment\": \"b\"}]', '2022-03-04 13:02:12', '2022-03-04 13:02:12'),
(41, 'Classeur1.csv', 1, '[{\"nom\": \"Salle de classe\", \"num\": 12, \"etage\": \"a\", \"batiment\": \"a\"}, {\"nom\": \"Salle de classe\", \"num\": 321, \"etage\": 2, \"batiment\": \"b\"}]', '2022-03-04 13:07:21', '2022-03-04 13:07:21'),
(42, 'Classeur1.csv', 1, '[{\"nom\": \"Salle de classe\", \"num\": 12, \"etage\": \"a\", \"batiment\": \"a\"}, {\"nom\": \"Salle de classe\", \"num\": 321, \"etage\": 2, \"batiment\": \"b\"}]', '2022-03-04 13:07:46', '2022-03-04 13:07:46'),
(43, 'Classeur1.csv', 1, '[{\"nom\": \"Salle de classe\", \"num\": 12, \"etage\": \"a\", \"batiment\": \"a\"}, {\"nom\": \"Salle de classe\", \"num\": 321, \"etage\": 2, \"batiment\": \"b\"}]', '2022-03-04 13:10:32', '2022-03-04 13:10:32'),
(44, 'Classeur1.csv', 1, '[{\"nom\": \"Salle de classe\", \"num\": 12, \"etage\": \"a\", \"batiment\": \"a\"}, {\"nom\": \"Salle de classe\", \"num\": 321, \"etage\": 2, \"batiment\": \"b\"}]', '2022-03-04 13:13:28', '2022-03-04 13:13:28'),
(45, 'Classeur1.csv', 1, '[{\"nom\": \"Salle de classe\", \"num\": 12, \"etage\": \"a\", \"batiment\": \"a\"}, {\"nom\": \"Salle de classe\", \"num\": 321, \"etage\": 2, \"batiment\": \"b\"}]', '2022-03-04 13:14:57', '2022-03-04 13:14:57'),
(46, 'Classeur1.csv', 1, '[{\"nom\": \"Salle de classe\", \"num\": 12, \"etage\": \"a\", \"batiment\": \"a\"}, {\"nom\": \"Salle de classe\", \"num\": 321, \"etage\": 2, \"batiment\": \"b\"}]', '2022-03-04 13:15:21', '2022-03-04 13:15:21'),
(47, 'Classeur1.csv', 1, '[{\"nom\": \"Salle de classe\", \"num\": 12, \"etage\": \"a\", \"batiment\": \"a\"}, {\"nom\": \"Salle de classe\", \"num\": 321, \"etage\": 2, \"batiment\": \"b\"}]', '2022-03-04 13:15:36', '2022-03-04 13:15:36'),
(48, 'Classeur1.csv', 1, '[{\"nom\": \"Salle de classe\", \"num\": 12, \"etage\": \"a\", \"batiment\": \"a\"}, {\"nom\": \"Salle de classe\", \"num\": 321, \"etage\": 2, \"batiment\": \"b\"}]', '2022-03-04 13:18:03', '2022-03-04 13:18:03'),
(49, 'Classeur1.csv', 1, '[{\"nom\": \"Salle de classe\", \"num\": 12, \"etage\": \"a\", \"batiment\": \"a\"}, {\"nom\": \"Salle de classe\", \"num\": 321, \"etage\": 2, \"batiment\": \"b\"}]', '2022-03-04 13:32:10', '2022-03-04 13:32:10'),
(50, 'Classeur1.csv', 1, '[{\"nom\": \"Salle de classe\", \"num\": 12, \"etage\": \"a\", \"batiment\": \"a\"}, {\"nom\": \"Salle de classe\", \"num\": 321, \"etage\": 2, \"batiment\": \"b\"}]', '2022-03-04 13:33:19', '2022-03-04 13:33:19'),
(51, 'Classeur1.csv', 1, '[{\"nom\": \"Salle de classe\", \"num\": 12, \"etage\": \"a\", \"batiment\": \"a\"}, {\"nom\": \"Salle de classe\", \"num\": 321, \"etage\": 2, \"batiment\": \"b\"}]', '2022-03-21 13:34:27', '2022-03-21 13:34:27'),
(52, 'Classeur1.csv', 1, '[{\"nom\": \"Salle de classe\", \"num\": 12, \"etage\": \"a\", \"batiment\": \"a\"}, {\"nom\": \"Salle de classe\", \"num\": 321, \"etage\": 2, \"batiment\": \"b\"}]', '2022-03-28 05:36:55', '2022-03-28 05:36:55');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3, '2022_03_09_135703_create_photos_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `fileName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `idSalle` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `options`
--

INSERT INTO `options` (`id`, `libelle`, `fileName`, `idSalle`, `updated_at`, `created_at`) VALUES
(1, 'hautparleur', '', 4, '2022-01-24 07:42:46', '2022-01-24 07:42:46'),
(2, 'projecteur', '', 4, '2022-01-24 07:44:29', '2022-01-24 07:44:29'),
(3, 'Galet', '1648815643.jpg', 4, '2022-04-01 10:20:43', '2022-04-01 10:20:43');

-- --------------------------------------------------------

--
-- Structure de la table `photos`
--

CREATE TABLE `photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fileName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idSalle` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `photos`
--

INSERT INTO `photos` (`id`, `nom`, `fileName`, `idSalle`, `created_at`, `updated_at`) VALUES
(5, 'qsdqdqsd', '1648800304.jpg', 4, '2022-04-01 06:05:04', '2022-04-01 06:05:04');

-- --------------------------------------------------------

--
-- Structure de la table `salles`
--

CREATE TABLE `salles` (
  `id` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `batiment` varchar(255) NOT NULL,
  `etage` varchar(255) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `salles`
--

INSERT INTO `salles` (`id`, `num`, `nom`, `batiment`, `etage`, `updated_at`, `created_at`) VALUES
(4, 12456, 'Salle qq', 'a', '5', '2022-03-28 08:15:05', '2022-03-02 09:31:24'),
(9, 321, 'Salle de classe', 'b', '2', '2022-03-04 09:36:05', '2022-03-04 09:36:05'),
(10, 6456, 'Unesalle', 'A', '1', '2022-03-25 13:34:43', '2022-03-25 13:34:43');

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('coAB6UBDNEImBEGaXBQLZwGOix7qao4Mc19duYBe', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.61 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoicnJRRERqdlZZeXlkbndudVFtZ0oyZG82SmtGQTBwRk1od0JMOU5qVSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly9nZXN0c2FsbGUudGVzdC80L3Nob3dJbmZvIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJFd0N1M3anRxRW15eHFwd3VORTFFNGVhVk1jazU2bXhUZE9keVltcVB3U1RZZ05GT2c0Yi4uIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRXdDdTN2p0cUVteXhxcHd1TkUxRTRlYVZNY2s1Nm14VGRPZHlZbXFQd1NUWWdORk9nNGIuLiI7fQ==', 1654586794);

-- --------------------------------------------------------

--
-- Structure de la table `typeusers`
--

CREATE TABLE `typeusers` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `typeusers`
--

INSERT INTO `typeusers` (`id`, `libelle`) VALUES
(0, 'Administrateur'),
(1, 'Technicien'),
(2, 'Gestionnaire de batiment');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `idType_users` int(11) NOT NULL,
  `two_factor_secret` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `idType_users`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'admin@mail.test', NULL, '$2y$10$Wt7S7jtqEmyxqpwuNE1E4eaVMck56mxTdOdyYmqPwSTYgNFOg4b..', 0, NULL, NULL, NULL, NULL, NULL, '2021-11-29 12:13:55', '2021-11-29 12:13:55'),
(3, 'tech', 'technician@mail.test', NULL, '$2y$10$zwJxXqn1rsnxrECXRJ2iEeYjn.i0TKjdfMd9lv3cYZIFypbbRxlJa', 1, NULL, NULL, NULL, NULL, NULL, '2021-12-06 13:34:16', '2021-12-06 13:34:16'),
(4, 'gest', 'gestionnaire@mail.test', NULL, '$2y$10$VVrot7v9sGaAmN4iOzDLiep6z9wRnue7JfJwwCcOWIHIz0DvSOi5O', 2, NULL, NULL, NULL, NULL, NULL, '2021-12-06 13:36:48', '2021-12-06 13:36:48'),
(5, 'gest2', 'gest2@mail.test', NULL, 'gest', 2, NULL, NULL, NULL, NULL, NULL, '2022-03-15 13:08:26', '2022-03-15 13:08:26');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `csv_data`
--
ALTER TABLE `csv_data`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idSalle` (`idSalle`);

--
-- Index pour la table `salles`
--
ALTER TABLE `salles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Index pour la table `typeusers`
--
ALTER TABLE `typeusers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `idType_users` (`idType_users`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `csv_data`
--
ALTER TABLE `csv_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `salles`
--
ALTER TABLE `salles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_ibfk_1` FOREIGN KEY (`idSalle`) REFERENCES `salles` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`idType_users`) REFERENCES `typeusers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
