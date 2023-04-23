-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 12 nov. 2021 à 13:17
-- Version du serveur :  10.1.33-MariaDB
-- Version de PHP :  7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `logpnc`
--

-- --------------------------------------------------------

--
-- Structure de la table `tagent`
--

CREATE TABLE `tagent` (
  `Matricul_Agent` int(12) NOT NULL,
  `Nom_Agent` char(12) DEFAULT NULL,
  `Postnom_Agent` char(12) DEFAULT NULL,
  `Email_Agent` char(35) DEFAULT NULL,
  `Grade_Agent` char(12) DEFAULT NULL,
  `Photo_Agent` char(12) DEFAULT NULL,
  `Fonct_Agent` char(12) DEFAULT NULL,
  `Genre_Agent` char(12) DEFAULT NULL,
  `Cle_Agent` char(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tagent`
--

INSERT INTO `tagent` (`Matricul_Agent`, `Nom_Agent`, `Postnom_Agent`, `Email_Agent`, `Grade_Agent`, `Photo_Agent`, `Fonct_Agent`, `Genre_Agent`, `Cle_Agent`) VALUES
(1, 'NZANZU', 'ASINGYA', 'nzanzu@gmail.com', 'General', 'URLModif', 'Com_Prov', 'Masculin', '1234'),
(3, 'NANGA', 'DIEUDONNEE', 'ngona@gmail.com', 'Aucun', 'URLModif', 'Porteur', 'Masculin', '1234'),
(5, 'KAMBALE', 'CHARMENT', 'kambale@gmail.com', 'Lietenant', 'URLModif', 'Porteur', 'Masculin', '1234'),
(6, 'KASOKI', 'KAMALIRO', 'kasoki@gmail.com', 'Capitain', 'URLModif', 'Logisticier', 'Masculin', '1234'),
(7, 'TABWE', 'BIDUAYA', 'tabwe@gmail.com', 'Lietenant', 'URLModif', 'Sous_Com', 'Feminin', '1234'),
(8, 'MAKI', 'SALOME', 'maki@gmail.com', 'Major', 'URLModif', 'Com_Urbain', 'Masculin', '1234'),
(9, 'KAHINDO', 'TSHONGO', 'kahindo@gmail.com', 'Aucun', 'URLModif', 'Porteur', 'Feminin', '1234'),
(17, 'NGONA1', 'KATCHEL1', 'ngona@gmail.com1', 'General', 'URLModif', 'Com_Prov', 'Feminin', '1234');

-- --------------------------------------------------------

--
-- Structure de la table `tarme`
--

CREATE TABLE `tarme` (
  `Id_Arme` int(4) NOT NULL,
  `Nom_Arme` char(25) DEFAULT NULL,
  `Model_arme` char(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tarme`
--

INSERT INTO `tarme` (`Id_Arme`, `Nom_Arme`, `Model_arme`) VALUES
(1, 'M16', 'Fusil-mitrailleur'),
(2, 'AK47', 'Modele x'),
(3, 'Mortier', 'Modele Y'),
(4, 'Kalachinicove', 'Modele Z'),
(5, 'Arm_A', 'Modele A');

-- --------------------------------------------------------

--
-- Structure de la table `tautoport`
--

CREATE TABLE `tautoport` (
  `Id_PortA` int(12) NOT NULL,
  `Date_PortA` datetime DEFAULT NULL,
  `Unite_PortA` char(12) DEFAULT NULL,
  `Num_Arme_PortA` char(12) DEFAULT NULL,
  `Matricul_Agent` int(12) DEFAULT NULL,
  `Id_Usage` int(4) DEFAULT NULL,
  `Id_Arme` int(4) DEFAULT NULL,
  `Duree_PortA` date DEFAULT NULL,
  `NbrMin_PortA` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tautoport`
--

INSERT INTO `tautoport` (`Id_PortA`, `Date_PortA`, `Unite_PortA`, `Num_Arme_PortA`, `Matricul_Agent`, `Id_Usage`, `Id_Arme`, `Duree_PortA`, `NbrMin_PortA`) VALUES
(2, '2021-11-08 10:37:25', 'Unite 1', 'N:875678', 1, 1, 2, NULL, NULL),
(5, '2021-11-08 10:53:46', 'UNITE 8', '6787', 3, 1, 2, '2021-11-27', 20),
(6, '2021-11-09 07:50:54', 'Unite 1', 'N:544747754', 1, 1, 2, '2021-12-12', 0),
(7, '2021-11-11 15:10:38', 'Unite 1', 'N:544747754', 1, 1, 2, '2021-12-12', 0),
(8, '2021-11-11 15:10:40', 'Unite 1', 'N:544747754', 1, 1, 2, '2021-12-12', 0),
(9, '2021-11-11 15:11:54', 'UNITE 8', '6787', 3, 1, 2, '2021-11-27', 20),
(10, '2021-11-11 15:13:03', 'Unite 1', 'N:544747754', 1, 1, 2, '2021-12-12', 0),
(11, '2021-11-11 15:13:16', 'Unite 1', 'N:544747754', 1, 1, 2, '2021-12-12', 0),
(12, '2021-11-11 15:14:54', 'Unite 1', 'N:544747754', 1, 1, 2, '2021-12-12', 0),
(13, '2021-11-11 15:17:52', 'Unite 1', 'N:544747754', 1, 1, 2, '2021-12-12', 0),
(14, '2021-11-11 15:20:15', 'Unite 1', 'N:875678', 1, 1, 2, '0000-00-00', 0),
(15, '2021-11-11 15:20:20', 'Unite 1', 'N:875678', 5, 1, 2, '2021-12-01', 0),
(16, '2021-11-11 15:20:33', 'oooooooooooo', '0000', 1, 2, 1, '2021-11-01', 11111),
(17, '2021-11-12 08:34:16', 'UNITE URBAIN', 'N:8765678987', 17, 1, 2, '2021-11-30', 100),
(18, '2021-11-12 12:46:13', 'Unite BBBB', 'N:134353767', 5, 1, 5, '2021-11-25', 79);

-- --------------------------------------------------------

--
-- Structure de la table `tcommande`
--

CREATE TABLE `tcommande` (
  `Id_Com` int(12) NOT NULL,
  `Date_Com` datetime NOT NULL,
  `Qt_Com` int(12) DEFAULT NULL,
  `Matricul_Agent` int(12) DEFAULT NULL,
  `Id_Arme` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tcommande`
--

INSERT INTO `tcommande` (`Id_Com`, `Date_Com`, `Qt_Com`, `Matricul_Agent`, `Id_Arme`) VALUES
(1, '0000-00-00 00:00:00', 50, 1, 1),
(2, '0000-00-00 00:00:00', 50, 1, 2),
(3, '0000-00-00 00:00:00', 50, 1, 1),
(4, '0000-00-00 00:00:00', 500, 1, 3),
(7, '2021-11-10 18:13:49', 10, 1, 2),
(8, '2021-11-10 18:14:49', 2000, 8, 5),
(30, '2021-11-12 13:11:30', 210, 8, 5);

-- --------------------------------------------------------

--
-- Structure de la table `tentree_st`
--

CREATE TABLE `tentree_st` (
  `Id_Entree` int(12) NOT NULL,
  `Date_Entree` datetime DEFAULT NULL,
  `Qt_Entree` float DEFAULT NULL,
  `Matricul_Agent` int(12) DEFAULT NULL,
  `Id_Com` int(12) DEFAULT NULL,
  `Paraph` int(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tentree_st`
--

INSERT INTO `tentree_st` (`Id_Entree`, `Date_Entree`, `Qt_Entree`, `Matricul_Agent`, `Id_Com`, `Paraph`) VALUES
(84, '2021-11-08 13:20:00', 200, 6, 30, 0),
(85, '2021-11-08 13:20:57', 10, 6, 2, 0),
(87, '2021-11-08 13:52:56', 2, 6, 1, 0),
(90, '2021-11-08 14:08:15', 44, 6, 3, 0),
(99, '2021-11-08 16:48:58', 50, 6, 4, 0),
(102, '2021-11-09 07:35:48', 10, 6, 1, 0),
(103, '2021-11-09 07:36:08', 16, 6, 1, 0),
(104, '2021-11-10 18:29:15', 20, 6, 8, 0),
(105, '2021-11-10 18:29:40', 10, 6, 7, 0),
(106, '2021-11-12 08:21:50', 41, 6, 2, 0);

-- --------------------------------------------------------

--
-- Structure de la table `tsortie_st`
--

CREATE TABLE `tsortie_st` (
  `Id_Sortie` int(12) NOT NULL,
  `Date_sortie` datetime DEFAULT NULL,
  `Qt_Sortie` float DEFAULT NULL,
  `Matricul_Agent` int(12) DEFAULT NULL,
  `Id_Arme` int(4) DEFAULT NULL,
  `Paraph` int(1) DEFAULT '0',
  `Benef` char(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tsortie_st`
--

INSERT INTO `tsortie_st` (`Id_Sortie`, `Date_sortie`, `Qt_Sortie`, `Matricul_Agent`, `Id_Arme`, `Paraph`, `Benef`) VALUES
(27, '2021-11-09 18:56:57', 5, 6, 2, 0, 'MAKI HAPPY'),
(28, '2021-11-09 18:57:15', 20, 6, 3, 0, 'MAKI HAPPY'),
(30, '2021-11-09 18:57:31', 10, 6, 3, 0, 'MAKI HAPPY'),
(31, '2021-11-09 18:57:44', 1, 6, 2, 0, 'MAKI HAPPY'),
(32, '2021-11-09 18:57:58', 10, 6, 1, 0, 'MAKI HAPPY'),
(33, '2021-11-09 18:58:11', 4, 6, 1, 0, 'MAKI HAPPY'),
(34, '2021-11-09 18:58:25', 3, 6, 2, 0, 'MAKI HAPPY'),
(35, '2021-11-11 20:26:02', 2, 6, 5, 0, 'MAGADISSI PAULIN'),
(36, '2021-11-11 20:26:13', 4, 6, 5, 0, 'MAGADISSI PAULIN'),
(37, '2021-11-11 20:26:13', 9, 6, 5, 0, 'MAGADISSI PAULIN'),
(45, '2021-11-12 13:15:43', 4, 6, 5, 0, 'JUSTINNE KASEMIRE');

-- --------------------------------------------------------

--
-- Structure de la table `tusage`
--

CREATE TABLE `tusage` (
  `Id_Usage` int(4) NOT NULL,
  `Usage` char(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tusage`
--

INSERT INTO `tusage` (`Id_Usage`, `Usage`) VALUES
(1, 'Militaire'),
(2, 'Protection_Civil');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tagent`
--
ALTER TABLE `tagent`
  ADD PRIMARY KEY (`Matricul_Agent`);

--
-- Index pour la table `tarme`
--
ALTER TABLE `tarme`
  ADD PRIMARY KEY (`Id_Arme`);

--
-- Index pour la table `tautoport`
--
ALTER TABLE `tautoport`
  ADD PRIMARY KEY (`Id_PortA`),
  ADD KEY `Matricul_Agent` (`Matricul_Agent`),
  ADD KEY `Id_Usage` (`Id_Usage`),
  ADD KEY `Id_Arme` (`Id_Arme`);

--
-- Index pour la table `tcommande`
--
ALTER TABLE `tcommande`
  ADD PRIMARY KEY (`Id_Com`),
  ADD KEY `Matricul_Agent` (`Matricul_Agent`),
  ADD KEY `Id_Arme` (`Id_Arme`);

--
-- Index pour la table `tentree_st`
--
ALTER TABLE `tentree_st`
  ADD PRIMARY KEY (`Id_Entree`),
  ADD KEY `Id_Com` (`Id_Com`);

--
-- Index pour la table `tsortie_st`
--
ALTER TABLE `tsortie_st`
  ADD PRIMARY KEY (`Id_Sortie`),
  ADD KEY `Id_Arme` (`Id_Arme`),
  ADD KEY `Matricul_Agent` (`Matricul_Agent`);

--
-- Index pour la table `tusage`
--
ALTER TABLE `tusage`
  ADD PRIMARY KEY (`Id_Usage`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tagent`
--
ALTER TABLE `tagent`
  MODIFY `Matricul_Agent` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `tarme`
--
ALTER TABLE `tarme`
  MODIFY `Id_Arme` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `tautoport`
--
ALTER TABLE `tautoport`
  MODIFY `Id_PortA` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `tcommande`
--
ALTER TABLE `tcommande`
  MODIFY `Id_Com` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `tentree_st`
--
ALTER TABLE `tentree_st`
  MODIFY `Id_Entree` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT pour la table `tsortie_st`
--
ALTER TABLE `tsortie_st`
  MODIFY `Id_Sortie` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT pour la table `tusage`
--
ALTER TABLE `tusage`
  MODIFY `Id_Usage` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `tautoport`
--
ALTER TABLE `tautoport`
  ADD CONSTRAINT `tautoport_ibfk_1` FOREIGN KEY (`Matricul_Agent`) REFERENCES `tagent` (`Matricul_Agent`),
  ADD CONSTRAINT `tautoport_ibfk_2` FOREIGN KEY (`Id_Usage`) REFERENCES `tusage` (`Id_Usage`),
  ADD CONSTRAINT `tautoport_ibfk_3` FOREIGN KEY (`Id_Arme`) REFERENCES `tarme` (`Id_Arme`);

--
-- Contraintes pour la table `tcommande`
--
ALTER TABLE `tcommande`
  ADD CONSTRAINT `tcommande_ibfk_1` FOREIGN KEY (`Matricul_Agent`) REFERENCES `tagent` (`Matricul_Agent`),
  ADD CONSTRAINT `tcommande_ibfk_2` FOREIGN KEY (`Id_Arme`) REFERENCES `tarme` (`Id_Arme`);

--
-- Contraintes pour la table `tentree_st`
--
ALTER TABLE `tentree_st`
  ADD CONSTRAINT `tentree_st_ibfk_1` FOREIGN KEY (`Id_Com`) REFERENCES `tcommande` (`Id_Com`);

--
-- Contraintes pour la table `tsortie_st`
--
ALTER TABLE `tsortie_st`
  ADD CONSTRAINT `tsortie_st_ibfk_1` FOREIGN KEY (`Id_Arme`) REFERENCES `tarme` (`Id_Arme`),
  ADD CONSTRAINT `tsortie_st_ibfk_2` FOREIGN KEY (`Matricul_Agent`) REFERENCES `tagent` (`Matricul_Agent`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
