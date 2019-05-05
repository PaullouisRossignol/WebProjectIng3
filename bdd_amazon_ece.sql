-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 05 mai 2019 à 17:50
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

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

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `Email` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Surname` varchar(255) NOT NULL,
  `Pic_loc` varchar(255) NOT NULL,
  PRIMARY KEY (`Email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`Email`, `Name`, `Surname`, `Pic_loc`) VALUES
('picolo.pico@edu.fr', 'pico', 'picolo', 'res/téléchargement.png');

-- --------------------------------------------------------

--
-- Structure de la table `bank_info`
--

DROP TABLE IF EXISTS `bank_info`;
CREATE TABLE IF NOT EXISTS `bank_info` (
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
  `Phone_number` varchar(255) NOT NULL,
  PRIMARY KEY (`Card_num`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `bank_info`
--

INSERT INTO `bank_info` (`Card_num`, `Type`, `Name_card`, `Exp_date`, `PostCode`, `Adr_1`, `Adr_2`, `City`, `Sec_code`, `Country`, `Phone_number`) VALUES
('123456789', 'Visa', 'MR PIERRE CAMUGLI', '2019-04-17', '92150', '33 rue du docteur magnan', '...', 'Suresnes', '123', 'France', '0650367245'),
('38726101996', 'Visa', 'Pere Noel', '1996-12-22', '75015', 'Pôle nord', ' ', 'Y en a pas', '000', 'Le pays des jouets', '36303603630'),
('5828265967973759', 'Visa', 'MR JEROME FERRATON', '1998-05-04', '75015', '75 rue du temple ', ' ', 'Paris', '753', 'France', '0125468725'),
('123', 'Visa', 'mmduran', '2020-04-04', '123', '21', ' ', 'fr', '123', 'fr', '06');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `Email` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Surname` varchar(255) NOT NULL,
  `Card_num` varchar(255) NOT NULL,
  `Pic_loc` varchar(255) NOT NULL,
  PRIMARY KEY (`Email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`Email`, `Name`, `Surname`, `Card_num`, `Pic_loc`) VALUES
('pierre.camugli@hotmail.fr', 'camugli', 'pierre', '123456789', 'res/w.jpg'),
('jerome.ferraton@gmail.com', 'Ferrraton', 'Jérôme', '5828265967973759', 'res/238.jpg'),
('amf.gervais@gmail.com', 'Sebastien', 'Patrick', '38726101996', 'res/3.jpg'),
('manon.duran92@gmail.com', 'duran', 'manon', '123', 'res/téléchargement.png');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `Name` varchar(255) NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Price` int(11) NOT NULL,
  `Descr` varchar(255) NOT NULL,
  `Cat` int(11) NOT NULL,
  `Qty` int(11) NOT NULL,
  `TauxPromo` int(11) NOT NULL DEFAULT '0',
  `Size` int(11) DEFAULT NULL,
  `Color` varchar(255) DEFAULT NULL,
  `Sex` int(11) DEFAULT NULL,
  `Seller` varchar(255) NOT NULL,
  `Pic_loc` varchar(534) NOT NULL,
  `Vid_link` varchar(534) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=252552 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`Name`, `ID`, `Price`, `Descr`, `Cat`, `Qty`, `TauxPromo`, `Size`, `Color`, `Sex`, `Seller`, `Pic_loc`, `Vid_link`) VALUES
('Camionosor', 252525, 12000, 'Super camion qui tue', 3, 1, 25, 0, '0', 0, 'vendeur@vendeur.com', 'a:2:{i:0;s:14:\"res/Camion.jpg\";i:1;s:11:\"res/cam.jpg\";}', 'res/1.mp4'),
('Pantalon', 252528, 10, 'Pantalon rouge classique, taillé près du corps pour ces dames.', 2, 12, 0, 4, 'rouge', 1, 'vendeur@vendeur.com', 'a:1:{i:0;s:9:\"res/a.jpg\";}', ''),
('Pantalon', 252529, 15, 'Pantalon vert classique, taillé près du corps pour ces dames.', 2, 2, 0, 2, 'vert', 1, 'vendeur@vendeur.com', 'a:1:{i:0;s:9:\"res/e.jpg\";}', ''),
('Pantalon', 252530, 13, 'Pantalon bleu classique, taillé près du corps pour ces dames.', 2, 6, 0, 4, 'bleu', 1, 'vendeur@vendeur.com', 'a:1:{i:0;s:9:\"res/z.jpg\";}', ''),
('Pantalon', 252531, 11, 'Pantalon rouge classique, taillé près du corps pour ces messieurs.', 2, 3, 0, 1, 'rouge', 0, 'vendeur@vendeur.com', 'a:1:{i:0;s:9:\"res/q.jpg\";}', ''),
('Pantalon', 252532, 12, 'Pantalon vert classique, taillé près du corps pour ces messieurs.', 2, 3, 0, 2, 'vert', 0, 'vendeur@vendeur.com', 'a:1:{i:0;s:9:\"res/d.jpg\";}', ''),
('Pantalon', 252533, 14, 'Pantalon bleu classique, taillé près du corps pour ces messieurs.', 2, 5, 0, 4, 'bleu', 0, 'vendeur@vendeur.com', 'a:1:{i:0;s:9:\"res/s.jpg\";}', ''),
('Ballon de foot', 252534, 6, 'Pantalon bleu classique, taillé près du corps pour ces messieurs.', 3, 7, 0, NULL, NULL, NULL, 'vendeur@vendeur.com', 'a:1:{i:0;s:9:\"res/m.jpg\";}', ''),
('Playstation 4', 252535, 440, 'Console de jeu de salon. Parfait pour offrir à son beau fils pour qu il vous apprécie. ', 3, 40, 0, NULL, NULL, NULL, 'vendeur@vendeur.com', 'a:1:{i:0;s:9:\"res/p.jpg\";}', ''),
('Album AM de Arctic Monkeys', 252536, 25, 'Meilleur album de ces musiciens. Symbole Rop-Rock du 21ème siècle.', 1, 100, 0, NULL, NULL, NULL, 'vendeur@vendeur.com', 'a:1:{i:0;s:10:\"res/zz.jpg\";}', ''),
('Album Celebration Day de Led Zepplin', 252537, 40, 'Meilleur album de ces musiciens. L un des groupes de rock les plus connu au monde', 1, 200, 0, NULL, NULL, NULL, 'vendeur@vendeur.com', 'a:1:{i:0;s:10:\"res/aa.jpg\";}', ''),
('L Humanite en Peril  Virons de bord  toute ', 252538, 7, 'Mais bon sang comment vais je m en sortir de cette tache insensee ', 0, 5, 0, NULL, NULL, NULL, 'gregory@hotmail.fr', 'a:1:{i:0;s:11:\"res/222.jpg\";}', ''),
('La vie secrète des écrivains', 252539, 9, 'Tout le monde a trois vies : une vie privée, une vie publique et une vie secrète...\" ', 0, 50, 0, NULL, NULL, NULL, 'gregory@hotmail.fr', 'a:1:{i:0;s:11:\"res/111.jpg\";}', ''),
('Transparence', 252540, 15, 'A la fin des années 2060, la présidente française de Transparence, une société du numérique implantée en terre sauvage d Islande, est accusée par la police locale d avoir orchestré son propre assassinat.', 0, 12, 0, NULL, NULL, NULL, 'gregory@hotmail.fr', 'a:1:{i:0;s:13:\"res/trans.jpg\";}', ''),
('Surface', 252541, 16, 'Ici, personne ne veut plus de cette capitaine de police. \r\nLà bas, personne ne veut de son enquête. ', 0, 45, 0, NULL, NULL, NULL, 'gregory@hotmail.fr', 'a:1:{i:0;s:11:\"res/333.jpg\";}', ''),
('DragonTshirt', 252542, 25, 'How to train your dragon black orange tee shirt', 2, 70, 0, 2, 'noir_orange', 0, 'gregory@hotmail.fr', 'a:1:{i:0;s:10:\"res/01.jpg\";}', ''),
('DragonTshirt', 252544, 26, 'How to train your dragon black orange tee shirt', 2, 60, 0, 2, 'noir_orange', 1, 'gregory@hotmail.fr', 'a:1:{i:0;s:10:\"res/01.jpg\";}', ''),
('DragonTshirt', 252545, 25, 'How to train your dragon gris tee shirt 6 logos', 2, 70, 0, 2, 'gris', 0, 'gregory@hotmail.fr', 'a:1:{i:0;s:10:\"res/02.jpg\";}', ''),
('DragonTshirt', 252546, 25, 'How to train your dragon gris tee shirt 6 logos pour femme', 2, 68, 0, 2, 'gris', 1, 'gregory@hotmail.fr', 'a:1:{i:0;s:10:\"res/02.jpg\";}', ''),
('DragonTshirt', 252547, 30, 'How to train your dragon blanc tee shirt  pour homme', 2, 25, 0, 3, 'blanc', 0, 'gregory@hotmail.fr', 'a:1:{i:0;s:10:\"res/03.jpg\";}', ''),
('DragonTshirt', 252548, 31, 'How to train your dragon blanc tee shirt  pour femme', 2, 1, 0, 3, 'blanc', 1, 'gregory@hotmail.fr', 'a:1:{i:0;s:10:\"res/03.jpg\";}', ''),
('DragonTshirt', 252549, 24, 'How to train your dragon bleu ciel tee shirt  pour femme', 2, 33, 0, 3, 'bleu_ciel', 1, 'gregory@hotmail.fr', 'a:1:{i:0;s:10:\"res/04.jpg\";}', ''),
('DragonTshirt', 252550, 24, 'How to train your dragon bleu ciel tee shirt  pour homme', 2, 33, 0, 3, 'bleu_ciel', 0, 'gregory@hotmail.fr', 'a:1:{i:0;s:10:\"res/04.jpg\";}', '');

-- --------------------------------------------------------

--
-- Structure de la table `seller`
--

DROP TABLE IF EXISTS `seller`;
CREATE TABLE IF NOT EXISTS `seller` (
  `Email` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Surname` varchar(255) NOT NULL,
  `Pic_loc` varchar(255) NOT NULL,
  `Back_pic_loc` varchar(255) NOT NULL,
  PRIMARY KEY (`Email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `seller`
--

INSERT INTO `seller` (`Email`, `Name`, `Surname`, `Pic_loc`, `Back_pic_loc`) VALUES
('vendeur@vendeur.com', 'Vendeur', 'mop', 'res/4.jpg', 'res/ciel.PNG'),
('gregory@hotmail.fr', 'Dupond', 'Gregory', 'res/Vendeur.jpg', 'res/france7.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Type` int(11) DEFAULT NULL,
  PRIMARY KEY (`Email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`Email`, `Password`, `Type`) VALUES
('pierre.camugli@hotmail.fr', 'je sais plus', 0),
('vendeur@vendeur.com', '123', 1),
('picolo.pico@edu.fr', 'azerty', 2),
('jerome.ferraton@gmail.com', 'mot de passe', 0),
('gregory@hotmail.fr', 'mdp', 1),
('amf.gervais@gmail.com', 'charlotte', 0),
('manon.duran92@gmail.com', '0997', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
