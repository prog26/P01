-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 27 mars 2026 à 13:14
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `prompt`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`) VALUES
(1, 'Code', '2026-03-24 12:33:42'),
(2, 'Marketing', '2026-03-24 12:33:42'),
(4, 'DevOps', '2026-03-24 12:33:42'),
(5, 'PYTHON', '2026-03-24 16:11:36'),
(6, 'java', '2026-03-25 11:55:07'),
(9, 'rtyuio', '2026-03-26 13:25:49'),
(10, 'kamal', '2026-03-26 22:30:53');

-- --------------------------------------------------------

--
-- Structure de la table `prompts`
--

CREATE TABLE `prompts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `prompts`
--

INSERT INTO `prompts` (`id`, `title`, `content`, `user_id`, `category_id`, `created_at`) VALUES
(15, 'abc', 'SA,MNakjxbaskjbxcgv', 3, 1, '2026-03-26 13:11:02'),
(18, 'abc', 'asjkndahdaJNKAS', 3, 6, '2026-03-26 21:17:11'),
(19, 'abc', 'sajaDUKHGKASUDAKJDH', 3, 4, '2026-03-27 09:00:21'),
(20, 'uhdugu', 'aSDKJdiHDIAHDWQ', 11, 4, '2026-03-27 09:03:09'),
(21, 'gfdsaa', 'sdsds', 3, 1, '2026-03-27 11:57:14'),
(22, 'gfds', 'wdqwdjwqdhi', 12, 4, '2026-03-27 11:58:50');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','developer') DEFAULT 'developer',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `created_at`) VALUES
(3, 'RootAdmin', 'admin@devgenius.com', '$2y$10$UnuwGzISXCac2pnWyA4DluKHgK.h8sEZHM5UM1zdChmySON/.V5Um', 'admin', '2026-03-24 15:34:01'),
(10, 'hassan', 'hassan@gmail.com', '$2y$10$PcDCDd0eA/9AEjnjZv7lbelbd/HWb4AwrAR9FNnKRg.LzJjBeC38W', 'developer', '2026-03-26 22:32:18'),
(11, 'abc', 'hassann@gmail.com', '$2y$10$eXu7D/aiE95zb.Ypw62Zvex2sla.A9XG4WoljXeRu1juMGgs4VeQy', 'developer', '2026-03-27 09:02:34'),
(12, 'hassan', 'hassan1@gmail.com', '$2y$10$0vbAgZXVzNVWRH89UhhU2ed4Iog5u7Fn6A7WuI7.QAvGnIA68clVC', 'developer', '2026-03-27 11:58:09');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Index pour la table `prompts`
--
ALTER TABLE `prompts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `prompts`
--
ALTER TABLE `prompts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `prompts`
--
ALTER TABLE `prompts`
  ADD CONSTRAINT `prompts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `prompts_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
