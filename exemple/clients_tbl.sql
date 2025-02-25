-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mvctest`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients_tbl`
--

CREATE TABLE `clients_tbl` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `email` varchar(70) NOT NULL,
  `ne_le` varchar(30) NOT NULL,
  `ville` varchar(30) NOT NULL,
  `enfants` varchar(30) NOT NULL,
  `tel` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `clients_tbl`
--

INSERT INTO `clients_tbl` (`id`, `nom`, `prenom`, `email`, `ne_le`, `ville`, `enfants`, `tel`) VALUES
(1, 'Léponge', 'Bob', 'robert@sponge.fr', '04/10/1999', 'Los Angeles', '0', '0607080910'),
(2, 'Curry', 'Marie', 'marie@spice.fr', '15/12/1978', 'Calcutta', '1', '0203040506'),
(3, 'Marco', 'Polo', 'paulo@discover.it', '25/03/1986', 'Palerme', '3', '0708091011');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `clients_tbl`
--
ALTER TABLE `clients_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `clients_tbl`
--
ALTER TABLE `clients_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
