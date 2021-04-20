-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 20 Avril 2021 à 10:37
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `codefig`
--

-- --------------------------------------------------------

--
-- Structure de la table `programme`
--

CREATE TABLE `programme` (
  `IdProg` int(11) NOT NULL,
  `NomProg` varchar(16) NOT NULL,
  `PrixProg` int(4) NOT NULL,
  `DescProg` varchar(256) NOT NULL,
  `ImgProg` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `programme`
--

INSERT INTO `programme` (`IdProg`, `NomProg`, `PrixProg`, `DescProg`, `ImgProg`) VALUES
(1, 'Grapes', 28, '', 'Grapes.svg'),
(2, 'Berry', 48, '', 'Berry.svg'),
(3, 'Pine Cone', 42, '', 'PineCone.svg');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `IdRole` int(11) NOT NULL,
  `NomRole` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `role`
--

INSERT INTO `role` (`IdRole`, `NomRole`) VALUES
(1, 'Administrateur'),
(2, 'Modérateur'),
(3, 'Développeur '),
(4, 'Apprenti');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `IdUtil` int(11) NOT NULL,
  `PseudoUtil` varchar(16) NOT NULL,
  `MailUtil` varchar(32) NOT NULL,
  `PasswordUtil` varchar(100) NOT NULL,
  `IdRole` int(2) DEFAULT '4'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`IdUtil`, `PseudoUtil`, `MailUtil`, `PasswordUtil`, `IdRole`) VALUES
(1, 'Itoshuga', 'michon.lucas01@gmail.com', '$2y$12$J.eu7CAhoouvlGjfcJZr.uKhIQC7rctgSVXeEAD0R6AsQn2hFn7jO', 4),
(2, 'Wanheda', 'leo.remars@gmail.com', '$2y$12$yqE/5JUaq9BUzywBAk1nx.I7Y9xgPQAPhzZWDUvKmL7xsCiPAIEka', 4),
(3, 'Karna', 'morandjeremy.pro@gmail.com', '$2y$12$vDUTYZOxv1z0yH6UDe6Cau..3YPD1PT4P7NPOQhd.I2LIeCLCL/0u', 4),
(5, 'PiKkmoune71', 'antoinepicard385@gmail.com', '$2y$12$wo/ATzxR5DMuotDswedJi.vsoQsoMhByiNdUMn398eT9T1SVOPfAq', 4),
(6, 'NecwoZ', 'valentin.cloix@gmail.com', '$2y$12$N4QrpSKv9g.hsarYeO2q6ejHLLNgbYlbPqNUdWmHypAZRDECKIZDa', 4);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `programme`
--
ALTER TABLE `programme`
  ADD PRIMARY KEY (`IdProg`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`IdRole`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`IdUtil`),
  ADD KEY `IdRole` (`IdRole`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `programme`
--
ALTER TABLE `programme`
  MODIFY `IdProg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `IdRole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `IdUtil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`IdRole`) REFERENCES `role` (`IdRole`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
