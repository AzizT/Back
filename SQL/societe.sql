-- phpMyAdmin SQL Dump

-- version 4.8.5

-- https://www.phpmyadmin.net/

--

-- Hôte : 127.0.0.1

-- Généré le :  mar. 19 mars 2019 à 14:42

-- Version du serveur :  10.1.38-MariaDB

-- Version de PHP :  7.3.2



SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

SET AUTOCOMMIT = 0;

START TRANSACTION;

SET time_zone = "+00:00";





/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;

/*!40101 SET NAMES utf8mb4 */;



--

-- Base de données :  `societe`

--



-- --------------------------------------------------------



--

-- Structure de la table `employes`

--



CREATE TABLE `employes` (

  `id_employes` int(3) NOT NULL,

  `prenom` varchar(20) DEFAULT NULL,

  `nom` varchar(20) DEFAULT NULL,

  `sexe` enum('m','f') NOT NULL,

  `service` varchar(30) DEFAULT NULL,

  `date_embauche` date DEFAULT NULL,

  `salaire` float DEFAULT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--

-- Déchargement des données de la table `employes`

--



INSERT INTO `employes` (`id_employes`, `prenom`, `nom`, `sexe`, `service`, `date_embauche`, `salaire`) VALUES

(350, 'Jean-pierre', 'Laborde', 'm', 'direction', '1999-12-09', 5000),

(388, 'Clement', 'Gallet', 'm', 'commercial', '2000-01-15', 2300),

(415, 'Thomas', 'Winter', 'm', 'commercial', '2000-05-03', 3550),

(417, 'Chloe', 'Dubar', 'f', 'production', '2001-09-05', 1900),

(491, 'Elodie', 'Fellier', 'f', 'secretariat', '2002-02-22', 1600),

(509, 'Fabrice', 'Grand', 'm', 'comptabilite', '2003-02-20', 1900),

(547, 'Melanie', 'Collier', 'f', 'commercial', '2004-09-08', 3100),

(592, 'Laura', 'Blanchet', 'f', 'direction', '2005-06-09', 4500),

(627, 'Guillaume', 'Miller', 'm', 'commercial', '2006-07-02', 1900),

(655, 'Celine', 'Perrin', 'f', 'commercial', '2006-09-10', 2700),

(699, 'Julien', 'Cottet', 'm', 'secretariat', '2007-01-18', 1390),

(701, 'Mathieu', 'Vignal', 'm', 'informatique', '2008-12-03', 2000),

(739, 'Thierry', 'Desprez', 'm', 'secretariat', '2009-11-17', 1500),

(780, 'Amandine', 'Thoyer', 'f', 'communication', '2010-01-23', 1500),

(802, 'Damien', 'Durand', 'm', 'informatique', '2010-07-05', 2250),

(854, 'Daniel', 'Chevel', 'm', 'informatique', '2011-09-28', 1700),

(876, 'Nathalie', 'Martin', 'f', 'juridique', '2012-01-12', 3200),

(900, 'Benoit', 'Lagarde', 'm', 'production', '2013-01-03', 2550),

(933, 'Emilie', 'Sennard', 'f', 'commercial', '2014-09-11', 1800),

(990, 'Stephanie', 'Lafaye', 'f', 'assistant', '2015-06-02', 1775),

(991, 'Mila', 'Gauriau', 'f', 'formation', '2017-01-19', 999);



--

-- Index pour les tables déchargées

--



--

-- Index pour la table `employes`

--

ALTER TABLE `employes`

  ADD PRIMARY KEY (`id_employes`);



--

-- AUTO_INCREMENT pour les tables déchargées

--



--

-- AUTO_INCREMENT pour la table `employes`

--

ALTER TABLE `employes`

  MODIFY `id_employes` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=992;

COMMIT;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- Lister tous les departements :
SELECT service FROM employes;

-- Lister tous les salariés avec un salaire entre 40000-55000 :
SELECT nom FROM employes WHERE salaire BETWEEN 4000 AND 5500;

-- Lister tous les salariée  avec un prenom commençanty par la lettre "a" :
SELECT prenom FROM employes WHERE prenom LIKE 'a%';

-- lister toutes les salariées :
SELECT nom, prenom FROM employes WHERE sexe ='f';

-- Lister tous les salariés entrer dans l'entreprise avant le 01 janvier 2003 :
SELECT nom, prenom, date_embauche FROM employes WHERE date_embauche <= '2003-01-01';

 -- AFFIcher toutes les salariées embauchées avant 2004-01-01 :
 SELECT nom, prenom, date_embauche FROM employes WHERE sexe ='f' AND date_embauche <= '2004-01-01';

-- Afficher salariés pour chaque département(pas de doublon):
SELECT DISTINCT nom, prenom, service FROM employes;
SELECT nom, prenom, service FROM employes ORDER BY service;

SELECT COUNT(nom) AS nombre, service FROM employes GROUP BY service;
+--------+---------------+
| nombre | service       |
+--------+---------------+
|      1 | assistant     |
|      6 | commercial    |
|      1 | communication |
|      1 | comptabilite  |
|      2 | direction     |
|      1 | formation     |
|      3 | informatique  |
|      1 | juridique     |
|      2 | production    |
|      3 | secretariat   |
+--------+---------------+