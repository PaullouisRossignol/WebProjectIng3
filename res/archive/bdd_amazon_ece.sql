-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 30 avr. 2019 à 21:20
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bdd_amazon_ece`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `Email` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Surname` varchar(255) NOT NULL,
  `Pic_loc` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`Email`, `Name`, `Surname`, `Pic_loc`) VALUES
('picolo.pico@edu.fr', 'pico', 'picolo', 'pico.PNG');

-- --------------------------------------------------------

--
-- Structure de la table `bank_info`
--

CREATE TABLE `bank_info` (
  `Card_num` varchar(255) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `Name_card` varchar(255) NOT NULL,
  `Exp_date` date NOT NULL,
  `PostCode` varchar(255) NOT NULL,
  `Adr_1` varchar(255) NOT NULL,
  `Adr_2` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `Sec_code` varchar(255) NOT NULL,
  `Country` varchar(255) NOT NULL,
  `Phone_number` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `bank_info`
--

INSERT INTO `bank_info` (`Card_num`, `Type`, `Name_card`, `Exp_date`, `PostCode`, `Adr_1`, `Adr_2`, `City`, `Sec_code`, `Country`, `Phone_number`) VALUES
('123456789', 'Visa', 'MR PIERRE CAMUGLI', '2019-04-17', '92150', '33 rue du docteur magnan', '...', 'Suresnes', '123', 'France', '0650367245');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `Email` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Surname` varchar(255) NOT NULL,
  `Card_num` varchar(255) NOT NULL,
  `Pic_loc` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`Email`, `Name`, `Surname`, `Card_num`, `Pic_loc`) VALUES
('pierre.camugli@hotmail.fr', 'camugli', 'pierre', '123456789', 'Capture.PNG');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `Name` varchar(255) NOT NULL,
  `ID` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  `Descr` varchar(255) NOT NULL,
  `Cat` int(11) NOT NULL,
  `Qty` int(11) NOT NULL,
  `TauxPromo` varchar(255) NOT NULL DEFAULT '0',
  `Size` int(11) NOT NULL,
  `Color` int(11) NOT NULL,
  `Sex` int(11) NOT NULL,
  `Seller` varchar(255) NOT NULL,
  `Pic_loc` varchar(255) NOT NULL,
  `Vid_link` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`Name`, `ID`, `Price`, `Descr`, `Cat`, `Qty`, `TauxPromo`, `Size`, `Color`, `Sex`, `Seller`, `Pic_loc`, `Vid_link`) VALUES
('Camionosor', 252525, 12000, 'Super camion qui tue', 1, 1, '0', 0, 0, 0, 'vendeur@vendeur.com', 'Camion.PNG', 'Vendeur.PNG');

-- --------------------------------------------------------

--
-- Structure de la table `seller`
--

CREATE TABLE `seller` (
  `Email` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Surname` varchar(255) NOT NULL,
  `Pic_loc` varchar(255) NOT NULL,
  `Back_pic_loc` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `seller`
--

INSERT INTO `seller` (`Email`, `Name`, `Surname`, `Pic_loc`, `Back_pic_loc`) VALUES
('vendeur@vendeur.com', 'Vendeur', 'mop', 'Vendeur.PNG', 'Back.PNG');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Type` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`Email`, `Password`, `Type`) VALUES
('pierre.camugli@hotmail.fr', 'je sais plus', 0),
('vendeur@vendeur.com', '123', 1),
('picolo.pico@edu.fr', 'azerty', 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Email`);

--
-- Index pour la table `bank_info`
--
ALTER TABLE `bank_info`
  ADD PRIMARY KEY (`Card_num`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`Email`);

--
-- Index pour la table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`Email`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
