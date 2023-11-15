-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 15 nov. 2023 à 09:11
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `g-prod`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nom_cat` varchar(50) NOT NULL,
  `description_cat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom_cat`, `description_cat`) VALUES
(1, 'categories', 'description');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` int(11) NOT NULL,
  `id_categories` int(11) NOT NULL,
  `id_utilisateurs` int(11) NOT NULL,
  `nom_prod` varchar(50) NOT NULL,
  `quantite_prod` int(11) NOT NULL,
  `prix_prod` decimal(10,0) NOT NULL,
  `description_prod` text NOT NULL,
  `image_prod` text NOT NULL,
  `statut_prod` text NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `id_categories`, `id_utilisateurs`, `nom_prod`, `quantite_prod`, `prix_prod`, `description_prod`, `image_prod`, `statut_prod`, `created_at`, `updated_at`) VALUES
(4, 1, 1, 'produit', 33, 2000, 'azerthyligyuktyjrthergefgrhtjy', 'asset/image/fighter-pilot-fighter-jet-kamikaze-aviator-4600x2160-4767.jpg', 'vendu', '0000-00-00', '0000-00-00'),
(5, 1, 1, 'produit&', 23, 2000212, 'bcjknvbzebjhez jez cjhbdsuisdhezfgzeyezgreezg', 'asset/image/fairy-house-bokeh-3840x2160-9641.jpg', 'vendue', '2023-11-15', '0000-00-00'),
(6, 1, 2, 'produit23', 10, 10000, 'qzuilrbuilzfebuizefvlzuiqefilzuqf', 'asset/image/cyberpunk-yellow-background-cyberpunk-girl-futuristic-5k-5120x2880-7668.jpg', 'vendue', '2023-11-15', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `userpass` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `username`, `userpass`) VALUES
(1, 'user', 'pass'),
(2, 'test', '$2y$10$rK.3eE5.z0wpwWbw4P3t/u/1TDSRwFOf15Z.0mO271JSmv/gVtDxm');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contraite` (`id_categories`),
  ADD KEY `contraite1` (`id_utilisateurs`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `contraite1` FOREIGN KEY (`id_utilisateurs`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
