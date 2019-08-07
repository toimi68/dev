-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 28 mai 2019 à 17:01
-- Version du serveur :  10.1.31-MariaDB
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `vtc`
--

-- --------------------------------------------------------

--
-- Structure de la table `association_vehicule_conducteur`
--

CREATE TABLE `association_vehicule_conducteur` (
  `id_association` int(3) NOT NULL,
  `id_vehicule` int(3) NOT NULL,
  `id_conducteur` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `association_vehicule_conducteur`
--

INSERT INTO `association_vehicule_conducteur` (`id_association`, `id_vehicule`, `id_conducteur`) VALUES
(1, 501, 1),
(2, 502, 2),
(3, 503, 3),
(4, 504, 4),
(5, 501, 3);

-- --------------------------------------------------------

--
-- Structure de la table `conducteur`
--

CREATE TABLE `conducteur` (
  `id_conducteur` int(11) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `nom` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `conducteur`
--

INSERT INTO `conducteur` (`id_conducteur`, `prenom`, `nom`) VALUES
(1, 'Julien', 'Avigny'),
(2, 'Morgane', 'Alamia'),
(3, 'Philippe', 'Pandre'),
(4, 'Amelie', 'Blondelle'),
(5, 'Alex', 'Richy');

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

CREATE TABLE `vehicule` (
  `id_vehicule` int(3) NOT NULL,
  `marque` varchar(50) NOT NULL,
  `modele` varchar(50) NOT NULL,
  `couleur` varchar(50) NOT NULL,
  `immatriculation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vehicule`
--

INSERT INTO `vehicule` (`id_vehicule`, `marque`, `modele`, `couleur`, `immatriculation`) VALUES
(501, 'Peugeot', '807', 'noir', 'A8-355-CA'),
(502, 'Citroen', 'C8', 'bleu', 'CE-122-AE'),
(503, 'Mercedes', 'Cls', 'vert', 'FG-953-HI'),
(504, 'Volkswagen', 'Touran', 'noir', 'SO-322-NV'),
(505, 'Skoda', 'Octavia', 'gris', 'PB-631-TK'),
(506, 'Volkswagen', 'Passat', 'gris', 'XN-973-MM');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `association_vehicule_conducteur`
--
ALTER TABLE `association_vehicule_conducteur`
  ADD PRIMARY KEY (`id_association`),
  ADD KEY `id_vehicule` (`id_vehicule`),
  ADD KEY `id_conducteur` (`id_conducteur`);

--
-- Index pour la table `conducteur`
--
ALTER TABLE `conducteur`
  ADD PRIMARY KEY (`id_conducteur`);

--
-- Index pour la table `vehicule`
--
ALTER TABLE `vehicule`
  ADD PRIMARY KEY (`id_vehicule`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `association_vehicule_conducteur`
--
ALTER TABLE `association_vehicule_conducteur`
  MODIFY `id_association` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `conducteur`
--
ALTER TABLE `conducteur`
  MODIFY `id_conducteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT pour la table `vehicule`
--
ALTER TABLE `vehicule`
  MODIFY `id_vehicule` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=507;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `association_vehicule_conducteur`
--
ALTER TABLE `association_vehicule_conducteur`
  ADD CONSTRAINT `association_vehicule_conducteur` FOREIGN KEY (`id_conducteur`) REFERENCES `conducteur` (`id_conducteur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `association_vehicule_conducteur_ibfk_1` FOREIGN KEY (`id_vehicule`) REFERENCES `vehicule` (`id_vehicule`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
