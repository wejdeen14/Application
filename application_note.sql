-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 23 mai 2023 à 10:14
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `application_note`
--

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
  `id_cours` int(20) NOT NULL,
  `nom_cours` text NOT NULL,
  `id_enseignants` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`id_cours`, `nom_cours`, `id_enseignants`) VALUES
(87, '3D', 19),
(132, 'angular', 18),
(133, 'math', 18),
(136, '3D', 18),
(138, 'python', 18),
(145, 'java', 18),
(147, 'php', 18),
(148, 'php', 22),
(149, '3D', 22);

-- --------------------------------------------------------

--
-- Structure de la table `enseignants`
--

CREATE TABLE `enseignants` (
  `id_enseignants` int(11) NOT NULL,
  `nom_enseignants` varchar(40) NOT NULL,
  `mdp_enseignants` varchar(50) NOT NULL,
  `email_enseignants` varchar(50) NOT NULL,
  `tel_enseignants` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `enseignants`
--

INSERT INTO `enseignants` (`id_enseignants`, `nom_enseignants`, `mdp_enseignants`, `email_enseignants`, `tel_enseignants`) VALUES
(13, 'Nabila Thabti', '55555555', 'nebylthabti@gmail.com', 2147483647),
(14, 'Nabila Thabti', 'ssss', 'nebylthabti@gmail.com', 2147483647),
(15, 'wejden', 'wejwej', 'wej2002wej@gmail.com', 1001000),
(16, 'Nabila Thabti', 'wejwej', 'nebylthabti@gmail.com', 455555),
(17, 'samia', '1234', 'ssssaam', 2147483647),
(18, 'lolo', '1234', 'nebylthabti@gmail.com', 2147483647),
(19, 'basma', 'basma', 'basss', 2147483647),
(20, 'wejden ben yaagoub', '4444', 'kkkkkkkkkkk', 2147483647),
(21, 'ggg', '123', 'gggggggg', 2147483647),
(22, 'test1', '123', 'test31@gmail.com', 5555111);

-- --------------------------------------------------------

--
-- Structure de la table `etudient`
--

CREATE TABLE `etudient` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `nom_cours` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `etudient`
--

INSERT INTO `etudient` (`id`, `nom`, `email`, `password`, `age`, `nom_cours`) VALUES
(22, 'nabil', 'nebylthabti@gmail.com', 'wejwej', 25, 'php'),
(23, 'wej', 'ffffff', 'zzzzzzz', 20, 'angular'),
(24, 'chayma', 'chayma@gmail.com', 'chayma', 20, 'angular'),
(25, 'test3', 'testmm@gmail.com', '1234', 20, 'java');

-- --------------------------------------------------------

--
-- Structure de la table `examen`
--

CREATE TABLE `examen` (
  `id_examen` int(10) NOT NULL,
  `nom_examen` varchar(50) NOT NULL,
  `id_cours` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `examen`
--

INSERT INTO `examen` (`id_examen`, `nom_examen`, `id_cours`) VALUES
(173, 'angular', 132),
(174, 'php', 147),
(175, 'php', 148),
(176, '3D', 149);

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE `note` (
  `id_note` int(10) NOT NULL,
  `id_examen` int(10) NOT NULL,
  `note` int(2) NOT NULL,
  `id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `note`
--

INSERT INTO `note` (`id_note`, `id_examen`, `note`, `id`) VALUES
(15, 173, 20, 23),
(17, 174, 0, 22),
(19, 174, 0, 22),
(21, 174, 0, 22),
(22, 173, 20, 23),
(24, 174, 0, 22),
(25, 173, 20, 23),
(26, 173, 20, 23),
(27, 173, 20, 23),
(28, 173, 0, 23),
(32, 174, 0, 22),
(33, 175, 0, 22);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`id_cours`),
  ADD KEY `cours_ibfk_1` (`id_enseignants`);

--
-- Index pour la table `enseignants`
--
ALTER TABLE `enseignants`
  ADD PRIMARY KEY (`id_enseignants`);

--
-- Index pour la table `etudient`
--
ALTER TABLE `etudient`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `examen`
--
ALTER TABLE `examen`
  ADD PRIMARY KEY (`id_examen`),
  ADD KEY `examen_ibfk_1` (`id_cours`);

--
-- Index pour la table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id_note`),
  ADD KEY `note_ibfk_1` (`id_examen`),
  ADD KEY `note_ibfk_2` (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cours`
--
ALTER TABLE `cours`
  MODIFY `id_cours` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT pour la table `enseignants`
--
ALTER TABLE `enseignants`
  MODIFY `id_enseignants` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `etudient`
--
ALTER TABLE `etudient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `examen`
--
ALTER TABLE `examen`
  MODIFY `id_examen` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT pour la table `note`
--
ALTER TABLE `note`
  MODIFY `id_note` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `cours_ibfk_1` FOREIGN KEY (`id_enseignants`) REFERENCES `enseignants` (`id_enseignants`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `examen`
--
ALTER TABLE `examen`
  ADD CONSTRAINT `examen_ibfk_1` FOREIGN KEY (`id_cours`) REFERENCES `cours` (`id_cours`) ON DELETE CASCADE;

--
-- Contraintes pour la table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `note_ibfk_1` FOREIGN KEY (`id_examen`) REFERENCES `examen` (`id_examen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `note_ibfk_2` FOREIGN KEY (`id`) REFERENCES `etudient` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
