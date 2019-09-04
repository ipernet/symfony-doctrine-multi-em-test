-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le :  mer. 04 sep. 2019 à 16:56
-- Version du serveur :  5.7.25
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de données :  `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `Cat`
--

CREATE TABLE `Cat` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `Cat`
--

INSERT INTO `Cat` (`id`, `name`) VALUES
(1, 'A'),
(2, 'B');

-- --------------------------------------------------------

--
-- Structure de la table `Dog`
--

CREATE TABLE `Dog` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `Dog`
--

INSERT INTO `Dog` (`id`, `name`) VALUES
(1, 'AA'),
(2, 'AA');

-- --------------------------------------------------------

--
-- Structure de la table `Duck`
--

CREATE TABLE `Duck` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `Duck`
--

INSERT INTO `Duck` (`id`, `name`) VALUES
(1, 'AAA');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Cat`
--
ALTER TABLE `Cat`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Dog`
--
ALTER TABLE `Dog`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Duck`
--
ALTER TABLE `Duck`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Cat`
--
ALTER TABLE `Cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `Dog`
--
ALTER TABLE `Dog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `Duck`
--
ALTER TABLE `Duck`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;
