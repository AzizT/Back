-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 23 avr. 2019 à 15:02
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
-- Base de données :  `immobilier`
--

-- --------------------------------------------------------

--
-- Structure de la table `logement`
--

CREATE TABLE `logement` (
  `id_logement` int(3) NOT NULL,
  `titre` varchar(30) NOT NULL,
  `adresse` varchar(30) NOT NULL,
  `ville` varchar(30) NOT NULL,
  `cp` int(5) NOT NULL,
  `surface` int(5) NOT NULL,
  `prix` int(9) NOT NULL,
  `photo` varchar(250) NOT NULL,
  `type` enum('location','vente','','') NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `logement`
--

INSERT INTO `logement` (`id_logement`, `titre`, `adresse`, `ville`, `cp`, `surface`, `prix`, `photo`, `type`, `description`) VALUES
(1, 'Joli studio', '2 passage des argonautes', 'Créteil', 94000, 15, 357, 'studio.jpg', 'location', 'Joli studio\r\nkitchenette - Sd\'E WC\r\nFace au Lac\r\nToutes commodités'),
(2, 'Grand 2 pièces', '9 quai Jacques Offenbach', 'Créteil', 94000, 53, 156000, 'f_2.jpg', 'vente', '1 chambre + grand séjour\r\ncuisine séparée\r\nSdB\r\nQuartier de la mairie, piéton'),
(3, 'Lumineux 3 pièces', '6 place Salvador Allende', 'Créteil', 94000, 57, 756, 'f_3.jpg', 'location', 'Quartier de la mairie\r\nAppartement très lumineux\r\nprévoir quelques travaux'),
(4, '4 pieces atypique', '26 quai Jacques Offenbach', 'Créteil', 94000, 62, 198000, 'f_4.jpg', 'vente', 'Proche Préfecture\r\nAppartement au RdC\r\nJardin 35m2\r\nChambres au S/sol'),
(5, 'Maison Quartier de l\' Eglise', '9 Rue du Docteur Pichon', 'Créteil', 94000, 92, 310000, 'maison.jpg', 'vente', 'Maison 3 chambres + séjour\r\nQuartier de l\' Eglise, très demandé\r\nGarage\r\nPrévoir de gros travaux');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `logement`
--
ALTER TABLE `logement`
  ADD PRIMARY KEY (`id_logement`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `logement`
--
ALTER TABLE `logement`
  MODIFY `id_logement` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
