


-- Ce fichier sert à initialiser la base de données













USE test;





-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  lun. 18 sep. 2017 à 18:27
-- Version du serveur :  5.6.35
-- Version de PHP :  7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `produits`




CREATE TABLE `produits` (
  `id`  int(11) NOT NULL,
  `name`  varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price`  DECIMAL(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `pimg`  varchar(255) NOT NULL,
  `creation_date` datetime NOT NULL
    
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `name`,`description`,`price`, `qty`, `pimg` ,`creation_date`) VALUES
(1, 'Pomme','Gala, rayé rouge-jaune, parfumé et sucré','9','100','../images/imageapple.jpg','2022-11-02 10:28:41'),
(2, 'Orange','Beaucoup d\'eau et super sucré','12','50','../images/imageorange.jpg','2022-11-02 10:28:41'),
(3, 'Tomate','produit biologique, gros, saveur forte','6','100','../images/imagetomate.jpg','2022-11-02 16:28:41'),
(4, 'Pomme de terre','ce genre de pommes de terre à peau jaune et à cœur jaune ont un gout doux et gluant, avec une sensation de bruissement','8','500','../images/imagepotatoe.jpg','2022-11-02 16:28:41'),
(5, 'Concombre','Arôme léger et élégant, gout croquant et agréable','7','200','../images/imagecucumber.jpg','2022-11-02 16:28:41');


--
-- Index pour les tables déchargées
--

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `id` int(11) NOT NULL,
  `produit_id` int(11) NOT NULL,
  `produit_name`  varchar(255) NOT NULL,
  `produit_price`  DECIMAL(11) NOT NULL,
  `produit_qty` int(11) NOT NULL,
  `produit_amount`  DECIMAL(11) NOT NULL,
  `panier_date` datetime NOT NULL
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `panier`
--



--
-- Index pour les tables déchargées
--

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
    

